<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Art Detail - CreateTopia</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body { font-family: Georgia, serif; background: #F6FFEA; margin: 0; }
        .sans { font-family: Arial, sans-serif; }

        .floating {
            animation: floating 3.5s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50%      { transform: translateY(-8px) rotate(5deg); }
        }

        .fade-in {
            animation: fadeIn .6s ease both;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

    </style>

</head>


<body>

<div class="fixed inset-0 -z-10 overflow-hidden bg-[#F6FFEA]">
    <div class="absolute -top-40 -left-40 w-[500px] h-[500px]
                rounded-full bg-[#62C4DA]/25 blur-3xl"></div>
    <div class="absolute top-1/3 -right-40 w-[500px] h-[500px]
                rounded-full bg-[#FA855A]/20 blur-3xl"></div>
    <div class="absolute -bottom-40 left-1/3 w-[450px] h-[450px]
                rounded-full bg-[#FFDE96]/50 blur-3xl"></div>
</div>

<a href="{{ route('arts') }}"
   class="fixed top-6 left-8 z-20 text-[#C93638] text-[10px] font-medium
          hover:text-[#62C4DA] hover:translate-x-1 transition">
    ← Back to Arts
</a>



<main class="max-w-5xl mx-auto px-6 py-12 fade-in">

    <section id="artCard"
             class="bg-white rounded-[32px]
                    border border-[#C93638]/10
                    shadow-[0_20px_45px_rgba(201,54,56,.12)]
                    overflow-hidden
                    relative">

        <div class="absolute top-0 left-0 w-full h-2
                    bg-gradient-to-r
                    from-[#62C4DA] via-[#FFDE96] to-[#C93638]
                    z-20"></div>


        <div class="grid grid-cols-1 md:grid-cols-2">

            <!-- IMAGE -->

            <div class="bg-[#f5eeee] h-[400px] md:h-[560px] relative">

                <img id="artImage"
                     src=""
                     alt="Artwork"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://via.placeholder.com/600x560?text=No+Image'">

            </div>


            <!-- INFO -->

            <div class="p-8 md:p-12 flex flex-col justify-between">

                <div>

                    <span id="artCategory"
                          class="inline-block
                                 px-3 py-1 rounded-full
                                 bg-[#e9f7f8]
                                 text-[#62b9c4]
                                 sans text-[10px] font-bold
                                 uppercase tracking-wider">

                        Digital

                    </span>


                    <h1 id="artTitle"
                        class="text-3xl md:text-4xl
                               font-bold text-[#C93638]
                               mt-4 leading-tight">

                        Artwork Title

                    </h1>


                    <p id="artDescription"
                       class="sans text-sm text-[#2a1a1c]/65
                              leading-7 mt-5">

                        Description...

                    </p>

                </div>


                <!-- CREATOR -->

                <div class="mt-8 pt-6 border-t border-[#C93638]/10">

                    <p class="sans text-[10px] uppercase tracking-[3px]
                              text-[#2a1a1c]/40 mb-3">

                        Created By

                    </p>


                    <a id="creatorLink"
                       href="#"
                       class="flex items-center gap-3 group
                              hover:translate-x-1 transition">

                        <!-- AVATAR — di-render JS -->

                        <div id="creatorAvatar"
                             class="w-12 h-12 rounded-full
                                    overflow-hidden
                                    border-2 border-white
                                    shadow-md
                                    flex-shrink-0
                                    flex items-center justify-center
                                    text-white font-bold
                                    text-lg">

                        </div>


                        <div>

                            <p id="creatorName"
                               class="font-bold text-[#C93638]
                                      group-hover:underline">

                                Artist Name

                            </p>

                            <p id="creatorUsername"
                               class="sans text-[10px]
                                      text-[#2a1a1c]/50">

                                @username

                            </p>

                        </div>

                    </a>


                    <p id="artDate"
                       class="sans text-[10px] text-[#2a1a1c]/40 mt-5">

                        Uploaded on ...

                    </p>

                </div>

            </div>

        </div>

    </section>

</main>



<footer class="text-center pb-10">

    <div class="flex justify-center items-center gap-3 mb-3">
        <div class="w-12 h-[1px] bg-[#62C4DA]"></div>
        <span class="text-[#FFDE96] text-lg floating">✦</span>
        <div class="w-12 h-[1px] bg-[#62C4DA]"></div>
    </div>

    <p class="sans text-[9px] text-[#2a1a1c]/40">
        CreateTopia © 2026
    </p>

</footer>



<script>

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
   LOAD USER ARTS
===================================================== */

let userArts = [];

try {
    userArts = JSON.parse(localStorage.getItem("userArts") || "[]");
    if (!Array.isArray(userArts)) userArts = [];
} catch (e) { userArts = []; }



/* =====================================================
   CONVERT USER ARTS
===================================================== */

const convertedUserArts = userArts.map((art, index) => {

    const creator =
        art.creator ||
        localStorage.getItem("profileName") ||
        "Unknown Artist";

    const artistId =
        "user-" +
        creator.toLowerCase()
            .replace(/[^a-z0-9]+/g, "-")
            .replace(/^-|-$/g, "");

    return {
        id: "user-" + (art.id !== undefined ? art.id : index),
        title: art.title || "Untitled",
        description: art.description || "No description available.",
        image: art.image || "",
        artist: creator,
        artistId: artistId,
        category: art.category || "Digital",
        date: art.date || new Date().toISOString()
    };
});



const allArts = [...staticArts, ...convertedUserArts];



/* =====================================================
   AMBIL ART ID DARI URL
===================================================== */

const pathParts = window.location.pathname.split('/');
const artId = pathParts[pathParts.length - 1];

const art = allArts.find(a => String(a.id) === String(artId));



/* =====================================================
   RENDER ART
===================================================== */

function renderArt() {

    if (!art) {

        document.getElementById("artCard").innerHTML = `
            <div class="p-16 text-center">
                <p class="text-5xl mb-4">✦</p>
                <h2 class="text-2xl font-bold text-[#C93638]">
                    Art not found
                </h2>
                <a href="{{ route('arts') }}"
                   class="inline-block mt-6 px-6 py-3 rounded-full
                          bg-[#62C4DA] text-white text-xs font-bold
                          hover:bg-[#C93638] transition">
                    ← Back to Arts
                </a>
            </div>
        `;

        return;
    }


    /* SET DATA */

    document.getElementById("artImage").src = art.image;
    document.getElementById("artImage").alt = art.title;
    document.getElementById("artTitle").textContent = art.title;
    document.getElementById("artCategory").textContent = art.category;
    document.getElementById("artDescription").textContent =
        art.description || "No description available.";


    /* DATE */

    const date = new Date(art.date);

    document.getElementById("artDate").textContent =
        "Uploaded on " +
        date.toLocaleDateString("en-US", {
            year: "numeric",
            month: "short",
            day: "numeric"
        }) +
        " at " +
        date.toLocaleTimeString("en-US", {
            hour: "2-digit",
            minute: "2-digit"
        });


    /* CREATOR */

    document.getElementById("creatorName").textContent = art.artist;
    document.getElementById("creatorUsername").textContent =
        "@" + art.artist.toLowerCase().replace(/\s+/g, "");

    document.getElementById("creatorLink").href =
        "{{ url('/artist') }}/" + encodeURIComponent(art.artistId);



    /* =====================================================
       AVATAR CREATOR — SIMPEL
       Kalau artist = user login & punya foto → tampil foto
       Kalau bukan → inisial nama
    ===================================================== */

    const avatarBox = document.getElementById("creatorAvatar");

    const myName = localStorage.getItem("profileName") || "";
    const myPhoto = localStorage.getItem("profilePhoto") || "";

    const isMe =
        myName &&
        myName.toLowerCase() === art.artist.toLowerCase();

    const hasPhoto =
        myPhoto && myPhoto.trim() !== "";


    if (isMe && hasPhoto) {

        /* Tampil foto profil */

        avatarBox.style.background = "transparent";
        avatarBox.innerHTML = `
            <img src="${myPhoto}"
                 alt="${art.artist}"
                 class="w-full h-full object-cover">
        `;

    } else {

        /* Tampil inisial */

        const initial =
            (art.artist || "?").charAt(0).toUpperCase();

        const gradients = [
            'linear-gradient(135deg, #62C4DA, #C93638)',
            'linear-gradient(135deg, #FFDE96, #FA855A)',
            'linear-gradient(135deg, #C93638, #62C4DA)',
            'linear-gradient(135deg, #FA855A, #FFDE96)',
            'linear-gradient(135deg, #62C4DA, #FFDE96)'
        ];

        const hash = (art.artist || "x").split("")
            .reduce((acc, c) => acc + c.charCodeAt(0), 0);

        avatarBox.style.background = gradients[hash % gradients.length];
        avatarBox.textContent = initial;

    }

}



/* =====================================================
   INIT
===================================================== */

document.addEventListener("DOMContentLoaded", renderArt);

</script>


</body>

</html>