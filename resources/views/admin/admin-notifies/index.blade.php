@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Notifies</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-12">
      <a href="/admin/admin-notifies/create" class="btn btn-primary mb-3">Create New Mail</a>
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Dikirim ke</th>
            <th>Lowongan Terkait</th>
            <th>Waktu dikirim</th>
            {{-- <th>Action</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach($notifies as $notify)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $notify->title}}</td>
              <td>{{ $notify->user->name}}</td>
              <td>{{ $notify->task->title}}</td>
              <td>{{ $notify->created_at->diffForHumans()}}</td>
              {{-- <td>
                  <a href="/admin/admin-notifies/{{ $notify->id }}/edit" class="badge bg-info"><span><svg class="icon me">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                  </svg></span></a>

              </td> --}}
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
  