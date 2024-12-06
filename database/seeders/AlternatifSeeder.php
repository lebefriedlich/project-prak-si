<?php

namespace Database\Seeders;

use App\Models\AlternatifModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'Kevin Susanto',
            ],
            [
                'nama' => 'Cindy Monica',
            ],
            [
                'nama' => 'Muhammad Rafli',
            ]
        ];

        foreach ($datas as $data) {
            AlternatifModel::create($data);
        }
    }
}
