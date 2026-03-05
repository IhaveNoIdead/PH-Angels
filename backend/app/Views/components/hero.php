<section class="mx-24 my-24 rounded-xl shadow">
    <div class="py-10 text-center">
        <?php if (!empty($heading)): ?>
            <h1 class="text-6xl font-bold text-color-soft-white text-center mb-8"> <?= esc($heading) ?></h1>
        <?php endif; ?>

         <?php if (!empty($subHeading)): ?>
            <h2 class="text-4xl mt-3 mb-3 text-color-soft-white text-center"> <?= esc($subHeading) ?></h2>
        <?php endif; ?>
    </div>
</section>