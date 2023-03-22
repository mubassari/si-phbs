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
        <div class="custom-file">
            <input type="file" name="foto"
                class="custom-file-input @error('foto') is-invalid @enderror"
                id="foto" accept="image/jpeg,image/png,image/jpg"
            >
            <label class="custom-file-label">Pilih Foto</label>
            <x-events.error-message error="foto" />
        </div>
    </div>
</div>
<div class="col-sm-8 offset-sm-4 text-center">
    <img
        src="{{ $indikator->path_foto ?? null }}"
        class="img img-thumbnail @if (!isset($indikator)) invisible @endif"
        id="preview" width="180px"
    >
</div>
<a class="btn btn-warning text-white" href="{{ route('indikator.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>

@push('script')
    <script>
        $('#foto').on('change', function(event) {
            let filenames = [];
            let image = document.getElementById('foto');
            for (let i in image.files) {
                if (image.files.hasOwnProperty(i)) {
                    filenames.push(image.files[i].name);
                }
            }
            $(this).next('.custom-file-label').addClass("selected").
            html(filenames.join(', '));

            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.classList.remove("invisible");
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endpush
