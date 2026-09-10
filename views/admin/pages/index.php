<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Pages CMS</h2>
            <p class="text-xs text-slate-400">Manage informational pages, guides, and dynamic landing templates.</p>
        </div>

        <a href="<?= url('/admin/pages/create') ?>" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider py-2.5 px-4 rounded-lg transition-all shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create New Page
        </a>
    </div>

    <!-- Pages Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-5">Title &amp; URL Slug</th>
                        <th class="py-3.5 px-4">Hero Heading</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4">Last Modified</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php if (empty($pages)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">
                                No custom pages created yet.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pages as $pg): ?>
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="py-4 px-5">
                                    <div class="font-semibold text-white text-sm">
                                        <?= e($pg['title']) ?>
                                    </div>
                                    <div class="text-xs text-slate-500">
                                        /<?= e($pg['slug']) ?>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-xs text-slate-300 max-w-xs truncate">
                                    <?= e($pg['hero_heading'] ?: 'Default') ?>
                                </td>
                                <td class="py-4 px-4">
                                    <?php if ((int) ($pg['is_published'] ?? 1) === 1): ?>
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                            Published
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-800 text-slate-400 border border-slate-700">
                                            Draft
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-4 text-xs text-slate-400">
                                    <?= date('M j, Y', strtotime($pg['updated_at'] ?? $pg['created_at'])) ?>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= url('/' . $pg['slug']) ?>" target="_blank" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded transition-colors">
                                            View
                                        </a>
                                        <a href="<?= url('/admin/pages/' . $pg['id'] . '/edit') ?>" class="px-2.5 py-1 text-xs bg-amber-400/10 hover:bg-amber-400/20 text-amber-300 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="<?= url('/admin/pages/' . $pg['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Permanently remove this page?');" class="inline">
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
