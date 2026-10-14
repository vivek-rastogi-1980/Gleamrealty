<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($seo_title) ? e($seo_title) . ' | Gleamrealty Admin' : 'Admin Console | Gleamrealty' ?></title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for Tabs and Reactive Controls -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        gold: {
                            50: '#fbf8f3',
                            100: '#f6f0e4',
                            200: '#eddcc5',
                            300: '#dfc29e',
                            400: '#c5a880',
                            500: '#b89668',
                            600: '#a37e54',
                            700: '#846244',
                            800: '#6d4f3b',
                            900: '#5c4334',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
        
        /* Custom Scrollbar for Sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
</head>
<body class="h-full flex overflow-hidden text-slate-100 bg-slate-950">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900/90 border-r border-slate-800 flex flex-col flex-shrink-0 backdrop-blur-lg h-full">
        <!-- Brand -->
        <div class="h-16 flex items-center px-6 border-b border-slate-800/80 shrink-0">
            <a href="<?= url('/admin/dashboard') ?>" class="flex items-center gap-2.5 font-heading text-lg font-bold tracking-wider text-white">
                <span class="w-2.5 h-2.5 bg-gold-400 rotate-45 inline-block"></span>
                <span>GLEAM<span class="text-gold-400">REALTY</span></span>
            </a>
        </div>

        <!-- Nav Links -->
        <nav class="p-4 space-y-1 text-sm font-medium flex-1 overflow-y-auto sidebar-scroll">
                
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1 mt-2 px-3">Overview</div>
                <a href="<?= url('/admin/dashboard') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/dashboard') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="<?= url('/admin/inquiries') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/inquiries') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Inquiries &amp; Leads
                </a>

                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1 mt-6 px-3">Core Content</div>
                <a href="<?= url('/admin/hero') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/hero') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                    Hero Section
                </a>
                <a href="<?= url('/admin/home') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/home') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Homepage
                </a>
                <a href="<?= url('/admin/about') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/about') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    About Us
                </a>
                <a href="<?= url('/admin/contact') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/contact') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Contact Us
                </a>
                <a href="<?= url('/admin/footer') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/footer') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                    Footer Settings
                </a>


                <div class="space-y-1">
                    <a href="<?= url('/admin/projects') ?>" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/projects') && !str_contains($_SERVER['REQUEST_URI'], 'location=') ? 'bg-slate-800 text-white' : '' ?>">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>Projects</span>
                        </div>
                    </a>
                    <a href="<?= url('/admin/projects?location=Vrindavan') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                            Projects by Location
                        </span>
                    </a>
                </div>

                <div class="space-y-1 mt-6">
                    <a href="<?= url('/admin/pages') ?>" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors <?= str_contains($_SERVER['REQUEST_URI'], '/admin/pages') && !str_contains($_SERVER['REQUEST_URI'], 'type=communities') ? 'bg-slate-800 text-white' : '' ?>">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Pages CMS</span>
                        </div>
                    </a>
                    <a href="<?= url('/admin/pages?type=communities') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-amber-300/80 hover:text-amber-200 hover:bg-slate-800/40 transition-colors ml-7">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                            Location &amp; Community Pages
                        </span>
                        <span class="text-[10px] font-mono bg-amber-500/20 text-amber-300 px-1.5 py-0.5 rounded">3</span>
                    </a>
                    <a href="<?= url('/admin/property-vrindavan') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/property-vrindavan') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Property in Vrindavan
                        </span>
                    </a>
                    <a href="<?= url('/admin/property-mathura') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/property-mathura') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Plot in Mathura City
                        </span>
                    </a>
                    <a href="<?= url('/admin/residential-plots') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/residential-plots') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Residential Plots
                        </span>
                    </a>
                    <a href="<?= url('/admin/commercial-property') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/commercial-property') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Commercial Property
                        </span>
                    </a>
                    <a href="<?= url('/admin/luxury-villas') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/luxury-villas') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Villas in Vrindavan
                        </span>
                    </a>
                    <a href="<?= url('/admin/plot-rate-mathura') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/plot-rate-mathura') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Mathura Plot Rate
                        </span>
                    </a>
                    <a href="<?= url('/admin/plot-rate-vrindavan') ?>" class="flex items-center justify-between px-3 py-1.5 rounded-md text-xs text-slate-400 hover:text-amber-300 hover:bg-slate-800/40 transition-colors ml-7 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/plot-rate-vrindavan') ? 'text-amber-300 bg-slate-800/40' : '' ?>">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            Vrindavan Plot Rate
                        </span>
                    </a>
                </div>

                <a href="<?= url('/admin/blogs') ?>" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/60 transition-colors mt-1 <?= str_contains($_SERVER['REQUEST_URI'], '/admin/blogs') ? 'bg-slate-800 text-white' : '' ?>">
                    <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Blog Articles
                </a>

                <div class="pt-4 mt-6 border-t border-slate-800">
                    <a href="<?= url('/') ?>" target="_blank" class="flex items-center justify-center gap-2 px-3.5 py-2 rounded-lg text-slate-400 hover:text-gold-400 hover:bg-slate-800/40 text-xs uppercase tracking-wider transition-colors w-full border border-slate-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        View Live Site
                    </a>
                </div>
        </nav>

        <!-- User profile footer -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-950/40 shrink-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-gold-400/20 border border-gold-400/40 flex items-center justify-center text-gold-400 font-bold text-sm">
                        <?= strtoupper(substr($_SESSION['admin_username'] ?? 'A', 0, 1)) ?>
                    </div>
                    <div class="text-xs">
                        <div class="font-semibold text-slate-200"><?= e($_SESSION['admin_username'] ?? 'Administrator') ?></div>
                        <div class="text-slate-500">Super Admin</div>
                    </div>
                </div>
                <a href="<?= url('/admin/logout') ?>" title="Sign Out" class="text-slate-400 hover:text-red-400 p-1.5 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top Navbar -->
        <header class="h-16 bg-slate-900/60 border-b border-slate-800 flex items-center justify-between px-8 backdrop-blur-md">
            <h1 class="text-lg font-semibold text-white font-heading tracking-wide">
                <?= isset($seo_title) ? e($seo_title) : 'Admin Console' ?>
            </h1>

            <div class="flex items-center gap-4">
                <a href="<?= url('/admin/projects/create') ?>" class="inline-flex items-center gap-2 bg-gold-400 hover:bg-gold-500 text-slate-950 text-xs font-semibold uppercase tracking-wider py-2 px-3.5 rounded-md transition-all shadow-md shadow-gold-400/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    New Project
                </a>
                <a href="<?= url('/admin/pages/create') ?>" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold uppercase tracking-wider py-2 px-3.5 rounded-md transition-all border border-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    New Page
                </a>
            </div>
        </header>

        <!-- Flash alerts -->
        <?php if (has_flash('success')): ?>
            <div class="mx-8 mt-6 p-4 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-300 text-sm flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span><?= e(flash('success')) ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (has_flash('error')): ?>
            <div class="mx-8 mt-6 p-4 rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-300 text-sm flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span><?= e(flash('error')) ?></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-8">
            <?= $content ?>
        </main>
    </div>

</body>
</html>
