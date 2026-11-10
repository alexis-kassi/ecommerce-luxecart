@extends('layouts.app')

@section('content')
    <!-- 1. Hero Split Slider Section (Même design que la page À Propos avec Slider d'Images) -->
    <section class="about-split-hero home-hero-section" id="home-hero">
        <div class="blob-bg blob-1"></div>
        <div class="blob-bg blob-2"></div>
        <div class="container about-split-wrapper animate-fade-up">

            <!-- Côté gauche : Texte & Valeur ajoutée -->
            <div class="about-split-left">
                <span class="about-hero-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    Collection Exclusivité LuxeCart
                </span>

                <h1 class="about-split-title">
                    L'Élégance <span style="font-size: 45px">au Quotidien: </span>
                    Le style d'exception à votre portée.  
                </h1>

                <p class="about-split-desc">
                    Découvrez une sélection exclusive de mode, maroquinerie, accessoires et technologie haut de gamme. Importés des plus grandes marques internationales et livrés chez vous en un temps record partout en Côte d'Ivoire.
                </p><br>

                <div class="about-split-stats">
                    <div class="stat-item">
                        <span class="stat-value">5K<span>+</span></span>
                        <span class="stat-label">Articles en boutique</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-value">100<span>%</span></span>
                        <span class="stat-label">Authenticité certifiée</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-value">24<span>h</span></span>
                        <span class="stat-label">Livraison express</span>
                    </div>
                </div>

                <div class="about-split-cta">
                    <a href="{{ route('products.index') }}" class="btn-primary about-cta-main">
                        Explorer la boutique <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('nouveautes') }}" class="about-cta-secondary">
                        Voir les nouveautés <i class="fa-solid fa-bolt" style="color: #f59e0b;"></i>
                    </a>
                </div>
            </div>

            <!-- Côté droit : Slider Image + Cartes Flottantes -->
            <div class="about-split-right">
                <div class="about-media-wrap">
                    <div class="about-media-main home-hero-slider-main">

                        <!-- Slides d'images -->
                        <div class="home-hero-slide active">
                            <img src="{{ asset('images/imgH1.jpg') }}" alt="LuxeCart - Prêt-à-porter & Mode">
                            <div class="home-slide-caption">
                                <span class="home-slide-badge">Mode & Tendances</span>
                                <h4>Collection Prêt-à-Porter</h4>
                            </div>
                        </div>

                        <div class="home-hero-slide">
                            <img src="{{ asset('images/vet41.jpg') }}" alt="LuxeCart - Accessoires de Luxe">
                            <div class="home-slide-caption">
                                <span class="home-slide-badge">Accessoires & Bijoux</span>
                                <h4>Maroquinerie & Montres</h4>
                            </div>
                        </div>

                        <div class="home-hero-slide">
                            <img src="{{ asset('images/imgH3.jpg') }}" alt="LuxeCart - High-Tech & Électronique">
                            <div class="home-slide-caption">
                                <span class="home-slide-badge">High-Tech & Son</span>
                                <h4>Appareils & Électronique</h4>
                            </div>
                        </div>

                        <div class="home-hero-slide">
                            <img src="{{ asset('images/imgHsac.jpg') }}" alt="LuxeCart - Chaussures & Sneakers">
                            <div class="home-slide-caption">
                                <span class="home-slide-badge">Sneakers & Chaussures</span>
                                <h4>Style Urbain & Sportswear</h4>
                            </div>
                        </div>

                        <!-- Contrôles Flèches intégrées au slider -->
                        <button class="hero-split-nav hero-split-prev" id="heroSliderPrev" aria-label="Slide précédente">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>

                        <button class="hero-split-nav hero-split-next" id="heroSliderNext" aria-label="Slide suivante">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <!-- Indicateurs (Dots) -->
                        <div class="hero-split-dots" id="heroSliderDots">
                            <button class="split-dot active" data-index="0" aria-label="Slide 1"></button>
                            <button class="split-dot" data-index="1" aria-label="Slide 2"></button>
                            <button class="split-dot" data-index="2" aria-label="Slide 3"></button>
                            <button class="split-dot" data-index="3" aria-label="Slide 4"></button>
                        </div>
                    </div>

                    <!-- Fond coloré incliné d'accentuation (identique à apropos) -->
                    <div class="about-media-accent"></div>
                </div>

                <!-- Carte flottante 1 : Note / Avis clients -->
                <div class="float-card float-card-review">
                    <div class="stars-row">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review-note">
                        <span>4.9</span>/5
                    </div>
                    <p>+500 clients satisfaits</p>
                </div>

                <!-- Carte flottante 2 : Livraison express -->
                <div class="float-card float-card-ship">
                    <div class="ship-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div>
                        <p><strong>Livraison offerte</strong></p>
                        <span>À Abidjan dès 30 000 FCFA</span>
                    </div>
                </div>

                <!-- Carte flottante 3 : Badge qualité authenticité -->
                <div class="float-card float-card-quality">
                    <i class="fa-solid fa-award"></i>
                    <span>Produits <strong>100% Authentiques</strong></span>
                </div>
            </div>

        </div>
    </section>

    <style>
        /* ========== HOME SPLIT HERO & SLIDER ENHANCEMENTS ========== */
        .home-hero-section {
            padding-top: 8.5rem;
            padding-bottom: 5.5rem;
        }

        .home-hero-slider-main {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 32px;
            background: transparent !important;
            border: none !important;
            outline: none !important;
            box-shadow: 0 20px 50px -15px rgba(99, 102, 241, 0.22) !important;
        }

        .about-media-main.home-hero-slider-main {
            border: none !important;
            background: transparent !important;
        }

        .home-hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.75s ease-in-out, visibility 0.75s ease-in-out;
            z-index: 1;
            border-radius: 32px;
            overflow: hidden;
        }

        .home-hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 2;
        }

        .home-hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 32px;
            border: none !important;
            transform: scale(1.04);
            transition: transform 6s ease-out;
        }

        .home-hero-slide.active img {
            transform: scale(1);
        }

        /* Overlay texte du slide (sans fond noir agressif sur la bordure) */
        .home-slide-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2.5rem 1.8rem 1.6rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.35) 0%, rgba(0, 0, 0, 0.08) 55%, transparent 100%);
            color: #ffffff;
            z-index: 3;
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            pointer-events: none;
            border-bottom-left-radius: 32px;
            border-bottom-right-radius: 32px;
        }

        .home-slide-badge {
            display: inline-block;
            width: fit-content;
            background: rgba(99, 102, 241, 0.85);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.25rem 0.65rem;
            border-radius: 50px;
            backdrop-filter: blur(4px);
        }

        .home-slide-caption h4 {
            font-family: var(--font-outfit);
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        /* Flèches de navigation du slider */
        .hero-split-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            color: #0f172a;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            opacity: 0;
        }

        .home-hero-slider-main:hover .hero-split-nav {
            opacity: 1;
        }

        .hero-split-nav:hover {
            background: #ffffff;
            color: var(--primary);
            transform: translateY(-50%) scale(1.12);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.35);
        }

        .hero-split-prev {
            left: 1rem;
        }

        .hero-split-next {
            right: 1rem;
        }

        /* Indicateurs Dots */
        .hero-split-dots {
            position: absolute;
            bottom: 1rem;
            right: 1.5rem;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .split-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.45);
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0;
        }

        .split-dot.active {
            width: 24px;
            border-radius: 6px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 991px) {
            .home-hero-section {
                padding-top: 6.5rem;
                padding-bottom: 4rem;
            }
            .hero-split-nav {
                opacity: 1;
            }
        }
    </style>

    <!-- Script du slider d'images Hero -->
    <script>
        (function () {
            const slides = document.querySelectorAll('.home-hero-slide');
            const dots = document.querySelectorAll('.split-dot');
            const prevBtn = document.getElementById('heroSliderPrev');
            const nextBtn = document.getElementById('heroSliderNext');
            const container = document.querySelector('.home-hero-slider-main');

            if (!slides.length) return;

            let current = 0;
            let timer = null;
            const total = slides.length;

            function goToSlide(index) {
                slides[current].classList.remove('active');
                if (dots[current]) dots[current].classList.remove('active');

                current = (index + total) % total;

                slides[current].classList.add('active');
                if (dots[current]) dots[current].classList.add('active');
            }

            function nextSlide() {
                goToSlide(current + 1);
            }

            function prevSlide() {
                goToSlide(current - 1);
            }

            function startAutoPlay() {
                stopAutoPlay();
                timer = setInterval(nextSlide, 4500);
            }

            function stopAutoPlay() {
                if (timer) clearInterval(timer);
            }

            if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
            if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); startAutoPlay(); });

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => {
                    goToSlide(idx);
                    startAutoPlay();
                });
            });

            if (container) {
                container.addEventListener('mouseenter', stopAutoPlay);
                container.addEventListener('mouseleave', startAutoPlay);

                // Support Touch Swipe
                let touchStartX = 0;
                let touchEndX = 0;
                container.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                container.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        nextSlide();
                        startAutoPlay();
                    } else if (touchEndX - touchStartX > 50) {
                        prevSlide();
                        startAutoPlay();
                    }
                }, { passive: true });
            }

            startAutoPlay();
        })();
    </script>


    <!-- 2. Trust Indicators Section (Nouveau) -->
    <section style="background-color: white; padding: 3rem 0; border-bottom: 1px solid #f1f5f9;">

        <div class="container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
            <div style="padding: 1rem;">
                <i class="fa-solid fa-truck-fast" style="font-size: 1.8rem; color: #0f172a; margin-bottom: 1rem;"></i>
                <h3 style="font-family: var(--font-outfit); font-size: 1.1rem; color: #0f172a; font-weight: 600; margin-bottom: 0.5rem;">Livraison Rapide</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Partout en Côte d'Ivoire en un temps record.</p>
            </div>

            <div style="padding: 1rem;">
                <i class="fa-solid fa-shield-halved" style="font-size: 1.8rem; color: #0f172a; margin-bottom: 1rem;"></i>
                <h3 style="font-family: var(--font-outfit); font-size: 1.1rem; color: #0f172a; font-weight: 600; margin-bottom: 0.5rem;">Paiement Sécurisé</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Payez à la livraison ou via mobile money.</p>
            </div>

            <div style="padding: 1rem;">
                <i class="fa-regular fa-star" style="font-size: 1.8rem; color: #0f172a; margin-bottom: 1rem;"></i>
                <h3 style="font-family: var(--font-outfit); font-size: 1.1rem; color: #0f172a; font-weight: 600; margin-bottom: 0.5rem;">Qualité Premium</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Une sélection rigoureuse des meilleurs articles.</p>
            </div>

            <div style="padding: 1rem;">
                <i class="fa-solid fa-headset" style="font-size: 1.8rem; color: #0f172a; margin-bottom: 1rem;"></i>
                <h3 style="font-family: var(--font-outfit); font-size: 1.1rem; color: #0f172a; font-weight: 600; margin-bottom: 0.5rem;">Support 24/7</h3>
                <p style="color: #64748b; font-size: 0.95rem;">Une équipe toujours à votre écoute.</p>
            </div>

        </div>
        
    </section>

    <!-- 3. Categories Section -->
    <section class="categories-preview animate-fade-up" id="categories" style="padding: 5rem 0; background-color: #f8fafc;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: #0f172a; font-weight: 700; margin-bottom: 0.5rem;">Explorez nos collections</h2>
                <p style="color: #64748b; font-size: 1rem;">Trouvez exactement ce que vous cherchez.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; max-width: 1000px; margin: 0 auto;">
                
                <a href="{{ route('home') }}?category=Électronique#featured"
                   style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2.5rem 1rem; border-radius: 16px; border: 1px solid {{ $category == 'Électronique' ? '#0f172a' : 'transparent' }}; background-color: white; text-decoration: none; color: #0f172a; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" 
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px -1px rgba(0,0,0,0.05)';">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: #0f172a; font-size: 1.5rem; transition: background-color 0.3s ease;">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <span style="font-weight: 600; font-size: 1.1rem;">Électronique</span>
                </a>

                <a href="{{ route('home') }}?category=Vêtement#featured"
                   style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2.5rem 1rem; border-radius: 16px; border: 1px solid {{ $category == 'Vêtement' ? '#0f172a' : 'transparent' }}; background-color: white; text-decoration: none; color: #0f172a; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" 
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px -1px rgba(0,0,0,0.05)';">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: #0f172a; font-size: 1.5rem; transition: background-color 0.3s ease;">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <span style="font-weight: 600; font-size: 1.1rem;">Vêtements</span>
                </a>

                <a href="{{ route('home') }}?category=Chaussure#featured"
                   style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2.5rem 1rem; border-radius: 16px; border: 1px solid {{ $category == 'Chaussure' ? '#0f172a' : 'transparent' }}; background-color: white; text-decoration: none; color: #0f172a; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" 
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px -1px rgba(0,0,0,0.05)';">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: #0f172a; font-size: 1.5rem; transition: background-color 0.3s ease;">
                        <i class="fa-solid fa-shoe-prints"></i>
                    </div>
                    <span style="font-weight: 600; font-size: 1.1rem;">Chaussures</span>
                </a>

                <a href="{{ route('home') }}?category=Accessoires Mode#featured"
                   style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2.5rem 1rem; border-radius: 16px; border: 1px solid {{ $category == 'Accessoires Mode' ? '#0f172a' : 'transparent' }}; background-color: white; text-decoration: none; color: #0f172a; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" 
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px -1px rgba(0,0,0,0.05)';">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; color: #0f172a; font-size: 1.5rem; transition: background-color 0.3s ease;">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <span style="font-weight: 600; font-size: 1.1rem;">Accessoires</span>
                </a>
                
            </div>
        </div>
    </section>

    <!-- 4. Featured Products Section -->
    <section id="featured" class="featured-section">
        <div class="container">



            <!-- En-tête de section -->
            <div class="featured-header scroll-reveal-header">
                <div class="featured-header-left">
                    <span class="section-label">
                        <i class="fa-solid fa-fire-flame-curved"></i>
                        @if($category) Collection {{ $category }} @else Sélection du moment @endif
                    </span>
                    @if($category)
                        <h2 class="featured-title">Collection <span class="featured-title-accent">{{ $category }}</span></h2>
                        <p class="featured-subtitle">Découvrez notre sélection exclusive dans cette catégorie.</p>
                    @else
                        <h2 class="featured-title">Nos Nouveautés</h2>
                        <p class="featured-subtitle">Les dernières pièces ajoutées à notre catalogue, sélectionnées pour vous.</p>
                    @endif
                </div>



                <div class="featured-header-right">
                    <a href="{{ $category ? route('home').'#featured' : '/produits' }}" class="btn-see-all">
                        @if($category)
                            <i class="fa-solid fa-xmark"></i> Tout voir
                        @else
                            Toute la boutique <i class="fa-solid fa-arrow-right"></i>
                        @endif
                    </a>
                </div>
            </div>


            <!-- Grille produits -->
            <div class="products-grid">
                @foreach($produits as $loop_produit)
                    @php $isNew = $loop_produit->created_at && $loop_produit->created_at->diffInDays(now()) <= 30; @endphp
                    <div class="product-card scroll-reveal-card"
                         style="--reveal-index: {{ $loop->index }};"
                         id="product-{{ $loop_produit->id }}"
                         data-id="{{ $loop_produit->id }}"
                         data-nom="{{ addslashes($loop_produit->nom) }}"
                         data-desc="{{ addslashes(Str::limit($loop_produit->description ?? 'Produit exclusif LuxeCart.', 200)) }}"
                         data-categorie="{{ $loop_produit->categorie }}"
                         data-prix="{{ number_format($loop_produit->prix, 0, ',', ' ') }}"
                         data-stock="{{ $loop_produit->stock }}"
                         data-image="{{ asset($loop_produit->image ?? 'images/placeholder-product.jpg') }}">

                        <!-- Image seule + overlay hover -->
                        <div class="product-image-wrap">
                            <img src="{{ asset($loop_produit->image ?? 'images/placeholder-product.jpg') }}"
                                 alt="{{ $loop_produit->nom }}"
                                 class="product-img">

                            <!-- Bouton Favoris -->
                            @php $isFav = isset(session('wishlist', [])[$loop_produit->id]); @endphp
                            <button type="button" 
                                    class="btn-wishlist-toggle {{ $isFav ? 'active' : '' }}" 
                                    data-product-id="{{ $loop_produit->id }}" 
                                    onclick="toggleWishlist({{ $loop_produit->id }}, this)" 
                                    title="{{ $isFav ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                <i class="{{ $isFav ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                            </button>

                            <!-- Badges -->
                            <div class="product-badges">
                                <span class="badge-category">{{ $loop_produit->categorie }}</span>
                                @if($isNew)
                                    <span class="badge-new">✦ Nouveau</span>
                                @endif
                            </div>

                            <!-- Stock indicator -->
                            @if($loop_produit->stock <= 3 && $loop_produit->stock > 0)
                                <span class="badge-stock-low">⚠ Derniers {{ $loop_produit->stock }}</span>
                            @endif

                            <!-- Hover Overlay avec le nom -->
                            <div class="product-hover-overlay">
                                <span class="product-hover-name">{{ $loop_produit->nom }}</span>
                                <span class="product-hover-price">{{ number_format($loop_produit->prix, 0, ',', ' ') }} FCFA</span>
                                <span class="product-hover-cta"><i class="fa-regular fa-eye"></i> Voir le produit</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <style>
        /* ===== FEATURED SECTION ===== */
        .featured-section {
            padding: 6rem 0 5rem;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }
        /* Header */
        .featured-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .featured-header.scroll-reveal-header {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .featured-header.scroll-reveal-header.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #fff7ed, #fef3c7);
            color: #d97706;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
            border: 1px solid #fde68a;
        }
        .featured-title {
            font-family: var(--font-outfit);
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.5rem;
            line-height: 1.2;
        }
        .featured-title-accent {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .featured-subtitle {
            color: #64748b;
            font-size: 1rem;
            margin: 0;
        }
        .btn-see-all {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #0f172a;
            color: white;
            padding: 0.75rem 1.6rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        .btn-see-all:hover {
            background: #334155;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15,23,42,0.2);
        }

        /* Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 4rem;
        }

        /* Card - image only with fluid scroll reveal */
        .product-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            cursor: pointer;
            position: relative;
        }

        .product-card.scroll-reveal-card {
            opacity: 0;
            transform: translateY(38px) scale(0.96);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.35s ease;
            transition-delay: calc(var(--reveal-index, 0) * 0.08s);
            will-change: opacity, transform;
        }

        .product-card.scroll-reveal-card.revealed {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .product-card.scroll-reveal-card.revealed:hover {
            transform: translateY(-8px) scale(1);
            box-shadow: 0 24px 48px rgba(0,0,0,0.15);
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.35s ease;
            transition-delay: 0s !important;
        }

        /* Image wrapper - full card */
        .product-image-wrap {
            position: relative;
            aspect-ratio: 3/4;
            overflow: hidden;
            background: #f1f5f9;
            display: block;
            width: 100%;
            height: 100%;
        }
        .product-img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .product-card:hover .product-img { transform: scale(1.08); }

        /* Badges */
        .product-badges {
            position: absolute;
            top: 0.85rem;
            left: 0.85rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            z-index: 3;
        }
        .badge-category {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(8px);
            color: #0f172a;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
        }
        .badge-new {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
        }
        .badge-stock-low {
            position: absolute;
            top: 0.85rem;
            right: 0.85rem;
            background: rgba(255,247,237,0.95);
            color: #d97706;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            border: 1px solid #fde68a;
            z-index: 3;
        }

        /* ===== HOVER OVERLAY NOM PRODUIT ===== */
        .product-hover-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem 1.2rem 1.2rem;
            background: linear-gradient(to top,
                rgba(9, 13, 25, 0.92) 0%,
                rgba(9, 13, 25, 0.6) 55%,
                transparent 100%);
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.4s ease, transform 0.4s ease;
            z-index: 4;
        }
        .product-card:hover .product-hover-overlay {
            opacity: 1;
            transform: translateY(0);
        }
        .product-hover-name {
            font-family: var(--font-outfit, 'Outfit', sans-serif);
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
            letter-spacing: -0.01em;
        }
        .product-hover-price {
            font-size: 0.88rem;
            font-weight: 600;
            color: #a5b4fc;
            letter-spacing: 0.01em;
        }
        .product-hover-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            margin-top: 0.25rem;
            letter-spacing: 0.02em;
        }

        /* CTA bas */
        .featured-cta {
            text-align: center;
            padding-top: 1rem;
        }
        .btn-cta-full {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #0f172a, #334155);
            color: white;
            padding: 1.1rem 3rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(15,23,42,0.25);
            margin-bottom: 1rem;
        }
        .btn-cta-full:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(15,23,42,0.3);
        }
        .btn-cta-full i { transition: transform 0.3s ease; }
        .btn-cta-full:hover i { transform: translateX(5px); }
        .featured-cta-sub {
            color: #94a3b8;
            font-size: 0.88rem;
            margin: 0;
        }

    </style>

        <!-- 5. Offres du Jour Section (Ventes Flash) -->
    <section id="offres-du-jour" class="daily-deals-section">
        <div class="container">
            <!-- Header Section -->
            <div class="daily-deals-header scroll-reveal-header">
                <div class="deals-header-left">
                    <span class="deals-badge">
                        <i class="fa-solid fa-bolt-lightning"></i> Vente Flash Exclusive
                    </span>
                    <h2 class="deals-title">Nos Offres du Jour</h2>
                    <p class="deals-subtitle">Profitez de réductions exceptionnelles valables aujourd'hui seulement. Stocks très limités !</p>
                </div>
                
                <!-- Live Countdown Timer -->
                <div class="deals-countdown-box">
                    <div class="countdown-header">
                        <i class="fa-regular fa-clock"></i>
                        <span>Expire dans :</span>
                    </div>
                    <div class="countdown-timer" id="dailyDealsCountdown">
                        <div class="timer-segment">
                            <span class="timer-val" id="dealTimerHours">09</span>
                            <span class="timer-unit">Heures</span>
                        </div>
                        <span class="timer-sep">:</span>
                        <div class="timer-segment">
                            <span class="timer-val" id="dealTimerMinutes">42</span>
                            <span class="timer-unit">Min</span>
                        </div>
                        <span class="timer-sep">:</span>
                        <div class="timer-segment">
                            <span class="timer-val" id="dealTimerSeconds">18</span>
                            <span class="timer-unit">Sec</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grille des Offres du Jour -->
             <!--OFFRE DU JOUR-->
             <!--SECTION GRID OFFRE DU JOUR-->
            <div class="deals-grid">

                @forelse($offresDuJour as $deal)
                    @php
                        $discounts = [25, 20, 30];
                        $discountPct = $discounts[$loop->index % 3];
                        $oldPrice = round($deal->prix * (1 + ($discountPct / 100)));
                        $economie = $oldPrice - $deal->prix;
                    @endphp
                    
                    <div class="deal-card scroll-reveal-card" style="--reveal-index: {{ $loop->index }};">
                        <div class="deal-card-media">
                            <a href="{{ route('products.show', $deal->id) }}">
                                <img src="{{ asset($deal->image ?? 'images/placeholder-product.jpg') }}" 
                                     alt="{{ $deal->nom }}" 
                                     class="deal-img">
                            </a>

                            <!-- Bouton Favoris -->
                            @php $isFavDeal = isset(session('wishlist', [])[$deal->id]); @endphp
                            <button type="button" 
                                    class="btn-wishlist-toggle {{ $isFavDeal ? 'active' : '' }}" 
                                    data-product-id="{{ $deal->id }}" 
                                    onclick="toggleWishlist({{ $deal->id }}, this)" 
                                    title="{{ $isFavDeal ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                <i class="{{ $isFavDeal ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                            </button>

                            <div class="deal-badges">
                                <span class="deal-badge-discount">-{{ $discountPct }}%</span>
                                <span class="deal-badge-cat">{{ $deal->categorie }}</span>
                            </div>
                            <div class="deal-pill-live">
                                <span class="deal-live-dot"></span>
                                <span>Deal du Jour</span>
                            </div>
                        </div>

                        <div class="deal-card-content">
                            <div class="deal-meta">
                                <div class="deal-stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span class="deal-rating-note">4.9/5 ({{ 28 + ($deal->id * 9) % 55 }} avis)</span>
                            </div>

                            <h3 class="deal-name">
                                <a href="{{ route('products.show', $deal->id) }}">{{ $deal->nom }}</a>
                            </h3>

                            <!-- Description du produit -->
                            <p class="deal-description">
                                {{ $deal->description }}
                            </p>

                            <!-- Barre de stock limité -->
                            <div class="deal-stock-bar-wrap">
                                <div class="deal-stock-info">
                                    <span class="stock-label"><i class="fa-solid fa-fire"></i> Disponibilité immédiate</span>
                                    <span class="stock-qty">Plus que <strong>{{ $deal->stock }}</strong> en stock</span>
                                </div>
                                <div class="deal-progress-track">
                                    <div class="deal-progress-fill" style="width: {{ min(100, max(25, $deal->stock * 12)) }}%;"></div>
                                </div>
                            </div>

                            <!-- Tarification -->
                            <div class="deal-price-wrapper">
                                <div class="deal-prices">
                                    <span class="deal-current-price">{{ number_format($deal->prix, 0, ',', ' ') }} <small>FCFA</small></span>
                                    <span class="deal-old-price">{{ number_format($oldPrice, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <span class="deal-save-tag">-{{ number_format($economie, 0, ',', ' ') }} F</span>
                            </div>

                            <!-- Actions -->
                            <div class="deal-actions">
                                <button class="add-to-cart btn-deal-add" data-id="{{ $deal->id }}" {{ $deal->stock <= 0 ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Ajouter au panier</span>
                                </button>
                                <a href="{{ route('products.show', $deal->id) }}" class="btn-deal-detail" title="Voir la fiche détaillée">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="grid-column: 1 / -1; text-align: center; color: #64748b; padding: 2rem;">Aucune offre du jour pour le moment.</p>
                @endforelse
            </div>

            <!-- Bannière avantage en bas des offres -->
            <div class="deals-trust-banner">
                <div class="deal-trust-item">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>Expédition express sous 24h</span>
                </div>

                <div class="deal-trust-item">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>Paiement à la réception</span>
                </div>

                <div class="deal-trust-item">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                    <span>Garantie échange & retour</span>
                </div>
                
                <div class="deal-trust-item">
                    <a href="/produits" class="deal-trust-link">
                        Toutes nos offres <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* ===== SECTION OFFRES DU JOUR ===== */
        .daily-deals-section {
            padding: 5.5rem 0 5rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 50%, #f1f5f9 100%);
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            position: relative;
        }

        .daily-deals-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3.5rem;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .daily-deals-header.scroll-reveal-header {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .daily-deals-header.scroll-reveal-header.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .deals-header-left {
            max-width: 620px;
        }

        .deals-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #dc2626;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 0.45rem 1.1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
            border: 1px solid #fecaca;
            box-shadow: 0 2px 6px rgba(220, 38, 38, 0.08);
        }

        .deals-title {
            font-family: var(--font-outfit);
            font-size: clamp(1.9rem, 3.2vw, 2.6rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.6rem;
            line-height: 1.2;
        }

        .deals-title-accent {
            background: linear-gradient(135deg, #ef4444 0%, #f97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .deals-subtitle {
            color: #64748b;
            font-size: 1.05rem;
            margin: 0;
            line-height: 1.6;
        }

        /* Countdown Box */
        .deals-countdown-box {
            background: #0f172a;
            color: white;
            padding: 1rem 1.6rem;
            border-radius: 18px;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .countdown-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.82rem;
            font-weight: 600;
            color: #fca5a5;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.5rem;
        }

        .countdown-timer {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .timer-segment {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 0.4rem 0.75rem;
            border-radius: 8px;
            min-width: 48px;
        }

        .timer-val {
            font-family: var(--font-outfit);
            font-size: 1.3rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .timer-unit {
            font-size: 0.65rem;
            color: #94a3b8;
            text-transform: uppercase;
            margin-top: 3px;
            font-weight: 600;
        }

        .timer-sep {
            font-size: 1.2rem;
            font-weight: 800;
            color: #f87171;
        }

        /* Deals Grid */
        .deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 3.5rem;
        }

        /* Deal Card */
        .deal-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .deal-card.scroll-reveal-card {
            opacity: 0;
            transform: translateY(38px) scale(0.96);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.35s ease;
            transition-delay: calc(var(--reveal-index, 0) * 0.12s);
            will-change: opacity, transform;
        }

        .deal-card.scroll-reveal-card.revealed {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .deal-card.scroll-reveal-card.revealed:hover {
            transform: translateY(-8px) scale(1);
            box-shadow: 0 20px 35px -10px rgba(15, 23, 42, 0.15);
            border-color: #cbd5e1;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.35s ease,
                        border-color 0.35s ease;
            transition-delay: 0s !important;
        }

        @media (prefers-reduced-motion: reduce) {
            .scroll-reveal-header,
            .scroll-reveal-card {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        /* Media */
        .deal-card-media {
            position: relative;
            aspect-ratio: 16/11;
            overflow: hidden;
            background: #f8fafc;
        }

        .deal-card-media a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .deal-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .deal-card:hover .deal-img {
            transform: scale(1.08);
        }

        .deal-badges {
            position: absolute;
            top: 1rem;
            left: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            z-index: 2;
        }

        .deal-badge-discount {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-weight: 800;
            font-size: 0.8rem;
            padding: 0.35rem 0.85rem;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.35);
            letter-spacing: 0.02em;
        }

        .deal-badge-cat {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            color: #0f172a;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 50px;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .deal-pill-live {
            position: absolute;
            bottom: 0.9rem;
            right: 0.9rem;
            background: rgba(15, 23, 42, 0.88);
            backdrop-filter: blur(8px);
            color: white;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.35rem 0.8rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 0.45rem;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .deal-live-dot {
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            animation: pulse-dot 1.8s infinite;
        }

        @keyframes pulse-dot {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        /* Content */
        .deal-card-content {
            padding: 1.4rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .deal-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.6rem;
        }

        .deal-stars {
            color: #f59e0b;
            font-size: 0.75rem;
            display: flex;
            gap: 2px;
        }

        .deal-rating-note {
            color: #64748b;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .deal-name {
            font-family: var(--font-outfit);
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 0.5rem;
            line-height: 1.35;
        }

        .deal-name a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .deal-name a:hover {
            color: #ef4444;
        }

        /* Description demandée par l'utilisateur */
        .deal-description {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0 0 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }

        /* Stock progress */
        .deal-stock-bar-wrap {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            padding: 0.75rem 0.9rem;
            border-radius: 12px;
            margin-bottom: 1.2rem;
        }

        .deal-stock-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.78rem;
            margin-bottom: 0.45rem;
        }

        .stock-label {
            color: #dc2626;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .stock-qty {
            color: #475569;
        }

        .deal-progress-track {
            height: 6px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .deal-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #f97316, #ef4444);
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        /* Pricing */
        .deal-price-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
            padding-top: 0.5rem;
            border-top: 1px solid #f1f5f9;
        }

        .deal-prices {
            display: flex;
            flex-direction: column;
        }

        .deal-current-price {
            font-family: var(--font-outfit);
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.1;
        }

        .deal-current-price small {
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
        }

        .deal-old-price {
            font-size: 0.85rem;
            color: #94a3b8;
            text-decoration: line-through;
            font-weight: 500;
        }

        .deal-save-tag {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
        }

        /* Actions */
        .deal-actions {
            display: flex;
            gap: 0.6rem;
            align-items: center;
        }

        .btn-deal-add {
            flex: 1;
            background: #0f172a;
            color: white;
            border: none;
            padding: 0.85rem 1.2rem;
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.1);
        }

        .btn-deal-add:hover {
            background: #4f46e5;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(79, 70, 229, 0.25);
        }

        .btn-deal-add:disabled {
            background: #cbd5e1;
            color: #64748b;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-deal-detail {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #f1f5f9;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.25s ease;
            font-size: 0.95rem;
        }

        .btn-deal-detail:hover {
            background: #0f172a;
            color: white;
            transform: translateY(-2px);
        }

        /* Trust banner */
        .deals-trust-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.2rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .deal-trust-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            color: #334155;
            font-size: 0.92rem;
            font-weight: 500;
        }

        .deal-trust-item i {
            color: #ef4444;
            font-size: 1.1rem;
        }

        .deal-trust-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #0f172a;
            font-weight: 700;
            text-decoration: none;
            font-size: 0.92rem;
            transition: gap 0.2s ease;
        }

        .deal-trust-link:hover {
            color: #ef4444;
            gap: 0.75rem;
        }

        @media (max-width: 768px) {
            .daily-deals-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
            .deals-countdown-box {
                width: 100%;
            }
            .deals-grid {
                grid-template-columns: 1fr;
            }
            .deals-trust-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.2rem;
            }
        }
    </style>

    <!-- Script Compte à Rebours Vente Flash -->
    <script>
        (function() {
            function updateCountdown() {
                const now = new Date();
                const endOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 23, 59, 59);
                let diff = Math.max(0, Math.floor((endOfDay - now) / 1000));

                const hours = Math.floor(diff / 3600);
                diff %= 3600;
                const minutes = Math.floor(diff / 60);
                const seconds = diff % 60;

                const hEl = document.getElementById('dealTimerHours');
                const mEl = document.getElementById('dealTimerMinutes');
                const sEl = document.getElementById('dealTimerSeconds');

                if (hEl && mEl && sEl) {
                    hEl.textContent = String(hours).padStart(2, '0');
                    mEl.textContent = String(minutes).padStart(2, '0');
                    sEl.textContent = String(seconds).padStart(2, '0');
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        })();
    </script>

    <!-- Script Animation Fluide au Scroll pour la Section Produits -->
    <script>
        (function () {
            const revealItems = document.querySelectorAll('.scroll-reveal-header, .scroll-reveal-card');
            if (!revealItems.length) return;

            if ('IntersectionObserver' in window) {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px 0px -40px 0px',
                    threshold: 0.1
                };

                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                revealItems.forEach(item => {
                    // Si l'élément est déjà visible dans le viewport dès le chargement (ex: ancre d'URL ou refresh)
                    const rect = item.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        item.classList.add('revealed');
                    } else {
                        revealObserver.observe(item);
                    }
                });
            } else {
                // Fallback pour navigateurs anciens
                revealItems.forEach(item => item.classList.add('revealed'));
            }
        })();
    </script>
@endsection