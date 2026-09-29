<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insert Your Art</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(4deg);
            }
        }

        @keyframes floatSlow {
            0%, 100% {
                transform: translateY(0) rotate(-3deg);
            }

            50% {
                transform: translateY(-14px) rotate(5deg);
            }
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translateY(15px) scale(.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes shine {
            0% {
                transform: translateX(-120%);
            }

            100% {
                transform: translateX(120%);
            }
        }

        .float {
            animation: float 4s ease-in-out infinite;
        }

        .float-slow {
            animation: floatSlow 5s ease-in-out infinite;
        }

        .pop-in {
            animation: popIn .6s ease forwards;
        }

        .input-effect {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background-color .2s ease,
                border-color .2s ease;
        }

        .input-effect:focus {
            transform: translateY(-2px);
            border-color: #c83232;
            box-shadow: 0 5px 15px rgba(200, 50, 50, .12);
            background-color: #f1dddd;
        }

        .image-box {
            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .image-box:hover {
            transform: translateY(-5px) rotate(-1deg);
            box-shadow: 0 12px 25px rgba(200, 50, 50, .15);
        }

        .insert-btn {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                opacity .2s ease;
        }

        .insert-btn:hover {
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 7px 16px rgba(200, 50, 50, .25);
        }

        .insert-btn:active {
            transform: scale(.94);
        }

        .decor {
            user-select: none;
            pointer-events: none;
        }
    </style>
</head>


<body class="m-0 bg-[#ffdf96] overflow-x-hidden">


    <!-- ================= DECORATIONS ================= -->

    <div class="decor fixed top-[12%] left-[7%] text-[#c83232] text-3xl opacity-40 float">
        ✦
    </div>

    <div class="decor fixed top-[22%] right-[8%] text-[#ff7957] text-4xl opacity-50 float-slow">
        ✿
    </div>

    <div class="decor fixed bottom-[15%] left-[9%] text-[#c83232] text-2xl opacity-35 float-slow">
        ♡
    </div>

    <div class="decor fixed bottom-[12%] right-[10%] text-[#ff7957] text-3xl opacity-45 float">
        ✦
    </div>


    <!-- ================= FORM ================= -->

    <main class="relative w-full min-h-screen flex items-center justify-center p-8">


        <!-- Decorative circles -->

        <div
            class="decor absolute top-[12%] left-[18%] w-4 h-4 rounded-full bg-[#c83232] opacity-20 float">
        </div>

        <div
            class="decor absolute bottom-[13%] right-[19%] w-6 h-6 rounded-full border-2 border-[#c83232] opacity-25 float-slow">
        </div>


        <a
            href="{{ route('user.profile') }}"
            class="absolute top-6 left-8 text-[#c83232] text-[10px] hover:underline transition hover:translate-x-1"
        >
            ← Back
        </a>


        <div
            class="relative w-full max-w-[700px] bg-[#fff8ee] shadow-[0_12px_35px_rgba(120,70,30,0.12)] pop-in"
        >


            <!-- ================= HEADER ================= -->

            <header
                class="h-[58px] bg-[#fff0dc] flex items-center justify-center relative overflow-hidden"
            >

                <!-- small decorations -->

                <span class="absolute left-7 top-4 text-[#ff7957] text-sm opacity-60 float">
                    ✦
                </span>

                <span class="absolute right-8 bottom-3 text-[#c83232] text-xs opacity-40 float-slow">
                    ♡
                </span>


                <h1 class="font-serif text-[#c83232] text-2xl font-bold">
                    Insert Your art
                </h1>

            </header>



            <!-- ================= CONTENT ================= -->

            <section class="px-12 py-12">

                <div class="grid grid-cols-2 gap-14">


                    <!-- ================= IMAGE ================= -->

                    <div class="flex flex-col items-center">


                        <!-- IMAGE BOX -->

                        <div
                            id="imageBox"
                            class="image-box relative w-[210px] h-[185px] bg-[#ff7957] flex items-center justify-center overflow-hidden"
                        >

                            <!-- shine -->

                            <div
                                id="imageShine"
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full pointer-events-none"
                            ></div>


                            <img
                                id="imagePreview"
                                class="hidden w-full h-full object-cover"
                            >


                            <div
                                id="imagePlaceholder"
                                class="w-[155px] h-[145px] border-2 border-[#c83232] rounded-xl flex items-center justify-center transition duration-300"
                            >

                                <span
                                    id="placeholderIcon"
                                    class="text-[#c83232] text-5xl transition duration-300"
                                >
                                    ◯
                                </span>

                            </div>


                            <!-- little corner -->

                            <span
                                class="absolute top-2 left-3 text-white/70 text-xs"
                            >
                                ✦
                            </span>

                            <span
                                class="absolute bottom-2 right-3 text-white/70 text-xs"
                            >
                                ♡
                            </span>

                        </div>



                        <!-- INSERT IMAGE BUTTON -->

                        <label
                            for="imageInput"
                            class="insert-btn mt-8 w-[105px] h-[22px] rounded-full bg-[#c83232] text-white text-[9px] flex items-center justify-center cursor-pointer"
                        >
                            Insert image
                        </label>


                        <input
                            id="imageInput"
                            type="file"
                            accept="image/*"
                            class="hidden"
                        >


                        <p
                            id="imageFileName"
                            class="text-[8px] text-gray-500 mt-3 text-center max-w-[200px] truncate"
                        ></p>


                        <!-- IMAGE STATUS -->

                        <p
                            id="imageStatus"
                            class="text-[8px] text-[#c83232] mt-1 opacity-0 transition"
                        >
                            Image ready ✦
                        </p>

                    </div>



                    <!-- ================= INPUT ================= -->

                    <div>


                        <!-- TITLE -->

                        <label class="block text-[9px] text-[#c83232] mb-2">
                            Title
                        </label>

                        <input
                            id="artTitle"
                            type="text"
                            placeholder="Type here"
                            maxlength="60"
                            class="input-effect w-full h-[28px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-4 text-[10px]"
                        >


                        <!-- LIVE TITLE -->

                        <div class="mt-2 flex items-center gap-1">
                            <span class="text-[7px] text-gray-400">
                                Preview:
                            </span>

                            <span
                                id="titlePreview"
                                class="text-[8px] text-[#c83232] italic truncate"
                            >
                                Your artwork title
                            </span>
                        </div>



                        <!-- DESCRIPTION -->

                        <label class="block text-[9px] text-[#c83232] mt-6 mb-2">
                            Description
                        </label>

                        <textarea
                            id="artDescription"
                            maxlength="250"
                            placeholder="Type here"
                            class="input-effect w-full h-[105px] rounded-xl border border-[#cbb8b8] bg-[#eadada] outline-none px-4 py-3 text-[10px] resize-none"
                        ></textarea>


                        <!-- CHARACTER COUNT -->

                        <div class="flex justify-end mt-1">
                            <span
                                id="charCount"
                                class="text-[7px] text-gray-400"
                            >
                                0 / 250
                            </span>
                        </div>



                        <!-- CATEGORY -->

                        <label class="block text-[9px] text-[#c83232] mt-5 mb-2">
                            Category
                        </label>

                        <select
                            id="artCategory"
                            name="id_kategori"
                            class="input-effect w-[120px] h-[27px] rounded border border-[#cbb8b8] bg-[#eadada] text-[9px] text-gray-600 px-2 outline-none"
                        >

                            @forelse ($categories as $category)

                                {{--
                                    value = id_kategori  -> dikirim ke
                                    server saat form di-submit.

                                    Teks di dalam <option> = nama
                                    kategori -> yang dilihat user.
                                --}}
                                <option
                                    value="{{ $category->id_kategori }}">
                                    {{ $category->nama_kategori }}
                                </option>

                            @empty

                                <option value="">
                                    No category yet
                                </option>

                            @endforelse

                        </select>


                        <!-- LIVE CATEGORY
                             Isi badge ini BUKAN dari server, tapi
                             diisi oleh JS dari teks option yang
                             sedang dipilih (lihat updateCategoryBadge).
                             Kalau ditulis manual di sini, bisa jadi
                             tidak sama dengan pilihan default. -->

                        <div class="mt-3">

                            <span
                                id="categoryBadge"
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-[#ffdf96] text-[#c83232] text-[7px] transition"
                            >
                            </span>

                        </div>

                    </div>

                </div>

            </section>



            <!-- ================= FOOTER ================= -->

            <div
                class="h-[58px] bg-[#fff0dc] flex items-center justify-end px-12"
            >

                <button
                    type="button"
                    onclick="insertArt()"
                    class="insert-btn w-[105px] h-[22px] rounded-full bg-[#c83232] text-white text-[9px]"
                >
                    Insert your art
                </button>

            </div>


        </div>

    </main>



    <!-- ================= JAVASCRIPT ================= -->

    <script>


        // ================= ELEMENTS =================

        const imageInput =
            document.getElementById("imageInput");

        const imagePreview =
            document.getElementById("imagePreview");

        const imagePlaceholder =
            document.getElementById("imagePlaceholder");

        const imageFileName =
            document.getElementById("imageFileName");

        const imageStatus =
            document.getElementById("imageStatus");

        const imageShine =
            document.getElementById("imageShine");

        const placeholderIcon =
            document.getElementById("placeholderIcon");

        const artTitle =
            document.getElementById("artTitle");

        const titlePreview =
            document.getElementById("titlePreview");

        const artDescription =
            document.getElementById("artDescription");

        const charCount =
            document.getElementById("charCount");

        const artCategory =
            document.getElementById("artCategory");

        const categoryBadge =
            document.getElementById("categoryBadge");



        // ================= IMAGE PREVIEW =================

        imageInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }


            const reader = new FileReader();


            reader.onload = function (e) {

                imagePreview.src =
                    e.target.result;

                imagePreview.classList.remove("hidden");

                imagePlaceholder.classList.add("hidden");

                imageFileName.textContent =
                    file.name;

                imageStatus.classList.remove("opacity-0");


                // Shine animation

                imageShine.classList.remove("-translate-x-full");

                imageShine.classList.add("translate-x-full");


                setTimeout(() => {

                    imageShine.classList.remove("translate-x-full");

                    imageShine.classList.add("-translate-x-full");

                }, 700);

            };


            reader.readAsDataURL(file);

        });



        // ================= TITLE PREVIEW =================

        artTitle.addEventListener("input", function () {

            const value =
                this.value.trim();

            titlePreview.textContent =
                value || "Your artwork title";

        });



        // ================= DESCRIPTION COUNTER =================

        artDescription.addEventListener("input", function () {

            const length =
                this.value.length;

            charCount.textContent =
                `${length} / 250`;

        });



        // ================= CATEGORY =================
        //
        // PENTING: nilai (value) tiap <option> adalah
        // id_kategori, bukan nama kategori. Jadi kalau kita
        // menulis this.value, yang muncul di badge adalah
        // angka (mis. "7"), bukan "Traditional".
        //
        // Yang kita butuhkan adalah TEKS option yang sedang
        // dipilih:
        //     this.options[this.selectedIndex].text
        //     ^^^^^^^^  daftar semua <option>
        //            ^^^^^^^^^^^^^^^^^^  nomor urut yang dipilih
        //                               .text  teks yang terlihat

        function updateCategoryBadge() {

            const option = artCategory.options[artCategory.selectedIndex];

            const name = option
                ? option.text.trim()
                : "";

            categoryBadge.textContent = name
                ? "✦ " + name
                : "✦ No category yet";

        }


        artCategory.addEventListener("change", updateCategoryBadge);


        /* Set badge sesuai pilihan AWAL, supaya tidak kosong
           dan tidak menampilkan kategori yang keliru. */
        updateCategoryBadge();



        // ================= IMAGE HOVER =================

        const imageBox =
            document.getElementById("imageBox");


        imageBox.addEventListener("mouseenter", function () {

            if (!imagePreview.classList.contains("hidden")) {

                imagePreview.style.transform =
                    "scale(1.04)";

                imagePreview.style.transition =
                    "transform .4s ease";

            } else {

                placeholderIcon.style.transform =
                    "rotate(15deg) scale(1.1)";

            }

        });


        imageBox.addEventListener("mouseleave", function () {

            imagePreview.style.transform =
                "scale(1)";

            placeholderIcon.style.transform =
                "rotate(0) scale(1)";

        });



        // ================= INSERT ART =================

        function insertArt() {

            const title =
                document.getElementById("artTitle").value.trim();

            const description =
                document.getElementById("artDescription").value.trim();

            const category =
                document.getElementById("artCategory").value;

            const image =
                imageInput.files[0];


            if (!title) {

                alert("Please enter the art title.");

                artTitle.focus();

                return;
            }


            if (!image) {

                alert("Please insert an image.");

                imageInput.click();

                return;
            }


            if (!category) {
                alert("Please choose a category.");
                return;
            }


            const button =
                document.querySelector(
                    'button[onclick="insertArt()"]'
                );

            const originalLabel = button.textContent;

            button.textContent = "Uploading...";

            button.disabled = true;

            button.style.opacity = "0.7";


            // Siapkan data karya untuk dikirim ke server

            const body = new FormData();

            body.append('judul', title);
            body.append('deskripsi', description);
            body.append('id_kategori', category);
            body.append('file_gambar', image);


            fetch("{{ route('arts.store') }}", {
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
                        button.textContent = originalLabel;
                        button.disabled = false;
                        button.style.opacity = "1";
                        alert(data.message || "Upload failed.");
                        return;
                    }

                    button.textContent = "Saved ✦";

                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 500);

                })
                .catch(() => {
                    button.textContent = originalLabel;
                    button.disabled = false;
                    button.style.opacity = "1";
                    alert("Upload failed. Please try again.");
                });

        }

    </script>

</body>

</html>