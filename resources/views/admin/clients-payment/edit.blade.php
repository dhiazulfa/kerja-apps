@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Lakukan Pembayaran Pekerjaan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/clients-payment" enctype="multipart/form-data" class="mb-5">
        @csrf

        <div>
          <p>Pembayaran dapat ditransfer ke rekening: <b> MANDIRI A/N PT. Daily Worker dengan Nomor Rekening:
             1010101010101010 </b> 
          </p>
        </div>

        <input type="text" class="form-control" name="client_id" value="{{ $acceptedTask->task->client_id }}" hidden readonly>
        <input type="text" class="form-control" name="accepted_id" value="{{ $acceptedTask->id }}" hidden readonly>

        <div>
          <p>Untuk Pekerjaan: <b> {{ $acceptedTask->task->title }} </b> </p>
        </div>

        <div>
          <p>Sejumlah: <b> @currency($acceptedTask->task->price),- </b> </p>
        </div>

        <div>
          <p>Ditujukan Kepada: <b> {{ $acceptedTask->employee->name }} </b> </p>
        </div>

        <div class="mb-3">
            <label for="foto_bukti" class="form-label">Foto Bukti</label>
            <input type="file" class="form-control @error('foto_bukti') is-invalid @enderror" id="foto_bukti" name="foto_bukti" value="{{old('foto_bukti')}}" required>
            @error('foto_bukti')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Kirim Pembayaran</button>
    </form>

    
</div>
</div>

@endsection