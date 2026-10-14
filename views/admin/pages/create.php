<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Create New CMS Page</h2>
            <p class="text-xs text-slate-400">Design an informational page with custom hero media and SEO metadata.</p>
        </div>
        <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
            &larr; Back to Pages
        </a>
    </div>

    <form action="<?= url('/admin/pages') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Page Identity -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Page Details &amp; Hero Section
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Page Title *</label>
                    <input type="text" name="title" id="pageTitle" required placeholder="e.g. About Us"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Heading</label>
                    <input type="text" name="hero_heading" placeholder="e.g. Redefining Luxury Real Estate"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Subheading</label>
                <input type="text" name="hero_subheading" placeholder="e.g. 10+ Years of Trusted Heritage across Vrindavan and Mathura"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <!-- Hero Section Background Visual Box -->
            <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4 pt-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Hero Section Background Image
                    </span>
                    <span class="text-[11px] text-slate-500">Visible behind the hero title &amp; description</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                    <!-- Preview Container -->
                    <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                        <img id="heroPreviewImg"
                             src="<?= asset('uploads/hero/hero-braj-sanctuary.webp') ?>"
                             alt="Hero Background Preview"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-2">
                            <span class="text-[10px] text-white/90 font-mono truncate">Preview</span>
                        </div>
                    </div>

                    <!-- Upload and Path Controls -->
                    <div class="md:col-span-8 space-y-3">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                Upload New Hero Image
                            </label>
                            <input type="file" name="hero_media_file" id="heroMediaFileInput" accept="image/*"
                                   onchange="previewHeroFile(this)"
                                   class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                            <span class="text-[11px] text-slate-500 mt-1 block">Upload a high quality JPG, PNG, or WebP.</span>
                        </div>

                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                Or Image URL / Media Path
                            </label>
                            <input type="text" name="hero_media_url" id="heroMediaUrlInput"
                                   placeholder="uploads/hero/hero-braj-sanctuary.webp or full URL"
                                   oninput="updateHeroPreview(this.value)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            <span class="text-[11px] text-slate-500 mt-0.5 block">You can use uploaded photos or type an existing image path.</span>
                        </div>

                        <input type="hidden" name="hero_media_type" value="image">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="is_published" id="is_published" value="1" checked
                    class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                <label for="is_published" class="text-sm text-slate-300 font-medium">Publish page immediately</label>
            </div>
        </div>

        <!-- Card 2: Custom SEO Metadata -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center justify-between">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-cyan-400"></span> SEO Controls &amp; Dynamic URL Slug</span>
                <button type="button" onclick="generateSlug()" class="text-xs text-amber-400 hover:underline">Auto-generate Slug</button>
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">URL Slug</label>
                <div class="flex items-center">
                    <span class="bg-slate-800 text-slate-400 px-3 py-2 text-xs rounded-l-lg border border-r-0 border-slate-700">/</span>
                    <input type="text" name="slug" id="pageSlug" placeholder="about-us"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                <input type="text" name="meta_title" placeholder="About Us | Gleamrealty Real Estate"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2" placeholder="Discover the heritage, leadership, and mission behind our real estate portfolio."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                <input type="text" name="meta_keywords" placeholder="Vrindavan Real Estate, Property Advisors, About Gleamrealty"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>
        </div>

        <!-- Card 3: Body Content -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-400"></span> Page Content
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">HTML Body Content</label>
                <textarea name="content" rows="10" placeholder="<p>Enter narrative content, sections, or details here...</p>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-amber-400"></textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="<?= url('/admin/pages') ?>" class="px-5 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-semibold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all">
                Publish Page
            </button>
        </div>
    </form>

</div>

<script>
function generateSlug() {
    const title = document.getElementById('pageTitle').value;
    if (title) {
        const slug = title.toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('pageSlug').value = slug;
    }
}
document.getElementById('pageTitle').addEventListener('blur', function() {
    if (!document.getElementById('pageSlug').value) {
        generateSlug();
    }
});

function previewHeroFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('heroPreviewImg').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateHeroPreview(val) {
    val = val.trim();
    if (!val) return;
    const img = document.getElementById('heroPreviewImg');
    if (val.startsWith('http://') || val.startsWith('https://') || val.startsWith('/')) {
        img.src = val;
    } else {
        img.src = '<?= asset('') ?>' + val.replace(/^\/+/, '');
    }
}
</script>
