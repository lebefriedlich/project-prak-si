<?php

namespace App\Http\Controllers;

use App\Models\SubKriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IPKController extends Controller
{
    public function index()
    {
        $datas = SubKriteriaModel::with('kriteria')->where('kriteria_id', 1)->get();

        return view('sub_kriteria.ipk', compact('datas'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Kolom :attribute harus diisi angka.',
            'between' => 'Kolom :attribute harus diisi antara :min dan :max.',
            'integer' => 'Kolom :attribute harus diisi angka.',
            'lt' => 'Kolom Nilai Minimum harus lebih kecil dari Nilai Maximum.',
            'gt' => 'Kolom Nilai Maximum harus lebih besar dari Nilai Minimum.',
        ];

        $validator = Validator::make($request->all(), [
            'nilai_min' => 'required|numeric|between:0,4.00|lt:nilai_max',
            'nilai_max' => 'required|numeric|between:0,4.00|gt:nilai_min',
            'bobot' => 'required|integer',
            'keterangan' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->merge(['kriteria_id' => 1]);

        SubKriteriaModel::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Kolom :attribute harus diisi angka.',
            'between' => 'Kolom :attribute harus diisi antara :min dan :max.',
            'integer' => 'Kolom :attribute harus diisi angka.',
            'lt' => 'Kolom Nilai Minimum harus lebih kecil dari Nilai Maximum.',
            'gt' => 'Kolom Nilai Maximum harus lebih besar dari Nilai Minimum.',
        ];

        $validator = Validator::make($request->all(), [
            'nilai_min' => 'required|numeric|between:0,4.00|lt:nilai_max',
            'nilai_max' => 'required|numeric|between:0,4.00|gt:nilai_min',
            'bobot' => 'required|integer',
            'keterangan' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kriteria = SubKriteriaModel::find($id);

        if (!$kriteria) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $request->merge(['kriteria_id' => 1]);

        $kriteria->update($request->all());
        $kriteria->save();

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $kriteria = SubKriteriaModel::find($id);

        if (!$kriteria) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $kriteria->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
