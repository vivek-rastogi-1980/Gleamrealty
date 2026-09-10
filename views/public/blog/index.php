<!-- Editorial Blog & Market Intelligence Index -->
<div class="pt-24 pb-20">

    <!-- Hero Header -->
    <section class="relative py-16 sm:py-20 border-b overflow-hidden"
             :style="{
                 backgroundColor: 'var(--theme-section-alt-bg)',
                 borderColor: 'var(--theme-border-hairline)'
             }">
        <!-- Subtle Glow Effect -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-[300px] rounded-full blur-3xl pointer-events-none opacity-20"
             :style="{ backgroundColor: 'var(--theme-accent)' }"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10 text-center">
            <!-- Eyebrow Badge -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-[0.2em] mb-4 section-alt-badge">
                <span class="w-1.5 h-1.5 rounded-full" style="background-color: var(--theme-accent);"></span>
                <span>Braj Real Estate Intelligence &bull; Gleamrealty Editorial</span>
            </div>

            <h1 class="font-editorial text-3xl sm:text-5xl lg:text-6xl font-light tracking-tight mb-4"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Market Insights &amp; Advisory Guides
            </h1>

            <p class="max-w-2xl mx-auto text-sm sm:text-base leading-relaxed opacity-85"
               :style="{ color: 'var(--theme-section-alt-text)' }">
                Authoritative research on Vrindavan Master Plan 2031, MVDA legal due diligence, circle rate dynamics, and strategic infrastructure corridors across the sacred Braj region.
            </p>

            <!-- Search Bar -->
            <div class="mt-8 max-w-xl mx-auto">
                <form method="GET" action="<?= url('/blog') ?>" class="relative flex items-center">
                    <?php if (!empty($selectedCategory)): ?>
                        <input type="hidden" name="category" value="<?= e($selectedCategory) ?>">
                    <?php endif; ?>
                    <input type="text" name="q" value="<?= e($searchQuery ?? '') ?>"
                           placeholder="Search analyses, legal guides, circle rates..."
                           class="w-full pl-11 pr-24 py-3.5 rounded-full text-xs font-medium border shadow-lg focus:outline-none transition-all"
                           :style="{
                               backgroundColor: 'var(--theme-card-bg)',
                               borderColor: 'var(--theme-border-subtle)',
                               color: 'var(--theme-title)'
                           }">
                    <svg class="w-4 h-4 absolute left-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    
                    <button type="submit"
                            class="absolute right-2 px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider shadow-sm transition-all"
                            :style="{
                                backgroundColor: 'var(--theme-btn-pri-bg)',
                                color: 'var(--theme-btn-pri-text)'
                            }">
                        Search
                    </button>
                </form>
            </div>

            <!-- Category Pills -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-2">
                <a href="<?= url('/blog') ?>"
                   class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-all border <?= empty($selectedCategory) ? 'shadow-md font-bold' : 'opacity-70 hover:opacity-100' ?>"
                   :style="{
                       backgroundColor: <?= empty($selectedCategory) ? "'var(--theme-btn-pri-bg)'" : "'var(--theme-card-bg)'" ?>,
                       color: <?= empty($selectedCategory) ? "'var(--theme-btn-pri-text)'" : "'var(--theme-title)'" ?>,
                       borderColor: 'var(--theme-border-subtle)'
                   }">
                    All Articles (<?= $totalCount ?>)
                </a>

                <?php foreach ($categories as $cat): ?>
                    <a href="<?= url('/blog?category=' . urlencode($cat)) ?>"
                       class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-all border <?= ($selectedCategory ?? '') === $cat ? 'shadow-md font-bold' : 'opacity-70 hover:opacity-100' ?>"
                       :style="{
                           backgroundColor: <?= ($selectedCategory ?? '') === $cat ? "'var(--theme-btn-pri-bg)'" : "'var(--theme-card-bg)'" ?>,
                           color: <?= ($selectedCategory ?? '') === $cat ? "'var(--theme-btn-pri-text)'" : "'var(--theme-title)'" ?>,
                           borderColor: 'var(--theme-border-subtle)'
                       }">
                        <?= e($cat) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Main Content Stream -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 mt-12 sm:mt-16">

        <!-- Active Filter Indicator -->
        <?php if (!empty($selectedCategory) || !empty($searchQuery)): ?>
            <div class="mb-8 flex items-center justify-between p-4 rounded-xl border"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-subtle)' }">
                <div class="text-xs">
                    Showing results for
                    <?php if (!empty($selectedCategory)): ?>
                        Category: <strong :style="{ color: 'var(--theme-title)' }">"<?= e($selectedCategory) ?>"</strong>
                    <?php endif; ?>
                    <?php if (!empty($searchQuery)): ?>
                        Query: <strong :style="{ color: 'var(--theme-title)' }">"<?= e($searchQuery) ?>"</strong>
                    <?php endif; ?>
                </div>
                <a href="<?= url('/blog') ?>" class="text-xs font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400 hover:underline">
                    Clear Filters ✕
                </a>
            </div>
        <?php endif; ?>

        <!-- Featured Spotlight Card (Only on clean index view) -->
        <?php if (!empty($featured)): ?>
            <div class="mb-14 sm:mb-16">
                <a href="<?= url('/blog/' . $featured['slug']) ?>"
                   class="group block rounded-2xl sm:rounded-3xl border overflow-hidden shadow-xl transition-all duration-300 hover:shadow-2xl"
                   :style="{
                       backgroundColor: 'var(--theme-card-bg)',
                       borderColor: 'var(--theme-border-subtle)'
                   }">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                        <!-- Image Cover -->
                        <div class="lg:col-span-7 relative h-72 sm:h-96 lg:h-[420px] overflow-hidden">
                            <img src="<?= asset(!empty($featured['featured_image']) ? $featured['featured_image'] : 'uploads/pages/residential-plots-in-vrindavan.jpeg') ?>"
                                 alt="<?= e($featured['title']) ?>"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 loading="eager">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider text-slate-950 bg-amber-400 shadow-md">
                                    ★ Featured Spotlight
                                </span>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="lg:col-span-5 p-6 sm:p-10 flex flex-col justify-between">
                            <div class="space-y-3 sm:space-y-4">
                                <div class="flex items-center gap-3 text-xs opacity-75">
                                    <span class="font-bold uppercase tracking-wider" :style="{ color: 'var(--theme-accent)' }">
                                        <?= e($featured['category']) ?>
                                    </span>
                                    <span>&bull;</span>
                                    <span><?= e($featured['read_time'] ?: '5 min read') ?></span>
                                </div>

                                <h2 class="font-editorial text-2xl sm:text-3xl font-light leading-snug group-hover:underline"
                                    :style="{ color: 'var(--theme-title)' }">
                                    <?= e($featured['title']) ?>
                                </h2>

                                <p class="text-xs sm:text-sm leading-relaxed opacity-80 line-clamp-4"
                                   :style="{ color: 'var(--theme-text-primary)' }">
                                    <?= e($featured['excerpt']) ?>
                                </p>
                            </div>

                            <div class="pt-6 mt-6 border-t flex items-center justify-between text-xs"
                                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs"
                                         :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                                        GR
                                    </div>
                                    <div>
                                        <div class="font-semibold" :style="{ color: 'var(--theme-title)' }"><?= e($featured['author'] ?: 'Gleamrealty Desk') ?></div>
                                        <div class="text-[11px] opacity-60"><?= date('F j, Y', strtotime($featured['published_at'] ?? $featured['created_at'])) ?></div>
                                    </div>
                                </div>

                                <span class="inline-flex items-center gap-1.5 font-bold uppercase tracking-wider text-[11px] group-hover:translate-x-1 transition-transform"
                                      :style="{ color: 'var(--theme-accent)' }">
                                    <span>Read Analysis</span>
                                    <span>&rarr;</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <!-- Articles Grid -->
        <?php if (empty($articles) && empty($featured)): ?>
            <div class="text-center py-20 rounded-2xl border"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-border-subtle)' }">
                <div class="w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4 opacity-40"
                     :style="{ backgroundColor: 'var(--theme-btn-pri-bg)' }">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-lg font-bold mb-1" :style="{ color: 'var(--theme-title)' }">No articles found</h3>
                <p class="text-xs opacity-75 max-w-sm mx-auto mb-6">No published articles match your active filter criteria. Try browsing all categories.</p>
                <a href="<?= url('/blog') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider"
                   :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                    Browse All Insights
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($articles as $post): ?>
                    <article class="group flex flex-col rounded-2xl border overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                             :style="{
                                 backgroundColor: 'var(--theme-card-bg)',
                                 borderColor: 'var(--theme-border-subtle)'
                             }">
                        <!-- Cover Image -->
                        <a href="<?= url('/blog/' . $post['slug']) ?>" class="relative h-52 overflow-hidden block">
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

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="flex items-center gap-2 text-[11px] opacity-70">
                                    <span><?= date('M j, Y', strtotime($post['published_at'] ?? $post['created_at'])) ?></span>
                                    <span>&bull;</span>
                                    <span><?= e($post['read_time'] ?: '5 min read') ?></span>
                                </div>

                                <h3 class="font-editorial text-xl font-light leading-snug group-hover:underline line-clamp-2"
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
                                    By <?= e($post['author'] ?: 'Gleamrealty Desk') ?>
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
        <?php endif; ?>

    </div>

    <!-- Bottom Advisory Banner Strip -->
    <section class="mt-20 max-w-7xl mx-auto px-6 sm:px-8">
        <div class="rounded-3xl p-8 sm:p-12 border relative overflow-hidden shadow-2xl"
             :style="{
                 backgroundColor: 'var(--theme-section-alt-bg)',
                 borderColor: 'var(--theme-border-subtle)'
             }">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-3">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] section-alt-badge">
                        Private Client Desk &bull; Confidential Showing
                    </span>
                    <h3 class="font-editorial text-2xl sm:text-4xl font-light"
                        :style="{ color: 'var(--theme-section-alt-title)' }">
                        Need Bespoke Advisory for Your Family's Braj Estate?
                    </h3>
                    <p class="text-xs sm:text-sm leading-relaxed max-w-2xl opacity-85"
                       :style="{ color: 'var(--theme-section-alt-text)' }">
                        Connect directly with our senior acquisition partners for MVDA registry verification, circle rate audits, and priority site showing of premier plotted sanctuaries across Vrindavan &amp; Mathura.
                    </p>
                    <div class="pt-2 text-xs font-mono opacity-80" :style="{ color: 'var(--theme-accent)' }">
                        Office: Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-end">
                    <button @click="vipModalOpen = true"
                            type="button"
                            class="w-full text-center py-3.5 px-6 rounded-xl text-xs font-bold uppercase tracking-[0.14em] shadow-lg transition-all hover:scale-102"
                            :style="{
                                backgroundColor: 'var(--theme-btn-pri-bg)',
                                color: 'var(--theme-btn-pri-text)'
                            }">
                        Request VIP Consultation
                    </button>
                    <a href="tel:+919871731303"
                       class="w-full text-center py-3.5 px-6 rounded-xl text-xs font-bold uppercase tracking-[0.14em] border transition-all hover:bg-white/5"
                       :style="{
                           borderColor: 'var(--theme-border-subtle)',
                           color: 'var(--theme-section-alt-title)'
                       }">
                        Call +91 9871731303
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
