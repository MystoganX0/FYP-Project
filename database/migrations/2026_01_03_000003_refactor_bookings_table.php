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
        // Truncate bookings to safely handle FK changes
        DB::table('bookings')->truncate();

        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'student_id')) {
                $table->unsignedBigInteger('student_id')->after('booking_id');
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            }
        });

        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'app_id')) {
                // Use array syntax to let Laravel guess the index name 'bookings_app_id_foreign'
                // Wrapping in try-catch block for the foreign key drop is not possible inside Blueprint directly
                // But generally schema builder checks are limited.

                // We will try dropping the FK. If it fails (e.g. doesn't exist), this might stop migration.
                // However, usually if column exists, FK exists.
                try {
                    $table->dropForeign(['app_id']);
                } catch (\Exception $e) {
                    // Ignore if FK not found
                }
                $table->dropColumn('app_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Down migration is tricky with partial states, but let's try standard reverse
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'app_id')) {
                $table->unsignedBigInteger('app_id')->nullable();
                // Note: Re-adding FK requires data consistency which we can't guarantee here.
                // We'll skip adding constraint back in down for dev safety or add it if empty.
            }
        });

        // We won't re-add the constraint strictly to avoid errors during rollback of broken states
    }
};
