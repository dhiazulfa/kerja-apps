@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">User Details</h1>
</div>

<div class="col-lg-12">
    <form method="POST" action="/admin/pekerja/{{$employee->id}}" class="mb-5">
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
          <label for="title" class="form-label">NIK</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $employee->nik}}" readonly>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Tanggal Lahir</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$employee->tgl_lahir}}" readonly>
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="mb-3 col-md-4">
          <label for="title" class="form-label">Pendidikan Terakhir</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $education }}" readonly>
          @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="title" class="form-label">Umur</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('umur', $employee->umur)}}" readonly>
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="mb-3 col-md-6">
            <label for="body" class="form-label">Alamat KTP</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $employee->alamat_ktp)}}</textarea>
        </div>

        <div class="mb-3 col-md-6">
            <label for="body" class="form-label">Alamat Domisili</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $employee->alamat_domisili)}}</textarea>
        </div>

        <div class="mb-3 col-md-6">
            <label for="body" class="form-label">Pengalaman Kerja</label>
            <textarea class="form-control row-10 @error('body') is-invalid @enderror" name="body" readonly>{{old('body', $employee->pengalaman_kerja)}}</textarea>
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Status Pernikahan</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $employee->status_pernikahan }}" readonly>
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto KTP</label>
            <img src="{{asset('storage/' . $employee->foto_ktp)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto KK</label>
            <img src="{{asset('storage/' . $employee->foto_kk)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto Ijazah Terakhir</label>
            <img src="{{asset('storage/' . $employee->foto_ijazah_terakhir)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="mb-3 col-md-4">
            <label for="price" class="form-label">Foto Sertifikat Keahlian</label>
            <img src="{{asset('storage/' . $employee->foto_sertifikat_pengalaman)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
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