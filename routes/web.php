<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminController;


Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');


Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');


Route::get('admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/upload', [AdminController::class, 'uploadPhoto'])->name('admin.upload');
Route::delete('/admin/photo/{id}', [AdminController::class, 'deletePhoto'])->name('admin.photo.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
