<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;
use App\Support\FrontendData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan profile user yang sedang login.
     */
    public function show()
    {
        $user = Auth::user();

        return view('user.profile', [
            // Nama & bio asli user. FrontendData::profileUser()
            // mengubahnya jadi bentuk yang dibaca JavaScript.
            'user' => FrontendData::profileUser($user),

            'arts' => FrontendData::arts($this->ownArts()),

            // Dipakai Blade untuk mengisi <option> di dropdown
            // kategori pada modal edit karya.
            'categories' => Kategori::all(),
        ]);
    }

    /**
     * Tab beranda user.
     */
    public function home()
    {
        return view('user.home', [
            // Karya milik user yang sedang login.
            'arts' => FrontendData::arts($this->ownArts()),

            // Daftar SEMUA artist yang sudah approved, diurutkan
            // dari yang paling banyak karya.
            //
            // PENTING: bagian "Most Uploaded Artists" di halaman
            // ini sama seperti di beranda publik, yaitu
            // menampilkan artist dari seluruh komunitas. Kalau
            // yang dikirim cuma karya milik user sendiri,
            // carouselnya hanya akan menampilkan satu kartu
            // (yaitu user itu sendiri).
            'artists' => FrontendData::artists(
                User::approved()
                    ->withCount('karyas')
                    ->orderByDesc('karyas_count')
                    ->get()
            ),
        ]);
    }

    /**
     * Tab daftar karya milik user.
     */
    public function arts()
    {
        return view('user.arts', [
            'arts' => FrontendData::arts($this->ownArts()),
            'artistDirectory' => FrontendData::artistDirectory(
                $this->artists()
            ),
        ]);
    }

    /**
     * Tab daftar artist.
     */
    public function artist()
    {
        return view('user.artist', [
            'artists' => FrontendData::artists($this->artists()),
            'name' => Auth::user()->name,
        ]);
    }

    /**
     * Tab karya per kategori.
     */
    public function category()
    {
        $categories = Kategori::all();

        return view('user.category', [
            'arts' => FrontendData::arts($this->ownArts()),

            // Dipakai Blade untuk membuat tombol filter.
            'categories' => $categories,

            // Dipakai JavaScript untuk menandai tombol aktif.
            'categoryList' => FrontendData::categories($categories),
        ]);
    }

    /**
     * Karya milik user yang sedang login.
     *
     * with('user', 'kategori') wajib ada supaya FrontendData
     * bisa mengisi nama artist & kategori tanpa query ulang.
     *
     * @return Collection<int, Karya>
     */
    private function ownArts()
    {
        return Auth::user()
            ->karyas()
            ->with('user', 'kategori')
            ->latest()
            ->get();
    }

    /**
     * Form edit profile.
     */
    public function editForm()
    {
        return view('form.profile', [
            'user' => FrontendData::profileUser(Auth::user()),
        ]);
    }

    /**
     * Daftar artist untuk direktori.
     *
     * withCount('karyas') wajib supaya FrontendData bisa
     * mengisi jumlah karya tanpa query ulang untuk tiap artist.
     *
     * @return Collection<int, User>
     */
    private function artists()
    {
        return User::approved()
            ->withCount('karyas')
            ->get();
    }

    /**
     * Mengubah profile user.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->bio = $request->bio;

        /*
        |--------------------------------------------------------------------------
        | FOTO PROFILE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama kalau ada
            if ($user->profile_photo) {
                Storage::disk('public')
                    ->delete($user->profile_photo);
            }

            // Simpan foto baru
            $user->profile_photo = $request
                ->file('profile_photo')
                ->store('profile_photos', 'public');
        }

        $user->save();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile berhasil diperbarui.',
            ]);
        }

        return back()->with(
            'success',
            'Profile berhasil diperbarui.'
        );
    }
}
