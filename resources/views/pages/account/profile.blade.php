@extends('layouts.app', ['breadcrumb' => 'Lihat Profil'])
@section('content')
    <x-user-profile>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Profil</h3>
            </div>
            <div class="card-body">
                @if (isset($user->catatan_admin))
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Catatan:</h5>
                        <p>{{ $user->catatan_admin }}</p>
                    </div>
                @endif
                <form class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
                    @csrf @method('PATCH')
                    <x-forms.input-group label="Nama" name="nama" id="nama" type="text"
                        itemValue="{{ $user->nama }}" />
                    <x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number"
                        itemValue="{{ $user->telpon }}" />
                    <x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text"
                        itemValue="{{ $user->alamat }}" />
                    <x-forms.input-image label="Foto KTP" name="foto_ktp" :src="$user->path_foto_ktp ?? null" />
                    <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" id="password">
            <div class="card-header">
                <h3 class="card-title">Form Kata Sandi</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('profile.password', ['user' => $user->id]) }}"
                    method="POST">
                    @csrf @method('PATCH')
                    <x-forms.input-group id="kata_sandi_lama" type="password" label='Kata Sandi Lama' name='kata_sandi_lama'
                        old="false" />
                    <x-forms.input-group id="password" type="password" label='Kata Sandi' name='password' />
                    <x-forms.input-group id="password_confirmation" type="password" label='Konfirmasi Kata Sandi'
                        name='password_confirmation' />
                    <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-user-profile>
@endsection
