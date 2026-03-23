<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/nos-services', [PageController::class, 'services'])->name('services');
Route::get('/orientation-soutien-scolaire', [PageController::class, 'orientation'])->name('services.orientation');
Route::get('/etudier-a-letranger', [PageController::class, 'abroad'])->name('services.abroad');
Route::get('/visa-mobilite-internationale', [PageController::class, 'visa'])->name('services.visa');
Route::get('/preparation-au-depart', [PageController::class, 'departure'])->name('services.departure');
Route::get('/logement-et-integration', [PageController::class, 'housing'])->name('housing');
Route::get('/billets-davion', [PageController::class, 'flight'])->name('services.flight');

Route::get('/consulting-accompagnement-professionnel', [PageController::class, 'consulting'])->name('services.consulting');
Route::get('/destinations/{slug}', [PageController::class, 'showDestination'])->name('destinations.show');
Route::get('/pourquoi-choisir-studia', [PageController::class, 'whyStudia'])->name('why-studia');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes (Secured)
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Clients
    Route::get('/clients', [DashboardController::class, 'clients'])->name('clients.index');
    Route::get('/clients/{client}', [DashboardController::class, 'showClient'])->name('clients.show');
    Route::post('/clients', [DashboardController::class, 'storeClient'])->name('clients.store');

    // Dossiers
    Route::get('/dossiers', [DashboardController::class, 'dossiers'])->name('dossiers.index');
    Route::get('/dossiers/{dossier}', [DashboardController::class, 'showDossier'])->name('dossiers.show');
    Route::post('/dossiers', [DashboardController::class, 'storeDossier'])->name('dossiers.store');
    Route::put('/dossiers/{dossier}', [DashboardController::class, 'updateDossier'])->name('dossiers.update');
    Route::post('/dossiers/{dossier}/documents', [DashboardController::class, 'storeDocument'])->name('dossiers.documents.store');
    Route::post('/dossiers/{dossier}/notes', [DashboardController::class, 'storeNote'])->name('dossiers.notes.store');

    // Finances (Admin & Compta)
    Route::group(['middleware' => ['role:admin|compta']], function () {
        Route::get('/finances', [DashboardController::class, 'finances'])->name('finances.index');
        Route::get('/finances/export', [DashboardController::class, 'exportFinances'])->name('finances.export');
        Route::get('/factures', [DashboardController::class, 'invoices'])->name('finances.invoices');
        Route::get('/devis', [DashboardController::class, 'devis'])->name('finances.devis');
        Route::post('/invoices', [DashboardController::class, 'storeInvoice'])->name('finances.invoices.store');
        Route::put('/invoices/{invoice}', [DashboardController::class, 'updateInvoice'])->name('finances.invoices.update');
        Route::delete('/invoices/{invoice}', [DashboardController::class, 'destroyInvoice'])->name('finances.invoices.destroy');
        Route::get('/invoices/{invoice}/pdf', [DashboardController::class, 'downloadInvoicePdf'])->name('finances.invoices.pdf');
        Route::post('/payments', [DashboardController::class, 'storePayment'])->name('finances.payments.store');
        Route::delete('/payments/{payment}', [DashboardController::class, 'destroyPayment'])->name('finances.payments.destroy');
    });

    // Tools
    Route::get('/documents', [DashboardController::class, 'documents'])->name('documents');
    Route::get('/parametres', [DashboardController::class, 'settings'])->name('settings');

    // Users (Admin Only)
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/utilisateurs', [\App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('users.index');
        Route::post('/utilisateurs', [\App\Http\Controllers\Dashboard\UserController::class, 'store'])->name('users.store');
        Route::put('/utilisateurs/{user}', [\App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('users.update');
        Route::delete('/utilisateurs/{user}', [\App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('users.destroy');
    });
});
