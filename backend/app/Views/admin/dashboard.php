<!DOCTYPE html>
<html>
<?= view('components/head', [
    'title' => 'Philippines Angels'
]) ?>

<body class="min-h-screen flex flex-col color-base-dark">

<!-- NavBar -->
<?= view('components/header') ?>

<main class="flex-grow py-10">

<div class="flex gap-10 mx-10">

    <!-- Sidebar -->
    <?= view('components/sidebar/adminSidebar', ['active' => 'dashboard']) ?>

    <!-- Main Content -->
    <div class="flex-1 space-y-10">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-2 gap-10">

            <div class="color-light-dark p-6 rounded-[20px] shadow-lg">
                <h3 class="text-2xl font-bold text-color-soft-white">
                    Current Users: <?= esc($totalUsers) ?>
                </h3>
            </div>

            <!-- Pending Orders -->
            <div class="color-light-dark p-6 rounded-[20px] shadow-lg">
                <h3 class="text-2xl font-bold text-color-soft-white">
                    Pending Orders: <?= esc($ordersPending) ?>
                </h3>
            </div>

            <!-- Complete Orders -->
            <div class="color-light-dark p-6 rounded-[20px] shadow-lg">
                <h3 class="text-2xl font-bold text-color-soft-white">
                    Completed Orders: <?= esc($ordersCompleted) ?>
                </h3>
            </div>

        </div>

    </div>

</div>

</main>

<!-- Footer -->
<?= view('components/footer') ?>

</body>
</html>