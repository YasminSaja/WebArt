<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Register</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- ================================================= -->
    <!-- CUSTOM STYLE -->
    <!-- ================================================= -->

    <style>

        body {
            margin: 0;
            padding: 0;
        }


        /* ========================================= */
        /* REGISTER BOX EFFECT */
        /* ========================================= */

        .register-box {
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .register-box:hover {
            transform: translateY(-3px);
            box-shadow:
                0 20px 45px rgba(80, 55, 100, .16);
        }


        /* ========================================= */
        /* IMAGE EFFECT */
        /* ========================================= */

        .register-image {
            transition: transform .6s ease;
        }

        .image-area:hover .register-image {
            transform: scale(1.05);
        }


        /* ========================================= */
        /* INPUT EFFECT */
        /* ========================================= */

        .register-input {
            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }

        .register-input:focus {
            border-color: #72ccd2;
            box-shadow:
                0 0 0 3px
                rgba(114, 204, 210, .16);
            transform: translateY(-1px);
        }


        /* ========================================= */
        /* BUTTON EFFECT */
        /* ========================================= */

        .register-button {
            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .register-button:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow:
                0 7px 16px
                rgba(202, 56, 56, .25);
        }

        .register-button:active {
            transform: scale(.95);
        }


        /* ========================================= */
        /* STRAWBERRY FLOAT */
        /* ========================================= */

        .strawberry {
            animation:
                strawberryFloat 4s
                ease-in-out
                infinite;
            transition: transform .3s ease;
        }

        .strawberry:hover {
            transform: scale(1.12) rotate(8deg);
        }

        @keyframes strawberryFloat {
            0%   { transform: translateY(0) rotate(-4deg); }
            50%  { transform: translateY(-10px) rotate(4deg); }
            100% { transform: translateY(0) rotate(-4deg); }
        }


        /* ========================================= */
        /* LITTLE DECORATION */
        /* ========================================= */

        .floating-dot {
            animation:
                dotFloat 3s
                ease-in-out
                infinite;
        }

        @keyframes dotFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-7px); }
        }


        /* ========================================= */
        /* ERROR MESSAGE */
        /* ========================================= */

        .error-msg {
            font-family: Arial, sans-serif;
            font-size: 8px;
            color: #ca3838;
            margin-top: -8px;
            margin-bottom: 6px;
            padding-left: 10px;
        }

    </style>

</head>


