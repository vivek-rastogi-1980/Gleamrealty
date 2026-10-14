<?php
/**
 * Property in Vrindavan — Master Showcase View
 * Fully Controlled & Dynamically Editable through Admin Panel (/admin/property-vrindavan)
 * Integrated with Gleamrealty Multi-Theme Engine
 * 
 * @var array $page
 * @var array $projects
 * @var array $pv
 */

$pv = !empty($pv) ? $pv : \App\Models\Setting::getPropertyVrindavanSections();

$heroCover = !empty($pv['hero']['image']) ? media_url($pv['hero']['image']) : asset('uploads/pages/property-in-vrindavan.png');
$heroTitle = !empty($pv['hero']['heading']) ? $pv['hero']['heading'] : ($page['hero_heading'] ?? 'Property in Vrindavan');
$heroSubtitle = !empty($pv['hero']['subheading']) ? $pv['hero']['subheading'] : ($page['hero_subheading'] ?? 'Property for Sale Vrindavan UP, MVDA & Govt Approved Property in Vrindavan');
$heroBadge = !empty($pv['hero']['badge']) ? $pv['hero']['badge'] : '✦ Gleamrealty Private Limited • VRINDAVAN SANCTUARIES';
?>

<div x-data="{ vipModalOpen: false, filterCategory: 'all' }">

    <!-- =======================================================================
         1. HERO BANNER: Property in Vrindavan
         ======================================================================= -->
    <section class="relative min-h-[52vh] sm:min-h-[58vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden bg-stone-950 transition-colors duration-300"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
        
        <!-- Background Hero Imagery -->
        <div class="absolute inset-0 z-0">
            <img src="<?= $heroCover ?>"
                 alt="<?= e($heroTitle) ?> — MVDA Approved"
                 class="w-full h-full object-cover filter brightness-[0.42] contrast-[1.08] scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/75 to-stone-950/40"></div>
            <div class="absolute inset-0 bg-black/35"></div>
        </div>

        <!-- Radiant Ambient Light Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-25"
             :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-6">
            
            <!-- Breadcrumbs & Category Badge -->
            <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold tracking-[0.22em] uppercase">
                <a href="<?= url('/') ?>" class="text-stone-300 hover:text-white transition-colors">Home</a>
                <span class="text-amber-500/60">&bull;</span>
                <a href="<?= url('/projects') ?>" class="text-stone-300 hover:text-white transition-colors">Projects</a>
                <span class="text-amber-500/60">&bull;</span>
                <span class="text-amber-400 font-bold">Property in Vrindavan</span>
            </div>

            <!-- Eyebrow Pill -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-stone-900/80 text-white border border-amber-500/30 shadow-md">
                <span class="w-2 h-2 rounded-full bg-[#9A6B2F] animate-pulse"></span>
                <?= e($heroBadge) ?>
            </div>

            <!-- Main H1 Title -->
            <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal tracking-tight text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.85)] leading-[1.1]">
                <?= e($heroTitle) ?>
            </h1>

            <!-- Subheading Tagline -->
            <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
                <?= e($heroSubtitle) ?>
            </h2>

            <!-- Trust Badges Strip -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-2">
                <?php if (!empty($pv['hero']['badge_1'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-white shadow-sm">
                        <svg class="w-3.5 h-3.5 text-[#9A6B2F] fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <?= e($pv['hero']['badge_1']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($pv['hero']['badge_2'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-sm">
                        <?= e($pv['hero']['badge_2']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($pv['hero']['badge_3'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                        <?= e($pv['hero']['badge_3']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($pv['hero']['badge_4'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                        <?= e($pv['hero']['badge_4']) ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- CTAs -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="#vrindavan-showcase"
                   class="btn-bronze inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] shadow-lg hover:shadow-xl transition-all">
                    <span>Explore Verified Properties</span>
                    <span class="text-sm">&darr;</span>
                </a>
                <button type="button" @click="vipModalOpen = true"
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                    <span>Book Site Visit &amp; Showing</span>
                    <span class="text-amber-400">&rarr;</span>
                </button>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $pv['consultation']['phone_1'] ?? company_phone_1()) ?>"
                   class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 bg-white/10 backdrop-blur-md hover:border-white/50 transition-colors">
                    <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                    <span><?= e($pv['consultation']['phone_1'] ?? company_phone_1()) ?></span>
                </a>
                <?php if (function_exists('auth_user') && auth_user()): ?>
                    <a href="<?= url('/admin/property-vrindavan') ?>"
                       target="_blank"
                       class="inline-flex items-center gap-1.5 px-4 py-3 rounded-full text-xs font-semibold uppercase tracking-wider bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        <span>Edit Page in Admin</span>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- =======================================================================
         2. SECTION 1: Overview Narrative & Ground Reality
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
             :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Column: Visual Showcase -->
            <div class="lg:col-span-5 relative space-y-6">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                        <?php $ovImg = !empty($pv['overview']['image']) ? media_url($pv['overview']['image']) : asset('uploads/pages/mero-vrindavan.png'); ?>
                        <img src="<?= $ovImg ?>"
                             alt="<?= e($pv['overview']['title'] ?? 'Vrindavan Property') ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                    </div>

                    <!-- Floating Sincerity Badge -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <div>
                            <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                                <?= e($pv['overview']['badge_sub'] ?? 'Brajwas Guaranteed') ?>
                            </span>
                            <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                                <?= e($pv['overview']['badge_title'] ?? '3,000+ Happy Families') ?>
                            </div>
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 border"
                             :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                            ✦
                        </div>
                    </div>
                </div>

                <!-- Secondary Micro Banner -->
                <?php if (!empty($pv['overview']['secondary_title'])): ?>
                    <div class="p-5 rounded-2xl border flex items-center gap-4 transition-colors"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <?php $secImg = !empty($pv['overview']['secondary_image']) ? media_url($pv['overview']['secondary_image']) : asset('uploads/pages/property-in-vrindavan.png'); ?>
                        <img src="<?= $secImg ?>" alt="Vrindavan Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                             :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                            <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                                <?= e($pv['overview']['secondary_title']) ?>
                            </strong>
                            <?= e($pv['overview']['secondary_desc'] ?? '') ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column: Narrative -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <?= e($pv['overview']['badge'] ?? '✦ Spiritual Heritage • Modern Living') ?>
                </span>

                <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($pv['overview']['title'] ?? 'Property for Sale in Vrindavan UP') ?>
                </h2>

                <?php if (!empty($pv['overview']['subtitle'])): ?>
                    <p class="text-base sm:text-lg font-light leading-relaxed" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($pv['overview']['subtitle']) ?>
                    </p>
                <?php endif; ?>

                <div class="space-y-4 text-sm sm:text-base font-normal leading-relaxed"
                     :style="{ color: 'var(--theme-text-primary)' }">
                    <?php if (!empty($pv['overview']['content'])): ?>
                        <?= $pv['overview']['content'] ?>
                    <?php else: ?>
                        <p>
                            Vrindavan is not simply a place on the map; it is a timeless refuge for the spirit. Nestled within the sacred landscape of Braj, it has been synonymous with the divine pastimes of Lord Krishna for centuries, bringing together a unique blend of devotion, history, and immeasurable peace.
                        </p>
                    <?php endif; ?>
                </div>

                <!-- 4 Quick Key Metrics -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($pv['overview']['metric_1_val'] ?? '10+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($pv['overview']['metric_1_lbl'] ?? 'Years Heritage') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($pv['overview']['metric_2_val'] ?? '3,000+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($pv['overview']['metric_2_lbl'] ?? 'Devotee Families') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($pv['overview']['metric_3_val'] ?? '5 Lakh+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($pv['overview']['metric_3_lbl'] ?? 'Sq. Yards Delivered') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($pv['overview']['metric_4_val'] ?? '100%') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($pv['overview']['metric_4_lbl'] ?? 'MVDA Approved') ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- =======================================================================
         3. SECTION 2: Legalities of Vrindavan Real Estate & The MVDA Filter
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
             :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto space-y-16">
            
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                      :style="{ color: 'var(--theme-section-alt-accent)' }">
                    <?= e($pv['legalities']['eyebrow'] ?? 'Regulatory Standards') ?>
                </span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-section-alt-title)' }">
                    <?= e($pv['legalities']['title'] ?? 'Legalities of Vrindavan Real Estate') ?>
                </h2>
                <p class="text-sm sm:text-base font-light leading-relaxed"
                   :style="{ color: 'var(--theme-section-alt-subtext)' }">
                    <?= e($pv['legalities']['subtitle'] ?? 'When looking for residential land in Vrindavan, legality and clear approvals are the supreme priorities under the Braj Master Plan 2041.') ?>
                </p>
            </div>

            <!-- 4 Legal Pillar Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Pillar 1 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        01
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['legalities']['p1_title'] ?? 'Sanctioned Layouts: The Guarantee of Planned Living') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['legalities']['p1_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        02
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['legalities']['p2_title'] ?? 'Infrastructure Guarantees: Built for the Future') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['legalities']['p2_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        03
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['legalities']['p3_title'] ?? 'Ease of Financing: The Bank’s Vote of Confidence') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['legalities']['p3_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        04
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['legalities']['p4_title'] ?? 'Future Appreciation: Wealth Creation Through Legality') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['legalities']['p4_desc'] ?? '') ?>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- =======================================================================
         4. SECTION 3: Curated Project Showcases
         ======================================================================= -->
    <section id="vrindavan-showcase" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
             :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto space-y-16">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="space-y-3">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                          :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        100% Legally Clear Inventory
                    </span>
                    <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                        :style="{ color: 'var(--theme-title)' }">
                        Curated Properties in Vrindavan
                    </h2>
                    <p class="text-sm sm:text-base font-light max-w-2xl leading-relaxed"
                       :style="{ color: 'var(--theme-text-secondary)' }">
                        Explore handpicked MVDA &amp; RERA approved plotted enclaves, duplex havelis, and strategic commercial assets across prime Braj corridors.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="<?= url('/projects') ?>"
                       class="px-5 py-2.5 rounded-full text-xs uppercase font-bold tracking-wider transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View All Projects &rarr;
                    </a>
                </div>
            </div>

            <!-- Dynamic Project Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $idx => $p): ?>
                        <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                            <div>
                                <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                                    <?php 
                                        $pImg = !empty($p['primary_image']) ? media_url($p['primary_image']) : asset('uploads/pages/residential-plots-in-vrindavan.jpeg');
                                    ?>
                                    <img src="<?= $pImg ?>" alt="<?= e($p['name']) ?>"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                                            <?= !empty($p['rera_id']) ? 'MVDA &amp; RERA Approved' : 'Govt Approved' ?>
                                        </span>
                                    </div>
                                    <?php if (!empty($p['price_range'])): ?>
                                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                                            <?= e($p['price_range']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-6 sm:p-7 space-y-3">
                                    <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                                        <?= e($p['location_name'] ?? 'Vrindavan, UP') ?>
                                    </div>
                                    <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                                        <?= ($idx + 1) . '. ' . e($p['name']) ?>
                                    </h3>
                                    <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                                        <?= e($p['short_description'] ?? '') ?>
                                    </p>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <a href="<?= url('/projects/' . $p['slug']) ?>"
                                   class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                                   :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                                    View Project Details &rarr;
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- =======================================================================
         5. SECTION 4: 2026 Megaprojects Transforming Braj
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
             :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto space-y-16">
            
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                      :style="{ color: 'var(--theme-section-alt-accent)' }">
                    <?= e($pv['megaprojects']['eyebrow'] ?? 'Economic Corridor') ?>
                </span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-section-alt-title)' }">
                    <?= e($pv['megaprojects']['title'] ?? 'The 2026 Ground Reality: Megaprojects Transforming Braj') ?>
                </h2>
                <p class="text-sm sm:text-base font-light leading-relaxed"
                   :style="{ color: 'var(--theme-section-alt-subtext)' }">
                    <?= e($pv['megaprojects']['subtitle'] ?? '') ?>
                </p>
            </div>

            <!-- 4 Megaprojects Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- MP 1 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="flex items-center justify-between">
                        <span class="text-xs uppercase font-bold tracking-wider" :style="{ color: 'var(--theme-accent)' }">Infrastructure 01</span>
                        <?php if (!empty($pv['megaprojects']['mp1_badge'])): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                <?= e($pv['megaprojects']['mp1_badge']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['megaprojects']['mp1_title'] ?? '') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['megaprojects']['mp1_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- MP 2 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="flex items-center justify-between">
                        <span class="text-xs uppercase font-bold tracking-wider" :style="{ color: 'var(--theme-accent)' }">Infrastructure 02</span>
                        <?php if (!empty($pv['megaprojects']['mp2_badge'])): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                <?= e($pv['megaprojects']['mp2_badge']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['megaprojects']['mp2_title'] ?? '') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['megaprojects']['mp2_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- MP 3 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="flex items-center justify-between">
                        <span class="text-xs uppercase font-bold tracking-wider" :style="{ color: 'var(--theme-accent)' }">Infrastructure 03</span>
                        <?php if (!empty($pv['megaprojects']['mp3_badge'])): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                <?= e($pv['megaprojects']['mp3_badge']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['megaprojects']['mp3_title'] ?? '') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['megaprojects']['mp3_desc'] ?? '') ?>
                    </p>
                </div>

                <!-- MP 4 -->
                <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="flex items-center justify-between">
                        <span class="text-xs uppercase font-bold tracking-wider" :style="{ color: 'var(--theme-accent)' }">Infrastructure 04</span>
                        <?php if (!empty($pv['megaprojects']['mp4_badge'])): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                <?= e($pv['megaprojects']['mp4_badge']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['megaprojects']['mp4_title'] ?? '') ?>
                    </h3>
                    <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['megaprojects']['mp4_desc'] ?? '') ?>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- =======================================================================
         6. SECTION 5: Life as a Brajwasi: The Spiritual Lifestyle Dividend
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
             :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto space-y-16">
            
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <?= e($pv['lifestyle']['eyebrow'] ?? 'Sacred Living') ?>
                </span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($pv['lifestyle']['title'] ?? 'Life as a Brajwasi: The Spiritual Lifestyle Dividend') ?>
                </h2>
                <p class="text-sm sm:text-base font-light leading-relaxed"
                   :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($pv['lifestyle']['subtitle'] ?? 'Waking up to peacock calls, morning aarti, and the peaceful flow of the Yamuna.') ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-2xl border transition-all hover:shadow-xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        ✦
                    </div>
                    <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['lifestyle']['card1_title'] ?? 'Mangala Aarti & Sacred Dawn') ?>
                    </h3>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['lifestyle']['card1_desc'] ?? '') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-all hover:shadow-xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        ✦
                    </div>
                    <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['lifestyle']['card2_title'] ?? 'The Sacred Tradition of Parikrama') ?>
                    </h3>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['lifestyle']['card2_desc'] ?? '') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-all hover:shadow-xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        ✦
                    </div>
                    <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['lifestyle']['card3_title'] ?? 'Yamuna Sandhya & Deep Daan') ?>
                    </h3>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['lifestyle']['card3_desc'] ?? '') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-all hover:shadow-xl space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                        ✦
                    </div>
                    <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pv['lifestyle']['card4_title'] ?? 'Festivals Through Resident Eyes') ?>
                    </h3>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($pv['lifestyle']['card4_desc'] ?? '') ?>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- =======================================================================
         7. SECTION 6: VIP Consultation & Showing Form
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 transition-colors duration-300 theme-section-alt"
             :style="{ backgroundColor: 'var(--theme-section-alt-bg)' }">
        <div class="max-w-4xl mx-auto rounded-3xl p-8 sm:p-12 border shadow-2xl space-y-8"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
            
            <div class="text-center space-y-3">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <?= e($pv['consultation']['badge'] ?? '✦ Free VIP Site Visit & Showing') ?>
                </span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($pv['consultation']['title'] ?? 'Find Your Dream Property in Vrindavan') ?>
                </h2>
                <p class="text-sm font-light leading-relaxed max-w-xl mx-auto"
                   :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($pv['consultation']['subtitle'] ?? 'Schedule a complimentary private darshan and property inspection tour with our executive concierge.') ?>
                </p>
            </div>

            <!-- Direct Hotline Calling Strip -->
            <div class="flex flex-wrap items-center justify-center gap-4 py-2">
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $pv['consultation']['phone_1'] ?? company_phone_1()) ?>"
                   class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2 transition-all shadow-md"
                   :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                    <span>Call Hotline 1: <?= e($pv['consultation']['phone_1'] ?? company_phone_1()) ?></span>
                </a>
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pv['consultation']['whatsapp'] ?? company_whatsapp()) ?>"
                   target="_blank"
                   class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-600 hover:bg-emerald-500 text-white flex items-center gap-2 transition-all shadow-md">
                    <span>WhatsApp Concierge</span>
                </a>
            </div>

            <!-- Enquiry Form -->
            <form action="<?= url('/inquiries') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="source_url" value="<?= url('/property-in-vrindavan') ?>">
                <input type="hidden" name="project_id" value="0">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Your Full Name *</label>
                        <input type="text" name="name" required placeholder="Shri Radhe Devotee"
                               class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Phone Number (Calling / WhatsApp) *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Email Address (Optional)</label>
                        <input type="email" name="email" placeholder="devotee@example.com"
                               class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Interested Property Category</label>
                        <select name="property_type" class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-400">
                            <option value="Residential Plot in Vrindavan">Residential Plot in Vrindavan</option>
                            <option value="Luxury Duplex Villa">Luxury Duplex Villa</option>
                            <option value="Commercial Shop / Land">Commercial Shop / Land</option>
                            <option value="Township Investment">Township Investment</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider font-semibold mb-1" :style="{ color: 'var(--theme-title)' }">Your Requirements / Preferred Date for Visit</label>
                    <textarea name="message" rows="3" placeholder="Tell us about your preferred location near Prem Mandir, budget, or preferred weekend visit date..."
                              class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
                </div>

                <button type="submit"
                        class="w-full py-4 rounded-xl text-xs uppercase font-bold tracking-[0.2em] transition-all shadow-xl"
                        :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                    Book Free Showing &amp; Site Visit &rarr;
                </button>
            </form>

        </div>
    </section>

    <!-- VIP Callback Modal -->
    <div x-show="vipModalOpen" style="display: none;"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="relative w-full max-w-lg p-8 rounded-3xl border shadow-2xl bg-slate-950 border-amber-500/30 text-left space-y-6"
             @click.outside="vipModalOpen = false">
            <button type="button" @click="vipModalOpen = false" class="absolute top-5 right-5 text-slate-400 hover:text-white text-xl font-bold cursor-pointer">
                &times;
            </button>
            <div>
                <span class="text-[10px] uppercase font-bold tracking-widest text-amber-400 block mb-1">Concierge Assistance</span>
                <h3 class="text-2xl font-editorial text-white">Schedule Private Property Visit</h3>
                <p class="text-xs text-slate-400 mt-1">Our executive advisor will arrange complimentary pickup &amp; temple darshan tour.</p>
            </div>
            <form action="<?= url('/inquiries') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="source_url" value="<?= url('/property-in-vrindavan') ?>">
                <div>
                    <label class="block text-xs uppercase text-slate-400 font-semibold mb-1">Full Name *</label>
                    <input type="text" name="name" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs uppercase text-slate-400 font-semibold mb-1">Phone Number *</label>
                    <input type="tel" name="phone" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs uppercase text-slate-400 font-semibold mb-1">Preferred Time of Contact</label>
                    <input type="text" name="message" placeholder="e.g. Tomorrow morning, weekend 11 AM" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold uppercase text-xs tracking-wider transition-all">
                    Confirm Showing Request &rarr;
                </button>
            </form>
        </div>
    </div>

</div>
