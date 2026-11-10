@extends('layouts.app')

@push('styles')
<style>
    /* ═══════════════════════════════════
       LAYOUT PRINCIPAL : 2 COLONNES
    ═══════════════════════════════════ */
    .product-page-wrap {
        max-width: 1280px;
        margin: 0 auto;
        padding: 5rem 2rem 6rem;
    }

    /* Fil d'Ariane */
    .product-breadcrumb {
        font-size: 0.88rem;
        color: #94a3b8;
        margin-bottom: 2.5rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        flex-wrap: wrap;
    }
    .product-breadcrumb a { color: #64748b; text-decoration: none; transition: color 0.2s; }
    .product-breadcrumb a:hover { color: #4f46e5; }
    .product-breadcrumb i { font-size: 0.65rem; }

    /* Grille principale 2 colonnes */
    .product-page-grid {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 3rem;
        align-items: start;
    }

    /* ─── COLONNE GAUCHE : produit ─── */
    .product-left-col {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Image + infos en sous-grille */
    .product-info-subgrid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    .product-img-wrap {
        background: #f8fafc;
        border-radius: 28px;
        border: 1px solid #e9eef5;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 380px;
        overflow: hidden;
    }
    .product-img-wrap img {
        width: 100%;
        height: 340px;
        object-fit: contain;
        transition: transform 0.5s ease;
    }
    .product-img-wrap:hover img { transform: scale(1.04); }

    .product-info-box { display: flex; flex-direction: column; }

    .product-cat-badge {
        display: inline-block;
        background: var(--primary);
        color: #fff;
        padding: 5px 14px;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 1rem;
        width: fit-content;
    }

    .product-title {
        font-size: 1.9rem;
        font-weight: 800;
        color: var(--dark);
        font-family: var(--font-outfit);
        line-height: 1.2;
        margin-bottom: 0.75rem;
    }

    /* Note inline */
    .product-inline-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        flex-wrap: wrap;
    }
    .product-inline-rating .stars { color: #f59e0b; font-size: 0.95rem; }
    .product-inline-rating .rating-label { font-size: 0.82rem; color: #64748b; }
    .product-inline-rating a { font-size: 0.8rem; color: #4f46e5; text-decoration: underline; }

    .product-price {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 1.25rem;
    }

    .product-desc {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.75;
        margin-bottom: 1.5rem;
    }

    .product-meta-row {
        display: flex;
        gap: 1.5rem;
        border-top: 1px solid #e9eef5;
        border-bottom: 1px solid #e9eef5;
        padding: 1rem 0;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }
    .meta-chip {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: #475569;
    }
    .meta-chip i { color: #4f46e5; font-size: 0.95rem; }
    .meta-chip strong { color: var(--dark); font-weight: 600; }

    .product-actions-row {
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    .btn-add-cart {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: #fff;
        border: none;
        border-radius: 14px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        font-family: inherit;
    }
    .btn-add-cart:hover { opacity: 0.9; transform: translateY(-2px); }

    /* ─── COLONNE DROITE : avis ─── */
    .product-right-col {
        position: sticky;
        top: 90px;
        max-height: calc(100vh - 100px);
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #e2e8f0 transparent;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    .product-right-col::-webkit-scrollbar { width: 4px; }
    .product-right-col::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }

    /* ═══════════════════════════════════
       BLOC AVIS
    ═══════════════════════════════════ */
    .avis-panel {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 20px;
        padding: 1.5rem;
    }
    .avis-panel-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .avis-count-pill {
        font-size: 0.75rem;
        background: #f1f5f9;
        color: #64748b;
        border-radius: 20px;
        padding: 0.2rem 0.75rem;
        font-weight: 600;
    }

    /* Résumé score */
    .avis-score-row {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        background: #fafafa;
        border: 1px solid #f1f5f9;
        border-radius: 14px;
        padding: 1rem 1.25rem;
        margin-bottom: 1rem;
    }
    .avis-big-score {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1;
        min-width: 60px;
        text-align: center;
    }
    .avis-score-stars { color: #f59e0b; font-size: 1rem; letter-spacing: 1px; }
    .avis-score-label { font-size: 0.75rem; color: #94a3b8; }
    .avis-repartition { flex: 1; display: flex; flex-direction: column; gap: 0.3rem; }
    .repartition-row { display: flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; color: #64748b; }
    .repartition-label { min-width: 40px; white-space: nowrap; }
    .repartition-bar-bg { flex: 1; height: 5px; background: #e9eef5; border-radius: 10px; overflow: hidden; }
    .repartition-bar-fill { height: 100%; background: linear-gradient(90deg, #f59e0b, #f97316); border-radius: 10px; }
    .repartition-qty { min-width: 16px; text-align: right; color: #94a3b8; font-size: 0.72rem; }

    /* Liste des avis */
    .avis-list { display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 1.25rem; }
    .avis-card {
        background: #fafafa;
        border: 1px solid #f1f5f9;
        border-radius: 14px;
        padding: 1rem 1.1rem;
        transition: box-shadow 0.2s;
    }
    .avis-card:hover { box-shadow: 0 3px 14px -4px rgba(0,0,0,0.08); }
    .avis-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        flex-wrap: wrap;
        gap: 0.4rem;
    }
    .avis-author-info { display: flex; align-items: center; gap: 0.6rem; }
    .avis-avatar {
        width: 34px; height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 0.9rem;
        flex-shrink: 0;
    }
    .avis-author-name { font-weight: 600; color: var(--dark); font-size: 0.88rem; }
    .avis-date { font-size: 0.72rem; color: #94a3b8; }
    .avis-stars { color: #f59e0b; font-size: 0.85rem; letter-spacing: 0.5px; }
    .avis-stars .fa-star.empty { color: #e2e8f0; }
    .avis-commentaire { font-size: 0.88rem; color: #475569; line-height: 1.6; margin: 0; }

    .avis-empty-state {
        text-align: center;
        padding: 1.5rem 1rem;
        color: #94a3b8;
        font-size: 0.88rem;
    }
    .avis-empty-state i { font-size: 2rem; margin-bottom: 0.5rem; display: block; color: #cbd5e1; }

    /* Formulaire d'avis */
    .avis-form-block { display: flex; flex-direction: column; gap: 0.75rem; }
    .avis-form-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }
    .avis-deja-label {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        color: #166534;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Étoiles interactives — version compacte */
    .star-picker { display: flex; gap: 0.2rem; flex-direction: row-reverse; justify-content: flex-end; }
    .star-picker input[type="radio"] { display: none; }
    .star-picker label {
        font-size: 1.6rem;
        color: #e2e8f0;
        cursor: pointer;
        transition: color 0.12s, transform 0.12s;
        line-height: 1;
    }
    .star-picker label:hover,
    .star-picker label:hover ~ label { color: #f59e0b; }
    .star-picker input[type="radio"]:checked ~ label { color: #e2e8f0 !important; }
    .star-picker input[type="radio"]:checked + label,
    .star-picker input[type="radio"]:checked + label ~ label { color: #f59e0b !important; }

    .avis-input {
        width: 100%;
        padding: 0.6rem 0.9rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.88rem;
        font-family: inherit;
        color: #1e293b;
        background: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
        box-sizing: border-box;
        resize: vertical;
    }
    .avis-input:focus { border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,0.1); }

    .avis-submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        font-family: inherit;
        width: 100%;
    }
    .avis-submit-btn:hover { opacity: 0.9; transform: translateY(-1px); }
    .avis-submit-btn:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

    .avis-form-feedback {
        padding: 0.6rem 0.9rem;
        border-radius: 10px;
        font-size: 0.83rem;
        font-weight: 500;
        display: none;
    }
    .avis-form-feedback.is-success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .avis-form-feedback.is-error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    @keyframes avis-pop {
        0%   { transform: scale(0.95); opacity: 0; }
        60%  { transform: scale(1.02); }
        100% { transform: scale(1);   opacity: 1; }
    }
    .avis-card-new { animation: avis-pop 0.35s ease forwards; }

    /* ─── Responsive ─── */
    @media (max-width: 1024px) {
        .product-page-grid {
            grid-template-columns: 1fr;
        }
        .product-right-col {
            position: static;
            max-height: none;
            overflow-y: visible;
        }
    }
    @media (max-width: 700px) {
        .product-info-subgrid {
            grid-template-columns: 1fr;
        }
        .product-page-wrap { padding: 4rem 1rem 4rem; }
    }
</style>
@endpush

@section('content')
<div class="product-page-wrap">

    {{-- Fil d'Ariane --}}
    <nav class="product-breadcrumb">
        <a href="{{ route('home') }}">Accueil</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="{{ route('products.index') }}?category={{ $produit->categorie }}">{{ $produit->categorie }}</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span style="color: var(--dark); font-weight: 500;">{{ $produit->nom }}</span>
    </nav>

    {{-- Grille 2 colonnes --}}
    <div class="product-page-grid">

        {{-- ══════════════════════════════════════
             COLONNE GAUCHE — Produit + Description
        ══════════════════════════════════════ --}}
        <div class="product-left-col">

            {{-- Image + Info en sous-grille --}}
            <div class="product-info-subgrid">

                {{-- Image --}}
                <div class="product-img-wrap">
                    <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                         alt="{{ $produit->nom }}">
                </div>

                {{-- Informations produit --}}
                <div class="product-info-box">
                    <span class="product-cat-badge">{{ $produit->categorie }}</span>

                    <h1 class="product-title">{{ $produit->nom }}</h1>

                    {{-- Note moyenne inline --}}
                    @if($totalAvis > 0)
                    <div class="product-inline-rating">
                        <span class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-{{ $i <= round($avgNote) ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                        </span>
                        <span class="rating-label"><strong>{{ $avgNote }}/5</strong> ({{ $totalAvis }} avis)</span>
                        <a href="#avis-panel">Voir les avis</a>
                    </div>
                    @endif

                    <div class="product-price">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</div>

                    <div class="product-meta-row">
                        <div class="meta-chip">
                            <i class="fa-solid fa-circle-check" style="color:#10b981;"></i>
                            <span>En stock <strong>({{ $produit->stock }} unités)</strong></span>
                        </div>
                        <div class="meta-chip">
                            <i class="fa-solid fa-truck-fast"></i>
                            <span>Livraison <strong>gratuite</strong></span>
                        </div>
                    </div>

                    <div class="product-actions-row">
                        <button class="btn-add-cart add-to-cart" data-id="{{ $produit->id }}">
                            <i class="fa-solid fa-cart-plus"></i>
                            Ajouter au panier
                        </button>

                        @php $isFav = isset(session('wishlist', [])[$produit->id]); @endphp
                        <button type="button"
                                class="btn-wishlist-toggle {{ $isFav ? 'active' : '' }}"
                                onclick="toggleWishlist({{ $produit->id }}, this)"
                                data-product-id="{{ $produit->id }}"
                                title="{{ $isFav ? 'Retirer des favoris' : 'Ajouter aux favoris' }}"
                                style="width: 50px; height: 50px; border-radius: 12px; font-size: 1.2rem; flex-shrink: 0; position: static;">
                            <i class="{{ $isFav ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Description complète --}}
            <div style="background: #fafafa; border: 1px solid #e9eef5; border-radius: 20px; padding: 1.75rem 2rem;">
                <h3 style="font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 0.9rem;">
                    Description du produit
                </h3>
                <p style="font-size: 1.05rem; color: #475569; line-height: 1.8; margin: 0;">
                    {{ $produit->description }}
                </p>
            </div>

        </div>{{-- /product-left-col --}}

        {{-- ══════════════════════════════════════
             COLONNE DROITE — Avis & Notes
        ══════════════════════════════════════ --}}
        <div class="product-right-col" id="avis-panel">

            {{-- Panneau résumé + liste des avis --}}
            <div class="avis-panel">
                <div class="avis-panel-title">
                    <i class="fa-solid fa-star" style="color:#f59e0b;"></i>
                    Avis clients
                    <span class="avis-count-pill" id="avisCountPill">{{ $totalAvis }} avis</span>
                </div>

                {{-- Score global --}}
                @if($totalAvis > 0)
                <div class="avis-score-row">
                    <div style="text-align:center;">
                        <div class="avis-big-score" id="avgNoteDisplay">{{ $avgNote }}</div>
                        <div class="avis-score-stars" id="avgStarsDisplay">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa-{{ $i <= round($avgNote) ? 'solid' : 'regular' }} fa-star"></i>
                            @endfor
                        </div>
                        <div class="avis-score-label">sur 5</div>
                    </div>
                    <div class="avis-repartition">
                        @for($i = 5; $i >= 1; $i--)
                            @php $pct = $totalAvis > 0 ? round($repartition[$i] / $totalAvis * 100) : 0; @endphp
                            <div class="repartition-row">
                                <span class="repartition-label">{{ $i }} <i class="fa-solid fa-star" style="color:#f59e0b; font-size:0.65rem;"></i></span>
                                <div class="repartition-bar-bg">
                                    <div class="repartition-bar-fill" style="width: {{ $pct }}%;"></div>
                                </div>
                                <span class="repartition-qty">{{ $repartition[$i] }}</span>
                            </div>
                        @endfor
                    </div>
                </div>
                @endif

                {{-- Liste des avis --}}
                <div class="avis-list" id="avisList">
                    @forelse($avis as $unAvis)
                        <div class="avis-card">
                            <div class="avis-card-header">
                                <div class="avis-author-info">
                                    <div class="avis-avatar">{{ strtoupper(substr($unAvis->auteur, 0, 1)) }}</div>
                                    <div>
                                        <div class="avis-author-name">{{ $unAvis->auteur }}</div>
                                        <div class="avis-date">{{ $unAvis->created_at->translatedFormat('d F Y') }}</div>
                                    </div>
                                </div>
                                <div class="avis-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa-{{ $i <= $unAvis->note ? 'solid' : 'regular' }} fa-star {{ $i > $unAvis->note ? 'empty' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="avis-commentaire">{{ $unAvis->commentaire }}</p>
                        </div>
                    @empty
                        <div class="avis-empty-state" id="avisEmptyState">
                            <i class="fa-regular fa-comment-dots"></i>
                            Aucun avis pour l'instant — soyez le premier !
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Formulaire d'avis --}}
            <div class="avis-panel" id="avisFormPanel">
                <div class="avis-form-block">
                    <div class="avis-form-title">
                        <i class="fa-solid fa-pen-to-square" style="color:#4f46e5;"></i>
                        Laisser un avis
                    </div>

                    @if($dejaAvis)
                        <div class="avis-deja-label">
                            <i class="fa-solid fa-circle-check"></i>
                            Vous avez déjà publié un avis sur ce produit. Merci !
                        </div>
                    @else
                        <form id="avisForm" data-url="{{ route('avis.store', $produit->id) }}">
                            @csrf

                            <label style="font-size:0.78rem; font-weight:600; color:#475569; text-transform:uppercase; letter-spacing:0.04em; margin-bottom:0.4rem; display:block;">
                                Votre note <span style="color:#ef4444;">*</span>
                            </label>
                            <div class="star-picker" id="starPicker" style="margin-bottom:0.9rem;">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="note" id="star{{ $i }}" value="{{ $i }}">
                                    <label for="star{{ $i }}" title="{{ $i }} étoile{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                                @endfor
                            </div>

                            <input type="text"
                                   class="avis-input"
                                   id="avisAuteur"
                                   name="auteur"
                                   placeholder="Votre prénom *"
                                   maxlength="60"
                                   required
                                   style="margin-bottom:0.65rem;">

                            <textarea class="avis-input"
                                      id="avisCommentaire"
                                      name="commentaire"
                                      rows="4"
                                      placeholder="Votre commentaire (10 caractères minimum) *"
                                      maxlength="1000"
                                      required
                                      style="margin-bottom:0.75rem;"></textarea>

                            <div id="avisFormFeedback" class="avis-form-feedback"></div>

                            <button type="submit" class="avis-submit-btn" id="avisSubmitBtn">
                                <i class="fa-solid fa-paper-plane"></i>
                                Publier mon avis
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>{{-- /product-right-col --}}
    </div>{{-- /product-page-grid --}}
</div>{{-- /product-page-wrap --}}

<script>
// ═══════════════════════════════════════
// SOUMISSION AJAX DU FORMULAIRE D'AVIS
// ═══════════════════════════════════════
(function () {
    const form       = document.getElementById('avisForm');
    const submitBtn  = document.getElementById('avisSubmitBtn');
    const feedback   = document.getElementById('avisFormFeedback');
    const avisList   = document.getElementById('avisList');
    const countPill  = document.getElementById('avisCountPill');
    const emptyState = document.getElementById('avisEmptyState');
    const avgDisplay = document.getElementById('avgNoteDisplay');
    const formPanel  = document.getElementById('avisFormPanel');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const noteInput = form.querySelector('input[name="note"]:checked');
        if (!noteInput) {
            showFeedback('Veuillez sélectionner une note (1 à 5 étoiles).', 'error');
            return;
        }

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Publication…';
        hideFeedback();

        fetch(form.dataset.url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: new FormData(form),
        })
        .then(r => r.json())
        .then(res => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Publier mon avis';

            if (res.success) {
                showFeedback('✅ ' + res.message, 'success');
                form.reset();

                if (emptyState) emptyState.remove();

                // Injecter la nouvelle carte
                avisList.insertAdjacentHTML('afterbegin', buildAvisCard(res.avis));

                // Compteur
                if (countPill) {
                    const n = parseInt(countPill.textContent) + 1;
                    countPill.textContent = n + ' avis';
                }

                // Note moyenne
                if (avgDisplay && res.avg) avgDisplay.textContent = res.avg;

                // Remplacer le formulaire
                setTimeout(() => {
                    if (formPanel) {
                        formPanel.innerHTML = `
                        <div class="avis-form-block">
                            <div class="avis-deja-label">
                                <i class="fa-solid fa-circle-check"></i>
                                Votre avis a bien été publié. Merci !
                            </div>
                        </div>`;
                    }
                }, 1600);
            } else {
                showFeedback('❌ ' + (res.message || 'Une erreur est survenue.'), 'error');
            }
        })
        .catch(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Publier mon avis';
            showFeedback('❌ Erreur réseau. Veuillez réessayer.', 'error');
        });
    });

    function showFeedback(msg, type) {
        if (!feedback) return;
        feedback.textContent = msg;
        feedback.className = 'avis-form-feedback ' + (type === 'error' ? 'is-error' : 'is-success');
        feedback.style.display = 'block';
    }
    function hideFeedback() { if (feedback) feedback.style.display = 'none'; }

    function starsHtml(note) {
        let h = '';
        for (let i = 1; i <= 5; i++)
            h += `<i class="fa-${i <= note ? 'solid' : 'regular'} fa-star${i > note ? ' empty' : ''}"></i>`;
        return h;
    }

    function buildAvisCard(a) {
        return `
        <div class="avis-card avis-card-new">
            <div class="avis-card-header">
                <div class="avis-author-info">
                    <div class="avis-avatar">${a.auteur.charAt(0).toUpperCase()}</div>
                    <div>
                        <div class="avis-author-name">${a.auteur}</div>
                        <div class="avis-date">${a.date}</div>
                    </div>
                </div>
                <div class="avis-stars">${starsHtml(a.note)}</div>
            </div>
            <p class="avis-commentaire">${a.commentaire}</p>
        </div>`;
    }
})();
</script>
@endsection