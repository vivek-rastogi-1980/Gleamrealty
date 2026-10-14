<div class="space-y-6">

    <!-- Top Action & Filter Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <form action="<?= url('/admin/projects') ?>" method="GET" class="flex flex-wrap items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="<?= e($search) ?>" placeholder="Search projects, location..."
                    class="bg-slate-900 border border-slate-700/80 rounded-lg pl-9 pr-4 py-2 text-sm text-white focus:outline-none focus:border-amber-400 w-64">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="location" onchange="this.form.submit()"
                class="bg-slate-900 border border-slate-700/80 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-amber-400">
                <option value="">All Locations</option>
                <?php foreach (($locations ?? []) as $loc): ?>
                    <option value="<?= e($loc) ?>" <?= ($selected_location ?? '') === $loc ? 'selected' : '' ?>><?= e($loc) ?></option>
                <?php endforeach; ?>
            </select>

            <select name="type" onchange="this.form.submit()"
                class="bg-slate-900 border border-slate-700/80 rounded-lg px-3 py-2 text-sm text-slate-200 focus:outline-none focus:border-amber-400">
                <option value="">All Project Types</option>
                <?php $types = ['Plotted Community', 'Land / Plots', 'Flats & Apartments', 'Apartment', 'Flat', 'Luxury Villas', 'Commercial', 'Township']; ?>
                <?php foreach ($types as $t): ?>
                    <option value="<?= $t ?>" <?= ($selected_type ?? '') === $t ? 'selected' : '' ?>><?= $t ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 text-sm font-medium rounded-lg transition-colors">
                Filter
            </button>
            <?php if (!empty($search) || !empty($selected_type) || !empty($selected_location)): ?>
                <a href="<?= url('/admin/projects') ?>" class="text-xs text-slate-400 hover:text-white underline">Clear</a>
            <?php endif; ?>
        </form>

        <a href="<?= url('/admin/projects/create') ?>" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider py-2.5 px-4 rounded-lg transition-all shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Project
        </a>
    </div>

    <!-- Projects Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-5">Project</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4">Type</th>
                        <th class="py-3.5 px-4">Starting Price</th>
                        <th class="py-3.5 px-4">Approvals</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php if (empty($projects)): ?>
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500">
                                No projects match your criteria.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($projects as $p): ?>
                            <?php $heroImg = \App\Models\Project::getHeroImage((int) $p['id']); ?>
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="py-4 px-5">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-12 h-12 rounded-lg bg-slate-800 border border-slate-700/60 overflow-hidden flex-shrink-0">
                                            <img src="<?= media_url($heroImg) ?>" class="w-full h-full object-cover" alt="<?= e($p['name']) ?>">
                                        </div>
                                        <div class="min-w-0">
                                            <a href="<?= url('/projects/' . $p['slug']) ?>" target="_blank" class="font-semibold text-white hover:text-amber-400 transition-colors text-sm block truncate max-w-xs">
                                                <?= e($p['name']) ?>
                                            </a>
                                            <div class="text-xs text-slate-500 truncate max-w-xs">
                                                /projects/<?= e($p['slug']) ?>
                                            </div>
                                            <div class="flex items-center gap-1.5 mt-1.5">
                                                <?php if (!empty($p['brochure_url'])): ?>
                                                    <a href="<?= media_url($p['brochure_url']) ?>" target="_blank" download class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 hover:bg-amber-500/20 transition-colors" title="Download Brochure">
                                                        Brochure &darr;
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($p['floor_plan_url'])): ?>
                                                    <a href="<?= media_url($p['floor_plan_url']) ?>" target="_blank" download class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded text-[10px] font-semibold bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500/20 transition-colors" title="Download Floor Plan">
                                                        Floor Plan &darr;
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($p['payment_plan_url'])): ?>
                                                    <a href="<?= media_url($p['payment_plan_url']) ?>" target="_blank" download class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 hover:bg-amber-500/20 transition-colors" title="Download Payment Plan">
                                                        Payment &darr;
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-800 border border-slate-700/80 text-xs font-medium text-slate-200">
                                        <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                        <span><?= e($p['location']) ?></span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-800 text-amber-300 border border-amber-400/20">
                                        <?= e($p['project_type']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-xs font-semibold text-white">
                                    <?= e($p['starting_price'] ?: 'POR') ?>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-1.5 flex-wrap">
                                        <?php if ((int) $p['mvda_approved'] === 1): ?>
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-amber-500/10 text-amber-400 border border-amber-500/30">MVDA</span>
                                        <?php endif; ?>
                                        <?php if (!empty($p['rera_id'])): ?>
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-indigo-500/10 text-indigo-400 border border-indigo-500/30">RERA</span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <label class="relative inline-flex items-center cursor-pointer" x-data="{ active: <?= (int) ($p['is_active'] ?? 1) ?> }">
                                        <input type="checkbox" class="sr-only peer" :checked="active" @change="
                                            fetch('<?= url('/admin/projects/' . $p['id'] . '/toggle') ?>', {
                                                method: 'POST',
                                                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                body: '_csrf_token=<?= csrf_token() ?>&is_active=' + (active ? 0 : 1)
                                            })
                                            .then(res => res.json())
                                            .then(data => { if (data.success) { active = data.is_active; } else { active = !active; } })
                                        ">
                                        <div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= url('/admin/projects/' . $p['id'] . '/media') ?>" class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded transition-colors" title="Manage Media, Gallery, Floor Plans">
                                            Media
                                        </a>
                                        <a href="<?= url('/admin/projects/' . $p['id'] . '/edit') ?>" class="px-2.5 py-1 text-xs bg-amber-400/10 hover:bg-amber-400/20 text-amber-300 rounded transition-colors">
                                            Edit
                                        </a>
                                        <form action="<?= url('/admin/projects/' . $p['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Are you sure you want to permanently remove this project?');" class="inline">
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
