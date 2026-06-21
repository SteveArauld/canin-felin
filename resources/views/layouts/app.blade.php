<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trim(View::yieldContent('title') . ' | ' . config('app.name')) }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logo.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons@1.11.3/bootstrap-icons.min.css') }}">


    @stack('styles')

    <style>
        :root {
            --primary-dark: #000000;
            --accent-orange: #fb8b43;
            --text-light: #ffffff;
        }

        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            background-color: #ffffff;
        }
    </style>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5WPBRX6J');
    </script>
    <!-- End Google Tag Manager -->

<body> </body> 
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WPBRX6J"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</head>

<body>
    <!-- Barre de contact (uniquement homepage)
        @if(request()->is('/') || Route::currentRouteName() === 'home')
            <div class="bg-light py-2 border-bottom d-none d-md-block">
                <div class="container">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <a class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center gap-2 py-2"
                               href="https://wa.me/0644695982?text={{ urlencode(__('whatsapp_message')) }}"
                               target="_blank">
                                <i class="bi bi-whatsapp fs-5"></i>
                                <span>WhatsApp: 0644695982</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2 py-2"
                               href="mailto:contact@canin-felin.com">
                                <i class="bi bi-envelope fs-5"></i>
                                <span>contact@canin-felin.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif -->
    @include('layouts.partials.navbar.public')


    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer.public')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>