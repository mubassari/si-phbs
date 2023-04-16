@extends('layouts.app', ['breadcrumb' => 'Tambah User'])
@section('content')
    <x-user-profile :user="$user">
        <div class="card card-yellow">
            <div class="card-header align-middle">
                <h2 class="card-title text-bold">Form Edit User</h2>
                <div class="float-right">
                    <a href="{{ route('user.index') }}" class="btn btn-default text-dark">List User</a>
                </div>
            </div>
            <form class="form-horizontal" id="form-member" method="POST" enctype="multipart/form-data"
                action="{{ route('user.update', ['user' => $user->id]) }}">
                @csrf @method('PATCH')
                <div class="card-body">
                    @include('pages.user.form', ['tombol' => 'Simpan Perubahan'])
                </div>
            </form>
        </div>
        <div class="card card-yellow">
            <div class="card-header align-middle">
                <h2 class="card-title text-bold">Form Edit Status</h2>
                <div class="float-right">
                    <a href="{{ route('user.index') }}" class="btn btn-default text-dark">List User</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" id="form-member" method="POST"
                    action="{{ route('user.status.update', ['user' => $user->id]) }}">
                    @csrf
                    <x-forms.input-switch label="Status Verifikasi" name="status_verifikasi"
                        itemValue="{{ $user->status_verifikasi }}" />
                    <x-forms.input-switch label="Status Partisipasi" name="status_partisipasi"
                        itemValue="{{ $user->status_partisipasi }}" />
                    <x-forms.input-switch label="Status Draft" name="status_draft" itemValue="{{ $user->status_draft }}" />
                    <x-forms.input-group label="Tambahkan Catatan" name="catatan_admin" id="catatan_admin" type="text"
                        itemValue="{{ $user->catatan_admin }}" />

                    <a class="btn btn-secondary text-white" href="{{ route('user.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </x-user-profile>
@endsection
