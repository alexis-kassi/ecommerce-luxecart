@extends('layouts.app')

@section('content')

<div style="background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%); padding: 5rem 2rem; text-align: center; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; left: -10%; width: 50%; height: 200%; background: radial-gradient(circle, #10b981 0%, transparent 70%); opacity: 0.15; filter: blur(60px);"></div>
    <div class="container animate-fade-up" style="position: relative; z-index: 1;">
        <h1 style="font-family: var(--font-outfit); font-size: 3rem; font-weight: 700; margin-bottom: 1rem;">Suivi de <span style="background: linear-gradient(90deg, #10b981, var(--primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Commande</span></h1>
        <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto;">Restez informé de l'avancée de votre livraison à chaque étape.</p>
    </div>
</div>

<div class="container animate-fade-up" style="padding: 5rem 2rem; max-width: 800px; margin: 0 auto;">
    <div style="background: var(--card-bg); padding: 4rem; border-radius: 30px; box-shadow: var(--shadow); border: 1px solid var(--glass-border);">
        <div style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.1); border-radius: 25px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
            <i class="fa-solid fa-location-dot" style="font-size: 2.5rem; color: #10b981;"></i>
        </div>
        
        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: var(--dark); margin-bottom: 1.5rem;">Comment suivre votre colis ?</h2>
        <p style="color: var(--gray); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
            Dès la validation de votre commande, notre équipe logistique prend le relais. Vous recevrez des notifications par appel téléphonique ou par WhatsApp.
        </p>

        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: var(--dark); margin-bottom: 1.5rem;">Étapes de Livraison</h2>
        <ul style="list-style: none; padding: 0; color: var(--gray); font-size: 1.1rem; line-height: 2;">
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-1" style="color: #10b981; margin-right: 10px;"></i> <strong>Préparation :</strong> Votre commande est emballée avec soin.</li>
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-2" style="color: #10b981; margin-right: 10px;"></i> <strong>Expédition :</strong> Remise au livreur (Abidjan) ou à l'agence de transport (Intérieur).</li>
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-3" style="color: #10b981; margin-right: 10px;"></i> <strong>Réception :</strong> Nous vous contactons pour confirmer l'arrivée de votre colis.</li>
        </ul>

        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--glass-border); display: flex; flex-direction: column; gap: 1.5rem;">
            <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-block; text-align: center; max-width: 300px;">Contacter le service client</a>
            <a href="{{ route('expedition') }}" style="color: #10b981; text-decoration: none; font-weight: 600;"><i class="fa-solid fa-arrow-left"></i> Retour à la politique d'expédition</a>
        </div>
    </div>
</div>

@endsection
