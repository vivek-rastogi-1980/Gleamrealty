<?php
/**
 * About Us Page Template — Faithfully matching https://earthousing.com/about-us
 * Supports Gleamrealty Multi-Theme Engine (Green & White, Dark-Yellow, Blue & White)
 * 100% Dynamic with Admin CMS Management (/admin/about)
 */

$about = $about ?? \App\Models\Setting::getAboutSections();

// Image resolution helper to handle relative local uploads, public assets, or absolute URLs
$resolveImage = function (?string $path, string $fallback = '') {
    $img = !empty($path) ? trim($path) : $fallback;
    if (empty($img)) {
        return '';
    }
    if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
        return $img;
    }
    if (str_starts_with($img, '/public/')) {
        return url($img);
    }
    if (str_starts_with($img, 'public/')) {
        return url('/' . $img);
    }
    return asset($img);
};

$heroImg = $resolveImage($about['hero']['image'] ?? null, 'uploads/hero/hero-braj-sanctuary.webp');
$sanctuaryImg = $resolveImage($about['overview']['sanctuary_image'] ?? null, 'uploads/about/prem-mandir.webp');
$leader1Photo = $resolveImage($about['leadership']['leader1_photo'] ?? null, 'uploads/team/vinay-01.png');
$leader2Photo = $resolveImage($about['leadership']['leader2_photo'] ?? null, 'uploads/team/Rakesh-01.png');

$overviewPhone1 = $about['overview']['phone_1'] ?? '+91 9871731303';
$overviewPhone2 = $about['overview']['phone_2'] ?? '+91 7409767452';
$consultPhone1 = $about['consultation']['phone_1'] ?? '+91 9871731303';
$consultPhone2 = $about['consultation']['phone_2'] ?? '+91 7409767452';
?>

<!-- 1. Inner Header / Hero Banner -->
<section class="relative min-h-[40vh] sm:min-h-[46vh] flex items-center justify-center border-b py-20 lg:py-28 overflow-hidden bg-stone-950 transition-colors"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    <!-- Background Architectural Media -->
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroImg ?>"
             alt="<?= e($about['hero']['heading'] ?? 'About us') ?>"
             class="w-full h-full object-cover filter brightness-[0.42] contrast-[1.08] scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/75 to-stone-950/40"></div>
        <div class="absolute inset-0 bg-black/35"></div>
    </div>

    <!-- Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] rounded-full blur-3xl pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-4">
        <?php if (!empty($about['hero']['badge'])): ?>
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-stone-900/80 text-white border border-amber-500/30 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
            <?= e($about['hero']['badge']) ?>
        </div>
        <?php endif; ?>

        <h1 class="font-editorial text-4xl sm:text-6xl font-normal tracking-tight text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.85)]">
            <?= e($about['hero']['heading'] ?? 'About us') ?>
        </h1>

        <?php if (!empty($about['hero']['subheading'])): ?>
        <p class="text-sm sm:text-base max-w-2xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
            <?= e($about['hero']['subheading']) ?>
        </p>
        <?php endif; ?>

        <?php if (function_exists('auth_user') && auth_user()): ?>
        <div class="pt-2">
            <a href="<?= url('/admin/about') ?>" target="_blank"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Edit About Us in Admin</span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>


