<?php

use App\Models\Karya;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| TES INI MENJAGA HAL PENTING:
|--------------------------------------------------------------------------
| Setiap halaman harus MENERIMA data dari database lewat
| FrontendData, bukan array kosong. Sebelumnya view menulis
| `let artists = []` sehingga halaman selalu menampilkan
| "tidak ditemukan" walau datanya ada di database.
*/

uses(RefreshDatabase::class);

it('halaman daftar artist mengirim data artist ke javascript', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $response = $this->get(route('artist'));

    $response->assertOk();

    // Nama artist harus muncul di JSON yang dikirim ke JS.
    $response->assertSee('Yasmin Pratama', false);

    // Bentuk data harus mengikuti FrontendData::artists().
    $response->assertSee('"id":'.$artist->id_user, false);

    // Project ini tidak memakai username.
    $response->assertDontSee('"username"', false);
});

it('halaman detail artist mengirim karya milik artist itu', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($artist);

    $response = $this->get(route('artist.profile', $artist->id_user));

    $response->assertOk();
    $response->assertSee('Yasmin Pratama', false);
    $response->assertSee($artwork->judul, false);
    $response->assertSee('"artistId":'.$artist->id_user, false);
});

it('halaman profile menampilkan nama user yang sebenarnya', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);

    $response = $this->actingAs($user)->get(route('user.profile'));

    $response->assertOk();
    $response->assertSee('Yasmin Pratama', false);

    // Teks placeholder lama tidak boleh lagi jadi sumber data.
    $response->assertSee('"name":"Yasmin Pratama"', false);
});

it('halaman profile menampilkan karya milik user yang login', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($user, 'Painting');

    $response = $this->actingAs($user)->get(route('user.profile'));

    $response->assertOk();
    $response->assertSee($artwork->judul, false);
    $response->assertSee('"category":"Painting"', false);
});

it('halaman arts mengirim daftar karya dan direktori artist', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($artist);

    $response = $this->get(route('arts'));

    $response->assertOk();
    $response->assertSee($artwork->judul, false);
    $response->assertSee('"artistId":'.$artist->id_user, false);

    // artistDirectory adalah object yang key-nya = id artist.
    $response->assertSee('"'.$artist->id_user.'":{"name":"Yasmin Pratama"', false);
});

it('halaman detail karya mengirim data karya', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($artist, 'Illustration');

    $response = $this->get(route('art.detail', $artwork->id_karya));

    $response->assertOk();
    $response->assertSee($artwork->judul, false);
    $response->assertSee('"category":"Illustration"', false);
});

it('halaman category mengirim karya dan daftar kategori', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($artist, 'Sculpture');

    $response = $this->get(route('category'));

    $response->assertOk();
    $response->assertSee($artwork->judul, false);
    $response->assertSee('"nama_kategori":"Sculpture"', false);
});

it('halaman beranda mengirim karya ke javascript', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($artist, 'Drawing');

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee($artwork->judul, false);
    $response->assertSee('Yasmin Pratama', false);
});

it('halaman user home, arts, artist, dan category punya data', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);

    $artwork = makeArtwork($user, 'Traditional');

    $this->actingAs($user);

    $this->get(route('user.home'))
        ->assertOk()
        ->assertSee($artwork->judul, false);

    $this->get(route('user.arts'))
        ->assertOk()
        ->assertSee($artwork->judul, false);

    $this->get(route('user.artist'))
        ->assertOk()
        ->assertSee('"name":"Yasmin Pratama"', false)
        ->assertDontSee('"username"', false);

    $this->get(route('user.category'))
        ->assertOk()
        ->assertSee('"nama_kategori":"Traditional"', false);
});

it('karya tanpa deskripsi tetap aman untuk pencarian javascript', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);

    $kategori = Kategori::create(['nama_kategori' => 'Digital']);

    $artwork = Karya::create([
        'judul' => 'Tanpa Deskripsi',
        'deskripsi' => null,
        'file_gambar' => 'karya/kosong.jpg',
        'id_user' => $artist->id_user,
        'id_kategori' => $kategori->id_kategori,
    ]);

    // JavaScript memanggil art.description.toLowerCase(),
    // jadi description tidak boleh null.
    $response = $this->get(route('arts'));

    $response->assertOk();
    $response->assertSee('"description":"No description."', false);
});

