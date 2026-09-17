<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateTopia Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --honeydew: #F6FFEA;
            --soft-peach: #FFDE96;
            --coral-glow: #FA855A;
            --tomato-jam: #C93638;
            --sky-blue: #62C4DA;
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: var(--sky-blue) var(--honeydew);
        }

        body {
            font-family: Georgia, "Times New Roman", serif;
            background: var(--honeydew);
            color: #2a1a1c;
        }

        .sans { font-family: Arial, Helvetica, sans-serif; }

        .glass {
            background: rgba(246, 255, 234, 0.92);
            backdrop-filter: blur(14px);
        }

        .card-hover { transition: all .25s ease; }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(201, 54, 56, .18);
        }

        .modal { animation: fadeIn .2s ease; }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(.97); }
            to   { opacity: 1; transform: scale(1); }
        }

        .sidebar-link { transition: all .25s ease; }
        .sidebar-link:hover {
            transform: translateX(4px);
            background: rgba(98, 196, 218, .15);
        }

        .floating { animation: floating 3.5s ease-in-out infinite; }
        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50%      { transform: translateY(-8px) rotate(5deg); }
        }

        .badge-pulse {
            animation: badgePulse 2s ease-in-out infinite;
        }
        @keyframes badgePulse {
            0%, 100% { transform: scale(1); }
            50%      { transform: scale(1.12); }
        }
    </style>
</head>

<body class="min-h-screen">


<!-- BACKGROUND -->

