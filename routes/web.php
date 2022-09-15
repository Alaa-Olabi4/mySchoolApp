<?php

use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home',function(){
    return view('home',['message'=>'']);
})->name('home');

Route::get('/login',function(){
    return view('login',['message'=>'']);
})->name('login');

Route::resource('subjects','SubjectController');
    
// Route::group(['middleware' => ['web']], function () {
    // your routes here
    Route::resource('students','StudentController')->except('store');
    Route::post('/students','StudentController@register')->name('new.student');
// });

Route::resource('teachers','TeacherController');
    
Route::resource('marks','MarkController');
Route::get('marksStudent/{id}' , [MarkController::class , 'indexById'])->name('marks.indexById');

Route::get('/welcome',function(){
    return view('welcome');
});

