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

/* Load HTML header and navigation areas */
loadPartial("header");
loadPartial('navigation');

?>

    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex text-md ">
                <h2 class="grow text-2xl font-bold ">Categories</h2>



            </header>

            <section class="text-xl text-zinc-500 my-8">

                <?= loadPartial('message') ?>
            </section>

            <body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">
            <div class="w-full max-w-xl p-8 bg-white rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">📥 Import CSV File</h2>

                <?php if (!empty($success)): ?>
                    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                        ✅ CSV imported successfully.
                    </div>
                <?php elseif (!empty($error)): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                        ⚠️ <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload CSV</label>
                        <input type="file" name="csv_file" accept=".csv"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                        Upload & Import
                    </button>
                </form>
            </div>


        </article>
    </main>


<?php
loadPartial("footer");

