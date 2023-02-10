<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <img class="sidebar-brand-full" width="70" height="70" src="/assets/img/omtech-logo.jpeg" style="margin-top: 10px; margin-bottom: 10px;">
      <img class="sidebar-brand-narrow" width="46" height="46" src="/assets/img/omtech-logo.jpeg">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="/admin">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg> Dashboard</a>
      </li>
      @can('admin')
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-book"></use>
        </svg>Data Pelamar</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="/admin/accepted-task">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-window-restore"></use>
          </svg> Pelamar Masuk</a>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/accepted-employee">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-education"></use>
        </svg> Pelamar Diterima</a>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/employee-rejected">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg> Pelamar Ditolak</a>
      </li>
      
      {{-- <li class="nav-item"><a class="nav-link" href="/admin/tasks-setting">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clipboard"></use>
        </svg> Task Masuk</a>
      </li> --}}

        </ul>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/done-task">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
        </svg> Task Selesai</a>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/data-pembayaran">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-dollar"></use>
        </svg> Pembayaran</a>
      </li>

      @endcan

      <li class="nav-title">Data</li>
      @can('admin')
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-folder"></use>
        </svg> Master Data</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="/admin/categories">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-window-restore"></use>
          </svg> Categories</a>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/educations">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-education"></use>
        </svg> Educations</a>
      </li>
      
      {{-- <li class="nav-item"><a class="nav-link" href="/admin/tasks-setting">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clipboard"></use>
        </svg> Task Masuk</a>
      </li> --}}

        </ul>
      </li>

      <li class="nav-title">Data</li>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-folder"></use>
        </svg> Users Data</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="/admin/pekerja">
          <svg class="nav-icon">
            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
          </svg> Pekerja</a>
      </li>

      <li class="nav-item"><a class="nav-link" href="/admin/clients">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-clipboard"></use>
        </svg> Penyedia</a>
      </li>

        </ul>
      </li>
      @endcan

      @if(Auth::user()->status == 'inactive')

      @else
      <li class="nav-item"><a class="nav-link" href="/admin/tasks">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
        </svg> Task</a>
      </li>

      @can('penyedia')
      <li class="nav-item"><a class="nav-link" href="/admin/clients-employee">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
        </svg> Daftar Pekerja</a>
      </li>
      @endcan

      @endif
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>