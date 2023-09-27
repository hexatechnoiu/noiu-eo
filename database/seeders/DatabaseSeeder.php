<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Inbox;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Package_category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      Package_typeSeeder::class,
      PackageSeeder::class,
      BenefitsSeeder::class,
      TeamSeeder::class,
      UserSeeder::class,
    ]);

    Package_category::create([
      'name' => 'Outbound',
      'status' => 'active',
    ]);
    Package_category::create([
      'name' => 'MICE',
      'status' => 'active',
    ]);

    Inbox::factory(25)->create();
    Booking::factory(10)->create();
    
  }
}