it('tidak ada username di halaman manapun', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);
    $artwork = makeArtwork($artist);
    $admin = User::factory()->admin()->create();

    $pages = [
        route('home') => [],
        route('artist') => [],
        route('artist.profile', $artist->id_user) => [],
        route('arts') => [],
        route('art.detail', $artwork->id_karya) => [],
        route('category') => [],
        route('form.profile') => [$artist],
        route('user.home') => [$artist],
        route('user.arts') => [$artist],
        route('user.artist') => [$artist],
        route('user.category') => [$artist],
        route('admin.dashboard') => [$admin],
    ];

    foreach ($pages as $url => $actingAs) {
        $response = $actingAs
            ? $this->actingAs($actingAs[0])->get($url)
            : $this->get($url);

        $response->assertOk();

        // Halaman ini sama sekali tidak boleh menampilkan username.
        $response->assertDontSee('"username"', false);
        $response->assertDontSee('artist.username', false);
        $response->assertDontSee('info.username', false);
        $response->assertDontSee('creatorUsername', false);
        $response->assertDontSee('artistModalUsername', false);
        $response->assertDontSee('detailArtistUsername', false);
        $response->assertDontSee('artistProfileUsername', false);
    }
});

it('carousel artist tidak pernah menampilkan artist yang sama dua kali', function () {
    // Hanya 1 artist di database, tapi layout muat 4 kartu.
    // Halaman ini harus tetap menampilkan 1 kartu, bukan 4.
    makeArtist(['name' => 'Yasmin Pratama']);

    $response = $this->get(route('artist'));

    $response->assertOk();

    // visibleCount harus dibatasi Math.min(...), supaya tidak
    // ada indeks yang diulang (modulus) dan memunculkan duplikat.
    $response->assertSee('Math.min(', false);
    $response->assertDontSee('let visibleArtists = filtered.map', false);
});

it('halaman pending menampilkan akun yang baru didaftarkan', function () {
    // Simulasikan: sudah login sebagai Yasmin, lalu daftar akun baru.
    $oldUser = makeArtist([
        'name' => 'Yasmin Lama',
        'status' => 'approved',
    ]);

    $response = $this->actingAs($oldUser)
        ->withSession([
            'pending_email' => 'baru@example.com',
            'pending_name' => 'Akun Baru',
        ])
        ->get(route('pending.approval'));

    $response->assertOk();

    // Harus menampilkan akun BARU, bukan akun yang sedang login.
    $response->assertSee('Akun Baru', false);
    $response->assertSee('baru@example.com', false);
});

it('halaman pending memakai akun yang login kalau tidak baru daftar', function () {
    $user = makeArtist([
        'name' => 'Yasmin Pratama',
        'status' => 'approved',
    ]);

    $response = $this->actingAs($user)->get(route('pending.approval'));

    $response->assertOk();
    $response->assertSee('Yasmin Pratama', false);
});

it('filter kategori di admin diambil dari database', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);
    makeArtwork($artist, 'Sculpture');

    // Kategori tambahan yang belum dipakai karya mana pun —
    // tombol filter-nya juga harus muncul.
    Kategori::create(['nama_kategori' => 'Photography']);

    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertOk();

    // Semua kategori harus punya tombol filter.
    $response->assertSee('id="categoryFilter"', false);
    $response->assertSee('data-category="Sculpture"', false);
    $response->assertSee('data-category="Photography"', false);
    $response->assertSee('data-category="all"', false);

    // Tombol kategori lama yang ditulis manual harus hilang.
    $response->assertDontSee('id="catDigital"', false);
    $response->assertDontSee('id="catTraditional"', false);
});

it('karya di admin membawa tanggal dan jam upload', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);
    $artwork = makeArtwork($artist);

    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertOk();

    // Helper untuk memformat tanggal + jam harus ada.
    $response->assertSee('function formatDateTime(iso)', false);
    $response->assertSee('formatDateTime(art.date)', false);

    // Tanggal dikirim sebagai ISO 8601, jadi bisa di-parse browser.
    expect($artwork->created_at->toIso8601String())
        ->not->toBe('');
});

it('avatar artist di admin memakai foto kalau ada', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertOk();

    // openArt & openArtist harus memakai innerHTML pada container
    // yang tetap ada, bukan outerHTML yang mengganti element.
    $response->assertSee("getArtistAvatarHtml(artist.name, 'sm', artist.photo || '')", false);
    $response->assertSee("getArtistAvatarHtml(artist.name, 'lg', artist.photo || '')", false);
    $response->assertDontSee('detailArtistAvatar\').outerHTML', false);
    $response->assertDontSee('artistProfileAvatar\')\n    .outerHTML', false);
});

