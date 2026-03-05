<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/nos-services', [PageController::class, 'services'])->name('services');
Route::get('/orientation-soutien-scolaire', [PageController::class, 'orientation'])->name('services.orientation');
Route::get('/etudier-a-letranger', [PageController::class, 'abroad'])->name('services.abroad');
Route::get('/visa-mobilite-internationale', [PageController::class, 'visa'])->name('services.visa');
Route::get('/billets-davion', [PageController::class, 'flight'])->name('services.flight');
Route::get('/consulting-accompagnement-professionnel', [PageController::class, 'consulting'])->name('services.consulting');
Route::get('/destinations', [PageController::class, 'destinations'])->name('destinations');
Route::get('/pourquoi-choisir-studia', [PageController::class, 'whyStudia'])->name('why-studia');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
