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

/* Load HTML header and navigation areas */
loadPartial("header");
loadPartial('navigation');

?>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex text-md ">
                <h2 class="grow text-2xl font-bold ">Categories</h2>

                <a class="group relative inline-block overflow-hidden border bg-gray-500 border-gray-800 px-6 py-2 focus:ring-2 focus:outline-hidden"
                   href="/categories/create">
                    <span class="absolute inset-y-0 left-0 w-[2px] bg-prussianblue-600 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                    <span class="relative text-sm font-medium text-white transition-colors group-hover:text-white">
                                <i class="fa fa-list"></i> Add Category
                        </span>
                </a>

                <form method="GET" action="#" class="mx-5 flex gap-0">
                    <label class="py-2 pr-2" for="CategoryKeywords"><span class="sr-only">Search:</span></label>

                    <input type="text" name="keywords" id="CategoryKeywords" placeholder="Search Categories..."
                           value="<?php if (isset($keywords)): ?><?= $keywords ?><?php endif ?>"
                           class=" md:w-auto px-4 py-1 border border-gray-500 focus:outline-none focus:border-b-gray-500"/>

                    <button class="group relative inline-block overflow-hidden border bg-gray-500 border-gray-500 px-6 py-1 focus:ring-2 focus:outline-hidden">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-blue-800 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium text-white transition-colors group-hover:text-white">
                                <i class="fa fa-search"></i> Search
                            </span>
                    </button>

                    <a class="group relative inline-block overflow-hidden border bg-gray-500 border-gray-500 px-6 py-2 focus:ring-2 focus:outline-hidden"
                       href="/categories">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-emerald-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium text-white transition-colors group-hover:text-white">
                                <i class="fa fa-list"></i> All
                            </span>
                    </a>
                </form>

            </header>

            <section class="text-xl text-zinc-500 my-8">
                <?php if (isset($keywords) && strlen($keywords) > 0) : ?>
                    <p>Search Results for: "<?= htmlspecialchars($keywords) ?>"</p>
                    <p class="text-sm">Found <?= count($categories ?? []) ?> from <?= $categoryCount->total ?>
                        categories</p>
                <?php else : ?>
                    <p>All <?= $categoryCount->total ?> Categories</p>
                <?php endif; ?>

                <?= loadPartial('message') ?>
            </section>

            <table class="table w-full p-8">
                <thead>
                <tr>
                    <th class="w-1/4 text-left px-2">Name</th>
                    <th class="w-1/4 text-left px-2">Joke Count</th>
                    <th class="text-left px-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories ?? [] as $id => $category):
                    ?>

                    <tr class="duration-500 transition-all ease-in-out border-0 border-b border-gray-200 <?= ($id % 2) ? ' bg-gray-50 ' : 'bg-gray-100' ?> hover:bg-gray-300">
                        <th class="w-1/4 text-left py-1 px-2">
                            <?= ucfirst($category->title) ?>
                        </th>

                        <td class="w-1/4 py-1 px-2">
                            TODO: COUNT
                        </td>
                        <td class="px-2">

                            <form method="POST"
                                  action="/categories/<?= $category->id ?>"
                                  class="px-4 py-1 mt-0 -mx-4 text-lg inline-flex gap-2">


                                <a class="group relative inline-block overflow-hidden border bg-white border-blue-800 px-10 py-1 focus:ring-2focus:outline-hidden"
                                   href="/categories/<?= $category->id ?>"
                                >
                                    <span class="absolute inset-y-0 left-0 w-[2px] bg-blue-800 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                                    <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                        Details <i class="fa-solid fa-eye"></i>
                                    </span>
                                </a>

                                <?php
                                if (Framework\Authorisation::isAdmin() || Framework\Authorisation::isOwner($category->user_id ?? 0)) :
                                ?>
                                <?php if ($category->id > 1): ?>

                                    <a class="group relative inline-block overflow-hidden border bg-white border-amber-800 px-10 py-1 focus:ring-2focus:outline-hidden"
                                       href="/categories/edit/<?= $category->id ?>"
                                    >
                                        <span class="absolute inset-y-0 left-0 w-[2px] bg-amber-800 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                                        <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                            Edit <i class="fa-solid fa-edit"></i>
                                        </span>
                                    </a>

                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="category_id" value="<?= $category->id ?>">
                                    <button type="submit"
                                            class="group relative inline-block overflow-hidden border bg-white border-red-800 px-4 py-1 focus:ring-2focus:outline-hidden">
                                        <span class="absolute inset-y-0 left-0 w-[2px] bg-red-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                                        <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                            <i class="fa fa-times inline-block mr-2"></i>
                                                Delete
                                            </span>
                                    </button>
                                <?php endif ?>

                            </form>

                            <?php endif ?>


                        </td>
                    </tr>

                <?php
                endforeach
                ?>
                </tbody>
            </table>

        </article>
    </main>


<?php
loadPartial("footer");

