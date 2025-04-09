<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        index.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial("header");
loadPartial('navigation');

?>
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
    <script src="/assets/js/editor.js"></script>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold ">Colours - Add</h1>

            </header>

            <section>
                <?= loadPartial('message') ?>

                <?= loadPartial('errors', [
                    'errors' => $errors ?? []
                ]) ?>

                <form id="ColourForm" method="POST" action="/colours">

                    <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                        Colour Information
                    </h2>

                    <div class="mb-4">
                        <label for="Name">Name:</label>
                        <input id="Name" type="text" name="name" placeholder="Colour Name"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="<?= $colour['name'] ?? '' ?>"/>
                    </div>

                    <div class="mb-4">
                        <label for="Rgb">RGB (Hex):</label>
                        <input id="Rgb" name="hex_code" placeholder="HEX RGB"
                               class="w-full px-4 py-2 border rounded focus:outline-none"
                               value="<?= $colour['hex_code'] ?? '' ?>"/>
                    </div>

                    <div class="mb-4">
                        <label for="Classification" class="flex-0 mr-2">Filter:</label>
                        <select name="classification" id="Classification"
                                class="border border-gray-300 rounded bg-white px-2 mr-2 flex-0">
                            <?php
                            foreach ($colourSelect ?? [] as $colour):
                                ?>
                                <option value="<?= $colour->classification ?>"
                                ><?= $colour->classification ?? "Unknown" ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>


                    <div class="grid grid-cols-4 gap-8">
                        <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2
                               rounded focus:outline-none flex justify-center">
                            <i class="fa fa-check inline-block mr-4"></i>
                            <span>Save</span>
                        </button>

                        <a href="/colours"
                           class="text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2
                   rounded focus:outline-none flex justify-center">
                            <i class="fa fa-cancel inline-block mr-4"></i>
                            <span>Cancel</span>
                        </a>
                    </div>

                </form>

            </section>

        </article>
    </main>

<?php
loadPartial("footer");

