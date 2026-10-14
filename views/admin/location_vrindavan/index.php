<?php
/**
 * Vrindavan Communities CMS Form
 *
 * @var array $sections
 * @var string $seo_title
 */
?>

<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Manage Vrindavan Communities</h1>
        <a href="<?= url('/admin/pages') ?>" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-800 rounded-lg hover:bg-slate-700 transition-colors">
            &larr; Back to Pages
        </a>
    </div>

    <?php if ($flash = flash('success')): ?>
        <div class="p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400">
            <?= $flash ?>
        </div>
    <?php endif; ?>
    <?php if ($flash = flash('error')): ?>
        <div class="p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400">
            <?= $flash ?>
        </div>
    <?php endif; ?>

    <form action="<?= url('/admin/location-vrindavan') ?>" method="POST" class="space-y-8">
        <input type="hidden" name="_csrf_token" value="<?= csrf_token() ?>">

        <!-- Overview Section -->
        <div class="p-6 rounded-xl border bg-slate-900 border-slate-700 space-y-6">
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2">Editorial Narrative</h2>
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-1">Content (HTML allowed)</label>
                <textarea name="overview_content" rows="6" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-slate-200 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"><?= htmlspecialchars($sections['overview_content'] ?? '', ENT_QUOTES) ?></textarea>
            </div>
            
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2 mt-8">4 Key Highlights</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="space-y-4 border border-slate-700 p-5 rounded-lg bg-slate-800">
                        <h4 class="text-sm font-medium text-amber-400">Highlight <?= $i ?></h4>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Title</label>
                            <input type="text" name="highlight_<?= $i ?>_title" value="<?= htmlspecialchars($sections["highlight_{$i}_title"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Description</label>
                            <textarea name="highlight_<?= $i ?>_desc" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200"><?= htmlspecialchars($sections["highlight_{$i}_desc"] ?? '', ENT_QUOTES) ?></textarea>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Featured Projects Selection -->
        <div class="p-6 rounded-xl border bg-slate-900 border-slate-700 space-y-4">
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2">Selected Properties</h2>
            <p class="text-sm text-slate-400">Checked properties will show on the Vrindavan Communities page. Unchecked properties will not be listed.</p>
            
            <?php 
            $selectedIds = $sections['selected_projects'] ?? []; 
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto p-4 bg-slate-800 border border-slate-700 rounded-lg">
                <?php foreach ($allProjects as $proj): ?>
                    <?php $isSelected = in_array((int)$proj['id'], $selectedIds, true); ?>
                    <label class="flex items-center space-x-3 cursor-pointer p-2 rounded hover:bg-slate-700 transition-colors">
                        <input type="checkbox" name="selected_projects[]" value="<?= $proj['id'] ?>" <?= $isSelected ? 'checked' : '' ?> 
                               class="w-5 h-5 rounded border-slate-600 bg-slate-900 text-amber-500 focus:ring-amber-500 focus:ring-offset-slate-800">
                        <span class="text-slate-200 text-sm font-medium">
                            <?= htmlspecialchars($proj['name']) ?> 
                            <span class="text-slate-400 text-xs ml-1">(<?= htmlspecialchars($proj['location'] ?? 'Unknown') ?>)</span>
                        </span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-6">
            <button type="submit" class="px-6 py-2.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold rounded-lg shadow-lg shadow-amber-500/20 transition-all">
                Save Communities CMS Sections
            </button>
        </div>
    </form>
</div>
