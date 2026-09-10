<?php
/**
 * Luxury Villas in Vrindavan — Master Showcase View
 * Faithfully matching content, sections, and data from https://earthousing.com/luxury-villas-in-vrindavan
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 */
?>

<!-- =======================================================================
     1. HERO BANNER: Luxury Villas in Vrindavan
     ======================================================================= -->
<section class="relative min-h-[48vh] sm:min-h-[56vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= asset('uploads/pages/luxury-villas-in-vrindavan.jpeg') ?>"
             alt="Luxury Villas in Vrindavan and Mathura"
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
            <span class="text-amber-300 font-bold">Luxury Villas</span>
        </div>

        <!-- Eyebrow Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-white/10 text-white border border-white/20 shadow-md">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Gleamrealty Private Office &bull; Generational Braj Sanctuaries
        </div>

        <!-- Main H1 Title -->
        <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal tracking-tight text-white drop-shadow-xl leading-[1.1]">
            Villas in Vrindavan
        </h1>

        <!-- Subheading Tagline -->
        <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-md">
            Villas in Mathura, Mathura Villa &amp; Duplex Sanctuaries in Gated Townships
        </h2>

        <!-- Trust Badges Strip -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-3">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                100% MVDA &amp; RERA Sanctioned
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-amber-300 shadow-sm">
                ✦ Freehold Land &amp; Private Aangan
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                24×7 Manned Gated Security
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-sm">
                Bank Home Loan Approved
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#villa-showcase"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] transition-all duration-300 shadow-lg hover:scale-105"
               :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                Explore Available Villas &darr;
            </a>
            <a href="#freesitevisit"
               class="px-7 py-3 rounded-full text-xs uppercase font-bold tracking-[0.16em] bg-white/15 backdrop-blur-md text-white border border-white/30 hover:bg-white/25 transition-all duration-300">
                Book Guided Villa Tour
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
     2. SECTION 1: Narrative — Villas in Mathura & Vrindavan
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= asset('uploads/pages/luxury-villas-in-vrindavan.jpeg') ?>"
                         alt="Duplex Villas in Vrindavan"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            Spiritual Lineage
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            Autonomy, Space &amp; Peace
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
                <img src="<?= asset('uploads/pages/Why-Choose-Vrindavan.jpg') ?>" alt="Spiritual Living" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        The Gold Standard of Brajwas
                    </strong>
                    Villas custom-architected according to ancient Vastu Shastra principles with modern luxury.
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Exclusive Residential Living
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                Villas in Mathura &amp; Vrindavan
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <p>
                    Some assets stay on a balance sheet; a <strong :style="{ color: 'var(--theme-title)' }">Villa in Vrindavan</strong> stays in the soul of your lineage. In the sacred geography of Braj, an apartment is often seen as a temporary residence, but a villa is a definitive legacy. It represents the ultimate form of Autonomy and Devotion—the rare privilege of owning the earth beneath your feet and the sky above your head in the land of Shri Krishna.
                </p>
                <p>
                    At GLEAMREALTY PRIVATE LIMITED, we don’t just market <strong :style="{ color: 'var(--theme-title)' }">Luxury Villas in Vrindavan</strong>; we curate lifestyle sanctuaries inspired by the philosophy of "Brajwas." A blend of modern architectural finesse and the timeless spiritual peace of the Dhams.
                </p>
                <p>
                    For devotees who have accepted the constraints of vertical living in high-rise skyscrapers across Delhi, Noida, or Gurgaon, owning a villa in Braj is a joyful homecoming. Here, you wake up to birdsong, peacock calls, and temple bells rather than traffic horns, enjoying your private central *Aangan*, personal Tulsi garden, and dedicated rooftop terrace.
                </p>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">10+</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Years Heritage</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">500+</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Duplex Patrons</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">100%</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">Freehold Titles</div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial text-emerald-400">100%</div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1">MVDA Approved</div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Why a Villa Outperforms (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                The Gold Standard
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Why a Gated Villa in Vrindavan Is the Ultimate Legacy Asset
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                The definition of true luxury in the Braj region is Autonomy, Security, and Space.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Pillar 1 -->
            <div class="p-8 sm:p-10 rounded-3xl border transition-all duration-300 hover:shadow-2xl space-y-4"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg border"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                    01
                </div>
                <h3 class="text-xl sm:text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    The Private Sanctuary vs. The Vertical Lifestyle
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Unlike an apartment in a high-rise complex where life is framed by common walls and shared corridors, a villa grants you complete freehold ownership of the earth and the sky. Craft your own *Aangan* (courtyard), tend a sacred Tulsi garden, and host intimate devotional kirtans and pujas in pure privacy.
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
                    The Security and Psychology of Gated Townships
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    For outstation families and NRIs, security is the foremost consideration. In an MVDA-approved gated township, you enjoy 24×7 manned entry and exit checkpoints, perimeter surveillance, CCTV monitoring, and professional maintenance crews who keep the roads, manicured parks, and sweet-water lines pristine even when you are away.
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
                    The Architecture of Trust: MVDA &amp; Title Verification
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Every villa community in our collection complies with strict Building Bye-Laws &amp; Model Zonal Regulations (2025). This ensures 30-to-40 foot wide paved roads, underground electrical conduit systems, underground sewage systems, and immediate home loan approvals from SBI, HDFC, and ICICI Bank.
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
                    Building a Multi-Generational Heritage
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    A villa is not just an asset on a balance sheet; it is where memories and devotional bonds are forged. It becomes the spiritual anchor for your children and grandchildren to return to during Janmashtami, Holi, and Diwali, keeping your family's connection with Braj unbroken for generations.
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: Featured Villa Enclaves Showcase
     ======================================================================= -->
<section id="villa-showcase" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                Signature Portfolio
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Featured Villa Developments in Braj
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Explore our two flagship duplex villa developments in Vrindavan and Mathura.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <!-- Project 1: Shri Vrinda Aakruti Village Duplex Villas -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/pages/luxury-villas-in-vrindavan.jpeg') ?>"
                             alt="Shri Vrinda Aakruti Village Duplex Villas"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-emerald-500/90 text-white backdrop-blur-md shadow-md">
                                MVDA Sanction: MTDA/ZA/ANI2025/0000577
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 65,000 / sq. yd
                        </div>
                    </div>

                    <div class="p-8 space-y-4">
                        <div class="text-xs uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Mathura-Govardhan Road, Satoha
                        </div>
                        <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            Shri Vrinda Aakruti Village — Duplex Villas
                        </h3>
                        <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                            Situated along the sacred Govardhan corridor. Features bespoke 2 &amp; 3 BHK duplex villas built on 116 to 183 sq. yard plots. Includes wide internal concrete roads, landscaped central gardens, children’s play areas, yoga gazebo, and 24×7 sweet water supply.
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">116 – 183 Sq. Yds</span>
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Duplex Architecture</span>
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">Govardhan Gateway</span>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-aakruti-village-premium-duplex-villas') ?>"
                       class="w-full py-3.5 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all shadow-md hover:scale-[1.02]"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Duplex Villa Floorplans &rarr;
                    </a>
                </div>
            </div>

            <!-- Project 2: Shri Vrinda Orchids Villas -->
            <div class="rounded-3xl border overflow-hidden flex flex-col justify-between group transition-all duration-300 hover:shadow-2xl"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div>
                    <div class="aspect-[16/10] relative overflow-hidden bg-stone-900">
                        <img src="<?= asset('uploads/pages/Why-Choose-Vrindavan.jpg') ?>"
                             alt="Shri Vrinda Orchids Villas Rukmani Vihar"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="px-3.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-500/90 text-white backdrop-blur-md shadow-md">
                                UP-RERA &amp; MVDA Registered
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 px-3 py-1.5 rounded-xl text-xs font-bold bg-black/80 text-amber-300 backdrop-blur-md border border-white/15">
                            ₹ 65,000 / sq. yd
                        </div>
                    </div>

                    <div class="p-8 space-y-4">
                        <div class="text-xs uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                            Rukmani Vihar, Vrindavan
                        </div>
                        <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                            Shri Vrinda Orchids — Plots &amp; Luxury Villas
                        </h3>
                        <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                            The shining crown of Vrindavan’s VIP residential district. Located on Ramtal Road, minutes from Prem Mandir and ISKCON. Fully integrated plotted township offering custom luxury villa development plots from 120 to 300 sq. yards.
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">120 – 300 Sq. Yds</span>
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">VIP Rukmani Vihar</span>
                            <span class="px-3 py-1 rounded-lg border" :style="{ borderColor: 'var(--theme-border-hairline)' }">UP-RERA Shield</span>
                        </div>
                    </div>
                </div>

                <div class="p-8 pt-0">
                    <a href="<?= url('/projects/shri-vrinda-orchids-plots-and-villas') ?>"
                       class="w-full py-3.5 rounded-xl text-xs uppercase font-bold tracking-wider text-center block transition-all shadow-md hover:scale-[1.02]"
                       :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        View Project Details &rarr;
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: Vastu Shastra Framework (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Vedic Architecture
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Crafting Your Spiritual Sanctuary: The Vastu Framework
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Every villa layout in our townships is engineered in harmony with traditional Braj Vastu Shastra principles to maximize positive spiritual vibration and domestic tranquility.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">01. Northeast</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Ishanya Mandir Sanctum
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Dedicated Northeast corner allocation for your family deities and prayer room, capturing unobstructed morning solar energies and divine tranquility.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">02. Center</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Brahmasthan Open Courtyard
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    The open central *Aangan* promotes cross ventilation and natural thermal circulation, centered around a holy Tulsi altar for daily circumambulation.
                </p>
            </div>

            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }">03. Southwest</div>
                <h3 class="text-xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    Nairrutya Master Sanctuary
                </h3>
                <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    Master bedrooms anchored in the stable Southwest zone, ensuring sound restful sleep, leadership harmony, and physical longevity for family elders.
                </p>
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
                Clear Advisory
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                Frequently Asked Questions About Villas in Vrindavan &amp; Mathura
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                Honest, practical guidance for families and devotees considering villa ownership in Braj.
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $villaFaqs = [
                [
                    'q' => '1. What is the price of a luxury villa in Vrindavan and Mathura?',
                    'a' => 'In MVDA-sanctioned gated townships such as Shri Vrinda Aakruti Village and Shri Vrinda Orchids, duplex villas and villa plots range from ₹35,000 to ₹65,000 per square yard. Complete ready-to-move duplex villas typically start from ₹75 Lakhs to ₹1.65 Crores depending on plot size and construction specifications.'
                ],
                [
                    'q' => '2. What is the difference between buying a villa and buying an apartment in Vrindavan?',
                    'a' => 'A villa grants you 100% freehold ownership of both the land and roof (ancestral right to vertical and horizontal expansion). An apartment only grants undivided share of land (UDS) with shared walls and recurring maintenance disputes. Villas provide superior privacy for prayer, private Tulsi courtyards, and significantly higher long-term land appreciation.'
                ],
                [
                    'q' => '3. Is Shri Vrinda Aakruti Village MVDA approved?',
                    'a' => 'Yes. Shri Vrinda Aakruti Village is fully sanctioned by the Mathura Vrindavan Development Authority under approval order number MTDA/ZA/ANI2025/0000577, providing complete legal protection and easy bank loan financing.'
                ],
                [
                    'q' => '4. Who maintains the villa when we are away in our home city or overseas?',
                    'a' => 'Gated villa townships have dedicated on-site property management, 24×7 manned security checkpoints, and gardening staff. Housekeeping and key-holding services ensure your villa is kept clean, safe, and ready for your arrival anytime.'
                ],
                [
                    'q' => '5. Can we rent out our villa on Airbnb or to pilgrims when not in use?',
                    'a' => 'Yes, managed villa leasing is highly lucrative in Vrindavan. Due to the chronic shortage of quality hotel rooms, well-maintained 2 and 3 BHK villas in gated communities command high daily tariff rates from visiting pilgrim families.'
                ],
                [
                    'q' => '6. What plot sizes are available for building custom villas?',
                    'a' => 'Standard villa plot sizes range from 116 sq. yards (compact 2 BHK duplex) to 150, 200, and 300+ sq. yards (spacious 3-4 BHK villas with private courtyards and parking).'
                ],
                [
                    'q' => '7. Are home loans available for villas in Vrindavan and Mathura?',
                    'a' => 'Yes. Because our projects carry formal MVDA sanctions, premier banks including State Bank of India (SBI), HDFC Bank, and ICICI Bank offer residential plot purchase and home construction loans up to 75-80% of property value.'
                ],
                [
                    'q' => '8. What amenities are included in Shri Vrinda Aakruti Village?',
                    'a' => 'Amenities include a grand gated entrance, 24×7 security with CCTV, wide paved internal avenues, landscaped meditation parks, children\'s play lawns, community gazebo, underground drainage, and dedicated sweet water supply.'
                ],
                [
                    'q' => '9. How far is Shri Vrinda Aakruti Village from major temples?',
                    'a' => 'Aakruti Village is located off Govardhan Road on Satoha-Naugaon Road. It is approximately 15 minutes from Shri Krishna Janmasthan, 20 minutes from Prem Mandir & ISKCON Vrindavan, and 15 minutes from Govardhan Parikrama Marg.'
                ],
                [
                    'q' => '10. Can NRIs buy villas in Vrindavan?',
                    'a' => 'Yes. NRIs and OCIs can purchase residential immovable property in India under RBI general permission guidelines with repatriation rights and seamless registry.'
                ],
                [
                    'q' => '11. Are the villas compliant with Vastu Shastra?',
                    'a' => 'Yes, our architectural layouts follow strict Braj Vastu Shastra principles, with Ishanya (Northeast) puja orientation, central Brahmasthan courtyards, and well-placed kitchens and bedrooms.'
                ],
                [
                    'q' => '12. What is the process to book a villa with GLEAMREALTY PRIVATE LIMITED?',
                    'a' => 'Simply book a free site tour, select your preferred plot and villa floorplan, submit KYC documents, and pay the booking amount. We handle 100% of title vetting, bank loan coordination, and sale deed registration.'
                ],
                [
                    'q' => '13. Why buy through GLEAMREALTY PRIVATE LIMITED?',
                    'a' => 'Over 10 years of unblemished local reputation, 3,000+ satisfied devotee families, zero brokerage fees, and 100% verified government-approved developments.'
                ]
            ];
            ?>

            <?php foreach ($villaFaqs as $idx => $faq): ?>
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
     7. SECTION 6: VIP Site Visit & Consultation Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Personalized Service
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Find Your Dream Villa in Vrindavan &amp; Mathura
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Book a private site visit to tour model duplex villas and available plots in Shri Vrinda Aakruti Village and Shri Vrinda Orchids.
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 villaEnclave: 'Shri Vrinda Aakruti Village (Duplex Villas)',
                 budget: '₹ 75 Lakh - ₹ 1.2 Crore',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please provide your full name and phone number.';
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
                             project_name: this.villaEnclave,
                             message: 'Inquiry for ' + this.villaEnclave + ' (Budget: ' + this.budget + '). ' + (this.message || ''),
                             source: 'Luxury Villas Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you for contacting Gleamrealty. Our Senior Villa Advisor will get in touch with you shortly.';
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
                        <input type="text" x-model="name" required placeholder="e.g. Mukund Das"
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
                            Preferred Villa Enclave
                        </label>
                        <select x-model="villaEnclave"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="Shri Vrinda Aakruti Village (Duplex Villas)">Shri Vrinda Aakruti Village (Duplex Villas)</option>
                            <option value="Shri Vrinda Orchids (Villas & Plots)">Shri Vrinda Orchids (Villas & Plots)</option>
                            <option value="Custom Villa Plot Selection">Custom Villa Plot Selection</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Target Budget
                        </label>
                        <select x-model="budget"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="₹ 50 Lakh - ₹ 75 Lakh">₹ 50 Lakh – ₹ 75 Lakh</option>
                            <option value="₹ 75 Lakh - ₹ 1.2 Crore">₹ 75 Lakh – ₹ 1.2 Crore</option>
                            <option value="₹ 1.2 Crore - ₹ 2 Crore">₹ 1.2 Crore – ₹ 2 Crore</option>
                            <option value="₹ 2 Crore+">₹ 2 Crore+</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Site Visit Details / Special Wishes
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Planning a weekend trip from Delhi to view duplex models"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Book Free Villa Tour &rarr;</span>
                        <span x-show="loading" x-cloak>Scheduling...</span>
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
