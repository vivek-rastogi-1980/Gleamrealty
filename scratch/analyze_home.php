<?php
$c = file_get_contents('c:/xampp/htdocs/Gleamrealty/views/public/home.php');
preg_match_all('/text-(?:slate|gray|stone|zinc|neutral)-\d+/', $c, $m);
print_r(array_count_values($m[0]));

preg_match_all('/text-(?:xs|sm|\[\d+px\]|\[\d+\.?\d*rem\])/', $c, $m2);
print_r(array_count_values($m2[0]));
