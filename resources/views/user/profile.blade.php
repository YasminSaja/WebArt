<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CreateTopia - Profile</title>

    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="m-0 bg-white text-gray-700">


    <!-- ================================================= -->
    <!-- NAVBAR -->
    <!-- ================================================= -->

    <nav
        class="w-full h-[60px] bg-[#fff8ee] flex items-center justify-center border-b border-[#f0d8c8]"
    >

        <div class="flex items-center gap-5">

            <!-- LOGO -->

            <a
                href="{{ route('user.home') }}"
                class="font-serif text-xl font-bold text-[#e05252]"
            >
                CreateTopia
            </a>


            <!-- HOME -->

            <a
                href="{{ route('user.home') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Home
            </a>


            <!-- ARTS -->

            <a
                href="{{ route('user.arts') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Arts
            </a>


            <!-- ARTIST -->

            <a
                href="{{ route('user.artist') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Artist
            </a>


            <!-- CATEGORY -->

            <a
                href="{{ route('user.category') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Category
            </a>


            <!-- PROFILE -->

            <a
                href="{{ route('user.profile') }}"
                class="bg-[#72ccd2] text-white px-3 py-1 rounded text-xs"
            >
                Profile
            </a>

        </div>

    </nav>



    <!-- ================================================= -->
    <!-- PROFILE HEADER -->
    <!-- ================================================= -->

    <section class="w-full bg-[#72ccd2]">

        <div
            class="max-w-6xl mx-auto px-8 md:px-14 py-12"
        >

            <div
                class="flex flex-col md:flex-row items-center justify-between gap-8"
            >


                <!-- PROFILE INFO -->

                <div class="text-white">

                    <p class="text-xs mb-2 opacity-80">
                        My Profile
                    </p>


                    <h1
                        id="profileName"
                        class="font-serif text-4xl md:text-5xl font-bold"
                    >
                        Your Name
                    </h1>


                    <p
                        id="profileBio"
                        class="mt-4 max-w-lg text-sm leading-6"
                    >
                        Your bio goes here.
                    </p>


                    <a
                        href="{{ route('form.profile') }}"
                        class="inline-block mt-6 bg-white text-[#e05252] px-5 py-2 rounded-full text-xs hover:opacity-80 transition"
                    >
                        Edit Profile
                    </a>

                </div>



                <!-- PROFILE IMAGE -->

                <div>

                    <img
                        id="profileImage"
                        src=""
                        alt="Profile"
                        class="hidden w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-4 border-white"
                    >


                    <div
                        id="profileImagePlaceholder"
                        class="w-36 h-36 md:w-44 md:h-44 rounded-full bg-[#fff8ee] flex items-center justify-center text-[#e05252] text-5xl"
                    >
                        ○
                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- ================================================= -->
    <!-- MY ARTS -->
    <!-- ================================================= -->

    <main class="w-full">


        <section
            class="max-w-6xl mx-auto px-8 md:px-14 py-12"
        >


            <!-- TITLE -->

            <div
                class="flex items-center justify-between mb-8"
            >

                <div>

                    <h2
                        class="font-serif text-3xl font-bold text-[#e05252]"
                    >
                        My Arts
                    </h2>

                    <div
                        class="mt-2 w-24 h-1 bg-[#72ccd2]"
                    ></div>

                </div>


                <!-- ADD ART -->

                <a
                    href="{{ route('form.art') }}"
                    class="bg-[#e05252] text-white px-5 py-2 rounded-full text-xs hover:opacity-80 transition"
                >
                    + Add arts
                </a>

            </div>



            <!-- ART CONTAINER -->

            <div
                id="artsContainer"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
            >
            </div>



            <!-- EMPTY -->

            <div
                id="emptyArts"
                class="hidden text-center py-20 text-gray-400"
            >

                <p class="text-sm">
                    You haven't uploaded any art yet.
                </p>

                <a
                    href="{{ route('form.art') }}"
                    class="inline-block mt-4 text-[#e05252] text-xs hover:underline"
                >
                    Upload your first art
                </a>

            </div>

        </section>

    </main>



    <!-- ================================================= -->
    <!-- ART DETAIL -->
    <!-- ================================================= -->

    <div
        id="artDetail"
        class="hidden fixed inset-0 z-50 bg-white/80 backdrop-blur-sm items-center justify-center p-4 md:p-8"
    >


        <div
            class="relative w-full max-w-6xl bg-white shadow-xl overflow-hidden"
        >


            <!-- TOP -->

            <div class="h-6 bg-[#ffdf96]"></div>



            <!-- CLOSE -->

            <button
                onclick="closeArtDetail()"
                class="absolute top-8 right-5 z-20 text-[#e05252] text-2xl hover:scale-110 transition"
            >
                ×
            </button>



            <!-- CONTENT -->

            <div
                class="flex flex-col md:flex-row min-h-[500px]"
            >


                <!-- LEFT -->

                <div
                    class="w-full md:w-[45%] p-8 md:p-12 flex flex-col justify-between"
                >


                    <div>

                        <!-- TITLE -->

                        <h1
                            id="detailTitle"
                            class="font-serif uppercase text-3xl md:text-4xl font-bold text-[#ff7957]"
                        >
                            THE SCREAM
                        </h1>



                        <!-- DESCRIPTION -->

                        <p
                            id="detailDescription"
                            class="mt-6 text-[#ff7957] text-sm leading-5 max-w-md"
                        >
                            Description
                        </p>



                        <!-- CATEGORY -->

                        <p
                            id="detailCategory"
                            class="mt-5 text-[#ff7957] text-xs"
                        >
                            Category
                        </p>

                    </div>



                    <!-- UPLOAD INFO -->

                    <div
                        class="text-center text-[#ff7957] mt-10"
                    >

                        <p class="text-[9px]">
                            Uploaded on
                            <span id="detailDate"></span>
                        </p>


                        <p class="font-bold text-sm mt-1">
                            By
                            <span id="detailCreator"></span>
                        </p>

                    </div>


                </div>



                <!-- RIGHT / IMAGE -->

                <div
                    class="w-full md:w-[55%] min-h-[450px] bg-white relative flex items-center justify-center"
                >


                    <img
                        id="detailImage"
                        src=""
                        alt="Artwork"
                        class="w-full h-[450px] md:h-[560px] object-contain"
                    >



                    <!-- LEFT ARROW -->

                    <button
                        id="previousArt"
                        onclick="previousArt()"
                        class="hidden absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-[#d9363e] bg-white text-[#d9363e] text-2xl hover:bg-[#d9363e] hover:text-white transition"
                    >
                        ←
                    </button>



                    <!-- RIGHT ARROW -->

                    <button
                        id="nextArt"
                        onclick="nextArt()"
                        class="hidden absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-[#d9363e] bg-white text-[#d9363e] text-2xl hover:bg-[#d9363e] hover:text-white transition"
                    >
                        →
                    </button>


                </div>

            </div>



            <!-- BOTTOM -->

            <div class="h-6 bg-[#ffdf96]"></div>


        </div>

    </div>



    <!-- ================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ================================================= -->

    <script>


        // =================================================
        // PROFILE
        // =================================================

        const savedName =
            localStorage.getItem("profileName");

        const savedBio =
            localStorage.getItem("profileBio");

        const savedPhoto =
            localStorage.getItem("profilePhoto");



        if (savedName && savedName.trim() !== "") {

            document
                .getElementById("profileName")
                .textContent = savedName;

        }



        if (savedBio && savedBio.trim() !== "") {

            document
                .getElementById("profileBio")
                .textContent = savedBio;

        }



        if (savedPhoto) {

            const profileImage =
                document.getElementById("profileImage");

            const placeholder =
                document.getElementById("profileImagePlaceholder");


            profileImage.src = savedPhoto;

            profileImage.classList.remove("hidden");

            placeholder.classList.add("hidden");

        }



        // =================================================
        // ARTS
        // =================================================

        let userArts =
            JSON.parse(
                localStorage.getItem("userArts") || "[]"
            );


        const artsContainer =
            document.getElementById("artsContainer");

        const emptyArts =
            document.getElementById("emptyArts");



        if (userArts.length === 0) {

            emptyArts.classList.remove("hidden");

        } else {

            userArts.forEach(function (art, index) {

                createArtCard(art, index);

            });

        }



        // =================================================
        // CREATE CARD
        // =================================================

        function createArtCard(art, index) {

            const card =
                document.createElement("article");


            card.className =
                "bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition cursor-pointer";


            card.innerHTML = `

                <div class="w-full h-56 bg-[#fff8ee] overflow-hidden">

                    <img
                        src="${art.image}"
                        alt="${escapeHTML(art.title || "Artwork")}"
                        class="w-full h-full object-cover hover:scale-105 transition duration-300"
                    >

                </div>


                <div class="p-4">

                    <h3
                        class="font-serif font-bold text-[#e05252] text-lg uppercase"
                    >
                        ${escapeHTML(art.title || "Untitled")}
                    </h3>


                    <p
                        class="text-xs text-gray-500 mt-2 line-clamp-3"
                    >
                        ${escapeHTML(art.description || "No description.")}
                    </p>


                    <p
                        class="text-[9px] text-[#72aeb5] mt-3"
                    >
                        ${escapeHTML(art.category || "Art")}
                    </p>

                </div>

            `;


            card.addEventListener(
                "click",
                function () {

                    openArtDetail(index);

                }
            );


            artsContainer.appendChild(card);

        }



        // =================================================
        // OPEN DETAIL
        // =================================================

        let currentArtIndex = 0;


        function openArtDetail(index) {

            currentArtIndex = index;

            showArt();


            const detail =
                document.getElementById("artDetail");


            detail.classList.remove("hidden");

            detail.classList.add("flex");


            document.body.classList.add("overflow-hidden");

        }



        // =================================================
        // SHOW ART
        // =================================================

        function showArt() {

            const art =
                userArts[currentArtIndex];


            if (!art) {

                return;

            }



            // IMAGE

            document
                .getElementById("detailImage")
                .src = art.image || "";



            // TITLE

            document
                .getElementById("detailTitle")
                .textContent =
                art.title || "Untitled";



            // DESCRIPTION

            document
                .getElementById("detailDescription")
                .textContent =
                art.description ||
                "No description.";



            // CATEGORY

            document
                .getElementById("detailCategory")
                .textContent =
                art.category ||
                "Art";



            // CREATOR

            const creator =
                art.creator ||
                savedName ||
                "Unknown Artist";


            document
                .getElementById("detailCreator")
                .textContent =
                creator;



            // DATE

            let dateText =
                "Unknown date";


            if (art.date) {

                const date =
                    new Date(art.date);


                dateText =
                    date.toLocaleDateString(
                        "en-GB",
                        {
                            day: "2-digit",
                            month: "2-digit",
                            year: "numeric"
                        }
                    );

            }


            document
                .getElementById("detailDate")
                .textContent =
                dateText;



            // =================================================
            // ARROWS
            // =================================================

            const previousButton =
                document.getElementById("previousArt");

            const nextButton =
                document.getElementById("nextArt");



            // CUMA 1 ART

            if (userArts.length <= 1) {

                previousButton.classList.add("hidden");

                nextButton.classList.add("hidden");

                return;

            }



            // ADA BANYAK ART

            previousButton.classList.remove("hidden");

            nextButton.classList.remove("hidden");



            // ART PERTAMA

            if (currentArtIndex === 0) {

                previousButton.classList.add("hidden");

            }



            // ART TERAKHIR

            if (
                currentArtIndex ===
                userArts.length - 1
            ) {

                nextButton.classList.add("hidden");

            }

        }



        // =================================================
        // NEXT
        // =================================================

        function nextArt() {

            if (
                currentArtIndex <
                userArts.length - 1
            ) {

                currentArtIndex++;

                showArt();

            }

        }



        // =================================================
        // PREVIOUS
        // =================================================

        function previousArt() {

            if (currentArtIndex > 0) {

                currentArtIndex--;

                showArt();

            }

        }



        // =================================================
        // CLOSE
        // =================================================

        function closeArtDetail() {

            const detail =
                document.getElementById("artDetail");


            detail.classList.add("hidden");

            detail.classList.remove("flex");


            document.body.classList.remove("overflow-hidden");

        }



        // =================================================
        // CLICK OUTSIDE
        // =================================================

        document
            .getElementById("artDetail")
            .addEventListener(
                "click",
                function (event) {

                    if (event.target === this) {

                        closeArtDetail();

                    }

                }
            );



        // =================================================
        // ESC + KEYBOARD ARROWS
        // =================================================

        document.addEventListener(
            "keydown",
            function (event) {

                const detail =
                    document.getElementById("artDetail");


                if (detail.classList.contains("hidden")) {

                    return;

                }


                if (event.key === "Escape") {

                    closeArtDetail();

                }


                if (event.key === "ArrowRight") {

                    nextArt();

                }


                if (event.key === "ArrowLeft") {

                    previousArt();

                }

            }
        );



        // =================================================
        // SECURITY
        // =================================================

        function escapeHTML(text) {

            const div =
                document.createElement("div");

            div.textContent =
                text || "";

            return div.innerHTML;

        }

    </script>


</body>

</html>