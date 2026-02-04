<?php
$lines = file('storage/logs/laravel.log');
$lines = array_slice($lines, -2000);
$output = "";
foreach ($lines as $line) {
    if (strpos($line, 'local.INFO') !== false) {
        $output .= trim($line) . "\n";
    }
}
file_put_contents('debug_output.txt', $output);
