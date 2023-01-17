<?php

use Illuminate\Support\Facades\Route;

// Auth controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::get('logout','logout')->name('logout');
    
    // Route::get('registration','registration')->name('registration');
    // Route::post('validate_registration','validate_registration')->name('auth.validate_registration');
    Route::post('validate_login','validate_login')->name('auth.validate_login');

    Route::get('dashboard','dashboard')->name('dashboard');
}); 

Route::resource('teacher', 'App\Http\Controllers\TeacherController');
Route::resource('student', 'App\Http\Controllers\StudentController');

Route::controller(ClassController::class)->group(function(){
    Route::get('class','index')->name('class');
}); 
Route::controller(AttendanceController::class)->group(function(){
    Route::get('attendance','index')->name('attendance');
    Route::post('attendancestore','store')->name('attendancestore');
    // Route::post('attendance','update')->name('attendance.update');
    Route::get('attendanceview','views')->name('attendanceview');
}); 

// Route::put('teacher_update',[TeacherController::class,'update'])->name('teacher.update');
