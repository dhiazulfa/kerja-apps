@extends('pekerja.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Pembayaran yang Diterima</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-12">
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Rekening</th>
            <th>Nama Bank</th>
            <th>Atas Nama</th>
            <th>Pekerjaan</th>
            <th>Jumlah</th>
            <th>Bukti Pembayaran</th>
          </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $payment->rekening->nomor_rekening}}</td>
              <td>{{ $payment->rekening->nama_bank}}</td>
              <td>{{ $payment->rekening->nama_pemilik}}</td>
              <td>{{ $payment->task->task->title}}</td>
              <td>@currency($payment->jumlah)</td>
              <td><a href="#" data-toggle="modal" data-target="#imageModal{{ $loop->iteration }}">
                <img src="{{ asset('storage/' . $payment->bukti_pembayaran) }}" width="100"></a>
              </td>
            </tr>
            @endforeach
        </tbody>

        @foreach($payments as $payment)

        <div class="modal fade" id="imageModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <img src="{{ asset('storage/' . $payment->bukti_pembayaran) }}" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
        @endforeach
      </table>
    </div>
</div>
@endsection
  