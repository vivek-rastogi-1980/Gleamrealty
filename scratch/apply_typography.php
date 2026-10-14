<?php
$file = 'c:/xampp/htdocs/Gleamrealty/views/public/home.php';
$content = file_get_contents($file);

// 1. Add the style block at the top if not already present
$styleBlock = <<<'CSS'
<style>
/* ==========================================================
   HOME PAGE TYPOGRAPHY & COLOR ENFORCEMENT
   - Minimum font size: 1.0 rem (16px)
   - Line-height: 1.6 rem (25.6px)
   - Remove opacity from .text-slate-600
   - Replace all grey color font with black color
   ========================================================== */

#homepage-root,
#homepage-root p,
#homepage-root div,
#homepage-root span,
#homepage-root a,
#homepage-root li,
#homepage-root button,
#homepage-root input,
#homepage-root select,
#homepage-root textarea,
#homepage-root label {
    line-height: 1.6rem;
}

#homepage-root p {
    font-size: max(1.0rem, 1em) !important;
    line-height: 1.6rem !important;
}

#homepage-root .text-xs,
#homepage-root .text-sm,
#homepage-root .text-\[9px\],
#homepage-root .text-\[9\.5px\],
#homepage-root .text-\[10px\],
#homepage-root .text-\[11px\],
#homepage-root .text-\[12px\],
#homepage-root .text-\[13px\],
#homepage-root .text-\[14px\],
#homepage-root .text-\[15px\] {
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
}

/* Remove opacity from .text-slate-600 */
.text-slate-600,
#homepage-root .text-slate-600 {
    --tw-text-opacity: 1 !important;
    opacity: 1 !important;
}

/* Replace all grey color font with black color */
#homepage-root .text-slate-400,
#homepage-root .text-slate-500,
#homepage-root .text-slate-600,
#homepage-root .text-slate-700,
#homepage-root .text-slate-800,
#homepage-root .text-gray-400,
#homepage-root .text-gray-500,
#homepage-root .text-gray-600,
#homepage-root .text-gray-700,
#homepage-root .text-stone-400,
#homepage-root .text-stone-500,
#homepage-root .text-stone-600,
#homepage-root .text-zinc-400,
#homepage-root .text-zinc-500,
#homepage-root .text-zinc-600 {
    color: #000000 !important;
    --tw-text-opacity: 1 !important;
    opacity: 1 !important;
}

#homepage-root input,
#homepage-root select,
#homepage-root textarea {
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
    color: #000000 !important;
}

#homepage-root input::placeholder,
#homepage-root textarea::placeholder {
    color: #000000 !important;
    opacity: 0.65 !important;
    font-size: 1.0rem !important;
    line-height: 1.6rem !important;
}
</style>

<div id="homepage-root" class="w-full text-[1.0rem] leading-[1.6rem] text-black">
CSS;

echo "Script ready.\n";
