<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Category</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ================================
           CYAN LINE
        ================================= */

        .cyan-line {
            width: 100%;
            height: 8px;
            background: #65c4d2;
        }


        /* ================================
           CARD
        ================================= */

        .art-card {
            animation: cardIn .45s ease both;
            transition: transform .3s ease,
                        box-shadow .3s ease,
                        border-color .3s ease;
        }

        .art-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 30px rgba(80, 50, 80, .15);
            border-color: #72ccd2;
        }

        .art-image {
            transition: transform .45s ease;
        }

        .art-card:hover .art-image {
            transform: scale(1.08);
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }


        /* ================================
           FLOATING
        ================================= */

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-7px); }
        }


        /* ================================
           BUTTON
        ================================= */

        .filter-btn {
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(80, 50, 80, .1);
        }


        /* ================================
           SEARCH
        ================================= */

        .search-box {
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .search-box:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(101, 196, 210, .2);
        }


        /* ================================
           DECORATION
        ================================= */

        .decor {
            position: absolute;
            pointer-events: none;
        }


        /* ================================
           ART DETAIL MODAL
        ================================= */

        .detail-gradient {
            background: linear-gradient(90deg, #65c4d2 0%, #ffd98e 50%, #dc5961 100%);
        }

        .detail-gradient-bottom {
            background: linear-gradient(90deg, #dc5961 0%, #ffd98e 50%, #65c4d2 100%);
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

        .detail-close { transition: all .2s ease; }
        .detail-close:hover { transform: rotate(90deg); }

        .detail-artist { transition: all .2s ease; }
        .detail-artist:hover { color: #72aeb6; }

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

    </style>

</head>


<body class="bg-white">


<main class="w-full min-h-screen bg-white
             border-l-[30px] border-r-[30px]
             border-[#ce3037] box-border">


    <!-- =========================================
         NAVBAR
    ========================================== -->

    <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

        <a href="{{ route('user.home') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Home
        </a>

        <a href="{{ route('user.arts') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Arts
        </a>

        <a href="{{ route('user.artist') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Artist
        </a>

        <a href="{{ route('user.category') }}"
           class="bg-[#72ccd2] text-white px-2 py-1 rounded text-xs shadow-sm">
            Category
        </a>

        <a href="{{ route('user.profile') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Profile
        </a>

    </nav>



    <!-- =========================================
         CONTENT
    ========================================== -->

    <section class="relative w-full px-6 md:px-10 lg:px-12 xl:px-14 pb-12 overflow-hidden">


        <!-- DECORATIONS -->

        <div class="decor floating right-8 top-2 text-[#ffd98e] text-xl">✦</div>

        <div class="decor floating right-20 top-12 text-[#72ccd2] text-sm"
             style="animation-delay:.8s">✿</div>

        <div class="decor floating left-3 top-20 text-[#e05252] text-sm"
             style="animation-delay:1.2s">♡</div>



        <!-- TITLE -->

        <div class="relative mb-5">

            <div class="floating absolute -left-2 -top-3 w-5 h-5
                        rounded-full bg-[#ffd98e] opacity-70"></div>

            <h1 class="relative text-[#ffd98e] text-3xl md:text-4xl font-bold">
                Category
            </h1>

            <p class="text-[9px] text-gray-400 mt-1">
                Explore artworks by their creative category ✦
            </p>

        </div>


        <!-- CYAN LINE -->

        <div class="cyan-line mb-5"></div>



        <!-- =====================================
             SEARCH + SORT
        ====================================== -->

        <div class="flex flex-col lg:flex-row lg:items-center
                    lg:justify-between gap-4 mb-6">


            <!-- SEARCH -->

            <div class="relative w-full lg:w-80">

                <span class="absolute left-4 top-1/2 -translate-y-1/2
                             text-gray-400 text-xs">
                    🔍
                </span>

                <input id="searchInput"
                       type="text"
                       placeholder="Search art or artist..."
                       oninput="updatePage()"
                       class="search-box w-full h-9 rounded-full
                              bg-[#eeeaf1] border border-transparent
                              focus:border-[#72ccd2] outline-none
                              pl-9 pr-4 text-[9px]">

            </div>


            <!-- SORT -->

            <div class="flex items-center gap-2 flex-wrap">

                <span class="text-[9px] text-gray-400">Sort:</span>

                <button id="latestBtn"
                        onclick="changeSort('latest')"
                        class="filter-btn px-4 py-1.5 rounded-full
                               text-[9px] bg-[#eadff7] text-gray-700">
                    Latest
                </button>

                <button id="oldestBtn"
                        onclick="changeSort('oldest')"
                        class="filter-btn px-4 py-1.5 rounded-full
                               text-[9px] bg-white border border-gray-300
                               text-gray-500">
                    Oldest
                </button>

            </div>

        </div>



        <!-- =====================================
             CATEGORY FILTER
        ====================================== -->

        <div class="flex items-center gap-2 flex-wrap mb-6">

            <span class="text-[9px] text-gray-400 mr-1">Category:</span>

            <button id="allBtn"
                    onclick="changeCategory('all')"
                    class="filter-btn px-5 py-1.5 rounded-full
                           text-[9px] bg-[#72ccd2] text-white">
                All
            </button>

            {{-- Tombol kategori di bawah ini dari database ($categories). --}}
            @foreach ($categories ?? [] as $category)
                <button id="categoryBtn{{ $category->id_kategori }}"
                        onclick="changeCategory(@js($category->nama_kategori))"
                        class="filter-btn px-5 py-1.5 rounded-full
                               text-[9px] bg-white border border-gray-300
                               text-gray-500">
                    {{ $category->nama_kategori }}
                </button>
            @endforeach

        </div>



        <!-- RESULT -->

        <div class="flex justify-between items-center mb-4">

            <p id="resultInfo" class="text-[9px] text-gray-400">
                Showing artworks
            </p>

            <span class="text-[#ffd98e] text-sm floating">✦</span>

        </div>



        <!-- ART GRID -->

        <div id="artsGrid"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
                    gap-x-5 gap-y-5">
        </div>



        <!-- EMPTY -->

        <div id="emptyState" class="hidden text-center py-16">

            <div class="text-5xl mb-3 floating">🎨</div>

            <h2 class="text-sm font-bold text-gray-700">
                No artwork found
            </h2>

            <p class="text-[9px] text-gray-400 mt-1">
                Try another category or keyword.
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

            <!-- LEFT (TEXT) -->
            <div class="w-[48%] h-full bg-[#fffaf4] px-8 md:px-12 py-10
                        flex flex-col justify-between relative overflow-hidden">

                <!-- DECOR -->
                <div class="absolute w-20 h-20 rounded-full bg-[#ffdd9a]
                            opacity-30 -left-8 -top-8 floating"></div>

                <div class="absolute text-[#72ccd2] text-xl right-8 top-16
                            opacity-40 floating"
                     style="animation-delay:.6s">✦</div>


                <div class="relative z-10">

                    <p class="text-[9px] uppercase tracking-[2px]
                              text-[#72bfc8] font-medium">
                        Artwork
                    </p>

                    <h2 id="modalArtTitle"
                        class="text-[#d84955] font-serif text-3xl md:text-4xl
                               font-bold mt-3 leading-tight">
                    </h2>

                    <p id="modalArtDescription"
                       class="text-[10px] md:text-[11px] leading-5
                              text-[#d36c60] mt-6 max-w-[390px]
                              max-h-[150px] overflow-y-auto">
                    </p>

                    <span id="modalCategory"
                          class="inline-block mt-5 px-4 py-1.5 rounded-full
                                 bg-[#e9f7f8] text-[#62b9c4]
                                 text-[8px] font-medium">
                    </span>

                </div>


                <!-- BOTTOM INFO -->
                <div class="relative z-10">

                    <p id="modalArtDate"
                       class="text-[8px] text-[#999999] mb-3">
                    </p>


                    <!-- ARTIST -->
                    <button onclick="openArtistFromArt()"
                            class="flex items-center gap-3 text-left group
                                   hover:translate-x-1 transition">

                        <!-- AVATAR — di-render JS -->
                        <div id="modalArtistAvatar"
                             class="w-10 h-10 rounded-full overflow-hidden
                                    border-2 border-white shadow-md
                                    group-hover:scale-110 transition
                                    flex items-center justify-center">
                        </div>

                        <div>
                            <p class="text-[8px] text-gray-400">By</p>
                            <p id="modalArtistButton"
                               class="text-[10px] md:text-[11px] font-bold
                                      text-[#d84955] group-hover:underline">
                            </p>
                        </div>

                    </button>

                </div>

            </div>


            <!-- RIGHT (IMAGE) -->
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



<script>

/* =====================================================
   HELPER: INITIAL AVATAR
===================================================== */

function getInitialAvatar(nama) {

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

    return `
        <div class="w-10 h-10 rounded-full flex items-center justify-center
                    text-white font-bold text-sm
                    border-2 border-white shadow-md"
             style="background: ${bg};">
            ${initial}
        </div>
    `;
}



/* =====================================================
   HELPER: GET ARTIST AVATAR
===================================================== */

function getArtistAvatarHtml(art) {

    /* Foto artist sekarang diambil dari database: art.artistPhoto */

    const photo = art.artistPhoto || "";

    const hasPhoto = photo && photo.trim() !== "";


    /* Artist punya foto → pakai foto */

    if (hasPhoto) {
        return `
            <img src="${escapeHtml(photo)}"
                 alt="${escapeHtml(art.artist || '')}"
                 class="w-10 h-10 rounded-full object-cover
                        border-2 border-white shadow-md">
        `;
    }


    /* Selain itu → inisial */

    return getInitialAvatar(art.artist);
}



/* =====================================================
   ART DATA — DARI DATABASE
=====================================================
   Data dikirim oleh ProfileController@category() lewat
   FrontendData::arts(), jadi di sini TIDAK PERLU tahu
   nama kolom aslinya (judul, file_gambar, ...).

   Bentuk item yang dipakai updatePage() & renderArts():
   {
       id, title, description, image,
       artist, artistId, artistPhoto, category, date
   }

   categoryList dipakai untuk menandai tombol kategori
   mana yang sedang aktif. Tombolnya sendiri sudah
   dirender Blade pakai $categories (lihat di atas).

   Kalau nanti butuh ubah bentuk data ini, ubah di
   app/Support/FrontendData.php — bukan di file ini.
===================================================== */

const allArts = @json($arts);

const categoryList = @json($categoryList);



/* =====================================================
   PAGE STATE
===================================================== */

let currentCategory = "all";
let currentSort = "latest";
let currentArts = [];
let currentArtIndex = 0;



/* =====================================================
   UPDATE PAGE
===================================================== */

function updatePage() {

    const input = document.getElementById("searchInput");
    const keyword = input.value.toLowerCase().trim();


    let filtered = allArts.filter(art => {

        const categoryMatch =
            currentCategory === "all" ||
            art.category === currentCategory;

        const searchMatch =
            art.title.toLowerCase().includes(keyword) ||
            art.description.toLowerCase().includes(keyword) ||
            art.artist.toLowerCase().includes(keyword);

        return categoryMatch && searchMatch;
    });


    /* SORT */

    filtered.sort((a, b) => {

        const dateA = new Date(a.date).getTime();
        const dateB = new Date(b.date).getTime();

        return currentSort === "latest"
            ? dateB - dateA
            : dateA - dateB;
    });


    currentArts = filtered;

    renderArts();
}



/* =====================================================
   RENDER ARTS
===================================================== */

function renderArts() {

    const grid = document.getElementById("artsGrid");
    const empty = document.getElementById("emptyState");
    const result = document.getElementById("resultInfo");

    grid.innerHTML = "";


    if (!currentArts.length) {
        empty.classList.remove("hidden");
        result.textContent = "No artworks found";
        return;
    }


    empty.classList.add("hidden");

    result.textContent =
        `Showing ${currentArts.length} artwork${currentArts.length !== 1 ? "s" : ""}`;


    currentArts.forEach((art, index) => {

        const card = document.createElement("button");
        card.type = "button";

        card.onclick = () => openArtModal(index);

        card.className = `
            art-card w-full text-left flex bg-white
            border border-gray-300 rounded-xl p-3
            min-h-[105px]
            shadow-[0_2px_2px_rgba(0,0,0,0.15)]
            overflow-hidden
        `;

        card.style.animationDelay = `${index * 50}ms`;


        card.innerHTML = `

            <div class="w-[70px] h-[70px] flex-shrink-0 rounded-lg
                        overflow-hidden bg-gray-100">

                <img src="${escapeHtml(art.image)}"
                     class="art-image w-full h-full object-cover"
                     alt="${escapeHtml(art.title)}"
                     onerror="this.src='https://via.placeholder.com/140?text=No+Image'">

            </div>


            <div class="ml-3 min-w-0 flex-1">

                <div class="flex items-start justify-between gap-2">

                    <h2 class="font-bold text-[12px] leading-tight text-gray-800">
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


                <p class="text-[8px] text-[#c83232] mt-2 font-semibold">
                    ${escapeHtml(art.artist)} →
                </p>

            </div>
        `;

        grid.appendChild(card);
    });
}



/* =====================================================
   ART MODAL
===================================================== */

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
        "Uploaded on " + formatDate(art.date);


    /* AVATAR ARTIST — pakai helper */

    document.getElementById("modalArtistAvatar").innerHTML =
        getArtistAvatarHtml(art);


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



/* =====================================================
   CLOSE ART
===================================================== */

function closeArtModal() {

    const modal = document.getElementById("artModal");

    modal.classList.add("hidden");
    modal.classList.remove("flex");

    document.body.classList.remove("overflow-hidden");
}



/* =====================================================
   ARTIST FROM ART
===================================================== */

function openArtistFromArt() {

    const art = currentArts[currentArtIndex];

    if (!art) return;

    window.location.href =
        "{{ url('/artist') }}/" + encodeURIComponent(art.artistId);
}



/* =====================================================
   PREVIOUS / NEXT
===================================================== */

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



/* =====================================================
   CATEGORY
===================================================== */

function changeCategory(category) {

    currentCategory = category;

    setActiveCategoryButton();

    updatePage();
}



function setActiveCategoryButton() {

    /* Tombol "All" */

    const allButton = document.getElementById("allBtn");

    const activeClass = `
        filter-btn px-5 py-1.5 rounded-full text-[9px]
        bg-[#72ccd2] text-white
    `;

    const idleClass = `
        filter-btn px-5 py-1.5 rounded-full text-[9px]
        bg-white border border-gray-300 text-gray-500
    `;

    if (allButton) {
        allButton.className = (currentCategory === "all")
            ? activeClass
            : idleClass;
    }


    /* Tombol kategori dari database */

    (categoryList || []).forEach(category => {

        const button = document.getElementById(
            "categoryBtn" + category.id_kategori
        );

        if (!button) return;

        button.className = (category.nama_kategori === currentCategory)
            ? activeClass
            : idleClass;
    });
}



/* =====================================================
   SORT
===================================================== */

function changeSort(sort) {

    currentSort = sort;

    const latest = document.getElementById("latestBtn");
    const oldest = document.getElementById("oldestBtn");


    if (sort === "latest") {

        latest.className = `
            filter-btn px-4 py-1.5 rounded-full text-[9px]
            bg-[#eadff7] text-gray-700
        `;

        oldest.className = `
            filter-btn px-4 py-1.5 rounded-full text-[9px]
            bg-white border border-gray-300 text-gray-500
        `;

    } else {

        oldest.className = `
            filter-btn px-4 py-1.5 rounded-full text-[9px]
            bg-[#eadff7] text-gray-700
        `;

        latest.className = `
            filter-btn px-4 py-1.5 rounded-full text-[9px]
            bg-white border border-gray-300 text-gray-500
        `;
    }

    updatePage();
}



/* =====================================================
   FORMAT DATE
===================================================== */

function formatDate(date) {

    const parsed = new Date(date);

    if (isNaN(parsed.getTime())) return "Unknown date";

    return parsed.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric"
    });
}



/* =====================================================
   ESCAPE HTML
===================================================== */

function escapeHtml(text) {

    return String(text)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}



/* =====================================================
   EVENTS
===================================================== */

document.getElementById("artModal")
    .addEventListener("click", function (event) {
        if (event.target === this) closeArtModal();
    });


document.addEventListener("keydown", function (event) {

    const artModal = document.getElementById("artModal");

    if (event.key === "Escape") closeArtModal();

    if (!artModal.classList.contains("hidden")) {
        if (event.key === "ArrowRight") nextArt();
        if (event.key === "ArrowLeft")  previousArt();
    }
});



/* =====================================================
   INIT
===================================================== */

changeCategory("all");
changeSort("latest");

</script>


</body>

</html>