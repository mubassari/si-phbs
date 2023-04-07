<div role="alert" class="alert alert-secondary {{ $user ?? false ? 'd-none' : '' }}">Default password "<b>4 digit terakhir No Telpon</b>"</div>
<x-forms.input-group label="Nama" name="nama" id="nama" type="text" itemValue="{{ $user->nama ?? '' }}"/>
<x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number" itemValue="{{ $user->telpon ?? '' }}"/>
<x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text" itemValue="{{ $user->alamat ?? '' }}"/>
<x-forms.input-image label="Foto KTP" name="foto_ktp" :src="$user->path_foto_ktp ?? null"/>
<a class="btn btn-warning text-white" href="{{ route('user.index') }}">Kembali</a>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
