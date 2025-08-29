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

loadPartial("header");
loadPartial('navigation');


?>
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
    <script src="/assets/js/editor.js"></script>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h2 class="grow text-2xl font-bold ">Categories - Edit</h2>

                <a class="group relative inline-block overflow-hidden border bg-gray-500 border-gray-800 px-6 py-2 focus:ring-2 focus:outline-hidden"
                   href="/categories/create">
                    <span class="absolute inset-y-0 left-0 w-[2px] bg-prussianblue-600 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                    <span class="relative text-sm font-medium text-white transition-colors group-hover:text-white">
                                <i class="fa fa-list"></i> Add Category
                        </span>
                </a>
            </header>

            <section>

                <?= loadPartial('message') ?>

                <?= loadPartial('errors', [
                    'errors' => $errors ?? []
                ]) ?>

                <form id="CategoryForm" method="POST" action="/categories/<?= $category_id ?>">
                    <input type="hidden" name="_method" value="PUT">

                    <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                        Category Information
                        <input id="CategoryID" type="hidden" name="category_id"
                               value="<?= $category->id ?>"/>
                    </h2>

                    <div class="mb-4">
                        <label for="Name">Name:</label>
                        <input id="Name" type="text" name="title" placeholder="Category Name"
                               class="w-full px-4 py-2 border  border-zinc-500  focus:outline-none"
                               value="<?= $category->title ?? '' ?>"/>
                    </div>

                    <div class="mb-4">
                        <label for="Description">Description:</label>
                        <div id="toolbar"></div>
                        <textarea id="Description" name="description" placeholder="Category Description"
                                  class="w-full px-4 py-2 border border-zinc-500  focus:outline-none"
                        ><?= $category->description ?? '' ?></textarea>
                    </div>


                    <div class="flex flex-row gap-4">
                        <button type="submit"
                                class="group relative inline-block overflow-hidden border bg-white border-green-800 px-12 py-1 focus:ring-2focus:outline-hidden">
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-green-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-check inline-block mr-2"></i>
                                Save
                            </span>
                        </button>

                        <a class="group relative inline-block overflow-hidden border bg-white border-blue-800 px-10 py-1 focus:ring-2focus:outline-hidden"
                           href="/categories/<?= $category->id ?>"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-blue-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa-solid fa-cancel mr-4"></i>
                                Cancel
                            </span>
                        </a>

                        <a class="group relative inline-block overflow-hidden border bg-white border-emerald-800 px-10 py-1 focus:ring-2focus:outline-hidden"
                           href="/categories"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-emerald-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa-solid fa-list mr-4"></i>
                                Show All
                            </span>
                        </a>

                    </div>

                </form>

            </section>

        </article>
    </main>


<?php
loadPartial("footer");

