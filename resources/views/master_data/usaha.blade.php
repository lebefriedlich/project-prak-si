@extends('partials.master')
@section('title', 'Jenis Usaha')
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

    @if (session('error'))
        <div class="position-fixed" style="top: 100px; right: 20px; z-index: 1050;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @if (is_array(session('error')))
                    <ul>
                        @foreach (session('error') as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                @else
                    <strong>{{ session('error') }}</strong>
                @endif
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
                            <h4 class="card-title">Data Jenis Usaha</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#TambahModal"><i
                                        class="bi bi-plus-circle"></i>
                                    Tambah Jenis Usaha</button>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped-columns table-hover"
                                    style="min-width: 845px">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No. </th>
                                            <th class="text-center">Nama Jenis Usaha</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usaha as $ush)
                                            <tr>
                                                <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                                <td class="text-center text-dark">{{ $ush->nama_jenis_usaha }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        style="margin-right: 20px"
                                                        data-target="#EditModal{{ $ush->id }}"><i
                                                            class="bi bi-pencil-square"></i>
                                                        Edit</button>
                                                    <button class="btn btn-danger" data-toggle="modal"
                                                        data-target="#HapusModal{{ $ush->id }}"><i
                                                            class="bi bi-trash3"></i>
                                                        Hapus</button>
                                                </td>
                                                <div class="modal fade" id="HapusModal{{ $ush->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis
                                                                    Usaha</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left text-dark">Apakah anda yakin
                                                                menghapus
                                                                jenis usaha tersebut?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning" type="button"
                                                                    data-dismiss="modal">Tidak</button>
                                                                <form action="{{ route('usaha.destroy', $ush->id) }}"
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
                                                <div class="modal fade" id="EditModal{{ $ush->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis
                                                                    Usaha
                                                                </h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('usaha.update', $ush->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name" class="text-dark">Nama Jenis
                                                                            Usaha</label>
                                                                        <input type="text"
                                                                            class="form-control border border-primary"
                                                                            id="name" name="nama_jenis_usaha"
                                                                            value="{{ $ush->nama_jenis_usaha }}" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-danger" type="button"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Edit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Usaha</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('usaha.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="text-dark">Nama Jenis Usaha</label>
                            <input type="text" class="form-control border border-primary" id="name"
                                name="nama_jenis_usaha" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
