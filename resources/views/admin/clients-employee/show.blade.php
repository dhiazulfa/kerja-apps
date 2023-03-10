@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
    <form>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h1 class="h2">Data Diri Pelamar</h1>
        </div>
    
        <div class="col-lg-8">
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Nama: <b> {{ $acceptedTask->employee->name }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">No. Telefon: <b> {{ $acceptedTask->employee->phone_number }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Email: <b> {{ $acceptedTask->employee->email }} </b></label>
        </div>
    
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Pendidikan Terakhir: <b> {{ $employee->education->name }} </b></label>
        </div>
        
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Umur: <b> {{ $employee->umur }} tahun </b></label>
        </div>
    
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Pengalaman Kerja: <b> {{ $employee->pengalaman_kerja }} </b></label>
        </div>
    
        <div class="mb-3 col-md-4">
            <label for="name" class="form-label col-md-8">Alamat Domisili: <b> {{ $employee->alamat_domisili }} </b></label>
        </div>
    
        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Foto KTP</label>
            <img src="{{asset('storage/' . $employee->foto_ktp)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>
    
        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Sertifikat Keahlian</label>
            <img src="{{asset('storage/' . $employee->foto_sertifikat_pengalaman)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
        </div>
    </div>
    </form>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h1 class="h2">Ruang Lingkup Pekerjaan</h1>
    </div>

    <div class="col-lg-8">
        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Pekerjaan: <b> {{ $acceptedTask->task->title }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Deskripsi Pekerjaan: <b> {{$acceptedTask->task->body}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Jenis Pekerjaan: <b> {{$acceptedTask->task->waktu_pekerjaan}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Tanggal: <b> {{$acceptedTask->task->tgl_mulai. ' s/d ' .$acceptedTask->task->tgl_selesai}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Jam: <b> {{$acceptedTask->task->jam_masuk.' s/d '.$acceptedTask->task->jam_selesai}} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Harga yang ditawarkan: <b> @currency($acceptedTask->task->price),- </b></label>
        </div>

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pekerjaan: <b> {{$acceptedTask->status}} </b></label>
        </div>
    </div>
</div>
<script>
 const title  = document.querySelector('#title');
 const slug   = document.querySelector('#slug');
 title.addEventListener('change', function(){
  fetch('/admin/competencies/checkSlug?title=' + title.value)
  .then(response => response.json())
  .then(data => slug.value = data.slug)
 });
</script>

@endsection