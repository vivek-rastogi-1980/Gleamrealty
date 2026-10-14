<?php
/**
 * Property in Mathura City — Master Showcase View
 * Faithfully matching content, sections, and data 
 * Fully integrated with Gleamrealty Multi-Theme Engine (Dark-Yellow, Green & White, Blue & White)
 * 
 * @var array $page
 * @var array $projects
 */
?>

<!-- =======================================================================
     1. HERO BANNER: Plot in Mathura City
     ======================================================================= -->
<?php
    $heroCover = !empty($page['hero_media_url']) ? media_url($page['hero_media_url']) : asset('uploads/pages/mero-vrindavan.png');
    $heroTitle = !empty($page['hero_heading']) ? $page['hero_heading'] : ($page['title'] ?? 'Plot in Mathura City');
    $heroSubtitle = !empty($page['hero_subheading']) ? $page['hero_subheading'] : 'Buy Property in Mathura City, Mathura Plots, MVDA Approved Plot in Mathura';
?>
<section class="relative min-h-[52vh] sm:min-h-[58vh] flex items-center justify-center border-b py-24 sm:py-32 overflow-hidden bg-stone-950 transition-colors duration-300"
         :style="{ borderColor: 'var(--theme-border-hairline)' }">
    
    <!-- Background Hero Imagery -->
    <div class="absolute inset-0 z-0">
        <img src="<?= $heroCover ?>"
             alt="<?= e($heroTitle) ?> — MVDA Approved"
             class="w-full h-full object-cover filter brightness-[0.42] contrast-[1.08] scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/75 to-stone-950/40"></div>
        <div class="absolute inset-0 bg-black/35"></div>
    </div>

    <!-- Radiant Ambient Light Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-25"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-6">
        
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold tracking-[0.22em] uppercase">
            <a href="<?= url('/') ?>" class="text-stone-300 hover:text-white transition-colors">Home</a>
            <span class="text-amber-500/60">&bull;</span>
            <a href="<?= url('/projects') ?>" class="text-stone-300 hover:text-white transition-colors">Projects</a>
            <span class="text-amber-500/60">&bull;</span>
            <span class="text-amber-400 font-bold">Property in Mathura</span>
        </div>

        <!-- Eyebrow Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold backdrop-blur-md bg-stone-900/80 text-white border border-amber-500/30 shadow-md">
            <span class="w-2 h-2 rounded-full bg-[#9A6B2F] animate-pulse"></span>
            Gleamrealty Private Limited &bull; Mathura Municipal &amp; Govardhan Corridor
        </div>

        <!-- Main H1 Title -->
        <h1 class="font-editorial text-4xl sm:text-6xl lg:text-7xl font-normal tracking-tight text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.85)] leading-[1.1]">
            <?= e($heroTitle) ?>
        </h1>

        <!-- Subheading Tagline -->
        <h2 class="text-base sm:text-xl max-w-3xl mx-auto font-light text-stone-200 leading-relaxed drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
            <?= e($heroSubtitle) ?>
        </h2>

        <!-- Trust Badges Strip -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-2">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-white shadow-sm">
                <svg class="w-3.5 h-3.5 text-amber-400 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                MVDA Sanctioned Layouts
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-amber-500/40 text-amber-300 shadow-sm">
                ✦ Govardhan Road &amp; NH-19 Hub
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                Sweet Water &amp; Wide Roads
            </span>
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-medium bg-stone-900/80 backdrop-blur-md border border-white/20 text-stone-200 shadow-sm">
                Immediate Registry &amp; Mutation
            </span>
        </div>

        <!-- CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="#aakruti-section"
               class="btn-bronze inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] shadow-lg hover:shadow-xl transition-all">
                <span>View Mathura Townships</span>
                <span class="text-sm">&darr;</span>
            </a>
            <button type="button" @click="vipModalOpen = true"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold uppercase tracking-[0.16em] bg-stone-900/90 hover:bg-stone-800 text-white border border-stone-700 shadow-lg hover:shadow-xl transition-all cursor-pointer">
                <span>Book Free Site Visit</span>
                <span class="text-amber-400">&rarr;</span>
            </button>
            <a href="tel:+919871731303"
               class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full text-xs uppercase font-semibold tracking-wider text-white border border-white/20 bg-white/10 backdrop-blur-md hover:border-white/50 transition-colors">
                <svg class="w-3.5 h-3.5 fill-current text-amber-300" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                <span>+91 9871731303</span>
            </a>
            <?php if (function_exists('auth_user') && auth_user()): ?>
                <a href="<?= url('/admin/pages/' . ($page['id'] ?? 7) . '/edit') ?>"
                   target="_blank"
                   class="inline-flex items-center gap-1.5 px-4 py-3 rounded-full text-xs font-semibold uppercase tracking-wider bg-amber-400 text-slate-950 hover:bg-amber-300 shadow-md transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Edit Page in Admin</span>
                </a>
            <?php endif; ?>
        </div>

    </div>
