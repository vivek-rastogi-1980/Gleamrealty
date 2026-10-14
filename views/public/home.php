<?php
    // Fallback variables in case template is loaded without controller injection
    if (!isset($hero)) {
        $hero = \App\Models\Setting::getHero();
    }
    if (!isset($metrics)) {
        $metrics = \App\Models\Setting::getMetrics();
    }
    if (!isset($home_sections)) {
        $home_sections = \App\Models\Setting::getHomeSections();
    }
    if (!isset($projects)) {
        $allProjects = \App\Models\Project::all();
        $projects = array_values(array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1));
    }
    if (!isset($latest_blogs)) {
        $latest_blogs = \App\Models\Blog::recent(3);
    }
?>

<style>
/* ==========================================================
   HOME PAGE TYPOGRAPHY & CONTRAST (PER USER REQUEST)
   - Minimum font size: 1.0 rem (16px)
   - Line-height: 1.6 rem (25.6px)
   - Remove opacity from .text-slate-600
   - Replace all grey color font with solid black (#000000)
   ========================================================== */

#homepage-root,
#homepage-root p,
#homepage-root li,
#homepage-root a,
#homepage-root button,
#homepage-root input,
#homepage-root select,
#homepage-root textarea,
#homepage-root label,
#homepage-root span {
    line-height: 1.6rem;
}

#homepage-root p {
    font-size: max(1.0rem, 1em) !important;
    line-height: 1.6rem !important;
    color: #000000 !important;
}

#homepage-root .text-xs,
#homepage-root .text-sm,
#homepage-root .text-\[9px\],
#homepage-root .text-\[9\.5px\],
#homepage-root .text-\[10px\],
#homepage-root .text-\[11px\],
#homepage-root .text-\[12px\],
#homepage-root .text-\[13px\],
#homepage-root .text-\[14px\],
#homepage-root .text-\[15px\] {
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
}

/* Remove opacity from .text-slate-600 */
.text-slate-600,
#homepage-root .text-slate-600 {
    --tw-text-opacity: 1 !important;
    opacity: 1 !important;
}

/* Replace all grey color font with black color */
#homepage-root .text-slate-400,
#homepage-root .text-slate-500,
#homepage-root .text-slate-600,
#homepage-root .text-slate-700,
#homepage-root .text-slate-800,
#homepage-root .text-gray-400,
#homepage-root .text-gray-500,
#homepage-root .text-gray-600,
#homepage-root .text-gray-700,
#homepage-root .text-stone-400,
#homepage-root .text-stone-500,
#homepage-root .text-stone-600,
#homepage-root .text-zinc-400,
#homepage-root .text-zinc-500,
#homepage-root .text-zinc-600 {
    color: #000000 !important;
    --tw-text-opacity: 1 !important;
    opacity: 1 !important;
}

#homepage-root input,
#homepage-root select,
#homepage-root textarea {
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
    color: #000000 !important;
}

#homepage-root input::placeholder,
#homepage-root textarea::placeholder {
    color: #000000 !important;
    opacity: 0.65 !important;
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
}

/* ==========================================================
   BACKGROUND-AWARE FONT CONTRAST ENGINE (USER REQUIREMENT)
   - Elements directly on dark backgrounds stay crisp white/light
   - Elements inside light cards/boxes stay solid black/dark blue
   ========================================================== */
#homepage-root .text-white,
#homepage-root [class*="bg-black"] .text-white,
#homepage-root [class*="bg-stone-900"] .text-white,
#homepage-root .btn-bronze,
#homepage-root .btn-bronze *,
#homepage-root [class*="bg-gradient-to-t"] .text-white,
#homepage-root [class*="bg-gradient-to-t"] .text-white * {
    color: #FFFFFF !important;
}

/* Direct typography on Dark Blue sections */
#homepage-root [class*="bg-[#0B1B3D]"] > div > div > h2,
#homepage-root [class*="bg-[#0B1B3D]"] > div > h2,
#homepage-root [class*="bg-[#0B1B3D]"] .section-dark-title,
#homepage-root [class*="bg-[#0B1B3D]"] > div > div > p,
#homepage-root [class*="bg-[#0B1B3D]"] > div > p,
#homepage-root [class*="bg-[#0B1B3D]"] .section-dark-desc {
    color: #FFFFFF !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .text-slate-200,
#homepage-root [class*="bg-[#0B1B3D]"] .text-slate-300,
#homepage-root [class*="bg-[#0B1B3D]"] p.text-slate-200,
#homepage-root [class*="bg-[#0B1B3D]"] p.text-slate-300 {
    color: #E2E8F0 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .section-dark-accent,
#homepage-root [class*="bg-[#0B1B3D]"] .text-sky-400,
#homepage-root [class*="bg-[#0B1B3D]"] .text-sky-300,
#homepage-root [class*="bg-[#0B1B3D]"] .text-\[\#38BDF8\],
#homepage-root [class*="bg-[#0B1B3D]"] [class*="text-[#38BDF8]"],
#homepage-root [class*="bg-[#0B1B3D]"] .about-subtitle,
#homepage-root #about .about-subtitle,
#homepage-root #about p.about-subtitle {
    color: #38BDF8 !important;
}

/* ==========================================================
   LIGHT CARDS & COMPONENTS INSIDE DARK SECTIONS
   (Feature Cards, Property Cards, Enquiry Container)
   ========================================================== */
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="bg-[#F8FAFC]"],
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] {
    color: #000000 !important;
}

