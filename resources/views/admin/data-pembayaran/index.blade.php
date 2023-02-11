@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Data Pembayaran Pekerja</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-12">
      <a href="/admin/data-pembayaran/create" class="btn btn-primary mb-3">Buat Pembayaran Baru</a>
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Penerima</th>
            <th>Jumlah</th>
            <th>Waktu dikirim</th>
          </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $payment->rekening->employee->user->name}}</td>
              <td>@currency($payment->jumlah),- </td>
              <td>{{ $payment->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
  