<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman register.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses register user.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            // User biasa
            'role' => 'user',

            // Menunggu admin
            'status' => 'pending',
        ]);

        return redirect()
            ->route('pending.approval')
            ->with('pending_email', $request->email)
            ->with('pending_name', $request->name)
            ->with(
                'success',
                'Registrasi berhasil. Tunggu persetujuan admin.'
            );
    }

    /**
     * Menampilkan halaman login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CEK STATUS AKUN
        |--------------------------------------------------------------------------
        */

        // Akun ditolak
        if ($user->status === 'rejected') {

            Auth::logout();

            return back()
                ->with('login_rejected', true)
                ->withInput(
                    $request->only('email')
                );
        }

        // Akun masih menunggu
        if ($user->status === 'pending') {

            Auth::logout();

            return redirect()
                ->route('pending.approval')
                ->with('pending_email', $request->email);
        }

        // Akun sudah disetujui
        if ($user->status === 'approved') {

            // Kalau admin
            if ($user->role === 'admin') {
                return redirect()
                    ->route('admin.dashboard');
            }

            // Kalau user biasa
            return redirect()
                ->route('user.profile');
        }

        // Pengaman kalau status tidak dikenal
        Auth::logout();

        return redirect()
            ->route('login')
            ->withErrors([
                'email' => 'Status akun tidak valid.',
            ]);
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home');
    }

    /**
     * Halaman pending.
     */
    public function pending()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA AKUN YANG MANA YANG DITAMPILKAN?
        |--------------------------------------------------------------------------
        | Halaman ini menampilkan "akun yang baru didaftarkan".
        | Kalau sedang login sebagai orang lain DAN baru saja
        | daftar akun baru, yang harus tampil adalah akun BARU
        | itu — bukan akun yang sedang login.
        |
        | Karena itu urutannya:
        |   1. session (dari register() baru saja)  <- paling baru
        |   2. Auth::user() (kalau memang sedang login)
        |   3. null (buka URL tanpa daftar)
        */
        $email = session('pending_email');
        $name = session('pending_name');

        if ($email) {
            $pendingUser = [
                'nama' => $name ?: $email,
                'email' => $email,
            ];
        } elseif ($user = Auth::user()) {
            $pendingUser = [
                'nama' => $user->name,
                'email' => $user->email,
            ];
        } else {
            $pendingUser = null;
        }

        return view('auth.pending', compact('pendingUser'));
    }
}
