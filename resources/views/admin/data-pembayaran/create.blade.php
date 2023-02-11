@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Buat Pembayaran</h1>
</div>

<div class="col-md-8">
  <form method="POST" action="/admin/data-pembayaran" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Jumlah</label>
      <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{old('jumlah')}}" required>
      @error('jumlah')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div>
        <label class="mb-3">Normor Rekening</label>
    </div>
    <div class="input-group col-md-8 mb-4">
        <span class="input-group-text">
          <svg class="icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-building"></use>
          </svg>
        </span>
        <select class="form-control @error('rekening_id') is-invalid @enderror" name="rekening_id" required>
          <option value="rekening_id">-- Nomor Rekening Pekerja --</option>
          @foreach($rekenings as $rekening)
            <option value="{{$rekening->id}}" {{old('rekening') == $rekening->id ? 'selected' : ''}}>{{$rekening->nomor_rekening}} A/N {{$rekening->nama_pemilik}}</option>
          @endforeach
        </select>
    </div>

    <div>
        <label class="mb-3">Task</label>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">
          <svg class="icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-building"></use>
          </svg>
        </span>
        <select class="form-control @error('accepted_id') is-invalid @enderror" name="accepted_id" required>
          <option value="accepted_id">-- Berkaitan Dengan Task --</option>
          @foreach($tasks as $task)
            <option value="{{$task->id}}" {{old('task') == $task->id ? 'selected' : ''}}>{{$task->task->title}} dengan gaji @currency($task->task->price) </option>
          @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Bukti</label>
        <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" value="{{old('bukti_pembayaran')}}" required>
        @error('bukti_pembayaran')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

</div>
</div>

@endsection