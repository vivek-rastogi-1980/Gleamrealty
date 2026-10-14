<div class="space-y-6">

    <!-- Top Header & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Inbound Leads &amp; Inquiries</h2>
            <p class="text-xs text-slate-400">Review prospective buyer showing requests, contact information, and pipeline notes.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="<?= url('/admin/inquiries/export' . ($selected_project > 0 ? '?project_id=' . $selected_project : '')) ?>"
                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider py-2.5 px-4 rounded-lg transition-all shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export to CSV
            </a>
        </div>
    </div>

    <!-- Filter Bar -->
    <form action="<?= url('/admin/inquiries') ?>" method="GET" class="flex flex-wrap items-center gap-3 bg-slate-900/60 p-4 rounded-xl border border-slate-800">
        <div class="relative">
            <input type="text" name="search" value="<?= e($search) ?>" placeholder="Search name, phone, email..."
                class="bg-slate-950/70 border border-slate-700/80 rounded-lg pl-9 pr-4 py-2 text-sm text-white focus:outline-none focus:border-amber-400 w-64">
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>

        <select name="project_id" onchange="this.form.submit()"
            class="bg-slate-950/70 border border-slate-700/80 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-amber-400">
            <option value="">All Projects</option>
            <?php foreach ($projects as $proj): ?>
                <option value="<?= $proj['id'] ?>" <?= $selected_project === (int) $proj['id'] ? 'selected' : '' ?>>
                    <?= e($proj['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 text-sm font-medium rounded-lg transition-colors">
            Filter Leads
        </button>

        <?php if (!empty($search) || $selected_project > 0): ?>
            <a href="<?= url('/admin/inquiries') ?>" class="text-xs text-slate-400 hover:text-white underline">Reset</a>
        <?php endif; ?>
    </form>

    <!-- Leads Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-5">Date</th>
                        <th class="py-3.5 px-4">Prospective Client</th>
                        <th class="py-3.5 px-4">Contact Details</th>
                        <th class="py-3.5 px-4">Interested Estate</th>
                        <th class="py-3.5 px-4">Budget</th>
                        <th class="py-3.5 px-4">Notes / Message</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php if (empty($inquiries)): ?>
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-500">
                                No buyer inquiries recorded in this view.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($inquiries as $inq): ?>
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="py-4 px-5 text-xs text-slate-400 whitespace-nowrap">
                                    <?= date('M j, Y', strtotime($inq['created_at'])) ?>
                                    <div class="text-[10px] text-slate-500"><?= date('h:i A', strtotime($inq['created_at'])) ?></div>
                                </td>
                                <td class="py-4 px-4 font-semibold text-white">
                                    <?= e($inq['name']) ?>
                                </td>
                                <td class="py-4 px-4 text-xs">
                                    <div>
                                        <a href="tel:<?= e($inq['phone']) ?>" class="text-amber-400 hover:underline font-mono">
                                            <?= e($inq['phone']) ?>
                                        </a>
                                    </div>
                                    <?php if (!empty($inq['email'])): ?>
                                        <div class="text-slate-400 mt-0.5">
                                            <a href="mailto:<?= e($inq['email']) ?>" class="hover:underline">
                                                <?= e($inq['email']) ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-4 text-xs">
                                    <?php if (!empty($inq['project_name'])): ?>
                                        <span class="inline-block px-2.5 py-1 rounded bg-slate-800 text-amber-300 border border-amber-400/20 font-medium">
                                            <?= e($inq['project_name']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-slate-500 italic">General Consultation</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-4 text-xs font-semibold text-slate-300">
                                    <?= e($inq['budget_range'] ?: 'Unspecified') ?>
                                </td>
                                <td class="py-4 px-4 text-xs text-slate-400 max-w-xs truncate" title="<?= e($inq['message']) ?>">
                                    <?= e($inq['message'] ?: '—') ?>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <form action="<?= url('/admin/inquiries/' . $inq['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Remove this inquiry record?');" class="inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="px-2.5 py-1 text-xs bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 rounded transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
