@extends('layoutsVuexy.master')
@section('contentvuexy')
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
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Daftar Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Profile Details</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <!-- header section -->
                    <div class="d-flex">
                        <a href="#" class="me-25">
                            <img src="{{ asset('foto/' . $users->foto) }}" alt="profile image" height="100"
                                width="100">
                        </a>
                        <!-- upload and reset button -->
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $users->name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $users->role }}
                                </p>
                            </div>
                        </div>
                        <!--/ upload and reset button -->
                    </div>
                    <!--/ header section -->

                    <!-- form -->
                    <form class="validate-form mt-2 pt-50" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountFirstName">Nama Lengkap</label>
                                <input type="text" class="form-control" id="accountFirstName" name="firstName"
                                    value="{{ $users->name }}" data-msg="Please enter first name" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountEmail">Email</label>
                                <input type="email" class="form-control" id="accountEmail" name="email"
                                    value="{{ $users->email }}" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountOrganization">No Handphone</label>
                                <input type="text" class="form-control" id="accountOrganization" name="organization"
                                    value="{{ $users->no_hp }}" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountPhoneNumber">Tempat Lahir</label>
                                <input type="text" class="form-control account-number-mask" id="accountPhoneNumber"
                                    name="phoneNumber" value="{{ $users->tempat_lahir }}" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountAddress">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="accountAddress" name="address"
                                    value="{{ $users->tanggal_lahir }}" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountState">Status Pernikahan</label>
                                <input type="text" class="form-control" id="accountState" name="state"
                                    value="{{ $users->status }}" disabled>
                            </div>
                            <div class="col-12 col-sm-6 mb-1">
                                <label class="form-label" for="accountZipCode">Agama</label>
                                <input type="text" class="form-control account-zip-code" id="accountZipCode"
                                    name="zipCode" value="{{ $users->agama }}" disabled>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required
                                        rows="3" disabled>{{ $users->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-12"> <br>
                                <a href="{{ url('users') }}" class="btn bg-gradient-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <!--/ form -->
                </div>
            </div>
        </body>

    </html>
@endsection
