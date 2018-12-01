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
        $user = App\User::create([
            'name' => 'Rogene Cris Violeta',
            'email' => 'rcvioleta13@gmail.com',
            'password' => bcrypt('admin13'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'avatar' => 'uploads/avatars/black-panther.jpg',
            'user_id' => $user->id,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id autem distinctio, hic dolorum doloremque saepe quos! Provident sit numquam est recusandae ratione dolorem sint id! Architecto illo asperiores itaque ullam!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
