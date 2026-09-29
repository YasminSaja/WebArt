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

                {{-- Data admin yang login, dari tabel users. --}}
                <div class="w-10 h-10 rounded-full bg-[#FFDE96]
                            flex items-center justify-center
                            text-[#C93638] font-bold">
                    {{ \Illuminate\Support\Str::of(auth()->user()?->name ?? 'A')->substr(0, 1)->upper() }}
                </div>

                <div class="min-w-0">
                    <p class="font-bold text-sm text-[#F6FFEA]">
                        {{ auth()->user()?->name ?? 'Administrator' }}
                    </p>
                    <p class="sans text-[10px] text-[#FFDE96] truncate">
                        {{ auth()->user()?->email ?? '-' }}
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


            <!-- ===================================== -->
            <!-- LATEST ARTISTS + PENDING ACCOUNTS    -->
            <!-- =====================================
                 Dua daftar tambahan di dashboard:

                 1. Latest Artists   -> 4 artist yang paling
                    baru daftar (dari `artists`, yang isinya
                    hanya artist yang SUDAH approved).
                 2. Pending Accounts -> akun yang masih
                    menunggu persetujuan admin (dari
                    `pendingUsers` dengan status 'pending').

                 Semua diisi oleh renderDashboard(). -->

            <div class="grid grid-cols-2 gap-8 mt-12">

                <!-- LATEST ARTISTS -->
                <div>
                    <div class="flex justify-between items-end mb-5">
                        <div>
                            <p class="sans text-xs uppercase tracking-[2px]
                                      text-[#62C4DA]">
                                Community
                            </p>
                            <h2 class="text-2xl font-bold mt-1 text-[#C93638]">
                                Latest Artists
                            </h2>
                        </div>

                        <button onclick="showPage('artists')"
                                class="sans text-sm font-bold text-[#62C4DA]
                                       hover:text-[#C93638] transition">
                            View all →
                        </button>
                    </div>

                    <div id="dashboardArtists"
                         class="space-y-3"></div>
                </div>


                <!-- PENDING ACCOUNTS -->
                <div>
                    <div class="flex justify-between items-end mb-5">
                        <div>
                            <p class="sans text-xs uppercase tracking-[2px]
                                      text-[#62C4DA]">
                                Verification
                            </p>
                            <h2 class="text-2xl font-bold mt-1 text-[#C93638]">
                                Pending Accounts
                            </h2>
                        </div>

                        <button onclick="showPage('pending')"
                                class="sans text-sm font-bold text-[#62C4DA]
                                       hover:text-[#C93638] transition">
                            Review →
                        </button>
                    </div>

                    <div id="dashboardPending"
                         class="space-y-3"></div>
                </div>

            </div>

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

                {{--
                    Tombol filter kategori dibuat dari database
                    ($categories), bukan ditulis manual.

                    Kenapa? Supaya daftar kategori di sini sama
                    persis dengan tabel `kategoris` yang dipakai
                    user saat mengupload karya. Kalau tombolnya
                    manual, kategori baru tidak akan muncul.

                    JS: filterCategory(namaKategori)
                --}}
                <div id="categoryFilter"
                     class="flex gap-2 flex-wrap justify-end">

                    <button onclick="filterCategory('all')"
                            data-category="all"
                            class="category-btn px-5 py-2.5 rounded-full
                                   bg-[#C93638] text-white
                                   sans text-xs font-bold">
                        All
                    </button>

                    @foreach ($categories as $category)
                        <button onclick="filterCategory(@js($category->nama_kategori))"
                                data-category="{{ $category->nama_kategori }}"
                                class="category-btn px-5 py-2.5 rounded-full
                                       bg-[#F6FFEA] text-[#C93638]
                                       border border-[#C93638]/15
                                       sans text-xs font-bold">
                            {{ $category->nama_kategori }}
                        </button>
                    @endforeach

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

                {{-- Diisi oleh JS: tanggal + jam upload --}}
                <p id="detailArtDate"
                   class="sans text-xs text-[#2a1a1c]/40 mt-3">
                </p>

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

            <h2 id="artistProfileName"
                class="text-3xl font-bold mt-1 text-[#C93638]"></h2>

            <p id="artistProfileBio"
               class="sans text-sm leading-6 text-[#2a1a1c]/60 mt-4"></p>

            {{-- Diisi oleh JS: tanggal artist daftar --}}
            <p id="artistProfileJoined"
               class="sans text-xs text-[#2a1a1c]/40 mt-3"></p>

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
   FORMAT TANGGAL + JAM
=====================================================
   `art.date` dikirim dari server sebagai teks ISO 8601,
   contoh: "2026-09-29T02:23:55+00:00"

   Fungsi ini mengubahnya jadi tanggal LENGKAP dengan jam,
   mengikuti bahasa browser user. Contoh hasil:
       "29 September 2026 at 02.23"
   Kalau tanggalnya kosong / rusak -> "Unknown date".
===================================================== */

function formatDateTime(iso) {

    if (!iso) return "Unknown date";

    const date = new Date(iso);

    if (isNaN(date.getTime())) return "Unknown date";

    return date.toLocaleString(undefined, {
        day: "numeric",
        month: "long",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit"
    });
}



/* =====================================================
   GET ARTIST AVATAR HTML
===================================================== */

function getArtistAvatarHtml(artistName, size = "sm", photoUrl = "") {

    const hasPhoto = photoUrl && photoUrl.trim() !== "";


    /* Artist punya foto (dari database) → pakai foto */

    if (hasPhoto) {

        const sizes = {
            sm: "w-12 h-12",
            md: "w-20 h-20",
            lg: "w-28 h-28"
        };

        return `
            <img src="${photoUrl}"
                 alt="${artistName}"
                 class="${sizes[size]} rounded-full object-cover
                        border-2 border-white shadow-md">
        `;
    }


    /* Selain itu → inisial */

    return getInitialAvatar(artistName, size);
}



/* =====================================================
   DATA DASHBOARD ADMIN — SUMBERNYA DATABASE
=====================================================
   Data dummy (static + localStorage) sudah dihapus.

   Controller sudah mengirim 3 variabel ini:
       $pendingUsers, $approvedUsers, $rejectedUsers

   Sambungkan di file Blade ini:

       let arts         = [data dari $arts];
       let artists      = [data dari $artists];
       let pendingUsers = @json($pendingUsers);

   Bentuk art:
   { id, title, description, image, artist, artistId, category, date }

   Bentuk artist:
   { id, name, bio, photo, artworks, arts }

   CATATAN: tidak ada `username`. Project ini tidak memakai
   username, jadi jangan ditambah lagi.

   Catatan: approve / reject / hapus SEHARUSNYA dikirim ke
   server (route PATCH/DELETE + form submit atau fetch),
   bukan diubah langsung di JavaScript.
===================================================== */

let arts = @json($artsData);

let artists = @json($artistsData);

let pendingUsers = @json($usersData);



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

        /* Tandai tombol "All" sebagai yang aktif */
        renderCategoryButtons();

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
                    <p class="sans text-[10px] text-[#2a1a1c]/40 mt-2">
                        📅 ${formatDateTime(art.date)}
                    </p>
                </div>
            </button>`;
    });
}



/* =====================================================
   FILTER CATEGORY
=====================================================
   `cat` = "all" atau NAMA kategori dari tabel `kategoris`.
   Nilai ini sama dengan art.category, jadi pencocokannya
   memakai nama (bukan id), supaya konsisten dengan
   FrontendData::art().

   Setelah mengubah filter, jangan lupa panggil
   renderCategoryButtons() supaya tombol yang aktif
   kelihatan beda dari yang lain.
===================================================== */

function filterCategory(cat) {

    currentCategory = cat;

    renderCategoryButtons();
    renderArts();
}



/* =====================================================
   RENDER TOMBOL KATEGORI (tandai yang aktif)
=====================================================
   Tombolnya sudah dibuat Blade dari $categories.
   Fungsi ini hanya mengubah kelas CSS-nya supaya
   kategori yang sedang dipilih terlihat menonjol.
===================================================== */

function renderCategoryButtons() {

    const buttons = document.querySelectorAll('#categoryFilter button');

    buttons.forEach(function (button) {

        const isActive = button.dataset.category === currentCategory;

        button.className = isActive
            ? "category-btn px-5 py-2.5 rounded-full " +
              "bg-[#C93638] text-white sans text-xs font-bold"
            : "category-btn px-5 py-2.5 rounded-full " +
              "bg-[#F6FFEA] text-[#C93638] border " +
              "border-[#C93638]/15 sans text-xs font-bold";

    });
}



/* =====================================================
   RENDER ARTISTS (pakai inisial)
===================================================== */

function renderArtists() {

    const container = document.getElementById('artistsContainer');
    container.innerHTML = '';

    artists.forEach(artist => {

        /* Argumen ke-3 = URL foto profil.
           Dulu kosong, jadi kartu selalu cuma menampilkan
           inisial. Profildnya baru terlihat setelah artist
           diklik (di modal). Sekarang langsung tampil. */
        const avatarHtml = getArtistAvatarHtml(
            artist.name, 'md', artist.photo || ''
        );

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
                    <p class="sans text-[10px] text-[#2a1a1c]/40 mt-1">
                        📅 ${formatDateTime(art.date)}
                    </p>
                </div>
            </button>`;
    });
}



/* =====================================================
   DASHBOARD — LATEST ARTISTS
=====================================================
   4 artist yang paling baru daftar.

   `artists` sudah difilter di server (hanya status
   'approved'), jadi di sini tidak perlu cek status lagi.
   Semua artist sudah diurutkan dari yang terbaru oleh
   AdminController (`->latest()`), tapi kita urutkan ulang
   saja biar aman kalau nanti urutan datanya berubah.
===================================================== */

function renderDashboardArtists() {

    const container = document.getElementById('dashboardArtists');
    container.innerHTML = '';

    const latest = [...artists]
        .sort((a, b) => new Date(b.date) - new Date(a.date))
        .slice(0, 4);


    if (!latest.length) {
        container.innerHTML = `
            <div class="bg-[#F6FFEA] rounded-[25px] p-8 text-center
                        border border-[#C93638]/10">
                <p class="text-3xl text-[#62C4DA]">✦</p>
                <p class="font-bold mt-2 text-[#C93638]">
                    No artists yet
                </p>
            </div>`;
        return;
    }

    latest.forEach(artist => {

        /* Argumen ke-3 = foto profil, supaya tidak cuma inisial. */
        const avatarHtml = getArtistAvatarHtml(
            artist.name, 'sm', artist.photo || ''
        );

        container.innerHTML += `
            <button onclick="openArtist('${artist.id}')"
                    class="w-full flex items-center gap-4 text-left
                           bg-[#F6FFEA] rounded-[20px] p-4
                           card-hover border border-[#C93638]/10">

                ${avatarHtml}

                <div class="min-w-0 flex-1">
                    <h3 class="font-bold text-[#C93638] truncate">
                        ${artist.name}
                    </h3>
                    <p class="sans text-[10px] text-[#2a1a1c]/50 mt-0.5 truncate">
                        📅 Daftar ${formatDateTime(artist.date)}
                    </p>
                </div>

                <div class="text-right flex-shrink-0">
                    <p class="font-bold text-[#C93638] text-lg">
                        ${artist.artworks}
                    </p>
                    <p class="sans text-[9px] text-[#2a1a1c]/40">
                        artworks
                    </p>
                </div>

            </button>`;
    });
}



/* =====================================================
   DASHBOARD — PENDING ACCOUNTS
=====================================================
   Akun yang daftar tapi belum disetujui admin.
   Diambil dari `pendingUsers` dengan status 'pending'.

   Tombolnya langsung memanggil askApprove / askReject
   supaya admin bisa menyetujui dari dashboard tanpa
   pindah halaman.
===================================================== */

function renderDashboardPending() {

    const container = document.getElementById('dashboardPending');
    container.innerHTML = '';

    const pending = pendingUsers.filter(u => u.status === 'pending');


    if (!pending.length) {
        container.innerHTML = `
            <div class="bg-[#F6FFEA] rounded-[25px] p-8 text-center
                        border border-[#C93638]/10">
                <p class="text-3xl text-[#62C4DA]">✦</p>
                <p class="font-bold mt-2 text-[#C93638]">
                    Nothing to review
                </p>
                <p class="sans text-xs text-[#2a1a1c]/50 mt-1">
                    Semua pendaftaran sudah ditinjau.
                </p>
            </div>`;
        return;
    }

    pending.slice(0, 4).forEach(user => {

        container.innerHTML += `
            <div class="flex items-center gap-4
                        bg-[#F6FFEA] rounded-[20px] p-4
                        border border-[#C93638]/10">

                <div class="w-11 h-11 rounded-full flex-shrink-0
                            bg-gradient-to-br
                            from-[#62C4DA] to-[#C93638]
                            flex items-center justify-center
                            text-white font-bold">
                    ${(user.nama || '?').charAt(0).toUpperCase()}
                </div>

                <div class="min-w-0 flex-1">
                    <h3 class="font-bold text-[#C93638] truncate">
                        ${user.nama || 'Unknown'}
                    </h3>
                    <p class="sans text-[10px] text-[#62C4DA] truncate">
                        ${user.email}
                    </p>
                    <p class="sans text-[9px] text-[#2a1a1c]/40 mt-0.5">
                        📅 Daftar ${formatDateTime(user.tanggal)}
                    </p>
                </div>

                <div class="flex gap-2 flex-shrink-0">
                    <button onclick="rejectUser('${user.id}')"
                            title="Tolak"
                            class="w-9 h-9 rounded-full
                                   bg-[#FFDE96] text-[#C93638]
                                   hover:opacity-80 transition">
                        ✕
                    </button>
                    <button onclick="approveUser('${user.id}')"
                            title="Setujui"
                            class="w-9 h-9 rounded-full
                                   bg-[#C93638] text-white
                                   hover:opacity-80 transition">
                        ✓
                    </button>
                </div>

            </div>`;
    });

    /* Kalau pending lebih dari 4, tambahkan baris info. */
    if (pending.length > 4) {
        container.innerHTML += `
            <p class="sans text-xs text-[#2a1a1c]/50 text-center pt-1">
                + ${pending.length - 4} lainnya menunggu
            </p>`;
    }
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


    /* Tanggal + jam upload */

    document.getElementById('detailArtDate').textContent =
        '📅 ' + formatDateTime(art.date);


    /* Semua elemen modal dikosongkan dulu, supaya tidak ada
       data artist sebelumnya yang nyangkut kalau artwork ini
       somehow tidak punya artist. */
    const detailName = document.getElementById('detailArtistName');
    const detailAvatar = document.getElementById('detailArtistAvatar');
    const detailButton = document.getElementById('detailArtArtist');

    detailName.textContent = '';
    detailAvatar.innerHTML = '';
    detailButton.onclick = null;


    if (artist) {

        detailName.textContent = artist.name;

        /* Avatar: pakai foto kalau ada, kalau tidak pakai inisial.
           CATATAN: element #detailArtistAvatar SELALU ada di HTML
           dan tidak pernah diganti, jadi kita hanya mengisi
           isinya (innerHTML). Kalau sebelumnya dipakai
           outerHTML, element-nya akan hilang / id-nya berubah
           sehingga avatar tidak muncul lagi saat artist diganti. */
        detailAvatar.innerHTML =
            getArtistAvatarHtml(artist.name, 'sm', artist.photo || '');

        /* Klik kartu artist -> buka profil artist tersebut */

        detailButton.onclick = function () {
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

    /* Avatar: pakai foto kalau ada, kalau tidak pakai inisial.

       PENTING: element #artistProfileAvatar SELALU ada di HTML
       dan tidak pernah diganti — kita hanya mengisi isinya
       (innerHTML).

       Dulu halaman ini memakai outerHTML, yang berarti element
       aslinya DIHAPUS lalu diganti element baru tanpa id.
       Setelah itu document.getElementById('artistProfileAvatar')
       kadang tidak menemukan apa-apa, sehingga avatar (dan
       profilnya) tidak muncul lagi begitu artist diganti. */
    const avatarBox = document.getElementById('artistProfileAvatar');

    avatarBox.innerHTML =
        getArtistAvatarHtml(artist.name, 'lg', artist.photo || '');


    document.getElementById('artistProfileName').textContent = artist.name;
    document.getElementById('artistProfileBio').textContent = artist.bio;

    /* Tanggal daftar artist */

    const joinedBox = document.getElementById('artistProfileJoined');

    if (joinedBox) {
        joinedBox.textContent = '📅 ' + formatDateTime(artist.date);
    }

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

    const url = deleteType === 'art'
        ? `{{ url('/admin/arts') }}/${deleteId}`
        : `{{ url('/admin/users') }}/${deleteId}`;

    fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
        .then(r => r.json().then(data => ({ ok: r.ok, data })))
        .then(({ ok, data }) => {

            if (!ok) {
                alert(data.message || 'Gagal hapus.');
                return;
            }

            if (deleteType === 'art') {
                arts = arts.filter(a => String(a.id) !== String(deleteId));
            } else {
                arts = arts.filter(a => String(a.artistId) !== String(deleteId));
                artists = artists.filter(a => String(a.id) !== String(deleteId));
                pendingUsers = pendingUsers.filter(u => String(u.id) !== String(deleteId));
            }

            closeModal('deleteModal');

            currentArtId = null;
            currentArtistId = null;
            deleteType = null;
            deleteId = null;

            refreshAll();
        });
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
   Catatan: ini hanya mengubah tampilan. Kirim PATCH ke
   server (route admin.users.approve / admin.users.reject),
   lalu reload halaman supaya data kembali dari database.
===================================================== */

function approveUser(userId) {

    const user = pendingUsers.find(
        u => String(u.id) === String(userId)
    );
    if (!user) return;

    fetch(`{{ url('/admin/users') }}/${userId}/approve`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
        .then(r => r.json().then(data => ({ ok: r.ok, data })))
        .then(({ ok, data }) => {

            if (!ok) {
                alert(data.message || 'Gagal approve.');
                return;
            }

            user.status = 'approved';

            /* refreshAll() supaya semua bagian ikut ter-update:
               daftar pending, badge, statistik, dan dua daftar
               baru di dashboard (Latest Artists / Pending). */
            refreshAll();

            alert(`✓ ${user.nama} berhasil di-approve.`);
        });
}


function rejectUser(userId) {
    currentPendingId = userId;
    document.getElementById('rejectReason').value = '';
    openModal('rejectModal');
}


function confirmReject() {

    const user = pendingUsers.find(
        u => String(u.id) === String(currentPendingId)
    );
    if (!user) return;

    const reason =
        document.getElementById('rejectReason').value.trim();

    if (!reason) {
        alert('Alasan penolakan wajib diisi.');
        return;
    }

    fetch(`{{ url('/admin/users') }}/${currentPendingId}/reject`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ reason: reason })
    })
        .then(r => r.json().then(data => ({ ok: r.ok, data })))
        .then(({ ok, data }) => {

            if (!ok) {
                alert(data.message || 'Gagal tolak.');
                return;
            }

            user.status = 'rejected';
            user.rejectionReason = reason;

            closeModal('rejectModal');
            /* Sama seperti approve: update semua bagian. */
            refreshAll();

            alert(`✕ ${user.nama} ditolak.`);
        });
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
                        <p class="sans text-[10px] text-[#2a1a1c]/40 mt-2">
                            📅 ${formatDateTime(art.date)}
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

        /* Pencarian hanya berdasarkan nama (tidak ada username). */
        const result = artists.filter(a =>
            a.name.toLowerCase().includes(keyword)
        );

        result.forEach(artist => {

            /* Sama seperti di atas: ikut kirim foto profil. */
            const avatarHtml = getArtistAvatarHtml(
                artist.name, 'md', artist.photo || ''
            );

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
    renderDashboardArts();
    renderDashboardArtists();
    renderDashboardPending();
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

/* Data sudah dimuat dari database (lihat blok
   "DATA DASHBOARD ADMIN" di atas) — tidak ada
   localStorage / dummy lagi. */

refreshAll();

</script>

</body>
</html>