@extends('partials.master')
@section('title', 'Hasil Normalisasi Bobot')
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
                                            <th class="text-center">Hasil Normalisasi Bobot</th>
                                            <th class="text-center">Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($normalisasi_bobot as $nama => $nilai)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $nama }}</td>
                                                <td class="text-center text-dark">{{ $nilai['nilai'] }}</td>
                                                <td class="text-center text-dark">{{ $nilai['ranking']}}</td>
                                                
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
