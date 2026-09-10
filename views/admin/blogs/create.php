<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Compose New Editorial Article</h2>
            <p class="text-xs text-slate-400">Draft market analyses, Vrindavan infrastructure updates, and legal advisory pieces.</p>
        </div>
        <a href="<?= url('/admin/blogs') ?>" class="text-xs text-slate-400 hover:text-white flex items-center gap-1 font-medium">
            &larr; Back to Articles
        </a>
    </div>

    <form action="<?= url('/admin/blogs') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Article Information -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Headline &amp; Core Content
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Article Title *</label>
                <input type="text" name="title" id="articleTitle" required placeholder="e.g. Vrindavan Heritage City: How NH-19 & Greenfield Corridors Are Reshaping Land Values"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <!-- URL Slug -->
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">URL Slug</label>
                    <button type="button" onclick="generateSlug()" class="text-[11px] text-amber-400 hover:underline">Auto-generate from Title</button>
                </div>
                <div class="flex items-center">
                    <span class="bg-slate-800 text-slate-400 border border-r-0 border-slate-700/80 rounded-l-lg px-3 py-2 text-xs font-mono select-none">
                        /blog/
                    </span>
                    <input type="text" name="slug" id="articleSlug" placeholder="vrindavan-heritage-city-land-values"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-xs font-mono text-white focus:outline-none focus:border-amber-400">
                </div>
                <p class="text-[11px] text-slate-500 mt-1">Leave empty to automatically generate from the title.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Category</label>
                    <input type="text" name="category" list="categoryList" placeholder="e.g. Market Trends & Growth" value="Market Trends & Growth"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                    <datalist id="categoryList">
                        <option value="Market Trends & Growth">
                        <option value="Legal & MVDA Approvals">
                        <option value="Spiritual Living & Heritage">
                        <option value="Commercial & Tourism Corridors">
                        <option value="Price Trends & Valuation">
                    </datalist>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Author Name</label>
                    <input type="text" name="author" value="Gleamrealty Advisory Desk"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Estimated Read Time</label>
                    <input type="text" name="read_time" value="5 min read" placeholder="e.g. 6 min read"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Executive Summary / Excerpt</label>
                <textarea name="excerpt" rows="2" placeholder="Brief 2-3 sentence overview displayed on article cards and search previews..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">Article Body Content (HTML supported) *</label>
                    <span class="text-[11px] text-slate-500">Supports &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;blockquote&gt;</span>
                </div>
                <textarea name="content" rows="14" required placeholder="Write or paste your article content here..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg p-3.5 font-sans text-sm text-slate-200 focus:outline-none focus:border-amber-400 leading-relaxed"></textarea>
            </div>
        </div>

        <!-- Card 2: Featured Image -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Featured Header Image
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Image</label>
                    <input type="file" name="featured_image_file" accept="image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700 cursor-pointer">
                    <p class="text-[11px] text-slate-500 mt-1">Recommended: 1200x630 or 16:9 aspect ratio, under 2MB.</p>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Existing Asset Path</label>
                    <input type="text" name="featured_image" placeholder="e.g. uploads/pages/residential-plots-in-vrindavan.jpeg"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>
        </div>

        <!-- Card 3: SEO Metadata & Publishing Controls -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-cyan-400"></span> SEO Metadata &amp; Publishing
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title (Search Title)</label>
                    <input type="text" name="meta_title" placeholder="e.g. Vrindavan Heritage City Corridor — Gleamrealty Advisory"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Keywords / Tags</label>
                    <input type="text" name="tags" value="Vrindavan, Property, Investment, Braj Real Estate"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2" placeholder="Concise search engine summary (approx. 150-160 characters)..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 items-center">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" id="is_published" value="1" checked
                        class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                    <label for="is_published" class="text-sm text-slate-300 font-medium">Publish Live Immediately</label>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Publication Timestamp</label>
                    <input type="datetime-local" name="published_at" value="<?= date('Y-m-d\TH:i') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>
        </div>

        <!-- Submit & Actions -->
        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="<?= url('/admin/blogs') ?>" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider rounded-lg transition-all shadow-md">
                Publish Article
            </button>
        </div>
    </form>

</div>

<script>
function generateSlug() {
    const titleInput = document.getElementById('articleTitle');
    const slugInput = document.getElementById('articleSlug');
    if (!titleInput || !slugInput) return;
    
    let text = titleInput.value.toLowerCase().trim();
    text = text.replace(/[^a-z0-9\s-]/g, '');
    text = text.replace(/[\s-]+/g, '-');
    slugInput.value = text;
}
</script>
