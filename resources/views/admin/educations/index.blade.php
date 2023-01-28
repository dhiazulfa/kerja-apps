@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Jenjang Pendidikan</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{session('success')}}
  </div>
  @endif
    <div class="table-responsive col-lg-6">
      <a href="/admin/educations/create" class="btn btn-primary mb-3">Create New Education</a>
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($educations  as $education)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $education->name}}</td>
              <td>
                  <a href="/admin/educations/{{ $education->slug }}/edit" class="badge bg-warning"><span><svg class="icon me">
                  <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg></span></a>

                  <form action="/admin/educations/{{ $education->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span><svg class="icon me">
                      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                    </svg></span></button>
                  </form>

              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
  