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

Route::get('movies/create',[MovieController::class,'create'])->name('movie.create');

Route::get('/movies/{movie}',[MovieController::class,'show'])->name('movie.show');

Route::post('/movies',[MovieController::class,'store'])->name('movie.store');

Route::get('/movies/{movie}/edit',[MovieController::class,'edit'])->name('movie.edit');

Route::patch('/movies/{movie}/update',[MovieController::class,'update'])->name('movie.update');

Route::delete('/movies/{movie}/delete',[MovieController::class,'destroy'])->name('movie.delete');

Route::get('/user/{user}/manage',[MovieController::class,'manage'])->name('movie.manage');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);

Route::get('genres/create',[GenreController::class,'create'])->name('genre.create');

Route::post('/genres',[GenreController::class,'store'])->name('genre.store');

// Route::middleware(['role:admin','auth'])->group(function(){

// });

Route::middleware(['can:view,user','auth'])->group(function(){
    Route::get('/admin/users/{user}/profile',[App\Http\Controllers\UserController::class,'show'])->name('users.profile.show');

});

Route::get('/admin/users/{user}/profile',[App\Http\Controllers\UserController::class,'show'])->name('admin');