<div class="fixed inset-0 -z-10 overflow-hidden bg-[#F6FFEA]">
    <div class="absolute -top-40 -left-40 w-[500px] h-[500px]
                rounded-full bg-[#62C4DA]/25 blur-3xl"></div>
    <div class="absolute top-1/3 -right-40 w-[500px] h-[500px]
                rounded-full bg-[#FA855A]/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/3 w-[450px] h-[450px]
                rounded-full bg-[#FFDE96]/50 blur-3xl"></div>
</div>



<!-- SIDEBAR -->

<aside class="fixed left-0 top-0 h-screen w-64 bg-[#C93638] text-[#F6FFEA]
              flex flex-col z-40 shadow-2xl">

    <div class="px-7 pt-8 pb-8">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-[#F6FFEA]
                        flex items-center justify-center
                        text-[#62C4DA] text-2xl floating">✦</div>
            <div>
                <h1 class="text-2xl font-bold text-[#F6FFEA]">CreateTopia</h1>
                <p class="sans text-[10px] uppercase tracking-[3px]
                          text-[#FFDE96]">Admin</p>
            </div>
        </div>
    </div>


    <nav class="px-4 space-y-2 flex-1">

        <button onclick="showPage('dashboard')" id="dashboardBtn"
                class="menu-btn sidebar-link w-full flex items-center gap-4
                       px-4 py-3 rounded-2xl bg-[#62C4DA] text-white">
            <span class="text-xl">⌂</span>
            <span class="sans text-sm font-semibold">Dashboard</span>
        </button>

        <button onclick="showPage('arts')" id="artsBtn"
                class="menu-btn sidebar-link w-full flex items-center gap-4
                       px-4 py-3 rounded-2xl text-[#F6FFEA]
                       hover:bg-[#62C4DA]/20">
            <span class="text-xl">▧</span>
            <span class="sans text-sm font-semibold">Arts</span>
        </button>

        <button onclick="showPage('artists')" id="artistsBtn"
                class="menu-btn sidebar-link w-full flex items-center gap-4
                       px-4 py-3 rounded-2xl text-[#F6FFEA]
                       hover:bg-[#62C4DA]/20">
            <span class="text-xl">♙</span>
            <span class="sans text-sm font-semibold">Artists</span>
        </button>

        <button onclick="showPage('pending')" id="pendingBtn"
                class="menu-btn sidebar-link w-full flex items-center
                       justify-between px-4 py-3 rounded-2xl
                       text-[#F6FFEA] hover:bg-[#62C4DA]/20">

            <div class="flex items-center gap-4">
                <span class="text-xl">⏳</span>
                <span class="sans text-sm font-semibold">Pending</span>
            </div>

            <span id="pendingBadge"
                  class="badge-pulse hidden
                         text-[10px] font-bold
                         bg-[#FFDE96] text-[#C93638]
                         px-2 py-0.5 rounded-full">
                0
            </span>

        </button>

    </nav>


    <div class="p-4">
        <div class="border-t border-[#F6FFEA]/15 pt-4">
            <div class="flex items-center gap-3 px-3 py-3">
                <div class="w-10 h-10 rounded-full bg-[#FFDE96]
                            flex items-center justify-center
                            text-[#C93638] font-bold">A</div>
                <div class="min-w-0">
                    <p class="font-bold text-sm text-[#F6FFEA]">Administrator</p>
                    <p class="sans text-[10px] text-[#FFDE96] truncate">
                        admin@gmail.com
                    </p>
                </div>
            </div>

            <a href="{{ route('home') }}"
               class="sidebar-link mt-2 w-full flex items-center gap-4
                      px-4 py-3 rounded-2xl text-[#F6FFEA]
                      hover:bg-[#FA855A]/30">
                <span>↪</span>
                <span class="sans text-sm font-semibold">Logout</span>
            </a>
        </div>
    </div>
</aside>



<!-- MAIN -->

<main class="ml-64 min-h-screen">

    <header class="sticky top-0 z-30 glass border-b border-[#C93638]/10
                   px-10 py-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="sans text-xs uppercase tracking-[3px] text-[#62C4DA]">
                    CreateTopia
                </p>
                <h2 id="pageTitle"
                    class="text-3xl font-bold mt-1 text-[#C93638]">
                    Dashboard
                </h2>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                 text-[#62C4DA]">⌕</span>
                    <input id="searchInput" oninput="searchData()"
                           type="text" placeholder="Search..."
                           class="sans w-64 rounded-full bg-white
                                  border border-[#C93638]/15
                                  pl-10 pr-5 py-3 text-sm
                                  outline-none
                                  focus:ring-2 focus:ring-[#62C4DA]/40">
                </div>
                <div class="w-11 h-11 rounded-full bg-[#62C4DA] text-white
                            flex items-center justify-center font-bold">A</div>
            </div>
        </div>
    </header>



    <div class="p-10">

        <!-- ================================================= -->
        <!-- DASHBOARD -->
        <!-- ================================================= -->

        <section id="dashboardPage">

            <div class="rounded-[30px] bg-gradient-to-br
                        from-[#FFDE96] to-[#F6FFEA]
                        p-9 mb-8 relative overflow-hidden
                        border border-[#C93638]/10">
                <div class="relative z-10">
                    <p class="sans text-xs uppercase tracking-[3px]
                              text-[#C93638]">
                        Welcome back
                    </p>
                    <h1 class="text-4xl font-bold mt-2 text-[#C93638]">
                        CreateTopia Admin
                    </h1>
                    <p class="sans text-sm text-[#2a1a1c]/60 mt-3 max-w-xl">
                        Manage artworks and artists in the CreateTopia community.
                    </p>
                </div>
                <div class="absolute -right-10 -bottom-20 text-[230px]
                            text-[#62C4DA]/15 floating">✦</div>
            </div>


            <div class="grid grid-cols-4 gap-5 mb-10">

                <div class="bg-[#F6FFEA] rounded-[25px] p-6 card-hover
                            border border-[#C93638]/10">
                    <p class="sans text-xs uppercase tracking-wider
                              text-[#C93638]/70">
                        Total Arts
                    </p>
                    <div class="flex justify-between items-end mt-3">
                        <p id="artsCount"
                           class="text-4xl font-bold text-[#C93638]">0</p>
                        <span class="text-2xl text-[#62C4DA]">✦</span>
                    </div>
                </div>

                <div class="bg-[#62C4DA] text-white rounded-[25px] p-6 card-hover">
                    <p class="sans text-xs uppercase tracking-wider opacity-80">
                        Artists
                    </p>
                    <div class="flex justify-between items-end mt-3">
                        <p id="artistsCount" class="text-4xl font-bold">0</p>
                        <span class="text-2xl">♙</span>
                    </div>
                </div>

                <div class="bg-[#C93638] text-white rounded-[25px] p-6 card-hover">
                    <p class="sans text-xs uppercase tracking-wider opacity-70">
                        Pending
                    </p>
                    <div class="flex justify-between items-end mt-3">
                        <p id="pendingCount" class="text-4xl font-bold">0</p>
                        <span class="text-2xl text-[#FFDE96]">⏳</span>
                    </div>
                </div>

                <div class="bg-[#FFDE96] rounded-[25px] p-6 card-hover">
                    <p class="sans text-xs uppercase tracking-wider
                              text-[#C93638]/70">
                        Approved
                    </p>
                    <div class="flex justify-between items-end mt-3">
                        <p id="approvedCount"
                           class="text-4xl font-bold text-[#C93638]">0</p>
                        <span class="text-2xl text-[#FA855A]">✓</span>
                    </div>
                </div>

            </div>


            <div class="flex justify-between items-end mb-5">
                <div>
                    <p class="sans text-xs uppercase tracking-[2px]
                              text-[#62C4DA]">
                        Recently uploaded
                    </p>
                    <h2 class="text-2xl font-bold mt-1 text-[#C93638]">
                        Latest Arts
                    </h2>
                </div>

                <button onclick="showPage('arts')"
                        class="sans text-sm font-bold text-[#62C4DA]
                               hover:text-[#C93638] transition">
                    View all →
                </button>
            </div>

            <div id="dashboardArts"
                 class="grid grid-cols-4 gap-5"></div>

        </section>



        <!-- ================================================= -->
        <!-- ARTS PAGE -->
        <!-- ================================================= -->

        <section id="artsPage" class="hidden">

            <div class="flex justify-between items-end mb-8">
                <div>
                    <p class="sans text-xs uppercase tracking-[3px]
                              text-[#62C4DA]">
                        Management
                    </p>
                    <h2 class="text-3xl font-bold text-[#C93638]">Arts</h2>
                </div>

                <div class="flex gap-2">
                    <button onclick="filterCategory('all')" id="catAll"
                            class="category-btn px-5 py-2.5 rounded-full
                                   bg-[#C93638] text-white
                                   sans text-xs font-bold">
                        All
                    </button>
                    <button onclick="filterCategory('Digital')" id="catDigital"
                            class="category-btn px-5 py-2.5 rounded-full
                                   bg-[#F6FFEA] text-[#C93638]
                                   border border-[#C93638]/15
                                   sans text-xs font-bold">
                        Digital
                    </button>
                    <button onclick="filterCategory('Traditional')" id="catTraditional"
                            class="category-btn px-5 py-2.5 rounded-full
                                   bg-[#FFDE96] text-[#C93638]
                                   sans text-xs font-bold">
                        Traditional
                    </button>
                </div>
            </div>

            <div id="artsContainer"
                 class="grid grid-cols-4 gap-6"></div>

        </section>



        <!-- ================================================= -->
        <!-- ARTISTS PAGE -->
        <!-- ================================================= -->

        <section id="artistsPage" class="hidden">

            <div class="mb-8">
                <p class="sans text-xs uppercase tracking-[3px] text-[#62C4DA]">
                    Community
                </p>
                <h2 class="text-3xl font-bold text-[#C93638]">Artists</h2>
                <p class="sans text-sm text-[#2a1a1c]/50 mt-2">
                    Manage artists and view their profiles.
                </p>
            </div>

            <div id="artistsContainer"
                 class="grid grid-cols-3 gap-6"></div>

        </section>



        <!-- ================================================= -->
        <!-- PENDING PAGE -->
        <!-- ================================================= -->

        <section id="pendingPage" class="hidden">

            <div class="mb-8">
                <p class="sans text-xs uppercase tracking-[3px] text-[#62C4DA]">
                    Verification
                </p>
                <h2 class="text-3xl font-bold text-[#C93638]">
                    Pending Artists
                </h2>
                <p class="sans text-sm text-[#2a1a1c]/50 mt-2">
                    Tinjau dan setujui pendaftaran artist baru.
                </p>
            </div>

            <div id="pendingContainer"
                 class="grid grid-cols-2 gap-6"></div>

        </section>

    </div>
</main>



<!-- ========================================================= -->
<!-- ART DETAIL MODAL (cuma Delete) -->
<!-- ========================================================= -->

<div id="artModal"
     class="fixed inset-0 bg-[#C93638]/40 backdrop-blur-sm z-50
            hidden items-center justify-center p-6">

    <div class="modal bg-[#F6FFEA] rounded-[30px] w-full max-w-4xl
                overflow-hidden shadow-2xl">

        <div class="grid grid-cols-2">

            <div class="h-[540px] bg-[#FFDE96]/20">
                <img id="detailArtImage"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://via.placeholder.com/600x540?text=No+Image'">
            </div>


            <div class="p-9 relative">

                <button onclick="closeModal('artModal')"
                        class="absolute right-6 top-6 w-10 h-10 rounded-full
                               bg-[#FFDE96] text-[#C93638] text-lg
                               hover:bg-[#C93638] hover:text-white transition
                               flex items-center justify-center">
                    ×
                </button>

                <p id="detailArtCategory"
                   class="sans text-xs uppercase tracking-[3px] text-[#62C4DA]">
                    Digital
                </p>

                <h2 id="detailArtTitle"
                    class="text-4xl font-bold mt-4 pr-10 text-[#C93638]">
                    Artwork
                </h2>

                <div class="mt-7">
                    <p class="sans text-xs uppercase tracking-[2px]
                              text-[#2a1a1c]/40">
                        Description
                    </p>
                    <p id="detailArtDescription"
                       class="sans text-sm leading-7 text-[#2a1a1c]/65 mt-3">
                    </p>
                </div>


                <div class="border-t border-[#C93638]/10 mt-7 pt-6">
                    <p class="sans text-xs uppercase tracking-[2px]
                              text-[#2a1a1c]/40">
                        Artist
                    </p>

                    <button id="detailArtArtist"
                            class="flex items-center gap-3 mt-3 text-left group">

                        <!-- AVATAR CONTAINER — di-render JS -->
                        <div id="detailArtistAvatar"
                             class="w-12 h-12 rounded-full overflow-hidden
                                    border-2 border-white shadow
                                    flex items-center justify-center">
                        </div>

                        <div>
                            <p id="detailArtistName"
                               class="font-bold group-hover:text-[#62C4DA]
                                      transition"></p>
                            <p id="detailArtistUsername"
                               class="sans text-xs text-[#2a1a1c]/50"></p>
                        </div>

                    </button>
                </div>


                <button onclick="askDeleteArt()"
                        class="absolute bottom-8 left-9 right-9 py-3.5
                               rounded-full bg-[#FA855A] text-white
                               sans text-sm font-bold
                               hover:bg-[#C93638] transition">
                    🗑 Delete Art
                </button>

            </div>
        </div>
    </div>
</div>



<!-- ========================================================= -->
<!-- ARTIST DETAIL MODAL (cuma Delete) -->
<!-- ========================================================= -->

<div id="artistModal"
     class="fixed inset-0 bg-[#C93638]/40 backdrop-blur-sm z-50
            hidden items-center justify-center p-6">

    <div class="modal bg-[#F6FFEA] rounded-[30px] w-full max-w-xl
                max-h-[90vh] overflow-y-auto shadow-2xl">

        <div class="h-32 bg-gradient-to-r
                    from-[#62C4DA] via-[#FFDE96] to-[#C93638]
                    relative z-0 rounded-t-[30px] overflow-hidden">
            <button onclick="closeModal('artistModal')"
                    class="absolute right-5 top-5 z-20 w-10 h-10 rounded-full
                           bg-white/80 text-[#C93638] text-lg
                           hover:bg-[#C93638] hover:text-white transition
                           flex items-center justify-center">
                ×
            </button>
        </div>

        <div class="px-8 pb-8 relative">

            <!-- AVATAR CONTAINER — di-render JS -->
            <div id="artistProfileAvatar"
                 class="w-28 h-28 rounded-full overflow-hidden
                        border-8 border-[#F6FFEA]
                        -mt-14 relative z-10
                        shadow-lg bg-[#F6FFEA]
                        flex items-center justify-center">
            </div>

            <p id="artistProfileUsername"
               class="sans text-xs uppercase tracking-[2px]
                      text-[#62C4DA] mt-4"></p>

            <h2 id="artistProfileName"
                class="text-3xl font-bold mt-1 text-[#C93638]"></h2>

            <p id="artistProfileBio"
               class="sans text-sm leading-6 text-[#2a1a1c]/60 mt-4"></p>

            <div class="mt-8">
                <p class="sans text-xs uppercase tracking-[2px]
                          text-[#2a1a1c]/40">
                    Artworks
                </p>
                <div id="artistWorks"
                     class="grid grid-cols-3 gap-3 mt-4"></div>
            </div>

            <button onclick="askDeleteArtist()"
                    class="mt-8 w-full py-3.5 rounded-full
                           bg-[#FA855A] text-white
                           sans text-sm font-bold
                           hover:bg-[#C93638] transition">
                🗑 Delete Artist
            </button>
        </div>
    </div>
</div>



<!-- ========================================================= -->
<!-- REJECT MODAL -->
<!-- ========================================================= -->

<div id="rejectModal"
     class="fixed inset-0 bg-[#C93638]/50 backdrop-blur-sm z-[70]
            hidden items-center justify-center p-6">

    <div class="modal bg-[#F6FFEA] rounded-[28px] w-full max-w-md p-8
                border border-[#C93638]/10">

        <div class="flex justify-between items-start mb-6">
            <div>
                <p class="sans text-xs uppercase tracking-[3px] text-[#FA855A]">
                    Reject
                </p>
                <h2 class="text-2xl font-bold mt-1 text-[#C93638]">
                    Tolak Pendaftaran
                </h2>
            </div>
            <button onclick="closeModal('rejectModal')"
                    class="w-10 h-10 rounded-full bg-[#FFDE96]
                           text-[#C93638] hover:bg-[#C93638] hover:text-white
                           transition flex items-center justify-center">
                ×
            </button>
        </div>

        <p class="sans text-[11px] text-[#2a1a1c]/60 mb-4">
            Berikan alasan kenapa pendaftaran ini ditolak.
            Alasan akan muncul di halaman login user.
        </p>

        <textarea id="rejectReason" rows="4"
                  placeholder="Contoh: Kualitas karya belum memenuhi standar komunitas."
                  class="w-full rounded-2xl bg-white
                         border border-[#C93638]/15
                         px-5 py-3 outline-none resize-none
                         focus:border-[#FA855A] transition
                         sans text-sm"></textarea>

        <div class="grid grid-cols-2 gap-3 mt-6">
            <button onclick="closeModal('rejectModal')"
                    class="py-3 rounded-full border border-[#C93638]/20
                           sans text-sm font-bold text-[#C93638]
                           hover:bg-[#FFDE96] transition">
                Cancel
            </button>

            <button onclick="confirmReject()"
                    class="py-3 rounded-full bg-[#FA855A] text-white
                           sans text-sm font-bold
                           hover:bg-[#C93638] transition">
                Reject
            </button>
        </div>

    </div>
</div>



<!-- ========================================================= -->
<!-- DELETE CONFIRMATION -->
<!-- ========================================================= -->

<div id="deleteModal"
     class="fixed inset-0 bg-[#C93638]/60 backdrop-blur-sm z-[70]
            hidden items-center justify-center p-6">

    <div class="modal bg-[#F6FFEA] rounded-[28px] p-8
                max-w-sm w-full text-center
                border border-[#C93638]/10">

        <div class="w-16 h-16 rounded-full bg-[#FFDE96]
                    mx-auto flex items-center justify-center
                    text-2xl text-[#C93638] font-bold">!</div>

        <h2 id="deleteTitle"
            class="text-2xl font-bold mt-5 text-[#C93638]">
            Delete this?
        </h2>

        <p id="deleteMessage"
           class="sans text-sm text-[#2a1a1c]/60 mt-3 leading-6">
            Data yang dihapus tidak bisa dikembalikan.
        </p>

        <div class="grid grid-cols-2 gap-3 mt-7">
            <button onclick="closeModal('deleteModal')"
                    class="py-3 rounded-full border border-[#C93638]/20
                           sans text-sm font-bold text-[#C93638]
                           hover:bg-[#FFDE96] transition">
                Cancel
            </button>

            <button onclick="confirmDelete()"
                    class="py-3 rounded-full bg-[#FA855A] text-white
                           sans text-sm font-bold
                           hover:bg-[#C93638] transition">
                Delete
            </button>
        </div>
    </div>
</div>



<script>

/* =====================================================
   HELPER: INITIAL AVATAR
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


    const sizes = {
        sm: { w: "w-12 h-12", font: "0.9rem" },
        md: { w: "w-20 h-20", font: "1.5rem" },
        lg: { w: "w-28 h-28", font: "2.5rem" }
    };

    const s = sizes[size] || sizes.md;


    return `
        <div class="${s.w} rounded-full
                    flex items-center justify-center
                    text-white font-bold
                    border-2 border-white shadow-md"
             style="background: ${bg}; font-size: ${s.font};
                    font-family: Georgia, serif;">
            ${initial}
        </div>
    `;
}



/* =====================================================
   HELPER: GET ARTIST AVATAR HTML
===================================================== */

function getArtistAvatarHtml(artistName, size = "sm") {

    const myName = localStorage.getItem("profileName") || "";
    const myPhoto = localStorage.getItem("profilePhoto") || "";

    const isMe =
        myName &&
        myName.toLowerCase() === (artistName || "").toLowerCase();

    const hasPhoto = myPhoto && myPhoto.trim() !== "";


    /* Artist = user login & punya foto → pakai foto */

    if (isMe && hasPhoto) {

        const sizes = {
            sm: "w-12 h-12",
            md: "w-20 h-20",
            lg: "w-28 h-28"
        };

        return `
            <img src="${myPhoto}"
                 alt="${artistName}"
                 class="${sizes[size]} rounded-full object-cover
                        border-2 border-white shadow-md">
        `;
    }


    /* Selain itu → inisial */

    return getInitialAvatar(artistName, size);
}



/* =====================================================
   STATIC ARTS
===================================================== */

const staticArts = [
    { id: 1, title: "Mona Lisa",
      description: "Probably the most famous painting in the world is Leonardo da Vinci's La Gioconda, better known as Mona Lisa.",
      image: "{{ asset('images/arts/mona-lisa.jpg') }}",
      artist: "Leonardo da Vinci", artistId: "leonardo",
      category: "Traditional", date: "1503-01-01" },

    { id: 2, title: "The Birth of Venus",
      description: "Another of the most famous paintings is The Birth of Venus. Botticelli's painting illustrates the myth of the birth of Aphrodite.",
      image: "{{ asset('images/arts/birth-of-venus.jpg') }}",
      artist: "Sandro Botticelli", artistId: "botticelli",
      category: "Traditional", date: "1485-01-01" },

    { id: 3, title: "The Creation Of Adam",
      description: "Michelangelo's fresco The Creation of Adam, which adorns the ceiling of the Sistine Chapel.",
      image: "{{ asset('images/arts/creation-of-adam.jpg') }}",
      artist: "Michelangelo", artistId: "michelangelo",
      category: "Traditional", date: "1512-01-01" },

    { id: 4, title: "The Last Supper",
      description: "For more than 500 years of its existence, the famous fresco The Last Supper has been restored at least five times.",
      image: "{{ asset('images/arts/last-supper.jpg') }}",
      artist: "Leonardo da Vinci", artistId: "leonardo",
      category: "Traditional", date: "1498-01-01" },

    { id: 5, title: "The Sacred and Profane Love",
      description: "The current name of the painting was not given by Titian himself, but appeared only two centuries later.",
      image: "{{ asset('images/arts/sacred-love.jpg') }}",
      artist: "Titian", artistId: "titian",
      category: "Traditional", date: "1514-01-01" },

    { id: 6, title: "The Ancient of Days",
      description: "This popular artwork by William Blake is now in the British Museum, London.",
      image: "{{ asset('images/arts/ancient-days.jpg') }}",
      artist: "William Blake", artistId: "blake",
      category: "Traditional", date: "1794-01-01" },

    { id: 7, title: "Liberty Leading the People",
      description: "Liberty Leading the People by Eugene Delacroix is one of the best known examples of Romantic painting.",
      image: "{{ asset('images/arts/liberty-leading.jpg') }}",
      artist: "Eugène Delacroix", artistId: "delacroix",
      category: "Traditional", date: "1830-01-01" },

    { id: 8, title: "The Madonna Litta",
      description: "This masterpiece, a world classic long ago, is kept in the Hermitage in St. Petersburg.",
      image: "{{ asset('images/arts/madonna-litta.jpg') }}",
      artist: "Leonardo da Vinci", artistId: "leonardo",
      category: "Traditional", date: "1490-01-01" },

    { id: 9, title: "Landscape with the Fall of Icarus",
      description: "This painting, by Dutch artist Pieter Bruegel, is now part of the collection.",
      image: "{{ asset('images/arts/landscape-icarus.jpg') }}",
      artist: "Pieter Bruegel", artistId: "bruegel",
      category: "Traditional", date: "1560-01-01" }
];



/* =====================================================
   STATIC ARTISTS
===================================================== */

const staticArtists = {
    leonardo: {
        name: "Leonardo da Vinci", username: "@leonardodavinci",
        bio: "Italian Renaissance artist known for some of the most influential artworks in Western art."
    },
    botticelli: {
        name: "Sandro Botticelli", username: "@sandrobotticelli",
        bio: "Italian Renaissance painter known for elegant mythological and religious compositions."
    },
    michelangelo: {
        name: "Michelangelo", username: "@michelangelo",
        bio: "Italian Renaissance artist, sculptor, painter and architect."
    },
    titian: {
        name: "Titian", username: "@titian",
        bio: "Italian Renaissance painter known for his expressive use of color."
    },
    blake: {
        name: "William Blake", username: "@williamblake",
        bio: "English poet, painter and printmaker whose work combined art and literature."
    },
    delacroix: {
        name: "Eugène Delacroix", username: "@delacroix",
        bio: "French Romantic artist known for dramatic compositions and expressive color."
    },
    bruegel: {
        name: "Pieter Bruegel", username: "@pieterbruegel",
        bio: "Dutch Renaissance painter known for detailed landscapes and scenes of everyday life."
    }
};



/* =====================================================
   USER ARTS
===================================================== */

let userArts = [];
try {
    userArts = JSON.parse(localStorage.getItem("userArts") || "[]");
    if (!Array.isArray(userArts)) userArts = [];
} catch (e) { userArts = []; }


const profileName = localStorage.getItem("profileName") || "Unknown Artist";
const profileBio = localStorage.getItem("profileBio") || "CreateTopia artist.";



/* Convert user arts */

const convertedUserArts = userArts.map((art, index) => {
    const creator = art.creator || profileName;
    return {
        id: "user-" + (art.id !== undefined ? art.id : index),
        title: art.title || "Untitled",
        description: art.description || "No description available.",
        image: art.image || "",
        artist: creator,
        artistId: "user-" + creator.toLowerCase().replace(/[^a-z0-9]+/g, "-"),
        category: art.category || "Digital",
        date: art.date || new Date().toISOString()
    };
});



/* =====================================================
   ALL ARTS
===================================================== */

let arts = [...staticArts, ...convertedUserArts];



/* =====================================================
   BUILD ARTISTS (pakai inisial, bukan foto)
===================================================== */

let artists = [];

function buildArtists() {

    const grouped = {};

    arts.forEach(art => {

        if (!art.artistId) return;

        if (!grouped[art.artistId]) {
            grouped[art.artistId] = {
                id: art.artistId,
                name: art.artist || "Unknown Artist",
                arts: []
            };
        }

        grouped[art.artistId].arts.push(art);
    });


    artists = Object.values(grouped).map(artist => {

        let info = staticArtists[artist.id];

        if (!info) {
            info = {
                name: artist.name,
                username: "@" + artist.name.toLowerCase()
                                .replace(/[^a-z0-9]+/g, ""),
                bio: profileBio || "CreateTopia artist."
            };
        }

        return { ...artist, ...info };
    });
}



/* =====================================================
   PENDING USERS
===================================================== */

let pendingUsers = [];

function loadPendingUsers() {
    try {
        const data = JSON.parse(
            localStorage.getItem('pendingUsers') || '[]'
        );
        pendingUsers = Array.isArray(data) ? data : [];
    } catch (e) {
        pendingUsers = [];
    }
}

function savePendingUsers() {
    localStorage.setItem('pendingUsers',
        JSON.stringify(pendingUsers));
}



/* =====================================================
   STATE
===================================================== */

let currentArtId = null;
let currentArtistId = null;
let deleteType = null;
let deleteId = null;
let currentCategory = "all";
let currentPendingId = null;



/* =====================================================
   PAGE NAVIGATION
===================================================== */

function showPage(page) {

    ['dashboardPage','artsPage','artistsPage','pendingPage']
        .forEach(id => document.getElementById(id).classList.add('hidden'));


    document.querySelectorAll(".menu-btn").forEach(b => {
        b.classList.remove("bg-[#62C4DA]", "text-white");
        b.classList.add("text-[#F6FFEA]");
    });


    const titles = {
        dashboard: 'Dashboard',
        arts: 'Arts',
        artists: 'Artists',
        pending: 'Pending Artists'
    };

    document.getElementById('pageTitle').textContent = titles[page];


    if (page === 'dashboard') {
        document.getElementById('dashboardPage').classList.remove('hidden');
        document.getElementById('dashboardBtn')
            .classList.add('bg-[#62C4DA]', 'text-white');
        renderDashboardArts();
    }

    if (page === 'arts') {
        document.getElementById('artsPage').classList.remove('hidden');
        document.getElementById('artsBtn')
            .classList.add('bg-[#62C4DA]', 'text-white');
        currentCategory = 'all';
        renderArts();
    }

    if (page === 'artists') {
        document.getElementById('artistsPage').classList.remove('hidden');
        document.getElementById('artistsBtn')
            .classList.add('bg-[#62C4DA]', 'text-white');
        renderArtists();
    }

    if (page === 'pending') {
        document.getElementById('pendingPage').classList.remove('hidden');
        document.getElementById('pendingBtn')
            .classList.add('bg-[#62C4DA]', 'text-white');
        renderPending();
    }

    document.getElementById('searchInput').value = '';
}



/* =====================================================
   RENDER ARTS
===================================================== */

function renderArts() {

    const container = document.getElementById('artsContainer');
    container.innerHTML = '';

    let filtered = arts.filter(a =>
        currentCategory === 'all' || a.category === currentCategory
    );

    if (!filtered.length) {
        container.innerHTML = `
            <div class="col-span-4 py-20 text-center">
                <p class="text-4xl text-[#62C4DA]">✦</p>
                <h3 class="text-xl font-bold mt-4 text-[#C93638]">
                    No artworks found
                </h3>
            </div>`;
        return;
    }

    filtered.forEach(art => {

        container.innerHTML += `
            <button onclick="openArt('${art.id}')"
                    class="bg-[#F6FFEA] rounded-[25px] overflow-hidden
                           text-left card-hover
                           border border-[#C93638]/10">

                <div class="relative">
                    <img src="${art.image}"
                         class="w-full h-60 object-cover"
                         onerror="this.src='https://via.placeholder.com/400x240?text=No+Image'">

                    <span class="absolute top-4 left-4 px-3 py-1.5
                                 rounded-full bg-[#FFDE96]
                                 text-[#C93638]
                                 sans text-[10px] font-bold uppercase">
                        ${art.category}
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="text-xl font-bold text-[#C93638]">
                        ${art.title}
                    </h3>
                    <p class="sans text-xs text-[#2a1a1c]/50 mt-2">
                        by ${art.artist}
                    </p>
                </div>
            </button>`;
    });
}



/* =====================================================
   FILTER CATEGORY
===================================================== */

function filterCategory(cat) {
    currentCategory = cat;
    renderArts();
}



/* =====================================================
   RENDER ARTISTS (pakai inisial)
===================================================== */

function renderArtists() {

    const container = document.getElementById('artistsContainer');
    container.innerHTML = '';

    artists.forEach(artist => {

        const avatarHtml = getArtistAvatarHtml(artist.name, 'md');

        container.innerHTML += `
            <button onclick="openArtist('${artist.id}')"
                    class="bg-[#F6FFEA] rounded-[28px] p-6 text-left
                           card-hover border border-[#C93638]/10">

                <div class="flex items-center gap-5">

                    ${avatarHtml}

                    <div>
                        <p class="sans text-[10px] uppercase tracking-[2px]
                                  text-[#62C4DA]">Artist</p>
                        <h3 class="text-xl font-bold mt-1 text-[#C93638]">
                            ${artist.name}
                        </h3>
                        <p class="sans text-xs text-[#2a1a1c]/50">
                            ${artist.username}
                        </p>
                    </div>
                </div>

                <p class="sans text-sm text-[#2a1a1c]/60 leading-6 mt-5">
                    ${artist.bio}
                </p>

                <div class="border-t border-[#C93638]/10 mt-5 pt-4
                            flex justify-between items-center">
                    <span class="sans text-xs text-[#2a1a1c]/60">
                        ${artist.arts.length} artworks
                    </span>
                    <span class="text-[#62C4DA] text-lg">→</span>
                </div>
            </button>`;
    });
}



/* =====================================================
   DASHBOARD LATEST
===================================================== */

function renderDashboardArts() {

    const container = document.getElementById('dashboardArts');
    container.innerHTML = '';

    [...arts]
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .slice(0, 4)
        .forEach(art => {

        container.innerHTML += `
            <button onclick="openArt('${art.id}')"
                    class="bg-[#F6FFEA] rounded-[22px] overflow-hidden
                           text-left card-hover
                           border border-[#C93638]/10">

                <img src="${art.image}" class="w-full h-48 object-cover"
                     onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">

                <div class="p-4">
                    <span class="sans text-[9px] uppercase tracking-wider
                                 text-[#62C4DA] font-bold">
                        ${art.category}
                    </span>
                    <h3 class="font-bold text-lg mt-1 text-[#C93638]">
                        ${art.title}
                    </h3>
                    <p class="sans text-xs text-[#2a1a1c]/50 mt-1">
                        ${art.artist}
                    </p>
                </div>
            </button>`;
    });
}



/* =====================================================
   OPEN ART DETAIL
===================================================== */

function openArt(id) {

    const art = arts.find(item => String(item.id) === String(id));
    if (!art) return;

    currentArtId = id;

    const artist = artists.find(a => a.id === art.artistId);

    document.getElementById('detailArtImage').src = art.image;
    document.getElementById('detailArtTitle').textContent = art.title;
    document.getElementById('detailArtCategory').textContent = art.category;
    document.getElementById('detailArtDescription').textContent =
        art.description || 'No description.';


    if (artist) {

        document.getElementById('detailArtistName').textContent = artist.name;
        document.getElementById('detailArtistUsername').textContent =
            artist.username;

        /* Avatar: foto atau inisial */

        document.getElementById('detailArtistAvatar').outerHTML =
            getArtistAvatarHtml(artist.name, 'sm');

        /* Tambah id supaya bisa dipanggil ulang */

        const newAvatar = document.querySelector('#detailArtArtist > div');
        if (newAvatar) newAvatar.id = 'detailArtistAvatar';


        document.getElementById('detailArtArtist').onclick = function () {
            closeModal('artModal');
            openArtist(artist.id);
        };
    }

    openModal('artModal');
}



/* =====================================================
   OPEN ARTIST DETAIL
===================================================== */

function openArtist(id) {

    const artist = artists.find(a => String(a.id) === String(id));
    if (!artist) return;

    currentArtistId = id;

    /* Avatar: foto atau inisial */

    const avatarBox = document.getElementById('artistProfileAvatar');

    avatarBox.outerHTML = getArtistAvatarHtml(artist.name, 'lg')
        .replace('rounded-full',
                 'rounded-full -mt-14 relative z-10 border-8 border-[#F6FFEA] bg-[#F6FFEA] shadow-lg');

    /* Fix id lagi */

    const newAvatar = document.querySelector('#artistModal .px-8 > div:first-child');
    if (newAvatar) newAvatar.id = 'artistProfileAvatar';


    document.getElementById('artistProfileName').textContent = artist.name;
    document.getElementById('artistProfileUsername').textContent =
        artist.username;
    document.getElementById('artistProfileBio').textContent = artist.bio;

    const works = document.getElementById('artistWorks');
    works.innerHTML = '';

    if (!artist.arts || !artist.arts.length) {
        works.innerHTML = `
            <div class="col-span-3 py-8 text-center">
                <p class="sans text-xs text-[#2a1a1c]/50">
                    This artist has no artworks.
                </p>
            </div>`;
    } else {
        artist.arts.forEach(art => {
            works.innerHTML += `
                <button onclick="closeModal('artistModal');
                                 openArt('${art.id}')"
                        class="rounded-xl overflow-hidden">
                    <img src="${art.image}"
                         class="w-full aspect-square object-cover
                                hover:scale-105 transition"
                         onerror="this.src='https://via.placeholder.com/200?text=No'">
                </button>`;
        });
    }

    openModal('artistModal');
}



/* =====================================================
   DELETE FLOW
===================================================== */

function askDeleteArt() {
    deleteType = 'art';
    deleteId = currentArtId;

    document.getElementById('deleteTitle').textContent =
        'Delete this art?';
    document.getElementById('deleteMessage').textContent =
        'Karya ini akan dihapus permanen.';

    closeModal('artModal');
    openModal('deleteModal');
}


function askDeleteArtist() {
    deleteType = 'artist';
    deleteId = currentArtistId;

    document.getElementById('deleteTitle').textContent =
        'Delete this artist?';
    document.getElementById('deleteMessage').textContent =
        'Artist ini beserta semua karya-nya akan dihapus permanen.';

    closeModal('artistModal');
    openModal('deleteModal');
}


function confirmDelete() {

    if (deleteType === 'art') {

        arts = arts.filter(a => String(a.id) !== String(deleteId));

    } else if (deleteType === 'artist') {

        arts = arts.filter(a => a.artistId !== deleteId);

        if (String(deleteId).startsWith('user-')) {

            try {

                let userArtsData = JSON.parse(
                    localStorage.getItem('userArts') || '[]'
                );

                const creatorName = artists.find(
                    a => a.id === deleteId
                )?.name;

                if (creatorName) {

                    userArtsData = userArtsData.filter(
                        u => (u.creator || profileName) !== creatorName
                    );

                    localStorage.setItem('userArts',
                        JSON.stringify(userArtsData));
                }

            } catch (e) {}
        }
    }

    closeModal('deleteModal');

    currentArtId = null;
    currentArtistId = null;
    deleteType = null;
    deleteId = null;

    refreshAll();
}



/* =====================================================
   PENDING PAGE
===================================================== */

function renderPending() {

    const container = document.getElementById('pendingContainer');
    container.innerHTML = '';

    const pending = pendingUsers.filter(u => u.status === 'pending');

    const badge = document.getElementById('pendingBadge');
    if (pending.length > 0) {
        badge.textContent = pending.length;
        badge.classList.remove('hidden');
    } else {
        badge.classList.add('hidden');
    }


    if (!pending.length) {
        container.innerHTML = `
            <div class="col-span-2 py-20 text-center">
                <p class="text-5xl text-[#62C4DA] mb-4">✦</p>
                <h3 class="text-xl font-bold text-[#C93638]">
                    No pending artists
                </h3>
                <p class="sans text-sm text-[#2a1a1c]/50 mt-2">
                    Semua pendaftaran sudah ditinjau.
                </p>
            </div>`;
        return;
    }


    pending.forEach(user => {

        const tanggal = new Date(user.tanggal)
            .toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });

        container.innerHTML += `
            <div class="bg-[#F6FFEA] rounded-[25px] p-6
                        border border-[#C93638]/10 card-hover">

                <div class="flex items-start gap-4">

                    <div class="w-14 h-14 rounded-full
                                bg-gradient-to-br
                                from-[#62C4DA] to-[#C93638]
                                flex items-center justify-center
                                text-white text-xl font-bold
                                flex-shrink-0">

                        ${(user.nama || '?').charAt(0).toUpperCase()}

                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-bold text-[#C93638] truncate">
                            ${user.nama || 'Unknown'}
                        </h3>
                        <p class="sans text-xs text-[#62C4DA] truncate mt-0.5">
                            ${user.email}
                        </p>
                        <p class="sans text-[10px] text-[#2a1a1c]/50 mt-2">
                            Daftar: ${tanggal}
                        </p>
                    </div>

                    <span class="text-[10px] font-bold
                                 bg-[#FFDE96] text-[#C93638]
                                 px-3 py-1 rounded-full
                                 sans uppercase tracking-wider">
                        Pending
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6">
                    <button onclick="rejectUser('${user.id}')"
                            class="py-3 rounded-full
                                   bg-[#F6FFEA]
                                   border border-[#FA855A]/40
                                   text-[#FA855A]
                                   sans text-sm font-bold
                                   hover:bg-[#FA855A]
                                   hover:text-white transition">
                        ✕ Reject
                    </button>

                    <button onclick="approveUser('${user.id}')"
                            class="py-3 rounded-full
                                   bg-[#62C4DA] text-white
                                   sans text-sm font-bold
                                   hover:bg-[#C93638] transition">
                        ✓ Approve
                    </button>
                </div>

            </div>`;
    });
}



/* =====================================================
   APPROVE / REJECT
===================================================== */

function approveUser(userId) {

    const user = pendingUsers.find(u => u.id === userId);
    if (!user) return;

    user.status = 'approved';
    user.approvedAt = new Date().toISOString();

    savePendingUsers();
    renderPending();
    updateStatistics();

    alert(`✓ ${user.nama} berhasil di-approve.`);
}


function rejectUser(userId) {
    currentPendingId = userId;
    document.getElementById('rejectReason').value = '';
    openModal('rejectModal');
}


function confirmReject() {

    const user = pendingUsers.find(u => u.id === currentPendingId);
    if (!user) return;

    const reason =
        document.getElementById('rejectReason').value.trim();

    if (!reason) {
        alert('Alasan penolakan wajib diisi.');
        return;
    }

    user.status = 'rejected';
    user.rejectionReason = reason;
    user.rejectedAt = new Date().toISOString();

    savePendingUsers();

    closeModal('rejectModal');
    renderPending();
    updateStatistics();

    alert(`✕ ${user.nama} ditolak.`);
}



/* =====================================================
   STATISTICS
===================================================== */

function updateStatistics() {

    document.getElementById('artsCount').textContent = arts.length;
    document.getElementById('artistsCount').textContent = artists.length;

    document.getElementById('pendingCount').textContent =
        pendingUsers.filter(u => u.status === 'pending').length;

    document.getElementById('approvedCount').textContent =
        pendingUsers.filter(u => u.status === 'approved').length;

    const pending = pendingUsers.filter(u => u.status === 'pending');
    const badge = document.getElementById('pendingBadge');
    if (pending.length > 0) {
        badge.textContent = pending.length;
        badge.classList.remove('hidden');
    } else {
        badge.classList.add('hidden');
    }
}



/* =====================================================
   SEARCH
===================================================== */

function searchData() {

    const keyword = document.getElementById('searchInput')
        .value.toLowerCase().trim();


    if (!document.getElementById('artsPage').classList.contains('hidden')) {

        const container = document.getElementById('artsContainer');
        container.innerHTML = '';

        const result = arts.filter(art => {

            const matchText =
                art.title.toLowerCase().includes(keyword) ||
                art.artist.toLowerCase().includes(keyword) ||
                art.category.toLowerCase().includes(keyword);

            const matchCat =
                currentCategory === 'all' ||
                art.category === currentCategory;

            return matchText && matchCat;
        });

        result.forEach(art => {
            container.innerHTML += `
                <button onclick="openArt('${art.id}')"
                        class="bg-[#F6FFEA] rounded-[25px] overflow-hidden
                               text-left card-hover
                               border border-[#C93638]/10">
                    <div class="relative">
                        <img src="${art.image}" class="w-full h-60 object-cover"
                             onerror="this.src='https://via.placeholder.com/400x240?text=No+Image'">
                        <span class="absolute top-4 left-4 px-3 py-1.5
                                     rounded-full bg-[#FFDE96]
                                     text-[#C93638] sans text-[10px]
                                     font-bold uppercase">
                            ${art.category}
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-[#C93638]">
                            ${art.title}
                        </h3>
                        <p class="sans text-xs text-[#2a1a1c]/50 mt-2">
                            by ${art.artist}
                        </p>
                    </div>
                </button>`;
        });

        if (!result.length) {
            container.innerHTML = `
                <div class="col-span-4 text-center py-20">
                    <p class="text-3xl text-[#62C4DA]">✦</p>
                    <p class="font-bold mt-3 text-[#C93638]">
                        No artwork found
                    </p>
                </div>`;
        }
    }


    if (!document.getElementById('artistsPage').classList.contains('hidden')) {

        const container = document.getElementById('artistsContainer');
        container.innerHTML = '';

        const result = artists.filter(a =>
            a.name.toLowerCase().includes(keyword) ||
            a.username.toLowerCase().includes(keyword)
        );

        result.forEach(artist => {

            const avatarHtml = getArtistAvatarHtml(artist.name, 'md');

            container.innerHTML += `
                <button onclick="openArtist('${artist.id}')"
                        class="bg-[#F6FFEA] rounded-[28px] p-6 text-left
                               card-hover border border-[#C93638]/10">
                    <div class="flex items-center gap-5">
                        ${avatarHtml}
                        <div>
                            <p class="sans text-[10px] uppercase
                                      tracking-[2px] text-[#62C4DA]">Artist</p>
                            <h3 class="text-xl font-bold mt-1 text-[#C93638]">
                                ${artist.name}
                            </h3>
                            <p class="sans text-xs text-[#2a1a1c]/50">
                                ${artist.username}
                            </p>
                        </div>
                    </div>
                    <div class="border-t border-[#C93638]/10 mt-5 pt-4
                                sans text-xs text-[#2a1a1c]/60">
                        ${artist.arts.length} artworks
                    </div>
                </button>`;
        });

        if (!result.length) {
            container.innerHTML = `
                <div class="col-span-3 text-center py-20">
                    <p class="text-3xl text-[#62C4DA]">✦</p>
                    <p class="font-bold mt-3 text-[#C93638]">
                        No artist found
                    </p>
                </div>`;
        }
    }
}



/* =====================================================
   MODAL HELPERS
===================================================== */

function openModal(id) {
    const m = document.getElementById(id);
    m.classList.remove('hidden');
    m.classList.add('flex');
}

function closeModal(id) {
    const m = document.getElementById(id);
    m.classList.add('hidden');
    m.classList.remove('flex');
}



/* =====================================================
   REFRESH
===================================================== */

function refreshAll() {
    buildArtists();
    renderDashboardArts();
    renderArts();
    renderArtists();
    renderPending();
    updateStatistics();
}



/* =====================================================
   ESC
===================================================== */

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        ['artModal','artistModal','rejectModal','deleteModal']
            .forEach(closeModal);
    }
});



/* =====================================================
   INITIAL
===================================================== */

loadPendingUsers();
refreshAll();

</script>

</body>
</html>