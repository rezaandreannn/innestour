<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama_program' => '4 hari',
            'nama_paket' => 'lampung -Jakarta',
            'harga' => '50000',
            'fasilitas' => '<ul><li>p3k</li><li>komsumsi makan 6 kali&nbsp;</li><li>operator di setiap bus</li></ul>',
            'wisata' => '<ul><li>Monas - Jakarta</li><li>TMII - Jakarta</li><li>Masjid istiqal - Jakarta</li></ul>'
        ]);

        Paket::create([
            'nama_program' => '4 hari',
            'nama_paket' => 'lampung -Bandung',
            'harga' => '51000',
            'fasilitas' => '<ul><li>p3k</li><li>komsumsi makan 6 kali&nbsp;</li><li>operator di setiap bus</li></ul>',
            'wisata' => '<ul><li>Monas - Jakarta</li><li>TMII - Jakarta</li><li>Masjid istiqal - Jakarta</li></ul>'
        ]);
    }
}
