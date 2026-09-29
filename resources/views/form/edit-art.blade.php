<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Art - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 bg-[#eedcdc] min-h-screen">


    <!-- BACK -->

    <a href="{{ route('user.profile') }}"
        class="absolute top-6 left-8
               text-[#ca3838]
               text-[10px]
               hover:opacity-70
               transition">

        ← Back

    </a>


    <!-- MAIN -->

    <main class="min-h-screen
                 flex
                 items-center
                 justify-center
                 px-6
                 py-10">


        <!-- EDIT BOX -->

        <div class="w-full
                    max-w-[550px]
                    bg-[#fef6eb]
                    px-10
                    py-8">


            <!-- TITLE -->

            <h1 class="text-center
                       text-[#c83232]
                       text-2xl
                       font-bold
                       mb-8">

                Edit Art

            </h1>


            <!-- IMAGE -->

            <div class="flex justify-center mb-6">

                <div class="w-[180px]
                            h-[180px]
                            overflow-hidden">

                    <img id="preview"
                        src=""
                        class="w-full
                               h-full
                               object-cover"
                        alt="Art">

                </div>

            </div>


            <!-- IMAGE INPUT -->

            <label class="block
                          text-[#c83232]
                          text-[9px]
                          mb-1">

                Art Image

            </label>

            <input
                type="file"
                id="image"
                accept="image/*"
                onchange="changeImage(event)"
                class="w-full
                       text-[9px]
                       mb-5">


            <!-- ART NAME -->

            <label class="block
                          text-[#c83232]
                          text-[9px]
                          mb-1">

                Art Name

            </label>

            <input
                type="text"
                id="title"
                placeholder="Type here"
                class="w-full
                       h-[25px]
                       rounded-full
                       border
                       border-[#cbb8b8]
                       bg-[#eadada]
                       outline-none
                       px-3
                       text-[9px]
                       mb-5">


            <!-- DESCRIPTION -->

            <label class="block
                          text-[#c83232]
                          text-[9px]
                          mb-1">

                Description

            </label>

            <textarea
                id="description"
                placeholder="Type here"
                class="w-full
                       h-[90px]
                       rounded-[12px]
                       border
                       border-[#cbb8b8]
                       bg-[#eadada]
                       outline-none
                       px-3
                       py-2
                       text-[9px]
                       resize-none
                       mb-5"></textarea>


            <!-- CATEGORY -->

            <label class="block
                          text-[#c83232]
                          text-[9px]
                          mb-1">

                Category

            </label>

            <select
                id="category"
                class="w-full
                       h-[25px]
                       rounded-full
                       border
                       border-[#cbb8b8]
                       bg-[#eadada]
                       outline-none
                       px-3
                       text-[9px]
                       mb-8">

                @forelse ($categories as $category)

                    <option
                        value="{{ $category->id_kategori }}"
                        @selected($category->id_kategori === $art->id_kategori)>
                        {{ $category->nama_kategori }}
                    </option>

                @empty

                    <option value="">
                        No category yet
                    </option>

                @endforelse

            </select>


            <!-- SAVE -->

            <div class="flex justify-center">

                <button
                    onclick="saveArt()"
                    class="w-[90px]
                           h-[25px]
                           rounded-full
                           bg-[#c83232]
                           text-white
                           text-[8px]
                           hover:opacity-80
                           transition">

                    Save

                </button>

            </div>


        </div>

    </main>



    <script>

        /*
        |--------------------------------------------------------------------------
        | AMBIL ID ART
        |--------------------------------------------------------------------------
        */

        const params =
            new URLSearchParams(window.location.search);

        const artId =
            {{ $art->id_karya }};


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA ART
        |--------------------------------------------------------------------------
        |
        | Data dikirim oleh KaryaController@edit() sebagai
        | $artData, jadi di sini TIDAK PERLU tahu nama kolom
        | aslinya di database.
        |
        | Bentuk tiap item:
        |     { id, title, description, image, category }
        |
        | CATATAN: `category` di sini sengaja berisi
        | id_kategori (dalam bentuk string), BUKAN nama
        | kategori, supaya nilainya cocok dengan
        | <option value="..."> di form.
        |
        | Dulu di file ini ada `let arts = []` DAN
        | `const arts = ...` sekaligus. Dua deklarasi dengan
        | nama sama di satu scope = SyntaxError:
        | "Identifier 'arts' has already been declared",
        | sehingga seluruh script form ini tidak jalan.
        | Sekarang hanya ada satu deklarasi, di bawah.
        |
        | PENTING: jangan menulis nama perintah Blade
        | (yang diawali tanda "at", seperti at-json atau
        | at-if) di dalam komentar. Blade tetap
        | mengompilasinya, jadi tulisan itu bisa bikin
        | halaman error. Tulis "at-json" saja di komentar.
        |
        */

        /*
        |--------------------------------------------------------------------------
        | CARI ART
        |--------------------------------------------------------------------------
        */

        const arts = @json($artData);


        let art =
            arts.find(
                item => String(item.id) === String(artId)
            );


        /*
        |--------------------------------------------------------------------------
        | CEK ART
        |--------------------------------------------------------------------------
        */

        if (!art) {

            alert("Art tidak ditemukan.");

            window.location.href =
                "{{ route('user.profile') }}";

        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN DATA LAMA
        |--------------------------------------------------------------------------
        */

        if (art) {

            document.getElementById("preview").src =
                art.image || "";

            document.getElementById("title").value =
                art.title || "";

            document.getElementById("description").value =
                art.description || "";

            /* Pilih kategori yang benar.

               CATATAN: nilai <option> di select ini adalah
               id_kategori (mis. "8"), BUKAN nama kategori.
               Karena itu art.category juga sengaja diisi
               id_kategori di KaryaController@edit().

               Jangan pakai nama kategori sebagai fallback —
               select tidak punya option bernilai "Digital",
               jadi .value = "Digital" akan diabaikan diam-diam
               dan select tetap menampilkan kategori pertama. */
            document.getElementById("category").value =
                art.category ?? "";

        }


        /*
        |--------------------------------------------------------------------------
        | GANTI GAMBAR
        |--------------------------------------------------------------------------
        */

        function changeImage(event) {

            const file =
                event.target.files[0];

            if (!file) return;


            const reader =
                new FileReader();


            reader.onload =
                function(e) {

                    document.getElementById("preview").src =
                        e.target.result;

                };


            reader.readAsDataURL(file);

        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN PERUBAHAN
        |--------------------------------------------------------------------------
        */

        function saveArt() {

            const title =
                document.getElementById("title").value.trim();

            const description =
                document.getElementById("description").value.trim();

            const category =
                document.getElementById("category").value;


            /*
            | VALIDASI
            */

            if (!title) {

                alert("Art Name belum diisi.");

                return;

            }


            if (!description) {

                alert("Description belum diisi.");

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | CEK ART MASIH ADA
            |--------------------------------------------------------------------------
            */

            if (!art) {

                alert("Art tidak ditemukan.");

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | KIRIM PERUBAHAN KE DATABASE
            |--------------------------------------------------------------------------
            |
            | Data dummy dari localStorage sudah dihapus.
            |
            | CARA 1 — form biasa (paling sederhana).
            | Ubah <form> menjadi:
            |
            |     <form method="POST"
            |           action="{{ route('arts.update', $art->id_karya) }}"
            |           enctype="multipart/form-data">
            |         @csrf
            |         @method('PATCH')
            |
            | lalu HAPIS seluruh blok script ini.
            |
            | CARA 2 — tetap pakai JavaScript, kirim dengan fetch:
            |
            |     const body = new FormData();
            |     body.append('_method', 'PATCH');
            |     body.append('judul', title);
            |     body.append('deskripsi', description);
            |     body.append('id_kategori', category);
            |     if (file) body.append('file_gambar', file);
            |
            |     fetch('/arts/' + artId, {
            |         method: 'POST',
            |         headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            |         body: body
            |     }).then(() => {
            |         window.location.href = '{{ route('user.profile') }}';
            |     });
            |
            */


            const file =
                document.getElementById("image").files[0];


            if (!category) {
                alert("Category belum dipilih.");
                return;
            }


            const body = new FormData();

            body.append('_method', 'PUT');
            body.append('judul', title);
            body.append('deskripsi', description);
            body.append('id_kategori', category);

            if (file) {
                body.append('file_gambar', file);
            }


            fetch("{{ route('arts.update', $art->id_karya) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: body
            })
                .then(r => r.json().then(data => ({ ok: r.ok, data })))
                .then(({ ok, data }) => {

                    if (!ok) {
                        alert(data.message || "Save failed.");
                        return;
                    }

                    window.location.href = data.redirect;

                })
                .catch(() => alert("Save failed. Please try again."));

        }

    </script>

</body>

</html>