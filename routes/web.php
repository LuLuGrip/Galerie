<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminController;


Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');


Route::resource('photos', PhotoController::class);


Route::get('admin', [AdminController::class, 'index'])->name('admin.index');


