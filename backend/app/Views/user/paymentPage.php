<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Payment | Philippines Angels'
]) ?>

<body class="color-base-dark">

    <!-- Header -->
    <?= view('components/header') ?>

    <main class="flex flex-col items-center justify-center min-h-screen py-12">

        <h1 class="mb-6 text-4xl font-bold text-color-soft-white">Payment</h1>
        <p class="mb-6 text-color-soft-white text-center">Scan the QR code below for payment.</p>

        <!-- Fake QR -->
        <img src="/assets/image/QRcode.png" alt="Fake QR Code" class="w-48 h-48 mb-6 bg-white p-2 rounded-lg">

        <!-- Complete Order Button -->
        <form action="<?= site_url('/paymentPage/Pay') ?>" method="post">
            <button type="submit" class="w-48 py-3 rounded-lg font-bold color-weathered-blue hover-secondary">
                Complete Order
            </button>
        </form>

    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>
</html>