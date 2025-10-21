<?php
/**
 * Jokes Content Page View
 *
 * Filename:        content.view.php
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
                <li class="border p-3">
                    <?php if (empty($joke)): ?>
                        <li>No jokes found.</li>
                    <?php else: ?>
                    <section><strong><br>Title: </strong><?= $joke->jokes_title ?></section>
                    <section><strong><br>Content: </strong><?= $joke->jokes_content ?></section>
                    <section><strong><br>Category: </strong> <?= $joke->categories_title ?></section>
                    <p><strong><br>Author: </strong> <?= $joke->user_fname . " " . $joke->user_lname ?></p>
                    <?php endif; ?>
                </li>
            </ul>
        </section>

    </main>

<?php
loadPartial('footer');
?>