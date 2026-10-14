<?php
$file = 'c:/xampp/htdocs/Gleamrealty/views/public/home.php';
$content = file_get_contents($file);

// Backup
file_put_contents($file . '.bak', $content);

// 1. Replace grey text colors with text-black
// text-slate-700, text-slate-600, text-slate-500, text-slate-400, text-slate-800
$content = preg_replace('/\btext-slate-[4-8]00\b/', 'text-black', $content);
$content = str_replace('placeholder:text-slate-400', 'placeholder:text-black', $content);

// 2. Update font sizes smaller than 1.0rem (16px) to 1.0rem and line-height 1.6rem
// 'text-xs sm:text-sm' -> 'text-[1.0rem] leading-[1.6rem]'
$content = str_replace('text-xs sm:text-sm', 'text-[1.0rem] leading-[1.6rem]', $content);
$content = str_replace('text-xs sm:text-[13px]', 'text-[1.0rem] leading-[1.6rem]', $content);
$content = str_replace('text-sm sm:text-base', 'text-[1.0rem] sm:text-base leading-[1.6rem]', $content);
$content = str_replace('text-[11px] sm:text-xs', 'text-[1.0rem] leading-[1.6rem]', $content);

// Specific micro font sizes
$content = preg_replace('/\btext-\[(?:9|9\.5|10|11|12|13|14|15)px\]\b/', 'text-[1.0rem] leading-[1.6rem]', $content);
$content = preg_replace('/\btext-xs\b/', 'text-[1.0rem] leading-[1.6rem]', $content);
$content = preg_replace('/\btext-sm\b/', 'text-[1.0rem] leading-[1.6rem]', $content);

// Clean up duplicate leading-[1.6rem] if any
$content = preg_replace('/(leading-\[1\.6rem\]\s*)+/', 'leading-[1.6rem] ', $content);

// 3. Add the style block after PHP header tags
$styleBlock = <<<'STYLE'
<style>
/* ==========================================================
   HOME PAGE TYPOGRAPHY & CONTRAST (PER USER REQUEST)
   - Minimum font size: 1.0 rem (16px)
   - Line-height: 1.6 rem (25.6px)
   - Remove opacity from .text-slate-600
   - Replace all grey color font with solid black (#000000)
   ========================================================== */

#homepage-root,
#homepage-root p,
#homepage-root li,
#homepage-root a,
#homepage-root button,
#homepage-root input,
#homepage-root select,
#homepage-root textarea,
#homepage-root label,
#homepage-root span {
    line-height: 1.6rem;
}

#homepage-root p {
    font-size: max(1.0rem, 1em) !important;
    line-height: 1.6rem !important;
    color: #000000 !important;
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
STYLE;

// Insert after line 18 (after closing ?>)
$pos = strpos($content, '?>');
if ($pos !== false) {
    $before = substr($content, 0, $pos + 2);
    $after = substr($content, $pos + 2);
    $content = $before . "\n\n" . $styleBlock . "\n" . $after . "\n</div><!-- /#homepage-root -->\n";
}

file_put_contents($file, $content);
echo "Successfully updated " . $file . "\n";
