@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Update Status Pekerjaan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/clients-employee/{{$acceptedTask->id}}" enctype="multipart/form-data" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pekerjaan</label>
            <input type="text" value="{{$acceptedTask->id}}" hidden>

            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="on_progress">Sedang Dikerjakan</option>
              <option value="done">Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="foto_bukti" class="form-label">Foto Bukti</label>
            <input type="file" class="form-control @error('foto_bukti') is-invalid @enderror" id="foto_bukti" name="foto_bukti" value="{{old('foto_bukti')}}" required>
            @error('foto_bukti')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>

    
</div>
</div>
<script>
 const title  = document.querySelector('#title');
 const slug   = document.querySelector('#slug');
 title.addEventListener('change', function(){
  fetch('/admin/competencies/checkSlug?title=' + title.value)
  .then(response => response.json())
  .then(data => slug.value = data.slug)
 });
</script>

@endsection