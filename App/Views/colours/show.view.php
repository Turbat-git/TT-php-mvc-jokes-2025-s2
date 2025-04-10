<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        index.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */


loadpartial("header");
loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex rounded-t-lg">
            <h1 class="grow text-2xl font-bold  rounded-t-lg">Colour - Detail</h1>
            <p class="text-md px-8 py-2 bg-prussianblue-500 hover:bg-prussianblue-600 text-white rounded transition ease-in-out duration-500">
                <a href="/colours/create">Add Colour</a>
            </p>

        </header>
        <section>
            <?= loadPartial('message') ?>
        </section>
        <section class="w-full bg-white shadow rounded p-4 flex flex-col gap-4">
            <h4 class="-mx-4 bg-zinc-700 text-zinc-200 text-2xl p-4 -mt-4 mb-4 rounded-t flex-0 flex justify-between">
                <?= $colour->name ?>
            </h4>

            <section class="flex-grow grid grid-cols-4">
                <h5 class="col-span-1 text-lg font-bold w-1/6 min-w-1/6">
                    Sample:
                </h5>
                <p class="col-span-1 md:col-span-3 h-32 w-96 rounded-lg"
                   style="background-color: <?= $colour->oklch ?>">
                    <span class="w-32 h-96"></span>
                </p>

                <h5 class="text-lg font-bold col-span-1 mt-4">
                    RGB Hex Code:
                </h5>
                <section class="col-span-1 md:col-span-3 description mt-4">
                    #<?= html_entity_decode($colour->hex_code) ?>
                </section>

                <h5 class="text-lg font-bold col-span-1 mt-4">
                    RGB:
                </h5>
                <section class="col-span-1 md:col-span-3 description mt-4">
                    <?= $colour->red ?>, <?= $colour->green ?>, <?= $colour->blue ?>
                </section>

                <h5 class="text-lg font-bold col-span-1 mt-4">
                    Luminescence Chroma Hue:
                </h5>
                <p class="col-span-1 md:col-span-3 text-lg text-zinc-600 mt-4">
                    <?= $colour->l ?>%, <?= $colour->c ?>%, <?= $colour->h ?>°
                </p>
                <h5 class="text-lg font-bold col-span-1 mt-4">
                    CSS OKLCH:
                </h5>
                <p class="col-span-1 md:col-span-3 text-lg text-zinc-600 mt-4">
                    oklch(<?= $colour->l ?> <?= $colour->c ?> <?= $colour->h ?>)
                </p>
            </section>

            <form method="POST"
                  class="px-4 py-4 mt-4 -mx-4 border-0 border-t-1 border-zinc-300 text-lg flex flex-row gap-8">

                <a href="/colours/edit/<?= $colour->id ?>"
                   class="ml-8 px-16 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded transition ease-in-out duration-500">
                    <i class="fa fa-pen inline-block mr-2"></i>
                    Edit
                </a>

                <a href="/colours/"
                   class="px-16 py-2 bg-prussianblue-500 hover:bg-prussianblue-700 text-white rounded transition ease-in-out duration-500">
                    <i class="fa fa-list inline-block mr-2"></i>
                    All Colours
                </a>

                <input type="hidden" name="_method" value="DELETE">
                <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded transition ease-in-out duration-500">
                    <i class="fa fa-times inline-block mr-2"></i>
                    Delete
                </button>
            </form>


        </section>

    </article>
</main>


<?php
require_once basePath("App/Views/partials/footer.view.php");
?>

