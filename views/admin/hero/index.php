<div class="max-w-6xl mx-auto space-y-6 pb-20" x-data="{ activeTab: 'visual' }">

    <!-- Top Header & Live Site Link -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-amber-400 shadow-md shadow-amber-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">Homepage Hero Showcase Manager</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Customize the Palatial Haveli hero presentation, grand headlines, dual CTAs, video tour, and 3 glassmorphic cards as per current home page design.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Site</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="heroForm"
                    class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save Hero Changes</span>
            </button>
        </div>
    </div>

    <!-- Quick Navigation Banner -->
    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800 flex items-center justify-between text-xs text-slate-400">
        <span>Managing the Homepage Hero section. Looking to edit trust metrics, About section, and property highlights?</span>
        <a href="<?= url('/admin/home') ?>" class="text-amber-400 hover:underline font-semibold inline-flex items-center gap-1">
            <span>Go to Homepage Content CMS</span>
            <span>&rarr;</span>
        </a>
    </div>

    <!-- Navigation Pills / Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-1 border-b border-slate-800/80">
        <button type="button" @click="activeTab = 'visual'"
                :class="activeTab === 'visual' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2.5 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span>1. Hero Background Image &amp; Visuals</span>
        </button>
        <button type="button" @click="activeTab = 'typography'"
                :class="activeTab === 'typography' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2.5 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            <span>2. Headlines &amp; Typography</span>
        </button>
        <button type="button" @click="activeTab = 'ctas'"
                :class="activeTab === 'ctas' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2.5 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>3. Action Buttons &amp; Video Tour</span>
        </button>
        <button type="button" @click="activeTab = 'cards'"
                :class="activeTab === 'cards' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2.5 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span>4. Bottom 3 Feature Cards</span>
        </button>
    </div>

    <!-- Flash Messages -->
    <?php if ($flash = flash('success')): ?>
        <div class="p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 mb-6">
            <?= $flash ?>
        </div>
    <?php endif; ?>
    <?php if ($flash = flash('error')): ?>
        <div class="p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 mb-6">
            <?= $flash ?>
        </div>
    <?php endif; ?>

    <!-- Main Form -->
    <form id="heroForm" action="<?= url('/admin/hero') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- ============================================================
             TAB 1: HERO BACKGROUND IMAGE & VISUALS (UPLOAD SECTION)
             ============================================================ -->
        <div x-show="activeTab === 'visual'" class="space-y-6">
            <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <div>
                        <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                            Hero Background Visual &amp; Image Upload
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">
                            Upload a high-resolution hero background image or pick from curated Braj architecture presets.
                        </p>
                    </div>
                    <label class="inline-flex items-center gap-2 text-xs font-semibold text-slate-300 cursor-pointer bg-slate-950 px-3 py-1.5 rounded-lg border border-slate-800">
                        <input type="checkbox" name="is_enabled" value="1" <?= ($hero['is_enabled'] ?? true) ? 'checked' : '' ?>
                               class="rounded bg-slate-950 border-slate-700 text-amber-400 focus:ring-0">
                        <span>Show Hero on Home Page</span>
                    </label>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                    
                    <!-- Left Column: Current Image Preview -->
                    <div class="lg:col-span-5 space-y-3">
                        <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold">
                            Current Hero Background Image
                        </label>
                        <div class="aspect-[16/10] rounded-xl overflow-hidden bg-slate-950 border border-slate-700/80 shadow-inner relative group">
                            <?php 
                                $currentBg = !empty($hero['bg_image']) ? $hero['bg_image'] : 'uploads/hero/hero_braj_haveli_hd.jpg';
                            ?>
                            <img id="heroBgPreviewImg"
                                 src="<?= asset($currentBg) ?>"
                                 alt="Current Hero Background"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-3">
                                <span id="heroBgPreviewLabel" class="text-[11px] text-white/90 font-mono truncate">
                                    <?= basename($currentBg) ?>
                                </span>
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-500">Live preview of the image placed behind the home hero headlines.</p>
                    </div>

                    <!-- Right Column: Upload Controls & Presets -->
                    <div class="lg:col-span-7 space-y-5">
                        
                        <!-- Upload New Image File Input -->
                        <div class="p-5 rounded-xl bg-slate-950/80 border border-amber-500/30 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    Upload New Background Photo
                                </span>
                                <span class="text-[10px] text-slate-400 font-mono">JPG, PNG, WebP</span>
                            </div>
                            <input type="file" name="bg_file" id="bgFileInput" accept="image/*"
                                   onchange="previewHeroBgFile(this)"
                                   class="w-full text-xs text-slate-400 file:mr-3 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                            <p class="text-[11px] text-slate-500">Selecting a file instantly updates the preview on the left. Recommended: 1920&times;1080px or higher.</p>
                        </div>

                        <!-- Manual Image Path Input -->
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                Or Image Asset Path / URL
                            </label>
                            <input type="text" name="bg_image" id="bgImageInput"
                                   value="<?= e($currentBg) ?>"
                                   oninput="updateHeroBgPreview(this.value)"
                                   placeholder="uploads/hero/hero_braj_haveli_hd.jpg"
                                   class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3.5 py-2.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            <span class="text-[11px] text-slate-500 mt-1 block">Specify relative file path inside public/ or an absolute HTTPS URL.</span>
                        </div>

                        <!-- Curated Architecture Presets -->
                        <div class="space-y-2 pt-1">
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">
                                ✦ Or Choose From Preset Architectural Library
                            </label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <button type="button"
                                        onclick="applyHeroBgPreset('uploads/hero/hero_braj_haveli_hd.jpg', 'Palace Haveli HD')"
                                        class="p-2 rounded-lg bg-slate-950 border border-slate-800 hover:border-amber-400 transition-all text-left cursor-pointer group">
                                    <div class="aspect-[16/10] rounded overflow-hidden bg-slate-900 mb-1">
                                        <img src="<?= asset('uploads/hero/hero_braj_haveli_hd.jpg') ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="text-[10px] font-semibold text-white truncate">Palace Haveli</div>
                                </button>
                                <button type="button"
                                        onclick="applyHeroBgPreset('uploads/hero/hero-haveli-courtyard.webp', 'Courtyard Sanctuary')"
                                        class="p-2 rounded-lg bg-slate-950 border border-slate-800 hover:border-amber-400 transition-all text-left cursor-pointer group">
                                    <div class="aspect-[16/10] rounded overflow-hidden bg-slate-900 mb-1">
                                        <img src="<?= asset('uploads/hero/hero-haveli-courtyard.webp') ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="text-[10px] font-semibold text-white truncate">Courtyard</div>
                                </button>
                                <button type="button"
                                        onclick="applyHeroBgPreset('uploads/hero/hero-braj-sanctuary.webp', 'Braj Bhumi Lotus')"
                                        class="p-2 rounded-lg bg-slate-950 border border-slate-800 hover:border-amber-400 transition-all text-left cursor-pointer group">
                                    <div class="aspect-[16/10] rounded overflow-hidden bg-slate-900 mb-1">
                                        <img src="<?= asset('uploads/hero/hero-braj-sanctuary.webp') ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="text-[10px] font-semibold text-white truncate">Braj Lotus</div>
                                </button>
                                <button type="button"
                                        onclick="applyHeroBgPreset('uploads/hero/hero-vrinda-greens.webp', 'Vrinda Greens')"
                                        class="p-2 rounded-lg bg-slate-950 border border-slate-800 hover:border-amber-400 transition-all text-left cursor-pointer group">
                                    <div class="aspect-[16/10] rounded overflow-hidden bg-slate-900 mb-1">
                                        <img src="<?= asset('uploads/hero/hero-vrinda-greens.webp') ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="text-[10px] font-semibold text-white truncate">Vrinda Greens</div>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 2: HEADLINES & TYPOGRAPHY
             ============================================================ -->
        <div x-show="activeTab === 'typography'" class="space-y-6">
            <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Hero Headlines, Eyebrow &amp; Typography
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Matches the typography of the live home page: Eyebrow badge, Grand Title, serif italic accent, and narrative subtitle.
                    </p>
                </div>

                <!-- Eyebrow Pill -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold mb-1">
                        Eyebrow Pill Badge (Golden Accent)
                    </label>
                    <input type="text" name="eyebrow"
                           value="<?= e($hero['eyebrow'] ?? 'TIMELESS HERITAGE. MODERN LIVING.') ?>"
                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-sm text-white font-medium focus:border-amber-400 focus:outline-none">
                    <span class="text-[11px] text-slate-500 mt-1 block">Displayed in bronze-gold capital letters directly above the grand headline.</span>
                </div>

                <!-- Grand Title (Main + Accent) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Grand Headline (Line 1)
                        </label>
                        <input type="text" name="title_main"
                               value="<?= e($hero['title_main'] ?? 'Royal Braj Haveli') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-sm text-white font-medium focus:border-amber-400 focus:outline-none">
                        <span class="text-[11px] text-slate-500 mt-1 block">e.g. Royal Braj Haveli</span>
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold mb-1">
                            Headline Highlight (Italic Serif Word)
                        </label>
                        <input type="text" name="title_accent"
                               value="<?= e($hero['title_accent'] ?? 'Residences') ?>"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-sm text-amber-400 font-serif italic text-base focus:border-amber-400 focus:outline-none">
                        <span class="text-[11px] text-slate-500 mt-1 block">Styled with editorial italic serif typography (e.g. Residences).</span>
                    </div>
                </div>

                <!-- Subtitle Paragraph -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                        Hero Narrative Subtitle
                    </label>
                    <textarea name="subtitle" rows="3"
                              class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-sm text-white focus:border-amber-400 focus:outline-none"><?= e($hero['subtitle'] ?? 'A rare blend of tradition, tranquility and modern comfort in the divine land of Braj.') ?></textarea>
                    <span class="text-[11px] text-slate-500 mt-1 block">Editorial introduction describing the project beneath the main headline.</span>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 3: ACTION BUTTONS & VIDEO TOUR
             ============================================================ -->
        <div x-show="activeTab === 'ctas'" class="space-y-6">
            <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        Dual Action Buttons &amp; YouTube Virtual Tour
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Configure the primary Explore button and the Watch Video modal popup on the home hero.
                    </p>
                </div>

                <!-- Primary Explore CTA -->
                <div class="p-5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-4">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">
                        ✦ Primary Action Button (Bronze Accent #9A6B2F)
                    </span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Text</label>
                            <input type="text" name="cta_text"
                                   value="<?= e($hero['cta_text'] ?? 'EXPLORE PROJECT') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Target URL / Anchor</label>
                            <input type="text" name="cta_link"
                                   value="<?= e($hero['cta_link'] ?? '#sanctuaries') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Watch Video Button & YouTube Modal -->
                <div class="p-5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-4">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">
                        ✦ Watch Video Button &amp; Virtual Tour Modal Embed
                    </span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Button Text</label>
                            <input type="text" name="video_text"
                                   value="<?= e($hero['video_text'] ?? 'WATCH VIDEO') ?>"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-semibold focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">YouTube Video Link</label>
                            <input type="text" name="video_url"
                                   value="<?= e($hero['video_url'] ?? 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1&mute=0') ?>"
                                   placeholder="https://youtu.be/... or https://www.youtube.com/watch?v=..."
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500">Supports standard YouTube URLs (`https://youtu.be/ID` or `https://www.youtube.com/watch?v=ID`). The system automatically converts it to an autoplaying modal embed.</p>
                </div>

            </div>
        </div>

        <!-- ============================================================
             TAB 4: BOTTOM 3 FEATURE CARDS
             ============================================================ -->
        <div x-show="activeTab === 'cards'" class="space-y-6">
            <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
                
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                        3 Bottom Glassmorphic Feature Cards
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">
                        These 3 cards appear along the bottom of the hero section with thumbnail photos, bold titles, and subheadings.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <?php 
                        $cards = $hero['cards'] ?? [
                            ['title' => 'Heritage Inspired Architecture', 'sub' => 'Modern Amenities', 'image' => 'uploads/hero/mini_thumb_1.jpg'],
                            ['title' => 'Serene Green Surroundings', 'sub' => 'Peaceful Living', 'image' => 'uploads/hero/mini_thumb_2.jpg'],
                            ['title' => 'A Spiritual Lifestyle', 'sub' => 'Closer to Divinity', 'image' => 'uploads/hero/mini_thumb_3.jpg'],
                        ];
                    ?>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <?php $c = $cards[$i] ?? ['title' => '', 'sub' => '', 'image' => '']; ?>
                        <div class="p-4 rounded-xl bg-slate-950/70 border border-slate-800 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Card <?= $i + 1 ?></span>
                            </div>

                            <!-- Image Preview -->
                            <div class="aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="card_<?= $i ?>_preview" src="<?= asset($c['image']) ?>" alt="Card Preview" class="w-full h-full object-cover">
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Upload Photo</label>
                                <input type="file" name="card_<?= $i ?>_file" accept="image/*"
                                       onchange="if(this.files && this.files[0]){ const r = new FileReader(); r.onload = (e) => document.getElementById('card_<?= $i ?>_preview').src = e.target.result; r.readAsDataURL(this.files[0]); }"
                                       class="w-full text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                            </div>

                            <!-- Path -->
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Image Path</label>
                                <input type="text" name="card_<?= $i ?>_image" value="<?= e($c['image']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1.5 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            </div>

                            <!-- Title -->
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Card Title</label>
                                <input type="text" name="card_<?= $i ?>_title" value="<?= e($c['title']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-bold focus:border-amber-400 focus:outline-none">
                            </div>

                            <!-- Subtitle -->
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 mb-1">Subtitle</label>
                                <input type="text" name="card_<?= $i ?>_sub" value="<?= e($c['sub']) ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 focus:border-amber-400 focus:outline-none">
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

            </div>
        </div>

        <!-- Sticky Save Floating Bar -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800">
            <a href="<?= url('/') ?>" target="_blank"
               class="px-5 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 text-xs font-semibold uppercase tracking-wider transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Hero Settings</span>
            </button>
        </div>

    </form>
</div>

<script>
function previewHeroBgFile(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('heroBgPreviewImg').src = e.target.result;
            document.getElementById('heroBgPreviewLabel').textContent = file.name;
        };
        reader.readAsDataURL(file);
    }
}

function updateHeroBgPreview(path) {
    path = path.trim();
    if (!path) return;
    const img = document.getElementById('heroBgPreviewImg');
    const label = document.getElementById('heroBgPreviewLabel');
    if (path.startsWith('http://') || path.startsWith('https://') || path.startsWith('/')) {
        img.src = path;
    } else {
        img.src = '<?= asset('') ?>' + path.replace(/^\/+/, '');
    }
    label.textContent = path.split('/').pop() || path;
}

function applyHeroBgPreset(path, label) {
    document.getElementById('bgImageInput').value = path;
    updateHeroBgPreview(path);
}
</script>
