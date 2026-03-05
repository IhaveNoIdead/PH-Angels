<article class="rounded-xl overflow-hidden transition-all hover:scale-105 hover:shadow-2xl hover:shadow-[0_0_15px_#C9A24D] hover:ring-2 hover:ring-[#C9A24D] duration-300 cursor-default flex flex-col h-full min-h-[420px]">
    <?php if(!empty($image)) : ?>
        <img src="<?= esc($image) ?>" alt="<?= esc($title ?? '') ?>" class="w-full  h-48 object-contain">
    <?php endif; ?>
    <div class="p-5 flex flex-col justify-between flex-1">
        <div>
            <?php if(!empty($title)) : ?>
                <h3 class="text-xl font-bold text-center text-color-soft-white"><?= esc($title) ?></h3>
            <?php endif; ?>

            <?php if(!empty($description)) : ?>
                <p class="text-color-soft-white text-center mt-3"><?= esc($description) ?></p>
            <?php endif; ?>

            <?php if(!empty($link)) : ?>
                <a class="mt-2 underline text-color-weathered-blue"><?= esc($link) ?></a>
            <?php endif; ?>

            <?php if (!empty($secondary_button)): ?>
                <div class="mt-8">
                    <?= view('components/buttons/secondary_button', [
                        'btnName' => $secondary_button['btnName'],
                        'link' => $secondary_button['link'],
                        'version' => $secondary_button['version']
                    ])?>
                </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($price)) : ?>
                <p class="mt-3 font-bold text-color-soft-white"><?= esc($price) ?></p>
            <?php endif; ?>
        <?php if(!empty($status)) : ?>
            <div class="mt-4 px-4 py-1 rounded-full <?= esc($color) ?>">
                <p class="text-base text-gray-100 text-center font-bold"><?= esc($status) ?></p>
            </div>
        <?php endif; ?>
    </div>
</article>