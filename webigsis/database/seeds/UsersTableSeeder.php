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
        User::create (

            [
                'name'      => 'Lisanias Loback',
                'email'     => 'lisanias@hotmail.com',
                'password'  => bcrypt('lucas31'),
            ],

            [
                'name'      => 'Pr. Desiel',
                'email'     => 'prdesiel@hotmail.com',
                'password'  => '$2y$10$6xh7IBVBHh.vJL4pXhwq1eVwk2n4zFsxvNL5dZytfJOgHkNXZMIt2',
            ],

            [
                'name'      => 'Vitor Paiva',
                'email'     => 'vitorpaivaweb@gmail.com',
                'password'  => '$2y$10$rBVjA05oHW1ZypFGvxWwZeh6NTvREFk4uXtVdqU/e9Br1cgB5/J9G',
            ],


            [
                'name'      => 'Elaine Parra',
                'email'     => 'elaine.p.v@hotmail.com',
                'password'  => '$2y$10$pZAu7ys8y6yHkVcw3JQH4.B14A4JB3OJvtHXdexMzCTQtmyAqKzwe',
            ],

        );


    }
}
