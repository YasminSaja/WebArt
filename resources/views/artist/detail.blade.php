<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artist - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body { overflow-x: hidden; }


        /* =========================
           ANIMATION
        ========================== */

        .fade-in { animation: fadeIn .6s ease both; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .float { animation: floating 3s ease-in-out infinite; }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-7px); }
        }


        /* =========================
           ART CARD
        ========================== */

        .art-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .art-card:hover {
            transform: translateY(-7px) rotate(-.5deg);
            box-shadow: 0 12px 25px rgba(0,0,0,.12);
        }

        .art-card img { transition: transform .45s ease; }
        .art-card:hover img { transform: scale(1.08); }


        /* =========================
           ARTIST IMAGE
        ========================== */

        .artist-photo {
            transition: transform .4s ease, box-shadow .4s ease;
        }
        .artist-photo:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow:
                0 0 0 7px rgba(255,255,255,.2),
                0 12px 25px rgba(0,0,0,.15);
        }


        /* =========================
           BUTTON
        ========================== */

        button, a {
            transition: transform .2s ease, opacity .2s ease;
        }
        button:hover, a:hover { opacity: .85; }


        /* =========================
           LINE CLAMP
        ========================== */

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>

</head>


<body class="bg-white">


<main class="min-h-screen bg-white
             border-l-[30px] border-r-[30px]
             border-[#ce3037]">

    <!-- ARTIST HERO -->

    <section class="relative bg-[#5bc1d2]
                    min-h-[180px] md:min-h-[205px]
                    px-8 md:px-12 py-7 overflow-hidden">

        <!-- DECORATION -->
        <div class="float absolute right-[35%] top-6
                    text-white opacity-40 text-lg">✦</div>

        <div class="float absolute left-[45%] bottom-5
                    text-white opacity-30 text-sm"
             style="animation-delay:.8s">✿</div>

        <div class="float absolute right-8 bottom-5
                    text-[#ffd98e] opacity-70 text-xl"
             style="animation-delay:1.3s">♡</div>


        <div class="relative z-10 flex items-center
                    justify-between gap-8">

            <!-- ARTIST INFO -->
            <div class="max-w-[620px] fade-in">

                <div class="flex items-center gap-2 mb-2">

                    <span class="text-white text-[8px] bg-white/20
                                 px-2 py-1 rounded-full">
                        ARTIST
                    </span>

                    <span class="text-white text-[8px] opacity-70">
                        CreateTopia
                    </span>

                </div>

                <h1 id="artistName"
                    class="font-serif font-bold text-white
                           text-2xl md:text-3xl">
                    Artist
                </h1>

                <p id="artistUsername"
                   class="text-white text-[9px] opacity-80 mt-1">
                    @artist
                </p>

                <p id="artistBio"
                   class="text-white text-[9px] leading-[13px]
                          mt-3 max-w-[500px]">
                    Artist biography.
                </p>

                <div class="flex gap-2 mt-4">

                    <span id="artCount"
                          class="text-white text-[8px] bg-white/20
                                 rounded-full px-3 py-1">
                        0 artworks
                    </span>

                    <span id="artistCategory"
                          class="text-white text-[8px] bg-white/20
                                 rounded-full px-3 py-1">
                        Artist
                    </span>

                </div>

            </div>


            <!-- ARTIST AVATAR — di-render JS -->

            <div class="flex-shrink-0 mr-1 md:mr-6">

                <div id="artistAvatar"
                     class="artist-photo
                            w-[100px] h-[100px]
                            md:w-[125px] md:h-[125px]
                            rounded-full overflow-hidden
                            border-4 border-white/80
                            shadow-lg
                            bg-white
                            flex items-center justify-center">

                    <!-- Di-render JS -->

                </div>

            </div>

        </div>

    </section>



    <!-- ARTWORK SECTION -->

    <section class="px-6 md:px-10 lg:px-12 py-7 fade-in">

        <!-- TITLE -->
        <div class="flex items-center justify-between gap-4 mb-4">

            <div>
                <h2 class="text-[#ffd98e] text-xl md:text-2xl font-bold">
                    Look at the other Artist
                </h2>
                <p class="text-[8px] text-gray-400 mt-1">
                    Explore artworks created by this artist.
                </p>
            </div>

            <button onclick="goBack()"
                    class="text-[8px] text-[#e05252]
                           border border-[#e05252]
                           rounded-full px-4 py-1.5
                           hover:bg-[#e05252] hover:text-white">
                ← Back
            </button>

        </div>


        <!-- CYAN LINE -->
        <div class="w-full h-[6px] bg-[#65c4d2] mb-5"></div>


        <!-- SEARCH + SORT -->
        <div class="flex flex-col md:flex-row justify-between
                    gap-3 mb-6">

            <input id="searchInput"
                   oninput="renderArts()"
                   type="text"
                   placeholder="Search artwork..."
                   class="w-full md:w-[260px] h-8 rounded-full
                          bg-[#eeeaf1] px-4 text-[8px] outline-none
                          focus:ring-2 focus:ring-[#72ccd2]">

            <div class="flex gap-2">

                <button id="latestBtn"
                        onclick="changeSort('latest')"
                        class="px-4 py-1.5 rounded-full
                               bg-[#eadff7] text-[8px]">
                    Latest
                </button>

                <button id="oldestBtn"
                        onclick="changeSort('oldest')"
                        class="px-4 py-1.5 rounded-full
                               border border-gray-300
                               text-gray-500 text-[8px]">
                    Oldest
                </button>

            </div>

        </div>


        <!-- ARTS GRID -->
        <div id="artsGrid"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3
                    gap-5">
        </div>


        <!-- EMPTY -->
        <div id="emptyState" class="hidden text-center py-14">

            <div class="text-4xl float mb-2">🎨</div>

            <p class="text-xs font-bold text-gray-600">
                No artwork found.
            </p>

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
        <div class="w-full h-full rounded-full
                    flex items-center justify-center
                    text-white font-bold"
             style="background: ${bg}; font-size: 2.5rem;
                    font-family: Georgia, serif;">
            ${initial}
        </div>
    `;
}



/* =====================================================
   HELPER: APAKAH ARTIST = USER LOGIN & PUNYA FOTO?
===================================================== */

function getArtistPhoto(artistName) {

    const myName = localStorage.getItem("profileName") || "";
    const myPhoto = localStorage.getItem("profilePhoto") || "";

    const isMe =
        myName &&
        myName.toLowerCase() === (artistName || "").toLowerCase();

    const hasPhoto = myPhoto && myPhoto.trim() !== "";

    return (isMe && hasPhoto) ? myPhoto : "";
}



/* =====================================================
   ARTIST ID DARI URL
===================================================== */

const artistId = "{{ $id }}";



/* =====================================================
   STATIC ARTISTS
===================================================== */

const staticArtists = {

    leonardo: {
        name: "Leonardo da Vinci",
        username: "@leonardodavinci",
        bio: "Italian Renaissance artist known for some of the most influential artworks in Western art."
    },

    botticelli: {
        name: "Sandro Botticelli",
        username: "@sandrobotticelli",
        bio: "Italian Renaissance painter known for elegant mythological and religious compositions."
    },

    michelangelo: {
        name: "Michelangelo",
        username: "@michelangelo",
        bio: "Italian Renaissance artist, sculptor, painter and architect."
    },

    titian: {
        name: "Titian",
        username: "@titian",
        bio: "Italian Renaissance painter known for his expressive use of color."
    },

    blake: {
        name: "William Blake",
        username: "@williamblake",
        bio: "English poet, painter and printmaker whose work combined art and literature."
    },

    delacroix: {
        name: "Eugène Delacroix",
        username: "@delacroix",
        bio: "French Romantic artist known for dramatic compositions and expressive color."
    },

    bruegel: {
        name: "Pieter Bruegel",
        username: "@pieterbruegel",
        bio: "Dutch Renaissance painter known for detailed landscapes and scenes of everyday life."
    }

};



/* =====================================================
   STATIC ARTS
===================================================== */

const staticArts = [
    { id: 1, title: "Mona Lisa", artistId: "leonardo", artist: "Leonardo da Vinci",
      category: "Traditional", date: "1503-01-01",
      image: "{{ asset('images/arts/mona-lisa.jpg') }}",
      description: "Probably the most famous painting in the world is Leonardo da Vinci's La Gioconda, better known as Mona Lisa." },

    { id: 2, title: "The Birth of Venus", artistId: "botticelli", artist: "Sandro Botticelli",
      category: "Traditional", date: "1485-01-01",
      image: "{{ asset('images/arts/birth-of-venus.jpg') }}",
      description: "Botticelli's famous painting illustrates the myth of the birth of Aphrodite." },

    { id: 3, title: "The Creation Of Adam", artistId: "michelangelo", artist: "Michelangelo",
      category: "Traditional", date: "1512-01-01",
      image: "{{ asset('images/arts/creation-of-adam.jpg') }}",
      description: "Michelangelo's famous fresco from the ceiling of the Sistine Chapel." },

    { id: 4, title: "The Last Supper", artistId: "leonardo", artist: "Leonardo da Vinci",
      category: "Traditional", date: "1498-01-01",
      image: "{{ asset('images/arts/last-supper.jpg') }}",
      description: "Leonardo da Vinci's famous fresco depicting the Last Supper." },

    { id: 5, title: "The Sacred and Profane Love", artistId: "titian", artist: "Titian",
      category: "Traditional", date: "1514-01-01",
      image: "{{ asset('images/arts/sacred-love.jpg') }}",
      description: "A famous Renaissance painting by Titian." },

    { id: 6, title: "The Ancient of Days", artistId: "blake", artist: "William Blake",
      category: "Traditional", date: "1794-01-01",
      image: "{{ asset('images/arts/ancient-days.jpg') }}",
      description: "A popular artwork by William Blake." },

    { id: 7, title: "Liberty Leading the People", artistId: "delacroix", artist: "Eugène Delacroix",
      category: "Traditional", date: "1830-01-01",
      image: "{{ asset('images/arts/liberty-leading.jpg') }}",
      description: "One of the best-known examples of Romantic painting." },

    { id: 8, title: "The Madonna Litta", artistId: "leonardo", artist: "Leonardo da Vinci",
      category: "Traditional", date: "1490-01-01",
      image: "{{ asset('images/arts/madonna-litta.jpg') }}",
      description: "A Renaissance masterpiece associated with Leonardo da Vinci." },

    { id: 9, title: "Landscape with the Fall of Icarus", artistId: "bruegel", artist: "Pieter Bruegel",
      category: "Traditional", date: "1560-01-01",
      image: "{{ asset('images/arts/landscape-icarus.jpg') }}",
      description: "A famous landscape painting by Pieter Bruegel." }
];



/* =====================================================
   LOAD USER ARTS
===================================================== */

let userArts = [];

try {
    userArts = JSON.parse(localStorage.getItem("userArts") || "[]");
    if (!Array.isArray(userArts)) userArts = [];
} catch (e) { userArts = []; }



/* =====================================================
   HELPER: MAKE ARTIST ID
===================================================== */

function makeArtistId(nama) {
    return "user-" + nama
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, "-")
        .replace(/^-|-$/g, "");
}



/* =====================================================
   BUILD ARTIST DATA DARI USER ARTS
===================================================== */

function buildUserArtists() {

    const grouped = {};

    userArts.forEach((art, index) => {

        const creator = art.creator || "Unknown Artist";
        const id = makeArtistId(creator);

        if (!grouped[id]) {
            grouped[id] = {
                name: creator,
                username: "@" + creator.toLowerCase().replace(/\s+/g, ""),
                bio: "CreateTopia artist.",
                arts: []
            };
        }

        grouped[id].arts.push({
            id: "user-" + (art.id !== undefined ? art.id : index),
            title: art.title || "Untitled",
            artistId: id,
            artist: creator,
            category: art.category || "Digital",
            date: art.date || new Date().toISOString(),
            image: art.image || "",
            description: art.description || "No description available."
        });
    });

    return grouped;
}



/* =====================================================
   BUILD ARTIST OBJECT FINAL
===================================================== */

const userArtistMap = buildUserArtists();

let artist = null;
let artistArts = [];


/* 1. Cek di staticArtists dulu */

if (staticArtists[artistId]) {
    artist = staticArtists[artistId];
    artistArts = staticArts.filter(a => a.artistId === artistId);
}

/* 2. Cek di user artist map */
else if (userArtistMap[artistId]) {
    artist = userArtistMap[artistId];
    artistArts = artist.arts;
}



/* =====================================================
   ARTIST NOT FOUND
===================================================== */

if (!artist) {

    document.body.innerHTML = `

        <div class="min-h-screen flex items-center justify-center
                    bg-[#ffdf96]">

            <div class="text-center">

                <div class="text-5xl mb-3">🎨</div>

                <h1 class="font-bold text-lg">
                    Artist tidak ditemukan
                </h1>

                <a href="{{ route('artist') }}"
                   class="inline-block mt-4
                          bg-[#c83232] text-white
                          px-5 py-2 rounded-full text-xs">

                    Back to Artist

                </a>

            </div>

        </div>

    `;

    throw new Error("Artist not found");
}



/* =====================================================
   RENDER ARTIST INFO
===================================================== */

document.getElementById("artistName").textContent = artist.name;
document.getElementById("artistUsername").textContent = artist.username;
document.getElementById("artistBio").textContent = artist.bio;



/* =====================================================
   RENDER AVATAR (foto / inisial)
===================================================== */

function renderAvatar() {

    const avatarBox = document.getElementById("artistAvatar");

    avatarBox.innerHTML = "";
    avatarBox.style.background = "";


    /* Cek: apakah ini user login & punya foto? */

    const photoUrl = getArtistPhoto(artist.name);


    /* Ada foto → tampil foto */

    if (photoUrl && photoUrl.trim() !== "") {

        const img = document.createElement("img");
        img.src = photoUrl;
        img.alt = artist.name;
        img.className = "w-full h-full object-cover";

        img.onerror = function () {
            avatarBox.innerHTML = "";
            avatarBox.innerHTML = getInitialAvatar(artist.name);
        };

        avatarBox.appendChild(img);
        return;
    }


    /* Nggak ada foto → inisial */

    avatarBox.innerHTML = getInitialAvatar(artist.name);
}


renderAvatar();



/* =====================================================
   ART COUNT
===================================================== */

document.getElementById("artCount").textContent =
    `${artistArts.length} artwork${artistArts.length !== 1 ? "s" : ""}`;



/* =====================================================
   STATE
===================================================== */

let currentSort = "latest";



/* =====================================================
   RENDER ARTS
===================================================== */

function renderArts() {

    const grid = document.getElementById("artsGrid");
    const empty = document.getElementById("emptyState");

    const keyword = document.getElementById("searchInput")
        .value.toLowerCase().trim();


    let result = artistArts.filter(art =>
        art.title.toLowerCase().includes(keyword) ||
        art.description.toLowerCase().includes(keyword)
    );


    result.sort((a, b) => {

        const dateA = new Date(a.date).getTime();
        const dateB = new Date(b.date).getTime();

        return currentSort === "latest"
            ? dateB - dateA
            : dateA - dateB;
    });


    grid.innerHTML = "";


    if (!result.length) {
        empty.classList.remove("hidden");
        return;
    }


    empty.classList.add("hidden");


    result.forEach((art, index) => {

        const card = document.createElement("button");
        card.type = "button";

        card.onclick = () => {
            window.location.href =
                "{{ url('/art') }}/" + encodeURIComponent(art.id);
        };


        card.className = `
            art-card fade-in text-left
            bg-white border border-gray-300
            rounded-lg p-2
            shadow-[0_2px_2px_rgba(0,0,0,.12)]
            overflow-hidden
        `;

        card.style.animationDelay = `${index * 70}ms`;


        const imgSrc = art.image && art.image.trim() !== ""
            ? art.image
            : "https://via.placeholder.com/400x300?text=No+Image";


        card.innerHTML = `

            <div class="w-full h-[135px] rounded-md overflow-hidden bg-gray-100">

                <img src="${imgSrc}"
                     alt="${escapeHtml(art.title)}"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">

            </div>


            <div class="px-1 pt-2 pb-1">

                <div class="flex justify-between gap-2">

                    <h3 class="font-bold text-[10px] text-gray-800
                               leading-tight">
                        ${escapeHtml(art.title)}
                    </h3>

                    <span class="flex-shrink-0 text-[6px] px-2 py-1
                                 rounded-full bg-[#eee7f5] text-gray-500">
                        ${escapeHtml(art.category)}
                    </span>

                </div>

                <p class="line-clamp-2 text-[7px] text-gray-400
                          leading-[10px] mt-1">
                    ${escapeHtml(art.description)}
                </p>

            </div>
        `;

        grid.appendChild(card);
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

        latest.className = "px-4 py-1.5 rounded-full bg-[#eadff7] text-[8px]";
        oldest.className = "px-4 py-1.5 rounded-full border border-gray-300 text-gray-500 text-[8px]";

    } else {

        oldest.className = "px-4 py-1.5 rounded-full bg-[#eadff7] text-[8px]";
        latest.className = "px-4 py-1.5 rounded-full border border-gray-300 text-gray-500 text-[8px]";
    }

    renderArts();
}



/* =====================================================
   BACK
===================================================== */

function goBack() {

    if (document.referrer) {
        history.back();
    } else {
        window.location.href = "{{ route('artist') }}";
    }
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
   START
===================================================== */

renderArts();

</script>


</body>

</html>