<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MenusTestController;
use Illuminate\Support\Facades\Route;

    
    Route::get('admin/dashboard', function () {
        return view('cms.dashboard',[ 
            
        
        ]);
    })->name('cms.dashboard');


    Route::resource('admin/categories', CategoryController::class)->names('cms.categories')->except(['destroy', 'show']);
    // Route::get('category/status/toggle', [CategoryController::class, 'toggleStatus'])->name('category.toggle.status');
    Route::get('/category/status/toggle', [CategoryController::class, 'toggleStatus'])->name('cms.categories.toggle.status');
    Route::POST('/category/delete/{category}', [CategoryController::class, 'delete'])->name('cms.categories.delete');


    



