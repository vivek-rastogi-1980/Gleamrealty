<div class="space-y-6 max-w-6xl mx-auto" x-data="{ activeTab: 'hero', faqs: <?= htmlspecialchars(json_encode($pr['faqs']['list'] ?? []), ENT_QUOTES, 'UTF-8') ?> }">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/90 border border-slate-800 p-5 rounded-2xl shadow-xl">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wider uppercase bg-amber-500/20 text-amber-300 border border-amber-500/30">
                    Dedicated Showcase CMS
                </span>
                <span class="text-xs text-slate-400 font-mono">/plot-rate-mathura</span>
            </div>
            <h2 class="text-2xl font-bold font-heading text-white mt-1">Mathura Plot Rate Content</h2>
            <p class="text-xs text-slate-400 mt-0.5">Control all text, images, metrics, and SEO for the Mathura Plot Rate page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/plot-rate-mathura') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
            </a>
            <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form action="<?= url('/admin/plot-rate-mathura') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Tabs Navigation -->
        <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-1.5 flex flex-wrap gap-1.5 backdrop-blur-sm">
            <template x-for="tab in [
                { id: 'hero', label: 'Hero Section' },
                { id: 'narrative', label: 'Ground Reality' },
                { id: 'target_profiles', label: 'Corridor Breakdown' },
                { id: 'matrix', label: 'Price Matrix' },
                { id: 'breakdown', label: 'breakdown' },
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
                        <input type="text" name="hero_heading" value="<?= e($pr['hero']['heading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subheading</label>
                        <input type="text" name="hero_subheading" value="<?= e($pr['hero']['subheading'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Background Image</label>
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <div class="w-full sm:w-1/3 aspect-[4/3] rounded-xl overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="heroPreviewImg" src="<?= !empty($pr['hero']['image']) ? media_url($pr['hero']['image']) : asset('uploads/pages/Why-Choose-Mathura.jpg') ?>" 
                                     alt="Hero Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="w-full sm:w-2/3 space-y-3">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Hero Image</label>
                                    <input type="file" name="hero_image_file" accept="image/*" onchange="document.getElementById('heroPreviewImg').src = window.URL.createObjectURL(this.files[0])"
                                           class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Image Path / URL</label>
                                    <input type="text" name="hero_image" value="<?= e($pr['hero']['image'] ?? '') ?>"
                                           placeholder="uploads/pages/Why-Choose-Mathura.jpg"
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
                        <input type="text" name="narrative_eyebrow" value="<?= e($pr['narrative']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="narrative_title" value="<?= e($pr['narrative']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Showcase Image</label>
                        <div class="flex flex-col sm:flex-row gap-4 items-start">
                            <div class="w-full sm:w-1/4 aspect-[4/5] rounded-xl overflow-hidden bg-slate-900 border border-slate-800 relative">
                                <img id="narrativePreviewImg" src="<?= !empty($pr['narrative']['image']) ? media_url($pr['narrative']['image']) : asset('uploads/pages/Why-Choose-Mathura.jpg') ?>" 
                                     alt="Narrative Preview" class="w-full h-full object-cover">
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
                                        <input type="text" name="narrative_image" value="<?= e($pr['narrative']['image'] ?? '') ?>"
                                               class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Content (HTML)</label>
                    <textarea name="narrative_content" rows="6" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200 focus:border-amber-500/50 focus:ring-1 focus:ring-amber-500/50 transition-colors font-mono"><?= e($pr['narrative']['content'] ?? '') ?></textarea>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <h4 class="text-sm font-bold text-slate-300 mb-4">The 4 Key Metrics</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_m1_val" value="<?= e($pr['narrative']['m1_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_m1_lbl" value="<?= e($pr['narrative']['m1_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_m2_val" value="<?= e($pr['narrative']['m2_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_m2_lbl" value="<?= e($pr['narrative']['m2_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_m3_val" value="<?= e($pr['narrative']['m3_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_m3_lbl" value="<?= e($pr['narrative']['m3_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                        <div class="space-y-2 p-3 bg-slate-950 rounded-lg border border-slate-800/50">
                            <input type="text" name="narrative_m4_val" value="<?= e($pr['narrative']['m4_val'] ?? '') ?>" placeholder="Value" class="w-full bg-transparent border-b border-slate-800 pb-1 text-sm text-amber-300 font-bold focus:outline-none focus:border-amber-500">
                            <input type="text" name="narrative_m4_lbl" value="<?= e($pr['narrative']['m4_lbl'] ?? '') ?>" placeholder="Label" class="w-full bg-transparent text-xs text-slate-400 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- target_profiles Tab -->
            <div x-show="activeTab === 'target_profiles'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Micro-Market Analysis</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="target_profiles_eyebrow" value="<?= e($pr['target_profiles']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="target_profiles_title" value="<?= e($pr['target_profiles']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="target_profiles_subtitle" value="<?= e($pr['target_profiles']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-slate-800">
                    <div class="space-y-4 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Profile 1</h4>
                        <input type="text" name="target_profiles_p1_title" value="<?= e($pr['target_profiles']['p1_title'] ?? '') ?>" placeholder="Title" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <textarea name="target_profiles_p1_desc" rows="3" placeholder="Description" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pr['target_profiles']['p1_desc'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="space-y-4 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Profile 2</h4>
                        <input type="text" name="target_profiles_p2_title" value="<?= e($pr['target_profiles']['p2_title'] ?? '') ?>" placeholder="Title" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <textarea name="target_profiles_p2_desc" rows="3" placeholder="Description" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pr['target_profiles']['p2_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="space-y-4 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Profile 3</h4>
                        <input type="text" name="target_profiles_p3_title" value="<?= e($pr['target_profiles']['p3_title'] ?? '') ?>" placeholder="Title" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <textarea name="target_profiles_p3_desc" rows="3" placeholder="Description" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pr['target_profiles']['p3_desc'] ?? '') ?></textarea>
                    </div>

                    <div class="space-y-4 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Profile 4</h4>
                        <input type="text" name="target_profiles_p4_title" value="<?= e($pr['target_profiles']['p4_title'] ?? '') ?>" placeholder="Title" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <textarea name="target_profiles_p4_desc" rows="3" placeholder="Description" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pr['target_profiles']['p4_desc'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Matrix Tab -->
            <div x-show="activeTab === 'matrix'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Price Matrix Table</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="matrix_eyebrow" value="<?= e($pr['matrix']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="matrix_title" value="<?= e($pr['matrix']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="matrix_subtitle" value="<?= e($pr['matrix']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-800 overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <thead>
                            <tr class="text-slate-400">
                                <th class="p-2">Location</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Price/SqYd</th>
                                <th class="p-2">100 Gaj Budget</th>
                                <th class="p-2">Infrastructure</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-2">
                            <?php for($i=1; $i<=6; $i++): ?>
                            <tr>
                                <td class="p-1"><input type="text" name="matrix_r<?= $i ?>_col1" value="<?= e($pr['matrix']["r{$i}_col1"] ?? '') ?>" class="w-full min-w-[150px] bg-slate-950 border border-slate-800 rounded px-2 py-1 text-xs"></td>
                                <td class="p-1"><input type="text" name="matrix_r<?= $i ?>_col2" value="<?= e($pr['matrix']["r{$i}_col2"] ?? '') ?>" class="w-full min-w-[100px] bg-slate-950 border border-slate-800 rounded px-2 py-1 text-xs"></td>
                                <td class="p-1"><input type="text" name="matrix_r<?= $i ?>_col3" value="<?= e($pr['matrix']["r{$i}_col3"] ?? '') ?>" class="w-full min-w-[100px] bg-slate-950 border border-slate-800 rounded px-2 py-1 text-xs"></td>
                                <td class="p-1"><input type="text" name="matrix_r<?= $i ?>_col4" value="<?= e($pr['matrix']["r{$i}_col4"] ?? '') ?>" class="w-full min-w-[100px] bg-slate-950 border border-slate-800 rounded px-2 py-1 text-xs"></td>
                                <td class="p-1"><input type="text" name="matrix_r<?= $i ?>_col5" value="<?= e($pr['matrix']["r{$i}_col5"] ?? '') ?>" class="w-full min-w-[200px] bg-slate-950 border border-slate-800 rounded px-2 py-1 text-xs"></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- breakdown Tab -->
            <div x-show="activeTab === 'breakdown'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Due Diligence breakdown</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="breakdown_eyebrow" value="<?= e($pr['breakdown']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="breakdown_title" value="<?= e($pr['breakdown']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="breakdown_subtitle" value="<?= e($pr['breakdown']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 pt-6 border-t border-slate-800">
                    <?php for($i=1; $i<=5; $i++): ?>
                    <div class="space-y-2 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Row <?= $i ?></h4>
                        <input type="text" name="breakdown_r<?= $i ?>_lbl" value="<?= e($pr['breakdown']["r{$i}_lbl"] ?? '') ?>" placeholder="Label" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <input type="text" name="breakdown_r<?= $i ?>_val" value="<?= e($pr['breakdown']["r{$i}_val"] ?? '') ?>" placeholder="Value" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                    </div>
                    <?php endfor; ?>
                    <div class="space-y-2 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Total Row</h4>
                        <input type="text" name="breakdown_total_lbl" value="<?= e($pr['breakdown']["total_lbl"] ?? '') ?>" placeholder="Total Label" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                        <input type="text" name="breakdown_total_val" value="<?= e($pr['breakdown']["total_val"] ?? '') ?>" placeholder="Total Value" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200">
                    </div>
                    <div class="space-y-2 p-4 border border-slate-800 rounded-xl">
                        <h4 class="text-sm font-bold text-amber-300">Bank Note</h4>
                        <textarea name="breakdown_note" rows="2" placeholder="Bank Loan Support Note" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-3 py-2 text-sm text-slate-200"><?= e($pr['breakdown']["note"] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- FAQs Tab -->
            <div x-show="activeTab === 'faqs'" class="p-6 sm:p-8 space-y-6" x-transition style="display: none;">
                <h3 class="text-lg font-bold text-white font-heading border-b border-slate-800 pb-3">Frequently Asked Questions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Eyebrow</label>
                        <input type="text" name="faqs_eyebrow" value="<?= e($pr['faqs']['eyebrow'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Title</label>
                        <input type="text" name="faqs_title" value="<?= e($pr['faqs']['title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Subtitle</label>
                        <input type="text" name="faqs_subtitle" value="<?= e($pr['faqs']['subtitle'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
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
                        <input type="text" name="seo_meta_title" value="<?= e($pr['seo']['meta_title'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 50-60 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Description</label>
                        <textarea name="seo_meta_description" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200"><?= e($pr['seo']['meta_description'] ?? '') ?></textarea>
                        <p class="text-[10px] text-slate-500 mt-1">Recommended length: 150-160 characters</p>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Meta Keywords (Comma Separated)</label>
                        <input type="text" name="seo_meta_keywords" value="<?= e($pr['seo']['meta_keywords'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-sm text-slate-200">
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


