<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="flex justify-between items-center mb-3">
    <div>
        <button id="openModal" class="flex items-center justify-center px-4 py-3 bg-indigo-400 hover:bg-indigo-500 text-white rounded-lg shadow-lg text-sm">
            <div>
                <img class="h-5" src="<?= base_url('assets/img/add.svg'); ?>" alt="Search">
            </div>
            <span class="ml-2 text-sm">
                Tambah Data
            </span>
        </button>
    </div>
    <div class="flex">
        <input class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-l-lg" type="text" name="" id="">
        <button class="flex items-center justify-center px-3 py-1 bg-indigo-400 hover:bg-indigo-500 text-white rounded-r-lg rounded-l-none">
            <div>
                <img class="h-5" src="<?= base_url('assets/img/search.svg'); ?>" alt="Search">
            </div>
            <span class="ml-2 text-xs">
                Search
            </span>
        </button>
    </div>
</div>

<?php if ($datas != null) : ?>
    <div class="w-full overflow-x-auto grid grid-cols-2 md:grid-cols-3 gap-4">
        <?php foreach ($datas as $data) : ?>
            <div class="bg-indigo-100 p-5 rounded-md">
                <div class="mb-3">
                    <p class="text-xl"><?= $data['nama'] ?></p>
                </div>
                <div class="flex justify-start items-center gap-3 text-white">
                    <button type="button" class="openEditDataModal bg-yellow-300 hover:bg-yellow-400 flex justify-center items-center px-3 py-2 rounded-lg">
                        <img class="h-6" src="<?= base_url(); ?>/assets/img/edit.svg" alt="">
                    </button>
                    <a href="<?= base_url('statistika/deleteData'); ?>?id=<?= $data['id']; ?>" class="bg-red-500 hover:bg-red-600 flex justify-center items-center py-2 px-3 rounded-lg">
                        <img class="h-6" src="<?= base_url(); ?>/assets/img/delete.svg" alt="">
                    </a>
                </div>
                <div class="mt-3">
                    <a class="bg-indigo-500 px-4 py-2 text-white rounded-lg" href="<?= base_url('statistika/detailData'); ?>/<?= $data['id']; ?>">Lihat Detail</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <div>
        <p class="text-xl font-light text-center bg-indigo-100 py-3">No Data Founded</p>
    </div>
<?php endif ?>


<!-- Modals -->
<div id="modal" class="hidden fixed z-10  top-0 bottom-0 right-0 left-0 justify-center items-center bg-white bg-opacity-60">
    <form method="POST" action="/statistika/tambahData" class="bg-indigo-100 bg-opacity-90 -mt-48 p-8 rounded-md relative w-96">
        <button type="button" id="closeModal" class="absolute top-2 right-2 px-2 py-1 bg-red-500 hover:bg-red-400 text-white font-black text-sm">X</button>
        <label class="text-sm font-semibold font-quicksand" for="namaData">Nama Data</label>
        <div class="mb-3">
            <input class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg w-full" type="text" name="namaData" id="namaData">
        </div>
        <label class="text-sm font-semibold font-quicksand" for="nilai">Input Skor</label>
        <div class="mb-3">
            <input class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg w-full" type="text" name="nilai" id="nilai">
            <div class="text-gray-700 ml-3 mt-2">
                <div class="text-xs">Jika lebih dari 1 data tambahkan koma</div>
                <div class="text-xs">Contoh: 1, 2, 3</div>
            </div>
        </div>
        <button class="w-24 flex items-center justify-center py-2 bg-indigo-400 hover:bg-indigo-500 text-white rounded-lg" name="submit" type="submit">
            <div>
                <img class="h-5" src="<?= base_url(); ?>/assets/img/add.svg" alt="Tambah Data">
            </div>
            <span class="ml-2 text-xs">
                Tambah
            </span>
        </button>
    </form>
</div>
<!-- End Modals -->

<!-- Modals Edit -->
<div id="editDataModal" class="hidden fixed z-10  top-0 bottom-0 right-0 left-0 justify-center items-center bg-white bg-opacity-60">
    <form method="POST" action="<?= base_url('statistika/editData'); ?>" class="bg-indigo-100 bg-opacity-90 -mt-48 p-8 rounded-md relative w-96">
        <button type="button" id="closeEditDataModal" class="absolute top-2 right-2 px-2 py-1 bg-red-500 hover:bg-red-400 text-white font-black text-sm">X</button>
        <label class="text-sm font-semibold font-quicksand" for="nilai">Edit Nama Data</label>
        <div class="mb-3">
            <input type="hidden" id="oldNama" name="oldNama">
            <input id="editDataInput" class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg w-full" type="text" name="newNama">
        </div>
        <button class="w-24 flex items-center justify-center py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg" name="submit" type="submit">
            <div>
                <img class="h-5" src="<?= base_url('assets/img/edit.svg'); ?>" alt="Edit Data">
            </div>
            <span class="ml-2 text-xs">
                Edit
            </span>
        </button>
    </form>
</div>
<!-- End Modals Edit-->

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url('assets/js/script.js'); ?>"></script>
<?= $this->endSection(); ?>