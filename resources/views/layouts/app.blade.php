<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- LES LIENS HEAD -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeCart | Votre boutique e-commerce</title>

    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('styles')

    <!-- Meta tags for SEO -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @if(request()->routeIs('home'))
        <div style="background-color: #0f172a; color: white; padding: 10px 0; overflow: hidden; white-space: nowrap; 
                    font-size: 0.95rem; font-weight: 500; letter-spacing: 1px; text-transform: uppercase;">
            <div
                style="display: inline-block; white-space: nowrap; animation: marquee-ltr 90s linear infinite; width: max-content;">
                <span style="margin: 0 50px;">Bienvenue sur luxeCart la boutique des meilleurs collections</span>
                <span style="margin: 0 50px;">Bienvenue sur luxeCart la boutique des meilleurs collections</span>
                <span style="margin: 0 50px;">Une collection des produits très fiable</span>
                <span style="margin: 0 50px;">Bienvenue sur luxeCart la boutique des meilleurs collections Disponible</span>
            </div>
        </div>
        <style>
            @keyframes marquee-ltr {
                0% {
                    transform: translateX(-50%);
                }

                100% {
                    transform: translateX(0%);
                }
            }
        </style>
    @endif

    {{-- PARTIE HEADER --}}
    <header class="main-header">
        <div class="header-container">
            <button class="mobile-menu-toggle" id="menu-open">
                <i class="fa-solid fa-bars"></i>
            </button>

            {{-- Logo du site --}}
            <div class="logo">
                <a href="/">Luxe<span>CartPro</span></a>
            </div>

            {{-- Menu de navigation --}}
            <nav class="main-nav" id="mobile-nav">
                <button class="mobile-menu-close" id="menu-close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <ul>
                    {{-- -Menus de navigation du site --}}
                    <li class="menu_accueil">
                        <a href="{{ route('home') }}" id="nav-home"
                            class="{{ Request::is('/') ? 'active' : '' }}">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" id="nav-products"
                            class="{{ Request::is('produits*') ? 'active' : '' }}">Boutique</a>
                    </li>
                    <li>
                        <a href="/#categories" id="nav-categories">Catégories</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" id="nav-about"
                            class="{{ Request::is('apropos') ? 'active' : '' }}">À Propos de</a>
                    </li>
                    <li>
                        <a href="{{ route('nouveautes') }}" id="nav-nouveautes"
                            class="{{ Request::is('nouveautes') ? 'active' : '' }}">Nouveautés</a>
                    </li>

                    {{-- Liens d'authentification pour mobile --}}
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

                <a href="{{ route('cart.index') }}" id="nav-cart" class="cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">{{ array_sum(session()->get('cart', [])) }}</span>
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

    {{-- PARTIE FOOTER --}}
    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-column footer-brand">
                <div class="logo">
                    <a href="/">Luxe<span>Cart</span></a>
                </div>
                <p class="brand-description">
                    LuxeCart est votre destination privilégiée pour l'import-export de produits internationaux en Côte
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
                    <span>contact@luxecart.ci</span>
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
            const addToCartBtns = document.querySelectorAll('.add-to-cart');
            const cartCountBadge = document.querySelector('.cart-count');

            addToCartBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');

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
                                // Update badge
                                cartCountBadge.textContent = data.cartCount;

                                // Visual feedback
                                const originalIcon = this.innerHTML;
                                this.innerHTML = '<i class="fa-solid fa-check"></i>';
                                this.style.background = '#10b981'; // Success green

                                setTimeout(() => {
                                    this.innerHTML = originalIcon;
                                    this.style.background = ''; // Back to CSS default
                                }, 2000);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
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
        });
    </script>
    @stack('scripts')
</body>

</html>