<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'andrej',
            'email' => 'andrewspasov@yahoo.com',
            'password' => Hash::make('andrej'),
            'is_active' => 1,
            'type' => 'admin',
        ]);
    }
}
