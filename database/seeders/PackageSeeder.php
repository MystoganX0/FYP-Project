<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'package_type' => 'Preferred',
                'package_price' => 1371.15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'Premium',
                'package_price' => 863.90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'Basic',
                'package_price' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \App\Models\Package::insert($packages);
    }
}
