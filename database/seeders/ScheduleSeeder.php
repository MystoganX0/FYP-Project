<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            ['schedule_id' => 1, 'phase_id' => 1, 'date' => '2026-01-03', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 14, 'admin_id' => 1, 'created_at' => '2025-12-23 13:26:18', 'updated_at' => '2026-02-04 06:03:01'],
            ['schedule_id' => 2, 'phase_id' => 2, 'date' => '2026-01-09', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '16:00:00', 'duration' => '2', 'slot' => 5, 'admin_id' => 1, 'created_at' => '2025-12-23 13:27:17', 'updated_at' => '2026-02-04 06:34:06'],
            ['schedule_id' => 3, 'phase_id' => 3, 'date' => '2026-03-04', 'day' => 'Wednesday', 'start_time' => '09:00:00', 'time_out' => '14:00:00', 'duration' => '2', 'slot' => 20, 'admin_id' => 1, 'created_at' => '2025-12-23 13:29:26', 'updated_at' => '2026-02-04 06:56:42'],
            ['schedule_id' => 4, 'phase_id' => 1, 'date' => '2026-01-10', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 22, 'admin_id' => 1, 'created_at' => '2025-12-23 13:55:37', 'updated_at' => '2026-02-04 06:21:30'],
            ['schedule_id' => 5, 'phase_id' => 2, 'date' => '2026-01-05', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '16:00:00', 'duration' => '2', 'slot' => 5, 'admin_id' => 1, 'created_at' => '2025-12-23 14:00:00', 'updated_at' => '2026-02-04 06:34:06'],
            ['schedule_id' => 6, 'phase_id' => 2, 'date' => '2026-01-10', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 20, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-02-04 09:04:48'],
            ['schedule_id' => 7, 'phase_id' => 2, 'date' => '2026-01-11', 'day' => 'Sunday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 5, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-02-04 06:33:39'],
            ['schedule_id' => 8, 'phase_id' => 2, 'date' => '2026-01-12', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 6, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-16 21:19:00'],
            ['schedule_id' => 9, 'phase_id' => 2, 'date' => '2026-01-15', 'day' => 'Thursday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 13, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-02 11:50:19'],
            ['schedule_id' => 10, 'phase_id' => 2, 'date' => '2026-01-16', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 13, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-04 09:08:27'],
            ['schedule_id' => 11, 'phase_id' => 2, 'date' => '2026-01-17', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 10, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-11 09:53:17'],
            ['schedule_id' => 12, 'phase_id' => 2, 'date' => '2026-02-13', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 10, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-10 22:04:51'],
            ['schedule_id' => 13, 'phase_id' => 2, 'date' => '2026-02-05', 'day' => 'Thursday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 12, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-02-04 06:34:06'],
            ['schedule_id' => 14, 'phase_id' => 2, 'date' => '2026-02-02', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 12, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-02-04 06:34:06'],
            ['schedule_id' => 15, 'phase_id' => 2, 'date' => '2026-02-01', 'day' => 'Sunday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 11, 'admin_id' => 1, 'created_at' => '2025-12-24 10:39:02', 'updated_at' => '2026-01-23 02:29:49'],
            ['schedule_id' => 16, 'phase_id' => 3, 'date' => '2026-03-18', 'day' => 'Wednesday', 'start_time' => '09:00:00', 'time_out' => '14:00:00', 'duration' => '2', 'slot' => 28, 'admin_id' => 1, 'created_at' => '2025-12-25 05:06:50', 'updated_at' => '2026-02-04 06:41:06'],
            ['schedule_id' => 22, 'phase_id' => 1, 'date' => '2026-02-14', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:14:30', 'updated_at' => '2026-02-09 11:15:07'],
            ['schedule_id' => 23, 'phase_id' => 1, 'date' => '2026-02-21', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 29, 'admin_id' => 1, 'created_at' => '2026-02-09 11:15:58', 'updated_at' => '2026-02-09 11:15:58'],
            ['schedule_id' => 24, 'phase_id' => 1, 'date' => '2026-02-28', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:16:20', 'updated_at' => '2026-02-09 11:16:20'],
            ['schedule_id' => 25, 'phase_id' => 1, 'date' => '2026-03-07', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:16:40', 'updated_at' => '2026-02-09 11:16:40'],
            ['schedule_id' => 26, 'phase_id' => 1, 'date' => '2026-03-14', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:18:23', 'updated_at' => '2026-02-09 11:18:23'],
            ['schedule_id' => 27, 'phase_id' => 1, 'date' => '2026-03-21', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:18:34', 'updated_at' => '2026-02-09 11:18:34'],
            ['schedule_id' => 28, 'phase_id' => 1, 'date' => '2026-03-28', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 11:18:56', 'updated_at' => '2026-02-09 11:18:56'],
            ['schedule_id' => 29, 'phase_id' => 2, 'date' => '2026-02-16', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:11:53', 'updated_at' => '2026-02-09 12:11:53'],
            ['schedule_id' => 30, 'phase_id' => 2, 'date' => '2026-02-17', 'day' => 'Tuesday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 14, 'admin_id' => 1, 'created_at' => '2026-02-09 12:12:10', 'updated_at' => '2026-02-09 12:12:10'],
            ['schedule_id' => 31, 'phase_id' => 2, 'date' => '2026-02-19', 'day' => 'Thursday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:12:19', 'updated_at' => '2026-02-09 12:12:19'],
            ['schedule_id' => 32, 'phase_id' => 2, 'date' => '2026-02-20', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 14, 'admin_id' => 1, 'created_at' => '2026-02-09 12:12:47', 'updated_at' => '2026-02-09 12:12:47'],
            ['schedule_id' => 33, 'phase_id' => 2, 'date' => '2026-02-21', 'day' => 'Saturday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:13:03', 'updated_at' => '2026-02-09 12:13:03'],
            ['schedule_id' => 34, 'phase_id' => 2, 'date' => '2026-02-22', 'day' => 'Sunday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:13:25', 'updated_at' => '2026-02-09 12:13:25'],
            ['schedule_id' => 35, 'phase_id' => 2, 'date' => '2026-02-23', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 14, 'admin_id' => 1, 'created_at' => '2026-02-09 12:13:37', 'updated_at' => '2026-02-09 12:13:37'],
            ['schedule_id' => 36, 'phase_id' => 2, 'date' => '2026-02-24', 'day' => 'Tuesday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:13:44', 'updated_at' => '2026-02-09 12:13:44'],
            ['schedule_id' => 37, 'phase_id' => 2, 'date' => '2026-02-26', 'day' => 'Thursday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:13:58', 'updated_at' => '2026-02-09 12:13:58'],
            ['schedule_id' => 38, 'phase_id' => 2, 'date' => '2026-02-27', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:14:05', 'updated_at' => '2026-02-09 12:14:05'],
            ['schedule_id' => 39, 'phase_id' => 2, 'date' => '2026-03-01', 'day' => 'Sunday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 14, 'admin_id' => 1, 'created_at' => '2026-02-09 12:14:18', 'updated_at' => '2026-02-09 12:14:18'],
            ['schedule_id' => 40, 'phase_id' => 2, 'date' => '2026-03-02', 'day' => 'Monday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:14:31', 'updated_at' => '2026-02-09 12:14:31'],
            ['schedule_id' => 41, 'phase_id' => 2, 'date' => '2026-03-03', 'day' => 'Tuesday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:14:42', 'updated_at' => '2026-02-09 12:14:42'],
            ['schedule_id' => 42, 'phase_id' => 2, 'date' => '2026-03-05', 'day' => 'Thursday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:14:56', 'updated_at' => '2026-02-09 12:15:19'],
            ['schedule_id' => 43, 'phase_id' => 2, 'date' => '2026-02-06', 'day' => 'Friday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 15, 'admin_id' => 1, 'created_at' => '2026-02-09 12:15:06', 'updated_at' => '2026-02-09 12:15:06'],
            ['schedule_id' => 45, 'phase_id' => 3, 'date' => '2026-03-11', 'day' => 'Wednesday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 12:40:25', 'updated_at' => '2026-02-09 12:40:25'],
            ['schedule_id' => 46, 'phase_id' => 3, 'date' => '2026-03-25', 'day' => 'Wednesday', 'start_time' => '09:00:00', 'time_out' => '11:00:00', 'duration' => '2', 'slot' => 30, 'admin_id' => 1, 'created_at' => '2026-02-09 12:41:08', 'updated_at' => '2026-02-09 12:41:08'],
        ];

        \App\Models\Schedule::upsert($schedules, ['schedule_id'], ['phase_id', 'date', 'day', 'start_time', 'time_out', 'duration', 'slot', 'admin_id', 'created_at', 'updated_at']);
    }
}
