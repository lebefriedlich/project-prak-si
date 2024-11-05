<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    public function index()
    {
        $datas = KriteriaModel::all();

        return view('kriteria', compact('datas'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'in' => 'Kolom :attribute harus diisi benefit atau cost.',
            'integer' => 'Kolom :attribute harus diisi angka.',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tipe' => 'required|in:benefit,cost',
            'bobot' => 'required|integer',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        KriteriaModel::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'in' => 'Kolom :attribute harus diisi benefit atau cost.',
            'integer' => 'Kolom :attribute harus diisi angka.',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tipe' => 'required|in:benefit,cost',
            'bobot' => 'required|integer',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kriteria = KriteriaModel::find($id);

        if (!$kriteria) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $kriteria->update($request->all());
        $kriteria->save();

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $kriteria = KriteriaModel::find($id);
        if (!$kriteria) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $kriteria->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
