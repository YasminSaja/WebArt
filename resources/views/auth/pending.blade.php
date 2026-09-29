<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Menunggu Approval</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- ================================================= -->
    <!-- CUSTOM STYLE -->
    <!-- ================================================= -->

    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: Georgia, "Times New Roman", serif;
        }


        /* ========================================= */
        /* CARD ENTRANCE */
        /* ========================================= */

        .pending-card {
            animation: cardIn .55s ease both;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(25px) scale(.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        /* ========================================= */
        /* ICON PULSE */
        /* ========================================= */

        .icon-pulse {
            animation: iconPulse 2.5s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(98, 196, 218, .45);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 20px rgba(98, 196, 218, 0);
            }
        }


        /* ========================================= */
        /* FLOATING DECORATION */
        /* ========================================= */

        .floating {
            animation: floating 3.5s ease-in-out infinite;
        }

        .floating-slow {
            animation: floating 5s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50%      { transform: translateY(-10px) rotate(5deg); }
        }


        /* ========================================= */
        /* STRAWBERRY */
        /* ========================================= */

        .strawberry {
            animation: strawberryFloat 4s ease-in-out infinite;
            transition: transform .3s ease;
        }

        .strawberry:hover {
            transform: scale(1.15) rotate(10deg);
        }

        @keyframes strawberryFloat {
            0%   { transform: translateY(0) rotate(-4deg); }
            50%  { transform: translateY(-12px) rotate(4deg); }
            100% { transform: translateY(0) rotate(-4deg); }
        }


        /* ========================================= */
        /* BUTTON */
        /* ========================================= */

        .btn-soft {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .btn-soft:hover {
            transform: translateY(-2px) scale(1.03);
        }

        .btn-soft:active {
            transform: scale(.96);
        }


        /* ========================================= */
        /* PROGRESS DOTS */
        /* ========================================= */

        .progress-dot {
            animation: progressDot 1.6s ease-in-out infinite;
        }

        .progress-dot:nth-child(2) {
            animation-delay: .25s;
        }

        .progress-dot:nth-child(3) {
            animation-delay: .5s;
        }

        @keyframes progressDot {
            0%, 100% {
                transform: translateY(0);
                opacity: .35;
            }
            50% {
                transform: translateY(-6px);
                opacity: 1;
            }
        }

    </style>

</head>


<body class="min-h-screen
             bg-[#F6FFEA]
             flex
             items-center
             justify-center
             px-6
             py-10
             relative
             overflow-hidden">


    <!-- ================================================= -->
    <!-- BACKGROUND DECORATION -->
    <!-- ================================================= -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute -top-40 -left-40 w-[500px] h-[500px]
                    rounded-full bg-[#62C4DA]/25 blur-3xl"></div>

        <div class="absolute top-1/3 -right-40 w-[500px] h-[500px]
                    rounded-full bg-[#FA855A]/20 blur-3xl"></div>

        <div class="absolute -bottom-40 left-1/3 w-[450px] h-[450px]
                    rounded-full bg-[#FFDE96]/50 blur-3xl"></div>

    </div>



    <!-- ================================================= -->
    <!-- FLOATING STRAWBERRY (background) -->
    <!-- ================================================= -->

    <img
        src="{{ asset('images/strawberry.png') }}"
        class="strawberry
               absolute
               w-[55px] h-[55px]
               top-16 left-[12%]
               opacity-80
               pointer-events-none"
        alt="Strawberry">


    <img
        src="{{ asset('images/strawberry.png') }}"
        class="strawberry
               absolute
               w-[38px] h-[38px]
               bottom-24 right-[14%]
               opacity-80
               pointer-events-none"
        style="animation-delay: -2s;"
        alt="Strawberry">



    <!-- ================================================= -->
    <!-- FLOATING SYMBOLS -->
    <!-- ================================================= -->

    <span
        class="floating
               absolute
               top-24 right-[20%]
               text-[#FFDE96]
               text-3xl
               pointer-events-none">

        ✦

    </span>


    <span
        class="floating-slow
               absolute
               bottom-32 left-[18%]
               text-[#62C4DA]
               text-2xl
               pointer-events-none">

        ✿

    </span>



    <!-- ================================================= -->
    <!-- BACK BUTTON -->
    <!-- ================================================= -->

    <a
        href="{{ route('home') }}"
        class="absolute
               top-6
               left-8
               text-[#C93638]
               text-[11px]
               font-medium
               hover:text-[#62C4DA]
               hover:translate-x-1
               transition">

        ← Back to Home

    </a>



    <!-- ================================================= -->
    <!-- MAIN CARD -->
    <!-- ================================================= -->

    <div
        class="pending-card
               relative
               w-full
               max-w-[560px]
               bg-white
               rounded-[32px]
               border
               border-[#C93638]/10
               shadow-[0_25px_60px_rgba(201,54,56,.15)]
               p-8 md:p-12
               text-center
               overflow-hidden">


        <!-- ================================================= -->
        <!-- TOP GRADIENT STRIP -->
        <!-- ================================================= -->

        <div class="absolute top-0 left-0 w-full h-2
                    bg-gradient-to-r
                    from-[#62C4DA] via-[#FFDE96] to-[#C93638]">
        </div>



        <!-- ================================================= -->
        <!-- ICON CIRCLE -->
        <!-- ================================================= -->

        <div class="flex justify-center mt-3 mb-7">

            <div class="icon-pulse
                        w-24 h-24
                        rounded-full
                        bg-gradient-to-br
                        from-[#62C4DA]
                        to-[#62C4DA]/70
                        flex
                        items-center
                        justify-center
                        text-white
                        text-4xl
                        relative">

                ⏳

                <!-- Small badge -->

                <span class="absolute
                             -top-1
                             -right-1
                             w-7 h-7
                             rounded-full
                             bg-[#FFDE96]
                             flex
                             items-center
                             justify-center
                             text-[#C93638]
                             text-base
                             border-4
                             border-white">

                    ✦

                </span>

            </div>

        </div>



        <!-- ================================================= -->
        <!-- TITLE -->
        <!-- ================================================= -->

        <p class="sans
                  text-[10px]
                  uppercase
                  tracking-[3px]
                  text-[#62C4DA]
                  font-bold
                  mb-2">

            Registration Received

        </p>


        <h1
            class="text-[#C93638]
                   text-3xl
                   md:text-4xl
                   font-bold
                   leading-tight">

            Menunggu Approval Admin

        </h1>



        <!-- ================================================= -->
        <!-- GREETING -->
        <!-- ================================================= -->

        <p
            id="greeting"
            class="sans
                   text-sm
                   text-[#2a1a1c]/70
                   mt-5
                   leading-relaxed">

            Hi, <span
                    id="userName"
                    class="font-bold text-[#C93638]">

                Artist

            </span>! ✨
            <br>
            Akun kamu sudah kami terima.

        </p>



        <!-- ================================================= -->
        <!-- INFO BOX -->
        <!-- ================================================= -->

        <div
            class="mt-7
                   bg-[#F6FFEA]
                   border
                   border-[#C93638]/10
                   rounded-2xl
                   p-5
                   text-left">

            <div class="flex gap-4 items-start">

                <span class="text-2xl flex-shrink-0">📝</span>

                <div>

                    <p class="sans
                              text-[11px]
                              font-bold
                              text-[#C93638]
                              uppercase
                              tracking-wider
                              mb-1">

                        Apa selanjutnya?

                    </p>

                    <p class="sans
                              text-[11px]
                              text-[#2a1a1c]/70
                              leading-relaxed">

                        Admin akan meninjau akun kamu dalam
                        <b class="text-[#C93638]">1 × 24 jam</b>.
                        Kamu akan bisa login setelah akun
                        disetujui.

                    </p>

                </div>

            </div>

        </div>



        <!-- ================================================= -->
        <!-- EMAIL DISPLAY -->
        <!-- ================================================= -->

        <p class="sans
                  text-[10px]
                  text-[#2a1a1c]/50
                  mt-5">

            Email terdaftar:

            <span
                id="userEmail"
                class="font-bold text-[#62C4DA]">

                -

            </span>

        </p>



        <!-- ================================================= -->
        <!-- PROGRESS DOTS -->
        <!-- ================================================= -->

        <div class="flex justify-center gap-2 mt-7">

            <span class="progress-dot
                         w-2.5 h-2.5
                         rounded-full
                         bg-[#62C4DA]">
            </span>

            <span class="progress-dot
                         w-2.5 h-2.5
                         rounded-full
                         bg-[#FFDE96]">
            </span>

            <span class="progress-dot
                         w-2.5 h-2.5
                         rounded-full
                         bg-[#FA855A]">
            </span>

        </div>



        <!-- ================================================= -->
        <!-- ACTION BUTTONS -->
        <!-- ================================================= -->

        <div class="grid
                    grid-cols-2
                    gap-3
                    mt-8">

            <a href="{{ route('home') }}"
               class="btn-soft
                      py-3
                      rounded-full
                      bg-[#F6FFEA]
                      text-[#C93638]
                      border
                      border-[#C93638]/20
                      sans
                      text-[11px]
                      font-bold
                      flex
                      items-center
                      justify-center
                      hover:bg-[#FFDE96]">

                ← Kembali ke Home

            </a>


            <a href="{{ route('login') }}"
               class="btn-soft
                      py-3
                      rounded-full
                      bg-[#C93638]
                      text-white
                      sans
                      text-[11px]
                      font-bold
                      flex
                      items-center
                      justify-center
                      hover:bg-[#FA855A]
                      shadow-[0_8px_20px_rgba(201,54,56,.3)]">

                Coba Login →

            </a>

        </div>



        <!-- ================================================= -->
        <!-- FOOTER NOTE -->
        <!-- ================================================= -->

        <p class="sans
                  text-[9px]
                  text-[#2a1a1c]/40
                  mt-6
                  leading-relaxed">

            Sudah lebih dari 24 jam?
            Hubungi admin di
            <span class="font-bold text-[#62C4DA]">
                admin@createtopia.com
            </span>

        </p>


    </div>



    <!-- ================================================= -->
    <!-- SCRIPT -->
    <!-- ================================================= -->

    <script>

        /* =====================================================
           DATA USER — SUMBERNYA DATABASE
        =====================================================
           Versi sebelumnya membaca user dari
           localStorage.pendingUsers. Itu sudah dihapus.

           Untuk mengambil data dari database, kirim user-nya
           dari controller, contoh di AuthController@pending():

               return view('pending', [
                   'pendingUser' => auth()->user(),
               ]);

           lalu di file Blade ini pakai:

               const currentUser = @json(auth()->user());

           Jika user belum login (baru daftar, belum masuk),
           ambil dari session, contoh:

               @if (session('pending_email'))
                   const currentUser = {
                       nama: @json(session('pending_email')),
                       email: @json(session('pending_email'))
                   };
               @else
                   const currentUser = null;
               @endif
        ===================================================== */

        const currentUser = @json($pendingUser);



        /* =====================================================
           TAMPILKAN DATA USER
        ===================================================== */

        function showUserInfo() {

            const user = currentUser;


            /* -----------------------------------------
               KALAU ADA DATA
            ----------------------------------------- */

            if (user) {

                document.getElementById('userName')
                    .textContent = user.nama || user.name || 'Artist';


                document.getElementById('userEmail')
                    .textContent = user.email || '-';


                return;

            }


            /* -----------------------------------------
               KALAU TIDAK KETEMU
               (user langsung buka URL tanpa register)
            ----------------------------------------- */

            document.getElementById('greeting')
                .innerHTML = `
                    Belum ada data pendaftaran yang ditemukan.
                    <br>
                    Silakan daftar terlebih dahulu ya ✨
                `;


            document.getElementById('userEmail')
                .textContent = 'Tidak ada';


            /* Ganti tombol jadi "Daftar" */

            const btnRight =
                document.querySelector('a[href*="login"]');

            if (btnRight) {

                btnRight.href = "{{ route('register') }}";
                btnRight.textContent = 'Daftar Sekarang →';

            }

        }



        /* =====================================================
           INIT
        ===================================================== */

        document.addEventListener('DOMContentLoaded', function () {

            showUserInfo();

        });

    </script>


</body>

</html>