<?php
/**
 * HTML Template using TailwindCSS
 *
 * Filename:        template.php
 * Location:        public
 * Project:         XXX-SaaS-Vanilla-MVC-SN
 * Date Created:    2025-03-13
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <!-- During DEVELOPMENT the src/source.css file is used -->
    <link rel="stylesheet" href="./src/source.css">
    <!-- For production the assets/css/site.css file will be used -->
    <link rel="stylesheet" href="./assets/css/site.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/css/all.css">

</head>
<body class="bg-white flex flex-col h-screen justify-between">

<header class="bg-neutral-950 text-neutral-200 p-4 flex-grow-0 flex flex-row align-middle content-center">
    <h1 class="flex-0 w-32 text-xl p-4 ">
        <a href="#"
           class="py-4 px-4 -mx-4 -my-4 font-bold  text-neutral-300 hover:text-neutral-700 hover:bg-neutral-300
                     transition ease-in-out duration-500">
            MVC
        </a>
    </h1>
    <nav class="flex flex-row py-4 flex-grow ml-8">
        <ul class="flex flex-row gap-4 flex-grow">
            <li>
                <a href="/"
                   class="pb-2 px-1 text-neutral-400 hover:text-neutral-300
                     border-0 border-b-2 hover:border-b-neutral-500
                     transition ease-in-out duration-500">
                    Home
                </a>
            </li>

            <li>
                <a href="#"
                   class="pb-2 px-1 text-neutral-400 hover:text-neutral-300
                     border-0 border-b-2 hover:border-b-neutral-500
                     transition ease-in-out duration-500">
                    Link 1
                </a>
            </li>
        </ul>

        <ul class="flex flex-row gap-4">
            <li>
                <form method="POST" action="#" class="">
                    <button class="pb-2 px-1 text-sm text-neutral-400 hover:text-neutral-300
                     border-0 border-b-2 hover:border-b-neutral-500
                     transition ease-in-out duration-500">
                        <i class="fa fa-door-open"></i> Login
                    </button>
                </form>
            </li>
            <li>
                <form method="POST" action="#" class="">
                    <button class="pb-2 px-1 text-sm text-neutral-400 hover:text-neutral-300
                     border-0 border-b-2 hover:border-b-neutral-500
                     transition ease-in-out duration-500">
                        <i class="fa fa-user-plus"></i> Register
                    </button>
                </form>
            </li>
            <li>
                <form method="POST" action="#" class="">
                    <button class="pb-2 px-1 text-sm text-neutral-400 hover:text-neutral-300
                     border-0 border-b-2 hover:border-b-neutral-500
                     transition ease-in-out duration-500">
                        <i class="fa fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            <li>
                <form method="GET" action="#" class="block mx-5">
                    <input type="text" name="keywords" placeholder="Product search..."
                           class="w-full md:w-auto px-4 py-2 focus:outline-none"/>
                    <button class="w-full md:w-auto bg-neutral-500 hover:bg-neutral-600 text-white px-4 py-2 focus:outline-none transition ease-in-out duration-500">
                        <i class="fa fa-search"></i> Search
                    </button>
                </form>
            </li>

        </ul>

    </nav>
</header>


<main class="container mx-auto bg-neutral-50 py-8 px-4 shadow shadow-black/25 ">
    <article>
        <header class="bg-neutral-700 text-neutral-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8 ">
            <h1>Vanilla PHP MVC Demo</h1>
        </header>
        <section class="grid grid-cols-2 my-8 gap-4 ">

            <section class="w-full min-w-64 bg-white shadow  grid grid-cols-3">
                <header class=" bg-neutral-700 text-neutral-200 text-lg p-4  col-span-1 ">
                    <h4 class="text-center flex flex-col gap-1">
                        <i class="fa fa-list-squares text-5xl text-neutral-500"></i>
                        <span class="text-sm">Categories</span>
                    </h4>
                </header>
                <p class="col-span-2 text-3xl ml-6 my-auto text-center">
                    15
                </p>
            </section>
            <section class="w-full min-w-64 bg-white shadow  grid grid-cols-3">
                <header class=" bg-neutral-700 text-neutral-200 text-lg p-4  col-span-1 ">
                    <h4 class="text-center flex flex-col gap-1">
                        <i class="fa fa-user text-5xl text-neutral-500"></i>
                        <span class="text-sm">Users</span>
                    </h4>
                </header>
                <p class="col-span-2 text-3xl ml-6 my-auto text-center">
                    6
                </p>
            </section>

        </section>
        <section class="flex flex-wrap gap-8 justify-stretch">
            <!--            article>(header>h4{Name})+(section>p{Description})+(footer>p{Price})-->
            <article class="max-w-96 min-w-64 bg-white shadow  p-2 flex flex-col">
                <header class="-mx-2 bg-neutral-700 text-neutral-200 text-lg p-4 -mt-2 mb-4  flex-0">
                    <h4>
                        German Shepherd
                    </h4>
                </header>
                <section class="flex-grow grid grid-cols-5">
                    <p class="ml-4 col-span-2">
                        <img class="w-24 h-24 " src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                             alt="">
                    </p>
                    <p class="col-span-3 text-neutral-600">
                        BrickHeadz theme: A BrickHeadz pet set featuring a cute German Shepherd and puppy, great for dog
                        lovers.
                    </p>
                </section>
                <footer class="-mx-2 bg-neutral-200 text-neutral-900 text-sm px-4 py-1 mt-4 -mb-2  flex-0 grid grid-cols-2">
                    <p class="my-auto">Price: $19.99</p>
                    <a href="/products/40440"
                       class="block w-full text-center px-5 py-2.5 shadow-sm  border
                                  text-base font-medium text-neutral-700 bg-neutral-100 hover:bg-neutral-200">
                        Details
                    </a>
                </footer>
            </article>
            <!--            article>(header>h4{Name})+(section>p{Description})+(footer>p{Price})-->
            <article class="max-w-96 min-w-64 bg-white shadow  p-2 flex flex-col">
                <header class="-mx-2 bg-neutral-700 text-neutral-200 text-lg p-4 -mt-2 mb-4  flex-0">
                    <h4>
                        The Mandalorian & The Child BrickHeadz
                    </h4>
                </header>
                <section class="flex-grow grid grid-cols-5">
                    <p class="ml-4 col-span-2">
                        <img class="w-24 h-24 " src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                             alt="">
                    </p>
                    <p class="col-span-3 text-neutral-600">
                        Star Wars theme: A BrickHeadz double pack featuring The Mandalorian and The Child (Baby Yoda),
                        perfect for fans of the popular Star Wars series.
                    </p>
                </section>
                <footer class="-mx-2 bg-neutral-200 text-neutral-900 text-sm px-4 py-1 mt-4 -mb-2  flex-0 grid grid-cols-2">
                    <p class="my-auto">Price: $29.99</p>
                    <a href="/products/75317"
                       class="block w-full text-center px-5 py-2.5 shadow-sm  border
                                  text-base font-medium text-neutral-700 bg-neutral-100 hover:bg-neutral-200">
                        Details
                    </a>
                </footer>
            </article>
            <!--            article>(header>h4{Name})+(section>p{Description})+(footer>p{Price})-->
            <article class="max-w-96 min-w-64 bg-white shadow  p-2 flex flex-col">
                <header class="-mx-2 bg-neutral-700 text-neutral-200 text-lg p-4 -mt-2 mb-4  flex-0">
                    <h4>
                        Sheep BrickHeadz
                    </h4>
                </header>
                <section class="flex-grow grid grid-cols-5">
                    <p class="ml-4 col-span-2">
                        <img class="w-24 h-24 " src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                             alt="">
                    </p>
                    <p class="col-span-3 text-neutral-600">
                        BrickHeadz theme: This set features an adorable sheep with a cute, blocky design, perfect for
                        collectors and fans of the BrickHeadz series.
                    </p>
                </section>
                <footer class="-mx-2 bg-neutral-200 text-neutral-900 text-sm px-4 py-1 mt-4 -mb-2  flex-0 grid grid-cols-2">
                    <p class="my-auto">Price: $19.99</p>
                    <a href="/products/40380"
                       class="block w-full text-center px-5 py-2.5 shadow-sm  border
                                  text-base font-medium text-neutral-700 bg-neutral-100 hover:bg-neutral-200">
                        Details
                    </a>
                </footer>
            </article>

        </section>

    </article>
</main>


<!-- Page Footer -->
<!-- based on https://www.creative-tim.com/twcomponents/component/tailwind-css-footer-1-->
<footer class="w-full text-zinc-400 bg-neutral-950 body-font text-sm pt-4">
    <section class="max-w-screen-xl mx-auto px-4 sm:px-6
         text-zinc-400 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-6 justify-between">
        <nav class="p-5">
            <h5 class="text-left font-medium tracking-widest text-zinc-500 uppercase title-font text-xs">
                About
            </h5>
            <a class="my-1 block" href="/#">Company <span class="text-neutral-600 text-xs p-1"></span>
            </a>
            <a class="my-1 block" href="/#">Careers <span class="text-neutral-600 text-xs p-1"></span>
            </a>
            <a class="my-1 block" href="/#">Blog <span class="text-neutral-600 text-xs p-1">New</span>
            </a>
        </nav>
        <nav class="p-5">
            <h5 class="text-left font-medium tracking-widest text-zinc-500 uppercase title-font text-xs">
                Resources
            </h5>

            <a class="my-1 block" href="/#">Documentation <span class="text-neutral-600 text-xs p-1"></span>
            </a>
            <a class="my-1 block" href="/#">Tutorials <span class="text-neutral-600 text-xs p-1"></span>
            </a>
            <a class="my-1 block" href="/#">Release Updates <span class="text-neutral-600 text-xs p-1"></span>
            </a>
        </nav>
        <nav class="p-5">
            <h5 class="text-left font-medium tracking-widest text-zinc-500 uppercase title-font text-xs">
                Support
            </h5>

            <a class="my-1 block" href="https://help.screencraft.net.au">Help Center <span
                        class="text-neutral-600 text-xs p-1">New</span>
            </a>
            <a class="my-1 block" href="https://help.screencraft.net.au/hc/2680392001">FAQs <span
                        class="text-neutral-600 text-xs p-1">New</span>
            </a>
            <a class="my-1 block" href="/#">Privacy Policy <span class="text-neutral-600 text-xs p-1">TBA</span>
            </a>
            <a class="my-1 block" href="/#">Conditions <span class="text-neutral-600 text-xs p-1">TBA</span>
            </a>
        </nav>
        <nav class="p-5">
            <h5 class="text-left font-medium tracking-widest text-zinc-500 uppercase title-font text-xs">
                Contact us
            </h5>

            <a class="my-1 block" href="/#">123 No Return Point, Perth WA, Australia
                <span class="text-neutral-600 text-xs p-1"></span>
            </a>

            <a class="my-1 block" href="/#">contact@example.com
                <span class="text-neutral-600 text-xs p-1"></span>
            </a>
        </nav>
        <nav class="p-5 col-span-2 md:col-span-5 lg:col-span-2">
            <p class="text-zinc-400">&copy; Copyright 2025 Turbat Turkhuu. All rights reserved
                .</p>
            <p class="text-xs">
                Based on the <a href="https://github.com/bradtraversy/workopia-php"
                                class="text-zinc-500 hover:text-white underline underline-offset-2">Workopia Project</a>
                from the
                <a href="https://www.traversymedia.com/php-from-scratch"
                   class="text-zinc-500 hover:text-white underline underline-offset-2">PHP From Scratch</a> course, and
                the subsequent
                <a href="https://github.com/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN/tree/main/session-07"
                   class="text-zinc-500 hover:text-white underline underline-offset-2">supporting tutorial</a>
                by <a href="https://adygcode.github.io"
                      class="text-zinc-500 hover:text-white">Adrian Gould</a> &
                <a href="https://www.northmetrotafe.wa.edu.au"
                   class="text-zinc-500 hover:text-red-700">North Metropolitan TAFE</a>
            </p>
            <p>License: MIT Open Source Licensing</p>
        </nav>
    </section>
</footer>

</body>
</html>
