<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CreateTopia - Profile</title>

    <!-- ================================================= -->
    <!-- TAILWIND -->
    <!-- ================================================= -->

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- ================================================= -->
    <!-- EXTRA ANIMATION -->
    <!-- ================================================= -->

    <style>

        body {
            margin: 0;
            overflow-x: hidden;
        }


        /* ============================================= */
        /* FLOATING DECORATION */
        /* ============================================= */

        .float-decoration {
            position: absolute;
            pointer-events: none;
            animation: float 5s ease-in-out infinite;
        }


        @keyframes float {

            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }

        }


        /* ============================================= */
        /* PROFILE IMAGE HOVER */
        /* ============================================= */

        .profile-picture {
            transition:
                transform 0.4s ease,
                box-shadow 0.4s ease;
        }


        .profile-picture:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow:
                0 15px 35px rgba(0,0,0,0.15);
        }


        /* ============================================= */
        /* ART CARD */
        /* ============================================= */

        .art-card {
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        .art-card:hover {
            transform: translateY(-7px) rotate(-1deg);
            box-shadow:
                0 18px 35px rgba(100, 60, 80, 0.15);
        }


        /* ============================================= */
        /* MODAL ANIMATION */
        /* ============================================= */

        .modal-box {
            animation: modalPop 0.25s ease;
        }


        @keyframes modalPop {

            from {
                opacity: 0;
                transform: scale(0.94) translateY(10px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

        }


        /* ============================================= */
        /* SETTINGS MENU */
        /* ============================================= */

        .settings-menu {
            animation: settingsPop 0.2s ease;
        }


        @keyframes settingsPop {

            from {
                opacity: 0;
                transform: translateY(-5px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

        }


        /* ============================================= */
        /* IMAGE LOADING */
        /* ============================================= */

        .art-image {
            transition:
                transform 0.5s ease;
        }


        .art-card:hover .art-image {
            transform: scale(1.08);
        }

    </style>

</head>



<body class="bg-[#fffaf5] text-gray-700">


    <!-- ================================================= -->
    <!-- BACKGROUND DECORATION -->
    <!-- ================================================= -->

    <div class="fixed inset-0 pointer-events-none overflow-hidden">

        <div
            class="float-decoration absolute top-28 left-8 text-3xl opacity-30"
        >
            ✦
        </div>


        <div
            class="float-decoration absolute top-52 right-16 text-2xl opacity-30"
            style="animation-delay:1s"
        >
            ♡
        </div>


        <div
            class="float-decoration absolute bottom-24 left-16 text-2xl opacity-20"
            style="animation-delay:2s"
        >
            ✿
        </div>


        <div
            class="float-decoration absolute bottom-40 right-10 text-3xl opacity-20"
            style="animation-delay:3s"
        >
            ✦
        </div>

    </div>



    <!-- ================================================= -->
    <!-- NAVBAR -->
    <!-- ================================================= -->

    <nav
        class="relative z-30
               w-full
               h-[60px]
               bg-[#fff8ee]
               flex
               items-center
               justify-center
               border-b
               border-[#ead8df]"
    >

        <div class="flex items-center gap-5">

            <!-- LOGO -->

            <a
                href="{{ route('user.home') }}"
                class="font-serif
                       text-xl
                       font-bold
                       text-[#d65362]
                       hover:scale-105
                       transition"
            >

                CreateTopia

            </a>


            <!-- HOME -->

            <a
                href="{{ route('user.home') }}"
                class="text-[#d65362]
                       text-xs
                       hover:text-[#72ccd2]
                       transition"
            >

                Home

            </a>


            <!-- ARTS -->

            <a
                href="{{ route('user.arts') }}"
                class="text-[#d65362]
                       text-xs
                       hover:text-[#72ccd2]
                       transition"
            >

                Arts

            </a>


            <!-- ARTIST -->

            <a
                href="{{ route('user.artist') }}"
                class="text-[#d65362]
                       text-xs
                       hover:text-[#72ccd2]
                       transition"
            >

                Artist

            </a>


            <!-- CATEGORY -->

            <a
                href="{{ route('user.category') }}"
                class="text-[#d65362]
                       text-xs
                       hover:text-[#72ccd2]
                       transition"
            >

                Category

            </a>


            <!-- PROFILE -->

            <a
                href="{{ route('user.profile') }}"
                class="bg-[#72ccd2]
                       text-white
                       px-3
                       py-1
                       rounded-full
                       text-xs
                       shadow-sm"
            >

                Profile

            </a>

        </div>



        <!-- ================================================= -->
        <!-- SETTINGS BUTTON -->
        <!-- ================================================= -->

        <button
            onclick="toggleSettings()"
            class="absolute
                   right-8
                   w-9
                   h-9
                   rounded-full
                   bg-white
                   border
                   border-[#e6cbd2]
                   text-[#d65362]
                   flex
                   items-center
                   justify-center
                   shadow-sm
                   hover:bg-[#72ccd2]
                   hover:text-white
                   hover:rotate-45
                   transition"
            title="Settings"
        >

            ⚙

        </button>


        <!-- ================================================= -->
        <!-- SETTINGS DROPDOWN -->
        <!-- ================================================= -->

        <div
            id="settingsMenu"
            class="settings-menu
                   hidden
                   absolute
                   z-50
                   right-8
                   top-14
                   w-[190px]
                   bg-white
                   rounded-xl
                   shadow-xl
                   border
                   border-[#ead8df]
                   overflow-hidden"
        >

            <!-- SETTINGS TITLE -->

            <div
                class="px-4
                       py-3
                       bg-[#fff1f3]
                       border-b
                       border-[#f0dfe2]"
            >

                <p
                    class="text-[9px]
                          text-[#d65362]
                          font-bold"
                >
                    PROFILE SETTINGS
                </p>

            </div>


            <!-- RESET -->

            <button
                onclick="resetEverything()"
                class="w-full
                       flex
                       items-center
                       gap-3
                       px-4
                       py-3
                       text-[10px]
                       text-red-500
                       hover:bg-red-50
                       transition"
            >

                <span>↻</span>

                Reset Profile & Arts

            </button>


            <!-- LOGOUT -->

            <button
                onclick="logout()"
                class="w-full
                       flex
                       items-center
                       gap-3
                       px-4
                       py-3
                       text-[10px]
                       text-gray-600
                       hover:bg-[#fff1f3]
                       hover:text-[#d65362]
                       transition"
            >

                <span>↪</span>

                Logout

            </button>

        </div>

    </nav>



    <!-- ================================================= -->
    <!-- PROFILE HEADER -->
    <!-- ================================================= -->

    <section
        class="relative
               overflow-hidden
               w-full
               bg-[#72ccd2]"
    >

        <!-- DECORATION -->

        <div
            class="float-decoration
                   absolute
                   top-8
                   left-[12%]
                   text-white
                   text-4xl
                   opacity-20"
        >
            ✦
        </div>


        <div
            class="float-decoration
                   absolute
                   bottom-5
                   right-[18%]
                   text-white
                   text-3xl
                   opacity-20"
            style="animation-delay:1.5s"
        >
            ♡
        </div>



        <div
            class="relative
                   max-w-6xl
                   mx-auto
                   px-8
                   md:px-14
                   py-12"
        >

            <div
                class="flex
                       flex-col
                       md:flex-row
                       items-center
                       justify-between
                       gap-8"
            >


                <!-- ===================================== -->
                <!-- PROFILE INFORMATION -->
                <!-- ===================================== -->

                <div
                    class="text-white
                           text-center
                           md:text-left"
                >

                    <p
                        class="text-xs
                              mb-2
                              opacity-80"
                    >

                        ✦ My Profile

                    </p>


                    <h1
                        id="profileName"
                        class="font-serif
                               text-4xl
                               md:text-5xl
                               font-bold
                               drop-shadow-sm"
                    >

                        Your Name

                    </h1>


                    <p
                        id="profileBio"
                        class="mt-4
                              max-w-lg
                              text-sm
                              leading-6
                              opacity-95"
                    >

                        Your bio goes here.

                    </p>


                    <!-- EDIT PROFILE -->

                    <a
                        href="{{ route('form.profile') }}"
                        class="inline-block
                               mt-6
                               bg-white
                               text-[#d65362]
                               px-5
                               py-2
                               rounded-full
                               text-xs
                               shadow-md
                               hover:-translate-y-1
                               hover:shadow-lg
                               transition"
                    >

                        ✎ Edit Profile

                    </a>

                </div>



                <!-- ===================================== -->
                <!-- PROFILE IMAGE -->
                <!-- ===================================== -->

                <div
                    class="relative"
                >

                    <!-- LITTLE DECORATION -->

                    <div
                        class="absolute
                               -top-3
                               -right-3
                               w-8
                               h-8
                               bg-[#ffdf96]
                               rounded-full
                               flex
                               items-center
                               justify-center
                               text-white
                               shadow-sm
                               z-10"
                    >

                        ✦

                    </div>


                    <!-- REAL PROFILE IMAGE -->

                    <img
                        id="profileImage"
                        src=""
                        alt="Profile"
                        class="hidden
                               profile-picture
                               w-36
                               h-36
                               md:w-44
                               md:h-44
                               rounded-full
                               object-cover
                               border-4
                               border-white
                               shadow-lg"
                    >


                    <!-- DEFAULT TEMPLATE ICON -->

                    <div
                        id="profileImagePlaceholder"
                        class="profile-picture
                               w-36
                               h-36
                               md:w-44
                               md:h-44
                               rounded-full
                               bg-[#fff8ee]
                               border-4
                               border-white
                               flex
                               items-center
                               justify-center
                               text-[#d65362]
                               shadow-lg"
                    >

                        <!-- TEMPLATE PROFILE ICON -->

                        <svg
                            width="75"
                            height="75"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.4"
                        >

                            <circle
                                cx="12"
                                cy="8"
                                r="4"
                            />

                            <path
                                d="M4 21c0-4 3.5-7 8-7s8 3 8 7"
                            />

                        </svg>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ================================================= -->
    <!-- MY ARTS -->
    <!-- ================================================= -->

    <main class="relative w-full">


        <section
            class="max-w-6xl
                   mx-auto
                   px-8
                   md:px-14
                   py-12"
        >


            <!-- ========================================= -->
            <!-- TITLE -->
            <!-- ========================================= -->

            <div
                class="flex
                       flex-col
                       sm:flex-row
                       sm:items-center
                       justify-between
                       gap-4
                       mb-8"
            >

                <div>

                    <p
                        class="text-[9px]
                              text-[#72aeb5]
                              uppercase
                              tracking-widest
                              mb-1"
                    >

                        Your creative collection

                    </p>


                    <h2
                        class="font-serif
                               text-3xl
                               font-bold
                               text-[#d65362]"
                    >

                        My Arts

                    </h2>


                    <div
                        class="mt-2
                               w-24
                               h-1
                               bg-[#72ccd2]
                               rounded-full"
                    ></div>

                </div>


                <!-- ADD ART -->

                <a
                    href="{{ route('form.art') }}"
                    class="group
                           bg-[#d65362]
                           text-white
                           px-5
                           py-2.5
                           rounded-full
                           text-xs
                           shadow-md
                           hover:-translate-y-1
                           hover:shadow-lg
                           transition"
                >

                    <span
                        class="inline-block
                               group-hover:rotate-90
                               transition"
                    >
                        +
                    </span>

                    Add arts

                </a>

            </div>



            <!-- ========================================= -->
            <!-- ART GRID -->
            <!-- ========================================= -->

            <div
                id="artsContainer"
                class="grid
                       grid-cols-1
                       sm:grid-cols-2
                       md:grid-cols-3
                       lg:grid-cols-4
                       gap-6"
            >
            </div>



            <!-- ========================================= -->
            <!-- EMPTY -->
            <!-- ========================================= -->

            <div
                id="emptyArts"
                class="hidden
                       text-center
                       py-20"
            >

                <div
                    class="mx-auto
                           w-20
                           h-20
                           rounded-full
                           bg-[#edfafa]
                           flex
                           items-center
                           justify-center
                           text-[#72ccd2]
                           text-3xl
                           mb-5"
                >

                    ✦

                </div>


                <p
                    class="text-sm
                          text-gray-400"
                >

                    You haven't uploaded any art yet.

                </p>


                <a
                    href="{{ route('form.art') }}"
                    class="inline-block
                           mt-4
                           text-[#d65362]
                           text-xs
                           font-bold
                           hover:underline"
                >

                    Upload your first art →

                </a>

            </div>

        </section>

    </main>



    <!-- ================================================= -->
    <!-- ART DETAIL MODAL -->
    <!-- ================================================= -->

    <div
        id="artDetail"
        class="hidden
               fixed
               inset-0
               z-40
               bg-[#3d2530]/30
               backdrop-blur-sm
               items-center
               justify-center
               p-4
               md:p-8"
    >

        <div
            class="modal-box
                   relative
                   w-full
                   max-w-6xl
                   bg-white
                   shadow-2xl
                   overflow-hidden
                   rounded-xl"
        >

            <!-- TOP DECORATION -->

            <div
                class="h-5
                       bg-gradient-to-r
                       from-[#72ccd2]
                       via-[#ffdf96]
                       to-[#d65362]"
            ></div>


            <!-- CLOSE -->

            <button
                onclick="closeArtDetail()"
                class="absolute
                       top-7
                       right-5
                       z-20
                       w-8
                       h-8
                       rounded-full
                       bg-white
                       shadow
                       text-[#d65362]
                       text-xl
                       hover:rotate-90
                       transition"
            >

                ×

            </button>


            <!-- CONTENT -->

            <div
                class="flex
                       flex-col
                       md:flex-row
                       min-h-[500px]"
            >


                <!-- ===================================== -->
                <!-- DETAIL INFORMATION -->
                <!-- ===================================== -->

                <div
                    class="w-full
                           md:w-[45%]
                           p-8
                           md:p-12
                           flex
                           flex-col
                           justify-between
                           bg-[#fffaf5]"
                >

                    <div>

                        <p
                            class="text-[9px]
                                  text-[#72aeb5]
                                  uppercase
                                  tracking-widest
                                  mb-3"
                        >

                            Artwork

                        </p>


                        <h1
                            id="detailTitle"
                            class="font-serif
                                   uppercase
                                   text-3xl
                                   md:text-4xl
                                   font-bold
                                   text-[#d65362]"
                        >

                            Artwork

                        </h1>


                        <p
                            id="detailDescription"
                            class="mt-6
                                  text-[#9d6d76]
                                  text-sm
                                  leading-6
                                  max-w-md"
                        >

                            Description

                        </p>


                        <p
                            id="detailCategory"
                            class="inline-block
                                  mt-5
                                  px-3
                                  py-1
                                  rounded-full
                                  bg-[#eafafa]
                                  text-[#5ca9b1]
                                  text-[9px]"
                        >

                            Category

                        </p>

                    </div>


                    <!-- CREATOR -->

                    <div
                        class="text-center
                               text-[#d65362]
                               mt-10"
                    >

                        <p
                            class="text-[9px]
                                  text-gray-400"
                        >

                            Uploaded on

                            <span
                                id="detailDate"
                            ></span>

                        </p>


                        <p
                            class="font-bold
                                  text-sm
                                  mt-2"
                        >

                            By

                            <button
                                id="detailCreator"
                                class="underline
                                       hover:text-[#72ccd2]
                                       transition"
                            >

                            </button>

                        </p>

                    </div>

                </div>



                <!-- ===================================== -->
                <!-- DETAIL IMAGE -->
                <!-- ===================================== -->

                <div
                    class="w-full
                           md:w-[55%]
                           min-h-[450px]
                           bg-white
                           relative
                           flex
                           items-center
                           justify-center"
                >

                    <img
                        id="detailImage"
                        src=""
                        alt="Artwork"
                        class="w-full
                               h-[450px]
                               md:h-[560px]
                               object-contain"
                    >


                    <!-- PREVIOUS -->

                    <button
                        id="previousArt"
                        onclick="previousArt()"
                        class="hidden
                               absolute
                               left-4
                               top-1/2
                               -translate-y-1/2
                               w-11
                               h-11
                               rounded-full
                               border-2
                               border-[#72ccd2]
                               bg-white
                               text-[#72ccd2]
                               text-xl
                               shadow
                               hover:bg-[#72ccd2]
                               hover:text-white
                               hover:scale-110
                               transition"
                    >

                        ←

                    </button>


                    <!-- NEXT -->

                    <button
                        id="nextArt"
                        onclick="nextArt()"
                        class="hidden
                               absolute
                               right-4
                               top-1/2
                               -translate-y-1/2
                               w-11
                               h-11
                               rounded-full
                               border-2
                               border-[#72ccd2]
                               bg-white
                               text-[#72ccd2]
                               text-xl
                               shadow
                               hover:bg-[#72ccd2]
                               hover:text-white
                               hover:scale-110
                               transition"
                    >

                        →

                    </button>

                </div>

            </div>


            <!-- BOTTOM DECORATION -->

            <div
                class="h-5
                       bg-gradient-to-r
                       from-[#d65362]
                       via-[#ffdf96]
                       to-[#72ccd2]"
            ></div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- EDIT ART MODAL -->
    <!-- ================================================= -->

    <div
        id="editArtModal"
        class="hidden
               fixed
               inset-0
               z-50
               bg-black/30
               backdrop-blur-sm
               items-center
               justify-center
               p-4"
    >

        <div
            class="modal-box
                   relative
                   w-full
                   max-w-[650px]
                   max-h-[90vh]
                   overflow-y-auto
                   bg-[#fffaf5]
                   shadow-2xl
                   rounded-xl"
        >

            <!-- HEADER -->

            <div
                class="h-5
                       bg-gradient-to-r
                       from-[#72ccd2]
                       to-[#d65362]"
            ></div>


            <!-- CLOSE -->

            <button
                onclick="closeEditArt()"
                class="absolute
                       top-7
                       right-5
                       text-[#d65362]
                       text-2xl
                       hover:rotate-90
                       transition"
            >

                ×

            </button>


            <div class="p-8 md:p-10">


                <h2
                    class="font-serif
                           text-3xl
                           font-bold
                           text-[#d65362]
                           text-center
                           mb-7"
                >

                    Edit Art

                </h2>



                <!-- IMAGE PREVIEW -->

                <div
                    class="flex
                           justify-center
                           mb-5"
                >

                    <div
                        class="w-[230px]
                               h-[180px]
                               bg-white
                               rounded-lg
                               overflow-hidden
                               shadow"
                    >

                        <img
                            id="editImagePreview"
                            src=""
                            class="w-full
                                   h-full
                                   object-cover"
                            alt="Art preview"
                        >

                    </div>

                </div>



                <!-- IMAGE -->

                <label
                    class="block
                           text-[#d65362]
                           text-[10px]
                           mb-1"
                >

                    Change Image

                </label>


                <input
                    id="editImage"
                    type="file"
                    accept="image/*"
                    onchange="previewEditImage(event)"
                    class="w-full
                           text-[10px]
                           mb-5"
                >



                <!-- TITLE -->

                <label
                    class="block
                           text-[#d65362]
                           text-[10px]
                           mb-1"
                >

                    Art Name

                </label>


                <input
                    id="editTitle"
                    type="text"
                    class="w-full
                           h-[30px]
                           rounded-full
                           border
                           border-[#d8c4ca]
                           bg-[#f4e7eb]
                           outline-none
                           px-4
                           text-[10px]
                           mb-5
                           focus:ring-2
                           focus:ring-[#72ccd2]"
                >



                <!-- DESCRIPTION -->

                <label
                    class="block
                           text-[#d65362]
                           text-[10px]
                           mb-1"
                >

                    Description

                </label>


                <textarea
                    id="editDescription"
                    class="w-full
                           h-[100px]
                           rounded-[15px]
                           border
                           border-[#d8c4ca]
                           bg-[#f4e7eb]
                           outline-none
                           p-4
                           text-[10px]
                           resize-none
                           mb-5
                           focus:ring-2
                           focus:ring-[#72ccd2]"
                ></textarea>



                <!-- CATEGORY -->

                <label
                    class="block
                           text-[#d65362]
                           text-[10px]
                           mb-1"
                >

                    Category

                </label>


                <select
                    id="editCategory"
                    class="w-full
                           h-[30px]
                           rounded-full
                           border
                           border-[#d8c4ca]
                           bg-[#f4e7eb]
                           outline-none
                           px-4
                           text-[10px]
                           mb-7"
                >

                    <option value="Digital">
                        Digital
                    </option>

                    <option value="Traditional">
                        Traditional
                    </option>

                </select>



                <!-- BUTTON -->

                <div
                    class="flex
                           justify-center
                           gap-3"
                >

                    <button
                        onclick="closeEditArt()"
                        class="w-[80px]
                               h-[28px]
                               rounded-full
                               border
                               border-[#d65362]
                               text-[#d65362]
                               text-[9px]
                               hover:bg-[#d65362]
                               hover:text-white
                               transition"
                    >

                        Cancel

                    </button>


                    <button
                        onclick="saveEditedArt()"
                        class="w-[110px]
                               h-[28px]
                               rounded-full
                               bg-[#72ccd2]
                               text-white
                               text-[9px]
                               hover:opacity-80
                               hover:-translate-y-0.5
                               transition"
                    >

                        Save Changes

                    </button>

                </div>

            </div>


            <div
                class="h-5
                       bg-[#ffdf96]"
            ></div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- ART SETTINGS MODAL -->
    <!-- ================================================= -->

    <div
        id="artSettingsModal"
        class="hidden
               fixed
               inset-0
               z-50
               bg-black/30
               backdrop-blur-sm
               items-center
               justify-center
               p-4"
    >

        <div
            class="modal-box
                   w-full
                   max-w-[320px]
                   bg-[#fffaf5]
                   shadow-2xl
                   rounded-xl
                   overflow-hidden"
        >

            <div
                class="h-4
                       bg-[#72ccd2]"
            ></div>


            <div class="p-7 text-center">

                <div
                    class="mx-auto
                           w-12
                           h-12
                           rounded-full
                           bg-[#edfafa]
                           flex
                           items-center
                           justify-center
                           text-[#72ccd2]
                           text-xl
                           mb-3"
                >

                    ⚙

                </div>


                <h2
                    class="font-serif
                           text-2xl
                           font-bold
                           text-[#d65362]
                           mb-2"
                >

                    Art Settings

                </h2>


                <p
                    id="settingsArtName"
                    class="text-gray-500
                           text-[10px]
                           mb-6"
                >

                    Artwork

                </p>


                <!-- EDIT -->

                <button
                    id="settingsEditButton"
                    class="w-full
                           h-[30px]
                           rounded-full
                           bg-[#72ccd2]
                           text-white
                           text-[9px]
                           hover:opacity-80
                           transition
                           mb-3"
                >

                    ✎ Edit Art

                </button>


                <!-- DELETE -->

                <button
                    id="settingsDeleteButton"
                    class="w-full
                           h-[30px]
                           rounded-full
                           border
                           border-[#d65362]
                           text-[#d65362]
                           text-[9px]
                           hover:bg-[#d65362]
                           hover:text-white
                           transition
                           mb-3"
                >

                    Delete Art

                </button>


                <!-- CANCEL -->

                <button
                    onclick="closeArtSettings()"
                    class="w-full
                           h-[30px]
                           rounded-full
                           bg-gray-200
                           text-gray-600
                           text-[9px]
                           hover:bg-gray-300
                           transition"
                >

                    Cancel

                </button>

            </div>


            <div
                class="h-4
                       bg-[#ffdf96]"
            ></div>

        </div>

    </div>



    <!-- ================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ================================================= -->

    <script>


        // =================================================
        // PROFILE DATA
        // =================================================
        //
        // DATABASE NANTI:
        //
        // Bagian ini nantinya tidak perlu localStorage.
        //
        // Contohnya nanti Laravel:
        //
        // $user->name
        // $user->bio
        // $user->profile_photo
        //
        // =================================================


        const savedName =
            localStorage.getItem("profileName");


        const savedBio =
            localStorage.getItem("profileBio");


        const savedPhoto =
            localStorage.getItem("profilePhoto");



        // =================================================
        // TAMPILKAN NAMA
        // =================================================

        if (
            savedName &&
            savedName.trim() !== ""
        ) {

            document
                .getElementById("profileName")
                .textContent =
                savedName;

        }



        // =================================================
        // TAMPILKAN BIO
        // =================================================

        if (
            savedBio &&
            savedBio.trim() !== ""
        ) {

            document
                .getElementById("profileBio")
                .textContent =
                savedBio;

        }



        // =================================================
        // TAMPILKAN FOTO PROFILE
        // =================================================

        if (savedPhoto) {

            const image =
                document.getElementById(
                    "profileImage"
                );


            const placeholder =
                document.getElementById(
                    "profileImagePlaceholder"
                );


            image.src =
                savedPhoto;


            image.classList.remove(
                "hidden"
            );


            placeholder.classList.add(
                "hidden"
            );

        }



        // =================================================
        // USER ARTS
        // =================================================
        //
        // DATABASE NANTI:
        //
        // Ganti localStorage ini dengan:
        //
        // $user->arts
        //
        // atau Controller + Model Art.
        //
        // =================================================


        let userArts =
            JSON.parse(
                localStorage.getItem(
                    "userArts"
                ) || "[]"
            );


        const artsContainer =
            document.getElementById(
                "artsContainer"
            );


        const emptyArts =
            document.getElementById(
                "emptyArts"
            );



        renderArts();



        // =================================================
        // RENDER ARTS
        // =================================================

        function renderArts() {

            artsContainer.innerHTML = "";


            if (
                userArts.length === 0
            ) {

                emptyArts.classList.remove(
                    "hidden"
                );

                return;

            }


            emptyArts.classList.add(
                "hidden"
            );


            userArts.forEach(
                function(art, index) {

                    createArtCard(
                        art,
                        index
                    );

                }
            );

        }



        // =================================================
        // CREATE ART CARD
        // =================================================

        function createArtCard(
            art,
            index
        ) {

            const card =
                document.createElement(
                    "article"
                );


            card.className =
                "art-card bg-white border border-[#eadde1] rounded-xl overflow-hidden shadow-sm";



            card.innerHTML = `

                <!-- ================================= -->
                <!-- IMAGE -->
                <!-- ================================= -->

                <div
                    class="relative
                           w-full
                           h-56
                           bg-[#fff8ee]
                           overflow-hidden
                           cursor-pointer"
                    onclick="openArtDetail(${index})"
                >

                    <img
                        src="${art.image || ""}"
                        alt="${escapeHTML(art.title || "Artwork")}"
                        class="art-image
                               w-full
                               h-full
                               object-cover"
                    >


                    <!-- CATEGORY BADGE -->

                    <span
                        class="absolute
                               top-3
                               left-3
                               px-2
                               py-1
                               rounded-full
                               bg-white/90
                               backdrop-blur
                               text-[8px]
                               text-[#5ca9b1]
                               shadow-sm"
                    >

                        ${escapeHTML(
                            art.category || "Art"
                        )}

                    </span>

                </div>



                <!-- ================================= -->
                <!-- CONTENT -->
                <!-- ================================= -->

                <div class="p-4">


                    <!-- TITLE + SETTINGS -->

                    <div
                        class="flex
                               items-start
                               justify-between
                               gap-2"
                    >

                        <h3
                            class="font-serif
                                   font-bold
                                   text-[#d65362]
                                   text-lg
                                   uppercase
                                   cursor-pointer
                                   hover:text-[#72aeb5]
                                   transition"
                            onclick="openArtDetail(${index})"
                        >

                            ${escapeHTML(
                                art.title ||
                                "Untitled"
                            )}

                        </h3>


                        <!-- SETTINGS -->

                        <button
                            onclick="event.stopPropagation(); openArtSettings(${index})"
                            class="w-7
                                   h-7
                                   flex
                                   items-center
                                   justify-center
                                   rounded-full
                                   text-[#d65362]
                                   bg-[#fff1f3]
                                   hover:bg-[#72ccd2]
                                   hover:text-white
                                   hover:rotate-45
                                   transition
                                   text-sm"
                            title="Art settings"
                        >

                            ⚙

                        </button>

                    </div>



                    <!-- DESCRIPTION -->

                    <p
                        class="text-xs
                               text-gray-500
                               mt-2
                               line-clamp-3"
                    >

                        ${escapeHTML(
                            art.description ||
                            "No description."
                        )}

                    </p>



                    <!-- EDIT -->

                    <button
                        onclick="event.stopPropagation(); editArt(${index})"
                        class="w-full
                               h-[28px]
                               mt-4
                               rounded-full
                               bg-[#72ccd2]
                               text-white
                               text-[9px]
                               hover:opacity-80
                               hover:-translate-y-0.5
                               transition"
                    >

                        ✎ Edit

                    </button>

                </div>

            `;


            artsContainer.appendChild(
                card
            );

        }



        // =================================================
        // ART DETAIL
        // =================================================

        let currentArtIndex = 0;


        function openArtDetail(index) {

            currentArtIndex =
                index;


            showArt();


            const modal =
                document.getElementById(
                    "artDetail"
                );


            modal.classList.remove(
                "hidden"
            );


            modal.classList.add(
                "flex"
            );


            document.body.classList.add(
                "overflow-hidden"
            );

        }



        // =================================================
        // SHOW ART DETAIL
        // =================================================

        function showArt() {

            const art =
                userArts[
                    currentArtIndex
                ];


            if (!art) return;


            document
                .getElementById(
                    "detailImage"
                )
                .src =
                art.image || "";


            document
                .getElementById(
                    "detailTitle"
                )
                .textContent =
                art.title ||
                "Untitled";


            document
                .getElementById(
                    "detailDescription"
                )
                .textContent =
                art.description ||
                "No description.";


            document
                .getElementById(
                    "detailCategory"
                )
                .textContent =
                art.category ||
                "Art";



            // =========================================
            // CREATOR
            // =========================================

            const creator =
                art.creator ||
                savedName ||
                "Unknown Artist";


            const creatorButton =
                document.getElementById(
                    "detailCreator"
                );


            creatorButton.textContent =
                creator;



            // =========================================
            // DATE
            // =========================================

            let dateText =
                "Unknown date";


            if (art.date) {

                const date =
                    new Date(
                        art.date
                    );


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
                .getElementById(
                    "detailDate"
                )
                .textContent =
                dateText;



            // =========================================
            // ARROWS
            // =========================================

            const previousButton =
                document.getElementById(
                    "previousArt"
                );


            const nextButton =
                document.getElementById(
                    "nextArt"
                );


            if (
                userArts.length <= 1
            ) {

                previousButton.classList.add(
                    "hidden"
                );

                nextButton.classList.add(
                    "hidden"
                );

                return;

            }


            previousButton.classList.remove(
                "hidden"
            );


            nextButton.classList.remove(
                "hidden"
            );


            if (
                currentArtIndex === 0
            ) {

                previousButton.classList.add(
                    "hidden"
                );

            }


            if (
                currentArtIndex ===
                userArts.length - 1
            ) {

                nextButton.classList.add(
                    "hidden"
                );

            }

        }



        // =================================================
        // NEXT ART
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
        // PREVIOUS ART
        // =================================================

        function previousArt() {

            if (
                currentArtIndex > 0
            ) {

                currentArtIndex--;

                showArt();

            }

        }



        // =================================================
        // CLOSE ART DETAIL
        // =================================================

        function closeArtDetail() {

            const modal =
                document.getElementById(
                    "artDetail"
                );


            modal.classList.add(
                "hidden"
            );


            modal.classList.remove(
                "flex"
            );


            document.body.classList.remove(
                "overflow-hidden"
            );

        }



        // =================================================
        // EDIT ART
        // =================================================

        let editingArtIndex = null;


        function editArt(index) {

            const art =
                userArts[index];


            if (!art) return;


            editingArtIndex =
                index;


            document
                .getElementById(
                    "editImagePreview"
                )
                .src =
                art.image || "";


            document
                .getElementById(
                    "editTitle"
                )
                .value =
                art.title || "";


            document
                .getElementById(
                    "editDescription"
                )
                .value =
                art.description || "";


            document
                .getElementById(
                    "editCategory"
                )
                .value =
                art.category ||
                "Digital";


            document
                .getElementById(
                    "editImage"
                )
                .value = "";


            const modal =
                document.getElementById(
                    "editArtModal"
                );


            modal.classList.remove(
                "hidden"
            );


            modal.classList.add(
                "flex"
            );


            document.body.classList.add(
                "overflow-hidden"
            );

        }



        // =================================================
        // PREVIEW EDIT IMAGE
        // =================================================

        function previewEditImage(
            event
        ) {

            const file =
                event.target.files[0];


            if (!file) return;


            const reader =
                new FileReader();


            reader.onload =
                function(e) {

                    document
                        .getElementById(
                            "editImagePreview"
                        )
                        .src =
                        e.target.result;

                };


            reader.readAsDataURL(
                file
            );

        }



        // =================================================
        // SAVE EDITED ART
        // =================================================
        //
        // DATABASE NANTI:
        //
        // Di sini nantinya:
        //
        // UPDATE arts
        // WHERE id = ...
        //
        // =================================================

        function saveEditedArt() {

            if (
                editingArtIndex === null
            ) return;


            const title =
                document
                    .getElementById(
                        "editTitle"
                    )
                    .value
                    .trim();


            const description =
                document
                    .getElementById(
                        "editDescription"
                    )
                    .value
                    .trim();


            const category =
                document
                    .getElementById(
                        "editCategory"
                    )
                    .value;


            if (!title) {

                alert(
                    "Art Name belum diisi."
                );

                return;

            }


            if (!description) {

                alert(
                    "Description belum diisi."
                );

                return;

            }


            const art =
                userArts[
                    editingArtIndex
                ];


            art.title =
                title;


            art.description =
                description;


            art.category =
                category;


            const file =
                document
                    .getElementById(
                        "editImage"
                    )
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


                reader.readAsDataURL(
                    file
                );

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
                JSON.stringify(
                    userArts
                )
            );


            closeEditArt();


            renderArts();


            alert(
                "Art berhasil diperbarui!"
            );

        }



        // =================================================
        // CLOSE EDIT ART
        // =================================================

        function closeEditArt() {

            const modal =
                document.getElementById(
                    "editArtModal"
                );


            modal.classList.add(
                "hidden"
            );


            modal.classList.remove(
                "flex"
            );


            document.body.classList.remove(
                "overflow-hidden"
            );


            editingArtIndex =
                null;

        }



        // =================================================
        // ART SETTINGS
        // =================================================

        function openArtSettings(index) {

            const art =
                userArts[index];


            if (!art) return;


            document
                .getElementById(
                    "settingsArtName"
                )
                .textContent =
                art.title ||
                "Untitled";


            const modal =
                document.getElementById(
                    "artSettingsModal"
                );


            modal.classList.remove(
                "hidden"
            );


            modal.classList.add(
                "flex"
            );


            document.body.classList.add(
                "overflow-hidden"
            );



            // =========================================
            // EDIT BUTTON
            // =========================================

            document
                .getElementById(
                    "settingsEditButton"
                )
                .onclick =
                function() {

                    closeArtSettings();

                    editArt(index);

                };



            // =========================================
            // DELETE BUTTON
            // =========================================

            document
                .getElementById(
                    "settingsDeleteButton"
                )
                .onclick =
                function() {

                    deleteArt(index);

                };

        }



        // =================================================
        // CLOSE ART SETTINGS
        // =================================================

        function closeArtSettings() {

            const modal =
                document.getElementById(
                    "artSettingsModal"
                );


            modal.classList.add(
                "hidden"
            );


            modal.classList.remove(
                "flex"
            );


            document.body.classList.remove(
                "overflow-hidden"
            );

        }



        // =================================================
        // DELETE ART
        // =================================================
        //
        // DATABASE NANTI:
        //
        // DELETE FROM arts
        // WHERE id = ...
        //
        // =================================================

        function deleteArt(index) {

            const art =
                userArts[index];


            if (!art) return;


            const confirmDelete =
                confirm(
                    'Delete "' +
                    (
                        art.title ||
                        "Untitled"
                    ) +
                    '"?'
                );


            if (!confirmDelete) return;


            userArts.splice(
                index,
                1
            );


            localStorage.setItem(
                "userArts",
                JSON.stringify(
                    userArts
                )
            );


            closeArtSettings();


            renderArts();


            alert(
                "Art berhasil dihapus."
            );

        }



        // =================================================
        // SETTINGS NAVBAR
        // =================================================

        function toggleSettings() {

            const menu =
                document.getElementById(
                    "settingsMenu"
                );


            menu.classList.toggle(
                "hidden"
            );

        }



        // =================================================
        // CLOSE SETTINGS WHEN CLICK OUTSIDE
        // =================================================

        document.addEventListener(
            "click",
            function(event) {

                const menu =
                    document.getElementById(
                        "settingsMenu"
                    );


                const button =
                    event.target.closest(
                        "button"
                    );


                if (
                    !menu.contains(
                        event.target
                    ) &&
                    !button
                ) {

                    menu.classList.add(
                        "hidden"
                    );

                }

            }
        );



        // =================================================
        // RESET PROFILE + ALL ARTS
        // =================================================
        //
        // INI AKAN MENGHAPUS:
        //
        // - Nama
        // - Bio
        // - Foto Profile
        // - Semua Arts
        //
        // DATABASE NANTI:
        //
        // Tidak pakai localStorage lagi.
        // Nantinya Controller Laravel
        // akan menghapus/update data user
        // dan arts miliknya.
        //
        // =================================================

        function resetEverything() {

            const confirmReset =
                confirm(
                    "Reset profile dan semua art?\n\nSemua data profile dan karya yang tersimpan di browser akan dihapus."
                );


            if (!confirmReset) return;


            // Hapus profile

            localStorage.removeItem(
                "profileName"
            );


            localStorage.removeItem(
                "profileBio"
            );


            localStorage.removeItem(
                "profilePhoto"
            );


            // Hapus semua arts

            localStorage.removeItem(
                "userArts"
            );


            // Refresh

            location.reload();

        }



        // =================================================
        // LOGOUT
        // =================================================
        //
        // DATABASE NANTI:
        //
        // Nanti diganti dengan:
        //
        // Laravel Auth::logout()
        //
        // =================================================

        function logout() {

            const confirmLogout =
                confirm(
                    "Are you sure you want to logout?"
                );


            if (!confirmLogout) return;


            // Hapus login sementara

            localStorage.removeItem(
                "createopiaRole"
            );


            localStorage.removeItem(
                "createopiaEmail"
            );


            // Masuk kembali ke login

            window.location.href =
                "{{ route('login') }}";

        }



        // =================================================
        // CLICK OUTSIDE MODAL
        // =================================================

        document
            .getElementById(
                "editArtModal"
            )
            .addEventListener(
                "click",
                function(event) {

                    if (
                        event.target ===
                        this
                    ) {

                        closeEditArt();

                    }

                }
            );



        document
            .getElementById(
                "artSettingsModal"
            )
            .addEventListener(
                "click",
                function(event) {

                    if (
                        event.target ===
                        this
                    ) {

                        closeArtSettings();

                    }

                }
            );



        document
            .getElementById(
                "artDetail"
            )
            .addEventListener(
                "click",
                function(event) {

                    if (
                        event.target ===
                        this
                    ) {

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
                    document.getElementById(
                        "artDetail"
                    );


                const editModal =
                    document.getElementById(
                        "editArtModal"
                    );


                const settingsModal =
                    document.getElementById(
                        "artSettingsModal"
                    );


                // =========================================
                // ESC
                // =========================================

                if (
                    event.key ===
                    "Escape"
                ) {

                    if (
                        !editModal.classList.contains(
                            "hidden"
                        )
                    ) {

                        closeEditArt();

                        return;

                    }


                    if (
                        !settingsModal.classList.contains(
                            "hidden"
                        )
                    ) {

                        closeArtSettings();

                        return;

                    }


                    if (
                        !detail.classList.contains(
                            "hidden"
                        )
                    ) {

                        closeArtDetail();

                        return;

                    }

                }


                // =========================================
                // ARROW
                // =========================================

                if (
                    !detail.classList.contains(
                        "hidden"
                    )
                ) {

                    if (
                        event.key ===
                        "ArrowRight"
                    ) {

                        nextArt();

                    }


                    if (
                        event.key ===
                        "ArrowLeft"
                    ) {

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
                document.createElement(
                    "div"
                );


            div.textContent =
                text || "";


            return div.innerHTML;

        }

    </script>


</body>

</html>