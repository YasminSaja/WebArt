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

</head>


<body class="m-0 bg-[#ffdf96]">


    <!-- ================================================= -->
    <!-- MAIN -->
    <!-- ================================================= -->

    <main class="relative w-full min-h-screen flex items-center justify-center p-8">


        <!-- BACK -->

        <a
            href="{{ route('user.profile') }}"
            class="absolute top-6 left-8 text-[#c83232] text-[9px] hover:underline"
        >
            ← Back
        </a>



        <!-- SETTINGS -->

        <button
            type="button"
            onclick="openSettings()"
            class="absolute top-6 right-8 text-[#c83232] text-[10px] hover:underline"
        >
            ⚙ Settings
        </button>



        <!-- ================================================= -->
        <!-- FORM -->
        <!-- ================================================= -->

        <div class="w-full max-w-[620px] min-h-[390px] bg-[#fff8ee] flex">


            <!-- ================================================= -->
            <!-- LEFT -->
            <!-- ================================================= -->

            <div class="w-1/2 px-10 py-8 flex flex-col items-center">


                <!-- CROP AREA -->

                <div
                    class="relative w-[150px] h-[150px] rounded-full overflow-hidden bg-[#ff7957]"
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

                </div>



                <!-- CHANGE PICTURE -->

                <label
                    for="profileInput"
                    class="mt-4 w-[105px] h-[20px] rounded-full bg-[#c83232] text-white text-[8px] flex items-center justify-center cursor-pointer hover:opacity-80 transition"
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
                            class="w-full"
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
                            class="w-full"
                        >

                    </div>



                    <!-- RESET PHOTO -->

                    <button
                        type="button"
                        onclick="resetCrop()"
                        class="mt-3 text-[8px] text-[#c83232] underline"
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
                        class="w-full h-[22px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-3 text-[9px]"
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
                        class="w-full h-[75px] rounded-xl border border-[#cbb8b8] bg-[#eadada] outline-none px-3 py-2 text-[9px] resize-none"
                    ></textarea>

                </div>



                <!-- ================================================= -->
                <!-- SAVE -->
                <!-- ================================================= -->

                <button
                    type="button"
                    onclick="saveProfile()"
                    class="mt-5 w-[85px] h-[20px] rounded-full bg-[#c83232] text-white text-[8px] hover:opacity-80 transition"
                >
                    Edit profile
                </button>


            </div>



            <!-- ================================================= -->
            <!-- RIGHT -->
            <!-- ================================================= -->

            <div
                class="w-1/2 bg-[#f0dede] flex items-center justify-center"
            >

                <h1
                    class="font-serif font-bold text-[#c83232] text-xl text-center leading-tight"
                >
                    Update your<br>
                    Profile
                </h1>

            </div>


        </div>

    </main>



    <!-- ================================================= -->
    <!-- SETTINGS MODAL -->
    <!-- ================================================= -->

    <div
        id="settingsModal"
        class="hidden fixed inset-0 z-50 bg-white/70 backdrop-blur-sm items-center justify-center p-5"
    >

        <div
            class="w-full max-w-[320px] bg-[#fff8ee] border border-[#e8cfcf] shadow-xl rounded-xl p-6"
        >


            <!-- HEADER -->

            <div class="flex items-center justify-between">

                <h2
                    class="font-serif font-bold text-[#c83232] text-xl"
                >
                    Settings
                </h2>


                <button
                    type="button"
                    onclick="closeSettings()"
                    class="text-[#c83232] text-xl hover:scale-110 transition"
                >
                    ×
                </button>

            </div>



            <p class="text-[9px] text-gray-500 mt-2">
                Manage your profile settings.
            </p>



            <!-- ================================================= -->
            <!-- RESET PROFILE -->
            <!-- ================================================= -->

            <button
                type="button"
                onclick="resetProfile()"
                class="w-full mt-6 px-4 py-3 bg-[#f0dede] rounded-lg text-left hover:bg-[#eadada] transition"
            >

                <p class="text-xs font-bold text-[#c83232]">
                    Reset Profile
                </p>

                <p class="text-[8px] text-gray-500 mt-1">
                    Delete your name, biodata, and profile picture.
                </p>

            </button>



            <!-- ================================================= -->
            <!-- LOGOUT -->
            <!-- ================================================= -->

            <button
                type="button"
                onclick="logout()"
                class="w-full mt-3 px-4 py-3 bg-[#c83232] rounded-lg text-left hover:opacity-90 transition"
            >

                <p class="text-xs font-bold text-white">
                    Logout
                </p>

                <p class="text-[8px] text-white/80 mt-1">
                    Return to the login page.
                </p>

            </button>



            <!-- CANCEL -->

            <button
                type="button"
                onclick="closeSettings()"
                class="w-full mt-4 text-[9px] text-[#c83232] hover:underline"
            >
                Cancel
            </button>


        </div>

    </div>



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
        // LOAD PROFILE
        // =================================================

        window.addEventListener("load", function () {


            const savedName =
                localStorage.getItem("profileName");


            const savedBio =
                localStorage.getItem("profileBio");


            const savedPhoto =
                localStorage.getItem("profilePhoto");



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
        // TOUCH / HP
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
        // RESET PHOTO CROP
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



            localStorage.setItem(
                "profileName",
                name
            );


            localStorage.setItem(
                "profileBio",
                bio
            );



            // Kalau tidak ada foto baru,
            // foto lama tetap digunakan.

            if (
                !cropImage.src ||
                cropImage.classList.contains("hidden")
            ) {

                goToProfile();

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



            ctx.clearRect(
                0,
                0,
                size,
                size
            );



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


            const drawX =
                size / 2 +
                imageX * canvasScale -
                (drawWidth * canvasScale) / 2;


            const drawY =
                size / 2 +
                imageY * canvasScale -
                (drawHeight * canvasScale) / 2;



            // =================================================
            // ROTATE
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

            const finalPhoto =
                canvas.toDataURL("image/png");


            localStorage.setItem(
                "profilePhoto",
                finalPhoto
            );


            goToProfile();

        }



        // =================================================
        // GO PROFILE
        // =================================================

        function goToProfile() {

            window.location.href =
                "{{ route('user.profile') }}";

        }



        // =================================================
        // SETTINGS
        // =================================================

        function openSettings() {

            const modal =
                document.getElementById("settingsModal");


            modal.classList.remove("hidden");

            modal.classList.add("flex");

        }



        function closeSettings() {

            const modal =
                document.getElementById("settingsModal");


            modal.classList.add("hidden");

            modal.classList.remove("flex");

        }



        // =================================================
        // RESET PROFILE
        // =================================================

        function resetProfile() {


            const confirmReset =
                confirm(
                    "Are you sure you want to reset your profile?"
                );


            if (!confirmReset) {

                return;

            }



            // Hapus data profile

            localStorage.removeItem(
                "profileName"
            );


            localStorage.removeItem(
                "profileBio"
            );


            localStorage.removeItem(
                "profilePhoto"
            );



            // Kosongkan form

            profileName.value = "";

            profileBio.value = "";



            // Reset foto

            cropImage.src = "";

            cropImage.classList.add("hidden");

            profilePlaceholder.classList.remove("hidden");

            cropControls.classList.add("hidden");



            // Reset input file

            profileInput.value = "";



            // Tutup settings

            closeSettings();



            alert(
                "Your profile has been reset."
            );

        }



        // =================================================
        // LOGOUT
        // =================================================

        function logout() {


            const confirmLogout =
                confirm(
                    "Are you sure you want to logout?"
                );


            if (!confirmLogout) {

                return;

            }



            /*
             * Logout hanya kembali ke halaman login.
             *
             * Profile dan art TIDAK dihapus.
             */

            window.location.href =
                "{{ route('login') }}";

        }



        // =================================================
        // CLICK OUTSIDE SETTINGS
        // =================================================

        document
            .getElementById("settingsModal")
            .addEventListener(
                "click",
                function (event) {

                    if (event.target === this) {

                        closeSettings();

                    }

                }
            );



        // =================================================
        // ESC SETTINGS
        // =================================================

        document.addEventListener(
            "keydown",
            function (event) {

                if (event.key === "Escape") {

                    closeSettings();

                }

            }
        );

    </script>


</body>

</html>