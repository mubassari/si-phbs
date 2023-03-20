@extends('layouts.app', ['breadcrumb' => 'List Survey'])
@section('content')
<div class="card">
    <div class="card-body">
        <a href="" class="btn btn-primary mb-3">Tambah</a>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Nilai</th>
                <th style="width: 40px">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th rowspan="3" scope="row" class="text-center">1</th>
            <td rowspan="3"> Lorem ipsum dolor sit amet.?</td>
        </tr>
        <tr>
            <td>Jawaban 1</td>
            <td>70</td>
            <td rowspan="2" class="text-center">
                <div style="width: 110px">
                    <a class="btn btn-sm btn-success">Edit</a>
                    <form method="POST" class="d-inline">
                        <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td>Jawaban 2</td>
            <td>80</td>
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