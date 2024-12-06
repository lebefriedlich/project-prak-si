@extends('partials.master')
@section('title', 'Matriks Keputusan')
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
                            <h4 class="card-title">Matriks Keputusan</h4>
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
                                        @foreach ($matriks_keputusan as $nama => $nilai)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $nama }}</td>
                                                @foreach ($nilai as $key => $value)
                                                    <td class="text-center text-dark">{{ $value }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-center text-dark" colspan="2"><strong>Nilai Min/Max</strong>
                                            </td>
                                            @foreach ($minmax_value as $key => $value)
                                                <td class="text-center text-dark">{{ $value }}</td>
                                            @endforeach
                                        </tr>
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
