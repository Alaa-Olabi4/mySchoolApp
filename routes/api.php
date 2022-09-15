<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('subjects','SubjectController');

    Route::resource('students','StudentController')->except('store');
    Route::post('/students' , ['\App\Http\Controllers\StudentController'::class , 'register'])->name('api.students.register');


Route::resource('teachers','TeacherController');
Route::post('/teachers' , ['\App\Http\Controllers\TeacherController'::class , 'register']);
    
Route::resource('marks','MarkController');
Route::get('marksStudent/{id}' , [MarkController::class , 'indexById'])->name('marks.indexById');

Route::prefix("service")->group(function(){

    //public routes :

    Route::post('/login' , ['\App\Http\Controllers\UserController'::class , 'login'])->name('api.login');
    Route::post('/register',['\App\Http\Controllers\UserController'::class , 'register'])->name('api.register');

    // protected routes :

    Route::group(['middleware' => ['auth:sanctum']] , function () {

        Route::get('/logout' , ['\App\Http\Controllers\UserController'::class , 'logout']);

        Route::get('/marksStudent' , ['\App\Http\Controllers\MarkController'::class , 'marksStudent']);

    });
});