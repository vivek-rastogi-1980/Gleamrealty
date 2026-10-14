<?php
/**
 * Commercial Property in Vrindavan — Master Showcase View
 * Curated exclusively for Gleamrealty Private Limited
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 * @var array|null $cp
 */
$cp = !empty($cp) ? $cp : \App\Models\Setting::getCommercialPropertySections();

$heroCover = !empty($cp['hero']['image']) ? media_url($cp['hero']['image']) : (!empty($page['hero_media_url']) ? media_url($page['hero_media_url']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'));
$heroTitle = !empty($cp['hero']['heading']) ? $cp['hero']['heading'] : (!empty($page['hero_heading']) ? $page['hero_heading'] : ($page['title'] ?? 'Commercial Property in Vrindavan'));
$heroSubtitle = !empty($cp['hero']['subheading']) ? $cp['hero']['subheading'] : (!empty($page['hero_subheading']) ? $page['hero_subheading'] : 'Commercial Land, High-Street Retail Shops & Hotel Plots in Vrindavan');
$heroBadge = !empty($cp['hero']['badge']) ? $cp['hero']['badge'] : '✦ Gleamrealty Private Limited • HIGH-YIELD COMMERCIAL ASSET CLASS';
?>

<!-- =======================================================================
     1. HERO BANNER: Commercial Property in Vrindavan
     ======================================================================= -->
<section class="relative min-h-[52vh] sm:min-h-[58vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden bg-stone-950 transition-colors duration-300"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroCover ?>"
             alt="<?= e($heroTitle) ?> — Shops, Retail & Land"
             class="w-full h-full object-cover filter brightness-[0.42] contrast-[1.08] scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/75 to-stone-950/40"></div>
        <div class="absolute inset-0 bg-black/35"></div>
    </div>

    <!-- Radiant Ambient Light Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-6">
        
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold tracking-[0.22em] uppercase">
            <a href="<?= url('/') ?>" class="text-stone-300 hover:text-white transition-colors">Home</a>
            <span class="text-amber-500/60">&bull;</span>
            <a href="<?= url('/projects') ?>" class="text-stone-300 hover:text-white transition-colors">Projects</a>
            <span class="text-amber-500/60">&bull;</span>
            <span class="text-amber-400 font-bold">Commercial Property</span>
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
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-[#9A6B2F] fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <?= e($cp['hero']['badge_1'] ?? '100% MVDA & CLU Approved') ?>
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-sm">
                <?= e($cp['hero']['badge_2'] ?? '✦ 11-Crore Annual Pilgrim Footfall') ?>
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                <?= e($cp['hero']['badge_3'] ?? 'Bank Financing Approved') ?>
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                <?= e($cp['hero']['badge_4'] ?? 'Zero Brokerage Direct') ?>
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#commercial-showcase"
               class="btn-bronze inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] shadow-lg hover:shadow-xl transition-all">
                <span>View Commercial Units</span>
                <span class="text-sm">&darr;</span>
            </a>
            <button type="button" @click="vipModalOpen = true"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                <span>Book Commercial Site Visit</span>
                <span class="text-amber-400">&rarr;</span>
            </button>
            <a href="tel:+919871731303"
               class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 bg-white/10 backdrop-blur-md hover:border-white/50 transition-colors">
                <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                <span>+91 9871731303</span>
            </a>
            <?php if (function_exists('auth_user') && auth_user()): ?>
                <a href="<?= url('/admin/commercial-property') ?>"
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
     2. SECTION 1: Commercial Land in Vrindavan — From Pilgrimage to Powerhouse
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <?php $overviewCardImg = !empty($cp['overview']['image']) ? media_url($cp['overview']['image']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'); ?>
                    <img src="<?= $overviewCardImg ?>"
                         alt="Commercial Land & Retail Plazas Vrindavan"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($cp['overview']['badge_sub'] ?? 'High-Yield Asset') ?>
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            <?= e($cp['overview']['badge_title'] ?? '12% - 18% Project Yields') ?>
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
                <?php $secMicroImg = !empty($cp['overview']['secondary_image']) ? media_url($cp['overview']['secondary_image']) : asset('uploads/pages/property-in-vrindavan.png'); ?>
                <img src="<?= $secMicroImg ?>" alt="Vrindavan Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['overview']['secondary_title'] ?? 'Strategic Retail Hub') ?>
                    </strong>
                    <?= e($cp['overview']['secondary_desc'] ?? 'Positioned along heavy tourist corridors capturing daily pilgrim spending.') ?>
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($cp['overview']['badge'] ?? 'Economic Reality') ?>
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($cp['overview']['title'] ?? 'Commercial Land in Vrindavan') ?>
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <?php if (!empty($cp['overview']['content'])): ?>
                    <?= $cp['overview']['content'] ?>
                <?php elseif (!empty($page['content'])): ?>
                    <?= $page['content'] ?>
                <?php else: ?>
                    <p>
                        The spiritual heartbeat of India has always been centered in the sacred groves of Vrindavan. Millions have traveled to this city over the years, seeking peace, devotion, and a link to God. The narrative surrounding Vrindavan has been transformed from being purely spiritual in nature to displaying the current trend of economic prosperity throughout the region. This is a time of monumental economic growth for Vrindavan, transitioning from a traditional pilgrimage town into a vibrant commercial hub.
                    </p>
                    <p>
                        To understand why the demand for <strong :style="{ color: 'var(--theme-title)' }">Commercial Property in Vrindavan</strong> has hit an all-time high, one must look at the sheer scale of the audience. Statistics from the Uttar Pradesh Tourism Department and recent market surveys indicate that Vrindavan now welcomes <strong :style="{ color: 'var(--theme-title)' }">over 8 crore pilgrims annually</strong>, conservatively projected to surpass <strong :style="{ color: 'var(--theme-title)' }">11 crore by 2027</strong>. This footfall is not just seasonal; it is a year-round surge that peaks during Janmashtami, Holi, and Radhashtami, but never truly dips.
                    </p>
                    <p>
                        Every devotee who visits Vrindavan requires food, shelter, retail shopping, and logistics. From traditional sweet shops and boutique hotels to modern shopping arcades, high-street retail, and fine dining, the commercial appetite is immense and currently underserved. GLEAMREALTY PRIVATE LIMITED curates only 100% legally clear, MVDA-sanctioned commercial land and retail developments.
                    </p>
                <?php endif; ?>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($cp['overview']['metric_1_val'] ?? '11 Cr+') ?>
                    </div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                        <?= e($cp['overview']['metric_1_lbl'] ?? 'Projected Footfall') ?>
                    </div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($cp['overview']['metric_2_val'] ?? '75%+') ?>
                    </div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                        <?= e($cp['overview']['metric_2_lbl'] ?? 'Avg Occupancy') ?>
                    </div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($cp['overview']['metric_3_val'] ?? '₹30K Cr') ?>
                    </div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                        <?= e($cp['overview']['metric_3_lbl'] ?? 'Infra Outlay') ?>
                    </div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($cp['overview']['metric_4_val'] ?? '100%') ?>
                    </div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">
                        <?= e($cp['overview']['metric_4_lbl'] ?? 'MVDA Approved') ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Infrastructure Catalysts (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($cp['catalysts']['eyebrow'] ?? 'Growth Arteries') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($cp['catalysts']['title'] ?? 'Infrastructure Catalysts Driving Commercial Land in Vrindavan') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
                :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($cp['catalysts']['subtitle'] ?? 'The surge in commercial land demand is fueled by multi-billion dollar state and central infrastructure initiatives redirecting capital directly into the Braj corridor.') ?>
            </p>
        </div>

        <!-- 4 Pillars of Growth -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Catalyst 1 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    01
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($cp['catalysts']['p1_title'] ?? 'The Banke Bihari Heritage Corridor: Commercial Game-Changer') ?>
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($cp['catalysts']['p1_desc'] ?? '') ?>
                </p>
            </div>

            <!-- Catalyst 2 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    02
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($cp['catalysts']['p2_title'] ?? 'The Jewar International Airport Factor') ?>
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($cp['catalysts']['p2_desc'] ?? '') ?>
                </p>
            </div>

            <!-- Catalyst 3 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    03
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($cp['catalysts']['p3_title'] ?? 'Superior Rental Yields & Lease-Back Security') ?>
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($cp['catalysts']['p3_desc'] ?? '') ?>
                </p>
            </div>

            <!-- Catalyst 4 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    04
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($cp['catalysts']['p4_title'] ?? 'The "Limited Supply" Reality of Sacred Land') ?>
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($cp['catalysts']['p4_desc'] ?? '') ?>
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: High-Yield Sectors — Hospitality, Retail & Dining
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($cp['sectors']['eyebrow'] ?? 'Sectors in High Demand') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($cp['sectors']['title'] ?? 'Where Smart Commercial Capital Is Deploying') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($cp['sectors']['subtitle'] ?? 'From boutique heritage hotels to high-street retail malls, discover the three core verticals powering highest commercial returns in Vrindavan.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Sector 1 -->
            <div class="p-8 rounded-3xl border flex flex-col justify-between transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl font-bold border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        <?= e($cp['sectors']['s1_icon'] ?? '🏨') ?>
                    </div>
                    <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s1_title'] ?? 'Hospitality: Resorts & Hotels') ?>
                    </h3>
                    <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($cp['sectors']['s1_desc'] ?? '') ?>
                    </p>
                </div>
                <div class="pt-6 border-t mt-6 flex items-center justify-between text-xs" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <span :style="{ color: 'var(--theme-accent)' }">Expected ROI</span>
                    <span class="font-bold" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s1_roi'] ?? '14% - 18% Annualized') ?>
                    </span>
                </div>
            </div>

            <!-- Sector 2 -->
            <div class="p-8 rounded-3xl border flex flex-col justify-between transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl font-bold border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        <?= e($cp['sectors']['s2_icon'] ?? '🛍️') ?>
                    </div>
                    <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s2_title'] ?? 'High-Street Retail Arcades') ?>
                    </h3>
                    <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($cp['sectors']['s2_desc'] ?? '') ?>
                    </p>
                </div>
                <div class="pt-6 border-t mt-6 flex items-center justify-between text-xs" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <span :style="{ color: 'var(--theme-accent)' }">Rental Yields</span>
                    <span class="font-bold" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s2_roi'] ?? '₹80 - ₹150 / sq. ft / mo') ?>
                    </span>
                </div>
            </div>

            <!-- Sector 3 -->
            <div class="p-8 rounded-3xl border flex flex-col justify-between transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl font-bold border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        <?= e($cp['sectors']['s3_icon'] ?? '🍽️') ?>
                    </div>
                    <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s3_title'] ?? 'Sattvic Fine Dining & F&B') ?>
                    </h3>
                    <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($cp['sectors']['s3_desc'] ?? '') ?>
                    </p>
                </div>
                <div class="pt-6 border-t mt-6 flex items-center justify-between text-xs" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <span :style="{ color: 'var(--theme-accent)' }">Payback Period</span>
                    <span class="font-bold" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['sectors']['s3_roi'] ?? '4 - 6 Years') ?>
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: FLAGSHIP COMMERCIAL SHOWCASE — Shri Vrinda Orchids
     ======================================================================= -->
<section id="commercial-showcase" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($cp['showcase']['eyebrow'] ?? 'Featured Commercial Enclave') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($cp['showcase']['title'] ?? 'Shri Vrinda Orchids Commercial Complex') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($cp['showcase']['subtitle'] ?? 'Prime MVDA approved commercial shops and retail spaces strategically located in Rukmani Vihar, Vrindavan’s most sought-after VIP residential corridor.') ?>
            </p>
        </div>

        <div class="rounded-3xl border overflow-hidden grid grid-cols-1 lg:grid-cols-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            
            <div class="lg:col-span-6 relative bg-stone-900 min-h-[340px]">
                <?php $scImg = !empty($cp['showcase']['image']) ? media_url($cp['showcase']['image']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'); ?>
                <img src="<?= $scImg ?>"
                     alt="<?= e($cp['showcase']['title'] ?? 'Shri Vrinda Orchids Commercial Complex') ?>"
                     class="w-full h-full object-cover">
                <div class="absolute top-6 left-6">
                    <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                        <?= e($cp['showcase']['badge'] ?? '100% MVDA & UP-RERA Registered') ?>
                    </span>
                </div>
                <div class="absolute bottom-6 right-6 px-4 py-2 rounded-2xl text-sm font-bold bg-black/85 text-amber-300 backdrop-blur-md border border-white/20">
                    <?= e($cp['showcase']['price_tag'] ?? 'Starting at ₹ 17,500 / sq. ft') ?>
                </div>
            </div>

            <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="text-xs uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($cp['showcase']['location'] ?? 'Rukmani Vihar, Vrindavan') ?>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($cp['showcase']['headline'] ?? 'Modern Retail Arcade & High-Street Showrooms') ?>
                    </h3>
                    <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($cp['showcase']['desc'] ?? 'Serving over 1,500 premium households in the immediate Rukmani Vihar neighborhood plus passing pilgrim transit. Features 40-foot wide approach avenues, underground utilities, dedicated parking stalls, and dual-side accessibility.') ?>
                    </p>

                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400">
                                <?= e($cp['showcase']['f1_lbl'] ?? 'Shop Sizes') ?>
                            </span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }">
                                <?= e($cp['showcase']['f1_val'] ?? '180 – 650 Sq. Ft') ?>
                            </span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400">
                                <?= e($cp['showcase']['f2_lbl'] ?? 'Frontage') ?>
                            </span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }">
                                <?= e($cp['showcase']['f2_val'] ?? 'Main Sector Road') ?>
                            </span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400">
                                <?= e($cp['showcase']['f3_lbl'] ?? 'Possession') ?>
                            </span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }">
                                <?= e($cp['showcase']['f3_val'] ?? 'Ready Construction') ?>
                            </span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400">
                                <?= e($cp['showcase']['f4_lbl'] ?? 'Financing') ?>
                            </span>
                            <span class="text-sm font-bold text-amber-600 dark:text-amber-400">
                                <?= e($cp['showcase']['f4_val'] ?? 'SBI / HDFC Approved') ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <a href="<?= url('/projects/' . ($cp['showcase']['project_slug'] ?? 'shri-vrinda-orchids-commercial-complex')) ?>"
                       class="px-8 py-3.5 rounded-xl text-xs uppercase font-bold tracking-wider transition-all shadow-lg hover:scale-105"
                       :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        Explore Commercial Complex &rarr;
                    </a>
                    <a href="#freesitevisit"
                       class="px-6 py-3.5 rounded-xl text-xs uppercase font-semibold tracking-wider border transition-all"
                       :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }">
                        Request Inventory &amp; Price List
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     6. SECTION 5: Commercial Land Rate Matrix 2026
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                2026 Pricing Transparency
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Vrindavan Commercial Land &amp; Retail Rate Matrix
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Current market price analysis per corridor across permissible commercial zones in Vrindavan.
            </p>
        </div>

        <div class="overflow-x-auto rounded-2xl border shadow-xl"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="border-b text-xs uppercase tracking-wider"
                        :style="{ backgroundColor: 'var(--theme-section-card-bg)', color: 'var(--theme-title)', borderColor: 'var(--theme-border-hairline)' }">
                        <th class="p-4 sm:p-5 font-bold">Commercial Corridor</th>
                        <th class="p-4 sm:p-5 font-bold">Land Rate (Sq. Yard)</th>
                        <th class="p-4 sm:p-5 font-bold">Retail Rate (Sq. Ft)</th>
                        <th class="p-4 sm:p-5 font-bold">Optimal Commercial Use</th>
                        <th class="p-4 sm:p-5 font-bold">Projected Yield</th>
                    </tr>
                </thead>
                <tbody class="divide-y font-light" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Rukmani Vihar Prime Road</td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 65,000 – ₹ 85,000</td>
                        <td class="p-4 sm:p-5">₹ 14,000 – ₹ 18,000</td>
                        <td class="p-4 sm:p-5">High-Street Retail, Clinics, Banks</td>
                        <td class="p-4 sm:p-5 text-amber-500 font-bold">11% - 14%</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">NH-19 Highway Frontage</td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 45,000 – ₹ 60,000</td>
                        <td class="p-4 sm:p-5">₹ 10,000 – ₹ 14,000</td>
                        <td class="p-4 sm:p-5">Hotels, Resorts, Mega Warehousing</td>
                        <td class="p-4 sm:p-5 text-amber-500 font-bold">12% - 16%</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Chhatikara-Vrindavan Road</td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 75,000 – ₹ 1,10,000</td>
                        <td class="p-4 sm:p-5">₹ 16,000 – ₹ 22,000</td>
                        <td class="p-4 sm:p-5">Boutique Stays, QSR Food Courts</td>
                        <td class="p-4 sm:p-5 text-amber-500 font-bold">10% - 13%</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Bhaktivedanta Swami Marg (ISKCON)</td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 1,20,000 – ₹ 1,80,000</td>
                        <td class="p-4 sm:p-5">₹ 24,000 – ₹ 32,000</td>
                        <td class="p-4 sm:p-5">Precious Gems, Heritage Artifacts</td>
                        <td class="p-4 sm:p-5 text-amber-500 font-bold">9% - 11%</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Sunrakh / Parikrama Periphery</td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 35,000 – ₹ 48,000</td>
                        <td class="p-4 sm:p-5">₹ 8,500 – ₹ 12,000</td>
                        <td class="p-4 sm:p-5">Ayurvedic Ashrams &amp; Wellness</td>
                        <td class="p-4 sm:p-5 text-amber-500 font-bold">12% - 15%</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section>


<!-- =======================================================================
     7. SECTION 6: Frequently Asked Questions (13 Interactive FAQs)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-5xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Investor Intelligence
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Frequently Asked Questions
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Clear, straightforward answers about commercial land, CLU compliance, and returns in Vrindavan.
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $commercialFaqs = [
                [
                    'q' => '1. What is the current commercial plot rate in Vrindavan?',
                    'a' => 'Commercial plot rates in Vrindavan in 2026 range from ₹35,000/sq. yard along developing outer links (Sunrakh, Chaumuha) to ₹65,000–₹85,000/sq. yard in high-demand hubs like Rukmani Vihar and NH-19 highway frontage. Core temple belts exceed ₹1,20,000/sq. yard.'
                ],
                [
                    'q' => '2. Why is MVDA commercial approval essential before purchasing commercial property?',
                    'a' => 'MVDA commercial sanction guarantees legal Change of Land Use (CLU), preventing demolition notices, sealing, or legal disputes. Furthermore, scheduled commercial developments mandate 30–40 ft wide approach roads, adequate guest parking, and clear titles recognized by banks.'
                ],
                [
                    'q' => '3. Can outstation buyers and NRIs invest in commercial land in Vrindavan?',
                    'a' => 'Yes, absolutely. Commercial plots and retail shops in RERA and MVDA approved developments have clear freehold titles that can be registered in the name of Indian residents or NRIs with immediate registry and mutation.'
                ],
                [
                    'q' => '4. What are the typical rental yields for commercial property in Vrindavan?',
                    'a' => 'Commercial assets in Vrindavan generate 10% to 15% annual rental yields, significantly higher than typical 2-3% residential apartment yields. Hospitality and holiday guest homes benefit from 70-75% annual average occupancy.'
                ],
                [
                    'q' => '5. What commercial units are available in Shri Vrinda Orchids Commercial Complex?',
                    'a' => 'Shri Vrinda Orchids Commercial Complex offers lockable retail shops and showroom units ranging from 180 sq. ft to 650 sq. ft, suitable for branded retail, pharmacies, boutique sweet shops, and banking outlets.'
                ],
                [
                    'q' => '6. How will the Jewar International Airport impact commercial property values?',
                    'a' => 'The Jewar Airport, now operating commercial flights, connects Vrindavan in just 90 minutes via the Yamuna Expressway. This facilitates global tourism, making large-format hotels, resorts, and premium retail highly profitable.'
                ],
                [
                    'q' => '7. Is bank loan financing available for commercial property in Vrindavan?',
                    'a' => 'Yes. On all MVDA approved commercial developments marketed by GLEAMREALTY PRIVATE LIMITED, premier lenders including SBI, HDFC, and ICICI offer commercial mortgage and business financing facilities.'
                ],
                [
                    'q' => '8. What is the minimum investment ticket size for commercial property?',
                    'a' => 'Retail units in structured commercial complexes start from approximately ₹28 to ₹35 Lakhs, while commercial plots for hotel or guest house developments typically start from ₹65 Lakhs onwards.'
                ],
                [
                    'q' => '9. How does the Banke Bihari Corridor affect commercial zoning?',
                    'a' => 'The corridor project will modernize pedestrian flow and create dedicated high-street shopping zones, driving double-digit capital appreciation in commercial land located within a 5 km radius.'
                ],
                [
                    'q' => '10. Can commercial property in Vrindavan be leased back to hotel operators?',
                    'a' => 'Yes, managed lease-back models are rapidly expanding in Vrindavan, where commercial developers partner with hospitality chains to offer fixed monthly returns and profit-sharing models to investors.'
                ],
                [
                    'q' => '11. Which areas in Vrindavan have the highest commercial footfall?',
                    'a' => 'Rukmani Vihar, Chhatikara Road, Bhaktivedanta Swami Marg, and the NH-19 intersection experience the highest density of tourist vehicles and devotee footfall year-round.'
                ],
                [
                    'q' => '12. What documents should I inspect before buying commercial land?',
                    'a' => 'Verify the 30-year title deed, MVDA commercial layout sanction order, Section 143/80 non-agricultural conversion certificate, UP-RERA registration, and municipal tax clearance certificates.'
                ],
                [
                    'q' => '13. How does GLEAMREALTY PRIVATE LIMITED assist commercial investors?',
                    'a' => 'We provide end-to-end advisory: conducting legal due diligence, selecting high-footfall micro-locations, negotiating direct developer pricing with zero brokerage, and managing registration and mutation.'
                ]
            ];
            ?>

            <?php foreach ($commercialFaqs as $idx => $faq): ?>
                <div class="rounded-2xl border transition-all duration-300"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <button @click="activeAccordion = (activeAccordion === <?= $idx ?> ? null : <?= $idx ?>)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 font-editorial text-lg sm:text-xl font-normal transition-colors"
                            :style="{ color: 'var(--theme-title)' }">
                        <span><?= htmlspecialchars($faq['q']) ?></span>
                        <span class="text-xl shrink-0 transition-transform duration-300"
                              :class="{ 'rotate-180': activeAccordion === <?= $idx ?> }">
                            &darr;
                        </span>
                    </button>
                    <div x-show="activeAccordion === <?= $idx ?>"
                         x-collapse
                         x-cloak
                         class="px-6 pb-6 text-sm font-light leading-relaxed border-t pt-4"
                         :style="{ color: 'var(--theme-text-secondary)', borderColor: 'var(--theme-border-hairline)' }">
                        <?= htmlspecialchars($faq['a']) ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- =======================================================================
     8. SECTION 7: VIP Commercial Advisory & Site Visit Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($cp['consultation']['badge'] ?? 'Institutional Advisory') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($cp['consultation']['title'] ?? 'Schedule a Commercial Site Consultation') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($cp['consultation']['subtitle'] ?? 'Tour our flagship commercial developments and review projected footfalls, rental cashflow models, and sanctioned layout blueprints with our senior commercial advisors.') ?>
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 commercialType: 'Retail Shop / Showroom',
                 budget: '₹ 50 Lakh - ₹ 1 Crore',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please enter your name and phone number.';
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
                             project_name: 'Commercial Property Vrindavan - ' + this.commercialType,
                             message: 'Budget: ' + this.budget + '. Type: ' + this.commercialType + '. Notes: ' + (this.message || ''),
                             source: 'Commercial Property Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Thank you for connecting with Gleamrealty Private Limited. Our Senior Commercial Consultant will contact you today.';
                             this.name = ''; this.phone = ''; this.email = ''; this.message = '';
                         } else {
                             this.errorMsg = data.message || 'Error sending request. Please call +91 9871731303 / +91 7409767452.';
                         }
                     } catch (e) {
                         this.errorMsg = 'Network error. Please dial our desk directly at +91 9871731303 / +91 7409767452.';
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
                            Investor / Business Name *
                        </label>
                        <input type="text" x-model="name" required placeholder="e.g. Anand Agarwal"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Phone / WhatsApp *
                        </label>
                        <input type="tel" x-model="phone" required placeholder="+91 9871731303"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Asset Category
                        </label>
                        <select x-model="commercialType"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="Retail Shop / Showroom">Retail Shop / High-Street Showroom</option>
                            <option value="Commercial Plot for Hotel/Resort">Commercial Plot for Hotel / Resort</option>
                            <option value="Restaurant / Food Court Space">Restaurant / Food Court Space</option>
                            <option value="High-Yield Leased Asset">High-Yield Leased Asset</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Target Investment Range
                        </label>
                        <select x-model="budget"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="₹ 25 Lakh - ₹ 50 Lakh">₹ 25 Lakh – ₹ 50 Lakh</option>
                            <option value="₹ 50 Lakh - ₹ 1 Crore">₹ 50 Lakh – ₹ 1 Crore</option>
                            <option value="₹ 1 Crore - ₹ 3 Crore">₹ 1 Crore – ₹ 3 Crore</option>
                            <option value="₹ 3 Crore+">₹ 3 Crore+</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Specific Commercial Requirements
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Inquiring for 400 sq.ft retail shop in Rukmani Vihar"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Request Commercial Consultation &rarr;</span>
                        <span x-show="loading" x-cloak>Submitting...</span>
                    </button>
                    <div class="flex items-center gap-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Commercial Direct Desk:</span>
                        <a href="tel:<?= preg_replace('/\s+/', '', $cp['consultation']['phone_1'] ?? '+919871731303') ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($cp['consultation']['phone_1'] ?? '+91 9871731303') ?>
                        </a>
                        <span>/</span>
                        <a href="tel:<?= preg_replace('/\s+/', '', $cp['consultation']['phone_2'] ?? '+917409767452') ?>" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            <?= e($cp['consultation']['phone_2'] ?? '+91 7409767452') ?>
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
