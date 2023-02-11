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
                <h1>Register Penyedia Kerja</h1>
                <p class="text-medium-emphasis">Create your account</p>
                
                <form action="/register-penyedia" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nib" class="form-label">NIB</label>
                <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-id-card"></use>
                  </svg></span>
                <input id="nib" class="form-control @error('nib') is-invalid @enderror" type="text" name="nib" placeholder="NIB" value="{{old('nib')}}" requiered>
                </div>
                <label for="category" class="form-label">Kategori Bisnis</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-id-card"></use>
                    </svg></span>
                  <input id="category" class="form-control @error('kategori_bisnis') is-invalid @enderror" type="text" name="kategori_bisnis" placeholder="Kategori Bisnis" value="{{old('kategori_bisnis')}}" requiered>
                  </div>
                  <label for="name" class="form-label">Nama</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span>
                  <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nama" value="{{old('name')}}" requiered>
                </div>
                <label for="email" class="form-label">Email</label>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span>
                  <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{old('email')}}" requiered>
                </div>
                <label for="phone" class="form-label">Phone Number</label>
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
                <label for="address" class="form-label">Alamat Lengkap</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use>
                    </svg>
                  </span>
                  <textarea id="address" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Address" requiered>{{old('alamat')}}</textarea>
                </div>
                <label for="more-information" class="form-label">Tambah Keterangan</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <svg class="icon">
                      <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-home"></use> -->
                    </svg>
                  </span>
                  <textarea id="more-information" class="form-control row-5 @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan" placeholder="Keterangan Tambahan" requiered>{{old('keterangan_tambahan')}}</textarea>
                </div>
                <label for="company-photo" class="form-label">Foto Katntorr</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto Kantor</span> -->
                <input id="company-photo" class="form-control" type="file" name="foto_kantor" placeholder="Foto Kantor" requiered>
                </div>
                <label for="logo" class="form-label">Logo</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Logo</span> -->
                <input id="logo" class="form-control" type="file" name="logo" placeholder="Logo" requiered>
                </div>
                <label for="nib-photo" class="form-label">Foto NIB</label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">
                  Foto NIB</span> -->
                <input id="nib-photo" class="form-control" type="file" name="foto_nib" placeholder="foto_nib" requiered>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Create Account</button>
                </form>
                <small class="d-block text-center mt-2"><a href="/register-penyedia">Register sebagai Calon Pekerja</a></small>
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