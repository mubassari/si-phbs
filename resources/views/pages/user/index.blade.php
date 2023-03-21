@extends('layouts.app', ['breadcrumb' => 'List User'])
@section('content')
<div class="card">
    <div class="card-body">
        <a href="" class="btn btn-primary mb-3">Tambah</a>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Foto Ktp</th>
                <th>Status Partisipasi</th>
                <th>Status Draft</th>
                <th style="width: 40px">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1.</td>
            <td>Raden</td>
            <td>087845456767</td>
            <td>...</td>
            <td>Jl Sultam Adam no 57</td>
            <td>Icon Centang</td>
            <td>Icon Centang</td>
            <td class="text-center">
                <div style="width: 110px">
                    <a class="btn btn-sm btn-success">Edit</a>
                    <form method="POST" class="d-inline">
                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
      </table>
      <div class="mt-3">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection