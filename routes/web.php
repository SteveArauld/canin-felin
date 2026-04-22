<?php

use App\Http\Controllers\CachorroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Redirection automatique vers la langue par défaut
Route::get('/', function () {
    return redirect(config('app.locale'));
});



Route::get('/ricerca', [CachorroController::class, 'search'])->name('search');
Route::get('/ricerca/autocompletamento', [CachorroController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/ricerca/dettagli-razza', [CachorroController::class, 'raceDetails'])->name('search.race-details');

Route::group([ 'prefix' => '{lang}','middleware' => 'setLocale','where' => ['lang' => implode('|', array_keys(config('languages')))],],
    function () {

        Route::get('/', [CachorroController::class, 'home'])->name('home');

        Route::get('/cuccioli-disponibili/{slug}', [CachorroController::class, 'show'])->name('cachorros.show');

        Route::get('/cuccioli-per-razza/{slug}', [CachorroController::class, 'cachorrosraza'])->name('cachorrosraza');

        Route::post('/ordine/{slug}', [CachorroController::class, 'processOrder'])->name('order.process');

        Route::get('/cuccioli-in-vendita', [CachorroController::class, 'venta'])->name('venta');



        Route::get('/chi-siamo', function () {
            return view('pages.quienes');
        })->name('quienes');


        Route::get('/spedizione-cuccioli', function () {
            return view('pages.envio');
        })->name('envio');

        Route::get('/garanzia-sanitaria', function () {
            return view('pages.garantia');
        })->name('garantia');

        Route::get('/referenze', function () {
            return view('pages.referencias');
        })->name('referencias');

        Route::get('/contatti', function () {
            return view('pages.contacto');
        })->name('contacto');



        Route::get('/politica-sulla-privacy', function () {
            return view('pages.privacidad');
        })->name('privacidad');

        Route::get('/politica-di-reso', function () {
            return view('pages.devoluciones');
        })->name('devoluciones');

        Route::get('/politica-dei-cookie', function () {
            return view('pages.cookies');
        })->name('cookies');

    }
);