@extends('layouts.app', ['breadcrumb' => 'Panduan PHBS'])
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($list_indikator as $indikator)
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="{{ $indikator->path_foto }}" class="card-img-top" alt="{{ $indikator->judul }}">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder py-3 text-capitalize">{{ $indikator->judul }}</h5>
                            {!! Str::limit($indikator->isi, 250, '...') !!}
                        </div>
                        @if (Str::length($indikator->isi) > 250)
                            <div class="card-footer">
                                <a href="{{ route('indikator.show', ['slug' => $indikator->slug]) }}"
                                    class="btn btn-primary">Baca selengkapnya</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
