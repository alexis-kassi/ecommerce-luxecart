@extends('layouts.app')

@section('content')

<!-- Hero Section pour la page Expédition -->
<div style="background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%); padding: 6rem 2rem; text-align: center; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; left: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--primary) 0%, transparent 70%); opacity: 0.15; filter: blur(60px);"></div>
    <div style="position: absolute; bottom: -50%; right: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--secondary) 0%, transparent 70%); opacity: 0.15; filter: blur(60px);"></div>
    
    <div class="container animate-fade-up" style="position: relative; z-index: 1;">
        <span style="background: rgba(255,255,255,0.1); padding: 0.5rem 1.5rem; border-radius: 50px; font-size: 0.9rem; font-weight: 600; letter-spacing: 1px; margin-bottom: 1.5rem; display: inline-block; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">INFORMATIONS</span>
        <h1 style="font-family: var(--font-outfit); font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">Politique d'<span style="background: linear-gradient(90deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Expédition</span></h1>
        <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto;">Recevez vos articles rapidement et en toute sécurité. Découvrez nos modes de livraison, nos tarifs et nos délais.</p>
    </div>
</div>

<div class="container" style="padding: 5rem 2rem;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem;">
        
        <!-- Abidjan (Carte cliquable) -->
        <a href="{{ route('expedition.abidjan') }}" class="animate-fade-up" style="text-decoration: none; color: inherit; display: block; background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--primary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
            <div style="width: 70px; height: 70px; background: rgba(99, 102, 241, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                <i class="fa-solid fa-motorcycle" style="font-size: 2rem; color: var(--primary);"></i>
            </div>
            <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">1. Livraison à Abidjan</h2>
            <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                Toutes nos livraisons sur Abidjan et ses banlieues proches sont effectuées dans un délai de <strong style="color: var(--dark);">24h à 48h</strong> jours ouvrables. Nous proposons la livraison à domicile ou au bureau. La livraison est <strong>gratuite</strong> pour toutes les commandes.
            </p>
        </a>

        <!-- Interieur du pays (Carte cliquable) -->
        <a href="{{ route('expedition.interieur') }}" class="animate-fade-up" style="text-decoration: none; color: inherit; display: block; background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden; transition-delay: 0.1s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--secondary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
            <div style="width: 70px; height: 70px; background: rgba(245, 158, 11, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                <i class="fa-solid fa-truck-fast" style="font-size: 2rem; color: var(--secondary);"></i>
            </div>
            <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">2. Intérieur du pays</h2>
            <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                Pour les villes de l'intérieur de la Côte d'Ivoire, nous expédions via nos agences de transport partenaires. Le délai de livraison varie entre <strong style="color: var(--dark);">3 à 5 jours</strong>. Vous récupérez votre colis directement à la gare de l'agence.
            </p>
        </a>

        <!-- Suivi (Carte cliquable) -->
        <a href="{{ route('expedition.suivi') }}" class="animate-fade-up" style="text-decoration: none; color: inherit; display: block; background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden; transition-delay: 0.2s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--primary)';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
            <div style="width: 70px; height: 70px; background: rgba(16, 185, 129, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                <i class="fa-solid fa-location-dot" style="font-size: 2rem; color: #10b981;"></i>
            </div>
            <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">3. Suivi de commande</h2>
            <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                Dès que votre commande est expédiée, notre équipe logistique vous contacte par téléphone ou WhatsApp pour vous tenir informé de l'avancée de la livraison et vous confirmer le jour de réception.
            </p>
        </a>

    </div>

    <!-- Section aide supplémentaire -->
    <div class="animate-fade-up" style="margin-top: 5rem; background: var(--off-white); border-radius: 30px; padding: 4rem; text-align: center; border: 1px solid var(--glass-border);">
        <h3 style="font-family: var(--font-outfit); font-size: 2rem; margin-bottom: 1rem; color: var(--darker);">Une question sur votre livraison ?</h3>
        <p style="color: var(--gray); margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">Notre équipe est disponible pour vous donner des détails précis sur l'expédition de vos articles.</p>
        <a href="{{ route('contact') }}" class="btn-primary" style="display: inline-flex; align-items: center; gap: 10px;">
            <i class="fa-regular fa-envelope"></i> Nous contacter
        </a>
    </div>
</div>
@endsection
