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

                <option value="Digital">
                    Digital
                </option>

                <option value="Traditional">
                    Traditional
                </option>

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
            params.get("id");


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA ART
        |--------------------------------------------------------------------------
        */

        let arts =
            JSON.parse(
                localStorage.getItem("userArts") || "[]"
            );


        /*
        |--------------------------------------------------------------------------
        | CARI ART
        |--------------------------------------------------------------------------
        */

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

            document.getElementById("category").value =
                art.category || "Digital";

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
            | CARI INDEX ART
            */

            const index =
                arts.findIndex(
                    item => String(item.id) === String(artId)
                );


            if (index === -1) {

                alert("Art tidak ditemukan.");

                return;

            }


            /*
            | UPDATE DATA
            */

            arts[index].title =
                title;

            arts[index].description =
                description;

            arts[index].category =
                category;


            /*
            |--------------------------------------------------------------------------
            | JIKA ADA GAMBAR BARU
            |--------------------------------------------------------------------------
            */

            const file =
                document.getElementById("image").files[0];


            if (file) {

                const reader =
                    new FileReader();


                reader.onload =
                    function(e) {

                        arts[index].image =
                            e.target.result;


                        localStorage.setItem(
                            "userArts",
                            JSON.stringify(arts)
                        );


                        alert("Art berhasil diperbarui!");

                        window.location.href =
                            "{{ route('user.profile') }}";

                    };


                reader.readAsDataURL(file);

            }


            /*
            |--------------------------------------------------------------------------
            | JIKA TIDAK ADA GAMBAR BARU
            |--------------------------------------------------------------------------
            */

            else {

                localStorage.setItem(
                    "userArts",
                    JSON.stringify(arts)
                );


                alert("Art berhasil diperbarui!");

                window.location.href =
                    "{{ route('user.profile') }}";

            }

        }

    </script>

</body>

</html>