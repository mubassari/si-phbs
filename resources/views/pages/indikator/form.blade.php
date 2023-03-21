<x-forms.input-group label="Judul" name="judul" id="judul" type="text" itemValue="{{ $indikator->judul ?? '' }}"/>
<div class="form-group row">
    <label for="isi" class="col-sm-4 col-form-label">Isi</label>
    <div class="col-sm-8">
        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi" cols="30" rows="5">{{ $indikator->isi ?? '' }}</textarea>
        <x-events.error-message error="isi" />
    </div>
</div>
<div class="form-group row">
    <label for="bio_profil" class="col-sm-4 col-form-label">Foto</label>
    <div class="col-sm-8">
        <div class="custom-file @error('foto') has-error @enderror">
            <input type="file" name="foto" class="custom-file-input" id="foto">
            <label class="custom-file-label">Pilih Foto</label>
            @error('foto')
                <div style="font-size: 80%;color: #dc3545;" class="text-error mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
@if ($indikator ?? false)
    <div class="col-sm-8 offset-sm-4 text-center">
        <img src="{{ $indikator->path_foto }}" alt="" class="img img-thumbnail" width="180px">
    </div>
@endif
<a class="btn btn-warning text-white" href="{{ route('indikator.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
@push('style')
    <style>
        .has-error {
            padding-bottom: 10mm;
            border: .5px solid #dc3545; 
            border-radius: 5px
        }
    </style>
@endpush
@push('script')
    <script>
        $('input[type="file"]').on('change', function () {
                    let filenames = [];
                    let image = document.getElementById('foto');
                    for (let i in image.files) {
                    if (image.files.hasOwnProperty(i)) {
                        filenames.push(image.files[i].name);
                        }
                    }
                    $(this).next('.custom-file-label').addClass("selected").
                    html(filenames.join(', '));
            });
    </script>
@endpush