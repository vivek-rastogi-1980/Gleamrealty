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
    $heroSlides = $hero['slides'] ?? [];
    if (empty($heroSlides)) {
        $heroSlides = \App\Models\HeroSlide::active();
    }
?>

<!-- ==========================================================
     FULL-SCREEN PROPERTIES SLIDESHOW (3D PAGE ROTATION MANNER)
     Ultra-Luxury Edge-to-Edge Architectural Showcase
     ========================================================== -->
<?php if ($hero['is_enabled'] ?? true): ?>
<section class="hero-section relative w-full h-[100dvh] min-h-[720px] max-h-[1150px] flex flex-col justify-between overflow-hidden bg-stone-950 text-white select-none transition-all duration-700"
         x-data="hero3dSlider({
             totalSlides: <?= count($heroSlides) ?>,
             autoplayInterval: <?= (int) ($hero['autoplay_interval'] ?? 6) * 1000 ?>,
             rotationStyle: '<?= e($hero['rotation_style'] ?? '3d-page-turn') ?>'
         })"
         @mouseenter="pauseAutoplay()"
         @mouseleave="resumeAutoplay()"
         @keydown.right.window="nextSlide()"
         @keydown.left.window="prevSlide()"
         @touchstart="handleTouchStart($event)"
         @touchend="handleTouchEnd($event)">

    <!-- 3D Perspective Stage Container -->
    <div class="hero-stage-3d absolute inset-0 w-full h-full overflow-hidden">
        
        <?php foreach ($heroSlides as $idx => $slide): ?>
            <div class="hero-slide-3d absolute inset-0 w-full h-full flex flex-col justify-between"
                 :class="{
                     'is-active': activeSlide === <?= $idx ?>,
                     'is-turning-left': (prevSlideIndex === <?= $idx ?> && isAnimating && direction === 'next'),
                     'is-turning-right': (prevSlideIndex === <?= $idx ?> && isAnimating && direction === 'prev'),
                     'is-incoming-right': (activeSlide !== <?= $idx ?> && (prevSlideIndex !== <?= $idx ?> || !isAnimating) && direction === 'next'),
                     'is-incoming-left': (activeSlide !== <?= $idx ?> && (prevSlideIndex !== <?= $idx ?> || !isAnimating) && direction === 'prev')
                 }">
                
                <!-- Background Media Layer with Ambient Motion -->
                <div class="absolute inset-0 overflow-hidden -z-30 pointer-events-none">
                    <?php if (!empty($slide['video_url'])): ?>
                        <video autoplay muted loop playsinline
                               class="w-full h-full object-cover scale-105 transition-transform duration-10000"
                               :class="activeSlide === <?= $idx ?> ? 'scale-105' : 'scale-100'">
                            <source src="<?= e($slide['video_url']) ?>" type="video/mp4">
                        </video>
                    <?php else: ?>
                        <img src="<?= e($slide['image']) ?>"
                             alt="<?= e($slide['title']) ?>"
                             class="w-full h-full object-cover object-center transition-transform duration-[12000ms] ease-out will-change-transform"
                             :class="activeSlide === <?= $idx ?> ? 'scale-108' : 'scale-100'"
                             loading="<?= $idx === 0 ? 'eager' : 'lazy' ?>"
                             fetchpriority="<?= $idx === 0 ? 'high' : 'auto' ?>">
                    <?php endif; ?>
                </div>

                <!-- Cinematic Depth Vignette & Radial Atmospheric Scrims -->
                <div class="absolute inset-0 pointer-events-none -z-20"
                     :style="{ background: 'linear-gradient(to top, rgba(0,0,0,0.94) 0%, rgba(0,0,0,<?= ($hero['overlay_opacity'] ?? 45) / 100 ?>) 45%, rgba(0,0,0,0.4) 100%)' }"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent pointer-events-none -z-20"></div>
                <div class="absolute -top-32 left-1/4 w-[650px] h-[500px] rounded-full blur-[140px] pointer-events-none -z-20 opacity-30"
                     :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

                <!-- Architectural Jaali Subtle Grid Overlay -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,var(--theme-hero-glow)_0%,transparent_50%)] opacity-15 pointer-events-none -z-10"></div>

                <!-- 3D Page Turn Shadow Overlay (Darkens as slide rotates away) -->
                <div class="hero-page-shadow absolute inset-0 bg-black pointer-events-none transition-opacity duration-1000 ease-out -z-10"
                     :style="{ opacity: activeSlide === <?= $idx ?> ? '0' : (prevSlideIndex === <?= $idx ?> && isAnimating ? '0.75' : '0.85') }"></div>

                <!-- Top Floating Navigation Clearance & Eyebrow Pill -->
                <div class="max-w-7xl mx-auto w-full px-6 sm:px-8 pt-28 sm:pt-32 z-10">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        
                        <!-- Eyebrow Pill Badge -->
                        <div class="hero-badge inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full text-[11px] font-semibold tracking-[0.24em] uppercase backdrop-blur-md bg-black/40 border border-white/15 text-white/90 shadow-lg">
                            <span class="w-2 h-2 rounded-full animate-ping"
                                  :style="{ backgroundColor: 'var(--theme-accent)' }"></span>
                            <span><?= e($hero['badge_text'] ?? '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA') ?></span>
                        </div>

                        <!-- Top Right: Slide Category & Live Property Status -->
                        <div class="hidden sm:flex items-center gap-2.5">
                            <?php if (!empty($slide['featured_label'])): ?>
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-md bg-stone-950/70 border border-amber-400/30 text-amber-300 shadow-md">
                                    ✦ <?= e($slide['featured_label']) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($slide['status_tag'])): ?>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest backdrop-blur-md bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 shadow-md">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <?= e($slide['status_tag']) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <!-- Central Editorial Property Dossier Showcase (Col 1-8) -->
                <div class="max-w-7xl mx-auto w-full px-6 sm:px-8 my-auto z-10 py-6">
                    <div class="max-w-3xl space-y-5 text-left">
                        
                        <!-- Location Callout with Pin -->
                        <?php if (!empty($slide['location_tag'])): ?>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md text-xs font-semibold tracking-[0.16em] uppercase text-amber-300 backdrop-blur-md bg-black/50 border border-amber-400/20">
                                <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span><?= e($slide['location_tag']) ?></span>
                            </div>
                        <?php endif; ?>

                        <!-- Grand Estate Title -->
                        <h1 class="hero-title font-editorial text-3xl sm:text-5xl lg:text-6xl font-normal leading-[1.08] tracking-tight text-white drop-shadow-2xl">
                            <?= e($slide['title']) ?>
                        </h1>

                        <!-- Specifications & Architectural Highlights Badge Strip -->
                        <?php if (!empty($slide['specs'])): ?>
                            <div class="hero-desc flex flex-wrap items-center gap-2 pt-1 text-xs sm:text-sm text-stone-200">
                                <?php 
                                    $specsList = explode('•', $slide['specs']); 
                                    foreach ($specsList as $sp):
                                        $spTrim = trim($sp);
                                        if (empty($spTrim)) continue;
                                ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-white/90 text-[11px] sm:text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full" :style="{ backgroundColor: 'var(--theme-accent)' }"></span>
                                        <?= e($spTrim) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Price Tag Callout & Dual Action CTAs -->
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 pt-4">
                            
                            <!-- Starting Price Badge -->
                            <?php if (!empty($slide['price'])): ?>
                                <div class="inline-flex items-center gap-2.5 px-4 py-3 rounded-2xl backdrop-blur-md bg-stone-950/80 border border-amber-400/40 shadow-xl">
                                    <span class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold block">Investment</span>
                                    <span class="text-sm sm:text-base font-mono font-bold text-amber-300">
                                        <?= e($slide['price']) ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Dual Luxury Buttons -->
                            <div class="flex items-center gap-3.5">
                                <!-- Primary Action -->
                                <a href="<?= e($slide['link']) ?>"
                                   class="hero-cta group relative inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-full text-xs uppercase tracking-[0.18em] font-bold transition-all duration-300 shadow-xl hover:-translate-y-0.5 hover:shadow-2xl active:translate-y-0"
                                   :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                                    <span><?= e($slide['cta_text'] ?? 'Explore Sanctuary') ?></span>
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>

                                <!-- Secondary Action: VIP Site Visit Drawer -->
                                <button type="button"
                                        @click.prevent="vipModalOpen = true"
                                        class="hero-cta inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-full text-xs uppercase tracking-[0.18em] font-semibold transition-all duration-300 shadow-md hover:-translate-y-0.5 border border-white/25 backdrop-blur-md bg-white/10 hover:bg-white/20 text-white">
                                    <svg class="w-4 h-4 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span><?= e($slide['cta_secondary_text'] ?? 'Schedule Visit') ?></span>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Bottom Floating Controls & Properties Dock -->
                <div class="max-w-7xl mx-auto w-full px-6 sm:px-8 pb-8 z-20 space-y-4">
                    
                    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                        
                        <!-- Left: Bottom Trust Guarantee Strip -->
                        <?php if (!empty($hero['trust_seal_text'])): ?>
                            <div class="flex items-center gap-2.5 text-xs text-white/80 backdrop-blur-md bg-black/40 px-4 py-2 rounded-xl border border-white/10 max-w-lg">
                                <span class="w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 bg-amber-400 text-slate-950">
                                    ✓
                                </span>
                                <span class="font-medium text-[11px] sm:text-xs tracking-wide">
                                    <?= e($hero['trust_seal_text']) ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <!-- Right: Interactive 3D Slideshow Dock -->
                        <div class="flex items-center gap-3 sm:gap-4 self-end">
                            
                            <!-- Slide Number Counter & Circular Progress Timer -->
                            <div class="flex items-center gap-2.5 px-3 py-1.5 rounded-full backdrop-blur-md bg-black/50 border border-white/15 text-xs font-mono">
                                <span class="text-amber-300 font-bold" x-text="'0' + (activeSlide + 1)">01</span>
                                <span class="opacity-40">/</span>
                                <span class="text-white/60" x-text="'0' + totalSlides">0<?= count($heroSlides) ?></span>
                                
                                <!-- Circular SVG Progress Timer -->
                                <div class="relative w-5 h-5 flex items-center justify-center ml-1">
                                    <svg class="w-5 h-5 -rotate-90" viewBox="0 0 36 36">
                                        <path class="text-white/20" stroke-width="3.5" stroke="currentColor" fill="none"
                                              d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <path class="text-amber-400 transition-all duration-75 ease-linear" stroke-dasharray="100, 100"
                                              :stroke-dashoffset="100 - progress" stroke-width="3.5" stroke-linecap="round" stroke="currentColor" fill="none"
                                              d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    </svg>
                                </div>
                            </div>

                            <!-- 3D Page Turn Left / Right Buttons -->
                            <div class="flex items-center gap-1.5 p-1 rounded-full backdrop-blur-md bg-black/50 border border-white/15 shadow-xl">
                                <button @click="prevSlide()" type="button" aria-label="Previous Property Slide (3D Page Turn)"
                                        class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-400 hover:text-slate-950 text-white flex items-center justify-center transition-all duration-300 active:scale-95">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button @click="nextSlide()" type="button" aria-label="Next Property Slide (3D Page Turn)"
                                        class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-400 hover:text-slate-950 text-white flex items-center justify-center transition-all duration-300 active:scale-95">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                        </div>

                    </div>

                    <!-- Bottom Floating Property Selector Mini-Cards -->
                    <?php if (count($heroSlides) > 1): ?>
                        <div class="hidden md:grid gap-3 pt-2"
                             style="grid-template-columns: repeat(<?= min(count($heroSlides), 4) ?>, minmax(0, 1fr));">
                            <?php foreach ($heroSlides as $tabIdx => $tabSlide): ?>
                                <button @click="goToSlide(<?= $tabIdx ?>)"
                                        type="button"
                                        class="group text-left p-2.5 rounded-xl border backdrop-blur-md transition-all duration-300 flex items-center gap-3 relative overflow-hidden"
                                        :class="activeSlide === <?= $tabIdx ?>
                                            ? 'bg-black/75 border-amber-400/80 shadow-[0_8px_25px_rgba(245,158,11,0.25)] ring-1 ring-amber-400/50'
                                            : 'bg-black/40 border-white/10 hover:bg-black/60 hover:border-white/25 opacity-70 hover:opacity-100'">
                                    
                                    <!-- Mini Image Preview -->
                                    <div class="w-12 h-10 rounded-lg overflow-hidden shrink-0 bg-stone-900 relative">
                                        <img src="<?= e($tabSlide['image']) ?>" alt="Thumbnail" class="w-full h-full object-cover">
                                        <span class="absolute top-0.5 left-0.5 text-[8px] font-mono font-bold px-1 rounded bg-black/70 text-white">
                                            0<?= $tabIdx + 1 ?>
                                        </span>
                                    </div>

                                    <!-- Mini Metadata -->
                                    <div class="min-w-0 flex-1">
                                        <div class="text-[11px] font-serif font-bold text-white truncate group-hover:text-amber-300 transition-colors">
                                            <?= e($tabSlide['title']) ?>
                                        </div>
                                        <div class="text-[10px] text-amber-300/90 font-mono truncate">
                                            <?= e($tabSlide['price'] ?? 'Exclusive Estate') ?>
                                        </div>
                                    </div>

                                    <!-- Active Glow Dot -->
                                    <template x-if="activeSlide === <?= $tabIdx ?>">
                                        <span class="w-2 h-2 rounded-full bg-amber-400 shrink-0 animate-pulse mr-1"></span>
                                    </template>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        <?php endforeach; ?>

    </div>

