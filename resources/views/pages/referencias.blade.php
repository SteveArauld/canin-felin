@extends('layouts.app')

@section('title', __('references.title'))

@push('styles')

@endpush

@section('content')
    <!-- Hero Section -->
    <section class="py-5 py-md-6 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="display-4 fw-bold text-dark">
                        {{ __('references.main_title') }}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages - Grille -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @php
                    // IMAGES FICTIVES - Remplacent les images manquantes
                    // Utilisation d'Unsplash + LoremFlick pour des images réalistes et gratuites
                    $testimonials = [
                        [
                            'img' => 'https://images.pexels.com/photos/1805164/pexels-photo-1805164.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Famille avec maltipoo',
                            'text' => 'testimonial_1',
                            'author' => 'testimonial_1_author',
                            'date' => 'testimonial_1_date'
                        ],
                        [
                            'video' => 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4',
                            'text' => 'testimonial_2',
                            'author' => 'testimonial_2_author',
                            'date' => 'testimonial_2_date'
                        ],
                        [
                            'img' => 'https://images.pexels.com/photos/1591160/pexels-photo-1591160.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Maltipoo femelle',
                            'text' => 'testimonial_3',
                            'author' => 'testimonial_3_author',
                            'date' => 'testimonial_3_date'
                        ],
                        [
                            'img' => 'https://images.pexels.com/photos/4587955/pexels-photo-4587955.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Carlin heureux',
                            'text' => 'testimonial_4',
                            'author' => 'testimonial_4_author',
                            'date' => 'testimonial_4_date'
                        ],
                        [
                            'img' => 'https://images.pexels.com/photos/3608263/pexels-photo-3608263.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Cane Corso élégant',
                            'text' => 'testimonial_5',
                            'author' => 'testimonial_5_author',
                            'date' => 'testimonial_5_date'
                        ],
                        [
                            'video' => 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_2mb.mp4',
                            'text' => 'testimonial_6',
                            'author' => 'testimonial_6_author',
                            'date' => 'testimonial_6_date'
                        ],
                        [
                            'img' => 'https://images.pexels.com/photos/1805165/pexels-photo-1805165.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Labrador joueur',
                            'text' => 'testimonial_7',
                            'author' => 'testimonial_7_author',
                            'date' => 'testimonial_7_date'
                        ],
                        [
                            'img' => 'https://images.pexels.com/photos/2664417/pexels-photo-2664417.jpeg?w=400&h=300&fit=crop',
                            'alt' => 'Teckel adorable',
                            'text' => 'testimonial_8',
                            'author' => 'testimonial_8_author',
                            'date' => 'testimonial_8_date'
                        ],
                    ];
                @endphp

                @foreach($testimonials as $index => $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-scale transition">
                            @if(isset($item['video']))
                                <!-- Vidéo fictive -->
                                <div class="ratio ratio-16x9">
                                    <video controls class="object-fit-cover" poster="https://images.pexels.com/photos/4587962/pexels-photo-4587962.jpeg?w=400&h=300&fit=crop">
                                        <source src="{{ $item['video'] }}" type="video/mp4">
                                        {{ __('references.video_not_supported') }}
                                    </video>
                                </div>
                            @else
                                <!-- Image fictive -->
                                <div class="card-img-top overflow-hidden" style="height: 250px;">
                                    <img src="{{ $item['img'] }}"
                                         class="w-100 h-100 object-fit-cover"
                                         alt="{{ $item['alt'] }}"
                                         loading="lazy">
                                </div>
                            @endif

                            <div class="card-body text-center p-4">
                                <i class="bi bi-quote fs-1 mb-3 d-block" style="color: var(--accent-orange);"></i>

                                <p class="fst-italic mb-3 text-secondary">
                                    "{{ __('references.'.($item['text'] ?? 'testimonial_'.($index+1))) }}"
                                </p>

                                <div class="rating mb-2">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>

                                <p class="fw-bold mb-1">
                                    {{ __('references.'.($item['author'] ?? 'testimonial_'.($index+1).'_author')) }}
                                </p>
                                <small class="text-muted">
                                    {{ __('references.'.($item['date'] ?? 'testimonial_'.($index+1).'_date')) }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Témoignages supplémentaires sans image -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @php
                    $additionalTestimonials = [
                        ['text' => 'testimonial_9', 'author' => 'testimonial_9_author', 'date' => 'testimonial_9_date'],
                        ['text' => 'testimonial_10', 'author' => 'testimonial_10_author', 'date' => 'testimonial_10_date'],
                    ];
                @endphp

                @foreach($additionalTestimonials as $item)
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <i class="bi bi-quote fs-1 mb-3 d-block" style="color: var(--accent-orange);"></i>

                                <div class="rating mb-2">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                </div>

                                <p class="fst-italic mb-3 text-secondary">
                                    "{{ __($item['text']) }}"
                                </p>

                                <p class="fw-bold mb-1">
                                    {{ __($item['author']) }}
                                </p>
                                <small class="text-muted">
                                    {{ __($item['date']) }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Formulaire de témoignage -->
    <section class="py-5 py-md-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h3 fw-bold text-center mb-4" style="color: var(--accent-orange);">
                                <i class="bi bi-pencil-square me-2"></i>
                                {{ __('references.share_experience') }}
                            </h2>

                            <p class="text-center text-secondary mb-4">
                                {{ __('references.form_description') }}
                            </p>

                            <form id="testimonialForm" class="needs-validation" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            {{ __('references.form_name') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person"></i>
                                        </span>
                                            <input type="text"
                                                   class="form-control border-start-0"
                                                   name="name"
                                                   placeholder="Sophie Martin"
                                                   required>
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ __('form.validation.required') }}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            {{ __('references.form_email') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                            <input type="email"
                                                   class="form-control border-start-0"
                                                   name="email"
                                                   placeholder="sophie@exemple.fr"
                                                   required>
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ __('form.validation.email_invalid') }}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">
                                            {{ __('references.form_upload') }}
                                        </label>
                                        <input type="file"
                                               class="form-control"
                                               name="photo"
                                               accept="image/jpeg,image/png,image/gif,image/webp"
                                               data-max-size="5242880">
                                        <div class="form-text">
                                            <i class="bi bi-info-circle me-1"></i>
                                            JPG, PNG, GIF ou WEBP. Max 5 Mo.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">
                                            {{ __('references.form_review') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control"
                                                  name="review"
                                                  rows="4"
                                                  placeholder="Partagez votre expérience avec votre nouveau compagnon..."
                                                  required></textarea>
                                        <div class="invalid-feedback">
                                            {{ __('form.validation.required') }}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="consentCheck" required>
                                            <label class="form-check-label small" for="consentCheck">
                                                J'accepte que mon témoignage soit publié sur le site et les réseaux sociaux.
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-dark btn-lg w-100 py-3 rounded"
                                                id="submitBtn">
                                            <i class="bi bi-send me-2"></i>
                                            <span class="btn-text">{{ __('references.form_button') }}</span>
                                            <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Message de succès -->
                            <div id="successMessage" class="alert alert-success mt-4 d-none" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ __('references.form_success') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appel à l'action -->
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h3 class="h2 fw-bold mb-3">{{ __('references.cta_title') }}</h3>
            <p class="lead mb-4 opacity-75">{{ __('references.cta_description') }}</p>
            <a href="{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}"
               class="btn btn-outline-light btn-lg px-5 py-3 rounded">
                <i class="bi bi-paw me-2"></i>
                {{ __('references.see_puppies') }}
            </a>
        </div>
    </section>

    <!-- Toast notification -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1090;">
        <div id="notificationToast" class="toast align-items-center text-white border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

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
            box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
        }

        video {
            border-radius: 1rem 1rem 0 0;
            background: #000;
        }

        .rating i {
            font-size: 14px;
            margin: 0 1px;
        }

        @media (max-width: 768px) {
            .py-md-6 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .display-4 {
                font-size: 2rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('testimonialForm');

            if (form) {
                const submitBtn = document.getElementById('submitBtn');
                const btnText = submitBtn.querySelector('.btn-text');
                const spinner = submitBtn.querySelector('.spinner-border');
                const successMessage = document.getElementById('successMessage');

                // Toast
                const toastElement = document.getElementById('notificationToast');
                let toast;

                if (toastElement && typeof bootstrap !== 'undefined') {
                    toast = new bootstrap.Toast(toastElement, { delay: 4000 });
                }

                function showToast(message, type = 'success') {
                    const toastMsg = document.getElementById('toastMessage');
                    if (toastMsg) toastMsg.textContent = message;

                    toastElement.classList.remove('bg-success', 'bg-danger', 'bg-warning');
                    toastElement.classList.add(`bg-${type}`);

                    if (toast) toast.show();
                }

                // Validation fichier
                const fileInput = form.querySelector('input[type="file"]');
                if (fileInput) {
                    fileInput.addEventListener('change', function() {
                        const maxSize = parseInt(this.dataset.maxSize) || 5242880; // 5 Mo
                        const file = this.files[0];

                        if (file && file.size > maxSize) {
                            this.value = '';
                            showToast('Le fichier est trop volumineux. Maximum 5 Mo.', 'danger');
                        }
                    });
                }

                // Soumission
                form.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    successMessage.classList.add('d-none');

                    if (!form.checkValidity()) {
                        e.stopPropagation();
                        form.classList.add('was-validated');
                        showToast('Veuillez remplir tous les champs obligatoires.', 'danger');
                        return;
                    }

                    const consentCheck = document.getElementById('consentCheck');
                    if (!consentCheck.checked) {
                        showToast('Veuillez accepter la publication de votre témoignage.', 'warning');
                        return;
                    }

                    form.classList.add('was-validated');

                    // Loading
                    submitBtn.disabled = true;
                    btnText.textContent = 'Envoi en cours...';
                    spinner.classList.remove('d-none');

                    try {
                        // Simulation d'envoi (à remplacer par votre logique réelle)
                        await new Promise(resolve => setTimeout(resolve, 1500));

                        showToast('Merci pour votre témoignage ! Il sera publié après validation.', 'success');
                        successMessage.classList.remove('d-none');
                        form.reset();
                        form.classList.remove('was-validated');

                    } catch (error) {
                        showToast('Une erreur est survenue. Veuillez réessayer.', 'danger');
                    } finally {
                        submitBtn.disabled = false;
                        btnText.textContent = 'PUBLIEZ VOTRE AVIS MAINTENANT';
                        spinner.classList.add('d-none');
                    }
                });
            }
        });
    </script>
@endsection