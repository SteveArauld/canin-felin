<?php

namespace App\Http\Controllers;

use App\Repositories\CachorroRepositoryf;
use App\Repositories\CachorroRepositoryp;
use App\Repositories\ChiosRepository;
use Illuminate\Http\Request;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;

use Illuminate\Support\Facades\Mail;


class CachorroController extends Controller
{

    public function home()
    {
        $cachorrosp = CachorroRepositoryp::query()->get();
        $cachorrosf = CachorroRepositoryf::query()->get();

        return view('home', compact('cachorrosp','cachorrosf'));
    }
    
    public function show($lang, $slug)
    {
        $cachorro = ChiosRepository::findBySlug($slug);

        if (empty($cachorro)) {
            abort(404);
        }

        return view('chios.show', compact('cachorro'));
    }

    public function cachorrosraza($lang, $slug)
    {
        // Récupérer tous les chiots et convertir en tableau
        $cachorros = ChiosRepository::query()->get()->toArray();
    
        // Fonction pour normaliser une chaîne (enlever les accents, mettre en minuscules, etc.)
        $normalize = function($str) {
            $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str); // Enlever les accents
            $str = strtolower($str); // Mettre en minuscules
            $str = trim($str); // Enlever les espaces au début et à la fin
            return $str;
        };
    
        // Convertir le slug en mots séparés par espace (format 1: "Caniche Cachorro")
        $razaBuscada1 = ucwords(str_replace('-', ' ', $slug));
        
        // Créer le format inversé (format 2: "Cachorro Caniche")
        $razaBuscada2 = implode(' ', array_reverse(explode(' ', $razaBuscada1)));
    
        // Normaliser les deux formats pour la comparaison
        $razaBuscada1Norm = $normalize($razaBuscada1);
        $razaBuscada2Norm = $normalize($razaBuscada2);
    
        // Filtrer les chiots par race (comparaison normalisée)
        $cachorrosFiltrados = array_filter($cachorros, function($cachorro) use ($normalize, $razaBuscada1Norm, $razaBuscada2Norm) {
            $razaNorm = $normalize($cachorro['raza']);
            return $razaNorm === $razaBuscada1Norm || $razaNorm === $razaBuscada2Norm;
        });
    
        if (empty($cachorrosFiltrados)) {
            abort(404, __('controller.race.not_found'));
        }
    
        // Déterminer quel format utiliser pour l'affichage
        $razaParaMostrar = $razaBuscada1;
        $existeFormato1 = false;
        
        foreach ($cachorrosFiltrados as $cachorro) {
            if ($normalize($cachorro['raza']) === $razaBuscada1Norm) {
                $existeFormato1 = true;
                break;
            }
        }
        
        if (!$existeFormato1) {
            $razaParaMostrar = $razaBuscada2;
        }
    
        return view('chios.cachorrosraza', [
            'cachorros' => $cachorrosFiltrados,
            'raza' => $razaParaMostrar
        ]);
    }
    
    public function venta()
    {
        $cachorrosCollection = ChiosRepository::query()->get();

        $razasUnicas = $cachorrosCollection
            ->pluck('raza')
            ->unique()
            ->values()
            ->toArray();

        $cachorrosPaginated = ChiosRepository::query()->paginate(36);

        return view('pages.venta', [
            'cachorros' => $cachorrosPaginated,
            'razasUnicas' => $razasUnicas,
            'cachorrosCollection' => $cachorrosCollection
        ]);
    }

    public function processOrder(OrderRequest $request, $lang, $slug)
    {
        try {
            $orderData = $request->validated();

            $cachorro = ChiosRepository::findBySlug($slug);

            if (empty($cachorro)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => __('controller.cachorro.not_found')]);
            }

            Mail::to($orderData['email'])
                ->send(new OrderConfirmationMail($orderData, $cachorro));

            $adminEmail = env('ADMIN_EMAIL', 'contatto@centrocucciolimilano.it');
            Mail::to($adminEmail)
                ->send(new OrderConfirmationMail($orderData, $cachorro, true));

            return redirect()->back()
                ->with('success', __('controller.order.success'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => __('controller.order.error')]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return redirect()->route('cachorros.index');
        }

        $cachorros = ChiosRepository::query()->get()->toArray();

        $resultados = array_filter($cachorros, function($cachorro) use ($query) {
            $searchInNombre = stripos($cachorro['nombre'] ?? '', $query) !== false;
            $searchInRaza = stripos($cachorro['raza'] ?? '', $query) !== false;
            $searchInDescripcion = stripos($cachorro['descripcion'] ?? '', $query) !== false;

            return $searchInNombre || $searchInRaza || $searchInDescripcion;
        });

        $resultadosPorRaza = [];
        foreach ($resultados as $cachorro) {
            $raza = $cachorro['raza'];
            if (!isset($resultadosPorRaza[$raza])) {
                $resultadosPorRaza[$raza] = [];
            }
            $resultadosPorRaza[$raza][] = $cachorro;
        }

        return view('pages.search-results', [
            'query' => $query,
            'resultados' => $resultados,
            'resultadosPorRaza' => $resultadosPorRaza,
            'total' => count($resultados)
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $cachorros = ChiosRepository::query()->get()->toArray();

        $razasUnicas = [];
        $suggestions = [];

        foreach ($cachorros as $cachorro) {
            $raza = $cachorro['raza'];

            if (stripos($raza, $query) !== false && !in_array($raza, $razasUnicas)) {
                $razasUnicas[] = $raza;

                $count = 0;
                foreach ($cachorros as $c) {
                    if ($c['raza'] === $raza) {
                        $count++;
                    }
                }

                $suggestions[] = [
                    'type' => 'race',
                    'text' => $raza,
                    'count' => $count,
                    'url' => $this->generateRaceUrl($raza)
                ];
            }

            if (stripos($cachorro['nombre'], $query) !== false) {
                $suggestions[] = [
                    'type' => 'cachorro',
                    'text' => $cachorro['nombre'],
                    'raza' => $cachorro['raza'],
                    'imagen' => $cachorro['imagenes'][0] ?? '',
                    'url' => $cachorro['enlace'] ?? '#'
                ];
            }
        }

        $suggestions = array_slice($suggestions, 0, 10);

        return response()->json($suggestions);
    }

    private function generateRaceUrl($raza)
    {
        $slug = strtolower(str_replace(' ', '-', $raza));
        return route('cachorrosraza', ['lang' => app()->getLocale(), 'slug' => $slug]);
    }

    public function raceDetails(Request $request)
    {
        $race = $request->input('race', '');

        $cachorros = ChiosRepository::query()->get()->toArray();

        $cachorrosDeRaza = array_filter($cachorros, function($cachorro) use ($race) {
            return ($cachorro['raza'] ?? '') === $race;
        });

        $formattedResults = [];
        foreach ($cachorrosDeRaza as $cachorro) {
            $formattedResults[] = [
                'nombre' => $cachorro['nombre'] ?? 'Sin nombre',
                'imagenes' => $cachorro['imagenes'] ?? [],
                'enlace' => $cachorro['enlace'] ?? '#',
                'descripcion' => $cachorro['descripcion'] ?? ''
            ];
        }

        return response()->json([
            'race' => $race,
            'cachorros' => $formattedResults,
            'count' => count($cachorrosDeRaza)
        ]);
    }
}