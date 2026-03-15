<!DOCTYPE html>
<html>

    <?= view('components/head', ['title' => $product->product_name]) ?>

    <body class="color-base-dark">

    <?= view('components/header') ?>

    <div class="max-w-6xl mx-auto py-20">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <img src="<?= $product->product_image ?>" 
                class="rounded-lg shadow-lg">

            <div class="space-y-6 text-color-soft-white">

                <h1 class="text-4xl font-bold">
                    <?= $product->product_name ?>
                </h1>

                <p class="text-lg">
                    <?= $product->product_description ?>
                </p>

                <p class="text-lg text-white">
                    <?= $product->product_specs ?>
                </p>

                <h2 class="text-2xl font-bold text-color-gold">
                    ₱<?= number_format($product->price, 2) ?>
                </h2>

                <form action="<?= site_url('/cart/add') ?>" method="post" class="cart-action-form">
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">

                    <button class="px-6 py-3 rounded-lg font-bold text-white color-weathered-blue hover-secondary">
                        Add to Cart
                    </button>
                </form>

            </div>

        </div>

    </div>

        <?= view('components/footer') ?>
        <script src="<?= base_url('/js/script.js') ?>"></script>
    </body>
</html>