@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/nouveautes.css') }}">
@endpush

@section('content')
    <main class="nouveautes-page">

        <!-- ========================================================
             1. HERO SECTION - NOUVEAUTÉS 2026
             ======================================================== -->
        <section class="nouveautes-hero">
            <div class="nouveautes-hero-blob blob-1"></div>
            <div class="nouveautes-hero-blob blob-2"></div>

            <div class="container nouveautes-hero-wrapper animate-fade-up">
                <!-- Côté gauche : Titre & Valeur ajoutée -->
                <div class="nouveautes-hero-left">
                    <span class="nouveautes-badge">
                        <i class="fa-solid fa-sparkles"></i>
                        Arrivages & Collections 2026
                    </span>

                    <h1 class="nouveautes-title">
                        Les Dernières <br>
                         Nouveautés :<br>
                        Tendances exclusives <br><em style="2rem;">fraîchement arrivées.</em>
                    </h1>

                    <p class="nouveautes-desc">
                        Découvrez en exclusivité nos arrivages de la semaine. Des pièces rares, des articles de mode raffinés et des équipements high-tech de dernière génération importés directement pour vous.
                    </p>

                    <div class="nouveautes-feature-chips">
                        <span class="feature-chip">
                            <i class="fa-solid fa-sparkles"></i>
                            100% Nouveaux Modèles
                        </span>
                        <span class="feature-chip">
                            <i class="fa-solid fa-bolt"></i>
                            Éditions & Stocks Limités
                        </span>
                        <span class="feature-chip">
                            <i class="fa-solid fa-truck-fast"></i>
                            Expédition Express 24h
                        </span>
                    </div>
                </div>

                <!-- Côté droit : Produit Spotlight Coup de Cœur -->
                @if(isset($spotlight) && $spotlight)
                    <div class="nouveautes-hero-right">
                        <div class="spotlight-card">
                            <div class="spotlight-tag-row">
                                <span class="spotlight-tag-pill">
                                    <i class="fa-solid fa-fire"></i> Coup de Cœur
                                </span>
                                <span class="spotlight-tag-cat">{{ $spotlight->categorie ?? 'Nouveauté' }}</span>
                            </div>

                            <div class="spotlight-img-wrap">
                                <a href="{{ route('products.show', $spotlight->id) }}">
                                    <img src="{{ asset($spotlight->image ?? 'images/placeholder-product.jpg') }}" alt="{{ $spotlight->nom }}">
                                </a>
                            </div>

                            <div class="spotlight-info">
                                <h4>
                                    <a href="{{ route('products.show', $spotlight->id) }}">{{ $spotlight->nom }}</a>
                                </h4>
                                <div class="spotlight-price-row">
                                    <span class="spotlight-price">{{ number_format($spotlight->prix, 0, ',', ' ') }} FCFA</span>
                                    <a href="{{ route('products.show', $spotlight->id) }}" class="spotlight-btn">
                                        <span>Découvrir</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>


        <!-- ========================================================
             2. FILTER & CONTROLS TOOLBAR
             ======================================================== -->
        <section class="container nouveautes-toolbar-section">
            <div class="nouveautes-toolbar-card">
                <!-- Onglets Catégories -->
                <div class="nouveautes-tabs-row">
                    <a href="{{ route('nouveautes', array_merge(request()->except(['category', 'page']), ['category' => 'all'])) }}" 
                       class="tab-pill {{ empty($category) || $category === 'all' ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Tous les arrivages</span>
                        <span class="tab-count">{{ count($produits) }}</span>
                    </a>

                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <a href="{{ route('nouveautes', array_merge(request()->except(['category', 'page']), ['category' => $cat->categorie])) }}" 
                               class="tab-pill {{ $category === $cat->categorie ? 'active' : '' }}">
                                <span>{{ $cat->categorie }}</span>
                                <span class="tab-count">{{ $cat->count }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>

                <!-- Barre de Recherche & Tri -->
                <div class="nouveautes-controls-row">
                    <form action="{{ route('nouveautes') }}" method="GET" class="nouveautes-search-form">
                        @if(!empty($category) && $category !== 'all')
                            <input type="hidden" name="category" value="{{ $category }}">
                        @endif
                        @if(!empty($sort))
                            <input type="hidden" name="sort" value="{{ $sort }}">
                        @endif
                        <input type="text" name="search" placeholder="Rechercher parmi les nouveautés..." value="{{ $search ?? '' }}">
                        <button type="submit" class="nouveautes-search-btn" title="Rechercher">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                    <div class="nouveautes-sort-wrap">
                        <span class="nouveautes-count-tag">
                            <strong>{{ count($produits) }}</strong> {{ count($produits) > 1 ? 'articles trouvés' : 'article trouvé' }}
                        </span>

                        <select class="nouveautes-sort-select" onchange="location = this.value;">
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'latest'])) }}" {{ ($sort ?? '') === 'latest' ? 'selected' : '' }}>
                                ✨ Plus récents d'abord
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_asc'])) }}" {{ ($sort ?? '') === 'price_asc' ? 'selected' : '' }}>
                                💰 Prix croissant
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_desc'])) }}" {{ ($sort ?? '') === 'price_desc' ? 'selected' : '' }}>
                                💎 Prix décroissant
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'name_asc'])) }}" {{ ($sort ?? '') === 'name_asc' ? 'selected' : '' }}>
                                🔤 Nom A-Z
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </section>


        <!-- ========================================================
             3. PRODUCTS GRID
             ======================================================== -->
        <section class="container nouveautes-products-section">
            @if(isset($produits) && count($produits) > 0)
                <div class="nouveautes-grid">
                    @foreach($produits as $produit)
                        <article class="nouv-product-card" id="product-{{ $produit->id }}">
                            <!-- Image et Badges -->
                            <div class="nouv-card-img-wrap">
                                <a href="{{ route('products.show', $produit->id) }}" style="display: block; width: 100%; height: 100%;">
                                    <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}" 
                                         alt="{{ $produit->nom }}" 
                                         loading="lazy">
                                </a>

                                <span class="nouv-badge-nouveau">
                                    <i class="fa-solid fa-sparkles"></i> Nouveau
                                </span>

                                @if(!empty($produit->categorie))
                                    <span class="nouv-badge-cat">{{ $produit->categorie }}</span>
                                @endif
                            </div>

                            <!-- Corps de la carte -->
                            <div class="nouv-card-body">
                                <!-- Étoiles d'avis -->
                                <div class="nouv-card-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    <span class="nouv-rating-val">4.9 ({{ rand(18, 95) }})</span>
                                </div>

                                <h3 class="nouv-card-title">
                                    <a href="{{ route('products.show', $produit->id) }}">{{ $produit->nom }}</a>
                                </h3>

                                <p class="nouv-card-desc">
                                    {{ Str::limit($produit->description ?? 'Produit exclusif et authentique de la collection LuxeCart.', 80) }}
                                </p>

                                <!-- Disponibilité -->
                                <div class="nouv-card-stock {{ ($produit->stock ?? 1) > 3 ? 'in-stock' : 'low-stock' }}">
                                    <span class="stock-dot"></span>
                                    <span>{{ ($produit->stock ?? 1) > 3 ? 'En stock (' . $produit->stock . ' dispo)' : 'Stock très limité' }}</span>
                                </div>

                                <!-- Pied de la carte : Prix & Action Ajout au Panier -->
                                <div class="nouv-card-footer">
                                    <div class="nouv-price-block">
                                        <span class="nouv-price-label">Prix unitaire</span>
                                        <span class="nouv-price-val">
                                            {{ number_format($produit->prix, 0, ',', ' ') }} <small>FCFA</small>
                                        </span>
                                    </div>

                                    <button type="button" 
                                            class="nouv-add-btn add-to-cart" 
                                            data-id="{{ $produit->id }}" 
                                            id="add-{{ $produit->id }}" 
                                            title="Ajouter au panier">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Aucun produit trouvé -->
                <div class="nouveautes-empty-state animate-fade-up">
                    <div class="empty-icon-wrap">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h3>Aucune nouveauté trouvée</h3>
                    <p>Aucun article ne correspond à votre recherche ou filtre actuel. Explorez toutes nos collections.</p>
                    <a href="{{ route('nouveautes') }}" class="btn-reset-filters">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>Réinitialiser les filtres</span>
                    </a>
                </div>
            @endif

            <!-- ========================================================
                 4. BANNIÈRE DE RÉASSURANCE
                 ======================================================== -->
            <div class="nouveautes-reassurance">
                <div class="reassurance-item">
                    <div class="reassurance-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="reassurance-info">
                        <h4>Livraison Express</h4>
                        <p>24h chrono à Abidjan & 48h à l'intérieur du pays.</p>
                    </div>
                </div>

                <div class="reassurance-item">
                    <div class="reassurance-icon">
                        <i class="fa-solid fa-shield-check"></i>
                    </div>
                    <div class="reassurance-info">
                        <h4>100% Authentique</h4>
                        <p>Produits certifiés d'origine et inspectés avec soin.</p>
                    </div>
                </div>

                <div class="reassurance-item">
                    <div class="reassurance-icon">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="reassurance-info">
                        <h4>Paiement Flexible</h4>
                        <p>Réglez en cash à la livraison ou par Mobile Money.</p>
                    </div>
                </div>

                <div class="reassurance-item">
                    <div class="reassurance-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="reassurance-info">
                        <h4>Assistance Dédiée</h4>
                        <p>Service client réactif disponible 7j/7 sur WhatsApp.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection