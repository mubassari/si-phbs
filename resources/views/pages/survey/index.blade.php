@extends('layouts.app', ['breadcrumb' => 'List Survey'])
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('survey.create') }}" class="btn btn-primary mb-3">Tambah</a>
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
                    @foreach ($list_survey as $key_x => $survey)
                        <tr>
                            <th rowspan="{{ $survey->preferensi_count + 1 }}" scope="row" class="text-center">
                                {{ $loop->iteration }}</th>
                            <td rowspan="{{ $survey->preferensi_count + 1 }}">{{ $survey->pertanyaan }}</td>
                        </tr>
                        @foreach ($survey->preferensi as $key_y => $preferensi)
                            <tr>
                                <td>{{ $preferensi->jawaban }}</td>
                                <td>{{ $preferensi->nilai }}</td>
                                @if ($survey->id == $preferensi->survey_id)
                                    <td rowspan="{{ $survey->preferensi_count + 1 }}" class="text-center">
                                        <div style="width: 110px">
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('survey.edit', ['survey' => $survey->id]) }}">Edit</a>
                                            <form method="POST" class="d-inline"
                                                action="{{ route('survey.destroy', ['survey' => $survey->id]) }}"
                                                onsubmit="return confirm('Yakin menghapus data ini ?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                                @php
                                    $survey->id++;
                                @endphp
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
