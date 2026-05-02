@extends('layouts.app')

@section('content')

    <!-- Hero Section pour la page -->
    <div
        style="background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%); padding: 6rem 2rem; text-align: center; color: white; position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: -50%; left: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--primary) 0%, transparent 70%); opacity: 0.15; filter: blur(60px);">
        </div>
        <div
            style="position: absolute; bottom: -50%; right: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--secondary) 0%, transparent 70%); opacity: 0.15; filter: blur(60px);">
        </div>

        <div class="container animate-fade-up" style="position: relative; z-index: 1;">
            <span
                style="background: rgba(255,255,255,0.1); padding: 0.5rem 1.5rem; border-radius: 50px; font-size: 0.9rem; font-weight: 600; letter-spacing: 1px; margin-bottom: 1.5rem; display: inline-block; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
                AIDE & SUPPORT
            </span>
            <h1
                style="font-family: var(--font-outfit); font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
                Politique de <span
                    style="background: linear-gradient(90deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Retours</span>
            </h1>
            <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto;">
                Votre satisfaction est notre priorité. Découvrez comment retourner un article facilement et rapidement.
            </p>
        </div>
    </div>

    <div class="container" style="padding: 5rem 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem;">

            <!-- Condition de retour -->
            <div class="animate-fade-up"
                style="background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden;"
                onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--primary)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
                <div
                    style="width: 70px; height: 70px; background: rgba(99, 102, 241, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <i class="fa-solid fa-box-open" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">
                    1. Conditions de retour
                </h2>
                <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                    Vous disposez d'un délai de <strong style="color: var(--dark);">14 jours</strong> après réception de
                    votre commande pour nous retourner un article s'il ne vous convient pas. Les articles doivent être
                    retournés dans leur état d'origine, avec leurs étiquettes et dans leur emballage d'origine, non portés
                    et non lavés.
                </p>
            </div>

            <!-- Procédure -->
            <div class="animate-fade-up"
                style="background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden; transition-delay: 0.1s;"
                onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--secondary)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
                <div
                    style="width: 70px; height: 70px; background: rgba(245, 158, 11, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <i class="fa-solid fa-truck-fast" style="font-size: 2rem; color: var(--secondary);"></i>
                </div>
                <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">
                    2. Procédure simple
                </h2>
                <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                    Pour initier un retour, veuillez nous contacter via notre page Contact en précisant votre <strong
                        style="color: var(--dark);">numéro de commande</strong> et la raison du retour. Notre équipe dédiée
                    vous fournira les instructions détaillées ainsi qu'une étiquette de retour prépayée.
                </p>
            </div>

            <!-- Remboursement -->
            <div class="animate-fade-up"
                style="background: var(--card-bg); padding: 3rem 2rem; border-radius: 24px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition); position: relative; overflow: hidden; transition-delay: 0.2s;"
                onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='var(--primary)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='var(--glass-border)';">
                <div
                    style="width: 70px; height: 70px; background: rgba(99, 102, 241, 0.1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                    <i class="fa-solid fa-money-bill-transfer" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h2 style="font-family: var(--font-outfit); font-size: 1.5rem; margin-bottom: 1rem; color: var(--dark);">
                    3. Remboursements
                </h2>
                <p style="line-height: 1.7; color: var(--gray); font-size: 0.95rem;">
                    Une fois votre retour reçu et inspecté par nos soins, nous vous enverrons un email pour confirmer
                    l'approbation de votre remboursement. Celui-ci sera automatiquement traité sur votre méthode de paiement
                    originale dans un délai de <strong style="color: var(--dark);">5 à 7 jours ouvrables</strong>.
                </p>
            </div>

        </div>

        <!-- Section aide supplémentaire -->
        <div class="animate-fade-up"
            style="margin-top: 5rem; background: var(--off-white); border-radius: 30px; padding: 4rem; text-align: center; border: 1px solid var(--glass-border);">
            <h3 style="font-family: var(--font-outfit); font-size: 2rem; margin-bottom: 1rem; color: var(--darker);">
                Une question spécifique ?
            </h3>
            <p style="color: var(--gray); margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">
                Notre équipe de support client est disponible 7j/7 pour vous accompagner dans vos démarches de retour ou
                d'échange.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary"
                style="display: inline-flex; align-items: center; gap: 10px;">
                <i class="fa-regular fa-envelope"></i> Nous contacter
            </a>
        </div>
    </div>

    <script>
        /* Assurer que les animations se déclenchent correctement au chargement */
        document.addEventListener("DOMContentLoaded", function () {
            const elements = document.querySelectorAll('.animate-fade-up');
            elements.forEach(el => {
                setTimeout(() => {
                    el.classList.add('visible');
                }, 100);
            });
        });
    </script>
@endsection