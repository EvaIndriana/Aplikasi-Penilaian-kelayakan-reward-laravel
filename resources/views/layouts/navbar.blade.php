<aside
class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-4 fixed-start ms-4 "
id="sidenav-main">
<div class="sidenav-header">
<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
    aria-hidden="true" id="iconSidenav"></i>
<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
    <img src="{{ asset('argon-template/assets/img/logoperusahaan.png') }}" class="navbar-brand-img h-200" alt="main_logo">
    <span class="ms-1 font-weight-bold">PT. Sreeya Sewu Indonesia Tbk</span>
</a>
<hr class="horizontal dark mt-0">
<div class="navbar" id="sidenav-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('home') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>

        {{--  @if (Auth::user()->role === 'Admin Aplikasi')  --}}
        <li class="nav-item">
            <a class="nav-link " href="{{ url('users') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    {{--  <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>  --}}
                    <i class="fa-solid fa-users text-warning text-sm opacity-10"></i>
                </div>

                <span class="nav-link-text ms-1">Manage User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('departments') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    {{--  <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>  --}}
                    <i class="fa-solid fa-building-user text-warning text-sm opacity-10"></i>
                </div>

                <span class="nav-link-text ms-1">Manage Departemen</span>
            </a>
        </li>
        {{--  @endauth  --}}

        {{--  @if (Auth::user()->role === 'Admin Hrd' || Auth::user()->role === "Pimpinan" )  --}}
        <li class="nav-item">
            <a class="nav-link " href="{{ url('karyawan') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    {{--  <i class="ni ni-credit-card text-success text-sm opacity-10"></i>  --}}
                    <i class="fa-solid fa-people-group text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Data Karyawan</span>
            </a>
        </li>
        {{--  @endauth  --}}

        {{--  @if (Auth::user()->role === 'Admin Aplikasi' || Auth::user()->role === "Pimpinan" )  --}}
        {{--  <li class="nav-item">
            <a class="nav-link " href="{{ url('indikator_komunikasi') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-regular fa-rectangle-list text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Indikator Komunikasi</span>
            </a>
        </li>  --}}
        {{--  <li class="nav-item">
            <a class="nav-link " href="{{ url('indikator_kinerja') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-regular fa-rectangle-list text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Indikator Kinerja</span>
            </a>
        </li>  --}}

        {{--  <li class="nav-item">
            <a class="nav-link " href="{{ url('indikator_loyalitas') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-regular fa-rectangle-list text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Indikator Loyalitas</span>
            </a>
        </li>  --}}
        {{--  @endauth  --}}

        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <span>Profile</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Profile : </h6>
                    <a class="collapse-item" href="{{ url('profile/') }}">Profile</a>
                    <a class="collapse-item" href="{{ url('profile/show/') }}">Ubah Profile</a>
                </div>
            </div>
        </li>  --}}

        {{--  @if (Auth::user()->role === 'Admin Hrd')  --}}
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Penilaian Karyawan</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('nilai_komunikasi') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                    <i class="fa-solid fa-square-poll-vertical text-danger text-sm opacity-10"></i>

                </div>
                <span class="nav-link-text ms-1">Penilaian Komunikasi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ url('nilai_kinerja') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-square-poll-vertical text-danger text-sm opacity-10"></i>


                </div>
                <span class="nav-link-text ms-1">Penilaian Kinerja</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ url('nilai_loyalitas') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-square-poll-vertical text-danger text-sm opacity-10"></i>

                </div>
                <span class="nav-link-text ms-1">Penilaian Loyalitas</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Hasil Penilaian</h6>
        </li>
        {{--  @endauth  --}}
        <li class="nav-item">
            <a class="nav-link " href="{{ url('penilaian_fuzzy') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Penilaian Akhir</span>
            </a>
        </li>
    </ul>
</div>
</div>
</aside>

