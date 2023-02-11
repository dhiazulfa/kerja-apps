@extends('pekerja.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Data Nomor Rekening</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-6">
      <table class="table table-bordered table-sm">
        <a href="/pekerja/rekening/create" class="btn btn-primary mb-3">Masukkan Nomor Rekening Baru</a>
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Rekening</th>
            <th>Nama Bank</th>
            <th>Atas Nama</th>
          </tr>
        </thead>
        <tbody>
            @foreach($rekening as $rekening)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $rekening->nomor_rekening}}</td>
              <td>{{ $rekening->nama_bank}}</td>
              <td>{{ $rekening->nama_pemilik}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
  