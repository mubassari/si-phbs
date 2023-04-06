@extends('layouts.app', ['breadcrumb' => 'List User Mengisi '])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th class="text-center">Survey Terjawab</th>
                            <th class="text-center">Status Survey</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_user as $user)
                            <tr>
                                <td>{{ $loop->index + $list_user->firstItem() }}</td>
                                <td>{{ $user->nama }}</td>
                                <td class="text-center">{{ $user->tinjauan_count . ' dari ' . $survey_count }}</td>
                                <td class="text-center">{!! $user->icon_status_draft !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('tinjauan.review', ['user' => $user->id]) }}">Review</a>

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
                            <td>Draft</td>
                        </tr>
                        <tr>
                            <td><i class='icon-copy fa fa-check'></td>
                            <td>:</td>
                            <td>Terkirim</td>
                        </tr>
                    </table>
                </div>
                <div class="col d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">{{ $list_user->links() }}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
