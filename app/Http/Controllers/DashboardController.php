<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache as FacadesCache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = SubKriteriaModel::select('kriteria.nama as nama_kriteria', DB::raw('count(*) as total'))
            ->join('kriteria', 'sub_kriteria.kriteria_id', '=', 'kriteria.id')
            ->groupBy('kriteria.nama')
            ->orderBy('kriteria.nama', 'asc')
            ->get();

        $result = [];
        foreach ($counts as $count) {
            $result[$count->nama_kriteria] = $count->total;
        }

        return view('dashboard', [
            'counts' => $result,
        ]);
    }

    public function ShowMatriksKeputusan()
    {
        $matriks_keputusan = $this->matriksKeputusan();

        $minmax_value = $this->minMaxValue($matriks_keputusan);


        return view('matriks-keputusan', [
            'matriks_keputusan' => $matriks_keputusan,
            'minmax_value' => $minmax_value['minmax_value'],
        ]);
    }

    public function ShowNormalisasi()
    {
        $matriks_keputusan = $this->matriksKeputusan();
        $minmax = $this->minMaxValue($matriks_keputusan);
        $minmax_value = $minmax['minmax_value'];
        $kriterias = $minmax['kriterias'];

        $normalisasi = $this->normalisasi($matriks_keputusan, $kriterias, $minmax_value);

        return view('hasil-normalisasi', [
            'normalisasi' => $normalisasi,
        ]);
    }

    public function ShowHasilBobotnRanking()
    {
        $matriks_keputusan = $this->matriksKeputusan();
        $minmax = $this->minMaxValue($matriks_keputusan);
        $minmax_value = $minmax['minmax_value'];
        $kriterias = $minmax['kriterias'];

        $normalisasi_scores = $this->normalisasi($matriks_keputusan, $kriterias, $minmax_value);

        $normalisasi_bobot = [];
        foreach ($matriks_keputusan as $nama => $bobot) {
            foreach ($kriterias as $kriteria) {
                $kriteria_id = $kriteria['id'];
                $bobot = $kriteria['bobot'];

                if (isset($normalisasi_scores[$nama]['c' . $kriteria_id])) {
                    $nilai = $normalisasi_scores[$nama]['c' . $kriteria_id];
                    $normalisasi_bobot[$nama] = $normalisasi_bobot[$nama] ?? 0;
                    $normalisasi_bobot[$nama] += $nilai * $bobot;
                }
            }
        }

        arsort($normalisasi_bobot);

        $ranking = 1;
        foreach ($normalisasi_bobot as $nama => $nilai) {
            $normalisasi_bobot[$nama] = [
                'nilai' => $nilai,
                'ranking' => $ranking++
            ];
        }

        return view('hasil-normalisasi-bobot', [
            'normalisasi_bobot' => $normalisasi_bobot,
        ]);
    }

    private function matriksKeputusan()
    {
        $sub_kriteria = SubKriteriaModel::all()->toArray();

        $datas = AlternatifModel::with(['dataAlternatif.kriteria'])->get();
        $result = $datas->map(function ($alternatif) {
            $data = [
                'No' => $alternatif->id,
                'Nama' => $alternatif->nama,
                'IPK' => $this->getNilaiByKriteria($alternatif, 1),
                'Tes Pemrograman' => $this->getNilaiByKriteria($alternatif, 2),
                'Kemampuan Mengajar' => $this->getNilaiByKriteria($alternatif, 3),
                'Nilai Referensi' => $this->getNilaiByKriteria($alternatif, 4),  // Nilai Referensi
                'Kerja Sama' => $this->getNilaiByKriteria($alternatif, 5),  // Kerja Sama
            ];

            return $data;
        })->toArray();

        $matriks_keputusan = [];

        foreach ($result as $alternatif) {
            $matriks_keputusan[$alternatif['Nama']] = [
                'c1' => $this->getBobot($alternatif['IPK'], $sub_kriteria, 1),
                'c2' => $this->getBobot($alternatif['Tes Pemrograman'], $sub_kriteria, 2),
                'c3' => $this->getBobot($alternatif['Kemampuan Mengajar'], $sub_kriteria, 3),
                'c4' => $this->getBobot($alternatif['Nilai Referensi'], $sub_kriteria, 4),
                'c5' => $this->getBobot($alternatif['Kerja Sama'], $sub_kriteria, 5),
            ];
        }

        return $matriks_keputusan;
    }

    public function minMaxValue($matriks_keputusan)
    {
        $kriterias = KriteriaModel::all()->toArray();
        $minmax_value = [];

        foreach ($matriks_keputusan as $nama => $bobot) {
            foreach ($kriterias as $kriteria) {
                $kriteria_id = $kriteria['id'];
                $tipe = $kriteria['tipe'];

                if (isset($bobot['c' . $kriteria_id])) {
                    $nilai = $bobot['c' . $kriteria_id];

                    if ($tipe === 'benefit') {
                        if (!isset($minmax_value[$kriteria_id]) || $minmax_value[$kriteria_id] < $nilai) {
                            $minmax_value[$kriteria_id] = $nilai;
                        }
                    } elseif ($tipe === 'cost') {
                        if (!isset($minmax_value[$kriteria_id]) || $minmax_value[$kriteria_id] > $nilai) {
                            $minmax_value[$kriteria_id] = $nilai;
                        }
                    }
                }
            }
        }

        return [
            'minmax_value' => $minmax_value,
            'kriterias' => $kriterias,
        ];
    }

    private function normalisasi($matriks_keputusan, $kriterias, $minmax_value)
    {
        foreach ($matriks_keputusan as $nama => $bobot) {
            foreach ($kriterias as $kriteria) {
                $kriteria_id = $kriteria['id'];
                $tipe = $kriteria['tipe'];

                if (isset($bobot['c' . $kriteria_id])) {
                    $nilai = $bobot['c' . $kriteria_id];

                    if ($tipe === 'benefit') {
                        $normalisasi_scores[$nama]['c' . $kriteria_id] = $nilai / $minmax_value[$kriteria_id];
                    } elseif ($tipe === 'cost') {
                        $normalisasi_scores[$nama]['c' . $kriteria_id] = $minmax_value[$kriteria_id] / $nilai;
                    }
                }
            }
        }

        return $normalisasi_scores;
    }

    private function getNilaiByKriteria($alternatif, $id_kriteria)
    {
        $data = $alternatif->dataAlternatif->firstWhere('id_kriteria', $id_kriteria);
        return $data ? $data->nilai : 0;
    }

    private function getBobot($nilai, $sub_kriteria, $kriteria_id)
    {
        foreach ($sub_kriteria as $sub) {
            if (
                $sub['kriteria_id'] == $kriteria_id &&
                $nilai >= $sub['nilai_min'] &&
                $nilai <= $sub['nilai_max']
            ) {
                return $sub['bobot'];
            }
        }
        return null; // Jika tidak ditemukan, bisa dikembalikan null atau nilai default
    }
}
