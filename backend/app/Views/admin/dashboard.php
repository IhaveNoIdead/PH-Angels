<!DOCTYPE html>
<html>
<?= view('components/head', [
    'title' => 'Philippines Angels | Admin Dashboard'
]) ?>

<body class="color-base-dark text-color-soft-white">

    <!-- NavBar -->
    <?= view('components/header') ?>

    <main class="py-12">
        <div class="md:flex md:space-x-6">

            <!-- Sidebar -->
            <?= view('components/sidebar/adminSidebar', ['active' => 'dashboard']) ?>

            <!-- Main Content -->
            <div class="flex-1 mx-8 my-8 space-y-10">

                <!-- Dashboard Section -->
                <section class="color-light-dark shadow-lg p-8 rounded-2xl">

                    <h2 class="text-3xl font-bold text-center text-color-gold mb-10">
                        Admin Dashboard
                    </h2>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                        <?= view('components/cards/card_stats', [
                            'title' => 'Current Users',
                            'value' => $totalUsers,
                            'subtitle' => null
                        ]) ?>

                        <?= view('components/cards/card_stats', [
                            'title' => 'Pending Orders',
                            'value' => $ordersToday,
                            'subtitle' => null
                        ]) ?>

                        <?= view('components/cards/card_stats', [
                            'title' => 'Completed Orders',
                            'value' => $ordersThisWeek,
                            'subtitle' => null
                        ]) ?>

                    </div>

                </section>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>
</html>