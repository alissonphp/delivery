<?php

use Illuminate\Database\Seeder;

class BairroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Bairro::class,20)->create();
    }
}
