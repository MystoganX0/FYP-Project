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
        Schema::table('attempts', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->after('attempt_id')->nullable();
        });

        // Migrate data
        $attempts = \Illuminate\Support\Facades\DB::table('attempts')->get();
        foreach ($attempts as $attempt) {
            $application = \Illuminate\Support\Facades\DB::table('application')->where('app_id', $attempt->app_id)->first();
            if ($application) {
                \Illuminate\Support\Facades\DB::table('attempts')
                    ->where('attempt_id', $attempt->attempt_id)
                    ->update(['student_id' => $application->student_id]);
            }
        }

        Schema::table('attempts', function (Blueprint $table) {
            $table->dropForeign(['app_id']);
            $table->dropColumn('app_id');
            // Make student_id not nullable after migration
            $table->unsignedBigInteger('student_id')->nullable(false)->change();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attempts', function (Blueprint $table) {
            $table->unsignedBigInteger('app_id')->after('student_id')->nullable();
        });

        // Migrate data back (Approximate, might lose data if student has multiple apps but logic should hold for now)
        $attempts = \Illuminate\Support\Facades\DB::table('attempts')->get();
        foreach ($attempts as $attempt) {
            $application = \Illuminate\Support\Facades\DB::table('application')
                ->where('student_id', $attempt->student_id)
                ->latest() // Best guess
                ->first();

            if ($application) {
                \Illuminate\Support\Facades\DB::table('attempts')
                    ->where('attempt_id', $attempt->attempt_id)
                    ->update(['app_id' => $application->app_id]);
            }
        }

        Schema::table('attempts', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
            $table->foreign('app_id')->references('app_id')->on('application')->onDelete('cascade');
        });
    }
};
