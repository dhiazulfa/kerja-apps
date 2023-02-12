@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
</div>

<div class="col-lg-12">
    <form method="POST" action="/admin/profile/{{$client->id}}" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Users</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
        </div>
        
        <div class="mb-3 col-md-4">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $name }}" readonly>
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label for="phone_number" class="form-label">Nomor Telefon</label>
          <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $client->user->phone_number }}" readonly>
          @error('phone_number')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">NIB</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $client->nib}}" readonly>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Kategori Bisnis</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $client->kategori_bisnis}}" readonly>
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="mb-3 col-md-6">
            <label for="body" class="form-label">Alamat</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $client->alamat)}}</textarea>
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Logo Perusahaan</label>
            <img src="{{asset('storage/' . $client->logo)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto Kantor</label>
            <img src="{{asset('storage/' . $client->foto_kantor)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto NIB</label>
            <img src="{{asset('storage/' . $client->foto_nib)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
</div>

@endsection