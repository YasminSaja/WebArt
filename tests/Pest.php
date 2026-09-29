<?php

use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(TestCase::class)
 // ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

/*
|--------------------------------------------------------------------------
| HELPER BUATAN TES
|--------------------------------------------------------------------------
| Semua halaman di project ini menampilkan datanya lewat
| JavaScript di dalam Blade. Jadi kalau controller lupa
| mengirim data, halaman tetap "berhasil" 200 tapi isinya
| kosong / error. Tes di tests/Feature dibuat untuk menangkap
| masalah seperti itu.
*/

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;

/**
 * Buat user biasa yang sudah disetujui admin.
 */
function makeArtist(array $attributes = []): User
{
    return User::factory()->create(array_merge([
        'name' => 'Yasmin Pratama',
    ], $attributes));
}

/**
 * Buat satu karya milik seorang artist.
 */
function makeArtwork(User $artist, string $category = 'Digital'): Karya
{
    $kategori = Kategori::firstOrCreate([
        'nama_kategori' => $category,
    ]);

    return Karya::create([
        'judul' => 'Lukisan Gunung',
        'deskripsi' => 'Lukisan gunung saat senja.',
        'file_gambar' => 'karya/gunung.jpg',
        'id_user' => $artist->id_user,
        'id_kategori' => $kategori->id_kategori,
    ]);
}

/**
 * Ambil semua isi <script> dari HTML.
 *
 * @return array<int, string>
 */
function inlineScripts(string $html): array
{
    preg_match_all(
        '/<script(?![^>]*\bsrc=)[^>]*>(.*?)<\/script>/si',
        $html,
        $matches
    );

    return $matches[1] ?? [];
}

/**
 * Minta Node.js mengecek sintaks satu script.
 *
 * Dipakai untuk menangkap bug seperti
 * "const arts" dideklarasikan dua kali, yang membuat
 * seluruh script halaman gagal jalan.
 *
 * @return string pesan error dari Node, atau '' kalau valid
 */
function nodeSyntaxError(string $javascript): string
{
    if (trim($javascript) === '') {
        return '';
    }

    $file = tempnam(sys_get_temp_dir(), 'blade-js-').'.js';

    file_put_contents($file, $javascript);

    exec('node --check '.escapeshellarg($file).' 2>&1', $output, $exitCode);

    @unlink($file);

    return $exitCode === 0 ? '' : implode("\n", $output);
}
