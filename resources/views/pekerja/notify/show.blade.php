@extends('pekerja.layouts.main')

@section('container')

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h1 class="h2">Isi Pesan</h1>
    </div>

    <div class="col-lg-8">
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Title: <b> {{ $notify->title }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Isi pesan: <b> {{$notify->body}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Untuk pekerjaan: <b> {{$notify->task->title}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Untuk tanggal: <b> {{$notify->task->tgl_mulai. ' s/d '. $notify->task->tgl_selesai}} </b></label>
        </div>

        {{-- <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Lampiran</label>
            <img src="{{asset('storage/' . $notify->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div> --}}

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Dikirim: <b> {{$notify->created_at->diffForHumans()}} </b></label>
        </div>
    </div>
</div>

@endsection