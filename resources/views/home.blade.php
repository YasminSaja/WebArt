<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateTopia - Home</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        .pixel-font {
            font-family: "Courier New", monospace;
        }

        .welcome-font {
            font-family: Georgia, serif;
        }

        /* =========================
           FLOATING
        ========================= */

        .float-slow {
            animation: floatSlow 5s ease-in-out infinite;
        }

        .float-fast {
            animation: floatFast 3.5s ease-in-out infinite;
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-10px); }
        }

        @keyframes floatFast {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50%      { transform: translateY(-7px) rotate(5deg); }
        }

        /* =========================
           SECTION
        ========================= */

        .section-card {
            animation: sectionIn .6s ease both;
        }

        @keyframes sectionIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* =========================
           ART CARD
        ========================= */

        .art-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .art-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 28px rgba(91, 68, 91, .15);
        }

        .art-card img {
            transition: transform .5s ease;
        }

        .art-card:hover img {
            transform: scale(1.08);
        }

        /* =========================
           ARTIST CARD
        ========================= */

        .artist-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .artist-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 30px rgba(91, 68, 91, .15);
        }

        .artist-photo {
            transition: transform .4s ease;
        }

        .artist-card:hover .artist-photo {
            transform: scale(1.07);
        }

        /* =========================
           DETAIL
        ========================= */

        .detail-image {
            transition: opacity .2s ease, transform .45s ease;
        }

        .detail-arrow {
            transition: transform .2s ease, background .2s ease, color .2s ease;
        }

        .detail-arrow:hover {
            transform: translateY(-50%) scale(1.12);
        }

        /* =========================
           MODAL
        ========================= */

        .modal-bg {
            animation: modalFade .2s ease;
        }

        .modal-box {
            animation: modalPop .3s ease;
        }

        @keyframes modalFade {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: translateY(20px) scale(.96);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =========================
           CYAN LINE
        ========================= */

        .cyan-line {
            width: 100%;
            height: 7px;
            background: #65c4d2;
            border-radius: 999px;
        }

        /* =========================
           CAROUSEL
        ========================= */

        .carousel-track {
            transition: transform .45s ease;
        }

        /* =========================
           DECORATION
        ========================= */

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ffd98e;
        }

        .circle-decoration {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 4px solid #72ccd2;
        }

        /* =========================
           AVATAR INITIAL
        ========================= */

        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-family: Georgia, serif;
        }

        /* =========================
           MOBILE DETAIL
        ========================= */

        @media (max-width: 767px) {
            .detail-modal-box {
                height: 90vh;
            }
        }

    </style>

</head>


<body class="m-0 w-full bg-white">


