<?php
/**
 * Jokes Page View
 *
 * Filename:        jokes.view.php
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
                <a href="/jokes/create"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    <i class="fa fa-plus"></i> Add Joke
                </a>

                <a href="/jokes/mine"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    <i class="fa fa-user"></i> My Jokes
                </a>
            </div>
            <?php if (empty($jokes)): ?>
                <li>No jokes found.</li>
            <?php else: ?>
                <?php foreach ($jokes as $joke): ?>
                    <li class="border p-3">
                        <a href="content/<?= $joke->jokes_id ?>" class="font-semibold"><?= $joke->jokes_title ?></a>
                        <a href="categories"><strong><br>Category:</strong> <?= $joke->categories_title ?></a>
                        <p><strong>Author:</strong> <?= $joke->users_nickname ?></p>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </section>
    
</main>

<?php
loadPartial('footer');
?>