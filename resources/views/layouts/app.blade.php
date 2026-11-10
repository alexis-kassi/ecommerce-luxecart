<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- LES LIENS HEAD -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCart | Votre boutique e-commerce</title>

    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='25' fill='%236366f1'/><text y='72' x='50' text-anchor='middle' font-family='Arial, sans-serif' font-weight='bold' font-size='65' fill='white'>L</text></svg>">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .wishlist-btn {
            position: relative;
            font-size: 1.25rem;
            color: var(--dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            text-decoration: none;
            padding: 0.2rem;
        }
        .wishlist-btn:hover {
            color: #e11d48;
        }
        .wishlist-count {
            position: absolute;
            top: -6px;
            right: -8px;
            background: #e11d48;
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 50%;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }
        .btn-wishlist-toggle {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(241, 245, 249, 0.8);
            color: #94a3b8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            z-index: 10;
        }
        .btn-wishlist-toggle:hover {
            color: #e11d48;
            transform: scale(1.12);
            background: #ffffff;
        }
        .btn-wishlist-toggle.active {
            color: #e11d48;
            background: #fff1f2;
            border-color: #fecdd3;
        }
        .heart-pop {
            animation: heartPopAnim 0.35s ease;
        }
        @keyframes heartPopAnim {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }
    </style>
    @stack('styles')

    <!-- Meta tags for SEO -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>


    {{-- PARTIE HEADER --}}
    <header class="main-header">
        <div class="header-container">
            <button class="mobile-menu-toggle" id="menu-open">
                <i class="fa-solid fa-bars"></i>
            </button>

            {{-- Logo du site --}}
            <div class="logo">
                <a href="/"><i class="fa-solid fa-cart-shopping" style="font-size: 30px"></i>Lux<span style="font-size: 2.2rem;">Cart</span></a>
            </div>

            {{-- Menu de navigation --}}
            <nav class="main-nav" id="mobile-nav">
                <button class="mobile-menu-close" id="menu-close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <ul>
                    <li class="menu_accueil">
                        <a href="{{ route('home') }}" id="nav-home"
                           class="{{ Request::is('/') ? 'active' : '' }}">Accueil</a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}" id="nav-products"
                           class="{{ Request::is('produits') ? 'active' : '' }}">Boutique</a>
                    </li>

                    <li>
                        <a href="/#categories" id="nav-categories">Catégories</a>
                    </li>

                    <li>
                        <a href="{{ route('nouveautes') }}" id="nav-nouveautes"
                            class="{{ Request::is('nouveautes') ? 'active' : '' }}">Nouveautés</a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}" id="nav-about"
                           class="{{ Request::is('apropos') ? 'active' : '' }}">À Propos</a>
                    </li>

                    {{-- Favoris uniquement dans le menu mobile --}}
                    <li class="mobile-nav-item">
                        <a href="{{ route('wishlist.index') }}" id="nav-wishlist-mobile"
                            class="{{ Request::is('favoris') ? 'active' : '' }}">
                            <i class="fa-regular fa-heart" style="margin-right: 6px;"></i> Favoris (<span class="mobile-wishlist-count">{{ count(session('wishlist', [])) }}</span>)
                        </a>
                    </li>

                    {{-- LIENS D'AUTHENTIFICATION MOBILE --}}
                    <li class="mobile-auth-item">
                        @auth
                            <div class="mobile-user-info"
                                style="color: white; font-size: 1.2rem; margin-bottom: 1rem; font-weight: 500; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                <i class="fa-regular fa-user"></i> {{ Auth::user()->name }}
                            </div>

                            <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                                @csrf
                                <button type="submit"
                                    style="width: 100%; background: transparent; border: 1px solid rgba(255, 255, 255, 0.5); color: white; padding: 0.8rem; border-radius: 8px; font-size: 1.1rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.3s;">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
                                </button>
                            </form>

                        @else
                            <a href="{{ route('login') }}"
                                style="display: block; width: 100%; background: var(--primary); color: white; padding: 1rem 0; border-radius: 8px; font-size: 1.2rem; margin-top: 1rem; text-align: center; font-weight: 500;">
                                <h2 style="text-transform: uppercase">Se connecter</h2>
                            </a>
                        @endauth
                    </li>
                </ul>
            </nav>

            <div class="header-actions">
                <!-- Barre de recherche globale -->
                <button class="search-mobile-toggle" id="search-toggle">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <!-- Barre de recherche pproduit -->
                <form action="{{ route('products.index') }}" method="GET" class="global-search-form" id="search-form">
                    <input type="text" name="search" placeholder="Rechercher un produit..."
                        value="{{ request('search') }}" class="global-search-input">

                    <button type="submit" class="global-search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="{{ route('wishlist.index') }}" id="nav-wishlist" class="wishlist-btn" title="Mes Favoris">
                    <i class="fa-regular fa-heart"></i>
                    <span class="wishlist-count" id="wishlist-count-badge">{{ count(session('wishlist', [])) }}</span>
                </a>

                <a href="{{ route('cart.index') }}" id="nav-cart" class="cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">{{ \App\Models\Cart::where('session_id', session()->getId())->sum('quantite') }}</span>
                </a>

                <div class="desktop-auth">
                    @auth
                        {{-- Bouton de Déconnexion --}}
                        <div class="user-dropdown" style="position: relative;">
                            <button class="login-btn"
                                style="border: none; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-regular fa-user"></i> {{ Auth::user()->name }}
                                <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i>
                            </button>
                            
                            <div class="dropdown-content"
                                style="display: none; position: absolute; right: 0; top: 100%; background: white; min-width: 180px; box-shadow: var(--shadow); border-radius: 12px; padding: 0.5rem; z-index: 1000; border: 1px solid var(--glass-border);">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        style="width: 100%; text-align: left; padding: 10px 15px; border: none; background: none; color: #ef4444; cursor: pointer; display: flex; align-items: center; gap: 10px; font-weight: 500; font-family: var(--font-inter);">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Bouton de connexion --}}
                        <a href="{{ route('login') }}" class="login-btn">Se connecter</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>


    
    <!-- Modal Popup Détail Produit -->
    <div id="product-detail-modal" class="product-modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true">
        <div class="product-modal-card">
            <!-- Bouton de fermeture avec icône (X) -->
            <button type="button" class="product-modal-close" id="modal-close-btn" aria-label="Fermer la fenêtre">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Loading Spinner -->
            <div class="product-modal-loader" id="modal-loader">
                <div class="modal-spinner"></div>
                <p>Chargement des détails du produit...</p>
            </div>

            <!-- Contenu du produit -->
            <div class="product-modal-body" id="modal-body" style="display: none;">
                <div class="modal-grid">
                    <!-- Visuel Produit -->
                    <div class="modal-media">
                        <div class="modal-img-container">
                            <img id="modal-img" src="" alt="Produit">
                        </div>
                        <span class="modal-cat-badge" id="modal-badge"></span>
                    </div>

                    <!-- Détails Produit -->
                    <div class="modal-info">
                        <div class="modal-header-top">
                            <span class="modal-cat-name" id="modal-cat"></span>
                            <div class="modal-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>(4.9/5 · Avis clients)</span>
                            </div>
                        </div>

                        <h2 class="modal-title" id="modal-title"></h2>
                        <div class="modal-price" id="modal-price"></div>

                        <div class="modal-desc-box">
                            <h4>Description</h4>
                            <p id="modal-description"></p>
                        </div>

                        <div class="modal-meta-list">
                            <div class="modal-meta-row">
                                <span class="meta-label">Disponibilité :</span>
                                <span class="meta-val in-stock" id="modal-stock">
                                    <i class="fa-solid fa-circle-check"></i> En stock
                                </span>
                            </div>
                            <div class="modal-meta-row">
                                <span class="meta-label">Livraison :</span>
                                <span class="meta-val"><i class="fa-solid fa-truck-fast"></i> Rapide partout en Côte d'Ivoire</span>
                            </div>
                            <div class="modal-meta-row">
                                <span class="meta-label">Garantie :</span>
                                <span class="meta-val"><i class="fa-solid fa-shield-halved"></i> 100% Satisfait ou Remboursé</span>
                            </div>
                        </div>

                        <div class="modal-cta-row">
                            <div class="modal-qty-selector">
                                <button type="button" class="qty-btn" id="modal-qty-minus"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" id="modal-qty-input" value="1" min="1" max="99" readonly>
                                <button type="button" class="qty-btn" id="modal-qty-plus"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <button type="button" class="btn-modal-add" id="modal-btn-add">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>Ajouter au panier</span>
                            </button>
                            <button type="button" class="btn-wishlist-toggle" id="modal-btn-wishlist" onclick="toggleWishlist(currentModalProductId, this)" title="Ajouter aux favoris" style="position: static; width: 48px; height: 48px; border-radius: 12px; flex-shrink: 0;">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                            <a href="#" class="btn-modal-detail" id="modal-btn-detail" title="Voir la fiche complète">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span>Détails</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- PARTIE FOOTER --}}
    <footer class="main-footer">
        <!-- Footer Newsletter Section -->
        <div class="footer-newsletter">
            <div class="footer-newsletter-card">
                <div class="footer-newsletter-info">
                    <span class="footer-newsletter-tag">
                        <i class="fa-regular fa-paper-plane"></i> Club Privilège
                    </span>
                    <h3 class="footer-newsletter-title">Restons Connectés</h3>
                    <p class="footer-newsletter-desc">
                        Abonnez-vous à notre newsletter pour recevoir en exclusivité nos offres spéciales, nos ventes privées et nos nouvelles collections.
                    </p>
                </div>
                <div class="footer-newsletter-action">
                    <form id="footer-newsletter-form" class="footer-newsletter-form">
                        <div class="footer-input-group">
                            <i class="fa-regular fa-envelope input-icon"></i>
                            <input type="email" id="footer-newsletter-email" name="email" placeholder="Votre adresse email..." required>
                            <button type="submit" id="footer-newsletter-btn" class="footer-newsletter-btn">
                                <span>S'abonner</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                        <div id="footer-newsletter-message" class="footer-newsletter-msg"></div>
                        <p class="footer-newsletter-promise">
                            <i class="fa-solid fa-lock"></i> Pas de spam. Désabonnement à tout moment.
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer-container">
            <div class="footer-column footer-brand">
                <div class="logo">
                    <a href="/">Lux<span style="font-size: 3rem;">Cart</span></a>
                </div>

                <p class="brand-description">
                    LuxCart est votre destination privilégiée pour l'import-export de produits internationaux en Côte
                    d'Ivoire. Nous sélectionnons le meilleur de la mode et de l'électronique pour vous offrir une
                    expérience premium.
                </p>
                
            </div>

            <div class="footer-column">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('products.index') }}">Boutique</a></li>
                    <li><a href="/#categories">Catégories</a></li>
                    <li><a href="{{ route('about') }}">À propos</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Aide & Support</h4>
                <ul>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('expedition') }}">Expédition</a></li>
                    {{-- Liens vers les routes --}}
                    <li><a href="{{ route('retours') }}">Retours</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column footer-contact">
                <h4>Contactez-nous</h4>
                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Abidjan, Côte d'Ivoire</span>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>+225 01 02 03 04 05</span>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>contact@luxcart.ci</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container footer-bottom-content">
                <p>&copy; {{ date('Y') }} LuxeCart. Conçu avec passion pour une expérience unique.</p>
                <div class="footer-bottom-links">
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartCountBadge = document.querySelector('.cart-count');

            // Délégation d'événements pour gérer tous les boutons d'ajout au panier (y compris chargés dynamiquement)
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.add-to-cart');
                if (!btn) return;

                e.preventDefault();
                e.stopPropagation();
                const productId = btn.getAttribute('data-id');
                if (!productId) return;

                fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Mettre à jour le compteur du panier
                            if (cartCountBadge) cartCountBadge.textContent = data.cartCount;

                            // Feedback visuel sur le bouton
                            const originalIcon = btn.innerHTML;
                            btn.innerHTML = '<i class="fa-solid fa-check"></i>';
                            btn.style.background = '#10b981';

                            setTimeout(() => {
                                btn.innerHTML = originalIcon;
                                btn.style.background = '';
                            }, 2000);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            // User Dropdown Toggle
            const userDropdown = document.querySelector('.user-dropdown');
            if (userDropdown) {
                const dropBtn = userDropdown.querySelector('.login-btn');
                const dropContent = userDropdown.querySelector('.dropdown-content');

                dropBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const isVisible = dropContent.style.display === 'block';
                    dropContent.style.display = isVisible ? 'none' : 'block';
                });

                document.addEventListener('click', function () {
                    dropContent.style.display = 'none';
                });

                dropContent.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            }

            // Mobile Menu Toggle Logic
            const menuOpenBtn = document.getElementById('menu-open');
            const menuCloseBtn = document.getElementById('menu-close');
            const mobileNav = document.getElementById('mobile-nav');
            const navLinks = mobileNav.querySelectorAll('a');

            if (menuOpenBtn && mobileNav) {
                menuOpenBtn.addEventListener('click', () => {
                    mobileNav.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }

            if (menuCloseBtn && mobileNav) {
                menuCloseBtn.addEventListener('click', () => {
                    mobileNav.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            }

            // Close mobile menu when a link is clicked
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileNav.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            });

            // Search Toggle Logic
            const searchToggle = document.getElementById('search-toggle');
            const searchForm = document.getElementById('search-form');

            if (searchToggle && searchForm) {
                searchToggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    searchForm.classList.toggle('active');
                    if (searchForm.classList.contains('active')) {
                        searchForm.querySelector('input').focus();
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!searchForm.contains(e.target) && !searchToggle.contains(e.target)) {
                        searchForm.classList.remove('active');
                    }
                });
            }

            // Scroll Animation Observer for .animate-fade-up
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px 50px 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-fade-up').forEach((el) => {
                observer.observe(el);
            });

            // Footer Newsletter Ajax Handler
            const footerNewsletterForm = document.getElementById('footer-newsletter-form');
            const footerNewsletterEmail = document.getElementById('footer-newsletter-email');
            const footerNewsletterBtn = document.getElementById('footer-newsletter-btn');
            const footerNewsletterMessage = document.getElementById('footer-newsletter-message');

            if (footerNewsletterForm) {
                footerNewsletterForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const email = footerNewsletterEmail.value.trim();
                    if (!email) return;

                    const originalBtnContent = footerNewsletterBtn.innerHTML;
                    footerNewsletterBtn.disabled = true;
                    footerNewsletterBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Envoi...</span>';

                    fetch('{{ route("newsletter.store") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ email: email })
                    })
                    .then(response => response.json().then(data => ({ ok: response.ok, data: data })))
                    .then(({ ok, data }) => {
                        footerNewsletterMessage.style.display = 'block';
                        footerNewsletterMessage.textContent = data.message;

                        if (data.success || ok) {
                            footerNewsletterMessage.className = 'footer-newsletter-msg success';
                            footerNewsletterEmail.value = '';
                            footerNewsletterBtn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Inscrit !</span>';
                            setTimeout(() => {
                                footerNewsletterBtn.disabled = false;
                                footerNewsletterBtn.innerHTML = originalBtnContent;
                            }, 3500);
                        } else {
                            footerNewsletterMessage.className = 'footer-newsletter-msg error';
                            footerNewsletterBtn.disabled = false;
                            footerNewsletterBtn.innerHTML = originalBtnContent;
                        }
                    })
                    .catch(error => {
                        console.error('Erreur newsletter:', error);
                        footerNewsletterMessage.style.display = 'block';
                        footerNewsletterMessage.className = 'footer-newsletter-msg error';
                        footerNewsletterMessage.textContent = 'Une erreur est survenue. Veuillez réessayer.';
                        footerNewsletterBtn.disabled = false;
                        footerNewsletterBtn.innerHTML = originalBtnContent;
                    });
                });
            }

            // ===== PRODUCT DETAIL MODAL POPUP LOGIC =====
            const productModal = document.getElementById('product-detail-modal');
            const modalCloseBtn = document.getElementById('modal-close-btn');
            const modalLoader = document.getElementById('modal-loader');
            const modalBody = document.getElementById('modal-body');
            const modalImg = document.getElementById('modal-img');
            const modalBadge = document.getElementById('modal-badge');
            const modalCat = document.getElementById('modal-cat');
            const modalTitle = document.getElementById('modal-title');
            const modalPrice = document.getElementById('modal-price');
            const modalDesc = document.getElementById('modal-description');
            const modalStock = document.getElementById('modal-stock');
            const modalQtyInput = document.getElementById('modal-qty-input');
            const modalQtyMinus = document.getElementById('modal-qty-minus');
            const modalQtyPlus = document.getElementById('modal-qty-plus');
            const modalBtnAdd = document.getElementById('modal-btn-add');

            let currentModalProductId = null;

            function openProductModal(productId) {
                if (!productModal) return;
                currentModalProductId = productId;
                if (modalQtyInput) modalQtyInput.value = 1;

                productModal.style.display = 'flex';
                requestAnimationFrame(() => {
                    productModal.classList.add('active');
                });
                productModal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';

                if (modalLoader) modalLoader.style.display = 'flex';
                if (modalBody) modalBody.style.display = 'none';

                fetch(`/produit/${productId}?format=json`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.produit) {
                        const p = data.produit;
                        if (modalImg) {
                            modalImg.src = p.image;
                            modalImg.alt = p.nom;
                        }
                        if (modalBadge) modalBadge.textContent = p.categorie;
                        if (modalCat) modalCat.textContent = p.categorie;
                        if (modalTitle) modalTitle.textContent = p.nom;
                        if (modalPrice) modalPrice.textContent = p.prix_formate;
                        if (modalDesc) modalDesc.textContent = p.description || 'Produit authentique de qualité supérieure disponible chez LuxeCart.';
                        
                        if (modalStock) {
                            if (p.stock > 0) {
                                modalStock.className = 'meta-val in-stock';
                                modalStock.innerHTML = `<i class="fa-solid fa-circle-check"></i> En stock (${p.stock} unités)`;
                                if (modalBtnAdd) modalBtnAdd.disabled = false;
                            } else {
                                modalStock.className = 'meta-val out-of-stock';
                                modalStock.innerHTML = `<i class="fa-solid fa-circle-xmark"></i> Rupture temporaire`;
                                if (modalBtnAdd) modalBtnAdd.disabled = true;
                            }
                        }

                        if (modalBtnAdd) {
                            modalBtnAdd.setAttribute('data-id', p.id);
                            modalBtnAdd.innerHTML = '<i class="fa-solid fa-cart-shopping"></i> <span>Ajouter au panier</span>';
                            modalBtnAdd.style.background = '';
                        }
                        const modalBtnDetail = document.getElementById('modal-btn-detail');
                        if (modalBtnDetail) {
                            modalBtnDetail.href = '/produit/' + p.id;
                        }

                        const modalBtnWishlist = document.getElementById('modal-btn-wishlist');
                        if (modalBtnWishlist) {
                            modalBtnWishlist.setAttribute('data-product-id', p.id);
                            const heartIcon = modalBtnWishlist.querySelector('i');
                            if (p.is_favorite) {
                                modalBtnWishlist.classList.add('active');
                                if (heartIcon) heartIcon.className = 'fa-solid fa-heart';
                            } else {
                                modalBtnWishlist.classList.remove('active');
                                if (heartIcon) heartIcon.className = 'fa-regular fa-heart';
                            }
                        }

                        if (modalLoader) modalLoader.style.display = 'none';
                        if (modalBody) modalBody.style.display = 'block';
                    }
                })
                .catch(err => {
                    console.error('Erreur chargement produit:', err);
                    if (modalLoader) {
                        modalLoader.innerHTML = '<p style="color:#ef4444;"><i class="fa-solid fa-circle-exclamation"></i> Impossible de charger les détails du produit.</p>';
                    }
                });
            }
            window.openProductModal = openProductModal;

            function closeProductModal() {
                if (!productModal) return;
                productModal.classList.remove('active');
                productModal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
                setTimeout(() => {
                    productModal.style.display = 'none';
                }, 300);
            }

            if (modalCloseBtn) {
                modalCloseBtn.addEventListener('click', closeProductModal);
            }

            if (productModal) {
                productModal.addEventListener('click', function(e) {
                    if (e.target === productModal) {
                        closeProductModal();
                    }
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && productModal && productModal.classList.contains('active')) {
                    closeProductModal();
                }
            });

            // Quantity buttons in modal
            if (modalQtyMinus && modalQtyPlus && modalQtyInput) {
                modalQtyMinus.addEventListener('click', function() {
                    let val = parseInt(modalQtyInput.value) || 1;
                    if (val > 1) modalQtyInput.value = val - 1;
                });
                modalQtyPlus.addEventListener('click', function() {
                    let val = parseInt(modalQtyInput.value) || 1;
                    if (val < 99) modalQtyInput.value = val + 1;
                });
            }

            // Modal Add to Cart
            if (modalBtnAdd) {
                modalBtnAdd.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!currentModalProductId) return;

                    const qty = parseInt(modalQtyInput.value) || 1;
                    modalBtnAdd.disabled = true;
                    modalBtnAdd.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Ajout...</span>';

                    fetch(`/cart/add/${currentModalProductId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ quantite: qty })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            if (cartCountBadge) cartCountBadge.textContent = data.cartCount;
                            modalBtnAdd.innerHTML = '<i class="fa-solid fa-check"></i> <span>Ajouté au panier !</span>';
                            modalBtnAdd.style.background = '#10b981';
                            setTimeout(() => {
                                modalBtnAdd.disabled = false;
                                modalBtnAdd.innerHTML = '<i class="fa-solid fa-cart-shopping"></i> <span>Ajouter au panier</span>';
                                modalBtnAdd.style.background = '';
                            }, 2000);
                        } else {
                            modalBtnAdd.disabled = false;
                            modalBtnAdd.innerHTML = '<i class="fa-solid fa-cart-shopping"></i> <span>Ajouter au panier</span>';
                        }
                    })
                    .catch(err => {
                        console.error('Erreur ajout panier modal:', err);
                        modalBtnAdd.disabled = false;
                        modalBtnAdd.innerHTML = '<i class="fa-solid fa-cart-shopping"></i> <span>Ajouter au panier</span>';
                    });
                });
            }

            // Intercept clicks on product cards & detail links
            document.addEventListener('click', function(e) {
                // Ignore if clicked on an add-to-cart button, wishlist button or inside modal buttons
                if (e.target.closest('.add-to-cart') || 
                    e.target.closest('.btn-wishlist-toggle') ||
                    e.target.closest('#modal-btn-add') || 
                    e.target.closest('.modal-qty-selector') || 
                    e.target.closest('#modal-btn-detail') ||
                    e.target.closest('#modal-close-btn')) {
                    return;
                }

                // If already inside the open modal card, do not re-trigger
                if (e.target.closest('.product-modal-card')) {
                    return;
                }

                const productLink = e.target.closest('a[href*="/produit"]');
                const productCard = e.target.closest('.product-card, .deal-card, .luxury-product-card, .nouv-product-card');

                let targetId = null;

                // Priority 1: Card click
                if (productCard) {
                    if (productCard.dataset && productCard.dataset.id) {
                        targetId = productCard.dataset.id;
                    } else if (productCard.id && productCard.id.startsWith('product-')) {
                        targetId = productCard.id.replace('product-', '');
                    } else {
                        const link = productCard.querySelector('a[href*="/produit"]');
                        if (link) {
                            const match = link.getAttribute('href').match(/\/produit[s]?\/(\d+)/);
                            if (match) targetId = match[1];
                        }
                    }

                    if (targetId) {
                        e.preventDefault();
                        openProductModal(targetId);
                        return;
                    }
                }

                // Priority 2: Standalone product detail links
                if (productLink && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
                    const match = productLink.getAttribute('href').match(/\/produit[s]?\/(\d+)/);
                    if (match) {
                        e.preventDefault();
                        targetId = match[1];
                        openProductModal(targetId);
                    }
                }
            });
        });

        // Toggle Wishlist Global Function
        window.toggleWishlist = function(productId, btn) {
            if (!productId) return;
            
            if (btn) btn.classList.add('heart-pop');

            fetch(`/favoris/toggle/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const allProductBtns = document.querySelectorAll(`.btn-wishlist-toggle[data-product-id="${productId}"]`);
                    allProductBtns.forEach(b => {
                        const icon = b.querySelector('i');
                        if (data.added) {
                            b.classList.add('active');
                            b.setAttribute('title', 'Retirer des favoris');
                            if (icon) {
                                icon.classList.remove('fa-regular');
                                icon.classList.add('fa-solid');
                            }
                        } else {
                            b.classList.remove('active');
                            b.setAttribute('title', 'Ajouter aux favoris');
                            if (icon) {
                                icon.classList.remove('fa-solid');
                                icon.classList.add('fa-regular');
                            }
                        }
                    });

                    const badges = document.querySelectorAll('.wishlist-count, #wishlist-count-badge, .mobile-wishlist-count');
                    badges.forEach(b => {
                        b.textContent = data.count;
                    });
                }
            })
            .catch(err => console.error('Erreur favoris:', err))
            .finally(() => {
                if (btn) {
                    setTimeout(() => btn.classList.remove('heart-pop'), 400);
                }
            });
        };
    </script>
    @stack('scripts')

    
</body>

</html>