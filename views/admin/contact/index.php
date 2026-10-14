<div class="max-w-6xl mx-auto space-y-6 pb-20" x-data="{ activeTab: 'hero_form' }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-sky-400 shadow-md shadow-sky-400/40 animate-pulse"></span>
                <h2 class="text-xl font-bold font-heading text-white tracking-wide">Contact Us Content CMS</h2>
            </div>
            <p class="text-xs text-slate-400 mt-1">
                Fully control every text, phone number, address, trust metric, Google Map, and background image on the Contact Us page.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= url('/contact-us') ?>" target="_blank"
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors flex items-center gap-1.5 shadow-sm">
                <span>View Live Page</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
            <button type="submit" form="contactSectionsForm"
                    class="px-5 py-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-400 hover:to-blue-500 text-white font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-md flex items-center gap-1.5 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Changes</span>
            </button>
        </div>
    </div>

    <!-- Navigation Pills / Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-800/80">
        <button type="button" @click="activeTab = 'hero_form'"
                :class="activeTab === 'hero_form' ? 'bg-sky-500 text-white font-bold shadow-md shadow-sky-500/20' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            1. Hero Banner &amp; Enquiry Form
        </button>
        <button type="button" @click="activeTab = 'office_details'"
                :class="activeTab === 'office_details' ? 'bg-sky-500 text-white font-bold shadow-md shadow-sky-500/20' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            2. Office Address &amp; Hotline Contacts
        </button>
        <button type="button" @click="activeTab = 'trust_map'"
                :class="activeTab === 'trust_map' ? 'bg-sky-500 text-white font-bold shadow-md shadow-sky-500/20' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            3. Trust Badges &amp; Google Maps
        </button>
        <button type="button" @click="activeTab = 'editorial_seo'"
                :class="activeTab === 'editorial_seo' ? 'bg-sky-500 text-white font-bold shadow-md shadow-sky-500/20' : 'bg-slate-900 text-slate-300 hover:bg-slate-800'"
                class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-semibold transition-all shrink-0 cursor-pointer">
            4. Editorial Story, Images &amp; SEO
        </button>
    </div>

    <!-- Main Form -->
    <form id="contactSectionsForm" action="<?= url('/admin/contact') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>

        <!-- ============================================================
             TAB 1: HERO BANNER & ENQUIRY FORM SETTINGS
             ============================================================ -->
        <div x-show="activeTab === 'hero_form'" class="space-y-6">
            
            <!-- Hero Banner Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        Hero Banner Section (Top Screen)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Appears at the very top of /contact-us with ambient luxury glow.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Eyebrow Badge</label>
                        <input type="text" name="hero_badge" value="<?= e($sections['hero']['badge'] ?? 'Gleamrealty Private Limited • Vrindavan & Mathura') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Main Hero Heading *</label>
                        <input type="text" name="hero_heading" required value="<?= e($sections['hero']['heading'] ?? 'Contact us') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Hero Subheading Description</label>
                    <textarea name="hero_subheading" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400"><?= e($sections['hero']['subheading'] ?? '') ?></textarea>
                </div>

                <!-- Hero Background Image Box -->
                <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-sky-400 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Hero Background Image &amp; Media
                    </span>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                        <div class="md:col-span-4 aspect-[16/10] rounded-lg overflow-hidden bg-slate-900 border border-slate-700/80 relative shadow-inner">
                            <?php $currHero = !empty($sections['hero']['image']) ? media_url($sections['hero']['image']) : asset('uploads/hero/hero-braj-sanctuary.webp'); ?>
                            <img id="heroPreviewImg" src="<?= $currHero ?>" alt="Hero Preview" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-2">
                                <span class="text-[10px] text-white/90 font-mono truncate"><?= e($sections['hero']['image'] ?? 'Default') ?></span>
                            </div>
                        </div>

                        <div class="md:col-span-8 space-y-3">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Upload New Hero Image</label>
                                <input type="file" name="hero_image" accept="image/*" onchange="previewImg(this, 'heroPreviewImg')"
                                       class="w-full text-xs text-slate-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-sky-500/20 file:text-sky-300 hover:file:bg-sky-500/30 cursor-pointer">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Or Existing Media Path</label>
                                <input type="text" name="hero_image_manual" value="<?= e($sections['hero']['image'] ?? '') ?>"
                                       placeholder="uploads/hero/hero-braj-sanctuary.webp"
                                       class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-sky-400 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enquiry Form Settings Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        Left Column: Enquiry Form Headings
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Control the title and prompt text above the contact submission form.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Form Eyebrow Badge</label>
                        <input type="text" name="form_eyebrow" value="<?= e($sections['form']['eyebrow'] ?? '✦ Instant Response Guarantee') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Form Title</label>
                        <input type="text" name="form_title" value="<?= e($sections['form']['title'] ?? 'Find Your Dream Property') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Form Subtitle / Instruction</label>
                    <textarea name="form_subtitle" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400"><?= e($sections['form']['subtitle'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Submit Button Text</label>
                    <input type="text" name="form_button_text" value="<?= e($sections['form']['button_text'] ?? 'Submit Enquiry') ?>"
                           class="w-full md:w-1/2 bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 2: OFFICE ADDRESS & HOTLINE CONTACTS
             ============================================================ -->
        <div x-show="activeTab === 'office_details'" class="space-y-6">
            
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-5">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        Advisory Office &amp; Contact Hotlines
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">These details power the Contact Card, direct call links, and sync with footer contact info.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Office Eyebrow Badge</label>
                        <input type="text" name="office_badge" value="<?= e($sections['office']['badge'] ?? '✦ Registered & Site Presence') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Office Name / Location Title *</label>
                        <input type="text" name="office_title" required value="<?= e($sections['office']['title'] ?? 'Vrindavan Gleamrealty Private Limited') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Official Street Address *</label>
                    <textarea name="office_address" rows="2" required
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400"><?= e($sections['office']['address'] ?? 'Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406') ?></textarea>
                    <span class="text-[11px] text-slate-400 mt-1 block">Updating this automatically synchronizes the site footer address and directions link.</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Primary Hotline Phone (e.g. +91 9871731303)</label>
                        <input type="text" name="office_phone_1" value="<?= e($sections['office']['phone_1'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Secondary Hotline Phone (e.g. +91 7409767452)</label>
                        <input type="text" name="office_phone_2" value="<?= e($sections['office']['phone_2'] ?? '+91 7409767452') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-sky-400">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">WhatsApp Concierge Number</label>
                        <input type="text" name="office_whatsapp" value="<?= e($sections['office']['whatsapp'] ?? '+91 9871731303') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Official Email Address</label>
                        <input type="email" name="office_email" value="<?= e($sections['office']['email'] ?? 'contact@gleamrealty.com') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Operating Working Hours</label>
                        <input type="text" name="office_hours" value="<?= e($sections['office']['hours'] ?? 'Mon – Sun: 9:30 AM – 7:30 PM') ?>"
                               class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                    </div>
                </div>

            </div>

        </div>

        <!-- ============================================================
             TAB 3: TRUST BADGES & GOOGLE MAPS
             ============================================================ -->
        <div x-show="activeTab === 'trust_map'" class="space-y-6">
            
            <!-- Trust Badges Strip Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        Trust Badges Strip (3 Highlighted Guarantees)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Visible beneath the office contact box (e.g. 100% MVDA Approved, Freehold Direct Registry, 0% Brokerage).</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php 
                        $badges = $sections['trust_badges'] ?? [
                            ['val' => '100%', 'label' => 'MVDA Approved'],
                            ['val' => 'Freehold', 'label' => 'Direct Registry'],
                            ['val' => '0%', 'label' => 'Brokerage'],
                        ];
                    ?>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-2">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-sky-400">Badge <?= $i + 1 ?></span>
                            <div>
                                <label class="block text-[11px] uppercase text-slate-400 mb-0.5">Value / Metric</label>
                                <input type="text" name="trust_badge_<?= $i ?>_val" value="<?= e($badges[$i]['val'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-sky-400">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase text-slate-400 mb-0.5">Label / Subtitle</label>
                                <input type="text" name="trust_badge_<?= $i ?>_label" value="<?= e($badges[$i]['label'] ?? '') ?>"
                                       class="w-full bg-slate-900 border border-slate-700 rounded px-2.5 py-1.5 text-xs text-white focus:border-sky-400">
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Google Map Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        Full-Width Interactive Google Maps &amp; Navigation Pin
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Embed the live map of your Suncity Anantam Kunj or Vrindavan office.</p>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Map Floating Tag / Office Caption</label>
                    <input type="text" name="map_title" value="<?= e($sections['map']['title'] ?? 'GLEAMREALTY PRIVATE LIMITED • Suncity Anantam Kunj') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Google Maps Embed URL (Iframe Src)</label>
                    <input type="text" name="map_embed_url" value="<?= e($sections['map']['embed_url'] ?? '') ?>"
                           placeholder="https://maps.google.com/maps?q=...&output=embed"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-xs text-white font-mono focus:outline-none focus:border-sky-400">
                    <span class="text-[11px] text-slate-400 mt-1 block">Paste your Google Maps embed source link.</span>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Direct Directions Link (Opens Google Maps app/nav)</label>
                    <input type="text" name="map_directions_url" value="<?= e($sections['map']['directions_url'] ?? '') ?>"
                           placeholder="https://maps.google.com/?q=..."
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-xs text-white font-mono focus:outline-none focus:border-sky-400">
                </div>
            </div>

        </div>

        <!-- ============================================================
             TAB 4: EDITORIAL STORY, IMAGES & SEO
             ============================================================ -->
        <div x-show="activeTab === 'editorial_seo'" class="space-y-6">
            
            <!-- Additional Editorial Story & Inline Image Uploader -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <div>
                        <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                            Additional Editorial Section &amp; Visual Story
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">Optional section below the form explaining your advisory credentials and history.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Section Eyebrow / Title</label>
                    <input type="text" name="editorial_title" value="<?= e($sections['editorial']['title'] ?? 'About Our Advisory') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                </div>

                <!-- Instant Image Uploader Box -->
                <div class="p-3.5 rounded-lg bg-slate-950/80 border border-slate-800 space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-sky-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Upload Photos / Office Images to Insert into Content
                        </span>
                        <span id="contentImgStatus" class="text-[11px] text-slate-400"></span>
                    </div>
                    <div class="flex flex-wrap items-center gap-2.5">
                        <input type="file" id="contentImageInput" accept="image/*"
                               class="text-xs text-slate-400 file:mr-2 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-sky-500/20 file:text-sky-300 hover:file:bg-sky-500/30 cursor-pointer">
                        <button type="button" onclick="uploadContactContentImage()"
                                class="px-3.5 py-1.5 rounded-md bg-sky-500 hover:bg-sky-400 text-white text-xs font-bold transition-all shadow-sm cursor-pointer">
                            Upload &amp; Insert Image into Content
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">HTML Editorial Body</label>
                    <textarea name="editorial_content" id="contactContentArea" rows="8"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white font-mono focus:outline-none focus:border-sky-400"><?= e($sections['editorial']['content'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- SEO Controls Box -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-xl p-6 shadow-xl space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h3 class="font-heading font-semibold text-white text-sm flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span> 
                        SEO Engine &amp; Meta Tags for Contact Us
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Control search engine title tags, meta descriptions, and keywords.</p>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="<?= e($sections['seo']['meta_title'] ?? '') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                              class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400"><?= e($sections['seo']['meta_description'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="<?= e($sections['seo']['meta_keywords'] ?? '') ?>"
                           class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-sky-400">
                </div>
            </div>

        </div>

        <!-- Sticky Footer Submit Bar -->
        <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
            <span class="text-xs text-slate-400">Clicking save updates live website data instantly.</span>
            <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-400 hover:to-blue-500 text-white font-bold rounded-lg text-xs uppercase tracking-wider transition-all shadow-lg flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Contact Content</span>
            </button>
        </div>

    </form>

</div>

<script>
function previewImg(input, targetId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(targetId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function uploadContactContentImage() {
    const fileInput = document.getElementById('contentImageInput');
    const status = document.getElementById('contentImgStatus');
    if (!fileInput.files || !fileInput.files[0]) {
        alert('Please choose an image file to upload.');
        return;
    }
    status.innerText = 'Uploading image...';
    status.className = 'text-[11px] text-sky-300';
    const fd = new FormData();
    fd.append('content_image', fileInput.files[0]);
    fd.append('_csrf_token', '<?= csrf_token() ?>');

    fetch('<?= url('/admin/contact/upload-image') ?>', {
        method: 'POST',
        body: fd
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            status.innerText = '✓ Image uploaded and inserted into editorial content!';
            status.className = 'text-[11px] text-emerald-400 font-semibold';
            const textarea = document.getElementById('contactContentArea');
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
