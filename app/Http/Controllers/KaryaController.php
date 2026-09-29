<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;
use App\Support\FrontendData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    /**
     * Menampilkan semua karya.
     */
    public function index()
    {
        $arts = Karya::with(['user', 'kategori'])
            ->latest()
            ->get();

        $categories = Kategori::all();

        // Dipakai JavaScript untuk modal artist (dari kartu karya).
        $artists = User::approved()
            ->withCount('karyas')
            ->get();

        return view('arts', [
            // $categories dipakai Blade untuk membuat tombol filter.
            'categories' => $categories,

            // Diumpan lewat FrontendData supaya isi kartu di
            // JavaScript selalu konsisten dengan database.
            'artsData' => FrontendData::arts($arts),
            'artistDirectory' => FrontendData::artistDirectory($artists),
        ]);
    }

    /**
     * Menampilkan form upload karya.
     */
    public function create()
    {
        $categories = Kategori::all();

        return view('form.art', compact('categories'));
    }

    /**
     * Menyimpan karya baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
        ]);

        $path = $request->file('file_gambar')
            ->store('karya', 'public');

        Karya::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_gambar' => $path,
            'id_user' => Auth::user()->id_user,
            'id_kategori' => $request->id_kategori,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Artwork berhasil diupload.',
                'redirect' => route('user.profile'),
            ]);
        }

        return redirect()
            ->route('user.profile')
            ->with('success', 'Artwork berhasil diupload.');
    }

    /**
     * Menampilkan detail satu karya.
     */
    public function show($id)
    {
        $art = Karya::with(['user', 'kategori'])
            ->findOrFail($id);

        return view('art.detail', [
            'art' => FrontendData::art($art),
        ]);
    }

    /**
     * Form edit karya.
     */
    public function edit($id)
    {
        $art = Karya::with('kategori')->findOrFail($id);

        $categories = Kategori::all();

        return view('form.edit-art', [
            'art' => $art,
            'categories' => $categories,
            'artData' => [[
                'id' => $art->id_karya,
                'title' => $art->judul,
                'description' => $art->deskripsi,
                'image' => $art->file_gambar
                    ? Storage::url($art->file_gambar)
                    : '',
                // Form edit memakai nilai (string) id_kategori
                // supaya cocok dengan <option value="...">
                'category' => (string) $art->id_kategori,
            ]],
        ]);
    }

    /**
     * Mengubah karya.
     */
    public function update(Request $request, $id)
    {
        $art = Karya::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
        ];

        if ($request->hasFile('file_gambar')) {
            $data['file_gambar'] = $request->file('file_gambar')
                ->store('karya', 'public');
        }

        $art->update($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Artwork berhasil diperbarui.',
                'redirect' => route('user.profile'),
            ]);
        }

        return redirect()
            ->route('user.profile')
            ->with('success', 'Artwork berhasil diperbarui.');
    }

    /**
     * Menghapus karya.
     */
    public function destroy(Request $request, $id)
    {
        $art = Karya::findOrFail($id);

        if ($art->file_gambar) {
            Storage::disk('public')->delete($art->file_gambar);
        }

        $art->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Artwork berhasil dihapus.',
            ]);
        }

        return redirect()
            ->route('arts')
            ->with('success', 'Artwork berhasil dihapus.');
    }
}
