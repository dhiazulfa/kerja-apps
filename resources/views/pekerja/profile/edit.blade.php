@extends('pekerja.layouts.main')

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
          <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
          @error('phone_number')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
      </div>

        <div class="mb-3 col-md-4">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $employee->nik}}" required>
          @error('nik')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-2">
            <label for="umur" class="form-label">Umur</label>
            <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ $employee->umur}}" required>
            @error('kategori_bisnis')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-2">
          <label for="umur" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $employee->tgl_lahir}}" required>
          @error('tgl_lahir')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-6">
          <label for="alamat" class="form-label">Alamat Domilisi</label>
          <textarea class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" required>{{old('alamat_domisili', $employee->alamat_domisili)}}</textarea>
        </div>

        <div class="mb-3 col-md-6">
          <label for="alamat" class="form-label">Alamat KTP</label>
          <textarea class="form-control @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" required>{{old('alamat_ktp', $employee->alamat_ktp)}}</textarea>
        </div>

        <div class="mb-3 col-md-6">
          <label for="alamat" class="form-label">Pengalaman Kerja</label>
          <textarea class="form-control @error('pengalaman_kerja') is-invalid @enderror" name="pengalaman_kerja" required>{{old('pengalaman_kerja', $employee->pengalaman_kerja)}}</textarea>
        </div>

        <div class="mb-3 col-md-4">
            <label for="foto_ktp" class="form-label">Foto KTP Lama</label>
            <img src="{{asset('storage/' . $employee->foto_ktp)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            <label for="foto_ktp" class="form-label">Upload Foto KTP Baru</label>
            <div class="input-group mb-3">
              <!-- <span class="input-group-text">
              Logo</span> -->
            <input id="foto_ktp" class="form-control" type="file" name="foto_ktp">
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label for="foto_kk" class="form-label">Foto KK Lama</label>
            <img src="{{asset('storage/' . $employee->foto_kk)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

            <label for="foto_kk" class="form-label">Upload Foto KK Baru</label>
            <div class="input-group mb-3">
              <!-- <span class="input-group-text">
              Logo</span> -->
            <input id="foto_kk" class="form-control" type="file" name="foto_kk">
            </div>
        </div>

        <div class="mb-3 col-md-4">
          <label for="foto_ijazah_terakhir" class="form-label">Foto Ijazah Lama</label>
          <img src="{{asset('storage/' . $employee->foto_ijazah_terakhir)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

          <label for="foto_ijazah_terakhir" class="form-label">Upload Foto Ijazah Baru</label>
          <div class="input-group mb-3">
            <!-- <span class="input-group-text">
            Logo</span> -->
          <input id="foto_ijazah_terakhir" class="form-control" type="file" name="foto_ijazah_terakhir">
          </div>
        </div>

        <div class="mb-3 col-md-4">
          <label for="foto_sertifikat_pengalaman" class="form-label">Foto Sertifikat Lama</label>
          <img src="{{asset('storage/' . $employee->foto_sertifikat_pengalaman)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

          <label for="foto_sertifikat_pengalaman" class="form-label">Upload Foto Sertifikat Baru</label>
          <div class="input-group mb-3">
            <!-- <span class="input-group-text">
            Logo</span> -->
          <input id="foto_sertifikat_pengalaman" class="form-control" type="file" name="foto_sertifikat_pengalaman">
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