</section>
<?php endif; ?>

<!-- 3D Page Rotation Styles Engine -->
<style>
    .hero-stage-3d {
        perspective: 2000px;
        -webkit-perspective: 2000px;
        transform-style: preserve-3d;
        -webkit-transform-style: preserve-3d;
    }

    .hero-slide-3d {
        transition: transform 1.15s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.85s ease-out, filter 1s ease-out;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        will-change: transform, opacity;
    }

    /* Active Resting State */
    .hero-slide-3d.is-active {
        transform: perspective(2000px) rotateY(0deg) scale(1) translateZ(0);
        opacity: 1;
        z-index: 30;
        pointer-events: auto;
        filter: brightness(1);
    }

    /* 3D Page Turning Forward (Rotates away to the left like a book page) */
    .hero-slide-3d.is-turning-left {
        transform: perspective(2000px) rotateY(-85deg) scale(0.92) translateZ(-80px);
        transform-origin: left center;
        opacity: 0;
        z-index: 20;
        pointer-events: none;
        filter: brightness(0.35);
    }

    /* 3D Page Turning Backward (Rotates away to the right) */
    .hero-slide-3d.is-turning-right {
        transform: perspective(2000px) rotateY(85deg) scale(0.92) translateZ(-80px);
        transform-origin: right center;
        opacity: 0;
        z-index: 20;
        pointer-events: none;
        filter: brightness(0.35);
    }

    /* Incoming from Right */
    .hero-slide-3d.is-incoming-right {
        transform: perspective(2000px) rotateY(85deg) scale(0.92) translateZ(-80px);
        transform-origin: right center;
        opacity: 0;
        z-index: 10;
        pointer-events: none;
    }

    /* Incoming from Left */
    .hero-slide-3d.is-incoming-left {
        transform: perspective(2000px) rotateY(-85deg) scale(0.92) translateZ(-80px);
        transform-origin: left center;
        opacity: 0;
        z-index: 10;
        pointer-events: none;
    }
