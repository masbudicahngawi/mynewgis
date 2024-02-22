<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisPoi;

class JenisPoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = ['Spesial Spot','Tempat Makan', 'ATM', 'SPBU', 'Kedai Jajanan', 'Mall/Convinient Store', 'Pos Kesehatan', 'Terminal', 'Stasiun', 'Halte', 'Lainnya'];

        for ($i=0; $i < count($jenis); $i++){
            JenisPoi::create([
                'nama' => $jenis[$i]
            ]);

        }
    }
}
