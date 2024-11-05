@extends('partials.master')
@section('title', 'Dashboard')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">In your dashboard</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    </ol>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        {{-- <a href="{{ route('usaha.index') }}"> --}}
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-journal-text text-dark border-dark"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Indek Prestasi Kumulatif (IPK)</div>
                                    <div class="stat-digit">{{ $counts['IPK'] }}</div>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        {{-- <a href="{{ route('umkm.index') }}"> --}}
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-code-slash text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Tes Pemrograman</div>
                                    <div class="stat-digit">{{ $counts['Tes Pemrograman'] }}</div>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        {{-- <a href="{{ route('kriteria.index') }}"> --}}
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-award text-secondary border-secondary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Kemampuan Mengajar</div>
                                    <div class="stat-digit">{{ $counts['Kemampuan Mengajar'] }}</div>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        {{-- <a href="{{ route('bobot.index') }}"> --}}
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-bar-chart text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Nilai Referensi</div>
                                    <div class="stat-digit">{{ $counts['Nilai Referensi'] }}</div>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        {{-- <a href="{{ route('bobot.index') }}"> --}}
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-people text-info border-info"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Kerja Sama</div>
                                    <div class="stat-digit">{{ $counts['Kerja Sama'] }}</div>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

