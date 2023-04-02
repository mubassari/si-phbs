@extends('layouts.app', ['breadcrumb' => 'Lihat Profil'])
@section('content')
    <x-user-profile>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Kata Sandi</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('password.update', ['user' => $user->id]) }}"
                            method="POST">
                            @csrf
                            <x-forms.input-group id="kata_sandi_lama" type="password" label='Kata Sandi Lama'
                                name='kata_sandi_lama' old="false" />
                            <x-forms.input-group id="password" type="password" label='Kata Sandi' name='password' />
                            <x-forms.input-group id="password_confirmation" type="password" label='Konfirmasi Kata Sandi'
                                name='password_confirmation' />
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </x-user-profile>
    </div>
@endsection
<x-forms.preview-foto-ktp />
