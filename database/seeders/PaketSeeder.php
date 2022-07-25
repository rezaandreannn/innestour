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
            'nama_paket' => 'lampung -jakarta',
            'tempat_duduk' => 50,
            'harga' => '50000',
            'fasilitas' => 'p3k,asuransi,komsumsi 6X makan, menginap Ac 3- 4 orang/kamar'
        ]);
    }
}
