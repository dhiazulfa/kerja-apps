@extends('admin.layouts.main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif

<div class="body flex-grow-1 px-3">
    @if(Auth::user()->status == 'inactive')
     <p>Akun belum active</p>
    @else
    <div class="container">
      <h1>Selamat Datang</h1>
      <h4>Anda login sebagai {{ Auth::user()->name }}</h4>
    </div><br>

    @can('admin')
    <div class="container-lg">
      <!-- /.row-->
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">Employee &amp; Clients</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-info px-3 mb-3"><small class="text-medium-emphasis">Jumlah Penyedia</small>
                        <div class="fs-5 fw-semibold">{{ $clients}}</div>
                      </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-danger px-3 mb-3"><small class="text-medium-emphasis">Jumlah Pekerja</small>
                        <div class="fs-5 fw-semibold">{{$employees}}</div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- /.row-->
                  <hr class="mt-0">
                  <div class="progress-group">
                    <div class="progress-group-header">
                      <svg class="icon icon-lg me-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg>
                      <div>Pria</div>
                      <div class="ms-auto fw-semibold">{{$male}}</div>
                    </div>
                    <div class="progress-group-bars">
                      <div class="progress progress-thin">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$male}}%" aria-valuenow="{{$male}}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <div class="progress-group mb-5">
                    <div class="progress-group-header">
                      <svg class="icon icon-lg me-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female"></use>
                      </svg>
                      <div>Wanita</div>
                      <div class="ms-auto fw-semibold">{{$female}}</div>
                    </div>
                    <div class="progress-group-bars">
                      <div class="progress progress-thin">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$female}}%" aria-valuenow="{{$female}}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <canvas id="myChart" height="150px"></canvas>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                  <script type="text/javascript">
                        var labels =  {{ Js::from($labels) }};
                        var employee =  {{ Js::from($data) }};
                    
                        const data = {
                          labels: labels,
                          datasets: [{
                            label: 'Jumlah Pendaftar Pekerja',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: employee,
                          }]
                        };
                    
                        const config = {
                          type: 'line',
                          data: data,
                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true,
                                  suggestedMin: 0
                                }
                              }]
                            }
                          }
                        };
                    
                        const myChart = new Chart(
                          document.getElementById('myChart'),
                          config
                        );
                  </script>
                </div>
                <!-- /.col-->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-warning px-3 mb-3"><small class="text-medium-emphasis">Jumlah Task</small>
                        <div class="fs-5 fw-semibold">{{ $tasks}}</div>
                      </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-6">
                      <div class="border-start border-start-4 border-start-success px-3 mb-3"><small class="text-medium-emphasis">Jumlah Pekerja Aktif</small>
                        <div class="fs-5 fw-semibold">{{$acceptedTasks}}</div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- /.row-->
                  
                  <canvas id="myChart2" height="100px"></canvas>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                  <script type="text/javascript">
                    var ages =  {{ Js::from($ages) }};
                    var datas =  {{ Js::from($datas) }};

                    const data2 = {
                      labels: ages,
                      datasets: [{
                        label: 'Umur Pekerja',
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(153, 102, 255)',
                          'rgb(255, 159, 64)'
                        ],
                        data: datas,
                      }]
                    };

                    const config2 = {
                      type: 'doughnut',
                      data: data2,
                      options: {
                        cutoutPercentage: 50
                      }
                    };

                    const myChart2 = new Chart(
                      document.getElementById('myChart2'),
                      config2
                    );
                  </script>

                </div>
                <!-- /.col-->
              </div>


              <!-- /.row-->
              {{-- <div class="table-responsive">
                <table class="table border mb-0">
                  <thead class="table-light fw-semibold">
                    <tr class="align-middle">
                      <th class="text-center">
                        <svg class="icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                        </svg>
                      </th>
                      <th>User</th>
                      <th class="text-center">Country</th>
                      <th>Usage</th>
                      <th class="text-center">Payment Method</th>
                      <th>Activity</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                      </td>
                      <td>
                        <div>Yiorgos Avraamu</div>
                        <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">50%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">10 sec ago</div>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                      </td>
                      <td>
                        <div>Avram Tarasios</div>
                        <div class="small text-medium-emphasis"><span>Recurring</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-br"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">10%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-visa"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">5 minutes ago</div>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"><span class="avatar-status bg-warning"></span></div>
                      </td>
                      <td>
                        <div>Quintin Ed</div>
                        <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-in"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">74%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-stripe"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">1 hour ago</div>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"><span class="avatar-status bg-secondary"></span></div>
                      </td>
                      <td>
                        <div>Enéas Kwadwo</div>
                        <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">98%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">Last month</div>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                      </td>
                      <td>
                        <div>Agapetus Tadeáš</div>
                        <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-es"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">22%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">Last week</div>
                      </td>
                      <td>
                        <div class="dropdown dropup">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                    <tr class="align-middle">
                      <td class="text-center">
                        <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                      </td>
                      <td>
                        <div>Friderik Dávid</div>
                        <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-start">
                            <div class="fw-semibold">43%</div>
                          </div>
                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10, 2020</small></div>
                        </div>
                        <div class="progress progress-thin">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td class="text-center">
                        <svg class="icon icon-xl">
                          <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-amex"></use>
                        </svg>
                      </td>
                      <td>
                        <div class="small text-medium-emphasis">Last login</div>
                        <div class="fw-semibold">Yesterday</div>
                      </td>
                      <td>
                        <div class="dropdown dropup">
                          <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> --}}
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
    @endcan

    @endif
  </div>
@endsection