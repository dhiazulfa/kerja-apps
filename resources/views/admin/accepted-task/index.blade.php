@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Daftar Pelamar Pekerjaan</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
  
  <div class="table-responsive col-lg-12">
    <form action="/admin/checkall" method="POST" class="d-inline">
      @method('post')
      @csrf
      <table class="table table-bordered table-lg-12">
        <thead>
          <tr>
            <th>Pilih</th>
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
            <td><input type="checkbox" name="tasks[]" value="{{ $task->id }}"></td>
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
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="8">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menolak?')" {{ count(request('tasks', [])) == 0 ? 'disabled' : '' }} name="ditolak">Tolak</button>
              <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin menerima?')" {{ count(request('tasks', [])) == 0 ? 'disabled' : '' }} name="accepted">Diterima</button>
            </td>
          </tr>
        </tfoot>
      </table>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          $('input[type="checkbox"]').on('change', function() {
            if ($('input[type="checkbox"]:checked').length > 0) {
              $('button[type="submit"]').prop('disabled', false);
            } else {
              $('button[type="submit"]').prop('disabled', true);
            }
          });
        });
      </script> 
    </form>
  </div>

</div>
@endsection
    
    
    