@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Task Status</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/tasks/{{$task->id}}" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-4">
            <label for="name" class="form-label">Penyedia</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $name }}" readonly>
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $task->title)}}" readonly>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="body" class="form-label">Deskripsi Pekerjaan</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $task->body)}}</textarea>
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Jenis Pekerjaan</label>
            <input type="text" class="form-control @error('waktu_pekerjaan') is-invalid @enderror" id="waktu_pekerjaan" name="waktu_pekerjaan" value="{{old('waktu_pekerjaan', $task->waktu_pekerjaan)}}" readonly>
            @error('waktu_pekerjaan')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Tanggal</label>
            <input type="text" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" value="{{$task->tgl_mulai. ' s/d ' .$task->tgl_selesai}}" readonly>
            @error('tgl_mulai')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Waktu</label>
            <input type="text" class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk" name="jam_masuk" value="{{$task->jam_masuk.' s/d '.$task->jam_selesai}}" readonly>
            @error('jam_masuk')
              <div class="invalid-feedback">
                {{$message}}
              </div>
        @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Harga yang Ditawarkan</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="@currency($task->price),-" readonly>
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pekerjaan</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="active">Active</option>
              <option value="inactive">Invactive</option>
            </select>
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