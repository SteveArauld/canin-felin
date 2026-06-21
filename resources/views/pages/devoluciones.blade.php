@extends('layouts.app')

@section('title', __('returns_policy.page_title'))

@push('styles')
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold text-center text-dark mb-4">
                    {{ __('returns_policy.page_title') }}
                </h1>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <p class="text-secondary mb-0">
                            {{ __('returns_policy.intro_1') }}
                            <strong>{{ __('returns_policy.company_name') }}</strong>
                            {{ __('returns_policy.intro_2') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contenu principal -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- Conditions générales -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-file-text me-2"></i>
                            {{ __('returns_policy.general_conditions.title') }}
                        </h2>
                        
                        <p class="text-secondary">
                            {{ __('returns_policy.general_conditions.description') }}
                        </p>
                    </div>
                </div>
                
                <!-- Garantie santé -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-shield-check me-2"></i>
                            {{ __('returns_policy.health_guarantee.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">
                            {{ __('returns_policy.health_guarantee.delivered_with') }}
                        </p>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-file-medical fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('returns_policy.health_guarantee.health_card') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-shield fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('returns_policy.health_guarantee.vaccinations') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-award fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('returns_policy.health_guarantee.vet_certificate') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info border-0 bg-light">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            {{ __('returns_policy.health_guarantee.within_1') }}
                            <strong>{{ __('returns_policy.health_guarantee.120_hours') }}</strong>
                            {{ __('returns_policy.health_guarantee.within_2') }}
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-arrow-repeat fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('returns_policy.health_guarantee.replacement_option') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-cash-stack fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('returns_policy.health_guarantee.compensation_option') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Exclusions -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ __('returns_policy.exclusions.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">
                            {{ __('returns_policy.exclusions.guarantee_not_covers') }}
                        </p>
                        
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-x-circle text-danger me-3 mt-1"></i>
                                <span>{{ __('returns_policy.exclusions.health_issues') }}</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-x-circle text-danger me-3 mt-1"></i>
                                <span>{{ __('returns_policy.exclusions.adaptation_issues') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Transport et livraison -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-truck me-2"></i>
                            {{ __('returns_policy.transport_delivery.title') }}
                        </h2>
                        
                        <p class="text-secondary">
                            {{ __('returns_policy.transport_delivery.description_1') }}
                            <strong>{{ __('returns_policy.transport_delivery.company_name') }}</strong>
                            {{ __('returns_policy.transport_delivery.description_2') }}
                        </p>
                    </div>
                </div>
                
            
                
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
      
        
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://wa.me/0644695982?text={{ urlencode(__('whatsapp_message')) }}" class="btn btn-success btn-lg px-5 py-3 rounded">
                <i class="bi bi-whatsapp me-2"></i>
                WhatsApp
            </a>
            <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-light btn-lg px-5 py-3 rounded">
                <i class="bi bi-envelope me-2"></i>
                {{ __('Contact') }}
            </a>
        </div>
    </div>
</section>

<!-- Footer -->


<!-- Styles personnalisés -->
<style>
    .py-md-6 {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }
    
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endsection