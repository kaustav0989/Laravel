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
                	'name' 		=> 'Kaustav Paul',
                	'email'		=> 'abc@gmail.com',
                	'password'  => bcrypt('abcde'),
                    'admin'     => 1,
        ]);

    //Creating profile for default user
    
        App\Profile::create([
                'user_id'    => $user->id,
                'avatar'     => 'upload/avatars/1.png',   
                'about'      => 'Lorem ipsum dolor sit amet, consectetur   adipiscing elit. Phasellus tortor felis, convallis quis mi ac, euismod vulputate tellus. ',

                'facebook'   => 'https://www.facebook.com/',
                'youtube'    => 'https://www.youtube.com/',       

        ]);

    }
}