it('karya di halaman artist memakai route yang benar', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);
    $artwork = makeArtwork($artist);

    $response = $this->get(route('artist.profile', $artist->id_user));

    $response->assertOk();

    // Dulu link-nya ditulis manual jadi "/art/5", padahal route-nya
    // "/arts/{id}" -> 404. Sekarang harus pakai route('art.detail').
    $response->assertSee("route('art.detail'", false);
    $response->assertDontSee("url('/art')", false);
});

it('route detail karya benar-benar bisa dibuka', function () {
    $artist = makeArtist(['name' => 'Yasmin Pratama']);
    $artwork = makeArtwork($artist);

    // URL yang dibangun link di halaman artist.
    $this->get(route('art.detail', $artwork->id_karya))
        ->assertOk()
        ->assertSee($artwork->judul, false);
});

it('halaman publik tidak menampilkan akun yang belum approved', function () {
    // Tiga akun dengan status berbeda.
    $approved = makeArtist(['name' => 'Sudah Approved']);
    $pending = makeArtist(['name' => 'Masih Pending', 'status' => 'pending']);
    $rejected = makeArtist(['name' => 'Ditolak', 'status' => 'rejected']);

    foreach ([
        route('artist') => 'daftar artist',
        route('home') => 'beranda',
        route('arts') => 'daftar karya',
    ] as $url => $label) {
        $response = $this->get($url);

        $response->assertOk();
        $response->assertSee('Sudah Approved', false);
        $response->assertDontSee('Masih Pending', false);
        $response->assertDontSee('Ditolak', false);
    }

    // Halaman profil artist yang belum approved = 404 (tidak ada
    // di daftar, jadi tidak harus bisa dibuka publik).
    $this->get(route('artist.profile', $pending->id_user))->assertNotFound();
    $this->get(route('artist.profile', $rejected->id_user))->assertNotFound();

    // Yang approved tetap bisa dibuka.
    $this->get(route('artist.profile', $approved->id_user))->assertOk();
});

it('scope approved hanya mengambil role user yang statusnya approved', function () {
    makeArtist(['name' => 'A Approved']);
    makeArtist(['name' => 'B Pending', 'status' => 'pending']);
    makeArtist(['name' => 'C Rejected', 'status' => 'rejected']);
    User::factory()->admin()->create();

    $names = User::approved()->pluck('name')->all();

    expect($names)->toBe(['A Approved']);
});

it('kartu artist di admin memakai foto profil', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertOk();

    // Semua pemanggilan di halaman artist harus mengirim foto.
    $response->assertDontSee("getArtistAvatarHtml(artist.name, 'md');", false);
    $response->assertSee("artist.name, 'md', artist.photo || ''", false);
    $response->assertSee("artist.name, 'sm', artist.photo || ''", false);
    $response->assertSee("artist.name, 'lg', artist.photo || ''", false);
});

it('dashboard admin punya daftar artist terbaru dan akun pending', function () {
    makeArtist(['name' => 'Artist Lama']);
    makeArtist(['name' => 'Artist Baru', 'status' => 'pending']);

    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get(route('admin.dashboard'));

    $response->assertOk();

    // Wadah untuk dua daftar baru.
    $response->assertSee('id="dashboardArtists"', false);
    $response->assertSee('id="dashboardPending"', false);
    $response->assertSee('Latest Artists', false);
    $response->assertSee('Pending Accounts', false);

    // Fungsi peng-render-nya harus dipanggil saat load.
    $response->assertSee('function renderDashboardArtists()', false);
    $response->assertSee('function renderDashboardPending()', false);
    $response->assertSee('renderDashboardArtists();', false);
    $response->assertSee('renderDashboardPending();', false);
});

it('dropdown kategori di form upload menampilkan nama, bukan id', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);
    makeArtwork($user, 'Sculpture');

    $response = $this->actingAs($user)->get(route('form.art'));

    $response->assertOk();

    // Badge kategori harus mengambil TEKS option yang dipilih,
    // bukan .value (yang isinya id_kategori).
    $response->assertSee('function updateCategoryBadge()', false);
    $response->assertSee('artCategory.options[artCategory.selectedIndex]', false);
    $response->assertDontSee('"✦ " + this.value', false);

    // Nama kategori harus jadi teks <option> yang bisa dipilih.
    $response->assertSee('Sculpture', false);

    // Badge tidak boleh diisi manual di HTML.
    $response->assertDontSee('✦ Traditional', false);
});

