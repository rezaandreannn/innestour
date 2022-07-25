<?php

namespace Database\Seeders;

use App\Models\DetailPaket;
use App\Models\Wisata;
use Illuminate\Database\Seeder;

class DetailPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailPaket::create([
            'paket_id' => 1,
            'wisata_id' => 1,
        ]);
    }
}