<body class="m-0 bg-white">


    <!-- ================================================= -->
    <!-- MAIN REGISTER PAGE -->
    <!-- ================================================= -->

    <main
        class="w-full
               min-h-screen
               bg-[#e4dfea]
               box-border
               px-8
               flex
               items-center
               justify-center">


        <!-- ================================================= -->
        <!-- BACK -->
        <!-- ================================================= -->

        <a
            href="{{ route('home') }}"
            class="absolute
                   top-6
                   left-8
                   text-[#ca3838]
                   text-[10px]
                   hover:text-[#72ccd2]
                   hover:translate-x-1
                   transition">

            ← Back

        </a>



        <!-- ================================================= -->
        <!-- REGISTER BOX -->
        <!-- ================================================= -->

        <div
            class="register-box
                   relative
                   w-full
                   max-w-[522px]
                   min-h-[363px]
                   bg-[#f8f2f7]
                   flex
                   overflow-hidden">


            <!-- ================================================= -->
            <!-- LEFT IMAGE -->
            <!-- ================================================= -->

            <div
                class="image-area
                       relative
                       w-1/2
                       min-h-[363px]
                       overflow-hidden
                       bg-[#ddd4e4]">


                <!-- MAIN IMAGE -->

                <img
                    src="{{ asset('images/register.jpg') }}"
                    class="register-image
                           w-full
                           h-full
                           object-cover"
                    alt="Register image">


                <!-- SOFT PURPLE OVERLAY -->

                <div
                    class="absolute
                           inset-0
                           bg-gradient-to-t
                           from-[#6e587d]/25
                           via-transparent
                           to-[#ffffff]/10
                           pointer-events-none">
                </div>



                <!-- STRAWBERRY 1 -->

                <img
                    src="{{ asset('images/strawberry.png') }}"
                    class="strawberry
                           absolute
                           w-[58px]
                           h-[58px]
                           object-contain
                           -right-2
                           top-7
                           drop-shadow-lg
                           cursor-pointer"
                    alt="Strawberry">


                <!-- STRAWBERRY 2 -->

                <img
                    src="{{ asset('images/strawberry.png') }}"
                    class="strawberry
                           absolute
                           w-[38px]
                           h-[38px]
                           object-contain
                           left-3
                           bottom-6
                           drop-shadow-md
                           cursor-pointer"
                    style="animation-delay: -1.5s;"
                    alt="Strawberry">


                <!-- YELLOW DOT -->

                <div
                    class="floating-dot
                           absolute
                           w-3
                           h-3
                           rounded-full
                           bg-[#ffd98e]
                           top-16
                           left-7">
                </div>


                <!-- CYAN DOT -->

                <div
                    class="floating-dot
                           absolute
                           w-2
                           h-2
                           rounded-full
                           bg-[#72ccd2]
                           right-10
                           bottom-20"
                    style="animation-delay: -.8s;">
                </div>


            </div>



            <!-- ================================================= -->
            <!-- RIGHT FORM -->
            <!-- ================================================= -->

            <div
                class="w-1/2
                       min-h-[363px]
                       flex
                       flex-col
                       items-center
                       px-8
                       py-10">


                <!-- TITLE -->

                <h1
                    class="text-[#ca3838]
                           text-2xl
                           font-bold
                           mb-5
                           transition
                           hover:text-[#72ccd2]">

                    Register

                </h1>



                <!-- FORM -->

                <form
                    id="registerForm"
                    method="POST"
                    action="{{ route('register') }}"
                    class="w-full flex-1 flex flex-col">

                    @csrf


                    <!-- ================================================= -->
                    <!-- NAME -->
                    <!-- ================================================= -->

                    <label
                        for="name"
                        class="block
                               text-[#ca3838]
                               text-[9px]
                               mb-1">

                        Name

                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Type here"
                        autocomplete="name"
                        class="register-input
                               w-full
                               h-[22px]
                               rounded-full
                               border
                               border-[#c8bdd0]
                               bg-[#e5ddea]
                               outline-none
                               px-3
                               text-[9px]
                               mb-3">

                    <p id="nameError" class="error-msg hidden"></p>



                    <!-- ================================================= -->
                    <!-- EMAIL -->
                    <!-- ================================================= -->

                    <label
                        for="email"
                        class="block
                               text-[#ca3838]
                               text-[9px]
                               mb-1">

                        Email

                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Type here"
                        autocomplete="email"
                        class="register-input
                               w-full
                               h-[22px]
                               rounded-full
                               border
                               border-[#c8bdd0]
                               bg-[#e5ddea]
                               outline-none
                               px-3
                               text-[9px]
                               mb-3">

                    <p id="emailError" class="error-msg hidden"></p>



                    <!-- ================================================= -->
                    <!-- PASSWORD -->
                    <!-- ================================================= -->

                    <label
                        for="password"
                        class="block
                               text-[#ca3838]
                               text-[9px]
                               mb-1">

                        Password

                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Type here"
                        autocomplete="new-password"
                        class="register-input
                               w-full
                               h-[22px]
                               rounded-full
                               border
                               border-[#c8bdd0]
                               bg-[#e5ddea]
                               outline-none
                               px-3
                               text-[9px]
                               mb-3">

                    <p id="passwordError" class="error-msg hidden"></p>



                    <!-- ================================================= -->
                    <!-- CONFIRM PASSWORD -->
                    <!-- ================================================= -->

                    <label
                        for="passwordConfirm"
                        class="block
                               text-[#ca3838]
                               text-[9px]
                               mb-1">

                        Confirm Password

                    </label>

                    <input
                        id="passwordConfirm"
                        name="password_confirmation"
                        type="password"
                        placeholder="Type here"
                        autocomplete="new-password"
                        class="register-input
                               w-full
                               h-[22px]
                               rounded-full
                               border
                               border-[#c8bdd0]
                               bg-[#e5ddea]
                               outline-none
                               px-3
                               text-[9px]
                               mb-6">

                    <p id="passwordConfirmError" class="error-msg hidden"></p>



                    <!-- ================================================= -->
                    <!-- REGISTER BUTTON -->
                    <!-- ================================================= -->

                    <div class="flex justify-center mt-2">

                        <button
                            type="submit"
                            class="register-button
                                   w-[80px]
                                   h-[22px]
                                   rounded-full
                                   bg-[#ca3838]
                                   text-white
                                   text-[9px]
                                   font-bold
                                   flex
                                   items-center
                                   justify-center
                                   cursor-pointer">

                            Register

                        </button>

                    </div>


                    <!-- ================================================= -->
                    <!-- GLOBAL ERROR (kalau ada) -->
                    <!-- ================================================= -->

                    <p id="globalError"
                       class="hidden
                              text-center
                              text-[8px]
                              text-[#ca3838]
                              mt-3
                              sans">

                    </p>


                </form>



                <!-- ================================================= -->
                <!-- LOGIN LINK -->
                <!-- ================================================= -->

                <p
                    class="text-[#ca3838]
                           text-[9px]
                           mt-6">

                    Already have an account?

                    <a
                        href="{{ route('login') }}"
                        class="font-bold
                               hover:text-[#72ccd2]
                               hover:underline
                               transition">

                        Log in

                    </a>

                </p>


            </div>

        </div>


    </main>



    <!-- ================================================= -->
    <!-- TEMPORARY FRONTEND REGISTER -->
    <!-- ================================================= -->

    <script>

        /* =====================================================
           HANDLE REGISTER
        ===================================================== */

        document
            .getElementById('registerForm')
            .addEventListener('submit', function (event) {

            event.preventDefault();


            /* ==========================================
               RESET ERROR
            ========================================== */

            ['nameError','emailError','passwordError',
             'passwordConfirmError','globalError']
                .forEach(id => {

                    const el = document.getElementById(id);
                    el.classList.add('hidden');
                    el.textContent = '';

                });


            /* ==========================================
               AMBIL VALUE
            ========================================== */

            const name =
                document.getElementById('name').value.trim();

            const email =
                document.getElementById('email').value.trim().toLowerCase();

            const password =
                document.getElementById('password').value;

            const passwordConfirm =
                document.getElementById('passwordConfirm').value;


            /* ==========================================
               VALIDASI
            ========================================== */

            let valid = true;


            // NAME

            if (name.length < 3) {
                showError('nameError',
                    'Nama minimal 3 karakter.');
                valid = false;
            }


            // EMAIL

            const emailRegex =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                showError('emailError',
                    'Format email tidak valid.');
                valid = false;
            }


            // PASSWORD

            if (password.length < 6) {
                showError('passwordError',
                    'Password minimal 6 karakter.');
                valid = false;
            }


            // CONFIRM PASSWORD

            if (password !== passwordConfirm) {
                showError('passwordConfirmError',
                    'Konfirmasi password tidak cocok.');
                valid = false;
            }


            if (!valid) return;



            /* ==========================================
               SIMPAN KE DATABASE
            ==========================================

               Bagian dummy sebelumnya (menyimpan user ke
               localStorage, termasuk password polos) sudah
               dihapus.

               Untuk menyambungkan, aktifkan route di
               routes/web.php lalu pilih salah satu cara:

               CARA 1 — form biasa (paling sederhana).
               Ubah <form> register menjadi:

                   <form method="POST" action="{{ route('register') }}">
                       @csrf
                       <input name="name" ...>
                       <input name="email" ...>
                       <input name="password" ...>
                       <input name="password_confirmation" ...>

               lalu HAPUS seluruh blok submit ini supaya form
               dikirim normal ke server.

               CARA 2 — tetap pakai JavaScript, kirim dengan fetch:

                   fetch('{{ route('register') }}', {
                       method: 'POST',
                       headers: {
                           'Content-Type': 'application/json',
                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
                       },
                       body: JSON.stringify({
                           name: name,
                           email: email,
                           password: password,
                           password_confirmation: passwordConfirm
                       })
                   })
                   .then(r => r.json())
                   .then(data => {
                       if (data.success) {
                           window.location.href = data.redirect;
                       } else {
                           showError('emailError', data.message);
                       }
                   });

               Validasi email duplikat sudah ditangani server
               oleh rule 'unique:users,email' di
               AuthController@register().

               AuthController sudah siap di
               app/Http/Controllers/AuthController.php.
            ========================================== */

            /* ==========================================
               KIRIM KE SERVER
            ==========================================
               Pakai submit() native supaya handler ini
               tidak menahan pengiriman. Form sudah punya
               action, method, dan @csrf di atas. */

            event.target.submit();

        });



        /* =====================================================
           PESAN DARI SERVER
           AuthController@register() mengirim balik ke halaman
           ini kalau validasi gagal, mis. email sudah dipakai.
        ===================================================== */

        @if ($errors->has('name'))

            showError('nameError', "{{ $errors->first('name') }}");

        @endif

        @if ($errors->has('email'))

            showError('emailError', "{{ $errors->first('email') }}");

        @endif

        @if ($errors->has('password'))

            showError('passwordError', "{{ $errors->first('password') }}");

        @endif

        @if (old('email'))

            document.getElementById('email').value = "{{ old('email') }}";

        @endif



        /* =====================================================
           HELPERS
        ===================================================== */

        function showError(id, message) {

            const el = document.getElementById(id);

            el.textContent = message;
            el.classList.remove('hidden');

        }

    </script>


</body>

</html>