</section>


<!-- =======================================================================
     2. SECTION 1: Ground Reality — What Mathura City Actually Covers
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        
        <!-- Left Column: Visual Showcase -->
        <div class="lg:col-span-5 relative space-y-6">
            <div class="relative rounded-3xl overflow-hidden border shadow-2xl group transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }">
                <div class="aspect-[4/5] relative overflow-hidden bg-stone-900">
                    <img src="<?= !empty($pm['narrative']['image']) ? media_url($pm['narrative']['image']) : asset('uploads/pages/mero-vrindavan.png') ?>"
                         alt="Mathura City Land &amp; Townships"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                </div>

                <!-- Floating Sincerity Badge -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl backdrop-blur-xl border flex items-center justify-between shadow-xl"
                     :style="{ backgroundColor: 'var(--theme-badge-bg)', borderColor: 'var(--theme-badge-border)' }">
                    <div>
                        <span class="text-[10px] uppercase tracking-widest font-bold block" :style="{ color: 'var(--theme-accent)' }">
                            <?= e($pm['narrative']['badge_title'] ?? 'Govardhan Road Corridor') ?>
                        </span>
                        <div class="font-serif text-sm sm:text-base font-bold tracking-wide" :style="{ color: 'var(--theme-title)' }">
                            <?= e($pm['narrative']['badge_value'] ?? '₹ 35,000 / sq. yd') ?>
                        </div>
                    </div>
                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 border"
                         :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)', borderColor: 'var(--theme-border-hairline)' }">
                        ✦
                    </div>
                </div>
            </div>

            <!-- Secondary Micro Banner -->
            <div class="p-5 rounded-2xl border flex items-center gap-4 transition-colors"
                 :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                <img src="<?= asset('uploads/pages/property-in-vrindavan.png') ?>" alt="Mathura Gateway" class="w-16 h-16 rounded-xl object-cover shrink-0 border"
                     :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="text-xs leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <strong class="block text-sm font-semibold" :style="{ color: 'var(--theme-title)' }">
                        The Map vs. Brochure Reality
                    </strong>
                    Understanding where genuine planned residential infrastructure is situated in Mathura.
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative -->
        <div class="lg:col-span-7 space-y-6 text-left">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['narrative']['eyebrow'] ?? "2026 Buyer's Guide") ?>
            </span>

            <h2 class="font-editorial text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight leading-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['narrative']['title'] ?? 'What "Mathura City" Actually Covers') ?>
            </h2>

            <div class="space-y-4 text-sm sm:text-base font-light leading-relaxed"
                 :style="{ color: 'var(--theme-text-secondary)' }">
                <?php if (!empty($pm['narrative']['content'])): ?>
                    <?= $pm['narrative']['content'] ?>
                <?php elseif (!empty($page['content'])): ?>
                    <?= $page['content'] ?>
                <?php else: ?>
                    <p>
                        One of those markets where the brochure doesn't always correspond to the map is Mathura. In one listing, it states the property is located "in Mathura City," but in reality the plot is located 20 kilometers out on unzoned agricultural farmland. Another states "MVDA approved," when in truth the approval was an application that was rejected years ago.
                    </p>
                    <p>
                        When buying property in Mathura, understanding the geographic layout is essential. The core city surrounding <strong :style="{ color: 'var(--theme-title)' }">Shri Krishna Janmasthan</strong>, Holi Gate, and the ancient Yamuna Ghats is densely populated, with narrow lanes, almost no open land, and exorbitant legacy prices. 
                    </p>
                    <p>
                        The true modern residential development is occurring on the designated growth fringes—primarily along <strong :style="{ color: 'var(--theme-title)' }">Govardhan Road</strong> and <strong :style="{ color: 'var(--theme-title)' }">NH-19</strong>. Here, planned spaces accommodate 30-to-40 foot wide concrete roads, sweet ground water, green parks, and sanctioned townships like <strong :style="{ color: 'var(--theme-title)' }">Shri Vrinda Aakruti Village</strong>.
                    </p>
                <?php endif; ?>
            </div>

            <!-- 4 Quick Key Metrics -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['metric_1_val'] ?? '₹35,000') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['metric_1_lbl'] ?? 'Gated Benchmark') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['metric_2_val'] ?? '116-183') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['metric_2_lbl'] ?? 'Sq. Yd Sizes') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['metric_3_val'] ?? '15 Min') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['metric_3_lbl'] ?? 'To Janmasthan') ?></div>
                </div>
                <div class="p-4 rounded-xl border text-center"
                     :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)' }">
                    <div class="text-2xl font-bold font-editorial" :style="{ color: 'var(--theme-accent)' }"><?= e($pm['narrative']['metric_4_val'] ?? '100%') ?></div>
                    <div class="text-[11px] uppercase tracking-wider text-stone-400 mt-1"><?= e($pm['narrative']['metric_4_lbl'] ?? 'MVDA Sanction') ?></div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     3. SECTION 2: Where Aakruti Village Fits (Alt Background — Perfect Contrast)
     ======================================================================= -->
