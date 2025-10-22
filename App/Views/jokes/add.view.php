<?php
/**
 * Add Page View
 *
 * Filename:        add.view.php
 * Location:        /App/Views/Jokes
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    23/08/2024
 *
 * Author:          Turbat Turkhuu <20136824@tafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25
                 flex justify-center items-center mt-8 w-1/2 ">

        <section class="bg-white p-8 title shadow-md md:w-500 mx-6 w-full">

            <h2 class="text-4xl text-left font-bold mb-4">
                Add Joke
            </h2>

            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <form method="POST" action="/add">

                <section class="mb-4">
                    <label for="Title" class="mt-4 pb-1">Title:</label>
                    <input type="text" id="Title"
                           name="title" placeholder="Title"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                </section>

                <section class="mb-4">
                    <label for="Content" class="mt-4 pb-1">Content:</label>
                    <input type="text" id="Content"
                           name="content" placeholder="Content"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                </section>

                <section class="mb-4">
                    <label for="Category" class="mt-4 pb-1">Category:</label>
                    <select name="category" id="Category"
                            class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none">
                        <?php if (empty($joke['categories'])) : ?>
                            <option value="" disabled selected>Select State</option>
                        <?php endif ?>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?= $category->id ?>"
                                <?php if (!empty($old_input['category_id']) && (int)$old_input['category_id'] === $category->id) :
                                    echo 'selected';
                                endif ?>
                            ><?= $category->title ?>
                            </option>
                        <?php endforeach ?>?
                    </select>

                </section>

                <section class="mb-4 flex flex-row gap-4 justify-between">
                    <button type="submit"
                            class="group relative inline-block overflow-hidden border bg-white border-sky-800 px-12 py-1 focus:ring-2focus:outline-hidden">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-sky-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-user-plus inline-block mr-2"></i>
                                Add
                            </span>
                    </button>

                    <div class="text-zinc-700 inline-flex justify-right">
                        <a href="jokes.view.php"> Back </a>
                    </div>
                </section>

            </form>
        </section>
    </main>

<?php
loadPartial('footer');
?>