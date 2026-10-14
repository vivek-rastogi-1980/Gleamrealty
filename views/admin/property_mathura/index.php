<div class="space-y-6 max-w-6xl mx-auto" x-data="{ activeTab: 'hero', faqs: <?= htmlspecialchars(json_encode($pm['faqs']['list'] ?? []), ENT_QUOTES, 'UTF-8') ?> }">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/90 border border-slate-800 p-5 rounded-2xl shadow-xl">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wider uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30">
                    Dedicated Showcase CMS
                </span>
                <span class="text-xs text-slate-400 font-mono">/property-in-mathura</span>
            </div>
            <h2 class="text-2xl font-bold font-heading text-white mt-1">Property in Mathura Content</h2>
            <p class="text-xs text-slate-400 mt-0.5">Control all text, images, metrics, and SEO for the Property in Mathura page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/property-in-mathura') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
            </a>
            <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form action="<?= url('/admin/property-mathura') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Tabs Navigation -->
        <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-1.5 flex flex-wrap gap-1.5 backdrop-blur-sm">
            <template x-for="tab in [
                { id: 'hero', label: 'Hero Section' },
                { id: 'narrative', label: 'Ground Reality & Metrics' },
                { id: 'township', label: 'Aakruti Township' },
                { id: 'comparison', label: 'Market Comparison' },
                { id: 'budget', label: 'Budget Planning' },
                { id: 'faqs', label: 'FAQs' },
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
                        <input type="text" name="hero_heading" value="<?= e($pm['hero']['heading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subheading</label>
                        <input type="text" name="hero_subheading" value="<?= e($pm['hero']['subheading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Background Image</label>
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <div class="w-full sm:w-1/3 aspect-[4/3] rounded-xl overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="heroPreviewImg" src="<?= !empty($pm['hero']['image']) ? media_url($pm['hero']['image']) : asset('uploads/pages/mero-vrindavan.png') ?>" 
                                     alt="Hero Preview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-xs font-semibold text-white bg-black/60 px-3 py-1 rounded-full">Preview</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/3 space-y-3">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Hero Image</label>
                                    <input type="file" name="hero_image_file" accept="image/*" onchange="document.getElementById('heroPreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                           class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                    <input type="text" name="hero_image" value="<?= e($pm['hero']['image'] ?? '') ?>"
                                           placeholder="uploads/pages/mero-vrindavan.png"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Narrative Tab -->
            <div x-show="activeTab === 'narrative'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Ground Reality & Metrics</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="narrative_eyebrow" value="<?= e($pm['narrative']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="narrative_title" value="<?= e($pm['narrative']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Showcase Image</label>
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <div class="w-full sm:w-1/4 aspect-[4/5] rounded-xl overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="narrativePreviewImg" src="<?= !empty($pm['narrative']['image']) ? media_url($pm['narrative']['image']) : asset('uploads/pages/mero-vrindavan.png') ?>" 
                                     alt="Narrative Preview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-xs font-semibold text-white bg-black/60 px-3 py-1 rounded-full">Preview</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-3/4 space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Image</label>
                                        <input type="file" name="narrative_image_file" accept="image/*" onchange="document.getElementById('narrativePreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                               class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                    </div>
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path</label>
                                        <input type="text" name="narrative_image" value="<?= e($pm['narrative']['image'] ?? '') ?>"
                                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge Title</label>
                                        <input type="text" name="narrative_badge_title" value="<?= e($pm['narrative']['badge_title'] ?? '') ?>"
                                               placeholder="Govardhan Road Corridor" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Badge Value</label>
                                        <input type="text" name="narrative_badge_value" value="<?= e($pm['narrative']['badge_value'] ?? '') ?>"
                                               placeholder="₹ 35,000 / sq. yd" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:border-amber-400 focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Content (HTML)</label>
                    <textarea name="narrative_content" rows="6" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors font-mono"><?= e($pm['narrative']['content'] ?? '') ?></textarea>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300 mb-4">The 4 Key Metrics</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_1_val" value="<?= e($pm['narrative']['metric_1_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_1_lbl" value="<?= e($pm['narrative']['metric_1_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_2_val" value="<?= e($pm['narrative']['metric_2_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_2_lbl" value="<?= e($pm['narrative']['metric_2_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_3_val" value="<?= e($pm['narrative']['metric_3_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_3_lbl" value="<?= e($pm['narrative']['metric_3_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_metric_4_val" value="<?= e($pm['narrative']['metric_4_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_metric_4_lbl" value="<?= e($pm['narrative']['metric_4_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Township Tab -->
            <div x-show="activeTab === 'township'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Aakruti Township</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="township_eyebrow" value="<?= e($pm['township']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="township_title" value="<?= e($pm['township']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="township_subtitle" value="<?= e($pm['township']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Township Image</label>
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <div class="w-full sm:w-1/3 aspect-video rounded-xl overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="townshipPreviewImg" src="<?= !empty($pm['township']['image']) ? media_url($pm['township']['image']) : asset('uploads/pages/aakruti-township.jpg') ?>" 
                                     alt="Township Preview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-xs font-semibold text-white bg-black/60 px-3 py-1 rounded-full">Preview</span>
                                </div>
                            </div>
                            <div class="w-full sm:w-2/3 space-y-3">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Image</label>
                                    <input type="file" name="township_image_file" accept="image/*" onchange="document.getElementById('townshipPreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                           class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                    <input type="text" name="township_image" value="<?= e($pm['township']['image'] ?? '') ?>"
                                           placeholder="uploads/pages/aakruti-township.jpg"
                                           class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Price Label</label>
                        <input type="text" name="township_price" value="<?= e($pm['township']['price'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Location Name</label>
                        <input type="text" name="township_location" value="<?= e($pm['township']['location'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Project Title</label>
                        <input type="text" name="township_project_title" value="<?= e($pm['township']['project_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Project Description</label>
                        <textarea name="township_project_desc" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200"><?= e($pm['township']['project_desc'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="pt-4 space-y-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300">Project Highlights (4 Features)</h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="p-3 bg-slate-950 rounded-xl border border-slate-800/80 space-y-2">
                            <input type="text" name="township_f1_lbl" value="<?= e($pm['township']['f1_lbl'] ?? '') ?>" placeholder="Label 1" class="w-full bg-transparent text-xs text-slate-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="township_f1_val" value="<?= e($pm['township']['f1_val'] ?? '') ?>" placeholder="Value 1" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-1">
                        </div>
                        <div class="p-3 bg-slate-950 rounded-xl border border-slate-800/80 space-y-2">
                            <input type="text" name="township_f2_lbl" value="<?= e($pm['township']['f2_lbl'] ?? '') ?>" placeholder="Label 2" class="w-full bg-transparent text-xs text-slate-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="township_f2_val" value="<?= e($pm['township']['f2_val'] ?? '') ?>" placeholder="Value 2" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-1">
                        </div>
                        <div class="p-3 bg-slate-950 rounded-xl border border-slate-800/80 space-y-2">
                            <input type="text" name="township_f3_lbl" value="<?= e($pm['township']['f3_lbl'] ?? '') ?>" placeholder="Label 3" class="w-full bg-transparent text-xs text-slate-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="township_f3_val" value="<?= e($pm['township']['f3_val'] ?? '') ?>" placeholder="Value 3" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-1">
                        </div>
                        <div class="p-3 bg-slate-950 rounded-xl border border-slate-800/80 space-y-2">
                            <input type="text" name="township_f4_lbl" value="<?= e($pm['township']['f4_lbl'] ?? '') ?>" placeholder="Label 4" class="w-full bg-transparent text-xs text-slate-400 uppercase tracking-widest font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="township_f4_val" value="<?= e($pm['township']['f4_val'] ?? '') ?>" placeholder="Value 4" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-white font-semibold focus:outline-none focus:border-amber-500 mt-1">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparison Tab -->
            <div x-show="activeTab === 'comparison'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Market Comparison</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="comparison_eyebrow" value="<?= e($pm['comparison']['eyebrow'] ?? 'MARKET COMPARISON') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="comparison_title" value="<?= e($pm['comparison']['title'] ?? 'Mathura Plots versus Vrindavan Plots') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="comparison_subtitle" value="<?= e($pm['comparison']['subtitle'] ?? 'Understanding which destination matches your family\'s personal goals, budget, and lifestyle.') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pt-6 border-t border-slate-800">
                    <!-- Mathura Settings -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-bold text-slate-300">Mathura Card</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Eyebrow</label>
                            <input type="text" name="comparison_mathura_eyebrow" value="<?= e($pm['comparison']['mathura_eyebrow'] ?? 'Quiet Living & Value') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Price</label>
                            <input type="text" name="comparison_mathura_price" value="<?= e($pm['comparison']['mathura_price'] ?? '₹ 32,000 – ₹ 40,000 / sq. yd') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Title</label>
                            <input type="text" name="comparison_mathura_title" value="<?= e($pm['comparison']['mathura_title'] ?? 'Mathura City & Govardhan Corridor') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Features (HTML/List items allowed)</label>
                            <textarea name="comparison_mathura_features" rows="6" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200 font-mono"><?= e($pm['comparison']['mathura_features'] ?? '') ?></textarea>
                            <p class="text-xs text-slate-500 mt-1">If left empty, defaults will be used.</p>
                        </div>
                    </div>

                    <!-- Vrindavan Settings -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-bold text-slate-300">Vrindavan Card</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Eyebrow</label>
                            <input type="text" name="comparison_vrindavan_eyebrow" value="<?= e($pm['comparison']['vrindavan_eyebrow'] ?? 'High Devotional Energy') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Price</label>
                            <input type="text" name="comparison_vrindavan_price" value="<?= e($pm['comparison']['vrindavan_price'] ?? '₹ 42,000 – ₹ 75,000 / sq. yd') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Title</label>
                            <input type="text" name="comparison_vrindavan_title" value="<?= e($pm['comparison']['vrindavan_title'] ?? 'Vrindavan (Rukmani Vihar & NH-19)') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Features (HTML/List items allowed)</label>
                            <textarea name="comparison_vrindavan_features" rows="6" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200 font-mono"><?= e($pm['comparison']['vrindavan_features'] ?? '') ?></textarea>
                            <p class="text-xs text-slate-500 mt-1">If left empty, defaults will be used.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Budget Tab -->
            <div x-show="activeTab === 'budget'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Budget Planning (Market Tiers)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="budget_eyebrow" value="<?= e($pm['budget']['eyebrow'] ?? 'Budget Planning') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="budget_title" value="<?= e($pm['budget']['title'] ?? '100 Gaj Plot in Mathura Price: The 3 Real Market Tiers') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="budget_subtitle" value="<?= e($pm['budget']['subtitle'] ?? 'Why one advertisement claims ₹9 Lakhs while another quotes ₹35 Lakhs for 100 Gaj in Mathura.') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-slate-800">
                    <!-- Tier 1 -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-bold text-slate-300">Tier 1 Card</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Eyebrow</label>
                            <input type="text" name="budget_tier1_eyebrow" value="<?= e($pm['budget']['tier1_eyebrow'] ?? 'Tier 1: High Risk') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Title</label>
                            <input type="text" name="budget_tier1_title" value="<?= e($pm['budget']['tier1_title'] ?? 'Raw Farmland Colonies') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Price</label>
                            <input type="text" name="budget_tier1_price" value="<?= e($pm['budget']['tier1_price'] ?? '₹ 9L – ₹ 16L') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Description</label>
                            <textarea name="budget_tier1_desc" rows="4" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pm['budget']['tier1_desc'] ?? 'Priced at ₹9,000 – ₹16,000/sq. yd in unapproved rural tracts (Chhata, Kosi outskirts). No MVDA sanction, dirt roads, no water lines, cannot get bank loans, high risk of future demolition or sealing.') ?></textarea>
                        </div>
                    </div>

                    <!-- Tier 2 -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-bold text-slate-300">Tier 2 Card</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Eyebrow</label>
                            <input type="text" name="budget_tier2_eyebrow" value="<?= e($pm['budget']['tier2_eyebrow'] ?? 'Tier 2: Semi-Developed') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Title</label>
                            <input type="text" name="budget_tier2_title" value="<?= e($pm['budget']['tier2_title'] ?? 'Peripheral Enclaves') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Price</label>
                            <input type="text" name="budget_tier2_price" value="<?= e($pm['budget']['tier2_price'] ?? '₹ 20L – ₹ 28L') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Description</label>
                            <textarea name="budget_tier2_desc" rows="4" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pm['budget']['tier2_desc'] ?? 'Priced at ₹20,000 – ₹28,000/sq. yd. Basic boundary walls erected but lacking formal MVDA developmental clearance and guaranteed underground utility infrastructure.') ?></textarea>
                        </div>
                    </div>

                    <!-- Tier 3 -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-bold text-slate-300">Tier 3 Card</h4>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Eyebrow</label>
                            <input type="text" name="budget_tier3_eyebrow" value="<?= e($pm['budget']['tier3_eyebrow'] ?? 'Tier 3: 100% Certified') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Title</label>
                            <input type="text" name="budget_tier3_title" value="<?= e($pm['budget']['tier3_title'] ?? 'MVDA Approved Gated Townships') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Price</label>
                            <input type="text" name="budget_tier3_price" value="<?= e($pm['budget']['tier3_price'] ?? '₹ 35L – ₹ 42L') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Description</label>
                            <textarea name="budget_tier3_desc" rows="4" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pm['budget']['tier3_desc'] ?? 'Exemplified by Shri Vrinda Aakruti Village (₹35,000/sq. yd). Complete MVDA sanction, wide concrete avenues, sweet water, gated security, parks, immediate registry, and SBI/HDFC home loan approval.') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQs Tab -->
            <div x-show="activeTab === 'faqs'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Frequently Asked Questions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="faqs_eyebrow" value="<?= e($pm['faqs']['eyebrow'] ?? 'Buyer Intelligence') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="faqs_title" value="<?= e($pm['faqs']['title'] ?? 'Frequently Asked Questions About Property in Mathura') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="faqs_subtitle" value="<?= e($pm['faqs']['subtitle'] ?? 'Key questions and authentic insights on Mathura plot prices, MVDA zoning, and registration.') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
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
                                <button type="button" @click="faqs.splice(index, 1)" class="absolute top-2 right-2 text-rose-500 hover:text-rose-400" title="Remove FAQ">
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

            <!-- SEO Tab -->
            <div x-show="activeTab === 'seo'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">SEO Configuration</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Title</label>
                        <input type="text" name="seo_meta_title" value="<?= e($pm['seo']['meta_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 50-60 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Description</label>
                        <textarea name="seo_meta_description" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200"><?= e($pm['seo']['meta_description'] ?? '') ?></textarea>
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 150-160 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Keywords (Comma Separated)</label>
                        <input type="text" name="seo_meta_keywords" value="<?= e($pm['seo']['meta_keywords'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
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
