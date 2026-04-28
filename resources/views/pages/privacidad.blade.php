@extends('layouts.app')

@section('title', __('legal_notice.privacy_policy'))

@push('styles')
    
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold text-center text-dark mb-3">
                    {{ __('legal_notice.privacy_policy') }}
                </h1>
                <p class="text-center text-secondary mb-2">{{ __('legal_notice.company_description') }}</p>
                <p class="text-center text-muted small">{{ __('legal_notice.last_update') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contenu principal -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- Section 1 : Informations légales -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-building me-2"></i>
                            {{ __('legal_notice.section_1.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_1.description') }}</p>
                        
                        <h3 class="h5 fw-bold mb-3">{{ __('legal_notice.section_1.data_controller') }}</h3>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-building me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.company_name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-hash me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.tax_id') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-geo-alt me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.address') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-telephone me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.phone') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-whatsapp me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.whatsapp') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-envelope me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.email') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-globe me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.website') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <i class="bi bi-file-text me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.breeder_license') }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex">
                                    <i class="bi bi-journal me-3" style="color: var(--accent-orange);"></i>
                                    <span>{{ __('legal_notice.section_1.commercial_register') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="h5 fw-bold mb-3">{{ __('legal_notice.section_1.applicable_law') }}</h3>
                        <p class="text-secondary mb-3">{{ __('legal_notice.section_1.law_description') }}</p>
                        
                        <ul class="list-unstyled">
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('legal_notice.section_1.gdpr') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('legal_notice.section_1.lopdgdd') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('legal_notice.section_1.lssi_ce') }}</span>
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __('legal_notice.section_1.royal_decree') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Section 2 : Principes de traitement -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-shield-check me-2"></i>
                            {{ __('legal_notice.section_2.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_2.description') }}</p>
                        
                        @for($i = 1; $i <= 6; $i++)
                        <div class="mb-4">
                            <h4 class="h6 fw-bold mb-2">
                                <i class="bi bi-dot me-1"></i>
                                {{ __('legal_notice.section_2.principle_'.$i) }}
                            </h4>
                            <p class="text-secondary small mb-0 ps-4">
                                {{ __('legal_notice.section_2.principle_'.$i.'_desc') }}
                            </p>
                        </div>
                        @endfor
                    </div>
                </div>
                
                <!-- Section 3 : Données collectées -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-database me-2"></i>
                            {{ __('legal_notice.section_3.title') }}
                        </h2>
                        
                        <div class="row g-4">
                            @for($i = 1; $i <= 5; $i++)
                            <div class="col-md-6">
                                <div class="bg-light p-3 rounded-3 h-100">
                                    <h4 class="h6 fw-bold mb-3">
                                        <i class="bi bi-folder me-2" style="color: var(--accent-orange);"></i>
                                        {{ __('legal_notice.section_3.subsection_'.$i.'.title') }}
                                    </h4>
                                    <ul class="list-unstyled small mb-0">
                                        @php
                                            $items = [
                                                1 => ['full_name', 'phone', 'email', 'address', 'id_document'],
                                                2 => ['family_info', 'pet_experience', 'breed_preferences', 'housing_situation'],
                                                3 => ['billing_info', 'payment_data', 'transaction_history'],
                                                4 => ['ip_address', 'browser_type', 'pages_visited', 'time_spent', 'cookies'],
                                                5 => ['phone_conversations', 'messages', 'photos_videos']
                                            ];
                                        @endphp
                                        @foreach($items[$i] as $item)
                                        <li class="mb-2 d-flex">
                                            <i class="bi bi-check2 text-success me-2"></i>
                                            {{ __('legal_notice.section_3.subsection_'.$i.'.'.$item) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                
                <!-- Section 4 : Finalités du traitement -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-bullseye me-2"></i>
                            {{ __('legal_notice.section_4.title') }}
                        </h2>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('legal_notice.table.purpose') }}</th>
                                        <th>{{ __('legal_notice.table.legal_basis') }}</th>
                                        <th>{{ __('legal_notice.table.retention') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 1; $i <= 6; $i++)
                                    <tr>
                                        <td>{{ __('legal_notice.section_4.subsection_'.$i.'.purpose') }}</td>
                                        <td>{{ __('legal_notice.section_4.subsection_'.$i.'.legal_basis') }}</td>
                                        <td>{{ __('legal_notice.section_4.subsection_'.$i.'.retention') }}</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Section 5 : Destinataires -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-share me-2"></i>
                            {{ __('legal_notice.section_5.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_5.description') }}</p>
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_5.subsection_1.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_1.vet_services') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_1.transport_services') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_1.payment_services') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_1.tech_services') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_5.subsection_2.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_2.aepd') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_2.health_authorities') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_2.tax_authorities') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_2.judicial_authorities') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_5.subsection_3.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_3.rsce') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_5.subsection_3.breeder_associations') }}</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="alert alert-warning border-0 mt-4">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ __('legal_notice.section_5.important_note') }}
                        </div>
                    </div>
                </div>
                
                <!-- Section 6 : Transferts internationaux -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-globe-americas me-2"></i>
                            {{ __('legal_notice.section_6.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_6.description') }}</p>
                        
                        <ul class="list-unstyled mb-3">
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                {{ __('legal_notice.section_6.check_protection') }}
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                {{ __('legal_notice.section_6.apply_safeguards') }}
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                {{ __('legal_notice.section_6.guarantee_rights') }}
                            </li>
                        </ul>
                        
                        <p class="fw-bold mb-2">{{ __('legal_notice.section_6.main_destinations') }}</p>
                        <ul>
                            <li>{{ __('legal_notice.section_6.usa') }}</li>
                            <li>{{ __('legal_notice.section_6.uk') }}</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Section 7 : Mesures de sécurité -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-shield-lock me-2"></i>
                            {{ __('legal_notice.section_7.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_7.description') }}</p>
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_7.subsection_1.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_1.ssl') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_1.backup') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_1.firewalls') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_1.restricted_access') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_1.updates') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_7.subsection_2.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_2.training') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_2.policies') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_2.audits') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_2.procedures') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_2.confidentiality') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold mb-3">{{ __('legal_notice.section_7.subsection_3.title') }}</h4>
                                <p class="small text-secondary mb-2">{{ __('legal_notice.section_7.subsection_3.description') }}</p>
                                <ul class="list-unstyled small">
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_3.notification') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_3.inform_user') }}</li>
                                    <li class="mb-2">{{ __('legal_notice.section_7.subsection_3.corrective_measures') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section 8 : Droits des utilisateurs -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-person-check me-2"></i>
                            {{ __('legal_notice.section_8.title') }}
                        </h2>
                        
                        <p class="text-secondary mb-4">{{ __('legal_notice.section_8.description') }}</p>
                        
                        <div class="row g-3 mb-4">
                            @for($i = 1; $i <= 8; $i++)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start p-3 bg-light rounded-3 h-100">
                                    <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                    <div>
                                        <strong>{{ __('legal_notice.section_8.subsection_'.$i.'.title') }}</strong>
                                        <p class="small text-secondary mb-0">{{ __('legal_notice.section_8.subsection_'.$i.'.description') }}</p>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        
                        <div class="alert alert-info border-0">
                            <h4 class="h6 fw-bold">{{ __('legal_notice.section_8.exercise_rights.title') }}</h4>
                            <p class="small mb-2">{{ __('legal_notice.section_8.exercise_rights.description') }}</p>
                            <p class="small mb-1"><i class="bi bi-envelope me-2"></i>{{ __('legal_notice.section_8.exercise_rights.email') }}</p>
                            <p class="small mb-1"><i class="bi bi-telephone me-2"></i>{{ __('legal_notice.section_8.exercise_rights.phone') }}</p>
                            <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i>{{ __('legal_notice.section_8.exercise_rights.postal_address') }}</p>
                            <p class="small mb-1"><i class="bi bi-file-text me-2"></i>{{ __('legal_notice.section_8.exercise_rights.required_docs') }}</p>
                            <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ __('legal_notice.section_8.exercise_rights.response_time') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Section 9 : Cookies -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-cookie me-2"></i>
                            {{ __('legal_notice.section_9.title') }}
                        </h2>
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="bg-light p-3 rounded-3 h-100">
                                    <h4 class="h6 fw-bold">{{ __('legal_notice.section_9.subsection_1.technical_cookies') }}</h4>
                                    <ul class="list-unstyled small">
                                        <li>{{ __('legal_notice.section_9.subsection_1.technical_purpose') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.technical_duration') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.technical_legal') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-light p-3 rounded-3 h-100">
                                    <h4 class="h6 fw-bold">{{ __('legal_notice.section_9.subsection_1.analytics_cookies') }}</h4>
                                    <ul class="list-unstyled small">
                                        <li>{{ __('legal_notice.section_9.subsection_1.analytics_purpose') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.analytics_provider') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.analytics_duration') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.analytics_legal') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-light p-3 rounded-3 h-100">
                                    <h4 class="h6 fw-bold">{{ __('legal_notice.section_9.subsection_1.personalization_cookies') }}</h4>
                                    <ul class="list-unstyled small">
                                        <li>{{ __('legal_notice.section_9.subsection_1.personalization_purpose') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.personalization_duration') }}</li>
                                        <li>{{ __('legal_notice.section_9.subsection_1.personalization_legal') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h4 class="h6 fw-bold">{{ __('legal_notice.section_9.subsection_2.title') }}</h4>
                            <p class="small text-secondary">{{ __('legal_notice.section_9.subsection_2.description') }}</p>
                            <ul class="small">
                                <li>{{ __('legal_notice.section_9.subsection_2.config_panel') }}</li>
                                <li>{{ __('legal_notice.section_9.subsection_2.browser_settings') }}</li>
                                <li>{{ __('legal_notice.section_9.subsection_2.third_party_tools') }}</li>
                            </ul>
                            <p class="small text-muted fst-italic">{{ __('legal_notice.section_9.subsection_2.important_note') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Sections restantes simplifiées -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-clock-history me-2"></i>
                            {{ __('legal_notice.section_12.title') }}
                        </h2>
                        
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('legal_notice.table.data_type') }}</th>
                                        <th>{{ __('legal_notice.table.duration') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('legal_notice.section_12.subsection_2.active_clients') }}</td>
                                        <td>{{ __('legal_notice.section_12.subsection_2.active_duration') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('legal_notice.section_12.subsection_2.health_guarantee') }}</td>
                                        <td>{{ __('legal_notice.section_12.subsection_2.health_duration') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('legal_notice.section_12.subsection_2.inquiries_no_purchase') }}</td>
                                        <td>{{ __('legal_notice.section_12.subsection_2.inquiries_duration') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('legal_notice.section_12.subsection_2.marketing_data') }}</td>
                                        <td>{{ __('legal_notice.section_12.subsection_2.marketing_duration') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('legal_notice.section_12.subsection_2.web_browsing') }}</td>
                                        <td>{{ __('legal_notice.section_12.subsection_2.web_duration') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Contact -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold mb-4" style="color: var(--accent-orange);">
                            <i class="bi bi-headset me-2"></i>
                            {{ __('legal_notice.section_16.title') }}
                        </h2>
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold">{{ __('legal_notice.section_16.subsection_1.title') }}</h4>
                                <p class="small mb-1">{{ __('legal_notice.section_16.subsection_1.privacy_officer') }}</p>
                                <p class="small mb-1"><i class="bi bi-envelope me-2"></i>{{ __('legal_notice.section_16.subsection_1.privacy_email') }}</p>
                                <p class="small"><i class="bi bi-telephone me-2"></i>{{ __('legal_notice.section_16.subsection_1.privacy_phone') }}</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold">{{ __('legal_notice.section_16.subsection_2.title') }}</h4>
                                <p class="small mb-1"><i class="bi bi-envelope me-2"></i>{{ __('legal_notice.section_16.subsection_2.general_email') }}</p>
                                <p class="small mb-1"><i class="bi bi-whatsapp me-2"></i>{{ __('legal_notice.section_16.subsection_2.whatsapp') }}</p>
                                <p class="small"><i class="bi bi-telephone me-2"></i>{{ __('legal_notice.section_16.subsection_2.phone') }}</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="h6 fw-bold">{{ __('legal_notice.section_16.subsection_3.title') }}</h4>
                                <ul class="list-unstyled small">
                                    <li>{{ __('legal_notice.section_16.subsection_3.weekdays') }}</li>
                                    <li>{{ __('legal_notice.section_16.subsection_3.saturdays') }}</li>
                                    <li>{{ __('legal_notice.section_16.subsection_3.sundays') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Date de mise à jour -->
                <div class="text-center text-muted small py-4">
                    <p>{{ __('legal_notice.section_19.effective_date') }}</p>
                    <p>{{ __('legal_notice.section_19.last_update') }}</p>
                    <p>{{ __('legal_notice.section_19.footer_text') }}</p>
                    <p class="fst-italic">{{ __('legal_notice.section_19.tagline') }}</p>
                    <p>{{ __('legal_notice.section_19.contact_invitation') }}</p>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Footer -->


<style>
    .py-md-6 {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }
    
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }
    
    .table th {
        font-weight: 600;
    }
</style>
@endsection