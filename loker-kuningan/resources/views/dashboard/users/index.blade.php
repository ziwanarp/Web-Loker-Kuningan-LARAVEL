@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Akun Pengguna</h1>
</div>

<div class="table-responsive col-lg-8">
  <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah Akun</a>
  @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          @if ($user->is_admin)
          <td>{{ 'Admin' }}</td>    
          @else
          <td>{{ 'User' }}</td>
          @endif
        
          <td>
            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Hapus {{ ($user->is_admin == true) ? 'Admin' : 'User' }} {{ $user->name }} ?');"><span data-feather="x-circle"></span></button>
          </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  @endsection