<div class="space-y-6" x-data="{ 
    activeFilter: '<?= isset($_GET['type']) && $_GET['type'] === 'communities' ? 'communities' : 'all' ?>',
    deleteModal: false,
    deletePageId: null,
    deletePageTitle: '',
    deletePageSlug: ''
}">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                <h2 class="text-xl font-bold font-heading text-white">Pages CMS Manager</h2>
            </div>
            <p class="text-xs text-slate-400 mt-0.5">Manage community landing pages, guide pillars, hero images, and SEO metadata.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="<?= url('/admin/pages/create') ?>" class="inline-flex items-center gap-2 bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-semibold text-xs uppercase tracking-wider py-2.5 px-4 rounded-lg transition-all shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create New Page
            </a>
        </div>
    </div>

    <!-- Filter Tabs (Includes Direct Communities Filter) -->
    <div class="flex items-center gap-2 overflow-x-auto pb-1 border-b border-slate-800">
        <button type="button" @click="activeFilter = 'all'"
                :class="activeFilter === 'all' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            All Pages (<?= count($pages ?? []) ?>)
        </button>
        <button type="button" @click="activeFilter = 'communities'"
                :class="activeFilter === 'communities' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
            Communities Pages (3)
        </button>
        <button type="button" @click="activeFilter = 'guides'"
                :class="activeFilter === 'guides' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            Pillars &amp; Guides
        </button>
        <button type="button" @click="activeFilter = 'standard'"
                :class="activeFilter === 'standard' ? 'bg-amber-400 text-slate-950 font-bold shadow-md shadow-amber-400/10' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            Standard Pages
        </button>
    </div>

    <!-- Pages Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-5">Page &amp; Category</th>
                        <th class="py-3.5 px-4">Hero Background Visual</th>
                        <th class="py-3.5 px-4">Hero Heading</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    <?php if (empty($pages)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">
                                No custom pages found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pages as $pg): ?>
                            <?php 
                                $isCommunity = in_array($pg['slug'], ['location/vrindavan', 'location/mathura', 'residential-plots-in-vrindavan']);
                                $isGuide = str_contains($pg['slug'], 'plot-rate') || str_contains($pg['slug'], 'flats') || str_contains($pg['slug'], 'property-in') || str_contains($pg['slug'], 'commercial') || str_contains($pg['slug'], 'luxury-villas');
                                $filterCategory = $isCommunity ? 'communities' : ($isGuide ? 'guides' : 'standard');
                            ?>
                            <tr class="hover:bg-slate-800/30 transition-colors"
                                x-show="activeFilter === 'all' || activeFilter === '<?= $filterCategory ?>'">
                                <td class="py-4 px-5">
                                    <div class="flex items-center gap-2">
                                        <div class="font-semibold text-white text-sm">
                                            <?= e($pg['title']) ?>
                                        </div>
                                        <?php if ($isCommunity): ?>
                                            <span class="px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-md bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                                Community
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-xs text-slate-500 font-mono mt-0.5">
                                        /<?= e($pg['slug']) ?>
                                    </div>
                                </td>
                                
                                <!-- Hero Background Thumbnail -->
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-14 h-9 rounded-md overflow-hidden bg-slate-800 border border-slate-700 shrink-0 relative shadow-xs">
                                            <?php if (!empty($pg['hero_media_url'])): ?>
                                                <img src="<?= media_url($pg['hero_media_url']) ?>" alt="Hero" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center text-[9px] text-slate-500 font-mono">No Image</div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-[11px] text-slate-400 max-w-[140px] truncate font-mono">
                                            <?= !empty($pg['hero_media_url']) ? basename($pg['hero_media_url']) : 'Default Sanctuary' ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-4 text-xs text-slate-300 max-w-xs truncate">
                                    <?= e($pg['hero_heading'] ?: 'Default') ?>
                                </td>
                                <td class="py-4 px-4">
                                    <label class="relative inline-flex items-center cursor-pointer" x-data="{ active: <?= (int) ($pg['is_published'] ?? 1) ?> }">
                                        <input type="checkbox" class="sr-only peer" :checked="active" @change="
                                            fetch('<?= url('/admin/pages/' . $pg['id'] . '/toggle') ?>', {
                                                method: 'POST',
                                                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                body: '_csrf_token=<?= csrf_token() ?>&is_published=' + (active ? 0 : 1)
                                            })
                                            .then(res => res.json())
                                            .then(data => { if (data.success) { active = data.is_published; } else { active = !active; } })
                                        ">
                                        <div class="w-9 h-5 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
                                        <span class="ml-2 text-xs font-semibold" :class="active ? 'text-emerald-400' : 'text-slate-400'" x-text="active ? 'Published' : 'Draft'"></span>
                                    </label>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= url('/' . $pg['slug']) ?>" target="_blank" class="px-2.5 py-1.5 text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-md transition-colors flex items-center gap-1 shadow-xs whitespace-nowrap">
                                            <span>View</span>
                                            <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>
                                        <?php if ($pg['slug'] === 'contact-us'): ?>
                                            <a href="<?= url('/admin/contact') ?>" class="px-3 py-1.5 text-xs bg-sky-500 hover:bg-sky-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage office address, phone, map, and form">
                                                <span>Contact CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'about-us'): ?>
                                            <a href="<?= url('/admin/about') ?>" class="px-3 py-1.5 text-xs bg-amber-400 hover:bg-amber-300 text-slate-950 font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap">
                                                <span>About CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'property-in-vrindavan'): ?>
                                            <a href="<?= url('/admin/property-vrindavan') ?>" class="px-3 py-1.5 text-xs bg-emerald-500 hover:bg-emerald-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage all sections, text and photos for Property in Vrindavan">
                                                <span>Property CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'residential-plots-in-vrindavan'): ?>
                                            <a href="<?= url('/admin/residential-plots') ?>" class="px-3 py-1.5 text-xs bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage all sections, text and photos for Residential Plots in Vrindavan">
                                                <span>Plots CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'commercial-property-in-vrindavan'): ?>
                                            <a href="<?= url('/admin/commercial-property') ?>" class="px-3 py-1.5 text-xs bg-indigo-500 hover:bg-indigo-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage all sections, text and photos for Commercial Property in Vrindavan">
                                                <span>Commercial CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'property-in-mathura'): ?>
                                            <a href="<?= url('/admin/property-mathura') ?>" class="px-3 py-1.5 text-xs bg-fuchsia-500 hover:bg-fuchsia-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Mathura Property Page">
                                                <span>Property CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'luxury-villas-in-vrindavan'): ?>
                                            <a href="<?= url('/admin/luxury-villas') ?>" class="px-3 py-1.5 text-xs bg-rose-500 hover:bg-rose-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Luxury Villas">
                                                <span>Villas CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'plot-rate-mathura'): ?>
                                            <a href="<?= url('/admin/plot-rate-mathura') ?>" class="px-3 py-1.5 text-xs bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Mathura Plot Rate">
                                                <span>Plot Rate CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'plot-rate-vrindavan'): ?>
                                            <a href="<?= url('/admin/plot-rate-vrindavan') ?>" class="px-3 py-1.5 text-xs bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Vrindavan Plot Rate">
                                                <span>Plot Rate CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'flats-apartments-in-vrindavan'): ?>
                                            <a href="<?= url('/admin/flats-apartments') ?>" class="px-3 py-1.5 text-xs bg-sky-500 hover:bg-sky-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Flats in Vrindavan">
                                                <span>Flats CMS</span>
                                            </a>
                                        <?php elseif ($pg['slug'] === 'location/vrindavan' || $pg['slug'] === 'vrindavan'): ?>
                                            <a href="<?= url('/admin/location-vrindavan') ?>" class="px-3 py-1.5 text-xs bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap" title="Manage Vrindavan Communities">
                                                <span>Communities CMS</span>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= url('/admin/pages/' . $pg['id'] . '/edit') ?>" class="px-3 py-1.5 text-xs bg-amber-400 hover:bg-amber-500 text-slate-950 font-semibold rounded-md transition-colors shadow-xs flex items-center gap-1.5 whitespace-nowrap">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            <span>Edit Page</span>
                                        </a>
                                        
                                        <!-- Delete Trigger Button & Associated Form -->
                                        <button type="button" 
                                                @click="deleteModal = true; deletePageId = <?= (int) $pg['id'] ?>; deletePageTitle = '<?= htmlspecialchars(addslashes($pg['title']), ENT_QUOTES, 'UTF-8') ?>'; deletePageSlug = '<?= htmlspecialchars(addslashes($pg['slug']), ENT_QUOTES, 'UTF-8') ?>'"
                                                onclick="if(!window.Alpine) { confirmDeletePage(<?= (int) $pg['id'] ?>, '<?= htmlspecialchars(addslashes($pg['title']), ENT_QUOTES, 'UTF-8') ?>'); }"
                                                class="px-2.5 py-1.5 text-xs bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 hover:text-rose-300 rounded-md transition-colors font-medium cursor-pointer flex items-center gap-1 whitespace-nowrap"
                                                title="Permanently Delete Page">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>Delete</span>
                                        </button>
                                        <form id="delete-page-form-<?= (int) $pg['id'] ?>" action="<?= url('/admin/pages/' . $pg['id'] . '/delete') ?>" method="POST" class="hidden">
                                            <?= csrf_field() ?>
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

    <!-- Sleek In-Page Delete Confirmation Modal -->
    <div x-show="deleteModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm"
         style="display: none;">
        
        <div @click.away="deleteModal = false"
             class="bg-slate-900 border border-slate-800 rounded-2xl max-w-md w-full p-6 shadow-2xl space-y-4">
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-400 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-white font-heading">Delete Page</h3>
                    <p class="text-xs text-slate-400">This action is permanent and cannot be reversed.</p>
                </div>
            </div>

            <p class="text-sm text-slate-300">
                Are you sure you want to permanently delete <strong class="text-white" x-text="deletePageTitle"></strong> (<span class="font-mono text-xs text-amber-400" x-text="'/' + deletePageSlug"></span>)?
            </p>

            <form id="activeDeleteForm" :action="'<?= url('/admin/pages') ?>/' + deletePageId + '/delete'" method="POST" class="pt-2 flex items-center justify-end gap-3">
                <?= csrf_field() ?>
                <button type="button" 
                        @click="deleteModal = false"
                        class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors cursor-pointer">
                    Cancel
                </button>
                <button type="submit" 
                        id="confirmDeleteSubmitBtn"
                        class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white rounded-lg text-xs font-bold uppercase tracking-wider transition-colors shadow-lg shadow-rose-600/20 flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span>Yes, Delete Page</span>
                </button>
            </form>
        </div>
    </div>

</div>

<!-- Guaranteed Delete Fallback Handler Script -->
<script>
function confirmDeletePage(pageId, pageTitle) {
    if (confirm('Are you sure you want to permanently delete the page "' + pageTitle + '"?\n\nThis action cannot be undone.')) {
        var form = document.getElementById('delete-page-form-' + pageId);
        if (form) {
            form.submit();
        } else {
            var f = document.createElement('form');
            f.method = 'POST';
            f.action = '<?= url('/admin/pages') ?>/' + pageId + '/delete';
            var token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_csrf_token';
            token.value = '<?= csrf_token() ?>';
            f.appendChild(token);
            document.body.appendChild(f);
            f.submit();
        }
    }
}
</script>
