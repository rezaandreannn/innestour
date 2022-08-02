<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PaketSeeder;
use Database\Seeders\SosmedSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MouSeeder::class);
        $this->call(PaketSeeder::class);
        $this->call(SosmedSeeder::class);
    }
}
