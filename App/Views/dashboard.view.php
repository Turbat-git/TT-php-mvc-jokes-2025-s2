<?php
/**
 * Home Page View
 *
 * Filename:        home.view.php
 * Location:        /App/Views
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    23/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

<main class="container mx-auto bg-gray-50 py-8 px-4 shadow shadow-black/25 title">
    <article>
        <header class="bg-gray-700 text-gray-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-2 ">
            <h1>Vanilla PHP MVC Demo</h1>
        </header>

        <section class="bg-gray-500
                        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
                        gap-8 -mx-4 -mt-2 px-4 py-0
                        border border-t-0 border-x-0 border-b-gray-300">

            <section class=" my-8
                            grid grid-cols-4 items-center justify-center
                            bg-gray-100 dark:bg-gray-800 shadow">
                <div class=" p-4 align-center text-center
                            col-span-1
                            text-amber-800 dark:text-amber-500
                            bg-amber-500 dark:bg-amber-800 mr-4">
                    <p class="text-center"><i class="fa fa-mug-saucer text-4xl"></i></p>
                    <h4 class="text-center mb-0 text-xs font-medium">
                        Jokes
                    </h4>
                </div>
                <div class="col-span-3">
                    <p class="text-4xl font-semibold text-amber-700 dark:text-amber-200">
                        <?= $jokeCount->total ?? "-" ?>
                    </p>
                </div>
            </section>


            <section class=" my-8
                            grid grid-cols-4 items-center justify-center
                            bg-gray-100 dark:bg-gray-800 shadow">
                <div class=" p-4 align-center text-center
                            col-span-1
                            text-green-800 dark:text-green-500
                            bg-green-500 dark:bg-green-800 mr-4">
                    <p class="text-center"><i class="fa fa-mug-saucer text-4xl"></i></p>
                    <h4 class="text-center mb-0 text-xs font-medium">
                        Categories
                    </h4>
                </div>
                <div class="col-span-3">
                    <p class="text-4xl font-semibold text-green-700 dark:text-green-200">
                        <?= $categoryCount->total ?? "-" ?>
                    </p>
                </div>
            </section>


            <section class=" my-8
                            grid grid-cols-4 items-center justify-center
                            bg-gray-100 dark:bg-gray-800 shadow">
                <div class=" p-4 align-center text-center
                            col-span-1
                            text-prussianblue-800 dark:text-prussianblue-500
                            bg-prussianblue-500 dark:bg-prussianblue-800 mr-4">
                    <p class="text-center"><i class="fa fa-users text-4xl"></i></p>
                    <h4 class="text-center mb-0 text-xs font-medium">
                        Users
                    </h4>
                </div>
                <div class="col-span-3 ">

                    <p class="text-4xl font-semibold text-prussianblue-700 dark:text-prussianblue-200">
                        <?= $userCount->total ?? "-" ?>
                    </p>
                </div>
            </section>

        </section>

        <section class="my-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-center">

            <?php
            foreach ($products ?? [] as $product):
                ?>
                <!--            article>(header>h4{Name})+(section>p{Description})+(footer>p{Price})-->
                <article class="bg-gray-100 border border-gray-400 shadow  flex flex-col overflow-hidden">
                    <header class="-mx-2 bg-gray-700 text-gray-200 text-lg  flex-0">
                        <h4 class="h-20 px-6 py-2">
                            <?= $product->name ?>
                        </h4>
                    </header>
                    <img class="h-24 md:h-48 lg:h-56 w-full object-cover" src="https://picsum.photos/640/480"
                         alt="">
                    <section class="flex-grow p-4">
                        <div class="text-gray-600 bg-gray-100 parsedown">
                            <?= html_entity_decode($product->description) ?>
                        </div>
                    </section>
                    <footer class="-mx-2 bg-gray-200 text-gray-900 text-sm px-4 py-4 -mb-2  flex-0 flex justify-between">
                        <p class="">Price: $<?= $product->price / 100 ?></p>
                        <a href="/products/<?= $product->id ?>"
                           class="btn">
                            More details...
                        </a>
                    </footer>
                </article>

            <?php
            endforeach
            ?>
        </section>

    </article>
</main>


<?php
loadPartial('footer');
?>
