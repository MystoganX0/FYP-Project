<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if admin with ID 1 exists, if so, update it, otherwise create
        $admin = Admin::find(1);

        if ($admin) {
            $admin->update([
                'admin_email' => 'khai@gmail.com',
                'admin_pass' => Hash::make('khai1234'),
            ]);
        } else {
            Admin::create([
                'admin_id' => 1,
                'admin_email' => 'khai@gmail.com',
                'admin_pass' => Hash::make('khai1234'),
            ]);
        }
    }
}
