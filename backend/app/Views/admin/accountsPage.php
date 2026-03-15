<?php
$pageNumber = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$accountsPerPage = isset($_GET['accountsPerPage']) ? max(1, (int) $_GET['accountsPerPage']) : 10;

$dataToUse = $users ?? [];
$total = count($dataToUse);
$totalPages = (int) max(1, ceil($total / $accountsPerPage));

if ($pageNumber > $totalPages) {
    $pageNumber = $totalPages;
}

$start = ($pageNumber - 1) * $accountsPerPage;
$pageAccounts = array_slice($dataToUse, $start, $accountsPerPage);

function querySetter(array $overrides = [])
{
    $query = array_merge($_GET, $overrides);
    return http_build_query($query);
}
?>

<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Philippines Angels'
]) ?>

<body class="color-base-dark">

<!-- Navbar -->
<?= view('components/header') ?>

<main class="py-10">

<div class="flex gap-10 mx-10">

    <!-- Sidebar -->
    <?= view('components/sidebar/adminSidebar', ['active' => 'accountsPage']) ?>

    <!-- Main Content -->
    <section class="flex-1 shadow p-6 rounded-[30px] color-midnight-black">

        

        <?= view('components/control_panels/filter_search_sort/adminAccounts') ?>

        <!-- Table -->
        <div class="shadow rounded-xl overflow-x-auto">

            <table class="min-w-full text-sm text-left">

                <!-- Table Header -->
                <thead class="color-base-dark text-color-soft-white">
                    <tr>
                        <th class="px-6 py-3">First Name</th>
                        <th class="px-6 py-3">Middle Name</th>
                        <th class="px-6 py-3">Last Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Type</th>
                        <th class="px-6 py-3">Created At</th>
                        <th class="px-6 py-3">Updated At</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="color-light-dark">

                <?php if (!empty($pageAccounts)): ?>

                    <?php foreach ($pageAccounts as $user): ?>

                    <tr class="border-b text-color-soft-white">

                        <td class="px-6 py-4"><?= esc($user->first_name) ?></td>
                        <td class="px-6 py-4"><?= esc($user->middle_name) ?></td>
                        <td class="px-6 py-4"><?= esc($user->last_name) ?></td>
                        <td class="px-6 py-4"><?= esc($user->email) ?></td>
                        <td class="px-6 py-4"><?= esc($user->type) ?></td>
                        <td class="px-6 py-4"><?= esc($user->created_at) ?></td>
                        <td class="px-6 py-4"><?= esc($user->updated_at) ?></td>

                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7" class="py-6 text-center text-gray-600">
                            No users found
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

            <!-- Pagination -->
            <div class="p-4 border-t text-color-soft-white color-base-dark">

                <div class="flex justify-between items-center">

                    <!-- Per Page -->
                    <form method="get" class="flex items-center gap-2">

                        <label for="accountsPerPage" class="text-sm">Show</label>

                        <select
                        id="accountsPerPage"
                        name="accountsPerPage"
                        class="p-1 border rounded text-sm"
                        onchange="this.form.submit()">

                            <option value="5" <?= $accountsPerPage == 5 ? 'selected' : '' ?>>5</option>
                            <option value="10" <?= $accountsPerPage == 10 ? 'selected' : '' ?>>10</option>
                            <option value="20" <?= $accountsPerPage == 20 ? 'selected' : '' ?>>20</option>

                        </select>

                        <input type="hidden" name="page" value="1" />
                        <span class="text-sm">per page</span>

                    </form>

                    <!-- Page Buttons -->
                    <div class="flex items-center gap-2">

                    <?php if ($totalPages > 1): ?>

                        <?php
                        $startPage = max(1, $pageNumber - 3);
                        $endPage = min($totalPages, $pageNumber + 3);
                        ?>

                        <a
                        class="px-3 py-1 border rounded hover-secondary
                        <?= ($pageNumber <= 1) ? 'opacity-50 pointer-events-none' : '' ?>"
                        href="?<?= querySetter(['page' => max(1, $pageNumber - 1), 'accountsPerPage' => $accountsPerPage]); ?>">
                        Prev
                        </a>

                        <?php for ($p = $startPage; $p <= $endPage; $p++): ?>

                        <a
                        class="px-3 py-1 border rounded
                        <?= ($p == $pageNumber) ? 'color-base-dark text-color-soft-white' : 'hover-secondary' ?>"
                        href="?<?= querySetter(['page' => $p, 'accountsPerPage' => $accountsPerPage]); ?>">
                        <?= $p ?>
                        </a>

                        <?php endfor; ?>

                        <a
                        class="px-3 py-1 border rounded hover-secondary
                        <?= ($pageNumber >= $totalPages) ? 'opacity-50 pointer-events-none' : '' ?>"
                        href="?<?= querySetter(['page' => min($totalPages, $pageNumber + 1), 'accountsPerPage' => $accountsPerPage]); ?>">
                        Next
                        </a>

                    <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

</main>

<?= view('components/footer') ?>

</body>
</html>