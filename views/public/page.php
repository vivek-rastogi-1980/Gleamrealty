<!-- Page Hero Banner -->
<section class="relative min-h-[42vh] flex items-center justify-center border-b border-stone-800 bg-stone-950 py-24 lg:py-32 overflow-hidden text-white">
    <?php if (!empty($page['hero_media_url'])): ?>
        <div class="absolute inset-0 z-0">
            <img src="<?= media_url($page['hero_media_url']) ?>" class="parallax-media w-full h-full object-cover filter brightness-[0.35] scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-stone-950/70 to-stone-950/30"></div>
        </div>
    <?php else: ?>
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-stone-900 to-stone-950"></div>
        </div>
    <?php endif; ?>

    <!-- Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] rounded-full blur-3xl pointer-events-none -z-0 opacity-20 bg-[#9A6B2F]"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] uppercase tracking-[0.24em] font-semibold bg-white/10 backdrop-blur-md border border-white/20 text-[#D4AF37] shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-[#9A6B2F]"></span>
            Gleamrealty Private Limited &bull; Braj Bhumi
        </div>

        <h1 class="font-editorial text-4xl sm:text-6xl font-normal tracking-tight leading-tight text-white drop-shadow-md">
            <?= e($page['hero_heading'] ?: $page['title']) ?>
        </h1>

        <?php if (!empty($page['hero_subheading'])): ?>
            <p class="text-sm sm:text-base max-w-2xl mx-auto font-light leading-relaxed text-stone-200 drop-shadow">
                <?= e($page['hero_subheading']) ?>
            </p>
        <?php endif; ?>

        <?php if (\Core\Auth::check()): ?>
            <div class="pt-2">
                <a href="<?= url('admin/pages/' . $page['id'] . '/edit') ?>"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider bg-white/15 hover:bg-white/25 text-white border border-white/30 backdrop-blur-sm transition-all shadow-md">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Page &amp; Hero Background in Admin
                </a>
            </div>
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
