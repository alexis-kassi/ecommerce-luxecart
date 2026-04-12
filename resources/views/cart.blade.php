@extends('layouts.app')

@section('content')
<div class="container cart-page">
    <div class="section-header">
        <h2>Votre <span>Panier</span></h2>
        <p>Gérez vos articles avant de passer la commande.</p>
    </div>

    @if(session('success'))
        <div class="cart-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($produits) > 0)
        <div class="cart-wrapper">
            <div class="cart-items">
                @foreach($produits as $item)
                    <div class="cart-item">
                        <div class="cart-item-img">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['nom'] }}">
                        </div>
                        <div class="cart-item-info">
                            <h3>{{ $item['nom'] }}</h3>
                            <p>{{ number_format($item['prix'], 0, ',', ' ') }} FCFA / unité</p>
                        </div>
                        
                        <div class="cart-item-quantity">
                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="cart-quantity-form">
                                @csrf
                                <input type="number" name="quantite" value="{{ $item['quantite'] }}" min="1" class="cart-quantity-input">
                                <button type="submit" class="cart-sync-btn" title="Mettre à jour">
                                    <i class="fa-solid fa-sync"></i>
                                </button>
                            </form>
                        </div>

                        <div class="cart-item-subtotal">
                            <span>{{ number_format($item['subtotal'], 0, ',', ' ') }} FCFA</span>
                        </div>

                        <div class="cart-item-actions">
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cart-remove-btn" title="Supprimer">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <h3>Résumé</h3>
                <div class="cart-summary-row">
                    <span class="cart-summary-label">Sous-total</span>
                    <span class="cart-summary-value">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="cart-summary-row">
                    <span class="cart-summary-label">Livraison</span>
                    <span class="cart-summary-value" style="color: #10b981; font-weight: 600;">Gratuite</span>
                </div>
                <div class="cart-summary-total">
                    <span>Total</span>
                    <span class="cart-summary-total-value">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="btn-primary" style="width: 100%; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 1rem;">
                    Finaliser la commande <i class="fa-solid fa-arrow-right"></i>
                </a>
                <div style="text-align: center; margin-top: 1.5rem;">
                    <a href="{{ route('home') }}" style="color: var(--gray); font-size: 0.9rem;">Continuer vos achats</a>
                </div>
            </div>
        </div>
    @else
        <div class="cart-empty">
            <div class="cart-empty-icon">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>
            <h3>Votre panier est vide</h3>
            <p>Il semblerait que vous n'ayez pas encore fait votre choix.</p>
            <a href="{{ route('home') }}" class="btn-primary">Parcourir les produits</a>
        </div>
    @endif
</div>
@endsection
