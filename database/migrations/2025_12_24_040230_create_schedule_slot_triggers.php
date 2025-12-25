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
        Schema::create('schedule_slot_triggers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER booking_insert_trigger AFTER INSERT ON bookings
            FOR EACH ROW
            BEGIN
                UPDATE schedules SET slot = slot - 1 WHERE schedule_id = NEW.schedule_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER booking_delete_trigger AFTER DELETE ON bookings
            FOR EACH ROW
            BEGIN
                UPDATE schedules SET slot = slot + 1 WHERE schedule_id = OLD.schedule_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS booking_insert_trigger');
        DB::unprepared('DROP TRIGGER IF EXISTS booking_delete_trigger');

        Schema::dropIfExists('schedule_slot_triggers');
    }
};