<section id="aakruti-section" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($pm['township']['eyebrow'] ?? 'Featured Mathura Township') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($pm['township']['title'] ?? 'Where Shri Vrinda Aakruti Village Fits') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($pm['township']['subtitle'] ?? 'A sanctioned gated sanctuary on Satoha-Naugaon Road, connecting Mathura City with Govardhan Dham.') ?>
            </p>
        </div>

        <div class="rounded-3xl border overflow-hidden grid grid-cols-1 lg:grid-cols-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
            
            <div class="lg:col-span-6 relative bg-stone-900 min-h-[360px]">
                <img src="<?= asset($pm['township']['image'] ?? 'uploads/pages/luxury-villas-in-vrindavan.jpeg') ?>"
                     alt="Shri Vrinda Aakruti Village Mathura"
                     class="w-full h-full object-cover">
                <div class="absolute top-6 left-6">
                    <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#9A6B2F] text-white backdrop-blur-md shadow-md">
                        MVDA Approval: MTDA/ZA/ANI2025/0000577
                    </span>
                </div>
                <div class="absolute bottom-6 right-6 px-4 py-2 rounded-2xl text-sm font-bold bg-black/85 text-amber-300 backdrop-blur-md border border-white/20">
                    <?= e($pm['township']['price'] ?? '₹ 35,000 / sq. yd') ?>
                </div>
            </div>

            <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="text-xs uppercase tracking-widest font-semibold" :style="{ color: 'var(--theme-accent)' }">
                        <?= e($pm['township']['location'] ?? 'Govardhan Road Corridor, Mathura') ?>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                        <?= e($pm['township']['project_title'] ?? 'Plots & Ready Duplex Villas in Mathura') ?>
                    </h3>
                    <p class="text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                        <?= e($pm['township']['project_desc'] ?? 'Shri Vrinda Aakruti Village is designed for those who appreciate the peaceful divinity of Braj without the heavy congestion of central temple nodes. It provides residential plots between 116 and 183 sq. yards as well as move-in ready duplex villas.') ?>
                    </p>

                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400"><?= e($pm['township']['f1_lbl'] ?? 'Road Widths') ?></span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }"><?= e($pm['township']['f1_val'] ?? '30 & 40 Ft Paved') ?></span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400"><?= e($pm['township']['f2_lbl'] ?? 'Water Supply') ?></span>
                            <span class="text-sm font-bold text-[#9A6B2F]"><?= e($pm['township']['f2_val'] ?? '100% Sweet Ground Water') ?></span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400"><?= e($pm['township']['f3_lbl'] ?? 'Security') ?></span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }"><?= e($pm['township']['f3_val'] ?? '24×7 Manned & CCTV') ?></span>
                        </div>
                        <div class="p-3 rounded-xl border" :style="{ borderColor: 'var(--theme-border-hairline)', backgroundColor: 'var(--theme-section-card-bg)' }">
                            <span class="text-[10px] uppercase block text-stone-400"><?= e($pm['township']['f4_lbl'] ?? 'Proximity') ?></span>
                            <span class="text-sm font-bold" :style="{ color: 'var(--theme-title)' }"><?= e($pm['township']['f4_val'] ?? 'Danghati & Janmasthan') ?></span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <a href="<?= url('/projects/shri-vrinda-aakruti-village-premium-residential-township') ?>"
                       class="px-8 py-3.5 rounded-xl text-xs uppercase font-bold tracking-wider transition-all shadow-lg hover:scale-105"
                       :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        View Aakruti Township Layout &rarr;
                    </a>
                    <a href="#freesitevisit"
                       class="px-6 py-3.5 rounded-xl text-xs uppercase font-semibold tracking-wider border transition-all"
                       :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }">
                        Book Site Inspection
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     4. SECTION 3: Mathura Plots vs Vrindavan Plots
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['comparison']['eyebrow'] ?? 'Market Comparison') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['comparison']['title'] ?? 'Mathura Plots versus Vrindavan Plots') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($pm['comparison']['subtitle'] ?? 'Understanding which destination matches your family\'s personal goals, budget, and lifestyle.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Mathura Profile -->
            <div class="p-8 sm:p-10 rounded-3xl border space-y-6 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-widest font-bold text-amber-300"><?= e($pm['comparison']['mathura_eyebrow'] ?? 'Quiet Living & Value') ?></span>
                    <span class="text-xs px-3 py-1 rounded-full border" :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }"><?= e($pm['comparison']['mathura_price'] ?? '₹ 32,000 – ₹ 40,000 / sq. yd') ?></span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($pm['comparison']['mathura_title'] ?? 'Mathura City & Govardhan Corridor') ?>
                </h3>
                <ul class="space-y-3 text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?php if (!empty($pm['comparison']['mathura_features'])): ?>
                        <?= $pm['comparison']['mathura_features'] ?>
                    <?php else: ?>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Lower Density &amp; Calm:</strong> Minimal tourist traffic jams on weekdays; calm residential environment for retirees.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Dual Spiritual Proximity:</strong> Quick 15-minute access to both Shri Krishna Janmasthan and Govardhan Parikrama.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Superior Value per Gaj:</strong> Acquire 150 to 180 sq. yards in an MVDA township for the price of 100 sq. yards in Vrindavan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Essential Municipal Services:</strong> Proximity to major railway junctions, medical hospitals, and premier schools.</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Vrindavan Profile -->
            <div class="p-8 sm:p-10 rounded-3xl border space-y-6 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-widest font-bold text-amber-500"><?= e($pm['comparison']['vrindavan_eyebrow'] ?? 'High Devotional Energy') ?></span>
                    <span class="text-xs px-3 py-1 rounded-full border" :style="{ borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-title)' }"><?= e($pm['comparison']['vrindavan_price'] ?? '₹ 42,000 – ₹ 75,000 / sq. yd') ?></span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($pm['comparison']['vrindavan_title'] ?? 'Vrindavan (Rukmani Vihar & NH-19)') ?>
                </h3>
                <ul class="space-y-3 text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?php if (!empty($pm['comparison']['vrindavan_features'])): ?>
                        <?= $pm['comparison']['vrindavan_features'] ?>
                    <?php else: ?>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Epicenter of Pilgrimage:</strong> Prem Mandir, ISKCON, Banke Bihari, and Chandrodaya Mandir within minutes.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Maximum Capital Appreciation:</strong> Severe land scarcity and high global NRI demand drive higher annual price jumps.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>High-Yield Rental Tariffs:</strong> Weekend pilgrimage demand generates significant short-term holiday home returns.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span><strong>Highway Expressways:</strong> Direct 90-minute commute to Jewar Airport and Delhi-NCR via Yamuna Expressway.</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     5. SECTION 4: 100 Gaj Plot in Mathura Price Breakdown
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                <?= e($pm['budget']['eyebrow'] ?? 'Budget Planning') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($pm['budget']['title'] ?? '100 Gaj Plot in Mathura Price: The 3 Real Market Tiers') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                <?= e($pm['budget']['subtitle'] ?? 'Why one advertisement claims ₹9 Lakhs while another quotes ₹35 Lakhs for 100 Gaj in Mathura.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Tier 1 -->
            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs uppercase tracking-widest font-bold text-rose-400"><?= e($pm['budget']['tier1_eyebrow'] ?? 'Tier 1: High Risk') ?></span>
                <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($pm['budget']['tier1_title'] ?? 'Raw Farmland Colonies') ?>
                </h3>
                <div class="text-2xl font-bold font-editorial text-amber-300"><?= e($pm['budget']['tier1_price'] ?? '₹ 9L – ₹ 16L') ?></div>
                <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($pm['budget']['tier1_desc'] ?? 'Priced at ₹9,000 – ₹16,000/sq. yd in unapproved rural tracts (Chhata, Kosi outskirts). No MVDA sanction, dirt roads, no water lines, cannot get bank loans, high risk of future demolition or sealing.') ?>
                </p>
            </div>

            <!-- Tier 2 -->
            <div class="p-8 rounded-3xl border space-y-4 transition-all"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs uppercase tracking-widest font-bold text-amber-300"><?= e($pm['budget']['tier2_eyebrow'] ?? 'Tier 2: Semi-Developed') ?></span>
                <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($pm['budget']['tier2_title'] ?? 'Peripheral Enclaves') ?>
                </h3>
                <div class="text-2xl font-bold font-editorial text-amber-300"><?= e($pm['budget']['tier2_price'] ?? '₹ 20L – ₹ 28L') ?></div>
                <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($pm['budget']['tier2_desc'] ?? 'Priced at ₹20,000 – ₹28,000/sq. yd. Basic boundary walls erected but lacking formal MVDA developmental clearance and guaranteed underground utility infrastructure.') ?>
                </p>
            </div>

            <!-- Tier 3 -->
            <div class="p-8 rounded-3xl border space-y-4 transition-all border-[#9A6B2F]/40"
                 :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                <span class="text-xs uppercase tracking-widest font-bold text-[#9A6B2F]"><?= e($pm['budget']['tier3_eyebrow'] ?? 'Tier 3: 100% Certified') ?></span>
                <h3 class="text-2xl font-editorial font-normal" :style="{ color: 'var(--theme-title)' }">
                    <?= e($pm['budget']['tier3_title'] ?? 'MVDA Approved Gated Townships') ?>
                </h3>
                <div class="text-2xl font-bold font-editorial text-[#9A6B2F]"><?= e($pm['budget']['tier3_price'] ?? '₹ 35L – ₹ 42L') ?></div>
                <p class="text-xs sm:text-sm font-light leading-relaxed" :style="{ color: 'var(--theme-text-secondary)' }">
                    <?= e($pm['budget']['tier3_desc'] ?? 'Exemplified by Shri Vrinda Aakruti Village (₹35,000/sq. yd). Complete MVDA sanction, wide concrete avenues, sweet water, gated security, parks, immediate registry, and SBI/HDFC home loan approval.') ?>
                </p>
            </div>

        </div>

    </div>
</section>


<!-- =======================================================================
     6. SECTION 5: Frequently Asked Questions (13 Interactive Mathura FAQs)
     ======================================================================= -->
<section class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-bg-canvas)', borderColor: 'var(--theme-border-hairline)' }">
    <div class="max-w-5xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-colors"
                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                <?= e($pm['faqs']['eyebrow'] ?? 'Buyer Intelligence') ?>
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-title)' }">
                <?= e($pm['faqs']['title'] ?? 'Frequently Asked Questions About Property in Mathura') ?>
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($pm['faqs']['subtitle'] ?? 'Key questions and authentic insights on Mathura plot prices, MVDA zoning, and registration.') ?>
            </p>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: null }">
            
            <?php
            $mathuraFaqs = $pm['faqs']['list'] ?? [];
            if (empty($mathuraFaqs)) {
                $mathuraFaqs = [
                    [
                        'q' => '1. What is the current plot rate in Mathura City in 2026?',
                        'a' => 'Plot rates vary significantly based on approval status. Outer unapproved lands range from ₹9,000 to ₹18,000/sq. yard. Fully developed, MVDA-approved gated developments such as Shri Vrinda Aakruti Village on Govardhan Road are priced at ₹35,000 per square yard.'
                    ],
                    [
                        'q' => '2. What is the price of a 100 Gaj plot in Mathura?',
                        'a' => 'A 100-gaj (900 sq. ft) residential plot in a sanctioned MVDA gated township costs approximately ₹35 Lakhs. While unauthorized farmland listings may quote ₹9 to ₹15 Lakhs, they lack municipal approvals, roads, utilities, and bank loan eligibility.'
                    ],
                    [
                        'q' => '3. Where is Shri Vrinda Aakruti Village located?',
                        'a' => 'Shri Vrinda Aakruti Village is situated on Satoha-Naugaon Road off the main Mathura-Govardhan Road. It provides rapid 15-minute access to Shri Krishna Janmasthan and Govardhan Parikrama.'
                    ],
                    [
                        'q' => '4. Is property in Mathura safe to buy for outstation buyers?',
                        'a' => 'Yes, provided you purchase within an MVDA-sanctioned layout with clear 30-year search titles. GLEAMREALTY PRIVATE LIMITED ensures zero unauthorized land is ever offered to patrons.'
                    ],
                    [
                        'q' => '5. What does MVDA approval guarantee for Mathura plots?',
                        'a' => 'MVDA approval ensures legally protected road widths (30-40 ft), dedicated green parks that cannot be encroached upon, underground drainage, potable water lines, and eligibility for bank mortgages.'
                    ],
                    [
                        'q' => '6. Can I get a bank loan for purchasing a plot in Mathura?',
                        'a' => 'Yes. On all MVDA sanctioned projects like Shri Vrinda Aakruti Village, leading institutions such as SBI, HDFC, and ICICI Bank approve residential plot loans up to 75-80%.'
                    ],
                    [
                        'q' => '7. Is sweet drinking water available in Mathura plots?',
                        'a' => 'Many areas of Mathura suffer from saline ground water. However, Shri Vrinda Aakruti Village on Satoha Road has access to sweet water aquifers and a dedicated community filtration supply line.'
                    ],
                    [
                        'q' => '8. Should I buy a plot in Mathura or Vrindavan?',
                        'a' => 'If you prioritize tranquil everyday living, larger plot size per rupee, and proximity to Mathura City amenities, choose Mathura (Govardhan Road). If you prioritize high-energy temple proximity and maximum tourist rental yields, choose Vrindavan.'
                    ],
                    [
                        'q' => '9. What plot sizes are available in Shri Vrinda Aakruti Village?',
                        'a' => 'Plot sizes range from 116 sq. yards up to 183 sq. yards, ideal for standalone cottages or duplex villas.'
                    ],
                    [
                        'q' => '10. What is the registry and mutation procedure in Mathura?',
                        'a' => 'Once payments are completed, registration takes place at the Mathura Sub-Registrar Office with immediate stamp duty payment, followed by mutation in the municipal revenue records.'
                    ],
                    [
                        'q' => '11. How does the upcoming Jewar Airport benefit Mathura?',
                        'a' => 'The operational Jewar Airport is connected directly to Mathura via the Yamuna Expressway, reducing travel time to 90 minutes and driving steady commercial and residential valuation growth.'
                    ],
                    [
                        'q' => '12. Can I build my own house on the plot or is construction mandatory?',
                        'a' => 'You receive freehold ownership of the land. You can construct immediately using our certified architectural team or hold the plot as a long-term appreciating asset.'
                    ],
                    [
                        'q' => '13. How can I book a free site tour of Mathura plots?',
                        'a' => 'Simply submit the site visit form below or call our private desk at +91 9871731303 / +91 7409767452. We provide complimentary pickup from Mathura Junction railway station.'
                    ]
                ];
            }
            ?>

            <?php foreach ($mathuraFaqs as $idx => $faq): ?>
                <div class="rounded-2xl border transition-all duration-300"
                     :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)' }">
                    <button @click="activeAccordion = (activeAccordion === <?= $idx ?> ? null : <?= $idx ?>)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 font-editorial text-lg sm:text-xl font-normal transition-colors"
                            :style="{ color: 'var(--theme-title)' }">
                        <span><?= htmlspecialchars($faq['q'] ?? '') ?></span>
                        <span class="text-xl shrink-0 transition-transform duration-300"
                              :class="{ 'rotate-180': activeAccordion === <?= $idx ?> }">
                            &darr;
                        </span>
                    </button>
                    <div x-show="activeAccordion === <?= $idx ?>"
                         x-collapse
                         x-cloak
                         class="px-6 pb-6 text-sm font-light leading-relaxed border-t pt-4"
                         :style="{ color: 'var(--theme-text-secondary)', borderColor: 'var(--theme-border-hairline)' }">
                        <?= htmlspecialchars($faq['a'] ?? '') ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- =======================================================================
     7. SECTION 6: VIP Site Visit & Consultation Form
     ======================================================================= -->
