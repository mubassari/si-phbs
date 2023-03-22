<x-forms.input-group label="Pertanyaan" name="pertanyaan" id="pertanyaan" type="text"
    itemValue="{{ $survey->pertanyaan ?? '' }}" />
<div class="form-group row">
    <label for="Preferensi" class="col-sm-4 col-form-label">Preferensi</label>
    <div class="col-sm-8">
        @for ($i = 0; $i < 3; $i++)
            <div class="row mb-4">
                <div class="col-8">
                    <input name="jawaban[]" class="form-control @error('jawaban.' . $i) is-invalid @enderror"
                        value="{{ old('jawaban.' . $i, $arr_jawaban[$i] ?? '') }}">
                    <x-events.error-message error="{{ 'jawaban.' . $i }}" />
                </div>
                <div class="col-4">
                    <select name="nilai[]" class="form-control @error('nilai.' . $i) is-invalid @enderror">
                        <option {{ old('nilai.' . $i, $arr_nilai[$i] ?? '') == 0 ? 'selected' : '' }} value="0">
                            Nilai</option>
                        <option {{ old('nilai.' . $i, $arr_nilai[$i] ?? '') == 70 ? 'selected' : '' }} value="70">70
                        </option>
                        <option {{ old('nilai.' . $i, $arr_nilai[$i] ?? '') == 80 ? 'selected' : '' }} value="80">80
                        </option>
                        <option {{ old('nilai.' . $i, $arr_nilai[$i] ?? '') == 90 ? 'selected' : '' }} value="90">90
                        </option>
                    </select>
                    <x-events.error-message error="{{ 'nilai.' . $i }}" />
                </div>
            </div>
        @endfor
    </div>
</div>

<a class="btn btn-warning text-white" href="{{ route('survey.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
