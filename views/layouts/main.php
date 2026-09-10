<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="<?= e($active_theme ?? \App\Models\Setting::getActiveTheme()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Early Theme Initializer to prevent visual flash -->
    <script>
        (function() {
            try {
                const params = new URLSearchParams(window.location.search);
                let t = params.get('theme');
                if (t) {
                    t = t.toLowerCase();
                    if (t === 'dark' || t === 'yellow' || t === 'gold') t = 'dark-yellow';
                    if (['green', 'dark-yellow', 'blue'].includes(t)) {
                        localStorage.setItem('gleam_theme', t);
                        document.cookie = "gleam_theme=" + t + "; path=/; max-age=31536000";
                    }
                }
                const saved = localStorage.getItem('gleam_theme') || '<?= e($active_theme ?? \App\Models\Setting::getActiveTheme()) ?>';
                document.documentElement.setAttribute('data-theme', saved);
            } catch(e) {}
        })();
    </script>

    <!-- Dynamic SEO Engine -->
    <?php
        $pageTitle = isset($seo_title) && !empty($seo_title) ? e($seo_title) . ' — Gleamrealty Private Office' : 'Gleamrealty — Luxury Real Estate & Estates | Vrindavan & Mathura';
        $pageDesc = isset($seo_description) && !empty($seo_description) ? e($seo_description) : 'Explore MVDA & RERA approved plotted communities, architectural villas, and luxury estates in Vrindavan and Mathura. 10+ years heritage, 3,000+ families.';
        $pageKeywords = isset($seo_keywords) && !empty($seo_keywords) ? e($seo_keywords) : 'Plots in Vrindavan, Luxury Villas, MVDA Approved, RERA Real Estate, Mathura Land for Sale';
        $rawUri = $_SERVER['REQUEST_URI'] ?? '/';
        $pathOnly = (string) parse_url($rawUri, PHP_URL_PATH);
        $appPath = trim((string) parse_url((string) env('APP_URL', 'http://localhost/Gleamrealty'), PHP_URL_PATH), '/');
        $cleanPath = trim($pathOnly, '/');
        if ($appPath !== '' && (str_starts_with($cleanPath, $appPath . '/') || $cleanPath === $appPath)) {
            $cleanPath = substr($cleanPath, strlen($appPath));
        }
        $canonicalUrl = isset($canonical_url) ? e($canonical_url) : url($cleanPath);
        $ogImage = isset($og_image) && !empty($og_image) ? media_url($og_image) : asset('uploads/projects/hero-preview.jpg');
        $isHome = ($cleanPath === '' || $cleanPath === 'home' || $cleanPath === '/');
    ?>

    <title><?= $pageTitle ?></title>
    <meta name="description" content="<?= $pageDesc ?>">
    <meta name="keywords" content="<?= $pageKeywords ?>">
    <link rel="canonical" href="<?= $canonicalUrl ?>">
    <meta name="robots" content="index, follow">

    <!-- OpenGraph / Social Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $canonicalUrl ?>">
    <meta property="og:title" content="<?= $pageTitle ?>">
    <meta property="og:description" content="<?= $pageDesc ?>">
    <meta property="og:image" content="<?= $ogImage ?>">
    <meta property="og:site_name" content="Gleamrealty Luxury Real Estate">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= $canonicalUrl ?>">
    <meta name="twitter:title" content="<?= $pageTitle ?>">
    <meta name="twitter:description" content="<?= $pageDesc ?>">
    <meta name="twitter:image" content="<?= $ogImage ?>">

    <!-- Typography: Playfair Display for elegant titles + Plus Jakarta Sans for body + Cormorant Garamond for editorial accents -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS 3.4+ CDN with custom palette -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        forest: {
                            DEFAULT: '#162C22',
                            deep: '#162C22',
                            hover: '#244536',
                            dark: '#0e1d16',
                            900: '#162C22',
                        },
                        sage: {
                            DEFAULT: '#5F826B',
                            muted: '#5F826B',
                            glow: '#CFE0D3',
                            border: '#E7EFE9',
                            50: '#F5F8F6',
                            100: '#E7EFE9',
                            200: '#CFE0D3',
                            300: '#A9C4B1',
                            500: '#5F826B',
                            600: '#4A6754',
                            900: '#162C22',
                        },
                        sand: {
                            DEFAULT: '#FAF9F6',
                            ivory: '#FAF9F6',
                            light: '#F5F8F6',
                        },
                        obsidian: {
                            DEFAULT: '#0B0B0B',
                            dark: '#070707',
                            surface: '#141414',
                            elevated: '#1A1A1A',
                            border: '#242424',
                        },
                        ivory: {
                            DEFAULT: '#F8F7F4',
                            sand: '#FAF9F6',
                            muted: '#D8D4CC',
                        },
                        gold: {
                            DEFAULT: '#C5A880',
                            light: '#E6D5B8',
                            dark: '#9E7E55',
                            glow: 'rgba(197, 168, 128, 0.15)',
                        },
                    },
                    fontFamily: {
                        serif: ['"Plus Jakarta Sans"', '-apple-system', 'sans-serif'],
                        sans: ['"Plus Jakarta Sans"', '-apple-system', 'sans-serif'],
                        editorial: ['"Plus Jakarta Sans"', '-apple-system', 'sans-serif'],
                    },
                    keyframes: {
                        'hero-fade-rise': {
                            '0%': { opacity: '0', transform: 'translateY(22px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    animation: {
                        'hero-fade-rise': 'hero-fade-rise 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    },
                    boxShadow: {
                        'frosted': '0 10px 30px rgba(22, 44, 34, 0.03)',
                        'lift': '0 12px 28px -6px rgba(22, 44, 34, 0.15)',
                    }
                }
            }
        }
    </script>

    <!-- Lenis Smooth Scroll, GSAP, and ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Prevent FOUC for Alpine.js elements */
        [x-cloak] {
            display: none !important;
        }

        /* Luxury Brand Page Preloader */
        #gleam-preloader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #0b1410;
            color: #FAF9F6;
            transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.5s ease;
            pointer-events: auto;
        }
        [data-theme="dark-yellow"] #gleam-preloader {
            background-color: #0B0F17;
        }
        [data-theme="blue"] #gleam-preloader {
            background-color: #08101E;
        }
        #gleam-preloader.preloader-fade {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }
        @keyframes gleamPulse {
            0%, 100% { transform: scale(1); opacity: 0.95; }
            50% { transform: scale(1.03); opacity: 1; }
        }
        @keyframes gleamShimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(250%); }
        }
        .animate-gleam-pulse {
            animation: gleamPulse 2s ease-in-out infinite;
        }
        .animate-gleam-shimmer {
            animation: gleamShimmer 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        /* ==========================================================
           MULTI-THEME COLOR ENGINE (3 CURATED LUXURY AESTHETICS)
           1) Light Green & White (Botanical Sanctuary)
           2) Dark Theme with Yellow (Obsidian Amber)
           3) Blue & White (Royal Azure / Maritime Luxury)
           ========================================================== */

        :root,
        [data-theme="green"] {
            --theme-name: 'green';
            --theme-bg-canvas: #FFFFFF;
            --theme-text-primary: #24431F;
            --theme-text-secondary: rgba(36, 67, 31, 0.78);
            --theme-text-muted: rgba(36, 67, 31, 0.55);
            --theme-hero-from: #FFFFFF;
            --theme-hero-via: #FAFBF9;
            --theme-hero-to: #F3F7F2;
            --theme-hero-glow: #CFE0D3;
            --theme-hero-glow-opacity: 0.40;
            --theme-badge-bg: #EBF3EA;
            --theme-badge-text: #628459;
            --theme-badge-dot: #24431F;
            --theme-badge-border: rgba(98, 132, 89, 0.3);
            --theme-title: #24431F;
            --theme-accent: #628459;
            --theme-accent-light: #CFE0D3;
            --theme-subtitle: rgba(36, 67, 31, 0.75);
            --theme-border-hairline: #E2EBE1;
            --theme-border-subtle: #CFE0D3;
            --theme-card-bg: rgba(255, 255, 255, 0.96);
            --theme-card-border: #E2EBE1;
            --theme-card-shadow: 0 10px 30px rgba(36, 67, 31, 0.05);
            --theme-metric-value: #24431F;
            --theme-metric-label: rgba(36, 67, 31, 0.65);
            --theme-btn-pri-bg: #24431F;
            --theme-btn-pri-text: #FFFFFF;
            --theme-btn-pri-hover: #1B3417;
            --theme-btn-sec-bg: #FFFFFF;
            --theme-btn-sec-text: #24431F;
            --theme-btn-sec-border: #CFE0D3;
            --theme-btn-sec-hover: #F3F7F2;
            --theme-header-bg: rgba(255, 255, 255, 0.80);
            --theme-header-scrolled-bg: rgba(255, 255, 255, 0.96);
            --theme-header-border: rgba(232, 239, 232, 0.7);
            --theme-header-text: #24431F;
            --theme-header-subtext: #628459;
            --theme-section-alt-bg: #284A24;
            --theme-section-alt-title: #FFFFFF;
            --theme-section-alt-text: #FFFFFF;
            --theme-section-alt-subtext: #D5E2D8;
            --theme-section-alt-accent: #FBBF24;
            --theme-section-card-bg: rgba(255, 255, 255, 0.08);
            --theme-section-card-border: rgba(255, 255, 255, 0.15);
            --theme-section-card-title: #FBBF24;
            --theme-section-card-text: #E2EBE1;
            --theme-selection-bg: #CFE0D3;
            --theme-selection-text: #24431F;
            --theme-footer-bg: #1B3417;
            --theme-footer-text: #D5E2D8;
            --theme-footer-subtext: #8EAD98;
        }

        [data-theme="dark-yellow"] {
            --theme-name: 'dark-yellow';
            --theme-bg-canvas: #0B0B0B;
            --theme-text-primary: #FFFFFF;
            --theme-text-secondary: #CBD5E1;
            --theme-text-muted: #94A3B8;
            --theme-hero-from: #141414;
            --theme-hero-via: #0E0E0E;
            --theme-hero-to: #0B0B0B;
            --theme-hero-glow: #F59E0B;
            --theme-hero-glow-opacity: 0.22;
            --theme-badge-bg: rgba(245, 158, 11, 0.15);
            --theme-badge-text: #FBBF24;
            --theme-badge-dot: #F59E0B;
            --theme-badge-border: rgba(245, 158, 11, 0.35);
            --theme-title: #FFFFFF;
            --theme-accent: #F59E0B;
            --theme-accent-light: #FDE68A;
            --theme-subtitle: #CBD5E1;
            --theme-border-hairline: rgba(245, 158, 11, 0.22);
            --theme-border-subtle: rgba(245, 158, 11, 0.12);
            --theme-card-bg: rgba(20, 20, 20, 0.85);
            --theme-card-border: rgba(245, 158, 11, 0.25);
            --theme-card-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            --theme-metric-value: #FBBF24;
            --theme-metric-label: #94A3B8;
            --theme-btn-pri-bg: #F59E0B;
            --theme-btn-pri-text: #0B0B0B;
            --theme-btn-pri-hover: #D97706;
            --theme-btn-sec-bg: rgba(20, 20, 20, 0.85);
            --theme-btn-sec-text: #FDE68A;
            --theme-btn-sec-border: rgba(245, 158, 11, 0.4);
            --theme-btn-sec-hover: rgba(30, 30, 30, 0.9);
            --theme-header-bg: rgba(11, 11, 11, 0.78);
            --theme-header-scrolled-bg: rgba(7, 7, 7, 0.96);
            --theme-header-border: rgba(245, 158, 11, 0.25);
            --theme-header-text: #FFFFFF;
            --theme-header-subtext: #F59E0B;
            --theme-section-alt-bg: #0E0E0E;
            --theme-section-alt-title: #FFFFFF;
            --theme-section-alt-text: #FFFFFF;
            --theme-section-alt-subtext: #94A3B8;
            --theme-section-alt-accent: #F59E0B;
            --theme-section-card-bg: rgba(255, 255, 255, 0.05);
            --theme-section-card-border: rgba(245, 158, 11, 0.25);
            --theme-section-card-title: #FBBF24;
            --theme-section-card-text: #CBD5E1;
            --theme-selection-bg: #F59E0B;
            --theme-selection-text: #000000;
            --theme-footer-bg: #070707;
            --theme-footer-text: #CBD5E1;
            --theme-footer-subtext: #F59E0B;
        }

        [data-theme="blue"] {
            --theme-name: 'blue';
            --theme-bg-canvas: #F8FAFC;
            --theme-text-primary: #0F172A;
            --theme-text-secondary: #334155;
            --theme-text-muted: #64748B;
            --theme-hero-from: #F0F7FF;
            --theme-hero-via: #F8FAFC;
            --theme-hero-to: #FFFFFF;
            --theme-hero-glow: #38BDF8;
            --theme-hero-glow-opacity: 0.35;
            --theme-badge-bg: #E0F2FE;
            --theme-badge-text: #0284C7;
            --theme-badge-dot: #0284C7;
            --theme-badge-border: rgba(186, 230, 253, 0.9);
            --theme-title: #0F172A;
            --theme-accent: #0284C7;
            --theme-accent-light: #BAE6FD;
            --theme-subtitle: #475569;
            --theme-border-hairline: #E2E8F0;
            --theme-border-subtle: #BAE6FD;
            --theme-card-bg: rgba(255, 255, 255, 0.9);
            --theme-card-border: #E2E8F0;
            --theme-card-shadow: 0 10px 30px rgba(2, 132, 199, 0.05);
            --theme-metric-value: #0369A1;
            --theme-metric-label: #64748B;
            --theme-btn-pri-bg: #0369A1;
            --theme-btn-pri-text: #FFFFFF;
            --theme-btn-pri-hover: #075985;
            --theme-btn-sec-bg: #FFFFFF;
            --theme-btn-sec-text: #0369A1;
            --theme-btn-sec-border: #BAE6FD;
            --theme-btn-sec-hover: #F0F7FF;
            --theme-header-bg: rgba(248, 250, 252, 0.88);
            --theme-header-scrolled-bg: rgba(255, 255, 255, 0.98);
            --theme-header-border: #E2E8F0;
            --theme-header-text: #0F172A;
            --theme-header-subtext: #0284C7;
            --theme-section-alt-bg: #0F1D32;
            --theme-section-alt-title: #FFFFFF;
            --theme-section-alt-text: #FFFFFF;
            --theme-section-alt-subtext: #94A3B8;
            --theme-section-alt-accent: #38BDF8;
            --theme-section-card-bg: rgba(255, 255, 255, 0.08);
            --theme-section-card-border: rgba(56, 189, 248, 0.25);
            --theme-section-card-title: #38BDF8;
            --theme-section-card-text: #E2E8F0;
            --theme-selection-bg: #BAE6FD;
            --theme-selection-text: #0369A1;
            --theme-footer-bg: #0B132B;
            --theme-footer-text: #E2E8F0;
            --theme-footer-subtext: #38BDF8;
        }

        /* Unified Global Typography - Same Font Used Across All Pages */
        *, ::before, ::after {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--theme-bg-canvas);
            color: var(--theme-text-primary);
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important;
            -webkit-font-smoothing: antialiased;
        }

        ::selection {
            background-color: var(--theme-selection-bg);
            color: var(--theme-selection-text);
        }

        body, header, footer, section, .theme-transition {
            transition-property: background-color, border-color, color, fill, stroke, box-shadow;
            transition-duration: 350ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .font-editorial, .font-serif, h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important;
            letter-spacing: -0.01em;
        }

        /* =========================================================
           Universal High-Contrast Rules for Dark Alt Backgrounds
           (Ensures text visibility on Green #284A24 & Blue #0F1D32)
           ========================================================= */
        [style*="--theme-section-alt-bg"],
        .theme-section-alt {
            color: var(--theme-section-alt-text, #FFFFFF);
        }

        /* Direct Section Headings inside Alt Backgrounds */
        [style*="--theme-section-alt-bg"] > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h1,
        [style*="--theme-section-alt-bg"] > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h2,
        [style*="--theme-section-alt-bg"] > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h3,
        [style*="--theme-section-alt-bg"] .section-alt-title,
        .theme-section-alt > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h1,
        .theme-section-alt > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h2,
        .theme-section-alt > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]) > h3,
        .theme-section-alt .section-alt-title {
            color: var(--theme-section-alt-title, #FFFFFF) !important;
        }

        /* Direct Section Subtitles / Paragraphs inside Alt Backgrounds (Excludes elements inside cards) */
        [style*="--theme-section-alt-bg"] > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]):not([class*="p-"]) > p,
        [style*="--theme-section-alt-bg"] .section-alt-subtext,
        .theme-section-alt > div > div:not([style*="--theme-card-bg"]):not([class*="rounded-"]):not([class*="p-"]) > p,
        .theme-section-alt .section-alt-subtext {
            color: var(--theme-section-alt-subtext, #D5E2D8) !important;
        }

        /* =========================================================
           Universal Card High-Contrast Protection
           (Ensures text inside cards with --theme-card-bg is ALWAYS
           dark, crisp, and 100% visible on light/white card backgrounds)
           ========================================================= */
        [style*="--theme-card-bg"],
        .theme-card,
        .theme-section-alt [style*="--theme-card-bg"],
        [style*="--theme-section-alt-bg"] [style*="--theme-card-bg"] {
            color: var(--theme-text-primary) !important;
        }

        [style*="--theme-card-bg"] h1,
        [style*="--theme-card-bg"] h2,
        [style*="--theme-card-bg"] h3,
        [style*="--theme-card-bg"] h4,
        [style*="--theme-card-bg"] h5,
        [style*="--theme-card-bg"] .card-title,
        .theme-section-alt [style*="--theme-card-bg"] h1,
        .theme-section-alt [style*="--theme-card-bg"] h2,
        .theme-section-alt [style*="--theme-card-bg"] h3,
        .theme-section-alt [style*="--theme-card-bg"] h4 {
            color: var(--theme-title) !important;
        }

        [style*="--theme-card-bg"] p,
        [style*="--theme-card-bg"] li,
        [style*="--theme-card-bg"] .card-text,
        .theme-section-alt [style*="--theme-card-bg"] p,
        .theme-section-alt [style*="--theme-card-bg"] li,
        [style*="--theme-section-alt-bg"] [style*="--theme-card-bg"] p,
        [style*="--theme-section-alt-bg"] [style*="--theme-card-bg"] li {
            color: var(--theme-text-primary) !important;
        }

        [style*="--theme-card-bg"] strong,
        [style*="--theme-card-bg"] b,
        .theme-section-alt [style*="--theme-card-bg"] strong,
        [style*="--theme-section-alt-bg"] [style*="--theme-card-bg"] strong {
            color: var(--theme-title) !important;
        }

        /* Eyebrow Badges on Alt Backgrounds */
        [style*="--theme-section-alt-bg"] .section-alt-badge,
        .theme-section-alt .section-alt-badge {
            background-color: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.22) !important;
            color: var(--theme-section-alt-accent, #FBBF24) !important;
            backdrop-filter: blur(8px);
        }

        /* Hairline borders */
        .border-gold-hairline {
            border-color: var(--theme-border-hairline);
        }

        .border-gold-subtle {
            border-color: var(--theme-border-subtle);
        }

        /* Lenis smooth scrolling defaults */
        html.lenis {
            height: auto;
        }
        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis.lenis-stopped {
            overflow: hidden;
        }
        .lenis.lenis-scrolling iframe {
            pointer-events: none;
        }

        /* Subtle Ken Burns Zoom Animation */
        @keyframes kenBurns {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }
        .animate-kenburns {
            animation: kenBurns 24s ease-in-out infinite alternate;
        }
    </style>

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "RealEstateAgent",
        "name": "GLEAMREALTY PRIVATE LIMITED",
        "url": "<?= url('/') ?>",
        "description": "Exclusive real estate agency and advisory for luxury residential plots, duplex villas, and commercial developments in Vrindavan and Mathura.",
        "telephone": "+91-9871731303",
        "areaServed": ["Vrindavan", "Mathura", "Braj Region", "Delhi NCR"],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Flat no 10, LIG 09, Suncity Anantam Kunj",
            "addressLocality": "Vrindavan",
            "postalCode": "281406",
            "addressRegion": "Uttar Pradesh",
            "addressCountry": "IN"
        }
    }
    </script>
