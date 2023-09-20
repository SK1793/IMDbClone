<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () { return view('welcome');});
Route::get('/', [App\Http\Controllers\moviecontroller::class,'template'])->name('movie.template');

Route::get('/home', [App\Http\Controllers\moviecontroller::class,'index'])->name('movie.home');

Route::get('/home/favourite/{id}', [App\Http\Controllers\moviecontroller::class,'store_data'])->name('movie.store_data');

Route::get('/home/favourite/remove/{id}', [App\Http\Controllers\moviecontroller::class,'remove_data'])->name('movie.remove_data');

Route::get('/home/favourite', [App\Http\Controllers\moviecontroller::class,'get_data'])->name('movie.favourites');

Route::get('/movie/get-details/{id}',[App\Http\Controllers\moviecontroller::class,'get_movie_details'])->name('movie.details');

Route::get('/trailor',[App\Http\Controllers\moviecontroller::class,'trailor'])->name('movie.trailor');

Route::get('/videos/playlist/{id}',[App\Http\Controllers\moviecontroller::class,'videos_playlist'])->name('video.playylist');

Route::get('/photos/playlist/{id}',[App\Http\Controllers\moviecontroller::class,'photos_playlist'])->name('photo.playylist');

Route::get('/language/{lang?}',[App\Http\Controllers\moviecontroller::class,'language']);

Route::get('/register',[App\Http\Controllers\moviecontroller::class,'register'])->name('movie.register');
Route::post('/register',[App\Http\Controllers\moviecontroller::class,'register_store'])->name('movie.register_store');

Route::get('/login',[App\Http\Controllers\moviecontroller::class,'login'])->name('movie.login');
Route::post('/login',[App\Http\Controllers\moviecontroller::class,'login_check'])->name('movie.login');

Route::get('/logout',[App\Http\Controllers\moviecontroller::class,'logout'])->name('movie.logout');
Route::get('/session',[App\Http\Controllers\moviecontroller::class,'Session'])->name('session');

Route::get('/sweetalert',function(){
    return view('page.sweetalert');
})->name('session');

Route::get('/menu_overlay',function(){
    return view('page.menu_overlay');
});
 
Route::get('/castncrew',function(){
    return view('page.castncrew');
});

Route::get('/castncrew_overlay/{imdb_id}',function($imdb_id=null){
    return view('page.castncrew')->with(compact('imdb_id'));
});
