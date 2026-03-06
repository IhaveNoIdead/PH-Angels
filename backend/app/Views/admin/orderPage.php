<?php
$pageNumber = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$productsPerPage = isset($_GET['productsPerPage']) ? max(1, (int) $_GET['productsPerPage']) : 10;

$dataToUse = $products ?? [];
$total = count($dataToUse);
$totalPages = (int) max(1, ceil($total / $productsPerPage));

if ($pageNumber > $totalPages) {
    $pageNumber = $totalPages;
}

$start = ($pageNumber - 1) * $productsPerPage;
$pageProducts = array_slice($dataToUse, $start, $productsPerPage);

function querySetter(array $overrides = [])
{
    $query = array_merge($_GET, $overrides);
    return http_build_query($query);
}

$update_id = isset($_GET['update_id']) ? (int) $_GET['update_id'] : null;
$editing = $update_id !== null;

$productToEdit = null;
if ($editing) {
    foreach ($products as $p) {
        if ($p->id == $update_id) {
            $productToEdit = $p;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Philippines Angels'
]) ?>

<body class="color-espresso">

<?= view('components/header') ?>

<main class="space-y-12 py-10">

<div class="md:flex md:space-x-6">

<?= view('components/sidebar/adminSidebar', ['active' => 'orderPage']) ?>

<section class="shadow mx-8 my-8 p-6 rounded-xl color-light-dark">

<!-- ADD PRODUCT FORM -->

<form method="post" action="/admin/menuPage" enctype="multipart/form-data" class="space-y-3 mb-8">

<?php if ($editing): ?>
<input type="hidden" name="update" value="<?= esc($productToEdit->id) ?>">
<?php endif; ?>

<div class="flex sm:flex-row flex-col gap-3">

<input
type="text"
name="product_name"
placeholder="Product Name"
value="<?= esc(old('product_name', $productToEdit->product_name ?? '')) ?>"
class="px-3 py-2 rounded-md w-full sm:w-1/3 color-soft-white text-black "
required>

<input
type="number"
step="0.01"
name="price"
placeholder="Price"
value="<?= esc(old('price', $productToEdit->price ?? '')) ?>"
class="px-3 py-2 rounded-md w-full sm:w-1/3 color-soft-white text-black "
required>

<input
type="text"
name="product_description"
placeholder="Description"
value="<?= esc(old('product_description', $productToEdit->product_description ?? '')) ?>"
class="px-3 py-2 rounded-md w-full sm:w-1/3 color-soft-white text-black"
required>

<input
type="text"
name="type"
placeholder="Helicopter"
value="<?= esc(old('type', $productToEdit->type ?? '')) ?>"
class="px-3 py-2 rounded-md w-full sm:w-1/4 color-soft-white text-black "
required>

<input
type="file"
name="product_image"
accept="image/*"
class="px-3 py-2 rounded-md w-full sm:w-1/4 color-gold cursor-pointer text-sm text-color-soft-white"
required>

<button
type="submit"
class="px-4 py-2 rounded-md color-midnight-black text-white hover-secondary text-soft-white cursor-pointer shadow-sm">
<?= $editing ? 'Update Product' : 'Add Product' ?>
</button>

</div>
</form>

<!-- </?= view('components/control_panels/filter_search_sort/adminOrders') ?> -->

<!-- PRODUCTS TABLE -->
<div class="shadow rounded-lg overflow-x-auto">

<div class="shadow rounded-lg overflow-x-auto">

<table class="min-w-full text-left text-sm ">

<thead class="color-base-dark text-color-soft-white">

<tr>
<th class="px-6 py-3">ID</th>
<th class="px-6 py-3">Name</th>
<th class="px-6 py-3">Price</th>
<th class="px-6 py-3">Description</th>
<th class="px-6 py-3">Image</th>
<th class="px-6 py-3 text-center">Action</th>
</tr>

</thead>

<tbody class="divide-y color-soft-white text-black">

<?php if (!empty($pageProducts)): ?>

<?php foreach ($pageProducts as $product): ?>

<tr>

<td class="px-6 py-4"><?= esc($product->id) ?></td>

<td class="px-6 py-4"><?= esc($product->product_name) ?></td>

<td class="px-6 py-4">₱<?= esc($product->price) ?></td>

<td class="px-6 py-4"><?= esc($product->product_description) ?></td>

<td class="px-6 py-4">

<?php if (!empty($product->product_image)): ?>

<img src="/assets/uploads/images/products/<?= esc($product->product_image) ?>"
class="rounded w-16 h-16 object-cover">

<?php else: ?>

<span class="text-gray-400 italic">No image</span>

<?php endif; ?>

</td>

<td class="px-6 py-4 text-center">

<form method="get" action="/admin/menuPage" class="my-2">

<button
type="submit"
name="update_id"
value="<?= esc($product->id) ?>"
class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded-md text-white">

Edit

</button>

</form>

<form method="post"
action="/admin/menuPage"
class="my-2"
onsubmit="return confirm('Delete this product?');">

<button
type="submit"
name="delete"
value="<?= esc($product->id) ?>"
class="px-3 py-1 border rounded">
Delete
</button>
</form>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="6" class="py-6 text-gray-400 text-center">

No products available

</td>

</tr>

<?php endif; ?>

</tbody>

</table>


<!-- PAGINATION -->

<div class="p-4 border-t bg-white">

<div class="flex justify-between items-center">

<form method="get" class="flex items-center gap-2">

<label for="productsPerPage" class="text-sm">Show</label>

<select
id="productsPerPage"
name="productsPerPage"
class="p-1 border rounded text-sm"
onchange="this.form.submit()">

<option value="5" <?= $productsPerPage == 5 ? 'selected' : '' ?>>5</option>
<option value="10" <?= $productsPerPage == 10 ? 'selected' : '' ?>>10</option>
<option value="20" <?= $productsPerPage == 20 ? 'selected' : '' ?>>20</option>

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

<a class="px-3 py-1 border rounded <?= ($pageNumber <= 1) ? 'opacity-50 pointer-events-none' : '' ?>"
href="?<?= querySetter(['page' => max(1, $pageNumber - 1), 'productsPerPage' => $productsPerPage]) ?>">

Prev

</a>

<?php for ($p = $startPage; $p <= $endPage; $p++): ?>

<a
class="px-3 py-1 border rounded <?= ($p == $pageNumber) ? 'bg-black text-white' : '' ?>"
href="?<?= querySetter(['page' => $p, 'productsPerPage' => $productsPerPage]) ?>">

<?= $p ?>

</a>

<?php endfor; ?>

<a
class="px-3 py-1 border rounded <?= ($pageNumber >= $totalPages) ? 'opacity-50 pointer-events-none' : '' ?>"
href="?<?= querySetter(['page' => min($totalPages, $pageNumber + 1), 'productsPerPage' => $productsPerPage]) ?>">

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