@extends('layouts.app')

@section('content')
    <!-- 1. Hero Section -->
    <section class="hero" id="home-hero" style="background-color: #f8fafc; padding: 6rem 0; min-height: 80vh; display: flex; align-items: center; border-bottom: 1px solid #e2e8f0;">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; gap: 4rem; flex-wrap: wrap;">
            
            <div class="hero-content animate-fade-up" style="flex: 1; min-width: 300px; max-width: 600px;">
                <h1 style="font-family: var(--font-outfit); font-size: clamp(2.5rem, 4vw, 4rem); font-weight: 700; color: #0f172a; line-height: 1.2; margin-bottom: 1.5rem;">
                    Découvrez l'élégance au quotidien.
                </h1>
                
                <p style="color: #475569; font-size: 1.15rem; line-height: 1.7; margin-bottom: 2.5rem; max-width: 500px;">
                    Une sélection soignée de produits de qualité pour vous accompagner dans tous vos moments. Simplifiez vos achats avec LuxeCart.
                </p>
                
                <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                    <a href="#featured" style="background-color: #0f172a; color: white; padding: 1rem 2rem; font-size: 1rem; font-weight: 500; border-radius: 8px; text-decoration: none; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#334155';" onmouseout="this.style.backgroundColor='#0f172a';">
                        Explorer les collections
                    </a>
                    <a href="/produits" style="color: #475569; text-decoration: none; font-weight: 500; font-size: 1rem; padding: 1rem 1.5rem; border-radius: 8px; border: 1px solid #cbd5e1; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f1f5f9'; this.style.color='#0f172a';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#475569';">
                        Tous les produits
                    </a>
                </div>
            </div>

            <div class="hero-visual animate-fade-up" style="flex: 1; min-width: 300px; display: flex; justify-content: center; transition-delay: 0.1s;">
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('images/vet13.jpg') }}" alt="Produits LuxeCart" style="width: 100%; max-width: 500px; height: auto; display: block; object-fit: cover;">
                </div>
            </div>
            
        </div>
    </section>

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
    <section id="featured" style="padding: 6rem 0; background-color: white;">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem; flex-wrap: wrap; gap: 1rem;">
                <div>
                    @if($category)
                        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: #0f172a; font-weight: 700; margin-bottom: 0.5rem;">Collection <span style="color: #64748b; font-weight: 400;">{{ $category }}</span></h2>
                        <p style="color: #64748b; font-size: 1rem;">Découvrez notre sélection exclusive.</p>
                    @else
                        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: #0f172a; font-weight: 700; margin-bottom: 0.5rem;">Nouveautés</h2>
                        <p style="color: #64748b; font-size: 1rem;">Les dernières pièces ajoutées à notre catalogue.</p>
                    @endif
                </div>
                
                @if($category)
                <a href="{{ route('home') }}#featured" style="color: #0f172a; font-weight: 600; text-decoration: none; border-bottom: 1px solid #0f172a; padding-bottom: 2px; font-size: 0.95rem; transition: opacity 0.2s ease;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                    Voir tout
                </a>
                @endif
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2.5rem;">
                @foreach($produits as $produit)
                    <div style="display: flex; flex-direction: column; cursor: pointer; transition: transform 0.3s ease;" onmouseover="let btn = this.querySelector('.product-cart-btn'); if(btn){btn.style.opacity='1'; btn.style.transform='translateY(0)';}" onmouseout="let btn = this.querySelector('.product-cart-btn'); if(btn){btn.style.opacity='0'; btn.style.transform='translateY(10px)';}">
                        <!-- Image Container -->
                        <div style="position: relative; border-radius: 12px; overflow: hidden; background-color: #f1f5f9; aspect-ratio: 4/5; margin-bottom: 1.25rem;">
                            <a href="{{ route('products.show', $produit->id) }}" style="display: block; width: 100%; height: 100%;">
                                <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}" alt="{{ $produit->nom }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            </a>
                            
                            <span style="position: absolute; top: 1rem; left: 1rem; background-color: white; color: #0f172a; font-size: 0.75rem; font-weight: 600; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                {{ $produit->categorie }}
                            </span>

                            <button class="add-to-cart product-cart-btn" data-id="{{ $produit->id }}" id="add-{{ $produit->id }}" style="position: absolute; bottom: 1rem; left: 1rem; right: 1rem; background-color: rgba(255,255,255,0.9); backdrop-filter: blur(5px); color: #0f172a; border: none; padding: 0.8rem; border-radius: 8px; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; justify-content: center; gap: 8px; opacity: 0; transform: translateY(10px); transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" onmouseover="this.style.backgroundColor='#0f172a'; this.style.color='white';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.9)'; this.style.color='#0f172a';">
                                <i class="fa-solid fa-cart-shopping"></i> Ajouter
                            </button>
                        </div>
                        
                        <!-- Info Container -->
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; margin-bottom: 0.5rem;">
                                <h3 style="font-family: var(--font-inter); font-size: 1.1rem; color: #0f172a; font-weight: 500; margin: 0; line-height: 1.4;">
                                    <a href="{{ route('products.show', $produit->id) }}" style="color: inherit; text-decoration: none;">
                                        {{ $produit->nom }}
                                    </a>
                                </h3>
                                <span style="font-weight: 600; color: #0f172a; font-size: 1.1rem; white-space: nowrap;">
                                    {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                </span>
                            </div>
                            <p style="color: #64748b; font-size: 0.95rem; line-height: 1.5; margin: 0;">
                                {{ Str::limit($produit->description, 50) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Newsletter Section -->
    <section style="padding: 5rem 1rem; background-color: #f8fafc; border-top: 1px solid #e2e8f0;">
        <div class="container" style="max-width: 800px; margin: 0 auto; background-color: white; border-radius: 24px; padding: 4rem 2rem; text-align: center; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);">
            <div style="width: 60px; height: 60px; background-color: #0f172a; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: #0f172a; font-weight: 700; margin-bottom: 1rem;">Restons en contact</h2>
            <p style="color: #475569; font-size: 1.1rem; line-height: 1.6; margin-bottom: 2.5rem; max-width: 500px; margin-left: auto; margin-right: auto;">
                Inscrivez-vous à notre newsletter pour recevoir nos collections exclusives et nos conseils d'experts avant tout le monde.
            </p>
            
            <form id="newsletter-form" style="display: flex; gap: 0.5rem; max-width: 450px; margin: 0 auto; flex-wrap: wrap;">
                @csrf
                <input type="email" name="email" id="newsletter-email" placeholder="Votre adresse email..." required 
                       style="flex: 1; min-width: 200px; padding: 1rem 1.5rem; border: 1px solid #cbd5e1; border-radius: 12px; font-size: 1rem; outline: none; transition: border-color 0.2s ease; background-color: white;"
                       onfocus="this.style.borderColor='#0f172a'" onblur="this.style.borderColor='#cbd5e1'">
                <button type="submit" id="newsletter-btn" 
                        style="background-color: #0f172a; color: white; border: none; padding: 1rem 2rem; border-radius: 12px; font-weight: 500; font-size: 1rem; cursor: pointer; transition: background-color 0.2s ease; white-space: nowrap;"
                        onmouseover="this.style.backgroundColor='#334155'" onmouseout="this.style.backgroundColor='#0f172a'">
                    S'abonner
                </button>
            </form>
            <div id="newsletter-message" style="margin-top: 1.5rem; font-weight: 500; display: none; font-size: 1rem;"></div>
        </div>
    </section>

    <!-- Script Newsletter -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const newsletterForm = document.getElementById('newsletter-form');
            const newsletterEmail = document.getElementById('newsletter-email');
            const newsletterBtn = document.getElementById('newsletter-btn');
            const newsletterMessage = document.getElementById('newsletter-message');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const email = newsletterEmail.value;
                    newsletterBtn.disabled = true;
                    newsletterBtn.textContent = 'Chargement...';

                    fetch('{{ route("newsletter.store") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ email: email })
                    })
                        .then(response => response.json())
                        .then(data => {
                            newsletterMessage.style.display = 'block';
                            newsletterMessage.textContent = data.message;
                            newsletterMessage.style.color = data.success ? '#10b981' : '#ef4444';

                            if (data.success) {
                                newsletterForm.style.display = 'none';
                            } else {
                                newsletterBtn.disabled = false;
                                newsletterBtn.textContent = "S'abonner";
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            newsletterBtn.disabled = false;
                            newsletterBtn.textContent = "S'abonner";
                        });
                });
            }
        });
    </script>
@endsection