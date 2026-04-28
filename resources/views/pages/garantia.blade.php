@extends('layouts.app')

@section('title', __('warranty.title'))

@push('styles')

@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold mb-4 text-dark">
                    {{ __('warranty.main_title') }}
                </h1>
                <p class="lead fw-bold mb-4" style="color: var(--accent-orange);">
                    {{ __('warranty.subtitle') }}
                </p>
                
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">{{ __('warranty.commitment_title') }}</h5>
                        <p class="text-secondary mb-0">{{ __('warranty.commitment_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Garantie à vie -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="display-6 fw-bold" style="color: var(--accent-orange);">
                        <i class="bi bi-shield-check me-2"></i>
                        {{ __('warranty.lifetime_guarantee') }}
                    </h2>
                </div>
                
                <div class="row g-4">
                    <!-- Santé génétique -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-lg">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-heart-pulse fs-1 me-3" style="color: var(--accent-orange);"></i>
                                    <h3 class="h4 fw-bold mb-0">{{ __('warranty.genetic_health') }}</h3>
                                </div>
                                
                                <p class="fw-bold mb-3">{{ __('warranty.covered_conditions') }}</p>
                                
                                <div class="row g-2">
                                    @for($i = 1; $i <= 8; $i++)
                                    <div class="col-12">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>{{ __('warranty.condition_'.$i) }}</span>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                                
                                <hr class="my-4">
                                
                                <p class="fw-bold mb-2">{{ __('warranty.coverage_details') }}</p>
                                <ul class="list-unstyled">
                                    @for($i = 1; $i <= 4; $i++)
                                    <li class="mb-2 d-flex">
                                        <i class="bi bi-info-circle me-2 text-primary"></i>
                                        <span class="small">{{ __('warranty.detail_'.$i) }}</span>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Défauts congénitaux -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-lg">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-shield-shaded fs-1 me-3" style="color: var(--accent-orange);"></i>
                                    <h3 class="h4 fw-bold mb-0">{{ __('warranty.congenital_defects') }}</h3>
                                </div>
                                
                                <p class="fw-bold mb-3">{{ __('warranty.defects_covered') }}</p>
                                
                                <div class="row g-2">
                                    @for($i = 1; $i <= 7; $i++)
                                    <div class="col-12">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                            <span>{{ __('warranty.defect_'.$i) }}</span>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Protocoles et tests de santé -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-5">
                            <h2 class="h3 fw-bold" style="color: var(--accent-orange);">
                                <i class="bi bi-clipboard-check me-2"></i>
                                {{ __('warranty.pre_delivery_protocols') }}
                            </h2>
                            <p class="lead fw-bold">{{ __('warranty.health_testing_program') }}</p>
                        </div>
                        
                        <div class="row g-4">
                            <!-- Tests des reproductrices -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 bg-white shadow-sm">
                                    <div class="card-body p-4">
                                        <h4 class="h5 fw-bold mb-3">
                                            <i class="bi bi-gender-female me-2" style="color: var(--accent-orange);"></i>
                                            {{ __('warranty.all_breeding_bitches') }}
                                        </h4>
                                        
                                        <ul class="list-unstyled">
                                            @for($i = 1; $i <= 6; $i++)
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                                <span>{{ __('warranty.test_'.$i) }}</span>
                                            </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tests des chiots -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 bg-white shadow-sm">
                                    <div class="card-body p-4">
                                        <h4 class="h5 fw-bold mb-3">
                                            <i class="bi bi-paw me-2" style="color: var(--accent-orange);"></i>
                                            {{ __('warranty.each_puppy_receives') }}
                                        </h4>
                                        
                                        <ul class="list-unstyled">
                                            @for($i = 1; $i <= 6; $i++)
                                            <li class="mb-2 d-flex">
                                                <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                                <span>{{ __('warranty.puppy_test_'.$i) }}</span>
                                            </li>
                                            @endfor
                                        </ul>
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

<!-- Documentation et certificats -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body p-4">
                                <i class="bi bi-file-medical fs-1 mb-3" style="color: var(--accent-orange);"></i>
                                <h4 class="h5 fw-bold">{{ __('warranty.vet_certificate') }}</h4>
                                <p class="text-secondary small mb-0">{{ __('warranty.vet_certificate_desc') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body p-4">
                                <i class="bi bi-shield-check fs-1 mb-3" style="color: var(--accent-orange);"></i>
                                <h4 class="h5 fw-bold">{{ __('warranty.vaccination_card') }}</h4>
                                <p class="text-secondary small mb-0">{{ __('warranty.vaccination_card_desc') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body p-4">
                                <i class="bi bi-passport fs-1 mb-3" style="color: var(--accent-orange);"></i>
                                <h4 class="h5 fw-bold">{{ __('warranty.pet_passport') }}</h4>
                                <p class="text-secondary small mb-0">{{ __('warranty.pet_passport_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conditions de la garantie -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3 text-center">
                            <i class="bi bi-file-text me-2" style="color: var(--accent-orange);"></i>
                            {{ __('warranty.warranty_conditions') }}
                        </h4>
                        
                        <ul class="list-unstyled">
                            @for($i = 1; $i <= 4; $i++)
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-lg text-success me-3 mt-1"></i>
                                <span class="small">{{ __('warranty.condition_text_'.$i) }}</span>
                            </li>
                            @endfor
                        </ul>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="fw-bold mb-3">{{ __('warranty.questions_title') }}</p>
                            <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" 
                               class="btn btn-dark px-5 py-3 rounded">
                                <i class="bi bi-chat-dots me-2"></i>
                                {{ __('warranty.contact_us') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
        transition: all 0.3s ease;
    }
    
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.1) !important;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endsection