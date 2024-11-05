@extends('partials.master')
@section('title', 'Data Sub Kriteria - Kerja Sama')
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
    @if ($errors->any())
        <div class="position-fixed" style="top: 100px; right: 20px; z-index: 1050;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                <p>Harap periksa kembali input Anda:</p>
                <ul class="mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li class="d-flex align-items-center mb-2">
                            <span class="badge badge-danger mr-2">!</span>
                            <strong>{{ $error }}</strong>
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="position-fixed" style="top: 100px; right: 20px; z-index: 1050;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="position-fixed" style="top: 100px; right: 20px; z-index: 1050;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Sub Kriteria - Kerja Sama</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahModal"><i
                                        class="bi bi-plus-circle"></i>
                                    Tambah Data Sub Kriteria - Kerja Sama</button>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped-columns table-hover"
                                    style="min-width: 845px">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No. </th>
                                            <th class="text-center">Nama Kriteria</th>
                                            <th class="text-center">Nilai Min</th>
                                            <th class="text-center">Nilai Max</th>
                                            <th class="text-center">Bobot</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $data->kriteria->nama }}</td>
                                                <td class="text-center text-dark">{{ $data->nilai_min }}</td>
                                                <td class="text-center text-dark">{{ $data->nilai_max }}</td>
                                                <td class="text-center text-dark">{{ $data->bobot }}</td>
                                                <td class="text-center text-dark">{{ $data->keterangan }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        style="margin-right: 20px"
                                                        data-target="#EditModal{{ $data->id }}"><i
                                                            class="bi bi-pencil-square"></i>
                                                        Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal"
                                                        data-target="#HapusModal{{ $data->id }}"><i
                                                            class="bi bi-trash3"></i>
                                                        Hapus</button>
                                                </td>
                                                <div class="modal fade" id="HapusModal{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Sub Kriteria - Kerja Sama</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left text-dark">Apakah anda yakin
                                                                menghapus
                                                                data Kerja Sama tersebut?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning" type="button"
                                                                    data-dismiss="modal">Tidak</button>
                                                                <form
                                                                    action="{{ route('sub_kriteria.tes_pemrograman.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        Iya
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="EditModal{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Sub Kriteria - Kerja Sama
                                                                </h5>
                                                                <button class="close" type="button"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('sub_kriteria.tes_pemrograman.update', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="nama" class="text-dark">Nama
                                                                                Kriteria</label>
                                                                            <input type="text"
                                                                                class="form-control border border-primary"
                                                                                id="nama" value="{{ $data->kriteria->nama }}" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai_min" class="text-dark">Nilai
                                                                                Minimum</label>
                                                                            <input type="number" step="0.1"
                                                                                class="form-control border border-primary"
                                                                                id="nilai_min" name="nilai_min"
                                                                                value="{{ $data->nilai_min }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai_max" class="text-dark">Nilai
                                                                                Maximum</label>
                                                                            <input type="number" step="0.1"
                                                                                class="form-control border border-primary"
                                                                                id="nilai_max" name="nilai_max"
                                                                                value="{{ $data->nilai_max }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot" class="text-dark">Nilai
                                                                                Bobot</label>
                                                                            <input type="number"
                                                                                class="form-control border border-primary"
                                                                                id="bobot" name="bobot"
                                                                                value="{{ $data->bobot }}"required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="keterangan"
                                                                                class="text-dark">Keterangan
                                                                                Kriteria</label>
                                                                            <select
                                                                                class="form-control border border-primary form-select form-select-lg mb-3"
                                                                                id="keterangan" name="keterangan"
                                                                                required>
                                                                                <option value="">-</option>
                                                                                <option value="Sangat Baik"
                                                                                    {{ $data->keterangan == 'Sangat Baik' ? 'selected' : '' }}>
                                                                                    Sangat Baik
                                                                                </option>
                                                                                <option value="Baik"
                                                                                    {{ $data->keterangan == 'Baik' ? 'selected' : '' }}>
                                                                                    Baik</option>
                                                                                <option value="Cukup"
                                                                                    {{ $data->keterangan == 'Cukup' ? 'selected' : '' }}>
                                                                                    Cukup</option>
                                                                                <option value="Kurang"
                                                                                    {{ $data->keterangan == 'Kurang' ? 'selected' : '' }}>
                                                                                    Kurang</option>
                                                                                <option value="Sangat Kurang"
                                                                                    {{ $data->keterangan == 'Sangat Kurang' ? 'selected' : '' }}>
                                                                                    Sangat Kurang
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-danger" type="button"
                                                                                data-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Edit</button>
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

    <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sub Kriteria - Kerja Sama</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('sub_kriteria.tes_pemrograman.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="text-dark">Nama Kriteria</label>
                            <input type="text" class="form-control border border-primary" id="nama"
                                value="{{ $datas[0]->kriteria->nama }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nilai_min" class="text-dark">Nilai Minimum</label>
                            <input type="number" step="0.1" class="form-control border border-primary"
                                id="nilai_min" name="nilai_min" required>
                        </div>
                        <div class="form-group">
                            <label for="nilai_max" class="text-dark">Nilai Maximum</label>
                            <input type="number" step="0.1" class="form-control border border-primary"
                                id="nilai_max" name="nilai_max" required>
                        </div>
                        <div class="form-group">
                            <label for="bobot" class="text-dark">Nilai Bobot</label>
                            <input type="number" class="form-control border border-primary" id="bobot"
                                name="bobot" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="text-dark">Keterangan Kriteria</label>
                            <select class="form-control border border-primary form-select form-select-lg mb-3"
                                id="keterangan" name="keterangan" required>
                                <option value="">-</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Sangat Kurang">Sangat Kurang</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
