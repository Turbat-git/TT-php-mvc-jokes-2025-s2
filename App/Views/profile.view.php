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

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 title">
    <article class="grid grid-cols-1">
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 mb-4 p-8 text-2xl font-bold ">
            <h1>Profile</h1>
        </header>
    </article>

    <article class="grid grid-cols-2 ">
        <section class="m-4 bg-zinc-200 text-zinc-700 p-8 title shadow">
            <dl class="flex flex-col">
                <dt class="text-lg font-semibold ">Tutorial:</dt>
                <dd class="ml-4">
                    <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07"
                       class="hover:text-black">
                        <i class="fa fa-list inline-block mr-2 text-sm"></i>
                        Parts 00 - 04: https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
                    </a>
                </dd>
                <dd class="ml-4">
                    <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-08"
                       class="hover:text-black">
                        <i class="fa fa-list inline-block mr-2 text-sm"></i>
                        Parts 05 - 10: https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
                    </a>
                </dd>
            </dl>
        </section>
        <section class="m-4 bg-zinc-200 text-zinc-700 p-8 title shadow">
            <dl class="flex flex-col">
                <dt class="text-lg font-semibold">Source Code:</dt>
                <dd class="ml-4">
                    <a href="https://github.com/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN"
                       class="hover:text-black">
                        <i class="fa fa-code inline-block mr-2 text-sm"></i>
                        https://github.com/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN
                    </a>
                    <span class="pl-6.5 flex flex-row flex-wrap">
                    <img class="p-1"
                         src="https://img.shields.io/github/stars/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN?style=for-the-badge"
                         alt="GitHub Repo stars">
                    <img class="p-1"
                         src="https://img.shields.io/github/last-commit/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN?style=for-the-badge"
                         alt="GitHub Last Commit">
                    <img class="p-1"
                         src="https://img.shields.io/github/downloads/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN/total?style=for-the-badge"
                         alt="GitHub Downloads">
                    <img class="p-1"
                         src="https://img.shields.io/github/v/release/AdyGCode/XXX-SaaS-Vanilla-MVC-YYYY-SN?style=for-the-badge"
                         alt="GitHub Downloads">
                        </span>
                </dd>
            </dl>
        </section>
        <section class="m-4 bg-zinc-200 text-zinc-700 p-8 title shadow">
            <dl class="flex flex-col">

                <dt class="text-lg font-semibold">HelpDesk</dt>
                <dd class="ml-4">
                    <a href="https://help.screencraft.net.au"
                       class="hover:text-black">
                        <i class="fa fa-home inline-block mr-2 text-sm"></i>
                        Home Page
                    </a>
                </dd>
                <dd class="ml-4">
                    <a href="https://help.screencraft.net.au/hc/2680392001"
                       class="hover:text-black">
                        <i class="fa fa-info-circle inline-block mr-2 text-sm"></i>
                        FAQs
                    </a>
                </dd>
                <dd class="ml-4"><a href="https://help.screencraft.net.au/help/2680392001"
                                    class="hover:text-black">
                        <i class="fa fa-question-circle inline-block mr-2 text-sm"></i>
                        Make a HelpDesk Request (TAFE Students only)
                    </a>
                </dd>
            </dl>

        </section>

        <section class="m-4 bg-zinc-200 text-zinc-700 p-8 title shadow">
            <dl class="flex flex-col">

                <dt class="text-lg font-semibold">Featured Category</dt>
                <dd class="ml-4">
                    <a href="https://help.screencraft.net.au"
                       class="hover:text-black">
                        <i class="fa fa-home inline-block mr-2 text-sm"></i>
                        <i class="fa fa-tag inline-block mr-2"></i>
                        <?= $profile['given_name']->title ?? "" ?>
                    </a>
                </dd>

            </dl>

        </section>

    </article>
</main>


<?php
loadPartial('footer');
?>
