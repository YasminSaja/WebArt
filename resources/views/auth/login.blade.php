<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body { margin: 0; padding: 0; }

        .login-image { transition: transform .6s ease; }
        .image-area:hover .login-image { transform: scale(1.06); }

        .strawberry-float {
            animation: strawberryFloat 4s ease-in-out infinite;
            transition: transform .3s ease;
        }
        .strawberry-float:hover { transform: scale(1.15) rotate(8deg); }

        @keyframes strawberryFloat {
            0%   { transform: translateY(0px) rotate(-4deg); }
            50%  { transform: translateY(-12px) rotate(4deg); }
            100% { transform: translateY(0px) rotate(-4deg); }
        }

        .floating-dot { animation: dotFloat 3s ease-in-out infinite; }
        @keyframes dotFloat {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-8px); }
        }

        .login-box {
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .login-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 45px rgba(120, 70, 80, .15);
        }

        .login-input {
            transition: border-color .2s ease,
                        box-shadow .2s ease,
                        transform .2s ease;
        }
        .login-input:focus {
            border-color: #72ccd2;
            box-shadow: 0 0 0 3px rgba(114, 204, 210, .15);
            transform: translateY(-1px);
        }

        .login-button {
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .login-button:hover {
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 7px 15px rgba(200, 50, 50, .25);
        }
        .login-button:active { transform: scale(.96); }

        .remember-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 12px; height: 12px;
            border: 1.5px solid #cbb8b8;
            border-radius: 3px;
            background: #eadada;
            cursor: pointer;
            position: relative;
            transition: all .2s ease;
            flex-shrink: 0;
        }
        .remember-checkbox:hover { border-color: #c83232; }
        .remember-checkbox:checked {
            background: #c83232;
            border-color: #c83232;
        }
        .remember-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 3px; top: 0.5px;
            width: 3px; height: 6px;
            border: solid white;
            border-width: 0 1.5px 1.5px 0;
            transform: rotate(45deg);
        }

        .modal-overlay { animation: fadeIn .25s ease both; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        .modal-box { animation: modalIn .35s ease both; }
        @keyframes modalIn {
            from { opacity: 0; transform: translateY(20px) scale(.96); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .error-msg {
            font-family: Arial, sans-serif;
            font-size: 8px;
            color: #c83232;
            margin-top: -10px;
            margin-bottom: 8px;
            padding-left: 10px;
        }

    </style>

</head>


<body class="m-0 bg-white">

    <main class="w-full min-h-screen bg-[#eedcdc] box-border px-8
                 flex items-center justify-center">

        <a href="{{ route('home') }}"
           class="absolute top-6 left-8 text-[#ca3838] text-[10px]
                  hover:text-[#72ccd2] hover:translate-x-1 transition">
            ← Back
        </a>

        <div class="login-box relative w-full max-w-[522px] h-[363px]
                    bg-[#fef6eb] flex overflow-hidden">

            <!-- LEFT IMAGE -->
            <div class="image-area relative w-1/2 h-[363px]
                        overflow-hidden bg-[#f4c6c6]">

                <img src="{{ asset('images/login.jpg') }}"
                     class="login-image w-full h-full object-cover"
                     alt="Login">

                <div class="absolute inset-0 bg-gradient-to-t
                            from-[#c83232]/30 via-transparent to-white/10
                            pointer-events-none"></div>

                <img src="{{ asset('images/strawberry.png') }}"
                     class="strawberry-float absolute w-[65px] h-[65px]
                            object-contain -right-2 top-8 drop-shadow-lg"
                     alt="Strawberry">

                <img src="{{ asset('images/strawberry.png') }}"
                     class="strawberry-float absolute w-[42px] h-[42px]
                            object-contain left-4 bottom-7 drop-shadow-md"
                     style="animation-delay: -1.5s;"
                     alt="Strawberry">

                <div class="floating-dot absolute w-3 h-3 rounded-full
                            bg-[#ffd98e] top-20 left-7"></div>

                <div class="floating-dot absolute w-2 h-2 rounded-full
                            bg-white right-12 bottom-20"
                     style="animation-delay: -1s;"></div>

            </div>

            <!-- RIGHT FORM -->
            <div class="w-1/2 h-[363px] flex flex-col items-center px-8 pt-12">

                <h1 class="text-[#c83232] text-2xl font-bold mb-5
                           transition hover:text-[#72ccd2]">
                    Login
                </h1>

                <form id="loginForm" class="w-full">

                    <label for="email"
                           class="block text-[#c83232] text-[9px] mb-1">
                        Email
                    </label>

                    <input id="email" type="email" placeholder="Type here"
                           autocomplete="email"
                           class="login-input w-full h-[20px] rounded-full
                                  border border-[#cbb8b8] bg-[#eadada]
                                  outline-none px-3 text-[9px] mb-4">

                    <p id="emailError" class="error-msg hidden"></p>

                    <label for="password"
                           class="block text-[#c83232] text-[9px] mb-1">
                        Password
                    </label>

                    <input id="password" type="password" placeholder="Type here"
                           autocomplete="current-password"
                           class="login-input w-full h-[20px] rounded-full
                                  border border-[#cbb8b8] bg-[#eadada]
                                  outline-none px-3 text-[9px] mb-4">

                    <p id="passwordError" class="error-msg hidden"></p>

                    <label for="remember"
                           class="flex items-center gap-2 cursor-pointer
                                  select-none mb-5 w-fit">

                        <input id="remember" type="checkbox"
                               class="remember-checkbox">

                        <span class="text-[#c83232] text-[9px]
                                     hover:text-[#72ccd2] transition">
                            Remember me
                        </span>

                    </label>

                    <div class="flex justify-center">
                        <button type="submit"
                                class="login-button w-[70px] h-[20px]
                                       rounded-full bg-[#c83232] text-white
                                       text-[8px] flex items-center
                                       justify-center cursor-pointer">
                            Log in
                        </button>
                    </div>

                </form>

                <p class="text-[#c83232] text-[9px] mt-auto mb-4">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="font-bold hover:text-[#72ccd2]
                              hover:underline transition">
                        Sign in
                    </a>
                </p>

            </div>

        </div>

    </main>


    <!-- STATUS MODAL -->
    <div id="statusModal"
         class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm
                modal-overlay items-center justify-center p-6">

        <div class="modal-box bg-white rounded-[28px] max-w-[380px]
                    w-full p-8 text-center shadow-2xl relative
                    overflow-hidden">

            <div id="modalStrip"
                 class="absolute top-0 left-0 w-full h-2
                        bg-gradient-to-r from-[#62C4DA]
                        via-[#FFDE96] to-[#C93638]"></div>

            <div id="modalIcon"
                 class="w-16 h-16 rounded-full bg-[#FFDE96]
                        flex items-center justify-center mx-auto
                        mt-2 mb-4 text-3xl">
                ⏳
            </div>

            <h2 id="modalTitle"
                class="text-xl font-bold text-[#C93638] mb-3">
                Menunggu Approval
            </h2>

            <p id="modalMessage"
               class="sans text-[11px] text-[#2a1a1c]/70
                      leading-relaxed mb-6">
                -
            </p>

            <div id="modalActions" class="grid grid-cols-2 gap-3">

                <button onclick="closeStatusModal()"
                        class="py-3 rounded-full bg-[#F6FFEA]
                               text-[#C93638] border border-[#C93638]/20
                               sans text-[11px] font-bold
                               hover:bg-[#FFDE96] transition">
                    Tutup
                </button>

                <a id="modalPrimaryBtn"
                   href="{{ route('pending.approval') }}"
                   class="py-3 rounded-full bg-[#C93638] text-white
                          sans text-[11px] font-bold
                          hover:bg-[#FA855A] transition
                          flex items-center justify-center">
                    Lihat Status →
                </a>

            </div>

        </div>

    </div>



    <script>

        /* =====================================================
           ADMIN CREDENTIALS (dummy)
        ===================================================== */

        const ADMIN_EMAIL    = 'admin@gmail.com';
        const ADMIN_PASSWORD = 'admin123';


        /* =====================================================
           REMEMBER ME — AUTO FILL
        ===================================================== */

        document.addEventListener('DOMContentLoaded', function () {

            const savedEmail =
                localStorage.getItem('createopiaRememberEmail');

            const rememberCheckbox =
                document.getElementById('remember');

            if (savedEmail) {
                document.getElementById('email').value = savedEmail;
                rememberCheckbox.checked = true;
            }

        });



        /* =====================================================
           LOGIN FORM SUBMIT
        ===================================================== */

        document.getElementById('loginForm')
            .addEventListener('submit', function (event) {

            event.preventDefault();

            /* Reset error */

            document.getElementById('emailError').classList.add('hidden');
            document.getElementById('passwordError').classList.add('hidden');


            /* Ambil value */

            const email =
                document.getElementById('email')
                    .value.trim().toLowerCase();

            const password =
                document.getElementById('password').value.trim();

            const remember =
                document.getElementById('remember').checked;


            if (!email || !password) return;


            /* Debug log */

            console.log('=== LOGIN ATTEMPT ===');
            console.log('Email   :', email);
            console.log('Password:', password);
            console.log('Match admin?',
                email === ADMIN_EMAIL,
                password === ADMIN_PASSWORD
            );


            /* Remember me */

            if (remember) {
                localStorage.setItem('createopiaRememberEmail', email);
            } else {
                localStorage.removeItem('createopiaRememberEmail');
            }


            /* ==========================================
               ADMIN CHECK
            ========================================== */

            if (
                email === ADMIN_EMAIL &&
                password === ADMIN_PASSWORD
            ) {

                console.log('✓ Admin login success');

                localStorage.setItem('createopiaRole', 'admin');
                localStorage.setItem('createopiaEmail', email);

                window.location.href = "{{ route('admin') }}";
                return;
            }


            /* ==========================================
               CEK PENGGUNA DI pendingUsers (dummy)
            ========================================== */

            const pendingUsers = getPendingUsers();

            console.log('pendingUsers count:', pendingUsers.length);


            const user = pendingUsers.find(u =>
                u.email.toLowerCase() === email
            );


            /* ==========================================
               EMAIL BELUM TERDAFTAR
            ========================================== */

            if (!user) {

                /* Kalau emailnya mengandung 'admin', kasih hint */

                if (email.includes('admin')) {

                    showError('passwordError',
                        'Hint: password admin adalah "admin123".');

                    return;
                }

                showError('emailError',
                    'Email belum terdaftar. Silakan daftar dulu.');

                return;
            }


            /* ==========================================
               PASSWORD SALAH
            ========================================== */

            if (user.password !== password) {

                showError('passwordError', 'Password salah.');
                return;
            }


            /* ==========================================
               CEK STATUS AKUN
            ========================================== */

            if (user.status === 'pending') {

                showStatusModal({
                    icon: '⏳',
                    title: 'Menunggu Approval',
                    message:
                        'Akun kamu masih ditinjau oleh admin. ' +
                        'Kamu akan bisa login setelah akun disetujui.',
                    primaryText: 'Lihat Status',
                    primaryHref:
                        "{{ url('/pending-approval') }}" +
                        '?email=' + encodeURIComponent(email),
                    bgIcon: '#FFDE96'
                });

                return;
            }


            if (user.status === 'rejected') {

                const alasan = user.rejectionReason ||
                    'Tidak ada alasan yang diberikan.';

                showStatusModal({
                    icon: '✕',
                    title: 'Akun Ditolak',
                    message:
                        'Maaf, akun kamu belum bisa disetujui.<br><br>' +
                        '<b>Alasan:</b><br>' + alasan,
                    primaryText: 'Hubungi Admin',
                    primaryHref: 'mailto:admin@createtopia.com',
                    bgIcon: '#FA855A'
                });

                return;
            }


            if (user.status === 'approved') {

                localStorage.setItem('createopiaRole', 'artist');
                localStorage.setItem('createopiaEmail', email);
                localStorage.setItem('profileName', user.nama || 'Artist');

                window.location.href = "{{ route('user.home') }}";
                return;
            }


            showError('emailError', 'Status akun tidak dikenali.');

        });



        /* =====================================================
           HELPERS
        ===================================================== */

        function getPendingUsers() {

            try {

                const data = JSON.parse(
                    localStorage.getItem('pendingUsers') || '[]'
                );

                return Array.isArray(data) ? data : [];

            } catch (e) { return []; }

        }


        function showError(id, message) {

            const el = document.getElementById(id);
            el.textContent = message;
            el.classList.remove('hidden');

        }


        function showStatusModal({ icon, title, message,
                                  primaryText, primaryHref, bgIcon }) {

            document.getElementById('modalIcon').textContent = icon;
            document.getElementById('modalIcon').style.background =
                bgIcon || '#FFDE96';
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalMessage').innerHTML = message;
            document.getElementById('modalPrimaryBtn').textContent = primaryText;
            document.getElementById('modalPrimaryBtn').href = primaryHref;

            const modal = document.getElementById('statusModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }


        function closeStatusModal() {

            const modal = document.getElementById('statusModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');

        }


        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeStatusModal();
        });

    </script>

</body>

</html>