</style>

<!-- 3D Page Slider Alpine Controller -->
<script>
    function hero3dSlider(config) {
        return {
            activeSlide: 0,
            prevSlideIndex: 0,
            totalSlides: config.totalSlides || 1,
            autoplayInterval: config.autoplayInterval || 6000,
            direction: 'next',
            isAnimating: false,
            progress: 0,
            progressInterval: null,
            touchStartX: 0,
            touchEndX: 0,

            init() {
                this.startAutoplay();
            },

            startAutoplay() {
                if (this.totalSlides <= 1) return;
                this.clearTimers();
                const step = 50;
                this.progress = 0;
                this.progressInterval = setInterval(() => {
                    this.progress += (step / this.autoplayInterval) * 100;
                    if (this.progress >= 100) {
                        this.progress = 0;
                        this.nextSlide(true);
                    }
                }, step);
            },

            pauseAutoplay() {
                if (this.progressInterval) {
                    clearInterval(this.progressInterval);
                    this.progressInterval = null;
                }
            },

            resumeAutoplay() {
                if (!this.progressInterval && this.totalSlides > 1) {
                    const step = 50;
                    this.progressInterval = setInterval(() => {
                        this.progress += (step / this.autoplayInterval) * 100;
                        if (this.progress >= 100) {
                            this.progress = 0;
                            this.nextSlide(true);
                        }
                    }, step);
                }
            },

            clearTimers() {
                if (this.progressInterval) {
                    clearInterval(this.progressInterval);
                    this.progressInterval = null;
                }
            },

            goToSlide(index) {
                if (this.isAnimating || index === this.activeSlide || index < 0 || index >= this.totalSlides) return;
                this.direction = index > this.activeSlide ? 'next' : 'prev';
                this.prevSlideIndex = this.activeSlide;
                this.activeSlide = index;
                this.triggerTransition();
            },

            nextSlide(isAuto = false) {
                if (this.isAnimating || this.totalSlides <= 1) return;
                this.direction = 'next';
                this.prevSlideIndex = this.activeSlide;
                this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                this.triggerTransition();
            },

            prevSlide() {
                if (this.isAnimating || this.totalSlides <= 1) return;
                this.direction = 'prev';
                this.prevSlideIndex = this.activeSlide;
                this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
                this.triggerTransition();
            },

            triggerTransition() {
                this.isAnimating = true;
                this.progress = 0;
                this.clearTimers();
                setTimeout(() => {
                    this.isAnimating = false;
                    this.startAutoplay();
                }, 1150);
            },

            handleTouchStart(e) {
                this.touchStartX = e.changedTouches[0].screenX;
            },

            handleTouchEnd(e) {
                this.touchEndX = e.changedTouches[0].screenX;
                if (this.touchStartX - this.touchEndX > 50) {
                    this.nextSlide();
                } else if (this.touchEndX - this.touchStartX > 50) {
                    this.prevSlide();
                }
            }
        };
    }
</script>


<!-- 1.5 TRUST & PERFORMANCE METRICS RIBBON (Matches Reference Image 3) -->
<section class="relative border-b py-8 sm:py-10 transition-colors z-20"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto px-6 sm:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-10 items-center">
            
            <!-- Metric 1: <?= e($home_sections['metrics']['m1_title']) ?> <?= e($home_sections['metrics']['m1_sub']) ?> -->
            <div class="flex items-center gap-3.5 sm:gap-4 group">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 border transition-transform duration-300 group-hover:scale-105 shadow-xs"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-accent)' }">
                    <!-- Medal with Stars Icon -->
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3 0 1.306.835 2.417 2 2.83V21l2-1.5 2 1.5v-7.17c1.165-.413 2-1.524 2-2.83 0-1.657-1.343-3-3-3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l1.2 2.4 2.8.4-2 2 .5 2.8L12 9.2l-2.5 1.4.5-2.8-2-2 2.8-.4L12 3z" />
                        <circle cx="5" cy="12" r="1.5" stroke-width="1.5" />
                        <circle cx="19" cy="12" r="1.5" stroke-width="1.5" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="flex items-baseline gap-1.5">
                        <span class="font-mono text-xl sm:text-2xl font-bold tracking-tight" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m1_val']) ?></span>
                        <span class="text-xs sm:text-sm font-semibold tracking-normal" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m1_title']) ?></span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold tracking-normal -mt-0.5" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($home_sections['metrics']['m1_sub']) ?>
                    </div>
                </div>
            </div>

            <!-- Metric 2: <?= e($home_sections['metrics']['m2_title']) ?> <?= e($home_sections['metrics']['m2_sub']) ?> -->
            <div class="flex items-center gap-3.5 sm:gap-4 group">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 border transition-transform duration-300 group-hover:scale-105 shadow-xs"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-accent)' }">
                    <!-- City Buildings / Townships Icon -->
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="flex items-baseline gap-1.5">
                        <span class="font-mono text-xl sm:text-2xl font-bold tracking-tight" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m2_val']) ?></span>
                        <span class="text-xs sm:text-sm font-semibold tracking-normal" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m2_title']) ?></span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold tracking-normal -mt-0.5" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($home_sections['metrics']['m2_sub']) ?>
                    </div>
                </div>
            </div>

            <!-- Metric 3: <?= e($home_sections['metrics']['m3_title']) ?> <?= e($home_sections['metrics']['m3_sub']) ?> -->
            <div class="flex items-center gap-3.5 sm:gap-4 group">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 border transition-transform duration-300 group-hover:scale-105 shadow-xs"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-accent)' }">
                    <!-- Happy Face Smiley Icon -->
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="flex items-baseline gap-1.5">
                        <span class="font-mono text-xl sm:text-2xl font-bold tracking-tight" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m3_val']) ?></span>
                        <span class="text-xs sm:text-sm font-semibold tracking-normal" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m3_title']) ?></span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold tracking-normal -mt-0.5" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($home_sections['metrics']['m3_sub']) ?>
                    </div>
                </div>
            </div>

            <!-- Metric 4: <?= e($home_sections['metrics']['m4_title']) ?> <?= e($home_sections['metrics']['m4_sub']) ?> -->
            <div class="flex items-center gap-3.5 sm:gap-4 group">
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center shrink-0 border transition-transform duration-300 group-hover:scale-105 shadow-xs"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-accent)' }">
                    <!-- Document / House Deed with Checkmark Icon -->
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 10l2 2 4-4" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="flex items-baseline gap-1.5">
                        <span class="font-mono text-xl sm:text-2xl font-bold tracking-tight" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m4_val']) ?></span>
                        <span class="text-xs sm:text-sm font-semibold tracking-normal" :style="{ color: 'var(--theme-title)' }"><?= e($home_sections['metrics']['m4_title']) ?></span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold tracking-normal -mt-0.5" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($home_sections['metrics']['m4_sub']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- 2. "THE SANCTITY OF BRAJ" / PHILOSOPHY DUAL SPLIT SECTION -->
