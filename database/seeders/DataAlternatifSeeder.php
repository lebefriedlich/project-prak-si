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
                'nama' => 'Kevin Susanto',
                'IPK' => 3.92,
                'tes_pemrograman' => 74.5,
                'kemampuan_mengajar' => 82,
                'nilai_referensi' => 72,
                'kerja_sama' => 64.5
            ],
            [
                'nama' => 'Cindy Monica',
                'IPK' => 3.62,
                'tes_pemrograman' => 76,
                'kemampuan_mengajar' => 78.5,
                'nilai_referensi' => 52,
                'kerja_sama' => 69.5
            ],
            [
                'nama' => 'Muhammad Rafli',
                'IPK' => 3.98,
                'tes_pemrograman' => 74,
                'kemampuan_mengajar' => 73.8,
                'nilai_referensi' => 0,
                'kerja_sama' => 84.5
            ]
        ];

        foreach ($datas as $data) {
            DataAlternatifModel::create($data);
        }
    }
}
