@extends('layouts.app')

@section('title', __('404'))



@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Image -->
                    <img src="{{asset('assets/images/element/error.svg')}}" class="h-200px h-md-400px mb-4"
                         alt="">
                    <!-- Title -->
                    <h1 class="display-1 text-danger mb-0">404</h1>
                    <!-- Subtitle -->
                    <h2>Oh non, quelque chose s'est mal passé !</h2>
                    <!-- info -->
                    <p class="mb-4">Soit quelque chose s'est mal passé, soit cette page n'existe plus.</p>
                    <!-- Button -->
                    <a href="{{ route('home') }}" class="btn btn-primary mb-0">Ramenez-moi à la page d'accueil</a>
                </div>
            </div>
        </div>
    </section>

@endsection
