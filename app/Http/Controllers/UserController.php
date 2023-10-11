<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->middleware('checkUserRole');
        $users = User::all();
        return view('daftar-pengguna.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daftar-pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|unique:users,email',
                'password'      => 'required',
                'role'          => 'required',
                'foto'          => 'required|mimes:png,jpg,jpeg|max:2048',
                'no_hp'         => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required|date',
                'agama'         => 'required',
                'status'        => 'required',
                'alamat'        => 'required'
                // 'nik_karyawan' => 'required|unique:users,nik_karyawan'
            ],
            [
                'name.required'             => 'Nama pengguna wajib diisi',
                'email.required'            => 'Email pengguna wajib diisi',
                'password.required'         => 'Password wajib diisi',
                'role.required'             => 'Role pengguna harus dipilih dan wajib diisi',
                'foto.required'             => 'Silahkan masukan Foto pengguna',
                'foto.mimes'                => 'Foto hanya diperbolehkan berekstensi PNG, JPG, JPEG',
                'no_hp.required'            => 'No Handphone pengguna wajib diisi',
                'tempat_lahir.required'     => 'Tempat lahir pengguna wajib diisi',
                'tanggal_lahir.required'    => 'Tanggal lahir pengguna wajib diisi',
                'agama.required'            => 'Agama pengguna wajib diisi',
                'status.required'           => 'Status pernikahan pengguna wajib diisi',
                'alamat.required'           => 'alamat pengguna wajib diisi',

                // 'nik_karyawan' => 'Nik wajib diisi dan tidak boleh sama'
            ]
        );

        //menambahkan image
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);


        // Simpan data ke tabel users
        $data = [
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'password'      => bcrypt($request->input('password')),
            'role'          => $request->input('role'),
            'foto'          => $foto_nama,
            'no_hp'         => $request->input('no_hp'),
            'tempat_lahir'  => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'agama'         => $request->input('agama'),
            'status'        => $request->input('status'),
            'alamat'        => $request->input('alamat'),
            // 'nik_karyawan'  => $request->input('nik_karyawan'),
        ];

        User::create($data);

        // dd($request->all());

        $request->session()->flash('success', 'Daftar Pengguna berhasil dibuat');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);// Ambil semua data pengguna dari model User
        return view('daftar-pengguna.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('daftar-pengguna.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate(
            [
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|unique:users,email,' . $id,
                'new_password'  => 'nullable|string|min:6',// Anda perlu menambahkan validasi untuk panjang minimum password
                'role'          => 'required',// Anda harus memvalidasi 'role' juga jika dibutuhkan
                'foto'          => 'nullable|image|mimes:png,jpg,jpeg|max:2048',// Validasi foto
                'no_hp'         => 'required',
                'tempat_lahir'  => 'required',
                'tanggal_lahir' => 'required|date',
                'agama'         => 'required',
                'status'        => 'required',
                'alamat'        => 'required'
                // 'nik_karyawan'  => 'required|unique:users,nik_karyawan'
            ],
            [
                'name.required'             => 'Nama pengguna wajib diisi',
                'email.required'            => 'Email pengguna wajib diisi',
                'email.email'               => 'Email tidak valid',
                'email.unique'              => 'Email sudah digunakan oleh pengguna lain',
                'new_password.min'          => 'Password baru harus memiliki minimal 6 karakter',
                'role.required'             => 'Role pengguna harus dipilih dan wajib diisi',
                'foto.image'                => 'File yang diunggah harus berupa gambar',
                'foto.mimes'                => 'Foto hanya diperbolehkan berekstensi PNG, JPG, JPEG',
                'foto.max'                  => 'Ukuran file foto tidak boleh lebih dari 2MB',
                'no_hp.required'            => 'No Handphone pengguna wajib diisi',
                'tempat_lahir.required'     => 'Tempat lahir pengguna wajib diisi',
                'tanggal_lahir.required'    => 'Tanggal lahir pengguna wajib diisi',
                'agama.required'            => 'Agama pengguna wajib diisi',
                'status.required'           => 'Status pernikahan pengguna wajib diisi',
                'alamat.required'           => 'alamat pengguna wajib diisi',
                // 'nik_karyawan'      => 'Nik Karyawan wajib diisi dan tidak boleh sama'
            ]
        );

        $user = User::findOrFail($id);

        // Memperbarui data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Memperbarui password hanya jika input "Password Baru" diisi
        if ($request->filled('new_password')) {
            $user->password = bcrypt($request->input('new_password'));
        }

        $user->role = $request->input('role');
        $user->no_hp = $request->input('no_hp');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->agama = $request->input('agama');
        $user->status = $request->input('status');
        $user->alamat = $request->input('alamat');
        // $user->nik_karyawan = $request->input('nik_karyawan');


        // Memperbarui foto hanya jika ada file yang diunggah
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = date('ymdhis') . "." . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $user->foto = $foto_nama;
        }

        $user->save();

        $request->session()->flash('success', 'Data karyawan berhasil diupdate');
        return redirect('/users');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back();
    }
}
