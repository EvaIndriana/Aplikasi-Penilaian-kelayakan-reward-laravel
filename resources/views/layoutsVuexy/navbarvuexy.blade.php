<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow expanded" data-scroll-to-active="true"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="navbar-header expanded">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="index.html"><span class="brand-logo">
                    </span>
                    <h2 class="brand-text">Aplikasi Reward</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><svg
                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-disc d-none d-xl-block collapse-toggle-icon primary font-medium-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg></a></li>
        </ul>
    </div>
    <div class="shadow-bottom" style="display: none;"></div>
    <div class="main-menu-content ps ps--active-y">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="class=" navigation-header""><a class="d-flex align-items-center" href="{{ url('home') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
            </li>

            @if (Auth::user()->role === 'Admin Aplikasi' || Auth::user()->role === 'Admin Hrd' || Auth::user()->role === 'Pimpinan')
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Manage</span><svg
                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </li>
            @endauth

            @if (Auth::user()->role === 'Admin Aplikasi')
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('users') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg><span class="menu-title text-truncate" data-i18n="Email">Daftar Pengguna</span></a>
                </li>
            @endauth


            <li class="nav-item has-sub"><a class="d-flex align-items-center" href=""><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg><span class="menu-title text-truncate" data-i18n="Form Elements">Karyawan</span></a>
                <ul class="menu-content">
                    {{--  @if (Auth::user()->role === 'Admin Hrd')  --}}
                        <li class=" nav-item"><a class="d-flex align-items-center"
                                href="{{ url('karyawan') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                                <span class="menu-title text-truncate" data-i18n="Chat">Data
                                    Karyawan</span></a>
                        </li>
                    {{--  @endauth  --}}
                    <li><a class="d-flex align-items-center" href="{{ url('karyawan-aktif') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="Input Groups">Karyawan
                                Aktif
                            </span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ url('karyawan-non-aktif') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate" data-i18n="Input Mask">Karyawan
                                Non-Aktif</span></a>
                    </li>
            </ul>
        </li>


        {{--  @if (Auth::user()->role === 'Admin Aplikasi')  --}}
        <li class="nav-item has-sub"><a class="d-flex align-items-center" href=""><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-server">
                    <rect x="2" y="2" width="20" height="8" rx="2"
                        ry="2"></rect>
                    <rect x="2" y="14" width="20" height="8" rx="2"
                        ry="2"></rect>
                    <line x1="6" y1="6" x2="6.01" y2="6"></line>
                    <line x1="6" y1="18" x2="6.01" y2="18"></line>
                </svg><span class="menu-title text-truncate"
                    data-i18n="Form Elements">Departments</span></a>
            <ul class="menu-content">
                <li class=" nav-item"><a class="d-flex align-items-center"
                        href="{{ url('departments') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        <span class="menu-title text-truncate" data-i18n="Chat">Data
                            Departments</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="{{ url('all-departments') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span class="menu-item text-truncate" data-i18n="Input Groups">Departments
                        </span></a>
                </li>
            </ul>
        </li>
        {{--  <li class=" nav-item"><a class="d-flex align-items-center"
                        href="{{ url('departments') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check-square">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg><span class="menu-title text-truncate"
                            data-i18n="Todo">Departments</span></a>
                </li>  --}}
        <li class=" nav-item"><a class="d-flex align-items-center"
                href="{{ url('indikator_kinerja') }}"><svg xmlns="http://www.w3.org/2000/svg"
                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-check-square">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg><span class="menu-title text-truncate" data-i18n="Todo">Indikator
                    Kinerja</span></a>
        </li>
        {{--  @endauth  --}}

        <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Penilaian
                Indikator</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </li>
        <li class="nav-item has-sub"><a class="d-flex align-items-center" href="#"><svg
                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-copy">
                    <rect x="9" y="9" width="13" height="13" rx="2"
                        ry="2"></rect>
                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                </svg><span class="menu-title text-truncate" data-i18n="Form Elements">Indikator
                    Variabel</span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="{{ url('nilai_kinerja') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span class="menu-item text-truncate" data-i18n="Input Groups">Kinerja
                        </span></a>
                </li>
                <li><a class="d-flex align-items-center" href="{{ url('nilai_komunikasi') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span class="menu-item text-truncate"
                            data-i18n="Input Mask">Komunikasi</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="{{ url('nilai_loyalitas') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span class="menu-item text-truncate"
                            data-i18n="Textarea">Loyalitas</span></a>
                </li>
            </ul>
        </li>
        @if (Auth::user()->role === 'Admin Hrd')
        <li class=" nav-item"><a class="d-flex align-items-center"
                href="{{ url('penilaian_fuzzy') }}"><svg xmlns="http://www.w3.org/2000/svg"
                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg><span class="menu-title text-truncate" data-i18n="Form Validation">Penilaian
                    Akhir</span></a>
        </li>
        @endauth
        {{--  <li class=" nav-item"><a class="d-flex align-items-center"
                href="{{ url('report_laporan') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span class="menu-title text-truncate"
                    data-i18n="Form Validation">Report Penilaian</span></a>
        </li>  --}}


</ul>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 584px; right: 0px;">
<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 187px;"></div>
</div>
</div>
</div>
