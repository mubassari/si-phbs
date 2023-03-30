@extends('layouts.app', ['breadcrumb' => 'List User Mengisi '])
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <x-events.alert-success />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th class="text-center">Survey Terjawab</th>
                            <th class="text-center">Status Draft</th>
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
            <div class="mt-3">
                {{ $list_user->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
