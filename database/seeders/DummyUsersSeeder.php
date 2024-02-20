<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Giesta',
                'email'=>'GiestaUser@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('12345')
            ],
            [
                'name'=>'Andini',
                'email'=>'AndiniAdmin@gmail.com',
                'role'=>'Admin',
                'password'=>bcrypt('12345')
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }

    }
}
