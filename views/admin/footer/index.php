
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-white font-heading tracking-wide">
            Footer Content Manager
        </h2>
    </div>

    <?php if ($msg = flash('success')): ?>
        <div class="p-4 rounded bg-emerald-500/10 border border-emerald-500/50 text-emerald-400 font-medium">
            <?= $msg ?>
        </div>
    <?php endif; ?>
    <?php if ($msg = flash('error')): ?>
        <div class="p-4 rounded bg-red-500/10 border border-red-500/50 text-red-400 font-medium">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    <form action="<?= url('/admin/footer') ?>" method="POST" class="space-y-8">
        <input type="hidden" name="_csrf_token" value="<?= csrf_token() ?>">

        <!-- Social Links -->
        <div class="bg-slate-900/90 rounded-xl border border-slate-800 p-6 shadow-xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-gold-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
            <h3 class="font-heading font-semibold text-white text-lg flex items-center gap-2 mb-4 relative z-10">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span> 
                Social Links
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-10">
                <div>
                    <label for="social_facebook" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Facebook URL</label>
                    <input type="text" id="social_facebook" name="social_facebook" value="<?= e($sections['social']['facebook'] ?? '') ?>" placeholder="https://facebook.com/yourpage" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none transition-colors">
                </div>
                <div>
                    <label for="social_instagram" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Instagram URL</label>
                    <input type="text" id="social_instagram" name="social_instagram" value="<?= e($sections['social']['instagram'] ?? '') ?>" placeholder="https://instagram.com/yourprofile" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none transition-colors">
                </div>
                <div>
                    <label for="social_linkedin" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">LinkedIn URL</label>
                    <input type="text" id="social_linkedin" name="social_linkedin" value="<?= e($sections['social']['linkedin'] ?? '') ?>" placeholder="https://linkedin.com/company/yourcompany" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none transition-colors">
                </div>
                <div>
                    <label for="social_youtube" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">YouTube URL</label>
                    <input type="text" id="social_youtube" name="social_youtube" value="<?= e($sections['social']['youtube'] ?? '') ?>" placeholder="https://youtube.com/@yourchannel" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none transition-colors">
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="bg-slate-900/90 rounded-xl border border-slate-800 p-6 shadow-xl relative overflow-hidden group">
            <h3 class="font-heading font-semibold text-white text-lg flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span> 
                Get In Touch
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label for="contact_address" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Address</label>
                    <input type="text" id="contact_address" name="contact_address" value="<?= e($sections['contact']['address'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label for="contact_map_url" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Map Directions URL</label>
                    <input type="text" id="contact_map_url" name="contact_map_url" value="<?= e($sections['contact']['map_url'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
                <div>
                    <label for="contact_phone1" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Phone 1</label>
                    <input type="text" id="contact_phone1" name="contact_phone1" value="<?= e($sections['contact']['phone1'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
                <div>
                    <label for="contact_phone2" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Phone 2</label>
                    <input type="text" id="contact_phone2" name="contact_phone2" value="<?= e($sections['contact']['phone2'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label for="contact_email" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Email</label>
                    <input type="email" id="contact_email" name="contact_email" value="<?= e($sections['contact']['email'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="bg-slate-900/90 rounded-xl border border-slate-800 p-6 shadow-xl relative overflow-hidden group">
            <h3 class="font-heading font-semibold text-white text-lg flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span> 
                Quick Links (Max 5)
            </h3>
            <div class="space-y-3">
                <?php $qls = $sections['quick_links'] ?? []; ?>
                <?php for($i=0; $i<5; $i++): ?>
                    <div class="flex gap-3 items-end">
                        <div class="flex-1">
                            <label class="block text-[10px] uppercase tracking-wider text-slate-500 mb-1">Label <?= $i+1 ?></label>
                            <input type="text" name="ql_label[]" value="<?= e($qls[$i]['label'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                        </div>
                        <div class="flex-1">
                            <label class="block text-[10px] uppercase tracking-wider text-slate-500 mb-1">URL <?= $i+1 ?></label>
                            <input type="text" name="ql_url[]" value="<?= e($qls[$i]['url'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Popular Projects -->
        <div class="bg-slate-900/90 rounded-xl border border-slate-800 p-6 shadow-xl relative overflow-hidden group">
            <h3 class="font-heading font-semibold text-white text-lg flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span> 
                Popular Projects (Max 5)
            </h3>
            <div class="space-y-3">
                <?php $pps = $sections['popular_projects'] ?? []; ?>
                <?php for($i=0; $i<5; $i++): ?>
                    <div class="flex gap-3 items-end">
                        <div class="flex-1">
                            <label class="block text-[10px] uppercase tracking-wider text-slate-500 mb-1">Label <?= $i+1 ?></label>
                            <input type="text" name="pp_label[]" value="<?= e($pps[$i]['label'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                        </div>
                        <div class="flex-1">
                            <label class="block text-[10px] uppercase tracking-wider text-slate-500 mb-1">URL <?= $i+1 ?></label>
                            <input type="text" name="pp_url[]" value="<?= e($pps[$i]['url'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="bg-slate-900/90 rounded-xl border border-slate-800 p-6 shadow-xl relative overflow-hidden group">
            <h3 class="font-heading font-semibold text-white text-lg flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-gold-400"></span> 
                Bottom Bar & Script Text
            </h3>
            <div class="space-y-4">
                <div>
                    <label for="bottom_copyright" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Copyright Text</label>
                    <input type="text" id="bottom_copyright" name="bottom_copyright" value="<?= e($sections['bottom']['copyright_text'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
                <div>
                    <label for="bottom_script" class="block text-xs uppercase tracking-wider text-slate-400 mb-1 cursor-pointer">Script Tagline (e.g., "Building Better")</label>
                    <input type="text" id="bottom_script" name="bottom_script" value="<?= e($sections['bottom']['script_text'] ?? '') ?>" class="w-full bg-slate-950 border border-slate-700 rounded px-3 py-2 text-sm text-white focus:border-gold-400 focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-gold-400 text-slate-950 font-bold hover:bg-gold-300 transition-colors shadow-lg">
                Save Footer Settings
            </button>
        </div>
    </form>
</div>
