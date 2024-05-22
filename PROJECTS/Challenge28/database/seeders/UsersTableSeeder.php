<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            User::create([
                'username' => "regular$i",
                'email' => "regular$i@test.com",
                'password' => Hash::make('regular'), 
                'is_active' => true,
                'type' => 'regular',
            ]);
        }
    }
}
