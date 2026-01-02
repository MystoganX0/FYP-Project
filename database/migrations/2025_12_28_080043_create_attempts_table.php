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
        Schema::create('attempts', function (Blueprint $table) {
            $table->id('attempt_id');
            $table->unsignedBigInteger('app_id');
            $table->unsignedBigInteger('phase_id');
            $table->integer('attempt_no')->default(1);
            $table->string('result')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('app_id')->references('app_id')->on('application')->onDelete('cascade');
            $table->foreign('phase_id')->references('phase_id')->on('phase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempts');
    }
};
