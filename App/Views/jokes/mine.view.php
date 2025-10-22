<?php
/**
 * Mine Page View
 *
 * Filename:        mine.view.php
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

    <main>

        <section>
            <ul class="space-y-4">
                <div class="flex gap-4 mb-6">
                    <li>
                        <form method="GET" action="/jokes/add" class="">
                            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                <i class="fa fa-plus"></i> Add joke
                            </button>
                        </form>
                    </li>
                </div>
                <?php if (empty($jokes)): ?>
                    <li>No jokes found.</li>
                <?php else: ?>
                    <?php foreach ($jokes as $joke): ?>
                        <li class="border p-3">
                            <a href="content/<?= $joke->jokes_id ?>" class="font-semibold"><?= $joke->jokes_title ?></a>
                            <a href="categories"><strong><br>Category:</strong> <?= $joke->categories_title ?></a>
                            <p><strong>Author:</strong> <?= $joke->users_nickname ?></p>

                            <div class="flex gap-4 mt-2">
                                <form method="GET" action="/edit/<?= $joke->jokes_id ?>" class="">
                                    <input type="hidden" name="id" value="<?= $joke->jokes_id ?>">
                                    <button class="group relative inline-block overflow-hidden border bg-white border-neutral-500 transition-all duration-500 hover:border-blue-500 px-8 py-2 focus:ring-2 focus:outline-hidden">
                                        <span class="absolute inset-y-0 left-0 w-[2px] bg-blue-500 transition-all duration-500 ease-in-out group-hover:w-full group-hover:bg-blue-500 "></span>
                                        <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                        <i class="fa fa-edit"></i> Edit Joke
                                    </button>
                                </form>

                                <form method="POST" action="/delete/<?= $joke->jokes_id ?>" class="">
                                    <input type="hidden" name="id" value="<?= $joke->jokes_id ?>">
                                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-blue-700 transition">
                                        <i class="fa fa-trash"></i> Delete Joke
                                    </button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </section>

    </main>

<?php
loadPartial('footer');
?>