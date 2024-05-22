<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'andrej',
                'email' => 'andrewspasov@yahoo.com',
                'password' => Hash::make('andrej'),
                'role' => 'admin'
            ],
        ]);
    }
}
