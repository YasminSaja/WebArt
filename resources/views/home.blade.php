<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Home</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .pixel-font {
            font-family: "Courier New", monospace;
        }

        .welcome-font {
            font-family: Georgia, serif;
        }
    </style>
</head>

<body class="m-0 w-full bg-white">

    <!-- FULL DESKTOP WEBSITE -->
    <div class="w-full min-h-screen 
                    bg-white
                    border-l-[29px]
                    border-r-[29px]
                    border-[#ce3037]
                    box-border">
        


        <!-- NAVBAR -->
        <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

            <a href="{{ route('home') }}"
               class="bg-[#72ccd2]
                      text-white
                      px-2 py-1
                      rounded
                      text-xs
                      hover:opacity-80
                      transition">
                Home
            </a>

            <a href="{{ route('arts') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Arts
            </a>

            <a href="{{ route('artist') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Artist
            </a>

            <a href="{{ route('category') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Category
            </a>

            <a href="{{ route('login') }}"
               class="text-[#e05252]
                      text-xs
                      hover:text-[#72ccd2]
                      transition">
                Log in
            </a>

        </nav>



        <!-- BANNER CREATE TOPIA -->
        <a href="{{ route('home') }}"
           class="block
                  w-[80%]
                  mx-auto
                  h-[220px]
                  bg-[#ffdd9a]
                  rounded-xl
                  shadow-[0_10px_10px_rgba(0,0,0,0.25)]
                  overflow-hidden
                  hover:scale-[1.01]
                  transition duration-200">

            <img
                src="{{ asset('images/createtopia-banner.png') }}"
                alt="CreateTopia"
                class="w-full h-full object-contain"
            >

        </a>



        <!-- WELCOME -->
        <section class="w-full text-center mt-10 px-6">

            <h1 class="welcome-font
                       text-[#55bfd0]
                       text-3xl
                       md:text-4xl
                       font-bold
                       drop-shadow-[1px_1px_0px_#f0b2a5]">

                Welcome To CreateTopia

            </h1>


            <p class="pixel-font
                      text-[#62c9dc]
                      text-sm
                      leading-7
                      tracking-[3px]
                      max-w-3xl
                      mx-auto
                      mt-4">

                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Cras pharetra, augue quis malesuada sollicitudin, tellus
                diam sollicitudin eros, sed auctor odio erat vel diam.
                Maecenas at gravida orci. Nullam lacus felis, scelerisque at
                iaculis elementum, accumsan suscipit nulla. Curabitur a
                urna nec nulla eleifend felis.

            </p>

        </section>


    </div>

</body>
</html>