<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Cart | Philippines Angels'
]) ?>

<body class="color-base-dark">
    <!-- Header -->
    <?= view('components/header') ?>

    <!-- Hero -->
    <?= view('components/hero', [
        'heading' => 'Your Cart',
        'subHeading' => 'Review your items before checking out'
    ]) ?>

    <main class="gap-10 grid grid-cols-1 md:grid-cols-3 mx-auto py-12 max-w-7xl">

        <!-- Cart Items -->
        <section class="md:col-span-2 shadow p-8 rounded-xl text-color-soft-white ">

            <h2 class="mb-8 font-bold text-color-soft-white text-3xl text-center">Items in Cart</h2>
            <?php $subtotal = 0; ?>
            <div class="space-y-6">
                <?php if (!empty($cartItems)): ?>
                        <div class="flex pb-4 border-b">
                            <table class="w-full table-fixed text-sm text-center mx-auto">
                                <thead>
                                    <tr>
                                        <th>Product Preview</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Edit</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <?php foreach ($cartItems as $item): ?>
                                    <?php
                                        $price = $item['price'];
                                        $quantity = $item['quantity'];
                                        $itemTotal = $price * $quantity;
                                        $subtotal += $itemTotal;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="<?= esc($item['product_image']) ?>"class="rounded-lg w-20 h-20 object-cover mx-auto">
                                            </td>
                                            <td>
                                                <h3 class="font-bold text-color-soft-white text-xl">
                                                    <?= esc($item['product_name']) ?>
                                                </h3>
                                            </td>
                                            <td>
                                                <p class="text-color-soft-white text-sm">
                                                    ₱<?= number_format(esc($item['price']), 2) ?>
                                                </p>
                                            </td>
                                            <td>
                                                <span data-id="<?= $item['id'] ?>" class="item-quantity font-bold"><?= esc($quantity) ?></span>
                                            </td>
                                            <td class="grid grid-cols-2 items-center my-8">
                                                <!-- decrease qty -->
                                                <form action="<?= site_url('cart/decrease/' . $item['id']) ?>" class="cart-action-form" method="post">
                                                    <button type="submit" class="color-weathered-blue hover-secondary px-3 py-1 rounded">-</button>
                                                </form>

                                                <!-- increase qty -->
                                                <form action="<?= site_url('cart/increase/' . $item['id']) ?>" class="cart-action-form" method="post">
                                                    <button type="submit" class="color-weathered-blue hover-secondary px-3 py-1 rounded">+</button>
                                                </form>
                                            </td>
                                            <td>
                                                <p data-id="<?= $item['id'] ?>" class=" subtotal font-bold text-color-soft-white">
                                                    ₱<?= number_format($itemTotal, 2) ?>
                                                </p>
                                            </td> 
                                            <td>
                                                <form action="<?= site_url('cart/remove/' . $item['id']) ?>" method="post" class="cart-action-form ml-4">
                                                    <button type="submit" class="font-bold text-red-600 link_2">Remove</button>
                                                </form>
                                            </td>   
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                <?php else: ?>
                    <p class="text-color-soft-white text-center">Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Summary -->
        <aside class="shadow p-8 rounded-xl h-fit text-color-soft-white">

            <h2 class="mb-8 font-bold text-color-soft-white text-3xl text-center">Order Summary</h2>

            <div class="space-y-4 text-lg">
                <div class="flex justify-between pt-4 border-t font-bold text-color-soft-white text-xl">
                    <span>Est Total</span>
                    <span id="cart-total">₱<?= number_format($subtotal, 2) ?></span>
                </div>
            </div>

            <?php if (!empty($cartItems)): ?>
                <form action="<?= site_url('/checkout') ?>" method="get">
                    <button type="submit" class="color-weathered-blue mt-10 py-3 rounded-lg w-full font-bold hover-secondary">
                        Proceed to Checkout
                    </button>
                </form>
            <?php endif; ?>

            <a href="/productsPage" class="block mt-4 text-color-soft-white text-center underline">
                Continue Shopping
            </a>
        </aside>

    </main>
    <script src="<?= base_url('/js/script.js') ?>"></script>
    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>