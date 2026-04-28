<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    /**
     * Affiche la page de vente par catégorie
     */
    public function vente(Request $request)
    {
        $categorie = $request->get('categorie');

        // Définir les IDs des races selon la catégorie
        $raceIds = match($categorie) {
             'chiens' => range(1, 7),
                'chats' => range(8, 20),
                'perroquets' => [21],          // ID 47 est le perroquet
            default => range(1, 7)
        };
        $categorie = match($categorie) {
            'chiens' => 'chiens',
            'chats' =>  'chats',
            'perroquets' => 'perroquets' ,
            default => 'chiens'
        };

        
        // Récupérer tous les animaux de la catégorie avec pagination
        $animaux = Animal::with('races')
            ->whereIn('race_id', $raceIds)
            
            ->orderBy('created_at', 'desc')
            ->paginate(36);
        
        // Récupérer les races uniques pour l'affichage
        $razasUnicas = Race::whereIn('id', $raceIds)
            ->where('is_active', true)
            ->orderBy('nom')
            ->get();
        
        // Compter le nombre d'animaux par race
        $countByRace = Animal::whereIn('race_id', $raceIds)
            
            ->select('race_id', DB::raw('count(*) as total'))
            ->groupBy('race_id')
            ->pluck('total', 'race_id');
        
        // Récupérer une image exemple pour chaque race
        $raceImages = [];
        foreach ($razasUnicas as $raza) {
            $animalExemple = Animal::where('race_id', $raza->id)
                
                ->first();
            
            if ($animalExemple) {
                $images = is_string($animalExemple->images) ? json_decode($animalExemple->images, true) : $animalExemple->images;
                $raceImages[$raza->id] = is_array($images) && !empty($images) ? $images[0] : null;
            } else {
                $raceImages[$raza->id] = null;
            }
        }
        
        return view('animaux.venta', [
            'animaux' => $animaux,
            'razasUnicas' => $razasUnicas,
            'countByRace' => $countByRace,
            'raceImages' => $raceImages,
            'categorie' => $categorie,
        ]);
    }


public function multiRaces(Request $request, $lang, $slugs)
{
    // Séparer les slugs : "pomsky-et-golden-retriever" ou "bengale" (une seule race)
    $slugsArray = explode('-et-', $slugs);
    
    // Récupérer les races correspondantes
    $races = Race::whereIn('slug', $slugsArray)
        ->where('is_active', true)
        ->get();
    
    if ($races->isEmpty()) {
        abort(404);
    }
    
    // Récupérer les IDs des races
    $raceIds = $races->pluck('id')->toArray();
    
    // Récupérer les animaux
    $animaux = Animal::whereIn('race_id', $raceIds)
        ->orderBy('created_at', 'desc')
        ->get();
    
    $categorie = $races->first()->categorie;
    
    // Déterminer si c'est une seule ou plusieurs races
    $raceActuelle = $races->count() === 1 ? $races->first() : null;
    $racesMultiples = $races->count() > 1 ? $races : null;
    
    // Récupérer toutes les races pour la catégorie
    $razasUnicas = Race::where('categorie', $categorie)
        ->where('is_active', true)
        ->orderBy('nom')
        ->get();
    
    // Compter les animaux par race
    $countByRace = Animal::whereIn('race_id', $raceIds)
        ->select('race_id', DB::raw('count(*) as total'))
        ->groupBy('race_id')
        ->pluck('total', 'race_id');
    
    $raceImages = Race::where('categorie', $categorie)
        ->pluck('image', 'slug');
    
    return view('animaux.racecate', [
        'animaux' => $animaux,
        'razasUnicas' => $razasUnicas,
        'countByRace' => $countByRace,
        'raceImages' => $raceImages,
        'categorie' => $categorie,
        'raceActuelle' => $raceActuelle,
        'racesMultiples' => $racesMultiples,
        'slug' => $slugs
    ]);
}  
    private function getCategorieFromSlug($slug)
    {
        if (str_contains($slug, 'chien')) {
            return 'chien';
        } elseif (str_contains($slug, 'chat')) {
            return 'chat';
        } elseif (str_contains($slug, 'perroquet') || str_contains($slug, 'oiseau')) {
            return 'oiseau';
        }
        
        return 'chien'; // par défaut
    }
    
    /**
     * Affiche les détails d'un animal
     */
 public function show(Request $request, $lang, $slug)
{
    // Récupérer l'animal par son slug
    $animal = Animal::where('slug', $slug)
        ->with('races') // Charger la relation race
        ->firstOrFail();
    
    // Récupérer les images
    $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
    
    return view('animaux.show', [
        'animal' => $animal,
        'images' => $images,
        'categorie' => $animal->race->categorie ?? 'animal'
    ]);
}


 
 
    public function cachorrosraza(Request $request, $lang, $slug)
{
    // 1. Récupérer la race
    $race = Race::where('slug', $slug)->firstOrFail();

    // 2. Récupérer les animaux liés à cette race
    $animaux = Animal::with('races')
        ->where('race_id', $race->id)
        ->paginate(36);

    // 3. Infos supplémentaires
    $race = $race->categorie ?? 'unknown';

      $categorie = match($race) {
             'chien' => 'chiens',
                'chat' =>  'chats',
                'oiseau' => 'perroquets' ,          // ID 47 est le perroquet
            default => 'chiens'
        };
    $raceName = $race->name ?? '';

    return view('animaux.race', compact('animaux', 'categorie', 'raceName'));
}
}