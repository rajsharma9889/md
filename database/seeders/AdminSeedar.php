<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeedar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $admin = new Admin;
     $admin->mobile_number= 1234;
     $admin->password= bcrypt('admin');
     $admin->save();
    }
}
