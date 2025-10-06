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
            Login
        </h2>

        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>

        <form method="POST" action="/profile/update">

            <section>
                <label for="given_name" class="block font-medium">Given Name</label>
                <input type="text" id="given_name" name="given_name"
                       value="<?= htmlspecialchars($profile->given_name ?? '') ?>"
                       class="border rounded w-full p-2">
            </section>

            <div>
                <label for="family_name" class="block font-medium">Family Name</label>
                <input type="text" id="family_name" name="family_name"
                       value="<?= htmlspecialchars($profile->family_name ?? '') ?>"
                       class="border rounded w-full p-2">
            </div>

            <div>
                <label for="nickname" class="block font-medium">Nickname</label>
                <input type="text" id="nickname" name="nickname"
                       value="<?= htmlspecialchars($profile->nickname ?? '') ?>"
                       class="border rounded w-full p-2">
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email"
                       value="<?= htmlspecialchars($profile->email ?? '') ?>"
                       class="border rounded w-full p-2">
            </div>

            <div>
                <label for="city" class="block font-medium">City</label>
                <input type="text" id="city" name="city"
                       value="<?= htmlspecialchars($profile->city ?? '') ?>"
                       class="border rounded w-full p-2">
            </div>

            <div>
                <label for="state" class="block font-medium">State</label>
                <input type="text" id="state" name="state"
                       value="<?= htmlspecialchars($profile->state ?? '') ?>"
                       class="border rounded w-full p-2">
            </div>

            <div class="mt-6 flex space-x-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Save Changes
                </button>
                <a href="/profile" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                </a>
            </div>

        </form>

    </section>
</main>

<?php
loadPartial('footer');
?>