<section class="relative py-28 px-6 sm:px-8 border-t overflow-hidden transition-colors"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'rgba(255, 255, 255, 0.1)' }">
    <!-- Subtle architectural grid lines -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.04)_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] opacity-40 pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 pb-6 border-b border-white/15 gap-6">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block mb-2"
                      :style="{ color: 'var(--theme-section-alt-accent)' }"><?= e($home_sections['philosophy']['eyebrow']) ?></span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-section-alt-title)' }"><?= e($home_sections['philosophy']['title']) ?></h2>
            </div>
            <p class="text-xs sm:text-sm font-light max-w-md leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($home_sections['philosophy']['subtitle']) ?>
            </p>
        </div>

        <!-- Dual Split Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left Column: Editorial Philosophy -->
            <div class="lg:col-span-7 space-y-8 reveal-quote">
                <div class="relative pl-8 border-l-2"
                     :style="{ borderColor: 'var(--theme-section-alt-accent)' }">
                    <blockquote class="font-sans text-xl sm:text-2xl md:text-3xl font-normal leading-relaxed not-italic tracking-normal"
                                :style="{ color: 'var(--theme-section-alt-title)' }">
                        &ldquo;<?= e($home_sections['philosophy']['quote']) ?>&rdquo;
                    </blockquote>
                    <cite class="block mt-4 text-xs uppercase tracking-[0.2em] font-sans font-semibold not-italic"
                          :style="{ color: 'var(--theme-section-alt-accent)' }">
                        &mdash; <?= e($home_sections['philosophy']['quote_author']) ?>
                    </cite>
                </div>

                <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                     :style="{ color: 'var(--theme-section-alt-subtext)' }">
                    <p>
                        <?= nl2br(e($home_sections['philosophy']['p1'])) ?>
                    </p>
                    <p>
                        <?= nl2br(e($home_sections['philosophy']['p2'])) ?>
                    </p>
                </div>

                <!-- 4 Pillars Matrix (Frosted Luxury Glass Panels) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                    <?php foreach ($home_sections['philosophy']['pillars'] as $pillar): ?>
                        <div class="p-5 sm:p-6 rounded-2xl border backdrop-blur-xl space-y-2.5 shadow-lg hover:-translate-y-1 hover:bg-white/[0.14] transition-all duration-300"
                             :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                            <span class="text-xs font-semibold uppercase tracking-wider flex items-center gap-2"
                                  :style="{ color: 'var(--theme-section-card-title)' }">
                                <span class="w-2 h-2 rounded-full shadow-xs" :style="{ backgroundColor: 'var(--theme-section-card-title)' }"></span>
                                <?= e($pillar['title']) ?>
                            </span>
                            <p class="text-xs leading-relaxed"
                               :style="{ color: 'var(--theme-section-card-text)' }">
                                <?= e($pillar['desc']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Column: Curated Visual Card -->
            <div class="lg:col-span-5">
                <div class="relative p-2.5 rounded-3xl border shadow-2xl backdrop-blur-xl transition-all"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                    <div class="relative aspect-[4/5] rounded-2xl overflow-hidden bg-black/40">
                        <?php
                            $customShowcaseImg = $home_sections['philosophy']['showcase_image'] ?? '';
                            if (!empty($customShowcaseImg)) {
                                $showcaseImgUrl = media_url($customShowcaseImg);
                            } else {
                                $fallbackImg = !empty($projects) && isset($projects[1]) ? \App\Models\Project::getHeroImage((int)$projects[1]['id']) : ($firstHero ?? '');
                                $showcaseImgUrl = media_url($fallbackImg);
                            }
                        ?>
                        <img src="<?= e($showcaseImgUrl) ?>" alt="<?= e($home_sections['philosophy']['showcase_title']) ?>" class="parallax-media w-full h-full object-cover filter brightness-95 hover:scale-105 transition-transform duration-700 scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>

                        <!-- Card Overlays: Sleek Luxury Frosted Glass -->
                        <div class="absolute bottom-5 left-5 right-5 p-5 rounded-2xl backdrop-blur-2xl border space-y-2 shadow-2xl bg-black/80 border-white/20 text-white">
                            <span class="text-[10px] uppercase tracking-[0.2em] font-semibold text-amber-300"><?= e($home_sections['philosophy']['showcase_badge']) ?></span>
                            <h4 class="font-editorial text-2xl font-normal text-white"><?= e($home_sections['philosophy']['showcase_title']) ?></h4>
                            <p class="text-xs font-light text-stone-300 leading-relaxed">
                                <?= e($home_sections['philosophy']['showcase_desc']) ?>
                            </p>
                            <div class="pt-2 flex items-center justify-between">
                                <span class="text-xs font-mono font-medium text-amber-300"><?= e($home_sections['philosophy']['showcase_price']) ?></span>
                                <a href="<?= url($home_sections['philosophy']['showcase_link']) ?>"
                                   class="text-[11px] font-semibold uppercase tracking-wider text-amber-200 hover:text-white flex items-center gap-1 transition-colors">
                                    Explore &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ASSET CLASSES & SANCTUARY PORTFOLIO SHOWCASE (Commercial Plot, Vila, Plot, Flat) -->
<section class="relative py-20 px-4 sm:px-6 lg:px-8 overflow-hidden transition-colors"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)' }">
    <div class="max-w-7xl mx-auto">
        <!-- 3-Column Descriptive Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 mb-10 text-white/85 text-xs sm:text-sm font-light leading-relaxed border-b border-white/15 pb-8">
            <div class="space-y-1">
                <p><?= e($home_sections['asset_highlights']['h1']) ?></p>
            </div>
            <div class="space-y-1">
                <p><?= e($home_sections['asset_highlights']['h2']) ?></p>
            </div>
            <div class="space-y-1">
                <p><?= e($home_sections['asset_highlights']['h3']) ?></p>
            </div>
        </div>

        <!-- 4 Visual Photographic Cards Side-by-Side: Commercial Plot, Vila, Plot, Flat -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            
            <!-- Card 1: COMMERCIAL PLOT -->
            <a href="<?= url($home_sections['asset_cards']['commercial']['link']) ?>"
               class="group relative aspect-square overflow-hidden rounded-md bg-black/40 border border-white/10 shadow-lg cursor-pointer block">
                <img src="<?= asset($home_sections['asset_cards']['commercial']['image']) ?>"
                     alt="<?= e($home_sections['asset_cards']['commercial']['title']) ?>"
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                <div class="absolute top-4 right-4 hidden sm:block max-w-[140px] text-right">
                    <p class="text-[9px] text-white/75 font-light leading-tight">
                        <?= e($home_sections['asset_cards']['commercial']['subtitle']) ?>
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <h3 class="text-white font-sans text-xs sm:text-sm font-bold tracking-[0.16em] uppercase drop-shadow-sm">
                        <?= e($home_sections['asset_cards']['commercial']['title']) ?>
                    </h3>
                    <span class="text-amber-400 text-xs transition-transform group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

            <!-- Card 2: VILA / VILLA -->
            <a href="<?= url($home_sections['asset_cards']['villa']['link']) ?>"
               class="group relative aspect-square overflow-hidden rounded-md bg-black/40 border border-white/10 shadow-lg cursor-pointer block">
                <img src="<?= asset($home_sections['asset_cards']['villa']['image']) ?>"
                     alt="<?= e($home_sections['asset_cards']['villa']['title']) ?>"
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                <div class="absolute top-4 right-4 hidden sm:block max-w-[135px] text-right">
                    <p class="text-[9px] text-white/75 font-light leading-tight">
                        <?= e($home_sections['asset_cards']['villa']['subtitle']) ?>
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <h3 class="text-white font-sans text-xs sm:text-sm font-bold tracking-[0.16em] uppercase drop-shadow-sm">
                        <?= e($home_sections['asset_cards']['villa']['title']) ?>
                    </h3>
                    <span class="text-amber-400 text-xs transition-transform group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

            <!-- Card 3: PLOT -->
            <a href="<?= url($home_sections['asset_cards']['plot']['link']) ?>"
               class="group relative aspect-square overflow-hidden rounded-md bg-black/40 border border-white/10 shadow-lg cursor-pointer block">
                <img src="<?= asset($home_sections['asset_cards']['plot']['image']) ?>"
                     alt="<?= e($home_sections['asset_cards']['plot']['title']) ?>"
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>
                <div class="absolute top-4 right-4 hidden sm:block max-w-[145px] text-right">
                    <p class="text-[9px] text-white/75 font-light leading-tight">
                        <?= e($home_sections['asset_cards']['plot']['subtitle']) ?>
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <h3 class="text-white font-sans text-xs sm:text-sm font-bold tracking-[0.16em] uppercase drop-shadow-sm">
                        <?= e($home_sections['asset_cards']['plot']['title']) ?>
                    </h3>
                    <span class="text-amber-400 text-xs transition-transform group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

            <!-- Card 4: FLAT -->
            <a href="<?= url($home_sections['asset_cards']['flat']['link']) ?>"
               class="group relative aspect-square overflow-hidden rounded-md bg-black/40 border border-white/10 shadow-lg cursor-pointer block">
                <img src="<?= asset($home_sections['asset_cards']['flat']['image']) ?>"
                     alt="<?= e($home_sections['asset_cards']['flat']['title']) ?>"
                     loading="lazy"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                <div class="absolute top-4 right-4 hidden sm:block max-w-[140px] text-right">
                    <p class="text-[9px] text-white/75 font-light leading-tight">
                        <?= e($home_sections['asset_cards']['flat']['subtitle']) ?>
                    </p>
                </div>
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <h3 class="text-white font-sans text-xs sm:text-sm font-bold tracking-[0.16em] uppercase drop-shadow-sm">
                        <?= e($home_sections['asset_cards']['flat']['title']) ?>
                    </h3>
                    <span class="text-amber-400 text-xs transition-transform group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

        </div>
    </div>
