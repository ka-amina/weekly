<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

   
require __DIR__.'/auth.php';
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces.index');
Route::get('/annonces/create', [AnnonceController::class, 'create'])->name('annonces.create');
Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');
Route::delete('/annonce/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
Route::get('/annonces/{annonce}/edit', [AnnonceController::class, 'edit'])->name('annonces.edit');
Route::put('/annonces/{annonce}', [AnnonceController::class, 'update'])->name('annonces.update');


Route::get('/home',[AnnonceController::class,'annonces'])->name('annonces');
Route::get('/annonce/{id}', [AnnonceController::class, 'show'])->name('annonce');

Route::post('/announce/{id}', [CommentController::class, 'store'])->name('comments.store');




