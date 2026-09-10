<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In — Gleamrealty Executive Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="h-full flex items-center justify-center p-6 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-black text-slate-100">

    <div class="w-full max-w-md">
        <!-- Brand Logo Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 font-heading text-2xl font-bold tracking-widest text-white uppercase mb-2">
                <span class="w-3 h-3 bg-amber-400 rotate-45 inline-block shadow-lg shadow-amber-400/30"></span>
                <span>GLEAM<span class="text-amber-400">REALTY</span></span>
            </div>
            <p class="text-xs uppercase tracking-widest text-slate-500 font-medium">Executive Admin Portal</p>
        </div>

        <!-- Card -->
        <div class="bg-slate-900/80 border border-slate-800/90 rounded-2xl p-8 shadow-2xl backdrop-blur-xl relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>

            <h2 class="text-xl font-bold text-white font-heading mb-1.5">Sign In</h2>
            <p class="text-xs text-slate-400 mb-6">Enter your authorized credentials to manage portfolio and leads.</p>

            <?php if (has_flash('error')): ?>
                <div class="mb-5 p-3.5 rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span><?= e(flash('error')) ?></span>
                </div>
            <?php endif; ?>

            <?php if (has_flash('success')): ?>
                <div class="mb-5 p-3.5 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span><?= e(flash('success')) ?></span>
                </div>
            <?php endif; ?>

            <form action="<?= url('/admin/login') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Email or Username</label>
                    <input type="text" name="login" required placeholder="admin@gleamrealty.com" value="admin@gleamrealty.com"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" value="Admin@12345"
                        class="w-full bg-slate-950/70 border border-slate-700/80 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-slate-950 font-heading font-bold uppercase tracking-wider text-xs py-3 rounded-lg transition-all shadow-lg shadow-amber-400/10 hover:shadow-amber-400/20 active:scale-[0.99]">
                        Authenticate &amp; Enter
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-5 border-t border-slate-800/80 text-center">
                <span class="text-xs text-slate-500">Default: <code class="text-slate-400 bg-slate-800/60 px-1.5 py-0.5 rounded">admin@gleamrealty.com</code> / <code class="text-slate-400 bg-slate-800/60 px-1.5 py-0.5 rounded">Admin@12345</code></span>
            </div>
        </div>

        <div class="text-center mt-6 text-xs text-slate-600">
            &copy; <?= date('Y') ?> Gleamrealty &bull; <a href="<?= url('/') ?>" class="text-slate-400 hover:text-amber-400 transition-colors">Return to Site</a>
        </div>
    </div>

</body>
</html>
