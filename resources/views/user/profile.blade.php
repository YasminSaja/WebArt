<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CreateTopia - Profile</title>

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

            <a
                href="{{ route('user.home') }}"
                class="font-serif text-xl font-bold text-[#e05252]"
            >
                CreateTopia
            </a>


            <a
                href="{{ route('user.home') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Home
            </a>


            <a
                href="{{ route('user.arts') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Arts
            </a>


            <a
                href="{{ route('user.artist') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Artist
            </a>


            <a
                href="{{ route('user.category') }}"
                class="text-[#e05252] text-xs hover:text-[#72ccd2] transition"
            >
                Category
            </a>


            <a
                href="{{ route('user.profile') }}"
                class="bg-[#72ccd2] text-white px-3 py-1 rounded text-xs"
            >
                Profile
            </a>

        </div>

    </nav>



    <!-- ================================================= -->
    <!-- PROFILE HEADER / BANNER -->
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
    <!-- ART DETAIL MODAL -->
    <!-- ================================================= -->

    <div
        id="artDetail"
        class="hidden fixed inset-0 z-40 bg-white/80 backdrop-blur-sm items-center justify-center p-4 md:p-8"
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

                        <h1
                            id="detailTitle"
                            class="font-serif uppercase text-3xl md:text-4xl font-bold text-[#ff7957]"
                        >
                            THE SCREAM
                        </h1>


                        <p
                            id="detailDescription"
                            class="mt-6 text-[#ff7957] text-sm leading-5 max-w-md"
                        >
                            Description
                        </p>


                        <p
                            id="detailCategory"
                            class="mt-5 text-[#ff7957] text-xs"
                        >
                            Category
                        </p>

                    </div>


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



                <!-- RIGHT IMAGE -->

                <div
                    class="w-full md:w-[55%] min-h-[450px] bg-white relative flex items-center justify-center"
                >

                    <img
                        id="detailImage"
                        src=""
                        alt="Artwork"
                        class="w-full h-[450px] md:h-[560px] object-contain"
                    >


                    <!-- PREVIOUS -->

                    <button
                        id="previousArt"
                        onclick="previousArt()"
                        class="hidden absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-[#d9363e] bg-white text-[#d9363e] text-2xl hover:bg-[#d9363e] hover:text-white transition"
                    >
                        ←
                    </button>


                    <!-- NEXT -->

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
    <!-- EDIT ART MODAL -->
    <!-- ================================================= -->

    <div
        id="editArtModal"
        class="hidden fixed inset-0 z-50 bg-black/30 backdrop-blur-sm items-center justify-center p-4"
    >

        <div
            class="relative w-full max-w-[650px] max-h-[90vh] overflow-y-auto bg-[#fef6eb] shadow-xl"
        >


            <!-- HEADER -->

            <div
                class="h-5 bg-[#ffdf96]"
            ></div>


            <button
                onclick="closeEditArt()"
                class="absolute top-7 right-5 text-[#e05252] text-2xl hover:scale-110 transition"
            >
                ×
            </button>


            <div class="p-8 md:p-10">


                <!-- TITLE -->

                <h2
                    class="font-serif text-3xl font-bold text-[#e05252] text-center mb-7"
                >
                    Edit Art
                </h2>



                <!-- IMAGE PREVIEW -->

                <div class="flex justify-center mb-5">

                    <div
                        class="w-[230px] h-[180px] bg-white overflow-hidden"
                    >

                        <img
                            id="editImagePreview"
                            src=""
                            class="w-full h-full object-cover"
                            alt="Art preview"
                        >

                    </div>

                </div>



                <!-- CHANGE IMAGE -->

                <label
                    class="block text-[#e05252] text-[10px] mb-1"
                >
                    Change Image
                </label>

                <input
                    id="editImage"
                    type="file"
                    accept="image/*"
                    onchange="previewEditImage(event)"
                    class="w-full text-[10px] mb-5"
                >



                <!-- ART NAME -->

                <label
                    class="block text-[#e05252] text-[10px] mb-1"
                >
                    Art Name
                </label>

                <input
                    id="editTitle"
                    type="text"
                    class="w-full h-[30px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-4 text-[10px] mb-5"
                >



                <!-- DESCRIPTION -->

                <label
                    class="block text-[#e05252] text-[10px] mb-1"
                >
                    Description
                </label>

                <textarea
                    id="editDescription"
                    class="w-full h-[100px] rounded-[15px] border border-[#cbb8b8] bg-[#eadada] outline-none p-4 text-[10px] resize-none mb-5"
                ></textarea>



                <!-- CATEGORY -->

                <label
                    class="block text-[#e05252] text-[10px] mb-1"
                >
                    Category
                </label>

                <select
                    id="editCategory"
                    class="w-full h-[30px] rounded-full border border-[#cbb8b8] bg-[#eadada] outline-none px-4 text-[10px] mb-7"
                >

                    <option value="Digital">
                        Digital
                    </option>

                    <option value="Traditional">
                        Traditional
                    </option>

                </select>



                <!-- BUTTON -->

                <div class="flex justify-center gap-3">

                    <button
                        onclick="closeEditArt()"
                        class="w-[80px] h-[28px] rounded-full border border-[#e05252] text-[#e05252] text-[9px] hover:bg-[#e05252] hover:text-white transition"
                    >
                        Cancel
                    </button>


                    <button
                        onclick="saveEditedArt()"
                        class="w-[100px] h-[28px] rounded-full bg-[#e05252] text-white text-[9px] hover:opacity-80 transition"
                    >
                        Save Changes
                    </button>

                </div>

            </div>


            <!-- BOTTOM -->

            <div class="h-5 bg-[#ffdf96]"></div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- SETTINGS MODAL -->
    <!-- ================================================= -->

    <div
        id="artSettingsModal"
        class="hidden fixed inset-0 z-50 bg-black/30 backdrop-blur-sm items-center justify-center p-4"
    >

        <div
            class="w-full max-w-[320px] bg-[#fef6eb] shadow-xl"
        >

            <div class="h-4 bg-[#ffdf96]"></div>


            <div class="p-7 text-center">

                <h2
                    class="font-serif text-2xl font-bold text-[#e05252] mb-2"
                >
                    Art Settings
                </h2>


                <p
                    id="settingsArtName"
                    class="text-gray-500 text-[10px] mb-6"
                >
                    Artwork
                </p>


                <button
                    id="settingsEditButton"
                    class="w-full h-[30px] rounded-full bg-[#72ccd2] text-white text-[9px] hover:opacity-80 transition mb-3"
                >
                    Edit Art
                </button>


                <button
                    id="settingsDeleteButton"
                    class="w-full h-[30px] rounded-full border border-[#e05252] text-[#e05252] text-[9px] hover:bg-[#e05252] hover:text-white transition mb-3"
                >
                    Delete Art
                </button>


                <button
                    onclick="closeArtSettings()"
                    class="w-full h-[30px] rounded-full bg-gray-200 text-gray-600 text-[9px] hover:bg-gray-300 transition"
                >
                    Cancel
                </button>

            </div>


            <div class="h-4 bg-[#ffdf96]"></div>

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



        renderArts();



        // =================================================
        // RENDER ALL ARTS
        // =================================================

        function renderArts() {

            artsContainer.innerHTML = "";


            if (userArts.length === 0) {

                emptyArts.classList.remove("hidden");

                return;

            }


            emptyArts.classList.add("hidden");


            userArts.forEach(
                function (art, index) {

                    createArtCard(art, index);

                }
            );

        }



        // =================================================
        // CREATE ART CARD
        // =================================================

        function createArtCard(art, index) {

            const card =
                document.createElement("article");


            card.className =
                "bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition";



            card.innerHTML = `

                <!-- IMAGE -->

                <div
                    class="w-full h-56 bg-[#fff8ee] overflow-hidden cursor-pointer"
                    onclick="openArtDetail(${index})"
                >

                    <img
                        src="${art.image || ""}"
                        alt="${escapeHTML(art.title || "Artwork")}"
                        class="w-full h-full object-cover hover:scale-105 transition duration-300"
                    >

                </div>


                <!-- CONTENT -->

                <div class="p-4">


                    <!-- TITLE + SETTINGS -->

                    <div class="flex items-start justify-between gap-2">

                        <h3
                            class="font-serif font-bold text-[#e05252] text-lg uppercase cursor-pointer"
                            onclick="openArtDetail(${index})"
                        >
                            ${escapeHTML(
                                art.title || "Untitled"
                            )}
                        </h3>


                        <!-- SETTINGS -->

                        <button
                            onclick="event.stopPropagation(); openArtSettings(${index})"
                            class="w-7 h-7 flex items-center justify-center rounded-full text-[#e05252] hover:bg-[#eedcdc] transition text-sm"
                        >
                            ⚙
                        </button>

                    </div>


                    <!-- DESCRIPTION -->

                    <p
                        class="text-xs text-gray-500 mt-2 line-clamp-3"
                    >
                        ${escapeHTML(
                            art.description || "No description."
                        )}
                    </p>


                    <!-- CATEGORY -->

                    <p
                        class="text-[9px] text-[#72aeb5] mt-3"
                    >
                        ${escapeHTML(
                            art.category || "Art"
                        )}
                    </p>


                    <!-- EDIT -->

                    <button
                        onclick="event.stopPropagation(); editArt(${index})"
                        class="w-full h-[28px] mt-4 rounded-full bg-[#72ccd2] text-white text-[9px] hover:opacity-80 transition"
                    >
                        Edit
                    </button>

                </div>

            `;


            artsContainer.appendChild(card);

        }



        // =================================================
        // ART DETAIL
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



        function showArt() {

            const art =
                userArts[currentArtIndex];


            if (!art) return;


            document
                .getElementById("detailImage")
                .src =
                art.image || "";


            document
                .getElementById("detailTitle")
                .textContent =
                art.title || "Untitled";


            document
                .getElementById("detailDescription")
                .textContent =
                art.description ||
                "No description.";


            document
                .getElementById("detailCategory")
                .textContent =
                art.category ||
                "Art";


            const creator =
                art.creator ||
                savedName ||
                "Unknown Artist";


            document
                .getElementById("detailCreator")
                .textContent =
                creator;



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



            // ARROWS

            const previousButton =
                document.getElementById("previousArt");

            const nextButton =
                document.getElementById("nextArt");


            if (userArts.length <= 1) {

                previousButton.classList.add("hidden");

                nextButton.classList.add("hidden");

                return;

            }


            previousButton.classList.remove("hidden");

            nextButton.classList.remove("hidden");


            if (currentArtIndex === 0) {

                previousButton.classList.add("hidden");

            }


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
        // CLOSE DETAIL
        // =================================================

        function closeArtDetail() {

            const detail =
                document.getElementById("artDetail");


            detail.classList.add("hidden");

            detail.classList.remove("flex");


            document.body.classList.remove("overflow-hidden");

        }



        // =================================================
        // EDIT ART
        // =================================================

        let editingArtIndex = null;


        function editArt(index) {

            const art =
                userArts[index];


            if (!art) return;


            editingArtIndex = index;


            document
                .getElementById("editImagePreview")
                .src =
                art.image || "";


            document
                .getElementById("editTitle")
                .value =
                art.title || "";


            document
                .getElementById("editDescription")
                .value =
                art.description || "";


            document
                .getElementById("editCategory")
                .value =
                art.category || "Digital";


            document
                .getElementById("editImage")
                .value = "";


            const modal =
                document.getElementById("editArtModal");


            modal.classList.remove("hidden");

            modal.classList.add("flex");


            document.body.classList.add("overflow-hidden");

        }



        // =================================================
        // PREVIEW EDIT IMAGE
        // =================================================

        function previewEditImage(event) {

            const file =
                event.target.files[0];


            if (!file) return;


            const reader =
                new FileReader();


            reader.onload =
                function(e) {

                    document
                        .getElementById("editImagePreview")
                        .src =
                        e.target.result;

                };


            reader.readAsDataURL(file);

        }



        // =================================================
        // SAVE EDITED ART
        // =================================================

        function saveEditedArt() {

            if (editingArtIndex === null) return;


            const title =
                document
                    .getElementById("editTitle")
                    .value
                    .trim();


            const description =
                document
                    .getElementById("editDescription")
                    .value
                    .trim();


            const category =
                document
                    .getElementById("editCategory")
                    .value;


            if (!title) {

                alert("Art Name belum diisi.");

                return;

            }


            if (!description) {

                alert("Description belum diisi.");

                return;

            }


            const art =
                userArts[editingArtIndex];


            art.title =
                title;


            art.description =
                description;


            art.category =
                category;


            const file =
                document
                    .getElementById("editImage")
                    .files[0];


            if (file) {

                const reader =
                    new FileReader();


                reader.onload =
                    function(e) {

                        art.image =
                            e.target.result;


                        finishSaveArt();

                    };


                reader.readAsDataURL(file);

            } else {

                finishSaveArt();

            }

        }



        // =================================================
        // FINISH SAVE
        // =================================================

        function finishSaveArt() {

            localStorage.setItem(
                "userArts",
                JSON.stringify(userArts)
            );


            closeEditArt();


            renderArts();


            alert("Art berhasil diperbarui!");

        }



        // =================================================
        // CLOSE EDIT
        // =================================================

        function closeEditArt() {

            const modal =
                document.getElementById("editArtModal");


            modal.classList.add("hidden");

            modal.classList.remove("flex");


            document.body.classList.remove("overflow-hidden");


            editingArtIndex = null;

        }



        // =================================================
        // ART SETTINGS
        // =================================================

        let settingsArtIndex = null;


        function openArtSettings(index) {

            const art =
                userArts[index];


            if (!art) return;


            settingsArtIndex = index;


            document
                .getElementById("settingsArtName")
                .textContent =
                art.title || "Untitled";


            const modal =
                document.getElementById("artSettingsModal");


            modal.classList.remove("hidden");

            modal.classList.add("flex");


            document.body.classList.add("overflow-hidden");



            // EDIT BUTTON

            document
                .getElementById("settingsEditButton")
                .onclick =
                function() {

                    closeArtSettings();

                    editArt(index);

                };



            // DELETE BUTTON

            document
                .getElementById("settingsDeleteButton")
                .onclick =
                function() {

                    deleteArt(index);

                };

        }



        // =================================================
        // CLOSE SETTINGS
        // =================================================

        function closeArtSettings() {

            const modal =
                document.getElementById("artSettingsModal");


            modal.classList.add("hidden");

            modal.classList.remove("flex");


            document.body.classList.remove("overflow-hidden");


            settingsArtIndex = null;

        }



        // =================================================
        // DELETE ART
        // =================================================

        function deleteArt(index) {

            const art =
                userArts[index];


            if (!art) return;


            const confirmDelete =
                confirm(
                    'Delete "' +
                    (art.title || "Untitled") +
                    '"?'
                );


            if (!confirmDelete) return;


            userArts.splice(
                index,
                1
            );


            localStorage.setItem(
                "userArts",
                JSON.stringify(userArts)
            );


            closeArtSettings();


            renderArts();


            alert("Art berhasil dihapus.");

        }



        // =================================================
        // CLICK OUTSIDE EDIT MODAL
        // =================================================

        document
            .getElementById("editArtModal")
            .addEventListener(
                "click",
                function(event) {

                    if (event.target === this) {

                        closeEditArt();

                    }

                }
            );



        // =================================================
        // CLICK OUTSIDE SETTINGS
        // =================================================

        document
            .getElementById("artSettingsModal")
            .addEventListener(
                "click",
                function(event) {

                    if (event.target === this) {

                        closeArtSettings();

                    }

                }
            );



        // =================================================
        // CLICK OUTSIDE DETAIL
        // =================================================

        document
            .getElementById("artDetail")
            .addEventListener(
                "click",
                function(event) {

                    if (event.target === this) {

                        closeArtDetail();

                    }

                }
            );



        // =================================================
        // KEYBOARD
        // =================================================

        document.addEventListener(
            "keydown",
            function(event) {

                const detail =
                    document.getElementById("artDetail");


                const editModal =
                    document.getElementById("editArtModal");


                const settingsModal =
                    document.getElementById("artSettingsModal");


                // ESC

                if (event.key === "Escape") {

                    if (
                        !editModal.classList.contains("hidden")
                    ) {

                        closeEditArt();

                        return;

                    }


                    if (
                        !settingsModal.classList.contains("hidden")
                    ) {

                        closeArtSettings();

                        return;

                    }


                    if (
                        !detail.classList.contains("hidden")
                    ) {

                        closeArtDetail();

                        return;

                    }

                }


                // ARROW

                if (
                    !detail.classList.contains("hidden")
                ) {

                    if (event.key === "ArrowRight") {

                        nextArt();

                    }


                    if (event.key === "ArrowLeft") {

                        previousArt();

                    }

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