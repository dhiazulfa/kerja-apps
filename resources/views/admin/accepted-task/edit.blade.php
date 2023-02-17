@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h1 class="h2">Ruang Lingkup Pekerjaan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/admin/accepted-task/{{$acceptedTask->id}}" class="mb-5">
      @method('put')
        @csrf

        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Pekerjaan: </label>
            <p>
              <b> {{ $acceptedTask->task->title }} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Deskripsi Pekerjaan:</label>
            <p>
              <b> {{$acceptedTask->task->body}} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Alamat Tempat Bekerja:</label>
            <p>
              <b> {{$acceptedTask->task->alamat}} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
          <label for="body" class="form-label">Ketentuan Umur: </label>
          <p>
            <b> {{$acceptedTask->task->umur_min. ' s/d ' .$acceptedTask->task->umur_max.' tahun'}} </b>
          </p>
      </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Jenis Pekerjaan: </label>
            <p>
              <b> {{$acceptedTask->task->waktu_pekerjaan}} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Tanggal: </label>
            <p>
              <b> {{$acceptedTask->task->tgl_mulai. ' s/d ' .$acceptedTask->task->tgl_selesai}} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Jam: </label>
            <p>
              <b> {{$acceptedTask->task->jam_masuk.' s/d '.$acceptedTask->task->jam_selesai}} </b>
            </p>
        </div>

        <div class="mb-3 col-md-12">
            <label for="body" class="form-label">Harga yang ditawarkan: </label>
            <p>
              <b> @currency($acceptedTask->task->price),- </b>
            </p>
        </div>

        <div class="mb-3 col-md-4">
            <label for="status" class="form-label">Status Pekerjaan</label>
            <select class="form-control" name="status" required>
              <option value="">Pilih Salah Satu</option>
              <option value="accepted">Accepted</option>
              <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <h1 class="h2">Data Diri Pelamar</h1>

        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Nama: <b> {{ $acceptedTask->employee->name }} </b></label>
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

        <div class="mb-3 col-md-12">
            <label for="name" class="form-label">Alamat Domisili: <b> {{ $employee->alamat_domisili }} </b></label>
        </div>

        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Foto KTP</label>
            <img src="{{asset('storage/' . $employee->foto_ktp)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <div class="mb-3 col-md-12">
            <label for="price" class="form-label">Sertifikat Keahlian</label>
            <img src="{{asset('storage/' . $employee->foto_sertifikat_pengalaman)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>

    
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