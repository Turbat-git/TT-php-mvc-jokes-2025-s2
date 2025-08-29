<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        login.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    23/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation'); ?>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 
                 flex justify-center items-center mt-8 w-1/2 ">

        <section class="bg-white p-8 title shadow-md md:w-500 mx-6 w-full">

            <h2 class="text-4xl text-left font-bold mb-4">
                Login
            </h2>

            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <form method="POST" action="/auth/login">

                <section class="mb-4">
                    <label for="Email" class="mt-4 pb-1">Email:</label>
                    <input type="email" id="Email"
                           name="email" placeholder="Email Address"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                           value="<?= $user['email'] ?? '' ?>"/>
                </section>

                <section class="mb-4">
                    <label for="Password" class="mt-4 pb-1">Password:</label>
                    <input type="password" id="Password"
                           name="password" placeholder="Password"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"/>
                </section>


                <section class="mb-4 flex flex-row gap-4 justify-between">
                    <button type="submit"
                            class="group relative inline-block overflow-hidden border bg-white border-sky-800 px-12 py-1 focus:ring-2focus:outline-hidden">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-sky-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-arrow-right-to-bracket inline-block mr-2"></i>
                                Login
                            </span>
                    </button>

                    <div class="text-zinc-700 inline-flex justify-right">
                        <p class="mt-2 mr-2">
                            So you're not a member...                        </p>

                        <a class="group relative inline-block overflow-hidden border bg-white border-emerald-800 px-8 py-1 focus:ring-2focus:outline-hidden"
                           href="/auth/register"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-emerald-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa-solid fa-user-plus mr-4"></i>
                                Register Now
                            </span>
                        </a>
                    </div>
                </section>

            </form>

        </section>
    </main>

<?php
loadPartial('footer');

