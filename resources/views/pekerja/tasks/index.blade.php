@extends('pekerja.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Tugas yang Diambil</h1>
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
            <th>Task Title</th>
            <th>Jenis Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Penawaran</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->task->title}}</td>
              <td>{{ $task->task->waktu_pekerjaan }}</td>
              <td>{{ $task->task->tgl_mulai }}</td>
              <td>{{ $task->task->tgl_selesai }}</td>
              <td> @currency($task->task->price),-</td>
              <td>{{ $task->status }}</td>
              <td>
                  <a href="/tasks/{{ $task->id }}/edit" class="badge bg-warning"><span><svg class="icon me">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg></span></a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
    
    
    