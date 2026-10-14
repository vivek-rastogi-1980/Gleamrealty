<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Edit Editorial Article</h2>
            <p class="text-xs text-slate-400">Modify content, featured imagery, and SEO configurations.</p>
        </div>
        <div class="flex items-center gap-3">
            <?php if ((int) ($blog['is_published'] ?? 1) === 1): ?>
                <a href="<?= url('/blog/' . $blog['slug']) ?>" target="_blank" class="text-xs text-amber-400 hover:text-amber-300 flex items-center gap-1 font-medium bg-amber-400/10 px-3 py-1.5 rounded-lg border border-amber-400/20">
                    <span>View Live</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            <?php endif; ?>
            <a href="<?= url('/admin/blogs') ?>" class="text-xs text-slate-400 hover:text-white flex items-center gap-1 font-medium">
                &larr; Back to Articles
            </a>
        </div>
    </div>

    <form action="<?= url('/admin/blogs/' . $blog['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Article Information -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Headline &amp; Core Content
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Article Title *</label>
                <input type="text" name="title" id="articleTitle" required value="<?= e($blog['title']) ?>"
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
                    <input type="text" name="slug" id="articleSlug" value="<?= e($blog['slug']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-xs font-mono text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Category</label>
                    <input type="text" name="category" list="categoryList" value="<?= e($blog['category'] ?? 'Market Trends & Growth') ?>"
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
                    <input type="text" name="author" value="<?= e($blog['author'] ?? 'Gleamrealty Advisory Desk') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Estimated Read Time</label>
                    <input type="text" name="read_time" value="<?= e($blog['read_time'] ?? '5 min read') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Executive Summary / Excerpt</label>
                <textarea name="excerpt" rows="2"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($blog['excerpt'] ?? '') ?></textarea>
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold">Article Body Content (HTML supported) *</label>
                    <span class="text-[11px] text-slate-500">Supports &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;blockquote&gt;</span>
                </div>
                <textarea name="content" rows="16" required
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg p-3.5 font-sans text-sm text-slate-200 focus:outline-none focus:border-amber-400 leading-relaxed"><?= htmlspecialchars($blog['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
        </div>

        <!-- Card 2: Featured Image -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Featured Header Image
            </h3>

            <?php if (!empty($blog['featured_image'])): ?>
                <div class="flex items-center gap-4 bg-slate-950/50 p-3 rounded-lg border border-slate-800">
                    <img src="<?= asset($blog['featured_image']) ?>" alt="Cover" class="w-28 h-16 object-cover rounded-md border border-slate-700">
                    <div class="text-xs text-slate-400 space-y-1">
                        <div class="font-medium text-white">Current Image:</div>
                        <div class="font-mono text-slate-500 text-[11px] break-all"><?= e($blog['featured_image']) ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Replace with New Upload</label>
                    <input type="file" name="featured_image_file" accept="image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700 cursor-pointer">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Existing Asset Path</label>
                    <input type="text" name="featured_image" value="<?= e($blog['featured_image'] ?? '') ?>"
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
                    <input type="text" name="meta_title" value="<?= e($blog['meta_title'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Keywords / Tags</label>
                    <input type="text" name="tags" value="<?= e($blog['tags'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($blog['meta_description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 items-center">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" id="is_published" value="1" <?= (int) ($blog['is_published'] ?? 1) === 1 ? 'checked' : '' ?>
                        class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                    <label for="is_published" class="text-sm text-slate-300 font-medium">Published Live</label>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Publication Timestamp</label>
                    <?php
                        $ts = !empty($blog['published_at']) ? strtotime($blog['published_at']) : time();
                    ?>
                    <input type="datetime-local" name="published_at" value="<?= date('Y-m-d\TH:i', $ts) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>
        </div>

        <!-- Submit & Actions -->
        <div class="flex items-center justify-between pt-2">
            <button type="button" onclick="if(confirm('Are you sure you want to delete this article?')) { document.getElementById('deleteBlogForm').submit(); }"
                class="px-4 py-2.5 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors border border-rose-500/20">
                Delete Article
            </button>

            <div class="flex items-center gap-3">
                <a href="<?= url('/admin/blogs') ?>" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider rounded-lg transition-all shadow-md">
                    Update Article
                </button>
            </div>
        </div>
    </form>

    <form id="deleteBlogForm" action="<?= url('/admin/blogs/' . $blog['id'] . '/delete') ?>" method="POST" class="hidden">
        <?= csrf_field() ?>
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
