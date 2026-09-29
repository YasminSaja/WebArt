<?php

namespace App\Support;

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

/**
 * Penerjemah data database -> data untuk JavaScript di Blade.
 *
 * KENAPA KELAS INI ADA?
 * ------------------------------------------------------------------
 * Nama kolom di database memakai Bahasa Indonesia:
 *     judul, deskripsi, file_gambar, nama_kategori, id_user, ...
 *
 * Tapi JavaScript di dalam file Blade memakai nama Bahasa Inggris:
 *     title, description, image, category, artistId, ...
 *
 * Kalau dipetakan manual di setiap view, pasti ada view yang lupa
 * (dan itulah yang membuat halaman lama menampilkan "tidak ditemukan").
 * Kelas ini jadi SATU-SATUNYA tempat pemetaan, jadi:
 *     1. Semua halaman dapat data yang sama dan konsisten.
 *     2. Tidak ada data dummy / array kosong lagi di dalam view.
 *     3. Kalau nama kolom berubah, cukup ubah di sini saja.
 *
 * CARA PAKAI (di controller):
 * ------------------------------------------------------------------
 *     return view('artist', [
 *         'artists' => FrontendData::artists($users),
 *     ]);
 *
 * CARA PAKAI (di Blade):
 * ------------------------------------------------------------------
 *     const artists = @json($artists);
 */
class FrontendData
{
    /**
     * Satu karya (artwork) -> bentuk yang dipakai JavaScript.
     *
     * @return array{
     *     id: int,
     *     title: string,
     *     description: string,
     *     image: string,
     *     artist: string,
     *     artistId: int,
     *     artistPhoto: ?string,
     *     category: string,
     *     date: string
     * }
     */
    public static function art(Karya $art): array
    {
        return [
            // id_karya (primary key tabel karyas) -> id
            'id' => $art->id_karya,

            // judul -> title
            'title' => $art->judul ?? 'Untitled',

            // PENTING: selalu string. JavaScript memanggil
            // art.description.toLowerCase(), jadi kalau null
            // halaman akan error.
            'description' => $art->deskripsi ?: 'No description.',

            // file_gambar -> URL publik yang bisa dibuka browser.
            // `karya/abc.jpg` menjadi `/storage/karya/abc.jpg`
            'image' => $art->file_gambar
                ? Storage::url($art->file_gambar)
                : '',

            // id_user -> artistId (dipakai untuk link ke /artist/{id})
            'artistId' => $art->id_user,
            'artist' => $art->user?->name ?? 'Unknown Artist',
            'artistPhoto' => $art->user?->foto_profil,

            // id_kategori -> nama kategori (dipakai filter kategori)
            'category' => $art->kategori?->nama_kategori ?? 'Uncategorized',

            // Tanggal + jam dibuat, format ISO 8601.
            // Dipakai JavaScript dengan new Date(art.date) lalu
            // toLocaleString() supaya tampilannya mengikuti
            // bahasa browser user (mis. "Sep 29, 2026, 2:23 AM").
            'date' => $art->created_at?->toIso8601String() ?? '',
        ];
    }

    /**
     * Daftar karya untuk JavaScript.
     *
     * PENTING untuk controller: pastikan relasi sudah di-load
     * dengan with(['user', 'kategori']) supaya tidak_query N+1.
     *
     * @param  iterable<int, Karya>  $arts
     * @return list<array<string, mixed>>
     */
    public static function arts(iterable $arts): array
    {
        $result = [];

        foreach ($arts as $art) {
            $result[] = self::art($art);
        }

        return $result;
    }

    /**
     * Satu artist -> bentuk yang dipakai JavaScript.
     *
     * CATATAN: tidak ada `username` di sini. Project ini
     * sengaja tidak memakai username, jadi jangan ditambah.
     *
     * @return array{
     *     id: int,
     *     name: string,
     *     bio: string,
     *     photo: ?string,
     *     artworks: int,
     *     date: string
     * }
     */
    public static function artist(User $artist): array
    {
        // withCount('karyas') menambah property `karyas_count`.
        // Kalau lupa, ambil langsung dari relasi.
        $artworks = $artist->karyas_count
            ?? $artist->karyas()->count();

        return [
            // id_user (primary key tabel users) -> id
            'id' => $artist->id_user,

            'name' => $artist->name ?? 'Artist',

            // PENTING: selalu string, bukan null.
            'bio' => $artist->bio ?: 'CreateTopia artist.',

            // foto_profil -> URL, atau null kalau belum upload foto
            'photo' => $artist->foto_profil,

            // Jumlah karya (dari withCount('karyas'))
            'artworks' => $artworks,

            // Tanggal daftar, format ISO 8601 (sama seperti karya).
            'date' => $artist->created_at?->toIso8601String() ?? '',
        ];
    }

    /**
     * Daftar artist untuk JavaScript.
     *
     * PENTING untuk controller: pakai withCount('karyas')
     * supaya tidak query ulang untuk setiap artist.
     *
     * @param  iterable<int, User>  $artists
     * @return list<array<string, mixed>>
     */
    public static function artists(iterable $artists): array
    {
        $result = [];

        foreach ($artists as $artist) {
            $result[] = self::artist($artist);
        }

        return $result;
    }

    /**
     * Direktori artist yang di-index berdasarkan id.
     *
     * Dipakai halaman artwork: dari kartu artwork, user bisa
     * membuka modal artist. JavaScript mencarinya seperti ini:
     *     artistDirectory[artistId]
     * Karena itu hasilnya harus OBJECT yang key-nya = id artist.
     *
     * @param  iterable<int, User>  $artists
     * @return array<int, array{name: string, bio: string, image: string}>
     */
    public static function artistDirectory(iterable $artists): array
    {
        $directory = [];

        foreach ($artists as $artist) {
            $directory[$artist->id_user] = [
                'name' => $artist->name ?? 'Artist',
                'bio' => $artist->bio ?: '',
                'image' => $artist->foto_profil ?? '',
            ];
        }

        return $directory;
    }

    /**
     * Daftar kategori untuk filter di halaman category.
     *
     * @param  iterable<int, Kategori>  $categories
     * @return list<array{id_kategori: int|string, nama_kategori: string}>
     */
    public static function categories(iterable $categories): array
    {
        $result = [];

        foreach ($categories as $category) {
            $result[] = [
                'id_kategori' => $category->id_kategori,
                'nama_kategori' => $category->nama_kategori,
            ];
        }

        return $result;
    }

    /**
     * Data user yang sedang login untuk halaman profile.
     *
     * @return array{name: string, bio: string, photo: ?string}
     */
    public static function profileUser(User $user): array
    {
        return [
            'name' => $user->name ?? 'Your Name',
            'bio' => $user->bio ?: 'Your bio goes here.',
            'photo' => $user->foto_profil,
        ];
    }
}
