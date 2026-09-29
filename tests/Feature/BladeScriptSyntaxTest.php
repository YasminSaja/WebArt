<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;

/*
|--------------------------------------------------------------------------
| TES SYNTAX JAVASCRIPT
|--------------------------------------------------------------------------
| Semua halaman ini menaruh logic-nya di dalam <script>.
| Kalau ada satu baris JavaScript yang salah (misalnya
| `const arts` dideklarasikan dua kali), seluruh script
| gagal jalan dan halaman menampilkan pesan error.
|
| Test ini mengambil setiap <script> dari hasil render,
| lalu memintakan Node.js mengecek sintaksnya — sama
| seperti yang dilakukan browser, tapi lebih cepat.
|
| Dipakai juga `node --check` pada file sementara, jadi
| tidak perlu browser sungguhan.
*/

uses(RefreshDatabase::class);

/**
 * Kumpulkan halaman yang harus dicek sintaksnya.
 *
 * @return array<string, callable(): TestResponse>
 */
function pagesToCheck(): array
{
    $artist = makeArtist();
    $artwork = makeArtwork($artist);

    return [
        'home' => fn () => test()->get(route('home')),
        'arts' => fn () => test()->get(route('arts')),
        'artist directory' => fn () => test()->get(route('artist')),
        'artist detail' => fn () => test()->get(route('artist.profile', $artist->id_user)),
        'art detail' => fn () => test()->get(route('art.detail', $artwork->id_karya)),
        'category' => fn () => test()->get(route('category')),
        'login' => fn () => test()->get(route('login')),
        'register' => fn () => test()->get(route('register')),
        'profile' => fn () => test()->actingAs($artist)->get(route('user.profile')),
        'user home' => fn () => test()->actingAs($artist)->get(route('user.home')),
        'user arts' => fn () => test()->actingAs($artist)->get(route('user.arts')),
        'user artist' => fn () => test()->actingAs($artist)->get(route('user.artist')),
        'user category' => fn () => test()->actingAs($artist)->get(route('user.category')),
        'form profile' => fn () => test()->actingAs($artist)->get(route('form.profile')),
        'form art' => fn () => test()->actingAs($artist)->get(route('form.art')),
        'form edit art' => fn () => test()->actingAs($artist)->get(route('arts.edit', $artwork->id_karya)),
        'admin dashboard' => fn () => test()->actingAs(
            User::factory()->admin()->create()
        )->get(route('admin.dashboard')),
    ];
}

/**
 * Halaman yang dicek. Dipakai juga sebagai dataset Pest.
 *
 * @return array<int, string>
 */
function checkedPages(): array
{
    return [
        'home',
        'arts',
        'artist directory',
        'artist detail',
        'art detail',
        'category',
        'login',
        'register',
        'profile',
        'user home',
        'user arts',
        'user artist',
        'user category',
        'form profile',
        'form art',
        'form edit art',
        'admin dashboard',
    ];
}

it('semua script di halaman tidak punya syntax error', function (string $page) {
    $response = pagesToCheck()[$page]();

    $response->assertOk();

    $errors = [];

    foreach (inlineScripts($response->getContent()) as $index => $script) {
        $error = nodeSyntaxError($script);

        if ($error !== '') {
            $errors[] = "script #{$index}: ".$error;
        }
    }

    expect($errors)->toBe([]);
})->with(checkedPages());
