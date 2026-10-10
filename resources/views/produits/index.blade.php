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
       1. HERO HEADER BANNER WITH IMAGE
       ======================================================== */
    .shop-hero-banner {
        position: relative;
        background-color: #0b0f19;
        background-size: cover;
        background-position: center 35%;
        background-repeat: no-repeat;
        color: #ffffff;
        padding: 4.5rem 1.5rem 3.5rem;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .shop-hero-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.25) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(245, 158, 11, 0.18) 0%, transparent 40%),
                    radial-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px);
        background-size: auto, auto, 24px 24px;
        pointer-events: none;
    }

    .shop-hero-inner {
        max-width: 1240px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .shop-hero-grid {
        display: grid;
        grid-template-columns: 1.25fr 0.75fr;
        gap: 3.5rem;
        align-items: center;
    }

    .shop-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.5rem 1.2rem;
        border-radius: var(--shop-radius-full);
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #fbbf24;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .shop-hero-title {
        font-family: var(--font-outfit);
        font-size: 3.3rem;
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 0.9rem;
        color: #ffffff;
    }

    .shop-hero-title span {
        background: linear-gradient(135deg, #a5b4fc 0%, #818cf8 50%, #fcd34d 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .shop-hero-subtitle {
        font-size: 1.15rem;
        color: #e2e8f0;
        max-width: 620px;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    /* Trust highlights */
    .shop-highlights {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: var(--shop-radius-lg);
        padding: 1.2rem 1.6rem;
    }

    .highlight-item {
        display: flex;
        align-items: center;
        gap: 0.9rem;
    }

    .highlight-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(99, 102, 241, 0.25);
        color: #a5b4fc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .highlight-text h5 {
        font-size: 0.92rem;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 0.15rem;
    }

    .highlight-text p {
        font-size: 0.78rem;
        color: #94a3b8;
        margin: 0;
    }

    /* Hero Visual Card (Right side) */
    .shop-hero-visual {
        position: relative;
    }

    .hero-image-card {
        position: relative;
        border-radius: 28px;
        overflow: hidden;
        height: 330px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.18);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.4s ease;
    }

    .hero-image-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 30px 60px -10px rgba(99, 102, 241, 0.35), 0 0 0 1px rgba(255, 255, 255, 0.3);
    }

    .hero-image-card img.hero-main-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .hero-image-card:hover img.hero-main-img {
        transform: scale(1.08);
    }

    .hero-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(11, 15, 25, 0.95) 0%, rgba(11, 15, 25, 0.4) 60%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.8rem;
    }

    .hero-image-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.35rem 0.85rem;
        border-radius: var(--shop-radius-full);
        background: rgba(245, 158, 11, 0.92);
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        width: fit-content;
        margin-bottom: 0.6rem;
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.35);
    }

    .hero-image-overlay h4 {
        font-family: var(--font-outfit);
        font-size: 1.4rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.25rem;
    }

    .hero-image-overlay p {
        font-size: 0.88rem;
        color: #cbd5e1;
        margin: 0;
    }

    /* ========================================================
       2. HORIZONTAL CATEGORY PILLS BAR
       ======================================================== */
    .category-pills-bar {
        max-width: 1240px;
        margin: -1.8rem auto 2.5rem;
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

    .filter-search-box input:not(:placeholder-shown) + .search-icon + .search-clear {
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
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }

    input:checked + .slider {
        background-color: var(--shop-primary);
    }

    input:checked + .slider:before {
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
        gap: 0.5rem;
        padding: 0.65rem 1.2rem;
        border-radius: var(--shop-radius-md);
        background: var(--shop-primary);
        color: #ffffff;
        border: none;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);
    }

    .btn-mobile-filters .active-filter-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #fbbf24;
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
       6. PRODUCTS GRID & CARDS
       ======================================================== */
    .shop-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
        gap: 1.8rem;
        transition: var(--shop-transition);
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
        transition: var(--shop-transition);
        position: relative;
    }

    .luxury-product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shop-card-shadow-hover);
        border-color: rgba(99, 102, 241, 0.3);
    }

    /* Card Image Area */
    .card-media {
        position: relative;
        width: 100%;
        padding-top: 100%; /* 1:1 Square */
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
        padding: 0.65rem 1.1rem;
        border-radius: var(--shop-radius-md);
        background: var(--shop-primary);
        color: #ffffff;
        border: none;
        font-size: 0.88rem;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--shop-transition);
    }

    .btn-card-cart:hover {
        background: var(--shop-primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);
    }

    .btn-card-cart:disabled {
        background: #cbd5e1;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
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
        width: 260px;
        min-width: 260px;
        padding-top: 0;
        height: auto;
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
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 9998;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .filter-drawer-backdrop.active {
        opacity: 1;
        visibility: visible;
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

        .shop-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 320px;
            max-width: 85vw;
            background: #ffffff;
            z-index: 9999;
            transform: translateX(-100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.2);
        }

        .shop-sidebar.drawer-open {
            transform: translateX(0);
        }

        .shop-sidebar-card {
            border: none;
            border-radius: 0;
            box-shadow: none;
            padding: 1.5rem;
            position: static;
        }

        .drawer-close-btn {
            display: inline-flex !important;
        }
    }

    .drawer-close-btn {
        display: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--shop-gray-light);
        border: 1px solid var(--shop-border);
        color: var(--shop-dark);
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        .shop-hero-banner {
            padding: 3rem 1rem 2.5rem;
        }

        .shop-hero-title {
            font-size: 2.2rem;
        }

        .shop-hero-subtitle {
            font-size: 1rem;
            margin-bottom: 1.5rem;
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
        }
    }
