<div class="max-w-6xl mx-auto space-y-6 pb-20" x-data="{ activeTab: 'metrics' }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-amber-400 shadow-md shadow-amber-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">Homepage Content CMS</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Edit all homepage sections below the hero: 5 Trust Metrics, About Section &amp; Featured Video, 4 Photographic Highlights, Properties &amp; News Headers, and Enquiry Banner.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Site</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="homeSectionsForm"
                    class="px-5 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </div>

    <!-- Quick Navigation Banner -->
    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800 flex items-center justify-between text-xs text-slate-400">
        <span>Managing sections below the hero. Looking to edit the Hero section?</span>
        <a href="<?= url('/admin/hero') ?>" class="text-amber-400 hover:underline font-semibold inline-flex items-center gap-1">
            <span>Go to Hero Showcase Manager</span>
            <span>&rarr;</span>
        </a>
    </div>

    <!-- Navigation Pills / Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-800/80">
        <button type="button" @click="activeTab = 'metrics'"
                :class="activeTab === 'metrics' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            1. 5 Trust Metrics Strip
        </button>
        <button type="button" @click="activeTab = 'about'"
                :class="activeTab === 'about' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            2. About Royal Braj &amp; Video Card
        </button>
        <button type="button" @click="activeTab = 'highlights'"
                :class="activeTab === 'highlights' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            3. Our Highlights (4 Cards)
        </button>
        <button type="button" @click="activeTab = 'headers'"
                :class="activeTab === 'headers' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            4. Properties &amp; News Headers
        </button>
        <button type="button" @click="activeTab = 'enquiry'"
                :class="activeTab === 'enquiry' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            5. Ready to Begin Enquiry Banner
        </button>
    </div>

    <!-- Main Form -->
    <form id="homeSectionsForm" action="<?= url('/admin/home') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- ============================================================
             TAB 1: 5 TRUST METRICS STRIP (POST-HERO)
             ============================================================ -->
        <div x-show="activeTab === 'metrics'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        5 Trust &amp; Performance Metrics Strip (Positioned Directly Below Hero)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        These 5 key performance metrics appear across all screens in a clean horizontal strip with icons and bold font-mono numbers.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <?php
                        $metricsData = [
                            1 => ['val' => $sections['metrics']['m1_val'] ?? '250+', 'sub' => $sections['metrics']['m1_sub'] ?? 'Happy Families', 'default_val' => '250+', 'default_sub' => 'Happy Families'],
                            2 => ['val' => $sections['metrics']['m2_val'] ?? '50+ Acres', 'sub' => $sections['metrics']['m2_sub'] ?? 'Land Bank', 'default_val' => '50+ Acres', 'default_sub' => 'Land Bank'],
                            3 => ['val' => $sections['metrics']['m3_val'] ?? '20+ World Class', 'sub' => $sections['metrics']['m3_sub'] ?? 'Amenities', 'default_val' => '20+ World Class', 'default_sub' => 'Amenities'],
                            4 => ['val' => $sections['metrics']['m4_val'] ?? '100%', 'sub' => $sections['metrics']['m4_sub'] ?? 'Clear Titles', 'default_val' => '100%', 'default_sub' => 'Clear Titles'],
                            5 => ['val' => $sections['metrics']['m5_val'] ?? 'Prime', 'sub' => $sections['metrics']['m5_sub'] ?? 'Location', 'default_val' => 'Prime', 'default_sub' => 'Location'],
                        ];
                    ?>
                    <?php foreach ($metricsData as $num => $m): ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <div class="text-xs font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                                <span>✦ Metric <?= $num ?></span>
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Value / Number</label>
                                <input type="text" name="m<?= $num ?>_val" value="<?= e($m['val']) ?>"
                                       placeholder="e.g. <?= $m['default_val'] ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono font-bold focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Label Text</label>
                                <input type="text" name="m<?= $num ?>_sub" value="<?= e($m['sub']) ?>"
                                       placeholder="e.g. <?= $m['default_sub'] ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- ============================================================
             TAB 2: ABOUT ROYAL BRAJ HAVELI & FEATURED VIDEO
             ============================================================ -->
        <div x-show="activeTab === 'about'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        About Royal Braj Haveli Section
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Left column narrative story with 4 feature cards, plus the right column Featured Video Card with gate graphic &amp; YouTube popup modal.
                    </p>
                </div>

                <!-- Story Headers & Paragraph -->
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold mb-1">Eyebrow</label>
                            <input type="text" name="about_eyebrow"
                                   value="<?= e($sections['about']['eyebrow'] ?? 'ABOUT ROYAL BRAJ HAVELI') ?>"
                                   class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Title</label>
                            <input type="text" name="about_title"
                                   value="<?= e($sections['about']['title'] ?? 'The Sanctity of Braj Bhumi') ?>"
                                   class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Subtitle</label>
                            <input type="text" name="about_subtitle"
                                   value="<?= e($sections['about']['subtitle'] ?? 'A home where spirituality meets modern living') ?>"
                                   class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Narrative Paragraph</label>
                        <textarea name="about_p1" rows="3"
                                  class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['about']['p1'] ?? 'Royal Braj Haveli Residences is not merely a residential project; it is a celebration of land, culture and eternal legacy. Located in the sacred town of Vrindavan, this premium development offers a peaceful and dignified lifestyle surrounded by greenery, temples and divine energy.') ?></textarea>
                    </div>
                </div>

                <!-- 4 Feature Cards (2x2 Grid) -->
                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">
                        ✦ 4 Feature Cards (2x2 Matrix)
                    </span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php 
                            $features = $sections['about']['features'] ?? [
                                ['title' => 'Spiritual Environment', 'desc' => 'Live close to temples and sacred sites', 'icon' => 'lotus'],
                                ['title' => 'Modern Amenities', 'desc' => 'A perfect blend of tradition & comfort', 'icon' => 'villa'],
                                ['title' => 'Green & Serene Living', 'desc' => 'Lush landscapes and open spaces', 'icon' => 'tree'],
                                ['title' => 'Strong Investment Potential', 'desc' => 'In a rapidly growing spiritual destination', 'icon' => 'chart'],
                            ];
                        ?>
                        <?php for ($f = 0; $f < 4; $f++): ?>
                            <?php $ft = $features[$f] ?? ['title' => '', 'desc' => '', 'icon' => 'lotus']; ?>
                            <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-semibold text-amber-400">Card <?= $f + 1 ?></span>
                                    <select name="feature_<?= $f ?>_icon"
                                            class="bg-slate-900 border border-slate-700 rounded px-2 py-1 text-[11px] text-white focus:border-amber-400 focus:outline-none">
                                        <option value="lotus" <?= ($ft['icon'] === 'lotus') ? 'selected' : '' ?>>Icon: Lotus / Spiritual</option>
                                        <option value="villa" <?= ($ft['icon'] === 'villa') ? 'selected' : '' ?>>Icon: Villa / House</option>
                                        <option value="tree" <?= ($ft['icon'] === 'tree') ? 'selected' : '' ?>>Icon: Tree / Green</option>
                                        <option value="chart" <?= ($ft['icon'] === 'chart') ? 'selected' : '' ?>>Icon: Chart / Investment</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                                    <input type="text" name="feature_<?= $f ?>_title" value="<?= e($ft['title']) ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Description</label>
                                    <input type="text" name="feature_<?= $f ?>_desc" value="<?= e($ft['desc']) ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Right Column: Featured Video Card with Shri Vrindavan Gate -->
                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">
                        ✦ Right Column: Featured Video Card (Shri Vrindavan Gate Graphic &amp; Modal)
                    </span>

                    <?php $vc = $sections['about']['video_card'] ?? ['image' => 'uploads/hero/vrindavan_gate_hd.jpg', 'badge' => 'Featured Video', 'title' => 'Shri Vrinda Awaits You', 'desc' => 'Take a virtual tour and experience the beauty, serenity and spirituality of Braj.', 'video_url' => 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1']; ?>
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <div class="aspect-[4/3] rounded-lg overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img src="<?= asset($vc['image']) ?>" alt="Video Gate Preview" class="w-full h-full object-cover">
                                <span class="absolute bottom-2 left-2 px-2 py-0.5 rounded bg-black/70 text-[10px] text-white">Current Graphic</span>
                            </div>

                            <div class="md:col-span-2 space-y-3">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Badge</label>
                                        <input type="text" name="video_card_badge" value="<?= e($vc['badge']) ?>"
                                               class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-amber-400 font-bold focus:border-amber-400 focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Card Title</label>
                                        <input type="text" name="video_card_title" value="<?= e($vc['title']) ?>"
                                               class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Description</label>
                                    <input type="text" name="video_card_desc" value="<?= e($vc['desc']) ?>"
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Upload Gate Graphic</label>
                                        <input type="file" name="video_card_file" accept="image/*"
                                               class="w-full text-xs text-slate-400 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 cursor-pointer">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Or Graphic Path</label>
                                        <input type="text" name="video_card_image" value="<?= e($vc['image']) ?>"
                                               class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">YouTube Video URL</label>
                                    <input type="text" name="video_card_url" value="<?= e($vc['video_url']) ?>"
                                           placeholder="https://youtu.be/... or https://www.youtube.com/watch?v=..."
                                           class="w-full bg-slate-900 border border-slate-700 rounded px-3 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 3: OUR HIGHLIGHTS (4 PHOTOGRAPHIC CARDS)
             ============================================================ -->
        <div x-show="activeTab === 'highlights'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Our Highlights (4 Photographic Category Cards)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Configure the section header, View All link, and the 4 photographic category cards (Commercial Plots, Villas, Plots, Flats).
                    </p>
                </div>

                <!-- Section Headers -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-amber-400 mb-1">Eyebrow</label>
                        <input type="text" name="highlights_eyebrow"
                               value="<?= e($sections['highlights']['eyebrow'] ?? 'OUR HIGHLIGHTS') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                        <input type="text" name="highlights_title"
                               value="<?= e($sections['highlights']['title'] ?? 'A glimpse of what makes Royal Braj Haveli special') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Text</label>
                        <input type="text" name="highlights_btn_text"
                               value="<?= e($sections['highlights']['btn_text'] ?? 'VIEW ALL PROJECTS') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Link</label>
                        <input type="text" name="highlights_btn_link"
                               value="<?= e($sections['highlights']['btn_link'] ?? '/projects') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                    </div>
                </div>

                <!-- 4 Highlight Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-4 border-t border-slate-800">
                    <?php
                        $hlCards = $sections['highlights']['cards'] ?? [
                            'commercial' => ['title' => 'COMMERCIAL PLOTS', 'link' => '/location/mathura', 'image' => 'uploads/projects/highlight_commercial_hd.jpg'],
                            'villa' => ['title' => 'VILLAS', 'link' => '/luxury-villas-in-vrindavan', 'image' => 'uploads/projects/highlight_villas_hd.jpg'],
                            'plot' => ['title' => 'PLOTS', 'link' => '/residential-plots-in-vrindavan', 'image' => 'uploads/projects/highlight_plots_hd.jpg'],
                            'flat' => ['title' => 'FLATS', 'link' => '/flats-apartments-in-vrindavan', 'image' => 'uploads/projects/highlight_flats_hd.jpg'],
                        ];
                    ?>
                    <?php foreach (['commercial', 'villa', 'plot', 'flat'] as $k): ?>
                        <?php $c = $hlCards[$k] ?? ['title' => strtoupper($k), 'link' => '/projects', 'image' => '']; ?>
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">✦ <?= ucfirst($k) ?></span>

                            <!-- Preview -->
                            <div class="aspect-[16/11] rounded-lg overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img src="<?= asset($c['image']) ?>" alt="Card Preview" class="w-full h-full object-cover">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                                <input type="text" name="highlight_<?= $k ?>_title" value="<?= e($c['title']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Link URL</label>
                                <input type="text" name="highlight_<?= $k ?>_link" value="<?= e($c['link']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Upload Photo</label>
                                <input type="file" name="highlight_<?= $k ?>_file" accept="image/*"
                                       class="w-full text-xs text-slate-400 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 cursor-pointer">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Image Path</label>
                                <input type="text" name="highlight_<?= $k ?>_image" value="<?= e($c['image']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2 py-1 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 4: PROPERTIES & NEWS HEADERS
             ============================================================ -->
        <div x-show="activeTab === 'headers'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <!-- Properties Header -->
                <div class="border-b border-slate-800 pb-5 space-y-4">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Explore Our Properties Section Header
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-amber-400 mb-1">Eyebrow</label>
                            <input type="text" name="prop_eyebrow"
                                   value="<?= e($sections['properties_header']['eyebrow'] ?? 'EXPLORE OUR PROPERTIES') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                            <input type="text" name="prop_title"
                                   value="<?= e($sections['properties_header']['title'] ?? 'Sanctuaries for the Discerning') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle</label>
                        <textarea name="prop_subtitle" rows="2"
                                  class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none"><?= e($sections['properties_header']['subtitle'] ?? 'Discover a range of thoughtfully designed properties in and around Vrindavan. Each project is created to offer peace, prosperity and a higher way of living.') ?></textarea>
                    </div>

                    <!-- Featured Properties on Homepage Selector -->
                    <div class="pt-4 border-t border-slate-800/80 space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">
                                    ✦ Select Featured Properties Shown on Homepage
                                </span>
                                <p class="text-[11px] text-slate-400 mt-0.5">
                                    Check the properties you wish to highlight on the homepage (typically 4). If none are checked, latest active projects will be displayed automatically.
                                </p>
                            </div>
                            <a href="<?= url('/admin/projects/create') ?>" target="_blank" class="text-xs text-amber-400 hover:text-amber-300 font-semibold underline">
                                + Add New Project
                            </a>
                        </div>

                        <?php 
                            $selectedFeatured = $sections['featured_project_ids'] ?? [];
                            if (!is_array($selectedFeatured)) {
                                $selectedFeatured = [];
                            }
                        ?>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-1">
                            <?php foreach (($all_projects ?? []) as $prj): ?>
                                <?php 
                                    $isFeat = in_array((int)$prj['id'], array_map('intval', $selectedFeatured), true);
                                    $pImg = \App\Models\Project::getHeroImage((int)$prj['id']);
                                ?>
                                <label class="flex items-start gap-3 p-3 rounded-lg border cursor-pointer transition-all <?= $isFeat ? 'bg-amber-500/10 border-amber-400/60 shadow-md' : 'bg-slate-950/70 border-slate-800 hover:border-slate-700' ?>">
                                    <input type="checkbox" name="featured_project_ids[]" value="<?= $prj['id'] ?>" <?= $isFeat ? 'checked' : '' ?>
                                           class="mt-1 w-4 h-4 rounded text-amber-500 bg-slate-900 border-slate-700 focus:ring-amber-400">
                                    <div class="w-12 h-12 rounded bg-slate-900 overflow-hidden shrink-0 border border-slate-800">
                                        <img src="<?= media_url($pImg) ?>" alt="<?= e($prj['name']) ?>" class="w-full h-full object-cover">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs font-bold text-white truncate"><?= e($prj['name']) ?></div>
                                        <div class="text-[11px] text-slate-400 truncate"><?= e($prj['location']) ?></div>
                                        <div class="flex items-center gap-1.5 mt-1">
                                            <span class="text-[10px] px-1.5 py-0.5 rounded bg-slate-800 text-amber-300 border border-slate-700 font-mono"><?= e($prj['project_type']) ?></span>
                                            <span class="text-[10px] text-slate-300 font-semibold"><?= e($prj['starting_price'] ?: 'POR') ?></span>
                                        </div>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- News Header -->
                <div class="space-y-4 pt-2">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Latest News &amp; Updates Section Header
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-amber-400 mb-1">Eyebrow</label>
                            <input type="text" name="news_eyebrow"
                                   value="<?= e($sections['news_header']['eyebrow'] ?? 'LATEST NEWS & UPDATES') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Title</label>
                            <input type="text" name="news_title"
                                   value="<?= e($sections['news_header']['title'] ?? 'Market Intelligence & Project Milestones') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Text</label>
                            <input type="text" name="news_btn_text"
                                   value="<?= e($sections['news_header']['btn_text'] ?? 'VIEW ALL UPDATES') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Link</label>
                            <input type="text" name="news_btn_link"
                                   value="<?= e($sections['news_header']['btn_link'] ?? '/blog') ?>"
                                   class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 5: READY TO BEGIN ENQUIRY BANNER
             ============================================================ -->
        <div x-show="activeTab === 'enquiry'" class="space-y-6">
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Ready to Begin? Lead Enquiry Banner
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        Configure the sacred temple artwork, headline, subtitle, and 3 trust points on the lead inquiry section.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                    <!-- Artwork Graphic Preview & Upload -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-3">
                        <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">✦ Sacred Temple Artwork</span>
                        <div class="w-24 h-24 rounded-xl overflow-hidden bg-white p-2 border border-slate-700 mx-auto">
                            <img src="<?= asset($sections['enquiry_banner']['watermark_image'] ?? 'uploads/projects/temple_watermark.jpg') ?>"
                                 alt="Artwork Preview" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Upload Graphic</label>
                            <input type="file" name="watermark_file" accept="image/*"
                                   class="w-full text-xs text-slate-400 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Image Path</label>
                            <input type="text" name="watermark_image"
                                   value="<?= e($sections['enquiry_banner']['watermark_image'] ?? 'uploads/projects/temple_watermark.jpg') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <!-- Headlines & Trust Points -->
                    <div class="md:col-span-2 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold mb-1">Eyebrow</label>
                                <input type="text" name="enquiry_eyebrow"
                                       value="<?= e($sections['enquiry_banner']['eyebrow'] ?? 'READY TO BEGIN?') ?>"
                                       class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Title (Supports &lt;br&gt;)</label>
                                <input type="text" name="enquiry_title"
                                       value="<?= e($sections['enquiry_banner']['title'] ?? "Enquire About<br>Your Dream Property") ?>"
                                       class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Subtitle</label>
                            <input type="text" name="enquiry_subtitle"
                                   value="<?= e($sections['enquiry_banner']['subtitle'] ?? 'Fill out the form and our team will get in touch with you shortly.') ?>"
                                   class="w-full bg-slate-950/80 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div class="pt-2">
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-2">3 Trust Points Checkmarks</label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <input type="text" name="enquiry_check_1"
                                           value="<?= e($sections['enquiry_banner']['check_1'] ?? 'Quick Response') ?>"
                                           placeholder="Point 1"
                                           class="w-full bg-slate-950/80 border border-slate-700 rounded px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <input type="text" name="enquiry_check_2"
                                           value="<?= e($sections['enquiry_banner']['check_2'] ?? 'Expert Assistance') ?>"
                                           placeholder="Point 2"
                                           class="w-full bg-slate-950/80 border border-slate-700 rounded px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                                <div>
                                    <input type="text" name="enquiry_check_3"
                                           value="<?= e($sections['enquiry_banner']['check_3'] ?? 'No Obligation') ?>"
                                           placeholder="Point 3"
                                           class="w-full bg-slate-950/80 border border-slate-700 rounded px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
</div>
