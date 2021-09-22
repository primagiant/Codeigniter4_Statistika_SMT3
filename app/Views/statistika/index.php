<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="mb-5">
    <h1 class="text-2xl md:text-3xl">Statistika App</h1>
</div>

<div class="flex justify-between items-center mb-3">
    <div>
        <a href="#" class="flex items-center justify-center px-4 py-3 bg-indigo-400 hover:bg-indigo-500 text-white rounded-lg shadow-lg text-sm">
            <div>
                <img class="h-5" src="/assets/img/add.svg" alt="Search">
            </div>
            <span class="ml-2 text-sm">
                Tambah Data
            </span>
        </a>
    </div>
    <div class="flex">
        <input class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-l-lg" type="text" name="" id="">
        <button class="flex items-center justify-center px-3 py-1 bg-indigo-400 hover:bg-indigo-500 text-white rounded-r-lg rounded-l-none">
            <div>
                <img class="h-5" src="/assets/img/search.svg" alt="Search">
            </div>
            <span class="ml-2 text-xs">
                Search
            </span>
        </button>
    </div>
</div>

<div class="w-full overflow-x-auto">
    <table class="table-auto shadow-lg bg-white w-full">
        <thead>
            <tr>
                <th class="bg-blue-100 border text-center px-6 py-2">No</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border text-center px-6 py-2"></td>
            </tr>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>