@extends('layouts.app', ['breadcrumb' => 'Lihat Profil'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{ $user->nama }} {!! $user->icon_status_verifikasi !!}</h3>
                        <p class="text-muted text-center">{{ $user->is_admin ? 'Admin' : 'User' }}</p>
                        @if (!$user->status_verifikasi)
                            <div class="alert alert-warning text-center">User belum diverifikasi oleh admin</div>
                        @endif
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>No Telpon</b> <a class="float-right">{{ $user->telpon }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>ALamat</b> <a class="float-right">{{ $user->alamat }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Kata Sandi</h3>
                    </div>
                    <div class="card-body">
                        <x-events.alert-success />
                        <form class="form-horizontal" action="{{ route('password.update', ['user'  => $user->id]) }}" method="POST">
                            @csrf
                            <x-forms.input-group id="password_old" type="password" label='Kata Sandi Lama' name='password_old' />
                            <x-forms.input-group id="password" type="password" label='Kata Sandi' name='password' />
                            <x-forms.input-group id="password_confirmation" type="password" label='Konfirmasi Kata Sandi' name='password_confirmation' />
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-forms.preview-foto-ktp />