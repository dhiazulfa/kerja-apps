@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Verifikasi Pembayaran</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/admin-payments/{{$payment->id}}" enctype="multipart/form-data" class="mb-5">
        @csrf
        @method('put')
        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pembayaran</label>
            <select class="form-control" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="accepted">Accepted</option>
              <option value="ditolak">Ditolak</option>
            </select>
        </div>
        
        <div>
            <p>Pengirim: <b> {{ $client->user->name }} </b> </p>
        </div>

        <div>
          <p>Untuk Pekerjaan: <b> {{ $payment->task->task->title }} </b> </p>
        </div>

        <div>
          <p>Sejumlah: <b> @currency($payment->task->task->price),- </b> </p>
        </div>

        <div>
          <p>Ditujukan Kepada: <b> {{ $payment->task->employee->name }} </b> </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Bukti Pembayaran</label>
            <img src="{{asset('storage/' . $payment->foto_bukti)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <button type="submit" class="btn btn-success">Update Status</button>
    </form>

    
</div>
</div>

@endsection