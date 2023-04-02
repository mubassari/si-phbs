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
                            action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST">
                            @csrf @method('PATCH')
                            <x-forms.input-group label="Nama" name="nama" id="nama" type="text"
                                itemValue="{{ $user->nama }}" />
                            <x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number"
                                itemValue="{{ $user->telpon }}" />
                            <x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text"
                                itemValue="{{ $user->alamat }}" />
                            <div class="form-group row">
                                <label for="foto_ktp" class="col-sm-4 col-form-label">Foto KTP</label>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" name="foto_ktp"
                                            class="custom-file-input @error('foto_ktp') is-invalid @enderror" id="foto_ktp"
                                            accept="image/jpeg,image/png,image/jpg">
                                        <label class="custom-file-label">Pilih Foto</label>
                                        <x-events.error-message error="foto_ktp" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 offset-sm-4 text-center">
                                <img src="{{ asset($user->path_foto_ktp) }}" class="img img-thumbnail"id="preview"
                                    width="180px">
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
