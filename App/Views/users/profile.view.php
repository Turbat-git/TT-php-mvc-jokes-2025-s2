<?php
/**
 *  A ONE LINE ABOUT THIS FILE
 *
 * MULTI-LINE DESCRIPTION (OPTIONAL)
 * To tell the reader what this does in detail
 *
 * Project:         TT-php-mvc-jokes-2025-s2
 * Filename:        profile.view.php
 *Author:           Turbat Turkhuu <https://github.com/Turbat-012>
 *Date created:     2025-09-24
 *Version:          0.0
 */

loadPartial('header');
loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25
                 flex justify-center items-center mt-8 w-1/2 ">

    <section class="bg-white p-8 title shadow-md md:w-500 mx-6 w-full">

        <h2 class="text-4xl text-left font-bold mb-4">
            Profile
        </h2>

        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>

            <div class="bg-white shadow rounded-lg p-6 space-y-4">
                <p><strong>Given Name:</strong> <?= htmlspecialchars($profile->given_name ?? "") ?></p>
                <p><strong>Family Name:</strong> <?= htmlspecialchars($profile->family_name ?? "") ?></p>
                <p><strong>Nickname:</strong> <?= htmlspecialchars($profile->nickname ?? '') ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($profile->email ?? '') ?></p>
                <p><strong>City:</strong> <?= htmlspecialchars($profile->city ?? '') ?></p>
                <p><strong>State:</strong> <?= htmlspecialchars($profile->state ?? '') ?></p>

                <div class="mt-6">
                    <a href="/profile/edit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Edit Profile
                    </a>
                </div>
            </div>

    </section>
</main>

<?php
loadPartial('footer');
?>
