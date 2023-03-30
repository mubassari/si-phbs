@extends('layouts.app', ['breadcrumb' => 'Daftar'])
@section('content')
<div class="row my-4 w-100">
    <div class="col-12 col-sm-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header align-middle">
                <h2 class="card-title text-bold">Form Pendaftaran</h2>
            </div>
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <x-forms.input-group label="Nama" name="nama" id="nama" type="text" itemValue="{{ $user->nama ?? '' }}"/>
                    <x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number" itemValue="{{ $user->telpon ?? '' }}"/>
                    <x-forms.input-group label="Kata Sandi" name="password" id="password" type="password" />
                    <x-forms.input-group label="Konfirmasi Kata Sandi" name="password_confirmation" id="password" type="password" />
                    <x-forms.input-group label="Alamat" name="alamat" id="alamat" type="text" itemValue="{{ $user->alamat ?? '' }}"/>
                    <div class="form-group row">
                        <label for="foto_ktp" class="col-sm-4 col-form-label">Foto KTP</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" name="foto_ktp"
                                    class="custom-file-input @error('foto_ktp') is-invalid @enderror"
                                    id="foto_ktp" accept="image/jpeg,image/png,image/jpg">
                                <label class="custom-file-label">Pilih Foto</label>
                                <x-events.error-message error="foto_ktp" />
                            </div>
                        </div>
                    </div>
                <div class="col-sm-8 offset-sm-4 text-center">
                    <img src="{{ asset('assets/dist/img/foto-ktp/default.png') }}" class="img img-thumbnail"id="preview" width="180px">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                  <button type="submit" class="btn btn-success">Daftar</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
    </div>
</div>
@endsection

<x-forms.preview-foto-ktp />