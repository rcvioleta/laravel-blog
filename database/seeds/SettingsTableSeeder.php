<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'My Laravel Blog',
            'contact_number' => 123456,
            'contact_email' => 'myemail@gmail.com',
            'address' => 'Bermuda Triangle'
        ]);
    }
}
