@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Daftar Pembayaran Penyedia</h1>
  </div>
@if(session()->has('success'))

  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-12">
      <table class="table table-bordered table-lg-12">
        <thead>
          <tr>
            <th>No</th>
            <th>Pekerjaan</th>
            <th>Pembayaran Kepada</th>
            <th>Lama Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Penawaran</th>
            <th>Status Pembayaran</th>
            <th>Verifikasi</th>
          </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $payment->task->task->title }}</td>
              <td>{{ $payment->task->employee->name }}</td>
              <td>{{ $payment->task->task->waktu_pekerjaan }}</td>
              <td>{{ $payment->task->task->tgl_mulai }}</td>
              <td>@currency($payment->task->task->price)</td>
              <td>{{$payment->status}}</td>
              @if(Auth::user()->role == 'admin')
              <td>
                  <a href="/admin/admin-payments/{{ $payment->id }}/edit" class="badge bg-warning"><span><svg class="icon me">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg></span></a>
              </td>
              @endif
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
    @endsection