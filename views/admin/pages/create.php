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

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Media Type</label>
                    <select name="hero_media_type" class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                        <option value="image">Image Banner</option>
                        <option value="video">Video Embed</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Banner Image</label>
                    <input type="file" name="hero_media_file" accept="image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
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
</script>
