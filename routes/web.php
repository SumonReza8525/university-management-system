<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherPersonalInfoController;
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

// Teachers controller routes

Route::get( '/teacher', [TeacherController::class, 'index'] )->name( 'teacher.index' );
Route::get( '/teacher/create', [TeacherController::class, 'create'] )->name( 'teacher.create' );
Route::post( '/teacher/store', [TeacherController::class, 'store'] )->name( 'teacher.store' );
Route::get( '/teacher/edit/{id}', [TeacherController::class, 'edit'] )->name( 'teacher.edit' );
Route::put( '/teacher/update/{id}', [TeacherController::class, 'update'] )->name( 'teacher.update' );
Route::delete( '/teacher/delete/{id}', [TeacherController::class, 'delete'] )->name( 'teacher.delete' );

// Teacher personal infos
Route::get( '/teacherInfo', [TeacherPersonalInfoController::class, 'index'] )->name( 'teacherInfo.index' );
Route::get( '/teacherInfo/create', [TeacherPersonalInfoController::class, 'create'] )->name( 'teacherInfo.create' );
Route::get( '/teacherInfo/edit/{id}', [TeacherPersonalInfoController::class, 'edit'] )->name( 'teacherInfo.edit' );
Route::post( '/teacherInfo/store', [TeacherPersonalInfoController::class, 'store'] )->name( 'teacherInfo.store' );
Route::put( '/teacherInfo/update/{id}', [TeacherPersonalInfoController::class, 'update'] )->name( 'teacherInfo.update' );
Route::delete( '/teacherInfo/delete/{id}', [TeacherPersonalInfoController::class, 'delete'] )->name( 'teacherInfo.delete' );

// Student controller routes
Route::resource( '/student', StudentController::class );