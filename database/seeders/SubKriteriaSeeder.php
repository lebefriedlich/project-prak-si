<?php

namespace Database\Seeders;

use App\Models\SubKriteriaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_kriteria = [
            [
                'kriteria_id' => 1,
                'nilai_min' => 3.81,
                'nilai_max' => 4.00,
                'bobot' => 5,
                'keterangan' => 'Sangat Baik',
            ],
            [
                'kriteria_id' => 1,
                'nilai_min' => 3.51,
                'nilai_max' => 3.80,
                'bobot' => 4,
                'keterangan' => 'Baik',
            ],
            [
                'kriteria_id' => 1,
                'nilai_min' => 3.31,
                'nilai_max' => 3.50,
                'bobot' => 3,
                'keterangan' => 'Cukup',
            ],
            [
                'kriteria_id' => 1,
                'nilai_min' => 3.00,
                'nilai_max' => 3.30,
                'bobot' => 2,
                'keterangan' => 'Kurang',
            ],
            [
                'kriteria_id' => 1,
                'nilai_min' => 0.00,
                'nilai_max' => 3.00,
                'bobot' => 1,
                'keterangan' => 'Sangat Kurang',
            ],
            [
                'kriteria_id' => 2,
                'nilai_min' => 86.00,
                'nilai_max' => 100.00,
                'bobot' => 5,
                'keterangan' => 'Sangat Baik',
            ],
            [
                'kriteria_id' => 2,
                'nilai_min' => 76.00,
                'nilai_max' => 85.00,
                'bobot' => 4,
                'keterangan' => 'Baik',
            ],
            [
                'kriteria_id' => 2,
                'nilai_min' => 66.00,
                'nilai_max' => 75.00,
                'bobot' => 3,
                'keterangan' => 'Cukup',
            ],
            [
                'kriteria_id' => 2,
                'nilai_min' => 51.00,
                'nilai_max' => 65.00,
                'bobot' => 2,
                'keterangan' => 'Kurang',
            ],
            [
                'kriteria_id' => 2,
                'nilai_min' => 0.00,
                'nilai_max' => 50.00,
                'bobot' => 1,
                'keterangan' => 'Sangat Kurang',
            ],
            [
                'kriteria_id' => 3,
                'nilai_min' => 86.00,
                'nilai_max' => 100.00,
                'bobot' => 5,
                'keterangan' => 'Sangat Baik',
            ],
            [
                'kriteria_id' => 3,
                'nilai_min' => 76.00,
                'nilai_max' => 85.00,
                'bobot' => 4,
                'keterangan' => 'Baik',
            ],
            [
                'kriteria_id' => 3,
                'nilai_min' => 66.00,
                'nilai_max' => 75.00,
                'bobot' => 3,
                'keterangan' => 'Cukup',
            ],
            [
                'kriteria_id' => 3,
                'nilai_min' => 51.00,
                'nilai_max' => 65.00,
                'bobot' => 2,
                'keterangan' => 'Kurang',
            ],
            [
                'kriteria_id' => 3,
                'nilai_min' => 0.00,
                'nilai_max' => 50.00,
                'bobot' => 1,
                'keterangan' => 'Sangat Kurang',
            ],
            [
                'kriteria_id' => 4,
                'nilai_min' => 86.00,
                'nilai_max' => 100.00,
                'bobot' => 5,
                'keterangan' => 'Sangat Baik',
            ],
            [
                'kriteria_id' => 4,
                'nilai_min' => 76.00,
                'nilai_max' => 85.00,
                'bobot' => 4,
                'keterangan' => 'Baik',
            ],
            [
                'kriteria_id' => 4,
                'nilai_min' => 66.00,
                'nilai_max' => 75.00,
                'bobot' => 3,
                'keterangan' => 'Cukup',
            ],
            [
                'kriteria_id' => 4,
                'nilai_min' => 51.00,
                'nilai_max' => 65.00,
                'bobot' => 2,
                'keterangan' => 'Kurang',
            ],
            [
                'kriteria_id' => 4,
                'nilai_min' => 0.00,
                'nilai_max' => 50.00,
                'bobot' => 1,
                'keterangan' => 'Sangat Kurang',
            ],
            [
                'kriteria_id' => 5,
                'nilai_min' => 86.00,
                'nilai_max' => 100.00,
                'bobot' => 5,
                'keterangan' => 'Sangat Baik',
            ],
            [
                'kriteria_id' => 5,
                'nilai_min' => 76.00,
                'nilai_max' => 85.00,
                'bobot' => 4,
                'keterangan' => 'Baik',
            ],
            [
                'kriteria_id' => 5,
                'nilai_min' => 66.00,
                'nilai_max' => 75.00,
                'bobot' => 3,
                'keterangan' => 'Cukup',
            ],
            [
                'kriteria_id' => 5,
                'nilai_min' => 51.00,
                'nilai_max' => 65.00,
                'bobot' => 2,
                'keterangan' => 'Kurang',
            ],
            [
                'kriteria_id' => 5,
                'nilai_min' => 0.00,
                'nilai_max' => 50.00,
                'bobot' => 1,
                'keterangan' => 'Sangat Kurang',
            ],
        ];

        foreach ($sub_kriteria as $data) {
            SubKriteriaModel::create($data);
        }
    }
}
