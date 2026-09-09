<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="m-0 bg-white">


    <!-- WEBSITE FULL DESKTOP -->

    <main class="w-full
                 min-h-screen
                 bg-[#eedcdc]
                 box-border
                 px-8
                 flex
                 items-center
                 justify-center">

<a href="{{ route('home') }}"
   class="absolute
          top-6
          left-8
          text-[#ca3838]
          text-[10px]
          hover:opacity-70
          transition">

    ← Back

</a>
        <!-- REGISTER BOX -->

        <div class="w-full
                    max-w-[522px]
                    h-[363px]
                    bg-[#fef6eb]
                    flex">


            <!-- LEFT IMAGE -->

            <div class="w-1/2 h-[363px]">

                <img
                    src="{{ asset('images/register.jpg') }}"
                    class="w-full h-full object-cover"
                    alt="Register image">

            </div>


            <!-- RIGHT FORM -->

            <div class="w-1/2
                        h-[363px]
                        flex
                        flex-col
                        items-center
                        px-8
                        pt-14">


                <!-- TITLE -->

                <h1 class="text-[#ca3838]
                           text-2xl
                           font-bold
                           mb-6">

                    Register

                </h1>


                <!-- FORM -->

                <form class="w-full">


                    <!-- NAME -->

                    <label class="block
                                  text-[#ca3838]
                                  text-[9px]
                                  mb-1">

                        Name

                    </label>

                    <input
                        type="text"
                        placeholder="Type here"
                        class="w-full
                               h-[20px]
                               rounded-full
                               border
                               border-[#cbb8b8]
                               bg-[#eedcdc]
                               outline-none
                               px-3
                               text-[9px]
                               mb-3">


                    <!-- EMAIL -->

                    <label class="block
                                  text-[#ca3838]
                                  text-[9px]
                                  mb-1">

                        Email

                    </label>

                    <input
                        type="email"
                        placeholder="Type here"
                        class="w-full
                               h-[20px]
                               rounded-full
                               border
                               border-[#cbb8b8]
                               bg-[#eedcdc]
                               outline-none
                               px-3
                               text-[9px]
                               mb-3">


                    <!-- PASSWORD -->

                    <label class="block
                                  text-[#ca3838]
                                  text-[9px]
                                  mb-1">

                        Password

                    </label>

                    <input
                        type="password"
                        placeholder="Type here"
                        class="w-full
                               h-[20px]
                               rounded-full
                               border
                               border-[#cbb8b8]
                               bg-[#eedcdc]
                               outline-none
                               px-3
                               text-[9px]
                               mb-7">


                    <!-- REGISTER BUTTON -->

                    <div class="flex justify-center">

                        <a href="{{ route('login') }}"
   class="w-[70px]
          h-[20px]
          rounded-full
          bg-[#ca3838]
          text-white
          text-[8px]
          flex
          items-center
          justify-center
          hover:opacity-80
          transition">

    Register

</a>

                    </div>


                </form>


                <!-- LOGIN LINK -->

                <p class="text-[#ca3838]
                          text-[9px]
                          mt-auto
                          mb-4">

                    Already have an account?

                    <a href="{{ route('login') }}"
                       class="font-bold hover:underline">

                        Log in

                    </a>

                </p>


            </div>

        </div>


    </main>


</body>

</html>