</style>
@endpush

@section('content')
<div class="shop-wrapper">

    <!-- 1. HERO HEADER BANNER WITH IMAGE -->
   <header class="shop-hero-banner" style="background-image: linear-gradient(135deg, rgba(11, 15, 25, 0.92) 0%, rgba(15, 23, 42, 0.85) 45%, rgba(30, 27, 75, 0.80) 100%), url('{{ asset('images/shop_banner_3.png') }}');">
        <div class="shop-hero-inner">
            <div class="shop-hero-grid">
                <!-- Gauche : Titres et avantages -->
                <div class="shop-hero-text">
                    <div class="shop-hero-badge">
                        <i class="fa-solid fa-gem"></i> Catalogue LuxeCart Officiel
                    </div>
                    <h1 class="shop-hero-title">
                        Boutique & <span>Collections Exclusives</span>
                    </h1>
                    <p class="shop-hero-subtitle">
                        Explorez notre sélection de {{ $totalProductsCount ?? count($produits) }} pièces d'exception : prêt-à-porter de créateurs, électronique premium et maroquinerie raffinée.
                    </p>

                    <!-- Trust Highlights -->
                    <div class="shop-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div class="highlight-text">
                                <h5>Livraison Express</h5>
                                <p>Abidjan 24h & Intérieur 48h</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div class="highlight-text">
                                <h5>100% Authentique</h5>
                                <p>Qualité certifiée garantie</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fa-solid fa-rotate-left"></i>
                            </div>
                            <div class="highlight-text">
                                <h5>Retours Facilités</h5>
                                <p>Sous 14 jours d'échange</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Droite : Carte visuelle mise en avant -->
                <div class="shop-hero-visual">
                    <div class="hero-image-card">
                        <img src="{{ asset('images/shop_banner_3.png') }}" alt="Maison & Haute Maroquinerie LuxeCart" class="hero-main-img">
                        <div class="hero-image-overlay">
                            <span class="hero-image-badge"><i class="fa-solid fa-sparkles"></i> Sélection Prestige</span>
                            <h4>Maison & Maroquinerie</h4>
                            <p>Des créations haut de gamme pour sublimer votre style</p>
                        </div>
                    </div>
                </div>
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

        <!-- Backdrop for mobile drawer -->
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
                    <!-- Preserve sort value in form -->
                    <input type="hidden" name="sort" id="form-sort-input" value="{{ request('sort', 'latest') }}">

                    <!-- Recherche Directe -->
                    <div class="filter-group">
                        <div class="filter-group-title">
                            <span>Recherche</span>
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 0.8rem; color: var(--shop-text-muted);"></i>
                        </div>
                        <div class="filter-search-box">
                            <input type="text" name="search" id="sidebar-search-input"
                                   value="{{ request('search') }}"
                                   placeholder="Nom, marque, mot-clé...">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <button type="button" class="search-clear" id="searchClearBtn" aria-label="Effacer la recherche">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Catégories List -->
                    <div class="filter-group">
                        <div class="filter-group-title">
                            <span>Catégories</span>
                        </div>
                        <div class="category-options-list">
                            <label class="cat-option-label {{ !request('category') ? 'active' : '' }}">
                                <div class="cat-option-left">
                                    <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }} onchange="this.form.submit()">
                                    <i class="fa-solid fa-circle-check" style="color: {{ !request('category') ? 'var(--shop-primary)' : 'transparent' }};"></i>
                                    <span>Toutes les catégories</span>
                                </div>
                                <span class="cat-option-badge">{{ $totalProductsCount ?? count($produits) }}</span>
                            </label>

                            @foreach($categories as $cat)
                                <label class="cat-option-label {{ request('category') === $cat->categorie ? 'active' : '' }}">
                                    <div class="cat-option-left">
                                        <input type="radio" name="category" value="{{ $cat->categorie }}"
                                               {{ request('category') === $cat->categorie ? 'checked' : '' }}
                                               onchange="this.form.submit()">
                                        <i class="fa-solid fa-circle-check" style="color: {{ request('category') === $cat->categorie ? 'var(--shop-primary)' : 'transparent' }};"></i>
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
                                <input type="checkbox" name="in_stock" value="1" {{ request('in_stock') == '1' ? 'checked' : '' }} onchange="this.form.submit()">
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
                    <button type="button" class="btn-mobile-filters" id="openDrawerBtn">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Filtres</span>
                        @if(request('category') || request('search') || request('min_price') || request('max_price') || request('in_stock'))
                            <span class="active-filter-dot"></span>
                        @endif
                    </button>

                    <div class="results-count-text">
                        Affichage de <strong>{{ count($produits) }}</strong> @if(isset($totalProductsCount)) sur {{ $totalProductsCount }} @endif produits
                    </div>
                </div>

                <div class="toolbar-right">
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

                    <!-- Mode Grille / Liste -->
                    <div class="view-switcher" role="group" aria-label="Mode d'affichage">
                        <button type="button" class="view-btn active" id="btnViewGrid" title="Vue Grille">
                            <i class="fa-solid fa-table-cells-large"></i>
                        </button>
                        <button type="button" class="view-btn" id="btnViewList" title="Vue Liste">
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

            <!-- 6. PRODUCTS LIST OR EMPTY STATE -->
            @if(count($produits) > 0)
                <div class="shop-products-grid" id="productsGrid">
                    @foreach($produits as $produit)
                        <article class="luxury-product-card" id="product-{{ $produit->id }}">
                            <!-- Media / Image -->
                            <div class="card-media">
                                <a href="{{ route('products.show', $produit->id) }}" class="card-image-link" aria-label="Voir le produit {{ $produit->nom }}">
                                    <img src="{{ asset($produit->image ?? 'images/placeholder-product.jpg') }}"
                                         alt="{{ $produit->nom }}"
                                         loading="lazy">
                                </a>

                                <!-- Badges -->
                                <span class="badge-category">{{ $produit->categorie }}</span>

                                @if($produit->stock > 5)
                                    <span class="badge-stock in-stock"><i class="fa-solid fa-circle-check"></i> En stock</span>
                                @elseif($produit->stock > 0)
                                    <span class="badge-stock low-stock"><i class="fa-solid fa-bolt"></i> Plus que {{ $produit->stock }}</span>
                                @else
                                    <span class="badge-stock out-stock"><i class="fa-solid fa-circle-xmark"></i> Épuisé</span>
                                @endif

                                <!-- Quick Actions Overlay on Hover -->
                                <div class="card-hover-actions">
                                    <button type="button" class="btn-quick-view btn-preview-product" data-id="{{ $produit->id }}" title="Aperçu rapide">
                                        <i class="fa-regular fa-eye"></i> Aperçu rapide
                                    </button>
                                    <button type="button" class="btn-wishlist btn-heart-toggle" data-id="{{ $produit->id }}" title="Ajouter aux favoris">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="card-content">
                                <div class="card-meta-line">
                                    <span class="card-category-sub">{{ $produit->categorie }}</span>
                                    <div class="card-rating" title="Note 5 étoiles">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <span>5.0</span>
                                    </div>
                                </div>

                                <h3 class="card-title">
                                    <a href="{{ route('products.show', $produit->id) }}">{{ $produit->nom }}</a>
                                </h3>

                                <p class="card-description">
                                    {{ Str::limit($produit->description, 95) }}
                                </p>

                                <div class="card-footer-box">
                                    <div class="card-price-group">
                                        <span class="card-price-label">Prix unitaire</span>
                                        <span class="card-price-val">
                                            {{ number_format($produit->prix, 0, ',', ' ') }}
                                            <span class="card-price-currency">FCFA</span>
                                        </span>
                                    </div>

                                    @if($produit->stock > 0)
                                        <button type="button"
                                                class="btn-card-cart add-to-cart"
                                                data-id="{{ $produit->id }}"
                                                id="add-{{ $produit->id }}"
                                                title="Ajouter au panier">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            <span>Ajouter</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn-card-cart" disabled>
                                            <i class="fa-solid fa-ban"></i>
                                            <span>Épuisé</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- 8. EMPTY STATE -->
                <div class="shop-empty-state">
                    <div class="empty-state-icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <h3>Aucun article ne correspond à votre recherche</h3>
                    <p>
                        Nous n'avons trouvé aucun résultat avec vos critères actuels. Essayez de réinitialiser vos filtres ou d'explorer nos suggestions populaires.
                    </p>
                    <a href="{{ route('products.index') }}" class="btn-apply-filters" style="display: inline-flex; width: auto; padding: 0.85rem 2rem;">
                        <i class="fa-solid fa-rotate-left"></i> Voir tous les articles disponibles
                    </a>

                    <div class="empty-suggestions">
                        <span>Recherches populaires :</span>
                        <a href="{{ route('products.index', ['search' => 'Montre']) }}" class="suggest-chip">Montres</a>
                        <a href="{{ route('products.index', ['search' => 'Chaussure']) }}" class="suggest-chip">Chaussures</a>
                        <a href="{{ route('products.index', ['search' => 'Mixeur']) }}" class="suggest-chip">Blender</a>
                        <a href="{{ route('products.index', ['search' => 'Pull']) }}" class="suggest-chip">Vêtements</a>
                        <a href="{{ route('products.index', ['category' => 'Électronique']) }}" class="suggest-chip">Électronique</a>
                    </div>
                </div>
            @endif

        </main>
    </div>
