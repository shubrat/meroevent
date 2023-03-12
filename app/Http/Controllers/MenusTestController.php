<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenusTestController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        
        $this->setPageTitle('Menus', 'Fill in the required fields to create a new Special Service.');
        return view('cms.menus.create');
        
    }

    public function store(Request $request)
    {

                echo("test");
        
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
}
