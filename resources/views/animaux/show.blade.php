@extends('layouts.app')

@section('title', ($animal->nom ?? 'Animal') . ' - ' . ($animal->race->nom ?? ''))

@push('styles')
<style>
    /* Toast Notification System */
    .toast-container-custom {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 380px;
        width: 100%;
    }
    
    .custom-toast {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        margin-bottom: 12px;
        overflow: hidden;
        animation: slideIn 0.3s ease-out;
        transition: all 0.3s ease;
    }
    
    .custom-toast:hover {
        transform: translateX(-5px);
        box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.15);
    }
    
    .toast-success { border-left: 4px solid #10b981; }
    .toast-error { border-left: 4px solid #ef4444; }
    .toast-warning { border-left: 4px solid #f59e0b; }
    .toast-info { border-left: 4px solid #3b82f6; }
    
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
        font-weight: bold;
    }
    
    .toast-success .toast-icon { background: #10b981; color: white; }
    .toast-error .toast-icon { background: #ef4444; color: white; }
    .toast-warning .toast-icon { background: #f59e0b; color: white; }
    .toast-info .toast-icon { background: #3b82f6; color: white; }
    
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
        background: none;
        border: none;
        padding: 0;
        transition: color 0.2s;
    }
    
    .toast-close:hover { color: #4b5563; }
    
    .toast-progress-bar {
        height: 3px;
        width: 100%;
        animation: progress 5s linear forwards;
    }
    
    .toast-success .toast-progress-bar { background: #10b981; }
    .toast-error .toast-progress-bar { background: #ef4444; }
    .toast-warning .toast-progress-bar { background: #f59e0b; }
    .toast-info .toast-progress-bar { background: #3b82f6; }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes progress {
        from { width: 100%; }
        to { width: 0%; }
    }
    
    .toast-exit {
        animation: slideOutRight 0.3s ease-out forwards;
    }
    
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    /* Galerie d'images */
    .main-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 1rem;
    }
    
    @media (max-width: 768px) {
        .main-image {
            height: 350px;
        }
        .toast-container-custom {
            left: 20px;
            right: 20px;
            max-width: none;
        }
    }
    
    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(251, 139, 67, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-orange, #fb8b43);
    }
</style>
@endpush

@section('content')
<!-- Toast Container -->
<div id="toastContainer" class="toast-container-custom"></div>

<!-- Section principale -->
<section class="py-4 py-md-5">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <!-- Colonne gauche : Image -->
            <div class="col-lg-6">
                <div class="sticky-top" style="top: 100px;">
                    @php
                        $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
                        $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
                        $categorie = $animal->race->categorie ?? 'unknown';
                    @endphp
                    @if($firstImage)
                        <img src="{{ asset($firstImage) }}" 
                             alt="{{ $animal->nom }}"
                             class="main-image shadow-lg">
                    @else
                        <div class="main-image bg-light d-flex align-items-center justify-content-center">
                            <i class="bi bi-image fs-1 text-secondary"></i>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Colonne droite : Informations -->
            <div class="col-lg-6">
                <!-- En-tête -->
                <div class="mb-4">
                    <h1 class="display-5 fw-bold mb-2">{{ $animal->nom }}</h1>
                    <span class="badge px-4 py-2 fs-6" style="background: var(--accent-orange);">
                        <i class="bi bi-paw me-2"></i>{{ $animal->race->nom ?? $animal->race ?? '' }}
                    </span>
                </div>
                
                <!-- Prix -->
                @if($animal->prix)
                <div class="mb-4">
                    <h2 class="h3 fw-bold" style="color: var(--accent-orange);">
                        {{ $animal->prix }}
                    </h2>
                </div>
                @endif
                
                <!-- Message d'accroche -->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-3" style="color: var(--accent-orange);">
                            <i class="bi bi-heart-fill me-2"></i>
                            {{ __($categorie . '.your_new_companion') }}
                        </h2>
                        <p class="lead mb-0">{{ __($categorie . '.lovely_healthy_animals') }}</p>
                    </div>
                </div>
                
                <!-- Caractéristiques -->
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <p class="fw-bold mb-3">{{ __($categorie . '.imagine_this_animal') }}</p>
                    </div>
                    
                    @php
                        $features = [
                            ['icon' => 'bi-heart-pulse', 'text' => $categorie . '.impeccable_health'],
                            ['icon' => 'bi-shield-check', 'text' => $categorie . '.ethical_breeder'],
                            ['icon' => 'bi-gift', 'text' => $categorie . '.welcome_package'],
                            ['icon' => 'bi-headset', 'text' => $categorie . '.permanent_support'],
                        ];
                    @endphp
                    
                    @foreach($features as $feature)
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon me-3">
                                <i class="bi {{ $feature['icon'] }} fs-5"></i>
                            </div>
                            <span>{{ __($feature['text']) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Message d'urgence -->
                <div class="alert alert-warning border-0 d-flex align-items-center mb-4">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <span class="fw-bold">{{ __($categorie . '.hurry_message') }}</span>
                </div>
                
                <!-- Description -->
                @if(!empty($animal->description))
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">{{ __($categorie . '.description') }}</h3>
                        <p class="text-secondary mb-0">{{ $animal->description }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Formulaire de réservation -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <h2 class="display-6 fw-bold mb-3" style="color: var(--accent-orange);">
                        <i class="bi bi-cart-check me-2"></i>
                        {{ __($categorie . '.fill_data_to_buy') }}
                    </h2>
                    <p class="text-secondary">{{ __($categorie . '.reserve_today') }}</p>
                    <p class="fst-italic">{{ __($categorie . '.ready_to_meet') }}</p>
                </div>
                
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        {{-- Messages de session --}}
                        @if(session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    showToast('success', ' {{ __("order.success_title") }}', '{{ session("success") }}');
                                });
                            </script>
                        @endif

                        @if($errors->any())
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    @foreach($errors->all() as $error)
                                        showToast('error', '⚠️ {{ __("order.error_title") }}', '{{ addslashes($error) }}');
                                    @endforeach
                                });
                            </script>
                        @endif
                        
                        <form id="orderForm" method="POST" 
                              action="{{ route('commande.process', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}"
                              class="needs-validation" novalidate>
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Nom complet -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __('order.full_name') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control border-start-0" 
                                               name="nom"
                                               value="{{ old('nom') }}"
                                               required>
                                    </div>
                                    <div class="invalid-feedback">{{ __('validation.required') }}</div>
                                </div>
                                
                                <!-- Race (lecture seule) -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __($categorie . '.animal_breed') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-paw"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control border-start-0 bg-light" 
                                               name="race_animal" 
                                               value="{{ $animal->race->nom ?? $animal->race ?? '' }}"
                                               readonly>
                                    </div>
                                </div>
                                
                                <!-- Nom de l'animal -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __($categorie . '.animal_name') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-tag"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control border-start-0" 
                                               name="nom_animal" 
                                               value="{{ old('nom_animal', $animal->nom) }}"
                                               required>
                                    </div>
                                    <div class="invalid-feedback">{{ __('validation.required') }}</div>
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __('order.email') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" 
                                               class="form-control border-start-0" 
                                               name="email" 
                                               id="email"
                                               value="{{ old('email') }}"
                                               required>
                                    </div>
                                    <div class="invalid-feedback email-feedback">{{ __('validation.email_invalid') }}</div>
                                </div>
                                
                                <!-- WhatsApp -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __('order.whatsapp_number') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-whatsapp"></i>
                                        </span>
                                        <input type="tel" 
                                               class="form-control border-start-0" 
                                               name="whatsapp" 
                                               id="whatsapp"
                                               value="{{ old('whatsapp') }}"
                                               required>
                                    </div>
                                    <div class="invalid-feedback whatsapp-feedback">{{ __('validation.whatsapp_min_digits') }}</div>
                                </div>
                                
                                <!-- Ville / Région -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        {{ __('order.city_region') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-geo-alt"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control border-start-0" 
                                               name="ville" 
                                               value="{{ old('ville') }}"
                                               required>
                                    </div>
                                    <div class="invalid-feedback">{{ __('validation.required') }}</div>
                                </div>
                                
                                <!-- Commentaire -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">{{ __('order.comment') }}</label>
                                    <textarea class="form-control" 
                                              name="commentaire" 
                                              rows="3">{{ old('commentaire') }}</textarea>
                                </div>
                                
                                <!-- Champs cachés -->
                                <input type="hidden" name="slug_animal" value="{{ $animal->slug }}">
                                <input type="hidden" name="image_animal" value="{{ $firstImage ?? '' }}">
                                
                                <!-- Bouton submit -->
                                <div class="col-12">
                                    <button type="submit" 
                                            class="btn btn-dark btn-lg w-100 py-3 rounded"
                                            id="submitBtn">
                                        <i class="bi bi-send me-2"></i>
                                        <span class="btn-text">{{ __($categorie . '.submit_order') }}</span>
                                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript -->
<script>
    // Système de toasts
    function showToast(type, title, message) {
        const container = document.getElementById('toastContainer');
        if (!container) return;
        
        const toastId = 'toast_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        
        const icons = { success: '', error: '✗', warning: '⚠', info: 'ℹ' };
        
        const toast = document.createElement('div');
        toast.className = `custom-toast toast-${type}`;
        toast.id = toastId;
        toast.innerHTML = `
            <div class="toast-content">
                <div class="toast-icon">${icons[type]}</div>
                <div class="toast-message">
                    <strong>${title}</strong>
                    <span>${message}</span>
                </div>
                <button class="toast-close" onclick="closeToast('${toastId}')">×</button>
            </div>
            <div class="toast-progress">
                <div class="toast-progress-bar"></div>
            </div>
        `;
        
        container.appendChild(toast);
        
        setTimeout(() => closeToast(toastId), 5000);
    }
    
    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('toast-exit');
            setTimeout(() => toast.remove(), 300);
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('orderForm');
        const emailInput = document.getElementById('email');
        const whatsappInput = document.getElementById('whatsapp');
        
        // Validation email
        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        
        // Validation WhatsApp
        function validateWhatsapp(number) {
            return number.replace(/\D/g, '').length >= 9;
        }
        
        // Validation en temps réel
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                if (this.value && !validateEmail(this.value)) {
                    this.classList.add('is-invalid');
                    showToast('error', '{{ __("validation.email_invalid_title") }}', '{{ __("validation.valid_email") }}');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
            
            emailInput.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        }
        
        if (whatsappInput) {
            whatsappInput.addEventListener('blur', function() {
                if (this.value && !validateWhatsapp(this.value)) {
                    this.classList.add('is-invalid');
                    showToast('warning', '{{ __("validation.whatsapp_invalid_title") }}', '{{ __("validation.whatsapp_min_digits") }}');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
            
            whatsappInput.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        }
        
        // Soumission du formulaire
        if (form) {
            form.addEventListener('submit', function(e) {
                let hasError = false;
                
                // Vérifier les champs requis
                form.querySelectorAll('[required]').forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        hasError = true;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                // Vérifier email
                if (emailInput && emailInput.value && !validateEmail(emailInput.value)) {
                    emailInput.classList.add('is-invalid');
                    hasError = true;
                    showToast('error', '{{ __("validation.email_invalid_title") }}', '{{ __("validation.valid_email") }}');
                }
                
                // Vérifier WhatsApp
                if (whatsappInput && whatsappInput.value && !validateWhatsapp(whatsappInput.value)) {
                    whatsappInput.classList.add('is-invalid');
                    hasError = true;
                }
                
                if (hasError) {
                    e.preventDefault();
                    showToast('error', '{{ __("validation.form_incomplete_title") }}', '{{ __("validation.fill_required_fields") }}');
                    return false;
                }
                
                // Afficher le loader
                const submitBtn = document.getElementById('submitBtn');
                const btnText = submitBtn.querySelector('.btn-text');
                const spinner = submitBtn.querySelector('.spinner-border');
                
                submitBtn.disabled = true;
                btnText.textContent = '{{ __("order.sending") }}';
                spinner.classList.remove('d-none');
            });
        }
    });
</script>
@endsection