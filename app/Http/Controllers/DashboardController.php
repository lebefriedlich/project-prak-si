<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
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
        if (!FacadesCache::has('matriks_keputusan')) {
            $matriks_keputusan = $this->matriksKeputusan();
        } else {
            $matriks_keputusan = FacadesCache::get('matriks_keputusan');
        }

        if (!FacadesCache::has('minmax_value')) {
            $minmax_value = $this->minMaxValue($matriks_keputusan);
        } else {
            $minmax_value = FacadesCache::get('minmax_value');
        }

        return view('matriks-keputusan', [
            'matriks_keputusan' => $matriks_keputusan,
            'minmax_value' => $minmax_value,
        ]);
    }

    public function ShowNormalisasi()
    {
        if (!FacadesCache::has('matriks_keputusan')) {
            $matriks_keputusan = $this->matriksKeputusan();
        } else {
            $matriks_keputusan = FacadesCache::get('matriks_keputusan');
        }

        if (!FacadesCache::has('minmax_value') && !FacadesCache::has('kriterias')) {
            $minmax_value = $this->minMaxValue($matriks_keputusan);
            $minmax_value = $minmax_value['minmax_value'];
            $kriterias = $minmax_value['kriterias'];
        } else {
            $minmax_value = FacadesCache::get('minmax_value');
            $kriterias = FacadesCache::get('kriterias');
        }

        $normalisasi = $this->normalisasi($matriks_keputusan, $kriterias, $minmax_value);

        return view('hasil-normalisasi', [
            'normalisasi' => $normalisasi,
        ]);
    }

    public function ShowHasilBobotnRanking()
    {
        if (!FacadesCache::has('matriks_keputusan')) {
            $matriks_keputusan = $this->matriksKeputusan();
        } else {
            $matriks_keputusan = FacadesCache::get('matriks_keputusan');
        }

        if (!FacadesCache::has('minmax_value') && !FacadesCache::has('kriterias')) {
            $minmax_value = $this->minMaxValue($matriks_keputusan);
            $minmax_value = $minmax_value['minmax_value'];
            $kriterias = $minmax_value['kriterias'];
        } else {
            $minmax_value = FacadesCache::get('minmax_value');
            $kriterias = FacadesCache::get('kriterias');
        }

        if (!FacadesCache::has('normalisasi_scores')) {
            $normalisasi_scores = $this->normalisasi($matriks_keputusan, $kriterias, $minmax_value);
        } else {
            $normalisasi_scores = FacadesCache::get('normalisasi_scores');
        }

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

        // Sort the normalisasi_bobot array in descending order
        arsort($normalisasi_bobot);

        // Add ranking to each name
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
        $data_alternatif = DataAlternatifModel::all();
        $matriks_keputusan = [];

        foreach ($data_alternatif as $alternatif) {
            $matriks_keputusan[$alternatif->nama] = [
                'c1' => $this->getBobot($alternatif->IPK, $sub_kriteria, 1),
                'c2' => $this->getBobot($alternatif->tes_pemrograman, $sub_kriteria, 2),
                'c3' => $this->getBobot($alternatif->kemampuan_mengajar, $sub_kriteria, 3),
                'c4' => $this->getBobot($alternatif->nilai_referensi, $sub_kriteria, 4),
                'c5' => $this->getBobot($alternatif->kerja_sama, $sub_kriteria, 5),
            ];
        }

        FacadesCache::put('matriks_keputusan', $matriks_keputusan);

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

        FacadesCache::put('kriterias', $kriterias);
        FacadesCache::put('minmax_value', $minmax_value);

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

        FacadesCache::put('normalisasi_scores', $normalisasi_scores);
        return $normalisasi_scores;
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
