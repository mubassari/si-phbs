<div role="alert" class="alert alert-secondary {{ $user ?? false ? 'd-none' : '' }}">Default password "<b>4 digit terakhir No Telpon</b>"</div>
<x-forms.input-group label="Nama" name="nama" id="nama" type="text" itemValue="{{ $user->nama ?? '' }}"/>
<x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number" itemValue="{{ $user->telpon ?? '' }}"/>
<x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text" itemValue="{{ $user->alamat ?? '' }}"/>
<div class="form-group row">
    <label for="bio_profil" class="col-sm-4 col-form-label">Foto KTP</label>
    <div class="col-sm-8">
        <div class="custom-file @error('foto_ktp') has-error @enderror">
            <input type="file" name="foto_ktp" class="custom-file-input" id="foto_ktp">
            <label class="custom-file-label">Pilih Foto</label>
            @error('foto_ktp')
                <div style="font-size: 80%;color: #dc3545;" class="text-error mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
@if ($user ?? false)
    <div class="col-sm-8 offset-sm-4 text-center">
        <img src="{{ $user->path_foto_ktp }}" alt="" class="img img-thumbnail" width="180px">
    </div>
@endif
<a class="btn btn-warning text-white" href="{{ route('user.index') }}">Kembali</a>
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
                    let image = document.getElementById('foto_ktp');
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