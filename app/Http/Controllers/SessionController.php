<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        // Implementasi logika dashboard di sini
        return view('sesi/index');
    }

    // public function login(Request $request)
    // {
    //    $request->validate([
    //     'email'=> 'required',
    //     'password'=> 'required'
    //    ],
    //    [
    //     'email.required'=>'Email wajib diisi',
    //     'password.required'=>'Password wajib diisi'
    //    ]);

    //    $infologin = [
    //     'email' => $request->email,
    //     'password' => $request->password
    //    ];

    //    if(Auth::attempt($infologin)){
    //         //kalo auth sukses
    //         return 'sukses';
    //    }else
    //         return 'gagal';
    //         // kalo auth gagal
    // }
}
