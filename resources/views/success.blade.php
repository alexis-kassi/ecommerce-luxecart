-<!--LAYOUTS FICHIER SUCCES-->
@extends('layouts.app')

@push('styles')
    <style>
        .success-page-section {
            padding: 4rem 1rem 6rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            min-height: 80vh;
        }

        .success-card {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 28px;
            border: 1px solid #e2e8f0;
            padding: 3.5rem 2.5rem;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.04);
        }

        .success-icon-wrap {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #059669;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            margin: 0 auto 1.8rem;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.2);
            animation: pulse-success 2s infinite;
        }

        @keyframes pulse-success {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 14px rgba(16, 185, 129, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .success-title {
            font-family: var(--font-outfit);
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.6rem;
        }

        .success-subtitle {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 2.2rem;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
        }

        .order-pill-ref {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f1f5f9;
            color: #0f172a;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 2.5rem;
            border: 1px solid #cbd5e1;
        }

        /* Order details box */
        .order-receipt-box {
            background: #f8fafc;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            padding: 1.8rem 2rem;
            text-align: left;
            margin-bottom: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.1rem;
        }

        .receipt-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
        }

        .receipt-label {
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .receipt-label i {
            color: #4f46e5;
            width: 16px;
        }

        .receipt-val {
            font-weight: 600;
            color: #0f172a;
            text-align: right;
        }

        .receipt-val.price {
            font-family: var(--font-outfit);
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
        }

        .receipt-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 0.3rem 0;
        }

        .success-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-success-home {
            background: #0f172a;
            color: white;
            padding: 0.95rem 2.2rem;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.2);
        }

        .btn-success-home:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-2px);
        }

        .btn-success-shop {
            background: #f1f5f9;
            color: #0f172a;
            padding: 0.95rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-success-shop:hover {
            background: #e2e8f0;
        }

        @media (max-width: 640px) {
            .success-card {
                padding: 2rem 1.2rem;
            }
            .order-receipt-box {
                padding: 1.2rem;
            }
            .receipt-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.3rem;
            }
            .receipt-val {
                text-align: left;
            }
        }
    </style>
@endpush


@section('content')
    <section class="success-page-section">

        <div class="container">
            <div class="success-card">
                <div class="success-icon-wrap">
                    <i class="fa-solid fa-check"></i>
                </div>

                <h1 class="success-title">Commande validée avec succès !</h1>
                <p class="success-subtitle">
                    Merci <strong>{{ $order->nom }}</strong>, nous avons bien pris en compte votre commande. Notre équipe prépare votre colis avec le plus grand soin.
                </p>

                <div class="order-pill-ref">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Numéro de commande : #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>

                <div class="order-receipt-box">
                    <div class="receipt-row">
                        <span class="receipt-label"><i class="fa-regular fa-user"></i> Destinataire</span>
                        <span class="receipt-val">{{ $order->nom }} ({{ $order->telephone }})</span>
                    </div>

                    <div class="receipt-row">
                        <span class="receipt-label"><i class="fa-regular fa-envelope"></i> Email</span>
                        <span class="receipt-val">{{ $order->email }}</span>
                    </div>

                    <div class="receipt-row">
                        <span class="receipt-label"><i class="fa-solid fa-location-dot"></i> Adresse de livraison</span>
                        <span class="receipt-val">{{ $order->adresse }}, {{ $order->ville }}</span>
                    </div>

                    <div class="receipt-row">
                        <span class="receipt-label"><i class="fa-solid fa-wallet"></i> Mode de règlement</span>
                        <span class="receipt-val">
                            @if($order->methode_paiement === 'paiement_livraison')
                                Paiement en espèces à la livraison
                            @elseif($order->methode_paiement === 'mobile_money')
                                Mobile Money
                            @else
                                {{ ucfirst($order->methode_paiement) }}
                            @endif
                        </span>
                    </div>

                    <div class="receipt-divider"></div>

                    <div class="receipt-row">
                        <span class="receipt-label"><i class="fa-solid fa-bag-shopping"></i> Montant total</span>
                        <span class="receipt-val price">{{ number_format($order->total, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>

                <div class="success-actions">
                    <a href="{{ route('home') }}" class="btn-success-home">
                        <i class="fa-solid fa-house"></i>
                        <span>Retour à l'accueil</span>
                    </a>
                    <a href="{{ route('products.index') }}" class="btn-success-shop">
                        <span>Poursuivre mes achats</span>
                    </a>
                </div>
            </div>
        </div>
        
    </section>
@endsection