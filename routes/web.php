<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// la route question1 qui est accessible seulement aux supers admins
Route::get('/question-1', function () {
    Gate::authorize('super-admin');
    return view('questions.1');
})->name('question.1');

// route question-3 qui sert au tri des données
Route::get('/question-3', [Question3Controller::class, 'index'])->name('question.3');

// route question-4 qui affiche et soumet un formulaire
Route::get('/question-4', [Question4Controller::class, 'create'])->name('question.4.create');
Route::post('/question-4', [Question4Controller::class, 'store'])->name('question.4.store');

// route question-5 qui affiche une vue différente selon l'heure
Route::get('/question-5', [Question5Controller::class, 'index'])->name('question.5');

// route question-6
Route::get('/question-6', function () {
    return view('questions.6');
})->name('question.6');

// route question-7 qui affiche laa vue question.7 selon la langue
Route::get('/{lang}/question-7', function ($lang) {
    app()->setLocale($lang);
    return view('questions.7');
})->name('question.7');

require __DIR__ . '/auth.php';