<!-- 2. Company Overview: About GLEAMREALTY PRIVATE LIMITED -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left: Featured Sanctuary Visual with Enquire Now Badge -->
        <div class="lg:col-span-5 relative group">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= $sanctuaryImg ?>"
                         alt="<?= e($about['overview']['sanctuary_image_alt'] ?? 'Prem Mandir Vrindavan Sanctuary') ?>"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-transparent to-transparent"></div>
                </div>

                <!-- Floating Enquire Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            Enquire Now
                        </span>
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $overviewPhone1) ?>" class="text-xs sm:text-sm font-bold tracking-wider hover:underline" :style="{ color: 'var(--theme-title)' }">
                                <?= e($overviewPhone1) ?>
                            </a>
                            <?php if (!empty($overviewPhone2)): ?>
                            <span :style="{ color: 'var(--theme-subtitle)' }">/</span>
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $overviewPhone2) ?>" class="text-xs sm:text-sm font-bold tracking-wider hover:underline" :style="{ color: 'var(--theme-title)' }">
                                <?= e($overviewPhone2) ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center shrink-0 border"
                         :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Story & Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <?php if (!empty($about['overview']['badge'])): ?>
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($about['overview']['badge']) ?>
            </span>
            <?php endif; ?>

            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight transition-colors"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($about['overview']['title'] ?? 'About GLEAMREALTY PRIVATE LIMITED') ?>
            </h2>

            <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed transition-colors"
                 :style="{ color: 'var(--theme-subtitle)' }">
                <div>
                    <?= $about['overview']['p1'] ?>
                </div>

                <div>
                    <?= $about['overview']['p2'] ?>
                </div>

                <div class="p-6 rounded-2xl border space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <h3 class="font-editorial text-lg sm:text-xl font-medium" :style="{ color: 'var(--theme-title)' }">
                        <?= e($about['overview']['callout_title'] ?? 'Why Discerning Devotees Trust Us') ?>
                    </h3>
                    <div>
                        <?= $about['overview']['callout_p1'] ?>
                    </div>
                    <div>
                        <?= $about['overview']['callout_p2'] ?>
                    </div>
                </div>
            </div>

            <!-- Quick Metrics Grid -->
            <?php if (!empty($about['metrics'])): ?>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-2">
                <?php foreach ($about['metrics'] as $metric): ?>
                <div class="p-4 rounded-xl border text-center" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="block font-serif text-2xl font-bold" :style="{ color: 'var(--theme-metric-value)' }"><?= e($metric['val'] ?? '') ?></span>
                    <span class="text-[10px] uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-metric-label)' }"><?= e($metric['label'] ?? '') ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>


