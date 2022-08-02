<?php

namespace Database\Seeders;

use App\Models\Sosmed;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sosmed::create([
            'name' => 'instagram',
            'logo' => '<i class="fab fa-instagram"></i>',
            'url' => 'https://'
        ]);
    }
}
