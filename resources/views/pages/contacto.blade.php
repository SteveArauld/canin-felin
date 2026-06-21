@extends('layouts.app')

@section('title', __('contact.title'))

@push('styles')
<style>
    .contact-header {
        color: black;
        padding: 60px 0;
        border-radius: 0 0 30px 30px;
        margin-bottom: 50px;
    }
    
    .contact-form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 50px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .form-control.is-invalid:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #eabc66 0%, #a2894b 100%);
        border: none;
        border-radius: 5px;
        padding: 14px 30px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        color: white;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(102, 126, 234, 0.4);
    }
    
    /* Toast Notification */
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
    }
    
    .toast-success { border-left: 4px solid #10b981; }
    .toast-error { border-left: 4px solid #ef4444; }
    
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
    }
    
    .toast-success .toast-icon { background: #10b981; color: white; }
    .toast-error .toast-icon { background: #ef4444; color: white; }
    
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
        cursor: pointer;
        background: none;
        border: none;
        font-size: 20px;
        color: #9ca3af;
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    
    @media (max-width: 768px) {
        .contact-form-container {
            padding: 25px;
            margin: 0 15px;
        }
        .contact-header {
            padding: 40px 0;
        }
    }
</style>
@endpush

@section('content')
<!-- Toast Container -->
<div id="toastContainer" class="toast-container-custom"></div>

<!-- En-tête -->
<section class="contact-header">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">{{ __('contact.title') }}</h1>
        <p class="lead mb-0">{{ __('contact.subtitle') }}</p>
    </div>
</section>

<!-- Formulaire de contact -->
<section class="mb-5">
    <div class="container">
        <div class="contact-form-container">
            <h2 class="h3 fw-bold mb-4 text-center">{{ __('contact.send_message') }}</h2>
            
            <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                @csrf
                
                <div class="row g-3">
                    <!-- Nom complet -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            {{ __('contact.full_name') }} <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" 
                                   class="form-control border-start-0" 
                                   name="nom"
                                   id="nom"
                                   placeholder="{{ __('contact.enter_full_name') }}"
                                   value="{{ old('nom') }}"
                                   required>
                        </div>
                        <div class="invalid-feedback">{{ __('contact.fill_name') }}</div>
                    </div>
                    
                    <!-- Email -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            {{ __('contact.email') }} <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" 
                                   class="form-control border-start-0" 
                                   name="email"
                                   id="email"
                                   placeholder="{{ __('contact.enter_email') }}"
                                   value="{{ old('email') }}"
                                   required>
                        </div>
                        <div class="invalid-feedback">{{ __('contact.valid_email') }}</div>
                    </div>
                    
                    <!-- Téléphone -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            {{ __('contact.phone_number') }}
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input type="tel" 
                                   class="form-control border-start-0" 
                                   name="telephone"
                                   id="telephone"
                                   placeholder="{{ __('contact.enter_phone') }}"
                                   value="{{ old('telephone') }}">
                        </div>
                    </div>
                    
                    <!-- Sujet -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            {{ __('contact.subject') }} <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-chat-dots"></i>
                            </span>
                            <select class="form-select border-start-0" name="sujet" id="sujet" required>
                                <option value="">{{ __('contact.select_subject') }}</option>
                                <option value="adoption" {{ old('sujet') == 'adoption' ? 'selected' : '' }}>{{ __('contact.adoption') }}</option>
                                <option value="information" {{ old('sujet') == 'information' ? 'selected' : '' }}>{{ __('contact.information') }}</option>
                                <option value="complaint" {{ old('sujet') == 'complaint' ? 'selected' : '' }}>{{ __('contact.complaint') }}</option>
                                <option value="other" {{ old('sujet') == 'other' ? 'selected' : '' }}>{{ __('contact.other') }}</option>
                            </select>
                        </div>
                        <div class="invalid-feedback">{{ __('contact.select_subject_valid') }}</div>
                    </div>
                    
                    <!-- Message -->
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            {{ __('contact.message') }} <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 align-items-start pt-3">
                                <i class="bi bi-pencil"></i>
                            </span>
                            <textarea class="form-control border-start-0" 
                                      name="message"
                                      id="message"
                                      rows="5"
                                      placeholder="{{ __('contact.enter_message') }}"
                                      required>{{ old('message') }}</textarea>
                        </div>
                        <div class="invalid-feedback">{{ __('contact.fill_message') }}</div>
                    </div>
                    
                    <!-- Checkbox consentement -->
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="consent" id="consent" required>
                            <label class="form-check-label text-secondary" for="consent">
                                {{ __('contact.consent') }}
                            </label>
                            <div class="invalid-feedback">{{ __('contact.consent_required') }}</div>
                        </div>
                    </div>
                    
                    <!-- Bouton submit -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit text-white w-100" id="submitBtn">
                            <i class="bi bi-send me-2"></i>
                            <span class="btn-text">{{ __('contact.send') }}</span>
                            <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // Système de toasts
    function showToast(type, title, message) {
        const container = document.getElementById('toastContainer');
        if (!container) return;
        
        const toastId = 'toast_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        const icons = { success: '✓', error: '✗' };
        
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
        `;
        
        container.appendChild(toast);
        setTimeout(() => closeToast(toastId), 5000);
    }
    
    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.style.animation = 'slideOut 0.3s ease-out forwards';
            setTimeout(() => toast.remove(), 300);
        }
    }
    
    // Validation email
    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        const emailInput = document.getElementById('email');
        
        // Validation en temps réel
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                if (this.value && !validateEmail(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }
        
        // Afficher les toasts selon la session
        @if(session('success'))
            showToast('success', '{{ __("contact.success_title") }}', '{{ session("success") }}');
        @endif
        
        @if(session('error'))
            showToast('error', '{{ __("contact.error_title") }}', '{{ session("error") }}');
        @endif
        
        @if($errors->any())
            showToast('error', '{{ __("contact.error_title") }}', '{{ __("contact.fill_all_fields") }}');
        @endif
    });
</script>
@endsection