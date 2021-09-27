<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css'); ?>">

    <!-- Style External -->
    <?= $this->renderSection('link'); ?>
</head>

<body class=" bg-gray-100">

    <?= $this->include('layouts/navbar'); ?>

    <div class="container mx-auto min-h-screen pt-32 px-5 font-quicksand">
        <div class="mb-5">
            <h1 class="text-2xl md:text-3xl mb-3"><?= $heading; ?></h1>
            <?php foreach ($breadcumb as $item) : ?>
                /<span class="text-sm bg-gray-300 py-1 px-3 rounded-r-full"><?= $item; ?></span>
            <?php endforeach ?>
        </div>
        <?= $this->renderSection("content"); ?>
    </div>

    <!-- Footer -->
    <section class="bg-indigo-400 w-full h-16 md:pl-44 text-white font-semibold flex items-center justify-between px-12 font-quicksand">
        <p class="text-xs md:text-sm">Copyright 2021</p>
        <a class="text-xs md:text-sm" href="https://www.instagram.com/p_martad/?hl=en" target="_blank">Created by PrimaGiant</a>
    </section>
    <!-- End Footer -->
</body>
<!-- Script -->
<?= $this->renderSection('script'); ?>

</html>