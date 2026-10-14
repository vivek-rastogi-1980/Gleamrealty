<?php
    $heroImg = !empty($gallery) ? $gallery[0]['file_path'] : null;
    $heroBgUrl = $heroImg ? media_url($heroImg) : asset('uploads/projects/hero-preview.jpg');
?>

<div x-data="{
    activeTab: 'overview',
    lightboxOpen: false,
    lightboxSrc: '',
    lightboxCaption: '',
    openLightbox(src, caption) {
        this.lightboxSrc = src;
        this.lightboxCaption = caption || '';
        this.lightboxOpen = true;
    }
}" :style="{ backgroundColor: 'var(--theme-bg-canvas)', color: 'var(--theme-text-primary)' }" class="relative transition-colors duration-300">

    <!-- 1. EDITORIAL HERO SHOWCASE HEADER -->
    <section class="relative min-h-[70vh] lg:min-h-[75vh] flex items-end overflow-hidden pt-28 pb-16 px-6 sm:px-8 border-b border-gold-hairline/30">
        <!-- Ambient Media Backdrop -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="<?= $heroBgUrl ?>"
                 alt="<?= e($project['name']) ?>"
                 class="parallax-media w-full h-full object-cover object-center filter brightness-[0.4] contrast-[1.08] transform scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
        </div>

        <!-- Hero Content Overlay -->
        <div class="relative z-10 max-w-7xl mx-auto w-full" style="margin-top:15px;">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs uppercase tracking-[0.18em] text-slate-300 mb-6 font-medium">
                <a href="<?= url('/') ?>" class="hover:underline transition-colors" :style="{ color: 'var(--theme-accent)' }">Residences</a>
                <span>&bull;</span>
                <span class="text-slate-200"><?= e($project['project_type']) ?></span>
                <span>&bull;</span>
                <span class="truncate max-w-xs font-semibold text-white"><?= e($project['name']) ?></span>
            </nav>

            <!-- Status & Compliance Chips -->
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-badge-text)', borderColor: 'var(--theme-border-hairline)' }"
                      class="px-3.5 py-1 rounded-full text-[11px] font-semibold uppercase tracking-[0.16em] border backdrop-blur-md">
                    <?= e($project['project_type']) ?>
                </span>

                <?php if ((int) $project['mvda_approved'] === 1): ?>
                    <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-[#0284C7] text-white shadow-xs">
                        100% MVDA Approved
                    </span>
                <?php endif; ?>

                <?php if (!empty($project['rera_id'])): ?>
                    <span :style="{ backgroundColor: 'var(--theme-card-bg)', color: 'var(--theme-accent)', borderColor: 'var(--theme-border-hairline)' }"
                          class="px-3 py-1 rounded-full text-[11px] font-mono font-medium tracking-wide border">
                        RERA: <?= e($project['rera_id']) ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Grand Title -->
            <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal text-white tracking-tight leading-[1.08] max-w-4xl">
                <?= e($project['name']) ?>
            </h1>

            <!-- Tagline / Subtitle -->
            <?php if (!empty($project['tagline'])): ?>
                <p class="mt-4 text-base sm:text-lg text-slate-200 font-light max-w-3xl leading-relaxed">
                    <?= e($project['tagline']) ?>
                </p>
            <?php endif; ?>

            <!-- Key Metric Strip & Starting Price with Disclaimer -->
            <div class="mt-8 pt-6 border-t border-white/20 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <!-- Location & Quick Specs -->
                <div class="flex flex-wrap items-center gap-6 text-xs sm:text-sm text-slate-200">
                    <div class="flex items-center gap-2 font-medium" :style="{ color: 'var(--theme-accent)' }">
                        <svg class="w-4 h-4 fill-current flex-shrink-0" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <span><?= e($project['location']) ?></span>
                    </div>
                    <span class="opacity-50 hidden sm:inline">&bull;</span>
                    <div>
                        Plot Sizes: <strong class="text-white font-medium"><?= e($project['project_size'] ?: '100 - 500 Sq. Yards') ?></strong>
                    </div>
                </div>

                <!-- Price Chip & Legal Disclaimer -->
                <?php if (!empty($project['starting_price'])): ?>
                    <div class="text-left md:text-right space-y-1">
                        <div class="flex items-baseline md:justify-end gap-2">
                            <span class="text-[11px] uppercase tracking-wider text-slate-300">Starting Price:</span>
                            <span class="font-editorial text-2xl sm:text-3xl font-normal leading-none" :style="{ color: 'var(--theme-accent)' }">
                                <?= e($project['starting_price']) ?>
                            </span>
                        </div>
                        <span class="text-[10px] text-slate-300 block font-light opacity-80">
                            *Government stamp duty, registration charges &amp; PLC extra as applicable.
                        </span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Direct Project Downloads Strip (Brochure, Floor Plan, Payment Plan) -->
            <?php if (!empty($project['brochure_url']) || !empty($project['floor_plan_url']) || !empty($project['payment_plan_url'])): ?>
                <div class="mt-8 pt-6 border-t border-white/20 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-2.5">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/10 text-amber-300 backdrop-blur-md border border-white/15">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        <div>
                            <span class="text-[10px] uppercase tracking-[0.2em] font-semibold text-slate-300 block leading-tight">Official Project Dossier</span>
                            <span class="text-xs text-white/90 font-medium">Download verified layouts &amp; commercial schedules</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <?php if (!empty($project['brochure_url'])): ?>
                            <a href="<?= media_url($project['brochure_url']) ?>"
                               download
                               target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl backdrop-blur-md bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-400/40 text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:scale-105 shadow-md group">
                                <svg class="w-4 h-4 text-amber-300 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span>Download Brochure</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($project['floor_plan_url'])): ?>
                            <a href="<?= media_url($project['floor_plan_url']) ?>"
                               download
                               target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl backdrop-blur-md bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-400/40 text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:scale-105 shadow-md group">
                                <svg class="w-4 h-4 text-sky-300 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm4 0v14M4 11h16"/></svg>
                                <span>Download Floor Plan</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($project['payment_plan_url'])): ?>
                            <a href="<?= media_url($project['payment_plan_url']) ?>"
                               download
                               target="_blank"
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl backdrop-blur-md bg-[#9A6B2F] hover:bg-[#835722] text-white border border-[#9A6B2F]/40 text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:scale-105 shadow-md group">
                                <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Download Payment Plan</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>


    <!-- 2. STICKY TAB NAVIGATION BAR -->
    <div class="sticky top-20 z-30 backdrop-blur-xl border-b shadow-md transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-header-bg)', borderColor: 'var(--theme-border-hairline)' }">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="flex items-center space-x-6 sm:space-x-10 overflow-x-auto no-scrollbar py-4 text-xs font-semibold uppercase tracking-[0.16em]">
                <button @click="activeTab = 'overview'"
                        :style="activeTab === 'overview' ? { color: 'var(--theme-accent)', borderBottomColor: 'var(--theme-accent)' } : { color: 'var(--theme-text-secondary)' }"
                        :class="activeTab === 'overview' ? 'border-b-2 pb-2 -mb-2 font-bold' : 'hover:opacity-100 opacity-70 pb-2 -mb-2'"
                        class="transition-colors whitespace-nowrap">
                    Overview &amp; Rationale
                </button>

                <?php if (!empty($floorplans) || !empty($project['floor_plan_url']) || !empty($project['payment_plan_url']) || !empty($project['brochure_url'])): ?>
                    <button @click="activeTab = 'masterplan'"
                            :style="activeTab === 'masterplan' ? { color: 'var(--theme-accent)', borderBottomColor: 'var(--theme-accent)' } : { color: 'var(--theme-text-secondary)' }"
                            :class="activeTab === 'masterplan' ? 'border-b-2 pb-2 -mb-2 font-bold' : 'hover:opacity-100 opacity-70 pb-2 -mb-2'"
                            class="transition-colors whitespace-nowrap flex items-center gap-1.5">
                        Master Layout &amp; Plans
                    </button>
                <?php endif; ?>

                <?php if (!empty($gallery)): ?>
                    <button @click="activeTab = 'gallery'"
                            :style="activeTab === 'gallery' ? { color: 'var(--theme-accent)', borderBottomColor: 'var(--theme-accent)' } : { color: 'var(--theme-text-secondary)' }"
                            :class="activeTab === 'gallery' ? 'border-b-2 pb-2 -mb-2 font-bold' : 'hover:opacity-100 opacity-70 pb-2 -mb-2'"
                            class="transition-colors whitespace-nowrap flex items-center gap-1.5">
                        Photo Gallery (<?= count($gallery) ?>)
                    </button>
                <?php endif; ?>

                <?php if (!empty($amenities)): ?>
                    <button @click="activeTab = 'amenities'"
                            :style="activeTab === 'amenities' ? { color: 'var(--theme-accent)', borderBottomColor: 'var(--theme-accent)' } : { color: 'var(--theme-text-secondary)' }"
                            :class="activeTab === 'amenities' ? 'border-b-2 pb-2 -mb-2 font-bold' : 'hover:opacity-100 opacity-70 pb-2 -mb-2'"
                            class="transition-colors whitespace-nowrap">
                        Amenities &amp; Features
                    </button>
                <?php endif; ?>

                <button @click="activeTab = 'location'"
                        :style="activeTab === 'location' ? { color: 'var(--theme-accent)', borderBottomColor: 'var(--theme-accent)' } : { color: 'var(--theme-text-secondary)' }"
                        :class="activeTab === 'location' ? 'border-b-2 pb-2 -mb-2 font-bold' : 'hover:opacity-100 opacity-70 pb-2 -mb-2'"
                        class="transition-colors whitespace-nowrap">
                    Location &amp; Connectivity
                </button>
            </div>
        </div>
    </div>



    <!-- 3. MAIN ARCHITECTURAL CONTENT BODY & SIDEBAR DESK -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 py-16 lg:py-20 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <!-- Left 8 Columns: Dynamic Tabs Content -->
        <div class="lg:col-span-8 space-y-12">

            <!-- TAB 1: OVERVIEW -->
            <div x-show="activeTab === 'overview'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="space-y-10">

                <!-- Narrative Body -->
                <div class="p-8 sm:p-10 rounded-2xl border space-y-6 transition-colors duration-300"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Architectural Profile</span>
                    <h2 class="font-editorial text-3xl sm:text-4xl font-normal" :style="{ color: 'var(--theme-title)' }">
                        About <?= e($project['name']) ?>
                    </h2>

                    <div class="text-sm sm:text-base font-light leading-relaxed whitespace-pre-line space-y-4"
                         :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= nl2br(e($project['overview'] ?: 'Prime luxury real estate development with superior infrastructure, wide paved roads, and clear title deed registry.')) ?>
                    </div>
                </div>

                <!-- Architectural Specifications Grid -->
                <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <h3 class="font-editorial text-2xl font-normal" :style="{ color: 'var(--theme-title)' }">Key Estate Specifications</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Authority Approval</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-title)' }">
                                <?= (int)$project['mvda_approved'] === 1 ? '100% MVDA Approved' : 'Direct Freehold Clear Title' ?>
                            </span>
                        </div>

                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Registry &amp; Mutation</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-accent)' }">Immediate Freehold</span>
                        </div>

                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Available Sizes</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-title)' }">
                                <?= e($project['project_size'] ?: '100 – 350 Sq. Yds') ?>
                            </span>
                        </div>

                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Internal Boulevards</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-title)' }">40 Ft &amp; 60 Ft Paved</span>
                        </div>

                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Perimeter Security</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-title)' }">Gated 24/7 with CCTV</span>
                        </div>

                        <div class="p-4 rounded-xl border flex items-center justify-between transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="text-xs uppercase tracking-wider font-semibold" :style="{ color: 'var(--theme-subtitle)' }">Water &amp; Power</span>
                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-title)' }">Underground Infrastructure</span>
                        </div>
                    </div>
                </div>

                <!-- Video Tour Embed if available -->
                <?php if (!empty($project['hero_video_url'])): ?>
                    <div class="p-8 rounded-2xl border space-y-4 transition-colors duration-300"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Cinematic Tour</span>
                        <h3 class="font-editorial text-2xl font-normal" :style="{ color: 'var(--theme-title)' }">Video Walkthrough</h3>
                        <div class="aspect-video rounded-xl overflow-hidden bg-black border" :style="{ borderColor: 'var(--theme-border-subtle)' }">
                            <iframe src="<?= e($project['hero_video_url']) ?>" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endif; ?>

            </div>


            <!-- TAB 2: MASTER PLAN & FLOOR PLANS (WITH ZOOM LIGHTBOX & DOWNLOAD SUITE) -->
            <?php if (!empty($floorplans) || !empty($project['floor_plan_url']) || !empty($project['payment_plan_url']) || !empty($project['brochure_url'])): ?>
                <div x-show="activeTab === 'masterplan'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-8">
                    
                    <!-- Comprehensive Plans & Documentation Download Suite -->
                    <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="flex items-center justify-between border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Direct Project Downloads</span>
                                <h3 class="font-editorial text-3xl font-normal" :style="{ color: 'var(--theme-title)' }">Plans, Milestones &amp; Documentation</h3>
                            </div>
                            <span class="text-xs font-light hidden sm:inline" :style="{ color: 'var(--theme-text-muted)' }">Verified Official Documents</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Card 1: Master Floor Plan -->
                            <div class="p-6 rounded-xl border transition-all duration-300 flex flex-col justify-between space-y-4 hover:shadow-md"
                                 :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                                <div class="space-y-3">
                                    <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-500 flex items-center justify-center border border-sky-500/20 text-xl font-bold">
                                        📐
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-sky-500 block">Sanctioned Drawings</span>
                                        <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-title)' }">Master &amp; Floor Plan</h4>
                                    </div>
                                    <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                                        Official demarcated plots, sector avenue widths, green setbacks, and orientation blueprint.
                                    </p>
                                </div>
                                <?php if (!empty($project['floor_plan_url'])): ?>
                                    <a href="<?= media_url($project['floor_plan_url']) ?>" download target="_blank"
                                       class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-sky-500/15 hover:bg-sky-500/25 text-sky-600 dark:text-sky-300 border border-sky-500/30 text-xs font-semibold uppercase tracking-wider transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Download Floor Plan
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-stone-400 italic block py-2 text-center">Available on desk inquiry</span>
                                <?php endif; ?>
                            </div>

                            <!-- Card 2: Payment Plan & Schedule -->
                            <div class="p-6 rounded-xl border transition-all duration-300 flex flex-col justify-between space-y-4 hover:shadow-md"
                                 :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                                <div class="space-y-3">
                                    <div class="w-12 h-12 rounded-xl bg-sky-500/15 text-sky-600 flex items-center justify-center border border-sky-500/25 text-xl font-bold">
                                        📊
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-sky-600 block">Financial Milestones</span>
                                        <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-title)' }">Payment Plan Schedule</h4>
                                    </div>
                                    <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                                        Staged milestone breakdown, booking amount, development timelines, and bank loan eligibility.
                                    </p>
                                </div>
                                <?php if (!empty($project['payment_plan_url'])): ?>
                                    <a href="<?= media_url($project['payment_plan_url']) ?>" download target="_blank"
                                       class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-sky-500/15 hover:bg-sky-500/25 text-sky-600 border border-sky-500/30 text-xs font-semibold uppercase tracking-wider transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Download Payment Plan
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-stone-400 italic block py-2 text-center">Available on desk inquiry</span>
                                <?php endif; ?>
                            </div>

                            <!-- Card 3: Official E-Brochure -->
                            <div class="p-6 rounded-xl border transition-all duration-300 flex flex-col justify-between space-y-4 hover:shadow-md"
                                 :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                                <div class="space-y-3">
                                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center border border-amber-500/20 text-xl font-bold">
                                        📖
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-amber-500 block">Executive Portfolio</span>
                                        <h4 class="font-editorial text-xl font-normal" :style="{ color: 'var(--theme-title)' }">Project E-Brochure</h4>
                                    </div>
                                    <p class="text-xs font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                                        Comprehensive luxury dossier with connectivity analysis, site features, amenities, and developer credentials.
                                    </p>
                                </div>
                                <?php if (!empty($project['brochure_url'])): ?>
                                    <a href="<?= media_url($project['brochure_url']) ?>" download target="_blank"
                                       class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-amber-500/15 hover:bg-amber-500/25 text-amber-600 dark:text-amber-300 border border-amber-500/30 text-xs font-semibold uppercase tracking-wider transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Download Brochure
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-stone-400 italic block py-2 text-center">Available on desk inquiry</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($floorplans)): ?>
                        <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                            <div class="flex items-center justify-between border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                <div>
                                    <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Architectural Drawings</span>
                                    <h3 class="font-editorial text-3xl font-normal" :style="{ color: 'var(--theme-title)' }">Master Layout &amp; Demarcation Plans</h3>
                                </div>
                                <span class="text-xs font-light hidden sm:inline" :style="{ color: 'var(--theme-text-muted)' }">Click plan to zoom &amp; inspect</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php foreach ($floorplans as $fp): ?>
                                    <div @click="openLightbox('<?= media_url($fp['file_path']) ?>', '<?= addslashes(e($fp['caption'] ?: 'Master Plan Architectural Diagram')) ?>')"
                                         class="group cursor-pointer rounded-xl border hover:shadow-md transition-all overflow-hidden p-4 flex flex-col space-y-3"
                                         :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                                        <div class="relative aspect-[4/3] rounded-lg overflow-hidden bg-black/10 flex items-center justify-center">
                                            <img src="<?= media_url($fp['file_path']) ?>"
                                                 alt="<?= e($fp['caption'] ?: 'Master Plan') ?>"
                                                 class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                                            
                                            <!-- Overlay badge on hover -->
                                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 text-xs uppercase tracking-wider font-semibold text-white">
                                                <svg class="w-4 h-4" :style="{ color: 'var(--theme-accent)' }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                                Inspect High-Res
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h4 class="text-sm font-semibold" :style="{ color: 'var(--theme-title)' }"><?= e($fp['caption'] ?: 'Master Layout Demarcation') ?></h4>
                                                <span class="text-[11px] font-medium" :style="{ color: 'var(--theme-accent)' }">Sanctioned Architectural Plan</span>
                                            </div>
                                            <span class="text-xs font-bold" :style="{ color: 'var(--theme-accent)' }">&rarr;</span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


            <!-- TAB 3: PHOTO GALLERY -->
            <?php if (!empty($gallery)): ?>
                <div x-show="activeTab === 'gallery'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-8">
                    
                    <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="flex items-center justify-between border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                            <div>
                                <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Visual Portfolio</span>
                                <h3 class="font-editorial text-3xl font-normal" :style="{ color: 'var(--theme-title)' }">Project Gallery</h3>
                            </div>
                            <span class="text-xs font-light hidden sm:inline" :style="{ color: 'var(--theme-text-muted)' }"><?= count($gallery) ?> High-Resolution Views</span>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <?php foreach ($gallery as $gItem): ?>
                                <div @click="openLightbox('<?= media_url($gItem['file_path']) ?>', '<?= addslashes(e($gItem['caption'] ?: $project['name'])) ?>')"
                                     class="group cursor-pointer aspect-[4/3] rounded-xl overflow-hidden border hover:shadow-md transition-all relative"
                                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-card-border)' }">
                                    <img src="<?= media_url($gItem['file_path']) ?>"
                                         alt="<?= e($gItem['caption'] ?: $project['name']) ?>"
                                         loading="lazy"
                                         class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-xs text-white uppercase tracking-wider font-semibold">
                                        View
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <!-- TAB 4: AMENITIES & FEATURES -->
            <?php if (!empty($amenities)): ?>
                <div x-show="activeTab === 'amenities'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-8">
                    
                    <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                         :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                        <div class="border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                            <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Living Experience</span>
                            <h3 class="font-editorial text-3xl font-normal" :style="{ color: 'var(--theme-title)' }">Community Amenities &amp; Infrastructure</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($amenities as $am): ?>
                                <div class="flex items-center gap-3.5 p-4 rounded-xl border transition-colors shadow-xs"
                                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                                    <span class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 text-xs font-bold"
                                          :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                                        ✓
                                    </span>
                                    <span class="text-xs sm:text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                                        <?= e(trim($am)) ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <!-- TAB 5: LOCATION & CONNECTIVITY -->
            <div x-show="activeTab === 'location'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="space-y-8">
                
                <div class="p-8 rounded-2xl border space-y-6 transition-colors duration-300"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                    <div class="border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-accent)' }">Geographic Advantage</span>
                        <h3 class="font-editorial text-3xl font-normal" :style="{ color: 'var(--theme-title)' }">Strategic Location &amp; Landmark Proximity</h3>
                    </div>

                    <!-- Landmark Distance Matrix -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl border text-center shadow-xs transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="font-editorial text-2xl font-bold block" :style="{ color: 'var(--theme-title)' }">8 Mins</span>
                            <span class="text-[11px] uppercase tracking-wider font-medium mt-1 block" :style="{ color: 'var(--theme-subtitle)' }">Prem Mandir Vrindavan</span>
                        </div>
                        <div class="p-4 rounded-xl border text-center shadow-xs transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="font-editorial text-2xl font-bold block" :style="{ color: 'var(--theme-title)' }">12 Mins</span>
                            <span class="text-[11px] uppercase tracking-wider font-medium mt-1 block" :style="{ color: 'var(--theme-subtitle)' }">Yamuna Expressway Exit</span>
                        </div>
                        <div class="p-4 rounded-xl border text-center shadow-xs transition-all"
                             :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                            <span class="font-editorial text-2xl font-bold block" :style="{ color: 'var(--theme-title)' }">10 Mins</span>
                            <span class="text-[11px] uppercase tracking-wider font-medium mt-1 block" :style="{ color: 'var(--theme-subtitle)' }">Banke Bihari Temple</span>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <?php if (!empty($project['google_maps_embed'])): ?>
                        <div class="aspect-[16/9] w-full rounded-xl overflow-hidden bg-black/10 border mt-4" :style="{ borderColor: 'var(--theme-border-subtle)' }">
                            <?php if (str_starts_with($project['google_maps_embed'], 'http')): ?>
                                <iframe src="<?= e($project['google_maps_embed']) ?>" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                            <?php else: ?>
                                <?= $project['google_maps_embed'] ?>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <!-- Standard Vrindavan Map fallback -->
                        <div class="aspect-[16/9] w-full rounded-xl overflow-hidden bg-black/10 border mt-4" :style="{ borderColor: 'var(--theme-border-subtle)' }">
                            <iframe src="<?= e(company_map_embed_url()) ?>"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allowfullscreen
                                    loading="lazy"
                                    title="<?= e($project['name']) ?> Location Map"></iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>


        <!-- Right 4 Columns: Sticky Lead Inquire Desk & Direct Concierge -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Sticky Consultation Card -->
            <div id="inquiryForm" class="sticky top-32 p-7 sm:p-8 rounded-2xl border shadow-2xl space-y-6 transition-colors duration-300"
                 :style="{
                     backgroundColor: 'var(--theme-card-bg)',
                     borderColor: 'var(--theme-card-border)',
                     boxShadow: 'var(--theme-card-shadow)'
                 }">
                <div class="border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <span class="text-[11px] font-semibold uppercase tracking-[0.2em] block mb-1" :style="{ color: 'var(--theme-accent)' }">Direct Advisor Desk</span>
                    <h3 class="font-editorial text-2xl font-normal" :style="{ color: 'var(--theme-title)' }">Inquire About This Estate</h3>
                    <p class="text-xs font-light mt-1" :style="{ color: 'var(--theme-text-secondary)' }">Receive authenticated plot maps, rate sheet, and schedule a private showing.</p>
                </div>

                <form action="<?= url('/inquire') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>
                    <input type="hidden" name="project_id" value="<?= $project['id'] ?>">
                    <input type="hidden" name="return_url" value="<?= e(url('/projects/' . $project['slug'] . '#inquiryForm')) ?>">

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.14em] font-semibold mb-1.5" :style="{ color: 'var(--theme-title)' }">Your Full Name *</label>
                        <input type="text" name="name" required placeholder="Shri Rajesh Sharma"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                               class="w-full border rounded-xl px-4 py-3 text-xs focus:outline-none focus:ring-1 focus:ring-[#9A6B2F]/50 transition-colors font-medium placeholder:text-stone-400">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.14em] font-semibold mb-1.5" :style="{ color: 'var(--theme-title)' }">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 9871731303"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                               class="w-full border rounded-xl px-4 py-3 text-xs focus:outline-none focus:ring-1 focus:ring-[#9A6B2F]/50 transition-colors font-mono font-medium placeholder:text-stone-400">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.14em] font-semibold mb-1.5" :style="{ color: 'var(--theme-title)' }">Email Address</label>
                        <input type="email" name="email" placeholder="client@example.com"
                               :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                               class="w-full border rounded-xl px-4 py-3 text-xs focus:outline-none focus:ring-1 focus:ring-[#9A6B2F]/50 transition-colors font-medium placeholder:text-stone-400">
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.14em] font-semibold mb-1.5" :style="{ color: 'var(--theme-title)' }">Estimated Budget</label>
                        <select name="budget_range"
                                :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                class="w-full border rounded-xl px-4 py-3 text-xs focus:outline-none focus:ring-1 focus:ring-[#9A6B2F]/50 transition-colors font-medium [&>option]:bg-white [&>option]:text-stone-900 dark:[&>option]:bg-stone-900 dark:[&>option]:text-white">
                            <option value="₹ 25L - ₹ 50L">₹ 25 Lakhs – ₹ 50 Lakhs</option>
                            <option value="₹ 50L - ₹ 1 Cr">₹ 50 Lakhs – ₹ 1 Crore</option>
                            <option value="₹ 1 Cr - ₹ 2.5 Cr">₹ 1 Crore – ₹ 2.5 Crores</option>
                            <option value="₹ 2.5 Cr+">₹ 2.5 Crores+</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[11px] uppercase tracking-[0.14em] font-semibold mb-1.5" :style="{ color: 'var(--theme-title)' }">Specific Query / Preferred Visit Date</label>
                        <textarea name="message" rows="3" placeholder="Please send authenticated demarcation map & available corner plots..."
                                  :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-card-border)', color: 'var(--theme-text-primary)' }"
                                  class="w-full border rounded-xl px-4 py-3 text-xs focus:outline-none focus:ring-1 focus:ring-[#9A6B2F]/50 transition-colors font-medium placeholder:text-stone-400"></textarea>
                    </div>

                    <button type="submit"
                            :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }"
                            class="w-full py-3.5 rounded-xl font-semibold text-xs uppercase tracking-[0.18em] transition-all duration-300 shadow-md hover:opacity-95 hover:scale-[1.01]">
                        Inquire For Exclusive Details &rarr;
                    </button>
                </form>

                <!-- Direct Concierge Links -->
                <div class="pt-4 border-t space-y-2.5 text-center" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <span class="text-[11px] uppercase tracking-wider block" :style="{ color: 'var(--theme-text-muted)' }">Immediate Concierge Desk</span>
                    <div class="space-y-1">
                        <a href="tel:+919871731303" class="text-sm font-mono font-bold hover:underline transition-colors block" :style="{ color: 'var(--theme-title)' }">
                            📞 +91 9871731303
                        </a>
                        <a href="tel:+917409767452" class="text-sm font-mono font-bold hover:underline transition-colors block" :style="{ color: 'var(--theme-title)' }">
                            📞 +91 7409767452
                        </a>
                    </div>
                    <a href="https://wa.me/919871731303?text=Hello%20Gleamrealty%2C%20I%20am%20inquiring%20about%20<?= urlencode($project['name']) ?>."
                       target="_blank"
                       class="inline-flex items-center justify-center gap-1.5 text-xs text-[#25D366] hover:underline font-medium">
                        Chat on WhatsApp Concierge &rarr;
                    </a>
                </div>

                <!-- Project Documentation Direct Downloads -->
                <?php if (!empty($project['brochure_url']) || !empty($project['floor_plan_url']) || !empty($project['payment_plan_url'])): ?>
                    <div class="pt-4 border-t space-y-2.5" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] block" :style="{ color: 'var(--theme-accent)' }">
                            Official Downloads
                        </span>

                        <?php if (!empty($project['brochure_url'])): ?>
                            <a href="<?= media_url($project['brochure_url']) ?>"
                               target="_blank"
                               download
                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                               class="w-full inline-flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition-all hover:scale-[1.01] hover:opacity-90 shadow-2xs group">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Download Brochure
                                </span>
                                <span class="text-[10px] text-amber-500 font-bold group-hover:translate-y-0.5 transition-transform">&darr;</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($project['floor_plan_url'])): ?>
                            <a href="<?= media_url($project['floor_plan_url']) ?>"
                               target="_blank"
                               download
                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                               class="w-full inline-flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition-all hover:scale-[1.01] hover:opacity-90 shadow-2xs group">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm4 0v14M4 11h16"/></svg>
                                    Download Floor Plan
                                </span>
                                <span class="text-[10px] text-sky-500 font-bold group-hover:translate-y-0.5 transition-transform">&darr;</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($project['payment_plan_url'])): ?>
                            <a href="<?= media_url($project['payment_plan_url']) ?>"
                               target="_blank"
                               download
                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                               class="w-full inline-flex items-center justify-between px-3.5 py-2.5 rounded-xl border text-xs font-semibold uppercase tracking-wider transition-all hover:scale-[1.01] hover:opacity-90 shadow-2xs group">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Download Payment Plan
                                </span>
                                <span class="text-[10px] text-amber-600 font-bold group-hover:translate-y-0.5 transition-transform">&darr;</span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>


    <!-- 4. SIMILAR ESTATES IN BRAJ (RELATED PROJECTS) -->
    <?php if (!empty($relatedProjects)): ?>
        <section class="py-24 px-6 sm:px-8 border-t transition-colors duration-300"
                 :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-12 border-b pb-4" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                    <div>
                        <span class="text-[11px] font-semibold uppercase tracking-[0.24em] block" :style="{ color: 'var(--theme-section-alt-accent)' }">Curated Alternatives</span>
                        <h3 class="font-editorial text-3xl sm:text-4xl font-normal" :style="{ color: 'var(--theme-section-alt-title)' }">Similar Estates in Braj</h3>
                    </div>
                    <a href="<?= url('/') ?>" class="text-xs font-semibold uppercase tracking-wider hover:underline transition-colors" :style="{ color: 'var(--theme-section-alt-accent)' }">
                        View All Estates &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php foreach ($relatedProjects as $rel): ?>
                        <?php $relHero = \App\Models\Project::getHeroImage((int) $rel['id']); ?>
                        <div class="group flex flex-col rounded-2xl border transition-all duration-300 overflow-hidden shadow-lg hover:shadow-2xl"
                             :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-section-card-border)' }">
                            <div class="relative aspect-[16/10] overflow-hidden bg-black/10">
                                <img src="<?= media_url($relHero) ?>"
                                     alt="<?= e($rel['name']) ?>"
                                     class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute top-3 left-3">
                                    <span :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-section-card-border)' }"
                                          class="px-2.5 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider border shadow-xs">
                                        <?= e($rel['project_type']) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                                <div>
                                    <span class="text-[11px] font-medium block mb-1" :style="{ color: 'var(--theme-section-alt-accent)' }"><?= e($rel['location']) ?></span>
                                    <h4 class="font-editorial text-2xl font-normal transition-colors" :style="{ color: 'var(--theme-section-card-title)' }">
                                        <a href="<?= url('/projects/' . $rel['slug']) ?>"><?= e($rel['name']) ?></a>
                                    </h4>
                                </div>

                                <!-- Quick Document Downloads -->
                                <div class="grid grid-cols-3 gap-1.5 pt-3 border-t text-[10px] uppercase tracking-wider font-bold" :style="{ borderColor: 'var(--theme-section-card-border)' }">
                                    <?php if (!empty($rel['brochure_url'])): ?>
                                        <a href="<?= media_url($rel['brochure_url']) ?>" download target="_blank"
                                           class="py-1.5 px-1 rounded-md border text-center truncate font-bold text-[#0369A1] bg-[#E0F2FE] border-[#BAE6FD] hover:bg-[#BAE6FD] hover:text-[#0284C7] shadow-2xs hover:shadow-xs transition-all"
                                           title="Download Brochure">
                                            Brochure &darr;
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($rel['floor_plan_url'])): ?>
                                        <a href="<?= media_url($rel['floor_plan_url']) ?>" download target="_blank"
                                           class="py-1.5 px-1 rounded-md border text-center truncate font-bold text-[#0369A1] bg-[#E0F2FE] border-[#BAE6FD] hover:bg-[#BAE6FD] hover:text-[#0284C7] shadow-2xs hover:shadow-xs transition-all"
                                           title="Download Floor Plan">
                                            Floor Plan &darr;
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($rel['payment_plan_url'])): ?>
                                        <a href="<?= media_url($rel['payment_plan_url']) ?>" download target="_blank"
                                           class="py-1.5 px-1 rounded-md border text-center truncate font-bold text-[#0369A1] bg-[#E0F2FE] border-[#BAE6FD] hover:bg-[#BAE6FD] hover:text-[#0284C7] shadow-2xs hover:shadow-xs transition-all"
                                           title="Download Payment Plan">
                                            Payment &darr;
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="pt-3 border-t flex items-center justify-between" :style="{ borderColor: 'var(--theme-section-card-border)' }">
                                    <span class="text-xs font-mono font-medium" :style="{ color: 'var(--theme-section-card-text)' }"><?= e($rel['starting_price'] ?: 'Verified Plots') ?></span>
                                    <a href="<?= url('/projects/' . $rel['slug']) ?>" class="text-xs font-semibold uppercase tracking-wider hover:underline" :style="{ color: 'var(--theme-section-alt-accent)' }">
                                        Explore &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- 5. LIGHTBOX MODAL (ALPINE.JS) -->
    <div x-show="lightboxOpen"
         x-cloak
         @keydown.escape.window="lightboxOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 sm:p-8 backdrop-blur-xl"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <!-- Close Button -->
        <button @click="lightboxOpen = false"
                class="absolute top-6 right-6 text-slate-400 hover:text-white p-2 rounded-full bg-[#141414] border border-gold-hairline transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Image and Caption Container -->
        <div class="max-w-6xl max-h-[85vh] flex flex-col items-center justify-center space-y-4" @click.outside="lightboxOpen = false">
            <img :src="lightboxSrc" :alt="lightboxCaption"
                 class="max-w-full max-h-[75vh] object-contain rounded-xl border border-gold-hairline shadow-2xl">
            <p x-show="lightboxCaption" x-text="lightboxCaption" class="text-sm font-editorial text-[#E6D5B8] tracking-wide text-center"></p>
        </div>
    </div>

</div>
