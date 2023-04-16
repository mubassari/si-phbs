@extends('layouts.app', ['breadcrumb' => $indikator->judul])
@section('content')
    <div class="card mx-md-5 px-md-5">
        <img src="{{ $indikator->path_foto }}" class="card-img-top rounded mx-auto d-block my-3" style="width: 18rem;"
            alt="{{ $indikator->judul }}">
        <div class="card-body">
            <div class="card-text">{!! $indikator->isi !!}</div>
        </div>
    </div>
@endsection
