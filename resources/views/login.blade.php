<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="m-0 bg-white">


    <main class="w-full
                 min-h-screen
                 bg-[#eedcdc]
                 box-border
                 px-8
                 flex
                 items-center
                 justify-center">


        <!-- BACK -->

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



        <!-- LOGIN BOX -->

        <div class="w-full
                    max-w-[522px]
                    h-[363px]
                    bg-[#fef6eb]
                    flex">


            <!-- ================= LEFT IMAGE ================= -->

            <div class="w-1/2 h-[363px]">

                <img
                    src="{{ asset('images/login.jpg') }}"
                    class="w-full h-full object-cover"
                    alt="Login image">

            </div>



            <!-- ================= RIGHT FORM ================= -->

            <div class="w-1/2
                        h-[363px]
                        flex
                        flex-col
                        items-center
                        px-8
                        pt-14">


                <!-- TITLE -->

                <h1 class="text-[#c83232]
                           text-2xl
                           font-bold
                           mb-6">

                    Login

                </h1>



                <!-- ================= FORM ================= -->

                <form
                    onsubmit="handleLogin(event)"
                    class="w-full">


                    <!-- EMAIL -->

                    <label class="block
                                  text-[#c83232]
                                  text-[9px]
                                  mb-1">

                        Email

                    </label>


                    <input
                        id="email"
                        type="email"
                        placeholder="Type here"
                        required
                        class="w-full
                               h-[20px]
                               rounded-full
                               border
                               border-[#cbb8b8]
                               bg-[#eadada]
                               outline-none
                               px-3
                               text-[9px]
                               mb-4">



                    <!-- PASSWORD -->

                    <label class="block
                                  text-[#c83232]
                                  text-[9px]
                                  mb-1">

                        Password

                    </label>


                    <input
                        id="password"
                        type="password"
                        placeholder="Type here"
                        required
                        class="w-full
                               h-[20px]
                               rounded-full
                               border
                               border-[#cbb8b8]
                               bg-[#eadada]
                               outline-none
                               px-3
                               text-[9px]
                               mb-10">



                    <!-- LOGIN BUTTON -->

                    <div class="flex justify-center">

                        <button
                            type="submit"
                            class="w-[70px]
                                   h-[20px]
                                   rounded-full
                                   bg-[#c83232]
                                   text-white
                                   text-[8px]
                                   flex
                                   items-center
                                   justify-center
                                   hover:opacity-80
                                   transition">

                            Log in

                        </button>

                    </div>


                </form>



                <!-- SIGN IN -->

                <p class="text-[#c83232]
                          text-[9px]
                          mt-auto
                          mb-4">

                    Don't have an account?

                    <a href="{{ route('register') }}"
                       class="font-bold hover:underline">

                        Sign in

                    </a>

                </p>


            </div>

        </div>


    </main>



    <!-- ================================================= -->
    <!-- TEMPORARY FRONTEND LOGIN -->
    <!-- ================================================= -->

    <script>

        function handleLogin(event) {

            event.preventDefault();


            // Ambil data dari input

            const email =
                document
                    .getElementById('email')
                    .value
                    .trim()
                    .toLowerCase();


            const password =
                document
                    .getElementById('password')
                    .value
                    .trim();



            // ==========================================
            // CEK INPUT
            // ==========================================

            if (!email || !password) {

                return;

            }



            // ==========================================
            // ADMIN
            // ==========================================

            if (email === 'admin@gmail.com') {


                // Simpan role sementara

                localStorage.setItem(
                    'createopiaRole',
                    'admin'
                );


                localStorage.setItem(
                    'createopiaEmail',
                    email
                );


                // Masuk Admin Dashboard

                window.location.href =
                    "{{ route('admin') }}";


                return;

            }



            // ==========================================
            // USER
            // ==========================================

            localStorage.setItem(
                'createopiaRole',
                'user'
            );


            localStorage.setItem(
                'createopiaEmail',
                email
            );


            // Masuk User Profile

            window.location.href =
                "{{ route('user.profile') }}";

        }

    </script>


</body>

</html>