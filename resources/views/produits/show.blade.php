@extends('layouts.app')

@section('content')
<div class="product-detail-page container" style="padding: 6rem 2rem;">
    <div class="breadcrumb" style="margin-bottom: 2rem; color: var(--gray); font-size: 0.95rem;">
        <a href="{{ route('home') }}">Accueil</a> <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin: 0 10px;"></i> 
        <a href="{{ route('home') }}?category={{ $produit->categorie }}">{{ $produit->categorie }}</a> <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; margin: 0 10px;"></i>
        <span style="color: var(--dark); font-weight: 500;">{{ $produit->nom }}</span>
    </div>

    <div class="product-detail-wrapper" style="display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: start;">
        <div class="product-detail-visual">
            <div class="main-image-container" style="background: var(--off-white); border-radius: 40px; padding: 2rem; border: 1px solid var(--glass-border); overflow: hidden; height: 600px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}" alt="{{ $produit->nom }}" style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.6s ease;">
            </div>
        </div>

        <div class="product-detail-info">
            <span class="category-badge" style="background: var(--primary); color: white; padding: 6px 16px; border-radius: 100px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1.5rem; display: inline-block;">
                {{ $produit->categorie }}
            </span>
            
            <h1 style="font-size: 3.5rem; line-height: 1.1; margin-bottom: 1.5rem; color: var(--dark); font-family: var(--font-outfit);">
                {{ $produit->nom }}
            </h1>

            <div class="price-tag" style="font-size: 2.2rem; font-weight: 700; color: var(--primary); margin-bottom: 2.5rem;">
                {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
            </div>

            <div class="product-description" style="margin-bottom: 3rem;">
                <h4 style="margin-bottom: 1rem; color: var(--dark); letter-spacing: 0.5px; text-transform: uppercase; font-size: 0.9rem;">Description</h4>
                <p style="color: var(--gray); font-size: 1.1rem; line-height: 1.8;">
                    {{ $produit->description }}
                </p>
            </div>

            <div class="product-meta" style="display: flex; gap: 3rem; margin-bottom: 3rem; border-top: 1px solid var(--glass-border); border-bottom: 1px solid var(--glass-border); padding: 2rem 0;">
                <div class="meta-item">
                    <span style="display: block; color: var(--gray); font-size: 0.85rem; margin-bottom: 0.5rem; text-transform: uppercase;">Disponibilité</span>
                    <span style="font-weight: 600; color: #10b981;"><i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> En Stock ({{ $produit->stock }} unités)</span>
                </div>
                <div class="meta-item">
                    <span style="display: block; color: var(--gray); font-size: 0.85rem; margin-bottom: 0.5rem; text-transform: uppercase;">Livraison</span>
                    <span style="font-weight: 600; color: var(--dark);"><i class="fa-solid fa-truck-fast" style="margin-right: 8px;"></i> Gratuite (Abidjan)</span>
                </div>
            </div>

            <div class="product-actions" style="display: flex; gap: 1.5rem;">
                <button class="add-to-cart btn-primary" data-id="{{ $produit->id }}" style="flex: 1; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 1rem; padding: 1.2rem;">
                    Ajouter au panier <i class="fa-solid fa-cart-plus"></i>
                </button>
                <button style="width: 55px; height: 55px; border-radius: 15px; border: 1px solid var(--glass-border); background: white; color: var(--gray); cursor: pointer; transition: var(--transition);">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
