@extends('partials.master')
@section('title', 'Hasil Normalisasi')
@section('css')
    <style>
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hasil Normalisasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped-columns table-hover"
                                    style="min-width: 845px">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No. </th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">IPK</th>
                                            <th class="text-center">Tes Pemrograman</th>
                                            <th class="text-center">Kemampuan Mengajar</th>
                                            <th class="text-center">Nilai Referensi</th>
                                            <th class="text-center">Kerja Sama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($normalisasi as $nama => $nilai)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $nama }}</td>
                                                <td class="text-center text-dark">{{ $nilai['c1'] }}</td>
                                                <td class="text-center text-dark">{{ $nilai['c2'] }}</td>
                                                <td class="text-center text-dark">{{ $nilai['c3'] }}</td>
                                                <td class="text-center text-dark">{{ $nilai['c4'] }}</td>
                                                <td class="text-center text-dark">{{ $nilai['c5'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
