<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::all();

        if ($user) {
            DB::table('units')->insert([
                [
                    'nama' => 'Blimbing, Malang',
                    'user_id' => $user[0]->id,
                    'jumlah_teller' => 2,
                    'jumlah_cs' => 2,
                ],
                [
                    'nama' => 'Lowokwaru, Malang',
                    'user_id' => $user[1]->id,
                    'jumlah_teller' => 2,
                    'jumlah_cs' => 2,
                ],
            ]);
        }
    }
}
