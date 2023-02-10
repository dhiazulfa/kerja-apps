@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Task Management</h1>
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
            <th>Pelamar</th>
            <th>Jenis Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Penawaran</th>
            <th>Status</th>
            @if(Auth::user()->role == 'admin')
            <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach($acceptedTasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->employee->name}}</td>
              <td>{{ $task->task->title }}</td>
              <td>{{ $task->task->tgl_mulai }}</td>
              <td>{{ $task->task->tgl_selesai }}</td>
              <td> @currency($task->task->price),-</td>
              <td>{{ $task->status }}</td>
              @if(Auth::user()->role == 'admin')
              <td>
                  <a href="/admin/accepted-task/{{ $task->id }}/edit" class="badge bg-warning"><span><svg class="icon me">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg></span></a>
                  {{-- <form action="/admin/tasks/{{ $task->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span><svg class="icon me">
                      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                    </svg></span></button>
                  </form> --}}
              </td>
              @endif
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
    @endsection
    
    
    