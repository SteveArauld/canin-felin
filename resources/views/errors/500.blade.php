@extends('layouts.app')

@section('title', 'Erreur serveur - Pattes et Plules')

@push('styles')
    <style>
        .error-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        }

        .error-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }

        .error-number {
            font-size: 8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
        }

        .sleeping-pet {
            font-size: 5rem;
            animation: sleep 3s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes sleep {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(5deg); }
        }

        .zZ {
            font-size: 1.5rem;
            opacity: 0;
            animation: zZ 2s ease-in-out infinite;
            display: inline-block;
            margin-left: 10px;
        }

        .zZ:nth-child(1) { animation-delay: 0s; }
        .zZ:nth-child(2) { animation-delay: 0.5s; font-size: 1.2rem; }
        .zZ:nth-child(3) { animation-delay: 1s; font-size: 0.9rem; }

        @keyframes zZ {
            0% { opacity: 0; transform: translateY(0); }
            50% { opacity: 1; transform: translateY(-10px); }
            100% { opacity: 0; transform: translateY(-20px); }
        }

        .btn-warning-custom {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
            color: white;
        }

        .btn-warning-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
            color: white;
        }

        .retry-btn {
            background: white;
            border: 2px solid #f59e0b;
            color: #f59e0b;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
        }

        .retry-btn:hover {
            background: #f59e0b;
            color: white;
            transform: scale(1.05);
        }

        .status-card {
            background: #fef3c7;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            background: #f59e0b;
            border-radius: 50%;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }
    </style>
@endpush

@section('content')
    <div class="error-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="error-card p-4 p-md-5 text-center">

                        <!-- Animal endormi -->
                        <div class="mb-4">
                            <span class="sleeping-pet">🐕💤</span>
                            <span class="zZ">z</span>
                            <span class="zZ">Z</span>
                            <span class="zZ">Z</span>
                        </div>

                        <!-- Code d'erreur -->
                        <div class="error-number mb-3">500</div>

                        <!-- Titre -->
                        <h1 class="h2 fw-bold text-dark mb-3">
                            Notre équipe technique est sur le coup !
                        </h1>

                        <!-- Description -->
                        <p class="text-secondary mb-3">
                            Nos petits protégés ont un peu trop joué avec les câbles...
                            Une erreur technique s'est produite. Ne vous inquiétez pas,
                            nous travaillons déjà à résoudre le problème.
                        </p>

                        <!-- Status -->
                        <div class="status-card mx-auto mb-4">
                            <div class="status-dot"></div>
                            <span class="small text-dark fw-semibold">Incident signalé - Correction en cours</span>
                        </div>

                        <!-- Liens d'action -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                            <a href="{{ url('/') }}" class="btn btn-warning-custom">
                                <i class="bi bi-arrow-repeat me-2"></i>
                                Retour à l'accueil
                            </a>
                            <button onclick="location.reload()" class="retry-btn">
                                <i class="bi bi-bootstrap-reboot me-2"></i>
                                Réessayer
                            </button>
                        </div>

                        <!-- Contact support -->
                        <div class="border-top pt-4">
                            <p class="text-muted small mb-3">
                                <i class="bi bi-headset me-1"></i>
                                Le problème persiste ?
                            </p>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <a href="https://wa.me/393508724295?text={{ urlencode('Bonjour, j\'ai une erreur 500 sur le site') }}"
                                   class="btn btn-sm btn-success rounded px-3" target="_blank">
                                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                </a>
                                <a href="mailto:contact@centrecaninfrancais.fr"
                                   class="btn btn-sm btn-outline-secondary rounded px-3">
                                    <i class="bi bi-envelope me-1"></i> Email
                                </a>
                            </div>
                        </div>

                        <!-- Message rassurant -->
                        <div class="mt-4 pt-2">
                            <p class="small text-muted">
                                <i class="bi bi-heart-fill text-danger me-1"></i>
                                Merci de votre patience, nous revenons vite !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh après 30 secondes (optionnel)
        setTimeout(function() {
            location.reload();
        }, 30000);
    </script>
@endsection