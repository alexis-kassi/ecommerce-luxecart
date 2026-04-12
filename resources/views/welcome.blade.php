@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home-hero">
        <div class="hero-content">
            <h1 class="hero-title">Élégance & <span>Performance</span></h1>
            <p class="hero-subtitle">Découvrez notre collection exclusive pour un style de vie moderne.</p>
            <div class="hero-btns">
                <a href="#featured" class="btn-primary">Acheter Maintenant</a>
                <a href="/produits" class="btn-secondary">Voir tout</a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="glass-card">
                <div class="card-glow"></div>
                <img src="{{ asset('images/imgBackground.jpg') }}" alt="Produit vedette">
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-preview" id="categories">
        <div class="container">
            <div class="section-header">
                <h2>Explorez nos collections</h2>
            </div>
            <div class="category-grid">
                <a href="{{ route('home') }}?category=Électronique#featured" class="category-item {{ $category == 'Électronique' ? 'active' : '' }}" id="cat-electronics">
                    <span class="cat-icon"><i class="fa-solid fa-mobile-screen-button"></i></span>
                    <span>Électronique</span>
                </a>
                <a href="{{ route('home') }}?category=Vêtement#featured" class="category-item {{ $category == 'Vêtement' ? 'active' : '' }}" id="cat-clothing">
                    <span class="cat-icon"><i class="fa-solid fa-shirt"></i></span>
                    <span>Vêtements</span>
                </a>
                <a href="{{ route('home') }}?category=Chaussure#featured" class="category-item {{ $category == 'Chaussure' ? 'active' : '' }}" id="cat-shoes">
                    <span class="cat-icon"><i class="fa-solid fa-shoe-prints"></i></span>
                    <span>Chaussures</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products" id="featured">
        <div class="container">
            <div class="section-header">
                @if($category)
                    <h2>Nos <span>{{ $category }}s</span></h2>
                    <p>Découvrez notre sélection de produits dans la catégorie {{ $category }}. <a href="{{ route('home') }}#featured" style="color: var(--primary); font-weight: 600; margin-left: 10px;">Tout afficher</a></p>
                @else
                    <h2>Nos Produits <span>Vedettes</span></h2>
                    <p>Une sélection minutieuse pour vous.</p>
                @endif
            </div>

            <div class="product-grid">
                @foreach($produits as $produit)
                    <div class="product-card" id="product-{{ $produit->id }}">
                        <div class="product-img">
                            <a href="{{ route('products.show', $produit->id) }}">
                                <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}" alt="{{ $produit->nom }}">
                            </a>
                            <span class="product-badge">{{ $produit->categorie }}</span>
                        </div>
                        <div class="product-info">
                            <h3><a href="{{ route('products.show', $produit->id) }}">{{ $produit->nom }}</a></h3>
                            <p class="product-desc">{{ Str::limit($produit->description, 60) }}</p>
                            <div class="product-footer">
                                <span class="product-price">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</span>
                                <button class="add-to-cart" data-id="{{ $produit->id }}" id="add-{{ $produit->id }}">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h2>Rejoignez le Club LuxeCart</h2>
            <p>Recevez nos offres exclusives et les dernières nouveautés directement dans votre boîte mail.</p>
            <form id="newsletter-form" class="newsletter-form">
                @csrf
                <input type="email" name="email" id="newsletter-email" placeholder="Votre adresse email" required>
                <button type="submit" id="newsletter-btn">S'abonner</button>
            </form>
            <div id="newsletter-message" style="margin-top: 1.5rem; font-weight: 500; display: none;"></div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('newsletter-form');
            const newsletterEmail = document.getElementById('newsletter-email');
            const newsletterBtn = document.getElementById('newsletter-btn');
            const newsletterMessage = document.getElementById('newsletter-message');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
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