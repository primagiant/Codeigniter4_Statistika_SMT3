<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div>

</div>
<div class="flex justify-between items-center mb-3">
    <div>
        <button id="openModal" class="flex items-center justify-center px-4 py-3 bg-indigo-400 hover:bg-indigo-500 text-white rounded-lg shadow-lg text-sm">
            <div>
                <img class="h-5" src="/assets/img/add.svg" alt="Search">
            </div>
            <span class="ml-2 text-sm">
                Tambah Skor
            </span>
        </button>
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
                <th class="bg-blue-100 border text-center px-6 py-2 w-10">No</th>
                <th class="bg-blue-100 border text-center px-6 py-2">Nilai</th>
                <th class="bg-blue-100 border text-center px-6 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($skor as $s) : ?>
                <tr>
                    <td class="border text-center px-6 py-2"><?= $no++; ?></td>
                    <td class="border text-center px-6 py-2"><?= $s['nilai']; ?></td>
                    <td class="border text-center px-6 py-2">test</td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modals -->
<div id="modal" class="hidden fixed z-10  top-0 bottom-0 right-0 left-0 justify-center items-center bg-white bg-opacity-60">
    <form method="POST" action="/statistika/tambahNilai/?id=<?= $skor[0]['datas_id']; ?>" class="bg-indigo-100 bg-opacity-90 -mt-48 p-8 rounded-md relative w-96">
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
                <img class="h-5" src="/assets/img/add.svg" alt="Tambah Data">
            </div>
            <span class="ml-2 text-xs">
                Tambah
            </span>
        </button>
    </form>
</div>
<!-- End Modals -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    const modal = document.getElementById("modal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");

    openModal.addEventListener("click", function() {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    })

    closeModal.addEventListener("click", function() {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    })
</script>
<?= $this->endSection(); ?>