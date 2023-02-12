@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Daftar Pembayaran</h1>
  </div>
@if(session()->has('success'))

  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
@endif

@if(isset($error_message))
  <div class="alert alert-danger">
    {{ $error_message }}
  </div>
@else
    <div class="table-responsive col-lg-12">
      <table class="table table-bordered table-lg-12">
        <thead>
          <tr>
            <th>No</th>
            <th>Pekerjaan</th>
            <th>Lama Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Penawaran</th>
            <th>Status Pembayaran</th>
          </tr>
        </thead>
        <tbody>            
            @foreach($payments as $payment)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $payment->task->task->title }}</td>
              <td>{{ $payment->task->task->waktu_pekerjaan }}</td>
              <td>{{ $payment->task->task->tgl_mulai }}</td>
              <td>{{ $payment->task->task->price }}</td>
              <td>{{$payment->status}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
@endif
    @endsection