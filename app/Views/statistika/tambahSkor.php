<?= $this->extend('layouts/base'); ?>

<?= $this->section('link'); ?>
<script src="https://unpkg.com/vue@3.2.13"></script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div id="app">
    <form action="" method="POST">
        <div>
            <input type="text" name="">
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    let app = new Vue({
        el: "#app",
        data: {

        },
    });
</script>
<?= $this->endSection(); ?>