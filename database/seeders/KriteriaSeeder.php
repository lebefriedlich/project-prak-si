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
                'nama' => 'Tes pemrograman',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Kemampuan mengajar',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Nilai referensi',
                'tipe' => 'benefit',
                'bobot' => 2
            ],
            [
                'nama' => 'Kerja sama',
                'tipe' => 'benefit',
                'bobot' => 3
            ],
        ];

        foreach ($kriteria as $k) {
            KriteriaModel::create($k);
        }
    }
}
