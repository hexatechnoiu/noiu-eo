<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Package_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // PACKAGE TYPE
              DB::table('package_types')->insert([
                'name' => 'Outbound',
                'status' => 'active',
                'package_category_id' => 1
            ]);
            DB::table('package_types')->insert([
                'name' => 'Offroad',
                'status' => 'active',
                'package_category_id' => 1
            ]);
            DB::table('package_types')->insert([
                'name' => 'Rafting',
                'status' => 'active',
                'package_category_id' => 1
            ]);

            DB::table('package_types')->insert([
                'name' => 'Others',
                'status' => 'active',
                'package_category_id' => 1
            ]);

            DB::table('package_types')->insert([
                'name' => 'Meeting',
                'status' => 'active',
                'package_category_id' => 2
            ]);
    }
}
