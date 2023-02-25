@extends('pekerja.layouts.main')

@section('container')

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h1 class="h2">Deskripsi Pekerjaan</h1>
    </div>
    <div class="col-lg-8">
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Title: <b> {{ $acceptedTask->task->title }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Deskripsi Pekerjaan: <b> {{$acceptedTask->task->body}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Punishment: <b> {{$acceptedTask->task->punishment}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Gaji ditawarkan: <b> @currency($acceptedTask->task->price) </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Tanggal: <b> {{$acceptedTask->task->tgl_mulai. ' s/d '.$acceptedTask->task->tgl_selesai}} </b></label>
        </div>

        {{-- <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Kontak Penyedia kerja: <b> {{$task}} </b></label>
        </div> --}}
    </div>
</div>

@endsection