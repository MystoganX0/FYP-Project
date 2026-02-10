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
                'package_id' => 1,
                'package_type' => 'Preferred',
                'package_price' => 1371.15,
                'package_desc' => '<li>Theory E-Book</li><li>Schedule: Flexible Except Wednesday</li><li>Priority Driving Practical Turn</li><li>Computer Re-test: Unlimited</li><li>JPJ Re-test: Unlimited</li><li>LDL - License: Free</li><li>PDL - License: Free</li><li>Priority customer support</li><li>Refund: No Refundable</li>',
                'created_at' => '2025-12-22 05:18:46',
                'updated_at' => '2026-02-07 08:59:02',
            ],
            [
                'package_id' => 2,
                'package_type' => 'Premium',
                'package_price' => 863.90,
                'package_desc' => '<li>Theory E-Book</li><li>Schedule: Flexible Except Wednesday</li><li>Dedicated Driving Practical Turn</li><li>Computer Re-test: 3x Free</li><li>JPJ Re-test: 3x Free</li><li>LDL - License: Free</li><li>PDL - License: Chargeable (RM60)</li><li>Dedicated customer support</li><li>Refund: No Refundable</li>',
                'created_at' => '2025-12-22 05:18:46',
                'updated_at' => '2026-02-07 09:09:16',
            ],
            [
                'package_id' => 3,
                'package_type' => 'Basic',
                'package_price' => 0.00,
                'package_desc' => '<li>Theory E-Book</li><li>Schedule: Flexible Except Wednesday</li><li>Standard Driving Practical Turn</li><li>Computer Re-test: Chargeable (RM50)</li><li>JPJ Re-test: Chargeable (RM238.95)</li><li>LDL - License: Chargeable (RM30)</li><li>PDL - License: Chargeable (RM60)</li><li>Standard customer support</li><li>Refund: No Refundable</li>',
                'created_at' => '2025-12-22 05:18:46',
                'updated_at' => '2026-02-07 09:10:06',
            ],
        ];

        \App\Models\Package::insert($packages);
    }
}
