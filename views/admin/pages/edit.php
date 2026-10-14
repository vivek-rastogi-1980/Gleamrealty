<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Edit CMS Page — <?= e($page['title']) ?></h2>
            <p class="text-xs text-slate-400">Modify content, hero visual, and SEO metadata.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/' . $page['slug']) ?>" target="_blank" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg text-xs font-semibold transition-colors">
                View Live Page
            </a>
            <a href="<?= url('/admin/pages') ?>" class="text-xs text-slate-400 hover:text-white font-medium">
                &larr; Back to Pages
            </a>
        </div>
    </div>

    <?php if ($page['slug'] === 'contact-us'): ?>
        <div class="p-5 rounded-2xl bg-gradient-to-r from-amber-500/15 via-slate-900 to-amber-500/10 border border-amber-500/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-400 text-slate-950 flex items-center justify-center font-bold text-xl shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Dedicated Contact Us CMS Available</h3>
                    <p class="text-xs text-slate-300 mt-0.5">Control hotlines, WhatsApp concierge, office address, Google Maps embed, enquiry form, trust badges &amp; editorial photos directly.</p>
                </div>
            </div>
            <a href="<?= url('/admin/contact') ?>" class="px-5 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-md transition-all flex items-center gap-2">
                <span>Open Contact CMS</span>
                <span>&rarr;</span>
            </a>
        </div>
    <?php elseif ($page['slug'] === 'about-us'): ?>
        <div class="p-5 rounded-2xl bg-gradient-to-r from-amber-500/15 via-slate-900 to-amber-500/10 border border-amber-500/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-400 text-slate-950 flex items-center justify-center font-bold text-xl shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Dedicated About Us CMS Available</h3>
                    <p class="text-xs text-slate-300 mt-0.5">Full multi-section controls: Hero, Advisory Overview, Pillars, Timeline, Why Choose Us &amp; photos.</p>
                </div>
            </div>
            <a href="<?= url('/admin/about') ?>" class="px-5 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-300 text-slate-950 text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-md transition-all flex items-center gap-2">
                <span>Open About CMS</span>
                <span>&rarr;</span>
            </a>
        </div>
    <?php elseif ($page['slug'] === 'property-in-vrindavan'): ?>
        <div class="p-5 rounded-2xl bg-gradient-to-r from-emerald-500/15 via-slate-900 to-emerald-500/10 border border-emerald-500/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-400 text-slate-950 flex items-center justify-center font-bold text-xl shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Dedicated Property in Vrindavan CMS Available</h3>
                    <p class="text-xs text-slate-300 mt-0.5">Control Hero, Overview narrative &amp; photos, MVDA legal pillars, 2026 megaprojects, spiritual lifestyle &amp; VIP consultation.</p>
                </div>
            </div>
            <a href="<?= url('/admin/property-vrindavan') ?>" class="px-5 py-2.5 rounded-lg bg-emerald-400 hover:bg-emerald-300 text-slate-950 text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-md transition-all flex items-center gap-2">
                <span>Open Property CMS</span>
                <span>&rarr;</span>
            </a>
        </div>
    <?php elseif ($page['slug'] === 'residential-plots-in-vrindavan'): ?>
        <div class="p-5 rounded-2xl bg-gradient-to-r from-cyan-500/15 via-slate-900 to-cyan-500/10 border border-cyan-500/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-400 text-slate-950 flex items-center justify-center font-bold text-xl shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Dedicated Residential Plots CMS Available</h3>
                    <p class="text-xs text-slate-300 mt-0.5">Control Hero, Ground reality narrative &amp; photos, 4 metrics, MVDA legal pillars, 2026 megaprojects, spiritual lifestyle &amp; VIP consultation.</p>
                </div>
            </div>
            <a href="<?= url('/admin/residential-plots') ?>" class="px-5 py-2.5 rounded-lg bg-cyan-400 hover:bg-cyan-300 text-slate-950 text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-md transition-all flex items-center gap-2">
                <span>Open Plots CMS</span>
                <span>&rarr;</span>
            </a>
        </div>
    <?php elseif ($page['slug'] === 'commercial-property-in-vrindavan'): ?>
        <div class="p-5 rounded-2xl bg-gradient-to-r from-indigo-500/15 via-slate-900 to-indigo-500/10 border border-indigo-500/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-400 text-slate-950 flex items-center justify-center font-bold text-xl shrink-0 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Dedicated Commercial Property CMS Available</h3>
                    <p class="text-xs text-slate-300 mt-0.5">Control Hero, Commercial land narrative &amp; photos, 4 metrics, Infrastructure Catalysts, High-Yield Sectors, Flagship Showcase &amp; VIP Consultation.</p>
                </div>
            </div>
            <a href="<?= url('/admin/commercial-property') ?>" class="px-5 py-2.5 rounded-lg bg-indigo-400 hover:bg-indigo-300 text-slate-950 text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-md transition-all flex items-center gap-2">
                <span>Open Commercial CMS</span>
                <span>&rarr;</span>
            </a>
        </div>
    <?php endif; ?>

    <form action="<?= url('/admin/pages/' . $page['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Details -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Page Details &amp; Hero Section
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Page Title *</label>
                    <input type="text" name="title" id="pageTitle" required value="<?= e($page['title']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Heading</label>
                    <input type="text" name="hero_heading" value="<?= e($page['hero_heading'] ?? '') ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Subheading</label>
                <input type="text" name="hero_subheading" value="<?= e($page['hero_subheading'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <!-- Hero Section Background Visual Box -->
            <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-4 pt-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-400 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Hero Section Background Image
                    </span>
                    <span class="text-[11px] text-slate-500">Visible behind the hero title &amp; description</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                    <!-- Preview Container -->
                    <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                        <?php 
                            $currentImg = !empty($page['hero_media_url']) ? media_url($page['hero_media_url']) : asset('uploads/hero/hero-braj-sanctuary.webp');
                        ?>
                        <img id="heroPreviewImg"
                             src="<?= $currentImg ?>"
                             alt="Hero Background Preview"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-2">
                            <span class="text-[10px] text-white/90 font-mono truncate"><?= !empty($page['hero_media_url']) ? e($page['hero_media_url']) : 'Default Sanctuary Visual' ?></span>
                        </div>
                    </div>

                    <!-- Upload and Path Controls -->
                    <div class="md:col-span-8 space-y-3">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                Upload New Hero Image
                            </label>
                            <input type="file" name="hero_media_file" id="heroMediaFileInput" accept="image/*"
                                   onchange="previewHeroFile(this)"
                                   class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                            <span class="text-[11px] text-slate-500 mt-1 block">Upload a high quality JPG, PNG, or WebP (e.g. 1920&times;800px).</span>
                        </div>

                        <div>
                            <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">
                                Or Image URL / Media Path
                            </label>
                            <input type="text" name="hero_media_url" id="heroMediaUrlInput"
                                   value="<?= e($page['hero_media_url'] ?? '') ?>"
                                   placeholder="uploads/hero/hero-braj-sanctuary.webp or full URL"
                                   oninput="updateHeroPreview(this.value)"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-amber-400 focus:outline-none">
                            <span class="text-[11px] text-slate-500 mt-0.5 block">You can use uploaded photos or type an existing image path.</span>
                        </div>

                        <input type="hidden" name="hero_media_type" value="image">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="is_published" id="is_published" value="1" <?= (int) ($page['is_published'] ?? 1) === 1 ? 'checked' : '' ?>
                    class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                <label for="is_published" class="text-sm text-slate-300 font-medium">Page is Published and visible on website</label>
            </div>
        </div>

        <!-- Card 2: Custom SEO Metadata -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center justify-between">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-cyan-400"></span> SEO Controls &amp; Dynamic URL Slug</span>
                <button type="button" onclick="generateSlug()" class="text-xs text-amber-400 hover:underline">Re-generate Slug</button>
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">URL Slug</label>
                <div class="flex items-center">
                    <span class="bg-slate-800 text-slate-400 px-3 py-2 text-xs rounded-l-lg border border-r-0 border-slate-700">/</span>
                    <input type="text" name="slug" id="pageSlug" value="<?= e($page['slug']) ?>"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                <input type="text" name="meta_title" value="<?= e($page['meta_title'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"><?= e($page['meta_description'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="<?= e($page['meta_keywords'] ?? '') ?>"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>
        </div>

        <!-- Card 3: Body Content & Content Images -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-indigo-400"></span> Page Content &amp; Inline Images
                </h3>
                <span class="text-[11px] text-slate-400">HTML supported. You can upload photos to insert below.</span>
            </div>

            <!-- Content Image Upload Box -->
            <div class="p-3.5 rounded-lg bg-slate-950/80 border border-slate-800 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-amber-400 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Upload Image to Content
                    </span>
                    <span id="contentImgStatus" class="text-[11px] text-slate-400"></span>
                </div>
                <div class="flex flex-wrap items-center gap-2.5">
                    <input type="file" id="contentImageInput" accept="image/*"
                           class="text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300 hover:file:bg-amber-500/30 cursor-pointer">
                    <button type="button" onclick="uploadContentImage()"
                            class="px-3.5 py-1.5 rounded-md bg-amber-400 hover:bg-amber-500 text-slate-950 text-xs font-bold transition-all shadow-sm">
                        Upload &amp; Insert into Body
                    </button>
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">HTML Body Content</label>
                <textarea name="content" id="pageContentArea" rows="12"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-amber-400"><?= e($page['content'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="<?= url('/admin/pages') ?>" class="px-5 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-semibold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all">
                Save Page Changes
            </button>
        </div>
    </form>

</div>

<script>
function generateSlug() {
    const title = document.getElementById('pageTitle').value;
    if (title) {
        const slug = title.toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('pageSlug').value = slug;
    }
}

function previewHeroFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('heroPreviewImg').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateHeroPreview(val) {
    val = val.trim();
    if (!val) return;
    const img = document.getElementById('heroPreviewImg');
    if (val.startsWith('http://') || val.startsWith('https://') || val.startsWith('/')) {
        img.src = val;
    } else {
        img.src = '<?= asset('') ?>' + val.replace(/^\/+/, '');
    }
}

function uploadContentImage() {
    const fileInput = document.getElementById('contentImageInput');
    const status = document.getElementById('contentImgStatus');
    if (!fileInput.files || !fileInput.files[0]) {
        alert('Please choose an image file to upload.');
        return;
    }
    status.innerText = 'Uploading image...';
    status.className = 'text-[11px] text-amber-300';
    const fd = new FormData();
    fd.append('content_image', fileInput.files[0]);
    fd.append('_csrf_token', '<?= csrf_token() ?>');

    fetch('<?= url('/admin/pages/upload-image') ?>', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            status.innerText = '✓ Image uploaded & inserted into body!';
            status.className = 'text-[11px] text-emerald-400 font-semibold';
            const textarea = document.getElementById('pageContentArea');
            const imgSnippet = '\n<div class="my-6 rounded-2xl overflow-hidden shadow-xl border border-slate-700/60">\n    <img src="' + data.url + '" alt="Photo" class="w-full h-auto object-cover">\n</div>\n';
            textarea.value += imgSnippet;
            fileInput.value = '';
        } else {
            status.innerText = '✗ ' + (data.message || 'Upload failed');
            status.className = 'text-[11px] text-rose-400';
        }
    })
    .catch(e => {
        status.innerText = '✗ Network error uploading image';
        status.className = 'text-[11px] text-rose-400';
    });
}
</script>
