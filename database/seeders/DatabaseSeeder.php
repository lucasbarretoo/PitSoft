<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(PessoasTableSeed::class);
        $this->call(BpackTableSeeder::class);
        $this->call(BformTableSeeder::class);
    }
}
