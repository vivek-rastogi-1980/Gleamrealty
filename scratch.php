<?php

$controllerCode = <<<'PHP'
<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\Csrf;

class PlotRateMathuraController extends Controller
{
    public function index(Request $request): Response
    {
        return $this->adminView('admin/plot_rate_mathura/index', [
            'seo_title' => 'Manage Mathura Plot Rate Page',
            'pr' => Setting::getMathuraPlotRateSections(),
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/plot-rate-mathura'));
        }

        $current = Setting::getMathuraPlotRateSections();

        $metrics = [
            'val_1' => trim((string) $request->input('metrics_val_1', $current['metrics']['val_1'] ?? '')),
            'lbl_1' => trim((string) $request->input('metrics_lbl_1', $current['metrics']['lbl_1'] ?? '')),
            'val_2' => trim((string) $request->input('metrics_val_2', $current['metrics']['val_2'] ?? '')),
            'lbl_2' => trim((string) $request->input('metrics_lbl_2', $current['metrics']['lbl_2'] ?? '')),
            'val_3' => trim((string) $request->input('metrics_val_3', $current['metrics']['val_3'] ?? '')),
            'lbl_3' => trim((string) $request->input('metrics_lbl_3', $current['metrics']['lbl_3'] ?? '')),
            'val_4' => trim((string) $request->input('metrics_val_4', $current['metrics']['val_4'] ?? '')),
            'lbl_4' => trim((string) $request->input('metrics_lbl_4', $current['metrics']['lbl_4'] ?? '')),
        ];

        Setting::set('plot_rate_mathura_sections', [
            'metrics' => $metrics,
        ]);

        $this->flash('success', 'Mathura Plot Rate page sections updated successfully.');
        return $this->redirect(url('/admin/plot-rate-mathura'));
    }
}
PHP;

$viewCode = <<<'PHP'
<?php
$title = $seo_title ?? 'Manage Mathura Plot Rate';
ob_start();
?>
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-200">Manage Mathura Plot Rate</h1>
    </div>

