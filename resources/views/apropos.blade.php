@extends('layouts.app')

@section('content')
    <div class="about-page">
        <!-- Hero Section -->
        <section class="hero_background_color">
            <section class="about-hero about-hero-section">
                <div class="container animate-fade-up">
                    <h1 class="about-title">
                        Notre <span>Histoire</span>
                    </h1>
                    <p style="font-size: 1.4rem; color: var(--light); max-width: 700px; margin: 0 auto; line-height: 1.8;">
                        Découvrez comment LuxeCart est devenu un acteur majeur de l'import-export et du e-commerce en Côte
                        d'Ivoire.
                    </p>
                </div>
            </section>
        </section>

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
                                <img src="{{ asset('images/imgBackground.jpg') }}" alt="LuxeCart Import Export"
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
                            LuxeCart : Excellence et <span>Import-Export</span>
                        </h2>
                        <p style="color: var(--gray); font-size: 1.1rem; line-height: 2; margin-bottom: 2rem;">
                            LuxeCart est une entreprise de référence en Côte d'Ivoire spécialisée dans l'import-export de
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
                                <h4 style="margin-bottom: 0.5rem; color: var(--dark);">Présence Locale</h4>
                                <p style="font-size: 0.85rem; color: var(--gray);">Points de vente physiques à Abidjan pour
                                    une proximité totale.</p>
                            </div>
                            <div
                                style="background: var(--off-white); padding: 1.5rem; border-radius: 20px; border: 1px solid var(--glass-border);">
                                <i class="fa-solid fa-award"
                                    style="color: var(--primary); font-size: 1.5rem; margin-bottom: 1rem;"></i>
                                <h4 style="margin-bottom: 0.5rem; color: var(--dark);">Qualité Garantie</h4>
                                <p style="font-size: 0.85rem; color: var(--gray);">Sélection rigoureuse de produits
                                    internationaux certifiés.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="about-values-section">
            <div class="container">
                <div class="section-header animate-fade-up" style="text-align: center; margin-bottom: 5rem;">
                    <h2 style="color: var(--dark); font-size: 3rem;">Nos <span>Valeurs</span></h2>
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