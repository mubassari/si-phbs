<x-forms.input-group label="Pertanyaan" name="pertanyaan" id="pertanyaan" type="text"
    itemValue="{{ $survey->pertanyaan ?? '' }}" />
<div class="form-group row">
    <label for="Preferensi" class="col-sm-4 col-form-label">Preferensi</label>
    <div class="col-sm-8">
        @foreach ($preferensi ?? [1, 2, 3] as $key => $jawaban)
            <input type="hidden" name="id[]" value="{{ $jawaban->id ?? $jawaban }}">
            <div class="row mb-4">
                <div class="col-8">
                    <input name="jawaban[]" class="form-control @error('jawaban.' . $key) is-invalid @enderror"
                        value="{{ old('jawaban.' . $key, $jawaban->jawaban ?? '') }}">
                    <x-events.error-message error="{{ 'jawaban.' . $key }}" />
                </div>
                <div class="col-4">
                    <select name="nilai[]" class="form-control @error('nilai.' . $key) is-invalid @enderror">
                        @foreach ([0, 70, 80, 90] as $nilai)
                            <option {{ old('nilai.' . $key, $jawaban->nilai ?? '') == $nilai ? 'selected' : '' }}
                                value="{{ $nilai }}">
                                {{ $nilai == 0 ? 'Nilai' : $nilai }}</option>
                        @endforeach
                    </select>
                    <x-events.error-message error="{{ 'nilai.' . $key }}" />
                </div>
            </div>
        @endforeach
    </div>
</div>

<a class="btn btn-warning text-white" href="{{ route('survey.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
