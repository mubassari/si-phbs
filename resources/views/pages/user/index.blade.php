@extends('layouts.app', ['breadcrumb' => 'List User'])
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                            <th>Foto Ktp</th>
                            <th class="text-center">Status Partisipasi</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_user as $user)
                            <tr>
                                <td>{{ $loop->index + $list_user->firstItem() }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->telpon }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td><img class="img" width="70px" src="{{ $user->path_foto_ktp }}"
                                        alt="{{ $user->foto }}"></td>
                                <td class="text-center">{!! $user->icon_status_partisipasi !!}</td>
                                <td class="text-center">
                                    <div style="width: 110px">
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                                            class="d-inline" onsubmit="return confirm('Yakin menghapus data ini ?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mt-3">
                <div class="col font-weight-bolder">
                    <h5>Keterangan</h5>
                    <table>
                        <tr>
                            <td><i class='icon-copy fa fa-exclamation-circle'></td>
                            <td>:</td>
                            <td>Belum Berpartisipasi</td>
                        </tr>
                        <tr>
                            <td><i class='icon-copy fa fa-hourglass-half'></td>
                            <td>:</td>
                            <td>Draft</td>
                        </tr>
                        <tr>
                            <td><i class='icon-copy fa fa-check'></td>
                            <td>:</td>
                            <td>Terkirim</td>
                        </tr>
                    </table>
                </div>
                <div class="col d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">{{ $list_user->links() }}</div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