</section>


<!-- 3. INTERACTIVE PROJECT SHOWCASE COLLECTION (GSAP + ALPINE) -->
<section id="residences" x-data="{ activeFilter: 'all' }" class="relative py-24 sm:py-28 px-6 sm:px-8 border-t transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <span id="showcase" class="sr-only"></span>
    <div class="max-w-7xl mx-auto">
        <!-- Showcase Heading & Filter Controls (Matching Reference Image) -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-16 gap-8">
            <div>
                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.24em] block mb-2 transition-colors"
                      :style="{ color: 'var(--theme-accent)' }">
                    <?= e($home_sections['projects_section']['eyebrow']) ?>
                </span>
                <h2 class="font-editorial text-3xl sm:text-5xl lg:text-6xl font-normal tracking-tight transition-colors leading-[1.1]"
                    :style="{ color: 'var(--theme-title)' }">
                    <?= e($home_sections['projects_section']['title']) ?>
                </h2>
                <p class="mt-3 text-xs sm:text-sm font-light max-w-xl transition-colors"
                   :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($home_sections['projects_section']['subtitle']) ?>
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap items-center gap-2 p-1.5 rounded-full border shadow-xs"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                <button @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'font-semibold shadow-xs' : 'opacity-70 hover:opacity-100'"
                        :style="activeFilter === 'all' ? { backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' } : { color: 'var(--theme-text-secondary)' }"
                        class="px-4 py-2 rounded-full text-xs uppercase tracking-wider transition-all duration-200">
                    All Estates (<?= count($projects) ?>)
                </button>
                <button @click="activeFilter = 'Plotted Community'"
                        :class="activeFilter === 'Plotted Community' ? 'font-semibold shadow-xs' : 'opacity-70 hover:opacity-100'"
                        :style="activeFilter === 'Plotted Community' ? { backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' } : { color: 'var(--theme-text-secondary)' }"
                        class="px-4 py-2 rounded-full text-xs uppercase tracking-wider transition-all duration-200">
                    Plots
                </button>
                <button @click="activeFilter = 'Luxury Villas'"
                        :class="activeFilter === 'Luxury Villas' ? 'font-semibold shadow-xs' : 'opacity-70 hover:opacity-100'"
                        :style="activeFilter === 'Luxury Villas' ? { backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' } : { color: 'var(--theme-text-secondary)' }"
                        class="px-4 py-2 rounded-full text-xs uppercase tracking-wider transition-all duration-200">
                    Villas
                </button>
                <button @click="activeFilter = 'Commercial'"
                        :class="activeFilter === 'Commercial' ? 'font-semibold shadow-xs' : 'opacity-70 hover:opacity-100'"
                        :style="activeFilter === 'Commercial' ? { backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' } : { color: 'var(--theme-text-secondary)' }"
                        class="px-4 py-2 rounded-full text-xs uppercase tracking-wider transition-all duration-200">
                    Commercial
                </button>
            </div>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($projects)): ?>
                <div class="col-span-full text-center py-24 text-slate-500 font-light">
                    No residential projects currently available in this filter.
                </div>
            <?php else: ?>
                <?php foreach ($projects as $proj): ?>
                    <?php
                        $heroImg = \App\Models\Project::getHeroImage((int) $proj['id']);
                        $projType = $proj['project_type'];
                        // Normalize category tag for Alpine filter
                        $categoryAttr = (stripos($proj['name'], 'plot') !== false || stripos($proj['project_type'], 'plot') !== false) ? 'Plotted Community' : (stripos($proj['name'], 'commercial') !== false ? 'Commercial' : 'Luxury Villas');
                    ?>
                    <div x-show="activeFilter === 'all' || activeFilter === '<?= $categoryAttr ?>' || activeFilter === '<?= addslashes($projType) ?>'"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         :style="{
                             backgroundColor: 'var(--theme-section-card-bg)',
                             borderColor: 'var(--theme-border-hairline)',
                             boxShadow: 'var(--theme-card-shadow)'
                         }"
                         class="reveal-card group flex flex-col rounded-2xl border transition-all duration-500 overflow-hidden shadow-lg hover:shadow-2xl">

                        <!-- Image Preview with Badges -->
                        <div class="relative aspect-[16/11] overflow-hidden bg-black/10">
                            <img src="<?= media_url($heroImg) ?>"
                                 alt="<?= e($proj['name']) ?>"
                                 loading="lazy"
                                 class="w-full h-full object-cover object-center group-hover:scale-108 transition-transform duration-700 ease-out">

                            <!-- Subtle dark gradient vignette -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>

                            <!-- Top Badges -->
                            <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                <span :style="{ backgroundColor: 'var(--theme-card-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-border-hairline)' }"
                                      class="px-3 py-1 rounded-full text-[10px] font-semibold uppercase tracking-[0.16em] backdrop-blur-md border shadow-xs">
                                    <?= e($proj['project_type']) ?>
                                </span>
                                <?php if ((int) $proj['mvda_approved'] === 1): ?>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/90 text-white shadow-xs">
                                        100% MVDA
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Price Tag on Image -->
                            <?php if (!empty($proj['starting_price'])): ?>
                                <div :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-hairline)' }"
                                     class="absolute bottom-4 right-4 px-3.5 py-1.5 rounded-full backdrop-blur-md border text-right shadow-xs">
                                    <span class="text-[10px] uppercase tracking-wider block leading-none" :style="{ color: 'var(--theme-text-muted)' }">Starting From</span>
                                    <span class="font-editorial text-base sm:text-lg font-normal leading-tight" :style="{ color: 'var(--theme-accent)' }">
                                        <?= e($proj['starting_price']) ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-6">
                            <div class="space-y-3">
                                <!-- Location Pin -->
                                <div class="flex items-center gap-1.5 text-xs font-medium tracking-wide" :style="{ color: 'var(--theme-accent)' }">
                                    <svg class="w-3.5 h-3.5 fill-current flex-shrink-0" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                    <span class="truncate"><?= e($proj['location']) ?></span>
                                </div>

                                <!-- Estate Title -->
                                <h3 class="font-editorial text-2xl sm:text-3xl font-normal transition-colors leading-snug" :style="{ color: 'var(--theme-title)' }">
                                    <a href="<?= url('/projects/' . $proj['slug']) ?>">
                                        <?= e($proj['name']) ?>
                                    </a>
                                </h3>

                                <!-- Overview Tagline -->
                                <p class="text-xs font-light line-clamp-2 leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                                    <?= e($proj['tagline'] ?: strip_tags($proj['overview'] ?? 'Verified plotted community with wide concrete avenues and clear titles.')) ?>
                                </p>
                            </div>

                            <!-- 3 Direct Downloads Strip (Brochure, Floor Plan, Payment Plan) -->
                            <?php if (!empty($proj['brochure_url']) || !empty($proj['floor_plan_url']) || !empty($proj['payment_plan_url'])): ?>
                                <div class="pt-3.5 border-t space-y-1.5" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                    <div class="flex items-center justify-between text-[10px] uppercase tracking-[0.16em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                                        <span>Direct Downloads</span>
                                        <span class="opacity-70 text-[9px]">Verified PDF</span>
                                    </div>
                                    <div class="grid grid-cols-3 gap-1.5 text-center text-[10px] uppercase tracking-wider font-semibold">
                                        <?php if (!empty($proj['brochure_url'])): ?>
                                            <a href="<?= media_url($proj['brochure_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Brochure">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-amber-500 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                <span class="truncate">Brochure</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($proj['floor_plan_url'])): ?>
                                            <a href="<?= media_url($proj['floor_plan_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Floor Plan">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-sky-500 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm4 0v14M4 11h16"/></svg>
                                                <span class="truncate">Floor Plan</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($proj['payment_plan_url'])): ?>
                                            <a href="<?= media_url($proj['payment_plan_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Payment Plan">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-emerald-500 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="truncate">Payment</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Highlights & Action -->
                            <div class="pt-4 border-t flex items-center justify-between" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                <div class="text-[11px] font-mono" :style="{ color: 'var(--theme-text-muted)' }">
                                    <?= e($proj['project_size'] ?: 'Plots from 100 Sq. Yds') ?>
                                </div>

                                <a href="<?= url('/projects/' . $proj['slug']) ?>"
                                   :style="{ color: 'var(--theme-accent)' }"
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-[0.14em] hover:opacity-80 transition-all">
                                    View Residence <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- 4. BESPOKE MINIMAL LUXURY AMENITIES GRID (8 CUSTOM SVGS) -->