/* Titles and links inside light cards */
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white h3,
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white h3 a,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="bg-[#F8FAFC]"] h3,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] h2,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] h4 {
    color: #0F172A !important;
    font-weight: 700 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .bg-white h3 a:hover {
    color: #0284C7 !important;
}

/* Body text & descriptions inside light cards */
#homepage-root [class*="bg-[#0B1B3D]"] [class*="bg-[#F8FAFC]"] p,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] p {
    color: #334155 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .bg-white p,
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white div:not([class*="bg-slate-900"]):not([class*="bg-[#E0F2FE]"]):not([class*="bg-sky-100"]) span:not([class*="text-[#0369A1]"]):not([class*="text-sky-800"]):not([class*="text-[#0284C7]"]) {
    color: #000000 !important;
}

/* Blue accents and eyebrow labels inside light cards */
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] span[class*="text-[#0284C7]"],
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] .text-\[\#0284C7\],
#homepage-root [class*="bg-[#0B1B3D]"] [class*="bg-[#F8FAFC]"] [class*="text-[#0284C7]"] {
    color: #0284C7 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .text-\[\#0369A1\],
#homepage-root [class*="bg-[#0B1B3D]"] [class*="text-[#0369A1]"] {
    color: #0369A1 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .text-sky-800,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="text-sky-800"] {
    color: #075985 !important;
}

/* Checkmarks inside enquiry container */
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] .flex.items-center.gap-1\.5 span:last-child {
    color: #0F172A !important;
    font-weight: 500 !important;
}

/* Form inputs inside enquiry container */
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] input,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] select,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] textarea {
    color: #000000 !important;
    background-color: #FFFFFF !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] input::placeholder,
#homepage-root [class*="bg-[#0B1B3D]"] [class*="from-[#F0F7FF]"] textarea::placeholder {
    color: #64748B !important;
    opacity: 1 !important;
}

/* Action links inside property cards */
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white a.group-hover\:text-\[\#0284C7\] {
    color: #000000 !important;
}

#homepage-root [class*="bg-[#0B1B3D]"] .bg-white a.group-hover\:text-\[\#0284C7\]:hover {
    color: #0284C7 !important;
}

/* Dark price tag overlay on property cards */
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white [class*="bg-slate-900"],
#homepage-root [class*="bg-[#0B1B3D]"] .bg-white [class*="bg-slate-900"] * {
    color: #FFFFFF !important;
}

#homepage-root .btn-bronze {
    background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%) !important;
    color: #FFFFFF !important;
}

#homepage-root .btn-bronze:hover {
    background: linear-gradient(135deg, #0369A1 0%, #075985 100%) !important;
}

#homepage-root [class*="bg-black"] p.text-slate-300,
#homepage-root .text-white p.text-slate-300 {
    color: #E2E8F0 !important;
}

#homepage-root .text-amber-300,
#homepage-root [class*="bg-black"] .text-amber-300,
#homepage-root .text-white .text-amber-300 {
    color: #38BDF8 !important;
}
</style>

<div id="homepage-root" class="w-full text-[1.0rem] leading-[1.6rem] text-black">



<!-- ==========================================================
     1. HERO SHOWCASE SECTION (MATCHING MOCKUP IMAGE)
     Grand Palatial Haveli Architecture & Water Reflection
     ========================================================== -->
