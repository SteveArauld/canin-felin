<?php


use App\Http\Controllers\PayementController;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return redirect(config('app.locale'));
});


Route::get('/recherche', [SearchController::class, 'search'])->name('search');
Route::get('/recherche/autocompletion', [SearchController::class, 'autocomplete'])->name('search.autocomplete');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::group([ 'prefix' => '{lang}','middleware' => 'setLocale','where' => ['lang' => implode('|', array_keys(config('languages')))]], function () {

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');


    Route::get('/chiots-en-vente', [AnimalController::class, 'vente'])->name('chiens.vente');
    Route::get('/chats-en-vente', [AnimalController::class, 'vente'])->name('chats.vente');
    Route::get('/perroquets-en-vente', [AnimalController::class, 'vente'])->name('perroquets.vente');
    

   
    Route::get('/chiots-disponibles/{slug}', [AnimalController::class, 'show'])->name('chiens.show');
    Route::get('/chats-disponibles/{slug}', [AnimalController::class, 'show'])->name('chats.show');
    Route::get('/perroquets-disponibles/{slug}', [AnimalController::class, 'show'])->name('perroquets.show');



    Route::get('/chiots-par-race/{slug}', [AnimalController::class, 'cachorrosraza'])->name('chiens.par-race');
    Route::get('/chats-par-race/{slug}', [AnimalController::class, 'cachorrosraza'])->name('chats.par-race');
    Route::get('/perroquets-par-race/{slug}', [AnimalController::class, 'cachorrosraza'])->name('perroquets.par-race');



    Route::get('/qui-sommes-nous',[HomeController::class, 'quiSommesNous'])->name('qui-sommes-nous');
    Route::get('/livraison-chiots', [HomeController::class, 'livraisonChiots'])->name('livraison-chiots');
    Route::get('/garantie-sanitaire', [HomeController::class, 'garantieSanitaire'])->name('garantie-sanitaire');
    Route::get('/references', [HomeController::class, 'references'])->name('references');
    Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
    Route::get('/politique-confidentialite',[HomeController::class, 'politiqueConfidentialite'])->name('politique-confidentialite');
    Route::get('/politique-retour', [HomeController::class, 'politiqueRetour'])->name('politique-retour');




   
    Route::post('/commande/{slug}', [\App\Http\Controllers\OrderController::class, 'processOrder'])->name('commande.process');
// Route pour afficher les détails d'un animal
Route::get('/animal/{slug}', [AnimalController::class, 'show'])
    ->name('animal.show');

  Route::get('/races/{slugs}', [AnimalController::class, 'multiRaces'])
    ->name('races.multiples')
    ->where('slugs', '.*');
});

