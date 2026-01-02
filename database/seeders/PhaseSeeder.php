<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phase')->insert([
            ['phase_name' => 'Computer Test', 'created_at' => now(), 'updated_at' => now()],
            ['phase_name' => 'Practical Slot', 'created_at' => now(), 'updated_at' => now()],
            ['phase_name' => 'JPJ Test', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