<!-- 3. Our Mission & Our Vision (Matching Earthousing Layout) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 border-t border-b transition-colors"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-2">
            <?php if (!empty($about['principles']['eyebrow'])): ?>
            <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($about['principles']['eyebrow']) ?>
            </span>
            <?php endif; ?>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($about['principles']['title'] ?? 'Our Purpose & Aspiration') ?>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Our Mission Card -->
            <div class="p-8 sm:p-10 rounded-3xl border backdrop-blur-xl space-y-4 shadow-xl transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-serif text-lg font-bold shrink-0 border"
                         :style="{ backgroundColor: 'rgba(255,255,255,0.1)', color: 'var(--theme-section-card-title)', borderColor: 'var(--theme-section-card-border)' }">
                        <?= e($about['principles']['mission_icon'] ?? 'OM') ?>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-section-card-title)' }">
                            <?= e($about['principles']['mission_badge'] ?? 'Foundational Commitment') ?>
                        </span>
                        <h3 class="font-editorial text-2xl sm:text-3xl font-normal" :style="{ color: 'var(--theme-section-alt-title)' }">
                            <?= e($about['principles']['mission_title'] ?? 'Our Mission') ?>
                        </h3>
                    </div>
                </div>

                <div class="space-y-3 text-xs sm:text-sm font-light leading-relaxed pt-2"
                     :style="{ color: 'var(--theme-section-card-text)' }">
                    <div>
                        <?= $about['principles']['mission_p1'] ?>
                    </div>
                    <div>
                        <?= $about['principles']['mission_p2'] ?>
                    </div>
                </div>
            </div>

            <!-- Our Vision Card -->
            <div class="p-8 sm:p-10 rounded-3xl border backdrop-blur-xl space-y-4 shadow-xl transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-serif text-lg font-bold shrink-0 border"
                         :style="{ backgroundColor: 'rgba(255,255,255,0.1)', color: 'var(--theme-section-card-title)', borderColor: 'var(--theme-section-card-border)' }">
                        <?= e($about['principles']['vision_icon'] ?? '✦') ?>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-section-card-title)' }">
                            <?= e($about['principles']['vision_badge'] ?? 'National Benchmark') ?>
                        </span>
                        <h3 class="font-editorial text-2xl sm:text-3xl font-normal" :style="{ color: 'var(--theme-section-alt-title)' }">
                            <?= e($about['principles']['vision_title'] ?? 'Our Vision') ?>
                        </h3>
                    </div>
                </div>

                <div class="space-y-3 text-xs sm:text-sm font-light leading-relaxed pt-2"
                     :style="{ color: 'var(--theme-section-card-text)' }">
                    <div>
                        <?= $about['principles']['vision_p1'] ?>
                    </div>
                    <div>
                        <?= $about['principles']['vision_p2'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 4. Leadership / Founders' Messages & Photos -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto space-y-20 lg:space-y-28">

        <!-- Founder 1: Vinay Kumar Chauhan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-4 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] bg-stone-900 overflow-hidden">
                        <img src="<?= $leader1Photo ?>"
                             alt="<?= e($about['leadership']['leader1_name'] ?? 'Vinay Kumar Chauhan') ?>"
                             class="w-full h-full object-cover object-top group-hover:scale-103 transition-transform duration-700">
                    </div>
                    <div class="p-4 sm:p-5 text-center border-t"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <span class="text-[10px] uppercase tracking-widest font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($about['leadership']['leader1_role'] ?? 'Co-Founder & Managing Partner') ?>
                        </span>
                        <h4 class="font-editorial text-lg sm:text-xl font-medium mt-0.5" :style="{ color: 'var(--theme-title)' }">
                            <?= e($about['leadership']['leader1_name'] ?? 'Vinay Kumar Chauhan') ?>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-4">
                <span class="text-xs uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                    <?= e($about['leadership']['leader1_eyebrow'] ?? 'Founder\'s Perspective') ?>
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal leading-snug" :style="{ color: 'var(--theme-title)' }">
                    <?= e($about['leadership']['leader1_headline'] ?? 'Connecting Visions to Value') ?>
                </h3>
                <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                    <div>
                        <?= $about['leadership']['leader1_p1'] ?>
                    </div>
                    <div>
                        <?= $about['leadership']['leader1_p2'] ?>
                    </div>
                    <div>
                        <?= $about['leadership']['leader1_p3'] ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Founder 2: Rakesh Chaudhary -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-8 order-2 lg:order-1 space-y-4">
                <span class="text-xs uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                    <?= e($about['leadership']['leader2_eyebrow'] ?? 'Leadership Vision') ?>
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal leading-snug" :style="{ color: 'var(--theme-title)' }">
                    <?= e($about['leadership']['leader2_headline'] ?? 'Your Partner for a Smarter Real Estate Future') ?>
                </h3>
                <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                    <div>
                        <?= $about['leadership']['leader2_p1'] ?>
                    </div>
                    <div>
                        <?= $about['leadership']['leader2_p2'] ?>
                    </div>
                    <div>
                        <?= $about['leadership']['leader2_p3'] ?>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 order-1 lg:order-2 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] bg-stone-900 overflow-hidden">
                        <img src="<?= $leader2Photo ?>"
                             alt="<?= e($about['leadership']['leader2_name'] ?? 'Rakesh Chaudhary') ?>"
                             class="w-full h-full object-cover object-top group-hover:scale-103 transition-transform duration-700">
                    </div>
                    <div class="p-4 sm:p-5 text-center border-t"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <span class="text-[10px] uppercase tracking-widest font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($about['leadership']['leader2_role'] ?? 'Co-Founder & Managing Partner') ?>
                        </span>
                        <h4 class="font-editorial text-lg sm:text-xl font-medium mt-0.5" :style="{ color: 'var(--theme-title)' }">
                            <?= e($about['leadership']['leader2_name'] ?? 'Rakesh Chaudhary') ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- 5. Our Expertise (Driving Real Estate Success with Strategic Insight) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 border-t transition-colors"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left Headline -->
        <div class="lg:col-span-5 space-y-4">
            <?php if (!empty($about['capabilities']['eyebrow'])): ?>
            <span class="text-xs uppercase tracking-[0.24em] font-semibold block" :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($about['capabilities']['eyebrow']) ?>
            </span>
            <?php endif; ?>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight" :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($about['capabilities']['title'] ?? 'Driving Real Estate Success with Strategic Insight') ?>
            </h2>
            <?php if (!empty($about['capabilities']['subtitle'])): ?>
            <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($about['capabilities']['subtitle']) ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- Right 2x2 Grid -->
        <?php if (!empty($about['capabilities']['items'])): ?>
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <?php foreach ($about['capabilities']['items'] as $cap): ?>
            <div class="p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-section-card-title)' }">
                    <?= e($cap['tag'] ?? '') ?>
                </span>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    <?= e($cap['desc'] ?? '') ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>


