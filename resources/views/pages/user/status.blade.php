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
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Status Partisipasi</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label"><i class='icon-copy fa fa-check'></i></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" checked="">
                                    <label class="form-check-label"><i class='icon-copy fa fa-exclamation-circle'></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Status Draft</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label"><i class='icon-copy fa fa-check'></i></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" checked="">
                                    <label class="form-check-label"><i class='icon-copy fa fa-exclamation-circle'></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Status Verifikasi</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label"><i class='icon-copy fa fa-check'></i></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" checked="">
                                    <label class="form-check-label"><i class='icon-copy fa fa-exclamation-circle'></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-warning text-white" href="{{ route('user.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
