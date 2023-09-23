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
      BenefitsSeeder::class,
      TeamSeeder::class,
    ]);


    User::factory(10)->create();

    Package_category::create([
      'name' => 'Outbound',
      'status' => 'active'
    ]);
    Package_category::create([
      'name' => 'MICE',
      'status' => 'active'
    ]);


    Package::factory(25)->create();
    Inbox::factory(10)->create();
    Booking::factory(10)->create();





    User::create([
      'avatar' => 'team/azfa.jpg',
      'name' => 'Muhammad azfa salman akbar',
      'email' => 'azfasa15@gmail.com',
      'phone' => '082318063690',
      'role' => 'Admin',
      'address' => 'Jl. Prabu Geusan Ulun No. 28, Linkungan Kaum RT02/RW10, Regol wetan, Sumedang Selatan, Sumedang, Jawa barat, Indonesia, 45311',
      'email_verified_at' => now(),
      'password' => Hash::make('admin'),
      // password
      'remember_token' => Str::random(10),
    ]);
  }
}
