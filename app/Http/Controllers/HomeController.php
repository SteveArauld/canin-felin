<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function home()
    {
        // Récupération des chiots (races 1-7)
        $chiots = Race::whereIn('id', range(1, 7))
            ->where('is_active', true)
            ->orderBy('nom')
             ->limit(6) 
            ->get();
        
        // Comptage des chiens par race
        $countchiens = Animal::whereIn('race_id', range(1, 7))
            ->select('race_id', DB::raw('count(*) as total'))
            ->groupBy('race_id')
            ->pluck('total', 'race_id');

        // Récupération des chats (races 8-20)
        $chats = Race::whereIn('id', range(8, 20))
            ->where('is_active', true)
            ->orderBy('nom')
            ->limit(6) 
            ->get();
        
        // Comptage des chats par race
        $countchats = Animal::whereIn('race_id', range(8, 20))
            ->select('race_id', DB::raw('count(*) as total'))
            ->groupBy('race_id')
            ->pluck('total', 'race_id');

        // Récupération des perroquets (race 21)
        $perroquets = Race::where('id', 21)
            ->where('is_active', true)
            ->orderBy('nom')
            ->get();
        
        // Comptage des perroquets
        $countperroquets = Animal::where('race_id', 21)
            ->select('race_id', DB::raw('count(*) as total'))
            ->groupBy('race_id')
            ->pluck('total', 'race_id');

        // Récupération d'une image exemple pour chaque race de chien
        $raceImagesChiens = [];
        foreach ($chiots as $raza) {
            $animalExemple = Animal::where('race_id', $raza->id)->first();
            if ($animalExemple && $animalExemple->images) {
                $images = is_string($animalExemple->images) ? json_decode($animalExemple->images, true) : $animalExemple->images;
                $raceImagesChiens[$raza->id] = is_array($images) && !empty($images) ? $images[0] : null;
            } else {
                $raceImagesChiens[$raza->id] = null;
            }
        }

        // Récupération d'une image exemple pour chaque race de chat
        $raceImagesChats = [];
        foreach ($chats as $raza) {
            $animalExemple = Animal::where('race_id', $raza->id)->first();
            if ($animalExemple && $animalExemple->images) {
                $images = is_string($animalExemple->images) ? json_decode($animalExemple->images, true) : $animalExemple->images;
                $raceImagesChats[$raza->id] = is_array($images) && !empty($images) ? $images[0] : null;
            } else {
                $raceImagesChats[$raza->id] = null;
            }
        }

        // Récupération d'une image exemple pour les perroquets
        $raceImagesPerroquets = [];
        foreach ($perroquets as $raza) {
            $animalExemple = Animal::where('race_id', $raza->id)->first();
            if ($animalExemple && $animalExemple->images) {
                $images = is_string($animalExemple->images) ? json_decode($animalExemple->images, true) : $animalExemple->images;
                $raceImagesPerroquets[$raza->id] = is_array($images) && !empty($images) ? $images[0] : null;
            } else {
                $raceImagesPerroquets[$raza->id] = null;
            }
        }

        return view('home', compact(
            'chiots', 
            'chats', 
            'perroquets',
            'countchiens', 
            'countchats', 
            'countperroquets',
            'raceImagesChiens',
            'raceImagesChats',
            'raceImagesPerroquets'
        ));
    }


    public function quiSommesNous(){
        return view('pages.quienes');
    }

    public function livraisonChiots(){
        return view('pages.envio');
    }

    public function garantieSanitaire(){
        return view('pages.garantia');
    }

    public function references(){
        return view('pages.referencias');
    }

    public function contact(){
        return view('pages.contacto');
    }

    public function politiqueRetour(){
        return view('pages.devoluciones');
    }

     public function politiqueConfidentialite(){
        return view('pages.privacidad');
    }

}
