<!-- Page Hero Banner -->
<section class="relative min-h-[40vh] flex items-center justify-center border-b py-24 lg:py-32 overflow-hidden transition-colors duration-300"
         :style="{ backgroundColor: 'var(--theme-hero-from)', borderColor: 'var(--theme-border-hairline)' }">
    <?php if (!empty($page['hero_media_url'])): ?>
        <div class="absolute inset-0 z-0 opacity-20">
            <img src="<?= media_url($page['hero_media_url']) ?>" class="parallax-media w-full h-full object-cover filter blur-[2px] scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
        </div>
    <?php endif; ?>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-4">
        <div class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.24em] font-semibold"
             :style="{ color: 'var(--theme-accent)' }">
            <span class="w-1.5 h-1.5 rounded-full" :style="{ backgroundColor: 'var(--theme-accent)' }"></span>
            Gleamrealty Private Office &bull; Braj Bhumi
        </div>

        <h1 class="font-editorial text-4xl sm:text-6xl font-normal tracking-tight leading-tight"
            :style="{ color: 'var(--theme-title)' }">
            <?= e($page['hero_heading'] ?: $page['title']) ?>
        </h1>

        <?php if (!empty($page['hero_subheading'])): ?>
            <p class="text-sm sm:text-base max-w-2xl mx-auto font-light leading-relaxed"
               :style="{ color: 'var(--theme-text-secondary)' }">
                <?= e($page['hero_subheading']) ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Page Body Content -->
<article class="max-w-4xl mx-auto px-6 sm:px-8 py-20">
    <div class="border rounded-3xl p-8 sm:p-14 shadow-xl space-y-6 text-sm sm:text-base font-light leading-relaxed max-w-none transition-colors duration-300"
         :style="{
             backgroundColor: 'var(--theme-section-card-bg)',
             borderColor: 'var(--theme-border-hairline)',
             color: 'var(--theme-text-primary)'
         }">
        <?= $page['content'] ?>
    </div>

    <div class="mt-12 text-center">
        <a href="<?= url('/') ?>"
           :style="{
               backgroundColor: 'var(--theme-btn-pri-bg)',
               color: 'var(--theme-btn-pri-text)',
               borderColor: 'var(--theme-border-hairline)'
           }"
           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full border text-xs font-semibold uppercase tracking-[0.18em] transition-all duration-300 hover:opacity-90 shadow-sm">
            &larr; Return to Residences Collection
        </a>
    </div>
</article>
