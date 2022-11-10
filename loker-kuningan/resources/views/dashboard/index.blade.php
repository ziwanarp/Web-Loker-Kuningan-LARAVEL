@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hallo, {{ auth()->user()->name }}</h1>
</div>
<div class="row">
  <div class="col-sm-3 ">
    <div class="card">
      <div class="card-body">
        {{-- hitung semua postingan --}}
        <h5 class="card-title text-center">{{ $posts->count() }}</h5>
        <p class="text-center">Semua Loker</p>
        @if (auth()->user()->is_admin == 1)
            <a href="/dashboard/allposts" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
        @else
            <a href="/posts" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
        @endif
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        {{-- hitung semua postingan saya --}}
        <h5 class="card-title text-center">{{ $mypost->count() }}</h5>
        <p class="text-center">Loker Saya</p>
        <a href="/dashboard/posts" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
      </div>
    </div>
  </div>

  @can('admin')  
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        {{-- user 0 = is_admin false --}}
        <h5 class="card-title text-center">{{ $user0->count() }}</h5>
        <p class="text-center">Users</p>
        <a href="/dashboard/users" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        {{-- user 1 = is_admin true --}}
        <h5 class="card-title text-center">{{ $user1->count() }}</h5>
        <p class="text-center">Admin</p>
        <a href="/dashboard/users" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        {{-- hitung semua kategori --}}
        <h5 class="card-title text-center">{{ $category->count() }}</h5>
        <p class="text-center">Lokasi</p>
        <a href="/dashboard/categories" class="btn btn-primary d-flex justify-content-center mt-3">Lihat</a>
      </div>
    </div>
  </div>
</div>

@endcan

  @endsection