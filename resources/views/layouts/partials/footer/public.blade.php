{{-- layouts/partials/footer/public.blade.php --}}

<!-- BOUTON WHATSAPP FLOTTANT (toujours visible) -->
<!-- <a href="https://wa.me/393508724295?text={{ urlencode(__('whatsapp_message')) }}"
   class="floating-whatsapp"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="{{ __('footer.whatsapp_button') }}">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-tooltip">{{ __('footer.whatsapp_button') }}</span>
    <span class="whatsapp-pulse"></span>
</a> -->

<!-- BOUTON SCROLL TO TOP -->
<button id="scrollToTopBtn"
        class="scroll-to-top"
        aria-label="{{ __('footer.scroll_to_top') }}"
        title="{{ __('footer.scroll_to_top') }}">
    <i class="bi bi-chevron-up"></i>
</button>

<!-- FOOTER -->
<footer class="bg-light py-4 py-md-5 mt-auto">
    <div class="container">
        <!-- Section principale -->
        <div class="row g-4 mb-4">
            <!-- Colonne 1 : Logo et infos -->
            <div class="col-md-6 col-lg-3">
                <img class="mb-3"
                     src="{{ asset('assets/logo/logo.png') }}"
                     loading="lazy"
                     alt="{{ __('footer.logo_alt') }}"
                     width="80">

                <h5 class="h6 fw-bold">Canin-Felin</h5>
              
            </div>

            <!-- Colonne 2 : Description -->
            <div class="col-md-6 col-lg-3">
                <h5 class="h6 fw-bold">{{ __('footer.about_us') }}</h5>
                <p class="small text-secondary">
                    {{ __('footer.description') }}
                </p>
            </div>

            <!-- Colonne 3 : Liens rapides -->
            <div class="col-md-6 col-lg-3">
                <h5 class="h6 fw-bold">{{ __('footer.quick_links') }}</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}"
                           class="text-secondary text-decoration-none hover-link">
                            {{ __('footer.sale_link') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('qui-sommes-nous', ['lang' => app()->getLocale()]) }}"
                           class="text-secondary text-decoration-none hover-link">
                            {{ __('footer.about_link') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}"
                           class="text-secondary text-decoration-none hover-link">
                            {{ __('footer.contact_link') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('politique-confidentialite', ['lang' => app()->getLocale()]) }}"
                           class="text-secondary text-decoration-none hover-link">
                            {{ __('footer.privacy_link') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('politique-retour', ['lang' => app()->getLocale()]) }}"
                           class="text-secondary text-decoration-none hover-link">
                            {{ __('footer.returns_link') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Colonne 4 : Contact -->
            <div class="col-md-6 col-lg-3">
                <h5 class="h6 fw-bold">{{ __('footer.contact') }}</h5>
                <div class="d-flex flex-column gap-2">
                    <!-- <a href="https://wa.me/393508724295?text={{ urlencode(__('whatsapp_message')) }}"
                       class="btn btn-success btn-sm d-inline-flex align-items-center gap-2">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp
                    </a> -->
                    <a href="mailto:contact@canin-felin.com"
                       class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-2">
                        <i class="bi bi-envelope"></i>
                        contact@canin-felin.com
                    </a>

                  <a href="tel:0644695982"
   class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-2">
    <i class="bi bi-phone"></i>
    06 44 69 59 82
</a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <hr>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="small text-secondary mb-0">
                    <em><strong>{{ __('footer.copyright') }}</strong></em>
                </p>
            </div>
   
        </div>
    </div>
</footer>



<style>
    /* ========== BOUTON WHATSAPP FLOTTANT ========== */
    .floating-whatsapp {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: #25D366;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
        transition: all 0.3s ease;
        z-index: 1050;
        border: 2px solid white;
    }

    .floating-whatsapp i {
        font-size: 32px;
    }

    .floating-whatsapp:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(37, 211, 102, 0.4);
        color: white;
    }

    /* Effet de pulsation */
    .whatsapp-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #25D366;
        opacity: 0.6;
        z-index: -1;
        animation: pulse 2s ease-out infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 0.6;
        }
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    /* Tooltip */
    .whatsapp-tooltip {
        position: absolute;
        right: 75px;
        background: #333;
        color: white;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .whatsapp-tooltip::after {
        content: '';
        position: absolute;
        right: -6px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 6px;
        border-style: solid;
        border-color: transparent transparent transparent #333;
    }

    .floating-whatsapp:hover .whatsapp-tooltip {
        opacity: 1;
        visibility: visible;
        right: 80px;
    }

    /* ========== BOUTON SCROLL TO TOP ========== */
    .scroll-to-top {
        position: fixed;
        bottom: 110px;
        right: 40px;
        width: 45px;
        height: 45px;
        background: var(--primary-dark, #000000);
        color: white;
        border: 2px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1040;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .scroll-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    .scroll-to-top i {
        font-size: 22px;
    }

    .scroll-to-top:hover {
        background: var(--accent-orange, #fb8b43);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(251, 139, 67, 0.3);
        color: white;
    }

    /* ========== STYLES DU FOOTER ========== */
    .hover-link {
        transition: color 0.2s ease, transform 0.2s ease;
        display: inline-block;
    }

    .hover-link:hover {
        color: var(--accent-orange, #fb8b43) !important;
        transform: translateX(3px);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .floating-whatsapp {
            bottom: 20px;
            right: 20px;
            width: 55px;
            height: 55px;
        }

        .floating-whatsapp i {
            font-size: 28px;
        }

        .scroll-to-top {
            bottom: 95px;
            right: 20px;
            width: 40px;
            height: 40px;
        }

        .scroll-to-top i {
            font-size: 20px;
        }

        .whatsapp-tooltip {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .floating-whatsapp {
            bottom: 15px;
            right: 15px;
            width: 50px;
            height: 50px;
        }

        .floating-whatsapp i {
            font-size: 26px;
        }

        .scroll-to-top {
            bottom: 80px;
            right: 15px;
            width: 38px;
            height: 38px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========== SCROLL TO TOP ==========
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        if (scrollToTopBtn) {
            // Afficher/masquer le bouton selon le scroll
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.add('visible');
                } else {
                    scrollToTopBtn.classList.remove('visible');
                }
            });

            // Action de scroll vers le haut
            scrollToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // ========== ANIMATION WHATSAPP AU SCROLL ==========
        const whatsappBtn = document.querySelector('.floating-whatsapp');
        let lastScroll = 0;

        if (whatsappBtn) {
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;

                if (currentScroll > lastScroll && currentScroll > 200) {
                    // Scroll vers le bas - réduire légèrement l'opacité
                    whatsappBtn.style.opacity = '0.8';
                } else {
                    // Scroll vers le haut - pleine opacité
                    whatsappBtn.style.opacity = '1';
                }

                lastScroll = currentScroll;
            });
        }

        // ========== AJUSTEMENT DE LA POSITION DU SCROLL TO TOP ==========
        function adjustScrollToTopPosition() {
            const footer = document.querySelector('footer');
            const scrollBtn = document.getElementById('scrollToTopBtn');

            if (footer && scrollBtn) {
                const footerRect = footer.getBoundingClientRect();
                const windowHeight = window.innerHeight;

                // Si le footer est visible, ajuster la position du bouton
                if (footerRect.top < windowHeight) {
                    const overlap = windowHeight - footerRect.top;
                 //   scrollBtn.style.bottom = (overlap + 20) + 'px';
                } else {
                    scrollBtn.style.bottom = '110px';
                }
            }
        }

        window.addEventListener('scroll', adjustScrollToTopPosition);
        window.addEventListener('resize', adjustScrollToTopPosition);
    });
</script>