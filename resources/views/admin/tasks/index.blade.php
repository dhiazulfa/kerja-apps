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
      @can('penyedia')
      <a href="/admin/tasks/create" class="btn btn-primary mb-3">Create New Task</a>
      @endcan
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
            @if(Auth::user()->role == 'admin')
            <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->title}}</td>
              <td>{{ $task->waktu_pekerjaan }}</td>
              <td>{{ $task->tgl_mulai }}</td>
              <td>{{ $task->tgl_selesai }}</td>
              <td> @currency($task->price),-</td>
              <td>{{ $task->status }}</td>
              @if(Auth::user()->role == 'admin')
              <td>
                  <a href="/admin/tasks/{{ $task->id }}/edit" class="badge bg-warning"><span><svg class="icon me">
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
    
    
    