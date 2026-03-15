<?php
    $pageNumber = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
    $ordersPerPage = isset($_GET['ordersPerPage']) ? max(1, (int) $_GET['ordersPerPage']) : 10;

    $dataToUse = $orders ?? [];
    $total = count($dataToUse);
    $totalPages = (int) max(1, ceil($total / $ordersPerPage));

    if ($pageNumber > $totalPages) {
        $pageNumber = $totalPages;
    }

    $start = ($pageNumber - 1) * $ordersPerPage;
    $pageOrders = array_slice($dataToUse, $start, $ordersPerPage);

    function querySetter(array $overrides = [])
    {
        $query = array_merge($_GET, $overrides);
        return http_build_query($query);
    }
?>
<?php if(session()->getFlashdata('success')): ?>
    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html>

<?= view('components/head', ['title' => 'Philippines Angels']) ?>

<body class="color-base-dark">

<?= view('components/header') ?>

<main class="space-y-12 py-10">

<div class="md:flex md:space-x-6">

<?= view('components/sidebar/adminSidebar', ['active' => 'orderPage']) ?>

<section class="shadow w-full my-8 p-6 rounded-xl color-midnight-black">

<?= view('components/control_panels/filter_search_sort/adminOrders') ?>

<div class="shadow rounded-lg overflow-x-auto">

<table class="min-w-full text-left text-sm">

<thead class="color-base-dark text-color-soft-white">

<tr>
<th class="px-6 py-3">Account No.</th>
<th class="px-6 py-3">Order No.</th>
<th class="px-6 py-3">Order Info</th>
<th class="px-6 py-3">Order Status</th>
<th class="px-6 py-3">Date Ordered</th>
<th class="px-6 py-3 text-center">Action</th>
</tr>

</thead>

<tbody class="divide-y  color-light-dark text-color-soft-white">

<?php if (!empty($pageOrders)): ?>

<?php foreach ($pageOrders as $order): ?>

<tr>

<td class="px-6 py-4">
<?= esc($order->user_id) ?>
</td>

<td class="px-6 py-4">
<?= esc($order->id) ?>
</td>

<td class="px-6 py-4">

<div>Total: ₱<?= esc($order->total_amount) ?></div>

<div class="text-xs text-color-soft-white">
Pickup: <?= esc($order->pickup_location) ?>
</div>

<div class="text-xs text-color-soft-white">
<?= esc($order->pickup_date) ?> <?= esc($order->pickup_time) ?>
</div>

</td>

<td class="px-6 py-4">

<div><?= esc($order->status) ?></div>

</td>

<td class="px-6 py-4">
<?= esc($order->created_at) ?>
</td>

<td class="px-6 py-4 text-center">

    <form method="post" action="/admin/orderPage" class="inline">

        <button
            type="submit"
            name="Complete"
            value="<?= esc($order->id) ?>"
            class="px-3 py-1 gap-8 border rounded cursor-pointer color-light-dark text-color-soft-white hover-primary">
            Complete
        </button>

    </form>

    <form
        method="post"
        action="/admin/orderPage"
        class="inline"
        onsubmit="return confirm('Cancel this order?');">

        <button
        type="submit"
        name="Cancel"
        value="<?= esc($order->id) ?>"
        class="px-3 py-1 border rounded cursor-pointer color-soft-white text-black hover-secondary">

        Cancel

        </button>
    </form>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td colspan="6" class="py-6 text-gray-400 text-center">
No orders available
</td>
</tr>

<?php endif; ?>

</tbody>

</table>

<!-- PAGINATION -->

<div class="p-4 border-t color-base-dark text-color-soft-white">

<div class="flex justify-between items-center">

<form method="get" class="flex items-center gap-2">

<label class="text-sm">Show</label>

<select
name="ordersPerPage"
class="p-1 border rounded text-sm"
onchange="this.form.submit()">

<option value="5" <?= $ordersPerPage == 5 ? 'selected' : '' ?>>5</option>
<option value="10" <?= $ordersPerPage == 10 ? 'selected' : '' ?>>10</option>
<option value="20" <?= $ordersPerPage == 20 ? 'selected' : '' ?>>20</option>

</select>

<input type="hidden" name="page" value="1">

<span class="text-sm">per page</span>

</form>

<div class="flex items-center space-x-2">

<?php if ($totalPages > 1): ?>

<?php
$startPage = max(1, $pageNumber - 3);
$endPage = min($totalPages, $pageNumber + 3);
?>

<a
class="px-3 py-1 border rounded <?= ($pageNumber <= 1) ? 'opacity-50 pointer-events-none' : '' ?>"
href="?<?= querySetter(['page' => max(1, $pageNumber - 1), 'ordersPerPage' => $ordersPerPage]) ?>">

Prev

</a>

<?php for ($p = $startPage; $p <= $endPage; $p++): ?>

<a
class="px-3 py-1 border rounded <?= ($p == $pageNumber) ? 'bg-black text-white' : '' ?>"
href="?<?= querySetter(['page' => $p, 'ordersPerPage' => $ordersPerPage]) ?>">

<?= $p ?>

</a>

<?php endfor; ?>

<a
class="px-3 py-1 border rounded <?= ($pageNumber >= $totalPages) ? 'opacity-50 pointer-events-none' : '' ?>"
href="?<?= querySetter(['page' => min($totalPages, $pageNumber + 1), 'ordersPerPage' => $ordersPerPage]) ?>">

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