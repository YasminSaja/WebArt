<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insert Your Art</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="m-0 bg-[#ffdf96]">


    <!-- ================= FORM ================= -->

    <main class="w-full min-h-screen flex items-center justify-center p-8">

        <a
            href="{{ route('user.profile') }}"
            class="absolute top-6 left-8 text-[#c83232] text-[10px] hover:underline"
        >
            ← Back
        </a>


        <div class="w-full max-w-[700px] bg-[#fff8ee]">


            <!-- ================= HEADER ================= -->

            <header
                class="h-[58px] bg-[#fff0dc] flex items-center justify-center relative"
            >

                <h1 class="font-serif text-[#c83232] text-2xl font-bold">
                    Insert Your art
                </h1>


                <button
                    onclick="openSettings()"
                    class="absolute right-7 text-[9px] text-[#c83232] hover:opacity-60"
                >
                    ⚙ Settings
                </button>

            </header>



            <!-- ================= CONTENT ================= -->

            <section class="px-12 py-12">

                <div class="grid grid-cols-2 gap-14">


                    <!-- ================= IMAGE ================= -->

                    <div class="flex flex-col items-center">

                        <div
                            class="w-[210px] h-[185px] bg-[#ff7957] flex items-center justify-center overflow-hidden"
                        >

                            <img
                                id="imagePreview"
                                class="hidden w-full h-full object-cover"
                            >


                            <div
                                id="imagePlaceholder"
                                class="w-[155px] h-[145px] border-2 border-[#c83232] rounded-xl flex items-center justify-center"
                            >
                                <span class="text-[#c83232] text-5xl">
                                    ◯
                                </span>
                            </div>

                        </div>


                        <label
                            for="imageInput"
                            class="mt-8 w-[105px] h-[22px] rounded-full bg-[#c83232] text-white text-[9px] flex items-center justify-center cursor-pointer hover:opacity-80"
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
                            class="w-full h-[28px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-4 text-[10px]"
                        >



                        <!-- DESCRIPTION -->

                        <label class="block text-[9px] text-[#c83232] mt-7 mb-2">
                            Description
                        </label>

                        <textarea
                            id="artDescription"
                            placeholder="Type here"
                            class="w-full h-[105px] rounded-xl border border-[#cbb8b8] bg-[#eadada] outline-none px-4 py-3 text-[10px] resize-none"
                        ></textarea>



                        <!-- CATEGORY -->

                        <label class="block text-[9px] text-[#c83232] mt-7 mb-2">
                            Category
                        </label>

                        <select
                            id="artCategory"
                            class="w-[120px] h-[27px] rounded border border-[#cbb8b8] bg-[#eadada] text-[9px] text-gray-600 px-2 outline-none"
                        >

                            <option value="Traditional">
                                Traditional
                            </option>

                            <option value="Digital">
                                Digital
                            </option>

                        </select>

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
                    class="w-[105px] h-[22px] rounded-full bg-[#c83232] text-white text-[9px] hover:opacity-80"
                >
                    Insert your art
                </button>

            </div>


        </div>

    </main>



    <!-- ================= SETTINGS ================= -->

    <div
        id="settingsModal"
        class="fixed inset-0 bg-white/60 backdrop-blur-sm hidden items-center justify-center z-50"
    >

        <div class="w-[300px] bg-[#fff8ee] rounded-lg shadow-lg p-6">


            <div class="flex items-center justify-between mb-5">

                <h2 class="font-serif text-lg font-bold text-[#c83232]">
                    Settings
                </h2>

                <button
                    onclick="closeSettings()"
                    class="text-gray-500 text-sm hover:text-[#c83232]"
                >
                    ✕
                </button>

            </div>


            <div class="space-y-4">


                <div class="flex items-center justify-between">

                    <span class="text-[10px] text-gray-600">
                        Show preview
                    </span>

                    <input
                        type="checkbox"
                        checked
                        class="accent-[#c83232]"
                    >

                </div>


                <div class="flex items-center justify-between">

                    <span class="text-[10px] text-gray-600">
                        Allow comments
                    </span>

                    <input
                        type="checkbox"
                        class="accent-[#c83232]"
                    >

                </div>

            </div>


            <button
                onclick="closeSettings()"
                class="mt-6 w-full h-7 rounded-full bg-[#c83232] text-white text-[9px]"
            >
                Done
            </button>

        </div>

    </div>



    <!-- ================= JAVASCRIPT ================= -->

    <script>


        // ================= IMAGE PREVIEW =================

        const imageInput =
            document.getElementById("imageInput");

        const imagePreview =
            document.getElementById("imagePreview");

        const imagePlaceholder =
            document.getElementById("imagePlaceholder");

        const imageFileName =
            document.getElementById("imageFileName");


        imageInput.addEventListener("change", function () {

            const file = this.files[0];

            if (!file) {
                return;
            }


            const reader = new FileReader();


            reader.onload = function (e) {

                imagePreview.src = e.target.result;

                imagePreview.classList.remove("hidden");

                imagePlaceholder.classList.add("hidden");

                imageFileName.textContent = file.name;

            };


            reader.readAsDataURL(file);

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

                return;
            }


            if (!image) {

                alert("Please insert an image.");

                return;
            }


            const reader = new FileReader();


            reader.onload = function (e) {


                // Ambil nama profile

                const creator =
                    localStorage.getItem("profileName")
                    || "Unknown Artist";


                // Ambil art lama

                const arts =
                    JSON.parse(
                        localStorage.getItem("userArts") || "[]"
                    );


                // Buat art baru

                const newArt = {

                    id: Date.now(),

                    title: title,

                    description: description,

                    category: category,

                    image: e.target.result,

                    creator: creator,

                    date: new Date().toISOString()

                };


                // Art terbaru di depan

                arts.unshift(newArt);


                // Simpan

                localStorage.setItem(
                    "userArts",
                    JSON.stringify(arts)
                );


                // Kembali profile

                window.location.href =
                    "{{ route('user.profile') }}";

            };


            reader.readAsDataURL(image);

        }



        // ================= SETTINGS =================

        function openSettings() {

            const modal =
                document.getElementById("settingsModal");

            modal.classList.remove("hidden");

            modal.classList.add("flex");

        }


        function closeSettings() {

            const modal =
                document.getElementById("settingsModal");

            modal.classList.add("hidden");

            modal.classList.remove("flex");

        }

    </script>

</body>

</html>