    <?php if (isset($_SESSION['flash_success'])): ?>
        <div class="p-4 rounded-lg bg-green-50 text-green-700 border border-green-200">
            <?= e($_SESSION['flash_success']); unset($_SESSION['flash_success']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['flash_error'])): ?>
        <div class="p-4 rounded-lg bg-red-50 text-red-700 border border-red-200">
            <?= e($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?>
        </div>
    <?php endif; ?>

    <form action="<?= url('/admin/plot-rate-mathura') ?>" method="POST" class="space-y-6 bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
        <?= \Core\Csrf::input() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Metric 1 -->
            <div class="space-y-4 border p-4 rounded bg-slate-50 dark:bg-slate-700/50">
                <h3 class="font-bold border-b pb-2">Metric 1</h3>
                <div>
                    <label class="block text-sm font-medium mb-1">Value</label>
                    <input type="text" name="metrics_val_1" class="form-input w-full" value="<?= e($pr['metrics']['val_1'] ?? '₹35,000') ?>">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Label</label>
                    <input type="text" name="metrics_lbl_1" class="form-input w-full" value="<?= e($pr['metrics']['lbl_1'] ?? 'Gated Benchmark') ?>">
                </div>
            </div>

            <!-- Metric 2 -->
            <div class="space-y-4 border p-4 rounded bg-slate-50 dark:bg-slate-700/50">
                <h3 class="font-bold border-b pb-2">Metric 2</h3>
                <div>
                    <label class="block text-sm font-medium mb-1">Value</label>
                    <input type="text" name="metrics_val_2" class="form-input w-full" value="<?= e($pr['metrics']['val_2'] ?? '100 Gaj') ?>">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Label</label>
                    <input type="text" name="metrics_lbl_2" class="form-input w-full" value="<?= e($pr['metrics']['lbl_2'] ?? 'Standard Size') ?>">
                </div>
            </div>
            
            <!-- Metric 3 -->
            <div class="space-y-4 border p-4 rounded bg-slate-50 dark:bg-slate-700/50">
                <h3 class="font-bold border-b pb-2">Metric 3</h3>
                <div>
                    <label class="block text-sm font-medium mb-1">Value</label>
                    <input type="text" name="metrics_val_3" class="form-input w-full" value="<?= e($pr['metrics']['val_3'] ?? '100%') ?>">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Label</label>
                    <input type="text" name="metrics_lbl_3" class="form-input w-full" value="<?= e($pr['metrics']['lbl_3'] ?? 'Clear Titles') ?>">
                </div>
            </div>
            
            <!-- Metric 4 -->
            <div class="space-y-4 border p-4 rounded bg-slate-50 dark:bg-slate-700/50">
                <h3 class="font-bold border-b pb-2">Metric 4</h3>
                <div>
                    <label class="block text-sm font-medium mb-1">Value</label>
                    <input type="text" name="metrics_val_4" class="form-input w-full" value="<?= e($pr['metrics']['val_4'] ?? 'MVDA') ?>">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Label</label>
                    <input type="text" name="metrics_lbl_4" class="form-input w-full" value="<?= e($pr['metrics']['lbl_4'] ?? 'Sanctioned') ?>">
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-slate-200 dark:border-slate-700">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg font-medium transition-colors">
                Save Changes
            </button>
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
PHP;

@mkdir(__DIR__ . '/app/Controllers/Admin', 0755, true);
@mkdir(__DIR__ . '/views/admin/plot_rate_mathura', 0755, true);

file_put_contents(__DIR__ . '/app/Controllers/Admin/PlotRateMathuraController.php', $controllerCode);
file_put_contents(__DIR__ . '/views/admin/plot_rate_mathura/index.php', $viewCode);

// Add to web.php
$webPhp = file_get_contents(__DIR__ . '/routes/web.php');
if (strpos($webPhp, '/admin/plot-rate-mathura') === false) {
    $webPhp = str_replace(
        "// Commercial Property in Vrindavan Page Content Manager",
        "// Mathura Plot Rate Page Content Manager\n\$router->get('/admin/plot-rate-mathura', 'Admin\PlotRateMathuraController@index');\n\$router->post('/admin/plot-rate-mathura', 'Admin\PlotRateMathuraController@update');\n\n// Commercial Property in Vrindavan Page Content Manager",
        $webPhp
    );
    file_put_contents(__DIR__ . '/routes/web.php', $webPhp);
}

// Add setting
$settingModel = file_get_contents(__DIR__ . '/app/Models/Setting.php');
if (strpos($settingModel, 'getMathuraPlotRateSections') === false) {
    $newMethod = <<<PHP
    public static function getMathuraPlotRateSections(): array
    {
        \$default = [
            'metrics' => [
                'val_1' => '₹35,000', 'lbl_1' => 'Gated Benchmark',
                'val_2' => '100 Gaj', 'lbl_2' => 'Standard Size',
                'val_3' => '100%', 'lbl_3' => 'Clear Titles',
                'val_4' => 'MVDA', 'lbl_4' => 'Sanctioned',
            ]
        ];
        return self::get('plot_rate_mathura_sections', \$default);
    }
PHP;
    $settingModel = preg_replace('/}\s*$/', "\n" . $newMethod . "\n}\n", $settingModel);
    file_put_contents(__DIR__ . '/app/Models/Setting.php', $settingModel);
}

// Update admin.php sidebar
$adminLayout = file_get_contents(__DIR__ . '/views/layouts/admin.php');
if (strpos($adminLayout, '/admin/plot-rate-mathura') === false) {
    $menuItem = <<<PHP
                <a href="<?= url('/admin/plot-rate-mathura') ?>" class="block px-3 py-2 rounded-lg <?= str_contains(\$_SERVER['REQUEST_URI'], '/admin/plot-rate-mathura') ? 'bg-blue-50 dark:bg-slate-700 text-blue-600 dark:text-blue-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700/50' ?> transition-colors">
                    Mathura Plot Rate
                </a>
PHP;
    $adminLayout = str_replace(
        "<a href=\"<?= url('/admin/residential-plots') ?>\"",
        $menuItem . "\n                <a href=\"<?= url('/admin/residential-plots') ?>\"",
        $adminLayout
    );
    file_put_contents(__DIR__ . '/views/layouts/admin.php', $adminLayout);
}

// Update plot_rate_mathura.php view
$viewFile = file_get_contents(__DIR__ . '/views/public/plot_rate_mathura.php');

// We replace the hardcoded values with variables
if (strpos($viewFile, "\$pr = \App\Models\Setting::getMathuraPlotRateSections();") === false) {
    $viewFile = str_replace(
        "<?php\n    \$heroCover",
        "<?php\n    \$pr = \App\Models\Setting::getMathuraPlotRateSections();\n    \$heroCover",
        $viewFile
    );
    
    // Replace metrics
    $viewFile = str_replace("₹35,000", "<?= e(\$pr['metrics']['val_1'] ?? '₹35,000') ?>", $viewFile);
    $viewFile = str_replace("Gated Benchmark", "<?= e(\$pr['metrics']['lbl_1'] ?? 'Gated Benchmark') ?>", $viewFile);
    $viewFile = str_replace("100 Gaj", "<?= e(\$pr['metrics']['val_2'] ?? '100 Gaj') ?>", $viewFile);
    $viewFile = str_replace("Standard Size", "<?= e(\$pr['metrics']['lbl_2'] ?? 'Standard Size') ?>", $viewFile);
    $viewFile = preg_replace('/100%<\/div>\s*<div class="text-\[11px\] uppercase tracking-wider text-stone-400 mt-1">Clear Titles<\/div>/s', "<?= e(\$pr['metrics']['val_3'] ?? '100%') ?></div>\n                    <div class=\"text-[11px] uppercase tracking-wider text-stone-400 mt-1\"><?= e(\$pr['metrics']['lbl_3'] ?? 'Clear Titles') ?></div>", $viewFile);
    $viewFile = preg_replace('/MVDA<\/div>\s*<div class="text-\[11px\] uppercase tracking-wider text-stone-400 mt-1">Sanctioned<\/div>/s', "<?= e(\$pr['metrics']['val_4'] ?? 'MVDA') ?></div>\n                    <div class=\"text-[11px] uppercase tracking-wider text-stone-400 mt-1\"><?= e(\$pr['metrics']['lbl_4'] ?? 'Sanctioned') ?></div>", $viewFile);
    
    file_put_contents(__DIR__ . '/views/public/plot_rate_mathura.php', $viewFile);
}

echo "Done.";
