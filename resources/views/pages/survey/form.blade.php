<x-forms.input-group label="Pertanyaan" name="pertanyaan" id="pertanyaan" type="text"
    itemValue="{{ $survey->pertanyaan ?? '' }}" />
<div class="row">
    <label for="Preferensi" class="col-sm-4 col-form-label">Preferensi</label>
    <div class="col-sm-8 inputs-wrapper">
        @foreach (old('preferensi', $preferensi) as $key => $item)
            <div class="form-group">
                <input type="hidden" name="preferensi[{{ $item['id'] }}][id]"
                    value="{{ old('preferensi.' . $item['id'] . '.id', $item['id']) }}">
                <div class="row mb-1">
                    <div class="col-8">
                        <input name="preferensi[{{ $item['id'] }}][jawaban]"
                            class="form-control @error('preferensi.' . $item['id'] . '.jawaban') is-invalid @enderror"
                            value="{{ old('preferensi.' . $item['id'] . '.jawaban', $item['jawaban'] ?? '') }}">
                        <x-events.error-message error="{{ 'preferensi.' . $item['id'] . '.jawaban' }}" />
                    </div>
                    <div class="col-4">
                        <select name="preferensi[{{ $item['id'] }}][nilai]"
                            class="form-control @error('preferensi.' . $item['id'] . '.nilai') is-invalid @enderror">
                            @foreach ([0, 70, 80, 90] as $nilai)
                                <option
                                    {{ old('preferensi.' . $item['id'] . '.nilai', $item['nilai'] ?? '') == $nilai ? 'selected' : '' }}
                                    value="{{ $nilai }}">
                                    {{ $nilai == 0 ? 'Nilai' : $nilai }}</option>
                            @endforeach
                        </select>
                        <x-events.error-message error="{{ 'preferensi.' . $item['id'] . '.nilai' }}" />
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm btn-block remove-input"
                    @if ($preferensi->count() <= 1) style="display: none;" @endif>
                    <i class="nav-icon fa fa-trash"></i>
                </button>
            </div>
        @endforeach
    </div>
    <hr>
</div>
<div class="row mb-3">
    <div class="col-sm-4"></div>
    <div class="col-sm-8">
        <hr>
        <button type="button" class="btn btn-success btn-sm btn-block add-input">
            <i class="nav-icon fa fa-plus"></i>
        </button>
    </div>
</div>

<a class="btn btn-secondary text-white" href="{{ route('survey.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>

@push('script')
    <script>
        const wrapper = $('.inputs-wrapper');
        var lastID = {{ $preferensi->max('id') }};
        $(document).ready(function() {
            $('.add-input').click(function() {
                $('.remove-input').fadeIn('normal');
                lastID++;
                const newInput = `
                    <div class="form-group">
                        <input type="hidden" name="preferensi[${lastID}][id]" value="${lastID}">
                        <div class="row mb-1">
                            <div class="col-8">
                                <input name="preferensi[${lastID}][jawaban]" class="form-control" value="">
                            </div>
                            <div class="col-4">
                                <select name="preferensi[${lastID}][nilai]" class="form-control">
                                    @foreach ([0, 70, 80, 90] as $nilai)
                                        <option {{ $nilai == 0 ? 'selected' : '' }} value="{{ $nilai }}">
                                            {{ $nilai == 0 ? 'Nilai' : $nilai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm btn-block remove-input">
                            <i class="nav-icon fa fa-trash"></i>
                        </button>
                    </div>
                `;
                $(newInput).hide().appendTo(wrapper).fadeIn('normal');
            });

            $(document).on('click', '.remove-input', function() {
                const index = wrapper.find('.form-group').length;
                if (index === 2) $('.remove-input').fadeOut('normal')
                $(this).closest('.form-group').fadeOut('normal', function() {
                    $(this).remove();
                });
            });
        });
    </script>
@endpush
