@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Informasi Pekerjaan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/tasks/{{$task->id}}" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-4">
            <label for="name" class="form-label">Penyedia: </label>
            <p>
                <b> {{ $name }} </b>
            </p>
        </div>

        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Title: </label>
          <p>
            <b> {{$task->title}} </b>
          </p>
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Jenis Pekerjaan: </label>
            <p>
                <b>{{$task->waktu_pekerjaan}}</b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="title" class="form-label">Alamat: </label>
            <p>
                <b>{{$task->alamat}}</b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="title" class="form-label">Link Maps:</label>
            <p>
                <a href="{{$task->link_maps}}" target="_blank"> <b>{{$task->link_maps}} </b> </a>
            </p>
        </div>

        <div class="mb-3 col-md-6">
            <label for="title" class="form-label">Tanggal: </label>
            <p>
                <b>{{$task->tgl_mulai. ' s/d ' .$task->tgl_selesai}}</b>
            </p>
        </div>

        <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Waktu: </label>
            <p>
                <b>{{$task->jam_masuk.' s/d '.$task->jam_selesai}}</b>
            </p>
        </div>

        <div class="mb-3 col-md-6">
            <label for="price" class="form-label">Harga yang Ditawarkan: </label>
            <p>
                <b> @currency($task->price),- </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
          <label for="title" class="form-label">Deskripsi Pekerjaan: </label>
          <p>
              <b>{{$task->body}}</b>
          </p>
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