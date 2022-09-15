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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return 'welcome';
// });

// Route::prefix("subjects")->group(function(){

//     //public routes :

//     Route::get('/' , ['\App\Http\Controllers\SubjectController'::class , 'index']);

//     Route::get('/{id}' , ['\App\Http\Controllers\SubjectController'::class , 'show']);

//     Route::post('/' , ['\App\Http\Controllers\SubjectController'::class , 'store']);

//     //protected routes : 

//     Route::group(['middleware' => ['auth:sanctum']] , function () {

//         Route::put('/{id}' , ['\App\Http\Controllers\SubjectController'::class , 'update']);

//         Route::delete('/{id}' , ['\App\Http\Controllers\SubjectController'::class , 'destroy']);

//     });
// });

Route::resource('subjects','SubjectController');

// Route::group(['middleware' => ['web']], function () {
    // your routes here
    Route::resource('students','StudentController')->except('store');
    Route::post('/students' , ['\App\Http\Controllers\StudentController'::class , 'register'])->name('api.students.register');
// });


Route::resource('teachers','TeacherController');
Route::post('/teachers' , ['\App\Http\Controllers\TeacherController'::class , 'register']);
    
Route::resource('marks','MarkController');
Route::get('marksStudent/{id}' , [MarkController::class , 'indexById'])->name('marks.indexById');
/*
Route::prefix("marks")->group(['controller' => MarkController::class],function(){

    //public routes :

    Route::get('/' , 'index');

    //protected routes :

    Route::group(['middleware' => ['auth:sanctum']] , function () {

        Route::post('/' ,'store');
    
        Route::get('/{marks:id}' ,'show');

        // Route::get('/student' , ['\App\Http\Controllers\MarkController'::class , 'marksStudent']);

        Route::put('/{marks:id}' ,'update');
    
        Route::delete('/{marks:id}' , 'destroy');

    });

});

*/

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