@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Buat Data Provinsi</h1>
</div>

<div class="col-md-8">
    <form method="POST" action="/admin/data-region" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label"> Nama Provinsi</label>
          <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" id="nama_provinsi" name="nama_provinsi" value="{{old('nama_provinsi')}}" required>
          @error('nama_provinsi')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
</div>
<script>
 const title  = document.querySelector('#title');
 const slug   = document.querySelector('#slug');

 title.addEventListener('change', function(){
  fetch('/dashboard/categories/checkSlug?title=' + title.value)
  .then(response => response.json())
  .then(data => slug.value = data.slug)
 });

</script>

@endsection