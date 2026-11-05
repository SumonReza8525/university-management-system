<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

// Route::get( '/', function () {
//     return view( 'dashboard' );
// } );
Route::get( '/', [DashboardController::class, 'index'] )->name( 'dashboard' );
Route::get( '/department', [DepartmentController::class, 'index'] )->name( 'department.index' );
Route::get( '/department/create', [DepartmentController::class, 'create'] )->name( 'department.create' );