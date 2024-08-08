<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Unit Blimbing',
                'username' => 'blimbing',
                'password' => Hash::make('blimbing'),
            ],
            [
                'name' => 'Admin Unit Lowokwaru',
                'username' => 'lowokwaru',
                'password' => Hash::make('lowokwaru'),
            ],
        ]);
    }
}
