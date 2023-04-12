@extends('layouts.app', ['breadcrumb' => 'Daftar'])
@section('content')
    <div class="row my-4 w-100">
        <div class="col-12 col-sm-6 mx-auto">
            <div class="card card-primary">
                <div class="card-header align-middle">
                    <h2 class="card-title text-bold">Form Pendaftaran</h2>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <x-forms.input-group label="Nama" name="nama" id="nama" type="text"
                            itemValue="{{ $user->nama ?? '' }}" />
                        <x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number"
                            itemValue="{{ $user->telpon ?? '' }}" />
                        <x-forms.input-group label="Kata Sandi" name="password" id="password" type="password" />
                        <x-forms.input-group label="Konfirmasi Kata Sandi" name="password_confirmation" id="password"
                            type="password" />
                        <x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text"
                            itemValue="{{ $user->alamat ?? '' }}" />
                        <x-forms.input-image label="Foto KTP" name="foto_ktp" :src="asset('assets/dist/img/foto-ktp/default.png')" formName="ktp" />
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                        <hr>
                        Sudah punya akun? &nbsp;<a href="{{ route('login') }}">Masuk</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