<section class="relative py-28 px-6 sm:px-8 border-t overflow-hidden"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <!-- Amenities Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
            <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-section-alt-accent)' }">Infrastructure &bull; Wellbeing &bull; Security</span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight" :style="{ color: 'var(--theme-section-alt-title)' }">
                Designed for Transcendent Living
            </h2>
            <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Our master-planned enclaves bring metropolitan engineering to the serene realm of Braj. Every comfort is anticipated, executed with understated refinement.
            </p>
        </div>

        <!-- 8 Bespoke SVG Luxury Amenities Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            
            <!-- Amenity 1: Gated Perimeter -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Bespoke Gate / Sanctuary SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 21V9m6 12V9M9 13h6M9 17h6M9 9h6"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Gated Sanctuary Perimeter</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Solid stone boundary perimeter, grand architectural entry portal, and multi-tier boom barriers for absolute privacy.
                </p>
            </div>

            <!-- Amenity 2: 24/7 Surveillance -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- CCTV / Surveillance SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h8a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                        <circle cx="8" cy="12" r="2" fill="currentColor"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">24/7 Tier-1 Surveillance</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    High-definition AI-assisted perimeter CCTV cameras, round-the-clock guards, and on-call residential concierge.
                </p>
            </div>

            <!-- Amenity 3: 40-60 Ft Boulevards -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Boulevard / Road SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 21L8 3M20 21L16 3M12 5v2m0 4v2m0 4v2"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">40-60 Ft Wide Boulevards</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Heavy-duty interlocking paved and RCC avenues, curb-edged tree lines, and pedestrian walkways for effortless vehicle maneuvering.
                </p>
            </div>

            <!-- Amenity 4: Underground Electrification -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Power / Cable SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Underground Cabling</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Unobstructed skyline aesthetics with subterranean high-tension electricity lines, high-speed fiber ducts, and LED streetlamps.
                </p>
            </div>

            <!-- Amenity 5: Sacred Temple & ISKCON Proximity -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Temple Shikhara SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3 6h-6l3-6zm-7 19h14M6 21V12l6-4 6 4v9M9 21v-5a3 3 0 016 0v5"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Sacred Temple Proximity</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Wake up to temple bells. Located directly within 5 to 12 minutes of Prem Mandir, Banke Bihari, and Chandrodaya Temple.
                </p>
            </div>

            <!-- Amenity 6: Landscaped Vana Groves -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Lotus / Sacred Grove Tree SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 22V12m0 0a5 5 0 005-5c0-4-5-5-5-5s-5 1-5 5a5 5 0 005 5zm0 0a7 7 0 017 7m-14 0a7 7 0 017-7"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Landscaped Groves &amp; Vana</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Themed central greens planted with sacred Kadamba, Peepal, and flowering shrubs, accompanied by reflexology paths.
                </p>
            </div>

            <!-- Amenity 7: Clubhouse & Satsang Pavilion -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Pavilion / Yoga Community SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Clubhouse &amp; Satsang Hall</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Exclusive community club featuring yoga meditation decks, air-conditioned banquet lounge, and private family suites.
                </p>
            </div>

            <!-- Amenity 8: Rainwater Harvesting -->
            <div class="p-8 rounded-2xl border transition-all duration-300 group space-y-4 shadow-sm hover:shadow-xl hover:bg-white/[0.12] hover:-translate-y-1"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                <div class="w-14 h-14 rounded-xl border flex items-center justify-center group-hover:scale-110 transition-transform"
                     :style="{ backgroundColor: 'rgba(255, 255, 255, 0.10)', borderColor: 'rgba(255, 255, 255, 0.20)', color: 'var(--theme-section-card-title)' }">
                    <!-- Ecology / Water SVG -->
                    <svg class="w-7 h-7 stroke-current" fill="none" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                </div>
                <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-section-card-title)' }">Rainwater Recharge &amp; STP</h4>
                <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-section-card-text)' }">
                    Ecologically conscious drainage with percolation pits, sewage treatment plant (STP), and water softener filtration.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- 5. STRATEGIC BRAJ CONNECTIVITY TIMELINE SECTION -->
