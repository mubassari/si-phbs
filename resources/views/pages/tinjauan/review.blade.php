@extends('layouts.app', ['breadcrumb' => 'Review Survey User'])
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header h4">Jawaban Survey</div>
            <div class="card-body">
                <table>
                    @foreach ($user_data['tinjauan'] as $key_x => $survey)
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
    </div>
@endsection
