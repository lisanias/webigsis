<?php

use Illuminate\Database\Seeder;
//use App\Models\Discipulo;

class DiscipulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Discipulo', 200)->create();
        factory('App\Models\Telefone', 250)->create();
    }
}
