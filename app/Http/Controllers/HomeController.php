<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\User;
use App\Support\FrontendData;

class HomeController extends Controller
{
    public function index()
    {
        // Semua karya, dipakai oleh modal detail di frontend
        $arts = Karya::with([
            'user',
            'kategori',
        ])
            ->latest('created_at')
            ->get();

        // Data yang sudah diterjemahkan untuk JavaScript.
        $artsData = FrontendData::arts($arts);

        // Ambil 4 karya terbaru
        $newestArts = $arts->take(4);

        // Ambil user yang sudah approved
        // dan hitung jumlah karya mereka.
        // User::approved() = role 'user' + status 'approved'.
        $artists = User::approved()
            ->withCount('karyas')
            ->orderByDesc('karyas_count')
            ->get();

        return view('home', compact(
            'arts',
            'artsData',
            'newestArts',
            'artists'
        ));
    }
}
