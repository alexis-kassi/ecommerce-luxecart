@extends('layouts.app')

@push('styles')
<style>
    /* ========================================================
       LUXECART MODERN SHOP - DESIGN SYSTEM & STYLES
       ======================================================== */
    :root {
        --shop-primary: #6366f1;
        --shop-primary-hover: #4f46e5;
        --shop-accent: #f59e0b;
        --shop-dark: #0f172a;
        --shop-darker: #090d16;
        --shop-gray-light: #f8fafc;
        --shop-gray-muted: #e2e8f0;
        --shop-text-muted: #64748b;
        --shop-border: rgba(226, 232, 240, 0.8);
        --shop-card-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
        --shop-card-shadow-hover: 0 20px 35px -10px rgba(99, 102, 241, 0.16), 0 10px 15px -5px rgba(15, 23, 42, 0.05);
        --shop-radius-sm: 10px;
        --shop-radius-md: 16px;
        --shop-radius-lg: 24px;
        --shop-radius-full: 9999px;
        --shop-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Container global */
    .shop-wrapper {
        background: #fbfcfe;
        min-height: 100vh;
        padding-bottom: 6rem;
    }

    /* ========================================================
       1. BOUTIQUE CLEAN TOP HEADER (Sans Hero - Direct Catalog)
       ======================================================== */
    .shop-header-strip {
        background: #ffffff;
        border-bottom: 1px solid var(--shop-border);
        padding: 1.8rem 1.5rem 1.4rem;
        margin-bottom: 1.6rem;
    }

    .shop-header-inner {
        max-width: 1240px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.2rem;
        flex-wrap: wrap;
    }

    .shop-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.84rem;
        color: var(--shop-text-muted);
        margin-bottom: 0.35rem;
    }

    .shop-breadcrumb a {
        color: var(--shop-text-muted);
        text-decoration: none;
        transition: color 0.2s;
    }

    .shop-breadcrumb a:hover {
        color: var(--shop-primary);
    }

    .shop-title-group h1 {
        font-family: var(--font-outfit);
        font-size: 2rem;
        font-weight: 700;
        color: var(--shop-dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .shop-title-badge {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 0.3rem 0.85rem;
        border-radius: var(--shop-radius-full);
        background: rgba(99, 102, 241, 0.1);
        color: var(--shop-primary);
    }

    .shop-trust-badges-inline {
        display: flex;
        align-items: center;
        gap: 1.4rem;
        flex-wrap: wrap;
    }

    .trust-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--shop-text-muted);
    }

    .trust-tag i {
        color: #10b981;
    }

    /* ========================================================
       2. HORIZONTAL CATEGORY PILLS BAR (Adjusted without Hero)
       ======================================================== */
    .category-pills-bar {
        max-width: 1240px;
        margin: 0 auto 2rem;
        padding: 0 1.5rem;
        position: relative;
        z-index: 5;
    }

    .pills-scroll-wrapper {
        display: flex;
        gap: 0.75rem;
        overflow-x: auto;
        padding: 0.6rem 0.6rem 1rem;
        scrollbar-width: thin;
        scrollbar-color: rgba(99, 102, 241, 0.4) transparent;
        -webkit-overflow-scrolling: touch;
    }

    .pills-scroll-wrapper::-webkit-scrollbar {
        height: 5px;
    }

    .pills-scroll-wrapper::-webkit-scrollbar-thumb {
        background: rgba(99, 102, 241, 0.3);
        border-radius: 10px;
    }

    .cat-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.75rem 1.4rem;
        border-radius: var(--shop-radius-full);
        background: #ffffff;
        color: var(--shop-dark);
        border: 1px solid var(--shop-border);
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
        font-weight: 500;
        font-size: 0.95rem;
        white-space: nowrap;
        text-decoration: none;
        transition: var(--shop-transition);
        cursor: pointer;
    }

    .cat-pill i {
        color: var(--shop-primary);
        font-size: 1.05rem;
        transition: transform 0.3s ease;
    }

    .cat-pill .pill-count {
        background: var(--shop-gray-muted);
        color: var(--shop-text-muted);
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .cat-pill:hover {
        transform: translateY(-2px);
        border-color: var(--shop-primary);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.15);
        color: var(--shop-primary);
    }

    .cat-pill:hover i {
        transform: scale(1.15);
    }

    .cat-pill.active {
        background: linear-gradient(135deg, var(--shop-primary) 0%, #4f46e5 100%);
        color: #ffffff;
        border-color: transparent;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
    }

    .cat-pill.active i {
        color: #ffffff;
    }

    .cat-pill.active .pill-count {
        background: rgba(255, 255, 255, 0.25);
        color: #ffffff;
    }

    /* ========================================================
       3. MAIN LAYOUT (SIDEBAR + PRODUCT GRID)
       ======================================================== */
    .shop-main-layout {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: grid;
        grid-template-columns: 290px 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    /* ========================================================
       4. HIGH-END FILTERS SIDEBAR
       ======================================================== */
    .shop-sidebar-card {
        background: #ffffff;
        border-radius: var(--shop-radius-lg);
        border: 1px solid var(--shop-border);
        box-shadow: var(--shop-card-shadow);
        padding: 1.8rem;
        position: sticky;
        top: 90px;
        transition: var(--shop-transition);
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 1.2rem;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid var(--shop-gray-muted);
    }

    .sidebar-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--shop-dark);
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .sidebar-header h3 i {
        color: var(--shop-primary);
    }

    .reset-filters-link {
        font-size: 0.85rem;
        color: #ef4444;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: var(--shop-transition);
    }

    .reset-filters-link:hover {
        color: #b91c1c;
        text-decoration: underline;
    }

    .filter-group {
        margin-bottom: 1.8rem;
    }

    .filter-group-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--shop-dark);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Search input inside sidebar */
    .filter-search-box {
        position: relative;
    }

    .filter-search-box input {
        width: 100%;
        padding: 0.85rem 2.8rem 0.85rem 2.6rem;
        border-radius: var(--shop-radius-md);
        border: 1px solid var(--shop-border);
        background: var(--shop-gray-light);
        color: var(--shop-dark);
        font-size: 0.95rem;
        outline: none;
        transition: var(--shop-transition);
    }

    .filter-search-box input:focus {
        border-color: var(--shop-primary);
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .filter-search-box .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--shop-text-muted);
        font-size: 0.95rem;
        pointer-events: none;
    }

    .filter-search-box .search-clear {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: var(--shop-text-muted);
        cursor: pointer;
        padding: 4px;
        font-size: 0.9rem;
        display: none;
    }

    .filter-search-box input:not(:placeholder-shown)+.search-icon+.search-clear {
        display: block;
    }

    /* Category list styled radio options */
    .category-options-list {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .cat-option-label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.65rem 0.9rem;
        border-radius: var(--shop-radius-md);
        cursor: pointer;
        font-size: 0.92rem;
        color: var(--shop-dark);
        transition: var(--shop-transition);
        border: 1px solid transparent;
        user-select: none;
    }

    .cat-option-label:hover {
        background: var(--shop-gray-light);
        border-color: var(--shop-gray-muted);
        color: var(--shop-primary);
    }

    .cat-option-label.active {
        background: rgba(99, 102, 241, 0.08);
        border-color: rgba(99, 102, 241, 0.3);
        color: var(--shop-primary);
        font-weight: 600;
    }

    .cat-option-label input[type="radio"] {
        display: none;
    }

    .cat-option-left {
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .cat-option-badge {
        font-size: 0.75rem;
        padding: 2px 7px;
        border-radius: var(--shop-radius-full);
        background: var(--shop-gray-muted);
        color: var(--shop-text-muted);
        font-weight: 600;
    }

    .cat-option-label.active .cat-option-badge {
        background: var(--shop-primary);
        color: #ffffff;
    }

    /* Price inputs & preset tags */
    .price-inputs-row {
        display: grid;
        grid-template-columns: 1fr 20px 1fr;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.9rem;
    }

    .price-input-wrapper {
        position: relative;
    }

    .price-input-wrapper input {
        width: 100%;
        padding: 0.65rem 0.65rem 0.65rem 0.85rem;
        border-radius: var(--shop-radius-sm);
        border: 1px solid var(--shop-border);
        background: var(--shop-gray-light);
        font-size: 0.9rem;
        color: var(--shop-dark);
        outline: none;
        transition: var(--shop-transition);
    }

    .price-input-wrapper input:focus {
        border-color: var(--shop-primary);
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .price-separator {
        text-align: center;
        color: var(--shop-text-muted);
        font-weight: 600;
    }

    .price-presets {
        display: flex;
        flex-wrap: wrap;
        gap: 0.45rem;
    }

    .price-preset-chip {
        padding: 0.35rem 0.75rem;
        border-radius: var(--shop-radius-full);
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        color: var(--shop-text-muted);
        font-size: 0.78rem;
        cursor: pointer;
        transition: var(--shop-transition);
    }

    .price-preset-chip:hover {
        background: #ffffff;
        border-color: var(--shop-primary);
        color: var(--shop-primary);
    }

    /* In-stock toggle */
    .availability-toggle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 0.9rem;
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        border-radius: var(--shop-radius-md);
        cursor: pointer;
        user-select: none;
        transition: var(--shop-transition);
    }

    .availability-toggle:hover {
        border-color: var(--shop-primary);
    }

    .availability-toggle span {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--shop-dark);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .availability-toggle span i {
        color: #10b981;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background-color: #cbd5e1;
        transition: .3s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
    }

    input:checked+.slider {
        background-color: var(--shop-primary);
    }

    input:checked+.slider:before {
        transform: translateX(20px);
    }

    /* Submit filter button */
    .btn-apply-filters {
        width: 100%;
        padding: 0.85rem;
        border-radius: var(--shop-radius-md);
        background: linear-gradient(135deg, var(--shop-primary) 0%, #4338ca 100%);
        color: #ffffff;
        border: none;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        transition: var(--shop-transition);
    }

    .btn-apply-filters:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    }

    /* Concierge promo card in sidebar */
    .sidebar-concierge {
        margin-top: 1.8rem;
        padding: 1.2rem;
        border-radius: var(--shop-radius-md);
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .sidebar-concierge::after {
        content: '\f21e';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: -10px;
        bottom: -15px;
        font-size: 4.5rem;
        color: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .sidebar-concierge h5 {
        font-size: 0.95rem;
        font-weight: 600;
        color: #fbbf24;
        margin-bottom: 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .sidebar-concierge p {
        font-size: 0.82rem;
        color: #cbd5e1;
        line-height: 1.4;
        margin-bottom: 0.8rem;
    }

    .sidebar-concierge a {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.82rem;
        font-weight: 600;
        color: #ffffff;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.4rem 0.8rem;
        border-radius: var(--shop-radius-full);
        transition: var(--shop-transition);
    }

    .sidebar-concierge a:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    /* ========================================================
       5. SHOP CONTENT & TOOLBAR
       ======================================================== */
    .shop-content {
        min-width: 0;
    }

    .shop-toolbar-card {
        background: #ffffff;
        border-radius: var(--shop-radius-lg);
        border: 1px solid var(--shop-border);
        box-shadow: var(--shop-card-shadow);
        padding: 1.2rem 1.6rem;
        margin-bottom: 1.8rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.2rem;
        flex-wrap: wrap;
    }

    .toolbar-left {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        flex-wrap: wrap;
    }

    .results-count-text {
        font-size: 0.95rem;
        color: var(--shop-dark);
        font-weight: 500;
    }

    .results-count-text strong {
        color: var(--shop-primary);
        font-weight: 700;
    }

    .toolbar-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    /* Sort select */
    .sort-wrapper {
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .sort-label {
        font-size: 0.9rem;
        color: var(--shop-text-muted);
        font-weight: 500;
        display: none;
    }

    @media (min-width: 768px) {
        .sort-label {
            display: inline-block;
        }
    }

    .sort-select-custom {
        padding: 0.6rem 2.2rem 0.6rem 1rem;
        border-radius: var(--shop-radius-md);
        border: 1px solid var(--shop-border);
        background: var(--shop-gray-light) url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2364748b%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.4-12.8z%22%2F%3E%3C%2Fsvg%3E") no-repeat right 0.9rem center;
        background-size: 9px;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--shop-dark);
        outline: none;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        transition: var(--shop-transition);
    }

    .sort-select-custom:focus {
        border-color: var(--shop-primary);
        background-color: #ffffff;
    }

    /* View Switcher */
    .view-switcher {
        display: flex;
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        border-radius: var(--shop-radius-md);
        padding: 3px;
        gap: 3px;
    }

    .view-btn {
        width: 36px;
        height: 34px;
        border: none;
        background: transparent;
        color: var(--shop-text-muted);
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        transition: var(--shop-transition);
    }

    .view-btn.active {
        background: #ffffff;
        color: var(--shop-primary);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    /* Mobile filter button */
    .btn-mobile-filters {
        display: none;
        align-items: center;
        gap: 0.55rem;
        padding: 0.65rem 1.25rem;
        border-radius: var(--shop-radius-md);
        background: linear-gradient(135deg, var(--shop-primary) 0%, #4338ca 100%);
        color: #ffffff;
        border: none;
        font-family: var(--font-outfit, sans-serif);
        font-size: 0.92rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        transition: var(--shop-transition);
        user-select: none;
    }

    .btn-mobile-filters:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(99, 102, 241, 0.4);
    }

    .active-filter-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: var(--shop-radius-full);
        background: #fbbf24;
        color: #0f172a;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1;
    }

    .btn-mobile-filters .active-filter-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #fbbf24;
    }

    /* Floating button for mobile */
    .floating-mobile-filter-btn {
        display: none;
    }

    /* Active filter chips bar */
    .active-filters-chips {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.6rem;
        margin-bottom: 1.5rem;
        padding: 0.8rem 1.2rem;
        background: #ffffff;
        border-radius: var(--shop-radius-md);
        border: 1px solid var(--shop-border);
    }

    .active-filter-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.8rem;
        background: rgba(99, 102, 241, 0.08);
        border: 1px solid rgba(99, 102, 241, 0.2);
        color: var(--shop-primary);
        border-radius: var(--shop-radius-full);
        font-size: 0.82rem;
        font-weight: 500;
    }

    .active-filter-tag a {
        color: var(--shop-text-muted);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s;
    }

    .active-filter-tag a:hover {
        color: #ef4444;
    }

    .clear-all-tag {
        font-size: 0.82rem;
        color: #ef4444;
        font-weight: 600;
        text-decoration: none;
        margin-left: auto;
    }

    .clear-all-tag:hover {
        text-decoration: underline;
    }

    /* ========================================================
       6. PRODUCTS GRID & CARDS (With Fluid Staggered Entrance Animation)
       ======================================================== */
    .shop-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
        gap: 1.8rem;
        transition: var(--shop-transition);
    }

    /* Keyframes pour apparition ultra-fluide des cartes */
    @keyframes productCardEntrance {
        0% {
            opacity: 0;
            transform: translateY(32px) scale(0.96);
            filter: blur(5px);
        }

        60% {
            filter: blur(0);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }
    }

    /* Modern Luxury Product Card */
    .luxury-product-card {
        background: #ffffff;
        border-radius: var(--shop-radius-lg);
        border: 1px solid var(--shop-border);
        box-shadow: var(--shop-card-shadow);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease, border-color 0.35s ease;
        position: relative;
        animation: productCardEntrance 0.7s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        animation-delay: var(--card-delay, 0s);
        will-change: transform, opacity;
    }

    .luxury-product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shop-card-shadow-hover);
        border-color: rgba(99, 102, 241, 0.3);
    }

    @media (prefers-reduced-motion: reduce) {
        .luxury-product-card {
            animation: none !important;
            opacity: 1 !important;
            transform: none !important;
            filter: none !important;
        }
    }

    /* Card Image Area */
    .card-media {
        position: relative;
        width: 100%;
        padding-top: 100%;
        /* 1:1 Square */
        background: #f1f5f9;
        overflow: hidden;
    }

    .card-media img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .luxury-product-card:hover .card-media img {
        transform: scale(1.09);
    }

    /* Badges */
    .badge-category {
        position: absolute;
        top: 14px;
        left: 14px;
        padding: 0.35rem 0.8rem;
        border-radius: var(--shop-radius-full);
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(8px);
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        z-index: 3;
    }

    .badge-stock {
        position: absolute;
        top: 14px;
        right: 14px;
        padding: 0.35rem 0.75rem;
        border-radius: var(--shop-radius-full);
        font-size: 0.72rem;
        font-weight: 600;
        z-index: 3;
        backdrop-filter: blur(8px);
    }

    .badge-stock.in-stock {
        background: rgba(16, 185, 129, 0.9);
        color: #ffffff;
    }

    .badge-stock.low-stock {
        background: rgba(245, 158, 11, 0.9);
        color: #ffffff;
    }

    .badge-stock.out-stock {
        background: rgba(239, 68, 68, 0.9);
        color: #ffffff;
    }

    /* Overlay Action Bar on Hover */
    .card-hover-actions {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.2rem;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, transparent 100%);
        display: flex;
        justify-content: center;
        gap: 0.75rem;
        opacity: 0;
        transform: translateY(15px);
        transition: var(--shop-transition);
        z-index: 4;
    }

    .luxury-product-card:hover .card-hover-actions {
        opacity: 1;
        transform: translateY(0);
    }

    .btn-quick-view {
        padding: 0.55rem 1.1rem;
        border-radius: var(--shop-radius-full);
        background: #ffffff;
        color: var(--shop-dark);
        border: none;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: var(--shop-transition);
    }

    .btn-quick-view:hover {
        background: var(--shop-primary);
        color: #ffffff;
    }

    .btn-wishlist {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffffff;
        color: var(--shop-dark);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.95rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: var(--shop-transition);
    }

    .btn-wishlist:hover {
        color: #ef4444;
        transform: scale(1.1);
    }

    .btn-wishlist.active {
        color: #ef4444;
    }

    .btn-card-detail {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffffff;
        color: var(--shop-dark);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.85rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: var(--shop-transition);
    }

    .btn-card-detail:hover {
        background: var(--shop-primary);
        color: #ffffff;
        transform: scale(1.1);
    }

    /* Card Body */
    .card-content {
        padding: 1.4rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .card-meta-line {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .card-category-sub {
        font-size: 0.78rem;
        color: var(--shop-text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .card-rating {
        display: flex;
        align-items: center;
        gap: 3px;
        color: #f59e0b;
        font-size: 0.78rem;
    }

    .card-rating span {
        color: var(--shop-text-muted);
        margin-left: 3px;
        font-size: 0.75rem;
    }

    .card-title {
        font-family: var(--font-outfit);
        font-size: 1.15rem;
        font-weight: 600;
        color: var(--shop-dark);
        line-height: 1.35;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.2s;
    }

    .card-title a:hover {
        color: var(--shop-primary);
    }

    .card-description {
        font-size: 0.86rem;
        color: var(--shop-text-muted);
        line-height: 1.5;
        margin-bottom: 1.2rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Card Footer */
    .card-footer-box {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid var(--shop-gray-muted);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.8rem;
    }

    .card-price-group {
        display: flex;
        flex-direction: column;
    }

    .card-price-label {
        font-size: 0.72rem;
        color: var(--shop-text-muted);
        text-transform: uppercase;
        font-weight: 600;
    }

    .card-price-val {
        font-family: var(--font-outfit);
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--shop-dark);
        letter-spacing: -0.3px;
    }

    .card-price-currency {
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--shop-primary);
        margin-left: 2px;
    }

    .btn-card-cart {
        width: 42px;
        height: 42px;
        padding: 0;
        border-radius: var(--shop-radius-md);
        background: var(--shop-primary);
        color: #ffffff;
        border: none;
        font-size: 1.05rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: var(--shop-transition);
        flex-shrink: 0;
    }

    .btn-card-cart:hover {
        background: var(--shop-primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);
    }

    /* ===== SHOP HOVER OVERLAY NOM PRODUIT ===== */
    .shop-card-hover-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.8rem 1.2rem 1.3rem;
        background: linear-gradient(to top,
                rgba(9, 13, 25, 0.93) 0%,
                rgba(9, 13, 25, 0.55) 55%,
                transparent 100%);
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 0.4s ease, transform 0.4s ease;
        z-index: 5;
    }

    .luxury-product-card:hover .shop-card-hover-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .shop-hover-name {
        font-family: var(--font-outfit, 'Outfit', sans-serif);
        font-size: 1.05rem;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.3;
        letter-spacing: -0.01em;
    }

    .shop-hover-price {
        font-size: 0.88rem;
        font-weight: 600;
        color: #a5b4fc;
    }

    .shop-hover-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.78rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 0.2rem;
    }

    /* Ratio équilibré pour afficher le contenu et le prix sous l'image */
    .luxury-product-card .card-media {
        padding-top: 96%;
    }

    /* ========================================================
       7. LIST VIEW VARIATION
       ======================================================== */
    .shop-products-grid.view-list {
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
    }

    .shop-products-grid.view-list .luxury-product-card {
        flex-direction: row;
        align-items: stretch;
    }

    .shop-products-grid.view-list .card-media {
        width: 270px;
        min-width: 270px;
        padding-top: 0;
        min-height: 220px;
        position: relative;
    }

    .shop-products-grid.view-list .card-description {
        -webkit-line-clamp: 3;
    }

    .shop-products-grid.view-list .card-content {
        padding: 1.8rem;
    }

    /* ========================================================
       8. EMPTY STATE
       ======================================================== */
    .shop-empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: #ffffff;
        border-radius: var(--shop-radius-lg);
        border: 1px solid var(--shop-border);
        box-shadow: var(--shop-card-shadow);
    }

    .empty-state-icon {
        width: 90px;
        height: 90px;
        margin: 0 auto 1.8rem;
        border-radius: 50%;
        background: rgba(99, 102, 241, 0.08);
        color: var(--shop-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.8rem;
    }

    .shop-empty-state h3 {
        font-family: var(--font-outfit);
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--shop-dark);
        margin-bottom: 0.6rem;
    }

    .shop-empty-state p {
        color: var(--shop-text-muted);
        font-size: 1.05rem;
        max-width: 500px;
        margin: 0 auto 2rem;
    }

    .empty-suggestions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .empty-suggestions span {
        font-size: 0.85rem;
        color: var(--shop-text-muted);
    }

    .suggest-chip {
        padding: 0.35rem 0.8rem;
        border-radius: var(--shop-radius-full);
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        color: var(--shop-dark);
        font-size: 0.82rem;
        text-decoration: none;
        transition: var(--shop-transition);
    }

    .suggest-chip:hover {
        background: var(--shop-primary);
        color: #ffffff;
    }

    /* ========================================================
       9. MOBILE OFF-CANVAS FILTER DRAWER
       ======================================================== */
    .filter-drawer-backdrop {
        position: fixed !important;
        inset: 0 !important;
        background: rgba(15, 23, 42, 0.65) !important;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        z-index: 10000 !important;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .filter-drawer-backdrop.active {
        opacity: 1 !important;
        visibility: visible !important;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .shop-hero-grid {
            grid-template-columns: 1fr;
            gap: 2.2rem;
        }

        .hero-image-card {
            height: 250px;
        }

        .shop-main-layout {
            grid-template-columns: 1fr;
        }

        .btn-mobile-filters {
            display: inline-flex;
        }

        .floating-mobile-filter-btn {
            position: fixed;
            bottom: 24px;
            right: 20px;
            z-index: 9990;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: linear-gradient(135deg, var(--shop-primary) 0%, #4338ca 100%);
            color: #ffffff;
            border: none;
            padding: 0.75rem 1.35rem;
            border-radius: var(--shop-radius-full);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45);
            font-family: var(--font-outfit, sans-serif);
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .floating-mobile-filter-btn:active {
            transform: scale(0.95);
        }

        .shop-sidebar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            bottom: 0 !important;
            height: 100vh !important;
            height: 100dvh !important;
            width: 320px !important;
            max-width: 86vw !important;
            background: #ffffff !important;
            z-index: 10001 !important;
            transform: translateX(-100%) !important;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            box-shadow: 10px 0 35px rgba(0, 0, 0, 0.25) !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .shop-sidebar.drawer-open {
            transform: translateX(0) !important;
        }

        .shop-sidebar-card {
            border: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            padding: 1.5rem 1.4rem 3rem !important;
            position: static !important;
            min-height: 100%;
        }

        .drawer-close-btn {
            display: inline-flex !important;
        }
    }

    .drawer-close-btn {
        display: none;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        color: var(--shop-dark);
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.15rem;
        transition: var(--shop-transition);
    }

    .drawer-close-btn:hover {
        background: #fee2e2;
        color: #ef4444;
        border-color: #fca5a5;
    }

    @media (max-width: 768px) {
        .shop-header-strip {
            padding: 1.2rem 1rem 1rem;
            margin-bottom: 1.1rem;
        }

        .shop-title-group h1 {
            font-size: 1.55rem;
        }

        .shop-trust-badges-inline {
            display: none;
        }

        .shop-products-grid.view-list .luxury-product-card {
            flex-direction: column;
        }

        .shop-products-grid.view-list .card-media {
            width: 100%;
            padding-top: 80%;
        }

        .shop-toolbar-card {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .toolbar-left {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.8rem;
        }

        .toolbar-right {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.8rem;
        }

        .sort-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sort-select-custom {
            width: 100%;
        }
    }

    /* ========================================================
       7. LUXURY PAGINATION & PER-PAGE SELECTOR
       ======================================================== */
    .per-page-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .shop-pagination-container {
        margin-top: 3.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .luxury-pagination {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        background: #ffffff;
        padding: 0.5rem 0.75rem;
        border-radius: var(--shop-radius-full);
        border: 1px solid var(--shop-border);
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        list-style: none;
        margin: 0;
    }

    .luxury-pagination .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 42px;
        height: 42px;
        padding: 0 0.5rem;
        border-radius: var(--shop-radius-full);
        font-family: var(--font-outfit, sans-serif);
        font-size: 0.92rem;
        font-weight: 600;
        color: var(--shop-dark);
        text-decoration: none;
        background: transparent;
        border: 1px solid transparent;
        transition: var(--shop-transition);
        user-select: none;
    }

    .luxury-pagination a.page-link:hover {
        background: rgba(99, 102, 241, 0.09);
        color: var(--shop-primary);
        border-color: rgba(99, 102, 241, 0.25);
        transform: translateY(-1px);
    }

    .luxury-pagination .page-link.active {
        background: linear-gradient(135deg, var(--shop-primary), #4338ca);
        color: #ffffff;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);
        cursor: default;
    }

    .luxury-pagination .page-link.disabled {
        color: #cbd5e1;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .luxury-pagination .page-link.dots {
        color: var(--shop-text-muted);
        cursor: default;
        min-width: 32px;
    }

    @media (max-width: 576px) {
        .luxury-pagination .page-link {
            min-width: 36px;
            height: 36px;
            font-size: 0.85rem;
        }

        .per-page-wrapper {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="shop-wrapper">

    <!-- 1. EN-TÊTE ÉPURÉ BOUTIQUE (Sans Hero) -->
    <header class="shop-header-strip">
        <div class="shop-header-inner">
            <div class="shop-title-group">
                <nav class="shop-breadcrumb" aria-label="Fil d'Ariane">
                    <a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Accueil</a>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem; opacity: 0.5;"></i>
                    <span>Boutique</span>
                </nav>
                <h1>
                    Catalogue &amp; Collections
                    <span class="shop-title-badge">{{ $totalProductsCount ?? count($produits) }} articles</span>
                </h1>
            </div>
            <!-- Micro-réassurance discrète -->
            <div class="shop-trust-badges-inline">
                <span class="trust-tag"><i class="fa-solid fa-circle-check"></i> 100% Authentique</span>
                <span class="trust-tag"><i class="fa-solid fa-truck-fast"></i> Livraison 24h &bull; 48h</span>
                <span class="trust-tag"><i class="fa-solid fa-shield-halved"></i> Retours 14 Jours</span>
            </div>
        </div>
    </header>



    <!-- 2. QUICK HORIZONTAL CATEGORY PILLS BAR -->
    <section class="category-pills-bar" aria-label="Catégories rapides">
        <div class="pills-scroll-wrapper">
            <a href="{{ route('products.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}"
                class="cat-pill {{ !request('category') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group"></i>
            
                <span>Toutes les collections</span>
                <span class="pill-count">{{ $totalProductsCount ?? count($produits) }}</span>
            </a>

            @foreach($categories as $cat)
            @php
            $catName = $cat->categorie;
            $iconClass = 'fa-solid fa-bag-shopping';
            if (str_contains(strtolower($catName), 'accessoire')) {
            $iconClass = 'fa-solid fa-glasses';
            } elseif (str_contains(strtolower($catName), 'chaussure')) {
            $iconClass = 'fa-solid fa-shoe-prints';
            } elseif (str_contains(strtolower($catName), 'électronique') || str_contains(strtolower($catName), 'electronique')) {
            $iconClass = 'fa-solid fa-laptop';
            } elseif (str_contains(strtolower($catName), 'nouveaut')) {
            $iconClass = 'fa-solid fa-bolt';
            } elseif (str_contains(strtolower($catName), 'vêtement') || str_contains(strtolower($catName), 'vetement')) {
            $iconClass = 'fa-solid fa-shirt';
            }
            @endphp
            <a href="{{ route('products.index', array_filter(['category' => $catName, 'search' => request('search'), 'sort' => request('sort')])) }}"
                class="cat-pill {{ request('category') === $catName ? 'active' : '' }}">
                <i class="{{ $iconClass }}"></i>
                <span>{{ $catName }}</span>
                @if(isset($cat->count))
                <span class="pill-count">{{ $cat->count }}</span>
                @endif
            </a>
            @endforeach

        </div>
    </section>



    <!-- 3. MAIN SHOP LAYOUT -->
    <div class="shop-main-layout">
        <div class="filter-drawer-backdrop" id="filterDrawerBackdrop"></div>
        <!-- 4. FILTERS SIDEBAR (Sticky on desktop, Off-canvas on mobile) -->
        <aside class="shop-sidebar" id="shopSidebar">
            <div class="shop-sidebar-card">
                <div class="sidebar-header">
                    <h3><i class="fa-solid fa-sliders"></i> Filtres</h3>
                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                        @if(request('category') || request('search') || request('min_price') || request('max_price') || request('in_stock'))
                        <a href="{{ route('products.index') }}" class="reset-filters-link" title="Effacer tous les filtres">
                            <i class="fa-solid fa-rotate-left"></i> Réinitialiser
                        </a>
                        @endif
                        <button type="button" class="drawer-close-btn" id="closeDrawerBtn" aria-label="Fermer le menu des filtres">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <form action="{{ route('products.index') }}" method="GET" id="shopFilterForm">
                    <!-- Preserve sort and per_page values in form -->
                    <input type="hidden" name="sort" id="form-sort-input" value="{{ request('sort', 'latest') }}">
                    <input type="hidden" name="per_page" id="form-per-page-input" value="{{ request('per_page', 12) }}">

                    <!-- Recherche Directe -->
                    <div class="filter-group">
                        <div class="filter-group-title">
                            <span>Recherche</span>
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 0.8rem; color: var(--shop-text-muted);"></i>
                        </div>
                        
                        <div class="filter-search-box">
                            <input type="text" name="search" id="sidebar-search-input"
                                value="{{ request('search') }}"
                                placeholder="Nom, marque, mot-clé..."
                                autocomplete="off">
                            <i class="fa-solid fa-magnifying-glass search-icon" id="searchStaticIcon"></i>
                            <i class="fa-solid fa-circle-notch fa-spin search-loading" id="searchLoadingIcon" style="display: none; position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--shop-primary); font-size: 0.95rem; pointer-events: none;"></i>
                            <button type="button" class="search-clear" id="searchClearBtn" aria-label="Effacer la recherche" style="{{ request('search') ? 'display: block;' : '' }}">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Liste des catégories -->
                    <div class="filter-group">
                        <div class="filter-group-title">
                            <span>Catégories</span>
                        </div>
                        <div class="category-options-list">
                            <label class="cat-option-label {{ !request('category') ? 'active' : '' }}">
                                <div class="cat-option-left">
                                    <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }} onchange="window.performShopLiveFilter ? window.performShopLiveFilter() : this.form.submit()">
                                    <i class="fa-solid fa-circle-check"
                                        @style(['color: var(--shop-primary)'=> !request('category'), 'color: transparent' => request('category')])></i>
                                    <span>Toutes les catégories</span>
                                </div>
                                <span class="cat-option-badge">{{ $totalProductsCount ?? count($produits) }}</span>
                            </label>

                            @foreach($categories as $cat)
                            <label class="cat-option-label {{ request('category') === $cat->categorie ? 'active' : '' }}">
                                <div class="cat-option-left">
                                    <input type="radio" name="category" value="{{ $cat->categorie }}"
                                        {{ request('category') === $cat->categorie ? 'checked' : '' }}
                                        onchange="window.performShopLiveFilter ? window.performShopLiveFilter() : this.form.submit()">

                                    <span>{{ $cat->categorie }}</span>
                                </div>
                                @if(isset($cat->count))
                                <span class="cat-option-badge">{{ $cat->count }}</span>
                                @endif
                            </label>
                            @endforeach
                        </div>
                    </div>



                    <!-- Filtre par Prix (FCFA) -->
                    <div class="filter-group">
                        <div class="filter-group-title">
                            <span>Budget (FCFA)</span>
                        </div>
                        <div class="price-inputs-row">
                            <div class="price-input-wrapper">
                                <input type="number" name="min_price" id="minPriceInput"
                                    value="{{ request('min_price') }}"
                                    placeholder="Min ({{ number_format($minPriceDb ?? 0, 0, ',', ' ') }})" min="0">
                            </div>
                            <span class="price-separator">-</span>
                            <div class="price-input-wrapper">
                                <input type="number" name="max_price" id="maxPriceInput"
                                    value="{{ request('max_price') }}"
                                    placeholder="Max ({{ number_format($maxPriceDb ?? 200000, 0, ',', ' ') }})" min="0">
                            </div>
                        </div>

                        <!-- Presets de prix rapides -->
                        <div class="price-presets">
                            <button type="button" class="price-preset-chip" data-min="0" data-max="20000">&lt; 20k F</button>
                            <button type="button" class="price-preset-chip" data-min="20000" data-max="50000">20k - 50k F</button>
                            <button type="button" class="price-preset-chip" data-min="50000" data-max="100000">50k - 100k F</button>
                            <button type="button" class="price-preset-chip" data-min="100000" data-max="500000">&gt; 100k F</button>
                        </div>
                    </div>

                    <!-- Disponibilité En stock -->
                    <div class="filter-group">
                        <label class="availability-toggle">
                            <span><i class="fa-solid fa-circle-check"></i> En stock uniquement</span>
                            <span class="switch">
                                <input type="checkbox" name="in_stock" value="1" {{ request('in_stock') == '1' ? 'checked' : '' }} onchange="window.performShopLiveFilter ? window.performShopLiveFilter() : this.form.submit()">
                                <span class="slider"></span>
                            </span>
                        </label>
                    </div>

                    <!-- Bouton Appliquer -->
                    <button type="submit" class="btn-apply-filters">
                        <i class="fa-solid fa-filter"></i> Appliquer les filtres
                    </button>
                </form>

                <!-- Concierge / Aide Card -->
                <div class="sidebar-concierge">
                    <h5><i class="fa-solid fa-headset"></i> Service Client Luxe</h5>
                    <p>Un doute sur une taille ou un modèle ? Nos conseillers sont à votre écoute 7j/7.</p>
                    <a href="{{ route('contact') }}">
                        <i class="fa-solid fa-envelope"></i> Nous contacter
                    </a>
                </div>
            </div>
        </aside>



        <!-- 5. SHOP CONTENT & PRODUCTS -->
        <main class="shop-content">

            <!-- Toolbar & Controls -->
            <div class="shop-toolbar-card">
                <div class="toolbar-left">
                    @php
                        $activeFiltersCount = (request('category') ? 1 : 0) + (request('search') ? 1 : 0) + (request('min_price') ? 1 : 0) + (request('max_price') ? 1 : 0) + (request('in_stock') ? 1 : 0);
                    @endphp
                    <button type="button" class="btn-mobile-filters" id="openDrawerBtn" aria-label="Ouvrir les filtres">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Filtres</span>
                        @if($activeFiltersCount > 0)
                        <span class="active-filter-badge">{{ $activeFiltersCount }}</span>
                        @endif
                    </button>

                    <div class="results-count-text">
                        @if($produits->total() > 0)
                        Affichage de <strong>{{ $produits->firstItem() }}&ndash;{{ $produits->lastItem() }}</strong> sur <strong>{{ $produits->total() }}</strong> articles
                        @else
                        <strong>0</strong> article trouvé
                        @endif
                    </div>
                </div>

                <div class="toolbar-right">

                    <!-- Nombre d'articles par page -->
                    <div class="per-page-wrapper">
                        <label for="perPageSelect" class="sort-label">Afficher :</label>
                        <select id="perPageSelect" class="sort-select-custom" style="padding: 0.55rem 0.85rem;">
                            <option value="6" {{ request('per_page') == 6 ? 'selected' : '' }}>6</option>
                            <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                            <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                            <option value="36" {{ request('per_page') == 36 ? 'selected' : '' }}>36</option>
                        </select>
                    </div>

                    <!-- Tri des produits -->
                    <div class="sort-wrapper">
                        <label for="sortSelect" class="sort-label">Trier par :</label>
                        <select id="sortSelect" class="sort-select-custom">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Plus récents</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom : A à Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nom : Z à A</option>
                        </select>
                    </div>

                    <!-- Bascule Grille / Liste -->
                    <div class="view-switcher" aria-label="Mode d'affichage">
                        <button type="button" class="view-btn active" id="btnViewGrid" title="Affichage Grille">
                            <i class="fa-solid fa-grip"></i>
                        </button>
                        <button type="button" class="view-btn" id="btnViewList" title="Affichage Liste">
                            <i class="fa-solid fa-list-ul"></i>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Active Filter Chips (if any filter is applied) -->
            @if(request('category') || request('search') || request('min_price') || request('max_price') || request('in_stock'))
            <div class="active-filters-chips">
                <span style="font-size: 0.85rem; font-weight: 600; color: var(--shop-dark); margin-right: 0.5rem;">Filtres actifs :</span>

                @if(request('category'))
                <span class="active-filter-tag">
                    <i class="fa-solid fa-tag"></i> {{ request('category') }}
                    <a href="{{ route('products.index', request()->except('category')) }}" title="Supprimer ce filtre"><i class="fa-solid fa-xmark"></i></a>
                </span>
                @endif

                @if(request('search'))
                <span class="active-filter-tag">
                    <i class="fa-solid fa-magnifying-glass"></i> "{{ request('search') }}"
                    <a href="{{ route('products.index', request()->except('search')) }}" title="Supprimer la recherche"><i class="fa-solid fa-xmark"></i></a>
                </span>
                @endif

                @if(request('min_price') || request('max_price'))
                <span class="active-filter-tag">
                    <i class="fa-solid fa-coins"></i>
                    {{ request('min_price') ? number_format(request('min_price'), 0, ',', ' ') : '0' }} -
                    {{ request('max_price') ? number_format(request('max_price'), 0, ',', ' ') : '∞' }} FCFA
                    <a href="{{ route('products.index', request()->except(['min_price', 'max_price'])) }}" title="Supprimer le filtre de prix"><i class="fa-solid fa-xmark"></i></a>
                </span>
                @endif

                @if(request('in_stock'))
                <span class="active-filter-tag">
                    <i class="fa-solid fa-box"></i> En stock uniquement
                    <a href="{{ route('products.index', request()->except('in_stock')) }}" title="Supprimer ce filtre"><i class="fa-solid fa-xmark"></i></a>
                </span>
                @endif

                <a href="{{ route('products.index') }}" class="clear-all-tag">
                    <i class="fa-solid fa-trash-can"></i> Effacer tout
                </a>
            </div>
            @endif

            <!-- 6. PRODUCTS LIST OR EMPTY STATE (Dynamique avec Live Search) -->
            <div id="shopProductsContainer" class="shop-products-container" style="transition: opacity 0.2s ease;">
                @include('produits.partials.products_grid')
            </div>

        </main>
    </div>

    <!-- 6. BOUTON FLOTTANT FILTRES (Mobile & Tablette) -->
    <button type="button" class="floating-mobile-filter-btn" id="floatingFilterBtn" aria-label="Ouvrir les filtres">
        <i class="fa-solid fa-sliders"></i>
        <span>Filtres</span>
        @if(isset($activeFiltersCount) && $activeFiltersCount > 0)
        <span class="active-filter-badge">{{ $activeFiltersCount }}</span>
        @endif
    </button>
</div>
@endsection




@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========================================================
        // 1. RECHERCHE EN DIRECT (LIVE SEARCH EN TEMPS RÉEL)
        // ========================================================
        const searchInput       = document.getElementById('sidebar-search-input');
        const searchClearBtn   = document.getElementById('searchClearBtn');
        const searchStaticIcon = document.getElementById('searchStaticIcon');
        const searchLoadingIcon= document.getElementById('searchLoadingIcon');
        const productsContainer= document.getElementById('shopProductsContainer');
        const resultsCountEl   = document.querySelector('.results-count-text');
        const shopFilterForm   = document.getElementById('shopFilterForm');
        const sortSelect       = document.getElementById('sortSelect');
        const formSortInput    = document.getElementById('form-sort-input');
        const perPageSelect    = document.getElementById('perPageSelect');
        const formPerPageInput = document.getElementById('form-per-page-input');

        let searchDebounceTimer = null;
        let currentAbortController = null;

        function performLiveSearch(urlOverride = null) {
            if (!productsContainer) return;

            // Afficher le loader dans l'input de recherche
            if (searchStaticIcon && searchLoadingIcon) {
                searchStaticIcon.style.display = 'none';
                searchLoadingIcon.style.display = 'block';
            }
            productsContainer.style.opacity = '0.5';

            // Annuler la requête précédente si elle est encore en cours
            if (currentAbortController) {
                currentAbortController.abort();
            }
            currentAbortController = new AbortController();

            // Construire l'URL avec tous les filtres actifs du formulaire
            let targetUrl = urlOverride;
            if (!targetUrl && shopFilterForm) {
                const formData = new FormData(shopFilterForm);
                const params = new URLSearchParams();
                for (const [key, val] of formData.entries()) {
                    if (val !== null && val !== undefined && val.toString().trim() !== '') {
                        params.append(key, val);
                    }
                }
                targetUrl = `${shopFilterForm.action}?${params.toString()}`;
            }

            fetch(targetUrl, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-Live-Search': '1',
                    'Accept': 'application/json'
                },
                signal: currentAbortController.signal
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Injecter le nouveau HTML des cartes de la galerie
                    productsContainer.innerHTML = data.html;
                    productsContainer.style.opacity = '1';

                    // Mettre à jour le texte du compteur d'articles
                    if (resultsCountEl) {
                        if (data.total > 0) {
                            resultsCountEl.innerHTML = `Affichage de <strong>${data.firstItem}&ndash;${data.lastItem}</strong> sur <strong>${data.total}</strong> articles`;
                        } else {
                            resultsCountEl.innerHTML = `<strong>0</strong> article trouvé`;
                        }
                    }

                    // Respecter la vue choisie (Grille vs Liste)
                    const currentGrid = document.getElementById('productsGrid');
                    if (currentGrid && btnViewList && btnViewList.classList.contains('active')) {
                        currentGrid.classList.add('view-list');
                    }

                    // Rejouer l'animation d'apparition des cartes
                    replayCardAnimations();

                    // Mettre à jour discrètement l'URL sans rechargement de page
                    window.history.replaceState(null, '', targetUrl);
                }
            })
            .catch(err => {
                if (err.name !== 'AbortError') {
                    console.error('Erreur live search:', err);
                    productsContainer.style.opacity = '1';
                }
            })
            .finally(() => {
                if (searchStaticIcon && searchLoadingIcon) {
                    searchLoadingIcon.style.display = 'none';
                    searchStaticIcon.style.display = 'block';
                }
                if (searchClearBtn && searchInput) {
                    searchClearBtn.style.display = searchInput.value.trim() ? 'block' : 'none';
                }
            });
        }

        // Exposer globalement pour les déclencheurs (onchange des radios / checkbox)
        window.performShopLiveFilter = function() {
            performLiveSearch();
        };

        if (searchInput) {
            // Saisie en direct au fil de la frappe
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                if (searchClearBtn) {
                    searchClearBtn.style.display = query ? 'block' : 'none';
                }

                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(() => {
                    performLiveSearch();
                }, 200); // 200ms de réactivité
            });

            // Si l'utilisateur appuie sur Entrée, recherche en direct sans recharger
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(searchDebounceTimer);
                    performLiveSearch();
                }
            });
        }

        // Synchronisation si le champ recherche de la navbar globale est utilisé sur la page boutique
        const globalSearchInput = document.querySelector('.global-search-form input[name="search"]');
        if (globalSearchInput) {
            globalSearchInput.addEventListener('input', function() {
                if (searchInput) searchInput.value = this.value;
                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(() => {
                    performLiveSearch();
                }, 200);
            });
        }

        if (shopFilterForm) {
            shopFilterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                clearTimeout(searchDebounceTimer);
                performLiveSearch();
            });
        }

        if (searchClearBtn && searchInput) {
            searchClearBtn.addEventListener('click', function() {
                searchInput.value = '';
                searchClearBtn.style.display = 'none';
                performLiveSearch();
                searchInput.focus();
            });
        }

        // ========================================================
        // 2. GESTION DU TRI (SORT) & ARTICLES PAR PAGE
        // ========================================================
        if (sortSelect && shopFilterForm) {
            sortSelect.addEventListener('change', function() {
                if (formSortInput) formSortInput.value = this.value;
                performLiveSearch();
            });
        }

        if (perPageSelect && shopFilterForm) {
            perPageSelect.addEventListener('change', function() {
                if (formPerPageInput) formPerPageInput.value = this.value;
                performLiveSearch();
            });
        }

        // ========================================================
        // 3. PRESETS DE PRIX RAPIDES
        // ========================================================
        const presetChips = document.querySelectorAll('.price-preset-chip');
        const minPriceInput = document.getElementById('minPriceInput');
        const maxPriceInput = document.getElementById('maxPriceInput');

        presetChips.forEach(chip => {
            chip.addEventListener('click', function() {
                const minVal = this.getAttribute('data-min');
                const maxVal = this.getAttribute('data-max');

                if (minPriceInput) minPriceInput.value = minVal;
                if (maxPriceInput) maxPriceInput.value = maxVal;

                performLiveSearch();
            });
        });

        // ========================================================
        // 4. BASCULE AFFICHAGE GRILLE / LISTE
        // ========================================================
        const btnViewGrid = document.getElementById('btnViewGrid');
        const btnViewList = document.getElementById('btnViewList');

        // Charger préférence depuis localStorage
        const savedView = localStorage.getItem('luxecart_shop_view');
        const initialProductsGrid = document.getElementById('productsGrid');
        if (savedView === 'list' && initialProductsGrid && btnViewList && btnViewGrid) {
            initialProductsGrid.classList.add('view-list');
            btnViewList.classList.add('active');
            btnViewGrid.classList.remove('active');
        }

        function replayCardAnimations() {
            const cards = document.querySelectorAll('.luxury-product-card');
            cards.forEach(card => {
                card.style.animation = 'none';
                void card.offsetHeight;
                card.style.animation = '';
            });
        }

        if (btnViewGrid && btnViewList) {
            btnViewGrid.addEventListener('click', function() {
                const grid = document.getElementById('productsGrid');
                if (grid && grid.classList.contains('view-list')) {
                    grid.classList.remove('view-list');
                    btnViewGrid.classList.add('active');
                    btnViewList.classList.remove('active');
                    localStorage.setItem('luxecart_shop_view', 'grid');
                    replayCardAnimations();
                }
            });

            btnViewList.addEventListener('click', function() {
                const grid = document.getElementById('productsGrid');
                if (grid && !grid.classList.contains('view-list')) {
                    grid.classList.add('view-list');
                    btnViewList.classList.add('active');
                    btnViewGrid.classList.remove('active');
                    localStorage.setItem('luxecart_shop_view', 'list');
                    replayCardAnimations();
                }
            });
        }

        // ========================================================
        // 5. CLICS DÉLÉGUÉS : SUGGESTIONS, RESET & PAGINATION AJAX
        // ========================================================
        document.addEventListener('click', function(e) {
            // Suggestion de recherche dans l'état vide
            const suggestBtn = e.target.closest('.btn-suggest-search');
            if (suggestBtn && searchInput) {
                e.preventDefault();
                searchInput.value = suggestBtn.getAttribute('data-term');
                performLiveSearch();
            }

            // Bouton réinitialiser recherche dans l'état vide
            const resetBtn = e.target.closest('#btnResetSearchAjax');
            if (resetBtn && searchInput) {
                e.preventDefault();
                searchInput.value = '';
                performLiveSearch();
            }

            // Pagination Ajax sans rechargement de page
            const paginationLink = e.target.closest('.shop-pagination-container a.page-link');
            if (paginationLink) {
                e.preventDefault();
                performLiveSearch(paginationLink.href);
                const mainShop = document.querySelector('.shop-main-layout');
                if (mainShop) {
                    mainShop.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });

        // ========================================================
        // 6. DRAWER MOBILE FILTRES
        // ========================================================
        const openDrawerBtn = document.getElementById('openDrawerBtn');
        const floatingFilterBtn = document.getElementById('floatingFilterBtn');
        const closeDrawerBtn = document.getElementById('closeDrawerBtn');
        const shopSidebar = document.getElementById('shopSidebar');
        const filterDrawerBackdrop = document.getElementById('filterDrawerBackdrop');

        function openDrawer() {
            if (shopSidebar && filterDrawerBackdrop) {
                shopSidebar.classList.add('drawer-open');
                filterDrawerBackdrop.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeDrawer() {
            if (shopSidebar && filterDrawerBackdrop) {
                shopSidebar.classList.remove('drawer-open');
                filterDrawerBackdrop.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        if (openDrawerBtn) openDrawerBtn.addEventListener('click', openDrawer);
        if (floatingFilterBtn) floatingFilterBtn.addEventListener('click', openDrawer);
        if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);
        if (filterDrawerBackdrop) filterDrawerBackdrop.addEventListener('click', closeDrawer);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (shopSidebar && shopSidebar.classList.contains('drawer-open')) closeDrawer();
            }
        });

    });
</script>
@endpush