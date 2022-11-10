@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Halaman Utama</h1>
</div>

<div class="col-lg-8 mb-3">
    <form method="post" action="/dashboard/home/{{ $home->id }}" enctype="multipart/form-data">
      @method('put')
        @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $home->title) }}" required autofocus>
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Unggah Gambar</label>
      <input type="hidden" name="oldImage" value="{{ $home->image }}">
      @if ($home->image)
      <img src="{{ asset('/storage/'. $home->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else
          <img class="img-preview img-fluid mb-3 col-sm-5" >
      @endif
      
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Deskripsi</label>
        <input id="body" type="hidden" name="body" value="{{ old('body', $home->body) }}">
        @error('body')
        <div class="text-danger">
            {{ $message }}
          </div>
        @enderror
        <trix-editor input="body"></trix-editor>
      </div>
    
    <button type="submit" class="btn btn-primary">Ubah Halaman Utama</button>
    <a href="/dashboard/home" class="btn btn-primary ">Batal</a>
</form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title='+ title.value)
    .then(response => response.json() )
    .then (data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });

  function previewImage(){
  const image =document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

imgPreview.style.display ='block';

const oFReader = new FileReader();
oFReader.readAsDataURL(image.files[0]);

oFReader.onload = function(oFREvent){
  imgPreview.src = oFREvent.target.result;

}
}
</script>

    
@endsection