@extends('layouts.app')

@section('content')
<div class="container" style="padding: 4rem 2rem;">
    <div class="section-header">
        <h2>Passer la <span>Commande</span></h2>
        <p>Entrez vos informations pour recevoir vos articles.</p>
    </div>

    @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #fecaca;">
            {{ session('error') }}
        </div>
    @endif

    <div class="checkout-wrapper" style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 4rem;">
        <!-- Checkout Form -->
        <div class="checkout-form-container">
            <form action="{{ route('checkout.process') }}" method="POST" style="background: var(--light); border: 1px solid var(--glass-border); border-radius: 30px; padding: 3rem;">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Nom complet</label>
                        <input type="text" name="nom" required style="width: 100%; padding: 12px 20px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="Jean Kouassi">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Email</label>
                        <input type="email" name="email" required style="width: 100%; padding: 12px 20px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="jean@exemple.com">
                    </div>
                </div>

                <div style="margin-bottom: 2rem;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Téléphone</label>
                        <input type="text" name="telephone" required style="width: 100%; padding: 12px 20px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="+225 07 00 00 00 00">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Adresse</label>
                        <input type="text" name="adresse" required style="width: 100%; padding: 12px 20px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="Riviera Palmeraie, Rue L25">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Ville</label>
                        <input type="text" name="ville" required style="width: 100%; padding: 12px 20px; border-radius: 12px; border: 1px solid var(--glass-border); background: var(--off-white); outline: none;" placeholder="Abidjan">
                    </div>
                </div>

                <div style="margin-bottom: 3rem;">
                    <label style="display: block; margin-bottom: 1.5rem; font-weight: 600;">Méthode de paiement</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <label style="display: flex; align-items: center; gap: 1rem; padding: 15px; border: 1px solid var(--glass-border); border-radius: 15px; cursor: pointer;">
                            <input type="radio" name="methode_paiement" value="paiement_livraison" checked>
                            <span>Paiement à la livraison</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 1rem; padding: 15px; border: 1px solid var(--glass-border); border-radius: 15px; cursor: pointer;">
                            <input type="radio" name="methode_paiement" value="orange_money">
                            <span>Mobile Money</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer; padding: 1.2rem; display: flex; align-items: center; justify-content: center; gap: 1rem;">
                    Confirmer la commande <i class="fa-solid fa-check-double"></i>
                </button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="checkout-summary">
            <div style="background: var(--off-white); border-radius: 30px; padding: 2.5rem; border: 1px solid var(--glass-border); position: sticky; top: 120px;">
                <h3 style="margin-bottom: 2rem;">Résumé de la commande</h3>
                <div class="checkout-items" style="margin-bottom: 1.5rem; max-height: 400px; overflow-y: auto;">
                    @foreach($items as $item)
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid var(--glass-border);">
                            <img src="{{ asset($item['produit']->image) }}" style="width: 60px; height: 60px; border-radius: 10px; object-fit: cover; border: 1px solid var(--glass-border);">
                            <div style="flex: 1;">
                                <h4 style="font-size: 0.95rem; margin-bottom: 0.2rem;">{{ $item['produit']->nom }}</h4>
                                <span style="font-size: 0.85rem; color: var(--gray);">Qté: {{ $item['quantite'] }}</span>
                            </div>
                            <div style="font-weight: 600; font-size: 0.95rem;">
                                {{ number_format($item['subtotal'], 0, ',', ' ') }} FCFA
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div style="border-top: 2px solid var(--glass-border); padding-top: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: var(--gray);">Sous-total</span>
                        <span>{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1.5rem;">
                        <span style="color: var(--gray);">Livraison</span>
                        <span style="color: #10b981;">Gratuite</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-weight: 700; font-size: 1.4rem; color: var(--primary);">
                        <span>Total</span>
                        <span>{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
