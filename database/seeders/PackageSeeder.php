<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*
1: Outbound
2: Offroad
3: Rafting
4: Others
5: Meeting
*/

      $packages = [
    // Outbound
    ['packages/outbound1.jpg', "Paket Outbound 3 Hari 2 Malam", "Program Fun Games / Competition Games, Offroad LandRover, Paintball, Hotel 2 Malam, High Rope ( Flying Fox - 2 Line Bridge - Turun Tebing ) Makan 6X, Coffee Break, Acara Hiburan by MC + Solo Organ.", 1500000, 1],
    ['packages/outbound2.jpg', "Paket Outbound 2 Hari 1 Malam", "Program Fun Games / Competition Games, Hotel 1 Malam, High Rope ( Flying Fox - 2 Line Bridge - Turun Tebing ) Makan 3X, Coffie Break, Acara Hiburan by MC + Solo Organ, Peserta Min 20 Pax", 850000, 1],
    ['packages/outbound3.jpg', "One Day Outbound Grafika Cikole", "Program Fun Games / Competition Games, Trainer, Fasilitator, High Rope ( Flying Fox - 2 Line Bridge - Turun Tebing ) Makan 1X, Air Mineral, Snack, Tiket Masuk Lokasi, Equipment.", 225000, 1],
    ['packages/outbound4.jpg', "One Day Outbound + Paintball Grafika Cikole", "Paket One Day Outbound + Paintball Min 20 Pax Makan Siang Coffe Break Air Mineral Games Outbound Games Master Crew Fasilitator Spanduk Dokumentasi Photo", 315000, 1],


    // Offroad
    ['packages/offroad1.jpg', "Paket Offroad + Outbound", "Landrover ( 1 landy 7 org ), Driver Profesional, Penginapan 1 Malam Makan 3X, Coffie Break, Acara Hiburan by MC + Solo Organ", 895000, 2],
    ['packages/offroad2.jpg', "One Day Offroad Family", "Min 7 Orang, Landrover ( 1 landy 7 org ), Driver Profesional, Asuransi, Tiket lokasi, Makan Siang", 369000, 2],
    ['packages/offroad3.jpg', "One Day Fun Offroad", "Mobil landrover, Tiket Masuk, Tiket LHI, Driver, Bensin, Makan Siang, Snack, Air Mineral, Games Outbound, Spanduk, Dokumentasi Photo *Minimal 20 Pax", 369000, 2],
    ['packages/offroad4.jpg', "One Day Adventure Offroad + Paintball", "Landrover ( 1 landy 7 org ), Driver Profesional, Asuransi, Tiket lokasi, Paintball Battle + 40 Peluru Min 14 Pax", 395000, 2],


    // Rafting
    ['packages/rafting1.jpg', "Rafting Pengalengan Family", "Peserta Min 8 Pax, Tiket Lokasi, Guide, Resque, Asuransi , Loker, Toilet & Shower, Local Transport.", 150000, 3],
    ['packages/rafting2.jpg', "Paket Rafting + Outbound + Paintball", "Tiket Lokasi, Guide, Resque, Makan, Asuransi , Loker, Toilet & Shower, Local Transport, Program Fun Games, Trainer, Fasilitator, Paintball Min 20 Pax", 365000, 3],
    ['packages/rafting3.jpg', "One Day Rafting Pangalengan", "Tiket Lokasi, Guide, Resque, Snack, Makan, Asuransi , Loker, Toilet & Shower, Local Transport. Min 10 Pax", 185000, 3],
    ['packages/rafting4.jpg', "One Day Rafting + Games Ciater Subang", "Paket One Day Rafting + Games Harga Sudah Termasuk : Games Outbound Alat Games Spanduk Rafting Makan Siang Air Mineral Games Master Crew Fasilitator Min 20 Pax Note : Rundown menyesuaikan", 369000, 3],
    ['packages/rafting5.jpg', "One Day Rafting + Games", "Tiket Lokasi, Guide, Resque, Makan, Asuransi , Loker, Toilet & Shower, Local Transport, Program Fun Games, Trainer, Fasilitator, Paintball Min 20 Pax", 275000, 3],


    // Others
    ['packages/other1.jpg', "Paralayang Bukit Toga", "Paralayang Bukit Kampung Toga letaknya tidak jauh dari pusat Kota Sumedang tepatnya di Desa Sukajaya, Kecamatan Sumedang Selatan, untuk menuju puncak Bukit Kampung Toga sangat mudah karena melewati jalan aspal Lokasi lepas landasnya cukup luas, hanya lokasi mendaratnya agak sempit dengan beberapa rintangan.", 0, 4],

    // Meeting
    ['packages/meeting1.jpg', "Paket Meeting", "Half Day Meeting, 1X Makan, 1X Coffee Break, Infocus+screen, Notepad + Alat Tulis, Sound 2 Mic", 300000, 5],
    ['packages/meeting2.jpg', "Paket Live Streaming", "Jasa live streaming noiu bisa menyiarkan acara Anda ke berbagai platform (tersedia di paket tertentu). Acara anda bisa live streaming ke YouTube, Zoom, Instagram, Facebook, dll secara bersamaan.", 0, 5],
    ['packages/meeting3.jpg', "LED Screen Videotron", "Harga untuk Permeter LED Screen Videotron Sudah Termasuk Instalasi Pemasangan Untuk lokasi bisa menyesuaikan Kami juga menyediakan : Multimedia, Sound system, Genset, Wall Of Fame Photobooth, Video Bumper/Animasi, Dokumentasi Photo Video", 0, 5],
    ['packages/meeting4.jpg', "Paket Sound System", "Paket Sound system bisa disesuikan dengan kebutuhan anda", 0, 5],
    ['packages/meeting5.jpg', "Spin 360 Video Booth", "Dengan jasa photobooth terbaik NOIU, tamu acara anda akan mendapatkan pengalaman premium tidak terlupakan! Jasa photobooth profesional yang banyak lebihnya cuma di noiu!", 0, 5],
    ['packages/meeting6.jpg', "Paket Pemasangan Backdrop", "Harga di atas untuk harga satu meter. Pemasangan Backdrop,Wall Of fame, Booth, Cetak Spanduk, jasa pemasangan backdrop biasanya untuk kegiatan : Seminar, Traning, Meeting, Event, Pameran, Wisuda, Launching Produk, Konser Musik, Gathering, Outbound, dan lain sebaginya untuk informasi lebih jelas nya silahkan hubungi WA kami.", 0, 5],

  ];

foreach ($packages as $pkg) {
    DB::table('packages')->insert([
        'picture' => $pkg[0],
        'name' => $pkg[1],
        'desc' => $pkg[2],
        'price' => $pkg[3],
        'package_type_id' => $pkg[4],
    ]);
}
}
}

