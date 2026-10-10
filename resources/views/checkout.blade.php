@extends('layouts.app')

@push('styles')
    <style>
        /* ===== CHECKOUT PAGE STYLES ===== */
        .checkout-page-section {
            padding: 3.5rem 0 6rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            min-height: 85vh;
        }

        /* Stepper de commande */
        .checkout-stepper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .checkout-step-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: #94a3b8;
            text-decoration: none;
        }

        .checkout-step-item.completed {
            color: #10b981;
        }

        .checkout-step-item.active {
            color: #0f172a;
        }

        .checkout-step-num {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e2e8f0;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .checkout-step-item.completed .checkout-step-num {
            background: #10b981;
            color: #ffffff;
        }

        .checkout-step-item.active .checkout-step-num {
            background: #0f172a;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.25);
        }

        .checkout-step-divider {
            width: 40px;
            height: 2px;
            background: #e2e8f0;
        }

        /* Header */
        .checkout-header-wrap {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .checkout-header-title {
            font-family: var(--font-outfit);
            font-size: clamp(2rem, 3.5vw, 2.7rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.4rem;
        }

        .checkout-header-subtitle {
            color: #64748b;
            font-size: 1.05rem;
            margin: 0;
        }

        .btn-back-to-cart {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #0f172a;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            padding: 0.65rem 1.3rem;
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 50px;
            transition: all 0.25s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }

        .btn-back-to-cart:hover {
            background: #f1f5f9;
            transform: translateX(-3px);
            border-color: #0f172a;
        }

        /* Error Alert */
        .checkout-alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 1rem 1.5rem;
            border-radius: 14px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Main Grid */
        .checkout-main-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 2.5rem;
            align-items: start;
        }

        /* Form Sections */
        .checkout-cards-column {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .checkout-section-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 2.2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .checkout-card-title-row {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.8rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .checkout-card-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        .checkout-card-title-row h3 {
            font-family: var(--font-outfit);
            font-size: 1.3rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }

        /* Form Inputs */
        .checkout-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .checkout-form-grid.full-width {
            grid-template-columns: 1fr;
        }

        .checkout-field {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .checkout-field.col-span-2 {
            grid-column: span 2;
        }

        .checkout-field label {
            font-size: 0.9rem;
            font-weight: 700;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .checkout-input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .checkout-input-wrap i {
            position: absolute;
            left: 1.1rem;
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .checkout-input {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            font-size: 0.95rem;
            font-family: var(--font-inter);
            color: #0f172a;
            outline: none;
            transition: all 0.25s ease;
        }

        .checkout-input:focus {
            background: #ffffff;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        .checkout-input:focus + i,
        .checkout-input-wrap:focus-within i {
            color: #4f46e5;
        }

        /* Payment Radio Cards */
        .payment-options-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .payment-radio-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 1.4rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .payment-radio-card:hover {
            border-color: #cbd5e1;
            background: #fafbfd;
        }

        .payment-radio-card.selected {
            border-color: #4f46e5;
            background: #f5f7ff;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.08);
        }

        .payment-radio-left {
            display: flex;
            align-items: center;
            gap: 1.1rem;
        }

        .payment-radio-custom {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .payment-radio-card.selected .payment-radio-custom {
            border-color: #4f46e5;
        }

        .payment-radio-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #4f46e5;
            display: none;
        }

        .payment-radio-card.selected .payment-radio-dot {
            display: block;
        }

        .payment-card-info h4 {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 0.2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .payment-badge-pill {
            background: #ecfdf5;
            color: #059669;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            text-transform: uppercase;
        }

        .payment-card-info p {
            color: #64748b;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.4;
        }

        .payment-radio-icon {
            font-size: 1.6rem;
            color: #4f46e5;
        }

        /* Order Summary Card */
        .checkout-summary-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 110px;
        }

        .summary-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .summary-header-row h3 {
            font-family: var(--font-outfit);
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }

        .summary-items-count {
            background: #f1f5f9;
            color: #475569;
            font-size: 0.82rem;
            font-weight: 700;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
        }

        /* Items Mini List */
        .checkout-items-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
            max-height: 300px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .checkout-item-mini {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f8fafc;
        }

        .checkout-item-mini:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .checkout-item-thumb {
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 12px;
            overflow: hidden;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            flex-shrink: 0;
        }

        .checkout-item-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .checkout-item-qty-tag {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #0f172a;
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        .checkout-item-info {
            flex: 1;
            min-width: 0;
        }

        .checkout-item-name {
            font-size: 0.92rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 0.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .checkout-item-meta {
            font-size: 0.8rem;
            color: #64748b;
        }

        .checkout-item-price {
            font-family: var(--font-outfit);
            font-weight: 700;
            font-size: 0.98rem;
            color: #0f172a;
            white-space: nowrap;
        }

        /* Summary Breakdown */
        .summary-calc-box {
            border-top: 1px solid #f1f5f9;
            padding-top: 1.4rem;
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .summary-calc-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
        }

        .calc-label {
            color: #64748b;
        }

        .calc-value {
            font-weight: 600;
            color: #0f172a;
        }

        .calc-value.free {
            color: #10b981;
            font-weight: 700;
            background: #ecfdf5;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.82rem;
        }

        .summary-total-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 0.5rem 0 1.2rem;
        }

        .summary-final-total-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 1.8rem;
        }

        .final-total-label {
            font-family: var(--font-outfit);
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
        }

        .final-total-price {
            font-family: var(--font-outfit);
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
        }

        .final-total-price small {
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
        }

        .btn-submit-order {
            width: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #312e81 100%);
            color: white;
            border: none;
            padding: 1.15rem 1.5rem;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.2);
        }

        .btn-submit-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.3);
            background: linear-gradient(135deg, #4338ca 0%, #4f46e5 100%);
        }

        .btn-submit-order i.fa-check-double {
            transition: transform 0.25s ease;
        }

        .btn-submit-order:hover i.fa-check-double {
            transform: scale(1.15);
        }

        /* Trust notes */
        .checkout-trust-footer {
            margin-top: 1.5rem;
            padding-top: 1.2rem;
            border-top: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .trust-bullet {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.82rem;
            color: #64748b;
        }

        .trust-bullet i {
            color: #4f46e5;
            font-size: 0.95rem;
            width: 16px;
        }

        @media (max-width: 991px) {
            .checkout-main-grid {
                grid-template-columns: 1fr;
            }
            .checkout-summary-card {
                position: static;
            }
            .checkout-form-grid {
                grid-template-columns: 1fr;
            }
            .checkout-field.col-span-2 {
                grid-column: span 1;
            }
            .checkout-section-card {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="checkout-page-section">
        <div class="container">
            <!-- Stepper du tunnel de commande -->
            <div class="checkout-stepper">
                <a href="{{ route('cart.index') }}" class="checkout-step-item completed">
                    <span class="checkout-step-num"><i class="fa-solid fa-check"></i></span>
                    <span>1. Panier validé</span>
                </a>
                <div class="checkout-step-divider"></div>
                <div class="checkout-step-item active">
                    <span class="checkout-step-num">2</span>
                    <span>2. Informations & Paiement</span>
                </div>
                <div class="checkout-step-divider"></div>
                <div class="checkout-step-item">
                    <span class="checkout-step-num">3</span>
                    <span>3. Confirmation</span>
                </div>
            </div>

            <!-- Messages d'erreur -->
            @if(session('error'))
                <div class="checkout-alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- En-tête -->
            <div class="checkout-header-wrap">
                <div>
                    <h1 class="checkout-header-title">Finaliser votre commande</h1>
                    <p class="checkout-header-subtitle">Remplissez vos coordonnées pour expédier votre colis en un temps record.</p>
                </div>
                <a href="{{ route('cart.index') }}" class="btn-back-to-cart">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Modifier le panier</span>
                </a>
            </div>

            <form action="{{ route('checkout.process') }}" method="POST" id="checkout-main-form">
                @csrf
                <div class="checkout-main-grid">
                    <!-- Formulaire de coordonnées et livraison -->
                    <div class="checkout-cards-column">
                        <!-- 1. Coordonnées de contact -->
                        <div class="checkout-section-card">
                            <div class="checkout-card-title-row">
                                <div class="checkout-card-icon">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div>
                                    <h3>Coordonnées du client</h3>
                                </div>
                            </div>

                            <div class="checkout-form-grid">
                                <div class="checkout-field">
                                    <label for="nom">Nom et prénoms *</label>
                                    <div class="checkout-input-wrap">
                                        <input type="text" id="nom" name="nom" class="checkout-input" 
                                               value="{{ old('nom', Auth::check() ? Auth::user()->name : '') }}" 
                                               placeholder="Ex: Kouamé Jean" required>
                                        <i class="fa-regular fa-id-badge"></i>
                                    </div>
                                </div>

                                <div class="checkout-field">
                                    <label for="telephone">Numéro de téléphone WhatsApp / Appel *</label>
                                    <div class="checkout-input-wrap">
                                        <input type="tel" id="telephone" name="telephone" class="checkout-input" 
                                               value="{{ old('telephone') }}" 
                                               placeholder="Ex: +225 07 00 00 00 00" required>
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>

                                <div class="checkout-field col-span-2">
                                    <label for="email">Adresse email de confirmation *</label>
                                    <div class="checkout-input-wrap">
                                        <input type="email" id="email" name="email" class="checkout-input" 
                                               value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" 
                                               placeholder="Ex: jean.kouame@gmail.com" required>
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Adresse de livraison -->
                        <div class="checkout-section-card">
                            <div class="checkout-card-title-row">
                                <div class="checkout-card-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <h3>Adresse de livraison</h3>
                                </div>
                            </div>

                            <div class="checkout-form-grid">
                                <div class="checkout-field">
                                    <label for="ville">Ville *</label>
                                    <div class="checkout-input-wrap">
                                        <input type="text" id="ville" name="ville" class="checkout-input" 
                                               value="{{ old('ville', 'Abidjan') }}" 
                                               placeholder="Ex: Abidjan, Bouaké, Yamoussoukro..." required>
                                        <i class="fa-solid fa-city"></i>
                                    </div>
                                </div>

                                <div class="checkout-field">
                                    <label for="adresse">Commune / Quartier & Repères *</label>
                                    <div class="checkout-input-wrap">
                                        <input type="text" id="adresse" name="adresse" class="checkout-input" 
                                               value="{{ old('adresse') }}" 
                                               placeholder="Ex: Cocody Angré 8e tranche, vers le supermarché" required>
                                        <i class="fa-solid fa-map-pin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Méthode de paiement -->
                        <div class="checkout-section-card">
                            <div class="checkout-card-title-row">
                                <div class="checkout-card-icon">
                                    <i class="fa-regular fa-credit-card"></i>
                                </div>
                                <div>
                                    <h3>Mode de règlement</h3>
                                </div>
                            </div>

                            <div class="payment-options-grid">
                                <!-- Option 1 : Paiement à la livraison -->
                                <label class="payment-radio-card selected" onclick="selectPayment(this)">
                                    <input type="radio" name="methode_paiement" value="paiement_livraison" checked style="display: none;">
                                    <div class="payment-radio-left">
                                        <div class="payment-radio-custom">
                                            <div class="payment-radio-dot"></div>
                                        </div>
                                        <div class="payment-card-info">
                                            <h4>
                                                Paiement à la livraison (Espèces)
                                                <span class="payment-badge-pill">Recommandé</span>
                                            </h4>
                                            <p>Réglez en toute confiance en espèces lors de la réception de votre colis après inspection.</p>
                                        </div>
                                    </div>
                                    <div class="payment-radio-icon">
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                    </div>
                                </label>

                                <!-- Option 2 : Mobile Money -->
                                <label class="payment-radio-card" onclick="selectPayment(this)">
                                    <input type="radio" name="methode_paiement" value="mobile_money" style="display: none;">
                                    <div class="payment-radio-left">
                                        <div class="payment-radio-custom">
                                            <div class="payment-radio-dot"></div>
                                        </div>
                                        <div class="payment-card-info">
                                            <h4>
                                                Mobile Money (Wave / Orange / MTN / Moov)
                                                <span class="payment-badge-pill" style="background: #eff6ff; color: #2563eb;">Instantané</span>
                                            </h4>
                                            <p>Règlement rapide et sans contact directement via votre compte mobile money.</p>
                                        </div>
                                    </div>
                                    <div class="payment-radio-icon">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                    </div>
                                </label>

                                <!-- Option 3 : Carte Bancaire -->
                                <label class="payment-radio-card" onclick="selectPayment(this)">
                                    <input type="radio" name="methode_paiement" value="carte_bancaire" style="display: none;">
                                    <div class="payment-radio-left">
                                        <div class="payment-radio-custom">
                                            <div class="payment-radio-dot"></div>
                                        </div>
                                        <div class="payment-card-info">
                                            <h4>
                                                Carte Bancaire (Visa / Mastercard)
                                                <span class="payment-badge-pill" style="background: #fdf2f8; color: #db2777;">SSL 256 bits</span>
                                            </h4>
                                            <p>Paiement sécurisé par carte de crédit ou de débit internationale.</p>
                                        </div>
                                    </div>
                                    <div class="payment-radio-icon">
                                        <i class="fa-regular fa-credit-card"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Récapitulatif de Commande (Sticky) -->
                    <div class="checkout-summary-column">
                        <div class="checkout-summary-card">
                            <div class="summary-header-row">
                                <h3>Articles commandés</h3>
                                <span class="summary-items-count">{{ count($items) }} {{ count($items) > 1 ? 'articles' : 'article' }}</span>
                            </div>

                            <div class="checkout-items-list">
                                @foreach($items as $item)
                                    <div class="checkout-item-mini">
                                        <div class="checkout-item-thumb">
                                            <img src="{{ asset($item['produit']->image ?? 'images/placeholder-product.jpg') }}" alt="{{ $item['produit']->nom }}">
                                            <span class="checkout-item-qty-tag">{{ $item['quantite'] }}</span>
                                        </div>
                                        <div class="checkout-item-info">
                                            <h4 class="checkout-item-name">{{ $item['produit']->nom }}</h4>
                                            <span class="checkout-item-meta">{{ number_format($item['produit']->prix, 0, ',', ' ') }} FCFA × {{ $item['quantite'] }}</span>
                                        </div>
                                        <div class="checkout-item-price">
                                            {{ number_format($item['subtotal'], 0, ',', ' ') }} FCFA
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="summary-calc-box">
                                <div class="summary-calc-row">
                                    <span class="calc-label">Sous-total</span>
                                    <span class="calc-value">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="summary-calc-row">
                                    <span class="calc-label">Frais de livraison</span>
                                    <span class="calc-value free"><i class="fa-solid fa-check"></i> Gratuite</span>
                                </div>
                                <div class="summary-calc-row">
                                    <span class="calc-label">Assurance casse & vol</span>
                                    <span class="calc-value" style="color: #64748b;">Offerte</span>
                                </div>
                            </div>

                            <div class="summary-total-divider"></div>

                            <div class="summary-final-total-row">
                                <span class="final-total-label">Total à régler</span>
                                <span class="final-total-price">
                                    {{ number_format($total, 0, ',', ' ') }} <small>FCFA</small>
                                </span>
                            </div>

                            <button type="submit" class="btn-submit-order" id="btnSubmitOrder">
                                <i class="fa-solid fa-shield-halved"></i>
                                <span>Confirmer la commande</span>
                                <i class="fa-solid fa-check-double"></i>
                            </button>

                            <div class="checkout-trust-footer">
                                <div class="trust-bullet">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    <span>Livraison 24h à Abidjan & 48h à l'intérieur</span>
                                </div>
                                <div class="trust-bullet">
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <span>Confirmation d'expédition téléphonique immédiate</span>
                                </div>
                                <div class="trust-bullet">
                                    <i class="fa-solid fa-rotate-left"></i>
                                    <span>Vérification possible du colis à la livraison</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        function selectPayment(selectedCard) {
            document.querySelectorAll('.payment-radio-card').forEach(card => {
                card.classList.remove('selected');
            });
            selectedCard.classList.add('selected');
            const radio = selectedCard.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        }
    </script>
@endsection