<section class="relative py-28 px-6 sm:px-8 border-t"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }"><?= e($home_sections['locations_section']['eyebrow']) ?></span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight" :style="{ color: 'var(--theme-title)' }">
                    <?= e($home_sections['locations_section']['title']) ?>
                </h2>
                <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($home_sections['locations_section']['subtitle']) ?>
                </p>

                <!-- Milestone Cards -->
                <div class="space-y-3 pt-2">
                    <div class="flex items-center justify-between p-4 rounded-xl border transition-all"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-xs font-medium" :style="{ color: 'var(--theme-title)' }">Yamuna Expressway Interchange</span>
                        <span class="font-editorial text-lg font-semibold" :style="{ color: 'var(--theme-accent)' }">12 Mins</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl border transition-all"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-xs font-medium" :style="{ color: 'var(--theme-title)' }">Prem Mandir &amp; Chandrodaya Mandir</span>
                        <span class="font-editorial text-lg font-semibold" :style="{ color: 'var(--theme-accent)' }">8 Mins</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl border transition-all"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-xs font-medium" :style="{ color: 'var(--theme-title)' }">Banke Bihari Temple Vrindavan</span>
                        <span class="font-editorial text-lg font-semibold" :style="{ color: 'var(--theme-accent)' }">12 Mins</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl border transition-all"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-xs font-medium" :style="{ color: 'var(--theme-title)' }">Proposed Heritage City / Film City</span>
                        <span class="font-editorial text-lg font-semibold" :style="{ color: 'var(--theme-accent)' }">15 Mins</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl border transition-all"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-xs font-medium" :style="{ color: 'var(--theme-title)' }">Delhi NCR (Noida / Greater Noida)</span>
                        <span class="font-editorial text-lg font-semibold" :style="{ color: 'var(--theme-accent)' }">90 Mins</span>
                    </div>
                </div>
            </div>

            <!-- Right Column Map Visual -->
            <div class="lg:col-span-7">
                <div class="p-4 rounded-3xl border shadow-xl relative overflow-hidden"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="aspect-[16/10] rounded-2xl overflow-hidden bg-black/10 relative">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113426.31976077383!2d77.63212852277085!3d27.568453457193026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39736ce47bffc039%3A0xfe5fc3da92c7e2b6!2sVrindavan%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                                class="w-full h-full"
                                frameborder="0"
                                allowfullscreen
                                loading="lazy"></iframe>
                        <!-- Map Marker Pill -->
                        <div class="absolute top-6 left-6 p-4 rounded-xl backdrop-blur-md border text-left space-y-1 shadow-md"
                             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                            <span class="text-[10px] uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">Strategic Cluster</span>
                            <div class="font-editorial text-lg font-normal" :style="{ color: 'var(--theme-title)' }">Chhatikara &bull; Sunrakh &bull; Radha Kund</div>
                            <span class="text-xs font-light block" :style="{ color: 'var(--theme-text-secondary)' }">Fastest appreciating real estate corridor in Western UP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 6. LATEST MARKET INSIGHTS & EDITORIAL ARTICLES -->
