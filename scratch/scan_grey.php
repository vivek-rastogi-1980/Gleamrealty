<?php
$c = file_get_contents('c:/xampp/htdocs/Gleamrealty/views/public/home.php');
$lines = explode("\n", $c);
foreach ($lines as $i => $line) {
    if (preg_match('/text-(?:slate|gray|stone|zinc)-[4-8]00/', $line)) {
        echo ($i + 1) . ': ' . trim($line) . "\n";
    }
}
