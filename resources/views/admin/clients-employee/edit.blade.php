@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Update Status Pekerjaan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/clients-employee/{{$acceptedTask->id}}" enctype="multipart/form-data" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pekerjaan</label>
            <input type="text" value="{{$acceptedTask->id}}" hidden>

            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="on_progress">Sedang Dikerjakan</option>
              <option value="done">Selesai</option>
            </select>
        </div>

        @if($acceptedTask->status == 'accepted' || $acceptedTask->status == 'done')

        @else
        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Rating (1-10) </label>
          <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{old('rating')}}" required>
          @error('rating')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="catatan_pekerjaan" class="form-label">Catatan Pekerjaan</label>
          <textarea class="form-control row-10 @error('catatan_pekerjaan') is-invalid @enderror" name="catatan_pekerjaan" requiered>{{old('catatan_pekerjaan')}}</textarea>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>

    
</div>
</div>

@endsection