<?php if (!empty($latest_blogs)): ?>
<section class="relative py-24 px-6 sm:px-8 border-t"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 pb-6 border-b gap-4"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block mb-2" :style="{ color: 'var(--theme-accent)' }">
                    Advisory Desk &bull; Market Intelligence
                </span>
                <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight" :style="{ color: 'var(--theme-title)' }">
                    Latest Insights &amp; Legal Guides
                </h2>
            </div>
            <a href="<?= url('/blog') ?>" class="text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5 hover:underline" :style="{ color: 'var(--theme-accent)' }">
                <span>View Full Blog &amp; Journal</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($latest_blogs as $post): ?>
                <article class="group flex flex-col rounded-2xl border overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                         :style="{
                             backgroundColor: 'var(--theme-card-bg)',
                             borderColor: 'var(--theme-border-subtle)'
                         }">
                    <a href="<?= url('/blog/' . $post['slug']) ?>" class="relative h-48 overflow-hidden block">
                        <img src="<?= asset(!empty($post['featured_image']) ? $post['featured_image'] : 'uploads/pages/residential-plots-in-vrindavan.jpeg') ?>"
                             alt="<?= e($post['title']) ?>"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy">
                        <div class="absolute top-3 left-3">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider backdrop-blur-md"
                                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                                <?= e($post['category'] ?: 'Market Insights') ?>
                            </span>
                        </div>
                    </a>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center gap-2 text-[11px] opacity-70">
                                <span><?= date('M j, Y', strtotime($post['published_at'] ?? $post['created_at'])) ?></span>
                                <span>&bull;</span>
                                <span><?= e($post['read_time'] ?: '5 min read') ?></span>
                            </div>

                            <h3 class="font-editorial text-lg sm:text-xl font-light leading-snug group-hover:underline line-clamp-2"
                                :style="{ color: 'var(--theme-title)' }">
                                <a href="<?= url('/blog/' . $post['slug']) ?>">
                                    <?= e($post['title']) ?>
                                </a>
                            </h3>

                            <p class="text-xs leading-relaxed opacity-75 line-clamp-3"
                               :style="{ color: 'var(--theme-text-primary)' }">
                                <?= e($post['excerpt']) ?>
                            </p>
                        </div>

                        <div class="pt-5 mt-5 border-t flex items-center justify-between text-xs"
                             :style="{ borderColor: 'var(--theme-border-hairline)' }">
                            <span class="text-[11px] opacity-70">
                                <?= e($post['author'] ?: 'Gleamrealty Desk') ?>
                            </span>

                            <a href="<?= url('/blog/' . $post['slug']) ?>"
                               class="font-semibold uppercase tracking-wider text-[11px] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform"
                               :style="{ color: 'var(--theme-accent)' }">
                                <span>Read Guide</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- 7. INBOUND VIP CONSULTATION & SITE SHOWING SECTION -->
<section id="inquire" class="relative py-28 px-6 sm:px-8 border-t"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <span id="inquireSection" class="sr-only"></span>
    <div class="max-w-4xl mx-auto">
        <div class="relative p-8 sm:p-14 rounded-3xl border shadow-2xl backdrop-blur-xl overflow-hidden"
             :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
            <!-- Ambient theme glow accent -->
            <div class="absolute -top-32 -right-32 w-80 h-80 rounded-full filter blur-3xl pointer-events-none"
                 :style="{ backgroundColor: 'var(--theme-hero-glow)', opacity: 'var(--theme-hero-glow-opacity)' }"></div>

            <div class="relative z-10 text-center max-w-xl mx-auto mb-10 space-y-3">
                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-section-alt-accent)' }"><?= e($home_sections['consultation_section']['eyebrow']) ?></span>
                <h2 class="font-editorial text-3xl sm:text-4xl font-normal tracking-tight" :style="{ color: 'var(--theme-section-alt-title)' }">
                    <?= e($home_sections['consultation_section']['title']) ?>
                </h2>
                <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-section-alt-subtext)' }">
                    <?= e($home_sections['consultation_section']['subtitle']) ?>
                </p>
                <?php if (!empty($home_sections['consultation_section']['desk_note'])): ?>
                    <div class="inline-block px-3.5 py-1 rounded-full text-[11px] font-mono font-semibold tracking-wider border backdrop-blur-sm"
                         :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-badge-border)' }">
                        <?= e($home_sections['consultation_section']['desk_note']) ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Form -->
            <form action="<?= url('/inquire') ?>" method="POST" class="relative z-10 space-y-5">
                <?= csrf_field() ?>
                <input type="hidden" name="return_url" value="<?= e(url('/#inquireSection')) ?>">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Full Name *</label>
                        <input type="text" name="name" required placeholder="Shri Rajesh Sharma"
                               :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                               class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white placeholder:text-white/40">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210"
                               :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                               class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white placeholder:text-white/40 font-mono">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Email Address</label>
                        <input type="email" name="email" placeholder="client@example.com"
                               :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                               class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white placeholder:text-white/40">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Estate of Interest</label>
                        <select name="project_id"
                                :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                                class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white [&>option]:bg-stone-900 [&>option]:text-white">
                            <option value="">General Consultation / All Estates</option>
                            <?php foreach ($projects as $pr): ?>
                                <option value="<?= $pr['id'] ?>"><?= e($pr['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Investment Capital Range</label>
                    <select name="budget_range"
                            :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                            class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white [&>option]:bg-stone-900 [&>option]:text-white">
                        <option value="₹ 25 Lakhs - ₹ 50 Lakhs">₹ 25 Lakhs – ₹ 50 Lakhs (Ideal for Plotted Investment)</option>
                        <option value="₹ 50 Lakhs - ₹ 1 Crore">₹ 50 Lakhs – ₹ 1 Crore (Prime Plotted Community)</option>
                        <option value="₹ 1 Crore - ₹ 2.5 Crores">₹ 1 Crore – ₹ 2.5 Crores (Luxury Duplex Villa)</option>
                        <option value="₹ 2.5 Crores+">₹ 2.5 Crores+ (Commercial / Prime Boulevard)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-[0.16em] font-semibold mb-2" :style="{ color: 'var(--theme-section-card-title)' }">Specific Requirements / Preferred Visit Date</label>
                    <textarea name="message" rows="3" placeholder="I am looking for an East-facing corner plot near Prem Mandir for site visit this Saturday..."
                              :style="{ backgroundColor: 'rgba(0, 0, 0, 0.30)', borderColor: 'rgba(255, 255, 255, 0.20)', color: '#FFFFFF' }"
                              class="w-full border rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/50 transition-colors text-white placeholder:text-white/40"></textarea>
                </div>

                <button type="submit"
                        :style="{ backgroundColor: 'var(--theme-section-alt-accent)', color: '#162C22' }"
                        class="w-full py-4 rounded-xl font-bold text-xs uppercase tracking-[0.2em] transition-all duration-300 shadow-xl hover:opacity-95 hover:scale-[1.01] active:scale-[0.99] cursor-pointer">
                    Submit Confidential Showing Request &rarr;
                </button>

                <p class="text-[11px] text-center font-light" :style="{ color: 'var(--theme-section-alt-subtext)' }">
                    Your contact information is strictly confidential and protected by the Gleamrealty Privacy Guarantee.
                </p>
            </form>
        </div>
    </div>
</section>
