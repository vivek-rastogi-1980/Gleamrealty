<div class="space-y-6 max-w-6xl mx-auto" x-data="{ activeTab: 'hero' }">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/90 border border-slate-800 p-5 rounded-2xl shadow-xl">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wider uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30">
                    Dedicated Showcase CMS
                </span>
                <span class="text-xs text-slate-400 font-mono">/residential-plots-in-vrindavan</span>
            </div>
            <h2 class="text-2xl font-bold font-heading text-white mt-1">Residential Plots in Vrindavan Content &amp; Media</h2>
            <p class="text-xs text-slate-400 mt-0.5">Control all text, images, metrics, legal pillars, megaprojects, and SEO for the residential plots page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/residential-plots-in-vrindavan') ?>" target="_blank"
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
    <form action="<?= url('/admin/residential-plots') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
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
            <button type="button" @click="activeTab = 'legalities'"
                    :class="activeTab === 'legalities' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>3. Legalities &amp; MVDA Filter</span>
            </button>
            <button type="button" @click="activeTab = 'megaprojects'"
                    :class="activeTab === 'megaprojects' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>4. 2026 Megaprojects</span>
            </button>
            <button type="button" @click="activeTab = 'lifestyle'"
                    :class="activeTab === 'lifestyle' ? 'bg-amber-400 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800/60 font-medium'"
                    class="px-4 py-2 rounded-lg text-xs transition-all flex items-center gap-2">
                <span>5. Spiritual Lifestyle</span>
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
                        <input type="text" name="hero_badge" value="<?= e($sections['hero']['badge'] ?? '✦ Gleamrealty Private Limited • RESIDENTIAL PLOTS') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Main H1 Title</label>
                        <input type="text" name="hero_heading" value="<?= e($sections['hero']['heading'] ?? 'Plots in Vrindavan') ?>"
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
                            <?php $heroImg = !empty($sections['hero']['image']) ? media_url($sections['hero']['image']) : asset('uploads/pages/residential-plots-in-vrindavan.jpeg'); ?>
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
                                       placeholder="uploads/pages/residential-plots-in-vrindavan.jpeg"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Trust Badges Strip -->
                <div class="space-y-3 pt-2">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">4 Hero Trust Badges</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 1</span>
                            <input type="text" name="hero_badge_1" value="<?= e($sections['hero']['badge_1'] ?? '100% MVDA & RERA Approved') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 2</span>
                            <input type="text" name="hero_badge_2" value="<?= e($sections['hero']['badge_2'] ?? '✦ Immediate Registry & Mutation') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 3</span>
                            <input type="text" name="hero_badge_3" value="<?= e($sections['hero']['badge_3'] ?? 'Bank Loan Approved') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <span class="text-[11px] text-slate-500 block mb-1">Badge 4</span>
                            <input type="text" name="hero_badge_4" value="<?= e($sections['hero']['badge_4'] ?? 'Zero Brokerage Direct') ?>"
                                   class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
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
                    <span class="w-2.5 h-2.5 rounded-full bg-cyan-400"></span> Ground Reality &amp; Overview Narrative
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Eyebrow Badge</label>
                        <input type="text" name="overview_badge" value="<?= e($sections['overview']['badge'] ?? '✦ The Ground Reality of Braj') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="overview_title" value="<?= e($sections['overview']['title'] ?? 'Plot in Vrindavan near Prem Mandir') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <input type="text" name="overview_subtitle" value="<?= e($sections['overview']['subtitle'] ?? '') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>

                <!-- Primary Showcase Image -->
                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Primary Showcase Image (Left Card)
                        </span>
                        <span class="text-[11px] text-slate-500">Left-side hero card in overview section</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                        <div class="md:col-span-4 aspect-[4/5] rounded-xl overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                            <?php $ovImg = !empty($sections['overview']['image']) ? media_url($sections['overview']['image']) : asset('uploads/pages/mero-vrindavan.png'); ?>
                            <img id="ovPreviewImg" src="<?= $ovImg ?>" alt="Overview Preview" class="w-full h-full object-cover">
                        </div>
                        <div class="md:col-span-8 space-y-3">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Card Image</label>
                                <input type="file" name="overview_image" accept="image/*" onchange="previewImageFile(this, 'ovPreviewImg')"
                                       class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                <input type="text" name="overview_image_manual" value="<?= e($sections['overview']['image'] ?? '') ?>"
                                       placeholder="uploads/pages/mero-vrindavan.png"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>
                            <div class="grid grid-cols-2 gap-3 pt-2">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge Tag</label>
                                    <input type="text" name="overview_badge_sub" value="<?= e($sections['overview']['badge_sub'] ?? 'Brajwas Guaranteed') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge Title</label>
                                    <input type="text" name="overview_badge_title" value="<?= e($sections['overview']['badge_title'] ?? '3,000+ Happy Families') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Micro Banner Box -->
                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400 block">Secondary Micro Banner</span>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                        <div class="md:col-span-3 aspect-square rounded-xl overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                            <?php $secImg = !empty($sections['overview']['secondary_image']) ? media_url($sections['overview']['secondary_image']) : asset('uploads/pages/property-in-vrindavan.png'); ?>
                            <img id="secPreviewImg" src="<?= $secImg ?>" alt="Secondary Preview" class="w-full h-full object-cover">
                        </div>
                        <div class="md:col-span-9 space-y-3">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Micro Image</label>
                                    <input type="file" name="secondary_image" accept="image/*" onchange="previewImageFile(this, 'secPreviewImg')"
                                           class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Path / URL</label>
                                    <input type="text" name="secondary_image_manual" value="<?= e($sections['overview']['secondary_image'] ?? '') ?>"
                                           placeholder="uploads/pages/property-in-vrindavan.png"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Banner Title</label>
                                    <input type="text" name="overview_secondary_title" value="<?= e($sections['overview']['secondary_title'] ?? 'Over 5 Lakh Sq. Yards') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Banner Description</label>
                                    <input type="text" name="overview_secondary_desc" value="<?= e($sections['overview']['secondary_desc'] ?? 'Consulted and delivered with 100% legal clearance across the Vrindavan-Mathura belt.') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inline Image Uploader for HTML Content -->
                <div class="p-3.5 rounded-lg bg-slate-950/80 border border-slate-800 space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-amber-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Insert Inline Image into Narrative Body
                        </span>
                        <span id="contentImgStatus" class="text-[11px] text-slate-400"></span>
                    </div>
                    <div class="flex flex-wrap items-center gap-2.5">
                        <input type="file" id="contentImageInput" accept="image/*"
                               class="text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                        <button type="button" onclick="uploadAndInsertContentImage()"
                                class="px-3.5 py-1.5 rounded-md bg-amber-400 hover:bg-amber-500 text-slate-950 text-xs font-bold transition-all shadow-sm">
                            Upload &amp; Insert into Narrative
                        </button>
                    </div>
                </div>

                <!-- Full HTML Body Textarea -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Full Overview Narrative (HTML)</label>
                    <textarea name="overview_content" id="overviewContentArea" rows="12"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white font-mono focus:border-amber-400 focus:outline-none"><?= e($sections['overview']['content'] ?? '') ?></textarea>
                </div>

                <!-- 4 Metrics Counters -->
                <div class="space-y-3 pt-2 border-t border-slate-800">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">4 Key Metrics Counters</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="p-3 bg-slate-950/70 rounded-xl border border-slate-800 space-y-1.5">
                            <span class="text-[10px] text-amber-400 uppercase tracking-wider font-bold">Metric 1</span>
                            <input type="text" name="overview_metric_1_val" value="<?= e($sections['overview']['metric_1_val'] ?? '10+') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_1_lbl" value="<?= e($sections['overview']['metric_1_lbl'] ?? 'Years Heritage') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 rounded-xl border border-slate-800 space-y-1.5">
                            <span class="text-[10px] text-amber-400 uppercase tracking-wider font-bold">Metric 2</span>
                            <input type="text" name="overview_metric_2_val" value="<?= e($sections['overview']['metric_2_val'] ?? '3,000+') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_2_lbl" value="<?= e($sections['overview']['metric_2_lbl'] ?? 'Devotee Families') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 rounded-xl border border-slate-800 space-y-1.5">
                            <span class="text-[10px] text-amber-400 uppercase tracking-wider font-bold">Metric 3</span>
                            <input type="text" name="overview_metric_3_val" value="<?= e($sections['overview']['metric_3_val'] ?? '5 Lakh+') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_3_lbl" value="<?= e($sections['overview']['metric_3_lbl'] ?? 'Sq. Yards Sold') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div class="p-3 bg-slate-950/70 rounded-xl border border-slate-800 space-y-1.5">
                            <span class="text-[10px] text-amber-400 uppercase tracking-wider font-bold">Metric 4</span>
                            <input type="text" name="overview_metric_4_val" value="<?= e($sections['overview']['metric_4_val'] ?? '100%') ?>" placeholder="Value"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            <input type="text" name="overview_metric_4_lbl" value="<?= e($sections['overview']['metric_4_lbl'] ?? 'MVDA Approved') ?>" placeholder="Label"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =======================================================================
             TAB 3: LEGALITIES & MVDA FILTER
             ======================================================================= -->
        <div x-show="activeTab === 'legalities'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span> Legalities &amp; The MVDA Filter
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow</label>
                        <input type="text" name="legalities_eyebrow" value="<?= e($sections['legalities']['eyebrow'] ?? 'Regulatory Standards') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="legalities_title" value="<?= e($sections['legalities']['title'] ?? 'Legalities of Vrindavan Real Estate') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="legalities_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['legalities']['subtitle'] ?? '') ?></textarea>
                </div>

                <!-- 4 Legal Pillar Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Pillar 01</span>
                        <input type="text" name="legalities_p1_title" value="<?= e($sections['legalities']['p1_title'] ?? 'Sanctioned Layouts: The Guarantee of Planned Living') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="legalities_p1_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['legalities']['p1_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Pillar 02</span>
                        <input type="text" name="legalities_p2_title" value="<?= e($sections['legalities']['p2_title'] ?? 'Infrastructure Guarantees: Built for the Future') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="legalities_p2_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['legalities']['p2_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Pillar 03</span>
                        <input type="text" name="legalities_p3_title" value="<?= e($sections['legalities']['p3_title'] ?? 'Ease of Financing: The Bank’s Vote of Confidence') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="legalities_p3_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['legalities']['p3_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Pillar 04</span>
                        <input type="text" name="legalities_p4_title" value="<?= e($sections['legalities']['p4_title'] ?? 'Future Appreciation: Wealth Creation Through Legality') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="legalities_p4_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['legalities']['p4_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- =======================================================================
             TAB 4: 2026 MEGAPROJECTS & INFRASTRUCTURE
             ======================================================================= -->
        <div x-show="activeTab === 'megaprojects'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-indigo-400"></span> The 2026 Ground Reality: Megaprojects Transforming Braj
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow</label>
                        <input type="text" name="megaprojects_eyebrow" value="<?= e($sections['megaprojects']['eyebrow'] ?? 'Economic Infrastructure') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="megaprojects_title" value="<?= e($sections['megaprojects']['title'] ?? 'The 2026 Ground Reality: Megaprojects Transforming Braj') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="megaprojects_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['megaprojects']['subtitle'] ?? '') ?></textarea>
                </div>

                <!-- 4 Megaprojects Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-400">Megaproject 01</span>
                            <input type="text" name="megaprojects_mp1_badge" value="<?= e($sections['megaprojects']['mp1_badge'] ?? 'Opening 2026') ?>" placeholder="Badge"
                                   class="bg-slate-900 border border-slate-700 rounded px-2 py-0.5 text-[10px] text-amber-300">
                        </div>
                        <input type="text" name="megaprojects_mp1_title" value="<?= e($sections['megaprojects']['mp1_title'] ?? 'Noida International Airport (Jewar)') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="megaprojects_mp1_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['megaprojects']['mp1_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-400">Megaproject 02</span>
                            <input type="text" name="megaprojects_mp2_badge" value="<?= e($sections['megaprojects']['mp2_badge'] ?? 'YEIDA Megaproject') ?>" placeholder="Badge"
                                   class="bg-slate-900 border border-slate-700 rounded px-2 py-0.5 text-[10px] text-amber-300">
                        </div>
                        <input type="text" name="megaprojects_mp2_title" value="<?= e($sections['megaprojects']['mp2_title'] ?? '1,000-Acre Raya Heritage City') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="megaprojects_mp2_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['megaprojects']['mp2_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-400">Megaproject 03</span>
                            <input type="text" name="megaprojects_mp3_badge" value="<?= e($sections['megaprojects']['mp3_badge'] ?? 'Urban Modernization') ?>" placeholder="Badge"
                                   class="bg-slate-900 border border-slate-700 rounded px-2 py-0.5 text-[10px] text-amber-300">
                        </div>
                        <input type="text" name="megaprojects_mp3_title" value="<?= e($sections['megaprojects']['mp3_title'] ?? 'Banke Bihari Corridor & Rapid Rail') ?>"
                                class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="megaprojects_mp3_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['megaprojects']['mp3_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-400">Megaproject 04</span>
                            <input type="text" name="megaprojects_mp4_badge" value="<?= e($sections['megaprojects']['mp4_badge'] ?? '₹2,082 Cr Budget') ?>" placeholder="Badge"
                                   class="bg-slate-900 border border-slate-700 rounded px-2 py-0.5 text-[10px] text-amber-300">
                        </div>
                        <input type="text" name="megaprojects_mp4_title" value="<?= e($sections['megaprojects']['mp4_title'] ?? 'MVDA Master Plan 2031') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="megaprojects_mp4_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['megaprojects']['mp4_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- =======================================================================
             TAB 5: SPIRITUAL LIFESTYLE
             ======================================================================= -->
        <div x-show="activeTab === 'lifestyle'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span> Life as a Brajwasi: The Spiritual Lifestyle Dividend
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow</label>
                        <input type="text" name="lifestyle_eyebrow" value="<?= e($sections['lifestyle']['eyebrow'] ?? 'Sacred Living') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                        <input type="text" name="lifestyle_title" value="<?= e($sections['lifestyle']['title'] ?? 'Life as a Brajwasi: The Spiritual Lifestyle Dividend') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Subtitle</label>
                    <textarea name="lifestyle_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['lifestyle']['subtitle'] ?? '') ?></textarea>
                </div>

                <!-- 4 Lifestyle Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Card 01</span>
                        <input type="text" name="lifestyle_card1_title" value="<?= e($sections['lifestyle']['card1_title'] ?? 'Mangala Aarti & Sacred Dawn') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="lifestyle_card1_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['lifestyle']['card1_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Card 02</span>
                        <input type="text" name="lifestyle_card2_title" value="<?= e($sections['lifestyle']['card2_title'] ?? 'The Sacred Tradition of Parikrama') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="lifestyle_card2_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['lifestyle']['card2_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Card 03</span>
                        <input type="text" name="lifestyle_card3_title" value="<?= e($sections['lifestyle']['card3_title'] ?? 'Yamuna Sandhya & Deep Daan') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="lifestyle_card3_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['lifestyle']['card3_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                        <span class="text-xs font-bold text-amber-400">Card 04</span>
                        <input type="text" name="lifestyle_card4_title" value="<?= e($sections['lifestyle']['card4_title'] ?? 'Festivals Through Resident Eyes') ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        <textarea name="lifestyle_card4_desc" rows="3"
                                  class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none"><?= e($sections['lifestyle']['card4_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- =======================================================================
             TAB 6: CONSULTATION & SEO
             ======================================================================= -->
        <div x-show="activeTab === 'consultation'" class="space-y-6">
            <!-- VIP Consultation Form Settings -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-5">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-400"></span> VIP Consultation Form &amp; Concierge Hotlines
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge</label>
                        <input type="text" name="consultation_badge" value="<?= e($sections['consultation']['badge'] ?? '✦ Free VIP Site Visit & Showing') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Form Title</label>
                        <input type="text" name="consultation_title" value="<?= e($sections['consultation']['title'] ?? 'Find Your Dream Plot in Vrindavan') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Form Subtitle</label>
                    <textarea name="consultation_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3.5 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($sections['consultation']['subtitle'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hotline 1</label>
                        <input type="text" name="consultation_phone_1" value="<?= e($sections['consultation']['phone_1'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-sm text-white focus:border-amber-400 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hotline 2</label>
                        <input type="text" name="consultation_phone_2" value="<?= e($sections['consultation']['phone_2'] ?? '+91 7409767452') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-sm text-white focus:border-amber-400 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">WhatsApp Concierge</label>
                        <input type="text" name="consultation_whatsapp" value="<?= e($sections['consultation']['whatsapp'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-xl px-3 py-2 text-sm text-white focus:border-amber-400 focus:outline-none font-mono">
                    </div>
                </div>
            </div>

            <!-- SEO Metadata Card -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-4">
                <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> Search Engine Optimization (SEO)
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
                All changes immediately update the live page and synchronize with CMS Page #4.
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

    fetch('<?= url('/admin/residential-plots/upload-image') ?>', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            status.innerText = '✓ Image uploaded & inserted into narrative!';
            status.className = 'text-[11px] text-emerald-400 font-semibold';
            const textarea = document.getElementById('overviewContentArea');
            const imgSnippet = '\n<div class="my-6 rounded-2xl overflow-hidden shadow-xl border border-slate-700/60">\n    <img src="' + data.url + '" alt="Residential Plots in Vrindavan" class="w-full h-auto object-cover">\n</div>\n';
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
