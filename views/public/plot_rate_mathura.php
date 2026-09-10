<?php
/**
 * Mathura Plot Rate — Master Showcase View
 * Faithfully matching content, sections, and data from https://earthousing.com/plot-rate-mathura
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 */
?>

<!-- =======================================================================
     1. HERO BANNER: Mathura Plot Rate
     ======================================================================= -->
<section class="relative min-h-[48vh] sm:min-h-[56vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= asset('uploads/pages/mero-vrindavan.png') ?>"
             alt="Mathura Plot Rate 2026 — Ground Reality Price Analysis"
             class="w-full h-full object-cover filter brightness-[0.35] contrast-[1.08] scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/55 to-black/30"></div>
    </div>

    <!-- Radiant Ambient Light Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-5">
        
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold tracking-[0.22em] uppercase">
            <a href="<?= url('/') ?>" class="text-stone-300 hover:text-white transition-colors">Home</a>
            <span class="text-stone-500">&bull;</span>
            <a href="<?= url('/projects') ?>" class="text-stone-300 hover:text-white transition-colors">Projects</a>
            <span class="text-stone-500">&bull;</span>
            <span class="text-amber-300 font-bold">Mathura Plot Rate</span>
        </div>

        <!-- Eyebrow Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-white/10 text-white border border-white/20 shadow-md">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Gleamrealty Private Office &bull; 2026 Mathura Valuation Guide
        </div>

        <!-- Main H1 Title -->
        <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal tracking-tight text-white drop-shadow-xl leading-[1.1]">
            Mathura Plot Rate
        </h1>

        <!-- Subheading Tagline -->
        <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-md">
            Plot for Sale in Mathura, 100 Gaj Plot in Mathura Price: The Ground Reality
        </h2>

        <!-- Trust Badges Strip -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-3">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                MVDA Sanctioned Layouts
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-amber-300 shadow-sm">
                ✦ 100 Gaj Pricing Realities
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                Govardhan Road Corridor
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                Zero Brokerage Direct
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#mathura-rates-matrix"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] transition-all duration-300 shadow-lg hover:scale-105"
               :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                View Price Table &darr;
            </a>
            <a href="#freesitevisit"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] bg-white/15 backdrop-blur-md text-white border border-white/30 hover:bg-white/25 transition-all duration-300">
                Book Mathura Site Tour
            </a>
            <a href="tel:+919871731303"
               class="inline-flex items-center gap-2 px-5 py-3 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 hover:border-white/50 transition-colors">
                <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                +91 9871731303
            </a>
        </div>

    </div>
</section>


<!-- =======================================================================
     2. SECTION 1: Ground Reality — The Actual Amount & Value Received
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= asset('uploads/pages/Why-Choose-Vrindavan.jpg') ?>"
                         alt="Mathura Land Valuation Analysis"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            Sanctioned Township Benchmark
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            ₹ 35,000 / sq. yd
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
                <img src="<?= asset('uploads/pages/property-in-vrindavan.png') ?>" alt="Mathura Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        The True Cost of Ownership
                    </strong>
                    Distinguishing authentic MVDA approvals from unauthorized farmland promotions.
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Price Reality
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                Plot for Sale in Mathura: The Truth Behind the Numbers
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <p>
                    For anyone who has spent a weekend scrolling through online property classifieds in Mathura, you already know the confusing reality. One listing proclaims that the cost of a 100 gaj plot is <strong :style="{ color: 'var(--theme-title)' }">Rs. 9 Lakh</strong>. The very next advertisement quotes <strong :style="{ color: 'var(--theme-title)' }">Rs. 35 Lakh</strong>.
                </p>
                <p>
                    Both claim to be "MVDA approved." Both promise 24-hour security, wide roads, and community parks. So what is the genuine plot rate in Mathura? The answer is that there is no single magical number; the difference comes down to <strong :style="{ color: 'var(--theme-title)' }">Approval Authenticity, Infrastructure Completion, and Road Widths</strong>.
                </p>
                <p>
                    The Mathura Vrindavan Development Authority (MVDA) is the statutory planning authority. Once it sanctions a development, road dimensions (30-40 ft), open green buffers, and non-agricultural land usage are bound on government records. Cheap plots in Mathura are often speculative raw agricultural tracts. Sanctioned townships like <strong :style="{ color: 'var(--theme-title)' }">Shri Vrinda Aakruti Village (₹ 35,000/sq. yd)</strong> provide authentic collateral, immediate bank financing, and lifelong security.
                </p>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">₹35,000</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Gated Benchmark</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">100 Gaj</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">₹35 Lakhs</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">30-40 Ft</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Paved Avenues</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial text-emerald-400">100%</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Bank Loanable</div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Who a Mathura Plot Makes Sense For (Alt Background)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Target Profiles
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Who a Mathura Plot Makes Perfect Sense For
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Mathura offers the ideal sweet-spot for families who seek peaceful devotional living without the crowded tourist bottleneck.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Profile 1 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    01
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Delhi NCR &amp; Agra Devotee Families
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    For families from Delhi, Noida, Gurgaon, and Agra seeking a weekend haven or spiritual retirement home in Braj. You enjoy easy 15-minute access to the temples, but reside in an open, peaceful, unpolluted setting free from chaotic weekend traffic snarls.
                </p>
            </div>

            <!-- Profile 2 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    02
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Retirement Seekers &amp; Seniors
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Mathura provides everyday functional infrastructure that elderly residents depend on: multispecialty medical hospitals, clean railway connectivity, shopping markets, and peaceful community environments with like-minded neighbors.
                </p>
            </div>

            <!-- Profile 3 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    03
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Custom Villa Creators (vs Cramped Flats)
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Devotees who wish to design their own independent cottage or duplex sanctuary with private open courtyards and Tulsi gardens, rather than paying recurring society maintenance for a small apartment with shared walls.
                </p>
            </div>

            <!-- Profile 4 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    04
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Long-Term Capital Preservers
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Purchasing approved land along the Govardhan Road corridor locks in land value before upcoming highway widenings and transit corridors push prices toward central Vrindavan levels.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: Mathura Micro-Market Price Matrix Table
     ======================================================================= -->
