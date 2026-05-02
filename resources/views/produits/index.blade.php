@extends('layouts.app')

@push('styles')
    <style>
        @media (max-width: 991px) {
            .shop-container {
                grid-template-columns: 1fr !important;
                gap: 3rem !important;
            }

            .shop-sidebar {
                position: static !important;
            }
        }

        @media (max-width: 768px) {
            .shop-page {
                padding: 2rem 1rem !important;
            }

            .shop-header-flex {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 2rem !important;
                margin-bottom: 3rem !important;
            }

            .shop-header-flex .section-header {
                min-width: 100% !important;
            }

            .shop-header-flex .section-header h2 {
                font-size: 2.2rem !important;
            }

            .shop-header-flex .section-header p {
                font-size: 1rem !important;
            }

            .shop-slider-container {
                width: 100% !important;
                min-width: 100% !important;
                height: 220px !important;
                border-radius: 20px !important;
            }

            .slide-overlay {
                padding: 1.5rem !important;
            }

            .slide-overlay span {
                font-size: 1rem !important;
            }

            .shop-toolbar {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="shop-page container animate-fade-up" style="padding: 4rem 2rem;">
        <div class="shop-header-flex"
            style="display: flex; align-items: center; justify-content: space-between; gap: 3rem; margin-bottom: 4rem; flex-wrap: wrap;">
            <!-- Le Titre -->
            <div class="section-header" style="flex: 1; min-width: 300px; text-align: left; margin-bottom: 0;">
                <h2 style="font-size: 5rem; margin-bottom: 1rem;">Notre <span>Boutique</span></h2>
                <!-- Le Descriptif -->
                <p style="font-size: 1.3rem; color: var(--gray); max-width: 450px;">
                    Explorez l'intégralité de notre catalogue premium et profitez des dernières tendances sélectionnées pour
                    vous.
                </p>
            </div>

            <!-- Le Slider -->
            <div class="shop-slider-container"
                style="flex: 1.5; min-width: 350px; height: 300px; border-radius: 30px; overflow: hidden; box-shadow: var(--shadow);">
                <div class="swiper shop-swiper" style="width: 100%; height: 100%;">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide" style="position: relative;">
                            <img src="{{ asset('images/shop_banner_1.png') }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="Banner 1">
                            <div class="slide-overlay"
                                style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.6), transparent); display: flex; align-items: center; padding: 2rem;">
                                <span
                                    style="color: white; font-size: 1.2rem; font-weight: 600; border-left: 4px solid var(--primary); padding-left: 15px;">Nouvelle
                                    Collection</span>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide" style="position: relative;">
                            <img src="{{ asset('images/shop_banner_2.png') }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="Banner 2">
                            <div class="slide-overlay"
                                style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.6), transparent); display: flex; align-items: center; padding: 2rem;">
                                <span
                                    style="color: white; font-size: 1.2rem; font-weight: 600; border-left: 4px solid var(--primary); padding-left: 15px;">Électronique
                                    Premium</span>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide" style="position: relative;">
                            <img src="{{ asset('images/shop_banner_3.png') }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="Banner 3">
                            <div class="slide-overlay"
                                style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.6), transparent); display: flex; align-items: center; padding: 2rem;">
                                <span
                                    style="color: white; font-size: 1.2rem; font-weight: 600; border-left: 4px solid var(--primary); padding-left: 15px;">Accessoires
                                    de Luxe</span>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <div class="shop-container" style="display: grid; grid-template-columns: 280px 1fr; gap: 4rem; align-items: start;">
            <!-- Filters Sidebar -->
            <aside class="shop-sidebar" style="position: sticky; top: 120px;">
                <form action="{{ route('products.index') }}" method="GET" id="filter-form">

                    <!-- Recherche -->
                    <div class="filter-section" style="margin-bottom: 2.5rem;">
                        <h4 style="margin-bottom: 1.2rem; font-size: 1.4rem; color: var(--dark);">Recherche</h4>
                        <div style="position: relative;">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Un produit, une marque..."
                                style="width: 100%; padding: 12px 15px 12px 40px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;">
                            <i class="fa-solid fa-magnifying-glass"
                                style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--gray);"></i>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="filter-section" style="margin-bottom: 2.5rem;">
                        <h4 style="margin-bottom: 1.2rem; font-size: 1.1rem; color: var(--dark);">Catégories</h4>
                        <div class="filter-options" style="display: flex; flex-direction: column; gap: 0.8rem;">
                            <label
                                style="display: flex; align-items: center; gap: 10px; cursor: pointer; color: var(--gray); font-size: 0.95rem;">
                                <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }}
                                    onchange="this.form.submit()">
                                <span>Toutes les catégories</span>
                            </label>
                            @foreach($categories as $cat)
                                <label
                                    style="display: flex; align-items: center; gap: 10px; cursor: pointer; color: var(--gray); font-size: 0.95rem;">
                                    <input type="radio" name="category" value="{{ $cat->categorie }}" {{ request('category') == $cat->categorie ? 'checked' : '' }} onchange="this.form.submit()">
                                    <span>{{ $cat->categorie }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-section" style="margin-bottom: 2.5rem;">
                        <h4 style="margin-bottom: 1.2rem; font-size: 1.1rem; color: var(--dark);">Prix (FCFA)</h4>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid var(--glass-border); font-size: 0.85rem; outline: none;">
                            <span style="color: var(--gray);">-</span>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid var(--glass-border); font-size: 0.85rem; outline: none;">
                        </div>
                        <button type="submit" class="btn-primary"
                            style="width: 100%; margin-top: 1rem; padding: 10px; font-size: 0.9rem; border: none; cursor: pointer;">Appliquer</button>
                    </div>

                    <a href="{{ route('products.index') }}"
                        style="display: block; text-align: center; color: var(--primary); font-size: 0.9rem; font-weight: 500;">Réinitialiser
                        les filtres</a>
                </form>
            </aside>

            <!-- Liste des produits disponible -->
            <main class="shop-content">
                <div class="shop-toolbar"
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--glass-border);">
                    <div class="result-count" style="color: var(--gray); font-size: 0.95rem;">
                        <strong>{{ count($produits) }}</strong> produits trouvés
                    </div>
                    <div class="sort-dropdown">

                        <!-- Liste sélection des prix -->
                        <select name="sort" form="filter-form" onchange="this.form.submit()"
                            style="padding: 10px 15px; border-radius: 10px; border: 1px solid var(--glass-border); background: white; outline: none; font-size: 0.9rem; cursor: pointer;">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Les plus récents
                            </option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant
                            </option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                Prix décroissant</option>
                        </select>
                    </div>
                </div>

                @if(count($produits) > 0)
                    <div class="product-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
                        @foreach($produits as $produit)
                            <div class="product-card" id="product-{{ $produit->id }}">
                                <div class="product-img">
                                    <a href="{{ route('products.show', $produit->id) }}">
                                        <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                                            alt="{{ $produit->nom }}">
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
                @else
                    <div style="text-align: center; padding: 8rem 0; background: var(--off-white); border-radius: 40px;">
                        <i class="fa-solid fa-magnifying-glass"
                            style="font-size: 3rem; color: var(--gray); margin-bottom: 1.5rem;"></i>
                        <h3 style="margin-bottom: 0.5rem;">Aucun produit trouvé</h3>
                        <p style="color: var(--gray);">Essayez de modifier vos filtres ou votre recherche.</p>
                    </div>
                @endif
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
                new Swiper('.shop-swiper', {
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                });
            }
        });
    </script>
@endpush