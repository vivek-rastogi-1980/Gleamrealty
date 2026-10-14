<!-- Public Single Article Reader View -->
<div class="pt-24 pb-20">

    <!-- Article Header & Breadcrumbs -->
    <header class="border-b py-10 sm:py-14"
            :style="{
                backgroundColor: 'var(--theme-section-alt-bg)',
                borderColor: 'var(--theme-border-hairline)'
            }">
        <div class="max-w-4xl mx-auto px-6 sm:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs opacity-75 mb-6 overflow-x-auto whitespace-nowrap"
                 :style="{ color: 'var(--theme-section-alt-text)' }">
                <a href="<?= url('/') ?>" class="hover:underline">Home</a>
                <span>&rsaquo;</span>
                <a href="<?= url('/blog') ?>" class="hover:underline">Blog</a>
                <span>&rsaquo;</span>
                <a href="<?= url('/blog?category=' . urlencode($blog['category'])) ?>" class="hover:underline">
                    <?= e($blog['category']) ?>
                </a>
                <span>&rsaquo;</span>
                <span class="truncate max-w-[200px] sm:max-w-xs font-semibold" :style="{ color: 'var(--theme-section-alt-title)' }">
                    <?= e($blog['title']) ?>
                </span>
            </nav>

            <!-- Category Badge -->
            <div class="mb-4">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-[0.2em] section-alt-badge">
                    <span class="w-1.5 h-1.5 rounded-full" style="background-color: var(--theme-accent);"></span>
                    <?= e($blog['category'] ?: 'Market Intelligence') ?>
                </span>
            </div>

            <!-- Title -->
            <h1 class="font-editorial text-2xl sm:text-4xl lg:text-5xl font-light leading-tight tracking-tight mb-6"
                :style="{ color: 'var(--theme-section-alt-title)' }">
                <?= e($blog['title']) ?>
            </h1>

            <!-- Meta Row -->
            <div class="flex flex-wrap items-center justify-between gap-4 pt-6 border-t text-xs"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-xs shadow-sm"
                         :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                        GR
                    </div>
                    <div>
                        <div class="font-bold" :style="{ color: 'var(--theme-section-alt-title)' }">
                            <?= e($blog['author'] ?: 'Gleamrealty Advisory Desk') ?>
                        </div>
                        <div class="text-[11px] opacity-75">
                            Published <?= date('F j, Y', strtotime($blog['published_at'] ?? $blog['created_at'])) ?> &bull; <?= e($blog['read_time'] ?: '5 min read') ?>
                        </div>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center gap-2">
                    <span class="text-[11px] uppercase tracking-wider font-semibold opacity-60 mr-1">Share:</span>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text=<?= urlencode($blog['title'] . ' ' . url('/blog/' . $blog['slug'])) ?>" target="_blank" rel="noopener noreferrer"
                       class="w-8 h-8 rounded-full flex items-center justify-center bg-[#25D366]/20 text-[#25D366] hover:scale-110 transition-transform"
                       title="Share on WhatsApp">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.23c-.25-.13-1.47-.72-1.7-.81-.23-.08-.4-.13-.57.13-.17.25-.65.81-.8 1-.15.17-.3.19-.55.07-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.12-.15.17-.25.25-.42.08-.17.04-.32-.02-.44-.06-.13-.57-1.37-.78-1.88-.2-.5-.42-.43-.57-.44h-.49c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.45 1.03 2.62.13.17 1.78 2.72 4.31 3.81.6.26 1.07.42 1.44.54.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29z"/></svg>
                    </a>
                    <!-- Twitter/X -->
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($blog['title']) ?>&url=<?= urlencode(url('/blog/' . $blog['slug'])) ?>" target="_blank" rel="noopener noreferrer"
                       class="w-8 h-8 rounded-full flex items-center justify-center bg-black/10 dark:bg-white/10 hover:scale-110 transition-transform"
                       title="Share on X">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Reader Layout: 2 Columns on Desktop -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 mt-10 sm:mt-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Primary Article Column (8 Cols) -->
            <div class="lg:col-span-8 space-y-8">

                <!-- Featured Image -->
                <?php if (!empty($blog['featured_image'])): ?>
                    <div class="rounded-2xl sm:rounded-3xl overflow-hidden border shadow-xl"
                         :style="{ borderColor: 'var(--theme-border-subtle)' }">
                        <img src="<?= asset($blog['featured_image']) ?>"
                             alt="<?= e($blog['title']) ?>"
                             class="w-full h-auto max-h-[500px] object-cover"
                             loading="eager">
                    </div>
                <?php endif; ?>

                <!-- Excerpt Highlight Callout -->
                <?php if (!empty($blog['excerpt'])): ?>
                    <div class="p-6 sm:p-7 rounded-2xl border-l-4 shadow-sm"
                         :style="{
                             backgroundColor: 'var(--theme-card-bg)',
                             borderLeftColor: 'var(--theme-accent)',
                             borderColor: 'var(--theme-border-subtle)'
                         }">
                        <div class="text-xs uppercase tracking-widest font-bold mb-2" :style="{ color: 'var(--theme-accent)' }">
                            Executive Overview
                        </div>
                        <p class="text-sm sm:text-base leading-relaxed italic font-editorial" :style="{ color: 'var(--theme-title)' }">
                            &ldquo;<?= e($blog['excerpt']) ?>&rdquo;
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Formatted Article Content Body -->
                <div class="article-rich-body space-y-6 text-sm sm:text-base leading-relaxed"
                     :style="{ color: 'var(--theme-text-primary)' }">
                    <style>
                        .article-rich-body h2 {
                            font-family: var(--font-editorial, 'Playfair Display', Georgia, serif);
                            font-size: 1.65rem;
                            line-height: 1.35;
                            margin-top: 2.2rem;
                            margin-bottom: 0.85rem;
                            font-weight: 500;
                            color: var(--theme-title);
                        }
                        .article-rich-body h3 {
                            font-size: 1.25rem;
                            line-height: 1.4;
                            margin-top: 1.8rem;
                            margin-bottom: 0.75rem;
                            font-weight: 600;
                            color: var(--theme-title);
                        }
                        .article-rich-body p {
                            margin-bottom: 1.2rem;
                            line-height: 1.8;
                        }
                        .article-rich-body ul, .article-rich-body ol {
                            margin-top: 0.75rem;
                            margin-bottom: 1.25rem;
                            padding-left: 1.5rem;
                            list-style-type: disc;
                        }
                        .article-rich-body li {
                            margin-bottom: 0.5rem;
                            line-height: 1.7;
                        }
                        .article-rich-body blockquote {
                            border-left: 3px solid var(--theme-accent);
                            padding: 1rem 1.25rem;
                            margin: 1.75rem 0;
                            background: rgba(0, 0, 0, 0.03);
                            border-radius: 0 0.75rem 0.75rem 0;
                            font-style: italic;
                            color: var(--theme-title);
                        }
                        .article-rich-body strong {
                            color: var(--theme-title);
                            font-weight: 700;
                        }
                    </style>

                    <?= $blog['content'] ?>
                </div>

                <!-- Tags Strip -->
                <?php if (!empty($blog['tags'])): ?>
                    <div class="pt-6 border-t flex flex-wrap items-center gap-2"
                         :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <span class="text-xs uppercase tracking-wider font-semibold opacity-60">Tagged:</span>
                        <?php foreach (explode(',', $blog['tags']) as $tg): ?>
                            <?php $cleanTag = trim($tg); ?>
                            <?php if (!empty($cleanTag)): ?>
                                <span class="px-3 py-1 rounded-full text-xs font-medium border"
                                      :style="{
                                          backgroundColor: 'var(--theme-card-bg)',
                                          borderColor: 'var(--theme-border-subtle)',
                                          color: 'var(--theme-title)'
                                      }">
                                    #<?= e($cleanTag) ?>
                                </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Author Profile Box -->
                <div class="p-6 sm:p-8 rounded-2xl border shadow-md flex flex-col sm:flex-row items-start sm:items-center gap-5"
                     :style="{
                         backgroundColor: 'var(--theme-card-bg)',
                         borderColor: 'var(--theme-border-subtle)'
                     }">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center font-bold text-lg shrink-0 shadow-md"
                         :style="{ backgroundColor: 'var(--theme-btn-pri-bg)', color: 'var(--theme-btn-pri-text)' }">
                        GR
                    </div>
                    <div class="space-y-1.5 flex-1">
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-sm" :style="{ color: 'var(--theme-title)' }">
                                <?= e($blog['author'] ?: 'Gleamrealty Advisory Desk') ?>
                            </h3>
                            <span class="text-[10px] uppercase tracking-wider font-semibold px-2 py-0.5 rounded-full"
                                  :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                                Editorial Team
                            </span>
                        </div>
                        <p class="text-xs leading-relaxed opacity-75" :style="{ color: 'var(--theme-text-primary)' }">
                            Authored by the private client acquisitions team at <strong>GLEAMREALTY PRIVATE LIMITED</strong>. Specializing in statutory MVDA master plan vetting, title due diligence, and plotted sanctuary development in Vrindavan and Mathura.
                        </p>
                        <div class="text-[11px] font-mono opacity-80 pt-1">
                            <a href="<?= e(company_map_directions_url()) ?>" target="_blank" rel="noopener noreferrer" class="hover:underline">
                                <?= e(company_address()) ?>
                            </a> &bull; +91 9871731303
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Sidebar Column (4 Cols) -->
            <aside class="lg:col-span-4 space-y-6">

                <!-- Quick VIP Consultation Card -->
                <div class="p-6 sm:p-7 rounded-2xl border shadow-xl sticky top-28 space-y-5"
                     :style="{
                         backgroundColor: 'var(--theme-card-bg)',
                         borderColor: 'var(--theme-border-subtle)'
                     }">
                    <div class="space-y-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider"
                              :style="{ backgroundColor: 'var(--theme-badge-bg)', color: 'var(--theme-accent)' }">
                            <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background-color: var(--theme-accent);"></span>
                            Legal &amp; Site Showing
                        </span>
                        <h3 class="font-editorial text-xl font-light leading-snug" :style="{ color: 'var(--theme-title)' }">
                            Schedule a Private Braj Consultation
                        </h3>
                        <p class="text-xs leading-relaxed opacity-75" :style="{ color: 'var(--theme-text-primary)' }">
                            Direct advisory with zero broker overhead. Verify MVDA registry, land zoning, and schedule a chauffeured site visit.
                        </p>
                    </div>

                    <!-- Direct Call CTA -->
                    <div class="space-y-2 pt-1">
                        <button @click="vipModalOpen = true"
                                type="button"
                                class="w-full py-3 px-4 rounded-xl text-xs font-bold uppercase tracking-wider shadow-md transition-all hover:scale-102 cursor-pointer"
                                :style="{
                                    backgroundColor: 'var(--theme-btn-pri-bg)',
                                    color: 'var(--theme-btn-pri-text)'
                                }">
                            Request Callback
                        </button>
                        <a href="tel:+919871731303"
                           class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl text-xs font-bold uppercase tracking-wider border transition-colors hover:bg-black/5 dark:hover:bg-white/5"
                           :style="{
                               borderColor: 'var(--theme-border-subtle)',
                               color: 'var(--theme-title)'
                           }">
                            <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>+91 9871731303</span>
                        </a>
                    </div>

                    <!-- Verified Flagship Sanctuaries List -->
                    <?php if (!empty($featuredProjects)): ?>
                        <div class="pt-5 border-t space-y-3" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                            <div class="text-[11px] uppercase tracking-wider font-bold opacity-60">
                                Featured Verified Sanctuaries
                            </div>
                            <?php foreach ($featuredProjects as $proj): ?>
                                <a href="<?= url('/projects/' . $proj['slug']) ?>"
                                   class="group/proj flex items-center justify-between p-2.5 rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                                    <div class="min-w-0 pr-2">
                                        <div class="text-xs font-semibold truncate group-hover/proj:underline" :style="{ color: 'var(--theme-title)' }">
                                            <?= e($proj['name']) ?>
                                        </div>
                                        <div class="text-[10px] opacity-60"><?= e($proj['location']) ?> &bull; <?= e($proj['project_type']) ?></div>
                                    </div>
                                    <span class="text-xs opacity-60 group-hover/proj:translate-x-1 transition-transform" :style="{ color: 'var(--theme-accent)' }">&rarr;</span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Office Address Stamp -->
                    <div class="pt-3 border-t text-[11px] opacity-70 leading-relaxed" :style="{ borderColor: 'var(--theme-border-hairline)' }">
                        <strong class="block text-white">Headquarters:</strong>
                        <a href="<?= e(company_map_directions_url()) ?>" target="_blank" rel="noopener noreferrer" class="hover:underline">
                            <?= e(company_address()) ?>
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>

    <!-- Related Articles Stream -->
    <?php if (!empty($recentArticles)): ?>
        <section class="mt-20 max-w-7xl mx-auto px-6 sm:px-8 border-t pt-14"
                 :style="{ borderColor: 'var(--theme-border-hairline)' }">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs uppercase tracking-[0.2em] font-bold" :style="{ color: 'var(--theme-accent)' }">
                        Continue Reading
                    </span>
                    <h3 class="font-editorial text-2xl sm:text-3xl font-light mt-1" :style="{ color: 'var(--theme-title)' }">
                        More Intelligence &amp; Advisory
                    </h3>
                </div>
                <a href="<?= url('/blog') ?>" class="text-xs font-bold uppercase tracking-wider hover:underline" :style="{ color: 'var(--theme-accent)' }">
                    View All Articles &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <?php foreach ($recentArticles as $rec): ?>
                    <article class="group rounded-2xl border overflow-hidden shadow-sm hover:shadow-lg transition-all"
                             :style="{
                                 backgroundColor: 'var(--theme-card-bg)',
                                 borderColor: 'var(--theme-border-subtle)'
                             }">
                        <a href="<?= url('/blog/' . $rec['slug']) ?>" class="block h-44 overflow-hidden">
                            <img src="<?= asset(!empty($rec['featured_image']) ? $rec['featured_image'] : 'uploads/pages/residential-plots-in-vrindavan.jpeg') ?>"
                                 alt="<?= e($rec['title']) ?>"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                 loading="lazy">
                        </a>
                        <div class="p-5 space-y-2.5">
                            <div class="text-[10px] font-bold uppercase tracking-wider" :style="{ color: 'var(--theme-accent)' }">
                                <?= e($rec['category']) ?>
                            </div>
                            <h4 class="font-editorial text-lg font-light leading-snug group-hover:underline line-clamp-2"
                                :style="{ color: 'var(--theme-title)' }">
                                <a href="<?= url('/blog/' . $rec['slug']) ?>">
                                    <?= e($rec['title']) ?>
                                </a>
                            </h4>
                            <p class="text-xs opacity-75 line-clamp-2" :style="{ color: 'var(--theme-text-primary)' }">
                                <?= e($rec['excerpt']) ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

</div>
