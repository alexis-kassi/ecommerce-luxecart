<!DOCTYPE html>
<html lang="fr">

<head>
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

    <!-- Meta tags for SEO -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <header class="main-header">
        <div class="header-container">
            <div class="logo">
                <a href="/">Luxe<span>Cart</span></a>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('home') }}" id="nav-home"
                            class="{{ Request::is('/') ? 'active' : '' }}">Accueil</a></li>
                    <li><a href="{{ route('products.index') }}" id="nav-products"
                            class="{{ Request::is('produits*') ? 'active' : '' }}">Boutique</a></li>
                    <li><a href="/#categories" id="nav-categories">Catégories</a></li>
                    <li><a href="{{ route('about') }}" id="nav-about"
                            class="{{ Request::is('apropos') ? 'active' : '' }}">À Propos</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="{{ route('cart.index') }}" id="nav-cart" class="cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count">{{ array_sum(session()->get('cart', [])) }}</span>
                </a>
                @auth
                    <div class="user-dropdown" style="position: relative;">
                        <button class="login-btn" style="border: none; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-regular fa-user"></i> {{ Auth::user()->name }} <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i>
                        </button>
                        <div class="dropdown-content" style="display: none; position: absolute; right: 0; top: 100%; background: white; min-width: 180px; box-shadow: var(--shadow); border-radius: 12px; padding: 0.5rem; z-index: 1000; border: 1px solid var(--glass-border);">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" style="width: 100%; text-align: left; padding: 10px 15px; border: none; background: none; color: #ef4444; cursor: pointer; display: flex; align-items: center; gap: 10px; font-weight: 500; font-family: var(--font-inter);">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="login-btn">Se connecter</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-info">
                <h3>LuxeCart</h3>
                <p>LuxeCart est une entreprise de référence en Côte d'Ivoire spécialisée dans l'import-export de
                    produits variés, allant des articles pour la maison aux vêtements et jouets, connue pour son large
                    choix de produits internationaux de qualité à des prix compétitifs, avec des points de vente comme
                    celui d'Abidjan.</p>
            </div>
            <div class="footer-links">
                <h4>Service Client</h4>
                <ul>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('about') }}">A propos de nous</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Liens rapide</h4>
                <div class="social-icons">
                    <ul>
                        <li><a href="{{ route('home') }}" id="nav-home">Accueil</a></li>
                        <li><a href="{{ route('products.index') }}" id="nav-products">Boutique</a></li>
                        <li><a href="{{ route('home') }}#categories" id="nav-categories">Catégories</a></li>
                        <li><a href="{{ route('about') }}" id="nav-apropos">A propos</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} LuxeCart. Tous droits réservés.</p>
        </div>
    </footer>

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

                dropBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isVisible = dropContent.style.display === 'block';
                    dropContent.style.display = isVisible ? 'none' : 'block';
                });

                document.addEventListener('click', function() {
                    dropContent.style.display = 'none';
                });

                dropContent.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>
</body>

</html>