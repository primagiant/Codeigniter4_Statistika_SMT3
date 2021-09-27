<?= $this->extend('layouts/base.php'); ?>

<?= $this->section('content'); ?>
<div class="grid   md:grid-cols-2 my-12">
    <div class="p-5">
        <img src="<?= base_url('assets/img/statistika.svg'); ?>" alt="gambar">
    </div>
    <div class="flex flex-col justify-center">
        <h1 class="text-4xl text-center mt-5 md:text-left">Aplikasi Statistika</h1>
        <p class="text-lg mt-4 text-center md:text-left">Statistika adalah sebuah ilmu yang mempelajari bagaimana cara merencanakan, mengumpulkan, menganalisis, lalu menginterpretasikan, dan akhirnya mempresentasikan data. Aplikasi statistika ini membantu untuk menghitung nilai maksimu, minimum, dan rata rata yang disertai dengan table frekuensi.</p>
        <div class="mt-5 text-center md:text-left">
            <a href="<?= base_url('/statistika'); ?>" class="py-2 px-5 bg-indigo-500 text-white rounded-lg">Statistika Aplication</a>
        </div>
    </div>
</div>
<?= $this->endSection("content"); ?>