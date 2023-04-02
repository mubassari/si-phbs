@extends('layouts.app', ['breadcrumb' => 'Masuk'])
@section('content')
<div class="row my-4 w-100">
    <div class="col-12 col-sm-6 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Masuk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="p-2">
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('authenticate') }}">
              @csrf
              <div class="card-body">
                <x-forms.input-group label="No Telpon" name="telpon" id="telpon" type="number" />
                <x-forms.input-group label="Kata Sandi" name="password" id="password" type="password" />
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Masuk</button>
                <a href="{{ route('register') }}" class="btn btn-warning float-right">Daftar</a>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
    </div>
</div>
@endsection
