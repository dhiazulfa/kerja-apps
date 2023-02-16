@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
</div>

<div class="col-lg-12">
    <form method="POST" action="/admin/profile/{{ Auth::user()->id}}" class="mb-5" enctype="multipart/form-data">
      @method('put')
        @csrf
        <div class="mb-3 col-md-4">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}" required>
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label for="name" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email }}" required>
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
          <label for="phone_number" class="form-label">Nomor Telefon</label>
          <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $client->user->phone_number }}" required>
          @error('phone_number')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

        <div class="mb-3 col-md-4">
          <label for="nib" class="form-label">NIB</label>
          <input type="text" class="form-control @error('nib') is-invalid @enderror" id="nib" name="nib" value="{{ $client->nib}}" required>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Kategori Bisnis</label>
            <input type="text" class="form-control @error('kategori_bisnis') is-invalid @enderror" id="kategori_bisnis" name="kategori_bisnis" value="{{ $client->kategori_bisnis}}" required>
            @error('kategori_bisnis')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="mb-3 col-md-6">
            <label for="keterangan_tambahan" class="form-label">Deskripsi Tambahan</label>
            <textarea class="form-control @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan">{{old('keterangan_tambahan', $client->keterangan_tambahan)}}</textarea>
        </div>

        <div class="mb-3 col-md-6">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{old('alamat', $client->alamat)}}</textarea>
      </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Logo Perusahaan Lama</label>
            <img src="{{asset('storage/employee/logo' . $client->logo)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            <label for="logo" class="form-label">Upload Logo Baru</label>
            <div class="input-group mb-3">
              <!-- <span class="input-group-text">
              Logo</span> -->
            <input id="logo" class="form-control" type="file" name="logo" placeholder="Logo" requiered>
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto Kantor Lama</label>
            <img src="{{asset('storage/employee/foto_kantor' . $client->foto_kantor)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            <label for="company-photo" class="form-label">Upload Foto Kantor Baru</label>
            <div class="input-group mb-3">
            <input id="company-photo" class="form-control" type="file" name="foto_kantor" placeholder="Foto Kantor" requiered>
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto NIB</label>
            <img src="{{asset('storage/employee/foto_nib'. $client->foto_nib)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            <label for="nib-photo" class="form-label">Upload Foto NIB Baru</label>
            <div class="input-group mb-3">
              <!-- <span class="input-group-text">
              Foto NIB</span> -->
            <input id="nib-photo" class="form-control" type="file" name="foto_nib" placeholder="foto_nib" requiered>
            </div>
        </div>

        <div class="mb-3 col-md-4">
          <label for="name" class="form-label">New Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password Terbaru" required>
          @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
</div>

@endsection