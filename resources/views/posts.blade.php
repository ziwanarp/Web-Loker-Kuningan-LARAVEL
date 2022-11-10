@extends('layouts.main')

@section('container')

<h2 class="mb-3 text-center">{{ $title }}</h2>

<div class="row justify-content-center mb-2">
  <div class="col-md-6">
    <form action="/posts" >
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}" >
      @endif
      @if (request('user'))
      <input type="hidden" name="user" value="{{ request('user') }}" >
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-secondary" type="submit" >Search</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
<div class="card mb-3">
  @if ($posts[0]->image)
  <div style="max-height: 350px; overflow:hidden;">
  <img src="{{ asset('/storage/'. $posts[0]->image) }}" class="card-img-top"  alt="...">
  </div>
  @else
  <img src="https://picsum.photos/1200/400" class="card-img-top" alt="...">
  @endif
    <div class="card-body text-center">
      <h3 class="card-title">{{ $posts[0]->title }}</h3>
      <p>
        <small class="text-muted">Oleh <a href="/posts?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> lokasi <a href="/posts?category={{ $posts[0]->category->slug }}"class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
    </div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-2 py-1 text-white" style="background-color:rgba(0,0,0,0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white tex text-decoration-none">{{ $post->category->name }}</a></div>
                @if ($post->image)
                <div style="max-height: 250px; overflow:hidden;">
                <img src="{{ asset('/storage/'. $post->image) }}" class="card-img-top" alt="...">
                </div>
                @else
                {{-- <div style="max-height: 500px; overflow:hidden;"> --}}
                <img src="https://picsum.photos/1200/500" class="card-img-top" alt="...">
                {{-- </div> --}}
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p>
                    <small class="text-muted">by. <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}
                    </small>
                  </p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
    <p class="text-center fs-4">Post Not Found.</p>
@endif

<div class="d-flex justify-content-center">
{{ $posts->links() }}
</div>

@endsection