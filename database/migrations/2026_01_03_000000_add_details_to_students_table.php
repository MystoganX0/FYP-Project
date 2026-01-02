<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'ic')) {
                $table->string('ic')->nullable();
            }
            if (!Schema::hasColumn('students', 'full_name')) {
                $table->string('full_name')->nullable();
            }
            if (!Schema::hasColumn('students', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('students', 'address')) {
                $table->text('address')->nullable();
            }
            if (!Schema::hasColumn('students', 'ic_file')) {
                $table->string('ic_file')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('students', 'ic'))
                $columnsToDrop[] = 'ic';
            if (Schema::hasColumn('students', 'full_name'))
                $columnsToDrop[] = 'full_name';
            if (Schema::hasColumn('students', 'phone'))
                $columnsToDrop[] = 'phone';
            if (Schema::hasColumn('students', 'address'))
                $columnsToDrop[] = 'address';
            if (Schema::hasColumn('students', 'ic_file'))
                $columnsToDrop[] = 'ic_file';

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
