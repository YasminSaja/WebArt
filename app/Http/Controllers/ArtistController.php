<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\FrontendData;

class ArtistController extends Controller
{
    /**
     * Menampilkan semua artist.
     */
    public function index()
    {
        // User::approved() = role 'user' DAN status 'approved'.
        // Tanpa ini, akun yang masih pending / rejected ikut
        // muncul di halaman artist yang bisa dilihat semua orang.
        $artists = User::approved()
            ->withCount('karyas')
            ->get();

        // Diumpan lewat FrontendData supaya view tidak perlu
        // tahu nama kolom aslinya (judul, id_user, dst).
        return view('artist', [
            'artists' => FrontendData::artists($artists),
        ]);
    }

    /**
     * Menampilkan profile satu artist.
     */
    public function show($id)
    {
        // Sama seperti di atas: hanya artist yang sudah
        // disetujui yang punya halaman profil publik.
        $artist = User::approved()
            ->with('karyas.kategori')
            ->withCount('karyas')
            ->findOrFail($id);

        return view('artist.detail', [
            'artist' => FrontendData::artist($artist),

            // id_user pada tiap karya dipakai JavaScript untuk
            // menyaring karya milik artist ini saja.
            'arts' => FrontendData::arts($artist->karyas),
        ]);
    }
}