</div>
@endsection




@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. GESTION DU TRI (SORT)
        const sortSelect = document.getElementById('sortSelect');
        const shopFilterForm = document.getElementById('shopFilterForm');
        const formSortInput = document.getElementById('form-sort-input');

        if (sortSelect && shopFilterForm) {
            sortSelect.addEventListener('change', function () {
                if (formSortInput) {
                    formSortInput.value = this.value;
                }
                shopFilterForm.submit();
            });
        }

        // 2. CLEAR BUTTON POUR LA RECHERCHE
        const searchInput = document.getElementById('sidebar-search-input');
        const searchClearBtn = document.getElementById('searchClearBtn');

        if (searchInput && searchClearBtn) {
            searchClearBtn.addEventListener('click', function () {
                searchInput.value = '';
                shopFilterForm.submit();
            });
        }

        // 3. PRESETS DE PRIX RAPIDES
        const presetChips = document.querySelectorAll('.price-preset-chip');
        const minPriceInput = document.getElementById('minPriceInput');
        const maxPriceInput = document.getElementById('maxPriceInput');

        presetChips.forEach(chip => {
            chip.addEventListener('click', function () {
                const minVal = this.getAttribute('data-min');
                const maxVal = this.getAttribute('data-max');

                if (minPriceInput) minPriceInput.value = minVal;
                if (maxPriceInput) maxPriceInput.value = maxVal;

                if (shopFilterForm) {
                    shopFilterForm.submit();
                }
            });
        });

        // 4. BASCULE AFFICHAGE GRILLE / LISTE
        const btnViewGrid = document.getElementById('btnViewGrid');
        const btnViewList = document.getElementById('btnViewList');
        const productsGrid = document.getElementById('productsGrid');

        // Charger préférence depuis localStorage
        const savedView = localStorage.getItem('luxecart_shop_view');
        if (savedView === 'list' && productsGrid && btnViewList && btnViewGrid) {
            productsGrid.classList.add('view-list');
            btnViewList.classList.add('active');
            btnViewGrid.classList.remove('active');
        }

        if (btnViewGrid && btnViewList && productsGrid) {
            btnViewGrid.addEventListener('click', function () {
                productsGrid.classList.remove('view-list');
                btnViewGrid.classList.add('active');
                btnViewList.classList.remove('active');
                localStorage.setItem('luxecart_shop_view', 'grid');
            });

            btnViewList.addEventListener('click', function () {
                productsGrid.classList.add('view-list');
                btnViewList.classList.add('active');
                btnViewGrid.classList.remove('active');
                localStorage.setItem('luxecart_shop_view', 'list');
            });
        }

        // 5. DRAWER MOBILE FILTRES
        const openDrawerBtn = document.getElementById('openDrawerBtn');
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
        if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);
        if (filterDrawerBackdrop) filterDrawerBackdrop.addEventListener('click', closeDrawer);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && shopSidebar && shopSidebar.classList.contains('drawer-open')) {
                closeDrawer();
            }
        });

        // 6. APERÇU RAPIDE MODAL
        const previewBtns = document.querySelectorAll('.btn-preview-product');
        previewBtns.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const productId = this.getAttribute('data-id');
                if (typeof window.openProductModal === 'function') {
                    window.openProductModal(productId);
                } else {
                    const parentCard = this.closest('.luxury-product-card');
                    if (parentCard) {
                        const link = parentCard.querySelector('a.card-image-link');
                        if (link) link.click();
                    }
                }
            });
        });

        // 7. WISHLIST TOGGLE (Micro-interaction)
        const wishlistBtns = document.querySelectorAll('.btn-heart-toggle');
        let wishlist = JSON.parse(localStorage.getItem('luxecart_wishlist') || '[]');

        wishlistBtns.forEach(btn => {
            const id = btn.getAttribute('data-id');
            const icon = btn.querySelector('i');
            if (wishlist.includes(id)) {
                btn.classList.add('active');
                if (icon) {
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid');
                }
            }

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const prodId = this.getAttribute('data-id');
                const heartIcon = this.querySelector('i');

                if (wishlist.includes(prodId)) {
                    wishlist = wishlist.filter(x => x !== prodId);
                    this.classList.remove('active');
                    if (heartIcon) {
                        heartIcon.classList.remove('fa-solid');
                        heartIcon.classList.add('fa-regular');
                    }
                } else {
                    wishlist.push(prodId);
                    this.classList.add('active');
                    if (heartIcon) {
                        heartIcon.classList.remove('fa-regular');
                        heartIcon.classList.add('fa-solid');
                    }
                }
                localStorage.setItem('luxecart_wishlist', JSON.stringify(wishlist));
            });
        });
    });
</script>
@endpush