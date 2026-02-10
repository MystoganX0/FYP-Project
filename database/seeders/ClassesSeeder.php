<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'class_id' => 1,
                'class_code' => 'DA',
                'class_image' => 'image/classes/da.png',
                'class_name' => 'Automatic Car',
                'class_price' => 2255.60
            ],
            [
                'class_id' => 2,
                'class_code' => 'D',
                'class_image' => 'image/classes/d.png',
                'class_name' => 'Manual Car',
                'class_price' => 1850.00
            ],
            [
                'class_id' => 3,
                'class_code' => 'B2',
                'class_image' => 'image/classes/b2.png',
                'class_name' => 'Motorcycle 250cc',
                'class_price' => 1240.00
            ],
            [
                'class_id' => 4,
                'class_code' => 'B',
                'class_image' => 'image/classes/b.png',
                'class_name' => 'Motorcycle 500cc',
                'class_price' => 1632.00
            ],
            [
                'class_id' => 5,
                'class_code' => 'B2 + DA',
                'class_image' => 'image/classes/b2da.png',
                'class_name' => 'Motor 250cc + Automatic Car',
                'class_price' => 3340.00
            ],
            [
                'class_id' => 6,
                'class_code' => 'B2 + D',
                'class_image' => 'image/classes/b2d.png',
                'class_name' => 'Motorcycle + Manual Car',
                'class_price' => 3010.00
            ],
        ];

        Classes::upsert($classes, ['class_id'], ['class_code', 'class_image', 'class_name', 'class_price']);
    }
}
