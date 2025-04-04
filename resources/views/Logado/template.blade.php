<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Final do aviso de consentimento de cookies OneTrust para cut.rr.sebrae.com.br -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Short - Sebrae RR
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    @yield('encurtador-head')
    @yield('index-head')

    @vite('resources/css/Template/main.css')
    @vite(['resources/js/app.js'])
    <style>
        .gradient {
            background: linear-gradient(90deg, #3353d5 0%, #0445bc 100%);
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <object type="image/svg+xml" class="w-20 ml-1" data="{{ asset('/assets/Index/images/Logo_sebrae3.png') }}"></object>
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                    href="{{ route('welcome') }}">
                    Encurtador
                </a>
            </div>
            <div class="block lg:hidden pr-2">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div x-data="{openProfile: false }"
                class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <div class="relative z-10 ml-auto">
                    <div @click="openProfile = !openProfile; openEncurtador = false ; openSorteador = false"
                        class="w-12 h-12 cursor-pointer overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none rounded-full">
                        <img src="{{ app('userBitrix')['PERSONAL_PHOTO'] }}" alt="User Photo"
                            class="object-cover w-full h-full">
                    </div>
                    <div x-show="openProfile" @click.away="openProfile = false"
                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300 rounded-md">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-b border-black opacity-25 my-0 py-0" />
    </nav>

    @yield('index-body')
    @yield('encurtador-body')
    @yield('sorteador-body')
    @yield('meusLinks-body')
    <!--Footer-->
    <footer class="bg-gray-200">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">

            </div>
        </div>
        </div>
    </footer>
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.style.top = "-100px";
            } else {
                header.style.top = "0";
            }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
