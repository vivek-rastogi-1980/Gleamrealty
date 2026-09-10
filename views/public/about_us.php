<?php
/**
 * About Us Page Template — Faithfully matching https://earthousing.com/about-us
 * Supports Gleamrealty Multi-Theme Engine (Green & White, Dark-Yellow, Blue & White)
 */
?>

<!-- 1. Inner Header / Hero Banner -->
<section class="relative min-h-[35vh] sm:min-h-[40vh] flex items-center justify-center border-b py-20 lg:py-28 overflow-hidden transition-colors"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    <!-- Background Architectural Media -->
    <div class="absolute inset-0 z-0">
        <img src="<?= asset('uploads/hero/hero-braj-sanctuary.webp') ?>"
             alt="Sacred Braj Soil & Architecture"
             class="w-full h-full object-cover filter brightness-[0.35] blur-[1px] scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
    </div>

    <!-- Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] rounded-full blur-3xl pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-3">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-white/10 text-white border border-white/20 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
            Heritage &bull; Divinity &bull; Legacy
        </div>

        <h1 class="font-editorial text-4xl sm:text-6xl font-normal tracking-tight text-white drop-shadow-md">
            About us
        </h1>

        <p class="text-xs sm:text-sm max-w-xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow">
            Discover the philosophy, people, and generational mission behind GLEAMREALTY PRIVATE LIMITED across the sacred lands of Mathura &amp; Vrindavan.
        </p>
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
                    <img src="<?= asset('uploads/about/prem-mandir.webp') ?>"
                         alt="Prem Mandir Vrindavan Sanctuary"
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
                            <a href="tel:+919871731303" class="text-xs sm:text-sm font-bold tracking-wider hover:underline" :style="{ color: 'var(--theme-title)' }">
                                +91 9871731303
                            </a>
                            <span :style="{ color: 'var(--theme-subtitle)' }">/</span>
                            <a href="tel:+917409767452" class="text-xs sm:text-sm font-bold tracking-wider hover:underline" :style="{ color: 'var(--theme-title)' }">
                                +91 7409767452
                            </a>
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
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                ✦ Established Heritage Advisory
            </span>

            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight transition-colors"
                :style="{ color: 'var(--theme-title)' }">
                About GLEAMREALTY PRIVATE LIMITED
            </h2>

            <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed transition-colors"
                 :style="{ color: 'var(--theme-subtitle)' }">
                <p>
                    <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">GLEAMREALTY PRIVATE LIMITED</strong> is a premier real estate organization dedicated to assisting devotees, families, and discerning investors in locating secure, trusted, and completely authorized properties across <a href="<?= url('/property-in-vrindavan') ?>" class="font-medium underline hover:opacity-80" :style="{ color: 'var(--theme-accent)' }">Vrindavan &amp; Mathura</a>. Whether one is seeking an ancestral sanctuary home, a serene residential plot, or high-yielding commercial land, we advise with absolute simplicity and sincerity.
                </p>

                <p>
                    However, our purpose is inspired by something far deeper. <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">“Chalo Vrindavan”</strong> is not merely a slogan to our clients — it is a profound longing to live closer to harmony, devotion, and timeless Braj heritage. Our guiding principle is <em class="italic font-serif">“Brajwas”</em>: curating contemporary, progressive lifestyle spaces harmonized with the sacred peace of Banke Bihari and Prem Mandir.
                </p>

                <div class="p-6 rounded-2xl border space-y-3"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <h3 class="font-editorial text-lg sm:text-xl font-medium" :style="{ color: 'var(--theme-title)' }">
                        Why Discerning Devotees Trust Us
                    </h3>
                    <p>
                        For more than <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">10+ years</strong>, we have operated exclusively in the Vrindavan-Mathura domain. Our deep experience filters out market noise, offering only <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">100% government-approved (MVDA &amp; RERA)</strong> properties so buyers never second-guess their choices.
                    </p>
                    <p>
                        To date, we have helped <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">3,000+ families</strong>, devotees, and investors secure over <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">5 Lakh+ sq. yards</strong> of prime Braj land with complete peace of mind.
                    </p>
                </div>
            </div>

            <!-- Quick Metrics Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-2">
                <div class="p-4 rounded-xl border text-center" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="block font-serif text-2xl font-bold" :style="{ color: 'var(--theme-metric-value)' }">10+</span>
                    <span class="text-[10px] uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-metric-label)' }">Years Heritage</span>
                </div>
                <div class="p-4 rounded-xl border text-center" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="block font-serif text-2xl font-bold" :style="{ color: 'var(--theme-metric-value)' }">100%</span>
                    <span class="text-[10px] uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-metric-label)' }">Govt Approved</span>
                </div>
                <div class="p-4 rounded-xl border text-center" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="block font-serif text-2xl font-bold" :style="{ color: 'var(--theme-metric-value)' }">3,000+</span>
                    <span class="text-[10px] uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-metric-label)' }">Devotee Families</span>
                </div>
                <div class="p-4 rounded-xl border text-center" :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="block font-serif text-2xl font-bold" :style="{ color: 'var(--theme-metric-value)' }">5L+</span>
                    <span class="text-[10px] uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-metric-label)' }">Sq. Yds Delivered</span>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- 3. Our Mission & Our Vision (Matching Earthousing Layout) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 border-t border-b transition-colors"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-2">
            <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">Guiding Principles</span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Our Purpose &amp; Aspiration
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Our Mission Card -->
            <div class="p-8 sm:p-10 rounded-3xl border backdrop-blur-xl space-y-4 shadow-xl transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-serif text-lg font-bold shrink-0 border"
                         :style="{ backgroundColor: 'rgba(255,255,255,0.1)', color: 'var(--theme-section-card-title)', borderColor: 'var(--theme-section-card-border)' }">
                        OM
                    </div>
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-section-card-title)' }">Foundational Commitment</span>
                        <h3 class="font-editorial text-2xl sm:text-3xl font-normal" :style="{ color: 'var(--theme-section-alt-title)' }">Our Mission</h3>
                    </div>
                </div>

                <div class="space-y-3 text-xs sm:text-sm font-light leading-relaxed pt-2"
                     :style="{ color: 'var(--theme-section-card-text)' }">
                    <p>
                        At GLEAMREALTY PRIVATE LIMITED, our mission is to turn the cherished dream of <strong class="font-semibold text-white">“Brajwas”</strong> into a tangible reality. This mission extends beyond real estate — it is an eternal way of life steeped in peace, devotion, and sacred community.
                    </p>
                    <p>
                        We understand the spiritual weight of aspiring to live in the holy soil of Braj. As trusted advisors with more than a decade of experience and over 7,000 successful transactions, we curate only authenticated family plots and luxury haveli-villas that honor Vedic vastu and deliver transparent, lifelong peace of mind.
                    </p>
                </div>
            </div>

            <!-- Our Vision Card -->
            <div class="p-8 sm:p-10 rounded-3xl border backdrop-blur-xl space-y-4 shadow-xl transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-serif text-lg font-bold shrink-0 border"
                         :style="{ backgroundColor: 'rgba(255,255,255,0.1)', color: 'var(--theme-section-card-title)', borderColor: 'var(--theme-section-card-border)' }">
                        ✦
                    </div>
                    <div>
                        <span class="text-[10px] uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-section-card-title)' }">National Benchmark</span>
                        <h3 class="font-editorial text-2xl sm:text-3xl font-normal" :style="{ color: 'var(--theme-section-alt-title)' }">Our Vision</h3>
                    </div>
                </div>

                <div class="space-y-3 text-xs sm:text-sm font-light leading-relaxed pt-2"
                     :style="{ color: 'var(--theme-section-card-text)' }">
                    <p>
                        We aspire to become the most trusted real estate partner in India — the first name that comes to mind for families, devotees, and investors seeking uncompromising integrity and client-first brokerage.
                    </p>
                    <p>
                        By combining deep market analytics with profound cultural sensitivity, we bridge traditional sanctity with progressive infrastructure. We bring people from all walks of life together with properties suited to modern living while preserving the timeless heritage of Braj Bhumi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 4. Leadership / Founders' Messages (Vinay Kumar Chauhan & Rakesh Chaudhary) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto space-y-20 lg:space-y-28">

        <!-- Founder 1: Vinay Kumar Chauhan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-4 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] bg-stone-900 overflow-hidden">
                        <img src="<?= asset('uploads/team/vinay-01.png') ?>"
                             alt="Vinay Kumar Chauhan - Co-Founder &amp; Managing Partner"
                             class="w-full h-full object-cover object-top group-hover:scale-103 transition-transform duration-700">
                    </div>
                    <div class="p-4 sm:p-5 text-center border-t"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <span class="text-[10px] uppercase tracking-widest font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                            Co-Founder &amp; Managing Partner
                        </span>
                        <h4 class="font-editorial text-lg sm:text-xl font-medium mt-0.5" :style="{ color: 'var(--theme-title)' }">
                            Vinay Kumar Chauhan
                        </h4>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-4">
                <span class="text-xs uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                    Founder's Perspective
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal leading-snug" :style="{ color: 'var(--theme-title)' }">
                    Connecting Visions to Value
                </h3>
                <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                    <p>
                        My journey in real estate emerged from a fundamental belief: <strong class="font-semibold" :style="{ color: 'var(--theme-title)' }">the right property holds the power to elevate generational growth</strong>. It is the sanctum for a family's legacy and a vehicle for lifelong peace. When we founded this advisory, our intention was to create a different kind of real estate institution — one founded upon unwavering trust, transparency, and deep empathy for what our clients seek.
                    </p>
                    <p>
                        We recognized early that the Braj market is never simply about concrete and boundaries — it is about connecting devotees to their spiritual haven. Our role is not just to sell, but to curate and deliver only the absolute finest, fully vetted residential developments with direct freehold registry.
                    </p>
                    <p>
                        Together with our developer partners, legal desk, and devoted team, we are not just marketing estates — we are building lifelong bonds and opening doors for families to establish their eternal roots in Vrindavan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Founder 2: Rakesh Chaudhary -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-8 order-2 lg:order-1 space-y-4">
                <span class="text-xs uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                    Leadership Vision
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal leading-snug" :style="{ color: 'var(--theme-title)' }">
                    Your Partner for a Smarter Real Estate Future
                </h3>
                <div class="space-y-4 text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                    <p>
                        We view real estate as much more than a commercial transaction — we view it as a sacred opportunity to shape a better, smarter, and more tranquil future. My passion has always centered on identifying where infrastructure, connectivity, and authentic living intersect.
                    </p>
                    <p>
                        Our mission is to connect buyers to enclaves that deliver thoughtful design, environmental harmony, and substantial long-term capital appreciation. Every township we endorse meets rigorous benchmarks: wide avenues, underground cabling, Kadamba groves, 24/7 security, and impeccable MVDA approvals.
                    </p>
                    <p>
                        Honesty and transparency form the bedrock of our business model. We are deeply grateful for the trust placed in us by thousands of families, and we welcome you to experience this fulfilling journey with our advisory.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-4 order-1 lg:order-2 relative group">
                <div class="relative rounded-3xl overflow-hidden border shadow-2xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="aspect-[4/5] bg-stone-900 overflow-hidden">
                        <img src="<?= asset('uploads/team/Rakesh-01.png') ?>"
                             alt="Rakesh Chaudhary - Co-Founder &amp; Managing Partner"
                             class="w-full h-full object-cover object-top group-hover:scale-103 transition-transform duration-700">
                    </div>
                    <div class="p-4 sm:p-5 text-center border-t"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                        <span class="text-[10px] uppercase tracking-widest font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                            Co-Founder &amp; Managing Partner
                        </span>
                        <h4 class="font-editorial text-lg sm:text-xl font-medium mt-0.5" :style="{ color: 'var(--theme-title)' }">
                            Rakesh Chaudhary
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
            <span class="text-xs uppercase tracking-[0.24em] font-semibold block" :style="{ color: 'var(--theme-section-alt-accent)' }">
                ✦ Our Capabilities
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight" :style="{ color: 'var(--theme-section-alt-title)' }">
                Driving Real Estate Success with Strategic Insight
            </h2>
            <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-section-alt-subtext)' }">
                With over a decade of domain expertise, we have earned a reputation for strategic curation across premier residential plotted townships, boutique villas, and commercial complexes in the Braj region.
            </p>
        </div>

        <!-- Right 2x2 Grid -->
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- 1. Project Sales & Marketing -->
            <div class="p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-section-card-title)' }">
                    01 &bull; Project Sales &amp; Marketing
                </span>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    We design and implement full-scale marketing and sales campaigns that successfully introduce new townships to the market and achieve sales targets for our developer partners.
                </p>
            </div>

            <!-- 2. Real Estate Investment Advisory -->
            <div class="p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-section-card-title)' }">
                    02 &bull; Investment Advisory
                </span>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    We provide bespoke advisory services aimed at identifying and securing high-appreciation land parcels that generate dependable long-term returns for private portfolios.
                </p>
            </div>

            <!-- 3. Strategic Developer Partnerships -->
            <div class="p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-section-card-title)' }">
                    03 &bull; Strategic Developer Partnerships
                </span>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    We forge partnerships with leading infrastructure developers, providing institutional sales channels and vetting every master plan for total regulatory compliance.
                </p>
            </div>

            <!-- 4. Market Intelligence & Analytics -->
            <div class="p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-section-card-title)' }">
                    04 &bull; Market Intelligence &amp; Analytics
                </span>
                <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    We track corridor expansion, expressway connectivity, and circle rate movements to empower buyers with data-driven clarity before every acquisition.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- 6. Why Choose Us Section (Matching Earthousing Layout) -->
