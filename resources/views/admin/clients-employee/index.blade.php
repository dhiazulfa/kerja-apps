@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Pelamar Diterima</h1>
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
            <th>Pekerjaan</th>
            <th>Lama Pekerjaan</th>
            <th>Tanggal Mulai</th>
            <th>Penawaran</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($acceptedTasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->employee->name}}</td>
              <td>{{ $task->task->title }}</td>
              <td>{{ $task->task->waktu_pekerjaan }}</td>
              <td>{{ $task->task->tgl_mulai }}</td>
              <td> @currency($task->task->price),-</td>
              <td>{{ $task->status }}</td>
              <td>
                
                <a href="/admin/clients-employee/{{ $task->id }}" class="badge bg-info"><span><svg class="icon me">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span></a>

                  <a href="/admin/clients-employee/{{ $task->id }}/edit" class="badge bg-warning"><span><svg class="icon me">
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
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
    @endsection