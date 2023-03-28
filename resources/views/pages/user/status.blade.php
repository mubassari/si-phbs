@extends('layouts.app', ['breadcrumb' => 'Edit Status'])
@section('content')
<div class="row my-4 w-100">
    <div class="col-12 col-sm-8 mx-auto">
        <div class="card card-yellow">
        <div class="card-header align-middle">
            <h2 class="card-title text-bold">Form Edit Status</h2>
            <div class="float-right">
                <a href="{{ route('user.index') }}" class="btn btn-default text-dark">List User</a>
            </div>
        </div>
            <form class="form-horizontal" id="form-member" method="POST" action="{{ route('user.status.update', ['user' => $user->id]) }}">
                @csrf
                <div class="card-body">
                    <x-forms.radio-status label="Status Verifikasi" name="status_verifikasi" itemValue="{{ $user->status_verifikasi }}"/>
                    <x-forms.radio-status label="Status Partisipasi" name="status_pertisipasi" itemValue="{{ $user->status_partisipasi }}"/>
                    <x-forms.radio-status label="Status Draft" name="status_draft" itemValue="{{ $user->status_draft }}"/>
                    <x-forms.input-group label="Tambahkan Catatan" name="catatan_admin" id="catatan_admin" type="text" itemValue="{{ $user->catatan_admin }}" />
                    
                        <a class="btn btn-warning text-white" href="{{ route('user.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
