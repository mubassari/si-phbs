@extends('layouts.app', ['breadcrumb' => 'Review Survey ' . $user->nama])
@section('content')
    <x-user-profile :user="$user">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Informasi:</h5>
            <p>Nilai <strong>{{ $user->nama }}</strong> adalah <strong>{{ $user->hasil_survey['nilai'] }}</strong></p>
        </div>
        <div class="card">
            <div class="card-header h4">Jawaban Survey</div>
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
                            <td>{{ $survey->tinjauan->firstWhere('user_id', $user->id)?->preferensi->jawaban }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </x-user-profile>
@endsection
