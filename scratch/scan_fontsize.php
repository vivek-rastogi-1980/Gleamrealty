<?php
$c = file_get_contents('c:/xampp/htdocs/Gleamrealty/views/public/home.php');
$lines = explode("\n", $c);
foreach ($lines as $i => $line) {
    if (preg_match('/text-(?:xs|sm|\[(?:[0-9]|1[0-5])px\])/', $line)) {
        echo ($i + 1) . ': ' . trim($line) . "\n";
    }
}
