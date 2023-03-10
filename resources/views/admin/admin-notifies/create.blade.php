@extends('admin.layouts.main')
@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Create New Mail</h1>
</div>

<div class="col-md-8">
  <form method="POST" action="/admin/admin-notifies" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" required autofocus>
      <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" value="{{Auth::user()->email}}" hidden>
      <input type="text" class="form-control @error('pengirim_id') is-invalid @enderror" id="pengirim_id" name="pengirim_id" value="{{Auth::user()->id}}" hidden>
      @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    @can('admin')
    <div class="input-group col-md-8 mb-4">
        <select class="form-control @error('education_id') is-invalid @enderror" name="user_id" required>
          <option value="education_id">-- Ditujukan Kepada --</option>
          @foreach($users as $user)
            <option value="{{$user->id}}" {{old('user') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
          @endforeach
        </select>
    </div>

    {{-- <div class="input-group mb-3">
        <select class="form-control @error('education_id') is-invalid @enderror" name="task_id" required>
          <option value="education_id">-- Berkaitan Dengan Task --</option>
          @foreach($tasks as $task)
            <option value="{{$task->id}}" {{old('task') == $task->id ? 'selected' : ''}}>{{$task->title}}</option>
          @endforeach
        </select>
    </div> --}}

    @endcan

    @can('penyedia')
    <div class="input-group col-md-8 mb-4">
        <select class="form-control @error('education_id') is-invalid @enderror" name="user_id" required>
          <option value="education_id">-- Ditujukan Kepada --</option>
          @foreach($users as $user)
            <option value="{{$user->id}}" {{old('user') == $user->id ? 'selected' : ''}}>{{$user->email}}</option>
          @endforeach
        </select>
    </div>
    
    {{-- <div class="input-group mb-3">
        <select class="form-control @error('education_id') is-invalid @enderror" name="task_id" required>
          <option value="education_id">-- Berkaitan Dengan Task --</option>
          @foreach($tasks as $task)
            <option value="{{$task->id}}" {{old('task') == $task->id ? 'selected' : ''}}>{{$task->title}}</option>
          @endforeach
        </select>
    </div> --}}
    @endcan

    <div class="smb-3">
        <label for="body" class="form-label">Isi notifikasi</label>
        <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" requiered>{{old('body')}}</textarea>
    </div>
  
    <div class="mb-3">
        <label for="image" class="form-label">Lampiran Gambar (Boleh Dikosongkan)</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
        @error('image')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

</div>
</div>

@endsection