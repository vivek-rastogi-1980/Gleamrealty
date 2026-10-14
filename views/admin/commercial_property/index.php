<div class="space-y-6 max-w-6xl mx-auto" x-data="{ activeTab: 'hero' }">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/90 border border-slate-800 p-5 rounded-2xl shadow-xl">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wider uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30">
                    Dedicated Showcase CMS
                </span>
                <span class="text-xs text-slate-400 font-mono">/commercial-property-in-vrindavan</span>
            </div>
            <h2 class="text-2xl font-bold font-heading text-white mt-1">Commercial Property in Vrindavan Content &amp; Media</h2>
            <p class="text-xs text-slate-400 mt-0.5">Control all text, imagery, economic metrics, infrastructure catalysts, asset classes, and SEO for the commercial property landing page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/commercial-property-in-vrindavan') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form action="<?= url('/admin/commercial-property') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Tab Navigation Buttons -->
        <div class="flex flex-wrap gap-2 p-1.5 bg-slate-900/90 border border-slate-800 rounded-xl">
            <button type="button" @click="activeTab = 'hero'"
                    :class="activeTab === 'hero' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>1. Hero &amp; Badges</span>
            </button>
            <button type="button" @click="activeTab = 'overview'"
                    :class="activeTab === 'overview' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>2. Overview &amp; Visuals</span>
            </button>
            <button type="button" @click="activeTab = 'catalysts'"
                    :class="activeTab === 'catalysts' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>3. Infrastructure Catalysts</span>
            </button>
            <button type="button" @click="activeTab = 'sectors'"
                    :class="activeTab === 'sectors' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>4. High-Yield Sectors</span>
            </button>
            <button type="button" @click="activeTab = 'showcase'"
                    :class="activeTab === 'showcase' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>5. Flagship Showcase</span>
            </button>
            <button type="button" @click="activeTab = 'consultation'"
                    :class="activeTab === 'consultation' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>6. Consultation &amp; SEO</span>
            </button>
        </div>

        <!-- =======================================================================
             TAB 1: HERO & BADGES
             ======================================================================= -->
        <div x-show="activeTab === 'hero'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Hero Banner &amp; Trust Badges
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Eyebrow / Pill Badge</label>
                        <input type="text" name="hero_badge" value="<?= e($sections['hero']['badge'] ?? '✦ Gleamrealty Private Limited • HIGH-YIELD COMMERCIAL ASSET CLASS') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Main H1 Title</label>
                        <input type="text" name="hero_heading" value="<?= e($sections['hero']['heading'] ?? 'Commercial Property in Vrindavan') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Subheading Tagline</label>
                    <textarea name="hero_subheading" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($sections['hero']['subheading'] ?? '') ?></textarea>
                </div>

                <!-- Hero Background Image Box -->
                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Hero Background Visual
                        </span>
                        <span class="text-[11px] text-slate-500">Visible behind the hero banner</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                        <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                            <?php $heroImg = !empty($sections['hero']['image']) ? media_url($sections['hero']['image']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'); ?>
                            <img id="heroPreviewImg" src="<?= $heroImg ?>" alt="Hero Preview" class="w-full h-full object-cover">
                        </div>
                        <div class="md:col-span-8 space-y-3">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Hero Image</label>
                                <input type="file" name="hero_image" accept="image/*" onchange="previewImageFile(this, 'heroPreviewImg')"
                                       class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                <span class="text-[11px] text-slate-500 mt-1 block">JPG, PNG, or WebP. Optimal: 1920&times;800px.</span>
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                <input type="text" name="hero_image_manual" value="<?= e($sections['hero']['image'] ?? '') ?>"
                                       placeholder="uploads/pages/commercial-property-in-vrindavan.jpeg"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Trust Badges -->
                <div class="space-y-3 pt-2">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">Hero Badges Strip (4 Badges)</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 1</span>
                            <input type="text" name="hero_badge_1" value="<?= e($sections['hero']['badge_1'] ?? '100% MVDA & CLU Approved') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 2</span>
                            <input type="text" name="hero_badge_2" value="<?= e($sections['hero']['badge_2'] ?? '✦ 11-Crore Annual Pilgrim Footfall') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 3</span>
                            <input type="text" name="hero_badge_3" value="<?= e($sections['hero']['badge_3'] ?? 'Bank Financing Approved') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 4</span>
                            <input type="text" name="hero_badge_4" value="<?= e($sections['hero']['badge_4'] ?? 'Zero Brokerage Direct') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- =======================================================================
             TAB 2: OVERVIEW & VISUALS
             ======================================================================= -->
        <div x-show="activeTab === 'overview'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Commercial Overview, Visual Showcase &amp; Metrics
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow</label>
                        <input type="text" name="overview_badge" value="<?= e($sections['overview']['badge'] ?? 'Economic Reality') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Main Heading</label>
                        <input type="text" name="overview_title" value="<?= e($sections['overview']['title'] ?? 'Commercial Land in Vrindavan') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <!-- Rich Narrative Content Area with Inline AJAX Image Upload -->
                <div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">
                            Commercial Narrative (HTML / Paragraphs)
                        </label>
                        <div class="flex items-center gap-2">
                            <input type="file" id="contentImageInput" accept="image/*" class="hidden">
                            <button type="button" onclick="document.getElementById('contentImageInput').click()"
                                    class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-[11px] text-amber-300 font-medium border border-slate-700 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>Choose Image</span>
                            </button>
                            <button type="button" onclick="uploadAndInsertContentImage()"
                                    class="px-2.5 py-1 rounded bg-amber-400 hover:bg-amber-300 text-[11px] text-slate-950 font-bold flex items-center gap-1 shadow-sm">
                                <span>Upload &amp; Insert</span>
                            </button>
                            <span id="contentImgStatus" class="text-[11px] text-slate-400"></span>
                        </div>
                    </div>
                    <textarea id="overviewContentArea" name="overview_content" rows="9"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white font-mono leading-relaxed focus:outline-none focus:border-amber-400"><?= e($sections['overview']['content'] ?? '') ?></textarea>
                    <p class="text-[11px] text-slate-500 mt-1">Accepts rich HTML tags: &lt;p&gt;, &lt;strong&gt;, &lt;ul&gt;, &lt;li&gt;, etc. Use the button above to upload and insert images right into the text.</p>
                </div>

                <!-- Showcase Card Left-Hand Image & Badges -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                    <!-- Showcase Primary Card -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Primary Showcase Card Image</span>
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-start">
                            <div class="sm:col-span-5 aspect-[4/5] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative">
                                <?php $ovImg = !empty($sections['overview']['image']) ? media_url($sections['overview']['image']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'); ?>
                                <img id="overviewPreviewImg" src="<?= $ovImg ?>" alt="Overview Showcase" class="w-full h-full object-cover">
                            </div>
                            <div class="sm:col-span-7 space-y-2">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Card Image</label>
                                    <input type="file" name="overview_image" accept="image/*" onchange="previewImageFile(this, 'overviewPreviewImg')"
                                           class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Path / URL</label>
                                    <input type="text" name="overview_image_manual" value="<?= e($sections['overview']['image'] ?? '') ?>"
                                           placeholder="uploads/pages/commercial-property-in-vrindavan.jpeg"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                                <div class="pt-1">
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Bottom Badge Tag</label>
                                    <input type="text" name="overview_badge_sub" value="<?= e($sections['overview']['badge_sub'] ?? 'High-Yield Asset') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Bottom Badge Title</label>
                                    <input type="text" name="overview_badge_title" value="<?= e($sections['overview']['badge_title'] ?? '12% - 18% Project Yields') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Micro Banner Card -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Secondary Micro Banner</span>
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-start">
                            <div class="sm:col-span-4 aspect-square rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative">
                                <?php $secImg = !empty($sections['overview']['secondary_image']) ? media_url($sections['overview']['secondary_image']) : asset('uploads/pages/property-in-vrindavan.png'); ?>
                                <img id="secondaryPreviewImg" src="<?= $secImg ?>" alt="Secondary Showcase" class="w-full h-full object-cover">
                            </div>
                            <div class="sm:col-span-8 space-y-2">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Micro Image</label>
                                    <input type="file" name="secondary_image" accept="image/*" onchange="previewImageFile(this, 'secondaryPreviewImg')"
                                           class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Path / URL</label>
                                    <input type="text" name="secondary_image_manual" value="<?= e($sections['overview']['secondary_image'] ?? '') ?>"
                                           placeholder="uploads/pages/property-in-vrindavan.png"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                                <div class="pt-1">
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Headline</label>
                                    <input type="text" name="overview_secondary_title" value="<?= e($sections['overview']['secondary_title'] ?? 'Strategic Retail Hub') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Description</label>
                                    <input type="text" name="overview_secondary_desc" value="<?= e($sections['overview']['secondary_desc'] ?? 'Positioned along heavy tourist corridors capturing daily pilgrim spending.') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Quick Key Metrics -->
                <div class="space-y-3 pt-3 border-t border-slate-800">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">4 Quick Key Metrics</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Metric 1</span>
                            <input type="text" name="overview_metric_1_val" value="<?= e($sections['overview']['metric_1_val'] ?? '11 Cr+') ?>" placeholder="Value (e.g. 11 Cr+)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_1_lbl" value="<?= e($sections['overview']['metric_1_lbl'] ?? 'Projected Footfall') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Metric 2</span>
                            <input type="text" name="overview_metric_2_val" value="<?= e($sections['overview']['metric_2_val'] ?? '75%+') ?>" placeholder="Value (e.g. 75%+)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_2_lbl" value="<?= e($sections['overview']['metric_2_lbl'] ?? 'Avg Occupancy') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Metric 3</span>
                            <input type="text" name="overview_metric_3_val" value="<?= e($sections['overview']['metric_3_val'] ?? '₹30K Cr') ?>" placeholder="Value (e.g. ₹30K Cr)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_3_lbl" value="<?= e($sections['overview']['metric_3_lbl'] ?? 'Infra Outlay') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Metric 4</span>
                            <input type="text" name="overview_metric_4_val" value="<?= e($sections['overview']['metric_4_val'] ?? '100%') ?>" placeholder="Value (e.g. 100%)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_4_lbl" value="<?= e($sections['overview']['metric_4_lbl'] ?? 'MVDA Approved') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- =======================================================================
             TAB 3: INFRASTRUCTURE CATALYSTS
             ======================================================================= -->
        <div x-show="activeTab === 'catalysts'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 4 Pillars of Infrastructure Catalysts
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Eyebrow</label>
                        <input type="text" name="catalysts_eyebrow" value="<?= e($sections['catalysts']['eyebrow'] ?? 'Growth Arteries') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="catalysts_title" value="<?= e($sections['catalysts']['title'] ?? 'Infrastructure Catalysts Driving Commercial Land in Vrindavan') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="catalysts_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($sections['catalysts']['subtitle'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <!-- Catalyst 1 -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center">01</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Pillar 1</span>
                        </div>
                        <input type="text" name="catalysts_p1_title" value="<?= e($sections['catalysts']['p1_title'] ?? 'The Banke Bihari Heritage Corridor: Commercial Game-Changer') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        <textarea name="catalysts_p1_desc" rows="4"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['catalysts']['p1_desc'] ?? '') ?></textarea>
                    </div>

                    <!-- Catalyst 2 -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center">02</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Pillar 2</span>
                        </div>
                        <input type="text" name="catalysts_p2_title" value="<?= e($sections['catalysts']['p2_title'] ?? 'The Jewar International Airport Factor') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        <textarea name="catalysts_p2_desc" rows="4"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['catalysts']['p2_desc'] ?? '') ?></textarea>
                    </div>

                    <!-- Catalyst 3 -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center">03</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Pillar 3</span>
                        </div>
                        <input type="text" name="catalysts_p3_title" value="<?= e($sections['catalysts']['p3_title'] ?? 'Superior Rental Yields & Lease-Back Security') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        <textarea name="catalysts_p3_desc" rows="4"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['catalysts']['p3_desc'] ?? '') ?></textarea>
                    </div>

                    <!-- Catalyst 4 -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center">04</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Pillar 4</span>
                        </div>
                        <input type="text" name="catalysts_p4_title" value="<?= e($sections['catalysts']['p4_title'] ?? 'The "Limited Supply" Reality of Sacred Land') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        <textarea name="catalysts_p4_desc" rows="4"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['catalysts']['p4_desc'] ?? '') ?></textarea>
                    </div>
                </div>

            </div>
        </div>

        <!-- =======================================================================
             TAB 4: HIGH-YIELD SECTORS / ASSET CLASSES
             ======================================================================= -->
        <div x-show="activeTab === 'sectors'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> High-Yield Commercial Verticals / Asset Classes
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Eyebrow</label>
                        <input type="text" name="sectors_eyebrow" value="<?= e($sections['sectors']['eyebrow'] ?? 'Sectors in High Demand') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="sectors_title" value="<?= e($sections['sectors']['title'] ?? 'Where Smart Commercial Capital Is Deploying') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="sectors_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($sections['sectors']['subtitle'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                    <!-- Sector 1: Hospitality -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Vertical 1</span>
                            <input type="text" name="sectors_s1_icon" value="<?= e($sections['sectors']['s1_icon'] ?? '🏨') ?>"
                                   class="w-10 bg-slate-900 border border-slate-700 rounded text-center text-sm py-1">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Vertical Title</label>
                            <input type="text" name="sectors_s1_title" value="<?= e($sections['sectors']['s1_title'] ?? 'Hospitality: Resorts & Hotels') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Description</label>
                            <textarea name="sectors_s1_desc" rows="4"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['sectors']['s1_desc'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Expected ROI / Yield Tag</label>
                            <input type="text" name="sectors_s1_roi" value="<?= e($sections['sectors']['s1_roi'] ?? '14% - 18% Annualized') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-amber-300 font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Sector 2: Retail Arcades -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Vertical 2</span>
                            <input type="text" name="sectors_s2_icon" value="<?= e($sections['sectors']['s2_icon'] ?? '🛍️') ?>"
                                   class="w-10 bg-slate-900 border border-slate-700 rounded text-center text-sm py-1">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Vertical Title</label>
                            <input type="text" name="sectors_s2_title" value="<?= e($sections['sectors']['s2_title'] ?? 'High-Street Retail Arcades') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Description</label>
                            <textarea name="sectors_s2_desc" rows="4"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['sectors']['s2_desc'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Rental Yields Tag</label>
                            <input type="text" name="sectors_s2_roi" value="<?= e($sections['sectors']['s2_roi'] ?? '₹80 - ₹150 / sq. ft / mo') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-amber-300 font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Sector 3: Fine Dining & F&B -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400">Vertical 3</span>
                            <input type="text" name="sectors_s3_icon" value="<?= e($sections['sectors']['s3_icon'] ?? '🍽️') ?>"
                                   class="w-10 bg-slate-900 border border-slate-700 rounded text-center text-sm py-1">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Vertical Title</label>
                            <input type="text" name="sectors_s3_title" value="<?= e($sections['sectors']['s3_title'] ?? 'Sattvic Fine Dining & F&B') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs font-semibold text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Description</label>
                            <textarea name="sectors_s3_desc" rows="4"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none leading-relaxed"><?= e($sections['sectors']['s3_desc'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 font-semibold mb-1">Payback Period Tag</label>
                            <input type="text" name="sectors_s3_roi" value="<?= e($sections['sectors']['s3_roi'] ?? '4 - 6 Years') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-amber-300 font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- =======================================================================
             TAB 5: FLAGSHIP COMMERCIAL SHOWCASE
             ======================================================================= -->
        <div x-show="activeTab === 'showcase'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Flagship Commercial Showcase Card (Shri Vrinda Orchids)
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow</label>
                        <input type="text" name="showcase_eyebrow" value="<?= e($sections['showcase']['eyebrow'] ?? 'Featured Commercial Enclave') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Complex Title</label>
                        <input type="text" name="showcase_title" value="<?= e($sections['showcase']['title'] ?? 'Shri Vrinda Orchids Commercial Complex') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="showcase_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($sections['showcase']['subtitle'] ?? '') ?></textarea>
                </div>

                <!-- Showcase Media Box -->
                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Showcase Visual Imagery</span>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                        <div class="md:col-span-4 aspect-[4/3] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                            <?php $scImg = !empty($sections['showcase']['image']) ? media_url($sections['showcase']['image']) : asset('uploads/pages/commercial-property-in-vrindavan.jpeg'); ?>
                            <img id="showcasePreviewImg" src="<?= $scImg ?>" alt="Showcase Preview" class="w-full h-full object-cover">
                        </div>
                        <div class="md:col-span-8 space-y-3">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Showcase Image</label>
                                <input type="file" name="showcase_image" accept="image/*" onchange="previewImageFile(this, 'showcasePreviewImg')"
                                       class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                <span class="text-[11px] text-slate-500 mt-1 block">JPG, PNG, or WebP. Optimal: 1200&times;800px.</span>
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                <input type="text" name="showcase_image_manual" value="<?= e($sections['showcase']['image'] ?? '') ?>"
                                       placeholder="uploads/pages/commercial-property-in-vrindavan.jpeg"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Image Badge</label>
                                    <input type="text" name="showcase_badge" value="<?= e($sections['showcase']['badge'] ?? '100% MVDA & UP-RERA Registered') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Price Tag</label>
                                    <input type="text" name="showcase_price_tag" value="<?= e($sections['showcase']['price_tag'] ?? 'Starting at ₹ 17,500 / sq. ft') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-amber-300 font-bold focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Showcase Text Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Micro Location</label>
                        <input type="text" name="showcase_location" value="<?= e($sections['showcase']['location'] ?? 'Rukmani Vihar, Vrindavan') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Slug / Link</label>
                        <input type="text" name="showcase_project_slug" value="<?= e($sections['showcase']['project_slug'] ?? 'shri-vrinda-orchids-commercial-complex') ?>"
                               placeholder="shri-vrinda-orchids-commercial-complex"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white font-mono focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Card Headline</label>
                    <input type="text" name="showcase_headline" value="<?= e($sections['showcase']['headline'] ?? 'Modern Retail Arcade & High-Street Showrooms') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Card Description</label>
                    <textarea name="showcase_desc" rows="3"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['showcase']['desc'] ?? '') ?></textarea>
                </div>

                <!-- 4 Highlight Specs -->
                <div class="space-y-3 pt-2">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">4 Highlight Specification Badges</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Spec 1</span>
                            <input type="text" name="showcase_f1_lbl" value="<?= e($sections['showcase']['f1_lbl'] ?? 'Shop Sizes') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                            <input type="text" name="showcase_f1_val" value="<?= e($sections['showcase']['f1_val'] ?? '180 – 650 Sq. Ft') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Spec 2</span>
                            <input type="text" name="showcase_f2_lbl" value="<?= e($sections['showcase']['f2_lbl'] ?? 'Frontage') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                            <input type="text" name="showcase_f2_val" value="<?= e($sections['showcase']['f2_val'] ?? 'Main Sector Road') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Spec 3</span>
                            <input type="text" name="showcase_f3_lbl" value="<?= e($sections['showcase']['f3_lbl'] ?? 'Possession') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                            <input type="text" name="showcase_f3_val" value="<?= e($sections['showcase']['f3_val'] ?? 'Ready Construction') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl space-y-2">
                            <span class="text-[11px] text-amber-400 font-semibold block">Spec 4</span>
                            <input type="text" name="showcase_f4_lbl" value="<?= e($sections['showcase']['f4_lbl'] ?? 'Financing') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-slate-400 focus:border-amber-400 focus:outline-none">
                            <input type="text" name="showcase_f4_val" value="<?= e($sections['showcase']['f4_val'] ?? 'SBI / HDFC Approved') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- =======================================================================
             TAB 6: CONSULTATION & SEO
             ======================================================================= -->
        <div x-show="activeTab === 'consultation'" class="space-y-6">
            <!-- Advisory Desk -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Institutional Commercial Advisory &amp; Site Visit Desk
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge</label>
                        <input type="text" name="consultation_badge" value="<?= e($sections['consultation']['badge'] ?? '✦ Institutional Commercial Advisory') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Consultation Title</label>
                        <input type="text" name="consultation_title" value="<?= e($sections['consultation']['title'] ?? 'Schedule a Commercial Site Consultation') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Consultation Subtitle</label>
                    <textarea name="consultation_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($sections['consultation']['subtitle'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Direct Phone 1</label>
                        <input type="text" name="consultation_phone_1" value="<?= e($sections['consultation']['phone_1'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Direct Phone 2</label>
                        <input type="text" name="consultation_phone_2" value="<?= e($sections['consultation']['phone_2'] ?? '+91 7409767452') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">WhatsApp Number</label>
                        <input type="text" name="consultation_whatsapp" value="<?= e($sections['consultation']['whatsapp'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- SEO Metadata -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-4">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Search Engine Optimization (SEO) &amp; Social Previews
                </h3>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="<?= e($sections['seo']['meta_title'] ?? '') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['seo']['meta_description'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="<?= e($sections['seo']['meta_keywords'] ?? '') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Sticky Save Floating Bar -->
        <div class="flex items-center justify-between p-4 bg-slate-900/90 border border-slate-800 rounded-2xl shadow-2xl">
            <span class="text-xs text-slate-400">
                All changes immediately update the live page and synchronize with CMS Page #5.
            </span>
            <div class="flex items-center gap-3">
                <a href="<?= url('/admin/pages') ?>" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-300 hover:bg-slate-800 text-xs font-semibold transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Save All Changes</span>
                </button>
            </div>
        </div>

    </form>
</div>

<script>
function previewImageFile(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function uploadAndInsertContentImage() {
    const fileInput = document.getElementById('contentImageInput');
    const status = document.getElementById('contentImgStatus');
    if (!fileInput.files || !fileInput.files[0]) {
        alert('Please choose an image file to upload.');
        return;
    }
    status.innerText = 'Uploading image...';
    status.className = 'text-[11px] text-amber-300';
    const fd = new FormData();
    fd.append('content_image', fileInput.files[0]);
    fd.append('_csrf_token', '<?= csrf_token() ?>');

    fetch('<?= url('/admin/commercial-property/upload-image') ?>', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            status.innerText = '✓ Image uploaded & inserted into narrative!';
            status.className = 'text-[11px] text-emerald-400 font-semibold';
            const textarea = document.getElementById('overviewContentArea');
            const imgSnippet = '\n<div class="my-6 rounded-2xl overflow-hidden shadow-xl border border-slate-700/60">\n    <img src="' + data.url + '" alt="Commercial Property in Vrindavan" class="w-full h-auto object-cover">\n</div>\n';
            textarea.value += imgSnippet;
            fileInput.value = '';
        } else {
            status.innerText = '✗ ' + (data.message || 'Upload failed');
            status.className = 'text-[11px] text-rose-400';
        }
    })
    .catch(e => {
        status.innerText = '✗ Network error uploading image';
        status.className = 'text-[11px] text-rose-400';
    });
}
</script>
