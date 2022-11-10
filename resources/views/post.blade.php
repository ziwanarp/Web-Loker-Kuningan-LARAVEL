@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title}}</h1>
            <p>by. <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}"class="text-decoration-none">{{ $post->category->name }}</a></p>
            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
            <img src="{{ asset('/storage/'. $post->image) }}" class="card-img-top" alt="...">
            </div>
            @else
            <img src="https://picsum.photos/1200/400" class="card-img-top" alt="...">
            @endif
            <article class="my-3 fs-6">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="text-decoration-none btn btn-primary">Kembali</a>
        </div>
    </div>
</div>


    
@endsection
