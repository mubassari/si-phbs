@extends('layouts.app', ['breadcrumb' => 'Isi Survey'])
@section('content')
    @if (!($user->status_draft === 0))
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Informasi:</h5>
            Anda telah mengisi survey, Nilai Anda adalah 00
        </div>
    @endif
    <div class="card">
        <form class="form-horizontal" id="form-isi-survey" method="POST" action="{{ route('survey.kirim') }}">
            @csrf
            <div class="card-body">
                <table>
                    @foreach ($list_survey as $key_x => $survey)
                        <tr>
                            <th rowspan="2" class="align-top h4 p-1">{{ $loop->iteration }}.</th>
                            <th class="h4 p-1">{{ $survey->pertanyaan }}</th>
                        </tr>
                        <tr>
                            <td class="mb-3">
                                @if ($user->status_draft === 0)
                                    <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                        @foreach ($survey->preferensi as $key_y => $preferensi)
                                            @php
                                                $tinjauan_empty = $list_tinjauan
                                                    ->whereIn('survey_id', $survey->id)
                                                    ->whereIn('preferensi_id', $preferensi->id)
                                                    ->isNotEmpty();
                                            @endphp
                                            <label
                                                class="btn btn-outline-secondary m-1 rounded @if ($tinjauan_empty) active @endif">
                                                <input type="radio" name="jawaban[{{ $survey->id }}]" id="preferensi"
                                                    autocomplete="off" @if ($tinjauan_empty) checked @endif
                                                    value="{{ $preferensi->id }}">{{ $preferensi->jawaban }}
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="btn btn-primary">
                                        {{ $survey->preferensi->where('id', $list_tinjauan->whereIn('survey_id', $survey->id)->pluck('preferensi_id')[0])->pluck('jawaban')[0] }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @if ($user->status_draft === 0)
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary" name="draf" id="draf" value="draf">Simpan
                        Sebagai
                        Draf</button>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan" value="simpan"
                        disabled>Kirim
                        Survey</button>
                </div>
            @endif
        </form>
    </div>
@endsection

@push('style')
    <style>
        label.btn.btn-outline-secondary.active {
            color: #fff !important;
            background-color: #007bff !important;
            border-color: #007bff !important;
            box-shadow: none !important;
        }

        label.btn.btn-outline-secondary:hover.active {
            color: #fff !important;
            background-color: #0069d9 !important;
            border-color: #0062cc !important;
        }
    </style>
@endpush

@push('script')
    @if ($user->status_draft === 0)
        <script>
            $(document).ready(function() {
                $(document).on('change', '#preferensi', function() {
                    const allUnchecked = $('#preferensi').not(':checked').length === $('#preferensi').length;
                    $('#simpan').prop('disabled', allUnchecked);
                });
            });
        </script>
    @endif
@endpush
