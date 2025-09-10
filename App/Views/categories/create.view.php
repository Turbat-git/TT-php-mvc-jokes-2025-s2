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
                <h1 class="grow text-2xl font-bold ">Categories - Add</h1>

            </header>

            <section>
                <?= loadPartial('message') ?>

                <?= loadPartial('errors', [
                        'errors' => $errors ?? []
                ]) ?>

                <form id="CategoryForm" method="POST" action="/categories">

                    <h2 class="text-2xl font-bold mb-6 text-left text-neutral-500">
                        Category Information
                    </h2>

                    <div class="mb-4">
                        <label for="Title">Title:</label>
                        <input id="Title" type="text" name="title" placeholder="Category Title"
                               class="w-full px-4 py-2 border focus:outline-none"
                               value="<?= $category['title'] ?? '' ?>"/>
                    </div>

                    <div class="mb-4">
                        <label for="Description">Description:</label>
                        <textarea id="Description" name="description" placeholder="Category Description"
                                  class="w-full px-4 py-2 border focus:outline-none"
                        ><?= $category['description'] ?? '' ?></textarea>
                    </div>

                    <div class="flex flex-row gap-8">
                        <button type="submit"
                                class="group relative inline-block overflow-hidden border bg-white border-green-800 px-12 py-1 focus:ring-2focus:outline-hidden">
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-green-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-check inline-block mr-2"></i>
                                Save
                            </span>
                        </button>

                        <a class="group relative inline-block overflow-hidden border bg-white border-blue-800 px-10 py-1 focus:ring-2focus:outline-hidden"
                           href="/categories"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-blue-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa-solid fa-cancel mr-4"></i>
                                Cancel
                            </span>
                        </a>


                    </div>

                </form>

            </section>

        </article>
    </main>

<?php
loadPartial("footer");

