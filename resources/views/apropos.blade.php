@extends('layouts.app')

@section('content')
<div class="about-page">
    <!--PARTIE1 PAGE A PROPOS DU SITE ECOMMERCE--->
    <!-- Hero Section - Split Screen -->
    <section class="about-split-hero">
        <div class="blob-bg blob-1"></div>
        <div class="blob-bg blob-2"></div>
        <div class="container about-split-wrapper animate-fade-up">

            <!-- Côté gauche : Texte -->
            <div class="about-split-left">
                <span class="about-hero-badge">
                    <i class="fa-solid fa-feather-pointed"></i>
                    À Propos de LuxCart
                </span>

                <h1 class="about-split-title">
                    Notre <span style="font-size: 3.6rem;">Histoire</span> :<br>
                    Mettre le monde <br><em style="font-size: 3.6rem;">à votre portée.</em>
                </h1>

                <p class="about-split-desc">
                    Depuis plus d'une décennie, LuxCart importe les meilleurs produits internationaux et les rend
                    accessibles à tous en Côte d'Ivoire. Qualité, rapidité et confiance — notre engagement à chaque
                    commande.
                </p>

                <div class="about-split-stats">
                    <div class="stat-item">
                        <span class="stat-value">5<span>+</span></span>
                        <span class="stat-label">Années d'expertise</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-value">5K<span>+</span></span>
                        <span class="stat-label">Produits référencés</span>
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
                    <a href="#valeurs" class="about-cta-secondary">
                        Nos valeurs <i class="fa-solid fa-chevron-down"></i>
                    </a>
                </div>
            </div>

            <!-- Côté droit : Média + cartes flottantes -->
            <div class="about-split-right">
                <div class="about-media-wrap">
                    <div class="about-media-main">
                        <img src="{{ asset('images/vet81.jpg') }}" alt="LuxeCart - Accessoires Mode Premium">
                    </div>
                    <div class="about-media-accent"></div>
                </div>

                <!-- Carte flottante 1 : Note -->
                <div class="float-card float-card-review">
                    <div class="stars-row">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="review-note">
                        <span>4.8</span>/5
                    </div>
                    <p>+100 clients satisfaits</p>
                </div>

                <!-- Carte flottante 2 : Livraison -->
                <div class="float-card float-card-ship">
                    <div class="ship-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div>
                        <p><strong>Livraison offerte</strong></p>
                        <span>À Abidjan dès 30 000 FCFA</span>
                    </div>
                </div>

                <!-- Carte flottante 3 : Badge qualité -->
                <!--carte flottante icon badge-->
                <div class="float-card float-card-quality">
                    <i class="fa-solid fa-award"></i>
                    <span>Produits <strong>100% Authentiques</strong></span>
                </div>
            </div>

        </div>
    </section>


    <!--PARTIE2 PAGE A PROPOS DU SITE ECOMMERCE--->
    <!-- Content Section -->
    <section class="about-content-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-visual animate-fade-up">
                    <div
                        style="background: var(--off-white); border-radius: 40px; padding: 1rem; border: 1px solid var(--glass-border); position: relative;">
                        <!-- Placeholder for a professional image or illustration -->
                        <div
                            style="border-radius: 30px; height: 500px; overflow: hidden; border: 1px solid var(--glass-border);">
                            <img src="{{ asset('images/imgH1.jpg') }}" alt="LuxeCart Import Export"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div
                            style="position: absolute; bottom: -30px; right: -30px; background: var(--primary); color: white; padding: 2rem; border-radius: 20px; box-shadow: var(--shadow); width: 200px; text-align: center;">
                            <span
                                style="display: block; font-size: 2.5rem; font-weight: 700; font-family: var(--font-outfit);">10+</span>
                            <span style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Années
                                d'Expertise</span>
                        </div>
                    </div>
                </div>

                <div class="about-text animate-fade-up" style="transition-delay: 0.1s;">
                    <h2 style="font-size: 2.5rem; margin-bottom: 2rem; line-height: 1.2;">
                        LuxCart : Excellence et <span style="color: var(--primary); font-size: 2.5rem;">Import-Export</span>
                    </h2>
                    <p style="color: var(--gray); font-size: 1.1rem; line-height: 2; margin-bottom: 2rem;">
                        LuxCart est une entreprise de référence en Côte d'Ivoire spécialisée dans l'import-export de
                        produits variés, allant des articles pour la maison aux vêtements et jouets.
                    </p>
                    <p style="color: var(--gray); font-size: 1.1rem; line-height: 2; margin-bottom: 2.5rem;">
                        Nous sommes reconnus pour notre large choix de produits internationaux de qualité à des prix
                        compétitifs. Avec nos points de vente stratégiques, notamment à Abidjan, nous nous engageons à
                        rapprocher le monde de nos clients ivoiriens.
                    </p>
                    <div class="about-features">
                        <div
                            style="background: var(--off-white); padding: 1.5rem; border-radius: 20px; border: 1px solid var(--glass-border);">
                            <i class="fa-solid fa-earth-africa"
                                style="color: var(--primary); font-size: 1.5rem; margin-bottom: 1rem;"></i>
                            <h4 style="margin-bottom: 0.5rem; color: var(--dark); font-size: 2.5rem;">Présence Locale</h4>
                            <p style="font-size: 0.85rem; color: var(--gray);">Points de vente physiques à Abidjan pour
                                une proximité totale.</p>
                        </div>
                        <div
                            style="background: var(--off-white); padding: 1.5rem; border-radius: 20px; border: 1px solid var(--glass-border);">
                            <i class="fa-solid fa-award"
                                style="color: var(--primary); font-size: 1.5rem; margin-bottom: 1rem;"></i>
                            <h4 style="margin-bottom: 0.5rem; color: var(--dark); font-size: 2.5rem;">Qualité Garantie</h4>
                            <p style="font-size: 0.85rem; color: var(--gray);">Sélection rigoureuse de produits
                                internationaux certifiés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--PARTIE3 PAGE A PROPOS DU SITE ECOMMERCE--->
    <!-- Values Section -->
    <section class="about-values-section" id="valeurs">
        <div class="container">
            <div class="section-header animate-fade-up" style="text-align: center; margin-bottom: 5rem;">
                <h2 style="color: var(--dark); font-size: 3rem;">Nos <span style="font-size: 2.5rem;">Valeurs</span></h2>
                <p style="color: black; font-size: 15px;">Ce qui nous anime au quotidien pour mieux vous servir.</p>
            </div>

            <div class="about-values">
                <div class="animate-fade-up"
                    style="text-align: center; padding: 3rem; background: rgba(255, 255, 255, 0.05); border-radius: 40px; border: 1px solid rgba(255, 255, 255, 0.1);">
                    <div
                        style="width: 80px; height: 80px; background: rgba(99, 102, 241, 0.2); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 2rem;">
                        <i class="fa-solid fa-handshake" style="font-size: 50px"></i>
                    </div>
                    <h3 style="color: black; margin-bottom: 1.5rem; font-size: 1.5rem;">Intégrité</h3>
                    <p style="color: black; line-height: 1.8;">Une transparence totale dans nos échanges commerciaux et
                        nos tarifs.</p>
                </div>

                <div class="animate-fade-up"
                    style="text-align: center; padding: 3rem; background: rgba(255, 255, 255, 0.05); border-radius: 40px; border: 1px solid rgba(255, 255, 255, 0.1); transition-delay: 0.1s;">
                    <div
                        style="width: 80px; height: 80px; background: rgba(245, 158, 11, 0.2); color: var(--secondary); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 2rem;">
                        <i class="fa-solid fa-bolt" style="font-size: 50px"></i>
                    </div>
                    <h3 style="color: black; margin-bottom: 1.5rem; font-size: 1.5rem;">Rapidité</h3>
                    <p style="color: black; line-height: 1.8;">Un circuit logistique optimisé pour des délais de
                        livraison records.</p>
                </div>

                <div class="animate-fade-up"
                    style="text-align: center; padding: 3rem; background: rgba(255, 255, 255, 0.05); border-radius: 40px; border: 1px solid rgba(255, 255, 255, 0.1); transition-delay: 0.2s;">
                    <div
                        style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.2); color: #10b981; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 2rem;">
                        <i class="fa-solid fa-users-gear" style="font-size: 50px"></i>
                    </div>
                    <h3 style="color: black; margin-bottom: 1.5rem; font-size: 1.5rem;">Innovation</h3>
                    <p style="color: black; line-height: 1.8;">Nous utilisons le meilleur de la technologie pour
                        simplifier vos achats.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection