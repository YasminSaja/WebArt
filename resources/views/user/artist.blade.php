<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Artist</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            font-family: Georgia, serif;
        }

        /* FLOATING DECORATION */

        .float {
            animation: float 4s ease-in-out infinite;
        }

        .float-delay {
            animation: float 5s ease-in-out infinite;
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50%      { transform: translateY(-9px) rotate(5deg); }
        }


        /* CARD ANIMATION */

        .artist-card {
            opacity: 0;
            animation: cardIn .6s ease forwards;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }


        /* IMAGE */

        .artist-image {
            transition: transform .45s ease;
        }

        .artist-card:hover .artist-image {
            transform: scale(1.08) rotate(2deg);
        }


        /* CARD */

        .artist-card {
            transition: transform .3s ease, box-shadow .3s ease;
            cursor: pointer;
        }

        .artist-card:hover {
            transform: translateY(-7px) rotate(-1deg);
            box-shadow: 0 12px 25px rgba(70, 40, 50, .15);
        }

        .artist-card:nth-child(even):hover {
            transform: translateY(-7px) rotate(1deg);
        }


        /* ARROW */

        .arrow-btn {
            transition: all .25s ease;
        }

        .arrow-btn:hover {
            transform: scale(1.12);
        }


        /* SEARCH */

        .search-box {
            transition: all .25s ease;
        }

        .search-box:focus {
            box-shadow: 0 0 0 3px rgba(101, 196, 210, .20);
        }

    </style>

</head>


<body class="m-0 bg-white">


