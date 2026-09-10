<div class="space-y-6">

    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Editorial &amp; Blog Management</h2>
            <p class="text-xs text-slate-400">Publish and manage market intelligence, Vrindavan investment guides, and legal advisory articles.</p>
        </div>

        <a href="<?= url('/admin/blogs/create') ?>" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider py-2.5 px-4 rounded-lg transition-all shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Write New Article
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-4 shadow-xl">
        <form method="GET" action="<?= url('/admin/blogs') ?>" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <div class="sm:col-span-6 relative">
                <input type="text" name="search" value="<?= e($search ?? '') ?>" placeholder="Search by title, excerpt, or author..."
                    class="w-full bg-slate-950/80 border border-slate-700/80 rounded-lg pl-9 pr-4 py-2 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-400">
                <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div class="sm:col-span-4">
                <select name="category" class="w-full bg-slate-950/80 border border-slate-700/80 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-amber-400">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= e($cat) ?>" <?= ($selected_category ?? '') === $cat ? 'selected' : '' ?>>
                            <?= e($cat) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="sm:col-span-2 flex gap-2">
                <button type="submit" class="w-full py-2 px-3 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-xs font-semibold transition-colors">
                    Filter
                </button>
                <?php if (!empty($search) || !empty($selected_category)): ?>
                    <a href="<?= url('/admin/blogs') ?>" class="py-2 px-3 bg-slate-900 hover:bg-slate-800 text-slate-400 rounded-lg text-xs transition-colors flex items-center justify-center" title="Reset">
                        ✕
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Blogs Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4 w-16">Cover</th>
                        <th class="py-3.5 px-5">Title &amp; URL Slug</th>
                        <th class="py-3.5 px-4">Category</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4">Published Date</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php if (empty($blogs)): ?>
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500">
                                <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center mx-auto mb-3 text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                                <p class="text-sm font-semibold text-white mb-1">No articles found</p>
                                <p class="text-xs text-slate-400 mb-4">Start composing your first Braj real estate market guide.</p>
                                <a href="<?= url('/admin/blogs/create') ?>" class="inline-flex items-center gap-1.5 text-xs text-amber-400 font-semibold hover:underline">
                                    + Compose Article
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($blogs as $post): ?>
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <!-- Cover Thumbnail -->
                                <td class="py-3.5 px-4">
                                    <div class="w-14 h-10 rounded-md overflow-hidden bg-slate-800 border border-slate-700/60 flex-shrink-0">
                                        <?php if (!empty($post['featured_image'])): ?>
                                            <img src="<?= asset($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Title & Slug -->
                                <td class="py-4 px-5">
                                    <a href="<?= url('/admin/blogs/' . $post['id'] . '/edit') ?>" class="font-semibold text-white text-sm hover:text-amber-400 transition-colors line-clamp-1">
                                        <?= e($post['title']) ?>
                                    </a>
                                    <div class="text-xs text-slate-500 font-mono mt-0.5">
                                        /blog/<?= e($post['slug']) ?>
                                    </div>
                                </td>

                                <!-- Category -->
                                <td class="py-4 px-4 text-xs">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-amber-400/10 text-amber-300 border border-amber-400/20">
                                        <?= e($post['category'] ?: 'Market Insights') ?>
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="py-4 px-4">
                                    <?php if ((int) ($post['is_published'] ?? 1) === 1): ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Published
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-800 text-slate-400 border border-slate-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Draft
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <!-- Date -->
                                <td class="py-4 px-4 text-xs text-slate-400 whitespace-nowrap">
                                    <?= date('M j, Y', strtotime($post['published_at'] ?? $post['created_at'])) ?>
                                    <div class="text-[10px] text-slate-500"><?= e($post['read_time'] ?: '5 min') ?></div>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-5 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <?php if ((int) ($post['is_published'] ?? 1) === 1): ?>
                                            <a href="<?= url('/blog/' . $post['slug']) ?>" target="_blank" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded transition-colors flex items-center gap-1">
                                                <span>View</span>
                                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= url('/admin/blogs/' . $post['id'] . '/edit') ?>" class="px-2.5 py-1 text-xs bg-amber-400/10 hover:bg-amber-400/20 text-amber-300 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="<?= url('/admin/blogs/' . $post['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Permanently remove this article?');" class="inline">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="px-2.5 py-1 text-xs bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 rounded transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
