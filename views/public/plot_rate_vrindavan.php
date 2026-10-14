<?php
/**
 * Plot Rate in Vrindavan — Master Showcase View
 * Faithfully matching content, sections, and data from https://earthousing.com/plot-rate-vrindavan
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 */
?>

<!-- =======================================================================
     1. HERO BANNER: Plot Rate in Vrindavan
     ======================================================================= -->
<?php
    $heroCover = !empty($pm['hero']['image']) ? media_url($pm['hero']['image']) : asset('uploads/pages/Why-Choose-Vrindavan.jpg');
    $heroTitle = !empty($pm['hero']['heading']) ? $pm['hero']['heading'] : ($page['title'] ?? 'Plot Rate in Vrindavan');
    $heroSubtitle = !empty($pm['hero']['subheading']) ? $pm['hero']['subheading'] : 'Vrindavan Plot Price, Vrindavan Land Price: What the Numbers Really Mean in 2026';
?>
<section class="relative min-h-[52vh] sm:min-h-[58vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden bg-stone-950 transition-colors duration-300"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroCover ?>"
             alt="<?= e($heroTitle) ?> 2026 — Ground Reality Price Analysis"
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
            <span class="text-amber-400 font-bold">Plot Rate in Vrindavan</span>
        </div>

        <!-- Eyebrow Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-stone-900/80 text-white border border-amber-500/30 shadow-md">
            <span class="w-2 h-2 rounded-full bg-[#9A6B2F] animate-pulse"></span>
            Gleamrealty Private Limited &bull; 2026 Unbiased Valuation Index
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
                Circle vs Market Rates Analyzed
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-sm">
                ✦ NH-19 &amp; Rukmani Vihar Price Matrix
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                Jewar Airport Operational Impact
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                Zero Hidden Brokerage Direct
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#rates-matrix"
               class="btn-bronze inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] shadow-lg hover:shadow-xl transition-all">
                <span>View 2026 Price Table</span>
                <span class="text-sm">&darr;</span>
            </a>
            <button type="button" @click="vipModalOpen = true"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                <span>Request Free Rate Consultation</span>
                <span class="text-amber-400">&rarr;</span>
            </button>
            <a href="tel:+919871731303"
               class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 bg-white/10 backdrop-blur-md hover:border-white/50 transition-colors">
                <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                <span>+91 9871731303</span>
            </a>
            <?php if (function_exists('auth_user') && auth_user()): ?>
                <a href="<?= url('/admin/pages/' . ($page['id'] ?? 8) . '/edit') ?>"
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
     2. SECTION 1: Ground Reality — The Plot Rate Is a Range, Not a Number
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= !empty($pm['narrative']['image']) ? media_url($pm['narrative']['image']) : asset('uploads/pages/Why-Choose-Vrindavan.jpg') ?>"
                         alt="Vrindavan Land Price Ground Reality"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            Mainstream Build Band
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            ₹ 38,000 – ₹ 1,50,000 / sq. yd
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
                <img src="<?= asset('uploads/pages/infrastructure.jpg') ?>" alt="Infrastructure" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        Scarcity Drives Value
                    </strong>
                    Permissible MVDA residential land accounts for under 7% of total municipal acreage in Vrindavan.
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['narrative']['eyebrow'] ?? 'Truth in Pricing') ?>
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['narrative']['title'] ?? 'The Plot Rate in Vrindavan Is a Range, Not a Number') ?>
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed [&_*]:!text-inherit"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <?php if (!empty($pm['narrative']['content'])): ?>
                    <?= $pm['narrative']['content'] ?>
                <?php elseif (!empty($page['content'])): ?>
                    <?= $page['content'] ?>
                <?php else: ?>
                    <p>
                        Ask three brokers for the plot rate in Vrindavan and you will receive three completely conflicting answers. One quotes <strong :style="{ color: 'var(--theme-title)' }">₹25,000 per square yard</strong> on a far-out rural colony. Another quotes <strong :style="{ color: 'var(--theme-title)' }">₹42,000</strong> on the NH-19 highway approach. A third, standing near Prem Mandir, says <strong :style="{ color: 'var(--theme-title)' }">₹85,000 to ₹1 Lakh</strong>, and honestly isn't lying.
                    </p>
                    <p>
                        All three are "Vrindavan." None of them are describing the same product. That spread is the single most critical thing to comprehend before deploying capital. In 2026, the Vrindavan land price spans from unapproved, unauthorized raw agricultural tracts to fully certified, bank-funded gated townships.
                    </p>
                    <p>
                        Most of the active, buildable, approved inventory that ordinary families and smart investors actually purchase sits in the middle band: between <strong :style="{ color: 'var(--theme-title)' }">₹38,000 and ₹65,000 per square yard</strong>. At GLEAMREALTY PRIVATE LIMITED, we believe pricing clarity is sacred.
                    </p>
                <?php endif; ?>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['m1_val'] ?? '₹38K-65K') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['m1_lbl'] ?? 'Approved Band') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['m2_val'] ?? '4 Corridors') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['m2_lbl'] ?? 'Key Micro-Markets') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['m3_val'] ?? '90 Min') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['m3_lbl'] ?? 'To Jewar Airport') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['m4_val'] ?? '100%') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['m4_lbl'] ?? 'Transparent Pricing') ?></div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Where Corridors Sit (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($pm['corridors']['eyebrow'] ?? 'Micro-Market Analysis') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($pm['corridors']['title'] ?? 'Corridor Breakdown: Where Value Meets Approval') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($pm['corridors']['subtitle'] ?? 'Understanding the pricing drivers across Vrindavan\'s four strategic real estate development arteries.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <?php
                $corridors = [
                    [
                        'badge' => $pm['corridors']['c1_price'] ?? '₹ 39,990 – ₹ 42,500 / sq. yd',
                        'title' => $pm['corridors']['c1_title'] ?? 'NH-19 Highway Corridor (Akbarpur & Chaumuha)',
                        'desc' => $pm['corridors']['c1_desc'] ?? 'The NH-19 corridor is doing the heaviest lifting in the market. It offers clean 6-lane highway frontage, direct bypass connectivity into Vrindavan, and rapid appreciation. Flagship developments like <strong>Shri Vrinda Naivedyam</strong> and <strong>Shri Vasudhara Vaishaly</strong> represent the best value-to-safety ratio in North India.'
                    ],
                    [
                        'badge' => $pm['corridors']['c2_price'] ?? '₹ 60,000 – ₹ 75,000 / sq. yd',
                        'title' => $pm['corridors']['c2_title'] ?? 'Rukmani Vihar & VIP Temple Belt',
                        'desc' => $pm['corridors']['c2_desc'] ?? 'The Beverly Hills of Vrindavan. Walking distance or 5-minute drive to Prem Mandir, Chandrodaya Mandir, and ISKCON. Fully integrated plotted township projects like <strong>Shri Vrinda Orchids</strong> and <strong>Shri Vrinda Vihaar</strong> carry premium valuations due to established VIP neighbor profiles and severe land scarcity.'
                    ],
                    [
                        'badge' => $pm['corridors']['c3_price'] ?? '₹ 32,000 – ₹ 38,000 / sq. yd',
                        'title' => $pm['corridors']['c3_title'] ?? 'Mathura-Govardhan Road Corridor',
                        'desc' => $pm['corridors']['c3_desc'] ?? 'A peaceful, green residential corridor linking Mathura City with Govardhan Dham. <strong>Shri Vrinda Aakruti Village</strong> on Satoha-Naugaon Road is fully sanctioned by MVDA (approval MTDA/ZA/ANI2025/0000577), offering sweet water aquifers and spacious 116 to 183 sq. yard layouts.'
                    ],
                    [
                        'badge' => $pm['corridors']['c4_price'] ?? 'Operational Catalyst',
                        'title' => $pm['corridors']['c4_title'] ?? 'Jewar Airport Factor: Already Open & Operating',
                        'desc' => $pm['corridors']['c4_desc'] ?? 'Older internet posts still talk about Jewar Airport opening "in the future." That framing is obsolete: the airport was inaugurated on 28 March 2026, and commercial flights began on 15 June 2026. Scheduled buses already connect the airport to Vrindavan in 90 minutes, establishing a permanent structural floor beneath property values.'
                    ]
                ];
                
                $corridorColors = [
                    'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/30',
                    'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/30',
                    'bg-blue-500/15 text-blue-600 border-blue-500/30',
                    'bg-purple-500/15 text-purple-600 border-purple-500/30'
                ];
            ?>
            
            <?php foreach ($corridors as $i => $c): ?>
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?>
                    </div>
                    <?php if (!empty($c['badge'])): ?>
                    <span class="text-xs font-bold px-3 py-1 rounded-full border <?= $corridorColors[$i % 4] ?>">
                        <?= e($c['badge']) ?>
                    </span>
                    <?php endif; ?>
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($c['title'] ?? '') ?>
                </h3>
                <p class="text-sm font-light leading-relaxed [&_*]:!text-inherit" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= $c['desc'] ?? '' ?>
                </p>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: 2026 Land Price Matrix Table
     ======================================================================= -->
<section id="rates-matrix" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['matrix']['eyebrow'] ?? 'Verified Benchmark') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['matrix']['title'] ?? '2026 Vrindavan Plot Price Matrix') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($pm['matrix']['subtitle'] ?? 'Comprehensive ground-reality rate breakdown across official approval tiers and micro-markets.') ?>
            </p>
        </div>

        <div class="overflow-x-auto rounded-2xl border shadow-xl"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="border-b text-xs uppercase tracking-wider"
                        :style="{ backgroundColor: 'var(--theme-section-card-bg)', color: 'var(--theme-title)', borderColor: 'var(--theme-border-hairline)' }">
                        <th class="p-4 sm:p-5 font-bold">Micro-Market / Corridor</th>
                        <th class="p-4 sm:p-5 font-bold">Approval Status</th>
                        <th class="p-4 sm:p-5 font-bold">Price / Sq. Yard</th>
                        <th class="p-4 sm:p-5 font-bold">100 Gaj Plot Budget</th>
                        <th class="p-4 sm:p-5 font-bold">Infrastructure Level</th>
                    </tr>
                </thead>
                <tbody class="divide-y font-light" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <?php
                        $rows = [
                            ['col1' => $pm['matrix']['r1_col1'] ?? 'Rukmani Vihar (Shri Vrinda Orchids)', 'col2' => $pm['matrix']['r1_col2'] ?? 'MVDA & RERA', 'col3' => $pm['matrix']['r1_col3'] ?? '₹ 60,000 – ₹ 75,000', 'col4' => $pm['matrix']['r1_col4'] ?? '₹ 60L – ₹ 75L', 'col5' => $pm['matrix']['r1_col5'] ?? '40ft Roads, Underground Power, Parks', 'badge' => 'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/20'],
                            ['col1' => $pm['matrix']['r2_col1'] ?? 'NH-19 Akbarpur (Shri Vrinda Naivedyam)', 'col2' => $pm['matrix']['r2_col2'] ?? 'MVDA Approved', 'col3' => $pm['matrix']['r2_col3'] ?? '₹ 42,500', 'col4' => $pm['matrix']['r2_col4'] ?? '₹ 42.5 Lakhs', 'col5' => $pm['matrix']['r2_col5'] ?? 'Highway Frontage, Gated Security', 'badge' => 'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/20'],
                            ['col1' => $pm['matrix']['r3_col1'] ?? 'Chaumuha NH-19 (Shri Vasudhara Vaishaly)', 'col2' => $pm['matrix']['r3_col2'] ?? 'MVDA Sanctioned', 'col3' => $pm['matrix']['r3_col3'] ?? '₹ 39,990', 'col4' => $pm['matrix']['r3_col4'] ?? '₹ 39.9 Lakhs', 'col5' => $pm['matrix']['r3_col5'] ?? 'Wide Avenues, Streetlights, Water Line', 'badge' => 'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/20'],
                            ['col1' => $pm['matrix']['r4_col1'] ?? 'Govardhan Rd (Shri Vrinda Aakruti Village)', 'col2' => $pm['matrix']['r4_col2'] ?? 'MVDA Sanctioned', 'col3' => $pm['matrix']['r4_col3'] ?? '₹ 35,000', 'col4' => $pm['matrix']['r4_col4'] ?? '₹ 35.0 Lakhs', 'col5' => $pm['matrix']['r4_col5'] ?? 'Sweet Water, Meditation Lawn, Gated', 'badge' => 'bg-[#FDF3E3] text-[#9A6B2F] border-[#9A6B2F]/20'],
                            ['col1' => $pm['matrix']['r5_col1'] ?? 'Prem Mandir Core VIP Enclave', 'col2' => $pm['matrix']['r5_col2'] ?? 'Private Resale', 'col3' => $pm['matrix']['r5_col3'] ?? '₹ 85,000 – ₹ 1,20,000', 'col4' => $pm['matrix']['r5_col4'] ?? '₹ 85L – ₹ 1.2 Cr', 'col5' => $pm['matrix']['r5_col5'] ?? 'Existing Municipal Infrastructure', 'badge' => 'bg-amber-500/15 text-amber-400'],
                            ['col1' => $pm['matrix']['r6_col1'] ?? 'Far Rural Unapproved Colonies', 'col2' => $pm['matrix']['r6_col2'] ?? 'Unapproved Farmland', 'col3' => $pm['matrix']['r6_col3'] ?? '₹ 15,000 – ₹ 24,000', 'col4' => $pm['matrix']['r6_col4'] ?? '₹ 15L – ₹ 24L', 'col5' => $pm['matrix']['r6_col5'] ?? 'Dirt roads, no water, demolition risk', 'badge' => 'bg-rose-500/15 text-rose-400', 'is_bad' => true]
                        ];
                    ?>
                    <?php foreach ($rows as $r): ?>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold <?= !empty($r['is_bad']) ? 'text-rose-400' : '' ?>"><?= e($r['col1']) ?></td>
                        <td class="p-4 sm:p-5"><span class="px-2.5 py-1 rounded-full text-xs <?= $r['badge'] ?> border <?= !empty($r['is_bad']) ? '' : 'border-[#9A6B2F]/20' ?> font-medium"><?= e($r['col2']) ?></span></td>
                        <td class="p-4 sm:p-5 <?= !empty($r['is_bad']) ? 'text-stone-400 line-through' : 'text-amber-300 font-bold' ?>"><?= e($r['col3']) ?></td>
                        <td class="p-4 sm:p-5 <?= !empty($r['is_bad']) ? 'text-stone-400' : 'font-bold' ?>"><?= e($r['col4']) ?></td>
                        <td class="p-4 sm:p-5 <?= !empty($r['is_bad']) ? 'text-rose-400' : '' ?>"><?= e($r['col5']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: 5-Point Pre-Commitment Checklist
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($pm['checklist']['eyebrow'] ?? 'Due Diligence') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($pm['checklist']['title'] ?? 'The 5-Point Buyer\'s Due Diligence Checklist') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($pm['checklist']['subtitle'] ?? 'Before committing to any Vrindavan land price, demand written proof of these five non-negotiable legal milestones.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php
                $checklistItems = [
                    ['title' => $pm['checklist']['p1_title'] ?? 'Exact MVDA Sanction Number', 'desc' => $pm['checklist']['p1_desc'] ?? 'Ensure the layout order covers your specific plot number and phase on the official master blueprint. A verbal "approval in process" is not valid collateral.'],
                    ['title' => $pm['checklist']['p2_title'] ?? 'Physical Ground Reality', 'desc' => $pm['checklist']['p2_desc'] ?? 'Inspect what is built today versus what is promised for later. Verify concrete road widths, electricity transformers, drainage outlets, and boundary demarcation.'],
                    ['title' => $pm['checklist']['p3_title'] ?? 'Registered Sale Deed', 'desc' => $pm['checklist']['p3_desc'] ?? 'A registered sale deed with municipal mutation is the only legal proof of title. Never buy via General Power of Attorney (GPA) or unnotarized stamp papers.'],
                    ['title' => $pm['checklist']['p4_title'] ?? 'Bank Lending Eligibility', 'desc' => $pm['checklist']['p4_desc'] ?? 'The simplest litmus test: ask if nationalized banks (SBI, HDFC, PNB) offer plot loans on the development. Banks only lend on ironclad, unencumbered titles.'],
                    ['title' => $pm['checklist']['p5_title'] ?? 'Immediate Demarcation', 'desc' => $pm['checklist']['p5_desc'] ?? 'Ensure the physical boundary pillars of your plot are installed on-site before executing the registry, eliminating future boundary or encroachment disputes.']
                ];
            ?>
            <?php foreach ($checklistItems as $i => $item): ?>
            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">0<?= $i + 1 ?></div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($item['title']) ?>
                </h3>
                <p class="text-sm font-light leading-relaxed [&_*]:!text-inherit" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= $item['desc'] ?>
                </p>
            </div>
            <?php endforeach; ?>

            <div class="p-8 rounded-3xl border space-y-4 transition-all flex flex-col justify-between"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div>
                    <div class="text-2xl font-bold font-editorial text-[#9A6B2F]">Gleamrealty Shield</div>
                    <h3 class="text-xl font-editorial font-normal mt-2" :style="{ color: 'var(--theme-title)' }">
                        Zero Speculation Policy
                    </h3>
                    <p class="text-sm font-light leading-relaxed mt-2" :style="{ color: 'var(--theme-text-secondary)' }">
                        Every property listed with GLEAMREALTY PRIVATE LIMITED passes all 5 criteria before being offered to patrons.
                    </p>
                </div>
                <div class="pt-4">
                    <a href="#freesitevisit" class="text-xs uppercase font-bold text-amber-300 hover:underline">
                        Book Vetted Property Tour &rarr;
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     6. SECTION 5: Frequently Asked Questions (13 Interactive FAQs)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-5xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['faqs']['eyebrow'] ?? 'Price FAQs') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['faqs']['title'] ?? 'Frequently Asked Questions About Vrindavan Plot Rates') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($pm['faqs']['subtitle'] ?? 'Authentic answers addressing price variations, circle rates, and hidden charges.') ?>
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $plotRateFaqs = !empty($pm['faqs']['list']) ? $pm['faqs']['list'] : [
                [
                    'q' => '1. What is the current plot rate in Vrindavan per square yard in 2026?',
                    'a' => 'In 2026, the legitimate plot rate in Vrindavan spans between ₹38,000 and ₹65,000 per square yard for MVDA-sanctioned gated developments (such as on NH-19 and Rukmani Vihar). Unapproved agricultural plots on the far periphery trade between ₹15,000 and ₹25,000, while prime locations near Prem Mandir exceed ₹85,000/sq. yard.'
                ],
                [
                    'q' => '2. What is the difference between circle rate and market rate in Vrindavan?',
                    'a' => 'The circle rate is the government\'s minimum base valuation for stamp duty calculation, currently set around ₹12,000 to ₹25,000/sq. yard depending on the ward. The market rate is the actual transacted price determined by private demand, MVDA approvals, and infrastructure.'
                ],
                [
                    'q' => '3. How much does a 100 Gaj plot in Vrindavan cost in 2026?',
                    'a' => 'A 100-gaj (900 sq. ft) residential plot in an MVDA-approved gated township costs approximately ₹38 to ₹42.5 Lakhs along the NH-19 corridor (Shri Vrinda Naivedyam, Shri Vasudhara Vaishaly), and approximately ₹60 to ₹70 Lakhs in VIP Rukmani Vihar (Shri Vrinda Orchids).'
                ]
            ];
            ?>

            <?php foreach ($plotRateFaqs as $idx => $faq): ?>
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
                         class="px-6 pb-6 text-sm font-light leading-relaxed border-t pt-4 [&_*]:!text-inherit"
                         :style="{ color: 'var(--theme-text-secondary)', borderColor: 'var(--theme-border-hairline)' }">
                        <?= $faq['a'] ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- =======================================================================
     7. SECTION 6: VIP Site Visit & Rate Advisory Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Transparent Advisory
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Request a 2026 Vrindavan Land Rate Consultation
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Speak directly with senior Braj valuation advisors. Receive the complete MVDA sanctioned rate sheet and book a free on-site tour.
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 preferredCorridor: 'NH-19 Highway Corridor',
                 targetBudget: '₹ 40 Lakh - ₹ 60 Lakh',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please provide your name and phone number.';
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
                             project_name: 'Plot Rate Inquiry - ' + this.preferredCorridor,
                             message: 'Budget: ' + this.targetBudget + '. Corridor: ' + this.preferredCorridor + '. Notes: ' + (this.message || ''),
                             source: 'Plot Rate Vrindavan Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you. Our Senior Property Advisor will send you the 2026 Price Index and call you shortly.';
                             this.name = ''; this.phone = ''; this.email = ''; this.message = '';
                         } else {
                             this.errorMsg = data.message || 'Error submitting request. Please call +91 9871731303 / +91 7409767452.';
                         }
                     } catch (e) {
                         this.errorMsg = 'Network error. Please call +91 9871731303 / +91 7409767452.';
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
                        <input type="text" x-model="name" required placeholder="e.g. Govind Swaroop"
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
                            Corridor of Interest
                        </label>
                        <select x-model="preferredCorridor"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="NH-19 Highway Corridor">NH-19 Highway Corridor (Akbarpur / Chaumuha)</option>
                            <option value="Rukmani Vihar VIP Belt">Rukmani Vihar VIP Belt (Near Prem Mandir)</option>
                            <option value="Mathura-Govardhan Road">Mathura-Govardhan Road Corridor</option>
                            <option value="Compare All Corridors">Compare All 4 Corridors</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Budget Range
                        </label>
                        <select x-model="targetBudget"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="₹ 35 Lakh - ₹ 45 Lakh">₹ 35 Lakh – ₹ 45 Lakh (100 Gaj Entry)</option>
                            <option value="₹ 45 Lakh - ₹ 65 Lakh">₹ 45 Lakh – ₹ 65 Lakh (150 Gaj Villa Plot)</option>
                            <option value="₹ 65 Lakh - ₹ 1 Crore">₹ 65 Lakh – ₹ 1 Crore (VIP Rukmani Vihar)</option>
                            <option value="₹ 1 Crore+">₹ 1 Crore+ (Commercial / Luxury Estate)</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Questions / Specific Requirements
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Inquiring about circle rate vs registry costs for 150 sq. yards"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Request Detailed Price Sheet &rarr;</span>
                        <span x-show="loading" x-cloak>Sending Request...</span>
                    </button>
                    <div class="flex items-center gap-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Direct Advisory:</span>
                        <a href="tel:+919871731303" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            +91 9871731303
                        </a>
                        <span>/</span>
                        <a href="tel:+917409767452" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            +91 7409767452
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