<main class="w-full
             min-h-screen
             bg-white
             border-l-[30px]
             border-r-[30px]
             border-[#ce3037]
             box-border">


    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

        <a href="{{ route('home') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Home
        </a>

        <a href="{{ route('arts') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Arts
        </a>

        <a href="{{ route('artist') }}"
           class="bg-[#72ccd2] text-white px-2 py-1 rounded text-xs
                  hover:opacity-80 transition">
            Artist
        </a>

        <a href="{{ route('category') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Category
        </a>

        <a href="{{ route('user.profile') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Profile
        </a>

    </nav>



    <!-- =========================
         CONTENT
    ========================== -->

    <section class="relative w-full px-6 md:px-10 lg:px-12 xl:px-14
                    pb-14 overflow-hidden">


        <!-- DECORATIONS -->

        <div class="absolute right-[8%] top-3 text-[#72ccd2] text-4xl
                    opacity-50 float">
            ✦
        </div>

        <div class="absolute left-[3%] top-[170px] text-[#ffd98e] text-3xl
                    opacity-60 float-delay">
            ✧
        </div>

        <div class="absolute right-[4%] bottom-[80px] text-[#ce3037] text-2xl
                    opacity-30 float">
            •
        </div>



        <!-- TITLE -->

        <div class="relative mb-4">

            <div class="flex items-center gap-3">

                <h1 class="m-0 text-[#ffd98e] text-3xl md:text-4xl font-bold">
                    Wonderful Artist
                </h1>

                <span class="text-[#72ccd2] text-2xl float">✦</span>

            </div>

            <p class="text-[#9b8589] text-[10px] mt-1">
                Meet the creative minds behind the artworks.
            </p>

        </div>


        <!-- CYAN LINE -->

        <div class="w-full h-2 bg-[#65c4d2] mb-6 rounded-full"></div>



        <!-- SEARCH + SORT -->

        <div class="flex flex-col md:flex-row md:items-center
                    md:justify-between gap-3 mb-7">


            <!-- SEARCH -->

            <div class="relative w-full md:w-[260px]">

                <input id="artistSearch"
                       type="text"
                       placeholder="Search artist..."
                       class="search-box w-full h-[32px] rounded-full
                              border border-[#ded1d1] bg-[#fffaf5]
                              outline-none px-4 pr-9
                              text-[10px] text-[#66545a]">

                <span class="absolute right-3 top-1/2 -translate-y-1/2
                             text-[#72ccd2] text-sm">
                    ⌕
                </span>

            </div>


            <!-- SORT -->

            <div class="flex items-center gap-2">

                <button onclick="sortArtists('newest')"
                        id="newestBtn"
                        class="sort-btn bg-[#72ccd2] text-white
                               px-4 py-2 rounded-full text-[9px]
                               hover:opacity-80 transition">
                    Newest
                </button>

                <button onclick="sortArtists('artworks')"
                        id="artworksBtn"
                        class="sort-btn bg-[#fff4dd] text-[#ca3838]
                               px-4 py-2 rounded-full text-[9px]
                               hover:bg-[#ffd98e] transition">
                    Most Artworks
                </button>

            </div>

        </div>



        <!-- ARTIST CAROUSEL -->

        <div class="relative">

            <!-- LEFT ARROW -->
            <button onclick="previousArtists()"
                    class="arrow-btn absolute left-[-15px] md:left-[-22px]
                           top-1/2 -translate-y-1/2 z-10
                           w-9 h-9 rounded-full bg-[#72ccd2] text-white
                           shadow-md flex items-center justify-center
                           text-lg">
                ‹
            </button>


            <!-- ARTIST GRID -->

            <div id="artistGrid"
                 class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4
                        gap-x-5 gap-y-6">
            </div>


            <!-- RIGHT ARROW -->
            <button onclick="nextArtists()"
                    class="arrow-btn absolute right-[-15px] md:right-[-22px]
                           top-1/2 -translate-y-1/2 z-10
                           w-9 h-9 rounded-full bg-[#72ccd2] text-white
                           shadow-md flex items-center justify-center
                           text-lg">
                ›
            </button>

        </div>



        <!-- EMPTY SEARCH -->

        <div id="emptyArtist" class="hidden text-center py-20">

            <div class="text-4xl mb-3">🎨</div>

            <p class="text-[#9b8589] text-xs">
                Artist tidak ditemukan.
            </p>

        </div>



        <!-- BOTTOM DECORATION -->

        <div class="flex justify-center items-center gap-3 mt-10">

            <div class="w-12 h-[1px] bg-[#72ccd2]"></div>
            <span class="text-[#ffd98e] text-lg">✦</span>
            <div class="w-12 h-[1px] bg-[#72ccd2]"></div>

        </div>


    </section>


</main>



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
        <div class="w-[125px] h-[125px] rounded-full
                    flex items-center justify-center
                    text-white font-bold
                    border-4 border-white shadow-md"
             style="background: ${bg}; font-size: 2.5rem;">
            ${initial}
        </div>
    `;
}



/* =====================================================
   HELPER: GET ARTIST AVATAR (untuk card)
===================================================== */

function getArtistAvatarHtml(artist) {

    const myName = localStorage.getItem("profileName") || "";
    const myPhoto = localStorage.getItem("profilePhoto") || "";

    const isMe =
        myName &&
        myName.toLowerCase() === (artist.name || "").toLowerCase();

    const hasPhoto = myPhoto && myPhoto.trim() !== "";


    /* Artist = user login & punya foto → pakai foto */

    if (isMe && hasPhoto) {
        return `
            <img src="${myPhoto}"
                 alt="${artist.name}"
                 class="artist-image w-[125px] h-[125px]
                        object-cover rounded-full
                        border-4 border-white shadow-md">
        `;
    }


    /* Selain itu → inisial */

    return `
        <div class="artist-image">
            ${getInitialAvatar(artist.name)}
        </div>
    `;
}



/* ==========================================
   STATIC ARTIST DATA
========================================== */

const staticArtistList = [

    {
        id: "leonardo",
        name: "Leonardo da Vinci",
        username: "@leonardodavinci",
        bio: "Italian Renaissance artist known for some of the most influential artworks in Western art.",
        artworks: 3,
        date: "2026-08-01"
    },

    {
        id: "botticelli",
        name: "Sandro Botticelli",
        username: "@sandrobotticelli",
        bio: "Italian Renaissance painter known for elegant mythological and religious compositions.",
        artworks: 1,
        date: "2026-08-05"
    },

    {
        id: "michelangelo",
        name: "Michelangelo",
        username: "@michelangelo",
        bio: "Italian Renaissance artist, sculptor, painter and architect.",
        artworks: 1,
        date: "2026-08-10"
    },

    {
        id: "titian",
        name: "Titian",
        username: "@titian",
        bio: "Italian Renaissance painter known for his expressive use of color.",
        artworks: 1,
        date: "2026-08-12"
    },

    {
        id: "blake",
        name: "William Blake",
        username: "@williamblake",
        bio: "English poet, painter and printmaker whose work combined art and literature.",
        artworks: 1,
        date: "2026-08-15"
    },

    {
        id: "delacroix",
        name: "Eugène Delacroix",
        username: "@delacroix",
        bio: "French Romantic artist known for dramatic compositions and expressive color.",
        artworks: 1,
        date: "2026-08-20"
    },

    {
        id: "bruegel",
        name: "Pieter Bruegel",
        username: "@pieterbruegel",
        bio: "Dutch Renaissance painter known for detailed landscapes and scenes of everyday life.",
        artworks: 1,
        date: "2026-08-22"
    }

];



/* ==========================================
   LOAD USER ARTS → BUILD USER ARTIST LIST
========================================== */

let userArts = [];

try {
    userArts = JSON.parse(localStorage.getItem("userArts") || "[]");
    if (!Array.isArray(userArts)) userArts = [];
} catch (e) { userArts = []; }


const profileName = localStorage.getItem("profileName") || "";


function buildUserArtistList() {

    const grouped = {};

    userArts.forEach(art => {

        const creator =
            art.creator ||
            art.artist ||
            profileName ||
            "Unknown Artist";

        const id =
            "user-" + creator.toLowerCase()
                .replace(/[^a-z0-9]+/g, "-")
                .replace(/^-|-$/g, "");

        if (!grouped[id]) {
            grouped[id] = {
                id: id,
                name: creator,
                username: "@" + creator.toLowerCase()
                    .replace(/\s+/g, ""),
                bio: "CreateTopia artist.",
                artworks: 0,
                date: art.date || new Date().toISOString()
            };
        }

        grouped[id].artworks++;


        /* Update date ke yang paling baru */

        const artDate = new Date(art.date || 0).getTime();
        const curDate = new Date(grouped[id].date || 0).getTime();

        if (artDate > curDate) {
            grouped[id].date = art.date;
        }
    });

    return Object.values(grouped);
}



/* ==========================================
   MERGE STATIC + USER ARTISTS
========================================== */

let artists = [
    ...staticArtistList,
    ...buildUserArtistList()
];



/* ==========================================
   STATE
========================================== */

let currentArtists = [...artists];
let currentStart = 0;
let currentSort = "newest";



/* ==========================================
   VISIBLE COUNT
========================================== */

function getVisibleCount() {

    if (window.innerWidth >= 1024) return 4;
    if (window.innerWidth >= 768)  return 3;
    return 2;
}



/* ==========================================
   RENDER ARTISTS
========================================== */

function renderArtists() {

    const grid = document.getElementById("artistGrid");
    const search = document.getElementById("artistSearch")
        .value.toLowerCase().trim();


    let filtered = artists.filter(artist =>
        artist.name.toLowerCase().includes(search) ||
        artist.username.toLowerCase().includes(search)
    );


    /* SORT */

    if (currentSort === "newest") {
        filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
    }

    if (currentSort === "artworks") {
        filtered.sort((a, b) => b.artworks - a.artworks);
    }


    currentArtists = filtered;


    /* EMPTY */

    if (filtered.length === 0) {
        grid.innerHTML = "";
        document.getElementById("emptyArtist").classList.remove("hidden");
        return;
    }


    document.getElementById("emptyArtist").classList.add("hidden");


    const visibleCount = getVisibleCount();

    if (currentStart >= filtered.length) currentStart = 0;


    let visibleArtists = [];

    for (let i = 0; i < visibleCount; i++) {
        if (filtered.length === 0) break;
        const index = (currentStart + i) % filtered.length;
        visibleArtists.push(filtered[index]);
    }


    grid.innerHTML = "";


    visibleArtists.forEach((artist, index) => {

        const card = document.createElement("a");

        card.href = "{{ url('/artist') }}/" + encodeURIComponent(artist.id);

        card.className =
            "artist-card bg-white border border-[#e2d8d8] rounded-xl p-3 shadow-[0_2px_5px_rgba(0,0,0,0.10)] block";

        card.style.animationDelay = `${index * 0.08}s`;


        /* Avatar: foto atau inisial */

        const avatarHtml = getArtistAvatarHtml(artist);


        card.innerHTML = `

            <!-- AVATAR -->

            <div class="relative w-full h-[145px]
                        flex items-center justify-center
                        overflow-hidden rounded-lg bg-[#fff8ef]">

                ${avatarHtml}

                <span class="absolute top-2 right-2
                             text-[#ffd98e] text-lg">
                    ✦
                </span>

            </div>


            <!-- INFO -->

            <div class="pt-3">

                <div class="flex items-center justify-between gap-2">

                    <h2 class="font-bold text-[12px] leading-tight
                               text-gray-800">
                        ${escapeHtml(artist.name)}
                    </h2>

                    <span class="text-[#72ccd2] text-[10px]">✦</span>

                </div>


                <p class="text-[#72ccd2] text-[8px] mt-1">
                    ${escapeHtml(artist.username)}
                </p>


                <p class="text-[9px] leading-[13px] text-gray-500
                          mt-2 line-clamp-2">
                    ${escapeHtml(artist.bio)}
                </p>


                <div class="flex justify-between items-center
                            mt-3 pt-2 border-t border-[#eee4e4]">

                    <span class="text-[8px] text-[#999]">
                        ${artist.artworks} artworks
                    </span>

                    <span class="text-[9px] text-[#ca3838] font-bold">
                        View profile →
                    </span>

                </div>

            </div>
        `;

        grid.appendChild(card);
    });
}



/* ==========================================
   SORT
========================================== */

function sortArtists(type) {

    currentSort = type;
    currentStart = 0;

    const newestBtn = document.getElementById("newestBtn");
    const artworksBtn = document.getElementById("artworksBtn");


    if (type === "newest") {

        newestBtn.className =
            "sort-btn bg-[#72ccd2] text-white px-4 py-2 rounded-full text-[9px] hover:opacity-80 transition";

        artworksBtn.className =
            "sort-btn bg-[#fff4dd] text-[#ca3838] px-4 py-2 rounded-full text-[9px] hover:bg-[#ffd98e] transition";
    }


    if (type === "artworks") {

        artworksBtn.className =
            "sort-btn bg-[#72ccd2] text-white px-4 py-2 rounded-full text-[9px] hover:opacity-80 transition";

        newestBtn.className =
            "sort-btn bg-[#fff4dd] text-[#ca3838] px-4 py-2 rounded-full text-[9px] hover:bg-[#ffd98e] transition";
    }


    renderArtists();
}



/* ==========================================
   NEXT / PREVIOUS
========================================== */

function nextArtists() {

    if (currentArtists.length === 0) return;

    currentStart++;
    renderArtists();
}


function previousArtists() {

    if (currentArtists.length === 0) return;

    currentStart--;

    if (currentStart < 0) {
        currentStart = currentArtists.length - 1;
    }

    renderArtists();
}



/* ==========================================
   ESCAPE HTML
========================================== */

function escapeHtml(text) {

    return String(text ?? "")
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}



/* ==========================================
   EVENTS
========================================== */

document.getElementById("artistSearch")
    .addEventListener("input", function () {
        currentStart = 0;
        renderArtists();
    });


window.addEventListener("resize", renderArtists);



/* ==========================================
   INITIAL LOAD
========================================== */

renderArtists();

</script>


</body>

</html>