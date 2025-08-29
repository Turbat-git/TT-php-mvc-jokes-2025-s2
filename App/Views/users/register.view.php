<?php
/**
 * Register User View
 *
 * Filename:        register.view.php
 * Location:        App/Views/users
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
                Register
            </h2>

            <?= loadPartial('errors', [
                    'errors' => $errors ?? []
            ]) ?>

            <form method="POST" action="/auth/register">

                <section class="mb-4">
                    <label for="Name" class="mt-4 pb-1">Name:</label>
                    <input type="text" id="Name"
                           name="name" placeholder="Full Name"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                           value="<?= $user['name'] ?? '' ?>"/>
                </section>

                <section class="mb-4">
                    <label for="Email" class="mt-4 pb-1">Email:</label>
                    <input type="email" id="Email"
                           name="email" placeholder="Email Address"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                           value="<?= $user['email'] ?? '' ?>"/>
                </section>


                <section class="mb-4">
                    <label for="State" class="mt-4 pb-1">State:</label>
                    <input type="text" id="State"
                           name="state" placeholder="State"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"
                           value="<?= $user['state'] ?? '' ?>"/>
                </section>

                <section class="mb-4">
                    <label for="City" class="mt-4 pb-1">City:</label>
                    <select name="city" id="City"
                            placeholder="City"
                            class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none">
                        <?php if (empty($user['city'])) : ?>
                            <option value="" disabled selected>Select City</option>
                        <?php endif ?>
                        <?php foreach ($cities as $key => $city): ?>
                            <option value="<?= $city->id ?>"
                                    <?php if (!empty($user['city']) && (int) $user['city'] === $city->id) :
                                        echo 'selected';
                                    endif ?>
                            ><?= $city->name ?> (<?= $city->state_code ?>)
                            </option>
                        <?php endforeach ?>?
                    </select>

                </section>

                <section class="mb-4">
                    <label for="Password" class="mt-4 pb-1">Password:</label>
                    <input type="password" id="Password"
                           name="password" placeholder="Password"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"/>
                </section>

                <section class="mb-4">
                    <label for="PasswordConfirmation" class="mt-4 pb-1">Confirm password:</label>
                    <input type="password" id="PasswordConfirmation"
                           name="password_confirmation" placeholder="Confirm Password"
                           class="w-full px-4 py-2 border border-b-zinc-300  focus:outline-none"/>
                </section>

                <section class="mb-4 flex flex-row gap-4 justify-between">
                    <button type="submit"
                            class="group relative inline-block overflow-hidden border bg-white border-sky-800 px-12 py-1 focus:ring-2focus:outline-hidden">
                        <span class="absolute inset-y-0 left-0 w-[2px] bg-sky-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                        <span class="relative text-sm font-medium  text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa fa-user-plus inline-block mr-2"></i>
                                Register
                            </span>
                    </button>

                    <div class="text-zinc-700 inline-flex justify-right">
                        <p class="mt-2 mr-2">
                            Already have an account?
                        </p>

                        <a class="group relative inline-block overflow-hidden border bg-white border-emerald-800 px-8 py-1 focus:ring-2focus:outline-hidden"
                           href="/auth/login"
                        >
                            <span class="absolute inset-y-0 left-0 w-[2px] bg-emerald-500 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                            <span class="relative text-sm font-medium   text-black transition-colors duration-500 group-hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket mr-4"></i>
                                Login
                            </span>
                        </a>
                    </div>
                </section>

            </form>
        </section>
    </main>

<?php
loadPartial('footer');
