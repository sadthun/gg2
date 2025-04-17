<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Models\Article; // per la closure anonima

/*
|--------------------------------------------------------------------------
| Rotte Web
|--------------------------------------------------------------------------
*/

/**
 * HOMEPAGE PUBBLICA
 * Mostra gli ultimi 10 articoli, caricando la view welcome.blade.php
 */
Route::get('/', function () {
    $articles = Article::orderBy('created_at', 'desc')->take(10)->get();
    return view('welcome', compact('articles'));
})->name('home');

/**
 * VISUALIZZAZIONE PUBBLICA DI UN SINGOLO ARTICOLO
 */
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('articles.show');

/**
 * VISUALIZZAZIONE PUBBLICA DI UNA LISTA DI ARTICOLI
 * (Se vuoi mostrare a tutti una lista, non soltanto gli ultimi 10)
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

/**
 * MODULO CONTATTI
 */
Route::get('/contatti', [ContactController::class, 'showForm'])->name('contacts');
Route::post('/contatti', [ContactController::class, 'sendContact'])->name('contacts.send');

/**
 * AREA RISERVATA - CRUD ARTICOLI (protetta da middleware 'auth')
 */
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Mostra la lista degli articoli in area amministrativa
    Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.admin.index');

    // Crea un nuovo articolo
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // Modifica un articolo esistente
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

    // Elimina un articolo
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

/*
 * Ricorda di installare e configurare Laravel Fortify
 * per la registrazione, il login e il logout.
 * Le rotte /login, /register, /logout e simili saranno gestite da Fortify.
 */
