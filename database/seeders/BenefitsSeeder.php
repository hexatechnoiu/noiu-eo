<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-heart-circle-check fa-lg',
      'title' => 'Pelayanan Ramah',
      'desc' => 'Sebagai startup travel, kami meyakini bahwa customer service yang ramah dan fast response adalah salah satu hal yang mutlak ada di perusahaan kami.'
    ]);

    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-thumbs-up fa-lg',
      'title' => 'Mudah dan Nyaman',
      'desc' => 'Kami hadir untuk membantu memudahkan kegiatan & perjalanan liburan anda. Sehingga anda dapat menikmati perjalanan dengan nyaman tanpa repot.'
    ]);

    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-puzzle-piece fa-lg',
      'title' => 'Fleksibel',
      'desc' => 'Selain paket yang ditawarkan dengan program standar, anda juga dapat memesan itinerary / fasilitas sesuai dengan yang diinginkan.'
    ]);

    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-award fa-lg',
      'title' => 'Profesional',
      'desc' => 'Kami memiliki team yang berpengalaman dan profesional. Anda akan mendapatkan kemudahan dan kenyamanan baik saat konsultasi mengenai paket dan program maupun saat kegiatan berlangsung.'
    ]);

    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-receipt fa-lg',
      'title' => 'Harga Terjangkau',
      'desc' => 'Harga yang kami tawarkan sangatlah kompetitif. Mengapa demikian ? Karena kami telah bekerja sama dengan banyak vendor seperti hotel, transportasi, restoran dan objek wisata.'
    ]);

    DB::table('benefits')->insert([
      'icon' => 'fa-solid fa-lock fa-lg',
      'title' => 'Keamanan',
      'desc' => 'NOIU merupakan perusahaan travel yang berlisensi dan resmi. Sehingga anda dapat mempercayakan kegiatan dan liburan anda kepada kami. Yang tentunya akan memberikan kenyamanan dan pengalaman yang tak terlupakan.'
    ]);
  }
}
