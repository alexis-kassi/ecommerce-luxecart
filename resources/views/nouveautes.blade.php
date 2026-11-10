@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/nouveautes.css') }}">
@endpush

@section('content')
    <main class="nouveautes-page">

        <!-- ========================================================
             1. EN-TÊTE ÉPURÉ NOUVEAUTÉS (Sans Hero)
             ======================================================== -->
        <header class="nouv-header-strip">
            <div class="container nouv-header-inner">
                <div class="nouv-title-group">
                    <nav class="nouv-breadcrumb" aria-label="Fil d'Ariane">
                        <a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Accueil</a>
                        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem; opacity: 0.5;"></i>
                        <span>Nouveautés</span>
                    </nav>
                    <h1>
                        Dernières Nouveautés
                        <span class="nouv-title-badge">{{ count($produits) }} pièces d'exception</span>
                    </h1>
                </div> 

                <!-- Micro-réassurance discrète -->
                <div class="nouv-trust-badges-inline">
                    <span class="trust-tag"><i class="fa-solid fa-sparkles"></i> 100% Nouveaux Modèles</span>
                    <span class="trust-tag"><i class="fa-solid fa-bolt"></i> Pièces Rares &amp; Exclusives</span>
                    <span class="trust-tag"><i class="fa-solid fa-truck-fast"></i> Livraison Express 24h</span>
                </div>
            </div>
        </header>


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
                                 Plus récents d'abord
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_asc'])) }}" {{ ($sort ?? '') === 'price_asc' ? 'selected' : '' }}>
                                 Prix croissant
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'price_desc'])) }}" {{ ($sort ?? '') === 'price_desc' ? 'selected' : '' }}>
                                 Prix décroissant
                            </option>
                            <option value="{{ route('nouveautes', array_merge(request()->except(['sort', 'page']), ['sort' => 'name_asc'])) }}" {{ ($sort ?? '') === 'name_asc' ? 'selected' : '' }}>
                                 Nom A-Z
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
                        <article class="nouv-product-card" id="product-{{ $produit->id }}"
                                 style="--card-delay: {{ min($loop->index * 0.045, 0.65) }}s; cursor:pointer;"
                                 data-id="{{ $produit->id }}"
                                 data-nom="{{ addslashes($produit->nom) }}"
                                 data-desc="{{ addslashes(Str::limit($produit->description ?? 'Produit exclusif LuxeCart.', 200)) }}"
                                 data-categorie="{{ $produit->categorie }}"
                                 data-prix="{{ number_format($produit->prix, 0, ',', ' ') }}"
                                 data-stock="{{ $produit->stock }}"
                                 data-image="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                                 style="cursor:pointer;">
                            <!-- Image et Badges -->
                            <div class="nouv-card-img-wrap">
                                <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                                     alt="{{ $produit->nom }}"
                                     loading="lazy">

                                <!-- Bouton Favoris -->
                                @php $isFav = isset(session('wishlist', [])[$produit->id]); @endphp
                                <button type="button" 
                                        class="btn-wishlist-toggle {{ $isFav ? 'active' : '' }}" 
                                        data-product-id="{{ $produit->id }}" 
                                        onclick="event.stopPropagation(); toggleWishlist({{ $produit->id }}, this);" 
                                        title="{{ $isFav ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                    <i class="{{ $isFav ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                                </button>

                                <span class="nouv-badge-nouveau">
                                    <i class="fa-solid fa-sparkles"></i> Nouveau
                                </span>

                                @if(!empty($produit->categorie))
                                    <span class="nouv-badge-cat">{{ $produit->categorie }}</span>
                                @endif

                                <!-- Hover Overlay avec le nom -->
                                <div class="nouv-card-hover-overlay">
                                    <span class="nouv-hover-name">{{ $produit->nom }}</span>
                                    <span class="nouv-hover-price">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</span>
                                    <span class="nouv-hover-cta"><i class="fa-regular fa-eye"></i> Voir le produit</span>
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

    <!-- ===== STYLES HOVER OVERLAY (Nouveautés) ===== -->
<style>
    /* Image wrapper full-card */
     .nouv-product-card {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        position: relative;
        cursor: pointer;
    }
    .nouv-product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 48px rgba(0,0,0,0.16);
    }
    .nouv-card-img-wrap {
        position: relative;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 3/4;
        background: #f1f5f9;
    }
    .nouv-card-img-wrap img {
        width: 100%; height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .nouv-product-card:hover .nouv-card-img-wrap img {
        transform: scale(1.08);
    }

    /* Hover Overlay */
    .nouv-card-hover-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.8rem 1.2rem 1.3rem;
        background: linear-gradient(to top,
            rgba(9, 13, 25, 0.93) 0%,
            rgba(9, 13, 25, 0.55) 55%,
            transparent 100%);
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 0.4s ease, transform 0.4s ease;
        z-index: 5;
    }
    .nouv-product-card:hover .nouv-card-hover-overlay {
        opacity: 1;
        transform: translateY(0);
    }
    .nouv-hover-name {
        font-family: 'Outfit', var(--font-outfit, sans-serif);
        font-size: 1.05rem;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.3;
    }
    .nouv-hover-price {
        font-size: 0.88rem;
        font-weight: 600;
        color: #a5b4fc;
    }
    .nouv-hover-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.78rem;
        font-weight: 600;
        color: rgba(255,255,255,0.7);
        margin-top: 0.2rem;
    }

</style>

@endsection