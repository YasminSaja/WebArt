<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Update Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        /* ================================================= */
        /* EXTRA ANIMATION - TAMPILAN DASAR TETAP */
        /* ================================================= */

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

        }


        @keyframes floatSlow {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-7px) rotate(5deg);
            }

        }


        @keyframes popIn {

            from {
                opacity: 0;
                transform: scale(.96);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }

        }


        .float-decoration {
            animation: float 4s ease-in-out infinite;
        }


        .float-slow {
            animation: floatSlow 5s ease-in-out infinite;
        }


        .form-card {
            animation: popIn .5s ease-out;
            transition:
                box-shadow .3s ease,
                transform .3s ease;
        }


        .form-card:hover {
            box-shadow:
                0 18px 45px rgba(120, 65, 45, .12);

            transform: translateY(-2px);
        }


        .input-effect {
            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }


        .input-effect:focus {
            border-color: #c83232;

            box-shadow:
                0 0 0 3px rgba(200, 50, 50, .10);

            transform: translateY(-1px);
        }


        .button-effect {
            transition:
                transform .2s ease,
                box-shadow .2s ease,
                opacity .2s ease;
        }


        .button-effect:hover {
            transform: translateY(-2px);

            box-shadow:
                0 7px 15px rgba(200, 50, 50, .20);
        }


        .profile-circle {
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }


        .profile-circle:hover {
            transform: scale(1.03);

            box-shadow:
                0 10px 25px rgba(200, 50, 50, .15);
        }


        .picture-button {
            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .picture-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 6px 12px rgba(200, 50, 50, .18);
        }

    </style>

</head>


