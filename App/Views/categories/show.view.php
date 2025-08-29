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

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 flex flex-col flex-grow">
    <article>

        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex ">
            <h1 class="grow text-2xl font-bold  ">Categories - Detail</h1>
            <p class="text-md px-8 py-2 bg-prussianblue-500 hover:bg-prussianblue-600 text-white  transition ease-in-out duration-500">
                <a href="/categories/create">Add Category</a>
            </p>
        </header>

        <section>
            <?= loadPartial('message') ?>
        </section>

        <section class="w-full bg-white shadow  p-4 flex flex-col gap-4">
            <h4 class="-mx-4 bg-zinc-700 text-zinc-200 text-2xl p-4 -mt-4 mb-4  flex-0 flex justify-between">
                <?= $category->title ?? "" ?>
            </h4>

            <section class="flex-grow grid grid-cols-4">
                <h5 class="text-lg font-bold col-span-1 mt-4">
                    Description:
                </h5>

                <section class="col-span-1 md:col-span-3  max-w-96 description mt-4">
                    <?= html_entity_decode($category->description ?? "<i>No description.</i>") ?>
                </section>
            </section>

            <?php
            if (Framework\Authorisation::isOwner($category->user_id ?? 0)) :
                ?>
                <form method="POST"
                      action="/categories/<?= $category->id ?>"
                      class="px-4 py-4 mt-4 -mx-4 border-0 border-t-1 border-zinc-300 text-lg flex flex-row gap-8">

                    <a class="group relative inline-block overflow-hidden border bg-gray-50 border-emerald-500 px-12 py-2 focus:ring-2 focus:outline-hidden"
                       href="/categories">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-emerald-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-list inline-block mr-2"></i> Show All
                            </span>
                    </a>

                    <?php if ($category->id > 1): ?>

                        <a class="group relative inline-block overflow-hidden border bg-white border-amber-800 px-12 py-2 focus:ring-2focus:outline-hidden"
                           href="/categories/edit/<?= $category->id ?>"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-amber-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-edit inline-block mr-2"></i>
                                Edit
                            </span>
                        </a>

                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="category_id" value="<?= $category->id ?>">
                        <button type="submit"
                                class="group relative inline-block overflow-hidden border bg-white border-red-800 px-12 py-2 focus:ring-2focus:outline-hidden">
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-red-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-times inline-block mr-2"></i>
                                Delete
                            </span>
                        </button>
                    <?php endif ?>

                </form>

            <?php endif ?>

        </section>

    </article>
</main>


<?php
require_once basePath("App/Views/partials/footer.view.php");
?>

