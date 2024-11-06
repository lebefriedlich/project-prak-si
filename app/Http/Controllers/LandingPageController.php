<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page');
    }

    public function getData(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'between' => 'Kolom :attribute harus berada di antara :min dan :max.',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required|array',
            'nama.*' => 'required',
            'c1' => 'required|array',
            'c1.*' => 'required|numeric|between:0,4.00',
            'c2' => 'required|array',
            'c2.*' => 'required|numeric|between:0,100',
            'c3' => 'required|array',
            'c3.*' => 'required|numeric|between:0,100',
            'c4' => 'required|array',
            'c4.*' => 'required|numeric|between:0,100',
            'c5' => 'required|array',
            'c5.*' => 'required|numeric|between:0,100',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sub_kriteria = SubKriteriaModel::all()->toArray();
        foreach ($request->nama as $index => $nama) {
            $bobot_hasil[$nama] = [
                'c1' => $this->getBobot($request->c1[$index], $sub_kriteria, 1),
                'c2' => $this->getBobot($request->c2[$index], $sub_kriteria, 2),
                'c3' => $this->getBobot($request->c3[$index], $sub_kriteria, 3),
                'c4' => $this->getBobot($request->c4[$index], $sub_kriteria, 4),
                'c5' => $this->getBobot($request->c5[$index], $sub_kriteria, 5),
            ];
        }

        $kriterias = KriteriaModel::all()->toArray();
        $minmax_value = [];

        foreach ($bobot_hasil as $nama => $bobot) {
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

        foreach ($bobot_hasil as $nama => $bobot) {
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

        foreach ($bobot_hasil as $nama => $bobot) {
            foreach ($kriterias as $kriteria) {
                $kriteria_id = $kriteria['id'];
                $bobot = $kriteria['bobot'];

                if (isset($normalisasi_scores[$nama]['c' . $kriteria_id])) {
                    $nilai = $normalisasi_scores[$nama]['c' . $kriteria_id];
                    $hasil_bobot[$nama] = $hasil_bobot[$nama] ?? 0;
                    $hasil_bobot[$nama] += $nilai * $bobot;
                }
            }
        }

        // Mencari ranking
        $ranked_results = [];
        foreach ($hasil_bobot as $nama => $nilai) {
            $ranked_results[$nama] = $nilai; // Menyimpan hasil bobot dalam array untuk ranking
        }

        // Mengurutkan hasil berdasarkan nilai bobot secara descending
        arsort($ranked_results); // Mengurutkan dari yang tertinggi

        // Menambahkan peringkat ke hasil
        $ranked_with_position = [];
        $position = 1;
        foreach ($ranked_results as $nama => $nilai) {
            $ranking[] = [
                'nama' => $nama,
                'nilai' => $nilai,
                'peringkat' => $position++
            ];
        }

        // dd($bobot_hasil, $minmax_value, $normalisasi_scores, $hasil_bobot, $ranking);

        return redirect()->route('landing-page', ['#hasilKeputusan'])->with([
            'bobot_hasil' => $bobot_hasil,
            'minmax_value' => $minmax_value,
            'normalisasi_scores' => $normalisasi_scores,
            'hasil_bobot' => $hasil_bobot,
            'ranking' => $ranking,
        ]);
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
