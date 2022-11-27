<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />

    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    <title>Homepage | Portofolio</title>

    <meta property="og:title" content="Homepage | Portofolio" />

    <meta property="og:locale" content="en_US" />

    <link rel="canonical" href="//" />

    <meta property="og:url" content="//" />

    <meta name="description"
        content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />

    <link rel="icon" type="image/png" href="/assets/img/favicon.png" />

    <meta name="theme-color" content="#5540af" />

    <meta property="og:site_name" content="Atom Template" />

    <meta property="og:image" content="//assets/img/social.jpg" />

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:site" content="@tailwindmade" />

    <link crossorigin="crossorigin" href="https://fonts.gstatic.com" rel="preconnect" />

    <link as="style"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Raleway:wght@400;500;600;700&display=swap"
        rel="preload" />

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Raleway:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <link crossorigin="anonymous" href="/assets/styles/main.min.css" media="screen" rel="stylesheet" />

    <script defer src="https://unpkg.com/@alpine-collective/toolkit@1.0.0/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>


<body :class="{ 'overflow-hidden max-h-screen': mobileMenu }" class="relative" x-data="{ mobileMenu: false }">
    <div x-data="{
        shownStep: about,
        triggerNavItem(id) {
                $scroll(id)
            },
            triggerMobileNavItem(id) {
                mobileMenu = false;
                this.triggerNavItem(id)
            }
    }">
        <div class=" w-full z-50 top-0 py-3 sm:py-5 fixed bg-primary  transition duration-500 ease-in-out"
            id="nav">
            <div class="container flex
            items-center justify-between">
                <div>
                    <a href="/">
                        {{-- <img src="/assets/img/logo.svg" class="w-20 lg:w-36" alt="logo image" /> --}}
                        <p class="text-4xl text-white font-bold" >NizNet.</p>
                    </a>
                </div>
                <div class="hidden lg:block">
                    <ul class="flex items-center">

                        <li class="group pl-6 click text-white" id="nav1">

                            <span :class="shownStep == 'about' ? 'text-yellow' : ''" @click="triggerNavItem('#about')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow">About</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow "></span>
                        </li>

                        <li class="group pl-6 click text-white" id="nav2">

                            <span :class="shownStep == 'services' ? 'text-yellow' : ''"
                            @click="triggerNavItem('#services')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow">Services</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow"></span>
                        </li>

                        <li class="group pl-6 click text-white" id="nav3">

                            <span :class="shownStep == 'portfolio' ? 'text-yellow' : ''"
                            @click="triggerNavItem('#portfolio')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow">Portfolio</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow"></span>
                        </li>

                        <li class="group pl-6 click text-white" id="nav4">

                            <span :class="shownStep == 'work' ? 'text-yellow' : ''"
                            @click="triggerNavItem('#work')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow">Work</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow"></span>
                        </li>

                        <li class="group pl-6 click text-white" id="nav5">

                            <span :class="shownStep == 'blog' ? 'text-yellow' : ''"
                            @click="triggerNavItem('#blog')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow ">Blog</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow"></span>
                        </li>

                        <li class="group pl-6 click text-white" id="nav6">

                            <span :class="shownStep == 'contact' ? 'text-yellow' : ''"
                            @click="triggerNavItem('#contact')"
                                class="cursor-pointer pt-0.5 font-header font-semibold uppercase hover:text-yellow">Contact</span>

                            <span class="block h-0.5 w-full bg-transparent group-hover:bg-yellow"></span>
                        </li>

                    </ul>
                </div>
                <div class="block lg:hidden">
                    <button @click="mobileMenu = true">
                        <i class="bx bx-menu text-4xl text-white"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="pointer-events-none fixed inset-0 z-70 min-h-screen bg-black bg-opacity-70 opacity-0 transition-opacity lg:hidden"
            :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
            <div class="absolute right-0 min-h-screen w-2/3 bg-primary py-4 px-8 shadow md:w-1/3">
                <button class="absolute top-0 right-0 mt-4 mr-4" @click="mobileMenu = false">
                    <img src="/assets/img/icon-close.svg" class="h-10 w-auto" alt="" />
                </button>

                <ul class="mt-8 flex flex-col">

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#about')"
                            class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">About</span>

                    </li>

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#services')"
                            class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Services</span>

                    </li>

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#portfolio')"
                            class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Portfolio</span>

                    </li>

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#work')"
                            class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Work</span>

                    </li>

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#blog')"
                            class="cursor-pointer pt-0.5 font-header font-semibold uppercase text-white">Blog</span>

                    </li>

                    <li class="py-2">

                        <span @click="triggerMobileNavItem('#contact')"
                            class="cursor-pointer pt-0.5 font-header font-semibold  uppercase text-white">Contact</span>

                    </li>

                </ul>
            </div>
        </div>

        @yield('site-content')

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="/assets/js/main.js"></script>
        <script>
            $(document).ready(function() {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll > 200) {
                        $("#nav").removeClass('bg-transparent');
                    } else {
                        $("#nav").addClass('bg-transparent');
                    }
                })
            })
        </script>
</body>

</html>
