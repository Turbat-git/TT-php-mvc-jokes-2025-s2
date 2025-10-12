<?php
/**
 * About us page
 *
 * Filename:        about.view.php
 * Location:        /App/Views/static
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    2025-09-03
 *
 * Author:          Turbat Turkhuu
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

    <main class="container mx-auto p-8 bg-white shadow-md rounded-md mt-6">

        <h1 class="text-4xl font-bold mb-4">About This Application</h1>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Overview</h2>
            <p><?= htmlspecialchars($appOverview) ?></p>
        </section>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Developer</h2>
            <p><?= htmlspecialchars($developer) ?></p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold mb-2">Technologies & Supporting Systems</h2>
            <ul class="list-disc list-inside">
                <?php foreach ($technologies as $tech): ?>
                    <li><?= htmlspecialchars($tech) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

    </main>

<?php
loadPartial('footer');
?>