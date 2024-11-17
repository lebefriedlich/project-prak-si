<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatifModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $datas = DataAlternatifModel::all();

        return view('data-alternatif', compact('datas'));
    }
    
    public function store(Request $request){
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

        DataAlternatifModel::create([
            'nama' => $request->nama,
            'IPK' => $request->IPK,
            'tes_pemrograman' => $request->tes_pemrograman,
            'kemampuan_mengajar' => $request->kemampuan_mengajar,
            'nilai_referensi' => $request->nilai_referensi,
            'kerja_sama' => $request->kerja_sama,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request,$id)
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

        $data = DataAlternatifModel::find($id);

        if ($data){
            $data->update([
                'nama' => $request->nama,
                'IPK' => $request->IPK,
                'tes_pemrograman' => $request->tes_pemrograman,
                'kemampuan_mengajar' => $request->kemampuan_mengajar,
                'nilai_referensi' => $request->nilai_referensi,
                'kerja_sama' => $request->kerja_sama,
            ]);

            return redirect()->back()->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        DataAlternatifModel::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
