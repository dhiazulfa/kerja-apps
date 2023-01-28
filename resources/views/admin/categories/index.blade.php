@extends('admin.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori Pekerjaan</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif

<table class="table table-bordered">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
  <thead>
    <tr>
      <th>No</th>
      <th>Category Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name}}</td>
        <td>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>

        </td>
      </tr>
      @endforeach
  </tbody>
</table>
  