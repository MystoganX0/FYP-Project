<?php

use Illuminate\Support\Facades\Schema;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$columns = ['ic', 'full_name', 'phone', 'address', 'ic_file'];
$table = 'students';

foreach ($columns as $column) {
    if (Schema::hasColumn($table, $column)) {
        echo "Column '$column' exists in '$table'.\n";
    } else {
        echo "Column '$column' does NOT exist in '$table'.\n";
    }
}
