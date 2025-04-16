<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin ',
            'email' => 'admin@gmail.com',
            'password' => '120', // tanpa hashing
            'role' => 'Admin',
        ]);
    }
}
