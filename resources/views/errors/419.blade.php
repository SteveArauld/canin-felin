@extends('layouts.app')

@section('title', __('419'))

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Image -->
                    <img src="{{ asset('assets/images/element/error.svg') }}" class="h-200px h-md-400px mb-4" alt="Erreur 419">

                    <!-- Title -->
                    <h1 class="display-1 text-danger mb-0">419</h1>

                    <!-- Subtitle -->
                    <h2>Votre session a expiré</h2>

                    <!-- Info -->
                    <p class="mb-4">
                        Il semble que votre session ait expiré pour des raisons de sécurité.
                        Veuillez actualiser la page ou vous reconnecter pour continuer.
                    </p>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home me-1"></i> Accueil
                        </a>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary"
                            onclick="event.preventDefault(); location.reload();">
                            <i class="fas fa-sync-alt me-1"></i> Actualiser la page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
