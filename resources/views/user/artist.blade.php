<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artist - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="m-0 bg-white">


    <!-- WEBSITE FULL DESKTOP -->

    <main class="w-full
                 min-h-screen
                 bg-white
                 border-l-[30px]
                 border-r-[30px]
                 border-[#ce3037]
                 box-border">


        <!-- NAVBAR -->

        <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

            <a href="{{ route('user.home') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Home
            </a>

            <a href="{{ route('user.arts') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Arts
            </a>

            <a href="{{ route('user.artist') }}"
               class="bg-[#72ccd2]
                      text-white
                      px-2 py-1
                      rounded
                      text-xs
                      hover:opacity-80
                      transition">
                Artist
            </a>

            <a href="{{ route('user.category') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Category
            </a>

            <a href="{{ route('user.profile') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
            Profile
            </a>

        </nav>


        <!-- CONTENT -->

        <section class="w-full
                        px-6
                        md:px-10
                        lg:px-12
                        xl:px-14
                        pb-10">


            <!-- TITLE -->

            <div class="mb-4">

                <h1 class="m-0
                           text-[#ffd98e]
                           text-3xl
                           md:text-4xl
                           font-bold">

                    Wonderful Artist

                </h1>

            </div>


            <!-- CYAN LINE -->

            <div class="w-full
                        h-2
                        bg-[#65c4d2]
                        mb-5">
            </div>


            <!-- ARTIST GRID -->

            <div class="grid
                        grid-cols-2
                        md:grid-cols-3
                        lg:grid-cols-4
                        gap-x-5
                        gap-y-5">


                <!-- ARTIST 1 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/zayne.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Zayne">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Zayne

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Drifting slowly in
                        the quiet and frozen
                        world of Zayne.

                    </p>

                </a>


                <!-- ARTIST 2 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/natara.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Natara">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Natara

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Saya yang membuat
                        si semoga semuanya
                        lancar sentosa.

                    </p>

                </a>


                <!-- ARTIST 3 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/aetheria-vane.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Aetheria Vane">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Aetheria Vane

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Melukis keindahan
                        langit dalam karya
                        seni.

                    </p>

                </a>


                <!-- ARTIST 4 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/kaelen-bryce.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Kaelen Bryce">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Kaelen Bryce

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Menggoreskan
                        imajinasi tanpa
                        batas pada kanvas.

                    </p>

                </a>


                <!-- ARTIST 5 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/zevida-dawn.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Zevida Dawn">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Zevida Dawn

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Merangkai cerita
                        indah lewat warna
                        seni.

                    </p>

                </a>


                <!-- ARTIST 6 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/lyra-sterling.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Lyra Sterling">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Lyra Sterling

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Menghidupkan cahaya
                        baru dalam karya
                        visual.

                    </p>

                </a>


                <!-- ARTIST 7 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/adrian-frost.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Adrian Frost">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Adrian Frost

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Membekukan momen
                        indah dalam
                        goresan seni.

                    </p>

                </a>


                <!-- ARTIST 8 -->

                <a href="#"
                   class="bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/artists/famous-artist.jpg') }}"
                        class="w-full
                               h-[130px]
                               object-cover
                               rounded-full
                               mb-2"
                        alt="Famous artist">

                    <h2 class="font-bold
                               text-[12px]
                               leading-tight
                               text-gray-800">

                        Famous artist

                    </h2>

                    <p class="text-[9px]
                              leading-[12px]
                              text-gray-500
                              mt-1">

                        Dedicated to
                        showcasing the
                        iconic works.

                    </p>

                </a>


            </div>


            <!-- DOWN ARROW -->

           


        </section>

    </main>

</body>
</html>