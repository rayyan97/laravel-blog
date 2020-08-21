<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','lyricsweb00@gmail.com')->first();

        if(!$user){
            User::create([
                'name'=>'rayyan',
                'role'=>'admin',
                'email'=>'lyricsweb00@gmail.com',
                'password'=>Hash::make('12345678')
            ]);
        }

    }
}
