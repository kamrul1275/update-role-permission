<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([



            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'play'=>'admin',
                'status'=>'active',

            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'play'=>'user',
                'status'=>'active',

            ],





        ]);
    }
}
