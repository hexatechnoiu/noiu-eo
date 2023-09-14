<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Booking;
use App\Models\Inbox;
use App\Models\Package;
use App\Models\Package_category;
use App\Models\Package_type;
use App\Models\Benefits;
use App\Models\OurTeam;
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
        
        Package_category::create([
        'name' => 'Outbound',
        'status' => 'active'
        ]);
        Package_category::create([
            'name' => 'MICE',
            'status' => 'active'
            ]);


            // PACKAGE TYPE
        Package_type::create([
            'name' => 'Offroad',
            'status' => 'active',
            'package_category_id' => 1
        ]);
        Package_type::create([
            'name' => 'Outbound',
            'status' => 'active',
            'package_category_id' => 1
        ]);
        
        Package_type::create([
            'name' => 'Others',
            'status' => 'active',
            'package_category_id' => 1
        ]);
        
        Package_type::create([
            'name' => 'Rafting',
            'status' => 'active',
            'package_category_id' => 1
        ]);
        Package_type::create([
            'name' => 'Meeting',
            'status' => 'active',
            'package_category_id' => 2
        ]);

        // Package_type::factory(5)->create();
        Package::factory(25)->create();
        Inbox::factory(10)->create();
        Booking::factory(10)->create();
        Benefits::factory(10)->create();

        // Data Our Team
        OurTeam::create([
            'name' => "Hafiz Haekal",
            'role' => "Fullstack developer",
            'image' => "img/team/hafiz.jpg",
            'whatsapp' => "https://wa.me/087894818815/",
            'instagram' => "https://www.instagram.com/hafizhaekall/",
            'github' => "https://www.github.com/hafizhaekall/",
            'linkedin' => "https://www.linkedin.com/in/hafizhaekal/"
        ]);

        OurTeam::create([
            'name' => "Muhammad Azfa",
            'role' => "Back End developer",
            'image' => "img/team/azfa.jpg",
            'whatsapp' => "https://wa.me/085156105763/",
            'instagram' => "https://www.instagram.com/azfasa15/",
            'github' => "https://www.github.com/rodeobazaar124/",
            'linkedin' => "https://www.linkedin.com/in/azfasalman/"
        ]);

        OurTeam::create([
            'name' => "M Ghazy",
            'role' => "Front End developer",
            'image' => "img/team/ghazy.jpg",
            'whatsapp' => "https://wa.me/085158266733",
            'instagram' => "https://instagram.com/en0kich4n",
            'github' => "https://github.com/en0kich4n",
            'linkedin' => "https://www.linkedin.com/in/xylviet"
        ]);

        OurTeam::create([
            'name' => "Ristin Iman A",
            'role' => "Copywriter",
            'image' => "img/team/ristin.jpg",
            'whatsapp' => "https://wa.me/qr/AC44YKCYABNLM1",
            'instagram' => "https://www.instagram.com/ristinnandnnii_/",
            'github' => "https://github.com/RistinAndini78",
            'linkedin' => "https://www.linkedin.com/in/ristin-iman-andini-896a44287"
        ]);

        OurTeam::create([
            'name' => "Della Friska A",
            'role' => "UI / UX Designer ",
            'image' => "img/team/della.jpg",
            'whatsapp' => "https://wa.me/085927778314",
            'instagram' => "https://instagram.com/dllaa.te?igshid=MzNlNGNkZWQ4Mg==",
            'github' => "https://github.com/dellafan",
            'linkedin' => "https://www.linkedin.com/in/della-friska-ardiana-1bb587290/"
        ]);

        OurTeam::create([
            'name' => "Siti Nuraini M",
            'role' => "UI / UX Designer ",
            'image' => "img/team/aini.jpg",
            'whatsapp' => "https://wa.me/081902776222",
            'instagram' => "https://instagram.com/stnrainimrym_",
            'github' => "https://github.com/SitiNurainiMaryam6",
            'linkedin' => "https://www.linkedin.com/in/siti-nuraini-maryam-81225a290/"
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
