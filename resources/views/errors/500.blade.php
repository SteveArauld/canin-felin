@extends('layouts.app')

@section('title', __('500'))

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="text-center col-12">

                    <!-- Image -->
                    <img src="{{ asset('assets/images/element/error.svg') }}" class="mb-4 h-200px h-md-400px"
                        alt="Erreur 500">

                    <!-- Code erreur -->
                    <h1 class="mb-0 display-1 text-danger">500</h1>

                    <!-- Sous-titre -->
                    <h2>Oups ! Une erreur interne s'est produite.</h2>

                    <!-- Message d'information -->
                    <p class="mb-4">
                        Le serveur a rencontré une erreur inattendue.<br>
                        Veuillez réessayer plus tard ou contacter le support si le problème persiste.
                    </p>

                    <!-- Bouton -->
                    <a href="{{ route('home') }}" class="mb-0 btn btn-primary">Retour à la page d'accueil</a>

                </div>
            </div>
        </div>
    </section>
@endsection
