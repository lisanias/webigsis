<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
            'name'      => 'Lisanias Loback',
            'email'     => 'lisanias@hotmail.com',
            'password'  => bcrypt('lucas31'),
        ]);
    }
}