<section id="freesitevisit" class="py-20 sm:py-28 px-6 sm:px-8 border-b transition-colors duration-300 relative overflow-hidden theme-section-alt"
         :style="{ backgroundColor: 'var(--theme-section-alt-bg)', borderColor: 'var(--theme-border-hairline)' }">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[350px] rounded-full blur-[140px] pointer-events-none -z-0 opacity-20"
         :style="{ backgroundColor: 'var(--theme-hero-glow)' }"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider backdrop-blur-md bg-white/10 border border-white/20 shadow-sm"
                  :style="{ color: 'var(--theme-section-alt-accent)' }">
                Complimentary Tour
            </span>
            <h2 class="font-editorial text-3xl sm:text-5xl font-normal tracking-tight"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                Book a Free Site Visit to Mathura Plots
            </h2>
            <p class="text-sm sm:text-base font-light leading-relaxed max-w-2xl mx-auto"
               :style="{ color: 'var(--theme-section-alt-subtext)' }">
                Explore Shri Vrinda Aakruti Village on Govardhan Road with our senior Mathura real estate advisors. Free station pickup available.
            </p>
        </div>

        <div class="rounded-3xl border p-8 sm:p-12 shadow-2xl transition-all"
             :style="{ backgroundColor: 'var(--theme-card-bg)', borderColor: 'var(--theme-card-border)', boxShadow: 'var(--theme-card-shadow)' }"
             x-data="{
                 name: '',
                 phone: '',
                 email: '',
                 plotRequirement: '116 Sq. Yards (Compact)',
                 visitTime: 'Upcoming Weekend',
                 message: '',
                 loading: false,
                 successMsg: '',
                 errorMsg: '',
                 async submitForm() {
                     if (!this.name || !this.phone) {
                         this.errorMsg = 'Please enter your name and contact phone.';
                         return;
                     }
                     this.loading = true;
                     this.errorMsg = '';
                     this.successMsg = '';
                     try {
                         const payload = {
                             name: this.name,
                             phone: this.phone,
                             email: this.email,
                             project_name: 'Property in Mathura - ' + this.plotRequirement,
                             message: 'Timing: ' + this.visitTime + '. Notes: ' + (this.message || ''),
                             source: 'Property in Mathura Landing Page'
                         };
                         const res = await fetch('<?= url('/api/inquiry') ?>', {
                             method: 'POST',
                             headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                             body: JSON.stringify(payload)
                         });
                         const data = await res.json();
                         if (data.status === 'success' || res.ok) {
                             this.successMsg = 'Hare Krishna! Thank you. Our Mathura desk will call to confirm your site visit.';
                             this.name = ''; this.phone = ''; this.email = ''; this.message = '';
                         } else {
                             this.errorMsg = data.message || 'Error submitting request. Please call +91 9871731303 / +91 7409767452.';
                         }
                     } catch (e) {
                         this.errorMsg = 'Network error. Please call +91 9871731303 / +91 7409767452.';
                     } finally {
                         this.loading = false;
                     }
                 }
             }">
            
            <form @submit.prevent="submitForm()" class="space-y-6">
                <div x-show="successMsg" x-cloak class="p-4 rounded-xl bg-[#FDF3E3] border border-[#9A6B2F]/30 text-[#9A6B2F] text-sm font-medium text-center">
                    <span x-text="successMsg"></span>
                </div>
                <div x-show="errorMsg" x-cloak class="p-4 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-300 text-sm font-medium text-center">
                    <span x-text="errorMsg"></span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Your Full Name *
                        </label>
                        <input type="text" x-model="name" required placeholder="e.g. Shyam Sundar"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Phone / WhatsApp *
                        </label>
                        <input type="tel" x-model="phone" required placeholder="+91 9871731303"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Plot Requirement
                        </label>
                        <select x-model="plotRequirement"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="116 Sq. Yards (Compact)">116 Sq. Yards (Compact 100 Gaj Class)</option>
                            <option value="150 Sq. Yards (Standard)">150 Sq. Yards (Standard Villa Plot)</option>
                            <option value="183 Sq. Yards (Spacious)">183 Sq. Yards (Spacious Corner Plot)</option>
                            <option value="Ready Duplex Villa">Ready-to-Move Duplex Villa</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Visit Timeline
                        </label>
                        <select x-model="visitTime"
                                class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                                :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                            <option value="Upcoming Weekend">This Weekend</option>
                            <option value="Within 7 Days">Within Next 7 Days</option>
                            <option value="Within 1 Month">Within 1 Month</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs uppercase font-semibold tracking-wider" :style="{ color: 'var(--theme-title)' }">
                            Pick-up or Travel Notes
                        </label>
                        <input type="text" x-model="message" placeholder="e.g. Arriving at Mathura Junction by train at 10 AM"
                               class="w-full px-4 py-3.5 rounded-xl border text-sm outline-none transition-all"
                               :style="{ backgroundColor: 'var(--theme-section-card-bg)', borderColor: 'var(--theme-border-hairline)', color: 'var(--theme-text-primary)' }">
                    </div>
                </div>

                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" :disabled="loading"
                            class="w-full sm:w-auto px-10 py-4 rounded-full text-xs font-bold uppercase tracking-[0.18em] transition-all shadow-xl hover:scale-105 disabled:opacity-50"
                            :style="{ backgroundColor: 'var(--theme-accent)', color: '#090d16' }">
                        <span x-show="!loading">Confirm Free Mathura Tour &rarr;</span>
                        <span x-show="loading" x-cloak>Scheduling...</span>
                    </button>
                    <div class="flex items-center gap-2 text-xs" :style="{ color: 'var(--theme-text-secondary)' }">
                        <span>Mathura Desk:</span>
                        <a href="tel:+919871731303" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            +91 9871731303
                        </a>
                        <span>/</span>
                        <a href="tel:+917409767452" class="font-bold hover:underline" :style="{ color: 'var(--theme-title)' }">
                            +91 7409767452
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
