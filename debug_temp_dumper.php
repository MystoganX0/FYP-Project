<?php
if (!file_exists('temp.log')) {
    echo "Temp log not found.\n";
    exit(1);
}
$lines = file('temp.log');
$lines = array_slice($lines, -2000);
foreach ($lines as $line) {
    if (strpos($line, 'local.INFO') !== false || strpos($line, 'Booking Request Started') !== false) {
        echo trim($line) . "\n";
    }
}
