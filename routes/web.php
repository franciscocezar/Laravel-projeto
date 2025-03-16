<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/produtos', [CategoryController::class, 'index']);

Route::get('/produtos/{slug}', [CategoryController::class, 'show']);

Route::get('/blog', BlogController::class);

Route::view('sobre', 'site.about.index');

Route::get('contato', [ContactController::class, 'index']);
Route::post('contato', [ContactController::class, 'form']);