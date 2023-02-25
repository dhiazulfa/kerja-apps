@extends('pekerja.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Deskripsi Pekerjaan</h1>
</div>

<div class="col-lg-12">
    <form method="POST" action="/tasks" class="mb-5">
      @method('post')
        @csrf

      <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Title: <b> {{$task->title}} </b></label>
        <input type="text" class="form-control @error('task_id') is-invalid @enderror" id="task_id" name="task_id" value="{{$task->id}}" hidden>
      </div>

      <div class="mb-3 col-md-4">
          <label for="body" class="form-label">Deskripsi Pekerjaan</label>
          <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $task->body)}}</textarea>
      </div>

      <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Jenis Pekerjaan: <b>{{$task->waktu_pekerjaan}}</b></label>
      </div>

      <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Wilayah: <b>{{$task->subregion->nama_kabupaten}}, {{$task->region->nama_provinsi}}</b></label>
    </div>

      <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Jenis Kelamin yang dibutuhkan: <b>{{$task->jk_pekerja}}</b></label>
      </div>

      <div class="mb-3 col-md-4">
        <label for="title" class="form-label">Umur: <b>{{$task->umur_min. ' tahun s/d ' .$task->umur_max.' tahun'}}</b></label>
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

        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="inactive" hidden>

        <div class="mb-3 col-md-4">
          <button type="submit" class="btn btn-primary">Ambil Pekerjaan</button>
        </div>
    </form>
</div>
</div>

@endsection