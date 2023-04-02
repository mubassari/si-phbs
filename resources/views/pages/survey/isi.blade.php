@extends('layouts.app', ['breadcrumb' => 'Isi Survey'])
@section('content')
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
                            <td class="mb-3 jawaban">
                                <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                    @foreach ($survey->preferensi as $key_y => $preferensi)
                                        @php
                                            $tinjauan_empty = $list_tinjauan
                                                ->whereIn('survey_id', $survey->id)
                                                ->whereIn('preferensi_id', $preferensi->id)
                                                ->isNotEmpty();
                                        @endphp
                                        <label
                                            class="btn btn-outline-secondary m-1 rounded preferensi @if ($tinjauan_empty) active @endif">
                                            <input type="radio" name="jawaban[{{ $survey->id }}]" autocomplete="off"
                                                @if ($tinjauan_empty) checked @endif
                                                value="{{ $preferensi->id }}">{{ $preferensi->jawaban }}
                                        </label>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary" name="draf" id="draf" value="draf">Simpan
                    Sebagai
                    Draf</button>
                <button type="submit" class="btn btn-primary" name="simpan" id="simpan" value="simpan"
                    @if ($list_survey->count() !== $list_tinjauan->count()) disabled @endif>Kirim
                    Survey</button>
            </div>
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
    <script>
        $(document).ready(function() {
            $(document).on('change', '.preferensi', function() {
                const allChecked = $('.preferensi.active').length !== $('.jawaban').length;
                console.log($('.preferensi.active').length, $('.jawaban').length)
                $('#simpan').prop('disabled', allChecked);
            });
        });
    </script>
@endpush