</head>
<body x-data="{
        vipModalOpen: false,
        vipModalInteracted: false,
        vipSubmitted: false,
        themeMenuOpen: false,
        mobileMenuOpen: false,
        mobileLocationOpen: false,
        mobileProjectsOpen: false,
        mobileAboutOpen: false,
        navScrolled: false,
        isHome: <?= $isHome ? 'true' : 'false' ?>,
        currentTheme: document.documentElement.getAttribute('data-theme') || '<?= e($active_theme ?? \App\Models\Setting::getActiveTheme()) ?>',
        setTheme(theme) {
            this.currentTheme = theme;
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('gleam_theme', theme);
            document.cookie = 'gleam_theme=' + theme + '; path=/; max-age=31536000';
            this.themeMenuOpen = false;
        },
        init() {
            // Modal is triggered on-demand via navigation and page CTAs
        }
      }"
      x-init="init()"
      @scroll.window="navScrolled = (window.pageYOffset > 50)"
      class="flex flex-col min-h-screen">

    <!-- ==========================================================
         LUXURY BRAND PAGE PRELOADER (COMPANY LOGO & NAME)
         Instant CSS-rendered splash that smoothly dismisses on load
         ========================================================== -->
    <div id="gleam-preloader" aria-label="Loading Gleamrealty">
        <!-- Ambient radial glow behind logo -->
        <div class="absolute w-72 sm:w-96 h-72 sm:h-96 rounded-full blur-[100px] pointer-events-none opacity-20"
             style="background: radial-gradient(circle, #c5a880 0%, transparent 70%);"></div>

        <div class="relative z-10 flex flex-col items-center text-center px-6 max-w-sm">
            <!-- Brand Logo Emblem / Lockup -->
            <div class="animate-gleam-pulse mb-4 flex items-center justify-center">
                <img src="<?= asset('uploads/gleam_logo_horizontal_white.webp') ?>"
                     alt="GLEAMREALTY PRIVATE LIMITED"
                     class="h-12 sm:h-14 w-auto object-contain drop-shadow-[0_4px_24px_rgba(218,165,32,0.25)]"
                     width="220"
                     height="54"
                     fetchpriority="high">
            </div>

            <!-- Company Name & Verified Tagline -->
            <div class="space-y-1 mt-1">
                <p class="text-[11px] sm:text-xs font-semibold uppercase tracking-[0.28em] text-[#c5a880]">
                    GLEAMREALTY PRIVATE LIMITED
                </p>
                <p class="text-[10px] sm:text-[11px] uppercase tracking-[0.2em] text-stone-400 font-light">
                    Private Office &bull; Vrindavan &amp; Mathura
                </p>
            </div>

            <!-- Architectural Loading Progress Shimmer Bar -->
            <div class="w-44 sm:w-52 h-[2px] bg-white/10 rounded-full overflow-hidden mt-6 relative">
                <div class="absolute inset-y-0 left-0 w-1/2 bg-gradient-to-r from-transparent via-[#dfc29e] to-transparent animate-gleam-shimmer"></div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            // Dismiss brand preloader smoothly on load or maximum timeout
            function dismissPreloader() {
                const preloader = document.getElementById('gleam-preloader');
                if (!preloader || preloader.classList.contains('preloader-fade')) return;
                preloader.classList.add('preloader-fade');
                setTimeout(() => {
                    if (preloader.parentNode) preloader.parentNode.removeChild(preloader);
                }, 600);
            }

            if (document.readyState === 'complete') {
                setTimeout(dismissPreloader, 350);
            } else {
                window.addEventListener('load', function() {
                    setTimeout(dismissPreloader, 350);
                });
                // Fallback guarantee: dismiss after 1.2s max so user is never blocked
                setTimeout(dismissPreloader, 1200);
            }
        })();
    </script>

    <?php
    // Fetch all active published CMS pages for the About US navigation dropdown
    try {
        $navPublishedPages = \App\Models\Page::published();
    } catch (\Throwable $e) {
        $navPublishedPages = [];
    }

    // Fetch all active projects for the PROJECTS navigation dropdown
    try {
        $navProjects = \App\Models\Project::all();
    } catch (\Throwable $e) {
        $navProjects = [];
    }
    ?>

    <!-- Top Navigation -->
    <header :class="navScrolled
                ? 'py-3.5 shadow-xl border-b'
                : 'py-4 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border-b'"
            :style="{
                backgroundColor: navScrolled ? 'var(--theme-header-scrolled-bg)' : 'var(--theme-header-bg)',
                borderColor: 'var(--theme-header-border)',
                backdropFilter: 'blur(16px)',
                WebkitBackdropFilter: 'blur(16px)'
            }"
            class="fixed top-0 left-0 right-0 z-40 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 flex items-center justify-between">
            <!-- Brand Logo (Official Lightweight Gleamrealty Logo) -->
            <a href="<?= url('/') ?>" class="flex items-center group py-0.5" aria-label="Gleamrealty Home">
                <img :src="currentTheme === 'dark-yellow' ? '<?= asset('uploads/gleam_logo_horizontal_white.webp') ?>' : '<?= asset('uploads/gleam_logo_horizontal.webp') ?>'"
                     alt="Gleamrealty Private Limited"
                     class="h-10 sm:h-11 md:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-102"
                     loading="eager"
                     decoding="async"
                     width="215"
                     height="50">
            </a>

            <!-- Desktop Links -->
            <nav class="hidden lg:flex items-center gap-7 text-[13px] font-semibold tracking-[0.14em] uppercase transition-colors">
                <!-- Location Dropdown (Mathura & Vrindavan) -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button type="button"
                            @click="open = !open"
                            :style="{ color: 'var(--theme-header-text)' }"
                            class="inline-flex items-center gap-1.5 py-2 hover:opacity-75 transition-opacity focus:outline-none cursor-pointer">
                        <span>LOCATION</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Location Menu Popover -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                         x-cloak
                         @click.outside="open = false"
                         :style="{
                             backgroundColor: 'var(--theme-card-bg)',
                             borderColor: 'var(--theme-header-border)',
                             color: 'var(--theme-header-text)'
                         }"
                         class="absolute left-0 mt-1 w-80 rounded-xl shadow-2xl border p-2 z-50 backdrop-blur-xl">
                        
                        <!-- Mathura Option -->
                        <a href="<?= url('/location/mathura') ?>"
                           class="flex items-start gap-3.5 p-3 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors group/loc">
                            <div class="w-9 h-9 rounded-md flex items-center justify-center shrink-0 shadow-xs"
                                 style="background-color: var(--theme-btn-pri-bg); color: var(--theme-btn-pri-text);">
                                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-bold text-sm tracking-normal normal-case">Mathura</span>
                                    <span class="text-[9px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-amber-500/15 text-amber-700 dark:text-amber-300">Commercial &amp; Plots</span>
                                </div>
                                <p class="text-[11px] opacity-70 normal-case font-normal leading-snug mt-0.5 truncate">
                                    Strategic Highway Estates &amp; Complexes
                                </p>
                            </div>
                        </a>

                        <!-- Vrindavan Option -->
                        <a href="<?= url('/location/vrindavan') ?>"
                           class="flex items-start gap-3.5 p-3 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors group/loc mt-1">
                            <div class="w-9 h-9 rounded-md flex items-center justify-center shrink-0 shadow-xs"
                                 style="background-color: var(--theme-btn-pri-bg); color: var(--theme-btn-pri-text);">
                                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5">
                                    <span class="font-bold text-sm tracking-normal normal-case">Vrindavan</span>
                                    <span class="text-[9px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">Holy Sanctuary</span>
                                </div>
                                <p class="text-[11px] opacity-70 normal-case font-normal leading-snug mt-0.5 truncate">
                                    Luxury Gated Townships &amp; Villas
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- PROJECTS Dropdown (Houses all Active Projects) -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button type="button"
                            @click="open = !open"
                            :style="{ color: 'var(--theme-header-text)' }"
                            class="inline-flex items-center gap-1.5 py-2 hover:opacity-75 transition-opacity focus:outline-none cursor-pointer">
                        <span>PROJECTS</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Projects Dropdown Panel -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                         x-cloak
                         @click.outside="open = false"
                         :style="{
                             backgroundColor: 'var(--theme-card-bg)',
                             borderColor: 'var(--theme-header-border)',
                             color: 'var(--theme-header-text)'
                         }"
                         class="absolute left-1/2 -translate-x-1/2 mt-1 w-[600px] rounded-xl shadow-2xl border p-4 z-50 backdrop-blur-xl">
                        
                        <!-- Panel Header -->
                        <div class="pb-3 mb-2 border-b flex items-center justify-between"
                             :style="{ borderColor: 'var(--theme-header-border)' }">
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] opacity-60">Signature Portfolios</span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-mono font-medium opacity-75 bg-black/5 dark:bg-white/10">
                                    <?= count($navProjects) ?> Projects
                                </span>
                            </div>
                            <a href="<?= url('/projects') ?>"
                               class="text-[11px] font-bold uppercase tracking-wider text-amber-600 hover:text-amber-700 dark:text-amber-400 inline-flex items-center gap-1 group/overview">
                                <span>View All Projects</span>
                                <span class="group-hover/overview:translate-x-0.5 transition-transform">&rarr;</span>
                            </a>
                        </div>

                        <!-- 2-Column Dynamic Projects Grid -->
                        <div class="grid grid-cols-2 gap-1.5 max-h-[380px] overflow-y-auto pr-1 text-xs normal-case font-normal">
                            <?php if (empty($navProjects)): ?>
                                <a href="<?= url('/projects') ?>" class="col-span-2 px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                                    View All Projects
                                </a>
                            <?php else: ?>
                                <?php foreach ($navProjects as $proj): ?>
                                    <a href="<?= url('/projects/' . e($proj['slug'])) ?>"
                                       class="flex items-start gap-2.5 p-2.5 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors group/link">
                                        <span class="w-2 h-2 rounded-full shrink-0 mt-1.5 transition-transform group-hover/link:scale-150"
                                              style="background-color: var(--theme-btn-pri-bg);"></span>
                                        <div class="min-w-0 flex-1">
                                            <div class="font-semibold text-xs leading-snug group-hover/link:translate-x-0.5 transition-transform truncate">
                                                <?= e($proj['name']) ?>
                                            </div>
                                            <div class="flex items-center gap-2 mt-0.5 text-[10px] opacity-70">
                                                <span class="truncate"><?= e($proj['location']) ?></span>
                                                <?php if (!empty($proj['starting_price'])): ?>
                                                    <span class="font-mono text-amber-600 dark:text-amber-400 font-bold shrink-0"><?= e($proj['starting_price']) ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- About US Dropdown (Houses all Admin-Managed Dynamic Pages) -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button type="button"
                            @click="open = !open"
                            :style="{ color: 'var(--theme-header-text)' }"
                            class="inline-flex items-center gap-1.5 py-2 hover:opacity-75 transition-opacity focus:outline-none cursor-pointer">
                        <span>ABOUT US</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- About US Mega Dropdown Panel -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                         x-cloak
                         @click.outside="open = false"
                         :style="{
                             backgroundColor: 'var(--theme-card-bg)',
                             borderColor: 'var(--theme-header-border)',
                             color: 'var(--theme-header-text)'
                         }"
                         class="absolute left-1/2 -translate-x-1/2 mt-1 w-[560px] rounded-xl shadow-2xl border p-4 z-50 backdrop-blur-xl">
                        
                        <!-- Panel Header -->
                        <div class="pb-3 mb-2 border-b flex items-center justify-between"
                             :style="{ borderColor: 'var(--theme-header-border)' }">
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] opacity-60">Company &amp; Pages</span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-mono font-medium opacity-75 bg-black/5 dark:bg-white/10">
                                    <?= count($navPublishedPages) ?> Pages
                                </span>
                            </div>
                            <a href="<?= url('/about-us') ?>"
                               class="text-[11px] font-bold uppercase tracking-wider text-amber-600 hover:text-amber-700 dark:text-amber-400 inline-flex items-center gap-1 group/overview">
                                <span>About Gleamrealty</span>
                                <span class="group-hover/overview:translate-x-0.5 transition-transform">&rarr;</span>
                            </a>
                        </div>

                        <!-- 2-Column Dynamic Pages Grid -->
                        <div class="grid grid-cols-2 gap-1 max-h-[340px] overflow-y-auto pr-1 text-xs normal-case font-normal">
                            <?php if (empty($navPublishedPages)): ?>
                                <a href="<?= url('/about-us') ?>" class="col-span-2 px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                                    About Us Overview
                                </a>
                            <?php else: ?>
                                <?php foreach ($navPublishedPages as $p): ?>
                                    <a href="<?= url('/' . e($p['slug'])) ?>"
                                       class="flex items-center gap-2.5 px-3 py-2 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors group/link">
                                        <span class="w-1.5 h-1.5 rounded-full shrink-0 transition-transform group-hover/link:scale-150"
                                              style="background-color: var(--theme-btn-pri-bg);"></span>
                                        <span class="truncate tracking-normal text-xs font-medium group-hover/link:translate-x-0.5 transition-transform">
                                            <?= e($p['title']) ?>
                                        </span>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Blog Navigation Link -->
                <a href="<?= url('/blog') ?>" :style="{ color: 'var(--theme-header-text)' }" class="hover:opacity-75 transition-opacity">BLOG</a>

                <!-- Contact Us Navigation Link -->
                <a href="<?= url('/contact-us') ?>" :style="{ color: 'var(--theme-header-text)' }" class="hover:opacity-75 transition-opacity">CONTACT US</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3 sm:gap-4">
                <!-- BOOK SITE VISIT Primary Button (Matches Reference Image) -->
                <button @click="vipModalOpen = true"
                        :style="{
                            backgroundColor: 'var(--theme-btn-pri-bg)',
                            color: 'var(--theme-btn-pri-text)'
                        }"
                        class="inline-flex items-center justify-center text-[11px] sm:text-xs font-semibold uppercase tracking-[0.14em] px-4 sm:px-6 py-2.5 rounded-sm hover:opacity-95 active:scale-98 transition-all shadow-xs">
                    BOOK SITE VISIT
                </button>

                <!-- Mobile Hamburger Toggle Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        type="button"
                        class="lg:hidden p-2 rounded-md focus:outline-none transition-colors"
                        :style="{ color: 'var(--theme-header-text)' }"
                        aria-label="Toggle navigation menu">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             x-cloak
             :style="{
                 backgroundColor: 'var(--theme-card-bg)',
                 borderColor: 'var(--theme-header-border)',
                 color: 'var(--theme-header-text)'
             }"
             class="lg:hidden border-t px-6 py-5 shadow-2xl max-h-[80vh] overflow-y-auto space-y-4 backdrop-blur-2xl">
            
            <!-- Mobile Location Accordion -->
            <div class="border-b pb-3" :style="{ borderColor: 'var(--theme-header-border)' }">
                <button @click="mobileLocationOpen = !mobileLocationOpen"
                        type="button"
                        class="w-full flex items-center justify-between text-xs font-bold uppercase tracking-[0.14em] py-2">
                    <span>LOCATION</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileLocationOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileLocationOpen" x-cloak class="pl-3 pt-2 space-y-2">
                    <a href="<?= url('/location/mathura') ?>" @click="mobileMenuOpen = false" class="block text-sm py-1 font-medium hover:opacity-75">
                        Mathura <span class="text-xs opacity-60 font-normal">&mdash; Commercial &amp; Highway Plots</span>
                    </a>
                    <a href="<?= url('/location/vrindavan') ?>" @click="mobileMenuOpen = false" class="block text-sm py-1 font-medium hover:opacity-75">
                        Vrindavan <span class="text-xs opacity-60 font-normal">&mdash; Luxury Villas &amp; Sanctuary</span>
                    </a>
                </div>
            </div>

            <!-- Mobile Projects Accordion -->
            <div class="border-b pb-3" :style="{ borderColor: 'var(--theme-header-border)' }">
                <button @click="mobileProjectsOpen = !mobileProjectsOpen"
                        type="button"
                        class="w-full flex items-center justify-between text-xs font-bold uppercase tracking-[0.14em] py-2">
                    <span>PROJECTS</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileProjectsOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileProjectsOpen" x-cloak class="pl-3 pt-2 space-y-1.5 max-h-60 overflow-y-auto">
                    <a href="<?= url('/projects') ?>" @click="mobileMenuOpen = false" class="block text-xs py-1.5 font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">
                        View All Projects &rarr;
                    </a>
                    <?php foreach ($navProjects as $proj): ?>
                        <a href="<?= url('/projects/' . e($proj['slug'])) ?>" @click="mobileMenuOpen = false" class="block text-xs py-1 opacity-85 hover:opacity-100">
                            <?= e($proj['name']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mobile About US Accordion -->
            <div class="border-b pb-3" :style="{ borderColor: 'var(--theme-header-border)' }">
                <button @click="mobileAboutOpen = !mobileAboutOpen"
                        type="button"
                        class="w-full flex items-center justify-between text-xs font-bold uppercase tracking-[0.14em] py-2">
                    <span>ABOUT US</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileAboutOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileAboutOpen" x-cloak class="pl-3 pt-2 space-y-1.5 max-h-60 overflow-y-auto">
                    <a href="<?= url('/about-us') ?>" @click="mobileMenuOpen = false" class="block text-xs py-1.5 font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">
                        About Gleamrealty &rarr;
                    </a>
                    <?php foreach ($navPublishedPages as $p): ?>
                        <a href="<?= url('/' . e($p['slug'])) ?>" @click="mobileMenuOpen = false" class="block text-xs py-1 opacity-85 hover:opacity-100">
                            <?= e($p['title']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mobile Blog -->
            <div class="border-b pb-3" :style="{ borderColor: 'var(--theme-header-border)' }">
                <a href="<?= url('/blog') ?>" @click="mobileMenuOpen = false" class="block text-xs font-bold uppercase tracking-[0.14em] py-2 hover:opacity-75">
                    BLOG
                </a>
            </div>

            <!-- Mobile Contact Us -->
            <div class="border-b pb-3" :style="{ borderColor: 'var(--theme-header-border)' }">
                <a href="<?= url('/contact-us') ?>" @click="mobileMenuOpen = false" class="block text-xs font-bold uppercase tracking-[0.14em] py-2 hover:opacity-75">
                    CONTACT US
                </a>
            </div>

            <!-- Mobile Book Site Visit -->
            <div class="pt-2">
                <button @click="vipModalOpen = true; mobileMenuOpen = false"
                        :style="{
                            backgroundColor: 'var(--theme-btn-pri-bg)',
                            color: 'var(--theme-btn-pri-text)'
                        }"
                        class="w-full text-center text-xs font-semibold uppercase tracking-[0.14em] py-3 rounded-sm shadow-sm">
                    BOOK SITE VISIT
                </button>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content Slot -->
    <main class="flex-1 pt-0">
        <?= $content ?>
    </main>

    <!-- Floating Palette Theme Trigger (Matches Reference Image) -->
    <div class="fixed bottom-6 left-6 z-40" @click.outside="themeMenuOpen = false">
        <!-- Circular White Button with Blue Palette Icon -->
        <button @click="themeMenuOpen = !themeMenuOpen"
                type="button"
                aria-label="Change Theme"
                title="Select Color Theme"
                class="w-14 h-14 rounded-full bg-white text-blue-600 shadow-[0_6px_25px_rgba(0,0,0,0.15)] border border-slate-100 flex items-center justify-center hover:scale-108 active:scale-95 transition-all duration-300 group focus:outline-none">
            <!-- Artist Paint Palette Icon SVG matching reference image -->
            <svg class="w-7 h-7 fill-current transition-transform duration-300 group-hover:rotate-12" viewBox="0 0 24 24">
                <path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61.34.42.84.67 1.37.67h1.41c.78 0 1.41.63 1.41 1.41 0 .37-.15.71-.39.95-.31.31-.5.74-.5 1.21 0 1.03.84 1.87 1.87 1.87 5.4 0 9.86-4.22 10.8-9.53C21.84 8.7 17.51 3 12 3zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
            </svg>
        </button>

        <!-- Palette Theme Picker Popover -->
        <div x-show="themeMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-3 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-3 scale-95"
             x-cloak
             class="absolute bottom-16 left-0 mb-2 w-72 p-3 rounded-2xl bg-white/95 dark:bg-stone-900/95 backdrop-blur-2xl border border-slate-200/90 shadow-[0_16px_40px_rgba(0,0,0,0.2)] space-y-1.5 text-slate-900">
            
            <div class="px-3 py-2 border-b border-slate-100 flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">Color Themes</span>
                <span class="text-[10px] font-medium px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">3 Themes</span>
            </div>

            <!-- 1. Green & White -->
            <button @click="setTheme('green')"
                    type="button"
                    :class="currentTheme === 'green' ? 'bg-[#24431F]/10 border-[#24431F]/30 text-[#24431F] font-semibold' : 'hover:bg-slate-50 border-transparent text-slate-700'"
                    class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs transition-all text-left group">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-[#284A24] border-2 border-white shadow-xs flex items-center justify-center text-white text-[10px]">🌿</div>
                    <div>
                        <div class="font-medium">Green &amp; White</div>
                        <div class="text-[10px] text-slate-400">Botanical Sanctuary</div>
                    </div>
                </div>
                <template x-if="currentTheme === 'green'">
                    <span class="w-2 h-2 rounded-full bg-[#24431F]"></span>
                </template>
            </button>

            <!-- 2. Dark & Yellow -->
            <button @click="setTheme('dark-yellow')"
                    type="button"
                    :class="currentTheme === 'dark-yellow' ? 'bg-amber-500/15 border-amber-500/40 text-amber-800 font-semibold' : 'hover:bg-slate-50 border-transparent text-slate-700'"
                    class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs transition-all text-left group">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-[#0B0B0B] border-2 border-[#F59E0B] shadow-xs flex items-center justify-center text-[#FBBF24] text-[10px]">🌙</div>
                    <div>
                        <div class="font-medium">Dark &amp; Yellow</div>
                        <div class="text-[10px] text-slate-400">Obsidian Amber</div>
                    </div>
                </div>
                <template x-if="currentTheme === 'dark-yellow'">
                    <span class="w-2 h-2 rounded-full bg-[#F59E0B]"></span>
                </template>
            </button>

            <!-- 3. Blue & White -->
            <button @click="setTheme('blue')"
                    type="button"
                    :class="currentTheme === 'blue' ? 'bg-sky-500/15 border-sky-500/40 text-sky-800 font-semibold' : 'hover:bg-slate-50 border-transparent text-slate-700'"
                    class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs transition-all text-left group">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-[#0369A1] border-2 border-white shadow-xs flex items-center justify-center text-white text-[10px]">🌊</div>
                    <div>
                        <div class="font-medium">Blue &amp; White</div>
                        <div class="text-[10px] text-slate-400">Royal Azure</div>
                    </div>
                </div>
                <template x-if="currentTheme === 'blue'">
                    <span class="w-2 h-2 rounded-full bg-[#0284C7]"></span>
                </template>
            </button>
        </div>
    </div>

    <!-- Floating WhatsApp Concierge Button (Official Crisp Icon) -->
    <a href="https://wa.me/919871731303?text=Hello%2C%20I%20would%20like%20to%20schedule%20a%20site%20visit%20and%20inquire%20about%20floor%20plans%20and%20pricing."
       target="_blank"
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-[0_8px_28px_rgba(37,211,102,0.48)] hover:scale-110 active:scale-95 transition-all duration-300 group"
       title="Chat with Concierge on WhatsApp"
       aria-label="WhatsApp Concierge">
        <!-- Crisp Authentic WhatsApp Icon (Speech Bubble with Phone Handset) -->
        <svg class="w-8 h-8 fill-white group-hover:rotate-6 transition-transform" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.23c-.25-.13-1.47-.72-1.7-.81-.23-.08-.4-.13-.57.13-.17.25-.65.81-.8 1-.15.17-.3.19-.55.07-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.12-.15.17-.25.25-.42.08-.17.04-.32-.02-.44-.06-.13-.57-1.37-.78-1.88-.2-.5-.42-.43-.57-.44h-.49c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.45 1.03 2.62.13.17 1.78 2.72 4.31 3.81.6.26 1.07.42 1.44.54.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/>
        </svg>
        <span class="absolute -inset-1 rounded-full bg-[#25D366] opacity-30 animate-ping pointer-events-none"></span>
    </a>

    <!-- Luxury Centered VIP Callback & Showing Popup Modal (Alpine.js) -->
    <div x-show="vipModalOpen"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 flex items-center justify-center min-h-screen"
         aria-labelledby="vip-popup-title" role="dialog" aria-modal="true"
         @keydown.escape.window="vipModalOpen = false; vipModalInteracted = true;">
        
        <!-- Backdrop blur overlay -->
        <div x-show="vipModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="vipModalOpen = false; vipModalInteracted = true;"
             class="fixed inset-0 bg-black/80 backdrop-blur-md transition-opacity"></div>

        <!-- Centered Popup Card -->
        <div x-show="vipModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             :style="{
                 backgroundColor: 'var(--theme-card-bg)',
                 borderColor: 'var(--theme-card-border)',
                 color: 'var(--theme-text-primary)'
             }"
             class="relative w-full max-w-lg rounded-2xl sm:rounded-3xl border p-6 sm:p-8 shadow-[0_25px_70px_rgba(0,0,0,0.5)] z-10 max-h-[90vh] overflow-y-auto my-auto transition-all">

            <!-- Close Button -->
            <button @click="vipModalOpen = false; vipModalInteracted = true;"
                    type="button"
                    aria-label="Close VIP Popup"
                    class="absolute top-4 right-4 sm:top-5 sm:right-5 w-8 h-8 rounded-full flex items-center justify-center opacity-60 hover:opacity-100 hover:bg-black/5 dark:hover:bg-white/10 transition-colors focus:outline-none cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Header Badge & Title -->
            <div class="space-y-2 pr-6">
                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-[0.2em]"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: var(--theme-accent);"></span>
                    <span>VIP Advisory &bull; Confidential Desk</span>
                </div>
                <h3 id="vip-popup-title" class="font-editorial text-2xl sm:text-3xl font-light leading-tight" :style="{ color: 'var(--theme-title)' }">
                    VIP Callback &amp; Showing
                </h3>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Experience bespoke Braj plotted townships &amp; luxury residences. Submit your details below for priority advisory and private site showing within 15 minutes.
                </p>
            </div>

            <!-- Reactive Form with AJAX connection to /api/inquiry.php -->
            <form x-data="{
                    submitting: false,
                    submitted: false,
                    errorMsg: '',
                    formData: {
                        name: '',
                        phone: '',
                        email: '',
                        project_id: '',
                        budget_range: '₹ 50 Lakhs - ₹ 1 Crore',
                        message: ''
                    },
                    submitForm() {
                        this.submitting = true;
                        this.errorMsg = '';
                        fetch('<?= url('/api/inquiry.php') ?>', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                            body: JSON.stringify(this.formData)
                        })
                        .then(res => res.json())
                        .then(data => {
                            this.submitting = false;
                            if (data.status === 'success') {
                                this.submitted = true;
                                $data.vipSubmitted = true;
                            } else {
                                this.errorMsg = data.message || 'An error occurred. Please call +91 9871731303 / +91 7409767452.';
                            }
                        })
                        .catch(() => {
                            this.submitting = false;
                            this.errorMsg = 'Network error. Please contact concierge at +91 9871731303 / +91 7409767452.';
                        });
                    }
                }"
                @submit.prevent="submitForm()"
                class="space-y-3.5 pt-4">

                <template x-if="submitted">
                    <div class="p-6 sm:p-8 rounded-2xl border text-center space-y-4"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto text-2xl font-bold shadow-md"
                             :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">✓</div>
                        <h4 class="font-editorial text-2xl font-light" :style="{ color: 'var(--theme-title)' }">Showing Scheduled</h4>
                        <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                            Your VIP showing and consultation request has been prioritized. A dedicated senior client advisor has been alerted and will dial your number shortly.
                        </p>
                        <button type="button" @click="vipModalOpen = false; vipModalInteracted = true; submitted = false;"
                                :style="{ color: 'var(--theme-accent)' }"
                                class="mt-2 text-xs uppercase tracking-wider font-semibold hover:underline cursor-pointer">
                            Close Window
                        </button>
                    </div>
                </template>

                <template x-if="!submitted">
                    <div class="space-y-3.5">
                        <template x-if="errorMsg">
                            <div class="p-3 text-xs bg-rose-500/10 border border-rose-500/30 text-rose-500 rounded-lg" x-text="errorMsg"></div>
                        </template>

                        <!-- Row: Full Name & Phone Number -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Full Name *</label>
                                <input type="text" x-model="formData.name" required placeholder="Shri Rajesh Sharma"
                                       :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                       class="w-full border rounded-xl px-3.5 py-2.5 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-700/50 transition-colors font-medium placeholder:text-stone-400">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Phone Number *</label>
                                <input type="tel" x-model="formData.phone" required placeholder="+91 98765 43210"
                                       :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                       class="w-full border rounded-xl px-3.5 py-2.5 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-700/50 transition-colors font-mono font-medium placeholder:text-stone-400">
                            </div>
                        </div>

                        <!-- Row: Project of Interest & Target Valuation -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Project of Interest</label>
                                <select x-model="formData.project_id"
                                        :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                        class="w-full border rounded-xl px-3 py-2.5 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-700/50 transition-colors font-medium [&>option]:bg-white [&>option]:text-stone-900 dark:[&>option]:bg-stone-900 dark:[&>option]:text-white">
                                    <option value="">General Braj Portfolio</option>
                                    <?php foreach ($navProjects as $proj): ?>
                                        <option value="<?= (int) $proj['id'] ?>"><?= e($proj['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Target Valuation</label>
                                <select x-model="formData.budget_range"
                                        :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                        class="w-full border rounded-xl px-3 py-2.5 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-700/50 transition-colors font-medium [&>option]:bg-white [&>option]:text-stone-900 dark:[&>option]:bg-stone-900 dark:[&>option]:text-white">
                                    <option value="₹ 25 Lakhs - ₹ 50 Lakhs">₹ 25 Lakhs - ₹ 50 Lakhs</option>
                                    <option value="₹ 50 Lakhs - ₹ 1 Crore">₹ 50 Lakhs - ₹ 1 Crore</option>
                                    <option value="₹ 1 Crore - ₹ 2.5 Crores">₹ 1 Crore - ₹ 2.5 Crores</option>
                                    <option value="₹ 2.5 Crores+">₹ 2.5 Crores+ (Trophy Estates)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Showing Notes / Preferred Dates</label>
                            <textarea x-model="formData.message" rows="2" placeholder="Looking for corner plot or urgent site visit this weekend..."
                                      :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                      class="w-full border rounded-xl px-3.5 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-emerald-700/50 transition-colors font-medium placeholder:text-stone-400"></textarea>
                        </div>

                        <button type="submit" :disabled="submitting"
                                :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }"
                                class="w-full py-3.5 rounded-xl font-semibold text-xs uppercase tracking-widest transition-all shadow-md flex items-center justify-center gap-2 hover:opacity-95 cursor-pointer">
                            <span x-show="!submitting">Schedule VIP Showing &amp; Callback &rarr;</span>
                            <span x-show="submitting">Connecting Concierge Desk...</span>
                        </button>
                    </div>
                </template>
            </form>

            <!-- Modal Footer -->
            <div class="mt-5 pt-4 border-t text-[11px] flex flex-col sm:flex-row items-center justify-between gap-2"
                 :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-muted)' }">
                <div>Direct Concierge: <a href="tel:+919871731303" :style="{ color: 'var(--theme-accent)' }" class="hover:underline font-mono font-semibold">+91 9871731303</a> / <a href="tel:+917409767452" :style="{ color: 'var(--theme-accent)' }" class="hover:underline font-mono font-semibold">+91 7409767452</a></div>
                <div class="opacity-70">&bull; MVDA Approved &bull; 100% Registry</div>
            </div>
        </div>
    </div>

    <!-- Luxury Editorial Footer -->
    <footer :style="{ backgroundColor: 'var(--theme-footer-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-footer-text)' }"
            class="border-t pt-24 pb-20 text-xs transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 pb-16 border-b border-white/10">
                <div class="space-y-5">
                    <a href="<?= url('/') ?>" class="inline-block py-1 group" aria-label="Gleamrealty Home">
                        <img src="<?= asset('uploads/gleam_logo_horizontal_white.webp') ?>"
                             alt="Gleamrealty Private Limited"
                             class="h-10 sm:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-102"
                             loading="lazy"
                             decoding="async"
                             width="215"
                             height="50">
                    </a>
                    <p class="text-xs leading-relaxed max-w-sm opacity-80">
                        Curators of distinguished plotted townships, serene sanctuaries, and architectural residences across the sacred lands of Vrindavan and Mathura.
                    </p>
                    <div class="text-[11px] tracking-wider uppercase font-semibold" :style="{ color: 'var(--theme-accent)' }">
                        &bull; MVDA Approved &bull; 100% Verified Registry
                    </div>
                </div>

                <div>
                    <h4 class="font-editorial text-lg text-white mb-5 uppercase tracking-widest font-normal">Sanctuaries</h4>
                    <ul class="space-y-3 opacity-80">
                        <li><a href="<?= url('/projects/shri-vasudhara-vaishaly-premium-residential-plots') ?>" class="hover:underline transition-colors">Shri Vasudhara Vaishaly</a></li>
                        <li><a href="<?= url('/projects/shri-vrinda-aakruti-village-premium-residential-township') ?>" class="hover:underline transition-colors">Shri Vrinda Aakruti Village</a></li>
                        <li><a href="<?= url('/projects/shri-vrinda-naivedyam-premium-residential-plots') ?>" class="hover:underline transition-colors">Shri Vrinda Naivedyam</a></li>
                        <li><a href="<?= url('/projects/shri-vrinda-orchids-plots-and-villas') ?>" class="hover:underline transition-colors">Shri Vrinda Orchids Villas</a></li>
                        <li><a href="<?= url('/projects/shri-vrinda-greens-premium-residential-plots') ?>" class="hover:underline transition-colors">Shri Vrinda Greens</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-editorial text-lg text-white mb-5 uppercase tracking-widest font-normal">Heritage &amp; Guides</h4>
                    <ul class="space-y-3 opacity-80">
                        <li><a href="<?= url('/property-in-vrindavan') ?>" class="hover:underline transition-colors">Vrindavan Land Valuation</a></li>
                        <li><a href="<?= url('/property-in-mathura') ?>" class="hover:underline transition-colors">Mathura City Expansion</a></li>
                        <li><a href="<?= url('/residential-plots-in-vrindavan') ?>" class="hover:underline transition-colors">Residential Plots Guide</a></li>
                        <li><a href="<?= url('/blog') ?>" class="hover:underline transition-colors">Blog &amp; Market Insights</a></li>
                        <li><a href="<?= url('/about-us') ?>" class="hover:underline transition-colors">The Sanctity of Braj</a></li>
                        <li><a href="<?= url('/contact-us') ?>" class="hover:underline transition-colors">Private Client Office</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h4 class="font-editorial text-lg text-white mb-5 uppercase tracking-widest font-normal">Private Client Desk</h4>
                    <p class="text-xs leading-relaxed opacity-80">
                        Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406
                    </p>
                    <div class="font-mono text-sm space-y-1" :style="{ color: 'var(--theme-accent)' }">
                        <div><a href="tel:+919871731303" class="hover:underline">+91 9871731303</a></div>
                        <div><a href="tel:+917409767452" class="hover:underline">+91 7409767452</a></div>
                    </div>
                    <p class="text-[11px] opacity-60">
                        concierge@gleamrealty.com
                    </p>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] opacity-60 gap-4">
                <div>&copy; <?= date('Y') ?> GLEAMREALTY PRIVATE LIMITED. All rights reserved. RERA and MVDA compliant.</div>
                <div class="flex gap-6">
                    <a href="<?= url('/admin/login') ?>" class="hover:opacity-100 transition-opacity">Executive Portal</a>
                    <span>&bull;</span>
                    <a href="<?= url('/about-us') ?>" class="hover:opacity-100 transition-opacity">Privacy &amp; Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Lenis & GSAP Micro-Interactions Script -->
    <script>
        // 1. Smooth Scroll Engine: Initialize Lenis in your main layout
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Connect Lenis to ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);

        // 2. GSAP ScrollTrigger Micro-Interactions
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Hero Section Organic Luxury Entrance Animation (Snappy, Non-blocking Choreography)
            if (document.querySelector('.hero-section')) {
                gsap.from('.hero-badge', { opacity: 0, y: 10, duration: 0.4, ease: 'power2.out' });
                gsap.from('.hero-title', { opacity: 0, y: 16, duration: 0.5, delay: 0.05, ease: 'power2.out' });
                gsap.from('.hero-showcase', { opacity: 0, y: 16, scale: 0.98, duration: 0.5, delay: 0.08, ease: 'power2.out' });
                gsap.from('.hero-desc', { opacity: 0, y: 12, duration: 0.45, delay: 0.1, ease: 'power2.out' });
                gsap.from('.hero-cta', { opacity: 0, y: 10, duration: 0.4, delay: 0.12, stagger: 0.05, ease: 'power2.out' });
            }

            // Rule 2: Text Reveal on Scroll - Fade headings up by 30px with 0.8s duration
            gsap.utils.toArray('h1, h2, .reveal-heading').forEach((heading) => {
                if (heading.closest('[x-cloak]') || heading.closest('#slide-over-title') || heading.classList.contains('hero-title')) return;
                gsap.from(heading, {
                    scrollTrigger: {
                        trigger: heading,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    opacity: 0,
                    y: 30,
                    duration: 0.8,
                    ease: 'power2.out'
                });
            });

            // Rule 3: Subtle Parallax on Media - Apply 5% to 8% vertical translate on project feature banners without scroll jitter
            gsap.utils.toArray('.parallax-media').forEach((media) => {
                gsap.to(media, {
                    scrollTrigger: {
                        trigger: media.parentElement || media,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: 1
                    },
                    yPercent: 7, // 7% vertical translate (within 5% - 8% range)
                    ease: 'none'
                });
            });

            // Stagger reveal for project cards
            gsap.utils.toArray('.reveal-card').forEach((card) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 85%',
                        toggleActions: 'play none none none'
                    },
                    opacity: 0,
                    y: 35,
                    duration: 0.8,
                    ease: 'power2.out'
                });
            });

            // Philosophy text block reveal
            gsap.utils.toArray('.reveal-quote').forEach((quote) => {
                gsap.from(quote, {
                    scrollTrigger: {
                        trigger: quote,
                        start: 'top 80%',
                    },
                    opacity: 0,
                    x: -25,
                    duration: 0.9,
                    ease: 'power3.out'
                });
            });
        });
    </script>

</body>
</html>
