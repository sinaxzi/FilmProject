<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/',[MovieController::class,'index'])->name('home');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout')->middleware('auth');

Route::get('/user/{user}/manage',[MovieController::class,'manage'])->name('movie.manage')->middleware('auth');

Route::prefix('movies')->group(function(){

    Route::get('/create',[MovieController::class,'create'])->name('movie.create')->middleware('auth');

    Route::post('',[MovieController::class,'store'])->name('movie.store')->middleware('auth');

    Route::get('/{movie}/edit',[MovieController::class,'edit'])->name('movie.edit')->middleware('auth');

    Route::patch('/{movie}/update',[MovieController::class,'update'])->name('movie.update')->middleware('auth')->can('update','movie');

    Route::delete('/{movie}/delete',[MovieController::class,'destroy'])->name('movie.delete')->middleware(['auth','role']);

    Route::get('/{movie}',[MovieController::class,'show'])->name('movie.show');

});

Route::prefix('genres')->group(function(){
    
    Route::get('/create',[GenreController::class,'create'])->name('genre.create')->middleware(['auth','role']);

    Route::post('',[GenreController::class,'store'])->name('genre.store')->middleware(['auth','role']);

});