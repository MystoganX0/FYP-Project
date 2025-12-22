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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id')->references('app_id')->on('application')->onDelete('cascade');
            $table->enum('payment_type', ['full', 'installment']);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'partial', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });

        Schema::create('payment_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('payment_id')->on('payments')->onDelete('cascade');
            $table->string('stage'); // 'Full Payment', '1', '2', '3'
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
        Schema::dropIfExists('payments');
    }
};
