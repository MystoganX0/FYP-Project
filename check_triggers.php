<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$triggers = DB::select("SHOW TRIGGERS WHERE `Table` = 'schedules'");

echo "Triggers on 'schedules' table:\n";
echo "================================\n";

if (empty($triggers)) {
    echo "No triggers found.\n";
} else {
    foreach ($triggers as $trigger) {
        echo "Trigger: " . $trigger->Trigger . "\n";
        echo "Event: " . $trigger->Event . "\n";
        echo "Timing: " . $trigger->Timing . "\n";
        echo "Statement: " . $trigger->Statement . "\n";
        echo "--------------------------------\n";
    }
}
