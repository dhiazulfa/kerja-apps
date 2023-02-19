@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Daftar Pekerjaan Selesai</h1>
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
            <th>Nama</th>
            <th>Nomor Telefon</th>
            <th>Pekerjaan</th>
            <th>Catatan Pekerjaan</th>
            <th>Rating</th>
            <th>Tanggal Selesai</th>
            <th>Gaji</th>
          </tr>
        </thead>
        <tbody>
            @foreach($acceptedTasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->employee->name}}</td>
              <td>{{ $task->employee->phone_number}}</td>
              <td>{{ $task->task->title }}</td>
              <td>{{ $task->catatan_pekerjaan }}</td>
              <td>{{ $task->rating }}</td>
              <td>{{ $task->task->tgl_selesai }}</td>
              <td> @currency($task->task->price),-</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
    @endsection