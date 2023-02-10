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
            <label for="name" class="form-label">Penyedia: <b> {{ $name }} </b></label>
        </div>

        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Title: <b> {{$task->title}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Deskripsi Pekerjaan</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $task->body)}}</textarea>
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Jenis Pekerjaan: <b>{{$task->waktu_pekerjaan}}</b></label>
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Tanggal: <b>{{$task->tgl_mulai. ' s/d ' .$task->tgl_selesai}}</b></label>
        </div>

        <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Waktu: <b>{{$task->jam_masuk.' s/d '.$task->jam_selesai}}</b></label>
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Harga yang Ditawarkan: <b> @currency($task->price),- </b></label>
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