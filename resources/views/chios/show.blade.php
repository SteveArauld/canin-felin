@extends('layouts.app')

@section('title', __('legal.title'))

@push('styles')
    @include('pages.style')
    @vite(['resources/css/contacto.css'])
    @vite(['resources/css/show.css'])
    
    <style>
        /* Toast Notification System */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 380px;
            width: 100%;
            animation: slideInRight 0.3s ease-out;
        }
        
        .toast {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            margin-bottom: 12px;
            overflow: hidden;
            animation: slideIn 0.3s ease-out;
            transition: all 0.3s ease;
        }
        
        .toast:hover {
            transform: translateX(-5px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.15);
        }
        
        .toast-success {
            border-left: 4px solid #10b981;
        }
        
        .toast-error {
            border-left: 4px solid #ef4444;
        }
        
        .toast-warning {
            border-left: 4px solid #f59e0b;
        }
        
        .toast-info {
            border-left: 4px solid #3b82f6;
        }
        
        .toast-content {
            display: flex;
            align-items: flex-start;
            padding: 16px;
            gap: 12px;
        }
        
        .toast-icon {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }
        
        .toast-success .toast-icon {
            background: #10b981;
            color: white;
        }
        
        .toast-error .toast-icon {
            background: #ef4444;
            color: white;
        }
        
        .toast-warning .toast-icon {
            background: #f59e0b;
            color: white;
        }
        
        .toast-info .toast-icon {
            background: #3b82f6;
            color: white;
        }
        
        .toast-message {
            flex: 1;
            font-size: 14px;
            line-height: 1.5;
            color: #1f2937;
        }
        
        .toast-message strong {
            display: block;
            margin-bottom: 4px;
            font-size: 15px;
        }
        
        .toast-close {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            cursor: pointer;
            color: #9ca3af;
            font-size: 18px;
            line-height: 1;
            transition: color 0.2s;
            background: none;
            border: none;
            padding: 0;
        }
        
        .toast-close:hover {
            color: #4b5563;
        }
        
        .toast-progress {
            height: 3px;
            background: rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        
        .toast-success .toast-progress-bar {
            height: 100%;
            background: #10b981;
            animation: progress 5s linear forwards;
        }
        
        .toast-error .toast-progress-bar {
            height: 100%;
            background: #ef4444;
            animation: progress 5s linear forwards;
        }
        
        .toast-warning .toast-progress-bar {
            height: 100%;
            background: #f59e0b;
            animation: progress 5s linear forwards;
        }
        
        .toast-info .toast-progress-bar {
            height: 100%;
            background: #3b82f6;
            animation: progress 5s linear forwards;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes progress {
            from {
                width: 100%;
            }
            to {
                width: 0%;
            }
        }
        
        /* Animation de sortie */
        .toast-exit {
            animation: slideOutRight 0.3s ease-out forwards;
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .toast-notification {
                left: 20px;
                right: 20px;
                max-width: none;
                top: 10px;
            }
        }
        
        /* Style pour les messages d'erreur/succès existants */
        .alert {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="brz brz-root__container brz-reset-all brz-root__container-page">
        @include('layouts.partials.navbar.public')

        <!-- Toast Notification Container -->
        <div id="toast-container" class="toast-notification"></div>

        <section id="it5ZqxrL_Ma2_it5ZqxrL_Ma2" class="brz-section brz-css-sipr1f brz-css-68nc76">
            <div class="brz-section__content brz-section--boxed brz-css-gtvn49 brz-css-1b6knpt"
                 data-brz-custom-id="aOAcKrWLNhRQ">
                <div class="brz-bg">
                    <div class="brz-bg-color"></div>
                    <div class="brz-bg-shape brz-bg-shape__top"></div>
                    <div class="brz-bg-shape brz-bg-shape__bottom"></div>
                </div>
                <div class="brz-container brz-css-1e4tlw1 brz-css-14oksm5">
                    <div class="brz-row__container brz-css-1aa16mz brz-css-14hdk3x" data-brz-custom-id="eeKmXqpQUhmC">
                        <div class="brz-row brz-css-130imwm brz-css-1dljn8f brz-css-yxf2as">
                            <div class="brz-columns brz-css-1tudti1 brz-css-mrd97t" data-brz-custom-id="i5Bdv_KWJQO1">
                                <div class="brz-bg">
                                    <div class="brz-bg-color"></div>
                                </div>
                                <div class="brz-column__items brz-css-15wp8cn brz-css-1b8kqaj">
                                    <div id="" class="brz-css-1n92flo brz-css-7w9e5w brz-wrapper">
                                        <div
                                            class="brz-woo-gallery brz-woo-gallery__style-bottom brz-woo-gallery__thumbsTB-4 brz-css-pvawtk brz-css-ajfdo7"
                                            data-brz-custom-id="dBUz1CUEQA8r">
                                            <div style="min-height:20px">
                                                <div
                                                    class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                    data-columns="4"
                                                    style="opacity: 1; transition: opacity 0.25s ease-in-out;">
                                                    <div class="woocommerce-product-gallery__wrapper">
                                                        @if(isset($cachorro['imagenes']) && count($cachorro['imagenes']) > 0)
                                                            @php
                                                                $imagen = $cachorro['imagenes'][0];
                                                            @endphp
                                                            <div
                                                                data-thumb="{{ $imagen }}"
                                                                data-thumb-alt="{{ $cachorro['nombre'] }}"
                                                                class="woocommerce-product-gallery__image">
                                                                <a href="{{ $imagen }}">
                                                                    <img fetchpriority="high" decoding="async" width="600"
                                                                         height="750"
                                                                         src="{{ asset($imagen )}}"
                                                                         class="wp-post-image"
                                                                         alt="{{ $cachorro['nombre'] }}"
                                                                         data-caption=""
                                                                         data-src="{{ $imagen }}"
                                                                         data-large_image="{{ $imagen }}"
                                                                         data-large_image_width="1440"
                                                                         data-large_image_height="1800">
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="brz-columns brz-css-1tudti1 brz-css-10rxgm3" data-brz-custom-id="anpMKj3HsVbt">
                                <div class="brz-column__items brz-css-15wp8cn brz-css-un9e4">
                                    <div class="brz-row__container brz-css-1aa16mz brz-css-2zyr03"
                                         data-brz-custom-id="kd5c0zJpEdPT">
                                        <div
                                            class="brz-row brz-row--inner brz-css-130imwm brz-css-1dljn8f brz-css-1c6a61b">
                                            <div class="brz-columns brz-css-1tudti1 brz-css-k1gtjn"
                                                 data-brz-custom-id="pjhPMyd3RlHH">
                                                <div class="brz-column__items brz-css-15wp8cn brz-css-18xlmya">
                                                    <div id="" class="brz-css-1n92flo brz-css-1pqcon3 brz-wrapper">
                                                        <div class="brz-wp-title brz-css-1rol6nx brz-css-mp3a22"
                                                             data-brz-custom-id="pGwixYbJ7dm0">
                                            <span class="brz-wp-title-content" style="min-height:20px">
                                                {{ $cachorro['nombre'] }}
                                            </span>
                                                        </div>
                                                    </div>
                                                    <div id="" class="brz-css-1n92flo brz-css-10cs28o brz-wrapper">
                                                        <div
                                                            class="brz-rich-text brz-rich-text__custom brz-css-1bs9p3o brz-css-1pkl4oo"
                                                            data-brz-custom-id="m5clm0D6FiOm">
                                                            <div data-brz-translate-text="1">
                                                                <p class="brz-text-lg-center brz-fs-xs-15 brz-tp-xs-empty brz-lh-sm-1_6 brz-lh-xs-1_6 brz-fs-sm-15 brz-fw-sm-400 brz-fw-xs-400 brz-ls-sm-1 brz-ls-xs-1 brz-fss-xs-px brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0_5 brz-lh-lg-1_9 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-css-oq1rJ"
                                                                   data-generated-css="brz-css-kkHiT"
                                                                   data-uniq-id="eR5BA">
                                                                    <strong style="color: rgba(var(--brz-global-color8),1);"
                                                                            class="brz-cp-color8 brz-bold-true">
                                                                        <span class="text-population">{{ $cachorro['raza'] }}</span>
                                                                    </strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="" class="brz-css-1n92flo brz-css-sswmq1 brz-wrapper">
                                        <div class="brz-rich-text brz-rich-text__custom brz-css-1bs9p3o brz-css-17wlqkq"
                                             data-brz-custom-id="crAU5vTCZvwz">
                                            <div data-brz-translate-text="1">
                                                <p class="brz-fsft-lg-0 brz-fwdth-lg-100 brz-vfw-lg-400 brz-lh-lg-1_9 brz-ls-lg-0 brz-fw-lg-700 brz-fss-lg-px brz-fs-lg-29 brz-ft-google brz-ff-overpass brz-tp-lg-empty brz-css-xeT9R"
                                                   data-generated-css="brz-css-nXLKN" data-uniq-id="xa77w">
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="" class="brz-css-1n92flo brz-css-19gweml brz-wrapper">
                                        <div class="brz-rich-text brz-rich-text__custom brz-css-1bs9p3o brz-css-jaj7pv"
                                             data-brz-custom-id="hL189v1oSp0b">
                                            <div data-brz-translate-text="1">
                                                <p class="brz-fsft-xs-0 brz-fwdth-xs-100 brz-vfw-xs-400 brz-lh-xs-1_6 brz-ls-xs-0 brz-fss-xs-px brz-fs-xs-17 brz-tp-xs-empty brz-lh-sm-1_6 brz-fs-sm-15 brz-ls-sm-0 brz-fw-sm-400 brz-text-lg-center brz-fw-xs-700 brz-fss-lg-px brz-fw-lg-700 brz-ls-lg-0 brz-lh-lg-1_9 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-tp-lg-empty brz-ff-lexend_deca brz-ft-google brz-fs-lg-33 brz-css-aG9Ig"
                                                   data-generated-css="brz-css-fjiJh" data-uniq-id="oaOgJ">
                                                    <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.your_new_companion') }}</span>
                                                </p>
                                                <p class="brz-fsft-xs-0 brz-fwdth-xs-100 brz-vfw-xs-400 brz-lh-xs-1_6 brz-ls-xs-0 brz-fss-xs-px brz-fs-xs-17 brz-tp-xs-empty brz-lh-sm-1_6 brz-fs-sm-15 brz-ls-sm-0 brz-fw-sm-400 brz-text-lg-center brz-fw-xs-700 brz-fss-lg-px brz-fw-lg-700 brz-ls-lg-0 brz-lh-lg-1_9 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-tp-lg-empty brz-ff-lexend_deca brz-ft-google brz-fs-lg-25 brz-css-nE9UG"
                                                   data-generated-css="brz-css-xMiDC" data-uniq-id="bU7BQ">
                                                    <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.lovely_healthy_puppies') }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="brz-row__container brz-css-1aa16mz brz-css-1j8mmoq"
                                         data-brz-custom-id="tObSr1_0MUB2">
                                        <div class="brz-row brz-row--inner brz-css-130imwm brz-css-1y6hlbz">
                                            <div class="brz-columns brz-css-1tudti1 brz-css-48xqbe"
                                                 data-brz-custom-id="fhIkEN3wkSyE">
                                                <div class="brz-rich-text brz-rich-text__custom brz-css-1bs9p3o brz-css-bf2q95" data-brz-custom-id="nF0ZU4R7cL0G"><div data-brz-translate-text="1">
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-pnPlD" data-generated-css="brz-css-u8bjl" data-uniq-id="c1zgK">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.imagine_this_puppy') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-nIUdy" data-generated-css="brz-css-rf3wZ" data-uniq-id="op5Pa">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.imagine_your_new_puppy') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-qVJbk" data-generated-css="brz-css-z0icP" data-uniq-id="hHpzQ"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-dqfZX" data-generated-css="brz-css-kuPTw" data-uniq-id="fF5dA">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.why_best_option') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-nD3LB" data-generated-css="brz-css-egOjF" data-uniq-id="c92l_"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-lrhaW" data-generated-css="brz-css-oVZlj" data-uniq-id="ga6Od">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.impeccable_health') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-eU1yZ" data-generated-css="brz-css-ivz4Q" data-uniq-id="rGxy2"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-r44qf" data-generated-css="brz-css-fXWjQ" data-uniq-id="eFlA3">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.ethical_breeder') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-lz4G8" data-generated-css="brz-css-nrCAO" data-uniq-id="iuyXn"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-uOWUb" data-generated-css="brz-css-tUXwT" data-uniq-id="lyxCl">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.welcome_package') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-x5keW" data-generated-css="brz-css-iCdzr" data-uniq-id="tKNqD"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-clb3F" data-generated-css="brz-css-gKXQn" data-uniq-id="sHXup">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.permanent_support') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-kWp1x" data-generated-css="brz-css-hZV2k" data-uniq-id="u2Ton"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-wuT0O" data-generated-css="brz-css-cGvOf" data-uniq-id="o4z_U">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.reserve_today') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-bl15U" data-generated-css="brz-css-rz5Zc" data-uniq-id="gQYGb"><br></p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-wLFO4" data-generated-css="brz-css-wx2yB" data-uniq-id="tbu0h">
                                                        <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.ready_to_meet') }}</span>
                                                    </p>
                                                    <p class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-mg5Ph" data-generated-css="brz-css-kth7j" data-uniq-id="gY1Cb"><br></p>
                                                    <ul>
                                                        <li class="brz-text-xs-center brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-20 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0 brz-lh-lg-1_5 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-bcp-color8 brz-css-movgR" data-generated-css="brz-css-cyPLo" data-uniq-id="kNkMj" style="color: rgba(var(--brz-global-color8),1);">
                                                            <span class="brz-cp-color8" style="color: rgba(var(--brz-global-color8),1);">{{ __('puppy.hurry_message') }}</span>
                                                        </li>
                                                    </ul>
                                                </div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="u3we0xmGreV9_u3we0xmGreV9" class="brz-section brz-css-u04mp6 brz-css-1ne98t4">
            <div class="brz-section__content brz-section--boxed brz-css-1ymvyj5 brz-css-14g43d3"
                 data-brz-custom-id="qO7RT3JZnOCi">
                <div class="brz-container brz-css-xjz3jo brz-css-1xm1g2s">
                    <div id="" class="brz-css-1vsnqqu brz-css-1bixs69 brz-wrapper">
                        <div class="brz-rich-text brz-rich-text__custom brz-css-51enc6 brz-css-1szqbc"
                             data-brz-custom-id="wKZuGpNVt3b_">
                            <div data-brz-translate-text="1">
                                <p class="brz-fs-xs-13 brz-tp-xs-empty brz-lh-xs-1_6 brz-ls-xs-0 brz-fw-xs-400 brz-fss-xs-px brz-lh-sm-1_6 brz-fs-sm-15 brz-fw-sm-400 brz-ls-sm-1 brz-tp-lg-empty brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-16 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0_5 brz-lh-lg-1 brz-text-lg-center brz-css-kzg83"
                                   data-generated-css="brz-css-rL7Kb" data-uniq-id="lbQbf"><br></p>
                                <h3 class="brz-tp-lg-heading3 brz-lh-sm-1_6 brz-fs-sm-15 brz-fw-sm-400 brz-ls-sm-1 brz-ff-barlow_semi_condensed brz-ft-google brz-fs-lg-16 brz-fss-lg-px brz-fw-lg-400 brz-ls-lg-0_5 brz-lh-lg-1 brz-text-lg-center brz-fss-xs-px brz-fw-xs-700 brz-ls-xs-m_0_5 brz-lh-xs-1_3 brz-vfw-xs-400 brz-fwdth-xs-100 brz-fsft-xs-0 brz-tp-xs-empty brz-fs-xs-21 brz-css-lNEEo"
                                    data-generated-css="brz-css-rvAvK" data-uniq-id="yQQUS">
                                    <span style="color: rgb(0, 116, 249);">{{ __('order.fill_data_to_buy') }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    {{-- Messages de succès/erreur cachés pour être affichés en toast --}}
                    @if(session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                showToast('success', '✓ {{ __('order.success_title') }}', '{{ session('success') }}');
                            });
                        </script>
                    @endif

                    @if($errors->any())
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                @foreach($errors->all() as $error)
                                    showToast('error', '⚠️ {{ __('order.error_title') }}', '{{ addslashes($error) }}');
                                @endforeach
                            });
                        </script>
                    @endif

                    <div id="" class="brz-css-1vsnqqu brz-css-p42jaw brz-wrapper">
                        <div class="brz-wp-shortcode brz-css-12qir1d brz-css-1rlewbp" data-brz-custom-id="oHrDkq3AQq0_">
                            <div>
                                <form id="order-form" method="POST" action="{{ route('order.process', ['lang' => app()->getLocale(),  'slug' => __($cachorro['slug']) ]) }}"
                                      class="wpforms-container wpforms-container-full wpforms-render-modern">
                                    @csrf

                                    <div class="wpforms-field-container">
                                        {{-- Nombre completo --}}
                                        <div id="nombre-container" class="wpforms-field wpforms-field-text" data-field-type="text">
                                            <label class="wpforms-field-label" for="nombre">
                                                {{ __('order.full_name') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="text" id="nombre" class=""
                                                   name="nombre" value="{{ old('nombre') }}" required>
                                        </div>

                                        {{-- Raza del cachorro --}}
                                        <div id="raza_cachorro-container" class="wpforms-field wpforms-field-text" data-field-type="text">
                                            <label class="wpforms-field-label" for="raza_cachorro">
                                                {{ __('order.puppy_breed') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="text" id="raza_cachorro" class=""
                                                   name="raza_cachorro" value="{{ $cachorro['raza'] }}" required readonly>
                                        </div>

                                        {{-- Nombre del cachorro --}}
                                        <div id="nombre_cachorro-container" class="wpforms-field wpforms-field-text" data-field-type="text">
                                            <label class="wpforms-field-label" for="nombre_cachorro">
                                                {{ __('order.puppy_name') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="text" id="nombre_cachorro" class=""
                                                   name="nombre_cachorro" value="{{ old('nombre_cachorro', $cachorro['nombre']) }}" required>
                                        </div>

                                        {{-- Email --}}
                                        <div id="email-container" class="wpforms-field wpforms-field-email" data-field-type="email">
                                            <label class="wpforms-field-label" for="email">
                                                {{ __('order.email') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="email" id="email" class=""
                                                   name="email" value="{{ old('email') }}" required>
                                        </div>

                                        {{-- WhatsApp --}}
                                        <div id="whatsapp-container" class="wpforms-field wpforms-field-number" data-field-type="number">
                                            <label class="wpforms-field-label" for="whatsapp">
                                                {{ __('order.whatsapp_number') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="tel" id="whatsapp" class=""
                                                   name="whatsapp" value="{{ old('whatsapp') }}" required>
                                        </div>

                                        {{-- Ciudad --}}
                                        <div id="ciudad-container" class="wpforms-field wpforms-field-text" data-field-type="text">
                                            <label class="wpforms-field-label" for="ciudad">
                                                {{ __('order.city_region') }}
                                                <span class="wpforms-required-label" aria-hidden="true">*</span>
                                            </label>
                                            <input type="text" id="ciudad" class=""
                                                   name="ciudad" value="{{ old('ciudad') }}" required>
                                        </div>

                                        {{-- Comentario --}}
                                        <div id="comentario-container" class="wpforms-field wpforms-field-textarea" data-field-type="textarea">
                                            <label class="wpforms-field-label" for="comentario">
                                                {{ __('order.comment') }}
                                            </label>
                                            <textarea id="comentario" class=""
                                                      name="comentario">{{ old('comentario') }}</textarea>
                                        </div>

                                        {{-- Champs cachés pour référence --}}
                                        <input type="hidden" name="slug_cachorro" value="{{ __($cachorro['slug'])  }}">
                                        <input type="hidden" name="imagen_cachorro" value="{{ !empty($cachorro['imagenes']) ? $cachorro['imagenes'][0] : '' }}">
                                    </div>

                                    <div class="wpforms-submit-container">
                                        <button type="submit" class="wpforms-submit" id="submit-order">
                                            {{ __('order.submit_order') }}
                                        </button>
                                        <div id="loading-spinner" style="display: none; text-align: center; margin-top: 10px;">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjYiIGhlaWdodD0iMjYiIHZpZXdCb3g9IjAgMCAyNiAyNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSIxMyIgY3k9IjEzIiByPSIxMCIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1kYXNoYXJyYXk9IjE1LDIwIiBzdHJva2UtbGluZWNhcD0icm91bmQiPjxhbmltYXRlVHJhbnNmb3JtIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIgdHlwZT0icm90YXRlIiBmcm9tPSIwIDEzIDEzIiB0bz0iMzYwIDEzIDEzIiBkdXI9IjFzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIvPjwvY2lyY2xlPjwvc3ZnPgo="
                                                 alt="{{ __('common.loading') }}" width="26" height="26">
                                            <p>{{ __('order.processing') }}</p>
                                        </div>
                                    </div>
                                </form>

                                {{-- JavaScript pour les toasts --}}
                                <script>
                                    // Fonction pour afficher les toasts
                                    function showToast(type, title, message) {
                                        const container = document.getElementById('toast-container');
                                        if (!container) return;
                                        
                                        const toastId = 'toast_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
                                        
                                        const icons = {
                                            success: '✓',
                                            error: '✗',
                                            warning: '⚠',
                                            info: 'ℹ'
                                        };
                                        
                                        const titles = {
                                            success: title || '{{ __("order.success_title") }}',
                                            error: title || '{{ __("order.error_title") }}',
                                            warning: title || '{{ __("order.warning_title") }}',
                                            info: title || '{{ __("order.info_title") }}'
                                        };
                                        
                                        const toast = document.createElement('div');
                                        toast.className = `toast toast-${type}`;
                                        toast.id = toastId;
                                        toast.innerHTML = `
                                            <div class="toast-content">
                                                <div class="toast-icon">${icons[type]}</div>
                                                <div class="toast-message">
                                                    <strong>${titles[type]}</strong>
                                                    <span>${message}</span>
                                                </div>
                                                <button class="toast-close" onclick="closeToast('${toastId}')">×</button>
                                            </div>
                                            <div class="toast-progress">
                                                <div class="toast-progress-bar"></div>
                                            </div>
                                        `;
                                        
                                        container.appendChild(toast);
                                        
                                        // Auto-close après 5 secondes
                                        setTimeout(() => {
                                            closeToast(toastId);
                                        }, 5000);
                                    }
                                    
                                    // Fonction pour fermer un toast
                                    function closeToast(toastId) {
                                        const toast = document.getElementById(toastId);
                                        if (toast) {
                                            toast.classList.add('toast-exit');
                                            setTimeout(() => {
                                                if (toast && toast.parentNode) {
                                                    toast.remove();
                                                }
                                            }, 300);
                                        }
                                    }
                                    
                                    // Validation côté client avec toasts
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const form = document.getElementById('order-form');
                                        const emailInput = document.getElementById('email');
                                        const whatsappInput = document.getElementById('whatsapp');
                                        const nombreInput = document.getElementById('nombre');
                                        const ciudadInput = document.getElementById('ciudad');
                                        
                                        // Supprimer les anciens messages d'erreur inline
                                        const errorSpans = document.querySelectorAll('.error-message');
                                        errorSpans.forEach(span => span.remove());
                                        
                                        // Validation email
                                        if (emailInput) {
                                            emailInput.addEventListener('blur', function() {
                                                const email = this.value;
                                                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                
                                                if (email && !emailRegex.test(email)) {
                                                    this.style.borderColor = 'red';
                                                    showToast('error', '{{ __("validation.email_invalid_title") }}', '{{ __("validation.valid_email") }}');
                                                } else {
                                                    this.style.borderColor = '';
                                                }
                                            });
                                        }
                                        
                                        // Validation whatsapp (au moins 9 chiffres)
                                        if (whatsappInput) {
                                            whatsappInput.addEventListener('blur', function() {
                                                const whatsapp = this.value.replace(/\D/g, '');
                                                if (whatsapp && whatsapp.length < 9) {
                                                    this.style.borderColor = 'red';
                                                    showToast('warning', '{{ __("validation.whatsapp_invalid_title") }}', '{{ __("validation.whatsapp_min_digits") }}');
                                                } else {
                                                    this.style.borderColor = '';
                                                }
                                            });
                                        }
                                        
                                        // Validation formulaire avant soumission
                                        if (form) {
                                            form.addEventListener('submit', function(e) {
                                                let hasError = false;
                                                
                                                // Vérifier les champs requis
                                                const requiredFields = ['nombre', 'email', 'whatsapp', 'ciudad', 'nombre_cachorro', 'raza_cachorro'];
                                                requiredFields.forEach(fieldId => {
                                                    const field = document.getElementById(fieldId);
                                                    if (field && !field.value.trim()) {
                                                        field.style.borderColor = 'red';
                                                        hasError = true;
                                                    } else if (field) {
                                                        field.style.borderColor = '';
                                                    }
                                                });
                                                
                                                // Vérifier email
                                                if (emailInput && emailInput.value) {
                                                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                    if (!emailRegex.test(emailInput.value)) {
                                                        emailInput.style.borderColor = 'red';
                                                        hasError = true;
                                                        showToast('error', '{{ __("validation.email_invalid_title") }}', '{{ __("validation.valid_email") }}');
                                                    }
                                                }
                                                
                                                if (hasError) {
                                                    e.preventDefault();
                                                    showToast('error', '{{ __("validation.form_incomplete_title") }}', '{{ __("validation.fill_required_fields") }}');
                                                    return false;
                                                }
                                                
                                                // Afficher le spinner
                                                const submitBtn = document.getElementById('submit-order');
                                                const loadingSpinner = document.getElementById('loading-spinner');
                                                if (submitBtn && loadingSpinner) {
                                                    submitBtn.disabled = true;
                                                    submitBtn.innerHTML = '{{ __('order.sending') }}';
                                                    loadingSpinner.style.display = 'block';
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.partials.footer.public')
    </div>
@endsection