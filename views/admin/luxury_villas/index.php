<div class="space-y-6 max-w-6xl mx-auto" x-data="{ activeTab: 'hero' }">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/90 border border-slate-800 p-5 rounded-2xl shadow-xl">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wider uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30">
                    Dedicated Showcase CMS
                </span>
                <span class="text-xs text-slate-400 font-mono">/luxury-villas-in-vrindavan</span>
            </div>
            <h2 class="text-2xl font-bold font-heading text-white mt-1">Villas in Vrindavan Content</h2>
            <p class="text-xs text-slate-400 mt-0.5">Control all text, images, metrics, and SEO for the luxury villas page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/luxury-villas-in-vrindavan') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
            </a>
            <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form action="<?= url('/admin/luxury-villas') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Tabs Navigation -->
        <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-1.5 flex flex-wrap gap-1.5 backdrop-blur-sm">
            <template x-for="tab in [
                { id: 'hero', label: 'Hero Section' },
                { id: 'narrative', label: 'Narrative & Metrics' },
                { id: 'outperforms', label: 'Why Villas' },
                { id: 'showcase', label: 'Showcase Projects' },
                { id: 'vastu', label: 'Vastu Shastra' },
                { id: 'faqs', label: 'FAQs' },
                { id: 'consultation', label: 'Consultation' },
                { id: 'seo', label: 'SEO Data' }
            ]">
                <button type="button" @click="activeTab = tab.id"
                        :class="activeTab === tab.id ? 'bg-slate-800 text-white shadow-sm ring-1 ring-slate-700' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50'"
                        class="px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                    <span x-text="tab.label"></span>
                </button>
            </template>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl shadow-xl overflow-hidden backdrop-blur-sm">
            
            <!-- Hero Tab -->
            <div x-show="activeTab === 'hero'" class="p-6 sm:p-8 space-y-6" x-transition>
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Hero Section</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Heading (H1)</label>
                        <input type="text" name="hero_heading" value="<?= e($lv['hero']['heading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subheading</label>
                        <input type="text" name="hero_subheading" value="<?= e($lv['hero']['subheading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <!-- Hero Background Image Box -->
                    <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2-2v12a2 2 0 002 2z"/></svg>
                                Hero Background Visual
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                            <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                                <?php $heroImg = !empty($lv['hero']['image']) ? media_url($lv['hero']['image']) : asset('uploads/pages/luxury-villas-in-vrindavan.jpeg'); ?>
                                <img id="heroPreviewImg" src="<?= $heroImg ?>" alt="Hero Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="md:col-span-8 space-y-3">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Hero Image</label>
                                    <input type="file" name="hero_image_file" accept="image/*" onchange="document.getElementById('heroPreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                           class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                    <input type="text" name="hero_image" value="<?= e($lv['hero']['image'] ?? '') ?>"
                                           placeholder="uploads/pages/luxury-villas-in-vrindavan.jpeg"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Narrative Tab -->
            <div x-show="activeTab === 'narrative'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Narrative & Metrics</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="narrative_eyebrow" value="<?= e($lv['narrative']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="narrative_title" value="<?= e($lv['narrative']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Content (HTML)</label>
                    <textarea name="narrative_content" rows="6" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors font-mono"><?= e($lv['narrative']['content'] ?? '') ?></textarea>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300 mb-4">The 4 Key Metrics</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_1_val" value="<?= e($lv['narrative']['metric_1_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_1_lbl" value="<?= e($lv['narrative']['metric_1_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_2_val" value="<?= e($lv['narrative']['metric_2_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_2_lbl" value="<?= e($lv['narrative']['metric_2_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_3_val" value="<?= e($lv['narrative']['metric_3_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_3_lbl" value="<?= e($lv['narrative']['metric_3_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_4_val" value="<?= e($lv['narrative']['metric_4_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_4_lbl" value="<?= e($lv['narrative']['metric_4_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Outperforms Tab -->
            <div x-show="activeTab === 'outperforms'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Why a Villa Outperforms</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="outperforms_eyebrow" value="<?= e($lv['outperforms']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="outperforms_title" value="<?= e($lv['outperforms']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="outperforms_subtitle" value="<?= e($lv['outperforms']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="pt-4 space-y-4">
                    <h4 class="text-sm font-bold text-slate-300">The 4 Pillars</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">Pillar 1</span>
                            <input type="text" name="outperforms_p1_title" value="<?= e($lv['outperforms']['p1_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500">
                            <textarea name="outperforms_p1_desc" rows="2" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['outperforms']['p1_desc'] ?? '') ?></textarea>
                        </div>
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">Pillar 2</span>
                            <input type="text" name="outperforms_p2_title" value="<?= e($lv['outperforms']['p2_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500">
                            <textarea name="outperforms_p2_desc" rows="2" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['outperforms']['p2_desc'] ?? '') ?></textarea>
                        </div>
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">Pillar 3</span>
                            <input type="text" name="outperforms_p3_title" value="<?= e($lv['outperforms']['p3_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500">
                            <textarea name="outperforms_p3_desc" rows="2" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['outperforms']['p3_desc'] ?? '') ?></textarea>
                        </div>
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <span class="text-[10px] font-bold text-amber-400 uppercase tracking-widest">Pillar 4</span>
                            <input type="text" name="outperforms_p4_title" value="<?= e($lv['outperforms']['p4_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500">
                            <textarea name="outperforms_p4_desc" rows="2" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['outperforms']['p4_desc'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vastu Tab -->
            <div x-show="activeTab === 'vastu'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Vastu Framework</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="vastu_eyebrow" value="<?= e($lv['vastu']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="vastu_title" value="<?= e($lv['vastu']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="vastu_subtitle" value="<?= e($lv['vastu']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="pt-4 space-y-4">
                    <h4 class="text-sm font-bold text-slate-300">The 3 Vastu Zones</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <input type="text" name="vastu_z1_num" value="<?= e($lv['vastu']['z1_num'] ?? '') ?>" placeholder="01. Northeast" class="w-full bg-transparent border-b border-slate-800 pb-2 text-xs text-amber-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="vastu_z1_title" value="<?= e($lv['vastu']['z1_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-2">
                            <textarea name="vastu_z1_desc" rows="3" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['vastu']['z1_desc'] ?? '') ?></textarea>
                        </div>
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <input type="text" name="vastu_z2_num" value="<?= e($lv['vastu']['z2_num'] ?? '') ?>" placeholder="02. Center" class="w-full bg-transparent border-b border-slate-800 pb-2 text-xs text-amber-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="vastu_z2_title" value="<?= e($lv['vastu']['z2_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-2">
                            <textarea name="vastu_z2_desc" rows="3" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['vastu']['z2_desc'] ?? '') ?></textarea>
                        </div>
                        <div class="p-4 bg-slate-950 rounded-xl border border-slate-800/80 space-y-3">
                            <input type="text" name="vastu_z3_num" value="<?= e($lv['vastu']['z3_num'] ?? '') ?>" placeholder="03. Southwest" class="w-full bg-transparent border-b border-slate-800 pb-2 text-xs text-amber-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="vastu_z3_title" value="<?= e($lv['vastu']['z3_title'] ?? '') ?>" placeholder="Title" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-2">
                            <textarea name="vastu_z3_desc" rows="3" placeholder="Description" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none mt-2"><?= e($lv['vastu']['z3_desc'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Showcase Tab -->
            <div x-show="activeTab === 'showcase'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h3 class="text-lg font-bold text-white font-heading">Showcase Projects</h3>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="showcase_is_hidden" value="1" class="form-checkbox bg-slate-900 border-slate-700 rounded text-amber-500 focus:ring-amber-500" <?= !empty($lv['showcase']['is_hidden']) ? 'checked' : '' ?>>
                        <span class="text-sm text-slate-300 font-semibold tracking-wide">Hide Section on Front End</span>
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="showcase_eyebrow" value="<?= e($lv['showcase']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="showcase_title" value="<?= e($lv['showcase']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="showcase_subtitle" value="<?= e($lv['showcase']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="space-y-6 pt-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300">Project 1 Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs text-slate-400 mb-1">Image visual</label>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                                <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                                    <?php $p1Img = !empty($lv['showcase']['p1_image']) ? media_url($lv['showcase']['p1_image']) : asset('uploads/pages/luxury-villas-in-vrindavan.jpeg'); ?>
                                    <img id="showcaseP1PreviewImg" src="<?= $p1Img ?>" alt="Project 1 Preview" class="w-full h-full object-cover">
                                </div>
                                <div class="md:col-span-8 space-y-3">
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Image</label>
                                        <input type="file" name="showcase_p1_image_file" accept="image/*" onchange="document.getElementById('showcaseP1PreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                               class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                    </div>
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                        <input type="text" name="showcase_p1_image" value="<?= e($lv['showcase']['p1_image'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200 font-mono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Badge 1</label>
                            <input type="text" name="showcase_p1_badge1" value="<?= e($lv['showcase']['p1_badge1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Badge 2 (Price)</label>
                            <input type="text" name="showcase_p1_badge2" value="<?= e($lv['showcase']['p1_badge2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Location Label</label>
                            <input type="text" name="showcase_p1_location" value="<?= e($lv['showcase']['p1_location'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Project Title</label>
                            <input type="text" name="showcase_p1_title" value="<?= e($lv['showcase']['p1_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs text-slate-400 mb-1">Description</label>
                            <textarea name="showcase_p1_desc" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($lv['showcase']['p1_desc'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 1</label>
                            <input type="text" name="showcase_p1_f1" value="<?= e($lv['showcase']['p1_f1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 2</label>
                            <input type="text" name="showcase_p1_f2" value="<?= e($lv['showcase']['p1_f2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 3</label>
                            <input type="text" name="showcase_p1_f3" value="<?= e($lv['showcase']['p1_f3'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Link URL</label>
                            <input type="text" name="showcase_p1_url" value="<?= e($lv['showcase']['p1_url'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                    </div>
                </div>

                <div class="space-y-6 pt-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300">Project 2 Details</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs text-slate-400 mb-1">Image visual</label>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                                <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                                    <?php $p2Img = !empty($lv['showcase']['p2_image']) ? media_url($lv['showcase']['p2_image']) : asset('uploads/pages/Why-Choose-Vrindavan.jpg'); ?>
                                    <img id="showcaseP2PreviewImg" src="<?= $p2Img ?>" alt="Project 2 Preview" class="w-full h-full object-cover">
                                </div>
                                <div class="md:col-span-8 space-y-3">
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Image</label>
                                        <input type="file" name="showcase_p2_image_file" accept="image/*" onchange="document.getElementById('showcaseP2PreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                               class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                    </div>
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                        <input type="text" name="showcase_p2_image" value="<?= e($lv['showcase']['p2_image'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200 font-mono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Badge 1</label>
                            <input type="text" name="showcase_p2_badge1" value="<?= e($lv['showcase']['p2_badge1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Badge 2 (Price)</label>
                            <input type="text" name="showcase_p2_badge2" value="<?= e($lv['showcase']['p2_badge2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Location Label</label>
                            <input type="text" name="showcase_p2_location" value="<?= e($lv['showcase']['p2_location'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Project Title</label>
                            <input type="text" name="showcase_p2_title" value="<?= e($lv['showcase']['p2_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs text-slate-400 mb-1">Description</label>
                            <textarea name="showcase_p2_desc" rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($lv['showcase']['p2_desc'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 1</label>
                            <input type="text" name="showcase_p2_f1" value="<?= e($lv['showcase']['p2_f1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 2</label>
                            <input type="text" name="showcase_p2_f2" value="<?= e($lv['showcase']['p2_f2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Feature 3</label>
                            <input type="text" name="showcase_p2_f3" value="<?= e($lv['showcase']['p2_f3'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs text-slate-400 mb-1">Link URL</label>
                            <input type="text" name="showcase_p2_url" value="<?= e($lv['showcase']['p2_url'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQs Tab -->
            <div x-show="activeTab === 'faqs'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;" x-data="{ faqs: <?= htmlspecialchars(json_encode($lv['faqs']['list'] ?? []), ENT_QUOTES, 'UTF-8') ?> }">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Frequently Asked Questions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="faqs_eyebrow" value="<?= e($lv['faqs']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="faqs_title" value="<?= e($lv['faqs']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="faqs_subtitle" value="<?= e($lv['faqs']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-bold text-slate-300">FAQ List</h4>
                        <button type="button" @click="faqs.push({q: '', a: ''})" class="text-xs bg-slate-800 hover:bg-slate-700 text-white px-3 py-1.5 rounded-lg transition-colors">
                            + Add FAQ
                        </button>
                    </div>
                    <div class="space-y-4">
                        <template x-for="(faq, index) in faqs" :key="index">
                            <div class="p-4 bg-slate-950 rounded-xl border border-slate-800 relative">
                                <button type="button" @click="faqs.splice(index, 1)" class="absolute top-2 right-2 text-rose-500 hover:text-rose-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                                <div class="space-y-3 pt-2">
                                    <input type="text" :name="'faq_q['+index+']'" x-model="faq.q" placeholder="Question" class="w-full bg-transparent border-b border-slate-800 pb-2 text-sm text-white font-semibold focus:outline-none focus:border-amber-500">
                                    <textarea :name="'faq_a['+index+']'" x-model="faq.a" rows="3" placeholder="Answer" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none resize-none"></textarea>
                                </div>
                            </div>
                        </template>
                        <p x-show="faqs.length === 0" class="text-xs text-slate-500 italic">No FAQs added yet.</p>
                    </div>
                </div>
            </div>

            <!-- Consultation Tab -->
            <div x-show="activeTab === 'consultation'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Consultation CTA</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Badge</label>
                        <input type="text" name="consultation_badge" value="<?= e($lv['consultation']['badge'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="consultation_title" value="<?= e($lv['consultation']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="consultation_subtitle" value="<?= e($lv['consultation']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Phone 1</label>
                        <input type="text" name="consultation_phone_1" value="<?= e($lv['consultation']['phone_1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Phone 2</label>
                        <input type="text" name="consultation_phone_2" value="<?= e($lv['consultation']['phone_2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>
            </div>

            <!-- SEO Tab -->
            <div x-show="activeTab === 'seo'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">SEO Configuration</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Title</label>
                        <input type="text" name="meta_title" value="<?= e($lv['seo']['meta_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 50-60 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200"><?= e($lv['seo']['meta_description'] ?? '') ?></textarea>
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 150-160 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Keywords (Comma Separated)</label>
                        <input type="text" name="meta_keywords" value="<?= e($lv['seo']['meta_keywords'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>
            </div>

        </div>

        <!-- Sticky Footer -->
        <div class="sticky bottom-0 bg-slate-900/95 border-t border-slate-800 p-5 rounded-2xl shadow-2xl backdrop-blur-md flex items-center justify-between z-10">
            <p class="text-xs text-slate-400 hidden sm:block">Remember to save your changes before switching tabs if you reload.</p>
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gold-400 hover:bg-gold-500 text-slate-950 text-sm font-bold uppercase tracking-wider rounded-xl transition-all shadow-lg shadow-gold-400/20">
                Save All Changes
            </button>
        </div>
    </form>
</div>
