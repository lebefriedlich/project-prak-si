<?php

namespace App\Http\Controllers;

use App\Models\AlternatifModel;
use App\Models\DataAlternatifModel;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataAlternatifController extends Controller
{
    public function index()
    {
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
        });

        return view('data-alternatif', compact('result'));
    }

    private function getNilaiByKriteria($alternatif, $id_kriteria)
    {
        $data = $alternatif->dataAlternatif->firstWhere('id_kriteria', $id_kriteria);
        return $data ? $data->nilai : 0;
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'IPK' => 'required',
            'tes_pemrograman' => 'required',
            'kemampuan_mengajar' => 'required',
            'nilai_referensi' => 'required',
            'kerja_sama' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $alternatif = AlternatifModel::create(['nama' => $request->nama]);

        $kriteriaIds = [1, 2, 3, 4, 5];
        $nilaiInput = [
            $request->IPK,
            $request->tes_pemrograman,
            $request->kemampuan_mengajar,
            $request->nilai_referensi,
            $request->kerja_sama,
        ];

        foreach ($kriteriaIds as $index => $id_kriteria) {
            DataAlternatifModel::create([
                'id_alternatif' => $alternatif->id,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilaiInput[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'IPK' => 'required',
            'tes_pemrograman' => 'required',
            'kemampuan_mengajar' => 'required',
            'nilai_referensi' => 'required',
            'kerja_sama' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kriteriaIds = [1, 2, 3, 4, 5];
        $nilaiInput = [
            $request->IPK,
            $request->tes_pemrograman,
            $request->kemampuan_mengajar,
            $request->nilai_referensi,
            $request->kerja_sama,
        ];

        foreach ($kriteriaIds as $index => $id_kriteria) {
            $existingData = DataAlternatifModel::where('id_alternatif', $id)
                ->where('id_kriteria', $id_kriteria)
                ->first();

            if (!$existingData) {
                return redirect()->back()->with('error', 'Data alternatif atau kriteria tidak ditemukan.');
            }

            $existingData->update(['nilai' => $nilaiInput[$index]]);
        }

        return redirect()->back()->with('success', 'Data alternatif berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DataAlternatifModel::where('id_alternatif', $id)->delete();
        AlternatifModel::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
