<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Models\Album;

// use App\Http\Controllers\;
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




Route::get('/', [LoginController::class, 'showLogin']) ->name('login');

// INFO GENG ! ⚠
// route name can be the same but method and name nae-hi hae!
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-user');

// handle login
Route::post('/', [LoginController::class, 'login'])->name('login-user');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/users', [UserController::class, 'showUsers']) ->name('users');

Route::get('/album', [AlbumController::class, 'showAlbum']) ->name('album');
Route::get('/manage-album/{album_id}', [AlbumController::class, 'manageAlbum']) ->name('manage-album');
Route::post('/manage-album/{album_id}', [AlbumController::class, 'updateAlbum']) ->name('update-album');
Route::post('/upload/{album_id}', [AlbumController::class, 'uploadPhoto']) ->name('upload-photo');

Route::post('/album', [AlbumController::class, 'store']) ->name('add-album');

Route::get('/slide', [PhotoController::class, 'showSlide']) ->name('slide');
Route::get('/gallery', [PhotoController::class, 'showGallery']) ->name('gallery');

