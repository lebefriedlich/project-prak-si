@extends('partials.master')
@section('title', 'Data Alternatif')
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
                            <h4 class="card-title">Data Alternatif</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahModal"><i
                                        class="bi bi-plus-circle"></i>
                                    Tambah Data Alternatif</button>
                            </div>
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
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $data->nama }}</td>
                                                <td class="text-center text-dark">{{ $data->IPK }}</td>
                                                <td class="text-center text-dark">{{ $data->tes_pemrograman }}</td>
                                                <td class="text-center text-dark">{{ $data->kemampuan_mengajar }}</td>
                                                <td class="text-center text-dark">{{ $data->nilai_referensi }}</td>
                                                <td class="text-center text-dark">{{ $data->kerja_sama }}</td>
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
                                                                    Bobot</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left text-dark">Apakah anda yakin
                                                                menghapus
                                                                data bobot tersebut?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning" type="button"
                                                                    data-dismiss="modal">Tidak</button>
                                                                <form
                                                                    action="{{ route('data-alternatif.destroy', $data->id) }}"
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
                                                                    Bobot
                                                                </h5>
                                                                <button class="close" type="button"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('data-alternatif.update', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="nama"
                                                                            class="text-dark">Nama</label>
                                                                        <input type="text"
                                                                            class="form-control border border-primary"
                                                                            id="nama" name="nama" required
                                                                            value="{{ $data->nama }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="ipk"
                                                                            class="text-dark">IPK</label>
                                                                        <input type="number" step="0.01"
                                                                            class="form-control" id="ipk"
                                                                            name="IPK" min="0" max="4"
                                                                            required value="{{ $data->IPK }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tes_pemrograman"
                                                                            class="text-dark">Nilai Tes Pemrograman</label>
                                                                        <input type="number" step="0.01"
                                                                            class="form-control" id="tes_pemrograman"
                                                                            name="tes_pemrograman" min="0"
                                                                            max="100" required
                                                                            value="{{ $data->tes_pemrograman }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kemampuan_mengajar"
                                                                            class="text-dark">Nilai Kemampuan
                                                                            Mengajar</label>
                                                                        <input type="number" step="0.01"
                                                                            class="form-control" id="kemampuan_mengajar"
                                                                            name="kemampuan_mengajar" min="0"
                                                                            max="100" required
                                                                            value="{{ $data->kemampuan_mengajar }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nilai_referensi"
                                                                            class="text-dark">Nilai Referensi</label>
                                                                        <input type="number" step="0.01"
                                                                            class="form-control" id="nilai_referensi"
                                                                            name="nilai_referensi" min="0"
                                                                            max="100" required
                                                                            value="{{ $data->nilai_referensi }}" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kerja_sama" class="text-dark">Nilai
                                                                            Kerja Sama</label>
                                                                        <input type="number" step="0.01"
                                                                            class="form-control" id="kerja_sama"
                                                                            name="kerja_sama" min="0"
                                                                            max="100" required
                                                                            value="{{ $data->kerja_sama }}" />
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('data-alternatif.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="text-dark">Nama</label>
                            <input type="text" class="form-control border border-primary" id="nama"
                                name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="ipk" class="text-dark">IPK</label>
                            <input type="number" step="0.01" class="form-control" id="ipk" name="IPK"
                                min="0" max="4" required />
                        </div>
                        <div class="form-group">
                            <label for="tes_pemrograman" class="text-dark">Nilai Tes Pemrograman</label>
                            <input type="number" step="0.01" class="form-control" id="tes_pemrograman"
                                name="tes_pemrograman" min="0" max="100" required />
                        </div>
                        <div class="form-group">
                            <label for="kemampuan_mengajar" class="text-dark">Nilai Kemampuan Mengajar</label>
                            <input type="number" step="0.01" class="form-control" id="kemampuan_mengajar"
                                name="kemampuan_mengajar" min="0" max="100" required />
                        </div>
                        <div class="form-group">
                            <label for="nilai_referensi" class="text-dark">Nilai Referensi</label>
                            <input type="number" step="0.01" class="form-control" id="nilai_referensi"
                                name="nilai_referensi" min="0" max="100" required />
                        </div>
                        <div class="form-group">
                            <label for="kerja_sama" class="text-dark">Nilai Kerja Sama</label>
                            <input type="number" step="0.01" class="form-control" id="kerja_sama" name="kerja_sama"
                                min="0" max="100" required />
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