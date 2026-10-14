<div class="max-w-6xl mx-auto space-y-6 pb-20" x-data="{ activeTab: 'hero_overview' }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-amber-400 shadow-md shadow-amber-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">About Us Content CMS</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Customize every section of the About Us page: Hero banner, sanctuary visual, trust metrics, mission/vision, leadership photos, capabilities, and SEO.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/about-us') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="aboutSectionsForm"
                    class="px-5 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </div>

    <!-- Navigation Pills / Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-800/80">
        <button type="button" @click="activeTab = 'hero_overview'"
                :class="activeTab === 'hero_overview' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            1. Hero &amp; Sanctuary Overview
        </button>
        <button type="button" @click="activeTab = 'metrics_principles'"
                :class="activeTab === 'metrics_principles' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            2. Trust Metrics &amp; Mission/Vision
        </button>
        <button type="button" @click="activeTab = 'leadership'"
                :class="activeTab === 'leadership' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            3. Leadership &amp; Founders' Photos
        </button>
        <button type="button" @click="activeTab = 'capabilities_why'"
                :class="activeTab === 'capabilities_why' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            4. Capabilities &amp; Why Choose Us
        </button>
        <button type="button" @click="activeTab = 'consult_seo'"
                :class="activeTab === 'consult_seo' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0">
            5. Site Visit Desk &amp; SEO
        </button>
    </div>

    <!-- Main Form -->
    <form id="aboutSectionsForm" action="<?= url('/admin/about') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- ============================================================
             TAB 1: HERO & SANCTUARY OVERVIEW
             ============================================================ -->
        <div x-show="activeTab === 'hero_overview'" class="space-y-6">
            
            <!-- Hero Banner Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Hero Banner Section (Top Header)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Controls the top background image, pill tag, main headline, and introduction subtitle.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Pill Tag / Badge</label>
                        <input type="text" name="hero_badge" value="<?= e($sections['hero']['badge']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Main Page Heading</label>
                        <input type="text" name="hero_heading" value="<?= e($sections['hero']['heading']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Hero Subtitle / Mission Statement</label>
                    <textarea name="hero_subheading" rows="2"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['hero']['subheading']) ?></textarea>
                </div>

                <!-- Hero Background Image Upload -->
                <div class="p-4 bg-slate-950/60 border border-slate-800 rounded-xl space-y-3">
                    <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold">Hero Background Photo / Image</label>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="w-32 h-20 bg-slate-900 border border-slate-700 rounded-lg overflow-hidden shrink-0">
                            <?php 
                                $heroImgSrc = $sections['hero']['image'] ?? '';
                                $heroDisplay = str_starts_with($heroImgSrc, 'http') ? $heroImgSrc : (str_starts_with($heroImgSrc, '/public/') ? url($heroImgSrc) : asset($heroImgSrc));
                            ?>
                            <img src="<?= $heroDisplay ?>" alt="Hero Image Preview" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 space-y-2">
                            <input type="file" name="hero_image" accept="image/*"
                                   class="text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                            <input type="text" name="hero_image_manual" value="<?= e($sections['hero']['image']) ?>" placeholder="Or enter image URL / relative path"
                                   class="w-full bg-slate-900 border border-slate-800 rounded-lg px-3 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none font-mono">
                            <span class="text-[10px] text-slate-500 block">Recommended size: 1920x800 (WebP/JPG). Current path: <?= e($sections['hero']['image']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sanctuary Overview Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Company Sanctuary Overview &amp; Visual
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Featured visual with enquiry hotlines and narrative philosophy on Brajwas.
                    </p>
                </div>

                <!-- Sanctuary Visual Upload & Hotline -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
                    <div class="lg:col-span-5 p-4 bg-slate-950/60 border border-slate-800 rounded-xl space-y-3">
                        <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold">Featured Sanctuary Photo</label>
                        <div class="w-full aspect-[4/3] bg-slate-900 border border-slate-700 rounded-lg overflow-hidden">
                            <?php 
                                $sancImgSrc = $sections['overview']['sanctuary_image'] ?? '';
                                $sancDisplay = str_starts_with($sancImgSrc, 'http') ? $sancImgSrc : (str_starts_with($sancImgSrc, '/public/') ? url($sancImgSrc) : asset($sancImgSrc));
                            ?>
                            <img src="<?= $sancDisplay ?>" alt="Sanctuary Visual Preview" class="w-full h-full object-cover">
                        </div>
                        <input type="file" name="sanctuary_image" accept="image/*"
                               class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                        <input type="text" name="sanctuary_image_manual" value="<?= e($sections['overview']['sanctuary_image']) ?>" placeholder="Image URL / path"
                               class="w-full bg-slate-900 border border-slate-800 rounded-lg px-3 py-1.5 text-xs text-slate-300 font-mono focus:border-amber-400 focus:outline-none">
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Image Alt Text</label>
                            <input type="text" name="sanctuary_image_alt" value="<?= e($sections['overview']['sanctuary_image_alt']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white">
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Overview Badge / Tag</label>
                                <input type="text" name="overview_badge" value="<?= e($sections['overview']['badge']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Title</label>
                                <input type="text" name="overview_title" value="<?= e($sections['overview']['title']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Enquire Hotline 1</label>
                                <input type="text" name="overview_phone_1" value="<?= e($sections['overview']['phone_1']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Enquire Hotline 2</label>
                                <input type="text" name="overview_phone_2" value="<?= e($sections['overview']['phone_2']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Story Paragraph 1 (HTML allowed)</label>
                            <textarea name="overview_p1" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['overview']['p1']) ?></textarea>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Story Paragraph 2 (Brajwas concept)</label>
                            <textarea name="overview_p2" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['overview']['p2']) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Callout Box -->
                <div class="p-4 bg-slate-950/60 border border-slate-800 rounded-xl space-y-3">
                    <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold">Highlighted Callout Box ("Why Devotees Trust Us")</label>
                    <div>
                        <label class="block text-[10px] uppercase text-slate-400 mb-1">Callout Title</label>
                        <input type="text" name="callout_title" value="<?= e($sections['overview']['callout_title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Callout Paragraph 1 (10+ Years)</label>
                            <textarea name="callout_p1" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white resize-y"><?= e($sections['overview']['callout_p1']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Callout Paragraph 2 (Families Served)</label>
                            <textarea name="callout_p2" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white resize-y"><?= e($sections['overview']['callout_p2']) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 2: TRUST METRICS & MISSION / VISION
             ============================================================ -->
        <div x-show="activeTab === 'metrics_principles'" class="space-y-6">

            <!-- 4 Metrics Grid -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Trust &amp; Heritage Metrics (4 Items)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Appears directly below the overview story on the About Us page.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">✦ Metric <?= $i + 1 ?></span>
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Value (e.g. 10+, 100%, 3,000+)</label>
                                <input type="text" name="metric_<?= $i ?>_val" value="<?= e($sections['metrics'][$i]['val'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-sm font-mono text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Label (e.g. Years Heritage)</label>
                                <input type="text" name="metric_<?= $i ?>_label" value="<?= e($sections['metrics'][$i]['label'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Guiding Principles (Mission & Vision) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Guiding Principles: Purpose &amp; Aspiration
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        The Mission &amp; Vision cards with iconic badges and dual-paragraph commitments.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Eyebrow</label>
                        <input type="text" name="principles_eyebrow" value="<?= e($sections['principles']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Headline</label>
                        <input type="text" name="principles_title" value="<?= e($sections['principles']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-2">
                    <!-- Mission Card -->
                    <div class="p-5 rounded-2xl bg-slate-950/70 border border-slate-800 space-y-4">
                        <div class="flex items-center gap-3 border-b border-slate-800/80 pb-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-amber-400">Our Mission Card</h4>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Symbol / Icon</label>
                                <input type="text" name="mission_icon" value="<?= e($sections['principles']['mission_icon']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white text-center font-bold">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Badge Subtitle</label>
                                <input type="text" name="mission_badge" value="<?= e($sections['principles']['mission_badge']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Card Title</label>
                            <input type="text" name="mission_title" value="<?= e($sections['principles']['mission_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-medium">
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Mission Paragraph 1</label>
                            <textarea name="mission_p1" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white resize-y"><?= e($sections['principles']['mission_p1']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Mission Paragraph 2</label>
                            <textarea name="mission_p2" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white resize-y"><?= e($sections['principles']['mission_p2']) ?></textarea>
                        </div>
                    </div>

                    <!-- Vision Card -->
                    <div class="p-5 rounded-2xl bg-slate-950/70 border border-slate-800 space-y-4">
                        <div class="flex items-center gap-3 border-b border-slate-800/80 pb-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-amber-400">Our Vision Card</h4>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Symbol / Icon</label>
                                <input type="text" name="vision_icon" value="<?= e($sections['principles']['vision_icon']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white text-center font-bold">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Badge Subtitle</label>
                                <input type="text" name="vision_badge" value="<?= e($sections['principles']['vision_badge']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Card Title</label>
                            <input type="text" name="vision_title" value="<?= e($sections['principles']['vision_title']) ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-medium">
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Vision Paragraph 1</label>
                            <textarea name="vision_p1" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white resize-y"><?= e($sections['principles']['vision_p1']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase text-slate-400 mb-1">Vision Paragraph 2</label>
                            <textarea name="vision_p2" rows="3"
                                      class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white resize-y"><?= e($sections['principles']['vision_p2']) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 3: LEADERSHIP & FOUNDERS' PHOTOS & BIOS
             ============================================================ -->
        <div x-show="activeTab === 'leadership'" class="space-y-6">

            <!-- Founder 1: Vinay Kumar Chauhan -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3 flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                            Leader 1: Vinay Kumar Chauhan
                        </h3>
                        <p class="text-xs text-slate-400 mt-1">Co-Founder &amp; Managing Partner profile, portrait photo, and perspective message.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    <!-- Photo Column -->
                    <div class="lg:col-span-4 p-4 bg-slate-950/60 border border-slate-800 rounded-xl space-y-3">
                        <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold">Portrait Photo</label>
                        <div class="aspect-[4/5] bg-slate-900 border border-slate-700 rounded-xl overflow-hidden shadow-inner">
                            <?php 
                                $l1Img = $sections['leadership']['leader1_photo'] ?? '';
                                $l1Display = str_starts_with($l1Img, 'http') ? $l1Img : (str_starts_with($l1Img, '/public/') ? url($l1Img) : asset($l1Img));
                            ?>
                            <img src="<?= $l1Display ?>" alt="Vinay Kumar Chauhan" class="w-full h-full object-cover object-top">
                        </div>
                        <input type="file" name="leader1_photo" accept="image/*"
                               class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                        <input type="text" name="leader1_photo_manual" value="<?= e($sections['leadership']['leader1_photo']) ?>" placeholder="Photo path"
                               class="w-full bg-slate-900 border border-slate-800 rounded px-2.5 py-1 text-xs text-slate-300 font-mono">
                    </div>

                    <!-- Details Column -->
                    <div class="lg:col-span-8 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Full Name</label>
                                <input type="text" name="leader1_name" value="<?= e($sections['leadership']['leader1_name']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none font-medium">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Designation / Role</label>
                                <input type="text" name="leader1_role" value="<?= e($sections['leadership']['leader1_role']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow / Category</label>
                                <input type="text" name="leader1_eyebrow" value="<?= e($sections['leadership']['leader1_eyebrow']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Perspective Headline / Quote</label>
                                <input type="text" name="leader1_headline" value="<?= e($sections['leadership']['leader1_headline']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none font-medium">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 1 (Belief / Philosophy)</label>
                            <textarea name="leader1_p1" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader1_p1']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 2 (Braj Market Understanding)</label>
                            <textarea name="leader1_p2" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader1_p2']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 3 (Team &amp; Partners Commitment)</label>
                            <textarea name="leader1_p3" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader1_p3']) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Founder 2: Rakesh Chaudhary -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3 flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                            Leader 2: Rakesh Chaudhary
                        </h3>
                        <p class="text-xs text-slate-400 mt-1">Co-Founder &amp; Managing Partner profile, portrait photo, and strategic vision message.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    <!-- Photo Column -->
                    <div class="lg:col-span-4 p-4 bg-slate-950/60 border border-slate-800 rounded-xl space-y-3">
                        <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold">Portrait Photo</label>
                        <div class="aspect-[4/5] bg-slate-900 border border-slate-700 rounded-xl overflow-hidden shadow-inner">
                            <?php 
                                $l2Img = $sections['leadership']['leader2_photo'] ?? '';
                                $l2Display = str_starts_with($l2Img, 'http') ? $l2Img : (str_starts_with($l2Img, '/public/') ? url($l2Img) : asset($l2Img));
                            ?>
                            <img src="<?= $l2Display ?>" alt="Rakesh Chaudhary" class="w-full h-full object-cover object-top">
                        </div>
                        <input type="file" name="leader2_photo" accept="image/*"
                               class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-400 file:text-slate-950 hover:file:bg-amber-300 cursor-pointer">
                        <input type="text" name="leader2_photo_manual" value="<?= e($sections['leadership']['leader2_photo']) ?>" placeholder="Photo path"
                               class="w-full bg-slate-900 border border-slate-800 rounded px-2.5 py-1 text-xs text-slate-300 font-mono">
                    </div>

                    <!-- Details Column -->
                    <div class="lg:col-span-8 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Full Name</label>
                                <input type="text" name="leader2_name" value="<?= e($sections['leadership']['leader2_name']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none font-medium">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Designation / Role</label>
                                <input type="text" name="leader2_role" value="<?= e($sections['leadership']['leader2_role']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow / Category</label>
                                <input type="text" name="leader2_eyebrow" value="<?= e($sections['leadership']['leader2_eyebrow']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Perspective Headline / Quote</label>
                                <input type="text" name="leader2_headline" value="<?= e($sections['leadership']['leader2_headline']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none font-medium">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 1 (Smart Future &amp; Opportunity)</label>
                            <textarea name="leader2_p1" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader2_p1']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 2 (Infrastructure &amp; Enclave Benchmarks)</label>
                            <textarea name="leader2_p2" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader2_p2']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Message Paragraph 3 (Honesty Bedrock &amp; Gratitude)</label>
                            <textarea name="leader2_p3" rows="2"
                                      class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['leadership']['leader2_p3']) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 4: CAPABILITIES & WHY CHOOSE US
             ============================================================ -->
        <div x-show="activeTab === 'capabilities_why'" class="space-y-6">

            <!-- Capabilities Section (4 Cards) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Our Capabilities &amp; Strategic Insights
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">4 core operational strengths displayed in a 2x2 grid.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow</label>
                        <input type="text" name="cap_eyebrow" value="<?= e($sections['capabilities']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Title</label>
                        <input type="text" name="cap_title" value="<?= e($sections['capabilities']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Capabilities Subtitle</label>
                    <textarea name="cap_subtitle" rows="2"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['capabilities']['subtitle']) ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <div>
                                <label class="block text-[10px] uppercase text-amber-400 font-bold mb-1">Card <?= $i + 1 ?> Title / Number Tag</label>
                                <input type="text" name="cap_<?= $i ?>_tag" value="<?= e($sections['capabilities']['items'][$i]['tag'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-medium">
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Description</label>
                                <textarea name="cap_<?= $i ?>_desc" rows="3"
                                          class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white resize-y"><?= e($sections['capabilities']['items'][$i]['desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Why Choose Us (4 Cards) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Why Choose Us Section (The Gleamrealty Difference)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">4 distinct value pillars highlighting exclusivity, research, advisory, and integrity.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Eyebrow</label>
                        <input type="text" name="why_eyebrow" value="<?= e($sections['why_choose']['eyebrow']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Section Title</label>
                        <input type="text" name="why_title" value="<?= e($sections['why_choose']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Why Choose Us Subtitle</label>
                    <textarea name="why_subtitle" rows="2"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['why_choose']['subtitle']) ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label class="block text-[10px] uppercase text-amber-400 font-bold mb-1">Tag / Badge</label>
                                    <input type="text" name="why_<?= $i ?>_tag" value="<?= e($sections['why_choose']['items'][$i]['tag'] ?? '') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2 py-1 text-xs text-white">
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-[10px] uppercase text-slate-400 mb-1">Pillar Title</label>
                                    <input type="text" name="why_<?= $i ?>_title" value="<?= e($sections['why_choose']['items'][$i]['title'] ?? '') ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-medium">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase text-slate-400 mb-1">Description</label>
                                <textarea name="why_<?= $i ?>_desc" rows="3"
                                          class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white resize-y"><?= e($sections['why_choose']['items'][$i]['desc'] ?? '') ?></textarea>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 5: FREE SITE VISIT DESK & SEO METADATA
             ============================================================ -->
        <div x-show="activeTab === 'consult_seo'" class="space-y-6">

            <!-- Site Visit Section Header & Hotlines -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Free Site Visit / Darshan Consultation Form Header
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Header copy and direct desk numbers displayed at the bottom booking card of the About Us page.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Badge Tag</label>
                        <input type="text" name="consult_badge" value="<?= e($sections['consultation']['badge']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                        <input type="text" name="consult_title" value="<?= e($sections['consultation']['title']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle</label>
                    <textarea name="consult_subtitle" rows="2"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['consultation']['subtitle']) ?></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Desk Hotline 1</label>
                        <input type="text" name="consult_phone_1" value="<?= e($sections['consultation']['phone_1']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Desk Hotline 2</label>
                        <input type="text" name="consult_phone_2" value="<?= e($sections['consultation']['phone_2']) ?>"
                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- SEO & Meta Tags -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        SEO &amp; OpenGraph Metadata
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Search engine titles, meta description, and keywords for ranking /about-us on Google and social shares.
                    </p>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Meta Title (Browser Tab &amp; Google)</label>
                    <input type="text" name="meta_title" value="<?= e($sections['seo']['meta_title'] ?? 'About Us, Know About GLEAMREALTY PRIVATE LIMITED') ?>"
                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none resize-y"><?= e($sections['seo']['meta_description'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Meta Keywords (Comma separated)</label>
                    <input type="text" name="meta_keywords" value="<?= e($sections['seo']['meta_keywords'] ?? '') ?>"
                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                </div>
            </div>

        </div>

        <!-- Sticky Submit Toolbar on Mobile/Desktop -->
        <div class="flex items-center justify-between p-4 bg-slate-900 border border-slate-800 rounded-xl shadow-lg">
            <span class="text-xs text-slate-400">Ready to publish changes to the live About Us page?</span>
            <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>

    </form>

</div>
