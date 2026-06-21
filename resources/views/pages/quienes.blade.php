@extends('layouts.app')

@section('title', __('about_us.page_title'))

@push('styles')

@endpush

@section('content')
<!-- Hero Section - Notre Histoire -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold mb-3 text-dark">
                    {{ __('about_us.our_story_title') }}
                </h1>
                <p class="lead fw-bold mb-4" style="color: var(--accent-orange);">
                    {{ __('about_us.excellence_years') }}
                </p>
                <p class="text-secondary">
                    {{ __('about_us.founding_story') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Notre Mission -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="h1 fw-bold mb-3" style="color: var(--accent-orange);">
                        {{ __('about_us.everything_for_puppy_title') }}
                    </h2>
                    <p class="lead text-secondary mb-5">
                        {{ __('about_us.everything_for_puppy_text') }}
                    </p>
                    
                    <h3 class="h2 fw-bold mb-3" style="color: var(--accent-orange);">
                        {{ __('about_us.our_mission_title') }}
                    </h3>
                    <h4 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                        {{ __('about_us.creating_families_title') }}
                    </h4>
                    <p class="text-secondary">
                        {{ __('about_us.our_mission_text') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ce qui fait la différence -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-dark">
                {{ __('about_us.difference_title') }}
            </h2>
        </div>
        
        <div class="row g-4">
            @php
                $differences = [
                    [
                        'title' => 'about_us.ethical_standards_title',
                        'text' => 'about_us.ethical_standards_text'
                    ],
                    [
                        'title' => 'about_us.family_environment_title',
                        'text' => 'about_us.family_environment_text'
                    ],
                    [
                        'title' => 'about_us.health_program_title',
                        'text' => 'about_us.health_program_text'
                    ],
                    [
                        'title' => 'about_us.lifetime_support_title',
                        'text' => 'about_us.lifetime_support_text'
                    ],
                ];
            @endphp
            
            @foreach($differences as $diff)
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="bi bi-check-circle-fill fs-1" style="color: var(--accent-orange);"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3" style="color: var(--accent-orange);">
                            {{ __($diff['title']) }}
                        </h3>
                        <p class="text-secondary mb-0">
                            {{ __($diff['text']) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Centre d'élevage et Philosophie -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <!-- Centre d'élevage -->
                        <h2 class="h3 fw-bold text-center mb-4" style="color: var(--accent-orange);">
                            {{ __('about_us.breeding_center_title') }}
                        </h2>
                        
                        <div class="mb-4">
                            <p class="text-center fw-bold">{{ __('about_us.licensed_operations_title') }}</p>
                         
                        </div>
                        
                        <!-- Affiliations professionnelles -->
                        <h2 class="h3 fw-bold text-center mb-3 mt-5" style="color: var(--accent-orange);">
                            {{ __('about_us.professional_memberships_title') }}
                        </h2>
                        
                        <ul class="list-unstyled text-center mb-4">
                            <li class="mb-2"> {{ __('about_us.rsce_membership') }}</li>
                            <li class="mb-2"> {{ __('about_us.spanish_breeders_membership') }}</li>
                            <li class="mb-2"> {{ __('about_us.european_canine_membership') }}</li>
                        </ul>
                        
                        <!-- Philosophie d'élevage -->
                        <h2 class="h3 fw-bold text-center mb-3 mt-5" style="color: var(--accent-orange);">
                            {{ __('about_us.breeding_philosophy_title') }}
                        </h2>
                        
                        <p class="text-center mb-3">{{ __('about_us.breeding_philosophy_intro') }}</p>
                        
                        <ul class="list-unstyled">
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('about_us.health_excellence_point') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('about_us.temperament_selection_point') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('about_us.genetic_diversity_point') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('about_us.early_development_point') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Processus d'adoption -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-dark mb-3">
                {{ __('about_us.cachorros_process_title') }}
            </h2>
            <h3 class="h4 fw-bold" style="color: var(--accent-orange);">
                {{ __('about_us.transparency_title') }}
            </h3>
        </div>
        
        <div class="row g-4">
            @php
                $phases = [
                    [
                        'title' => 'about_us.phase1_title',
                        'points' => ['point1', 'point2', 'point3', 'point4']
                    ],
                    [
                        'title' => 'about_us.phase2_title',
                        'points' => ['point1', 'point2', 'point3', 'point4']
                    ],
                    [
                        'title' => 'about_us.phase3_title',
                        'points' => ['point1', 'point2', 'point3', 'point4']
                    ],
                    [
                        'title' => 'about_us.phase4_title',
                        'points' => ['point1', 'point2', 'point3', 'point4']
                    ],
                    [
                        'title' => 'about_us.phase5_title',
                        'points' => ['point1', 'point2', 'point3', 'point4']
                    ],
                ];
            @endphp
            
       @foreach($phases as $index => $phase)
    @php $phaseNumber = $index + 1; @endphp
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 border-0 shadow-sm hover-scale transition">
            <div class="card-body p-4">
                {{-- En-tête avec numéro et titre --}}
                <div class="d-flex align-items-start mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" 
                         style="width: 40px; height: 40px; min-width: 40px; background: var(--accent-orange); color: white; font-weight: bold;">
                        {{ $phaseNumber }}
                    </div>
                    <h4 class="h5 fw-bold mb-0 lh-base" style="color: var(--accent-orange);">
                        {{ __($phase['title']) }}
                    </h4>
                </div>
                
                {{-- Liste des points --}}
                <ul class="list-unstyled ps-2">
                    @foreach($phase['points'] as $pointKey)
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-check2-circle me-2 mt-1 flex-shrink-0" style="color: var(--accent-orange); font-size: 0.85rem;"></i>
                            <span class="text-secondary">{{ __('about_us.phase'.$phaseNumber.'_'.$pointKey) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach
        </div>
        
        <!-- Engagement et Garanties -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg bg-light">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h4 fw-bold text-center mb-4" style="color: var(--accent-orange);">
                            {{ __('about_us.commitment_title') }}
                        </h3>
                        
                        <p class="text-center fw-bold mb-4">{{ __('about_us.health_guarantees_title') }}</p>
                        
                        <div class="row g-3">
                            @php
                                $guarantees = [
                                    'genetic_health_guarantee',
                                    'congenital_defects_coverage',
                                    'vaccination_protocol',
                                    'health_documentation'
                                ];
                            @endphp
                            
                            @foreach($guarantees as $guarantee)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shield-check fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('about_us.'.$guarantee) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <hr class="my-4">
                        
                        <h4 class="h5 fw-bold text-center mb-3" style="color: var(--accent-orange);">
                            {{ __('about_us.customer_service_title') }}
                        </h4>
                        
                        <div class="row g-3">
                            @php
                                $services = [
                                    'pre_purchase_consultation',
                                    'educational_support',
                                    'emergency_line',
                                    'lifetime_guidance'
                                ];
                            @endphp
                            
                            @foreach($services as $service)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-headset fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('about_us.'.$service) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Témoignages et Installations -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-3" style="color: var(--accent-orange);">
                {{ __('about_us.why_choose_us_title') }}
            </h2>
            <p class="fw-bold text-secondary">{{ __('about_us.real_testimonials') }}</p>
        </div>
        
        <!-- Témoignages -->
        <div class="row g-4 mb-5">
            @for($i = 1; $i <= 3; $i++)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="bi bi-quote fs-1 mb-3 d-block" style="color: var(--accent-orange);"></i>
                        <p class="fst-italic mb-3 text-secondary">
                            "{{ __('about_us.testimonial'.$i.'_text') }}"
                        </p>
                        <p class="fw-bold mb-0">- {{ __('about_us.testimonial'.$i.'_author') }}</p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <!-- Installations -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h4 fw-bold text-center mb-4">
                            {{ __('about_us.facilities_title') }}
                        </h3>
                        <p class="text-center fw-bold mb-4">{{ __('about_us.facilities_features_title') }}</p>
                        
                        <div class="row g-3">
                            @php
                                $facilities = [
                                    'modern_facilities',
                                    'vet_standards',
                                    'socialization_areas',
                                    'exercise_areas',
                                    'virtual_tours'
                                ];
                            @endphp
                            
                            @foreach($facilities as $facility)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-building fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('about_us.'.$facility) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Engagement communautaire -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h4 fw-bold text-center mb-4" style="color: var(--accent-orange);">
                            {{ __('about_us.community_involvement_title') }}
                        </h3>
                        
                        <div class="row g-3">
                            @php
                                $community = [
                                    'local_shelters_support',
                                    'educational_programs',
                                    'rescue_collaborations',
                            
                                    'environmental_responsibility',
                                    'sustainable_practices',
                                    'waste_management',
                                    'local_community'
                                ];
                            @endphp
                            
                            @foreach($community as $item)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-heart fs-4 me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('about_us.'.$item) }}</span>
                                </div>
                            </div>
                            @endforeach
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
    
    .hover-scale {
        transition: all 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: translateY(-5px);
    }
    
    .transition {
        transition: all 0.3s ease;
    }
    
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }
</style>
@endsection