<!-- 6. Why Choose Us Section (Matching Earthousing Layout) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left 2x2 Grid -->
        <?php if (!empty($about['why_choose']['items'])): ?>
        <div class="lg:col-span-7 order-2 lg:order-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <?php foreach ($about['why_choose']['items'] as $why): ?>
            <div class="p-6 rounded-2xl border space-y-2.5 shadow-sm transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-accent)' }">
                    <?= e($why['tag'] ?? '') ?>
                </span>
                <h4 class="font-editorial text-lg font-medium" :style="{ color: 'var(--theme-title)' }">
                    <?= e($why['title'] ?? '') ?>
                </h4>
                <p class="text-xs leading-relaxed font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    <?= e($why['desc'] ?? '') ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Right Headline -->
        <div class="lg:col-span-5 order-1 lg:order-2 space-y-4">
            <?php if (!empty($about['why_choose']['eyebrow'])): ?>
            <span class="text-xs uppercase tracking-[0.24em] font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                <?= e($about['why_choose']['eyebrow']) ?>
            </span>
            <?php endif; ?>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight" :style="{ color: 'var(--theme-title)' }">
                <?= e($about['why_choose']['title'] ?? 'Why Choose Us!') ?>
            </h2>
            <?php if (!empty($about['why_choose']['subtitle'])): ?>
            <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                <?= e($about['why_choose']['subtitle']) ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- 7. Free Site Visit / Consultation Booking Form (Matching Earthousing #freesitevisit) -->
<section id="freesitevisit" class="relative py-20 sm:py-28 px-6 sm:px-8 border-t transition-colors"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-4xl mx-auto"
         x-data="{
            submitting: false,
            submitted: false,
            errorMessage: '',
            form: {
                name: '',
                mobile: '',
                email: '',
                state: '',
                project_id: '',
                visit_date: '',
                message: ''
            },
            submitForm() {
                this.submitting = true;
                this.errorMessage = '';
                fetch('<?= url('/api/inquiry') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(this.form)
                })
                .then(res => res.json())
                .then(data => {
                    this.submitting = false;
                    if (data.status === 'success') {
                        this.submitted = true;
                        this.form = { name: '', mobile: '', email: '', state: '', project_id: '', visit_date: '', message: '' };
                    } else {
                        this.errorMessage = data.message || 'Unable to submit your request. Please try again.';
                    }
                })
                .catch(err => {
                    this.submitting = false;
                    this.errorMessage = 'Network error. Please try again or reach out via WhatsApp.';
                });
            }
         }">

        <div class="p-8 sm:p-12 rounded-3xl border shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
            
            <div class="text-center max-w-xl mx-auto mb-8 space-y-2">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                    </svg>
                    <?= e($about['consultation']['badge'] ?? 'Free Site Visit') ?>
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($about['consultation']['title'] ?? 'Find your Dream Property') ?>
                </h3>
                <p class="text-xs sm:text-sm font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    <?= e($about['consultation']['subtitle'] ?? 'Schedule a complimentary private darshan and property inspection tour with our executive concierge.') ?>
                </p>
            </div>

            <!-- Success Alert -->
            <div x-show="submitted"
                 x-transition
                 class="mb-6 p-4 rounded-xl bg-[#FDF3E3] border border-[#9A6B2F]/30 text-[#9A6B2F] text-xs sm:text-sm flex items-start justify-between gap-3">
                <div class="flex items-center gap-2.5">
                    <svg class="w-5 h-5 text-[#9A6B2F] shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <strong>Success!</strong> Your site visit request submitted successfully! Our concierge desk will call you to confirm your date and transportation arrangements.
                    </div>
                </div>
                <button @click="submitted = false" class="text-[#9A6B2F] hover:text-[#835722]">&times;</button>
            </div>

            <!-- Error Alert -->
            <div x-show="errorMessage"
                 x-transition
                 class="mb-6 p-4 rounded-xl bg-red-500/15 border border-red-500/30 text-red-800 dark:text-red-200 text-xs sm:text-sm flex items-center justify-between">
                <span x-text="errorMessage"></span>
                <button @click="errorMessage = ''" class="text-red-600 hover:text-red-800">&times;</button>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitForm()" class="space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Full Name <span class="text-red-500">*</span></label>
                        <input type="text"
                               x-model="form.name"
                               required
                               placeholder="Full Name"
                               class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Mobile No. <span class="text-red-500">*</span></label>
                        <input type="tel"
                               x-model="form.mobile"
                               required
                               placeholder="Mobile No."
                               pattern="[0-9]{10}"
                               class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Email Address <span class="text-red-500">*</span></label>
                        <input type="email"
                               x-model="form.email"
                               required
                               placeholder="Email Address"
                               class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Select State <span class="text-red-500">*</span></label>
                        <select x-model="form.state"
                                required
                                class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 cursor-pointer"
                                :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                            <option value="">Select State</option>
                            <option>Uttar Pradesh</option>
                            <option>Delhi</option>
                            <option>Haryana</option>
                            <option>Rajasthan</option>
                            <option>Maharashtra</option>
                            <option>Gujarat</option>
                            <option>Madhya Pradesh</option>
                            <option>Bihar</option>
                            <option>Punjab</option>
                            <option>Uttarakhand</option>
                            <option>West Bengal</option>
                            <option>Andaman and Nicobar Islands</option>
                            <option>Andhra Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Assam</option>
                            <option>Chandigarh</option>
                            <option>Chhattisgarh</option>
                            <option>Dadra and Nagar Haveli</option>
                            <option>Daman and Diu</option>
                            <option>Goa</option>
                            <option>Himachal Pradesh</option>
                            <option>Jammu and Kashmir</option>
                            <option>Jharkhand</option>
                            <option>Karnataka</option>
                            <option>Kerala</option>
                            <option>Ladakh</option>
                            <option>Lakshadweep</option>
                            <option>Manipur</option>
                            <option>Meghalaya</option>
                            <option>Mizoram</option>
                            <option>Nagaland</option>
                            <option>Odisha</option>
                            <option>Pondicherry</option>
                            <option>Sikkim</option>
                            <option>Tamil Nadu</option>
                            <option>Telangana</option>
                            <option>Tripura</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Select Project <span class="text-red-500">*</span></label>
                        <select x-model="form.project_id"
                                required
                                class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 cursor-pointer"
                                :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                            <option value="">Select Project</option>
                            <?php if (!empty($projects)): ?>
                                <?php foreach ($projects as $proj): ?>
                                    <option value="<?= (int) $proj['id'] ?>"><?= e($proj['name']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="1">Shri Vasudhara Vaishaly Premium Residential Plots</option>
                                <option value="2">Shri Vrinda Aakruti Village Premium Residential Township</option>
                                <option value="3">Shri Vrinda Naivedyam Premium Residential Plots</option>
                                <option value="4">Shri Vrinda Orchids Plots and Villas</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Preferred Visit Date <span class="text-red-500">*</span></label>
                        <input type="date"
                               x-model="form.visit_date"
                               required
                               min="<?= date('Y-m-d') ?>"
                               class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 cursor-pointer"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" :style="{ color: 'var(--theme-subtitle)' }">Your Message</label>
                    <textarea x-model="form.message"
                              rows="3"
                              placeholder="Any specific questions or preferred timing for your site visit..."
                              class="w-full px-4 py-3.5 rounded-xl border text-xs sm:text-sm font-medium transition-all focus:outline-none focus:ring-2 resize-y"
                              :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"></textarea>
                </div>

                <div>
                    <button type="submit"
                            :disabled="submitting"
                            class="w-full py-4 rounded-xl text-xs sm:text-sm uppercase tracking-[0.16em] font-bold transition-all duration-300 shadow-md hover:shadow-xl active:scale-98 flex items-center justify-center gap-2"
                            :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                        <template x-if="submitting">
                            <svg class="animate-spin h-4 w-4 text-current" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                        </template>
                        <span x-text="submitting ? 'Confirming Visit...' : 'Book Free Site Visit'">Book Free Site Visit</span>
                    </button>
                    <div class="flex items-center justify-center gap-2 text-xs pt-3" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Advisory Direct Desk:</span>
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $consultPhone1) ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($consultPhone1) ?>
                        </a>
                        <?php if (!empty($consultPhone2)): ?>
                        <span>/</span>
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $consultPhone2) ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($consultPhone2) ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
