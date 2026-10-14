<?php
$src = 'C:/Users/Lenovo/.gemini/antigravity-ide/brain/f5093a74-a610-4253-b932-2ac6ae4a5f53/.user_uploaded/media_1789644454451.jpg';
$im = imagecreatefromjpeg($src);
$w = imagesx($im); // 682
$h = imagesy($im); // 1024

function cropAndSave($im, $x, $y, $cw, $ch, $destPath) {
    $crop = imagecreatetruecolor($cw, $ch);
    imagecopy($crop, $im, 0, 0, $x, $y, $cw, $ch);
    $dir = dirname($destPath);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    imagejpeg($crop, $destPath, 92);
    echo "Saved: $destPath ({$cw}x{$ch})\n";
}

// 1. Hero background
// In 682x1024, hero area is from y=40 to ~245
cropAndSave($im, 0, 38, 682, 210, 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/hero_mockup_bg.jpg');

// 2. Three hero mini thumbnails at the bottom of hero:
// Mini card 1: x=42, y=202, w=76, h=35
// Mini card 2: x=252, y=202, w=76, h=35
// Mini card 3: x=446, y=202, w=76, h=35
cropAndSave($im, 42, 203, 76, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/mini_thumb_1.jpg');
cropAndSave($im, 252, 203, 76, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/mini_thumb_2.jpg');
cropAndSave($im, 446, 203, 76, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/mini_thumb_3.jpg');

// 3. Featured Video thumbnail (Shri Vrindavan archway):
// x=376, y=289, w=264, h=172
cropAndSave($im, 376, 289, 264, 172, 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/featured_video_vrindavan.jpg');

// 4. Our Highlights (4 cards):
// Total bar x=42 to 640. 4 cards each ~142px wide, y=504 to 577 (h~74)
// Card 1 (Commercial Plots): x=42, y=504, w=142, h=74
// Card 2 (Villas): x=196, y=504, w=142, h=74
// Card 3 (Plots): x=345, y=504, w=142, h=74
// Card 4 (Flats): x=495, y=504, w=142, h=74
cropAndSave($im, 42, 504, 145, 74, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/highlight_commercial.jpg');
cropAndSave($im, 196, 504, 142, 74, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/highlight_villas.jpg');
cropAndSave($im, 345, 504, 142, 74, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/highlight_plots.jpg');
cropAndSave($im, 495, 504, 145, 74, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/highlight_flats.jpg');

// 5. Explore Our Properties (4 cards):
// Row y=642 to 698 is image portion.
// Card 1: x=42, y=642, w=142, h=54
// Card 2: x=196, y=642, w=142, h=54
// Card 3: x=345, y=642, w=142, h=54
// Card 4: x=495, y=642, w=142, h=54
cropAndSave($im, 42, 642, 145, 54, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/prop_thumb_1.jpg');
cropAndSave($im, 196, 642, 142, 54, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/prop_thumb_2.jpg');
cropAndSave($im, 345, 642, 142, 54, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/prop_thumb_3.jpg');
cropAndSave($im, 495, 642, 145, 54, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/prop_thumb_4.jpg');

// 6. Latest News (3 cards):
// Card 1 img: x=46, y=777, w=57, h=33
// Card 2 img: x=214, y=777, w=57, h=33
// Card 3 img: x=382, y=777, w=57, h=33
cropAndSave($im, 46, 777, 57, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/news_thumb_1.jpg');
cropAndSave($im, 214, 777, 57, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/news_thumb_2.jpg');
cropAndSave($im, 382, 777, 57, 33, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/news_thumb_3.jpg');

// 7. Temple Shikhara watermark in Inquiry Form:
// x=36, y=828, w=75, h=72
cropAndSave($im, 36, 828, 75, 72, 'c:/xampp/htdocs/Gleamrealty/public/uploads/projects/temple_watermark.jpg');

// Copy generated AI ultra-high-res images too
copy('C:/Users/Lenovo/.gemini/antigravity-ide/brain/f5093a74-a610-4253-b932-2ac6ae4a5f53/hero_braj_haveli_1789645102424.jpg', 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/hero_braj_haveli_hd.jpg');
copy('C:/Users/Lenovo/.gemini/antigravity-ide/brain/f5093a74-a610-4253-b932-2ac6ae4a5f53/vrindavan_gate_1789645120004.jpg', 'c:/xampp/htdocs/Gleamrealty/public/uploads/hero/vrindavan_gate_hd.jpg');

echo "All images prepared successfully!\n";
