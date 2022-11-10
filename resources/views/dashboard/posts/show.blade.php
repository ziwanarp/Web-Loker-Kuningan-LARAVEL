@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title}}</h1>
            
            <a href="/dashboard/posts" class="text-decoration-none btn btn-primary mb-3"><span data-feather="arrow-left"></span> Kembali</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none btn btn-warning mb-3 text-white"><span data-feather="edit"></span> Ubah</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="text-decoration-none btn btn-danger mb-3" onclick="return confirm('Hapus postingan dengan judul: ({{ $post->title }}) ?');"><span data-feather="x-circle"></span>Hapus</button>
            </form>
            @if ($post->image)
            <img src="{{ asset('/storage/'. $post->image) }}" class="card-img-top" alt="...">
            @else
            <img src="https://picsum.photos/1200/300" class="card-img-top" alt="...">
            @endif
            <article class="my-3 fs-6">
                {!! $post->body !!}
            </article>
            
        </div>
    </div>
</div>

@endsection