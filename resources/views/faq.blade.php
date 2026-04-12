@extends('layouts.app')

@section('content')
<div class="faq-page container" style="padding: 6rem 2rem;">
    <div class="section-header" style="text-align: center; margin-bottom: 5rem;">
        <h1 style="font-size: 3.5rem; color: var(--dark); margin-bottom: 1rem; font-family: var(--font-outfit);">Questions <span>Fréquentes</span></h1>
        <p style="color: var(--gray); font-size: 1.1rem;">Tout ce que vous devez savoir sur vos achats chez LuxeCart.</p>
    </div>

    <div class="faq-container" style="max-width: 800px; margin: 0 auto;">
        <!-- Categories de FAQ -->
        <div class="faq-category" style="margin-bottom: 4rem;">
            <h3 style="margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--primary); display: inline-block;">📦 Livraison & Commandes</h3>
            
            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Quels sont les délais de livraison à Abidjan ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        Nous livrons en 24h à 48h ouvrables pour toute commande effectuée à Abidjan. Pour les urgences, nous proposons une livraison "Express" le jour même pour toute commande validée avant 11h.
                    </div>
                </details>
            </div>

            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Livrez-vous à l'intérieur du pays ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        Oui ! Nous livrons dans toutes les grandes villes de Côte d'Ivoire (Yamoussoukro, Bouaké, San-Pedro, Korhogo, etc.) via nos partenaires logistiques. Le délai moyen est de 3 à 5 jours ouvrables.
                    </div>
                </details>
            </div>
        </div>

        <div class="faq-category" style="margin-bottom: 4rem;">
            <h3 style="margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--primary); display: inline-block;">💳 Paiements & Sécurité</h3>
            
            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Quels sont les modes de paiement acceptés ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        Nous acceptons le paiement à la livraison (en espèces), ainsi que les paiements via Mobile Money (Orange Money, Wave, MTN MoMo). Pour les entreprises, le virement bancaire est également possible.
                    </div>
                </details>
            </div>

            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Est-ce que le paiement Mobile Money est sécurisé ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        Absolument. LuxeCart n'enregistre jamais vos codes secrets. Toutes les transactions passent par les plateformes sécurisées des opérateurs télécoms agréés en Côte d'Ivoire.
                    </div>
                </details>
            </div>
        </div>

        <div class="faq-category">
            <h3 style="margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--primary); display: inline-block;">🔄 Retours & Garanties</h3>
            
            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Puis-je retourner un produit s'il ne me convient pas ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        Oui, vous disposez d'un délai de 7 jours après réception pour demander un échange ou un remboursement si le produit est retourné dans son emballage d'origine et n'a pas été utilisé.
                    </div>
                </details>
            </div>

            <div class="faq-item" style="background: var(--off-white); border-radius: 20px; border: 1px solid var(--glass-border); margin-bottom: 1rem; overflow: hidden;">
                <details style="padding: 1.5rem;">
                    <summary style="font-weight: 600; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                        Les produits LuxeCart sont-ils originaux ?
                        <i class="fa-solid fa-chevron-down" style="font-size: 0.8rem; color: var(--primary);"></i>
                    </summary>
                    <div style="margin-top: 1.5rem; color: var(--gray); line-height: 1.8;">
                        LuxeCart s'engage sur la qualité. Nous importons directement nos produits auprès de fournisseurs certifiés à l'international. Chaque article est contrôlé par notre équipe qualité avant d'être mis en vente.
                    </div>
                </details>
            </div>
        </div>
    </div>

    <!-- Contact CTA -->
    <div style="text-align: center; margin-top: 6rem; padding: 4rem; background: var(--off-white); border-radius: 40px; border: 1px solid var(--glass-border);">
        <h3 style="margin-bottom: 1rem;">Vous avez encore des questions ?</h3>
        <p style="color: var(--gray); margin-bottom: 2rem;">Notre équipe support est là pour vous aider 6j/7 de 8h à 18h.</p>
        <a href="https://wa.me/2250000000000" target="_blank" class="btn-primary" style="display: inline-flex; align-items: center; gap: 1rem;">
            Nous contacter sur WhatsApp <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
</div>

<style>
    /* Styling for the summary chevron animation */
    details[open] summary i {
        transform: rotate(180deg);
    }
    
    summary i {
        transition: transform 0.3s ease;
    }

    /* Remove the default disclosure triangle */
    summary::-webkit-details-marker {
        display: none;
    }
</style>
@endsection
