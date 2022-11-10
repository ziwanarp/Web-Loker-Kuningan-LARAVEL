@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Halaman Utama</h1>
</div>

<div class="table-responsive col-lg-8">
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
          <th scope="col">Judul</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($homes as $home)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $home->title }}</td>
          <td>
            <a href="/dashboard/home/{{ $home->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/home/{{ $home->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  @endsection