<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Edit Project — <?= e($project['name']) ?></h2>
            <p class="text-xs text-slate-400">Update property information, specifications, and SEO metadata.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/admin/projects/' . $project['id'] . '/media') ?>" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-amber-400 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors">
                Manage Media Gallery &rarr;
            </a>
            <a href="<?= url('/projects/' . $project['slug']) ?>" target="_blank" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold transition-colors">
                View Live
            </a>
            <a href="<?= url('/admin/projects') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back
            </a>
        </div>
    </div>

    <form action="<?= url('/admin/projects/' . $project['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Information -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Core Details
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Name *</label>
                    <input type="text" name="name" id="projectName" required value="<?= e($project['name']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Location *</label>
                    <input type="text" name="location" id="projectLocation" required value="<?= e($project['location']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        <span class="text-[11px] text-slate-400 mr-1 self-center">Quick pick:</span>
                        <button type="button" onclick="document.getElementById('projectLocation').value='Vrindavan'" class="text-[11px] px-2 py-0.5 rounded bg-slate-800 hover:bg-slate-700 text-amber-300 border border-slate-700 transition-colors">Vrindavan</button>
                        <button type="button" onclick="document.getElementById('projectLocation').value='Mathura'" class="text-[11px] px-2 py-0.5 rounded bg-slate-800 hover:bg-slate-700 text-amber-300 border border-slate-700 transition-colors">Mathura</button>
                        <button type="button" onclick="document.getElementById('projectLocation').value='Chhatikara Road, Vrindavan'" class="text-[11px] px-2 py-0.5 rounded bg-slate-800 hover:bg-slate-700 text-amber-300 border border-slate-700 transition-colors">Chhatikara Road</button>
                        <button type="button" onclick="document.getElementById('projectLocation').value='NH-19, Mathura-Vrindavan'" class="text-[11px] px-2 py-0.5 rounded bg-slate-800 hover:bg-slate-700 text-amber-300 border border-slate-700 transition-colors">NH-19</button>
                        <button type="button" onclick="document.getElementById('projectLocation').value='Govardhan Road'" class="text-[11px] px-2 py-0.5 rounded bg-slate-800 hover:bg-slate-700 text-amber-300 border border-slate-700 transition-colors">Govardhan Road</button>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Tagline / Subheading</label>
                <input type="text" name="tagline" value="<?= e($project['tagline'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Type *</label>
                    <select name="project_type" class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                        <?php $types = ['Plotted Community', 'Land / Plots', 'Flats & Apartments', 'Apartment', 'Flat', 'Luxury Villas', 'Commercial', 'Township']; ?>
                        <?php foreach ($types as $t): ?>
                            <option value="<?= $t ?>" <?= $project['project_type'] === $t ? 'selected' : '' ?>><?= $t ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Starting Price</label>
                    <input type="text" name="starting_price" value="<?= e($project['starting_price'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Plot / Unit Size</label>
                    <input type="text" name="project_size" value="<?= e($project['project_size'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center pt-2">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">RERA Registration ID</label>
                    <input type="text" name="rera_id" value="<?= e($project['rera_id'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div class="flex items-center gap-3 pt-5">
                    <input type="checkbox" name="mvda_approved" id="mvda_approved" value="1" <?= (int) $project['mvda_approved'] === 1 ? 'checked' : '' ?>
                        class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                    <label for="mvda_approved" class="text-sm text-slate-300 font-medium">MVDA Approved Project</label>
                </div>
            </div>
        </div>

        <!-- Card 2: Custom SEO Controls -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center justify-between">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-cyan-400"></span> Custom SEO Metadata &amp; URL Slug</span>
                <button type="button" onclick="generateSlug()" class="text-xs text-amber-400 hover:underline">Re-generate Slug</button>
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">URL Slug</label>
                <div class="flex items-center">
                    <span class="bg-slate-800 text-slate-400 px-3 py-2 text-xs rounded-l-lg border border-r-0 border-slate-700">/projects/</span>
                    <input type="text" name="slug" id="projectSlug" value="<?= e($project['slug']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                <input type="text" name="meta_title" value="<?= e($project['meta_title'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($project['meta_description'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="<?= e($project['meta_keywords'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>
        </div>

        <!-- Card 3: Content & Amenities -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-400"></span> Content &amp; Narrative
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Overview / Description</label>
                <textarea name="overview" rows="6"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($project['overview'] ?? '') ?></textarea>
            </div>

            <?php
                $amenitiesStr = '';
                if (!empty($project['amenities'])) {
                    $decoded = json_decode($project['amenities'], true);
                    if (is_array($decoded)) {
                        $amenitiesStr = implode("\n", $decoded);
                    } else {
                        $amenitiesStr = $project['amenities'];
                    }
                }
            ?>
            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Amenities Checklist (One per line)</label>
                <textarea name="amenities" rows="5"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($amenitiesStr) ?></textarea>
            </div>
        </div>

        <!-- Card 4: Media, Maps & Brochure -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span> Media, Maps &amp; Documents
                </h3>
                <a href="<?= url('/admin/projects/' . $project['id'] . '/media') ?>" class="text-xs text-amber-400 hover:text-amber-300 font-semibold flex items-center gap-1.5 px-3 py-1 rounded bg-amber-500/10 border border-amber-500/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Manage Full Gallery Photos &rarr;
                </a>
            </div>

            <!-- Primary Cover / Elevation Image -->
            <?php $currentCover = \App\Models\Project::getHeroImage((int) $project['id']); ?>
            <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                <div class="flex items-center justify-between">
                    <label class="block text-xs uppercase tracking-wider text-amber-400 font-semibold">
                        Primary Cover / Elevation Image
                    </label>
                    <span class="text-[11px] text-slate-500">Main visual displayed on project listings &amp; hero</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-24 h-16 rounded-lg bg-slate-900 border border-slate-700/80 overflow-hidden shrink-0 relative">
                        <img id="projectHeroPreview" src="<?= media_url($currentCover) ?>" alt="Cover Image" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <input type="file" name="hero_image" accept="image/*"
                            onchange="if(this.files && this.files[0]){const r=new FileReader();r.onload=e=>document.getElementById('projectHeroPreview').src=e.target.result;r.readAsDataURL(this.files[0]);}"
                            class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                        <p class="text-[11px] text-slate-500 mt-1">Select a new JPG, PNG, or WebP photo to replace the primary elevation photo.</p>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New PDF Brochure</label>
                <?php if (!empty($project['brochure_url'])): ?>
                    <div class="text-xs text-amber-400 mb-2 flex items-center gap-2">
                        <span>Current Brochure:</span>
                        <a href="<?= media_url($project['brochure_url']) ?>" target="_blank" class="underline"><?= basename($project['brochure_url']) ?></a>
                    </div>
                <?php endif; ?>
                <input type="file" name="brochure_file" accept=".pdf"
                    class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Floor / Master Plan</label>
                    <?php if (!empty($project['floor_plan_url'])): ?>
                        <div class="text-xs text-amber-400 mb-2 flex items-center gap-2">
                            <span>Current Plan:</span>
                            <a href="<?= media_url($project['floor_plan_url']) ?>" target="_blank" class="underline"><?= basename($project['floor_plan_url']) ?></a>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="floor_plan_file" accept=".pdf,image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Payment / Schedule Plan</label>
                    <?php if (!empty($project['payment_plan_url'])): ?>
                        <div class="text-xs text-amber-400 mb-2 flex items-center gap-2">
                            <span>Current Payment Plan:</span>
                            <a href="<?= media_url($project['payment_plan_url']) ?>" target="_blank" class="underline"><?= basename($project['payment_plan_url']) ?></a>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="payment_plan_file" accept=".pdf,image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Video Tour Embed URL (YouTube / Vimeo)</label>
                <input type="text" name="hero_video_url" value="<?= e($project['hero_video_url'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Google Maps Embed Iframe / URL</label>
                <textarea name="google_maps_embed" rows="2"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($project['google_maps_embed'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="<?= url('/admin/projects') ?>" class="px-5 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-semibold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all">
                Save Changes
            </button>
        </div>
    </form>

</div>

<script>
function generateSlug() {
    const name = document.getElementById('projectName').value;
    if (name) {
        const slug = name.toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('projectSlug').value = slug;
    }
}
</script>
