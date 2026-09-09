<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artists - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 bg-white text-gray-700">

    <!-- ================= ARTISTS ================= -->

    <main class="w-full min-h-screen bg-white px-6 md:px-10 lg:px-14 py-8">

        <!-- Header -->
        <div class="flex items-center justify-between mb-3">

            <h1 class="text-3xl md:text-4xl font-semibold text-[#ffb84d]">
                Artists
            </h1>

            <!-- Filter -->
            <div class="flex gap-2">

                <button
                    class="text-[10px] px-3 py-1 rounded-md bg-gray-100 hover:bg-[#ffb84d] hover:text-white transition"
                >
                    Latest
                </button>

                <button
                    class="text-[10px] px-3 py-1 rounded-md bg-gray-100 hover:bg-[#ffb84d] hover:text-white transition"
                >
                    Oldest
                </button>

            </div>

        </div>


        <!-- Cyan line -->

        <div class="w-full h-2 bg-[#55bfd1] rounded-sm mb-5"></div>


        <!-- Search -->

        <div class="flex justify-center mb-8">

            <div class="flex items-center bg-[#eee8f2] rounded-full px-4 w-64 md:w-80">

                <input
                    type="text"
                    placeholder="Search here"
                    class="bg-transparent outline-none text-xs py-2 w-full"
                >

                <span class="text-xs">
                    🔍
                </span>

            </div>

        </div>


        <!-- ================= ARTIST GRID ================= -->

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">


            <!-- ARTIST 1 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=12"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Zayne
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Digital Artist
                </p>

            </article>


            <!-- ARTIST 2 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=47"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Natara
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Illustrator
                </p>

            </article>


            <!-- ARTIST 3 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=44"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Aetheria Vane
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Concept Artist
                </p>

            </article>


            <!-- ARTIST 4 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=68"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Kaelen Bryce
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Painter
                </p>

            </article>


            <!-- ARTIST 5 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=32"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Arven
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Character Artist
                </p>

            </article>


            <!-- ARTIST 6 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=5"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Elora
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Digital Artist
                </p>

            </article>


            <!-- ARTIST 7 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=25"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Lyra
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Illustrator
                </p>

            </article>


            <!-- ARTIST 8 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=15"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Adrian
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Painter
                </p>

            </article>


            <!-- ARTIST 9 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=8"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Zevida
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Digital Artist
                </p>

            </article>


            <!-- ARTIST 10 -->

            <article
                class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition"
            >

                <img
                    src="https://i.pravatar.cc/150?img=20"
                    class="w-28 h-28 mx-auto rounded-full object-cover"
                >

                <h3 class="text-center font-semibold mt-3 text-sm">
                    Elian
                </h3>

                <p class="text-center text-[10px] text-gray-500">
                    Concept Artist
                </p>

            </article>


        </div>


        <!-- Down Arrow -->

        <div class="flex justify-center mt-10">

            <span class="text-[#ff9f43] text-3xl">
                ↓
            </span>

        </div>

    </main>

</body>
</html>