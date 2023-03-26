@extends('layouts.app', ['breadcrumb' => 'List User'])
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah</a>
        <x-events.alert-success />
      <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Foto Ktp</th>
                <th class="text-center">Status Partisipasi</th>
                <th class="text-center">Status Draft</th>
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
                <td><img class="img" width="70px" src="{{ $user->path_foto_ktp }}" alt="{{ $user->foto }}"></td>
                <td class="text-center">{!! $user->icon_status_partisipasi !!}</td>
                <td class="text-center">{!! $user->icon_status_draft !!}</td>
                <td class="text-center">
                    <div style="width: 110px">
                      <a class="btn btn-sm btn-success" href="{{ route('user.edit', ['user'=>$user->id]) }}">Edit</a>
                      <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline" onsubmit="return confirm('Yakin menghapus data ini ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                      <form method="POST" action="{{ route('user.reset-status', ['user' => $user->id]) }}" class="mt-3" onsubmit="return confirm('Yakin mereset data status ini ?')">
                        @csrf
                          <button type="submit" class="btn btn-sm btn-primary">Reset Status</button>
                      </form>
                    </div>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-3">
        {{ $list_user->links() }}
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection