<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Question1Controller;
use App\Http\Controllers\Question3Controller;
use App\Http\Controllers\Question4Controller;
use App\Http\Controllers\Question5Controller;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Question 5
Route::get('/question-5', [Question5Controller::class, 'index'])->name('question.5');

// Question 6
Route::get('/question-6', function () {
    return view('questions.6');
})->name('question.6');

Route::middleware('auth')->group(function () {
    // Question 1
    Route::get('/question-1', [Question1Controller::class, 'index'])->name('question.1');

    // Question 3
    Route::get('/question-3', [Question3Controller::class, 'index'])->name('question.3');

    // Question 4
    Route::get('/question-4', [Question4Controller::class, 'create'])->name('question.4.create');
    Route::post('/question-4', [Question4Controller::class, 'store'])->name('question.4.store');

    // Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
