<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Createopia Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            scrollbar-width: thin;
            scrollbar-color: #3E4B8E #FFF4EB;
        }

        body {
            font-family: Georgia, "Times New Roman", serif;
        }

        .sans {
            font-family: Arial, Helvetica, sans-serif;
        }

        .glass {
            background: rgba(255, 244, 235, 0.90);
            backdrop-filter: blur(14px);
        }

        .card-hover {
            transition: all .25s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(61, 21, 52, .12);
        }

        .modal {
            animation: fadeIn .2s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(.97);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>


<body class="min-h-screen bg-[#F6E9DC] text-[#3D1534]">


    <!-- ================= BACKGROUND ================= -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -top-40 -left-40 w-[500px] h-[500px] rounded-full bg-[#A6BCC9]/40 blur-3xl">
        </div>

        <div
            class="absolute top-1/3 -right-40 w-[500px] h-[500px] rounded-full bg-[#3E4B8E]/20 blur-3xl">
        </div>

        <div
            class="absolute bottom-0 left-1/3 w-[450px] h-[450px] rounded-full bg-[#F6E0B6]/60 blur-3xl">
        </div>

    </div>


    <!-- ================= SIDEBAR ================= -->

    <aside
        class="fixed left-0 top-0 h-screen w-64 bg-[#3D1534] text-[#FFF4EB] flex flex-col z-40">


        <!-- LOGO -->

        <div class="px-7 pt-8 pb-8">

            <div class="flex items-center gap-3">

                <div
                    class="w-11 h-11 rounded-2xl bg-[#FFF4EB] flex items-center justify-center text-[#3E4B8E] text-2xl">
                    ✦
                </div>

                <div>

                    <h1 class="text-2xl font-bold">
                        Createopia
                    </h1>

                    <p class="sans text-[10px] uppercase tracking-[3px] opacity-60">
                        Admin
                    </p>

                </div>

            </div>

        </div>


        <!-- NAVIGATION -->

        <nav class="px-4 space-y-2 flex-1">


            <!-- DASHBOARD -->

            <button
                onclick="showPage('dashboard')"
                id="dashboardBtn"
                class="menu-btn w-full flex items-center gap-4 px-4 py-3 rounded-2xl bg-[#3E4B8E]">

                <span class="text-xl">
                    ⌂
                </span>

                <span class="sans text-sm font-semibold">
                    Dashboard
                </span>

            </button>


            <!-- ARTS -->

            <button
                onclick="showPage('arts')"
                id="artsBtn"
                class="menu-btn w-full flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10">

                <span class="text-xl">
                    ▧
                </span>

                <span class="sans text-sm font-semibold">
                    Arts
                </span>

            </button>


            <!-- ARTISTS -->

            <button
                onclick="showPage('artists')"
                id="artistsBtn"
                class="menu-btn w-full flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-white/10">

                <span class="text-xl">
                    ♙
                </span>

                <span class="sans text-sm font-semibold">
                    Artists
                </span>

            </button>

        </nav>


        <!-- ADMIN -->

        <div class="p-4">

            <div class="border-t border-white/10 pt-4">

                <div class="flex items-center gap-3 px-3 py-3">

                    <div
                        class="w-10 h-10 rounded-full bg-[#A6BCC9] flex items-center justify-center text-[#3D1534] font-bold">
                        A
                    </div>

                    <div class="min-w-0">

                        <p class="font-bold text-sm">
                            Administrator
                        </p>

                        <p class="sans text-[10px] opacity-50 truncate">
                            admin@createopia.com
                        </p>

                    </div>

                </div>


                <!-- LOGOUT -->

                <a
                    href="{{ route('login') }}"
                    class="mt-2 w-full flex items-center gap-4 px-4 py-3 rounded-2xl hover:bg-red-500/20">

                    <span>
                        ↪
                    </span>

                    <span class="sans text-sm font-semibold">
                        Logout
                    </span>

                </a>

            </div>

        </div>

    </aside>



    <!-- ================= MAIN ================= -->

    <main class="ml-64 min-h-screen">


        <!-- TOP BAR -->

        <header
            class="sticky top-0 z-30 glass border-b border-[#3D1534]/10 px-10 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                        Createopia
                    </p>

                    <h2
                        id="pageTitle"
                        class="text-3xl font-bold mt-1">
                        Dashboard
                    </h2>

                </div>


                <!-- SEARCH -->

                <div class="flex items-center gap-4">

                    <div class="relative">

                        <span
                            class="absolute left-4 top-1/2 -translate-y-1/2 opacity-40">
                            ⌕
                        </span>

                        <input
                            id="searchInput"
                            oninput="searchData()"
                            type="text"
                            placeholder="Search..."
                            class="sans w-64 rounded-full bg-white/70 border border-[#3D1534]/10 pl-10 pr-5 py-3 text-sm outline-none focus:ring-2 focus:ring-[#3E4B8E]/30">

                    </div>


                    <div
                        class="w-11 h-11 rounded-full bg-[#3E4B8E] text-white flex items-center justify-center font-bold">
                        A
                    </div>

                </div>

            </div>

        </header>



        <!-- ================= CONTENT ================= -->

        <div class="p-10">


            <!-- ================================================= -->
            <!-- DASHBOARD -->
            <!-- ================================================= -->

            <section id="dashboardPage">


                <!-- WELCOME -->

                <div
                    class="rounded-[30px] bg-[#FFF4EB] p-9 mb-8 relative overflow-hidden">

                    <div class="relative z-10">

                        <p class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                            Welcome back
                        </p>

                        <h1 class="text-4xl font-bold mt-2">
                            Createopia Admin
                        </h1>

                        <p class="sans text-sm text-[#3D1534]/60 mt-3 max-w-xl">
                            Manage artworks and artists in the Createopia creative community.
                        </p>

                    </div>


                    <div
                        class="absolute -right-10 -bottom-20 text-[230px] text-[#3E4B8E]/10">
                        ✦
                    </div>

                </div>



                <!-- ================= STATISTICS ================= -->

                <div class="grid grid-cols-4 gap-5 mb-10">


                    <!-- ARTS -->

                    <div
                        class="bg-[#FFF4EB] rounded-[25px] p-6 card-hover">

                        <p class="sans text-xs uppercase tracking-wider opacity-50">
                            Total Arts
                        </p>

                        <div class="flex justify-between items-end mt-3">

                            <p
                                id="artsCount"
                                class="text-4xl font-bold">
                                0
                            </p>

                            <span class="text-2xl">
                                ✦
                            </span>

                        </div>

                    </div>


                    <!-- ARTISTS -->

                    <div
                        class="bg-[#A6BCC9] rounded-[25px] p-6 card-hover">

                        <p class="sans text-xs uppercase tracking-wider opacity-60">
                            Artists
                        </p>

                        <div class="flex justify-between items-end mt-3">

                            <p
                                id="artistsCount"
                                class="text-4xl font-bold">
                                0
                            </p>

                            <span class="text-2xl">
                                ♙
                            </span>

                        </div>

                    </div>


                    <!-- DIGITAL -->

                    <div
                        class="bg-[#3E4B8E] text-white rounded-[25px] p-6 card-hover">

                        <p class="sans text-xs uppercase tracking-wider opacity-60">
                            Digital
                        </p>

                        <div class="flex justify-between items-end mt-3">

                            <p
                                id="digitalCount"
                                class="text-4xl font-bold">
                                0
                            </p>

                            <span class="text-2xl">
                                ◈
                            </span>

                        </div>

                    </div>


                    <!-- TRADITIONAL -->

                    <div
                        class="bg-[#F6E0B6] rounded-[25px] p-6 card-hover">

                        <p class="sans text-xs uppercase tracking-wider opacity-60">
                            Traditional
                        </p>

                        <div class="flex justify-between items-end mt-3">

                            <p
                                id="traditionalCount"
                                class="text-4xl font-bold">
                                0
                            </p>

                            <span class="text-2xl">
                                ✎
                            </span>

                        </div>

                    </div>

                </div>



                <!-- ================= LATEST ================= -->

                <div class="flex justify-between items-end mb-5">

                    <div>

                        <p class="sans text-xs uppercase tracking-[2px] text-[#3E4B8E]">
                            Recently uploaded
                        </p>

                        <h2 class="text-2xl font-bold mt-1">
                            Latest Arts
                        </h2>

                    </div>


                    <button
                        onclick="showPage('arts')"
                        class="sans text-sm font-bold text-[#3E4B8E]">
                        View all →
                    </button>

                </div>


                <div
                    id="dashboardArts"
                    class="grid grid-cols-4 gap-5">
                </div>

            </section>



            <!-- ================================================= -->
            <!-- ARTS PAGE -->
            <!-- ================================================= -->

            <section
                id="artsPage"
                class="hidden">


                <div class="flex justify-between items-end mb-8">

                    <div>

                        <p class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                            Management
                        </p>

                        <h2 class="text-3xl font-bold">
                            Arts
                        </h2>

                    </div>


                    <!-- CATEGORY FILTER -->

                    <div class="flex gap-2">

                        <button
                            onclick="filterCategory('all')"
                            class="category-btn px-5 py-2.5 rounded-full bg-[#3D1534] text-white sans text-xs font-bold">
                            All
                        </button>

                        <button
                            onclick="filterCategory('Digital')"
                            class="category-btn px-5 py-2.5 rounded-full bg-[#FFF4EB] sans text-xs font-bold">
                            Digital
                        </button>

                        <button
                            onclick="filterCategory('Traditional')"
                            class="category-btn px-5 py-2.5 rounded-full bg-[#FFF4EB] sans text-xs font-bold">
                            Traditional
                        </button>

                    </div>

                </div>


                <div
                    id="artsContainer"
                    class="grid grid-cols-4 gap-6">
                </div>

            </section>



            <!-- ================================================= -->
            <!-- ARTISTS PAGE -->
            <!-- ================================================= -->

            <section
                id="artistsPage"
                class="hidden">


                <div class="mb-8">

                    <p class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                        Community
                    </p>

                    <h2 class="text-3xl font-bold">
                        Artists
                    </h2>

                    <p class="sans text-sm text-[#3D1534]/50 mt-2">
                        Manage artists and view their creative profiles.
                    </p>

                </div>


                <div
                    id="artistsContainer"
                    class="grid grid-cols-3 gap-6">
                </div>

            </section>

        </div>

    </main>



    <!-- ========================================================= -->
    <!-- ART DETAIL MODAL -->
    <!-- ========================================================= -->

    <div
        id="artModal"
        class="fixed inset-0 bg-[#3D1534]/60 backdrop-blur-sm z-50 hidden items-center justify-center p-6">

        <div
            class="modal bg-[#FFF4EB] rounded-[30px] w-full max-w-4xl overflow-hidden shadow-2xl">


            <div class="grid grid-cols-2">


                <!-- IMAGE -->

                <div class="h-[540px]">

                    <img
                        id="detailArtImage"
                        class="w-full h-full object-cover">

                </div>


                <!-- INFORMATION -->

                <div class="p-9 relative">

                    <button
                        onclick="closeModal('artModal')"
                        class="absolute right-6 top-6 w-10 h-10 rounded-full bg-[#F6E0B6]">
                        ×
                    </button>


                    <p
                        id="detailArtCategory"
                        class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                        Digital
                    </p>


                    <h2
                        id="detailArtTitle"
                        class="text-4xl font-bold mt-4 pr-10">
                        Artwork
                    </h2>


                    <div class="mt-7">

                        <p class="sans text-xs uppercase tracking-[2px] opacity-40">
                            Description
                        </p>

                        <p
                            id="detailArtDescription"
                            class="sans text-sm leading-7 text-[#3D1534]/65 mt-3">
                        </p>

                    </div>


                    <!-- ARTIST -->

                    <div
                        class="border-t border-[#3D1534]/10 mt-7 pt-6">

                        <p class="sans text-xs uppercase tracking-[2px] opacity-40">
                            Artist
                        </p>


                        <button
                            id="detailArtArtist"
                            class="flex items-center gap-3 mt-3 text-left group">

                            <img
                                id="detailArtistImage"
                                class="w-12 h-12 rounded-full object-cover">

                            <div>

                                <p
                                    id="detailArtistName"
                                    class="font-bold group-hover:text-[#3E4B8E]">
                                </p>

                                <p
                                    id="detailArtistUsername"
                                    class="sans text-xs opacity-50">
                                </p>

                            </div>

                        </button>

                    </div>


                    <!-- MANAGE -->

                    <button
                        onclick="openManageArt()"
                        class="absolute bottom-8 left-9 right-9 py-3.5 rounded-full bg-[#3D1534] text-white sans text-sm font-bold hover:bg-[#3E4B8E] transition">

                        ⚙ Manage Art

                    </button>

                </div>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- MANAGE ART MODAL -->
    <!-- ========================================================= -->

    <div
        id="manageArtModal"
        class="fixed inset-0 bg-[#3D1534]/60 backdrop-blur-sm z-[60] hidden items-center justify-center p-6">

        <div
            class="modal bg-[#FFF4EB] rounded-[30px] w-full max-w-md p-8">

            <div class="flex justify-between items-start">

                <div>

                    <p class="sans text-xs uppercase tracking-[3px] text-[#3E4B8E]">
                        Management
                    </p>

                    <h2 class="text-3xl font-bold mt-1">
                        Manage Art
                    </h2>

                </div>


                <button
                    onclick="closeModal('manageArtModal')"
                    class="w-10 h-10 rounded-full bg-[#F6E0B6]">
                    ×
                </button>

            </div>


            <!-- EDIT -->

            <div class="mt-8 space-y-4">

                <label class="sans text-xs uppercase tracking-wider opacity-50">
                    Art Name
                </label>

                <input
                    id="editArtTitle"
                    class="w-full rounded-2xl bg-white border border-[#3D1534]/10 px-5 py-3 outline-none">

            </div>


            <div class="mt-5">

                <label class="sans text-xs uppercase tracking-wider opacity-50">
                    Description
                </label>

                <textarea
                    id="editArtDescription"
                    rows="4"
                    class="w-full mt-2 rounded-2xl bg-white border border-[#3D1534]/10 px-5 py-3 outline-none resize-none"></textarea>

            </div>


            <!-- CATEGORY -->

            <div class="mt-5">

                <label class="sans text-xs uppercase tracking-wider opacity-50">
                    Category
                </label>

                <select
                    id="editArtCategory"
                    class="w-full mt-2 rounded-2xl bg-white border border-[#3D1534]/10 px-5 py-3 outline-none">

                    <option value="Digital">
                        Digital
                    </option>

                    <option value="Traditional">
                        Traditional
                    </option>

                </select>

            </div>


            <div class="grid grid-cols-2 gap-3 mt-8">

                <button
                    onclick="deleteCurrentArt()"
                    class="py-3 rounded-full bg-red-600 text-white sans text-sm font-bold">
                    Delete
                </button>


                <button
                    onclick="saveArtChanges()"
                    class="py-3 rounded-full bg-[#3D1534] text-white sans text-sm font-bold">
                    Save Changes
                </button>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- ARTIST PROFILE MODAL -->
    <!-- ========================================================= -->

    <div
        id="artistModal"
        class="fixed inset-0 bg-[#3D1534]/60 backdrop-blur-sm z-50 hidden items-center justify-center p-6">

        <div
            class="modal bg-[#FFF4EB] rounded-[30px] w-full max-w-xl max-h-[90vh] overflow-y-auto shadow-2xl">


            <!-- COVER -->

            <div class="h-32 bg-[#A6BCC9] relative">

                <button
                    onclick="closeModal('artistModal')"
                    class="absolute right-5 top-5 w-10 h-10 rounded-full bg-white/70">
                    ×
                </button>

            </div>


            <div class="px-8 pb-8">


                <!-- PROFILE IMAGE -->

                <img
                    id="artistProfileImage"
                    class="w-28 h-28 rounded-full object-cover border-8 border-[#FFF4EB] -mt-14">


                <p
                    id="artistProfileUsername"
                    class="sans text-xs uppercase tracking-[2px] text-[#3E4B8E] mt-4">
                </p>


                <h2
                    id="artistProfileName"
                    class="text-3xl font-bold mt-1">
                </h2>


                <p
                    id="artistProfileBio"
                    class="sans text-sm leading-6 text-[#3D1534]/60 mt-4">
                </p>


                <!-- WORKS -->

                <div class="mt-8">

                    <p class="sans text-xs uppercase tracking-[2px] opacity-40">
                        Artworks
                    </p>


                    <div
                        id="artistWorks"
                        class="grid grid-cols-3 gap-3 mt-4">
                    </div>

                </div>


                <!-- DELETE -->

                <button
                    onclick="deleteCurrentArtist()"
                    class="mt-8 w-full py-3.5 rounded-full bg-red-600 text-white sans text-sm font-bold">
                    Delete Artist
                </button>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- DELETE CONFIRMATION -->
    <!-- ========================================================= -->

    <div
        id="deleteModal"
        class="fixed inset-0 bg-[#3D1534]/70 backdrop-blur-sm z-[70] hidden items-center justify-center p-6">

        <div
            class="modal bg-[#FFF4EB] rounded-[28px] p-8 max-w-sm w-full text-center">

            <div
                class="w-16 h-16 rounded-full bg-[#F6E0B6] mx-auto flex items-center justify-center text-2xl">
                !
            </div>


            <h2 class="text-2xl font-bold mt-5">
                Delete this?
            </h2>


            <p class="sans text-sm text-[#3D1534]/60 mt-3 leading-6">
                This is currently a frontend simulation.
                The real delete function can later be connected to your database.
            </p>


            <div class="grid grid-cols-2 gap-3 mt-7">

                <button
                    onclick="closeModal('deleteModal')"
                    class="py-3 rounded-full border border-[#3D1534]/20 sans text-sm font-bold">
                    Cancel
                </button>


                <button
                    onclick="confirmDelete()"
                    class="py-3 rounded-full bg-red-600 text-white sans text-sm font-bold">
                    Delete
                </button>

            </div>

        </div>

    </div>



<script>

    /* ========================================================= */
    /* DATA SEMENTARA */
    /* ========================================================= */

    let artists = [

        {
            id: 1,
            name: "Aetheria Vane",
            username: "@aetheriavane",
            bio: "Digital artist creating dreamy worlds and magical characters.",
            image: "https://i.pravatar.cc/400?img=47"
        },

        {
            id: 2,
            name: "Kaelen Bryce",
            username: "@kaelenbryce",
            bio: "Character artist exploring fantasy, nature and storytelling.",
            image: "https://i.pravatar.cc/400?img=12"
        },

        {
            id: 3,
            name: "Elora Mae",
            username: "@eloramae",
            bio: "Illustrator focused on colorful characters and visual stories.",
            image: "https://i.pravatar.cc/400?img=32"
        },

        {
            id: 4,
            name: "Arven",
            username: "@arvenart",
            bio: "Concept artist and illustrator.",
            image: "https://i.pravatar.cc/400?img=11"
        },

        {
            id: 5,
            name: "Lunara",
            username: "@lunara",
            bio: "Fantasy illustrator.",
            image: "https://i.pravatar.cc/400?img=44"
        },

        {
            id: 6,
            name: "Mira Sol",
            username: "@mirasol",
            bio: "Visual artist and character designer.",
            image: "https://i.pravatar.cc/400?img=45"
        }

    ];


    let arts = [

        {
            id: 1,
            title: "Moonlit Dream",
            category: "Digital",
            artistId: 1,
            artist: "Aetheria Vane",
            description: "A dreamy digital artwork inspired by moonlight and fantasy.",
            image: "https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=1000&q=80"
        },

        {
            id: 2,
            title: "Forest Spirit",
            category: "Traditional",
            artistId: 2,
            artist: "Kaelen Bryce",
            description: "A traditional artwork featuring a mysterious spirit surrounded by nature.",
            image: "https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=1000&q=80"
        },

        {
            id: 3,
            title: "Blue Serenity",
            category: "Digital",
            artistId: 3,
            artist: "Elora Mae",
            description: "A calm digital composition using soft blue tones.",
            image: "https://images.unsplash.com/photo-1541701494587-cb58502866ab?auto=format&fit=crop&w=1000&q=80"
        },

        {
            id: 4,
            title: "Starlight",
            category: "Traditional",
            artistId: 4,
            artist: "Arven",
            description: "A traditional illustration of a character standing beneath the stars.",
            image: "https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1000&q=80"
        },

        {
            id: 5,
            title: "Golden Hour",
            category: "Digital",
            artistId: 5,
            artist: "Lunara",
            description: "A digital illustration inspired by warm golden light.",
            image: "https://images.unsplash.com/photo-1518005020951-eccb494ad742?auto=format&fit=crop&w=1000&q=80"
        },

        {
            id: 6,
            title: "Quiet Garden",
            category: "Traditional",
            artistId: 6,
            artist: "Mira Sol",
            description: "A traditional artwork portraying a peaceful garden.",
            image: "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1000&q=80"
        }

    ];


    let currentArtId = null;
    let currentArtistId = null;

    let deleteType = null;
    let deleteId = null;

    let currentCategory = "all";



    /* ========================================================= */
    /* PAGE NAVIGATION */
    /* ========================================================= */

    function showPage(page) {

        document.getElementById("dashboardPage").classList.add("hidden");
        document.getElementById("artsPage").classList.add("hidden");
        document.getElementById("artistsPage").classList.add("hidden");


        document.querySelectorAll(".menu-btn").forEach(button => {
            button.classList.remove("bg-[#3E4B8E]");
        });


        if (page === "dashboard") {

            document.getElementById("dashboardPage").classList.remove("hidden");

            document.getElementById("dashboardBtn")
                .classList.add("bg-[#3E4B8E]");

            document.getElementById("pageTitle").textContent =
                "Dashboard";

            document.getElementById("searchInput").value = "";

        }


        if (page === "arts") {

            document.getElementById("artsPage").classList.remove("hidden");

            document.getElementById("artsBtn")
                .classList.add("bg-[#3E4B8E]");

            document.getElementById("pageTitle").textContent =
                "Arts";

            document.getElementById("searchInput").value = "";

            currentCategory = "all";

            renderArts();

        }


        if (page === "artists") {

            document.getElementById("artistsPage").classList.remove("hidden");

            document.getElementById("artistsBtn")
                .classList.add("bg-[#3E4B8E]");

            document.getElementById("pageTitle").textContent =
                "Artists";

            document.getElementById("searchInput").value = "";

            renderArtists();

        }

    }



    /* ========================================================= */
    /* RENDER ARTS */
    /* ========================================================= */

    function renderArts() {

        const container =
            document.getElementById("artsContainer");

        container.innerHTML = "";


        let filteredArts = arts;


        if (currentCategory !== "all") {

            filteredArts = arts.filter(
                art => art.category === currentCategory
            );

        }


        if (filteredArts.length === 0) {

            container.innerHTML = `

                <div class="col-span-4 py-20 text-center">

                    <p class="text-4xl">
                        ✦
                    </p>

                    <h3 class="text-xl font-bold mt-4">
                        No artworks found
                    </h3>

                    <p class="sans text-sm opacity-50 mt-2">
                        There are no artworks in this category.
                    </p>

                </div>

            `;

            return;
        }


        filteredArts.forEach(art => {

            container.innerHTML += `

                <button
                    onclick="openArt(${art.id})"
                    class="bg-[#FFF4EB] rounded-[25px] overflow-hidden text-left card-hover">

                    <div class="relative">

                        <img
                            src="${art.image}"
                            class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4 px-3 py-1.5 rounded-full bg-[#FFF4EB]/90 sans text-[10px] font-bold uppercase tracking-wider">

                            ${art.category}

                        </span>

                    </div>


                    <div class="p-5">

                        <h3 class="text-xl font-bold">
                            ${art.title}
                        </h3>

                        <p class="sans text-xs opacity-50 mt-2">
                            by ${art.artist}
                        </p>

                    </div>

                </button>

            `;

        });

    }



    /* ========================================================= */
    /* FILTER CATEGORY */
    /* ========================================================= */

    function filterCategory(category) {

        currentCategory = category;

        renderArts();

    }



    /* ========================================================= */
    /* RENDER ARTISTS */
    /* ========================================================= */

    function renderArtists() {

        const container =
            document.getElementById("artistsContainer");

        container.innerHTML = "";


        artists.forEach(artist => {

            const artistArts =
                arts.filter(
                    art => art.artistId === artist.id
                );


            container.innerHTML += `

                <button
                    onclick="openArtist(${artist.id})"
                    class="bg-[#FFF4EB] rounded-[28px] p-6 text-left card-hover">

                    <div class="flex items-center gap-5">

                        <img
                            src="${artist.image}"
                            class="w-20 h-20 rounded-full object-cover">

                        <div>

                            <p class="sans text-[10px] uppercase tracking-[2px] text-[#3E4B8E]">
                                Artist
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                ${artist.name}
                            </h3>

                            <p class="sans text-xs opacity-50">
                                ${artist.username}
                            </p>

                        </div>

                    </div>


                    <p class="sans text-sm text-[#3D1534]/60 leading-6 mt-5">
                        ${artist.bio}
                    </p>


                    <div
                        class="border-t border-[#3D1534]/10 mt-5 pt-4 flex justify-between items-center">

                        <span class="sans text-xs opacity-60">
                            ${artistArts.length} artworks
                        </span>

                        <span class="text-[#3E4B8E] text-lg">
                            →
                        </span>

                    </div>

                </button>

            `;

        });

    }



    /* ========================================================= */
    /* DASHBOARD ARTS */
    /* ========================================================= */

    function renderDashboardArts() {

        const container =
            document.getElementById("dashboardArts");

        container.innerHTML = "";


        arts.slice(0, 4).forEach(art => {

            container.innerHTML += `

                <button
                    onclick="openArt(${art.id})"
                    class="bg-[#FFF4EB] rounded-[22px] overflow-hidden text-left card-hover">

                    <img
                        src="${art.image}"
                        class="w-full h-48 object-cover">

                    <div class="p-4">

                        <span
                            class="sans text-[9px] uppercase tracking-wider text-[#3E4B8E]">
                            ${art.category}
                        </span>

                        <h3 class="font-bold text-lg mt-1">
                            ${art.title}
                        </h3>

                        <p class="sans text-xs opacity-50 mt-1">
                            ${art.artist}
                        </p>

                    </div>

                </button>

            `;

        });

    }



    /* ========================================================= */
    /* OPEN ART DETAIL */
    /* ========================================================= */

    function openArt(id) {

        const art =
            arts.find(item => item.id === id);

        if (!art) return;


        currentArtId = id;


        const artist =
            artists.find(item => item.id === art.artistId);


        document.getElementById("detailArtImage").src =
            art.image;

        document.getElementById("detailArtTitle").textContent =
            art.title;

        document.getElementById("detailArtCategory").textContent =
            art.category;

        document.getElementById("detailArtDescription").textContent =
            art.description;


        if (artist) {

            document.getElementById("detailArtistImage").src =
                artist.image;

            document.getElementById("detailArtistName").textContent =
                artist.name;

            document.getElementById("detailArtistUsername").textContent =
                artist.username;


            document.getElementById("detailArtArtist").onclick =
                function () {

                    closeModal("artModal");

                    openArtist(artist.id);

                };

        }


        openModal("artModal");

    }



    /* ========================================================= */
    /* MANAGE ART */
    /* ========================================================= */

    function openManageArt() {

        const art =
            arts.find(item => item.id === currentArtId);

        if (!art) return;


        document.getElementById("editArtTitle").value =
            art.title;

        document.getElementById("editArtDescription").value =
            art.description;

        document.getElementById("editArtCategory").value =
            art.category;


        openModal("manageArtModal");

    }



    /* ========================================================= */
    /* SAVE ART */
    /* ========================================================= */

    function saveArtChanges() {

        const art =
            arts.find(item => item.id === currentArtId);

        if (!art) return;


        const title =
            document.getElementById("editArtTitle").value.trim();

        const description =
            document.getElementById("editArtDescription").value.trim();

        const category =
            document.getElementById("editArtCategory").value;


        if (!title) {

            alert("Art name cannot be empty.");

            return;

        }


        art.title = title;
        art.description = description;
        art.category = category;


        closeModal("manageArtModal");
        closeModal("artModal");


        renderArts();
        renderDashboardArts();
        updateStatistics();

    }



    /* ========================================================= */
    /* DELETE CURRENT ART */
    /* ========================================================= */

    function deleteCurrentArt() {

        deleteType = "art";
        deleteId = currentArtId;

        closeModal("manageArtModal");

        openModal("deleteModal");

    }



    /* ========================================================= */
    /* OPEN ARTIST */
    /* ========================================================= */

    function openArtist(id) {

        const artist =
            artists.find(item => item.id === id);

        if (!artist) return;


        currentArtistId = id;


        document.getElementById("artistProfileImage").src =
            artist.image;

        document.getElementById("artistProfileName").textContent =
            artist.name;

        document.getElementById("artistProfileUsername").textContent =
            artist.username;

        document.getElementById("artistProfileBio").textContent =
            artist.bio;


        const works =
            document.getElementById("artistWorks");

        works.innerHTML = "";


        const artistArts =
            arts.filter(
                art => art.artistId === artist.id
            );


        if (artistArts.length === 0) {

            works.innerHTML = `

                <div class="col-span-3 py-8 text-center">

                    <p class="sans text-xs opacity-50">
                        This artist has no artworks.
                    </p>

                </div>

            `;

        }


        artistArts.forEach(art => {

            works.innerHTML += `

                <button
                    onclick="closeModal('artistModal'); openArt(${art.id})"
                    class="rounded-xl overflow-hidden">

                    <img
                        src="${art.image}"
                        class="w-full aspect-square object-cover hover:scale-105 transition">

                </button>

            `;

        });


        openModal("artistModal");

    }



    /* ========================================================= */
    /* DELETE CURRENT ARTIST */
    /* ========================================================= */

    function deleteCurrentArtist() {

        deleteType = "artist";
        deleteId = currentArtistId;

        closeModal("artistModal");

        openModal("deleteModal");

    }



    /* ========================================================= */
    /* CONFIRM DELETE */
    /* ========================================================= */

    function confirmDelete() {


        if (deleteType === "art") {

            arts =
                arts.filter(
                    art => art.id !== deleteId
                );

        }


        if (deleteType === "artist") {

            artists =
                artists.filter(
                    artist => artist.id !== deleteId
                );


            arts =
                arts.filter(
                    art => art.artistId !== deleteId
                );

        }


        closeModal("deleteModal");


        renderArts();
        renderArtists();
        renderDashboardArts();
        updateStatistics();


        currentArtId = null;
        currentArtistId = null;
        deleteType = null;
        deleteId = null;

    }



    /* ========================================================= */
    /* STATISTICS */
    /* ========================================================= */

    function updateStatistics() {

        document.getElementById("artsCount").textContent =
            arts.length;

        document.getElementById("artistsCount").textContent =
            artists.length;


        document.getElementById("digitalCount").textContent =
            arts.filter(
                art => art.category === "Digital"
            ).length;


        document.getElementById("traditionalCount").textContent =
            arts.filter(
                art => art.category === "Traditional"
            ).length;

    }



    /* ========================================================= */
    /* SEARCH */
    /* ========================================================= */

    function searchData() {

        const keyword =
            document.getElementById("searchInput")
                .value
                .toLowerCase()
                .trim();


        const artsPage =
            !document
                .getElementById("artsPage")
                .classList
                .contains("hidden");


        const artistsPage =
            !document
                .getElementById("artistsPage")
                .classList
                .contains("hidden");


        if (artsPage) {

            const container =
                document.getElementById("artsContainer");

            container.innerHTML = "";


            let result =
                arts.filter(art => {

                    const matchesText =
                        art.title.toLowerCase().includes(keyword) ||
                        art.artist.toLowerCase().includes(keyword) ||
                        art.category.toLowerCase().includes(keyword);


                    const matchesCategory =
                        currentCategory === "all" ||
                        art.category === currentCategory;


                    return matchesText && matchesCategory;

                });


            result.forEach(art => {

                container.innerHTML += `

                    <button
                        onclick="openArt(${art.id})"
                        class="bg-[#FFF4EB] rounded-[25px] overflow-hidden text-left card-hover">

                        <div class="relative">

                            <img
                                src="${art.image}"
                                class="w-full h-60 object-cover">

                            <span
                                class="absolute top-4 left-4 px-3 py-1.5 rounded-full bg-[#FFF4EB]/90 sans text-[10px] font-bold uppercase">

                                ${art.category}

                            </span>

                        </div>


                        <div class="p-5">

                            <h3 class="text-xl font-bold">
                                ${art.title}
                            </h3>

                            <p class="sans text-xs opacity-50 mt-2">
                                by ${art.artist}
                            </p>

                        </div>

                    </button>

                `;

            });


            if (result.length === 0) {

                container.innerHTML = `

                    <div class="col-span-4 text-center py-20">

                        <p class="text-3xl">
                            ✦
                        </p>

                        <p class="font-bold mt-3">
                            No artwork found
                        </p>

                    </div>

                `;

            }

        }


        if (artistsPage) {

            const container =
                document.getElementById("artistsContainer");

            container.innerHTML = "";


            const result =
                artists.filter(artist =>
                    artist.name.toLowerCase().includes(keyword) ||
                    artist.username.toLowerCase().includes(keyword)
                );


            result.forEach(artist => {

                const artistArts =
                    arts.filter(
                        art => art.artistId === artist.id
                    );


                container.innerHTML += `

                    <button
                        onclick="openArtist(${artist.id})"
                        class="bg-[#FFF4EB] rounded-[28px] p-6 text-left card-hover">

                        <div class="flex items-center gap-5">

                            <img
                                src="${artist.image}"
                                class="w-20 h-20 rounded-full object-cover">

                            <div>

                                <p class="sans text-[10px] uppercase tracking-[2px] text-[#3E4B8E]">
                                    Artist
                                </p>

                                <h3 class="text-xl font-bold mt-1">
                                    ${artist.name}
                                </h3>

                                <p class="sans text-xs opacity-50">
                                    ${artist.username}
                                </p>

                            </div>

                        </div>


                        <p class="sans text-sm text-[#3D1534]/60 leading-6 mt-5">
                            ${artist.bio}
                        </p>


                        <div
                            class="border-t border-[#3D1534]/10 mt-5 pt-4 sans text-xs opacity-60">

                            ${artistArts.length} artworks

                        </div>

                    </button>

                `;

            });


            if (result.length === 0) {

                container.innerHTML = `

                    <div class="col-span-3 text-center py-20">

                        <p class="text-3xl">
                            ✦
                        </p>

                        <p class="font-bold mt-3">
                            No artist found
                        </p>

                    </div>

                `;

            }

        }

    }



    /* ========================================================= */
    /* MODAL */
    /* ========================================================= */

    function openModal(id) {

        const modal =
            document.getElementById(id);

        modal.classList.remove("hidden");
        modal.classList.add("flex");

    }


    function closeModal(id) {

        const modal =
            document.getElementById(id);

        modal.classList.add("hidden");
        modal.classList.remove("flex");

    }



    /* ========================================================= */
    /* ESCAPE */
    /* ========================================================= */

    document.addEventListener("keydown", function(event) {

        if (event.key === "Escape") {

            closeModal("artModal");
            closeModal("artistModal");
            closeModal("manageArtModal");
            closeModal("deleteModal");

        }

    });



    /* ========================================================= */
    /* INITIAL */
    /* ========================================================= */

    renderDashboardArts();
    renderArts();
    renderArtists();
    updateStatistics();

</script>

</body>
</html>