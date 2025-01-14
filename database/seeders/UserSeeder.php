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
        $users = [
            [
                'id' => 1,
                'user_name' => 'admin',
                'email' => 'admin@admin.com',
                'name' => 'Admin',
                'gender' => 'male',
                'birth_year' => 2000,
                'role' => 0,//admin
                'is_deleted' => false,
                'password' => Hash::make('admin')
            ],
            [
                'id' => 2,
                'user_name' => 'teszt_jakab',
                'email' => 'teszt@jakab.hu',
                'name' => 'Teszt Jakab',
                'gender' => 'male',
                'birth_year' => 1999,
                'role' => 1,//regisztrált felhasz
                'is_deleted' => false,
                'password' => Hash::make('jakab')
            ],
            [
                'id' => 3,
                'user_name' => 'moderator',
                'email' => 'moderator@moderator.hu',
                'name' => 'Moderátor Vilmos',
                'gender' => 'male',
                'birth_year' => 1991,
                'role' => 2,//moderátor
                'is_deleted' => false,
                'password' => Hash::make('vilmos')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
