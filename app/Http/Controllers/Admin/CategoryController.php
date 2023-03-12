<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index()
    {
        $this->setPageTitle('Categories', 'List of all Categories');

        return request()->ajax()
            ? $this->datatable()
            : view('cms.categories.index');
    }

    public function create()
    {
        $this->setPageTitle('Categories', 'Fill in the required fields to create a new Categories.');

        return view('cms.categories.create');
    }


    public function store(CategoryStoreRequest $request)
    {

        try {

            $category = Category::create($request->validated());
            return $category
                ? $this->responseRedirect('cms.categories.index', 'Category Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }



    // toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $category = Category::findOrFail($request['id']);
        $category->status = !$category->status;

        return $category->update()
            ? response()->json(['message' => 'Category Status Updated Successfully.', 'category' => $category, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating category status.', 'status' => 'error']);
    }


    protected function datatable()
    {

        $data = Category::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.categories.edit', $data) . '"
                            type="button"
                            class="btn btn-success waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit"
                            data-bs-original-title="Edit"
                        ><i class="bx bx-pencil font-size-16 align-middle"></i></a>
                        <a
                            href=""
                            id="delete-btn"
                            data-id="' . $data->slug . '"
                            type="button"
                            class="btn btn-danger waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete"
                            data-bs-original-title="Delete"
                        ><i class="bx bx-trash font-size-16 align-middle"></i></a>
                    </div>
                ';
            })
            

            ->editColumn('name', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->name . '"
                                data-bs-original-title="' . $data->name . '"
                            >' . Str::limit($data->name, 17) . '</p>

                        </div>
                    ';
            })


            ->editColumn('description', function ($data) {
                return '
                           <div class="d-flex flex-column">
                            <h5
                            class="text-body font-size-12 mb-1 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->description . '"
                                data-bs-original-title="' . $data->description . '"
                                >' . Str::limit($data->description, 60) . ' </h5>
                            
                        </div>
                    ';
            })

            ->editColumn('status', function ($data) {
                $checked = $data->status == 1 ? 'checked' : '';
                return '
                    <label for="status-' . $data->id . '"></label>
                        <input
                        type="checkbox"
                        id="status-' . $data->id . '"
                        data-id="' . $data->id . '"
                                               name="status"
                        class="js-switch"
                        ' . $checked . '
                        autocomplete="off"
                        onchange="toggleIsStatus(' . $data->id . ')"
                    />';
            })

            ->addIndexColumn()
            ->rawColumns(['actions', 'title', 'description', 'status'])
            ->make(true);
    }
}
