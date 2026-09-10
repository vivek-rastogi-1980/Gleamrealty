<div class="max-w-5xl mx-auto space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Media Assets &amp; Floor Plans</h2>
            <p class="text-xs text-slate-400">Managing media assets for: <span class="text-amber-400 font-semibold"><?= e($project['name']) ?></span></p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/projects/' . $project['slug']) ?>" target="_blank" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold transition-colors">
                View Public Listing
            </a>
            <a href="<?= url('/admin/projects') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Projects
            </a>
        </div>
    </div>

    <!-- Upload Card -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
        <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-amber-400"></span> Upload New Media Asset
        </h3>

        <form action="<?= url('/admin/projects/' . $project['id'] . '/media') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Asset Category</label>
                    <select name="media_type" id="mediaTypeSelect" onchange="toggleMediaInput()"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                        <option value="gallery">Photo Gallery</option>
                        <option value="floorplan">Architectural Floor Plan</option>
                        <option value="elevation">Elevation Drawing</option>
                        <option value="video">Video Embed</option>
                    </select>
                </div>

                <div id="fileUploadWrapper" class="sm:col-span-2">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Select File (JPG, PNG, WEBP, PDF)</label>
                    <input type="file" name="media_file" accept="image/*,.pdf"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>

                <div id="videoUrlWrapper" class="sm:col-span-2 hidden">
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Video Embed URL (YouTube / Vimeo / MP4)</label>
                    <input type="text" name="video_url" placeholder="https://www.youtube.com/embed/..."
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Caption / Description</label>
                <input type="text" name="caption" placeholder="e.g. Master Layout Plan, Aerial Elevation, Living Lounge"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-5 py-2 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-md transition-all">
                    Upload &amp; Save Asset
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery Images Section -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
        <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center justify-between">
            <span>Property Image Gallery (<?= count($gallery) ?>)</span>
            <span class="text-xs text-slate-500 font-normal">Primary image is first in order</span>
        </h3>

        <?php if (empty($gallery)): ?>
            <div class="p-8 text-center text-slate-500 text-xs">No gallery images uploaded yet.</div>
        <?php else: ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <?php foreach ($gallery as $idx => $item): ?>
                    <div class="group relative rounded-lg bg-slate-950 border border-slate-800 overflow-hidden shadow">
                        <div class="aspect-video w-full overflow-hidden bg-slate-900">
                            <img src="<?= media_url($item['file_path']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="<?= e($item['caption']) ?>">
                        </div>
                        <div class="p-2.5 flex items-center justify-between text-xs">
                            <span class="truncate text-slate-400 font-medium max-w-[120px]" title="<?= e($item['caption']) ?>">
                                <?= e($item['caption'] ?: 'Photo #' . ($idx + 1)) ?>
                            </span>
                            <form action="<?= url('/admin/media/' . $item['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Delete this media asset?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="text-rose-400 hover:text-rose-300 p-1" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Floor Plans & Elevations Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Floor Plans -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3">
                Floor &amp; Master Plans (<?= count($floorplans) ?>)
            </h3>
            <?php if (empty($floorplans)): ?>
                <div class="p-6 text-center text-slate-500 text-xs">No floor plans uploaded yet.</div>
            <?php else: ?>
                <div class="space-y-3">
                    <?php foreach ($floorplans as $fp): ?>
                        <div class="flex items-center justify-between p-3 bg-slate-950/60 rounded-lg border border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-slate-800 flex items-center justify-center text-amber-400 flex-shrink-0 overflow-hidden">
                                    <?php if (str_ends_with(strtolower($fp['file_path']), '.pdf')): ?>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    <?php else: ?>
                                        <img src="<?= media_url($fp['file_path']) ?>" class="w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-white"><?= e($fp['caption'] ?: 'Floor Plan') ?></div>
                                    <a href="<?= media_url($fp['file_path']) ?>" target="_blank" class="text-[11px] text-amber-400 hover:underline">View Asset</a>
                                </div>
                            </div>
                            <form action="<?= url('/admin/media/' . $fp['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Delete this floor plan?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="text-rose-400 hover:text-rose-300 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Elevations & Videos -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3">
                Elevations &amp; Video Embeds (<?= count($elevations) + count($videos) ?>)
            </h3>
            <?php if (empty($elevations) && empty($videos)): ?>
                <div class="p-6 text-center text-slate-500 text-xs">No elevation drawings or video links yet.</div>
            <?php else: ?>
                <div class="space-y-3">
                    <?php foreach ($elevations as $el): ?>
                        <div class="flex items-center justify-between p-3 bg-slate-950/60 rounded-lg border border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-slate-800 flex items-center justify-center text-cyan-400 flex-shrink-0 overflow-hidden">
                                    <img src="<?= media_url($el['file_path']) ?>" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-white"><?= e($el['caption'] ?: 'Elevation Drawing') ?></div>
                                    <a href="<?= media_url($el['file_path']) ?>" target="_blank" class="text-[11px] text-cyan-400 hover:underline">View Elevation</a>
                                </div>
                            </div>
                            <form action="<?= url('/admin/media/' . $el['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Delete this elevation?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="text-rose-400 hover:text-rose-300 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>

                    <?php foreach ($videos as $vd): ?>
                        <div class="flex items-center justify-between p-3 bg-slate-950/60 rounded-lg border border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-red-500/10 text-red-400 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="text-xs font-semibold text-white truncate"><?= e($vd['caption'] ?: 'Video Tour') ?></div>
                                    <span class="text-[11px] text-slate-500 truncate block"><?= e($vd['file_path']) ?></span>
                                </div>
                            </div>
                            <form action="<?= url('/admin/media/' . $vd['id'] . '/delete') ?>" method="POST" onsubmit="return confirm('Delete this video link?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="text-rose-400 hover:text-rose-300 p-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<script>
function toggleMediaInput() {
    const type = document.getElementById('mediaTypeSelect').value;
    const fileWrapper = document.getElementById('fileUploadWrapper');
    const videoWrapper = document.getElementById('videoUrlWrapper');

    if (type === 'video') {
        fileWrapper.classList.add('hidden');
        videoWrapper.classList.remove('hidden');
    } else {
        fileWrapper.classList.remove('hidden');
        videoWrapper.classList.add('hidden');
    }
}
</script>