<section class="relative w-full min-h-[720px] lg:min-h-[800px] flex flex-col justify-between overflow-hidden bg-slate-50 text-black pt-32 sm:pt-36 lg:pt-40 pb-8"
         x-data="{ videoModal: false }">

    <?php 
        $heroBg = !empty($hero['bg_image']) ? $hero['bg_image'] : 'uploads/hero/hero_braj_haveli_hd.jpg';
        $titleAccent = !empty($hero['title_accent']) ? $hero['title_accent'] : 'Residences';
    ?>
    <!-- Background Image Layer: Grand Sandstone Haveli Palace with Water Reflection -->
    <div class="absolute inset-0 overflow-hidden z-0 pointer-events-none">
        <img src="<?= asset($heroBg) ?>"
             alt="<?= e($hero['title_main'] ?? 'Royal Braj Haveli Residences') ?>"
             class="w-full h-full object-cover object-center scale-102 transition-transform duration-[12000ms] ease-out will-change-transform"
             loading="eager"
             fetchpriority="high">
        <!-- Soft Ambient Lighting & Legibility Gradient with Subtle Blue Tint -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/80 to-sky-100/30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-white/90 via-transparent to-sky-50/40"></div>
    </div>

    <!-- Main Hero Content Container -->
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 my-auto z-10 py-6">
        <div class="max-w-3xl space-y-6 text-left">
            <!-- Eyebrow Pill -->
            <div class="inline-flex items-center gap-2">
                <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-[#0284C7]">
                    <?= e($hero['eyebrow'] ?? 'TIMELESS HERITAGE. MODERN LIVING.') ?>
                </span>
            </div>

            <!-- Grand Title -->
            <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-black leading-[1.06] drop-shadow-xs">
                <?= e($hero['title_main'] ?? 'Royal Braj Haveli') ?><br>
                <span class="text-[#0284C7] font-serif font-normal italic"><?= e($titleAccent) ?></span>
            </h1>

            <!-- Subtitle -->
            <p class="text-black text-[1.0rem] sm:text-base leading-[1.6rem] lg:text-lg max-w-xl font-normal leading-relaxed">
                <?= e($hero['subtitle'] ?? 'A rare blend of tradition, tranquility and modern comfort in the divine land of Braj.') ?>
            </p>

            <!-- Dual Action CTAs Matching Mockup -->
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <!-- Explore Project (Royal Azure Blue) -->
                <a href="<?= e($hero['cta_link'] ?? '#sanctuaries') ?>"
                   class="btn-bronze inline-flex items-center justify-center gap-2 px-6 sm:px-7 py-3 sm:py-3.5 rounded-md text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.14em] shadow-md hover:shadow-lg transition-all">
                    <span><?= e($hero['cta_text'] ?? 'EXPLORE PROJECT') ?></span>
                    <span class="text-[1.0rem] leading-[1.6rem] font-light">&rarr;</span>
                </a>

                <!-- Watch Video (White Pill with Circular Play Icon) -->
                <button type="button"
                        @click="videoModal = true"
                        class="inline-flex items-center justify-center gap-2.5 px-5 sm:px-6 py-2.5 sm:py-3 rounded-full bg-white/95 hover:bg-white text-black text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.12em] border border-sky-200/80 shadow-sm hover:shadow-md transition-all cursor-pointer group">
                    <span class="w-6 h-6 rounded-full flex items-center justify-center bg-[#0284C7] text-white shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-2.5 h-2.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </span>
                    <span><?= e($hero['video_text'] ?? 'WATCH VIDEO') ?></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Hero 3 Glassmorphic Feature Cards (Matching Mockup) -->
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 z-10 pt-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4">
            <?php 
                $heroCards = $hero['cards'] ?? [
                    ['image' => 'uploads/hero/mini_thumb_1.jpg', 'title' => 'Heritage Inspired Architecture', 'sub' => 'Modern Amenities'],
                    ['image' => 'uploads/hero/mini_thumb_2.jpg', 'title' => 'Serene Green Surroundings', 'sub' => 'Peaceful Living'],
                    ['image' => 'uploads/hero/mini_thumb_3.jpg', 'title' => 'A Spiritual Lifestyle', 'sub' => 'Closer to Divinity'],
                ];
            ?>
            <?php foreach ($heroCards as $hc): ?>
                <div class="bg-white/95 dark:bg-stone-900/90 backdrop-blur-md border border-slate-200/90 dark:border-stone-700/80 rounded-xl p-3 sm:p-3.5 shadow-lg flex items-center gap-3.5 hover:shadow-xl hover:border-sky-300 hover:-translate-y-0.5 transition-all">
                    <div class="w-16 h-12 rounded-lg overflow-hidden shrink-0 shadow-xs bg-sky-100">
                        <img src="<?= asset($hc['image'] ?? 'uploads/hero/mini_thumb_1.jpg') ?>" alt="<?= e($hc['title'] ?? 'Feature') ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-black dark:text-white truncate"><?= e($hc['title'] ?? '') ?></h3>
                        <p class="text-[1.0rem] leading-[1.6rem] text-slate-700 dark:text-slate-300 truncate"><?= e($hc['sub'] ?? '') ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Virtual Tour Video Modal Overlay -->
    <div x-show="videoModal"
         x-cloak
         @keydown.escape.window="videoModal = false"
         class="fixed inset-0 z-50 overflow-y-auto p-4 flex items-center justify-center min-h-screen">
        <div x-show="videoModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="videoModal = false"
             class="fixed inset-0 bg-black/85 backdrop-blur-md"></div>

        <div x-show="videoModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative w-full max-w-4xl bg-stone-900 rounded-2xl overflow-hidden shadow-2xl z-10">
            <button @click="videoModal = false"
                    type="button"
                    class="absolute top-3 right-3 z-20 text-white/80 hover:text-white bg-black/50 p-2 rounded-full cursor-pointer"
                    aria-label="Close video">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="aspect-video w-full bg-black">
                <iframe class="w-full h-full"
                        src="<?= e($hero['video_url'] ?? 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1&mute=0') ?>"
                        title="<?= e($hero['title_main'] ?? 'Vrindavan Sanctuary') ?> Virtual Tour"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>

</section>


<!-- ==========================================================
     2. STATS BAR / TRUST METRICS STRIP (MATCHING MOCKUP)
     5 Horizontal Trust Metric Badges in Clean Row
     ========================================================== -->
<section class="relative bg-white border-y border-slate-100 py-6 sm:py-7 transition-colors z-20 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 sm:gap-4 items-center">
            
            <!-- Metric 1 -->
            <div class="flex items-center gap-3 justify-start md:justify-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="font-bold text-[1.0rem] sm:text-base leading-[1.6rem] text-[#0369A1] dark:text-sky-300 font-mono leading-tight">
                        <?= e($home_sections['metrics']['m1_val'] ?? '250+') ?>
                    </div>
                    <div class="text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                        <?= e($home_sections['metrics']['m1_sub'] ?? 'Happy Families') ?>
                    </div>
                </div>
            </div>

            <!-- Metric 2 -->
            <div class="flex items-center gap-3 justify-start md:justify-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="font-bold text-[1.0rem] sm:text-base leading-[1.6rem] text-[#0369A1] dark:text-sky-300 font-mono leading-tight">
                        <?= e($home_sections['metrics']['m2_val'] ?? '50+ Acres') ?>
                    </div>
                    <div class="text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                        <?= e($home_sections['metrics']['m2_sub'] ?? 'Land Bank') ?>
                    </div>
                </div>
            </div>

            <!-- Metric 3 -->
            <div class="flex items-center gap-3 justify-start md:justify-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="font-bold text-[1.0rem] sm:text-base leading-[1.6rem] text-[#0369A1] dark:text-sky-300 font-mono leading-tight">
                        <?= e($home_sections['metrics']['m3_val'] ?? '20+ World Class') ?>
                    </div>
                    <div class="text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                        <?= e($home_sections['metrics']['m3_sub'] ?? 'Amenities') ?>
                    </div>
                </div>
            </div>

            <!-- Metric 4 -->
            <div class="flex items-center gap-3 justify-start md:justify-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="font-bold text-[1.0rem] sm:text-base leading-[1.6rem] text-[#0369A1] dark:text-sky-300 font-mono leading-tight">
                        <?= e($home_sections['metrics']['m4_val'] ?? '100%') ?>
                    </div>
                    <div class="text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                        <?= e($home_sections['metrics']['m4_sub'] ?? 'Clear Titles') ?>
                    </div>
                </div>
            </div>

            <!-- Metric 5 -->
            <div class="col-span-2 md:col-span-1 flex items-center gap-3 justify-start md:justify-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="font-bold text-[1.0rem] sm:text-base leading-[1.6rem] text-[#0369A1] dark:text-sky-300 font-mono leading-tight">
                        <?= e($home_sections['metrics']['m5_val'] ?? 'Prime') ?>
                    </div>
                    <div class="text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                        <?= e($home_sections['metrics']['m5_sub'] ?? 'Location') ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================================
     3. ABOUT SECTION: "ABOUT ROYAL BRAJ HAVELI"
     The Sanctity of Braj Bhumi & Featured Video Gate Card
     ========================================================== -->
<section id="about" class="py-20 sm:py-24 bg-[#0B1B3D] text-white transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">
            
            <!-- Left Column: Story & 2x2 Feature Matrix (7 cols) -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Eyebrow -->
                <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-[#38BDF8] block">
                    <?= e($home_sections['about']['eyebrow'] ?? 'ABOUT ROYAL BRAJ HAVELI') ?>
                </span>

                <!-- Title -->
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white leading-[1.15]">
                    <?= e($home_sections['about']['title'] ?? 'The Sanctity of Braj Bhumi') ?>
                </h2>

                <!-- Subtitle -->
                <p class="about-subtitle text-[#38BDF8] text-base sm:text-lg font-medium leading-snug" style="color: #38BDF8 !important;">
                    <?= e($home_sections['about']['subtitle'] ?? 'A home where spirituality meets modern living') ?>
                </p>

                <!-- Narrative Paragraph -->
                <p class="text-[1.0rem] leading-[1.6rem] text-slate-200 font-normal leading-relaxed">
                    <?= e($home_sections['about']['p1'] ?? 'Royal Braj Haveli Residences is not merely a residential project; it is a celebration of land, culture and eternal legacy. Located in the sacred town of Vrindavan, this premium development offers a peaceful and dignified lifestyle surrounded by greenery, temples and divine energy.') ?>
                </p>

                <!-- 2x2 Feature Grid (Matching Mockup) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-3">
                    <?php 
                        $features = $home_sections['about']['features'] ?? [
                            ['title' => 'Spiritual Environment', 'desc' => 'Live close to temples and sacred sites', 'icon' => 'lotus'],
                            ['title' => 'Modern Amenities', 'desc' => 'A perfect blend of tradition & comfort', 'icon' => 'villa'],
                            ['title' => 'Green & Serene Living', 'desc' => 'Lush landscapes and open spaces', 'icon' => 'tree'],
                            ['title' => 'Strong Investment Potential', 'desc' => 'In a rapidly growing spiritual destination', 'icon' => 'chart'],
                        ];
                    ?>
                    <?php foreach ($features as $ft): ?>
                        <div class="p-4 rounded-xl border border-slate-200 dark:border-stone-800 bg-[#F8FAFC] dark:bg-stone-800/60 flex items-start gap-3.5 shadow-2xs hover:border-[#0284C7]/50 hover:shadow-md transition-all">
                            <div class="w-10 h-10 rounded-lg bg-[#E0F2FE] text-[#0284C7] dark:bg-sky-950/60 dark:text-sky-400 flex items-center justify-center shrink-0">
                                <?php if (($ft['icon'] ?? '') === 'villa'): ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                <?php elseif (($ft['icon'] ?? '') === 'tree'): ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v18m0-18C8.5 3 6 5.5 6 9c0 3.5 3 6 6 6m0-12c3.5 0 6 2.5 6 6 0 3.5-3 6-6 6m-6 0c-2.5 0-4 1.5-4 3.5 0 2 2 3.5 4 3.5m12-7c2.5 0 4 1.5 4 3.5 0 2-2 3.5-4 3.5"/></svg>
                                <?php elseif (($ft['icon'] ?? '') === 'chart'): ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                <?php else: ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 009-9c0-4.97-4.03-9-9-9s-9 4.03-9 9a9 9 0 009 9zm0-18v18m0-9a9 9 0 019 0m-9 0a9 9 0 00-9 0"/></svg>
                                <?php endif; ?>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-slate-950 font-sans"><?= e($ft['title'] ?? '') ?></h3>
                                <p class="text-[1.0rem] leading-[1.6rem] text-slate-700 mt-0.5 leading-snug"><?= e($ft['desc'] ?? '') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Column: Featured Video Card with "SHRI VRINDAVAN" Gate (5 cols) -->
            <?php $vc = $home_sections['about']['video_card'] ?? ['image' => 'uploads/hero/vrindavan_gate_hd.jpg', 'badge' => 'Featured Video', 'title' => 'Shri Vrinda Awaits You', 'desc' => 'Take a virtual tour and experience the beauty, serenity and spirituality of Braj.', 'video_url' => 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1']; ?>
            <div class="lg:col-span-5" x-data="{ localVideo: false }">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-slate-200/80 dark:border-stone-700 group cursor-pointer aspect-[4/3]"
                     @click="localVideo = true">
                    <!-- Image -->
                    <img src="<?= asset($vc['image'] ?? 'uploads/hero/vrindavan_gate_hd.jpg') ?>"
                         alt="<?= e($vc['title'] ?? 'Featured Video') ?>"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    
                    <!-- Dark Gradient Vignette for Text Contrast -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/35 to-transparent"></div>

                    <!-- Play Button Centered/Bottom-Left Overlay -->
                    <div class="absolute bottom-6 left-6 right-6 flex items-start gap-4">
                        <!-- Big Azure Play Button -->
                        <div class="w-12 h-12 rounded-full bg-[#0284C7] text-white flex items-center justify-center shrink-0 shadow-xl shadow-sky-900/40 group-hover:scale-110 group-hover:bg-[#0369A1] transition-all">
                            <svg class="w-5 h-5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <div class="min-w-0 text-white">
                            <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.2em] text-[#38BDF8] block"><?= e($vc['badge'] ?? 'Featured Video') ?></span>
                            <h3 class="font-bold text-base sm:text-lg leading-tight mt-0.5"><?= e($vc['title'] ?? 'Shri Vrinda Awaits You') ?></h3>
                            <p class="text-[1.0rem] leading-[1.6rem] text-slate-300 leading-snug mt-1 font-light">
                                <?= e($vc['desc'] ?? 'Take a virtual tour and experience the beauty, serenity and spirituality of Braj.') ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Video Popup Triggered by Local Card -->
                <div x-show="localVideo" x-cloak class="fixed inset-0 z-50 overflow-y-auto p-4 flex items-center justify-center min-h-screen">
                    <div class="fixed inset-0 bg-black/85 backdrop-blur-md" @click="localVideo = false"></div>
                    <div class="relative w-full max-w-4xl bg-stone-900 rounded-2xl overflow-hidden shadow-2xl z-10">
                        <button @click="localVideo = false" type="button" class="absolute top-3 right-3 z-20 text-white/80 hover:text-white bg-black/50 p-2 rounded-full cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        <div class="aspect-video w-full bg-black">
                            <iframe class="w-full h-full" src="<?= e($vc['video_url'] ?? 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1') ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ==========================================================
     4. OUR HIGHLIGHTS (MATCHING MOCKUP)
     4 Photographic Cards: Commercial Plots, Villas, Plots, Flats
     ========================================================== -->
<section class="py-16 sm:py-20 bg-white border-t border-slate-200 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 pb-4 border-b border-slate-200 dark:border-stone-800">
            <div>
                <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-blue-900 block mb-1">
                    <?= e($home_sections['highlights']['eyebrow'] ?? 'OUR HIGHLIGHTS') ?>
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-black dark:text-white">
                    <?= e($home_sections['highlights']['title'] ?? 'A glimpse of what makes Royal Braj Haveli special') ?>
                </h2>
            </div>
            <a href="<?= url($home_sections['highlights']['btn_link'] ?? '/projects') ?>"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-md border border-slate-300 dark:border-stone-700 text-black dark:text-slate-300 hover:text-[#0284C7] hover:border-[#0284C7] text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider transition-colors shrink-0">
                <span><?= e($home_sections['highlights']['btn_text'] ?? 'VIEW ALL PROJECTS') ?></span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- 4 Photographic Category Cards in a Row -->
        <?php
            $hlCards = $home_sections['highlights']['cards'] ?? [
                'commercial' => ['title' => 'COMMERCIAL PLOTS', 'link' => '/location/mathura', 'image' => 'uploads/projects/highlight_commercial_hd.jpg'],
                'villa' => ['title' => 'VILLAS', 'link' => '/luxury-villas-in-vrindavan', 'image' => 'uploads/projects/highlight_villas_hd.jpg'],
                'plot' => ['title' => 'PLOTS', 'link' => '/residential-plots-in-vrindavan', 'image' => 'uploads/projects/highlight_plots_hd.jpg'],
                'flat' => ['title' => 'FLATS', 'link' => '/flats-apartments-in-vrindavan', 'image' => 'uploads/projects/highlight_flats_hd.jpg'],
            ];
        ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
            <?php foreach (['commercial', 'villa', 'plot', 'flat'] as $k): ?>
                <?php $c = $hlCards[$k] ?? ['title' => strtoupper($k), 'link' => '/projects', 'image' => '']; ?>
                <a href="<?= url($c['link'] ?? '/projects') ?>"
                   class="group relative aspect-[16/11] rounded-xl overflow-hidden shadow-md bg-stone-900 block border border-slate-200/50">
                    <img src="<?= asset($c['image'] ?? '') ?>"
                         alt="<?= e($c['title'] ?? '') ?>"
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between">
                        <span class="font-bold text-[1.0rem] leading-[1.6rem] uppercase tracking-[0.14em] text-white group-hover:text-sky-300 transition-colors">
                            <?= e($c['title'] ?? '') ?>
                        </span>
                        <span class="text-white text-[1.0rem] leading-[1.6rem] font-bold transition-transform group-hover:translate-x-1">&rarr;</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ==========================================================
     5. EXPLORE OUR PROPERTIES (MATCHING MOCKUP)
     Sanctuaries for the Discerning & 4 Property Cards
     ========================================================== -->
<section id="sanctuaries" class="py-20 sm:py-24 bg-[#0B1B3D] text-white transition-colors"
         x-data="{ activeFilter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php $propHeader = $home_sections['properties_header'] ?? []; ?>
        <!-- Header & Category Filter Pills -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl space-y-2">
                <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-[#38BDF8] block">
                    <?= htmlspecialchars($propHeader['eyebrow'] ?? 'EXPLORE OUR PROPERTIES') ?>
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-[44px] font-bold tracking-tight text-white leading-[1.15]">
                    <?= htmlspecialchars($propHeader['title'] ?? 'Sanctuaries for the Discerning') ?>
                </h2>
                <p class="text-[1.0rem] leading-[1.6rem] text-slate-200 leading-relaxed font-normal">
                    <?= nl2br(htmlspecialchars($propHeader['subtitle'] ?? 'Discover a range of thoughtfully designed properties in and around Vrindavan. Each project is created to offer peace, prosperity and a higher way of living.')) ?>
                </p>
            </div>
        </div>

        <!-- Dynamic Featured Property Cards (Controllable in Admin -> Homepage Content CMS) -->
        <?php
            $featuredIds = $home_sections['featured_project_ids'] ?? [];
            if (is_array($featuredIds)) {
                $featuredIds = array_unique($featuredIds);
            }
            $featuredList = [];
            if (!empty($featuredIds) && is_array($featuredIds)) {
                foreach ($featuredIds as $fId) {
                    foreach (($projects ?? []) as $pr) {
                        if ((int)$pr['id'] === (int)$fId) {
                            $featuredList[] = $pr;
                            break;
                        }
                    }
                }
            }
            if (empty($featuredList)) {
                $featuredList = array_slice($projects ?? [], 0, 4);
            }
        ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php foreach ($featuredList as $p): ?>
                <?php 
                    $heroImg = \App\Models\Project::getHeroImage((int)$p['id']) ?: 'uploads/projects/prop_greens_clean.jpg';
                    $filterCat = 'plots';
                    $pType = strtolower($p['project_type'] ?? '');
                    if (str_contains($pType, 'villa') || str_contains($pType, 'residential') || str_contains($pType, 'flat') || str_contains($pType, 'apartment')) {
                        $filterCat = 'residential';
                    } elseif (str_contains($pType, 'commercial')) {
                        $filterCat = 'commercial';
                    }
                ?>
                <div x-show="activeFilter === 'all' || activeFilter === '<?= $filterCat ?>' || activeFilter === 'plots'"
                     class="bg-white dark:bg-stone-800 rounded-xl border border-slate-200/90 dark:border-stone-700 overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.06)] hover:shadow-xl hover:border-sky-300 dark:hover:border-sky-500 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Image & Badges -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                            <img src="<?= media_url($heroImg) ?>"
                                 alt="<?= e($p['name']) ?>"
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <!-- Top Badges -->
                            <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5 z-10 flex-wrap">
                                <?php if (!empty($p['mvda_approved'])): ?>
                                    <span class="px-2 py-0.5 rounded text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider bg-[#E0F2FE] text-[#0369A1] shadow-xs">
                                        MVDA APPROVED
                                    </span>
                                <?php else: ?>
                                    <span class="px-2 py-0.5 rounded text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-800 shadow-xs">
                                        READY TO MOVE
                                    </span>
                                <?php endif; ?>
                                <span class="px-2 py-0.5 rounded text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider bg-sky-100 text-sky-800 shadow-xs">
                                    <?= e($p['project_type']) ?>
                                </span>
                            </div>
                            <!-- Price Pill on Bottom Right -->
                            <?php if (!empty($p['starting_price'])): ?>
                                <div class="absolute bottom-2.5 right-2.5 bg-slate-900/90 border border-sky-400/25 backdrop-blur-xs text-white text-[1.0rem] leading-[1.6rem] font-bold px-2.5 py-1 rounded shadow-md tracking-tight">
                                    <?= e($p['starting_price']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Meta Specification Icons Strip -->
                        <div class="px-3.5 py-2.5 bg-slate-50/70 dark:bg-stone-800/80 border-b border-slate-100 dark:border-stone-700/60 flex items-center justify-between text-[1.0rem] leading-[1.6rem] text-black dark:text-black font-medium">
                            <span class="flex items-center gap-1" title="Unit Size">
                                <svg class="w-3.5 h-3.5 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg> 
                                <?= e($p['project_size'] ?: '150 Sq.Yd') ?>
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg> 
                                Freehold
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 
                                <?= !empty($p['mvda_approved']) ? 'MVDA Appr.' : '100% Reg.' ?>
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 space-y-2">
                            <h3 class="font-sans font-bold text-[1.0rem] leading-[1.6rem] sm:text-base text-black dark:text-white leading-snug group-hover:text-[#0284C7] transition-colors min-h-[44px]">
                                <a href="<?= url('/projects/' . $p['slug']) ?>">
                                    <?= e($p['name']) ?>
                                </a>
                            </h3>
                            <div class="flex items-center gap-1.5 text-[1.0rem] leading-[1.6rem] text-black">
                                <svg class="w-3.5 h-3.5 text-[#0284C7] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                <span><?= e($p['location']) ?></span>
                            </div>
                            <div class="flex items-center gap-3 text-[1.0rem] leading-[1.6rem] text-black dark:text-black pt-1">
                                <span class="flex items-center gap-1.5 truncate"><span class="w-1.5 h-1.5 rounded-full bg-[#0284C7] shrink-0"></span> <?= e($p['tagline'] ?: 'Prime Location') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="p-4 pt-2 border-t border-slate-100 dark:border-stone-700/60 mt-2">
                        <a href="<?= url('/projects/' . $p['slug']) ?>"
                           class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider text-black dark:text-slate-200 group-hover:text-[#0284C7] inline-flex items-center justify-between w-full transition-colors">
                            <span>VIEW DETAILS</span>
                            <span class="transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ==========================================================
     6. LATEST NEWS & UPDATES (MATCHING MOCKUP)
     3 Editorial Cards with Thumbnails, Date & Read More
     ========================================================== -->
<section class="py-16 sm:py-20 bg-white border-t border-slate-200 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php $newsHeader = $home_sections['news_header'] ?? []; ?>
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 pb-4 border-b border-slate-200 dark:border-stone-800">
            <div>
                <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-[#9A6B2F] block mb-1">
                    <?= htmlspecialchars($newsHeader['eyebrow'] ?? 'LATEST NEWS & UPDATES') ?>
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold tracking-tight text-black dark:text-white">
                    <?= htmlspecialchars($newsHeader['title'] ?? 'Market Intelligence & Project Milestones') ?>
                </h2>
            </div>
            <a href="<?= url($newsHeader['button_link'] ?? '/blog') ?>"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-md border border-slate-300 dark:border-stone-700 text-black dark:text-slate-300 hover:text-[#9A6B2F] hover:border-[#9A6B2F] text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-wider transition-colors shrink-0">
                <span><?= htmlspecialchars($newsHeader['button_text'] ?? 'VIEW ALL UPDATES') ?></span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- News Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if (!empty($latest_blogs) && count($latest_blogs) > 0): ?>
                <?php foreach ($latest_blogs as $blogItem): ?>
                    <?php 
                        $blogImage = !empty($blogItem['featured_image']) ? asset($blogItem['featured_image']) : (!empty($blogItem['image']) ? asset($blogItem['image']) : asset('uploads/projects/news_thumb_1.jpg'));
                        $blogDate = !empty($blogItem['published_at']) ? date('M d, Y', strtotime($blogItem['published_at'])) : date('M d, Y');
                        $blogUrl = url('/blog/' . ($blogItem['slug'] ?? ''));
                    ?>
                    <article class="bg-white dark:bg-stone-900 rounded-xl p-3.5 border border-slate-200 dark:border-stone-800 flex items-center gap-3.5 shadow-xs hover:shadow-md transition-all group">
                        <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0 bg-slate-100">
                            <img src="<?= $blogImage ?>"
                                 alt="<?= htmlspecialchars($blogItem['title'] ?? 'Article') ?>"
                                 class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                        </div>
                        <div class="min-w-0 flex-1 space-y-1">
                            <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-black dark:text-white leading-snug group-hover:text-[#0284C7] transition-colors line-clamp-2">
                                <a href="<?= $blogUrl ?>">
                                    <?= htmlspecialchars($blogItem['title'] ?? '') ?>
                                </a>
                            </h3>
                            <div class="flex items-center justify-between text-[1.0rem] leading-[1.6rem] text-black">
                                <span><?= $blogDate ?></span>
                                <a href="<?= $blogUrl ?>" class="text-[#0284C7] hover:text-[#0369A1] font-bold inline-flex items-center gap-0.5 hover:underline">
                                    Read More &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback Mockup News Card 1 -->
                <article class="bg-white dark:bg-stone-900 rounded-xl p-3.5 border border-slate-200 dark:border-stone-800 flex items-center gap-3.5 shadow-xs hover:shadow-md transition-all group">
                    <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0 bg-slate-100">
                        <img src="<?= asset('uploads/projects/news_thumb_1.jpg') ?>"
                             alt="New Residential Plots"
                             class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                    </div>
                    <div class="min-w-0 flex-1 space-y-1">
                        <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-black dark:text-white leading-snug group-hover:text-[#0284C7] transition-colors line-clamp-2">
                            <a href="<?= url('/blog') ?>">
                                New Residential Plots Launched in Vrindavan
                            </a>
                        </h3>
                        <div class="flex items-center justify-between text-[1.0rem] leading-[1.6rem] text-black">
                            <span>Aug 10, 2024</span>
                            <a href="<?= url('/blog') ?>" class="text-[#0284C7] hover:text-[#0369A1] font-bold inline-flex items-center gap-0.5 hover:underline">
                                Read More &rarr;
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Fallback Mockup News Card 2 -->
                <article class="bg-white dark:bg-stone-900 rounded-xl p-3.5 border border-slate-200 dark:border-stone-800 flex items-center gap-3.5 shadow-xs hover:shadow-md transition-all group">
                    <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0 bg-slate-100">
                        <img src="<?= asset('uploads/projects/news_thumb_2.jpg') ?>"
                             alt="Why Invest in Vrindavan"
                             class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                    </div>
                    <div class="min-w-0 flex-1 space-y-1">
                        <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-black dark:text-white leading-snug group-hover:text-[#0284C7] transition-colors line-clamp-2">
                            <a href="<?= url('/blog') ?>">
                                Why Invest in Vrindavan Real Estate?
                            </a>
                        </h3>
                        <div class="flex items-center justify-between text-[1.0rem] leading-[1.6rem] text-black">
                            <span>Aug 05, 2024</span>
                            <a href="<?= url('/blog') ?>" class="text-[#0284C7] hover:text-[#0369A1] font-bold inline-flex items-center gap-0.5 hover:underline">
                                Read More &rarr;
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Fallback Mockup News Card 3 -->
                <article class="bg-white dark:bg-stone-900 rounded-xl p-3.5 border border-slate-200 dark:border-stone-800 flex items-center gap-3.5 shadow-xs hover:shadow-md transition-all group">
                    <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0 bg-slate-100">
                        <img src="<?= asset('uploads/projects/news_thumb_3.jpg') ?>"
                             alt="Development Update"
                             class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                    </div>
                    <div class="min-w-0 flex-1 space-y-1">
                        <h3 class="font-bold text-[1.0rem] leading-[1.6rem] text-black dark:text-white leading-snug group-hover:text-[#0284C7] transition-colors line-clamp-2">
                            <a href="<?= url('/blog') ?>">
                                Development Update: Shri Vrinda Greens
                            </a>
                        </h3>
                        <div class="flex items-center justify-between text-[1.0rem] leading-[1.6rem] text-black">
                            <span>Jul 28, 2024</span>
                            <a href="<?= url('/blog') ?>" class="text-[#0284C7] hover:text-[#0369A1] font-bold inline-flex items-center gap-0.5 hover:underline">
                                Read More &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- ==========================================================
     7. READY TO BEGIN? ENQUIRY BANNER (MATCHING MOCKUP)
     Temple Graphic + Form (Name, Email, Mobile, Interest, Msg)
     ========================================================== -->
<section id="inquire" class="py-16 sm:py-20 bg-[#0B1B3D] text-white border-t border-slate-200 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-br from-[#F0F7FF] via-[#F8FAFC] to-[#EFF6FF] dark:bg-stone-800/80 border border-[#BAE6FD] dark:border-stone-700 rounded-2xl p-6 sm:p-10 lg:p-12 shadow-lg relative overflow-hidden"
             x-data="{
                submitting: false,
                submitted: false,
                errMsg: '',
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    interest: 'Residential Plots',
                    message: ''
                },
                submitForm() {
                    this.errMsg = '';
                    if (!this.form.name || !this.form.name.trim()) {
                        this.errMsg = 'Please provide your full name.';
                        return;
                    }
                    if (!this.form.phone || !this.form.phone.trim()) {
                        this.errMsg = 'Please provide a valid contact phone number.';
                        return;
                    }
                    this.submitting = true;
                    fetch('<?= url('/api/inquiry.php') ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                        body: JSON.stringify({
                            name: this.form.name.trim(),
                            phone: this.form.phone.trim(),
                            email: this.form.email.trim(),
                            budget_range: this.form.interest,
                            message: this.form.message.trim()
                        })
                    })
                    .then(r => r.json())
                    .then(res => {
                        this.submitting = false;
                        if (res.status === 'success') {
                            this.submitted = true;
                        } else {
                            this.errMsg = res.message || 'Error submitting enquiry. Please call +91 9871731303.';
                        }
                    })
                    .catch(() => {
                        this.submitting = false;
                        this.errMsg = 'Network error. Please call +91 9871731303.';
                    });
                }
             }">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Details & Temple Sketch Artwork (5 cols) -->
                <?php $enquiryBanner = $home_sections['enquiry_banner'] ?? []; ?>
                <div class="lg:col-span-5 space-y-4">
                    <!-- Temple Shikhara Artwork -->
                    <?php if (!empty($enquiryBanner['watermark_image'])): ?>
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden border border-[#0284C7]/20 bg-white dark:bg-stone-900 shadow-xs flex items-center justify-center p-2">
                        <img src="<?= asset($enquiryBanner['watermark_image']) ?>" alt="Sacred Temple" class="w-full h-full object-contain filter contrast-125">
                    </div>
                    <?php endif; ?>

                    <span class="text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.24em] text-[#0284C7] block">
                        <?= htmlspecialchars($enquiryBanner['eyebrow'] ?? 'READY TO BEGIN?') ?>
                    </span>

                    <h2 class="font-serif text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-slate-950 leading-tight">
                        <?= nl2br(htmlspecialchars($enquiryBanner['title'] ?? "Enquire About\nYour Dream Property")) ?>
                    </h2>

                    <p class="text-[1.0rem] leading-[1.6rem] text-slate-700 font-normal leading-relaxed">
                        <?= nl2br(htmlspecialchars($enquiryBanner['subtitle'] ?? 'Fill out the form and our team will get in touch with you shortly.')) ?>
                    </p>

                    <!-- Trust Checkmarks Matching Mockup -->
                    <div class="flex flex-wrap items-center gap-4 pt-2 text-[1.0rem] leading-[1.6rem] text-slate-800 font-medium">
                        <?php 
                            $checks = $enquiryBanner['checkmarks'] ?? ['Quick Response', 'Expert Assistance', 'No Obligation'];
                            foreach ($checks as $check): 
                        ?>
                            <div class="flex items-center gap-1.5">
                                <span class="w-4 h-4 rounded-full bg-[#0284C7]/15 text-[#0284C7] flex items-center justify-center text-[1.0rem] leading-[1.6rem] font-bold">✓</span>
                                <span class="text-slate-800 font-semibold"><?= htmlspecialchars($check) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right Form (7 cols) -->
                <div class="lg:col-span-7">
                    
                    <template x-if="submitted">
                        <div class="bg-white dark:bg-stone-900 p-8 rounded-xl border border-[#0284C7]/30 text-center space-y-3 shadow-sm">
                            <div class="w-12 h-12 rounded-full bg-[#0284C7] text-white flex items-center justify-center mx-auto text-xl font-bold">✓</div>
                            <h4 class="font-serif text-xl font-bold text-black dark:text-white">Thank You for Your Enquiry</h4>
                            <p class="text-[1.0rem] leading-[1.6rem] text-black dark:text-slate-300 max-w-md mx-auto">
                                Our senior property advisor has been notified and will call you within 15 minutes to assist with floor plans, site visits, and pricing.
                            </p>
                        </div>
                    </template>

                    <template x-if="!submitted">
                        <form @submit.prevent="submitForm()" class="space-y-4">
                            <template x-if="errMsg">
                                <div class="p-3 text-[1.0rem] leading-[1.6rem] bg-rose-50 border border-rose-200 text-rose-600 rounded-lg" x-text="errMsg"></div>
                            </template>

                            <!-- Row 1: Full Name & Email Address -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <input type="text"
                                           x-model="form.name"
                                           required
                                           placeholder="Full Name*"
                                           class="w-full bg-white dark:bg-stone-900 border border-slate-300 dark:border-stone-700 rounded-md px-3.5 py-3 text-[1.0rem] leading-[1.6rem] focus:outline-none focus:ring-1 focus:ring-[#0284C7] focus:border-[#0284C7] text-black dark:text-white transition-colors placeholder:text-black">
                                </div>
                                <div>
                                    <input type="email"
                                           x-model="form.email"
                                           required
                                           placeholder="Email Address*"
                                           class="w-full bg-white dark:bg-stone-900 border border-slate-300 dark:border-stone-700 rounded-md px-3.5 py-3 text-[1.0rem] leading-[1.6rem] focus:outline-none focus:ring-1 focus:ring-[#0284C7] focus:border-[#0284C7] text-black dark:text-white transition-colors placeholder:text-black">
                                </div>
                            </div>

                            <!-- Row 2: Mobile Number & Interested In -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <input type="tel"
                                           x-model="form.phone"
                                           required
                                           placeholder="Contact Number* (e.g. 9871731303)"
                                           class="w-full bg-white dark:bg-stone-900 border border-slate-300 dark:border-stone-700 rounded-md px-3.5 py-3 text-[1.0rem] leading-[1.6rem] focus:outline-none focus:ring-1 focus:ring-[#0284C7] focus:border-[#0284C7] text-black dark:text-white transition-colors placeholder:text-black font-mono">
                                </div>
                                <div>
                                    <select x-model="form.interest"
                                            class="w-full bg-white dark:bg-stone-900 border border-slate-300 dark:border-stone-700 rounded-md px-3 py-3 text-[1.0rem] leading-[1.6rem] focus:outline-none focus:ring-1 focus:ring-[#0284C7] focus:border-[#0284C7] text-black dark:text-white transition-colors [&>option]:bg-white [&>option]:text-black dark:[&>option]:bg-stone-900 dark:[&>option]:text-white">
                                        <option value="Residential Plots">Interested in: Residential Plots</option>
                                        <option value="Luxury Villas">Interested in: Luxury Villas</option>
                                        <option value="Commercial Plots">Interested in: Commercial Plots</option>
                                        <option value="Flats & Apartments">Interested in: Flats &amp; Apartments</option>
                                        <option value="General Consultation">Interested in: General Consultation</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 3: Message -->
                            <div>
                                <textarea x-model="form.message"
                                          rows="3"
                                          placeholder="Message (Optional)&#10;Tell us your requirements..."
                                          class="w-full bg-white dark:bg-stone-900 border border-slate-300 dark:border-stone-700 rounded-md px-3.5 py-2.5 text-[1.0rem] leading-[1.6rem] focus:outline-none focus:ring-1 focus:ring-[#0284C7] focus:border-[#0284C7] text-black dark:text-white transition-colors placeholder:text-black"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                    :disabled="submitting"
                                    class="btn-bronze w-full py-3.5 rounded-md text-[1.0rem] leading-[1.6rem] font-bold uppercase tracking-[0.16em] shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <span x-show="!submitting">SUBMIT ENQUIRY &rarr;</span>
                                <span x-show="submitting">Sending Request...</span>
                            </button>
                        </form>
                    </template>

                </div>

            </div>

        </div>

    </div>
</section>

</div><!-- /#homepage-root -->
