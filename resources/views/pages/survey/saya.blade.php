@extends('layouts.app', ['breadcrumb' => 'Survey Saya'])
@section('content')
    <div class="callout callout-info">
        <h5><i class="fas fa-info"></i> Informasi:</h5>
        <p>Nilai Anda adalah 00</p>
    </div>
    <div class="card">
        <div class="card-header h3">Jawaban Survey Anda</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                </tr>
                @foreach ($list_survey as $key_x => $survey)
                    <tr>
                        <td>{{ $loop->iteration }}</th>
                        <td>{{ $survey->pertanyaan }}</td>
                        <td>{{ $survey->tinjauan->firstWhere('user_id', auth()->user()->id)?->preferensi->jawaban }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
