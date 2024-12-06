<?php

namespace Database\Seeders;

use App\Models\DataAlternatifModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id_alternatif' => 1,
                'id_kriteria' => 1,
                'nilai' => 3.92
            ],
            [
                'id_alternatif' => 1,
                'id_kriteria' => 2,
                'nilai' => 74.5
            ],
            [
                'id_alternatif' => 1,
                'id_kriteria' => 3,
                'nilai' => 82
            ],
            [
                'id_alternatif' => 1,
                'id_kriteria' => 4,
                'nilai' => 72
            ],
            [
                'id_alternatif' => 1,
                'id_kriteria' => 5,
                'nilai' => 64.5
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 1,
                'nilai' => 3.62
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 2,
                'nilai' => 76
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 3,
                'nilai' => 78.5
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 4,
                'nilai' => 52
            ],
            [
                'id_alternatif' => 2,
                'id_kriteria' => 5,
                'nilai' => 69.5
            ],
            [
                'id_alternatif' => 3,
                'id_kriteria' => 1,
                'nilai' => 3.98
            ],
            [
                'id_alternatif' => 3,
                'id_kriteria' => 2,
                'nilai' => 74
            ],
            [
                'id_alternatif' => 3,
                'id_kriteria' => 3,
                'nilai' => 73.8
            ],
            [
                'id_alternatif' => 3,
                'id_kriteria' => 4,
                'nilai' => 0
            ],
            [
                'id_alternatif' => 3,
                'id_kriteria' => 5,
                'nilai' => 84.5
            ]
        ];

        foreach ($datas as $data) {
            DataAlternatifModel::create($data);
        }
    }
}
