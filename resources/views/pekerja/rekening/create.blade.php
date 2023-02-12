@extends('pekerja.layouts.main')
@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Masukkan Nomor Rekening Baru</h1>
</div>

<div class="col-md-4">
  <form method="POST" action="/pekerja/rekening" class="mb-5" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
      <label for="title" class="form-label">Nomor Rekening</label>
      <input type="text" class="form-control @error('nomor_rekening') is-invalid @enderror" id="nomor_rekening" name="nomor_rekening" value="{{old('nomor_rekening')}}" required>
      @error('nomor_rekening')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Nama Bank</label>
        <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank" name="nama_bank" value="{{old('nama_bank')}}" required>
        @error('nama_bank')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="title" class="form-label">Atas Nama</label>
        <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{old('nama_pemilik')}}" required>
        @error('nama_pemilik')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
    
    <button type="submit" class="btn btn-primary">Buat</button>
</form>

</div>
</div>

@endsection