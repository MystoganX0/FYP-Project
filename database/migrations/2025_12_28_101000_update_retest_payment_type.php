<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the ENUM to include 'retest computer' and remove 'retest' if needed, 
        // but for safety we can just redefine the whole list.
        // Assuming we want to REPLACE 'retest' with 'retest computer'.
        // Note: Existing 'retest' values might need to be updated first if there were any, 
        // but since this is dev, we'll just alter the column definition.
        DB::statement("ALTER TABLE payments MODIFY COLUMN payment_type ENUM('full', 'installment', 'retest', 'retest computer')");

        // Optional: Update existing 'retest' records to 'retest computer'
        DB::table('payments')->where('payment_type', 'retest')->update(['payment_type' => 'retest computer']);

        // Now restrict the ENUM to remove 'retest' if strictness is desired, 
        // or just keep it active. The user asked to CHANGE value, so usually implies replacement.
        DB::statement("ALTER TABLE payments MODIFY COLUMN payment_type ENUM('full', 'installment', 'retest computer')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to allowing 'retest'
        DB::statement("ALTER TABLE payments MODIFY COLUMN payment_type ENUM('full', 'installment', 'retest')");
    }
};
