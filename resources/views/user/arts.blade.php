<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Arts</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .cyan-line {
            width: 100%;
            height: 8px;
            background: #65c4d2;
            margin-bottom: 17px;
        }

        /* CARD ANIMATION */

        .art-card {
            animation: cardIn .45s ease both;
        }

        .art-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(80, 50, 80, .14);
        }

        .art-image {
            transition: transform .45s ease;
        }

        .art-card:hover .art-image {
            transform: scale(1.08);
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* MODAL */

        .modal-backdrop { animation: fadeIn .2s ease; }
        .modal-box { animation: modalIn .3s ease; }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes modalIn {
            from { opacity: 0; transform: translateY(20px) scale(.96); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* SEARCH */

        .search-box { transition: all .25s ease; }

        .search-box:focus {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(101, 196, 210, .22);
        }

        /* BUTTON */

        .sort-btn { transition: all .2s ease; }
        .sort-btn:hover { transform: translateY(-1px); }

        /* SCROLLBAR */

        .modal-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .modal-scroll::-webkit-scrollbar-thumb {
            background: #d9c8d0;
            border-radius: 20px;
        }


        /* =================================================
           ART DETAIL STYLE
        ================================================= */

        .detail-gradient {
            background: linear-gradient(
                90deg,
                #65c4d2 0%,
                #ffd98e 50%,
                #dc5961 100%
            );
        }

        .detail-gradient-bottom {
            background: linear-gradient(
                90deg,
                #dc5961 0%,
                #ffd98e 50%,
                #65c4d2 100%
            );
        }

        .detail-image {
            transition: opacity .2s ease, transform .45s ease;
        }

        .detail-arrow {
            transition: transform .2s ease, background .2s ease, color .2s ease;
        }

        .detail-arrow:hover {
            transform: translateY(-50%) scale(1.12);
        }

        .detail-close {
            transition: all .2s ease;
        }

        .detail-close:hover {
            transform: rotate(90deg);
        }

        .detail-artist {
            transition: all .2s ease;
        }

        .detail-artist:hover {
            color: #72aeb6;
        }

    </style>
</head>


<body class="m-0 bg-white">


    <main class="w-full min-h-screen bg-white
                 border-l-[30px] border-r-[30px]
                 border-[#ce3037] box-border">


        <!-- ================= NAVBAR ================= -->

        <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

            <a href="{{ route('user.home') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Home
            </a>

            <a href="{{ route('user.arts') }}"
               class="bg-[#72ccd2] text-white px-2 py-1 rounded text-xs shadow-sm">
                Arts
            </a>

            <a href="{{ route('user.artist') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Artist
            </a>

            <a href="{{ route('user.category') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Category
            </a>

            <a href="{{ route('user.profile') }}"
               class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
                Profile
            </a>

        </nav>


        <!-- ================= CONTENT ================= -->

        <section class="w-full px-6 md:px-10 lg:px-12 xl:px-14 pb-12">


            <!-- TITLE + SORT -->

            <div class="flex flex-col sm:flex-row sm:items-center
                        sm:justify-between gap-4 mb-6">

                <div>
                    <h1 class="m-0 text-[#ffd98e] text-3xl md:text-4xl font-bold">
                        Arts
                    </h1>
                    <p class="text-[9px] text-gray-400 mt-1">
                        Explore artworks from CreateTopia
                    </p>
                </div>


                <!-- SORT -->

                <div class="flex border border-gray-300 rounded-full
                            overflow-hidden text-[9px] bg-white shadow-sm
                            self-start sm:self-auto">

                    <button id="latestBtn"
                            onclick="sortArts('latest')"
                            class="sort-btn px-5 py-1.5 bg-[#eadff7]
                                   text-gray-700 font-medium
                                   border-r border-gray-300">
                        Latest
                    </button>

                    <button id="oldestBtn"
                            onclick="sortArts('oldest')"
                            class="sort-btn px-5 py-1.5 bg-white
                                   text-gray-500 font-medium">
                        Oldest
                    </button>

                </div>

            </div>


            <!-- CYAN LINE -->

            <div class="cyan-line"></div>


            <!-- ================= SEARCH ================= -->

            <div class="flex justify-center mb-7">

                <div class="relative w-72 md:w-96">

                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                 text-gray-400 text-xs">
                        🔍
                    </span>

                    <input id="searchInput"
                           type="text"
                           placeholder="Search art or artist..."
                           oninput="searchArts()"
                           class="search-box w-full h-8 rounded-full
                                  bg-[#eeeaf1] border border-transparent
                                  focus:border-[#72ccd2] outline-none
                                  pl-9 pr-4 text-[9px]">

                </div>

            </div>


            <!-- ================= RESULT INFO ================= -->

            <div class="flex justify-between items-center mb-4">

                <p id="resultInfo" class="text-[9px] text-gray-400">
                    Showing all artworks
                </p>

            </div>


            <!-- ================= ART GRID ================= -->

            <div id="artsGrid"
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
                        gap-x-5 gap-y-5">
            </div>


            <!-- EMPTY RESULT -->

            <div id="emptyState" class="hidden text-center py-16">

                <div class="text-4xl mb-3">🎨</div>

                <h2 class="text-sm font-bold text-gray-700">
                    Art not found
                </h2>

                <p class="text-[9px] text-gray-400 mt-1">
                    Try another keyword.
                </p>

            </div>

        </section>

    </main>



    <!-- ================================================= -->
    <!-- ART DETAIL MODAL -->
    <!-- ================================================= -->

    <div id="artModal"
         class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm
                modal-backdrop p-4 items-center justify-center">

        <div class="modal-box relative w-full max-w-[1150px]
                    h-[580px] bg-white rounded-xl shadow-2xl overflow-hidden">

            <!-- TOP GRADIENT -->
            <div class="detail-gradient absolute top-0 left-0 w-full
                        h-[20px] z-30"></div>

            <!-- BOTTOM GRADIENT -->
            <div class="detail-gradient-bottom absolute bottom-0 left-0 w-full
                        h-[20px] z-30"></div>


            <div class="w-full h-full flex pt-[20px] pb-[20px]">

                <!-- ================= LEFT (TEXT) ================= -->

                <div class="w-[48%] h-full bg-[#fffaf4] px-8 md:px-12 py-10
                            flex flex-col justify-between relative overflow-hidden">

                    <!-- DECOR -->
                    <div class="absolute w-20 h-20 rounded-full bg-[#ffdd9a]
                                opacity-30 -left-8 -top-8 float-slow"></div>

                    <div class="absolute text-[#72ccd2] text-xl right-8 top-16
                                opacity-40 float-fast">✦</div>


                    <div class="relative z-10">

                        <p class="text-[9px] uppercase tracking-[2px]
                                  text-[#72bfc8] font-medium">
                            Artwork
                        </p>

                        <h2 id="modalArtTitle"
                            class="welcome-font text-[#d84955]
                                   text-3xl md:text-4xl font-bold
                                   mt-3 leading-tight">
                        </h2>

                        <p id="modalArtDescription"
                           class="text-[10px] md:text-[11px] leading-5
                                  text-[#d36c60] mt-6 max-w-[390px]
                                  max-h-[150px] overflow-y-auto">
                        </p>

                        <span id="modalCategory"
                              class="inline-block mt-5 px-4 py-1.5
                                     rounded-full bg-[#e9f7f8]
                                     text-[#62b9c4] text-[8px] font-medium">
                        </span>

                    </div>


                    <!-- BOTTOM INFO -->

                    <div class="relative z-10">

                        <p id="modalArtDate"
                           class="text-[8px] text-[#999999] mb-3">
                        </p>


                        <!-- ARTIST -->

                        <button onclick="openArtistFromArt()"
                                class="flex items-center gap-3 text-left
                                       group hover:translate-x-1 transition">

                            <!-- AVATAR CONTAINER — di-render JS -->
                            <div id="modalArtistAvatar"
                                 class="w-10 h-10 rounded-full overflow-hidden
                                        border-2 border-white shadow-md
                                        group-hover:scale-110 transition
                                        flex items-center justify-center">
                            </div>

                            <div>
                                <p class="text-[8px] text-gray-400">By</p>
                                <p id="modalArtistButton"
                                   class="text-[10px] md:text-[11px]
                                          font-bold text-[#d84955]
                                          group-hover:underline">
                                </p>
                            </div>

                        </button>

                    </div>

                </div>


                <!-- ================= RIGHT (IMAGE) ================= -->

                <div class="w-[52%] h-full bg-[#f5eeee] relative overflow-hidden">

                    <img id="modalArtImage" src="" alt="Artwork"
                         class="detail-image w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-r
                                from-black/5 via-transparent to-black/5
                                pointer-events-none"></div>


                    <!-- CLOSE -->
                    <button onclick="closeArtModal()"
                            class="detail-close absolute z-40 right-4 top-4
                                   w-9 h-9 rounded-full bg-white shadow-md
                                   text-[#d84955] text-lg
                                   hover:bg-[#d84955] hover:text-white
                                   flex items-center justify-center">
                        ×
                    </button>


                    <!-- PREVIOUS -->
                    <button id="modalPrev" onclick="previousArt()"
                            class="detail-arrow hidden absolute left-4 top-1/2
                                   -translate-y-1/2 w-10 h-10 rounded-full
                                   bg-white text-[#d84955] text-lg shadow-lg
                                   hover:bg-[#d84955] hover:text-white
                                   z-20 flex items-center justify-center">
                        ←
                    </button>


                    <!-- NEXT -->
                    <button id="modalNext" onclick="nextArt()"
                            class="detail-arrow hidden absolute right-4 top-1/2
                                   -translate-y-1/2 w-10 h-10 rounded-full
                                   bg-white text-[#d84955] text-lg shadow-lg
                                   hover:bg-[#d84955] hover:text-white
                                   z-20 flex items-center justify-center">
                        →
                    </button>


                    <!-- COUNTER -->
                    <div id="modalCounter"
                         class="absolute bottom-4 right-4 bg-white/90
                                backdrop-blur-sm px-3 py-1 rounded-full
                                text-[8px] text-[#d84955] shadow z-20">
                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- ARTIST MODAL -->
    <!-- ================================================= -->

    <div id="artistModal"
         class="hidden fixed inset-0 z-[60] bg-black/40 backdrop-blur-sm
                modal-backdrop p-4 items-center justify-center">

        <div class="modal-box relative w-full max-w-[500px]
                    max-h-[90vh] overflow-y-auto
                    bg-[#fffaf4] rounded-2xl shadow-2xl p-6">

            <!-- CLOSE -->
            <button onclick="closeArtistModal()"
                    class="absolute right-4 top-4 w-7 h-7 rounded-full
                           bg-white text-gray-600 shadow
                           hover:bg-[#c83232] hover:text-white transition">
                ×
            </button>


            <!-- ARTIST AVATAR — di-render JS -->
            <div class="flex justify-center pt-3">

                <div id="artistModalAvatar"
                     class="w-24 h-24 rounded-full overflow-hidden
                            border-4 border-white shadow-lg
                            flex items-center justify-center">
                </div>

            </div>


            <!-- ARTIST INFO -->
            <div class="text-center mt-4">

                <p class="text-[8px] uppercase tracking-widest
                          text-[#72bfc8] font-bold">
                    Artist
                </p>

                <h2 id="artistModalName"
                    class="text-xl font-bold text-gray-800 mt-1">
                </h2>

                <p id="artistModalBio"
                   class="text-[10px] leading-5 text-gray-500
                          mt-4 max-w-sm mx-auto">
                </p>

            </div>


            <!-- ARTIST WORKS -->
            <div class="mt-7">

                <div class="flex justify-between items-center mb-3">

                    <h3 class="text-xs font-bold text-gray-700">
                        Artworks
                    </h3>

                    <span id="artistArtworkCount"
                          class="text-[8px] text-gray-400">
                    </span>

                </div>

                <div id="artistWorks"
                     class="grid grid-cols-3 gap-2">
                </div>

            </div>

        </div>

    </div>



    <script>

        /* =====================================================
           HELPER: INITIAL AVATAR (nama → inisial + gradient)
        ===================================================== */

        function getInitialAvatar(nama, size = "md") {

            const safeName = (nama || "?").trim();
            const initial = safeName.charAt(0).toUpperCase() || "?";

            const gradients = [
                'linear-gradient(135deg, #62C4DA, #C93638)',
                'linear-gradient(135deg, #FFDE96, #FA855A)',
                'linear-gradient(135deg, #C93638, #62C4DA)',
                'linear-gradient(135deg, #FA855A, #FFDE96)',
                'linear-gradient(135deg, #62C4DA, #FFDE96)'
            ];

            const hash = safeName.split("")
                .reduce((acc, c) => acc + c.charCodeAt(0), 0);

            const bg = gradients[hash % gradients.length];


            /* Size preset */

            const sizes = {
                sm: { w: "w-10 h-10", font: "0.9rem" },
                md: { w: "w-20 h-20", font: "1.5rem" },
                lg: { w: "w-24 h-24", font: "2rem" }
            };

            const s = sizes[size] || sizes.md;


            return `
                <div class="${s.w} rounded-full
                            flex items-center justify-center
                            text-white font-bold
                            border-2 border-white shadow-md"
                     style="background: ${bg}; font-size: ${s.font};">
                    ${initial}
                </div>
            `;
        }



        /* =====================================================
           HELPER: GET ARTIST AVATAR HTML
        ===================================================== */

        function getArtistAvatarHtml(art, size = "sm") {

            /* Foto artist sekarang diambil dari database: art.artistPhoto */

            const photo = art.artistPhoto || "";

            const hasPhoto = photo && photo.trim() !== "";


            /* Artist punya foto → pakai foto */

            if (hasPhoto) {

                const sizes = {
                    sm: "w-10 h-10",
                    md: "w-20 h-20",
                    lg: "w-24 h-24"
                };

                return `
                    <img src="${escapeHtml(photo)}"
                         alt="${escapeHtml(art.artist || '')}"
                         class="${sizes[size]} rounded-full object-cover
                                border-2 border-white shadow-md">
                `;
            }


            /* Selain itu → inisial */

            return getInitialAvatar(art.artist, size);
        }



        /* =================================================
           ART DATA — DARI DATABASE
        =================================================
           Data dikirim oleh ProfileController@arts() lewat
           FrontendData::arts(), jadi di sini TIDAK PERLU
           tahu nama kolom aslinya (judul, file_gambar, ...).

           Bentuk item yang dipakai semua function di bawah:
           {
               id, title, description, image,
               artist, artistId, artistPhoto, category, date
           }

           Kalau nanti butuh ubah bentuk data ini, ubah di
           app/Support/FrontendData.php — bukan di file ini.
        ================================================= */

        const allArts = @json($arts);

        /* Daftar artist untuk openArtist(). Bentuknya OBJECT
           yang key-nya = id artist, jadi cara memakainya:
               artistDirectory[artistId] */
        const artistDirectory = @json($artistDirectory);



        /* =================================================
           STATE
        ================================================= */

        let currentArts = [...allArts];
        let currentSort = "latest";
        let currentArtIndex = 0;



        /* =================================================
           RENDER ARTS
        ================================================= */

        function renderArts(arts) {

            const grid = document.getElementById("artsGrid");
            const empty = document.getElementById("emptyState");
            const resultInfo = document.getElementById("resultInfo");

            grid.innerHTML = "";


            if (arts.length === 0) {
                empty.classList.remove("hidden");
                resultInfo.textContent = "No artworks found";
                return;
            }


            empty.classList.add("hidden");

            resultInfo.textContent =
                `Showing ${arts.length} artwork${arts.length > 1 ? "s" : ""}`;


            arts.forEach((art, index) => {

                const card = document.createElement("button");
                card.type = "button";

                card.onclick = () => openArtModal(index);

                card.className = `
                    art-card w-full text-left flex bg-white
                    border border-gray-300 rounded-md p-2.5
                    min-h-[100px]
                    shadow-[0_2px_2px_rgba(0,0,0,0.20)]
                    transition-all duration-300 overflow-hidden
                `;

                card.style.animationDelay = `${index * 50}ms`;


                card.innerHTML = `

                    <div class="w-[66px] h-[67px] flex-shrink-0
                                overflow-hidden rounded-sm bg-gray-100">

                        <img src="${escapeHtml(art.image)}"
                             class="art-image w-full h-full object-cover"
                             alt="${escapeHtml(art.title)}"
                             onerror="this.src='https://via.placeholder.com/140?text=No+Image'">

                    </div>


                    <div class="ml-3 min-w-0">

                        <div class="flex items-start justify-between gap-2">

                            <h2 class="font-bold text-[12px] leading-tight
                                       text-gray-800">
                                ${escapeHtml(art.title)}
                            </h2>

                            <span class="flex-shrink-0 text-[7px] px-2 py-0.5
                                         rounded-full bg-[#eee7f5] text-[#927ca5]">
                                ${escapeHtml(art.category)}
                            </span>

                        </div>


                        <p class="text-[9px] leading-[12px] text-gray-500
                                  mt-1 line-clamp-2">
                            ${escapeHtml(art.description)}
                        </p>


                        <p class="text-[8px] text-[#c83232] mt-2 font-medium">
                            ${escapeHtml(art.artist)}
                        </p>

                    </div>
                `;

                grid.appendChild(card);
            });
        }



        /* =================================================
           SEARCH
        ================================================= */

        function searchArts() {

            const keyword = document.getElementById("searchInput")
                .value.toLowerCase().trim();


            let filtered = allArts.filter(art =>
                art.title.toLowerCase().includes(keyword) ||
                art.description.toLowerCase().includes(keyword) ||
                art.artist.toLowerCase().includes(keyword) ||
                art.category.toLowerCase().includes(keyword)
            );


            filtered = sortArray(filtered, currentSort);

            currentArts = filtered;
            renderArts(currentArts);
        }



        /* =================================================
           SORT
        ================================================= */

        function sortArts(type) {

            currentSort = type;

            const latestBtn = document.getElementById("latestBtn");
            const oldestBtn = document.getElementById("oldestBtn");


            if (type === "latest") {

                latestBtn.classList.remove("bg-white", "text-gray-500");
                latestBtn.classList.add("bg-[#eadff7]", "text-gray-700");

                oldestBtn.classList.remove("bg-[#eadff7]", "text-gray-700");
                oldestBtn.classList.add("bg-white", "text-gray-500");

            } else {

                oldestBtn.classList.remove("bg-white", "text-gray-500");
                oldestBtn.classList.add("bg-[#eadff7]", "text-gray-700");

                latestBtn.classList.remove("bg-[#eadff7]", "text-gray-700");
                latestBtn.classList.add("bg-white", "text-gray-500");
            }


            const keyword = document.getElementById("searchInput")
                .value.toLowerCase().trim();


            let filtered = allArts.filter(art =>
                art.title.toLowerCase().includes(keyword) ||
                art.description.toLowerCase().includes(keyword) ||
                art.artist.toLowerCase().includes(keyword) ||
                art.category.toLowerCase().includes(keyword)
            );


            currentArts = sortArray(filtered, type);
            renderArts(currentArts);
        }


        function sortArray(array, type) {
            return [...array].sort((a, b) => {
                const dateA = new Date(a.date).getTime();
                const dateB = new Date(b.date).getTime();
                return type === "latest" ? dateB - dateA : dateA - dateB;
            });
        }



        /* =================================================
           ART DETAIL MODAL
        ================================================= */

        function openArtModal(index) {

            if (!currentArts.length) return;

            currentArtIndex = index;

            showCurrentArt();

            const modal = document.getElementById("artModal");

            modal.classList.remove("hidden");
            modal.classList.add("flex");

            document.body.classList.add("overflow-hidden");


            const box = modal.querySelector(".modal-box");
            box.style.animation = "none";
            void box.offsetWidth;
            box.style.animation = "modalIn .3s ease";
        }



        function showCurrentArt() {

            const art = currentArts[currentArtIndex];

            if (!art) return;


            /* IMAGE */

            const img = document.getElementById("modalArtImage");

            img.style.opacity = "0";
            img.style.transform = "scale(1.04)";

            setTimeout(() => {
                img.src = art.image;
                img.alt = art.title;
                img.style.opacity = "1";
                img.style.transform = "scale(1)";
            }, 150);


            /* TEXT */

            document.getElementById("modalArtTitle").textContent = art.title;
            document.getElementById("modalArtDescription").textContent = art.description;
            document.getElementById("modalCategory").textContent = art.category;
            document.getElementById("modalArtistButton").textContent = art.artist;
            document.getElementById("modalArtDate").textContent =
                "Uploaded on " + formatDateTime(art.date);


            /* AVATAR ARTIST — pakai helper */

            document.getElementById("modalArtistAvatar").innerHTML =
                getArtistAvatarHtml(art, "sm");


            /* COUNTER */

            document.getElementById("modalCounter").textContent =
                `${currentArtIndex + 1} / ${currentArts.length}`;


            /* ARROWS */

            const prev = document.getElementById("modalPrev");
            const next = document.getElementById("modalNext");

            if (currentArts.length > 1) {
                prev.classList.remove("hidden");
                next.classList.remove("hidden");
            } else {
                prev.classList.add("hidden");
                next.classList.add("hidden");
            }
        }



        /* =================================================
           CLOSE ART
        ================================================= */

        function closeArtModal() {

            const modal = document.getElementById("artModal");

            modal.classList.add("hidden");
            modal.classList.remove("flex");

            document.body.classList.remove("overflow-hidden");
        }



        /* =================================================
           ARTIST FROM ART
        ================================================= */

        function openArtistFromArt() {

            const art = currentArts[currentArtIndex];
            if (!art) return;

            window.location.href =
                "{{ url('/artist') }}/" + encodeURIComponent(art.artistId);
        }



        /* =================================================
           PREVIOUS / NEXT
        ================================================= */

        function previousArt() {

            if (!currentArts.length) return;

            currentArtIndex--;

            if (currentArtIndex < 0) {
                currentArtIndex = currentArts.length - 1;
            }

            showCurrentArt();
        }


        function nextArt() {

            if (!currentArts.length) return;

            currentArtIndex++;

            if (currentArtIndex >= currentArts.length) {
                currentArtIndex = 0;
            }

            showCurrentArt();
        }



        /* =================================================
           ARTIST MODAL (dari card art → artist)
        ================================================= */

        function openArtist(artistId, artistName) {

            /* artistDirectory diisi dari database (lihat deklarasinya di atas) */

            const artist = artistDirectory[artistId];

            const info = artist || {
                name: artistName || "Unknown Artist",
                bio: "",
                image: ""
            };


            document.getElementById("artistModalName").textContent = info.name;
            document.getElementById("artistModalBio").textContent = info.bio || "";


            /* AVATAR ARTIST MODAL */

            document.getElementById("artistModalAvatar").innerHTML =
                getArtistAvatarHtml({
                    artist: info.name,
                    artistPhoto: info.image || ""
                }, "lg");


            /* WORKS */

            const works = allArts.filter(art =>
                art.artistId === artistId || art.artist === info.name
            );

            const worksContainer = document.getElementById("artistWorks");
            worksContainer.innerHTML = "";

            document.getElementById("artistArtworkCount").textContent =
                `${works.length} artwork${works.length !== 1 ? "s" : ""}`;


            works.forEach(work => {

                const button = document.createElement("button");
                button.type = "button";

                button.className = `
                    group aspect-square rounded-lg overflow-hidden
                    bg-gray-100 hover:ring-2 hover:ring-[#72ccd2] transition
                `;

                button.innerHTML = `
                    <img src="${escapeHtml(work.image)}"
                         class="w-full h-full object-cover
                                group-hover:scale-110 transition duration-500"
                         alt="${escapeHtml(work.title)}"
                         onerror="this.src='https://via.placeholder.com/200?text=No'">
                `;


                button.onclick = () => {

                    closeArtistModal();

                    setTimeout(() => {

                        const index = currentArts.findIndex(a => a.id === work.id);
                        if (index !== -1) openArtModal(index);

                    }, 180);
                };

                worksContainer.appendChild(button);
            });


            const modal = document.getElementById("artistModal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");

            document.body.classList.add("overflow-hidden");
        }


        function closeArtistModal() {

            const modal = document.getElementById("artistModal");
            modal.classList.add("hidden");
            modal.classList.remove("flex");

            document.body.classList.remove("overflow-hidden");
        }



        /* =================================================
           FORMAT DATE
        ================================================= */

        function formatDate(date) {

            const parsed = new Date(date);
            if (isNaN(parsed.getTime())) return "Unknown date";

            return parsed.toLocaleDateString("en-GB", {
                day: "2-digit",
                month: "2-digit",
                year: "numeric"
            });
        }


        function formatDateTime(date) {

            const parsed = new Date(date);
            if (isNaN(parsed.getTime())) return "Unknown date";

            return parsed.toLocaleDateString("en-US", {
                year: "numeric",
                month: "short",
                day: "numeric"
            }) + " at " + parsed.toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit"
            });
        }



        /* =================================================
           ESCAPE HTML
        ================================================= */

        function escapeHtml(text) {

            return String(text ?? "")
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }



        /* =================================================
           EVENT LISTENERS
        ================================================= */

        document.getElementById("artModal")
            .addEventListener("click", function (event) {
                if (event.target === this) closeArtModal();
            });


        document.getElementById("artistModal")
            .addEventListener("click", function (event) {
                if (event.target === this) closeArtistModal();
            });


        document.addEventListener("keydown", function (event) {

            const artModal = document.getElementById("artModal");

            if (event.key === "Escape") {
                closeArtModal();
                closeArtistModal();
            }

            if (!artModal.classList.contains("hidden")) {
                if (event.key === "ArrowRight") nextArt();
                if (event.key === "ArrowLeft")  previousArt();
            }
        });



        /* =================================================
           INITIAL LOAD
        ================================================= */

        currentArts = sortArray(allArts, "latest");

        renderArts(currentArts);

    </script>


</body>

</html>