<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Booking;
use App\Models\Inbox;
use App\Models\Package;
use App\Models\Package_category;
use App\Models\Package_type;
use App\Models\Benefits;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Package_category::factory(2)->create();
        Package_type::factory(5)->create();
        Package::factory(25)->create();
        Inbox::factory(10)->create();
        Booking::factory(10)->create();
        Benefits::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
