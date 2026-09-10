<div class="space-y-8">

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- Projects Card -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition-all shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">Total Projects</span>
                <span class="w-8 h-8 rounded-lg bg-amber-400/10 text-amber-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-bold font-heading text-white"><?= $project_count ?></span>
                <span class="text-xs text-emerald-400 font-medium">Active listings</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/80">
                <a href="<?= url('/admin/projects') ?>" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1 transition-colors">
                    Manage &rarr;
                </a>
            </div>
        </div>

        <!-- Inquiries Card -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition-all shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">Inbound Leads</span>
                <span class="w-8 h-8 rounded-lg bg-emerald-400/10 text-emerald-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-bold font-heading text-white"><?= $inquiry_count ?></span>
                <span class="text-xs text-emerald-400 font-medium">VIP Leads</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/80">
                <a href="<?= url('/admin/inquiries') ?>" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1 transition-colors">
                    View Leads &rarr;
                </a>
            </div>
        </div>

        <!-- Blog Articles Card -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition-all shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">Blog Articles</span>
                <span class="w-8 h-8 rounded-lg bg-rose-400/10 text-rose-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-bold font-heading text-white"><?= $blog_count ?></span>
                <span class="text-xs text-rose-400 font-medium">Published</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/80">
                <a href="<?= url('/admin/blogs') ?>" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1 transition-colors">
                    Manage Blog &rarr;
                </a>
            </div>
        </div>

        <!-- CMS Pages Card -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition-all shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">CMS Pages</span>
                <span class="w-8 h-8 rounded-lg bg-indigo-400/10 text-indigo-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-bold font-heading text-white"><?= $page_count ?></span>
                <span class="text-xs text-indigo-400 font-medium">Pages</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/80">
                <a href="<?= url('/admin/pages') ?>" class="text-xs font-semibold text-amber-400 hover:text-amber-300 flex items-center gap-1 transition-colors">
                    Manage Pages &rarr;
                </a>
            </div>
        </div>

        <!-- Media Assets Card -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition-all shadow-lg">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">Media Assets</span>
                <span class="w-8 h-8 rounded-lg bg-cyan-400/10 text-cyan-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-bold font-heading text-white"><?= $media_count ?></span>
                <span class="text-xs text-slate-400 font-medium">Uploads</span>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/80">
                <span class="text-xs text-slate-500">Sanitized storage</span>
            </div>
        </div>
    </div>

    <!-- Hero Section Banner -->
    <div class="bg-gradient-to-r from-amber-500/15 via-slate-900/80 to-slate-900/80 border border-amber-500/30 rounded-xl p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-xl">
        <div class="flex items-center gap-4">
            <div class="w-11 h-11 rounded-xl bg-amber-400/20 border border-amber-400/40 flex items-center justify-center text-amber-400 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
            </div>
            <div>
                <h3 class="font-heading font-semibold text-white text-sm">Homepage Hero Section &amp; Slides</h3>
                <p class="text-xs text-slate-400 mt-0.5">Manage the editorial headline, description, featured estate carousel slides, and trust metrics.</p>
            </div>
        </div>
        <a href="<?= url('/admin/hero') ?>" class="px-4 py-2 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold text-xs uppercase tracking-wider rounded-lg transition-all shadow-md shadow-amber-400/10 shrink-0 flex items-center gap-1.5 self-start sm:self-auto">
            <span>Manage Hero Section</span>
            <span>&rarr;</span>
        </a>
    </div>

    <!-- Two Column Grid for Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Projects -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
            <div class="p-5 border-b border-slate-800/80 flex items-center justify-between">
                <h3 class="font-heading font-semibold text-white text-base">Recent Projects</h3>
                <a href="<?= url('/admin/projects') ?>" class="text-xs text-amber-400 hover:underline">View All</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                <?php if (empty($recent_projects)): ?>
                    <div class="p-6 text-center text-slate-500 text-sm">No projects added yet.</div>
                <?php else: ?>
                    <?php foreach ($recent_projects as $rp): ?>
                        <div class="p-4 hover:bg-slate-800/30 transition-colors flex items-center justify-between">
                            <div class="min-w-0 pr-4">
                                <h4 class="text-sm font-medium text-white truncate"><?= e($rp['name']) ?></h4>
                                <div class="text-xs text-slate-400 flex items-center gap-3 mt-1">
                                    <span><?= e($rp['location']) ?></span>
                                    <span class="text-slate-600">&bull;</span>
                                    <span class="text-amber-400 font-semibold"><?= e($rp['starting_price'] ?: 'POR') ?></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <a href="<?= url('/admin/projects/' . $rp['id'] . '/media') ?>" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded transition-colors" title="Manage Media">
                                    Media
                                </a>
                                <a href="<?= url('/admin/projects/' . $rp['id'] . '/edit') ?>" class="px-2.5 py-1 text-xs bg-amber-400/10 hover:bg-amber-400/20 text-amber-300 rounded transition-colors">
                                    Edit
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
            <div class="p-5 border-b border-slate-800/80 flex items-center justify-between">
                <h3 class="font-heading font-semibold text-white text-base">Recent Inquiries</h3>
                <div class="flex items-center gap-3">
                    <a href="<?= url('/admin/inquiries/export') ?>" class="text-xs text-emerald-400 hover:underline flex items-center gap-1 font-semibold">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Export CSV
                    </a>
                    <a href="<?= url('/admin/inquiries') ?>" class="text-xs text-amber-400 hover:underline">View All</a>
                </div>
            </div>
            <div class="divide-y divide-slate-800/60">
                <?php if (empty($recent_inquiries)): ?>
                    <div class="p-6 text-center text-slate-500 text-sm">No buyer inquiries received yet.</div>
                <?php else: ?>
                    <?php foreach ($recent_inquiries as $inq): ?>
                        <div class="p-4 hover:bg-slate-800/30 transition-colors">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm font-medium text-white"><?= e($inq['name']) ?></span>
                                <span class="text-xs text-slate-500"><?= date('M j, Y', strtotime($inq['created_at'])) ?></span>
                            </div>
                            <div class="text-xs text-slate-400 flex items-center gap-3">
                                <a href="tel:<?= e($inq['phone']) ?>" class="text-amber-400 hover:underline"><?= e($inq['phone']) ?></a>
                                <?php if (!empty($inq['email'])): ?>
                                    <span class="text-slate-600">&bull;</span>
                                    <span><?= e($inq['email']) ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($inq['project_name'])): ?>
                                <div class="mt-1.5 text-xs text-slate-300">
                                    Project: <span class="text-amber-300 font-medium"><?= e($inq['project_name']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
