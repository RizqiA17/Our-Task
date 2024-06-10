<div class="dark:bg-bg-dark flex-grow">
    <div class="px-9 py-4 box-border">
        <div class="sort-by top">Mapel</div>
        <div class="grid grid grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] relative gap-6">
            <?php foreach ($data['mapel'] as $mapel) { ?>
                <a href="<?= BASEURL . 'mapel/task/' . $mapel['id_profile'] ?>" class=" relative rounded-xl w-full h-28 shadow-md dark:bg-700">
                    <div class="mapel-top h-16 rounded-t-xl font-medium text-2xl text-white content-center grid p-5 gradient-2"><?= $mapel['mapel'] ?></div>
                    <div class=" px-4 flex items-center justify-between h-10">12 Tugas Belum Selesai</div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
</div>