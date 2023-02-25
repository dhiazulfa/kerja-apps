<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card mb-4 mx-4">
              <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-medium-emphasis">Create your account</p>
                
                <form action="/register" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nik" class="form-label">NIK</label>
                <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-id-card"></use>
                  </svg></span>
                <input id="nik" class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" placeholder="NIK" value="{{old('nik')}}" requiered>
                </div>
                <label for="nama" class="form-label">Nama</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span>
                  <input id="nama" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nama" value="{{old('name')}}" requiered>
                </div>
                <label for="umur" class="form-label">Umur</label>
                <div id="umur" class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-numbers"></use>
                  </svg></span>
                <input class="form-control @error('umur') is-invalid @enderror" type="text" name="umur" placeholder="Umur" value="{{old('umur')}}" requiered>
                </div>
                <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                  </svg></span>
                <input id="tanggal-lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="{{old('tgl_lahir')}}" requiered>
                </div>
                <label for="email" class="form-label">Email</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span>
                  <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email')}}" requiered>
                </div>
                <label for="phone" class="form-label">Nomor Telepon</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-phone"></use>
                    </svg></span>
                  <input id="phone" class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}" requiered>
                </div>
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                  <input id="password" class="form-control" type="password" name="password" placeholder="Password" requiered>
                </div>
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-heart"></use>
                    </svg>
                  </span>
                  <select id="gender" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                    <option value="">Jenis Kelamin</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                  </select>
                </div>
                <label for="study" class="form-label">Pendidikan Terakhir</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                    </svg>
                  </span>
                  <select id="study" class="form-control @error('education_id') is-invalid @enderror" name="education_id" required>
                    <option value="education_id">-- Pilih Pendidikan --</option>
                    @foreach($educations as $education)
                      <option value="{{$education->id}}" {{old('education_id') == $education->id ? 'selected' : ''}}>{{$education->name}}</option>
                    @endforeach
                  </select>
                </div>
                <label for="alamat" class="form-label">Alamat Sesuai KTP</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                    </svg>
                  </span>
                  <textarea id="alamat" class="form-control @error('alamat_domisili') is-invalid @enderror" name="alamat_ktp" placeholder="Address " requiered>{{old('alamat_domisili')}}</textarea>
                </div>
                <label for="domisili" class="form-label">Alamat Domisili</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                    </svg>
                  </span>
                  <textarea id="domisili" class="form-control row-5 @error('alamat_domisili') is-invalid @enderror" name="alamat_domisili" placeholder="Address Domisili" requiered>{{old('alamat_domisili')}}</textarea>
                </div>
                <label for="status" class="form-label">Status</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-heart"></use>
                    </svg>
                  </span>
                  <select id="status" class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan" required>
                    <option value="">Status Perkawinan</option>
                    <option value="lajang">Lajang</option>
                    <option value="menikah">Menikah</option>
                    <option value="bercerai">Bercerai</option>
                  </select>
                </div>
                <label for="pengalaman" class="form-label">Pengalaman Terakhir</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                    </svg>
                  </span>
                  <textarea id="pengalaman" class="form-control row-5 @error('pengalaman_kerja') is-invalid @enderror" name="pengalaman_kerja" placeholder="Pengalaman Kerja" requiered>{{old('pengalaman_kerja')}}</textarea>
                </div>
                <label for="file-ktp" class="form-label">Foto KTP</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto KTP</span> -->
                <input id="file-ktp" class="form-control" type="file" name="foto_ktp" placeholder="Foto KTP" requiered>
                </div>
                <label for="file-kk" class="form-label">Foto KK</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto KK</span> -->
                <input id="file-kk" class="form-control" type="file" name="foto_kk" placeholder="Foto KK" requiered>
                </div>
                <label for="file-ijazah" class="form-label">Foto Ijazah Terakhir</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto Ijazah Terakhir</span> -->
                <input id="file-ijazah" class="form-control" type="file" name="foto_ijazah_terakhir" placeholder="Foto Ijazah Terakhir" requiered>
                </div>
                <label for="file-sertifikasi" class="form-label">Foto Sertifikasi Keahlian (Apabila Memiliki)</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto Sertifikasi Keahlian</span> -->
                <input id="file-sertifikasi" class="form-control" type="file" name="foto_sertifikat_pengalaman">
                </div>

                <button class="btn btn-block btn-primary" type="submit">Create Account</button>
                </form>
                <small class="d-block text-center mt-3"><a href="/register-penyedia">Register sebagai Penyedia Kerja</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

  </body>
</html>