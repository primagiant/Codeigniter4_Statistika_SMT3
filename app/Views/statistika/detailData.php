<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <button id="openModal" class="flex items-center justify-center px-4 py-3 bg-indigo-400 hover:bg-indigo-500 text-white rounded-lg shadow-lg text-sm">
        <div>
            <img class="h-5" src="<?= base_url('assets/img/add.svg'); ?>" alt="Add">
        </div>
        <span class="ml-2 text-sm">
            Tambah Data <?= $heading; ?>
        </span>
    </button>
</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
    <div class="w-full overflow-x-auto shadow-lg md:col-span-2">
        <table class="table-auto bg-white w-full">
            <thead>
                <tr>
                    <th class="bg-blue-100 border text-center px-6 py-2">Nilai</th>
                    <th class="bg-blue-100 border text-center px-6 py-2">Frekuensi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frekuensiTable as $item) : ?>
                    <tr>
                        <td class="border text-center px-6 py-2"><?= $item['key']; ?></td>
                        <td class="border text-center px-6 py-2"><?= $item['value']; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div>
        <div class=" w-full overflow-x-auto shadow-lg">
            <table class="table-auto bg-white w-full">

                <tr>
                    <th class="bg-blue-100 border text-center px-6 py-2 w-7/12">Rata Rata</th>
                    <td class="bg-blue-100 border text-center px-6 py-2"><?= $rataRata; ?></td>
                </tr>
                <tr>
                    <th class="bg-blue-50 border text-center px-6 py-2 w-7/12">Maksimun</th>
                    <td class="bg-blue-50 border text-center px-6 py-2"><?= $max ?></td>
                </tr>
                <tr>
                    <th class="bg-blue-100 border text-center px-6 py-2 w-7/12">Minimum</th>
                    <td class="bg-blue-100 border text-center px-6 py-2"><?= $min; ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>

<!-- Detail Data -->
<div class="w-full md:w-8/12 overflow-x-auto">
    <h3 class="text-xl font-quicksand font-semibold mb-2 p-2">Detail Nilai Dalam Tabel</h3>
    <table class="table-auto bg-white w-full">
        <thead>
            <tr>
                <th class="bg-blue-100 border text-center px-6 py-2">Nilai</th>
                <th class="bg-blue-100 border text-center px-6 py-2 w-12">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($skor as $s) : ?>
                <tr>
                    <td class="hidden"><?= $s['id']; ?></td>
                    <td class="border text-center px-6 py-2"><?= $s['nilai']; ?></td>
                    <td class="border text-center px-6 py-2">
                        <div class="flex justify-start items-center gap-3 text-white">
                            <button type="button" class="openEditModal bg-yellow-300 hover:bg-yellow-400 flex justify-center items-center px-3 py-2 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <a href="<?= base_url('statistika/deleteNilai'); ?>?id=<?= $s['id']; ?>&datas_id=<?= $s['datas_id']; ?>" class="bg-red-500 hover:bg-red-600 flex justify-center items-center py-2 px-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- End Detail Data -->


<!-- Modals Tambah -->
<div id="modal" class="hidden fixed z-10  top-0 bottom-0 right-0 left-0 justify-center items-center bg-white bg-opacity-60">
    <form method="POST" action="<?= base_url('statistika/tambahNilai'); ?>?id=<?= $skor[0]['datas_id']; ?>" class="bg-indigo-100 bg-opacity-90 -mt-48 p-8 rounded-md relative w-96">
        <button type="button" id="closeModal" class="absolute top-2 right-2 px-2 py-1 bg-red-500 hover:bg-red-400 text-white font-black text-sm">X</button>
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
                <img class="h-5" src="<?= base_url('assets/img/add.svg'); ?>" alt="Tambah Data">
            </div>
            <span class="ml-2 text-xs">
                Tambah
            </span>
        </button>
    </form>
</div>
<!-- End Modals Tambah-->

<!-- Modals Edit -->
<div id="editModal" class="hidden fixed z-10  top-0 bottom-0 right-0 left-0 justify-center items-center bg-white bg-opacity-60">
    <form method="POST" action="<?= base_url('statistika/editNilai'); ?>" class="bg-indigo-100 bg-opacity-90 -mt-48 p-8 rounded-md relative w-96">
        <button type="button" id="closeEditModal" class="absolute top-2 right-2 px-2 py-1 bg-red-500 hover:bg-red-400 text-white font-black text-sm">X</button>
        <label class="text-sm font-semibold font-quicksand" for="nilai">Edit Skor</label>
        <div class="mb-3">
            <input type="hidden" name="datas_id" value="<?= $skor[0]['datas_id']; ?>">
            <input type="hidden" name="skor_id" id="skor_id">
            <input id="editInput" class="border border-indigo-400 outline-none focus:border-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg w-full" type="text" name="newNilai">
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