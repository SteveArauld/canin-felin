<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Race;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Recherche d'animaux
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query) || strlen($query) < 2) {
            return redirect()->route('accueil');
        }

        // Rechercher dans les animaux
        $animaux = Animal::with('races')
            ->where('nom', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhereHas('races', function($q) use ($query) {
                $q->where('nom', 'LIKE', "%{$query}%");
                $q->orWhere('categorie', 'LIKE', "%{$query}%");
            })
            ->paginate(36);

        // Grouper par race pour l'affichage
        $resultatsParRace = [];
        foreach ($animaux as $animal) {
            $raceNom = $animal->race->nom ?? 'Autre';
            if (!isset($resultatsParRace[$raceNom])) {
                $resultatsParRace[$raceNom] = [];
            }
            $resultatsParRace[$raceNom][] = $animal;
        }

        return view('pages.search-results', [
            'query' => $query,
            'animaux' => $animaux,
            'resultatsParRace' => $resultatsParRace,
            'total' => $animaux->total()
        ]);
    }

    /**
     * Autocomplétion pour la recherche
     */
    public function autocomplete(Request $request)
    {
        $query = $request->input('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = [];

        try {
            // Rechercher les races
            $races = Race::where('nom', 'LIKE', "%{$query}%")
                ->orWhere('categorie', 'LIKE', "%{$query}%")
                ->withCount('animaux')
                ->limit(5)
                ->get();

            foreach ($races as $race) {
                if ($race->animaux_count > 0) {
                    // Vérifier que la route existe
                    $routeName = $race->categorie . '.par-race';
                    if (!\Illuminate\Support\Facades\Route::has($routeName)) {
                        $routeName = 'chiens.par-race'; // Fallback
                    }

                    $suggestions[] = [
                        'type' => 'race',
                        'text' => $race->nom,
                        'count' => $race->animaux_count,
                        'url' => route($routeName, [
                            'lang' => app()->getLocale(),
                            'slug' => $race->slug
                        ])
                    ];
                }
            }

            // Rechercher les animaux - CORRECTION ICI: 'race' pas 'races'
            $animaux = Animal::with('race')  // <-- Changé: 'races' → 'race'
            ->where('nom', 'LIKE', "%{$query}%")
                ->limit(5)
                ->get();

            foreach ($animaux as $animal) {
                // Vérifier que l'animal a une race
                if (!$animal->race) {
                    continue;
                }

                $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
                $firstImage = is_array($images) && !empty($images) ? $images[0] : null;

                // Vérifier que la route existe
                $categorie = $animal->race->categorie ?? 'chiens';
                $routeName = $categorie . '.show';
                if (!\Illuminate\Support\Facades\Route::has($routeName)) {
                    $routeName = 'chiens.show'; // Fallback
                }

                $suggestions[] = [
                    'type' => 'animal',
                    'text' => $animal->nom,
                    'race' => $animal->race->nom ?? '',  // <-- Changé: 'races' → 'race'
                    'image' => $firstImage,
                    'url' => route($routeName, [
                        'lang' => app()->getLocale(),
                        'slug' => $animal->slug
                    ])
                ];
            }

            // Limiter à 10 suggestions maximum
            $suggestions = array_slice($suggestions, 0, 10);

            return response()->json($suggestions);

        } catch (\Exception $e) {
            // Log l'erreur pour le débogage
            \Log::error('Autocomplete error: ' . $e->getMessage());

            // Retourner un tableau vide en cas d'erreur
            return response()->json([]);
        }
    }
    /**
     * Génère l'URL d'une race
     */
    private function generateRaceUrl(Race $race)
    {
        return route($race->categorie . '.par-race', [
            'lang' => app()->getLocale(),
            'slug' => $race->slug
        ]);
    }
}