<section id="mathura-rates-matrix" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                2026 Price Index
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Mathura Land &amp; Plot Price Matrix 2026
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Comparing land rates across approved gated developments, highway corridors, and rural tracts.
            </p>
        </div>

        <div class="overflow-x-auto rounded-2xl border shadow-xl"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="border-b text-xs uppercase tracking-wider"
                        :style="{ backgroundColor: 'var(--theme-section-card-bg)', color: 'var(--theme-title)', borderColor: 'var(--theme-border-hairline)' }">
                        <th class="p-4 sm:p-5 font-bold">Micro-Market</th>
                        <th class="p-4 sm:p-5 font-bold">Approval Status</th>
                        <th class="p-4 sm:p-5 font-bold">Rate / Sq. Yard</th>
                        <th class="p-4 sm:p-5 font-bold">100 Gaj Plot Cost</th>
                        <th class="p-4 sm:p-5 font-bold">Key Characteristics</th>
                    </tr>
                </thead>
                <tbody class="divide-y font-light" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Govardhan Road (Shri Vrinda Aakruti Village)</td>
                        <td class="p-4 sm:p-5"><span class="px-2.5 py-1 rounded-full text-xs bg-emerald-500/15 text-emerald-400 font-medium">MVDA Sanctioned</span></td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 35,000</td>
                        <td class="p-4 sm:p-5 font-bold">₹ 35.0 Lakhs</td>
                        <td class="p-4 sm:p-5">30-40ft Roads, Sweet Water, Bank Loan Approved</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">NH-19 Mathura Bypass</td>
                        <td class="p-4 sm:p-5"><span class="px-2.5 py-1 rounded-full text-xs bg-emerald-500/15 text-emerald-400 font-medium">MVDA Approved</span></td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 38,000 – ₹ 45,000</td>
                        <td class="p-4 sm:p-5 font-bold">₹ 38L – ₹ 45L</td>
                        <td class="p-4 sm:p-5">Commercial &amp; Residential Highway Frontage</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold">Mathura Cantt / Janmasthan Vicinity</td>
                        <td class="p-4 sm:p-5"><span class="px-2.5 py-1 rounded-full text-xs bg-amber-500/15 text-amber-400 font-medium">Municipal Freehold</span></td>
                        <td class="p-4 sm:p-5 text-amber-300 font-bold">₹ 65,000 – ₹ 95,000</td>
                        <td class="p-4 sm:p-5 font-bold">₹ 65L – ₹ 95L</td>
                        <td class="p-4 sm:p-5">Dense Old City, Narrow Roads, Scarce Open Land</td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors" :style="{ color: 'var(--theme-text-primary)' }">
                        <td class="p-4 sm:p-5 font-semibold text-rose-400">Chhata, Kosi &amp; Rural Farmland</td>
                        <td class="p-4 sm:p-5"><span class="px-2.5 py-1 rounded-full text-xs bg-rose-500/15 text-rose-400 font-medium">Unapproved Farmland</span></td>
                        <td class="p-4 sm:p-5 text-stone-400 line-through">₹ 9,000 – ₹ 18,000</td>
                        <td class="p-4 sm:p-5 text-stone-400">₹ 9L – ₹ 18L</td>
                        <td class="p-4 sm:p-5 text-rose-400">High legal risk, no road sanction, no bank loans</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: 100 Gaj Plot Cost Breakdown
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Cost Breakdown
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                100 Gaj Plot in Mathura: The Complete Price Sheet
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Transparent itemized estimate for an MVDA-approved 100 sq. yard plot in Shri Vrinda Aakruti Village.
            </p>
        </div>

        <div class="max-w-3xl mx-auto rounded-3xl border p-8 sm:p-10 shadow-2xl transition-all space-y-6"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            
            <div class="flex items-center justify-between pb-4 border-b text-sm" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <span class="font-semibold" :style="{ color: 'var(--theme-title)' }">Plot Size</span>
                <span class="font-bold text-amber-300">100 Gaj (900 Sq. Ft / 100 Sq. Yards)</span>
            </div>
            <div class="flex items-center justify-between pb-4 border-b text-sm" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <span class="font-semibold" :style="{ color: 'var(--theme-title)' }">Basic Land Cost (@ ₹ 35,000 / sq. yd)</span>
                <span class="font-bold text-amber-300">₹ 35,00,000</span>
            </div>
            <div class="flex items-center justify-between pb-4 border-b text-sm" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <span class="font-semibold" :style="{ color: 'var(--theme-title)' }">Government Stamp Duty (UP Sub-Registrar: 7% male / 6% female)</span>
                <span :style="{ color: 'var(--theme-text-secondary)' }">Approx. ₹ 1.40L – ₹ 1.75L (on circle rate base)</span>
            </div>
            <div class="flex items-center justify-between pb-4 border-b text-sm" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <span class="font-semibold" :style="{ color: 'var(--theme-title)' }">Registration Fee (1%) &amp; Mutation Support</span>
                <span :style="{ color: 'var(--theme-text-secondary)' }">Approx. ₹ 25,000</span>
            </div>
            <div class="flex items-center justify-between pb-4 border-b text-sm" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <span class="font-semibold" :style="{ color: 'var(--theme-title)' }">Brokerage / Consulting Fees</span>
                <span class="font-bold text-emerald-400">₹ 0 (Zero Brokerage Direct)</span>
            </div>
            <div class="flex items-center justify-between pt-2 text-base sm:text-lg font-bold">
                <span :style="{ color: 'var(--theme-title)' }">Total All-Inclusive Outlay</span>
                <span class="text-emerald-400">₹ 36.70L – ₹ 37.00 Lakhs</span>
            </div>

            <div class="p-4 rounded-xl text-xs font-light leading-relaxed border"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-secondary)' }">
                <strong>Bank Loan Support:</strong> SBI, HDFC, and ICICI provide up to 75-80% loan on this approved asset. Down payment requirement is approximately ₹ 8.5 to ₹ 9.5 Lakhs.
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
                Mathura FAQs
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Frequently Asked Questions About Mathura Plot Rates
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Honest, practical clarity on plot prices, road approvals, and possession timelines in Mathura.
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $mathuraPlotRateFaqs = [
                [
                    'q' => '1. What is the current Mathura plot rate per square yard in 2026?',
                    'a' => 'There is no single uniform rate. Unapproved outer tracts (Chhata, Akbarpur tehsils) range between ₹9,000 and ₹18,000/sq. yard. In fully developed, MVDA-sanctioned gated developments like Shri Vrinda Aakruti Village on Govardhan Road, the plot rate is ₹35,000 per square yard.'
                ],
                [
                    'q' => '2. Why do some listings advertise a 100 Gaj plot in Mathura for ₹9 Lakhs?',
                    'a' => 'Advertisements quoting ₹9 Lakhs for 100 Gaj refer to unapproved, non-converted agricultural farmland with zero infrastructure, no water pipes, no electricity transformers, and no MVDA sanction. These cannot be legally financed by banks and carry severe risk of municipal demolition.'
                ],
                [
                    'q' => '3. What does MVDA approval guarantee for a Mathura plot?',
                    'a' => 'MVDA approval ensures that the development follows building bye-laws: 30-40 foot wide paved roads, dedicated parks that can never be encroached, sweet drinking water supply lines, underground drainage, and clear title eligibility for bank mortgages.'
                ],
                [
                    'q' => '4. Is Shri Vrinda Aakruti Village approved by MVDA?',
                    'a' => 'Yes. Shri Vrinda Aakruti Village is officially sanctioned under MVDA order MTDA/ZA/ANI2025/0000577, situated on Satoha-Naugaon Road off Govardhan Road.'
                ],
                [
                    'q' => '5. Can I get a bank home loan for plots in Mathura?',
                    'a' => 'Yes. On all MVDA-approved projects like Aakruti Village, leading public and private banks including SBI, HDFC, and ICICI Bank offer residential plot and home construction loans up to 75-80%.'
                ],
                [
                    'q' => '6. What is the water quality like in Mathura plots?',
                    'a' => 'While several areas of Mathura have brackish or saline groundwater, Shri Vrinda Aakruti Village is blessed with sweet water aquifer reserves and a central community water supply.'
                ],
                [
                    'q' => '7. How far is Govardhan Road from Mathura Railway Station?',
                    'a' => 'Shri Vrinda Aakruti Village on Govardhan Road is approximately 15 minutes from Mathura Junction railway station, making it highly accessible for visitors arriving by train from Delhi, Mumbai, or Jaipur.'
                ],
                [
                    'q' => '8. Can I buy a ready duplex villa instead of a raw plot?',
                    'a' => 'Yes. At Shri Vrinda Aakruti Village, you can choose between buying an independent plot to construct later, or purchasing a ready-to-move luxury duplex villa built to Vastu specifications.'
                ],
                [
                    'q' => '9. What extra government costs apply to plot purchase in Mathura?',
                    'a' => 'Stamp duty is 7% for male buyers (6% for female buyers) based on the municipal circle rate, plus a 1% registration fee at the Mathura Sub-Registrar Office.'
                ],
                [
                    'q' => '10. Is Mathura property safe for outstation investors?',
                    'a' => 'Yes, provided you purchase within an MVDA-sanctioned gated layout with verified 30-year chain of title. GLEAMREALTY PRIVATE LIMITED ensures complete due diligence.'
                ],
                [
                    'q' => '11. How does the operational Jewar Airport impact Mathura plot values?',
                    'a' => 'With commercial flights operating from Jewar Airport and direct 90-minute Yamuna Expressway connectivity to Mathura, regional demand and rental inquiries have risen markedly.'
                ],
                [
                    'q' => '12. What sizes of plots are available in Mathura?',
                    'a' => 'Sizes typically range from 116 sq. yards (approx. 100 Gaj) to 150 and 183 sq. yards (ideal for spacious 3 BHK duplex villas).'
                ],
                [
                    'q' => '13. How can I schedule a free site visit to Mathura plots?',
                    'a' => 'Fill out the visit form below or call +91 9871731303 / +91 7409767452. Our representative will arrange a free site tour with station pickup.'
                ]
            ];
            ?>

            <?php foreach ($mathuraPlotRateFaqs as $idx => $faq): ?>
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
     7. SECTION 6: VIP Site Visit & Mathura Rate Advisory Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Free Guidance
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Schedule a Mathura Plot Tour &amp; Rate Consultation
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Tour Shri Vrinda Aakruti Village with our senior advisors and review layout maps, bank approval files, and pricing sheets.
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 plotType: '100-116 Gaj Plot',
                 targetBudget: '₹ 35 Lakh - ₹ 45 Lakh',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please enter your name and contact phone.';
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
                             project_name: 'Mathura Plot Rate Inquiry - ' + this.plotType,
                             message: 'Budget: ' + this.targetBudget + '. Plot: ' + this.plotType + '. Notes: ' + (this.message || ''),
                             source: 'Mathura Plot Rate Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you. Our Mathura desk will call to confirm your rate consultation.';
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
                <div x-show="successMsg" x-cloak class="p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-sm font-medium text-center">
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
                        <input type="text" x-model="name" required placeholder="e.g. Brijesh Kumar"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Phone / WhatsApp *
                        </label>
                        <input type="tel" x-model="phone" required placeholder="+91 98765 43210"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Plot Requirement
                        </label>
                        <select x-model="plotType"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="100-116 Gaj Plot">100 – 116 Gaj Plot</option>
                            <option value="150 Gaj Plot">150 Gaj Villa Plot</option>
                            <option value="183 Gaj Corner Plot">183 Gaj Corner Plot</option>
                            <option value="Duplex Villa Inquiry">Move-in Ready Duplex Villa</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Budget Range
                        </label>
                        <select x-model="targetBudget"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="₹ 35 Lakh - ₹ 45 Lakh">₹ 35 Lakh – ₹ 45 Lakh</option>
                            <option value="₹ 45 Lakh - ₹ 65 Lakh">₹ 45 Lakh – ₹ 65 Lakh</option>
                            <option value="₹ 65 Lakh+">₹ 65 Lakh+ (Duplex Villa)</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Questions / Preferred Visit Date
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Visiting Mathura this Sunday, want to see Aakruti Village"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Confirm Mathura Rate Advisory &rarr;</span>
                        <span x-show="loading" x-cloak>Sending Request...</span>
                    </button>
                    <div class="flex items-center gap-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Direct Help:</span>
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