<div class="w-full min-h-screen bg-white
            border-l-[29px] border-r-[29px]
            border-[#ce3037] box-border overflow-hidden">


    <!-- =================================================
         NAVBAR
    ================================================= -->

    <nav class="w-full flex justify-center items-center gap-4 pt-10 pb-5">

        <a href="{{ route('home') }}"
           class="bg-[#72ccd2] text-white px-2 py-1 rounded text-xs
                  hover:opacity-80 transition">
            Home
        </a>

        <a href="{{ route('arts') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Arts
        </a>

        <a href="{{ route('artist') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Artist
        </a>

        <a href="{{ route('category') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Category
        </a>

        <a href="{{ route('login') }}"
           class="text-[#e05252] text-xs hover:text-[#72ccd2] transition">
            Log in
        </a>

    </nav>


    <!-- =================================================
         BANNER
    ================================================= -->

    <div class="relative">

        <div class="absolute left-[8%] -top-4 dot float-fast opacity-80"></div>

        <div class="absolute right-[9%] -top-5 circle-decoration
                    float-slow opacity-70"></div>

        <a href="{{ route('home') }}"
           class="block w-[80%] mx-auto h-[220px] bg-[#ffdd9a]
                  rounded-xl shadow-[0_10px_10px_rgba(0,0,0,0.25)]
                  overflow-hidden
                  hover:scale-[1.01]
                  hover:shadow-[0_15px_25px_rgba(0,0,0,0.18)]
                  transition duration-300">

            <img src="{{ asset('images/createtopia-banner.png') }}"
                 alt="CreateTopia"
                 class="w-full h-full object-contain">

        </a>

    </div>


    <!-- =================================================
         WELCOME
    ================================================= -->

    <section class="w-full text-center mt-10 px-6 section-card">

        <h1 class="welcome-font text-[#55bfd0] text-3xl md:text-4xl
                   font-bold drop-shadow-[1px_1px_0px_#f0b2a5]">
            Welcome To CreateTopia
        </h1>

        <p class="pixel-font text-[#62c9dc] text-sm leading-7
                  tracking-[3px] max-w-3xl mx-auto mt-4">
            A little space for artists,
            artworks, ideas and imagination.
        </p>

    </section>


    <!-- =================================================
         NEWEST ARTS
    ================================================= -->

    <section class="relative mt-12 px-6 md:px-12 lg:px-16 pb-10 section-card">

        <div class="absolute right-[8%] top-0 text-2xl
                    float-slow opacity-50">
            ✦
        </div>

        <div class="flex items-center justify-between mb-4">

            <div>

                <h2 class="text-[#ffd98e] text-2xl font-bold">
                    Newest Arts
                </h2>

                <p class="text-[9px] text-gray-400 mt-1">
                    Freshly added artworks from CreateTopia
                </p>

            </div>

            <a href="{{ route('arts') }}"
               class="text-[9px] text-[#c83232]
                      hover:text-[#72ccd2] hover:underline transition">
                See all →
            </a>

        </div>

        <div class="cyan-line mb-6"></div>


        <div id="newestArts"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            @forelse($newestArts as $index => $art)

                <button type="button"
                        onclick="openArtModal({{ $index }})"
                        class="art-card text-left bg-white
                               border border-gray-200 rounded-xl
                               overflow-hidden
                               shadow-[0_3px_8px_rgba(0,0,0,.10)]
                               group">

                    <div class="h-[145px] overflow-hidden
                                bg-[#f5eeee] relative">

                        <img src="{{ asset('storage/' . $art->file_gambar) }}"
                             alt="{{ $art->judul }}"
                             class="w-full h-full object-cover">

                        <span class="absolute top-3 right-3 text-[7px]
                                     px-2 py-1 rounded-full bg-white/90
                                     text-[#c83232] font-bold">

                            {{ $art->kategori->nama_kategori ?? 'Uncategorized' }}

                        </span>

                    </div>


                    <div class="p-3">

                        <h3 class="text-[11px] font-bold
                                   text-gray-800 truncate">

                            {{ $art->judul }}

                        </h3>

                        <p class="text-[8px] text-gray-400 mt-1 truncate">

                            {{ $art->user->name ?? 'Unknown Artist' }}

                        </p>

                        <div class="flex justify-between items-center mt-3">

                            <span class="text-[7px] text-gray-400">

                                {{ $art->created_at->format('M d, Y') }}

                            </span>

                            <span class="text-[#72ccd2] text-xs
                                         group-hover:translate-x-1 transition">
                                →
                            </span>

                        </div>

                    </div>

                </button>

            @empty

                <div class="col-span-full text-center py-10">

                    <p class="text-[10px] text-gray-400">
                        No artworks yet.
                    </p>

                </div>

            @endforelse

        </div>

    </section>


    <!-- =================================================
         MOST UPLOADED ARTISTS
    ================================================= -->

    <section class="relative mt-2 px-6 md:px-12 lg:px-16
                    pb-16 section-card">

        <div class="absolute left-[5%] top-5 text-xl
                    text-[#ffd98e] opacity-60 float-fast">
            ✿
        </div>

        <div class="flex items-center justify-between mb-4">

            <div>

                <h2 class="text-[#ffd98e] text-2xl font-bold">
                    Most Uploaded Artists
                </h2>

                <p class="text-[9px] text-gray-400 mt-1">
                    Artists with the most artworks
                </p>

            </div>

            <div class="flex gap-2">

                <button onclick="previousArtist()"
                        class="w-7 h-7 rounded-full border
                               border-[#72ccd2]
                               text-[#72ccd2] bg-white
                               hover:bg-[#72ccd2]
                               hover:text-white
                               hover:scale-110 transition">

                    ←

                </button>

                <button onclick="nextArtist()"
                        class="w-7 h-7 rounded-full
                               bg-[#72ccd2] text-white
                               hover:bg-[#c83232]
                               hover:scale-110 transition">

                    →

                </button>

            </div>

        </div>

        <div class="cyan-line mb-6"></div>


        <div class="overflow-hidden rounded-xl">

            <div id="artistTrack"
                 class="carousel-track flex gap-5">

                @forelse($artists as $artist)

                    <a href="{{ url('/artist') }}/{{ $artist->id_user }}"
                       class="artist-card flex-shrink-0
                              w-[220px] md:w-[260px]
                              bg-[#fffaf4]
                              border border-gray-200
                              rounded-2xl p-5 text-center
                              shadow-[0_3px_8px_rgba(0,0,0,.08)]
                              block relative overflow-hidden group">


                        <!-- BACK DECORATION -->

                        <div class="absolute -right-8 -top-8
                                    w-24 h-24 rounded-full
                                    bg-[#ffdd9a] opacity-40
                                    group-hover:scale-125
                                    transition duration-500">
                        </div>

                        <div class="absolute -left-5 bottom-4
                                    w-10 h-10 rounded-full
                                    border-4 border-[#72ccd2]
                                    opacity-30
                                    group-hover:rotate-45
                                    transition duration-500">
                        </div>


                        <!-- PHOTO -->

                        <div class="relative flex justify-center z-10">

                            <div class="absolute w-24 h-24 rounded-full
                                        bg-[#72ccd2] opacity-20
                                        group-hover:scale-110
                                        transition duration-500">
                            </div>


                            @if($artist->profile_photo)

                                <img src="{{ asset('storage/' . $artist->profile_photo) }}"
                                     alt="{{ $artist->name }}"
                                     class="artist-photo relative
                                            w-20 h-20 rounded-full
                                            object-cover
                                            border-4 border-white
                                            shadow-md">

                            @else

                                <div class="artist-photo relative
                                            w-20 h-20 rounded-full
                                            border-4 border-white
                                            shadow-md
                                            avatar-initial"
                                     style="background:
                                     linear-gradient(135deg,
                                     #62C4DA, #C93638);">

                                    {{ strtoupper(substr($artist->name, 0, 1)) }}

                                </div>

                            @endif

                        </div>


                        <!-- NAME -->

                        <h3 class="relative z-10
                                   text-sm font-bold text-gray-800
                                   mt-4 group-hover:text-[#c83232]
                                   transition">

                            {{ $artist->name }}

                        </h3>




                        <!-- COUNT -->

                        <div class="relative z-10 inline-flex mt-3
                                    px-3 py-1 rounded-full
                                    bg-[#e9f7f8]
                                    text-[#5eb5bf]
                                    text-[8px] font-bold
                                    group-hover:bg-[#72ccd2]
                                    group-hover:text-white transition">

                            {{ $artist->karyas_count }}

                            artwork{{ $artist->karyas_count != 1 ? 's' : '' }}

                        </div>


                        <!-- BIO -->

                        <p class="relative z-10
                                  text-[8px] text-gray-400
                                  leading-4 mt-3 line-clamp-2">

                            {{ $artist->bio ?? 'CreateTopia artist.' }}

                        </p>


                        <!-- VIEW -->

                        <div class="relative z-10 mt-4
                                    text-[8px] font-bold
                                    text-[#72ccd2]
                                    group-hover:text-[#c83232]
                                    group-hover:translate-x-1 transition">

                            View Artist →

                        </div>

                    </a>

                @empty

                    <p class="text-[10px] text-gray-400 py-10">
                        No artists yet.
                    </p>

                @endforelse

            </div>

        </div>

    </section>

</div>


<!-- =====================================================
     ART DETAIL MODAL
===================================================== -->

<div id="artModal"
     class="hidden fixed inset-0 z-50 bg-black/50
            backdrop-blur-sm p-3 md:p-6
            items-center justify-center modal-bg">

    <div class="detail-modal-box relative w-full max-w-[1150px]
                h-[90vh] md:h-[620px] bg-white rounded-xl
                overflow-hidden shadow-2xl modal-box">


        <!-- TOP -->

        <div class="absolute top-0 left-0 w-full h-[20px]
                    bg-gradient-to-r from-[#72ccd2]
                    via-[#ffdd9a] to-[#ce3037]
                    z-30">
        </div>


        <!-- BOTTOM -->

        <div class="absolute bottom-0 left-0 w-full h-[20px]
                    bg-gradient-to-r from-[#ce3037]
                    via-[#ffdd9a] to-[#72ccd2]
                    z-30">
        </div>


        <!-- CLOSE -->

        <button onclick="closeArtModal()"
                class="absolute z-40 right-5 top-7
                       w-9 h-9 rounded-full
                       bg-white shadow-md
                       text-[#d84955] text-lg
                       hover:bg-[#d84955]
                       hover:text-white
                       hover:scale-110 transition">

            ×

        </button>


        <div class="w-full h-full flex flex-col md:flex-row
                    pt-[20px] pb-[20px]">


            <!-- LEFT -->

            <div class="w-full md:w-[48%] h-[55%] md:h-full
                        bg-[#fffaf4] p-7 md:p-12
                        flex flex-col justify-between
                        relative overflow-hidden">


                <div class="absolute w-24 h-24 rounded-full
                            bg-[#ffdd9a] opacity-30
                            -left-10 -top-10 float-slow">
                </div>

                <div class="absolute text-[#72ccd2]
                            text-xl right-8 top-16
                            opacity-40 float-fast">
                    ✦
                </div>


                <div class="relative z-10">

                    <p class="text-[9px] uppercase tracking-[2px]
                              text-[#72bfc8] font-medium">
                        Artwork
                    </p>

                    <h2 id="modalTitle"
                        class="welcome-font text-[#d84955]
                               text-3xl md:text-4xl
                               font-bold mt-3 leading-tight">
                    </h2>

                    <p id="modalDescription"
                       class="text-[10px] md:text-[11px]
                              leading-5 text-[#d36c60]
                              mt-6 max-w-[390px]
                              max-h-[150px] overflow-y-auto">
                    </p>

                    <span id="modalCategory"
                          class="inline-block mt-5 px-4 py-1.5
                                 rounded-full bg-[#e9f7f8]
                                 text-[#62b9c4]
                                 text-[8px] font-medium">
                    </span>

                </div>


                <!-- ARTIST -->

                <div class="relative z-10">

                    <p id="modalDate"
                       class="text-[8px] text-[#999999] mb-3">
                    </p>

                    <button onclick="openArtistFromArt()"
                            class="flex items-center gap-3
                                   text-left group
                                   hover:translate-x-1 transition">

                        <div id="modalArtistAvatar"
                             class="w-10 h-10 rounded-full
                                    overflow-hidden
                                    border-2 border-white
                                    shadow-md
                                    group-hover:scale-110
                                    transition
                                    flex items-center justify-center">
                        </div>

                        <div>

                            <p class="text-[8px] text-gray-400">
                                By
                            </p>

                            <p id="modalArtist"
                               class="text-[10px] md:text-[11px]
                                      font-bold text-[#d84955]
                                      group-hover:underline">
                            </p>

                        </div>

                    </button>

                </div>

            </div>


            <!-- RIGHT -->

            <div class="w-full md:w-[52%] h-[45%] md:h-full
                        bg-[#f5eeee] relative overflow-hidden">

                <img id="modalImage"
                     src=""
                     alt="Artwork"
                     class="detail-image w-full h-full object-cover">


                <div class="absolute inset-0
                            bg-gradient-to-r from-black/5
                            via-transparent to-black/5
                            pointer-events-none">
                </div>


                <!-- PREVIOUS -->

                <button id="modalPrev"
                        onclick="previousModalArt()"
                        class="detail-arrow hidden
                               absolute left-4 top-1/2
                               -translate-y-1/2
                               w-11 h-11 rounded-full
                               bg-white text-[#d84955]
                               text-xl shadow-lg
                               hover:bg-[#d84955]
                               hover:text-white z-20">

                    ←

                </button>


                <!-- NEXT -->

                <button id="modalNext"
                        onclick="nextModalArt()"
                        class="detail-arrow hidden
                               absolute right-4 top-1/2
                               -translate-y-1/2
                               w-11 h-11 rounded-full
                               bg-white text-[#d84955]
                               text-xl shadow-lg
                               hover:bg-[#d84955]
                               hover:text-white z-20">

                    →

                </button>


                <!-- COUNTER -->

                <div id="modalCounter"
                     class="absolute bottom-5 right-5
                            bg-white/90 backdrop-blur-sm
                            px-3 py-1 rounded-full
                            text-[8px] text-[#d84955]
                            shadow">
                </div>

            </div>

        </div>

    </div>

</div>


<script>

/* =====================================================
   DATA DARI DATABASE
=====================================================
   $artsData dikirim oleh HomeController@index() lewat
   FrontendData::arts(), jadi di sini TIDAK PERLU tahu
   nama kolom aslinya (judul, file_gambar, ...).

   Bentuk tiap item:
   { id, title, description, image,
     artist, artistId, artistPhoto, category, date }

   PENTING: urutan item harus sama dengan $arts (model),
   karena index kartu yang ditulis di Blade
   (openArtModal dengan nomor urut) dipakai untuk membuka
   modal karya yang sama.
===================================================== */

const arts = @json($artsData);


/* =====================================================
   STATE
===================================================== */

let currentModalIndex = 0;
let currentModalArt = null;
let currentArtistIndex = 0;


/* =====================================================
   ARTIST CAROUSEL
===================================================== */

const artistTrack =
    document.getElementById("artistTrack");

const artistCount =
    {{ $artists->count() }};


function updateArtistCarousel() {

    const cardWidth =
        window.innerWidth >= 768 ? 280 : 240;

    const maxIndex =
        Math.max(0, artistCount - 1);

    if (currentArtistIndex > maxIndex) {
        currentArtistIndex = maxIndex;
    }

    artistTrack.style.transform =
        `translateX(-${currentArtistIndex * cardWidth}px)`;
}


function nextArtist() {

    if (!artistCount) return;

    currentArtistIndex =
        currentArtistIndex < artistCount - 1
            ? currentArtistIndex + 1
            : 0;

    updateArtistCarousel();
}


function previousArtist() {

    if (!artistCount) return;

    currentArtistIndex =
        currentArtistIndex > 0
            ? currentArtistIndex - 1
            : artistCount - 1;

    updateArtistCarousel();
}


/* =====================================================
   OPEN ART MODAL
===================================================== */

function openArtModal(index) {

    if (!arts.length) return;

    currentModalIndex = index;

    currentModalArt =
        arts[currentModalIndex];

    updateArtModal();

    const modal =
        document.getElementById("artModal");

    modal.classList.remove("hidden");
    modal.classList.add("flex");

    document.body.classList.add("overflow-hidden");
}


/* =====================================================
   UPDATE MODAL
===================================================== */

function updateArtModal() {

    if (!currentModalArt) return;

    const art = currentModalArt;


    document.getElementById("modalImage").src =
        art.image || "";


    document.getElementById("modalTitle")
        .textContent = art.title;


    document.getElementById("modalDescription")
        .textContent = art.description;


    document.getElementById("modalCategory")
        .textContent = art.category;


    document.getElementById("modalArtist")
        .textContent = art.artist;


    document.getElementById("modalDate")
        .textContent =
        "Uploaded on " + formatDateTime(art.date);


    /* AVATAR */

    const avatar =
        document.getElementById("modalArtistAvatar");


    if (art.artistPhoto) {

        avatar.innerHTML = `
            <img src="${escapeHtml(art.artistPhoto)}"
                 alt="${escapeHtml(art.artist)}"
                 class="w-full h-full object-cover">
        `;

    } else {

        const initial =
            (art.artist || "?")
                .charAt(0)
                .toUpperCase();

        avatar.innerHTML = `
            <div class="w-full h-full avatar-initial"
                 style="background:
                 linear-gradient(135deg,
                 #62C4DA, #C93638);">
                ${escapeHtml(initial)}
            </div>
        `;
    }


    /* COUNTER */

    document.getElementById("modalCounter")
        .textContent =
        `${currentModalIndex + 1} / ${arts.length}`;


    /* ARROWS */

    const prev =
        document.getElementById("modalPrev");

    const next =
        document.getElementById("modalNext");


    if (arts.length > 1) {

        prev.classList.remove("hidden");
        next.classList.remove("hidden");

    } else {

        prev.classList.add("hidden");
        next.classList.add("hidden");

    }
}


/* =====================================================
   ART → ARTIST
===================================================== */

function openArtistFromArt() {

    if (!currentModalArt) return;

    if (!currentModalArt.artistId) return;

    window.location.href =
        "{{ url('/artist') }}/" +
        encodeURIComponent(
            currentModalArt.artistId
        );
}


/* =====================================================
   NEXT ART
===================================================== */

function nextModalArt() {

    if (arts.length <= 1) return;

    currentModalIndex++;

    if (currentModalIndex >= arts.length) {
        currentModalIndex = 0;
    }

    currentModalArt =
        arts[currentModalIndex];

    animateModalChange();
}


/* =====================================================
   PREVIOUS ART
===================================================== */

function previousModalArt() {

    if (arts.length <= 1) return;

    currentModalIndex--;

    if (currentModalIndex < 0) {
        currentModalIndex = arts.length - 1;
    }

    currentModalArt =
        arts[currentModalIndex];

    animateModalChange();
}


/* =====================================================
   MODAL ANIMATION
===================================================== */

function animateModalChange() {

    const image =
        document.getElementById("modalImage");

    image.style.opacity = "0";
    image.style.transform = "scale(1.04)";


    setTimeout(() => {

        updateArtModal();

        image.style.opacity = "1";
        image.style.transform = "scale(1)";

    }, 150);
}


/* =====================================================
   CLOSE MODAL
===================================================== */

function closeArtModal() {

    const modal =
        document.getElementById("artModal");

    modal.classList.add("hidden");
    modal.classList.remove("flex");

    document.body.classList.remove("overflow-hidden");

    currentModalArt = null;
}


/* =====================================================
   DATE FORMAT
===================================================== */

function formatDateTime(date) {

    const parsed =
        new Date(date);

    if (isNaN(parsed.getTime())) {
        return "Unknown date";
    }

    return parsed.toLocaleDateString(
        "en-US",
        {
            year: "numeric",
            month: "short",
            day: "numeric"
        }
    ) + " at " +
    parsed.toLocaleTimeString(
        "en-US",
        {
            hour: "2-digit",
            minute: "2-digit"
        }
    );
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
   EVENT LISTENERS
===================================================== */

document.getElementById("artModal")
    .addEventListener("click", function (e) {

        if (e.target === this) {
            closeArtModal();
        }

    });


document.addEventListener("keydown", function (e) {

    if (e.key === "Escape") {
        closeArtModal();
    }

    const modal =
        document.getElementById("artModal");

    if (!modal.classList.contains("hidden")) {

        if (e.key === "ArrowRight") {
            nextModalArt();
        }

        if (e.key === "ArrowLeft") {
            previousModalArt();
        }

    }

});


window.addEventListener(
    "resize",
    updateArtistCarousel
);


/* =====================================================
   START
===================================================== */

updateArtistCarousel();

</script>


</body>
</html>