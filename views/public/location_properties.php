<!-- ==========================================================
     LOCATION PROPERTIES SHOWCASE: <?= strtoupper($cityName) ?>
     Curated MVDA & RERA Approved Estates Portfolio
     ========================================================== -->

<!-- Hero Showcase Banner for <?= $cityName ?> -->
<section class="relative min-h-[54vh] lg:min-h-[62vh] flex items-center justify-center border-b pt-32 pb-20 px-6 sm:px-8 overflow-hidden bg-stone-950 transition-colors"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Atmospheric Photography -->
    <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
        <img src="<?= $coverImage ?>"
             alt="Luxury Estates in <?= e($cityName) ?>"
             class="w-full h-full object-cover object-center scale-105 filter brightness-[0.42] contrast-[1.08] transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/75 to-stone-950/40"></div>
        <div class="absolute inset-0 bg-black/35"></div>
    </div>

    <!-- Directional Light Halos -->
    <div class="absolute -top-32 left-1/4 w-[600px] h-[500px] rounded-full blur-[140px] pointer-events-none -z-10 opacity-30"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto text-center space-y-6">
        
        <!-- Breadcrumbs & Eyebrow Pill -->
        <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold tracking-[0.2em] uppercase">
            <a href="<?= url('/') ?>" class="text-stone-300 hover:text-white transition-colors">Home</a>
            <span class="text-amber-500/60">&bull;</span>
            <span class="text-stone-300">Communities</span>
            <span class="text-amber-500/60">&bull;</span>
            <span class="text-amber-400 font-bold"><?= e($cityName) ?></span>
        </div>

        <!-- Grand City Showcase Title -->
        <h1 class="font-editorial text-3xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-white leading-[1.12] drop-shadow-[0_4px_18px_rgba(0,0,0,0.85)]">
            <?= e($headline) ?>
        </h1>

        <!-- Subheading -->
        <p class="text-sm sm:text-base lg:text-lg max-w-3xl mx-auto font-light leading-relaxed text-stone-200 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
            <?= e($tagline) ?>
        </p>

        <!-- Trust Guarantees Bar -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 pt-2">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-stone-900/80 backdrop-blur-md border border-white/20 text-white shadow-lg">
                <span class="w-2 h-2 rounded-full bg-[#9A6B2F]"></span>
                100% MVDA &amp; RERA Approved
            </span>
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-semibold uppercase tracking-wider bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-lg">
                ✦ Immediate Freehold Registry
            </span>
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-semibold uppercase tracking-wider bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-lg">
                Zero Brokerage Direct
            </span>
        </div>

        <!-- Call to Action Buttons -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-3">
            <a href="#properties-grid"
               class="btn-bronze inline-flex items-center justify-center gap-2 px-6 py-3 rounded-md text-xs font-bold uppercase tracking-[0.14em] shadow-lg hover:shadow-xl transition-all">
                <span>Explore <?= e($cityName) ?> Estates</span>
                <span class="text-sm">&darr;</span>
            </a>
            <button type="button" @click="vipModalOpen = true"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-md text-xs font-bold uppercase tracking-[0.14em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                <span>Request Site Visit</span>
                <span class="text-amber-400">&rarr;</span>
            </button>
            <?php if (function_exists('auth_user') && auth_user()): ?>
                <a href="<?= url('/admin/pages/' . ($page['id'] ?? 11) . '/edit') ?>"
                   target="_blank"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-md text-xs font-semibold uppercase tracking-wider bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Edit Page in Admin</span>
                </a>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- Editorial Narrative Section -->
<?php if (!empty($editorial)): ?>
<section class="py-12 sm:py-16 px-6 sm:px-8 border-b transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-4xl mx-auto prose prose-sm sm:prose-base leading-relaxed text-center"
         :style="{ color: 'var(--theme-text-secondary)' }">
        <?= $editorial ?>
    </div>
</section>
<?php endif; ?>

<!-- 4 Key Location Highlights Matrix -->
<section class="py-12 px-6 sm:px-8 border-b transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $locSections = \App\Models\Setting::get('location_vrindavan_sections', []);
            foreach ($highlights as $i => $h): 
                $idx = $i + 1;
                $displayTitle = ($city === 'vrindavan' && !empty($locSections["highlight_{$idx}_title"])) ? $locSections["highlight_{$idx}_title"] : $h['title'];
                $displayDesc = ($city === 'vrindavan' && !empty($locSections["highlight_{$idx}_desc"])) ? $locSections["highlight_{$idx}_desc"] : $h['desc'];
            ?>
                <div class="p-5 rounded-2xl border backdrop-blur-md space-y-1.5 shadow-sm transition-all hover:-translate-y-0.5"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <span class="text-xs font-bold uppercase tracking-wider flex items-center gap-2"
                          :style="{ color: 'var(--theme-accent)' }">
                        <span class="w-1.5 h-1.5 rounded-full" :style="{ backgroundColor: 'var(--theme-accent)' }"></span>
                        <?= e($displayTitle) ?>
                    </span>
                    <p class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($displayDesc) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Properties Portfolio Grid Section -->
<section id="properties-grid" x-data="{ activeFilter: 'all' }"
         class="py-20 sm:py-24 px-6 sm:px-8 transition-colors"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <!-- Header & Category Filters Bar -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b pb-6"
             :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <div>
                <span class="text-[11px] font-bold uppercase tracking-[0.24em] block mb-1"
                      :style="{ color: 'var(--theme-accent)' }">
                    Verified Portfolio &bull; <?= strtoupper($cityName) ?>
                </span>
                <h2 class="font-editorial text-2xl sm:text-4xl font-normal tracking-tight"
                    :style="{ color: 'var(--theme-title)' }">
                    Available Estates in <?= e($cityName) ?>
                </h2>
                <p class="text-xs sm:text-sm font-light mt-1" :style="{ color: 'var(--theme-text-secondary)' }">
                    Displaying <?= count($projects) ?> pre-vetted residential plots, villas, and commercial spaces ready for registry.
                </p>
            </div>


        </div>

        <!-- Properties Grid Display -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($projects)): ?>
                <!-- Empty State -->
                <div class="col-span-full py-20 text-center rounded-3xl border p-8 space-y-4"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="w-16 h-16 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center mx-auto text-2xl">
                        📍
                    </div>
                    <h3 class="text-lg font-bold font-serif" :style="{ color: 'var(--theme-title)' }">
                        New Pre-Launches Coming Soon to <?= e($cityName) ?>
                    </h3>
                    <p class="text-xs sm:text-sm max-w-md mx-auto" :style="{ color: 'var(--theme-text-secondary)' }">
                        Our acquisitions desk is currently surveying select freehold parcels in this sector. Contact our concierge desk for priority pre-launch access.
                    </p>
                    <button @click="vipModalOpen = true"
                            :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-xs uppercase font-bold tracking-wider hover:opacity-90 shadow-md">
                        Inquire for <?= e($cityName) ?> Pre-Launches
                    </button>
                </div>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                    <?php 
                        $heroImg = \App\Models\Project::getHeroImage((int) $project['id']);
                        $heroImgUrl = $heroImg ? media_url($heroImg) : asset('uploads/projects/hero-preview.jpg');
                        $pType = $project['project_type'] ?? 'Luxury Villas';
                    ?>
                    <article x-show="activeFilter === 'all' || activeFilter === '<?= e($pType) ?>'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="group rounded-3xl overflow-hidden border transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-between shadow-md hover:shadow-2xl"
                             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                        
                        <!-- Image Container with Aspect Ratio -->
                        <div class="relative aspect-[16/11] overflow-hidden bg-stone-950">
                            <img src="<?= $heroImgUrl ?>"
                                 alt="<?= e($project['name']) ?>"
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
                            
                            <!-- Atmospheric Gradient Scrim -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent"></div>

                            <!-- Top Badges -->
                            <div class="absolute top-4 left-4 right-4 flex items-center justify-between z-10">
                                <?php if (!empty($project['mvda_approved'])): ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-md bg-black/70 text-amber-300 border border-amber-400/30 shadow-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                        MVDA Approved
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-md bg-stone-950/80 text-white border border-white/20 shadow-md">
                                        Freehold Title
                                    </span>
                                <?php endif; ?>

                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider backdrop-blur-md bg-black/60 text-amber-300 border border-amber-400/30 shadow-md">
                                    <?= e($pType) ?>
                                </span>
                            </div>

                            <!-- Bottom Image Overlay: Price Tag -->
                            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between z-10">
                                <div>
                                    <span class="text-[10px] uppercase tracking-widest text-stone-300 font-medium block">Starting Price</span>
                                    <span class="text-sm sm:text-base font-mono font-bold text-amber-300 drop-shadow">
                                        <?= e($project['starting_price']) ?>
                                    </span>
                                </div>
                                <?php if (!empty($project['project_size'])): ?>
                                    <span class="text-[11px] text-white/90 font-light bg-black/60 px-2.5 py-1 rounded-md backdrop-blur-md border border-white/10">
                                        <?= e($project['project_size']) ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 sm:p-7 space-y-4 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <!-- Location Pin -->
                                <p class="text-xs uppercase tracking-wider font-semibold flex items-center gap-1.5"
                                   :style="{ color: 'var(--theme-accent)' }">
                                    <span>📍</span>
                                    <span><?= e($project['location']) ?></span>
                                </p>

                                <!-- Title -->
                                <h3 class="font-editorial text-xl sm:text-2xl font-medium transition-colors leading-snug group-hover:text-amber-500"
                                    :style="{ color: 'var(--theme-title)' }">
                                    <a href="<?= url('/projects/' . $project['slug']) ?>">
                                        <?= e($project['name']) ?>
                                    </a>
                                </h3>

                                <!-- Description / Tagline -->
                                <p class="text-xs sm:text-sm font-light leading-relaxed line-clamp-2"
                                   :style="{ color: 'var(--theme-text-secondary)' }">
                                    <?= e($project['tagline'] ?: $project['overview']) ?>
                                </p>
                            </div>

                            <!-- 3 Direct Downloads Strip (Brochure, Floor Plan, Payment Plan) -->
                            <?php if (!empty($project['brochure_url']) || !empty($project['floor_plan_url']) || !empty($project['payment_plan_url'])): ?>
                                <div class="pt-3 border-t space-y-1.5" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                    <div class="flex items-center justify-between text-[10px] uppercase tracking-[0.16em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                                        <span>Direct Downloads</span>
                                        <span class="opacity-70 text-[9px]">Verified PDF</span>
                                    </div>
                                    <div class="grid grid-cols-3 gap-1.5 text-center text-[10px] uppercase tracking-wider font-semibold">
                                        <?php if (!empty($project['brochure_url'])): ?>
                                            <a href="<?= media_url($project['brochure_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Brochure">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-amber-500 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                <span class="truncate">Brochure</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($project['floor_plan_url'])): ?>
                                            <a href="<?= media_url($project['floor_plan_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Floor Plan">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-sky-500 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm4 0v14M4 11h16"/></svg>
                                                <span class="truncate">Floor Plan</span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($project['payment_plan_url'])): ?>
                                            <a href="<?= media_url($project['payment_plan_url']) ?>" download target="_blank"
                                               class="py-1.5 px-1 rounded-lg border flex items-center justify-center gap-1 transition-all hover:scale-[1.02] shadow-2xs hover:shadow-xs group/btn"
                                               :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)', color: 'var(--theme-title)' }"
                                               title="Download Payment Plan">
                                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-amber-600 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span class="truncate">Payment</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Dual Actions -->
                            <div class="pt-4 border-t flex items-center justify-between gap-3"
                                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                <a href="<?= url('/projects/' . $project['slug']) ?>"
                                   :style="{ color: 'var(--theme-accent)' }"
                                   class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider hover:underline">
                                    <span>View Dossier</span>
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>

                                <button type="button"
                                        @click="vipModalOpen = true"
                                        :style="{ backgroundColor: 'var(--theme-btn-sec-bg)', color: 'var(--theme-btn-sec-text)', borderColor: 'var(--theme-btn-sec-border)' }"
                                        class="px-4 py-2 rounded-full border text-[11px] font-semibold uppercase tracking-wider transition-all hover:scale-102 shadow-xs">
                                    Site Visit
                                </button>
                            </div>
                        </div>

                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Cross-Location Switcher Banner -->
        <div class="p-8 sm:p-10 rounded-3xl border flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl transition-all"
             :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
            <div class="space-y-1 text-center md:text-left">
                <span class="text-xs uppercase tracking-[0.2em] font-semibold" :style="{ color: 'var(--theme-accent)' }">
                    Dual Sacred Corridor Exploration
                </span>
                <h3 class="font-editorial text-xl sm:text-2xl font-bold" :style="{ color: 'var(--theme-title)' }">
                    Also Exploring <?= e($otherCity) ?> Real Estate?
                </h3>
                <p class="text-xs sm:text-sm font-light max-w-xl" :style="{ color: 'var(--theme-text-secondary)' }">
                    Discover handpicked approved residential plots and turnkey estates across <?= e($otherCity) ?>.
                </p>
            </div>
            
            <a href="<?= e($otherCityUrl) ?>"
               :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }"
               class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 hover:opacity-95 shadow-md shrink-0">
                <span>View <?= e($otherCity) ?> Properties</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

    </div>
</section>
