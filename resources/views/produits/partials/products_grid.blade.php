@if(count($produits) > 0)
<div class="shop-products-grid" id="productsGrid">
    @foreach($produits as $produit)
    <article class="luxury-product-card" id="product-{{ $produit->id }}"
        style="--card-delay: {{ min($loop->index * 0.045, 0.65) }}s;"
        data-id="{{ $produit->id }}"
        data-nom="{{ addslashes($produit->nom) }}"
        data-desc="{{ addslashes(Str::limit($produit->description ?? 'Produit exclusif LuxeCart.', 200)) }}"
        data-categorie="{{ $produit->categorie }}"
        data-prix="{{ number_format($produit->prix, 0, ',', ' ') }}"
        data-stock="{{ $produit->stock }}"
        data-image="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}">
        <!-- Media / Image -->
        <div class="card-media">
            <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                alt="{{ $produit->nom }}"
                loading="lazy">

            <!-- Bouton Favoris -->
            @php $isFav = isset(session('wishlist', [])[$produit->id]); @endphp
            <button type="button" 
                    class="btn-wishlist-toggle {{ $isFav ? 'active' : '' }}" 
                    data-product-id="{{ $produit->id }}" 
                    onclick="event.stopPropagation(); toggleWishlist({{ $produit->id }}, this);" 
                    title="{{ $isFav ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                <i class="{{ $isFav ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
            </button>

            <!-- Badges -->
            <span class="badge-category">{{ $produit->categorie }}</span>

            @if($produit->stock > 5)
            <span class="badge-stock in-stock"><i class="fa-solid fa-circle-check"></i> En stock</span>
            @elseif($produit->stock > 0)
            <span class="badge-stock low-stock"><i class="fa-solid fa-bolt"></i> Plus que {{ $produit->stock }}</span>
            @else
            <span class="badge-stock out-stock"><i class="fa-solid fa-circle-xmark"></i> Épuisé</span>
            @endif

            <!-- Actions au survol de l'image -->
            <div class="card-hover-actions">
                <button type="button" class="btn-quick-view" onclick="event.stopPropagation(); openProductModal('{{ $produit->id }}');">
                    <i class="fa-regular fa-eye"></i> Aperçu rapide
                </button>
                <a href="{{ route('products.show', $produit->id) }}" class="btn-card-detail" title="Fiche détaillée" onclick="event.stopPropagation();">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>

        <!-- Corps de la carte : Titre, prix et actions toujours visibles -->
        <div class="card-content">
            <div class="card-meta-line">
                <span class="card-category-sub">{{ $produit->categorie }}</span>
                <div class="card-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <span>(4.9)</span>
                </div>
            </div>

            <h3 class="card-title">
                <a href="{{ route('products.show', $produit->id) }}">{{ $produit->nom }}</a>
            </h3>

            <p class="card-description">
                {{ Str::limit($produit->description ?? 'Pièce d\'exception sélectionnée avec soin par LuxeCart.', 90) }}
            </p>

            <div class="card-footer-box">
                <div class="card-price-group">
                    <span class="card-price-label">Prix</span>
                    <span class="card-price-val">
                        {{ number_format($produit->prix, 0, ',', ' ') }}
                        <span class="card-price-currency">FCFA</span>
                    </span>
                </div>

                @if($produit->stock > 0)
                <button type="button" class="btn-card-cart add-to-cart" data-id="{{ $produit->id }}" title="Ajouter au panier" aria-label="Ajouter au panier">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
                @else
                <button type="button" class="btn-card-cart" disabled style="opacity: 0.6; cursor: not-allowed; background: #94a3b8;" title="Produit épuisé" aria-label="Produit épuisé">
                    <i class="fa-solid fa-ban"></i>
                </button>
                @endif
            </div>
        </div>
    </article>
    @endforeach
</div>

<!-- 7. PAGINATION -->
@if($produits->hasPages())
<div class="shop-pagination-container">
    {{ $produits->links('partials.pagination') }}
</div>
@endif
@else
<!-- 8. EMPTY STATE -->
<div class="shop-empty-state">
    <div class="empty-state-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <h3>Aucun article ne correspond à votre recherche</h3>

    <p>
        Nous n'avons trouvé aucun produit correspondant à votre saisie. Vérifiez l'orthographe ou essayez l'une de nos suggestions.
    </p>

    <button type="button" class="btn-apply-filters" id="btnResetSearchAjax" style="display: inline-flex; width: auto; padding: 0.85rem 2rem; margin: 0 auto; cursor: pointer;">
        <i class="fa-solid fa-rotate-left"></i> Voir tous les articles
    </button>

    <div class="empty-suggestions">
        <span>Recherches populaires :</span>
        <button type="button" class="suggest-chip btn-suggest-search" data-term="Montre">Montres</button>
        <button type="button" class="suggest-chip btn-suggest-search" data-term="Chaussure">Chaussures</button>
        <button type="button" class="suggest-chip btn-suggest-search" data-term="Mixeur">Blender</button>
        <button type="button" class="suggest-chip btn-suggest-search" data-term="Pull">Vêtements</button>
        <button type="button" class="suggest-chip btn-suggest-search" data-term="Claquettes">Claquettes</button>
    </div>
</div>
@endif

