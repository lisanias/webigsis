<?php

use Illuminate\Database\Seeder;
use App\Models\RecebidoModo;

class RecebidoModoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecebidoModo::create ([
            'name'      => 'Batismo',
        ]);
        RecebidoModo::create ([
            'name'      => 'Jurisdição',
        ]);
    }
}
