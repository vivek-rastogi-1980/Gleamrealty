<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold font-heading text-white">Create New Real Estate Project</h2>
            <p class="text-xs text-slate-400">Add a new property listing with custom SEO controls, media uploads, and specs.</p>
        </div>
        <a href="<?= url('/admin/projects') ?>" class="text-xs text-slate-400 hover:text-white flex items-center gap-1 font-medium">
            &larr; Back to Projects
        </a>
    </div>

    <form action="<?= url('/admin/projects') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Card 1: Core Information -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Core Details
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Name *</label>
                    <input type="text" name="name" id="projectName" required placeholder="e.g. Shri Vrinda Luxury Villas"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Location *</label>
                    <input type="text" name="location" required placeholder="e.g. Vrindavan, Mathura"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Tagline / Subheading</label>
                <input type="text" name="tagline" placeholder="e.g. MVDA Approved Luxury Township Near Prem Mandir"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Type</label>
                    <select name="project_type" class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                        <option value="Plotted Community">Plotted Community</option>
                        <option value="Luxury Villas">Luxury Villas</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Township">Township</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Starting Price</label>
                    <input type="text" name="starting_price" placeholder="e.g. ₹ 45,000 / sq. yard"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Plot / Unit Size</label>
                    <input type="text" name="project_size" placeholder="e.g. 100 - 350 Sq. Yards"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center pt-2">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">RERA Registration ID</label>
                    <input type="text" name="rera_id" placeholder="e.g. UPRERAPRJ123456"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>

                <div class="flex items-center gap-3 pt-5">
                    <input type="checkbox" name="mvda_approved" id="mvda_approved" value="1" checked
                        class="w-4 h-4 text-amber-500 bg-slate-900 border-slate-700 rounded focus:ring-amber-400">
                    <label for="mvda_approved" class="text-sm text-slate-300 font-medium">MVDA Approved Project</label>
                </div>
            </div>
        </div>

        <!-- Card 2: SEO Metadata Controls -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center justify-between">
                <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-cyan-400"></span> Custom SEO Metadata &amp; URL Slug</span>
                <button type="button" onclick="generateSlug()" class="text-xs text-amber-400 hover:underline">Auto-generate Slug</button>
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">URL Slug</label>
                <div class="flex items-center">
                    <span class="bg-slate-800 text-slate-400 px-3 py-2 text-xs rounded-l-lg border border-r-0 border-slate-700">/projects/</span>
                    <input type="text" name="slug" id="projectSlug" placeholder="shri-vrinda-luxury-villas"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-r-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                <input type="text" name="meta_title" placeholder="Shri Vrinda Luxury Villas | Premium Plots in Vrindavan"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                <textarea name="meta_description" rows="2" placeholder="Explore MVDA approved luxury plots and villas with world-class amenities in Vrindavan."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                <input type="text" name="meta_keywords" placeholder="Plots in Vrindavan, Luxury Villas, MVDA Plots, Vrindavan Real Estate"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>
        </div>

        <!-- Card 3: Content & Amenities -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-400"></span> Content, Amenities &amp; Narrative
            </h3>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Project Overview / Description</label>
                <textarea name="overview" rows="5" placeholder="Detailed architectural narrative and investment highlights..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Amenities Checklist (One per line)</label>
                <textarea name="amenities" rows="4" placeholder="Gated Community & 24/7 Security&#10;Wide Concrete Roads&#10;Underground Electrification&#10;Lush Landscaped Parks&#10;Clubhouse &amp; Temple Proximity"
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>
        </div>

        <!-- Card 4: Media, Maps & Brochure Uploads -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
            <h3 class="font-heading font-semibold text-white text-sm border-b border-slate-800 pb-3 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Media, Maps &amp; Documents
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Primary Cover Image</label>
                    <input type="file" name="hero_image" accept="image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload PDF Brochure</label>
                    <input type="file" name="brochure_file" accept=".pdf"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Floor / Master Plan Document</label>
                    <input type="file" name="floor_plan_file" accept=".pdf,image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload Payment / Schedule Plan Document</label>
                    <input type="file" name="payment_plan_file" accept=".pdf,image/*"
                        class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-amber-400 hover:file:bg-slate-700">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Video Tour Embed (YouTube / Vimeo URL)</label>
                <input type="text" name="hero_video_url" placeholder="https://www.youtube.com/embed/..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Google Maps Embed Iframe / URL</label>
                <textarea name="google_maps_embed" rows="2" placeholder="https://www.google.com/maps/embed?..."
                    class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-amber-400"></textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="<?= url('/admin/projects') ?>" class="px-5 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 text-sm font-semibold transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs shadow-lg transition-all">
                Save &amp; Continue to Media
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
document.getElementById('projectName').addEventListener('blur', function() {
    if (!document.getElementById('projectSlug').value) {
        generateSlug();
    }
});
</script>
