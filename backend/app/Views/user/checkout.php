<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Checkout | Philippines Angels'
]) ?>

<body class="color-base-dark">

    <!-- Header -->
    <?= view('components/header') ?>

    <!-- Hero -->
    <?= view('components/hero', [
        'heading' => 'Checkout',
        'subHeading' => 'Finalize your order'
    ]) ?>

    <main class="gap-10 grid grid-cols-1 md:grid-cols-3 mx-auto py-12 max-w-7xl">

        <!-- Chekout Items -->
        <section class="md:col-span-2 shadow p-8 rounded-xl text-color-soft-white color-base-dark">

            <h2 class="mb-8 font-bold text-color-soft-white text-3xl text-center">Items in Cart</h2>
            <?php 
                $subtotal = 0;
                $total = 0;
            ?>
            <div class="space-y-6">
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <?php
                            $price = $item['price'];
                            $quantity = $item['quantity'];
                            $itemTotal = $price * $quantity;
                            $subtotal += $itemTotal;
                            $total += $subtotal;
                        ?>

                        <div class="flex pb-4 border-b">
                            <table class="w-full table-fixed text-sm text-center mx-auto">
                                <thead>
                                    <tr>
                                        <th>Product Preview</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                            
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
                                                <?= esc($item['price']) ?>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="font-bold"><?= esc($quantity) ?></span>
                                        </td>
                                        <td>
                                            <p class="font-bold text-color-soft-white">
                                                ₱<?= number_format($itemTotal, 2) ?>
                                            </p>
                                        </td>  
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-color-soft-white text-center">Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Pickup Details-->
        <aside class="shadow p-8 rounded-xl h-fit text-color-soft-white">

            <h2 class="mb-8 font-bold text-color-soft-white text-3xl text-center">Pickup Details</h2>

            <form action="<?= site_url('/checkout/PlaceOrder') ?>" method="post" class="space-y-4">
                <div>
                    <label class="block mb-1">Location</label>
                        <select name="location" class="w-full rounded-lg p-2 bg-color-base-dark text-color-soft-white color-light-dark">
                            <option value="Ninoy Aquino International Airport">Ninoy Aquino International Airport </option>
                            <option value="Mactan-Cebu International Airport">Mactan-Cebu International Airport </option>
                            <option value="Francisco Bangoy International Airport">Francisco Bangoy International Airport</option>
                            <option value="Kalibo International Airport">Kalibo International Airport </option>
                        </select>
                </div>

                <div>
                    <label class="block mb-1">Pickup Date</label>
                    <input type="date" name="pickup_date" min="<?= date('Y-m-d', strtotime('+7 day')) ?>" max="<?= date('Y-m-d', strtotime('last day of December')) ?>" class="w-full rounded-lg p-2 bg-color-base-dark text-color-soft-white color-light-dark" required>
                </div>

                <div>
                    <label class="block mb-1">Pickup Time</label>
                    <input type="time" name="pickup_time" min="<?= date('H:i', strtotime('6:00')) ?>" max="<?= date('H:i', strtotime('19:00')) ?>" class="w-full rounded-lg p-2 bg-color-base-dark text-color-soft-white color-light-dark" required>
                </div>

                <div class="pt-4 border-t">
                    <p class="text-sm">Payment Cash/Card On Pickup</p>
                    <p class="font-bold text-lg">EstTotal: ₱<?= number_format($total, 2) ?></p>
                </div>

                <button type="submit" class="mt-4 w-full py-3 rounded-lg font-bold color-weathered-blue hover-secondary">
                    Confirm & Place Order
                </button>
            </form>

            <a href="/" class="block mt-4 text-color-soft-white text-center underline">
                Continue Shopping
            </a>
        </aside>

    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>