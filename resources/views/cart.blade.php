@extends('layouts.app')

@push('styles')
    <style>
        /* ===== LUXE CART PAGE STYLES ===== */
        .cart-page-section {
            padding: 3.5rem 0 6rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            min-height: 80vh;
        }

        /* Stepper de commande */
        .cart-stepper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: #94a3b8;
        }

        .step-item.active {
            color: #0f172a;
        }

        .step-num {
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

        .step-item.active .step-num {
            background: #0f172a;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.25);
        }

        .step-divider {
            width: 40px;
            height: 2px;
            background: #e2e8f0;
        }

        /* Header */
        .cart-header-wrap {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .cart-header-title {
            font-family: var(--font-outfit);
            font-size: clamp(2rem, 3.5vw, 2.7rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .cart-badge-count {
            background: #e0e7ff;
            color: #4f46e5;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.25rem 0.85rem;
            border-radius: 50px;
            vertical-align: middle;
        }

        .cart-header-subtitle {
            color: #64748b;
            font-size: 1.05rem;
            margin: 0;
        }

        .btn-continue-shopping {
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

        .btn-continue-shopping:hover {
            background: #f1f5f9;
            border-color: #0f172a;
            transform: translateX(-3px);
        }

        /* Success Alert */
        .cart-alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            padding: 1rem 1.5rem;
            border-radius: 14px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
            animation: fadeIn 0.4s ease;
        }

        /* Layout Grid */
        .cart-main-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2.5rem;
            align-items: start;
        }

        /* Items Container */
        .cart-items-container {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .cart-items-header {
            display: grid;
            grid-template-columns: 3fr 1.5fr 1.5fr 40px;
            padding: 0.75rem 1rem 1.2rem;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.82rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* Cart Card Row */
        .cart-item-row {
            display: grid;
            grid-template-columns: 3fr 1.5fr 1.5fr 40px;
            align-items: center;
            padding: 1.6rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.2s ease;
            position: relative;
        }

        .cart-item-row:last-child {
            border-bottom: none;
        }

        .cart-item-row:hover {
            background: #fafbfd;
            border-radius: 16px;
        }

        .cart-item-product {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .cart-item-thumb {
            width: 85px;
            height: 85px;
            min-width: 85px;
            border-radius: 14px;
            overflow: hidden;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .cart-item-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .cart-item-row:hover .cart-item-thumb img {
            transform: scale(1.08);
        }

        .cart-item-details h4 {
            font-family: var(--font-outfit);
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 0.3rem;
            line-height: 1.3;
        }

        .cart-item-details h4 a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .cart-item-details h4 a:hover {
            color: #4f46e5;
        }

        .cart-item-cat {
            display: inline-block;
            background: #f1f5f9;
            color: #64748b;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 0.35rem;
        }

        .cart-item-unit-price {
            color: #64748b;
            font-size: 0.88rem;
            margin: 0;
            font-weight: 500;
        }

        /* Quantity Controller */
        .cart-qty-wrapper {
            display: inline-flex;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 0.2rem;
            overflow: hidden;
        }

        .qty-step-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.82rem;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .qty-step-btn:hover {
            background: #e2e8f0;
            color: #4f46e5;
        }

        .cart-qty-val {
            width: 40px;
            border: none;
            background: transparent;
            text-align: center;
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
            outline: none;
        }

        /* Subtotal */
        .cart-item-total {
            font-family: var(--font-outfit);
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
        }

        /* Remove Btn */
        .cart-item-del-btn {
            background: transparent;
            color: #94a3b8;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .cart-item-del-btn:hover {
            background: #fee2e2;
            color: #ef4444;
            transform: scale(1.08);
        }

        /* Delivery Banner inside cart */
        .cart-free-shipping-banner {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 1rem 1.4rem;
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .shipping-icon-wrap {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #10b981;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .shipping-text h5 {
            color: #065f46;
            font-weight: 700;
            font-size: 0.95rem;
            margin: 0 0 0.15rem;
        }

        .shipping-text p {
            color: #047857;
            font-size: 0.85rem;
            margin: 0;
        }

        /* Order Summary Card */
        .cart-summary-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 110px;
        }

        .summary-card-header {
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .summary-card-header h3 {
            font-family: var(--font-outfit);
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.3rem;
        }

        .summary-card-header p {
            color: #64748b;
            font-size: 0.88rem;
            margin: 0;
        }

        .summary-lines {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .summary-line-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.98rem;
        }

        .summary-label {
            color: #64748b;
        }

        .summary-value {
            font-weight: 600;
            color: #0f172a;
        }

        .summary-value.free {
            color: #10b981;
            font-weight: 700;
            background: #ecfdf5;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.85rem;
        }

        .summary-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 1.5rem 0;
        }

        .summary-total-line {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 1.8rem;
        }

        .summary-total-label {
            font-family: var(--font-outfit);
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
        }

        .summary-total-price {
            font-family: var(--font-outfit);
            font-size: 1.85rem;
            font-weight: 800;
            color: #0f172a;
        }

        .summary-total-price small {
            font-size: 0.9rem;
            font-weight: 600;
            color: #64748b;
        }

        .btn-checkout-cta {
            width: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #312e81 100%);
            color: white;
            border: none;
            padding: 1.1rem 1.5rem;
            border-radius: 14px;
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.2);
            cursor: pointer;
        }

        .btn-checkout-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.3);
            background: linear-gradient(135deg, #4338ca 0%, #4f46e5 100%);
            color: white;
        }

        .btn-checkout-cta i.fa-arrow-right {
            transition: transform 0.25s ease;
        }

        .btn-checkout-cta:hover i.fa-arrow-right {
            transform: translateX(5px);
        }

        /* Trust Badges in Summary */
        .summary-trust-badges {
            margin-top: 1.8rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .trust-badge-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        .trust-badge-item i {
            color: #4f46e5;
            font-size: 1rem;
            width: 18px;
            text-align: center;
        }

        /* Payment Icons */
        .summary-payments {
            margin-top: 1.2rem;
            text-align: center;
        }

        .payment-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.35rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #475569;
            margin: 0.2rem;
        }

        /* Empty Cart State */
        .cart-empty-wrapper {
            background: white;
            border-radius: 28px;
            border: 1px solid #e2e8f0;
            padding: 5rem 2rem;
            text-align: center;
            max-width: 680px;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .empty-cart-illustration {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            margin: 0 auto 1.8rem;
        }

        .empty-cart-title {
            font-family: var(--font-outfit);
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.6rem;
        }

        .empty-cart-desc {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 2.2rem;
            max-width: 440px;
            margin-left: auto;
            margin-right: auto;
        }

        .empty-cart-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-empty-primary {
            background: #0f172a;
            color: white;
            padding: 0.95rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
        }

        .btn-empty-primary:hover {
            background: #4f46e5;
            color: white;
            transform: translateY(-2px);
        }

        .btn-empty-secondary {
            background: #f1f5f9;
            color: #0f172a;
            padding: 0.95rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-empty-secondary:hover {
            background: #e2e8f0;
        }

        @media (max-width: 991px) {
            .cart-main-grid {
                grid-template-columns: 1fr;
            }
            .cart-items-header {
                display: none;
            }
            .cart-item-row {
                grid-template-columns: 1fr;
                gap: 1.2rem;
                padding: 1.5rem;
                border: 1px solid #f1f5f9;
                border-radius: 16px;
                margin-bottom: 1rem;
            }
            .cart-item-row:last-child {
                border-bottom: 1px solid #f1f5f9;
            }
            .cart-item-actions {
                position: absolute;
                top: 1rem;
                right: 1rem;
            }
            .cart-item-total {
                font-size: 1.3rem;
            }
            .cart-summary-card {
                position: static;
            }
        }

        /* ===== MODAL DE CONFIRMATION DE SUPPRESSION ===== */
        .confirm-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            padding: 1rem;
        }
        .confirm-modal-overlay.is-open {
            opacity: 1;
            visibility: visible;
        }
        .confirm-modal {
            background: #ffffff;
            border-radius: 22px;
            padding: 2.2rem 2rem 1.8rem;
            max-width: 440px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.35);
            transform: translateY(20px) scale(0.95);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .confirm-modal-overlay.is-open .confirm-modal {
            transform: translateY(0) scale(1);
        }
        .confirm-modal-icon {
            width: 90px;
            height: 90px;
            border-radius: 16px;
            overflow: hidden;
            margin: 0 auto 1.2rem;
            box-shadow: 0 8px 24px -6px rgba(15, 23, 42, 0.18);
            border: 3px solid #f1f5f9;
            animation: iconPulse 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .confirm-modal-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        @keyframes iconPulse {
            0%   { transform: scale(0.5); opacity: 0; }
            60%  { transform: scale(1.08); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .confirm-modal-title {
            font-family: var(--font-outfit);
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 0.5rem;
        }
        .confirm-modal-desc {
            color: #64748b;
            font-size: 0.98rem;
            line-height: 1.55;
            margin: 0 0 1.6rem;
        }
        .confirm-modal-desc strong {
            color: #0f172a;
            font-weight: 700;
        }
        .confirm-modal-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .confirm-modal-btn {
            padding: 0.85rem 1.4rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 130px;
            justify-content: center;
        }
        .confirm-modal-btn-cancel {
            background: #f1f5f9;
            color: #0f172a;
        }
        .confirm-modal-btn-cancel:hover {
            background: #e2e8f0;
        }
        .confirm-modal-btn-confirm {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 8px 18px -6px rgba(239, 68, 68, 0.5);
        }
        .confirm-modal-btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 22px -6px rgba(239, 68, 68, 0.55);
        }

        /* ════════════════════════════════
           SECTION CODE PROMO
        ════════════════════════════════ */
        .promo-section {
            margin-bottom: 0.5rem;
        }
        .promo-label-txt {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
            letter-spacing: 0.03em;
        }
        .promo-input-row {
            display: flex;
            gap: 0.5rem;
        }
        .promo-input {
            flex: 1;
            padding: 0.6rem 0.9rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.88rem;
            font-family: inherit;
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .promo-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
            background: #fff;
        }
        .promo-input.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239,68,68,0.1);
        }
        .promo-input.success {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22,163,74,0.1);
        }
        .promo-apply-btn {
            padding: 0.6rem 1.1rem;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s;
            white-space: nowrap;
        }
        .promo-apply-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        .promo-apply-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        .promo-feedback {
            margin-top: 0.45rem;
            font-size: 0.8rem;
            font-weight: 500;
            border-radius: 8px;
            padding: 0.4rem 0.75rem;
        }
        .promo-feedback.is-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .promo-feedback.is-success {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }
        .promo-applied-wrap {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 1.5px solid #bbf7d0;
            border-radius: 12px;
            padding: 0.65rem 0.9rem;
            flex-wrap: wrap;
        }
        .promo-applied-badge {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            background: #16a34a;
            color: #fff;
            border-radius: 20px;
            padding: 0.2rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.06em;
        }
        .promo-applied-label {
            flex: 1;
            font-size: 0.82rem;
            color: #166534;
            font-weight: 500;
        }
        .promo-remove-btn {
            background: none;
            border: 1.5px solid #86efac;
            color: #16a34a;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .promo-remove-btn:hover {
            background: #dc2626;
            border-color: #dc2626;
            color: #fff;
        }
        .promo-discount-line {
            margin-top: 0.5rem;
        }
        @keyframes promo-pop {
            0%   { transform: scale(0.9); opacity: 0; }
            60%  { transform: scale(1.03); }
            100% { transform: scale(1);  opacity: 1; }
        }
        .promo-pop-anim { animation: promo-pop 0.35s ease forwards; }
    </style>
@endpush

@section('content')
    <section class="cart-page-section">
        <div class="container">
            <!-- Stepper du tunnel de commande -->
            <div class="cart-stepper">
                <div class="step-item active">
                    <span class="step-num">1</span>
                    <span>Panier d'achats</span>
                </div>
                <div class="step-divider"></div>
                <div class="step-item">
                    <span class="step-num">2</span>
                    <span>Informations & Livraison</span>
                </div>
                <div class="step-divider"></div>
                <div class="step-item">
                    <span class="step-num">3</span>
                    <span>Confirmation</span>
                </div>
            </div>

            <!-- Message Flash de confirmation -->
            @if(session('success'))
                <div class="cart-alert-success">
                    <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(count($produits) > 0)
                <!-- En-tête de la page Panier -->
                <div class="cart-header-wrap">
                    <div>
                        <h1 class="cart-header-title">
                            Votre Panier
                            <span class="cart-badge-count">{{ count($produits) }} {{ count($produits) > 1 ? 'articles' : 'article' }}</span>
                        </h1>
                        <p class="cart-header-subtitle">Vérifiez vos articles et procédez à la commande en toute sérénité.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn-continue-shopping">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Continuer mes achats</span>
                    </a>
                </div>

                <!-- Grille Principale Panier -->
                <div class="cart-main-grid">
                    <!-- Liste des Articles -->
                    <div class="cart-items-container">
                        <div class="cart-items-header">
                            <span>Produit</span>
                            <span>Quantité</span>
                            <span>Sous-total</span>
                            <span></span>
                        </div>

                        <div class="cart-items-body">
                            @foreach($produits as $item)
                                <div class="cart-item-row" id="cart-item-{{ $item['id'] }}">
                                    <!-- Produit & Détails -->
                                    <div class="cart-item-product">
                                        <div class="cart-item-thumb">
                                            <a href="{{ route('products.show', $item['id']) }}">
                                                <img src="{{ asset($item['image']) }}" alt="{{ $item['nom'] }}">
                                            </a>
                                        </div>
                                        <div class="cart-item-details">
                                            @if(!empty($item['categorie']))
                                                <span class="cart-item-cat">{{ $item['categorie'] }}</span>
                                            @endif
                                            <h4>
                                                <a href="{{ route('products.show', $item['id']) }}">{{ $item['nom'] }}</a>
                                            </h4>
                                            <p class="cart-item-unit-price">
                                                {{ number_format($item['prix'], 0, ',', ' ') }} <small>FCFA</small> / unité
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Contrôleur de Quantité Interactif -->
                                    <div class="cart-item-qty">
                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="cart-update-form">
                                            @csrf
                                            <div class="cart-qty-wrapper">
                                                <button type="button" class="qty-step-btn" onclick="updateQty(this, -1)" title="Diminuer">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input type="number" name="quantite" value="{{ $item['quantite'] }}" min="1" max="99" class="cart-qty-val" onchange="this.form.submit()">
                                                <button type="button" class="qty-step-btn" onclick="updateQty(this, 1)" title="Augmenter">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Prix Sous-total -->
                                    <div class="cart-item-total">
                                        {{ number_format($item['subtotal'], 0, ',', ' ') }} <small style="font-size: 0.75rem; color: #64748b;">FCFA</small>
                                    </div>

                                    <!-- Action Supprimer -->
                                    <div class="cart-item-actions">
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="cart-remove-form" data-product-name="{{ $item['nom'] }}" data-product-image="{{ asset($item['image']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="cart-item-del-btn" title="Supprimer cet article" onclick="openDeleteModal(this.closest('.cart-remove-form'))">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Bannière Livraison Gratuite -->
                        <div class="cart-free-shipping-banner">
                            <div class="shipping-icon-wrap">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div class="shipping-text">
                                <h5>Livraison Express Gratuite</h5>
                                <p>Félicitations ! Vous profitez de la livraison offerte sur votre commande partout en Côte d'Ivoire.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Récapitulatif de Commande -->
                    <div class="cart-summary-card">
                        <!-- Élément caché pour le total brut (utilisé par le JS promo) -->
                        <span id="cartRawTotal" data-total="{{ $total }}" style="display:none;"></span>
                        <div class="summary-card-header">
                            <h3>Récapitulatif</h3>
                            <p>Calcul automatique de votre commande</p>
                        </div>

                        <div class="summary-lines">
                            <div class="summary-line-item">
                                <span class="summary-label">Sous-total ({{ count($produits) }} articles)</span>
                                <span class="summary-value">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="summary-line-item">
                                <span class="summary-label">Frais de livraison</span>
                                <span class="summary-value free">
                                    <i class="fa-solid fa-check"></i> Gratuite
                                </span>
                            </div>
                            <div class="summary-line-item">
                                <span class="summary-label">Assurance transport</span>
                                <span class="summary-value" style="color: #64748b;">Offerte</span>
                            </div>
                        </div>

                        <div class="summary-divider"></div>

                        <!-- ═══ SECTION CODE PROMO ═══ -->
                        <div class="promo-section" id="promoSection">
                            @if($promoCode)
                                <!-- Code déjà appliqué -->
                                <div class="promo-applied-wrap" id="promoApplied">
                                    <div class="promo-applied-badge">
                                        <i class="fa-solid fa-tag"></i>
                                        <span class="promo-applied-code">{{ $promoCode }}</span>
                                    </div>
                                    <span class="promo-applied-label">{{ $promoLabel }}</span>
                                    <button type="button" class="promo-remove-btn" id="promoRemoveBtn" title="Retirer ce code">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                            @else
                                <!-- Formulaire de saisie -->
                                <div class="promo-form-wrap" id="promoFormWrap">
                                    <label class="promo-label-txt">
                                        <i class="fa-solid fa-ticket"></i> Code promo
                                    </label>
                                    <div class="promo-input-row">
                                        <input type="text"
                                               id="promoCodeInput"
                                               class="promo-input"
                                               placeholder="Ex : LUXE10"
                                               maxlength="20"
                                               autocomplete="off">
                                        <button type="button" id="promoApplyBtn" class="promo-apply-btn">
                                            Appliquer
                                        </button>
                                    </div>
                                    <div id="promoFeedback" class="promo-feedback" style="display:none;"></div>
                                </div>
                                <!-- Après application AJAX, on affiche ici la version "appliqué" -->
                                <div class="promo-applied-wrap" id="promoApplied" style="display:none;">
                                    <div class="promo-applied-badge">
                                        <i class="fa-solid fa-tag"></i>
                                        <span class="promo-applied-code" id="promoAppliedCode"></span>
                                    </div>
                                    <span class="promo-applied-label" id="promoAppliedLabel"></span>
                                    <button type="button" class="promo-remove-btn" id="promoRemoveBtn" title="Retirer ce code">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <!-- ═══ FIN CODE PROMO ═══ -->

                        <!-- Ligne réduction (visible si promo active) -->
                        <div class="summary-line-item promo-discount-line" id="promoDiscountLine"
                             style="{{ $promoCode ? '' : 'display:none;' }}">
                            <span class="summary-label" style="color:#16a34a;">
                                <i class="fa-solid fa-circle-minus"></i> Réduction code promo
                            </span>
                            <span class="summary-value" style="color:#16a34a;" id="promoDiscountAmount">
                                -{{ number_format($promoDiscount, 0, ',', ' ') }} FCFA
                            </span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-total-line">
                            <span class="summary-total-label">Total à payer</span>
                            <span class="summary-total-price" id="cartGrandTotal">
                                {{ number_format($totalFinal, 0, ',', ' ') }} <small>FCFA</small>
                            </span>
                        </div>

                        @guest
                            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 12px; padding: 0.75rem 1rem; margin-bottom: 1.2rem; font-size: 0.82rem; color: #475569; display: flex; align-items: center; gap: 0.6rem;">
                                <i class="fa-solid fa-user-lock" style="color: #4f46e5; font-size: 1rem;"></i>
                                <span>Connexion ou inscription requise à l'étape suivante</span>
                            </div>
                        @endguest

                        <a href="{{ route('checkout.index') }}" class="btn-checkout-cta">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Passer la commande</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <!-- Badges de réassurance -->
                        <div class="summary-trust-badges">
                            <div class="trust-badge-item">
                                <i class="fa-solid fa-lock"></i>
                                <span>Paiement sécurisé ou à la livraison</span>
                            </div>
                            <div class="trust-badge-item">
                                <i class="fa-solid fa-box-open"></i>
                                <span>Garantie vérification avant paiement</span>
                            </div>
                            <div class="trust-badge-item">
                                <i class="fa-solid fa-headset"></i>
                                <span>Service client disponible 24/7</span>
                            </div>
                        </div>

                        <div class="summary-payments">
                            <span class="payment-pill"><i class="fa-solid fa-money-bill-wave"></i> Cash à la livraison</span>
                            <span class="payment-pill"><i class="fa-solid fa-mobile-screen"></i> Wave / Orange</span>
                            <span class="payment-pill"><i class="fa-regular fa-credit-card"></i> Visa / Mastercard</span>
                        </div>
                    </div>
                </div>
            @else
                <!-- Panier Vide -->
                <div class="cart-empty-wrapper">
                    <div class="empty-cart-illustration">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </div>
                    <h2 class="empty-cart-title">Votre panier est vide</h2>
                    <p class="empty-cart-desc">
                        Vous n'avez pas encore ajouté d'articles. Explorez notre catalogue pour trouver les meilleures tendances mode et tech.
                    </p>
                    <div class="empty-cart-actions">
                        <a href="{{ route('products.index') }}" class="btn-empty-primary">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Découvrir la boutique</span>
                        </a>
                        <a href="{{ route('nouveautes') }}" class="btn-empty-secondary">
                            <span>Voir les nouveautés</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Modal de confirmation de suppression -->
    <div class="confirm-modal-overlay" id="deleteConfirmModal" role="dialog" aria-modal="true" aria-labelledby="deleteConfirmTitle">
        <div class="confirm-modal">
            <div class="confirm-modal-icon">
                <img id="deleteProductImage" src="" alt="Produit à supprimer">
            </div>
            <h3 class="confirm-modal-title" id="deleteConfirmTitle">Retirer ce produit du panier ?</h3>
            <p class="confirm-modal-desc">
                Voulez-vous vraiment retirer <strong id="deleteProductName">cet article</strong> de votre panier ? Cette action est définitive.
            </p>
            <div class="confirm-modal-actions">
                <button type="button" class="confirm-modal-btn confirm-modal-btn-cancel" id="cancelDeleteBtn">
                    <i class="fa-solid fa-xmark"></i> Annuler
                </button>
                <button type="button" class="confirm-modal-btn confirm-modal-btn-confirm" id="confirmDeleteBtn">
                    <i class="fa-solid fa-trash-can"></i> Oui, retirer
                </button>
            </div>
        </div>
    </div>

    <!-- Script de gestion interactive de la quantité + suppression -->
    <script>
        function updateQty(btn, delta) {
            const form = btn.closest('.cart-update-form');
            const input = form.querySelector('.cart-qty-val');
            let current = parseInt(input.value) || 1;
            let next = current + delta;
            if (next >= 1 && next <= 99) {
                input.value = next;
                form.submit();
            }
        }

        // === Modal de confirmation de suppression ===
        (function () {
            const overlay     = document.getElementById('deleteConfirmModal');
            const cancelBtn   = document.getElementById('cancelDeleteBtn');
            const confirmBtn  = document.getElementById('confirmDeleteBtn');
            const nameSpan    = document.getElementById('deleteProductName');
            const productImg  = document.getElementById('deleteProductImage');
            let pendingForm = null;

            window.openDeleteModal = function (form) {
                pendingForm = form;
                nameSpan.textContent = '"' + (form.dataset.productName || 'cet article') + '"';
                productImg.src = form.dataset.productImage || '';
                productImg.alt = form.dataset.productName || 'Produit à supprimer';
                overlay.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            };

            function closeModal() {
                overlay.classList.remove('is-open');
                document.body.style.overflow = '';
                pendingForm = null;
            }

            cancelBtn.addEventListener('click', closeModal);

            // Clic en dehors du modal = annuler
            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) closeModal();
            });

            // Touche Echap = annuler
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && overlay.classList.contains('is-open')) closeModal();
            });

            // Confirmation : on soumet le vrai formulaire Laravel
            confirmBtn.addEventListener('click', function () {
                if (!pendingForm) return;
                pendingForm.submit();
            });
        })();

        // ═══════════════════════════════════════════
        // GESTION DU CODE PROMO (AJAX)
        // ═══════════════════════════════════════════
        (function () {
            const applyBtn      = document.getElementById('promoApplyBtn');
            const removeBtn     = document.getElementById('promoRemoveBtn');
            const input         = document.getElementById('promoCodeInput');
            const feedback      = document.getElementById('promoFeedback');
            const formWrap      = document.getElementById('promoFormWrap');
            const appliedWrap   = document.getElementById('promoApplied');
            const appliedCode   = document.getElementById('promoAppliedCode');
            const appliedLabel  = document.getElementById('promoAppliedLabel');
            const discountLine  = document.getElementById('promoDiscountLine');
            const discountAmt   = document.getElementById('promoDiscountAmount');
            const grandTotal    = document.getElementById('cartGrandTotal');

            // Récupère le total brut depuis le DOM (attribut data-total)
            const rawTotal = parseFloat(document.getElementById('cartRawTotal').dataset.total) || 0;

            function formatFCFA(amount) {
                return new Intl.NumberFormat('fr-FR').format(Math.round(amount)) + ' FCFA';
            }

            function showFeedback(msg, type) {
                if (!feedback) return;
                feedback.textContent = msg;
                feedback.className = 'promo-feedback ' + (type === 'error' ? 'is-error' : 'is-success');
                feedback.style.display = 'block';
            }

            function hideFeedback() {
                if (feedback) { feedback.style.display = 'none'; feedback.textContent = ''; }
            }

            if (applyBtn) {
                applyBtn.addEventListener('click', function () {
                    const code = input ? input.value.trim() : '';
                    if (!code) { showFeedback('Veuillez saisir un code promo.', 'error'); return; }

                    applyBtn.disabled = true;
                    applyBtn.textContent = '…';
                    if (input) input.classList.remove('error', 'success');

                    fetch('{{ route("cart.promo.apply") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ code: code, total: rawTotal }),
                    })
                    .then(r => r.json())
                    .then(data => {
                        applyBtn.disabled = false;
                        applyBtn.textContent = 'Appliquer';

                        if (data.success) {
                            if (input) input.classList.add('success');
                            hideFeedback();

                            // Basculer vers le badge "appliqué"
                            if (formWrap) formWrap.style.display = 'none';
                            if (appliedWrap) {
                                if (appliedCode) appliedCode.textContent = data.code;
                                if (appliedLabel) appliedLabel.textContent = data.label;
                                appliedWrap.style.display = 'flex';
                                appliedWrap.classList.add('promo-pop-anim');
                            }

                            // Afficher la ligne réduction
                            if (discountLine) discountLine.style.display = 'flex';
                            if (discountAmt) discountAmt.textContent = '-' + formatFCFA(data.discount_amount);

                            // Mettre à jour le total
                            if (grandTotal) {
                                grandTotal.innerHTML = formatFCFA(data.new_total).replace(' FCFA', '') + ' <small>FCFA</small>';
                            }
                        } else {
                            if (input) input.classList.add('error');
                            showFeedback(data.message || 'Code invalide.', 'error');
                        }
                    })
                    .catch(() => {
                        applyBtn.disabled = false;
                        applyBtn.textContent = 'Appliquer';
                        showFeedback('Erreur réseau. Veuillez réessayer.', 'error');
                    });
                });

                // Appliquer avec la touche Entrée
                if (input) {
                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Enter') applyBtn.click();
                    });
                }
            }

            if (removeBtn) {
                removeBtn.addEventListener('click', function () {
                    fetch('{{ route("cart.promo.remove") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ total: rawTotal }),
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            // Réinitialiser l'affichage
                            if (appliedWrap) appliedWrap.style.display = 'none';
                            if (formWrap) { formWrap.style.display = 'block'; }
                            if (input) { input.value = ''; input.classList.remove('error', 'success'); }
                            hideFeedback();

                            if (discountLine) discountLine.style.display = 'none';
                            if (grandTotal) {
                                grandTotal.innerHTML = formatFCFA(data.new_total).replace(' FCFA', '') + ' <small>FCFA</small>';
                            }
                        }
                    });
                });
            }
        })();
    </script>
@endsection
