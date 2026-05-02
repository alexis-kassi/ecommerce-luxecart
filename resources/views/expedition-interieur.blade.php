@extends('layouts.app')

@section('content')

<div style="background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%); padding: 5rem 2rem; text-align: center; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; left: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--secondary) 0%, transparent 70%); opacity: 0.15; filter: blur(60px);"></div>
    <div class="container animate-fade-up" style="position: relative; z-index: 1;">
        <h1 style="font-family: var(--font-outfit); font-size: 3rem; font-weight: 700; margin-bottom: 1rem;">Livraison à <span style="background: linear-gradient(90deg, var(--secondary), var(--primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">l'Intérieur</span></h1>
        <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto;">Informations sur l'expédition de vos colis dans les villes de l'intérieur de la Côte d'Ivoire.</p>
    </div>
</div>

<div class="container animate-fade-up" style="padding: 5rem 2rem; max-width: 800px; margin: 0 auto;">
    <div style="background: var(--card-bg); padding: 4rem; border-radius: 30px; box-shadow: var(--shadow); border: 1px solid var(--glass-border);">
        <div style="width: 80px; height: 80px; background: rgba(245, 158, 11, 0.1); border-radius: 25px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
            <i class="fa-solid fa-truck-fast" style="font-size: 2.5rem; color: var(--secondary);"></i>
        </div>
        
        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: var(--dark); margin-bottom: 1.5rem;">Agences Partenaires</h2>
        <p style="color: var(--gray); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
            Pour garantir la sécurité et la rapidité de vos livraisons en dehors d'Abidjan, nous travaillons avec les compagnies de transport les plus fiables (UTB, SBTA, etc.).
        </p>

        <h2 style="font-family: var(--font-outfit); font-size: 2rem; color: var(--dark); margin-bottom: 1.5rem;">Délais et Modalités</h2>
        <ul style="list-style: none; padding: 0; color: var(--gray); font-size: 1.1rem; line-height: 2;">
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-check" style="color: var(--secondary); margin-right: 10px;"></i> <strong>Délai :</strong> 3 à 5 jours ouvrables.</li>
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-check" style="color: var(--secondary); margin-right: 10px;"></i> <strong>Récupération :</strong> En agence (Gare de la compagnie de transport de votre ville).</li>
            <li style="margin-bottom: 1rem;"><i class="fa-solid fa-check" style="color: var(--secondary); margin-right: 10px;"></i> <strong>Frais :</strong> Les frais d'expédition sont généralement à la charge du client à la réception, sauf mention contraire.</li>
        </ul>

        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
            <a href="{{ route('expedition') }}" style="color: var(--secondary); text-decoration: none; font-weight: 600;"><i class="fa-solid fa-arrow-left"></i> Retour à la politique d'expédition</a>
        </div>
    </div>
</div>

@endsection
