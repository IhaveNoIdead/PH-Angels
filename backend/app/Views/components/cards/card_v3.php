<section class="w-full max-w-full overflow-hidden">
    <div class="relative">
        <?php if(!empty($image)) : ?>
            <img src="<?= esc($image) ?>" alt="<?= esc($title ?? '') ?>" class="w-full h-80 object-cover">
        <?php endif; ?>
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

        <?php if(!empty($title)) : ?>
            <h3 class="absolute inset-0 flex items-center justify-center text-center text-5xl font-bold text-color-soft-white">
                <?= esc($title) ?>
            </h3>
        <?php endif; ?>
    </div>
    
    <div class="p-10 flex flex-col justify-between text-2xl color-base-dark flex-1">
        <div>
            <?php if(!empty($description)) : ?>
                <div class="text-color-soft-white mt-3 [&_ul]:list-disc [&_ul]:ml-6 [&_li]:mb-1"><?= ($description) ?></div>
            <?php endif; ?>
        </div>
        <?php if(!empty($price)) : ?>
                <p class="mt-3 font-bold text-color-soft-white"><?= esc($price) ?></p>
            <?php endif; ?>
    </div>
</section>