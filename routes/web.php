<?php

use App\Http\Controllers\CachorroController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Redirection automatique vers la langue par défaut
Route::get('/', function () {
    return redirect(config('app.locale'));
});



Route::get('/search', [CachorroController::class, 'search'])->name('search');
Route::get('/search/autocomplete', [CachorroController::class, 'autocomplete'])->name('search.autocomplete');
Route::get('/search/race-details', [CachorroController::class, 'raceDetails'])->name('search.race-details');

Route::group([ 'prefix' => '{lang}','middleware' => 'setLocale','where' => ['lang' => implode('|', array_keys(config('languages')))],],
    function () {

        Route::get('/', [CachorroController::class, 'home'])->name('home');

        Route::get('/cachorros-disponibles/{slug}', [CachorroController::class, 'show'])->name('cachorros.show');

        Route::get('/cachorrosraza/{slug}', [CachorroController::class, 'cachorrosraza'])->name('cachorrosraza');

        Route::post('/order/{slug}', [CachorroController::class, 'processOrder'])->name('order.process');

        Route::get('/cachorros-en-venta', [CachorroController::class, 'venta'])->name('venta');



        Route::get('/quienes-somos', function () {
            return view('pages.quienes');
        })->name('quienes');


        Route::get('/envio-de-cachorros', function () {
            return view('pages.envio');
        })->name('envio');

        Route::get('/garantia-sanitaria', function () {
            return view('pages.garantia');
        })->name('garantia');

        Route::get('/referencias', function () {
            return view('pages.referencias');
        })->name('referencias');

        Route::get('/contacto', function () {
            return view('pages.contacto');
        })->name('contacto');



        Route::get('/politica-de-privacidad', function () {
            return view('pages.privacidad');
        })->name('privacidad');

        Route::get('/politica-de-devoluciones', function () {
            return view('pages.devoluciones');
        })->name('devoluciones');

        Route::get('/politica-de-cookies', function () {
            return view('pages.cookies');
        })->name('cookies');







    }
);
