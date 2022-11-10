@extends('layouts.main')

@section('container')

 @foreach ($homes as $home)
<div class="card mb-3">
  @if ($home->image)
  <div style="max-height: 300px; overflow:hidden;">
  <img src="{{ asset('/storage/'. $home->image) }}" class="card-img-top"  alt="...">
  </div>
  @else
  <img src="https://picsum.photos/1200/400" class="card-img-top" alt="...">
  @endif
    <div class="card-body text-center">
      <h3 class="card-title">{{ $home->title }}</h3>
      {{-- <p>
        <small class="text-muted">by. <a href="/posts?user={{ $home->user->username }}" class="text-decoration-none">{{ $home->user->name }}</a> in <a href="/posts?category={{ $home->category->slug }}"class="text-decoration-none">{{ $home->category->name }}</a> {{ $home->created_at->diffForHumans() }}
        </small>
      </p> --}}
      <p class="card-text">{!! $home->body !!}</p>
      <a href="/posts" class="text-decoration-none btn btn-primary">Cek Loker</a>
      <a href="/register" class="text-decoration-none btn btn-primary">Registrasi Akun</a>
      @endforeach
    </div>

@endsection
   
