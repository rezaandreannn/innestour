<?php

namespace Database\Seeders;

use App\Models\Mou;
use Illuminate\Database\Seeder;

class MouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mou::create([
            'user_id' => 1,
            'logo' => '',
            'nama_perusahaan' => 'um metro',
            'email_perusahaan' => 'ummetro@gmail.com',
            'no_hp_perusahaan' => '0821834563',
            'dokumen' => 'jhsgd'
        ]);
    }
}
