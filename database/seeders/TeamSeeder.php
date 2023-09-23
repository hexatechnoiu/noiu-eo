<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('our_teams')->insert([
        'name' => "Hafiz Haekal",
        'role' => "Fullstack developer",
        'image' => "team/hafiz.jpg",
        'whatsapp' => "https://wa.me/087894818815/",
        'instagram' => "https://www.instagram.com/hafizhaekall/",
        'github' => "https://www.github.com/hafizhaekall/",
        'linkedin' => "https://www.linkedin.com/in/hafizhaekal/"
    ]);

    DB::table('our_teams')->insert([
        'name' => "Muhammad Azfa",
        'role' => "Back End developer",
        'image' => "team/azfa.jpg",
        'whatsapp' => "https://wa.me/085156105763/",
        'instagram' => "https://www.instagram.com/azfasa15/",
        'github' => "https://www.github.com/rodeobazaar124/",
        'linkedin' => "https://www.linkedin.com/in/azfasalman/"
    ]);

    DB::table('our_teams')->insert([
        'name' => "M Ghazy",
        'role' => "Front End developer",
        'image' => "team/ghazy.jpg",
        'whatsapp' => "https://wa.me/085158266733",
        'instagram' => "https://instagram.com/en0kich4n",
        'github' => "https://github.com/en0kich4n",
        'linkedin' => "https://www.linkedin.com/in/xylviet"
    ]);

    DB::table('our_teams')->insert([
        'name' => "Ristin Iman A",
        'role' => "Copywriter",
        'image' => "team/ristin.jpg",
        'whatsapp' => "https://wa.me/qr/AC44YKCYABNLM1",
        'instagram' => "https://www.instagram.com/ristinnandnnii_/",
        'github' => "https://github.com/RistinAndini78",
        'linkedin' => "https://www.linkedin.com/in/ristin-iman-andini-896a44287"
    ]);

    DB::table('our_teams')->insert([
        'name' => "Della Friska A",
        'role' => "UI / UX Designer ",
        'image' => "team/della.jpg",
        'whatsapp' => "https://wa.me/085927778314",
        'instagram' => "https://instagram.com/dllaa.te?igshid=MzNlNGNkZWQ4Mg==",
        'github' => "https://github.com/dellafan",
        'linkedin' => "https://www.linkedin.com/in/della-friska-ardiana-1bb587290/"
    ]);

    DB::table('our_teams')->insert([
        'name' => "Siti Nuraini M",
        'role' => "UI / UX Designer ",
        'image' => "team/aini.jpg",
        'whatsapp' => "https://wa.me/081902776222",
        'instagram' => "https://instagram.com/stnrainimrym_",
        'github' => "https://github.com/SitiNurainiMaryam6",
        'linkedin' => "https://www.linkedin.com/in/siti-nuraini-maryam-81225a290/"
    ]);
    }
}