<body class="m-0 bg-[#ffdf96]">


    <!-- ================================================= -->
    <!-- MAIN -->
    <!-- ================================================= -->

    <main
        class="relative w-full min-h-screen flex items-center justify-center p-8 overflow-hidden"
    >


        <!-- ================================================= -->
        <!-- DECORATIONS -->
        <!-- HANYA TAMBAHAN, TIDAK MENGUBAH LAYOUT -->
        <!-- ================================================= -->

        <div
            class="float-decoration absolute top-[15%] left-[12%] text-[#c83232]/30 text-3xl pointer-events-none"
        >
            ✦
        </div>


        <div
            class="float-slow absolute top-[22%] right-[14%] text-[#ff7957]/40 text-2xl pointer-events-none"
        >
            ●
        </div>


        <div
            class="float-decoration absolute bottom-[18%] left-[18%] text-[#c83232]/25 text-2xl pointer-events-none"
        >
            ♡
        </div>


        <div
            class="float-slow absolute bottom-[15%] right-[18%] text-[#ff7957]/35 text-3xl pointer-events-none"
        >
            ✦
        </div>



        <!-- ================================================= -->
        <!-- FORM -->
        <!-- ================================================= -->

        <div
            class="form-card w-full max-w-[620px] min-h-[390px] bg-[#fff8ee] flex relative z-10"
        >


            <!-- ================================================= -->
            <!-- LEFT -->
            <!-- ================================================= -->

            <div
                class="w-1/2 px-10 py-8 flex flex-col items-center"
            >


                <!-- ================================================= -->
                <!-- CROP AREA -->
                <!-- ================================================= -->

                <div
                    class="profile-circle relative w-[150px] h-[150px] rounded-full overflow-hidden bg-[#ff7957] cursor-move"
                >

                    <!-- IMAGE -->

                    <img
                        id="cropImage"
                        src=""
                        alt="Profile"
                        class="absolute max-w-none hidden select-none"
                        draggable="false"
                    >


                    <!-- PLACEHOLDER -->

                    <div
                        id="profilePlaceholder"
                        class="absolute inset-0 flex items-center justify-center text-[#c83232] text-4xl"
                    >
                        ♙
                    </div>


                    <!-- SMALL DECORATION -->

                    <div
                        class="absolute bottom-3 right-3 w-5 h-5 rounded-full bg-[#fff8ee]/80 pointer-events-none"
                    ></div>

                </div>



                <!-- CHANGE PICTURE -->

                <label
                    for="profileInput"
                    class="picture-button mt-4 w-[105px] h-[20px] rounded-full bg-[#c83232] text-white text-[8px] flex items-center justify-center cursor-pointer"
                >
                    Change Profile Picture
                </label>


                <input
                    id="profileInput"
                    type="file"
                    accept="image/*"
                    class="hidden"
                >



                <!-- ================================================= -->
                <!-- CROP CONTROLS -->
                <!-- ================================================= -->

                <div
                    id="cropControls"
                    class="w-full mt-4 hidden"
                >


                    <!-- ZOOM -->

                    <div class="flex items-center gap-2">

                        <span class="text-[8px] text-[#c83232] w-8">
                            Zoom
                        </span>

                        <input
                            id="zoom"
                            type="range"
                            min="0.2"
                            max="3"
                            step="0.01"
                            value="1"
                            class="w-full accent-[#c83232]"
                        >

                    </div>



                    <!-- ROTATE -->

                    <div class="flex items-center gap-2 mt-3">

                        <span class="text-[8px] text-[#c83232] w-8">
                            Rotate
                        </span>

                        <input
                            id="rotate"
                            type="range"
                            min="-180"
                            max="180"
                            step="1"
                            value="0"
                            class="w-full accent-[#c83232]"
                        >

                    </div>



                    <!-- RESET PHOTO -->

                    <button
                        type="button"
                        onclick="resetCrop()"
                        class="mt-3 text-[8px] text-[#c83232] underline hover:opacity-60 transition"
                    >
                        Reset photo
                    </button>

                </div>



                <!-- ================================================= -->
                <!-- NAME -->
                <!-- ================================================= -->

                <div class="w-full mt-6">

                    <label
                        class="block text-[8px] text-[#c83232] mb-1"
                    >
                        Name
                    </label>


                    <input
                        id="profileName"
                        type="text"
                        placeholder="Type here"
                        class="input-effect w-full h-[22px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-3 text-[9px]"
                    >

                </div>



                <!-- ================================================= -->
                <!-- BIODATA -->
                <!-- ================================================= -->

                <div class="w-full mt-5">

                    <label
                        class="block text-[8px] text-[#c83232] mb-1"
                    >
                        Biodata
                    </label>


                    <textarea
                        id="profileBio"
                        placeholder="Type here"
                        class="input-effect w-full h-[75px] rounded-xl border border-[#cbb8b8] bg-[#eadada] outline-none px-3 py-2 text-[9px] resize-none"
                    ></textarea>

                </div>



                <!-- ================================================= -->
                <!-- BUTTONS -->
                <!-- ================================================= -->

                <div class="flex justify-center gap-2 mt-5">


                    <!-- CANCEL -->

                    <button
                        type="button"
                        onclick="cancelEdit()"
                        class="button-effect w-[75px] h-[20px] rounded-full border border-[#c83232] text-[#c83232] bg-white text-[8px] hover:bg-[#f0dede]"
                    >
                        Cancel
                    </button>


                    <!-- SAVE -->

                    <button
                        type="button"
                        onclick="saveProfile()"
                        class="button-effect w-[85px] h-[20px] rounded-full bg-[#c83232] text-white text-[8px]"
                    >
                        Edit profile
                    </button>

                </div>


            </div>



            <!-- ================================================= -->
            <!-- RIGHT -->
            <!-- TETAP SAMA -->
            <!-- ================================================= -->

            <div
                class="w-1/2 bg-[#f0dede] flex items-center justify-center relative overflow-hidden"
            >


                <!-- DECORATION -->

                <div
                    class="float-decoration absolute top-8 right-8 text-[#c83232]/20 text-4xl"
                >
                    ✦
                </div>


                <div
                    class="float-slow absolute bottom-8 left-8 text-[#ff7957]/25 text-3xl"
                >
                    ♡
                </div>


                <h1
                    class="font-serif font-bold text-[#c83232] text-xl text-center leading-tight relative z-10"
                >
                    Update your<br>
                    Profile
                </h1>

            </div>


        </div>

    </main>



    <!-- ================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ================================================= -->

    <script>


        // =================================================
        // ELEMENTS
        // =================================================

        const profileInput =
            document.getElementById("profileInput");


        const cropImage =
            document.getElementById("cropImage");


        const profilePlaceholder =
            document.getElementById("profilePlaceholder");


        const profileName =
            document.getElementById("profileName");


        const profileBio =
            document.getElementById("profileBio");


        const cropControls =
            document.getElementById("cropControls");


        const zoom =
            document.getElementById("zoom");


        const rotate =
            document.getElementById("rotate");



        // =================================================
        // IMAGE VARIABLES
        // =================================================

        let imageScale = 1;

        let imageX = 0;

        let imageY = 0;

        let rotation = 0;

        let imageNaturalWidth = 0;

        let imageNaturalHeight = 0;



        // =================================================
        // LOAD PROFILE — DARI DATABASE
        // =================================================
        //
        // $user dikirim oleh ProfileController@editForm()
        // lewat FrontendData::profileUser(). Isinya:
        //
        //     { name, bio, photo }
        //
        // -> name  = kolom `name` di tabel users
        // -> bio   = kolom `bio`
        // -> photo = foto_profil, sudah jadi URL
        //
        // Efeknya: kolom Name & Bio di form ini langsung terisi
        // dengan data user yang sedang login.
        //
        // CATATAN: jangan menulis nama perintah Blade
        // (yang diawali tanda "at", seperti at-json atau
        // at-if) di dalam komentar. Blade tetap
        // mengompilasinya, jadi tulisan itu bisa bikin
        // halaman error. Tulis "at-json" saja di komentar.
        //

        const currentUser = @json($user);


        window.addEventListener("load", function () {

            const savedName =
                currentUser ? currentUser.name : null;


            const savedBio =
                currentUser ? currentUser.bio : null;


            const savedPhoto =
                currentUser ? currentUser.photo : null;



            if (savedName) {

                profileName.value =
                    savedName;

            }


            if (savedBio) {

                profileBio.value =
                    savedBio;

            }


            if (savedPhoto) {

                cropImage.src =
                    savedPhoto;


                cropImage.onload =
                    function () {

                        imageNaturalWidth =
                            cropImage.naturalWidth;


                        imageNaturalHeight =
                            cropImage.naturalHeight;


                        cropControls
                            .classList
                            .remove("hidden");


                        profilePlaceholder
                            .classList
                            .add("hidden");


                        cropImage
                            .classList
                            .remove("hidden");


                        resetCrop();

                    };

            }

        });



        // =================================================
        // SELECT IMAGE
        // =================================================

        profileInput.addEventListener(
            "change",
            function () {

                const file =
                    this.files[0];


                if (!file) return;


                const reader =
                    new FileReader();


                reader.onload =
                    function (e) {

                        cropImage.src =
                            e.target.result;


                        cropImage
                            .classList
                            .remove("hidden");


                        profilePlaceholder
                            .classList
                            .add("hidden");


                        cropImage.onload =
                            function () {

                                imageNaturalWidth =
                                    cropImage.naturalWidth;


                                imageNaturalHeight =
                                    cropImage.naturalHeight;


                                cropControls
                                    .classList
                                    .remove("hidden");


                                resetCrop();

                            };

                    };


                reader.readAsDataURL(file);

            }
        );



        // =================================================
        // UPDATE IMAGE
        // =================================================

        function updateImage() {

            const cropSize = 150;


            const baseScale =
                Math.max(
                    cropSize / imageNaturalWidth,
                    cropSize / imageNaturalHeight
                );


            const finalScale =
                baseScale * imageScale;


            const width =
                imageNaturalWidth * finalScale;


            const height =
                imageNaturalHeight * finalScale;


            cropImage.style.width =
                width + "px";


            cropImage.style.height =
                height + "px";


            cropImage.style.left =
                `calc(50% + ${imageX}px - ${width / 2}px)`;


            cropImage.style.top =
                `calc(50% + ${imageY}px - ${height / 2}px)`;


            cropImage.style.transform =
                `rotate(${rotation}deg)`;

        }



        // =================================================
        // ZOOM
        // =================================================

        zoom.addEventListener(
            "input",
            function () {

                imageScale =
                    parseFloat(this.value);


                updateImage();

            }
        );



        // =================================================
        // ROTATE
        // =================================================

        rotate.addEventListener(
            "input",
            function () {

                rotation =
                    parseInt(this.value);


                updateImage();

            }
        );



        // =================================================
        // DRAG IMAGE
        // =================================================

        let dragging = false;

        let startX = 0;

        let startY = 0;

        let startImageX = 0;

        let startImageY = 0;



        cropImage.addEventListener(
            "mousedown",
            function (e) {

                dragging = true;


                startX =
                    e.clientX;


                startY =
                    e.clientY;


                startImageX =
                    imageX;


                startImageY =
                    imageY;


                e.preventDefault();

            }
        );



        document.addEventListener(
            "mousemove",
            function (e) {

                if (!dragging) return;


                imageX =
                    startImageX +
                    (e.clientX - startX);


                imageY =
                    startImageY +
                    (e.clientY - startY);


                updateImage();

            }
        );



        document.addEventListener(
            "mouseup",
            function () {

                dragging = false;

            }
        );



        // =================================================
        // TOUCH
        // =================================================

        cropImage.addEventListener(
            "touchstart",
            function (e) {

                if (e.touches.length !== 1) return;


                dragging = true;


                startX =
                    e.touches[0].clientX;


                startY =
                    e.touches[0].clientY;


                startImageX =
                    imageX;


                startImageY =
                    imageY;

            }
        );



        cropImage.addEventListener(
            "touchmove",
            function (e) {

                if (!dragging) return;


                const touch =
                    e.touches[0];


                imageX =
                    startImageX +
                    (touch.clientX - startX);


                imageY =
                    startImageY +
                    (touch.clientY - startY);


                updateImage();


                e.preventDefault();

            }
        );



        cropImage.addEventListener(
            "touchend",
            function () {

                dragging = false;

            }
        );



        // =================================================
        // RESET PHOTO
        // =================================================

        function resetCrop() {

            imageScale = 1;

            imageX = 0;

            imageY = 0;

            rotation = 0;


            zoom.value = 1;

            rotate.value = 0;


            if (
                imageNaturalWidth &&
                imageNaturalHeight
            ) {

                updateImage();

            }

        }



        // =================================================
        // SAVE PROFILE
        // =================================================

        function saveProfile() {

            const name =
                profileName.value.trim();


            const bio =
                profileBio.value.trim();



            // Data dummy dari localStorage sudah dihapus.
            //
            // TODO: kirim ke database. Contoh:
            //
            //     const body = new FormData();
            //     body.append('name', name);
            //     body.append('bio', bio);
            //     body.append('foto_profil', canvasBlob);
            //
            //     fetch('{{ route('profile.update') }}', {
            //         method: 'POST',
            //         headers: {
            //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //         },
            //         body: body
            //     }).then(() => goToProfile());


            // Kalau tidak ada foto baru,
            // foto lama tetap digunakan.

            if (
                !cropImage.src ||
                cropImage.classList.contains("hidden")
            ) {

                sendProfile(name, bio, null);

                return;

            }



            // =================================================
            // CANVAS
            // =================================================

            const canvas =
                document.createElement("canvas");


            const size = 500;


            canvas.width = size;

            canvas.height = size;


            const ctx =
                canvas.getContext("2d");



            // CIRCLE

            ctx.beginPath();


            ctx.arc(
                size / 2,
                size / 2,
                size / 2,
                0,
                Math.PI * 2
            );


            ctx.closePath();

            ctx.clip();



            // =================================================
            // IMAGE CALCULATION
            // =================================================

            const cropSize = 150;


            const baseScale =
                Math.max(
                    cropSize / imageNaturalWidth,
                    cropSize / imageNaturalHeight
                );


            const finalScale =
                baseScale * imageScale;


            const drawWidth =
                imageNaturalWidth * finalScale;


            const drawHeight =
                imageNaturalHeight * finalScale;


            const canvasScale =
                size / cropSize;



            // =================================================
            // ROTATE + DRAW
            // =================================================

            ctx.save();


            ctx.translate(
                size / 2,
                size / 2
            );


            ctx.rotate(
                rotation * Math.PI / 180
            );


            ctx.drawImage(
                cropImage,

                -drawWidth * canvasScale / 2 +
                    imageX * canvasScale,

                -drawHeight * canvasScale / 2 +
                    imageY * canvasScale,

                drawWidth * canvasScale,

                drawHeight * canvasScale
            );


            ctx.restore();



            // =================================================
            // SAVE PHOTO
            // =================================================

            // Data dummy dari localStorage sudah dihapus.
            // Kirim hasil canvas ke server, contoh:
            //
            //     canvas.toBlob(blob => {
            //         const body = new FormData();
            //         body.append('name', name);
            //         body.append('bio', bio);
            //         body.append('foto_profil', blob);
            //
            //         fetch('{{ route('profile.update') }}', {
            //             method: 'POST',
            //             headers: {
            //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //             },
            //             body: body
            //         }).then(() => goToProfile());
            //     }, 'image/png');

            canvas.toBlob(function (blob) {

                sendProfile(name, bio, blob);

            }, 'image/png');

        }


        // =================================================
        // KIRIM PROFILE KE SERVER
        // =================================================

        function sendProfile(name, bio, blob) {

            const body = new FormData();

            body.append('_method', 'PUT');
            body.append('name', name);
            body.append('bio', bio);

            if (blob) {
                body.append('profile_photo', blob, 'profile.png');
            }

            fetch("{{ route('profile.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: body
            })
                .then(function (r) {
                    return r.json().then(function (data) {
                        return { ok: r.ok, data: data };
                    });
                })
                .then(function (res) {

                    if (!res.ok) {
                        alert(res.data.message || "Gagal menyimpan profile.");
                        return;
                    }

                    goToProfile();

                })
                .catch(function () {
                    alert("Gagal menyimpan profile.");
                });

        }



        // =================================================
        // GO PROFILE
        // =================================================

        function goToProfile() {

            window.location.href =
                "{{ route('user.home') }}";

        }



        // =================================================
        // CANCEL
        // =================================================

        function cancelEdit() {

            window.location.href =
                "{{ route('user.profile') }}";

        }


    </script>


</body>

</html>