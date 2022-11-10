@extends('dashboard.layouts.main')

@section('container')


@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $home->title}}</h1>
            
            <a href="/dashboard/home" class="text-decoration-none btn btn-primary mb-3"><span data-feather="arrow-left"></span> Kembali</a>
            <a href="/dashboard/home/{{ $home->id }}/edit" class="text-decoration-none btn btn-warning mb-3 text-white"><span data-feather="edit"></span> Edit</a>
            @if ($home->image)
            <img src="{{ asset('/storage/'. $home->image) }}" class="card-img-top" alt="...">
            @else
            <img src="https://picsum.photos/1200/300" class="card-img-top" alt="...">
             @endif
            <article class="my-3 fs-6">
                {!! $home->body !!}
            </article>
            
        </div>
    </div>
</div>

@endsection