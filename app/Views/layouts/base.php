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
    <link rel="stylesheet" href="/assets/css/tailwind.css">

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
</body>
<!-- Script -->
<?= $this->renderSection('script'); ?>

</html>