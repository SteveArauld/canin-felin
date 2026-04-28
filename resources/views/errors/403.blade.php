@extends('layouts.app')

@section('title', __('403'))



@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Image -->
                    <img src="{{asset('assets/images/element/error.svg')}}" class="h-200px h-md-400px mb-4"
                         alt="">
                    <!-- Title -->
                    <h1 class="display-1 text-danger mb-0">403</h1>
                    <!-- Subtitle -->
                    <h2>Accès refusé</h2>
                    <!-- info -->
                    <p class="mb-4">Désolé, vous n'avez pas l'autorisation d'accéder à cette page.</p>
                    <!-- Button -->
                    <a href="{{ route('home') }}" class="btn btn-primary mb-0">Ramenez-moi à la page d'accueil</a>
                </div>
            </div>
        </div>
    </section>

@endsection
