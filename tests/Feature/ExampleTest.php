<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Halaman `/` menampilkan karya & artist dari database, jadi tes ini
| butuh tabelnya. RefreshDatabase menyiapkan database kosong
| (sqlite in-memory) untuk setiap tes.
*/

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
