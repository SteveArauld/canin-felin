@extends('layouts.app')

@section('title', 'Session expirée - Canin-Felin')

@push('styles')
    <style>
        .error-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
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
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
        }

        .timer-clock {
            font-size: 4rem;
            animation: tick 1s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes tick {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .sleeping-cat {
            font-size: 5rem;
            animation: sleep 3s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes sleep {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(5deg); }
        }

        .btn-success-custom {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
        }

        .btn-success-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
        }

        .btn-outline-success-custom {
            border: 2px solid #22c55e;
            color: #22c55e;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-outline-success-custom:hover {
            background: #22c55e;
            color: white;
            transform: scale(1.05);
        }

        .solution-card {
            background: #f0fdf4;
            border-radius: 1rem;
            padding: 1rem;
            text-align: left;
            transition: all 0.3s ease;
        }

        .solution-card:hover {
            background: #dcfce7;
            transform: translateX(5px);
        }

        .countdown {
            font-size: 2rem;
            font-weight: 700;
            color: #16a34a;
            font-family: monospace;
        }

        .floating-time {
            position: absolute;
            opacity: 0.05;
            pointer-events: none;
        }

        .floating-time-1 { top: 10%; left: 5%; font-size: 6rem; animation: float 8s ease-in-out infinite; }
        .floating-time-2 { bottom: 15%; right: 5%; font-size: 5rem; animation: float 6s ease-in-out infinite reverse; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .refresh-icon {
            animation: spin 2s linear infinite;
            display: inline-block;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
@endpush

@section('content')
    <div class="error-container position-relative overflow-hidden">

        <!-- Animaux flottants -->
        <div class="floating-time floating-time-1">⏰</div>
        <div class="floating-time floating-time-2">⌛</div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="error-card p-4 p-md-5 text-center">

                        <!-- Horloge animée -->
                        <div class="mb-4">
                            <span class="timer-clock">⏰</span>
                            <span class="sleeping-cat ms-2">🐈💤</span>
                        </div>

                        <!-- Code d'erreur -->
                        <div class="error-number mb-3">419</div>

                        <!-- Titre -->
                        <h1 class="h2 fw-bold text-dark mb-3">
                            Session expirée !
                        </h1>

                        <!-- Description -->
                        <p class="text-secondary mb-3">
                            Notre petit chat s'est endormi en attendant... Votre session a expiré
                            car vous êtes resté trop longtemps inactif.
                        </p>

                        <!-- Compteur humoristique -->
                        <div class="mb-4">
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded">
                            <i class="bi bi-hourglass-split me-1"></i>
                            Dernière activité : il y a plus de 30 minutes
                        </span>
                        </div>

                        <!-- Solutions -->
                        <div class="text-start mb-4">
                            <p class="small text-muted mb-2">
                                <i class="bi bi-lightbulb me-1"></i>
                                Comment résoudre le problème :
                            </p>
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <div class="solution-card">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-arrow-repeat text-success fs-4 refresh-icon"></i>
                                            <div>
                                                <p class="fw-semibold mb-0 small">Rafraîchissez la page</p>
                                                <p class="text-muted small mb-0">Rechargez la page et reconnectez-vous</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="solution-card">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-box-arrow-in-right text-success fs-4"></i>
                                            <div>
                                                <p class="fw-semibold mb-0 small">Reconnectez-vous</p>
                                                <p class="text-muted small mb-0">Votre session a expiré, veuillez vous reconnecter</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Liens d'action -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                            <button onclick="location.reload()" class="btn btn-success-custom text-white">
                                <i class="bi bi-arrow-repeat me-2"></i>
                                Rafraîchir la page
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-outline-success-custom">
                                <i class="bi bi-house-door me-2"></i>
                                Retour à l'accueil
                            </a>
                        </div>

                        <!-- Astuce -->
                        <div class="border-top pt-4">
                            <p class="small text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Astuce : Pour éviter cela, restez actif sur le site ou reconnectez-vous.
                            </p>
                            <p class="small text-muted mt-2">
                                <i class="bi bi-shield-check text-success me-1"></i>
                                Vos données sont en sécurité. Aucune information n'a été perdue.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-refresh après 5 secondes (optionnel)
        let countdown = 5;
        const countdownElement = document.createElement('span');
        countdownElement.className = 'countdown ms-2';

        const refreshBtn = document.querySelector('.btn-success-custom');
        if (refreshBtn) {
            // Ajouter un compte à rebours
            const originalText = refreshBtn.innerHTML;
            refreshBtn.innerHTML = `<i class="bi bi-arrow-repeat me-2"></i>Rafraîchissement auto dans ${countdown}s`;

            const interval = setInterval(() => {
                countdown--;
                if (countdown <= 0) {
                    clearInterval(interval);
                    location.reload();
                } else {
                    refreshBtn.innerHTML = `<i class="bi bi-arrow-repeat me-2 refresh-icon"></i>Rafraîchissement auto dans ${countdown}s`;
                }
            }, 1000);
        }
    </script>
@endsection