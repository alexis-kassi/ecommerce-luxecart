@extends('layouts.app')

@section('content')
<div class="container" style="padding: 8rem 2rem; text-align: center;">
    <div style="width: 120px; height: 120px; background: #dcfce7; color: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 4rem; margin: 0 auto 3rem;">
        <i class="fa-solid fa-check"></i>
    </div>
    
    <h1 style="font-size: 3rem; margin-bottom: 1rem; color: var(--dark);">Merci pour votre commande !</h1>
    <p style="font-size: 1.2rem; color: var(--gray); margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;">
        Votre commande <strong>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</strong> a été enregistrée avec succès. Notre équipe vous contactera très prochainement pour confirmer la livraison.
    </p>

    <div style="background: var(--off-white); border: 1px solid var(--glass-border); border-radius: 20px; padding: 2rem; display: inline-block; margin-bottom: 4rem; text-align: left;">
        <div style="margin-bottom: 1rem;">
            <span style="color: var(--gray);">Résumé :</span> <strong style="color: var(--primary);">{{ number_format($order->total, 0, ',', ' ') }} FCFA</strong>
        </div>
        <div style="margin-bottom: 1rem;">
            <span style="color: var(--gray);">Livré à :</span> <strong>{{ $order->adresse }}, {{ $order->ville }}</strong>
        </div>
        <div>
            <span style="color: var(--gray);">Client :</span> <strong>{{ $order->nom }} ({{ $order->telephone }})</strong>
        </div>
    </div>

    <div>
        <a href="{{ route('home') }}" class="btn-primary" style="padding: 1rem 3rem;">Retour à l'accueil</a>
    </div>
</div>
@endsection
