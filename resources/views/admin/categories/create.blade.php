@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>

<div class="col-md-8">
    <form method="POST" action="/admin/categories" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Category Name</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="name" value="{{old('title')}}" required autofocus>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" required>
          @error('slug')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
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