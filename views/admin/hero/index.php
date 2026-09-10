<div class="max-w-6xl mx-auto space-y-6 pb-16" x-data="{ currentSlideTab: 0, showNewSlide: false }">

    <!-- Top Header & Live Site Link -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-amber-400 shadow-md shadow-amber-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">Full-Screen Properties Slideshow Manager</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Manage the full-viewport 3D page-rotation properties slideshow, autoplay timing, luxury estate slides, and trust verification.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Site</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="heroForm"
                    class="px-5 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </div>

    <!-- Main Configuration Form -->
    <form id="heroForm" action="<?= url('/admin/hero') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- SECTION 1: GLOBAL SLIDESHOW CONTROLS & ATMOSPHERE -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span> 
                    1. Slideshow Global Controls &amp; 3D Rotation Experience
                </h3>
                <label class="inline-flex items-center gap-2 text-xs font-semibold text-slate-300 cursor-pointer">
                    <input type="checkbox" name="is_enabled" value="1" <?= ($hero['is_enabled'] ?? true) ? 'checked' : '' ?>
                           class="rounded bg-slate-950 border-slate-700 text-amber-400 focus:ring-0">
                    <span>Hero Section Enabled</span>
                </label>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Autoplay Interval -->
                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800">
                    <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold mb-1">
                        Autoplay Timer (Seconds)
                    </label>
                    <input type="number" name="autoplay_interval" min="3" max="20"
                           value="<?= (int) ($hero['autoplay_interval'] ?? 6) ?>"
                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:outline-none focus:border-amber-400">
                    <span class="text-[10px] text-slate-500 mt-1 block">Recommended: 5 to 7 seconds.</span>
                </div>

                <!-- 3D Rotation Animation Style -->
                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800">
                    <label class="block text-[11px] uppercase tracking-wider text-amber-400 font-semibold mb-1">
                        Slide Transition Manner
                    </label>
                    <select name="rotation_style"
                            class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                        <option value="3d-page-turn" <?= (($hero['rotation_style'] ?? '3d-page-turn') === '3d-page-turn') ? 'selected' : '' ?>>
                            ✦ 3D Luxury Folio Page Turn
                        </option>
                        <option value="3d-cube-rotate" <?= (($hero['rotation_style'] ?? '') === '3d-cube-rotate') ? 'selected' : '' ?>>
                            ✦ 3D Architectural Cube Rotate
                        </option>
                    </select>
                    <span class="text-[10px] text-slate-500 mt-1 block">Animated 3D perspective transition on each slide change.</span>
                </div>

                <!-- Overlay Scrim Darkness -->
                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800">
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                        Background Scrim Opacity (%)
                    </label>
                    <input type="number" name="overlay_opacity" min="10" max="90" step="5"
                           value="<?= (int) ($hero['overlay_opacity'] ?? 45) ?>"
                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-mono focus:outline-none focus:border-amber-400">
                    <span class="text-[10px] text-slate-500 mt-1 block">Guarantees crisp readability over high-res photos.</span>
                </div>

                <!-- Total Active Slides Counter -->
                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 flex flex-col justify-between">
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Configured Slides</span>
                    <div class="text-2xl font-bold font-mono text-white mt-1">
                        <?= count($slides) ?> <span class="text-xs font-sans text-amber-400 font-normal">Properties</span>
                    </div>
                    <span class="text-[10px] text-slate-500">Each slide represents a premier property showcase.</span>
                </div>
            </div>

            <!-- Global Eyebrow & Trust Seal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                        Floating Eyebrow Pill Badge
                    </label>
                    <input type="text" name="badge_text" value="<?= e($hero['badge_text'] ?? '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA') ?>"
                           placeholder="e.g. ✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA"
                           class="w-full bg-slate-950/80 border border-slate-700/80 rounded-lg px-3.5 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                    <span class="text-[10px] text-slate-500 mt-0.5 block">Visible in the luxury pill badge above the active property title.</span>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                        Bottom Prestige Trust Seal Text
                    </label>
                    <input type="text" name="trust_seal_text" value="<?= e($hero['trust_seal_text'] ?? '100% MVDA & RERA Approved • Immediate Freehold Registry • 3,000+ Happy Families') ?>"
                           placeholder="e.g. 100% MVDA & RERA Approved • Immediate Freehold Registry • 3,000+ Happy Families"
                           class="w-full bg-slate-950/80 border border-slate-700/80 rounded-lg px-3.5 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                    <span class="text-[10px] text-slate-500 mt-0.5 block">Displayed with gold verification mark along the bottom anchor bar.</span>
                </div>
            </div>
        </div>

        <!-- SECTION 2: FEATURED PROPERTIES SLIDESHOW MANAGER -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-800 pb-3 gap-3">
                <div>
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span> 
                        2. Full-Screen Property Slides Manager
                    </h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">
                        Each slide represents an individual luxury property or sanctuary in the full-screen rotation.
                    </p>
                </div>
                
                <!-- Slide switcher tabs -->
                <div class="flex items-center gap-1.5 p-1 bg-slate-950 rounded-lg border border-slate-800 flex-wrap">
                    <?php foreach ($slides as $idx => $s): ?>
                        <button type="button" @click="currentSlideTab = <?= $idx ?>"
                                :class="currentSlideTab === <?= $idx ?> ? 'bg-amber-400 text-slate-950 font-bold shadow-sm' : 'text-slate-400 hover:text-white'"
                                class="px-3 py-1.5 rounded-md text-xs transition-all flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full <?= ($s['is_active'] ?? 1) ? 'bg-emerald-400' : 'bg-slate-600' ?>"></span>
                            <span>Slide <?= $idx + 1 ?></span>
                            <?php if (!empty($s['title'])): ?>
                                <span class="opacity-70 text-[10px] hidden md:inline truncate max-w-[90px]">
                                    (<?= e(explode(' ', $s['title'])[0]) ?>)
                                </span>
                            <?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                    <button type="button" @click="showNewSlide = !showNewSlide"
                            class="px-3 py-1.5 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 font-semibold rounded-md text-xs transition-colors flex items-center gap-1 border border-emerald-500/30">
                        <span>+ Add New Slide</span>
                    </button>
                </div>
            </div>

            <!-- Existing Slides Editor Panels -->
            <?php foreach ($slides as $idx => $s): ?>
                <?php $sId = (int) $s['id']; ?>
                <input type="hidden" name="slide_ids[]" value="<?= $sId ?>">

                <div x-show="currentSlideTab === <?= $idx ?>" class="space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                        
                        <!-- Col 1-5: High-Res Media & Visual Preview -->
                        <div class="lg:col-span-5 space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">
                                    Slide Media Asset
                                </label>
                                <span class="text-[10px] text-amber-400/80 font-mono">16:9 / Fullscreen Landscape</span>
                            </div>
                            
                            <!-- Image Frame -->
                            <div class="aspect-[16/10] rounded-xl overflow-hidden bg-slate-950 border border-slate-800 relative group shadow-lg">
                                <img src="<?= e($s['image_url'] ?? asset('uploads/hero/hero-braj-sanctuary.webp')) ?>"
                                     alt="<?= e($s['title']) ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-between p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-black/60 text-white border border-white/20 backdrop-blur-md">
                                            <?= e($s['badge_text'] ?? '100% MVDA Approved') ?>
                                        </span>
                                        <span class="text-[10px] text-amber-300 font-mono font-bold bg-black/60 px-2 py-0.5 rounded-full border border-amber-400/30">
                                            <?= e($s['price_text'] ?? 'Starting ₹ 45 Lakhs*') ?>
                                        </span>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-serif font-bold text-sm leading-tight drop-shadow">
                                            <?= e($s['title'] ?? 'Estate Showcase') ?>
                                        </h4>
                                        <p class="text-slate-300 text-[10px] drop-shadow mt-0.5">
                                            <?= e($s['location_text'] ?? 'Vrindavan • Mathura') ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload & Path -->
                            <div class="space-y-2.5 p-3.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                <div>
                                    <label class="block text-[11px] text-slate-300 font-medium mb-1">Upload New High-Res Image</label>
                                    <input type="file" name="slide_file_<?= $sId ?>" accept="image/*"
                                           class="w-full text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-slate-400 font-medium mb-0.5">Or Direct Image Asset Path / URL</label>
                                    <input type="text" name="slide_image_<?= $sId ?>" value="<?= e($s['image_url'] ?? '') ?>"
                                           placeholder="e.g. /public/uploads/hero/hero-braj-sanctuary.webp"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-slate-300 font-mono focus:outline-none focus:border-amber-400">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-slate-400 font-medium mb-0.5">Optional Ambient Video Tour URL (MP4 / WebM)</label>
                                    <input type="text" name="slide_video_<?= $sId ?>" value="<?= e($s['video_url'] ?? '') ?>"
                                           placeholder="e.g. https://.../sanctuary-ambient.mp4"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-slate-300 font-mono focus:outline-none focus:border-amber-400">
                                </div>
                            </div>

                            <!-- Delete Slide Action -->
                            <div class="pt-2 border-t border-slate-800 flex items-center justify-between">
                                <span class="text-[11px] text-slate-500">Need to remove this estate slide?</span>
                                <button type="button"
                                        onclick="if(confirm('Are you sure you want to remove this property slide from the homepage slideshow?')) { document.getElementById('deleteSlideForm_<?= $sId ?>').submit(); }"
                                        class="text-xs text-red-400 hover:text-red-300 hover:underline flex items-center gap-1 font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    <span>Delete Slide</span>
                                </button>
                            </div>
                        </div>

                        <!-- Col 6-12: Property Details & Typography -->
                        <div class="lg:col-span-7 space-y-4">
                            
                            <!-- Project Database Link -->
                            <div class="p-3.5 rounded-xl bg-amber-500/10 border border-amber-500/20">
                                <label class="block text-[11px] uppercase tracking-wider text-amber-300 font-bold mb-1 flex items-center gap-1.5">
                                    <span>🔗 Link to Database Project Dossier</span>
                                </label>
                                <select name="slide_project_id_<?= $sId ?>"
                                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                                    <option value="">-- Custom Sanctuary Slide (No Project Link) --</option>
                                    <?php foreach ($projects as $proj): ?>
                                        <option value="<?= $proj['id'] ?>" <?= ((int)($s['project_id'] ?? 0) === (int)$proj['id']) ? 'selected' : '' ?>>
                                            <?= e($proj['name']) ?> (<?= e($proj['location']) ?> • <?= e($proj['starting_price']) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="text-[10px] text-amber-200/70 mt-1 block">
                                    When linked, visitors clicking "Explore Sanctuary" are routed directly to the full project dossier.
                                </span>
                            </div>

                            <!-- Estate Title & Category -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="sm:col-span-2">
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                        Property / Slide Title *
                                    </label>
                                    <input type="text" name="slide_title_<?= $sId ?>" required
                                           value="<?= e($s['title'] ?? '') ?>"
                                           placeholder="e.g. Shri Vrinda Greens Enclave"
                                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white font-serif font-medium focus:outline-none focus:border-amber-400">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                        Category Tag
                                    </label>
                                    <input type="text" name="slide_featured_label_<?= $sId ?>"
                                           value="<?= e($s['featured_label'] ?? 'Featured Sanctuary') ?>"
                                           placeholder="e.g. Signature Sanctuary"
                                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-amber-300 focus:outline-none focus:border-amber-400">
                                </div>
                            </div>

                            <!-- Status Badge, Location & Price -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                        Status Badge (Top Left)
                                    </label>
                                    <input type="text" name="slide_badge_<?= $sId ?>"
                                           value="<?= e($s['badge_text'] ?? '100% MVDA Approved') ?>"
                                           placeholder="e.g. 100% MVDA Approved"
                                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                        Location Text
                                    </label>
                                    <input type="text" name="slide_location_<?= $sId ?>"
                                           value="<?= e($s['location_text'] ?? '') ?>"
                                           placeholder="e.g. Chhatikara–Vrindavan Corridor • NH-19"
                                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                        Starting Price Callout
                                    </label>
                                    <input type="text" name="slide_price_<?= $sId ?>"
                                           value="<?= e($s['price_text'] ?? '') ?>"
                                           placeholder="e.g. Starting ₹ 45 Lakhs*"
                                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-amber-300 font-mono font-semibold focus:outline-none focus:border-amber-400">
                                </div>
                            </div>

                            <!-- Key Specifications / Highlights Description -->
                            <div>
                                <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                    Key Specifications &amp; Architectural Highlights
                                </label>
                                <textarea name="slide_description_<?= $sId ?>" rows="2"
                                          placeholder="e.g. Freehold Plots • 250 – 1,200 Sq. Yds. • Immediate Registry • 40ft Wide Roads"
                                          class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3.5 py-2 text-xs text-slate-200 focus:outline-none focus:border-amber-400 leading-relaxed"><?= e($s['description'] ?? '') ?></textarea>
                                <span class="text-[10px] text-slate-500 mt-0.5 block">Displayed in high-elegance specs badge strip beneath the main estate title.</span>
                            </div>

                            <!-- CTA Actions -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 p-3.5 rounded-xl bg-slate-950/60 border border-slate-800">
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-emerald-400 font-semibold mb-1">
                                        Primary Button Label
                                    </label>
                                    <input type="text" name="slide_cta_text_<?= $sId ?>"
                                           value="<?= e($s['cta_text'] ?? 'Explore Sanctuary') ?>"
                                           placeholder="e.g. Explore Sanctuary"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                                </div>
                                <div>
                                    <label class="block text-[11px] uppercase tracking-wider text-emerald-400 font-semibold mb-1">
                                        Primary Button Target URL
                                    </label>
                                    <input type="text" name="slide_cta_url_<?= $sId ?>"
                                           value="<?= e($s['cta_url'] ?? '#residences') ?>"
                                           placeholder="e.g. /projects/shri-vrinda-greens or #residences"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 font-mono focus:outline-none focus:border-emerald-400">
                                </div>
                            </div>

                            <!-- Sort Order & Active Status -->
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-950/40 border border-slate-800">
                                <div class="flex items-center gap-3">
                                    <label class="text-xs text-slate-400 font-semibold">Display Sort Order:</label>
                                    <input type="number" name="slide_sort_<?= $sId ?>"
                                           value="<?= (int) ($s['sort_order'] ?? 0) ?>"
                                           class="w-20 bg-slate-900 border border-slate-700 rounded-lg px-2.5 py-1 text-xs text-white font-mono text-center focus:outline-none focus:border-amber-400">
                                </div>

                                <label class="inline-flex items-center gap-2 text-xs font-semibold text-slate-300 cursor-pointer">
                                    <input type="checkbox" name="slide_active_<?= $sId ?>" value="1"
                                           <?= ($s['is_active'] ?? 1) ? 'checked' : '' ?>
                                           class="rounded bg-slate-950 border-slate-700 text-emerald-400 focus:ring-0">
                                    <span>Slide Active in Hero</span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Add New Slide Drawer / Accordion -->
            <div x-show="showNewSlide" x-cloak class="p-5 rounded-xl border border-emerald-500/30 bg-emerald-950/10 space-y-4">
                <div class="flex items-center justify-between border-b border-emerald-500/20 pb-2">
                    <h4 class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                        <span>+ Add New Property Slide to Full-Screen Hero</span>
                    </h4>
                    <button type="button" @click="showNewSlide = false" class="text-xs text-slate-400 hover:text-white">✕ Close</button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Link to Project (Optional)
                        </label>
                        <select name="new_slide_project_id"
                                class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                            <option value="">-- Custom Sanctuary Slide --</option>
                            <?php foreach ($projects as $proj): ?>
                                <option value="<?= $proj['id'] ?>"><?= e($proj['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Slide Title *
                        </label>
                        <input type="text" name="new_slide_title" placeholder="e.g. Shri Vrinda Vihaar Residential Plots"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Location Text
                        </label>
                        <input type="text" name="new_slide_location" placeholder="e.g. Raman Reti • Vrindavan"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Status Badge
                        </label>
                        <input type="text" name="new_slide_badge" value="Phase II Launch"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Category Label
                        </label>
                        <input type="text" name="new_slide_featured_label" value="Featured Sanctuary"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-amber-300 focus:outline-none focus:border-emerald-400">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Price Callout
                        </label>
                        <input type="text" name="new_slide_price" placeholder="e.g. Starting ₹ 55 Lakhs*"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-amber-300 font-mono focus:outline-none focus:border-emerald-400">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Upload High-Res Slide Image
                        </label>
                        <input type="file" name="new_slide_file" accept="image/*"
                               class="w-full text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-emerald-400 hover:file:bg-slate-700">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Or Direct Image Asset Path
                        </label>
                        <input type="text" name="new_slide_image" placeholder="e.g. /public/uploads/hero/hero-braj-sanctuary.webp"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-1.5 text-xs text-slate-300 font-mono focus:outline-none focus:border-emerald-400">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                        Specifications / Architectural Highlights
                    </label>
                    <input type="text" name="new_slide_description" placeholder="e.g. Freehold Sanctuaries • 250 – 1,200 Sq. Yds. • 40ft Wide Roads"
                           class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Button Label
                        </label>
                        <input type="text" name="new_slide_cta_text" value="Explore Sanctuary"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-emerald-400">
                    </div>
                    <div>
                        <label class="block text-[11px] uppercase tracking-wider text-slate-400 font-semibold mb-1">
                            Button Target Link
                        </label>
                        <input type="text" name="new_slide_cta_url" value="#residences"
                               class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-xs text-slate-300 font-mono focus:outline-none focus:border-emerald-400">
                    </div>
                </div>
            </div>

        </div>

        <!-- Sticky Save Floating Bar -->
        <div class="sticky bottom-4 z-20 flex items-center justify-between p-4 rounded-xl bg-slate-900/95 backdrop-blur-md border border-slate-700/80 shadow-2xl">
            <div class="flex items-center gap-2 text-xs text-slate-300">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                <span>Changes will be immediately reflected in the live full-screen 3D rotation hero.</span>
            </div>
            <button type="submit"
                    class="px-6 py-2.5 bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold rounded-lg text-xs uppercase tracking-widest transition-all shadow-lg hover:shadow-amber-400/20 active:scale-98 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </form>

    <!-- Hidden Individual Slide Deletion Forms -->
    <?php foreach ($slides as $s): ?>
        <?php $delId = (int) $s['id']; ?>
        <form id="deleteSlideForm_<?= $delId ?>"
              action="<?= url("/admin/hero/slides/{$delId}/delete") ?>"
              method="POST" style="display: none;">
            <?= csrf_field() ?>
        </form>
    <?php endforeach; ?>

</div>
