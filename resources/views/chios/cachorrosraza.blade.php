@extends('layouts.app')

@section('title', __('Avisos legais'))

@push('styles')

    <title>Cachorro Beagle - Dulce Mascota En Venta</title>
    @include('pages.style')
    @vite(['resources/css/cachorrosraza.css'])

@endpush

@section('content')

    <div class="brz brz-root__container brz-reset-all brz-root__container-page">
        @include('layouts.partials.navbar.public')

        <section id="ltlhaqxzoeblarrokduunyqtwldpfdlncfdo_ltlhaqxzoeblarrokduunyqtwldpfdlncfdo"
                 class="brz-section brz-css-1n9lki8 brz-css-odpsmd">
            <div class="brz-section__content brz-section--fullWidth brz-css-4gngvf brz-css-cqqdo0"
                 data-brz-custom-id="rzsygsieciuzhgjanunddjlnqxaocfyjzgpk">
                <div class="brz-bg">
                    <div class="brz-bg-color"></div>
                    <div class="brz-bg-shape brz-bg-shape__top"></div>
                    <div class="brz-bg-shape brz-bg-shape__bottom"></div>
                </div>
                <div class="brz-container brz-css-ysn7u8 brz-css-k7a7t7">
                    <div id="" class="brz-css-1ulcrds brz-css-3xs40p brz-wrapper">
                        <div class="brz-rich-text brz-rich-text__custom brz-css-vqm1om brz-css-okdzvu"
                             data-brz-custom-id="kDeePsojQlbq">
                            <div data-brz-translate-text="1"><p data-generated-css="brz-css-jDOhI" data-uniq-id="spodJ"
                                                                class="brz-text-lg-center brz-tp-lg-empty brz-ff-comfortaa brz-ft-google brz-fs-lg-46 brz-fss-lg-px brz-fw-lg-700 brz-ls-lg-m_1_5 brz-lh-lg-1_3 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-eWxyk">
                                    <span style="color: rgba(var(--brz-global-color8),1);" class="brz-cp-color8">Cachorros Disponibles</span>
                                </p></div>
                        </div>
                    </div>
                    <div class="dogs-grid-wrapper">
                        <div class="dogs-grid-container">
                            <div class="dogs-grid">
                                @foreach($cachorros as $cachorro)
                                    <div class="dog-card">
                                        <!-- Image du chien -->
                                        <div class="dog-image-wrapper">
                                            <a href="{{ route('cachorros.show', ['lang' => app()->getLocale(), 'slug' => $cachorro['slug'] ?? '']) }}"
                                               class="dog-image-link">
                                                @if(!empty($cachorro['imagenes'][0]))
                                                    <picture>
                                                        <source srcset="{{ asset($cachorro['imagenes'][1] ?? $cachorro['imagenes'][0]) }} 1x"
                                                                media="(min-width: 992px)">
                                                        <source srcset="{{ asset($cachorro['imagenes'][2] ?? $cachorro['imagenes'][0]) }} 1x"
                                                                media="(min-width: 768px)">
                                                        <img decoding="async"
                                                             class="dog-image"
                                                             src="{{ asset($cachorro['imagenes'][0]) }}"
                                                             loading="lazy"
                                                             alt="{{ $cachorro['nombre'] ?? '' }}"
                                                             title="{{ $cachorro['nombre'] ?? '' }}">
                                                    </picture>
                                                @else
                                                    <div class="dog-image-placeholder">
                                                        <span>{{ $cachorro['nombre'][0] ?? '🐕' }}</span>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>

                                        <!-- Informations du chien -->
                                        <div class="dog-info">
                                            <h3 class="dog-name">
                                                <a href="{{ route('cachorros.show', ['lang' => app()->getLocale(), 'slug' => $cachorro['slug'] ?? '']) }}">
                                                    {{ $cachorro['nombre'] ?? '' }}
                                                </a>
                                            </h3>

                                            <div class="dog-breed">
                                                <span class="breed-badge">{{ $cachorro['raza'] ?? '' }}</span>
                                            </div>

                                            <div class="dog-features">
                                                <p class="dog-feature-text">
                                                    <a href="{{ route('cachorros.show', ['lang' => app()->getLocale(), 'slug' => $cachorro['slug'] ?? '']) }}">
                                                        <strong>{{ __('puppy.vaccinated_chipped_dewormed') }}</strong>
                                                    </a>
                                                </p>
                                            </div>

                                            <!-- Bouton d'action -->
                                            <a class="dog-details-btn"
                                               href="{{ route('cachorros.show', ['lang' => app()->getLocale(), 'slug' => $cachorro['slug'] ?? '']) }}">

                                                <span>{{ __('puppy.buy_reserve_now') }}</span>
                                                <svg class="brz-icon-svg align-[initial] brz-css-s9vtaz brz-css-1d8crnm">
                                                    <use href="/wp-content/plugins/brizy/public/editor-build/prod/editor/icons/glyph/paw.svg#nc_icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination - Vérification pour un tableau -->
                            @if(is_object($cachorros) && method_exists($cachorros, 'links'))
                                <div class="pagination-wrapper">
                                    {{ $cachorros->links('vendor.pagination.custom') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <style>
                        /* Styles de base */
                        .dogs-grid-wrapper {
                            width: 100%;
                            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
                        }

                        .dogs-grid-container {
                            max-width: 1400px;
                            margin: 0 auto;
                            padding: 1rem;
                        }

                        /* Grille responsive - 2 colonnes sur mobile par défaut */
                        .dogs-grid {
                            display: grid;
                            gap: 1rem;
                            grid-template-columns: repeat(2, 1fr);
                        }

                        /* Cartes */
                        .dog-card {
                            background: white;
                            border-radius: 16px;
                            overflow: hidden;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                            transition: all 0.3s ease;
                            border: 1px solid #f0f0f0;
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                        }

                        .dog-card:hover {
                            transform: translateY(-4px);
                            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                        }

                        /* Image */
                        .dog-image-wrapper {
                            position: relative;
                            padding-top: 100%; /* Ratio carré 1:1 pour uniformité */
                            overflow: hidden;
                            background: #f8f8f8;
                        }

                        .dog-image-link {
                            display: block;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            top: 0;
                            left: 0;
                        }

                        .dog-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.5s ease;
                        }

                        .dog-card:hover .dog-image {
                            transform: scale(1.1);
                        }

                        /* Placeholder */
                        .dog-image-placeholder {
                            width: 100%;
                            height: 100%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            color: white;
                            font-size: 2.5rem;
                            font-weight: 600;
                        }

                        /* Informations */
                        .dog-info {
                            padding: 1rem;
                            flex: 1;
                            display: flex;
                            flex-direction: column;
                        }

                        .dog-name {
                            font-size: 1rem;
                            font-weight: 700;
                            margin: 0 0 0.5rem 0;
                            line-height: 1.3;
                        }

                        .dog-name a {
                            color: #1f2937;
                            text-decoration: none;
                            transition: color 0.3s ease;
                        }

                        .dog-name a:hover {
                            color: #667eea;
                        }

                        .dog-breed {
                            margin-bottom: 0.5rem;
                        }

                        .breed-badge {
                            display: inline-block;
                            padding: 0.2rem 0.6rem;
                            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
                            color: #667eea;
                            font-size: 0.7rem;
                            font-weight: 600;
                            border-radius: 10px;
                            border: 1px solid rgba(102, 126, 234, 0.2);
                        }

                        .dog-features {
                            margin: 0.5rem 0 1rem 0;
                            flex: 1;
                        }

                        .dog-feature-text {
                            margin: 0;
                            font-size: 0.8rem;
                            line-height: 1.4;
                        }

                        .dog-feature-text a {
                            color: #6b7280;
                            text-decoration: none;
                            transition: color 0.3s ease;
                        }

                        .dog-feature-text a:hover {
                            color: #667eea;
                        }

                        .dog-details-btn {
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            gap: 0.5rem;
                            padding: 0.6rem 1rem;
                            background: linear-gradient(135deg, rgb(251, 139, 67) 0%, rgb(251, 139, 67) 100%);
                            color: white;
                            border: none;
                            border-radius: 10px;
                            font-size: 0.8rem;
                            font-weight: 600;
                            text-decoration: none;
                            transition: all 0.3s ease;
                            cursor: pointer;
                            margin-top: auto;
                            width: 100%;
                            box-shadow: 0 4px 12px rgba(251, 139, 67, 0.3);
                            min-width: 0;
                        }

                        /* Option avec un dégradé orange si vous préférez */
                        .dog-details-btn.orange-gradient {
                            background: linear-gradient(135deg, rgb(251, 139, 67) 0%, rgb(231, 119, 47) 100%);
                        }

                        /* Option avec une seule couleur */
                        .dog-details-btn.orange-solid {
                            background: rgb(251, 139, 67);
                        }

                        /* Ombre adaptée à la couleur orange */
                        .dog-details-btn:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 6px 16px rgba(251, 139, 67, 0.4);
                        }

                        /* Icône qui ne rétrécit pas */
                        .btn-icon {
                            flex-shrink: 0;
                            width: 18px;
                            height: 18px;
                        }

                        /* Mobile */
                        @media screen and (max-width: 640px) {
                            .dog-details-btn {
                                font-size: 0.7rem;
                                padding: 0.5rem 0.75rem;
                                gap: 0.4rem;
                            }

                            .btn-icon {
                                width: 16px;
                                height: 16px;
                            }
                        }

                        /* Très petits mobiles */
                        @media screen and (max-width: 380px) {
                            .dog-details-btn {
                                font-size: 0.6rem;
                                padding: 0.4rem 0.6rem;
                                gap: 0.25rem;
                            }

                            .btn-icon {
                                width: 14px;
                                height: 14px;
                            }
                        }

                        /* Option alternative: passer en colonne sur très petit */
                        @media screen and (max-width: 340px) {
                            .dog-details-btn {
                                flex-direction: column;
                                gap: 0.15rem;
                                padding: 0.5rem 0.25rem;
                            }

                            .dog-details-btn span {
                                white-space: normal;
                                text-overflow: clip;
                                font-size: 0.55rem;
                            }
                        }

                        .btn-icon {
                            transition: transform 0.3s ease;
                        }

                        .dog-details-btn:hover .btn-icon {
                            transform: translateX(3px);
                        }

                        /* Pagination */
                        .pagination-wrapper {
                            margin-top: 2.5rem;
                            text-align: center;
                        }

                        /* Tablettes (≥ 768px) */
                        @media screen and (min-width: 768px) {
                            .dogs-grid-container {
                                padding: 2rem;
                            }

                            .dogs-grid {
                                gap: 1.5rem;
                            }

                            .dog-info {
                                padding: 1.25rem;
                            }

                            .dog-name {
                                font-size: 1.2rem;
                            }

                            .breed-badge {
                                font-size: 0.8rem;
                                padding: 0.25rem 0.75rem;
                            }

                            .dog-feature-text {
                                font-size: 0.9rem;
                            }

                            .dog-details-btn {
                                padding: 0.75rem 1.25rem;
                                font-size: 0.9rem;
                            }
                        }

                        /* Desktop (≥ 1024px) */
                        @media screen and (min-width: 1024px) {
                            .dogs-grid {
                                grid-template-columns: repeat(3, 1fr);
                                gap: 2rem;
                            }
                        }

                        /* Grands écrans (≥ 1280px) */
                        @media screen and (min-width: 1280px) {
                            .dogs-grid {
                                grid-template-columns: repeat(4, 1fr);
                                gap: 2rem;
                            }

                            .dog-info {
                                padding: 1.5rem;
                            }
                        }

                        /* Très petits écrans (≤ 360px) */
                        @media screen and (max-width: 360px) {
                            .dogs-grid {
                                gap: 0.75rem;
                            }

                            .dog-info {
                                padding: 0.75rem;
                            }

                            .dog-name {
                                font-size: 0.9rem;
                            }

                            .dog-details-btn {
                                padding: 0.5rem 0.75rem;
                                font-size: 0.75rem;
                            }
                        }

                        /* Animations */
                        @keyframes fadeInUp {
                            from {
                                opacity: 0;
                                transform: translateY(20px);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        .dog-card {
                            animation: fadeInUp 0.5s ease forwards;
                            opacity: 0;
                        }

                        .dog-card:nth-child(1) { animation-delay: 0.1s; }
                        .dog-card:nth-child(2) { animation-delay: 0.2s; }
                        .dog-card:nth-child(3) { animation-delay: 0.3s; }
                        .dog-card:nth-child(4) { animation-delay: 0.4s; }
                        .dog-card:nth-child(5) { animation-delay: 0.5s; }
                        .dog-card:nth-child(6) { animation-delay: 0.6s; }
                        .dog-card:nth-child(7) { animation-delay: 0.7s; }
                        .dog-card:nth-child(8) { animation-delay: 0.8s; }

                        /* Accessibilité */
                        .dog-details-btn:focus,
                        .dog-name a:focus {
                            outline: 2px solid #667eea;
                            outline-offset: 2px;
                        }

                        /* Support pour réduire les animations */
                        @media (prefers-reduced-motion: reduce) {
                            .dog-card,
                            .dog-image,
                            .dog-details-btn,
                            .btn-icon {
                                animation: none;
                                transition: none;
                            }

                            .dog-card:hover {
                                transform: none;
                            }

                            .dog-card:hover .dog-image {
                                transform: none;
                            }
                        }

                        /* Impression */
                        @media print {
                            .dogs-grid-container {
                                padding: 1rem;
                            }

                            .dog-card {
                                box-shadow: none;
                                border: 1px solid #ddd;
                                break-inside: avoid;
                                page-break-inside: avoid;
                            }

                            .dog-details-btn {
                                background: none;
                                border: 1px solid #333;
                                color: #333;
                                box-shadow: none;
                            }

                            .dog-image-placeholder {
                                background: #f0f0f0;
                                color: #333;
                            }
                        }
                    </style>
                </div>
            </div>
        </section>

        @include('layouts.partials.footer.public')

    </div>

@endsection

