@extends('layouts.app', ['breadcrumb' => 'Edit Indikator'])
@section('content')
<div class="row my-4 w-100">
    <div class="col-12 col-sm-8 mx-auto">
        <div class="card card-yellow">
        <div class="card-header align-middle">
            <h2 class="card-title text-bold">Form Indikator</h2>
            <div class="float-right">
                <a href="{{ route('indikator.index') }}" class="btn btn-default text-dark">List Indikator</a>
            </div>
        </div>
            <form class="form-horizontal" id="form-member" method="POST" enctype="multipart/form-data" action="{{ route('indikator.update', ['indikator' => $indikator->id]) }}">
                @csrf @method('PATCH')
                <div class="card-body">
                    @include('pages.indikator.form', ['tombol' => 'Simpan Perubahan'])
                </div>
            </form>
        </div>
    </div>
</div>
@endsection