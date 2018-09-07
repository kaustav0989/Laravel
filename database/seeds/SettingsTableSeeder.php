<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'site_name' 		=> 'Laravel Blog',
        	'address'			=> 'Kolkata,India',
        	'contact_number'	=> '7797480989',
        	'contact_email'		=> 'info@gmail.com',
        ]);
    }
}
