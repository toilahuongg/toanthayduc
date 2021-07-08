<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserController;
use App\Http\Controller\CourseController;
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
    return view('public.home');
})->name('public.home');
Route::middleware('checkAuth')->group(function () {
    Route::middleware('checkAdmin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', function () {
                return view('admin.home');
            })->name('admin.home');
            Route::prefix('course')->group(function () {
                Route::get('/', 'CourseController@Index')->name('course.Index');
                Route::get('/create', 'CourseController@Create')->name('course.Create');
                Route::post('/create', 'CourseController@Store');
                Route::get('/{id}', 'CourseController@Show')->name('course.Show');
                Route::get('/{id}/edit', 'CourseController@Edit')->name('course.Edit');
                Route::put('/{id}/edit', 'CourseController@Update');
                Route::get('/{id}/delete', 'CourseController@Delete')->name('course.Delete');
                Route::delete('/{id}/delete', 'CourseController@Destroy');
            });
        });
    });
    Route::get('/logout', 'UserController@getLogout');
});
Route::middleware('checkGuest')->group(function () {
    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::post('/login', 'UserController@postLogin');
});
