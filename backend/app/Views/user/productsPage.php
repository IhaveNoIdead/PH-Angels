<!DOCTYPE html>
<html>

<?= view('components/head', ['title' => 'Products | Philippines Angels']) ?>

<body class="color-base-dark">
    
    <!-- Header -->
    <?= view('components/header') ?>

    <!-- Hero Section -->
    <?= view('components/hero', [
        'heading' => 'Products Showcase',
        'subHeading' => null,
    ]) ?>

    <main class="space-y-16 mx-auto py-16 max-w-7xl">

        <!-- Products Showcase -->
        <section class="shadow p-10 rounded-xl">
            <h2 class="mb-10 font-bold text-color-soft-white text-4xl text-center">Helicopter</h2>

            <div class="gap-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                <?php foreach ($helicoptorProducts as $helicoptor) : ?>
                    <div class="flex flex-col">
                        <?= view('components/cards/card', [
                            'title' => $helicoptor->product_name,
                            'description' =>  $helicoptor->product_description,
                            'price' =>  '₱' . number_format($helicoptor->price, 2),
                            'image' =>  $helicoptor->product_image,
                        ]) ?>
                        <form action="<?= site_url('/cart/add') ?>" method="post" class="cart-action-form mt-4 px-2">
                            <input type="hidden" name="product_id" value="<?= $helicoptor->id ?>">
                            <button type="submit" class="px-6 py-2 rounded-lg font-bold text-white color-weathered-blue hover-secondary">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Modification Menu -->
        <section class="shadow p-10 rounded-xl">
            <h2 class="mb-10 font-bold text-color-soft-white text-4xl text-center">Modification</h2>

            <div class="gap-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                <?php foreach ($modificationProducts as $modification) : ?>
                    <div class="flex flex-col">
                        <?= view('components/cards/card', [
                            'title' => $modification->product_name,
                            'description' =>  $modification->product_description,
                            'price' =>  '₱' . number_format($modification->price),
                            'image' =>  $modification->product_image,
                        ]) ?>
                        <form action="<?= site_url('/cart/add') ?>" method="post" class="cart-action-form mt-4 px-2">
                            <input type="hidden" name="product_id" value="<?= $modification->id ?>">
                            <button type="submit" class="px-6 py-2 rounded-lg font-bold text-white color-weathered-blue hover-secondary">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Repair Menu -->
        <section class="shadow p-10 rounded-xl">
            <h2 class="mb-10 font-bold text-color-soft-white text-4xl text-center">Repair</h2>

            <div class="gap-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                <?php foreach ($repairProducts as $repair) : ?>
                    <div class="flex flex-col">
                        <?= view('components/cards/card', [
                            'title' => $repair->product_name,
                            'description' =>  $repair->product_description,
                            'price' =>  '₱' . number_format($repair->price),
                            'image' =>  $repair->product_image,
                        ]) ?>
                        <form action="<?= site_url('/cart/add') ?>" method="post" class="cart-action-form mt-4 px-2">
                            <input type="hidden" name="product_id" value="<?= $repair->id ?>">
                            <button type="submit" class="px-6 py-2 rounded-lg font-bold text-white color-weathered-blue hover-secondary">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
    <script src="<?= base_url('/js/script.js') ?>"></script>
</body>

</html>