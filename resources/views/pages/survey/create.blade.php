@extends('layouts.app', ['breadcrumb' => 'Tambah Suervey'])
@section('content')
<div class="row my-4 w-100">
    <div class="col-12 col-sm-8 mx-auto">
        <div class="card card-yellow">
        <div class="card-header align-middle">
            <h2 class="card-title text-bold">Form Survey</h2>
            <div class="float-right">
                <a href="{{ route('survey.index') }}" class="btn btn-default text-dark">List Survey</a>
            </div>
        </div>
            <form class="form-horizontal" id="form-member" method="POST" action="{{ route('survey.store') }}">
                @csrf
                <div class="card-body">
                    @include('pages.survey.form', ['tombol' => 'Simpan'])
                </div>
            </form>
        </div>
    </div>
</div>
@endsection