@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Akun</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/users/{{ $user->username }}" >
      @method('put')
        @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" >
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" >
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="is_admin" class="form-label ">Role</label>
        <select class="form-select" name="is_admin" >
          <option value="{{ '1' }}" >{{ 'Admin' }}</option>
          <option value="{{ '0' }}" selected>{{ 'User' }}</option>
        </select>
      </div>

    
    <button type="submit" class="btn btn-primary">Ubah Pengguna</button>
    <a href="/dashboard/users" class="btn btn-primary ">Batal</a>
</form>

</div>


    
@endsection