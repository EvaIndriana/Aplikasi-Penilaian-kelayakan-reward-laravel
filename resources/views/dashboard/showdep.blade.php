@extends('layoutsVuexy.master')
@section('contentvuexy')


    <!DOCTYPE html>
    <html>

        <head>
            <title>Data Karyawan</title>
        </head>
        <body>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card image -->
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <h6>Department HRD (Human Resources Departement)</h6>
                                <!-- List group -->
                                <ul class="list-group list-group-flush mt-2 ">
                                    @foreach ($DepartemenHRD as $karyawan)
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column justify-content-center" style="font: Montserrat">
                                                <h6 class="mb-0 text-sm">{{ $karyawan->nama_karyawan }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $karyawan->nik_karyawan }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                {{--  <h3 class="card-title mb-3">Department HRD (Human Resources Departement)</h3>
                                <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                    non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus
                                    ut reiciendis voluptates enim impedit veritatis officiis.</p>  --}}
                                    {{--  <a href="{{ route('cetak-karyawan-departments', ['departmentId' => $karyawan->departmentId]) }}" class="btn bg-gradient-danger" target="_blank"><i class="fa-regular fa-file-pdf" style="font-size: 25px"></i></a>  --}}

                                    {{--  <a href="{{ url('/dashboard/'.$karyawan->departmentId.'/cetak-karyawan-departments') }}" class="btn bg-gradient-danger" target="_blank"><i class="fa-regular fa-file-pdf" style="font-size: 25px"></i></a>  --}}
                                    <a href="{{ url('cetak-pdf-hrd') }}" class="btn btn-primary">Cetak Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="padding-top: 20px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card image -->
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <h6>Department Environment (Umum)</h6>
                                {{--  <img class="border-radius-lg w-100" src="https://demos.creative-tim.com/argon-dashboard-pro-bs4/assets/img/img-3.jpg" alt="Image placeholder">  --}}
                                <!-- List group -->
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach ($DepartmentEnvironment as $karyawan)
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column justify-content-center" style="font: Montserrat">
                                                <h6 class="mb-0 text-sm">{{ $karyawan->nama_karyawan }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $karyawan->nik_karyawan }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                {{--  <h3 class="card-title mb-3">Department HRD (Human Resources Departement)</h3>
                                <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                    non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus
                                    ut reiciendis voluptates enim impedit veritatis officiis.</p>  --}}
                                <a href="{{ url('cetak-pdf-hrd') }}" class="btn btn-primary">Cetak Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="padding-top: 20px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card image -->
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <h6>Deh6artment Engineering (Teknisi)</h6>
                                {{--  <img class="border-radius-lg w-100" src="https://demos.creative-tim.com/argon-dashboard-pro-bs4/assets/img/img-3.jpg" alt="Image placeholder">  --}}
                                <!-- List group -->
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach ($DepartmentEngineering as $karyawan)
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column justify-content-center" style="font: Montserrat">
                                                <h6 class="mb-0 text-sm">{{ $karyawan->nama_karyawan }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $karyawan->nik_karyawan }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                {{--  <h3 class="card-title mb-3">Department HRD (Human Resources Departement)</h3>
                                <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                    non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus
                                    ut reiciendis voluptates enim impedit veritatis officiis.</p>  --}}
                                <a href="{{ url('cetak-pdf-hrd') }}" class="btn btn-primary">Cetak Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container" style="padding-top: 20px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card image -->
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <h6>Department Accounting (Keuangan)</h6>

                                <!-- List group -->
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach ($DepartmentAccounting as $karyawan)
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column justify-content-center" style="font: Montserrat">
                                                <h6 class="mb-0 text-sm">{{ $karyawan->nama_karyawan }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $karyawan->nik_karyawan }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <a href="{{ url('cetak-pdf-hrd') }}" class="btn btn-primary">Cetak Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="padding-top: 20px">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- Card image -->
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <h6 >Department Safety (Security)</h6>
                                <!-- List group -->
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach ($DepartmentSafety as $karyawan)
                                        <li class="list-group-item">
                                            <div class="d-flex flex-column justify-content-center" style="font: Montserrat">
                                                <h6 class="mb-0 text-sm">{{ $karyawan->nama_karyawan }}
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $karyawan->nik_karyawan }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <a href="{{ url('cetak-pdf-hrd') }}" class="btn btn-primary">Cetak Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

    </html>
@endsection
