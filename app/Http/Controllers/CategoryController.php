<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use App\Support\FrontendData;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Kategori::all();

        $query = Karya::with([
            'user',
            'kategori',
        ]);

        // Kalau user memilih kategori
        if ($request->filled('category')) {
            $query->where(
                'id_kategori',
                $request->category
            );
        }

        $arts = $query
            ->latest('created_at')
            ->get();

        return view('category', [
            // Dipakai Blade untuk membuat tombol filter.
            'categories' => $categories,

            // Dipakai JavaScript untuk menandai tombol aktif.
            'categoriesData' => FrontendData::categories($categories),

            'arts' => FrontendData::arts($arts),
        ]);
    }
}
