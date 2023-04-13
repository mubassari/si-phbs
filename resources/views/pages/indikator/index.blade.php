@extends('layouts.app', ['breadcrumb' => 'List Indikator'])
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('indikator.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Foto</th>
                            <th style="width: 40px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_indikator as $indikator)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $indikator->judul }}</td>
                                <td>{!! Str::limit($indikator->isi, 250, '') !!}</td>
                                <td>
                                    <div>
                                        <img style="width: 120px" src="{{ $indikator->path_foto }}"
                                            alt="{{ $indikator->foto }}">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div style="width: 110px">
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('indikator.edit', ['indikator' => $indikator->id]) }}">Edit</a>
                                        <form method="POST" class="d-inline"
                                            action="{{ route('indikator.destroy', ['indikator' => $indikator->id]) }}"
                                            onsubmit="return confirm('Yakin menghapus data ini ?')">
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
        </div>
        <!-- /.card-body -->
    </div>
@endsection
