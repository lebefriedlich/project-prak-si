<?php

namespace Database\Seeders;

use App\Models\KriteriaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            [
                'nama' => 'IPK',
                'tipe' => 'benefit',
                'bobot' => 3
            ],
            [
                'nama' => 'Tes Pemrograman',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Kemampuan Mengajar',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Nilai Referensi',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Kerja Sama',
                'tipe' => 'benefit',
                'bobot' => 3
            ],
        ];

        foreach ($kriteria as $k) {
            KriteriaModel::create($k);
        }
    }
}
