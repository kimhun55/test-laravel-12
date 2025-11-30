<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class add_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create user
        User::create([
            'name' => 'kimhun55',
            'email' => 'kimhun55@example.com',
            'password' => bcrypt('1150'),
        ],[
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
