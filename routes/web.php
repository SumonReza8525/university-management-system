<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Route::get( '/', function () {
//     return view( 'dashboard' );
// } );

// Dashboard route
Route::get( '/', [DashboardController::class, 'index'] )->name( 'dashboard' );

// Department Controller routes
Route::get( '/departments', [DepartmentController::class, 'index'] )->name( 'department.index' );
Route::get( '/department/create', [DepartmentController::class, 'create'] )->name( 'department.create' );
Route::post( '/departments', [DepartmentController::class, 'store'] )->name( 'department.store' );
Route::get( '/department/edit/{id}', [DepartmentController::class, 'edit'] )->name( 'department.edit' );
Route::put( '/department/update/{id}', [DepartmentController::class, 'update'] )
    ->name( 'department.update' );
Route::delete( '/department/delete/{id}', [DepartmentController::class, 'delete'] )->name( 'department.destroy' );

// Session controller route

Route::resource( '/session', SessionController::class );
