<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Arts - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .cyan-line {
            width: 100%;
            height: 8px;
            background: #65c4d2;
            margin-bottom: 17px;
        }
    </style>
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
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Home
            </a>

            <a href="{{ route('user.arts') }}"
               class="bg-[#72ccd2]
                      text-white
                      px-2 py-1
                      rounded
                      text-xs">
                Arts
            </a>

            <a href="{{ route('user.artist') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Artist
            </a>

            <a href="{{ route('user.category') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Category
            </a>

            <a href="{{ route('user.profile') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
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


            <!-- TITLE + SORT -->

            <div class="flex
                        items-center
                        justify-between
                        mb-6">

                <h1 class="m-0
                           text-[#ffd98e]
                           text-3xl
                           md:text-4xl
                           font-bold">

                    Arts

                </h1>


                <!-- SORT -->

                <div class="flex
                            border
                            border-gray-300
                            rounded-full
                            overflow-hidden
                            text-[9px]">

                    <button
                        class="px-5
                               py-1
                               bg-[#eadff7]
                               border-r
                               border-gray-300">

                        Latest

                    </button>

                    <button
                        class="px-6
                               py-1
                               bg-white">

                        Oldest

                    </button>

                </div>

            </div>


            <!-- CYAN LINE -->

            <div class="cyan-line"></div>


            <!-- SEARCH -->

            <div class="flex justify-center mb-5">

                <input
                    type="text"
                    placeholder="Search here"
                    class="w-72
                           h-7
                           rounded-full
                           bg-[#eeeaf1]
                           border-0
                           outline-none
                           px-4
                           text-[9px]"
                >

            </div>


            <!-- ART GRID -->

            <div class="grid
                        grid-cols-1
                        md:grid-cols-2
                        lg:grid-cols-3
                        gap-x-5
                        gap-y-5">


                <!-- CARD 1 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/mona-lisa.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Mona Lisa">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            Mona lisa

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Probably the most famous painting in
                            the world is Leonardo da Vinci's
                            La Gioconda, better known as Mona Lisa.

                        </p>

                    </div>

                </a>


                <!-- CARD 2 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/birth-of-venus.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Birth of Venus">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The birth of venus

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Another of the most famous paintings
                            is The Birth of Venus. Botticelli's
                            painting illustrates the myth of
                            the birth of Aphrodite.

                        </p>

                    </div>

                </a>


                <!-- CARD 3 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/creation-of-adam.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Creation of Adam">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The Creation Of Adam

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Michelangelo's fresco The Creation
                            of Adam, which adorns the ceiling
                            of the Sistine Chapel.

                        </p>

                    </div>

                </a>


                <!-- CARD 4 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/last-supper.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Last Supper">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The last supper

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            For more than 500 years of its
                            existence, the famous fresco
                            The Last Supper has been restored
                            at least five times.

                        </p>

                    </div>

                </a>


                <!-- CARD 5 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/sacred-love.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Sacred and Profane Love">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The sacred and profane love

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            The current name of the painting
                            was not given by Titian himself,
                            but appeared only two centuries later.

                        </p>

                    </div>

                </a>


                <!-- CARD 6 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/ancient-days.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Ancient of Days">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The ancient of days

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This popular artwork by William Blake
                            is now in the British Museum, London.

                        </p>

                    </div>

                </a>


                <!-- CARD 7 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/liberty-leading.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Liberty Leading the People">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The liberty leading the people

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Liberty Leading the People by Eugene
                            Delacroix, as the best known example.

                        </p>

                    </div>

                </a>


                <!-- CARD 8 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/madonna-litta.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Madonna Litta">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The madonna litta

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This masterpiece, a world classic long ago,
                            is kept in the Hermitage in St. Petersburg.

                        </p>

                    </div>

                </a>


                <!-- CARD 9 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/landscape-icarus.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Landscape with the Fall of Icarus">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            Landscape with the fall of icarus

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This painting, by Dutch artist Pieter
                            Bruegel, is now part of the collection.

                        </p>

                    </div>

                </a>

                 <!-- CARD 1 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/mona-lisa.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Mona Lisa">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            Mona lisa

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Probably the most famous painting in
                            the world is Leonardo da Vinci's
                            La Gioconda, better known as Mona Lisa.

                        </p>

                    </div>

                </a>


                <!-- CARD 2 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/birth-of-venus.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Birth of Venus">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The birth of venus

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Another of the most famous paintings
                            is The Birth of Venus. Botticelli's
                            painting illustrates the myth of
                            the birth of Aphrodite.

                        </p>

                    </div>

                </a>


                <!-- CARD 3 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/creation-of-adam.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Creation of Adam">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The Creation Of Adam

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Michelangelo's fresco The Creation
                            of Adam, which adorns the ceiling
                            of the Sistine Chapel.

                        </p>

                    </div>

                </a>


                <!-- CARD 4 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/last-supper.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Last Supper">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The last supper

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            For more than 500 years of its
                            existence, the famous fresco
                            The Last Supper has been restored
                            at least five times.

                        </p>

                    </div>

                </a>


                <!-- CARD 5 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/sacred-love.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Sacred and Profane Love">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The sacred and profane love

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            The current name of the painting
                            was not given by Titian himself,
                            but appeared only two centuries later.

                        </p>

                    </div>

                </a>


                <!-- CARD 6 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/ancient-days.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Ancient of Days">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The ancient of days

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This popular artwork by William Blake
                            is now in the British Museum, London.

                        </p>

                    </div>

                </a>


                <!-- CARD 7 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/liberty-leading.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Liberty Leading the People">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The liberty leading the people

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            Liberty Leading the People by Eugene
                            Delacroix, as the best known example.

                        </p>

                    </div>

                </a>


                <!-- CARD 8 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/madonna-litta.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="The Madonna Litta">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            The madonna litta

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This masterpiece, a world classic long ago,
                            is kept in the Hermitage in St. Petersburg.

                        </p>

                    </div>

                </a>


                <!-- CARD 9 -->

                <a href="#"
                   class="flex
                          bg-white
                          border
                          border-gray-300
                          rounded-md
                          p-2.5
                          min-h-[100px]
                          shadow-[0_2px_2px_rgba(0,0,0,0.25)]
                          hover:-translate-y-1
                          hover:shadow-lg
                          transition">

                    <img
                        src="{{ asset('images/arts/landscape-icarus.jpg') }}"
                        class="w-[66px]
                               h-[67px]
                               object-cover
                               flex-shrink-0"
                        alt="Landscape with the Fall of Icarus">

                    <div class="ml-3">

                        <h2 class="font-bold
                                   text-[12px]
                                   leading-tight
                                   text-gray-800">

                            Landscape with the fall of icarus

                        </h2>

                        <p class="text-[9px]
                                  leading-[12px]
                                  text-gray-500
                                  mt-1">

                            This painting, by Dutch artist Pieter
                            Bruegel, is now part of the collection.

                        </p>

                    </div>

                </a>


            </div>

        </section>

    </main>

</body>
</html>