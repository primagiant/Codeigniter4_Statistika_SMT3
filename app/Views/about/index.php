<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-2 font-quicksand mt-12">

    <div>
        <div class="flex justify-center md:justify-start">
            <img class="w-40" src="<?= base_url('assets/img/avatar.svg'); ?>" alt="">
        </div>
        <p class="mt-3 lg:text-lg text-center md:text-left">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint in dolor
            exercitationem error
            optio nam ab, provident iusto vel aliquam, accusamus consequuntur tempora iste doloribus minus
            id? Cumque, expedita natus.</p>
        <div class="ml-12 mt-12">
            <p class="flex flex-row mt-3 lg:mt-6 lg:text-lg">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-2">
                    Singaraja
                </span>
            </p>
            <p class="flex flex-row mt-3 lg:mt-6 lg:text-lg">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                    </path>
                </svg>
                <span class="ml-2">
                    08xx-xxxx-xxxx
                </span>
            </p>
            <p class="flex flex-row mt-3 lg:mt-6 lg:text-lg">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                <span class="ml-2">
                    prima.giant@undiksha.ac.id
                </span>
            </p>
        </div>
    </div>


</div>
<?= $this->endSection(); ?>