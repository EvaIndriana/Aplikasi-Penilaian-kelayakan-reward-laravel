@extends('layouts.master')
@section('layouts.navbar')
@section('content')


    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Daftar Pengguna</title>
        </head>

        <body>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Daftar Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            <div class="card shadow-lg mx-2 ">
                <div class="card-body p-3">
                  <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                           <img src="{{ asset('foto/' . $profil->foto) }}"
                                alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                     </div>

                    <div class="col-auto my-auto">
                      <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ Auth::user()->role }}
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                      <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                              <span class="ms-2">Cetak Pdf</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                              <i class="ni ni-email-83"></i>
                              <span class="ms-2">Messages</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                              <i class="ni ni-settings-gear-65"></i>
                              <span class="ms-2">Settings</span>
                            </a>
                          </li>
                        <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 455px;"><a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div></ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12" style="padding-top: 20px">
                <div class="card">
                  <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                      <p class="mb-0">Detail Profile</p>
                      {{--  <button class="btn btn-primary btn-sm ms-auto">Settings</button>  --}}
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="text-uppercase text-sm">Information</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nama</label>
                          <input class="form-control" type="text" value="{{ $profil->name }}" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Email</label>
                          <input class="form-control" type="email" value="{{ $profil->email }}" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      {{--  <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nik Karyawan</label>
                          <input class="form-control" type="text" value="{{ $profil->nik_karyawan }}" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>  --}}
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">No Handphone</label>
                          <input class="form-control" type="text" value="{{ $profil->no_hp }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                          <input class="form-control" type="text" value="{{ $profil->tempat_lahir }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                          <input class="form-control" type="text" value="{{ $profil->tanggal_lahir }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Agama</label>
                          <input class="form-control" type="text" value="{{ $profil->agama }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Status</label>
                          <input class="form-control" type="text" value="{{ $profil->status }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Kontak</p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Alamat</label>
                          <input class="form-control" type="text" value="{{ $profil->alamat }}"  onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Kecamatan</label>
                          <input class="form-control" type="text" value="New York" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Kota/Kabupaten</label>
                          <input class="form-control" type="text" value="United States" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Provinsi</label>
                          <input class="form-control" type="text" value="437300" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                        </div>
                      </div>
                    </div>
                    <hr class="horizontal dark">
                    {{--  <p class="text-uppercase text-sm"></p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">About me</label>
                          <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source." onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                    </div>  --}}
                  </div>
                </div>
              </div>
        </body>

    </html>
@endsection
