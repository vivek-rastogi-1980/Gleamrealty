<div class="max-w-6xl mx-auto space-y-6 pb-20" x-data="{ activeTab: 'metrics' }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-amber-400 shadow-md shadow-amber-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">Homepage Content CMS</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Edit all homepage sections below the hero: Trust Metrics, Heritage Advisory, Asset Showcase Cards, Portfolios, and Consultation Desk.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Site</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="homeSectionsForm"
                    class="px-5 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </div>

    <!-- Navigation Pills / Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-800/80">
        <button type="button" @click="activeTab = 'metrics'"
                :class="activeTab === 'metrics' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            1. Trust Metrics Ribbon
        </button>
        <button type="button" @click="activeTab = 'philosophy'"
                :class="activeTab === 'philosophy' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            2. Sanctity of Braj &amp; Advisory
        </button>
        <button type="button" @click="activeTab = 'assets'"
                :class="activeTab === 'assets' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            3. Asset Classes (Commercial, Vila, Plot, Flat)
        </button>
        <button type="button" @click="activeTab = 'sections'"
                :class="activeTab === 'sections' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            4. Projects, Locations &amp; Consultation
        </button>
    </div>

    <!-- Form -->
    <form id="homeSectionsForm" action="<?= url('/admin/home') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- ============================================================
             TAB 1: TRUST & PERFORMANCE METRICS RIBBON (POST-HERO)
             ============================================================ -->
        <div x-show="activeTab === 'metrics'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Trust &amp; Performance Metrics Ribbon (Positioned Directly Below Hero)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        These 4 key performance metrics appear across all device screens with custom icons and theme-adaptive styling.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Metric 1 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                        <div class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                            <span>✦ Metric 1</span>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Value</label>
                            <input type="text" name="m1_val" value="<?= e($sections['metrics']['m1_val']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Top Label</label>
                            <input type="text" name="m1_title" value="<?= e($sections['metrics']['m1_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Bottom Label</label>
                            <input type="text" name="m1_sub" value="<?= e($sections['metrics']['m1_sub']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Metric 2 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                        <div class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                            <span>✦ Metric 2</span>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Value</label>
                            <input type="text" name="m2_val" value="<?= e($sections['metrics']['m2_val']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Top Label</label>
                            <input type="text" name="m2_title" value="<?= e($sections['metrics']['m2_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Bottom Label</label>
                            <input type="text" name="m2_sub" value="<?= e($sections['metrics']['m2_sub']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Metric 3 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                        <div class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                            <span>✦ Metric 3</span>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Value</label>
                            <input type="text" name="m3_val" value="<?= e($sections['metrics']['m3_val']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Top Label</label>
                            <input type="text" name="m3_title" value="<?= e($sections['metrics']['m3_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Bottom Label</label>
                            <input type="text" name="m3_sub" value="<?= e($sections['metrics']['m3_sub']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Metric 4 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                        <div class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                            <span>✦ Metric 4</span>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Value</label>
                            <input type="text" name="m4_val" value="<?= e($sections['metrics']['m4_val']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Top Label</label>
                            <input type="text" name="m4_title" value="<?= e($sections['metrics']['m4_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Bottom Label</label>
                            <input type="text" name="m4_sub" value="<?= e($sections['metrics']['m4_sub']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================
             TAB 2: THE SANCTITY OF BRAJ (PHILOSOPHY & 4 PILLARS)
             ============================================================ -->
        <div x-show="activeTab === 'philosophy'" class="space-y-6" x-cloak>
            <!-- Section Header & Advisory Quote -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Header &amp; Advisory Heritage Quote
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow Badge</label>
                        <input type="text" name="phil_eyebrow" value="<?= e($sections['philosophy']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Title</label>
                        <input type="text" name="phil_title" value="<?= e($sections['philosophy']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Subtitle</label>
                        <input type="text" name="phil_subtitle" value="<?= e($sections['philosophy']['subtitle']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold mb-1">
                            Advisory Quote (Rendered in Clean Normal Typography)
                        </label>
                        <textarea name="phil_quote" rows="2"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-sm text-white focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['philosophy']['quote']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Quote Citation / Author</label>
                        <input type="text" name="phil_quote_author" value="<?= e($sections['philosophy']['quote_author']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Narrative Paragraph 1</label>
                        <textarea name="phil_p1" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-xs text-white focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['philosophy']['p1']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Narrative Paragraph 2</label>
                        <textarea name="phil_p2" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-xs text-white focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['philosophy']['p2']) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- 4 Pillars Matrix -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        4 Pillars Matrix Cards (Frosted Luxury Cards)
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">Pillar #<?= $i + 1 ?></span>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Pillar Title</label>
                                <input type="text" name="pillar_<?= $i ?>_title" value="<?= e($sections['philosophy']['pillars'][$i]['title'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Description</label>
                                <textarea name="pillar_<?= $i ?>_desc" rows="2"
                                          class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['philosophy']['pillars'][$i]['desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Architectural Showcase Featured Card -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Curated Visual Showcase Card (Right Column)
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Badge</label>
                        <input type="text" name="showcase_badge" value="<?= e($sections['philosophy']['showcase_badge']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Project Name / Title</label>
                        <input type="text" name="showcase_title" value="<?= e($sections['philosophy']['showcase_title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Starting Price</label>
                        <input type="text" name="showcase_price" value="<?= e($sections['philosophy']['showcase_price']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Link URL</label>
                        <input type="text" name="showcase_link" value="<?= e($sections['philosophy']['showcase_link']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Replace Image (Optional)</label>
                        <input type="file" name="showcase_image" accept="image/*"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-slate-300 file:mr-3 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Showcase Description</label>
                    <textarea name="showcase_desc" rows="2"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['philosophy']['showcase_desc']) ?></textarea>
                </div>
            </div>
        </div>

        <!-- ============================================================
             TAB 3: ASSET CLASSES SHOWCASE (COMMERCIAL, VILA, PLOT, FLAT)
             ============================================================ -->
        <div x-show="activeTab === 'assets'" class="space-y-6" x-cloak>
            <!-- 3-Column Top Highlights -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        3-Column Section Highlights (Above the Cards)
                    </h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Highlight 1 (Commercial)</label>
                        <textarea name="highlight_1" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['asset_highlights']['h1']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Highlight 2 (Duplex Villas)</label>
                        <textarea name="highlight_2" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['asset_highlights']['h2']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Highlight 3 (Plots &amp; Flats)</label>
                        <textarea name="highlight_3" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['asset_highlights']['h3']) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- 4 Asset Cards -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Four Property Asset Showcase Cards
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php 
                    $cardList = [
                        'commercial' => 'COMMERCIAL PLOT',
                        'villa' => 'VILA / VILLA',
                        'plot' => 'PLOT',
                        'flat' => 'FLAT',
                    ];
                    foreach ($cardList as $key => $name): 
                        $card = $sections['asset_cards'][$key];
                    ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">✦ <?= $name ?></span>
                            
                            <!-- Thumbnail Preview -->
                            <div class="w-full h-28 rounded-lg overflow-hidden bg-slate-900 border border-slate-800">
                                <img src="<?= asset($card['image']) ?>" alt="<?= e($card['title']) ?>" class="w-full h-full object-cover">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Card Title</label>
                                <input type="text" name="card_<?= $key ?>_title" value="<?= e($card['title']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle / Badge</label>
                                <input type="text" name="card_<?= $key ?>_sub" value="<?= e($card['subtitle']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Target Link</label>
                                <input type="text" name="card_<?= $key ?>_link" value="<?= e($card['link']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Replace Image</label>
                                <input type="file" name="card_<?= $key ?>_image" accept="image/*"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1 text-[11px] text-slate-300 file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-[10px] file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- ============================================================
             TAB 4: PROJECTS, LOCATIONS & CONSULTATION SECTION HEADERS
             ============================================================ -->
        <div x-show="activeTab === 'sections'" class="space-y-6" x-cloak>
            <!-- Curated Sanctuaries (Projects Section) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Curated Sanctuaries (Projects Portfolio Section)
                    </h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow</label>
                        <input type="text" name="proj_eyebrow" value="<?= e($sections['projects_section']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Heading</label>
                        <input type="text" name="proj_title" value="<?= e($sections['projects_section']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle</label>
                        <input type="text" name="proj_subtitle" value="<?= e($sections['projects_section']['subtitle']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Strategic Growth Corridors (Locations Section) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Strategic Growth Corridors (Locations Section)
                    </h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow</label>
                        <input type="text" name="loc_eyebrow" value="<?= e($sections['locations_section']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Heading</label>
                        <input type="text" name="loc_title" value="<?= e($sections['locations_section']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle</label>
                        <input type="text" name="loc_subtitle" value="<?= e($sections['locations_section']['subtitle']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- VIP Site Visit Consultation Form Section -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        VIP Site Visit Consultation Form Section
                    </h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow</label>
                        <input type="text" name="consult_eyebrow" value="<?= e($sections['consultation_section']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Direct Desk Callout Note</label>
                        <input type="text" name="consult_desk_note" value="<?= e($sections['consultation_section']['desk_note']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Headline</label>
                        <input type="text" name="consult_title" value="<?= e($sections['consultation_section']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subheading</label>
                        <input type="text" name="consult_subtitle" value="<?= e($sections['consultation_section']['subtitle']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Bottom Save Bar -->
        <div class="sticky bottom-4 z-20 bg-slate-950/90 border border-slate-800 backdrop-blur-xl p-4 rounded-xl flex items-center justify-between shadow-2xl">
            <div class="text-xs text-slate-400 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                <span>Unsaved changes will update the live homepage immediately upon save.</span>
            </div>
            <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-lg flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save Homepage Sections</span>
            </button>
        </div>

    </form>

</div>
