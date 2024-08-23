<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nik', 'nama', 'password');

        if (Auth::guard('penduduk')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'nik' => 'NIK, nama, atau password salah.',
        ])->withInput($request->only('nik', 'nama'));
    }

    // Register
    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penduduks,nik',
            'nama' => 'required|max:50',
            'password' => 'required|confirmed|min:8',
            'JK' => 'required|in:L,P',
            'alamat' => 'required',
        ]);

        $data = $request->only(['nik', 'nama', 'JK', 'alamat']);
        $data['password'] = Hash::make($request->password);

        Penduduk::create($data);

        // Login after registration
        $login = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'password' => $request->password,
        ];

        if (Auth::guard('penduduk')->attempt($login)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login')->with('failed', 'Nik atau nama salah');
        }
    }

    public function logout()
    {
        Auth::guard('penduduk')->logout();
        return redirect()->route('login')->with('success', 'Anda sudah logout!');
    }
}
