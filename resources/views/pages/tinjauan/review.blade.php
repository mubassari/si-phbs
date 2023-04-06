@extends('layouts.app', ['breadcrumb' => 'Review Survey User'])
@section('content')
    <x-user-profile :user="$user">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Informasi:</h5>
            <p>Nilai <strong>{{ $user->nama }}</strong> adalah <strong>00</strong></p>
        </div>
        <div class="card">
            <div class="card-header h4">Jawaban Survey</div>
            <div class="card-body">
                <table>
                    @foreach ($tinjauan as $survey)
                        <tr>
                            <th rowspan="2" class="align-top h4 p-1">{{ $loop->iteration }}.</th>
                            <th class="h4 p-1">{{ $survey['pertanyaan'] }}</th>
                        </tr>
                        <tr>
                            <td class="mb-3">
                                <div class="btn btn-primary">
                                    {{ $survey['jawaban'] }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </x-user-profile>
@endsection
