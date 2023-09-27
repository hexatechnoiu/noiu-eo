<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::factory(10)->create();

    DB::table('users')->insert([
      'avatar' => 'team/admin.jpg',
      'name' => 'HEXATECH',
      'email' => 'admin@gmail.com',
      'phone' => '081234567891',
      'role' => 'Admin',
      'address' => '59, Jl. Arif Rahman Hakim, Kotakaler, Sumedang Utara, Sumedang Regency, West Java 45355',
      'email_verified_at' => now(),
      'password' => Hash::make('admin'),
      'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
      'avatar' => 'team/admin.jpg',
      'name' => 'Pelanggan',
      'email' => 'user@gmail.com',
      'phone' => '081234567892',
      'role' => 'User',
      'address' => 'Sumedang, Situ, Sumedang Utara, Sumedang Regency, West Java 45621',
      'email_verified_at' => now(),
      'password' => Hash::make('user'),
      'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
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

    DB::table('users')->insert([
      'avatar' => 'team/hafiz.jpg',
      'name' => 'Hafiz Haekal',
      'email' => 'hafizhaekal03@gmail.com',
      'phone' => '087894818815',
      'role' => 'Admin',
      'address' => 'Jl. Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371',
      'email_verified_at' => now(),
      'password' => Hash::make('admin'),
      'remember_token' => Str::random(10),
    ]);
  }
}
