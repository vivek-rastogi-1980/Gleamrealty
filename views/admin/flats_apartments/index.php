<?php
/**
 * Flats in Vrindavan CMS Form
 *
 * @var array $sections
 * @var string $seo_title
 */
?>

<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Manage Flats in Vrindavan</h1>
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

    <form action="<?= url('/admin/flats-apartments') ?>" method="POST" class="space-y-8">
        <input type="hidden" name="_csrf_token" value="<?= csrf_token() ?>">

        <!-- Overview Section -->
        <div class="p-6 rounded-xl border bg-slate-900 border-slate-700 space-y-6">
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2">Overview Narrative</h2>
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-1">Content (HTML allowed)</label>
                <textarea name="overview_content" rows="6" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-slate-200 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"><?= htmlspecialchars($sections['overview_content'] ?? '', ENT_QUOTES) ?></textarea>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="space-y-3 border border-slate-700 p-4 rounded-lg bg-slate-800">
                        <h4 class="text-sm font-medium text-amber-400">Metric <?= $i ?></h4>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Value (e.g. ₹35L-95L)</label>
                            <input type="text" name="metric_<?= $i ?>_val" value="<?= htmlspecialchars($sections["metric_{$i}_val"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Label</label>
                            <input type="text" name="metric_<?= $i ?>_lbl" value="<?= htmlspecialchars($sections["metric_{$i}_lbl"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Locality Hubs -->
        <div class="p-6 rounded-xl border bg-slate-900 border-slate-700 space-y-6">
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2">Locality Hubs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="space-y-4 border border-slate-700 p-5 rounded-lg bg-slate-800">
                        <h4 class="text-sm font-medium text-amber-400">Hub <?= $i ?></h4>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Badge Text</label>
                            <input type="text" name="hub_<?= $i ?>_badge" value="<?= htmlspecialchars($sections["hub_{$i}_badge"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Title</label>
                            <input type="text" name="hub_<?= $i ?>_title" value="<?= htmlspecialchars($sections["hub_{$i}_title"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div>
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Description</label>
                            <textarea name="hub_<?= $i ?>_desc" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200"><?= htmlspecialchars($sections["hub_{$i}_desc"] ?? '', ENT_QUOTES) ?></textarea>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- 5-Point Checklist -->
        <div class="p-6 rounded-xl border bg-slate-900 border-slate-700 space-y-6">
            <h2 class="text-lg font-semibold text-white border-b border-slate-700 pb-2">5-Point Checklist</h2>
            <div class="space-y-4">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 border border-slate-700 p-4 rounded-lg bg-slate-800 items-start">
                        <div class="md:col-span-1 text-center pt-2 font-bold text-amber-500">0<?= $i ?></div>
                        <div class="md:col-span-3">
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Title</label>
                            <input type="text" name="check_<?= $i ?>_title" value="<?= htmlspecialchars($sections["check_{$i}_title"] ?? '', ENT_QUOTES) ?>" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200">
                        </div>
                        <div class="md:col-span-8">
                            <label class="block text-[11px] uppercase tracking-wider text-slate-500 mb-1">Description</label>
                            <textarea name="check_<?= $i ?>_desc" rows="2" class="w-full bg-slate-900 border border-slate-700 rounded-md px-3 py-2 text-sm text-slate-200"><?= htmlspecialchars($sections["check_{$i}_desc"] ?? '', ENT_QUOTES) ?></textarea>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-6">
            <button type="submit" class="px-6 py-2.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold rounded-lg shadow-lg shadow-amber-500/20 transition-all">
                Save Flats CMS Sections
            </button>
        </div>
    </form>
</div>
