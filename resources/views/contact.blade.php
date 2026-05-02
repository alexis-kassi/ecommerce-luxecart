@extends('layouts.app')

@section('content')

    <!-- Hero Section pour la page -->
    <div
        style="background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%); padding: 6rem 2rem; text-align: center; color: white; position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: -50%; right: -10%; width: 60%; height: 200%; background: radial-gradient(circle, var(--primary) 0%, transparent 60%); opacity: 0.15; filter: blur(60px);">
        </div>
        <div
            style="position: absolute; bottom: -50%; left: -10%; width: 50%; height: 200%; background: radial-gradient(circle, var(--secondary) 0%, transparent 60%); opacity: 0.15; filter: blur(60px);">
        </div>

        <div class="container animate-fade-up" style="position: relative; z-index: 1;">
            <span
                style="background: rgba(255,255,255,0.1); padding: 0.5rem 1.5rem; border-radius: 50px; font-size: 0.9rem; font-weight: 600; letter-spacing: 1px; margin-bottom: 1.5rem; display: inline-block; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">NOUS
                JOINDRE</span>
            <h1
                style="font-family: var(--font-outfit); font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
                Contactez-<span
                    style="background: linear-gradient(90deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">nous</span>
            </h1>
            <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto;">Notre équipe d'experts est à
                votre disposition pour vous offrir une assistance premium et répondre à toutes vos interrogations dès
                maintenant.</p>
        </div>
    </div>

    <div class="container" style="padding: 5rem 2rem;">
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 4rem; align-items: flex-start;">

            <!-- Informations -->
            <div class="animate-fade-up">
                <h2 style="font-family: var(--font-outfit); font-size: 2.2rem; margin-bottom: 1rem; color: var(--darker);">
                    Laissez-nous un message</h2>
                <p style="color: var(--gray); margin-bottom: 3rem; line-height: 1.7;">
                    Que vous ayez une question sur un produit de luxe, besoin d'aide pour votre commande ou souhaitiez une
                    assistance personnalisée, nous sommes là pour vous.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <!-- Carte Info 1 -->
                    <div style="display: flex; align-items: center; gap: 1.5rem; background: var(--card-bg); padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition);"
                        onmouseover="this.style.transform='translateX(10px)'; this.style.borderColor='var(--primary)';"
                        onmouseout="this.style.transform='translateX(0)'; this.style.borderColor='var(--glass-border)';">
                        <div
                            style="background: rgba(99, 102, 241, 0.1); color: var(--primary); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 16px; font-size: 1.5rem;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: var(--dark);">Notre Boutique</h3>
                            <p style="color: var(--gray); font-size: 0.95rem;">Plateau, Abidjan, Côte d'Ivoire</p>
                        </div>
                    </div>

                    <!-- Carte Info 2 -->
                    <div style="display: flex; align-items: center; gap: 1.5rem; background: var(--card-bg); padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition);"
                        onmouseover="this.style.transform='translateX(10px)'; this.style.borderColor='var(--secondary)';"
                        onmouseout="this.style.transform='translateX(0)'; this.style.borderColor='var(--glass-border)';">
                        <div
                            style="background: rgba(245, 158, 11, 0.1); color: var(--secondary); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 16px; font-size: 1.5rem;">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: var(--dark);">Téléphone</h3>
                            <p style="color: var(--gray); font-size: 0.95rem;">+225 01 02 03 04 05</p>
                            <span style="font-size: 0.8rem; color: var(--primary); font-weight: 500;">Lun-Ven, 9h-18h</span>
                        </div>
                    </div>

                    <!-- Carte Info 3 -->
                    <div style="display: flex; align-items: center; gap: 1.5rem; background: var(--card-bg); padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow); border: 1px solid var(--glass-border); transition: var(--transition);"
                        onmouseover="this.style.transform='translateX(10px)'; this.style.borderColor='var(--primary)';"
                        onmouseout="this.style.transform='translateX(0)'; this.style.borderColor='var(--glass-border)';">
                        <div
                            style="background: rgba(99, 102, 241, 0.1); color: var(--primary); width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 16px; font-size: 1.5rem;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 1.1rem; margin-bottom: 0.3rem; color: var(--dark);">Email Support</h3>
                            <p style="color: var(--gray); font-size: 0.95rem;">contact@luxecart.ci</p>
                            <span style="font-size: 0.8rem; color: var(--primary); font-weight: 500;">Réponse en 24h</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire Premium -->
            <div class="animate-fade-up" style="transition-delay: 0.2s;">
                <div
                    style="background: var(--card-bg); padding: 3.5rem; border-radius: 30px; box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1); border: 1px solid var(--glass-border); position: relative;">

                    <!-- Décoration formulaire -->
                    <div
                        style="position: absolute; top: -15px; right: -15px; width: 100px; height: 100px; background: radial-gradient(circle, var(--secondary) 0%, transparent 70%); opacity: 0.2; filter: blur(20px); z-index: 0;">
                    </div>

                    <form action="#" method="POST" style="position: relative; z-index: 1;">
                        @csrf

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                            <div>
                                <label for="name"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: var(--darker);">Nom
                                    complet</label>
                                <input type="text" id="name" name="name"
                                    style="width: 100%; padding: 1rem 1.2rem; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--off-white); transition: var(--transition); outline: none;"
                                    placeholder=""
                                    onfocus="this.style.borderColor='var(--primary)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)';"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='var(--off-white)'; this.style.boxShadow='none';"
                                    required>
                            </div>
                            <div>
                                <label for="phone"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: var(--darker);">Téléphone</label>
                                <input type="text" id="phone" name="phone"
                                    style="width: 100%; padding: 1rem 1.2rem; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--off-white); transition: var(--transition); outline: none;"
                                    placeholder=""
                                    onfocus="this.style.borderColor='var(--primary)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)';"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='var(--off-white)'; this.style.boxShadow='none';">
                            </div>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <label for="email"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: var(--darker);">Adresse
                                Email *</label>
                            <input type="email" id="email" name="email"
                                style="width: 100%; padding: 1rem 1.2rem; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--off-white); transition: var(--transition); outline: none;"
                                placeholder=""
                                onfocus="this.style.borderColor='var(--primary)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)';"
                                onblur="this.style.borderColor='#e2e8f0'; this.style.background='var(--off-white)'; this.style.boxShadow='none';"
                                required>
                        </div>

                        <div style="margin-bottom: 2rem;">
                            <label for="message"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: var(--darker);">Votre
                                message *</label>
                            <textarea id="message" name="message" rows="5"
                                style="width: 100%; padding: 1rem 1.2rem; border: 1px solid #e2e8f0; border-radius: 12px; font-family: inherit; font-size: 0.95rem; background: var(--off-white); transition: var(--transition); outline: none; resize: vertical;"
                                placeholder="Comment pouvons-nous vous aider ?"
                                onfocus="this.style.borderColor='var(--primary)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)';"
                                onblur="this.style.borderColor='#e2e8f0'; this.style.background='var(--off-white)'; this.style.boxShadow='none';"
                                required></textarea>
                        </div>

                        <button type="submit" class="btn-primary"
                            style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px; font-size: 1.05rem; padding: 1.2rem;">
                            Envoyer le message <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Ajout pour assurer l'animation pour les écrans mobiles -->
    <style>
        @media (max-width: 991px) {
            .container>div {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
    <script>
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