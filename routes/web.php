<?php

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

//Route::get('/',[\App\Http\Controllers\PanelController::class,'index']);

//create panel user login where check username, password
Route::get('login',[\App\Http\Controllers\LoginCotroller::class,'login']);

Route::post('loginpost',[\App\Http\Controllers\LoginCotroller::class,'loginpost'])->name('loginpost');
// view login check redirect
Route::get('logincheck',[\App\Http\Controllers\LoginCotroller::class,'logincheck']);
Route::post('logincheckpost',[\App\Http\Controllers\LoginCotroller::class,'logincheckpost'])->name('logincheckpost');
//panel users


//logout panel



Route::get('text/{id}',[\App\Http\Controllers\PanelController::class,'text']);
Route::group(['Middleware','auth'],function (){
    Route::get('postsadd/{pos}',[\App\Http\Controllers\PanelController::class,'postsadd'])->name('postsadd');
    Route::get('/',[\App\Http\Controllers\PanelController::class,'search'])->name('search');
    Route::get('paneluser',[\App\Http\Controllers\PanelController::class,'paneluser']);
    Route::delete('logoutpanel',[\App\Http\Controllers\PanelController::class,'logoutpanel'])->name('logoutpanel');
//update username password
    Route::get('putpaneluser/{id}',[\App\Http\Controllers\PanelController::class,'putpaneluser']);

    Route::put('putpaneluserput/{id}',[\App\Http\Controllers\PanelController::class,'putpaneluserput'])->name('putpaneluserput');
//view city posts travel
    Route::get('travrlpost/{id}',[\App\Http\Controllers\PanelController::class,'travrlpost']);
// create post travel
    Route::post('travellingpost',[\App\Http\Controllers\PanelController::class,'travellingpost'])->name('travellingpost');

});

