<?php
/**
 * Terms and Conditions Page View
 *
 * Filename:        terms.view.php
 * Location:        /App/Views/static
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    2025-09-03
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

<main class="container w-[96ch] mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 space-y-4">

    <h3 class="text-2xl ">TailwindCSS Colours</h3>
   <section class="grid grid-cols-12 gap-2">
       <p class="min-h-12">Black</p><p class="bg-black">&nbsp;</p><p class="bg-transparent">White</p><p class="bg-white"></p><p class="bg-transparent col-span-8">&nbsp;</p>
       <p class="min-h-4">Name</p><p class="bg-transparent text-center">-50</p><p class="bg-transparent text-center">-100</p><p class="bg-transparent text-center">-200</p><p class="bg-transparent text-center">-300</p><p class="bg-transparent text-center">-400</p><p class="bg-transparent text-center">-500</p><p class="bg-transparent text-center">-600</p><p class="bg-transparent text-center">-700</p><p class="bg-transparent text-center">-800</p><p class="bg-transparent text-center">-900</p><p class="bg-transparent text-center">-950</p>
       <p class="min-h-12">Red</p><p class="bg-red-50">&nbsp;</p><p class="bg-red-100">&nbsp;</p><p class="bg-red-200">&nbsp;</p><p class="bg-red-300">&nbsp;</p><p class="bg-red-400">&nbsp;</p><p class="bg-red-500">&nbsp;</p><p class="bg-red-600">&nbsp;</p><p class="bg-red-700">&nbsp;</p><p class="bg-red-800">&nbsp;</p><p class="bg-red-900">&nbsp;</p><p class="bg-red-950">&nbsp;</p>
       <p class="min-h-12">Orange</p><p class="bg-orange-50">&nbsp;</p><p class="bg-orange-100">&nbsp;</p><p class="bg-orange-200">&nbsp;</p><p class="bg-orange-300">&nbsp;</p><p class="bg-orange-400">&nbsp;</p><p class="bg-orange-500">&nbsp;</p><p class="bg-orange-600">&nbsp;</p><p class="bg-orange-700">&nbsp;</p><p class="bg-orange-800">&nbsp;</p><p class="bg-orange-900">&nbsp;</p><p class="bg-orange-950">&nbsp;</p>
       <p class="min-h-12">Amber</p><p class="bg-amber-50">&nbsp;</p><p class="bg-amber-100">&nbsp;</p><p class="bg-amber-200">&nbsp;</p><p class="bg-amber-300">&nbsp;</p><p class="bg-amber-400">&nbsp;</p><p class="bg-amber-500">&nbsp;</p><p class="bg-amber-600">&nbsp;</p><p class="bg-amber-700">&nbsp;</p><p class="bg-amber-800">&nbsp;</p><p class="bg-amber-900">&nbsp;</p><p class="bg-amber-950">&nbsp;</p>
       <p class="min-h-12">Yellow</p><p class="bg-yellow-50">&nbsp;</p><p class="bg-yellow-100">&nbsp;</p><p class="bg-yellow-200">&nbsp;</p><p class="bg-yellow-300">&nbsp;</p><p class="bg-yellow-400">&nbsp;</p><p class="bg-yellow-500">&nbsp;</p><p class="bg-yellow-600">&nbsp;</p><p class="bg-yellow-700">&nbsp;</p><p class="bg-yellow-800">&nbsp;</p><p class="bg-yellow-900">&nbsp;</p><p class="bg-yellow-950">&nbsp;</p>
       <p class="min-h-12">Lime</p><p class="bg-lime-50">&nbsp;</p><p class="bg-lime-100">&nbsp;</p><p class="bg-lime-200">&nbsp;</p><p class="bg-lime-300">&nbsp;</p><p class="bg-lime-400">&nbsp;</p><p class="bg-lime-500">&nbsp;</p><p class="bg-lime-600">&nbsp;</p><p class="bg-lime-700">&nbsp;</p><p class="bg-lime-800">&nbsp;</p><p class="bg-lime-900">&nbsp;</p><p class="bg-lime-950">&nbsp;</p>
       <p class="min-h-12">Green</p><p class="bg-green-50">&nbsp;</p><p class="bg-green-100">&nbsp;</p><p class="bg-green-200">&nbsp;</p><p class="bg-green-300">&nbsp;</p><p class="bg-green-400">&nbsp;</p><p class="bg-green-500">&nbsp;</p><p class="bg-green-600">&nbsp;</p><p class="bg-green-700">&nbsp;</p><p class="bg-green-800">&nbsp;</p><p class="bg-green-900">&nbsp;</p><p class="bg-green-950">&nbsp;</p>
       <p class="min-h-12">Emerald</p><p class="bg-emerald-50">&nbsp;</p><p class="bg-emerald-100">&nbsp;</p><p class="bg-emerald-200">&nbsp;</p><p class="bg-emerald-300">&nbsp;</p><p class="bg-emerald-400">&nbsp;</p><p class="bg-emerald-500">&nbsp;</p><p class="bg-emerald-600">&nbsp;</p><p class="bg-emerald-700">&nbsp;</p><p class="bg-emerald-800">&nbsp;</p><p class="bg-emerald-900">&nbsp;</p><p class="bg-emerald-950">&nbsp;</p>
       <p class="min-h-12">Teal</p><p class="bg-teal-50">&nbsp;</p><p class="bg-teal-100">&nbsp;</p><p class="bg-teal-200">&nbsp;</p><p class="bg-teal-300">&nbsp;</p><p class="bg-teal-400">&nbsp;</p><p class="bg-teal-500">&nbsp;</p><p class="bg-teal-600">&nbsp;</p><p class="bg-teal-700">&nbsp;</p><p class="bg-teal-800">&nbsp;</p><p class="bg-teal-900">&nbsp;</p><p class="bg-teal-950">&nbsp;</p>
       <p class="min-h-12">Cyan</p><p class="bg-cyan-50">&nbsp;</p><p class="bg-cyan-100">&nbsp;</p><p class="bg-cyan-200">&nbsp;</p><p class="bg-cyan-300">&nbsp;</p><p class="bg-cyan-400">&nbsp;</p><p class="bg-cyan-500">&nbsp;</p><p class="bg-cyan-600">&nbsp;</p><p class="bg-cyan-700">&nbsp;</p><p class="bg-cyan-800">&nbsp;</p><p class="bg-cyan-900">&nbsp;</p><p class="bg-cyan-950">&nbsp;</p>
       <p class="min-h-12">Sky</p><p class="bg-sky-50">&nbsp;</p><p class="bg-sky-100">&nbsp;</p><p class="bg-sky-200">&nbsp;</p><p class="bg-sky-300">&nbsp;</p><p class="bg-sky-400">&nbsp;</p><p class="bg-sky-500">&nbsp;</p><p class="bg-sky-600">&nbsp;</p><p class="bg-sky-700">&nbsp;</p><p class="bg-sky-800">&nbsp;</p><p class="bg-sky-900">&nbsp;</p><p class="bg-sky-950">&nbsp;</p>
       <p class="min-h-12">Blue</p><p class="bg-blue-50">&nbsp;</p><p class="bg-blue-100">&nbsp;</p><p class="bg-blue-200">&nbsp;</p><p class="bg-blue-300">&nbsp;</p><p class="bg-blue-400">&nbsp;</p><p class="bg-blue-500">&nbsp;</p><p class="bg-blue-600">&nbsp;</p><p class="bg-blue-700">&nbsp;</p><p class="bg-blue-800">&nbsp;</p><p class="bg-blue-900">&nbsp;</p><p class="bg-blue-950">&nbsp;</p>
       <p class="min-h-12">Indigo</p><p class="bg-indigo-50">&nbsp;</p><p class="bg-indigo-100">&nbsp;</p><p class="bg-indigo-200">&nbsp;</p><p class="bg-indigo-300">&nbsp;</p><p class="bg-indigo-400">&nbsp;</p><p class="bg-indigo-500">&nbsp;</p><p class="bg-indigo-600">&nbsp;</p><p class="bg-indigo-700">&nbsp;</p><p class="bg-indigo-800">&nbsp;</p><p class="bg-indigo-900">&nbsp;</p><p class="bg-indigo-950">&nbsp;</p>
       <p class="min-h-12">Violet</p><p class="bg-violet-50">&nbsp;</p><p class="bg-violet-100">&nbsp;</p><p class="bg-violet-200">&nbsp;</p><p class="bg-violet-300">&nbsp;</p><p class="bg-violet-400">&nbsp;</p><p class="bg-violet-500">&nbsp;</p><p class="bg-violet-600">&nbsp;</p><p class="bg-violet-700">&nbsp;</p><p class="bg-violet-800">&nbsp;</p><p class="bg-violet-900">&nbsp;</p><p class="bg-violet-950">&nbsp;</p>
       <p class="min-h-12">Purple</p><p class="bg-purple-50">&nbsp;</p><p class="bg-purple-100">&nbsp;</p><p class="bg-purple-200">&nbsp;</p><p class="bg-purple-300">&nbsp;</p><p class="bg-purple-400">&nbsp;</p><p class="bg-purple-500">&nbsp;</p><p class="bg-purple-600">&nbsp;</p><p class="bg-purple-700">&nbsp;</p><p class="bg-purple-800">&nbsp;</p><p class="bg-purple-900">&nbsp;</p><p class="bg-purple-950">&nbsp;</p>
       <p class="min-h-12">Fuchsia</p><p class="bg-fuchsia-50">&nbsp;</p><p class="bg-fuchsia-100">&nbsp;</p><p class="bg-fuchsia-200">&nbsp;</p><p class="bg-fuchsia-300">&nbsp;</p><p class="bg-fuchsia-400">&nbsp;</p><p class="bg-fuchsia-500">&nbsp;</p><p class="bg-fuchsia-600">&nbsp;</p><p class="bg-fuchsia-700">&nbsp;</p><p class="bg-fuchsia-800">&nbsp;</p><p class="bg-fuchsia-900">&nbsp;</p><p class="bg-fuchsia-950">&nbsp;</p>
       <p class="min-h-12">Pink</p><p class="bg-pink-50">&nbsp;</p><p class="bg-pink-100">&nbsp;</p><p class="bg-pink-200">&nbsp;</p><p class="bg-pink-300">&nbsp;</p><p class="bg-pink-400">&nbsp;</p><p class="bg-pink-500">&nbsp;</p><p class="bg-pink-600">&nbsp;</p><p class="bg-pink-700">&nbsp;</p><p class="bg-pink-800">&nbsp;</p><p class="bg-pink-900">&nbsp;</p><p class="bg-pink-950">&nbsp;</p>
       <p class="min-h-12">Rose</p><p class="bg-rose-50">&nbsp;</p><p class="bg-rose-100">&nbsp;</p><p class="bg-rose-200">&nbsp;</p><p class="bg-rose-300">&nbsp;</p><p class="bg-rose-400">&nbsp;</p><p class="bg-rose-500">&nbsp;</p><p class="bg-rose-600">&nbsp;</p><p class="bg-rose-700">&nbsp;</p><p class="bg-rose-800">&nbsp;</p><p class="bg-rose-900">&nbsp;</p><p class="bg-rose-950">&nbsp;</p>
       <p class="min-h-12">Slate</p><p class="bg-slate-50">&nbsp;</p><p class="bg-slate-100">&nbsp;</p><p class="bg-slate-200">&nbsp;</p><p class="bg-slate-300">&nbsp;</p><p class="bg-slate-400">&nbsp;</p><p class="bg-slate-500">&nbsp;</p><p class="bg-slate-600">&nbsp;</p><p class="bg-slate-700">&nbsp;</p><p class="bg-slate-800">&nbsp;</p><p class="bg-slate-900">&nbsp;</p><p class="bg-slate-950">&nbsp;</p>
       <p class="min-h-12">neutral</p><p class="bg-neutral-50">&nbsp;</p><p class="bg-neutral-100">&nbsp;</p><p class="bg-neutral-200">&nbsp;</p><p class="bg-neutral-300">&nbsp;</p><p class="bg-neutral-400">&nbsp;</p><p class="bg-neutral-500">&nbsp;</p><p class="bg-neutral-600">&nbsp;</p><p class="bg-neutral-700">&nbsp;</p><p class="bg-neutral-800">&nbsp;</p><p class="bg-neutral-900">&nbsp;</p><p class="bg-neutral-950">&nbsp;</p>
       <p class="min-h-12">Zinc</p><p class="bg-zinc-50">&nbsp;</p><p class="bg-zinc-100">&nbsp;</p><p class="bg-zinc-200">&nbsp;</p><p class="bg-zinc-300">&nbsp;</p><p class="bg-zinc-400">&nbsp;</p><p class="bg-zinc-500">&nbsp;</p><p class="bg-zinc-600">&nbsp;</p><p class="bg-zinc-700">&nbsp;</p><p class="bg-zinc-800">&nbsp;</p><p class="bg-zinc-900">&nbsp;</p><p class="bg-zinc-950">&nbsp;</p>
       <p class="min-h-12">Neutral</p><p class="bg-neutral-50">&nbsp;</p><p class="bg-neutral-100">&nbsp;</p><p class="bg-neutral-200">&nbsp;</p><p class="bg-neutral-300">&nbsp;</p><p class="bg-neutral-400">&nbsp;</p><p class="bg-neutral-500">&nbsp;</p><p class="bg-neutral-600">&nbsp;</p><p class="bg-neutral-700">&nbsp;</p><p class="bg-neutral-800">&nbsp;</p><p class="bg-neutral-900">&nbsp;</p><p class="bg-neutral-950">&nbsp;</p>
   </section>

    <h3 class="text-xl">Custom Colours</h3>
    <section class="grid grid-cols-12 gap-2">
        <p class="min-h-4">Name</p><p class="bg-transparent text-center">-50</p><p class="bg-transparent text-center">-100</p><p class="bg-transparent text-center">-200</p><p class="bg-transparent text-center">-300</p><p class="bg-transparent text-center">-400</p><p class="bg-transparent text-center">-500</p><p class="bg-transparent text-center">-600</p><p class="bg-transparent text-center">-700</p><p class="bg-transparent text-center">-800</p><p class="bg-transparent text-center">-900</p><p class="bg-transparent text-center">-950</p>
        <p class="min-h-12">Prussian Blue</p><p class="bg-prussianblue-50">&nbsp;</p><p class="bg-prussianblue-100">&nbsp;</p><p class="bg-prussianblue-200">&nbsp;</p><p class="bg-prussianblue-300">&nbsp;</p><p class="bg-prussianblue-400">&nbsp;</p><p class="bg-prussianblue-500">&nbsp;</p><p class="bg-prussianblue-600">&nbsp;</p><p class="bg-prussianblue-700">&nbsp;</p><p class="bg-prussianblue-800">&nbsp;</p><p class="bg-prussianblue-900">&nbsp;</p><p class="bg-prussianblue-950">&nbsp;</p>
    </section>

</main>
<?php
loadPartial('footer');
?>
