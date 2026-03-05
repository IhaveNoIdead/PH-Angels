<!DOCTYPE html>
<html>

<?= view('components/head', ['title' => 'Plans | Philippines Angels']) ?>

<body class="color-base-dark">
    
    <!-- Header -->
    <?= view('components/header') ?>

    <!-- Hero Section -->
    <?= view('components/hero', [
        'heading' => 'Plans',
        'subHeading' => "Choose A Plan",
    ]) ?>

    <main class="space-y-12">

        <div class="gap-20 py-20 grid grid-cols-1 color-base-dark shadow">
            <?php foreach ($plans as $plan) : ?>
                <div class="flex flex-col gap-5 items-center justify-center">
                    <?= view('components/cards/card_v3', [
                        'title' => $plan->product_name,
                        'description' =>  $plan->product_description,
                        'price' =>  '₱' . number_format($plan->price, 2),
                        'image' =>  $plan->product_image,
                    ]) ?>
                    <form action="<?= site_url('/cart/add') ?>" method="post" class="cart-action-form mt-4 px-2 py-4">
                        <input type="hidden" name="product_id" value="<?= $plan->id ?>">
                        <button type="submit" class="px-6 py-2 text-2xl rounded-lg font-bold text-white color-weathered-blue hover-secondary">
                            Add to Cart
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
    <script src="<?= base_url('/js/script.js') ?>"></script>
</body>

</html>