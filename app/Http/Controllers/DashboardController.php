<?php

namespace App\Http\Controllers;

use App\Models\SubKriteriaModel;
use Illuminate\Http\Request;
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

        // Format data untuk response
        $result = [];
        foreach ($counts as $count) {
            $result[$count->nama_kriteria] = $count->total;
        }

        return view('dashboard', [
            'counts' => $result,
        ]);
    }
}
