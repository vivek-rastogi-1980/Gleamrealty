<?php
/**
 * Residential Plots in Vrindavan — Master Showcase View
 * Fully Controlled & Dynamically Editable through Admin Panel (/admin/residential-plots)
 * Integrated with Gleamrealty Multi-Theme Engine
 * 
 * @var array $page
 * @var array $projects
 * @var array $rp
 */

$rp = !empty($rp) ? $rp : \App\Models\Setting::getResidentialPlotsSections();

$heroCover = !empty($rp['hero']['image']) ? media_url($rp['hero']['image']) : asset('uploads/pages/residential-plots-in-vrindavan.jpeg');
$heroTitle = !empty($rp['hero']['heading']) ? $rp['hero']['heading'] : ($page['hero_heading'] ?? 'Plots in Vrindavan');
$heroSubtitle = !empty($rp['hero']['subheading']) ? $rp['hero']['subheading'] : ($page['hero_subheading'] ?? 'Plot for Sale in Vrindavan, Plot in Vrindavan near Prem Mandir');
$heroBadge = !empty($rp['hero']['badge']) ? $rp['hero']['badge'] : '✦ Gleamrealty Private Limited • RESIDENTIAL PLOTS';
?>

<div x-data="{ vipModalOpen: false, filterCategory: 'all' }">

    <!-- =======================================================================
         1. HERO BANNER: Plots in Vrindavan
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
                <span class="text-stone-300">Communities</span>
                <span class="text-amber-500/60">&bull;</span>
                <span class="text-amber-400 font-bold">Residential Plots</span>
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

            <!-- H2 / Subheading Tagline -->
            <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
                <?= e($heroSubtitle) ?>
            </h2>

            <!-- Trust Badges Strip -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-2">
                <?php if (!empty($rp['hero']['badge_1'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-white shadow-sm">
                        <svg class="w-3.5 h-3.5 text-[#9A6B2F] fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <?= e($rp['hero']['badge_1']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($rp['hero']['badge_2'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-sm">
                        <?= e($rp['hero']['badge_2']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($rp['hero']['badge_3'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                        <?= e($rp['hero']['badge_3']) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($rp['hero']['badge_4'])): ?>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                        <?= e($rp['hero']['badge_4']) ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Action CTAs -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="#projects-showcase"
                   class="btn-bronze inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] shadow-lg hover:shadow-xl transition-all">
                    <span>View Available Plots</span>
                    <span class="text-sm">&darr;</span>
                </a>
                <button type="button" @click="vipModalOpen = true"
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                    <span>Book Free Site Visit</span>
                    <span class="text-amber-400">&rarr;</span>
                </button>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $rp['consultation']['phone_1'] ?? company_phone_1()) ?>"
                   class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 bg-white/10 backdrop-blur-md hover:border-white/50 transition-colors">
                    <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                    <span><?= e($rp['consultation']['phone_1'] ?? company_phone_1()) ?></span>
                </a>
                <?php if (function_exists('auth_user') && auth_user()): ?>
                    <a href="<?= url('/admin/residential-plots') ?>"
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
         2. SECTION 1: Simplicity and Sincerity — The Ground Reality of Vrindavan
         ======================================================================= -->
    <section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
             :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Column: Visual Showcase -->
            <div class="lg:col-span-5 relative space-y-6">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                        <?php $ovImg = !empty($rp['overview']['image']) ? media_url($rp['overview']['image']) : asset('uploads/pages/mero-vrindavan.png'); ?>
                        <img src="<?= $ovImg ?>"
                             alt="<?= e($rp['overview']['title'] ?? 'Mero Vrindavan Divine Land') ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                    </div>

                    <!-- Floating Sincerity Badge -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <div>
                            <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                                <?= e($rp['overview']['badge_sub'] ?? 'Brajwas Guaranteed') ?>
                            </span>
                            <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                                <?= e($rp['overview']['badge_title'] ?? '3,000+ Happy Families') ?>
                            </div>
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 border"
                             :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                            ✦
                        </div>
                    </div>
                </div>

                <!-- Secondary Micro Banner -->
                <div class="p-5 rounded-2xl border flex items-center gap-4 transition-colors"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <?php $secImg = !empty($rp['overview']['secondary_image']) ? media_url($rp['overview']['secondary_image']) : asset('uploads/pages/property-in-vrindavan.png'); ?>
                    <img src="<?= $secImg ?>" alt="Vrindavan Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                         :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['overview']['secondary_title'] ?? 'Over 5 Lakh Sq. Yards') ?>
                        </strong>
                        <?= e($rp['overview']['secondary_desc'] ?? 'Consulted and delivered with 100% legal clearance across the Vrindavan-Mathura belt.') ?>
                    </div>
                </div>
            </div>

            <!-- Right Column: Narrative -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    <?= e($rp['overview']['badge'] ?? '✦ The Ground Reality of Braj') ?>
                </span>

                <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($rp['overview']['title'] ?? 'Plot in Vrindavan near Prem Mandir') ?>
                </h2>

                <?php if (!empty($rp['overview']['subtitle'])): ?>
                    <p class="text-sm font-light italic leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($rp['overview']['subtitle']) ?>
                    </p>
                <?php endif; ?>

                <div class="space-y-4 text-sm sm:text-base font-normal leading-relaxed"
                     :style="{ color: 'var(--theme-text-primary)' }">
                    <?php if (!empty($rp['overview']['content'])): ?>
                        <?= $rp['overview']['content'] ?>
                    <?php elseif (!empty($page['content'])): ?>
                        <?= $page['content'] ?>
                    <?php else: ?>
                        <p>
                            In the decade ahead, Braj's skyline will change more than it has in the last hundred years. When the government pumps over <strong :style="{ color: 'var(--theme-title)' }">₹30,000 Crore</strong> of infrastructure into an area already saturated with pilgrims and devotees, buying residential land in Vrindavan is now much more than just a spiritual landmark; it’s the most viable strategic real estate maneuver in all of North India. But in a city where permissible land is scarce, how do you separate the noise from what’s important?
                        </p>
                        <p>
                            Many dream of owning land in this sacred city, but the search for that perfect piece of property is often overwhelming. As the region's premier private real estate office, <strong :style="{ color: 'var(--theme-title)' }">Gleamrealty Private Limited</strong> is your trusted friend. We are experts on finding qualified properties with the right mixture of modern convenience and spiritual peace. Whether you are looking for a retirement retreat, weekend sanctuary, or long-term high-yield asset, we deliver the transparency and candor that is essential while navigating residential land in Vrindavan.
                        </p>
                        <p>
                            In a vibrant but complex market like Vrindavan-Mathura, trust is the currency. We have been a driving force behind this local real estate sector for more than <strong :style="{ color: 'var(--theme-title)' }">10 years</strong>. We work with a different mission at heart: we do not build nor resell unverified colony land. What we are is true market specialists who fight through the noise to put on your desk only the best of the best.
                        </p>
                        <p>
                            Our footprint is our satisfied <strong>3,000+ families</strong> who have found their “Brajwas” under our guidance. We have assisted millions of devotees and investors nationwide to acquire over <strong>5 lakh sq. yards</strong> of land at prime points in the city. Buying residential plots in Vrindavan is as calm as the destination. We offer simple and honest consultation, ensuring every property we promote is fully government-approved.
                        </p>
                    <?php endif; ?>
                </div>

                <!-- 4 Quick Key Metrics -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($rp['overview']['metric_1_val'] ?? '10+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($rp['overview']['metric_1_lbl'] ?? 'Years Heritage') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($rp['overview']['metric_2_val'] ?? '3,000+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($rp['overview']['metric_2_lbl'] ?? 'Devotee Families') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($rp['overview']['metric_3_val'] ?? '5 Lakh+') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($rp['overview']['metric_3_lbl'] ?? 'Sq. Yards Sold') ?>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl border text-center"
                         :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($rp['overview']['metric_4_val'] ?? '100%') ?>
                        </div>
                        <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                            <?= e($rp['overview']['metric_4_lbl'] ?? 'MVDA Approved') ?>
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
                <?= e($rp['legalities']['eyebrow'] ?? 'Regulatory Standards') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($rp['legalities']['title'] ?? 'Legalities of Vrindavan Real Estate') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($rp['legalities']['subtitle'] ?? 'When looking for residential land in Vrindavan, the first question every smart investor asks is about legality and approvals. The city is currently undergoing a massive transformation under the Braj Master Plan 2041, and understanding the difference between various types of land is crucial for securing your family\'s future.') ?>
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
                    <?= e($rp['legalities']['p1_title'] ?? 'Sanctioned Layouts: The Guarantee of Planned Living') ?>
                </h3>
                <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    <?= e($rp['legalities']['p1_desc'] ?? 'The shrinkage in space is described as one of the most frequent problems in unauthorized colonies. A local dealer might show you an attractive open green patch, only to construct shops or commercial units on it tomorrow. In an MVDA-sanctioned layout, open areas, 30-to-40 ft wide roads, and community parks are marked on official government records and protected perpetually against encroachment.') ?>
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
                    <?= e($rp['legalities']['p2_title'] ?? 'Infrastructure Guarantees: Built for the Future') ?>
                </h3>
                <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    <?= e($rp['legalities']['p2_desc'] ?? 'An unauthorized plot is nothing but a chunk of dirt. Fundamentally, an MVDA-approved plot is a fragment of a modern ecosystem. These developments are strictly bound by Building Bye-Laws & Model Zonal Regulations (2025). This mandates underground electrification, subterranean sewage and stormwater drainage networks, wide paved concrete roads, and dedicated potable water supply lines.') ?>
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
                    <?= e($rp['legalities']['p3_title'] ?? 'Ease of Financing: The Bank’s Vote of Confidence') ?>
                </h3>
                <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    <?= e($rp['legalities']['p3_desc'] ?? 'For most families, purchasing land is a critical financial milestone requiring home loan assistance. Premier public and private financial institutions (SBI, HDFC Bank, ICICI Bank, Punjab National Bank) conduct stringent 30-year legal searches before approving project funding. An MVDA sanction is the bank’s non-negotiable prerequisite, giving you sovereign institutional peace of mind.') ?>
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
                    <?= e($rp['legalities']['p4_title'] ?? 'Future Appreciation: Wealth Creation Through Legality') ?>
                </h3>
                <p class="text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    <?= e($rp['legalities']['p4_desc'] ?? 'The historic data of the last five years in Vrindavan reveals a striking pattern: MVDA-sanctioned plotted developments have appreciated at 2.8 times the rate of unapproved farmland colonies, while offering 100% protection against demolition or registry freezes.') ?>
                </p>
            </div>

        </div>

        <!-- The RERA Shield Highlight Banner -->
        <div class="p-8 sm:p-12 rounded-3xl border transition-all space-y-6"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-2">
                    <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-bold" :style="{ color: 'var(--theme-accent)' }">
                        <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: 'var(--theme-accent)' }"></span>
                        Dual Legal Protection
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        The RERA Shield &amp; Private Plotted Developments Vetting
                    </h3>
                </div>
                <div class="px-5 py-2.5 rounded-full border text-xs font-semibold uppercase tracking-wider"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    RERA Compliant Ecosystem
                </div>
            </div>

            <p class="text-sm sm:text-base font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                While MVDA governs municipal land usage and zoning, RERA (Real Estate Regulatory Authority) strictly shields buyer capital and delivery commitments. In our curated portfolio, landmark developments like <strong>Shri Vrinda Orchids</strong> stand as benchmarks of absolute security, carrying both MVDA and UP-RERA registration. RERA ensures fund management transparency through dedicated escrow accounts, enforceable delivery milestones, and binding infrastructure deliverables. For NRIs and outstation devotees acquiring residential plots in Vrindavan from afar, RERA delivers foolproof remote peace of mind.
            </p>

            <div class="p-5 rounded-2xl border text-xs sm:text-sm font-normal leading-relaxed"
                 :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-text-primary)' }">
                <strong :style="{ color: 'var(--theme-title)' }">Gleamrealty Vetting Protocol:</strong> We understand there are private plotted developments in Vrindavan that may not always carry an MVDA sanction initially. In such cases, Gleamrealty steps into the shoes of the regulator: verifying title deeds back 12 years, confirming 143 agricultural-to-non-agricultural conversion, clearing revenue tax receipts, and validating mutation feasibility before a single plot is offered to our patrons.
            </div>
        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: Why Choose Vrindavan — Strategic Pivot & Watershed 2026
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Narrative -->
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                      :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    Infrastructure &amp; Growth Outlook
                </span>

                <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    Why Choose Vrindavan: The Strategic Pivot in 2026
                </h2>

                <p class="text-sm sm:text-base font-normal leading-relaxed"
                   :style="{ color: 'var(--theme-text-primary)' }">
                    Investing in residential plots in Vrindavan is no longer merely a sentimental choice; it is a meticulously calculated wealth creation move. Vrindavan is not a distant, seasonal temple town anymore — it has rapidly emerged as a booming corridor of high-speed connectivity, tourism capital, and master-planned urbanization.
                </p>

                <!-- 4 Strategic Factors -->
                <div class="space-y-4 pt-2">
                    
                    <div class="p-5 rounded-2xl border transition-colors flex items-start gap-4"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 font-bold text-xs"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                            1
                        </div>
                        <div class="space-y-1 text-xs sm:text-sm">
                            <strong class="block font-semibold" :style="{ color: 'var(--theme-title)' }">
                                The Yamuna Expressway Effect
                            </strong>
                            <p class="font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                                The 165-km access-controlled expressway has integrated Delhi-NCR directly with Vrindavan in just 90 to 120 minutes. With the opening of Noida International Airport (Jewar) and the upcoming International Film City, Vrindavan sits right at the epicentre of North India's fastest-growing economic axis.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl border transition-colors flex items-start gap-4"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 font-bold text-xs"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                            2
                        </div>
                        <div class="space-y-1 text-xs sm:text-sm">
                            <strong class="block font-semibold" :style="{ color: 'var(--theme-title)' }">
                                Banke Bihari Heritage Corridor
                            </strong>
                            <p class="font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                                Following the monumental success of the Kashi Vishwanath and Mahakal Lok corridors, the UP Government is executing the world-class Banke Bihari Temple Corridor. Real estate within a 5 to 7 km radius is witnessing exponential value surges as pilgrim hospitality upgrades.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl border transition-colors flex items-start gap-4"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 font-bold text-xs"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                            3
                        </div>
                        <div class="space-y-1 text-xs sm:text-sm">
                            <strong class="block font-semibold" :style="{ color: 'var(--theme-title)' }">
                                ₹1,645 Crore Outer Bypass Project
                            </strong>
                            <p class="font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                                Solving historical festival congestion, the massive new outer ring road cleanly routes highway traffic away from sacred lanes directly to approved plotted communities on NH-19 and Raal Road.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl border transition-colors flex items-start gap-4"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 font-bold text-xs"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                            4
                        </div>
                        <div class="space-y-1 text-xs sm:text-sm">
                            <strong class="block font-semibold" :style="{ color: 'var(--theme-title)' }">
                                Potable Ganga Jal Pipeline
                            </strong>
                            <p class="font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                                Solving the traditional salinity concern of Mathura groundwater, new government pipelines are bringing pure Himalayan Ganga water directly to approved township developments.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Right Visual: Why Choose Vrindavan -->
            <div class="lg:col-span-5 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <img src="<?= asset('uploads/pages/Why-Choose-Vrindavan.jpg') ?>"
                         alt="Why Choose Vrindavan Real Estate"
                         class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="p-6 space-y-3" :style="{ backgroundColor: 'var(--theme-card-bg)' }">
                        <div class="text-[11px] font-bold uppercase tracking-widest" :style="{ color: 'var(--theme-accent)' }">
                            Religious Tourism as an ROI Engine
                        </div>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                            With over <strong>6 Crore visitors annually</strong>, demand for luxury homestays, weekend sanctuaries, and spiritual villas is unprecedented. Investors in our sanctioned residential plots are realizing <strong>15% to 17% annual yields</strong> through holiday rental leasing and rapid capital appreciation.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: Comprehensive Project Showcases — An Encyclopedia of Braj Living
     ======================================================================= -->
<section id="projects-showcase" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Curated Portfolio
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                The Comprehensive Project Showcases
            </h2>
            <p class="text-sm sm:text-base font-normal leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                At Gleamrealty Private Limited, selecting the right piece of residential land requires more than just looking at a site plan. It demands verified legal sanctions, robust physical infrastructure, and unmatched spiritual connectivity. Explore our flagship developments below:
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Project 1: Shri Vrinda Orchids -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/shri-vrinda-orchids.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vrinda Orchids Plots and Villas"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                                MVDA &amp; RERA Approved
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 65,000 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Rukmani Vihar, Vrindavan
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            1. Shri Vrinda Orchids
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            The gold standard of MVDA &amp; RERA approved residential plots and luxury villas in Vrindavan. Conceptualized as an eco-conscious sanctuary with underground cabling, wide paved roads, private clubhouse, and walking distance to Ramtal.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">100 - 350 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">UPRERA Certified</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-orchids-plots-and-villas') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 2: Shri Vrinda Naivedyam -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/naivedyam.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vrinda Naivedyam Premium Residential Plots"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                                MVDA Approved
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 42,500 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Akbarpur, NH-19 Approach
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            2. Shri Vrinda Naivedyam
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            Ideal for high capital appreciation on the NH-19 corridor. Features MVDA Approval (No. MTDA/Z2/ANI/2025/0000578), 4-lane access, 24/7 security, lush parks, and instant proximity to GLA University &amp; Prem Mandir.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">119 - 177 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Highway Frontage</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-naivedyam-premium-residential-plots') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 3: Shri Vrinda Greens -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/vrinda-greens.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vrinda Greens Premium Residential Plots"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-blue-500/90 text-white backdrop-blur-md shadow-md">
                                Near Prem Mandir
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 60,000 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Chhatikara-Radha Kund Road
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            3. Shri Vrinda Greens
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            For home-seekers who refuse to compromise on location. Set right in the spiritual hub near Prem Mandir, Chandrodaya Mandir, and ISKCON, offering quiet tree-lined avenues and high rental yields.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">100 - 250 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Boutique Stays Ready</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-greens-premium-residential-plots') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 4: Shri Vrinda Vihaar -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/vrinda-vihaar.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vrinda Vihaar Residential Plots"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-purple-500/90 text-white backdrop-blur-md shadow-md">
                                Rukmani Vihar Ext.
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 65,000 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Rukmani Vihar Extension
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            4. Shri Vrinda Vihaar
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            Adjacent to Vrindavan’s most prestigious plotted enclave. Offers established VIP neighborhood tranquility, immediate registry, expansive frontages, and clean municipal approaches.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">120 - 300 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">VIP Enclave</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-vihaar-residential-plots') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 5: Shri Vrinda Aakruti Village -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/aakruti-village.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vrinda Aakruti Village Township"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                                Plots &amp; Duplex Villas
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 35,000 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Mathura-Govardhan Road
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            5. Shri Vrinda Aakruti Village
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            The perfect balance between the historic energy of Mathura and the divine aura of Govardhan. Choose between custom residential plots or move-in ready luxury duplex villas.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">100 - 250 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Govardhan Gateway</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-aakruti-village-premium-residential-township') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 6: Shri Vasudhara Vaishaly -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/projects/vasundhara.jpg') ?>"
                             onerror="this.src='<?= asset('uploads/pages/residential-plots-in-vrindavan.jpeg') ?>'"
                             alt="Shri Vasudhara Vaishaly Premium Plots"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/90 text-white backdrop-blur-md shadow-md">
                                Best Entry Value
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 39,990 / sq. yd
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 space-y-3">
                        <div class="text-[11px] uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Chaumuha, NH-19
                        </div>
                        <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            6. Shri Vasudhara Vaishaly
                        </h3>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed line-clamp-3" :style="{ color: 'var(--theme-text-primary)' }">
                            Accessible spirituality for every devotee. Ground-floor entry price in a gated, secure community with wide avenues, street lighting, and immediate mutation support.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px]" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">111 - 240 Sq. Yards</span>
                            <span class="px-2.5 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Gated Security</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= url('/projects/shri-vasudhara-vaishaly-premium-residential-plots') ?>"
                       class="w-full py-3 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     6. SECTION 5: The 2026 Ground Reality — Infrastructure Megaprojects
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Image -->
        <div class="lg:col-span-5 relative group">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <img src="<?= asset('uploads/pages/infrastructure.jpg') ?>"
                     alt="Vrindavan Infrastructure Megaprojects"
                     class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="p-6 space-y-2 border-t" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-xs font-bold uppercase tracking-wider" :style="{ color: 'var(--theme-title)' }">
                        Braj Vikas Master Plan 2041
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        A multi-billion rupee state initiative transforming pilgrimage infrastructure, urban drainage, arterial road corridors, and riverfront beautification.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="lg:col-span-7 space-y-6">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($rp['megaprojects']['eyebrow'] ?? 'Economic Infrastructure') ?>
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($rp['megaprojects']['title'] ?? 'The 2026 Ground Reality: Megaprojects Transforming Braj') ?>
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-normal leading-relaxed"
                 :style="{ color: 'var(--theme-text-primary)' }">
                <?php if (!empty($rp['megaprojects']['subtitle'])): ?>
                    <p class="font-light italic" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($rp['megaprojects']['subtitle']) ?>
                    </p>
                <?php endif; ?>
                
                <div class="border-l-2 pl-4 py-1 space-y-1" :style="{ borderColor: 'var(--theme-accent)' }">
                    <div class="flex items-center justify-between">
                        <strong class="block text-sm" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['megaprojects']['mp1_title'] ?? 'Noida International Airport (Jewar)') ?>
                        </strong>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-amber-500/20 text-amber-300">
                            <?= e($rp['megaprojects']['mp1_badge'] ?? 'Opening 2026') ?>
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['megaprojects']['mp1_desc'] ?? 'Just 75–90 minutes from Vrindavan via the Yamuna Expressway, connecting global devotees directly without Delhi airport congestion.') ?>
                    </p>
                </div>

                <div class="border-l-2 pl-4 py-1 space-y-1" :style="{ borderColor: 'var(--theme-accent)' }">
                    <div class="flex items-center justify-between">
                        <strong class="block text-sm" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['megaprojects']['mp2_title'] ?? '1,000-Acre Raya Heritage City') ?>
                        </strong>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-amber-500/20 text-amber-300">
                            <?= e($rp['megaprojects']['mp2_badge'] ?? 'YEIDA Megaproject') ?>
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['megaprojects']['mp2_desc'] ?? 'A dedicated spiritual tourism and cultural zone adjacent to Mathura-Vrindavan featuring riverfront development and convention centers.') ?>
                    </p>
                </div>

                <div class="border-l-2 pl-4 py-1 space-y-1" :style="{ borderColor: 'var(--theme-accent)' }">
                    <div class="flex items-center justify-between">
                        <strong class="block text-sm" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['megaprojects']['mp3_title'] ?? 'Banke Bihari Corridor & Rapid Rail') ?>
                        </strong>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-amber-500/20 text-amber-300">
                            <?= e($rp['megaprojects']['mp3_badge'] ?? 'Urban Modernization') ?>
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['megaprojects']['mp3_desc'] ?? 'Grand corridor decongesting access to the historic temple with dedicated rapid transit between Mathura Junction and Vrindavan.') ?>
                    </p>
                </div>

                <div class="border-l-2 pl-4 py-1 space-y-1" :style="{ borderColor: 'var(--theme-accent)' }">
                    <div class="flex items-center justify-between">
                        <strong class="block text-sm" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['megaprojects']['mp4_title'] ?? 'MVDA Master Plan 2031') ?>
                        </strong>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-amber-500/20 text-amber-300">
                            <?= e($rp['megaprojects']['mp4_badge'] ?? '₹2,082 Cr Budget') ?>
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['megaprojects']['mp4_desc'] ?? 'Planned arterial road expansions, green belt reserves, and comprehensive civic infrastructure ensuring pristine residential communities.') ?>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     7. SECTION 6: Life as a Brajwasi — The Unspoken Lifestyle Dividend
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($rp['lifestyle']['eyebrow'] ?? 'Sacred Living') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($rp['lifestyle']['title'] ?? 'Life as a Brajwasi: The Spiritual Lifestyle Dividend') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($rp['lifestyle']['subtitle'] ?? 'When you invest in residential land in Vrindavan, you aren\'t just buying a plot of earth; you are securing a front-row seat to an elevated divine lifestyle that nurtures the soul.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Cards: Daily Routine -->
            <div class="lg:col-span-7 space-y-6">
                
                <div class="p-6 rounded-2xl border transition-colors space-y-2"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="flex items-center gap-3">
                        <span class="text-amber-400 font-bold text-sm">✦ 01</span>
                        <h4 class="font-editorial text-lg font-normal" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['lifestyle']['card1_title'] ?? 'Mangala Aarti & Sacred Dawn') ?>
                        </h4>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['lifestyle']['card1_desc'] ?? 'Begin your morning to the peaceful ringing of temple bells and birdsong. Developments like Shri Vrinda Orchids and Shri Vrinda Greens are nestled minutes from Ramtal and Rukmani Vihar, keeping you connected without the city bustle.') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-colors space-y-2"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="flex items-center gap-3">
                        <span class="text-amber-400 font-bold text-sm">✦ 02</span>
                        <h4 class="font-editorial text-lg font-normal" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['lifestyle']['card2_title'] ?? 'The Sacred Tradition of Parikrama') ?>
                        </h4>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['lifestyle']['card2_desc'] ?? 'Living here gives you instant daily access to the holy Parikrama Marg. Devotees take serene barefoot morning walks along sacred dust and century-old Kadamba groves.') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-colors space-y-2"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="flex items-center gap-3">
                        <span class="text-amber-400 font-bold text-sm">✦ 03</span>
                        <h4 class="font-editorial text-lg font-normal" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['lifestyle']['card3_title'] ?? 'Yamuna Sandhya & Deep Daan') ?>
                        </h4>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['lifestyle']['card3_desc'] ?? 'As dusk descends over the Yamuna, the aroma of incense and sound of kartals echo through the air. Experience peaceful contemplation and community Satsang with like-minded neighbors.') ?>
                    </p>
                </div>

                <div class="p-6 rounded-2xl border transition-colors space-y-2"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <div class="flex items-center gap-3">
                        <span class="text-amber-400 font-bold text-sm">✦ 04</span>
                        <h4 class="font-editorial text-lg font-normal" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['lifestyle']['card4_title'] ?? 'Festivals Through “Resident Eyes”') ?>
                        </h4>
                    </div>
                    <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                        <?= e($rp['lifestyle']['card4_desc'] ?? 'While tourists struggle with packed streets during Holi, Janmashtami, Kartik Maas, and Jhulan Yatra, you enjoy the serene shelter of your own gated retreat, joining celebrations at your leisure.') ?>
                    </p>
                </div>

            </div>

            <!-- Right Visual -->
            <div class="lg:col-span-5 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <img src="<?= asset('uploads/pages/benefits-of-living-in-vrindavan.jpg') ?>"
                         alt="Benefits of Living in Vrindavan Sanctuary"
                         class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="p-6 space-y-2 border-t" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        <div class="text-xs font-bold uppercase tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            A Soul Sanctuary for Generations
                        </div>
                        <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                            Build your legacy home in the holy dust of Braj. Give your children and parents a spiritual haven anchored in Vedic harmony, fresh air, and deep community bonding.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     8. SECTION 7: The Practical Buyer's Checklist — Legalities to Mutation
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Due Diligence Guide
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                The Practical Buyer’s Checklist
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Sincerity in real estate advisory means giving you transparent, verifiable facts. Transitioning from a seeker to a landowner involves four critical steps:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-7 rounded-3xl border space-y-4 transition-all hover:shadow-xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    01
                </div>
                <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    The Sale Deed
                </h3>
                <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    The foremost legal deed registered at the Office of the Sub-Registrar in Mathura. It is an official transfer confirming title transfer from developer to your name.
                </p>
            </div>

            <div class="p-7 rounded-3xl border space-y-4 transition-all hover:shadow-xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    02
                </div>
                <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Revenue Mutation (Dakhil Kharij)
                </h3>
                <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    Possessing a sale deed alone is incomplete. Mutation at the Tehsildar office updates the government’s "Jamabandi" records, establishing your legal tax accountability.
                </p>
            </div>

            <div class="p-7 rounded-3xl border space-y-4 transition-all hover:shadow-xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    03
                </div>
                <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Vastu Purusha Compliance
                </h3>
                <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    In the sacred land of Krishna, building to cosmic harmony is paramount. We prioritize Gaumukhi shapes, North/East road orientations, and fertile natural soil.
                </p>
            </div>

            <div class="p-7 rounded-3xl border space-y-4 transition-all hover:shadow-xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                    04
                </div>
                <h3 class="text-lg font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    30-Year Title Clearance
                </h3>
                <p class="text-xs sm:text-sm font-normal leading-relaxed" :style="{ color: 'var(--theme-text-primary)' }">
                    Every property promoted by Gleamrealty undergoes comprehensive revenue chain search, non-encumbrance verification, and boundary demarcation survey.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     9. SECTION 8: Market Trajectory & Price Forecasts — Vrindavan Land Matrix
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($rp['matrix']['eyebrow'] ?? 'Market Analytics') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($rp['matrix']['title'] ?? 'Vrindavan Land Valuation Matrix') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($rp['matrix']['subtitle'] ?? 'A comparative study of approved plotted corridors, 5-year growth trajectory, and projected valuations heading into 2028-2030:') ?>
            </p>
        </div>

        <!-- Valuation Table -->
        <div class="rounded-3xl border overflow-hidden shadow-2xl transition-colors"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-badge-bg)' }">
                            <th class="p-4 sm:p-6 font-semibold uppercase tracking-wider text-xs" :style="{ color: 'var(--theme-title)' }">Location / Corridor</th>
                            <th class="p-4 sm:p-6 font-semibold uppercase tracking-wider text-xs" :style="{ color: 'var(--theme-title)' }">2021 Price</th>
                            <th class="p-4 sm:p-6 font-semibold uppercase tracking-wider text-xs text-amber-400">2026 Price</th>
                            <th class="p-4 sm:p-6 font-semibold uppercase tracking-wider text-xs text-amber-500">2028-30 Forecast</th>
                            <th class="p-4 sm:p-6 font-semibold uppercase tracking-wider text-xs" :style="{ color: 'var(--theme-title)' }">Profile &amp; Suitability</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <?php
                        $matrixRows = !empty($rp['matrix']['rows']) && is_array($rp['matrix']['rows'])
                            ? $rp['matrix']['rows']
                            : [];
                        ?>
                        <?php foreach ($matrixRows as $row): ?>
                            <tr>
                                <td class="p-4 sm:p-6 font-medium" :style="{ color: 'var(--theme-title)' }">
                                    <?= e($row['location'] ?? '') ?>
                                </td>
                                <td class="p-4 sm:p-6 font-medium" :style="{ color: 'var(--theme-text-secondary)' }"><?= e($row['price_2021'] ?? '') ?></td>
                                <td class="p-4 sm:p-6 font-bold text-amber-400"><?= e($row['price_2026'] ?? '') ?></td>
                                <td class="p-4 sm:p-6 font-bold text-amber-500"><?= e($row['forecast'] ?? '') ?></td>
                                <td class="p-4 sm:p-6 font-normal" :style="{ color: 'var(--theme-text-primary)' }"><?= e($row['suitability'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


<!-- =======================================================================
     10. SECTION 9: Frequently Asked Questions (All 10 Accordion Items)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }"
         x-data="{ activeFaq: null }">
    <div class="max-w-4xl mx-auto space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($rp['faqs']['eyebrow'] ?? 'Clarity & Transparency') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($rp['faqs']['title'] ?? 'Frequently Asked Questions') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($rp['faqs']['subtitle'] ?? 'Everything you need to know about buying MVDA approved plots, pricing benchmarks, legal risks, and construction guidelines in Vrindavan.') ?>
            </p>
        </div>

        <!-- Accordion Container -->
        <div class="space-y-4">
            
            <?php
            $faqData = !empty($rp['faqs']['list']) && is_array($rp['faqs']['list'])
                ? $rp['faqs']['list']
                : [];

            foreach ($faqData as $idx => $faq):
            ?>
            <div class="rounded-2xl border transition-all duration-300 overflow-hidden"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <button type="button"
                        class="w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-semibold text-sm sm:text-base transition-colors"
                        :style="{ color: activeFaq === <?= $idx ?> ? 'var(--theme-accent)' : 'var(--theme-title)' }"
                        @click="activeFaq = (activeFaq === <?= $idx ?> ? null : <?= $idx ?>)">
                    <span><?= e($faq['q'] ?? '') ?></span>
                    <span class="w-7 h-7 rounded-full flex items-center justify-center shrink-0 border text-xs transition-transform duration-300"
                          :class="{ 'rotate-180': activeFaq === <?= $idx ?> }"
                          :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)' }">
                        &darr;
                    </span>
                </button>
                <div x-show="activeFaq === <?= $idx ?>"
                     x-collapse
                     x-cloak
                     class="px-5 sm:px-6 pb-6 pt-1 text-xs sm:text-sm font-normal leading-relaxed border-t"
                     :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    <?= nl2br(e($faq['a'] ?? '')) ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- =======================================================================
     11. SECTION 10: Find Your Dream Property / Free Site Visit Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)' }">
    
    <!-- Ambient Backdrop Halos -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($rp['consultation']['badge'] ?? '✦ Free VIP Site Visit & Showing') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($rp['consultation']['title'] ?? 'Find Your Dream Plot in Vrindavan') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($rp['consultation']['subtitle'] ?? 'Schedule a personalized consultation and guided site tour of our 6 flagship MVDA approved developments. Our senior property advisors will guide you with absolute candor.') ?>
            </p>
        </div>

        <!-- Inquiry Form Card -->
        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 project: 'Shri Vrinda Orchids',
                 plotSize: '150-200 Sq. Yards',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please enter your name and contact phone number.';
                         return;
                     }
                     this.loading = true;
                     this.errorMsg = '';
                     this.successMsg = '';
                     try {
                         const payload = {
                             name: this.name,
                             phone: this.phone,
                             email: this.email,
                             project_name: this.project,
                             message: 'Inquiry for ' + this.project + ' (' + this.plotSize + '). ' + (this.message || ''),
                             source: 'Residential Plots Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you for reaching out. Our Senior Advisory Team will call you shortly.';
                             this.name = ''; this.phone = ''; this.email = ''; this.message = '';
                         } else {
                             this.errorMsg = data.message || 'Something went wrong. Please call us directly at <?= e($rp['consultation']['phone_1'] ?? '+91 9871731303') ?> / <?= e($rp['consultation']['phone_2'] ?? '+91 7409767452') ?>.';
                         }
                     } catch (e) {
                         this.errorMsg = 'Network error. Please call our Gleamrealty Private Limited at <?= e($rp['consultation']['phone_1'] ?? '+91 9871731303') ?> / <?= e($rp['consultation']['phone_2'] ?? '+91 7409767452') ?>.';
                     } finally {
                         this.loading = false;
                     }
                 }
             }">
            
            <form @submit.prevent="submitForm()" class="space-y-6">
                
                <div x-show="successMsg" x-cloak class="p-4 rounded-xl bg-[#FDF3E3] border border-[#9A6B2F]/30 text-[#9A6B2F] text-sm font-medium text-center">
                    <span x-text="successMsg"></span>
                </div>

                <div x-show="errorMsg" x-cloak class="p-4 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-300 text-sm font-medium text-center">
                    <span x-text="errorMsg"></span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Your Full Name *
                        </label>
                        <input type="text"
                               x-model="name"
                               required
                               placeholder="e.g. Radheshyam Sharma"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Phone / WhatsApp Number *
                        </label>
                        <input type="tel"
                               x-model="phone"
                               required
                               placeholder="<?= e($rp['consultation']['phone_1'] ?? '+91 9871731303') ?>"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Email Address
                        </label>
                        <input type="email"
                               x-model="email"
                               placeholder="name@domain.com"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Preferred Project
                        </label>
                        <select x-model="project"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="Shri Vrinda Orchids">Shri Vrinda Orchids (Rukmani Vihar)</option>
                            <option value="Shri Vrinda Naivedyam">Shri Vrinda Naivedyam (NH-19 Akbarpur)</option>
                            <option value="Shri Vrinda Greens">Shri Vrinda Greens (Near Prem Mandir)</option>
                            <option value="Shri Vrinda Vihaar">Shri Vrinda Vihaar (Rukmani Vihar Ext.)</option>
                            <option value="Shri Vrinda Aakruti Village">Shri Vrinda Aakruti Village (Govardhan Rd)</option>
                            <option value="Shri Vasudhara Vaishaly">Shri Vasudhara Vaishaly (Chaumuha)</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Plot Size Requirement
                        </label>
                        <select x-model="plotSize"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="100-120 Sq. Yards">100 - 120 Sq. Yards (Compact Cottage)</option>
                            <option value="150-200 Sq. Yards">150 - 200 Sq. Yards (Standard Villa)</option>
                            <option value="250-350 Sq. Yards">250 - 350 Sq. Yards (Spacious Retreat)</option>
                            <option value="500+ Sq. Yards">500+ Sq. Yards (Custom Estate)</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Site Visit Timeline
                        </label>
                        <input type="text"
                               x-model="message"
                               placeholder="e.g. Planning visit this Saturday"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>

                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit"
                            :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Confirm Free Site Visit &rarr;</span>
                        <span x-show="loading" x-cloak>Submitting Request...</span>
                    </button>

                    <div class="flex items-center gap-4 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Or reach our desk directly:</span>
                        <?php
                            $waNumber = preg_replace('/[^0-9]/', '', $rp['consultation']['whatsapp'] ?? '919871731303');
                            $phone1Clean = preg_replace('/[^0-9+]/', '', $rp['consultation']['phone_1'] ?? '+91 9871731303');
                            $phone2Clean = preg_replace('/[^0-9+]/', '', $rp['consultation']['phone_2'] ?? '+91 7409767452');
                        ?>
                        <a href="https://wa.me/<?= $waNumber ?>?text=Hare%20Krishna!%20I%20am%20interested%20in%20Residential%20Plots%20in%20Vrindavan."
                           target="_blank"
                           class="inline-flex items-center gap-1.5 font-bold text-amber-600 dark:text-amber-400 hover:underline">
                            WhatsApp &bull; Instant
                        </a>
                        <span>&bull;</span>
                        <a href="tel:<?= $phone1Clean ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['consultation']['phone_1'] ?? '+91 9871731303') ?>
                        </a>
                        <span>/</span>
                        <a href="tel:<?= $phone2Clean ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($rp['consultation']['phone_2'] ?? '+91 7409767452') ?>
                        </a>
                    </div>
                </div>

            </form>

        </div>

    </div>
</section>

</div>