it('dropdown kategori di profile memakai semua kategori dari database', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);
    makeArtwork($user, 'Photography');

    // Kategori tambahan — semua harus muncul sebagai opsi.
    Kategori::create(['nama_kategori' => 'Sculpture']);
    Kategori::create(['nama_kategori' => 'Illustration']);

    $response = $this->actingAs($user)->get(route('user.profile'));

    $response->assertOk();

    // Opsi dropdown harus dari database, bukan 2 kategori manual.
    $response->assertSee('value="Photography"', false);
    $response->assertSee('value="Sculpture"', false);
    $response->assertSee('value="Illustration"', false);
});

it('form edit karya memakai id kategori yang valid sebagai nilai select', function () {
    $user = makeArtist(['name' => 'Yasmin Pratama']);
    $artwork = makeArtwork($user, 'Digital');
    $kategoriId = $artwork->kategori->id_kategori;

    $response = $this->actingAs($user)
        ->get(route('arts.edit', $artwork->id_karya));

    $response->assertOk();

    // Nilai <option> = id_kategori, dan JS harus memakai
    // id itu (bukan nama) saat memilih kategori.
    $response->assertSee('value="'.$kategoriId.'"', false);
    $response->assertSee('art.category ?? ""', false);
});

it('user home menampilkan artist paling aktif dari seluruh komunitas', function () {
    // User yang sedang login: hanya 1 karya.
    $me = makeArtist(['name' => 'Saya Sendiri']);

    // Artist lain yang lebih aktif: 3 karya.
    $star = makeArtist(['name' => 'Artist superstar']);
    makeArtwork($star, 'Digital');
    makeArtwork($star, 'Digital');
    makeArtwork($star, 'Digital');

    makeArtwork($me, 'Painting');

    $response = $this->actingAs($me)->get(route('user.home'));

    $response->assertOk();

    // Carousel "Most Uploaded Artists" harus berisi SEMUA artist
    // approved, bukan cuma artist dari karya milik user sendiri.
    $response->assertSee('"name":"Artist superstar"', false);
    $response->assertSee('"name":"Saya Sendiri"', false);

    // artistList dibangun dari daftar artist, bukan dari allArts.
    // (Catatan: @json() sudah dikompilasi Blade, jadi di sini
    // cukup cek hasilnya, bukan sintaks aslinya.)
    $response->assertSee('const artists = [{"id"', false);
    $response->assertDontSee('artistDirectory', false);
    $response->assertDontSee('allArts.forEach(art => {', false);
});

it('user home mengurutkan artist dari yang paling banyak karya', function () {
    $me = makeArtist(['name' => 'Saya Sendiri']);

    $few = makeArtist(['name' => 'Artist Sedikit']);
    makeArtwork($few, 'Digital');

    $many = makeArtist(['name' => 'Artist Banyak']);
    makeArtwork($many, 'Digital');
    makeArtwork($many, 'Digital');
    makeArtwork($many, 'Digital');

    $response = $this->actingAs($me)->get(route('user.home'));

    $response->assertOk();

    // Urutan ditentukan di JS lewat .artworks (dari FrontendData).
    $response->assertSee('.sort((a, b) => b.artworks - a.artworks)', false);
    $response->assertSee('${artist.artworks}', false);
    $response->assertDontSee('${artist.arts.length}', false);
});

it('artist yang belum approved tidak muncul di user home', function () {
    $me = makeArtist(['name' => 'Saya Sendiri']);
    makeArtist(['name' => 'Masih Pending', 'status' => 'pending']);

    $response = $this->actingAs($me)->get(route('user.home'));

    $response->assertOk();
    $response->assertSee('Saya Sendiri', false);
    $response->assertDontSee('Masih Pending', false);
});

it('form edit profile mengisi nama dan bio user yang login', function () {
    $user = makeArtist([
        'name' => 'Yasmin Pratama',
        'bio' => 'Saya suka lukisan digital.',
    ]);

    $response = $this->actingAs($user)->get(route('form.profile'));

    $response->assertOk();
    $response->assertSee('"name":"Yasmin Pratama"', false);
    $response->assertSee('"bio":"Saya suka lukisan digital."', false);
});

it('user tanpa bio tetap mendapat teks cadangan', function () {
    $user = makeArtist([
        'name' => 'Yasmin Pratama',
        'bio' => null,
    ]);

    $response = $this->actingAs($user)->get(route('user.profile'));

    $response->assertOk();
    $response->assertSee('"bio":"Your bio goes here."', false);
});
