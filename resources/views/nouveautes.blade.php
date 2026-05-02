@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/nouveautes.css') }}">
@endpush

@section('content')
    <main class="nouveautes-page">
        <section class="nouveautes-hero">
            <div class="container">
                <h1>Nos Nouveautés</h1>
                <p>Découvrez les toutes dernières tendances de notre collection.</p>
            </div>
        </section>

        <section class="nouveautes-products container">
            @if(isset($produits) && count($produits) > 0)
                <div class="product-grid">
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

            @endif
        </section>
    </main>
@endsection