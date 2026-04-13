@extends('layouts.app')

@section('title', __('Resultados de búsqueda'))

@push('styles')
    <title>Resultados de búsqueda: {{ $query }} - Centro Cuccioli Milano</title>
    @include('pages.style')
    @vite(['resources/css/venta.css'])
@endpush

@section('content')
    <div class="brz brz-root__container brz-reset-all brz-root__container-page">
        @include('layouts.partials.navbar.public')

        <section class="brz-section">
            <div class="brz-section__content brz-section--boxed">
                <div class="brz-container">
                    <h1>Resultados de búsqueda para: "{{ $query }}"</h1>
                    <p class="search-results-count">{{ $total }} resultado(s) encontrado(s)</p>

                    @if($total > 0)
                        @foreach($resultadosPorRaza as $raza => $cachorros)
                            <div class="race-results" style="margin-bottom: 40px;">
                                <h2>{{ $raza }} ({{ count($cachorros) }})</h2>
                                <div class="products-grid">
                                    @foreach($cachorros as $cachorro)
                                        <div class="product-card">
                                            @if(isset($cachorro['imagenes'][0]))
                                                <img src="{{ $cachorro['imagenes'][0] }}" alt="{{ $cachorro['nombre'] }}">
                                            @endif
                                            <div class="product-info">
                                                <h3>{{ $cachorro['nombre'] }}</h3>
                                                <p class="breed">{{ $cachorro['raza'] }}</p>
                                                @if(isset($cachorro['descripcion']))
                                                    <p class="description">{{ Str::limit($cachorro['descripcion'], 100) }}</p>
                                                @endif
                                                <a href="{{ $cachorro['enlace'] ?? '#' }}" class="view-details-btn">
                                                    Ver detalles
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-results">
                            <p>No se encontraron cachorros para "{{ $query }}".</p>
                            <p>Prueba con otras palabras clave o <a href="{{ route('cachorros.index') }}">ve todos nuestros cachorros</a>.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @include('layouts.partials.footer.public')
    </div>
@endsection
