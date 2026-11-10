@extends('layouts.app')

@push('styles')
    <style>
        .wishlist-page {
            padding: 4rem 0 6rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            min-height: 80vh;
        }

        .wishlist-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .wishlist-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #ffe4e6;
            color: #e11d48;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }

        .wishlist-title {
            font-family: var(--font-outfit);
            font-size: 2.4rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .wishlist-subtitle {
            color: #64748b;
            font-size: 1rem;
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .wishlist-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .wishlist-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }

        .wishlist-img-wrap {
            position: relative;
            width: 100%;
            height: 260px;
            background: #f8fafc;
            overflow: hidden;
        }

        .wishlist-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .wishlist-card:hover .wishlist-img {
            transform: scale(1.05);
        }

        .wishlist-remove-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            border: none;
            color: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .wishlist-remove-btn:hover {
            background: #e11d48;
            color: #ffffff;
            transform: scale(1.1);
        }

        .wishlist-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .wishlist-cat {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .wishlist-name {
            font-family: var(--font-outfit);
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
            line-height: 1.3;
            text-decoration: none;
            display: block;
        }

        .wishlist-name:hover {
            color: var(--primary);
        }

        .wishlist-price {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 1.25rem;
        }

        .wishlist-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .btn-add-cart {
            flex: 1;
            background: #0f172a;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-add-cart:hover {
            background: var(--primary);
            transform: translateY(-1px);
        }

        .wishlist-empty {
            text-align: center;
            padding: 5rem 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .wishlist-empty-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ffe4e6;
            color: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 1.5rem;
        }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: var(--primary);
            color: white;
            padding: 0.85rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            margin-top: 1.5rem;
            transition: transform 0.2s ease;
        }

        .btn-shop:hover {
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
<section class="wishlist-page">
    <div class="container">
        
        <!-- En-tête -->
        <div class="wishlist-header">
            <div class="wishlist-badge">
                <i class="fa-solid fa-heart"></i> Mes Coups de Cœur
            </div>
            <h1 class="wishlist-title">Liste d'Envies</h1>
            <p class="wishlist-subtitle">Retrouvez les articles d'exception que vous avez mis de côté.</p>
        </div>

        @if($produits->isEmpty())
            <!-- État vide -->
            <div class="wishlist-empty">
                <div class="wishlist-empty-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; color: #0f172a; margin-bottom: 0.5rem;">
                    Votre liste d'envies est vide
                </h2>
                <p style="color: #64748b; font-size: 0.95rem;">
                    Explorez notre catalogue et cliquez sur le cœur pour sauvegarder vos pièces favorites.
                </p>
                <a href="{{ route('products.index') }}" class="btn-shop">
                    <i class="fa-solid fa-store"></i> Découvrir la boutique
                </a>
            </div>
        @else
            <!-- Grille des favoris -->
            <div class="wishlist-grid" id="wishlist-container">
                @foreach($produits as $produit)
                    <div class="wishlist-card" id="wishlist-item-{{ $produit->id }}">
                        <div class="wishlist-img-wrap">
                            <a href="{{ route('products.show', $produit->id) }}">
                                <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}" 
                                     alt="{{ $produit->nom }}" 
                                     class="wishlist-img">
                            </a>

                            <!-- Bouton retirer -->
                            <button type="button" 
                                    class="wishlist-remove-btn" 
                                    onclick="removeFromWishlist({{ $produit->id }})" 
                                    title="Retirer des favoris">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <div class="wishlist-body">
                            <div>
                                <span class="wishlist-cat">{{ $produit->categorie }}</span>
                                <a href="{{ route('products.show', $produit->id) }}" class="wishlist-name">
                                    {{ $produit->nom }}
                                </a>
                            </div>

                            <div>
                                <div class="wishlist-price">
                                    {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                </div>

                                <div class="wishlist-actions">
                                    <form action="{{ route('cart.add', $produit->id) }}" method="POST" style="flex: 1;">
                                        @csrf
                                        <button type="submit" class="btn-add-cart">
                                            <i class="fa-solid fa-cart-plus"></i> Ajouter au panier
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@push('scripts')
<script>
    function removeFromWishlist(productId) {
        fetch(`/favoris/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const card = document.getElementById(`wishlist-item-${productId}`);
                if (card) {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        card.remove();
                        // Mettre à jour le badge du header
                        const badges = document.querySelectorAll('.wishlist-count, #wishlist-count-badge');
                        badges.forEach(b => b.textContent = data.count);

                        // Si plus d'éléments, recharger pour afficher l'état vide
                        if (data.count === 0) {
                            location.reload();
                        }
                    }, 300);
                }
            }
        })
        .catch(err => console.error(err));
    }
</script>
@endpush
@endsection

