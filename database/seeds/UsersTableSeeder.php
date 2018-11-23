<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Rogene Cris Violeta',
            'email' => 'rcvioleta13@gmail.com',
            'password' => bcrypt('admin13')
        ]);
    }
}