<section class="relative py-20 sm:py-28 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left 2x2 Grid -->
        <div class="lg:col-span-7 order-2 lg:order-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- 1. Access to Exclusive Projects -->
            <div class="p-6 rounded-2xl border space-y-2.5 shadow-sm transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-accent)' }">
                    ✦ Exclusive Inventory
                </span>
                <h4 class="font-editorial text-lg font-medium" :style="{ color: 'var(--theme-title)' }">
                    Access to Exclusive Projects
                </h4>
                <p class="text-xs leading-relaxed font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    Thanks to our enduring ties with prime landowners and top developers, you gain direct access to coveted plots before open public launch.
                </p>
            </div>

            <!-- 2. Data-Driven Market Insights -->
            <div class="p-6 rounded-2xl border space-y-2.5 shadow-sm transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-accent)' }">
                    ✦ Research &amp; Accuracy
                </span>
                <h4 class="font-editorial text-lg font-medium" :style="{ color: 'var(--theme-title)' }">
                    Data-Driven Market Insights
                </h4>
                <p class="text-xs leading-relaxed font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    We look beyond superficial marketing to deliver authentic legal due diligence, title scrutiny, and realistic appreciation timelines.
                </p>
            </div>

            <!-- 3. A Partnership Built Around You -->
            <div class="p-6 rounded-2xl border space-y-2.5 shadow-sm transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-accent)' }">
                    ✦ Bespoke Advisory
                </span>
                <h4 class="font-editorial text-lg font-medium" :style="{ color: 'var(--theme-title)' }">
                    A Partnership Built Around You
                </h4>
                <p class="text-xs leading-relaxed font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    You come first. We customize our advisory around your family's budget, preferred temple proximity, and vision for immediate or future construction.
                </p>
            </div>

            <!-- 4. Integrity You Can Trust -->
            <div class="p-6 rounded-2xl border space-y-2.5 shadow-sm transition-all hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs font-semibold uppercase tracking-wider block" :style="{ color: 'var(--theme-accent)' }">
                    ✦ Zero Ambiguity
                </span>
                <h4 class="font-editorial text-lg font-medium" :style="{ color: 'var(--theme-title)' }">
                    Integrity You Can Trust
                </h4>
                <p class="text-xs leading-relaxed font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    Every transaction is handled with complete transparency, zero brokerage encumbrances, and full mutation assistance at the local sub-registrar office.
                </p>
            </div>
        </div>

        <!-- Right Headline -->
        <div class="lg:col-span-5 order-1 lg:order-2 space-y-4">
            <span class="text-xs uppercase tracking-[0.24em] font-semibold block" :style="{ color: 'var(--theme-accent)' }">
                ✦ The Gleamrealty Difference
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight leading-tight" :style="{ color: 'var(--theme-title)' }">
                Why Choose Us!
            </h2>
            <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-subtitle)' }">
                We provide more than just access to properties; we deliver a true strategic partnership. Our deep market knowledge, exclusive developer relations, and unwavering integrity ensure your success.
            </p>
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
                    Free Site Visit
                </span>
                <h3 class="font-editorial text-3xl sm:text-4xl font-normal" :style="{ color: 'var(--theme-title)' }">
                    Find your Dream Property
                </h3>
                <p class="text-xs sm:text-sm font-light" :style="{ color: 'var(--theme-subtitle)' }">
                    Schedule a complimentary private darshan and property inspection tour with our executive concierge.
                </p>
            </div>

            <!-- Success Alert -->
            <div x-show="submitted"
                 x-transition
                 class="mb-6 p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-800 dark:text-emerald-200 text-xs sm:text-sm flex items-start justify-between gap-3">
                <div class="flex items-center gap-2.5">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <strong>Success!</strong> Your site visit request submitted successfully! Our concierge desk will call you to confirm your date and transportation arrangements.
                    </div>
                </div>
                <button @click="submitted = false" class="text-emerald-600 hover:text-emerald-800">&times;</button>
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
