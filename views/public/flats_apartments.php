<?php
/**
 * Flats and Apartments in Vrindavan — Master Showcase View
 * Faithfully matching content, sections, and data from https://earthousing.com/flats-apartments-in-vrindavan
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 */
?>

<!-- =======================================================================
     1. HERO BANNER: Flats in Vrindavan
     ======================================================================= -->
<section class="relative min-h-[48vh] sm:min-h-[56vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= asset('uploads/pages/benefits-of-living-in-vrindavan.jpg') ?>"
             alt="Flats in Vrindavan — Apartments &amp; Gated Societies"
             class="w-full h-full object-cover filter brightness-[0.38] contrast-[1.08] scale-105 transition-transform duration-1000">
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
            <span class="text-amber-300 font-bold">Flats in Vrindavan</span>
        </div>

        <!-- Eyebrow Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-white/10 text-white border border-white/20 shadow-md">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Gleamrealty Private Office &bull; 2026 Apartment Buyer's Guide
        </div>

        <!-- Main H1 Title -->
        <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal tracking-tight text-white drop-shadow-xl leading-[1.1]">
            Flats in Vrindavan
        </h1>

        <!-- Subheading Tagline -->
        <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-md">
            Apartment in Vrindavan: 2026 Buyer's Guide for Flats &amp; Gated Societies
        </h2>

        <!-- Trust Badges Strip -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-3">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Studio, 1 BHK &amp; 2 BHK Trends
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-amber-300 shadow-sm">
                ✦ Lock-and-Leave Security
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                UP-RERA Verification Guide
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                Zero Brokerage Direct
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#flats-localities"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] transition-all duration-300 shadow-lg hover:scale-105"
               :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                Explore Flat Localities &darr;
            </a>
            <a href="#freesitevisit"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] bg-white/15 backdrop-blur-md text-white border border-white/30 hover:bg-white/25 transition-all duration-300">
                Book Flat Tour
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
     2. SECTION 1: Ground Reality — Why People Are Buying Flats in Vrindavan
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= asset('uploads/pages/benefits-of-living-in-vrindavan.jpg') ?>"
                         alt="Apartment in Vrindavan Lifestyle"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            Lock-and-Leave
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            Holiday Home Simplicity
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
                <img src="<?= asset('uploads/pages/property-in-vrindavan.png') ?>" alt="Vrindavan Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        The Shift to Organized Societies
                    </strong>
                    From guest houses and dharamshalas to managed high-rise apartments and serviced holiday homes.
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Market Evolution
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                Apartment in Vrindavan: The 2026 Buyer's Reality
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <p>
                    Most people would have been bewildered if they were told they could buy a flat in Vrindavan a few years ago. You traveled to this holy place on pilgrimage, stayed in an ashram, dharamshala, or basic guest house, and returned home. There was simply no formal category for owning an apartment in the town of Banke Bihari and ISKCON.
                </p>
                <p>
                    That reality has transformed. Today, Vrindavan features contemporary mid-rise towers, gated apartment societies, and continuous weekend occupancy. Once you examine who the buyer is, the appeal is obvious: devotees and retirees who want to be near the temples with round-the-clock security, maintenance, and power backup, allowing them to lock up and leave for months without worry.
                </p>
                <p>
                    However, buying a flat also carries trade-offs when contrasted with owning standalone freehold land. At GLEAMREALTY PRIVATE LIMITED, we help you evaluate both options with complete candor.
                </p>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">₹35L-95L</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Price Band</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">Studio-2BHK</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Primary Demand</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">24×7</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Gated Manned</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial text-emerald-400">100%</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">RERA Mandated</div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Locality Hubs for Flats (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section id="flats-localities" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Locality Guide
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Where the Apartments Are Located: Key Locality Hubs
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Apartments in Vrindavan are clustered into distinct corridors. Understanding these hubs helps you choose the right environment.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Hub 1 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        01
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-amber-500/15 text-amber-300 border border-amber-500/30">
                        Chhatikara Road
                    </span>
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Chhatikara &amp; Temple Entry Hub
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    The primary gateway into Vrindavan from NH-19. Wide approach roads, immediate proximity to Prem Mandir, ISKCON, and Chandrodaya Mandir. Features prominent high-rise towers with high weekend tourist occupancy and serviced apartment models.
                </p>
            </div>

            <!-- Hub 2 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        02
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">
                        VIP Residential
                    </span>
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Rukmani Vihar Enclave
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    A well-established master-planned district featuring a blend of mid-rise societies and premium residential townships like <strong>Shri Vrinda Orchids</strong>. Known for organized VIP neighborhoods, municipal park networks, and peaceful residential tranquility.
                </p>
            </div>

            <!-- Hub 3 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        03
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-blue-500/15 text-blue-300 border border-blue-500/30">
                        Spiritual Retreat
                    </span>
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Sunrakh Road &amp; Parikrama Periphery
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    A greener, quieter sector favored by retirees and spiritual seekers desiring proximity to sacred groves and ashrams, away from major highway vehicular transit.
                </p>
            </div>

            <!-- Hub 4 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        04
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-purple-500/15 text-purple-300 border border-purple-500/30">
                        Highway Corridors
                    </span>
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    NH-19 Expressway Corridors
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Featuring large-scale integrated gated communities with clubhouses, wide boulevards, and swift 90-minute connectivity to Jewar Airport and Delhi-NCR.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: Flats versus Plots and Villas
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Honest Comparison
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Flats versus Plots and Villas in Vrindavan
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                The trade-offs between vertical convenience and horizontal freehold ownership.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Flats Side -->
            <div class="p-8 sm:p-10 rounded-3xl border space-y-6 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-widest font-bold text-amber-300">The Vertical Lifestyle</span>
                    <span class="text-xs px-3 py-1 rounded-full border" :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }">₹ 35L – ₹ 95L</span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Apartments &amp; Flats
                </h3>
                <ul class="space-y-3 text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>Turnkey Convenience:</strong> Ready to move in immediately with zero construction hassle.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>Lock-and-Leave:</strong> Manned security, common power backup, and building maintenance taken care of while you travel.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-rose-400 font-bold">✕</span>
                        <span><strong>No Land Ownership:</strong> You own only an Undivided Share of Land (UDS); cannot expand vertically or build private courtyards.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-rose-400 font-bold">✕</span>
                        <span><strong>Building Depreciation:</strong> Concrete structures age over 25-30 years, whereas standalone land appreciates perpetually.</span>
                    </li>
                </ul>
            </div>

            <!-- Plots / Villas Side -->
            <div class="p-8 sm:p-10 rounded-3xl border space-y-6 transition-all border-emerald-500/40"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-widest font-bold text-emerald-400">Freehold Sanctuary</span>
                    <span class="text-xs px-3 py-1 rounded-full border" :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }">₹ 38,000 – ₹ 65,000 / sq. yd</span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Plots &amp; Duplex Villas
                </h3>
                <ul class="space-y-3 text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>100% Freehold Ownership:</strong> You own the earth beneath your feet and all rights to the roof and sky.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>Private Courtyard (*Aangan*):</strong> Build a traditional sacred Tulsi altar and host private family kirtans without noise disputes.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>Generational Wealth:</strong> Land in sacred Vrindavan is strictly scarce; standalone plots experience superior compounding valuation.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-400 font-bold">✓</span>
                        <span><strong>Gated Security:</strong> Townships like Shri Vrinda Aakruti Village and Shri Vrinda Orchids provide the same 24×7 security as flats.</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: 5-Point Flat Buyer's Checklist
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Safety First
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                The 5-Point Flat Buyer's Due Diligence Checklist
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Before signing any builder-buyer agreement for an apartment in Vrindavan, verify these critical checkpoints.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">01</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    UP-RERA Registration
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Check the project on the UP-RERA portal. Verify that the advertised completion date and bank escrow details match the developer's contract.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">02</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    MVDA Completion Certificate (CC)
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Never take possession without an official Completion or Occupancy Certificate from MVDA. Without CC/OC, electricity and water connections remain temporary.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">03</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Sweet Water Line Connection
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Ask whether the society is connected to a municipal potable sweet water supply or depends solely on treated groundwater, which can be hard on plumbing fixtures.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">04</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Power Backup Generator Capacity
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Ensure the society has 100% full DG power backup for air-conditioners and elevators, essential during peak summer festival seasons in Uttar Pradesh.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">05</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Bank Home Loan Sanction
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Check if leading institutions like SBI, HDFC, or ICICI have approved the project. Bank approval validates title clearance and construction sanction orders.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all flex flex-col justify-between"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div>
                    <div class="text-2xl font-bold font-editorial text-emerald-400">Gleamrealty Advice</div>
                    <h3 class="text-xl font-editorial font-normal mt-2" :style="{ color: 'var(--theme-title)' }">
                        Compare with Duplex Villas
                    </h3>
                    <p class="text-sm font-light leading-relaxed mt-2" :style="{ color: 'var(--theme-text-secondary)' }">
                        Before committing ₹50-70 Lakhs to an apartment, compare it with a freehold duplex villa in Shri Vrinda Aakruti Village.
                    </p>
                </div>
                <div class="pt-4">
                    <a href="<?= url('/luxury-villas-in-vrindavan') ?>" class="text-xs uppercase font-bold text-amber-300 hover:underline">
                        Compare Duplex Villas &rarr;
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
                Flat FAQs
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Frequently Asked Questions About Flats in Vrindavan
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Practical questions regarding flat prices, society maintenance, and holiday home leasing.
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $flatFaqs = [
                [
                    'q' => '1. What is the average price of a flat in Vrindavan in 2026?',
                    'a' => 'In 2026, studio apartments in Vrindavan typically start from ₹28 to ₹38 Lakhs. 1 BHK flats range between ₹38 and ₹52 Lakhs, while 2 BHK apartments in reputable gated societies range from ₹55 to ₹95 Lakhs depending on the proximity to Prem Mandir and the quality of amenities.'
                ],
                [
                    'q' => '2. What is the difference between buying a flat and buying a plot/villa in Vrindavan?',
                    'a' => 'A flat offers move-in readiness and lock-and-leave convenience, but you only own an undivided share of land (UDS) and must pay ongoing maintenance. Standalone plots and duplex villas give you 100% freehold ownership of the land and roof, private courtyards, and superior long-term capital appreciation.'
                ],
                [
                    'q' => '3. Which localities are most popular for buying flats in Vrindavan?',
                    'a' => 'Chhatikara Road, Rukmani Vihar, Sunrakh Road, and the NH-19 intersection are the most active hubs for apartment communities.'
                ],
                [
                    'q' => '4. Can outstation buyers lease out their apartment on Airbnb or to pilgrims?',
                    'a' => 'Yes. Vrindavan faces a chronic shortage of quality hotel rooms. Furnished 1 and 2 BHK apartments along Chhatikara Road and Rukmani Vihar enjoy strong weekend occupancy and handsome daily tariff yields.'
                ],
                [
                    'q' => '5. What are the typical monthly maintenance charges in apartment societies?',
                    'a' => 'Maintenance charges typically range from ₹2.00 to ₹3.50 per square foot per month, covering 24×7 security, lift operation, power backup maintenance, and common area cleaning.'
                ],
                [
                    'q' => '6. Is bank loan financing available for flats in Vrindavan?',
                    'a' => 'Yes. On UP-RERA registered projects with MVDA sanction orders, premier banks including SBI, HDFC, and ICICI offer home loans up to 75-80% of property value.'
                ],
                [
                    'q' => '7. What documents should I inspect before buying an apartment?',
                    'a' => 'Verify the UP-RERA registration number, MVDA approved building plan, environmental clearance, fire department NOC, and the builder\'s title deed.'
                ],
                [
                    'q' => '8. Can NRIs buy flats in Vrindavan?',
                    'a' => 'Yes. NRIs and OCIs can freely purchase residential apartments in Vrindavan through standard inward banking remittances under RBI regulations.'
                ],
                [
                    'q' => '9. What is the impact of Jewar Airport on flat values?',
                    'a' => 'The operational Jewar Airport connects international pilgrims to Vrindavan within 90 minutes via Yamuna Expressway, driving strong rental inquiries for weekend holiday homes.'
                ],
                [
                    'q' => '10. Can I get immediate possession of a flat in Vrindavan?',
                    'a' => 'Both ready-to-move-in resale/developer flats and under-construction projects are available. We recommend prioritizing projects that have already received their MVDA Completion Certificate (CC).'
                ],
                [
                    'q' => '11. Is sweet potable water provided in apartment societies?',
                    'a' => 'Most modern apartment societies install centralized RO treatment plants or municipal water supply lines to ensure clean drinking water.'
                ],
                [
                    'q' => '12. What are the resale prospects for apartments in Vrindavan?',
                    'a' => 'Well-maintained societies near major temples retain strong liquidity and steady resale demand among devotee families seeking secondary retirement homes.'
                ],
                [
                    'q' => '13. How does GLEAMREALTY PRIVATE LIMITED assist flat buyers?',
                    'a' => 'We help you verify developer RERA credentials, review hidden maintenance costs, compare flat pricing against freehold duplex villas, and arrange guided site inspections.'
                ]
            ];
            ?>

            <?php foreach ($flatFaqs as $idx => $faq): ?>
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
     7. SECTION 6: VIP Site Visit & Apartment Advisory Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Guided Advisory
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Request an Apartment Consultation &amp; Tour
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Review verified RERA apartment options and compare pricing against freehold villa alternatives with our senior Braj property advisors.
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 flatType: '1 BHK Apartment',
                 targetBudget: '₹ 35 Lakh - ₹ 55 Lakh',
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
                             project_name: 'Flats & Apartments Inquiry - ' + this.flatType,
                             message: 'Budget: ' + this.targetBudget + '. Flat: ' + this.flatType + '. Notes: ' + (this.message || ''),
                             source: 'Flats & Apartments Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you. Our Senior Property Advisor will call you shortly with apartment listings.';
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
                        <input type="text" x-model="name" required placeholder="e.g. Kanhaiya Lal"
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
                            Apartment Configuration
                        </label>
                        <select x-model="flatType"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="Studio / Serviced Suite">Studio / Serviced Holiday Suite</option>
                            <option value="1 BHK Apartment">1 BHK Gated Society Apartment</option>
                            <option value="2 BHK Apartment">2 BHK Family Apartment</option>
                            <option value="Compare with Duplex Villa">Compare with Freehold Duplex Villa</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Budget Range
                        </label>
                        <select x-model="targetBudget"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="₹ 28 Lakh - ₹ 38 Lakh">₹ 28 Lakh – ₹ 38 Lakh (Studio Suite)</option>
                            <option value="₹ 38 Lakh - ₹ 55 Lakh">₹ 38 Lakh – ₹ 55 Lakh (1 BHK)</option>
                            <option value="₹ 55 Lakh - ₹ 85 Lakh">₹ 55 Lakh – ₹ 85 Lakh (2 BHK)</option>
                            <option value="₹ 85 Lakh+">₹ 85 Lakh+ (Premium / Duplex)</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Locality Preference / Special Notes
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Looking for flat near Prem Mandir or Rukmani Vihar with power backup"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Request Apartment Consultation &rarr;</span>
                        <span x-show="loading" x-cloak>Sending Request...</span>
                    </button>
                    <div class="flex items-center gap-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Direct Desk:</span>
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
