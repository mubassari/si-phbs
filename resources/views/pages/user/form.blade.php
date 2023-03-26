<div role="alert" class="alert alert-secondary {{ $user ?? false ? 'd-none' : '' }}">Default password "<b>4 digit terakhir No Telpon</b>"</div>
<x-forms.input-group label="Nama" name="nama" id="nama" type="text" itemValue="{{ $user->nama ?? '' }}"/>
<x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number" itemValue="{{ $user->telpon ?? '' }}"/>
<x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text" itemValue="{{ $user->alamat ?? '' }}"/>
<div class="form-group row">
    <label for="foto_ktp" class="col-sm-4 col-form-label">Foto KTP</label>
    <div class="col-sm-8">
        <div class="custom-file">
            <input type="file" name="foto_ktp"
                class="custom-file-input @error('foto_ktp') is-invalid @enderror"
                id="foto_ktp" accept="image/jpeg,image/png,image/jpg"
            >
            <label class="custom-file-label">Pilih Foto</label>
            <x-events.error-message error="foto_ktp" />
        </div>
    </div>
</div>
<div class="col-sm-8 offset-sm-4 text-center">
    <img
        src="{{ $user->path_foto_ktp ?? null }}"
        class="img img-thumbnail @if (!isset($user)) invisible @endif"
        id="preview" width="180px"
    >
</div>
<a class="btn btn-warning text-white" href="{{ route('user.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>

<x-forms.preview-foto-ktp />
