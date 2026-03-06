<form 
id="productsFilterForm"
onsubmit="return false;"
class="flex sm:flex-row flex-col sm:items-center gap-3 mb-6">

<!-- Search -->
<input
type="search"
id="products_query"
placeholder="Search by Product ID or Product Name"
class="shadow-sm px-3 py-2 border rounded-md
    color-soft-white
    w-full sm:w-1/3
    focus:outline-none text-black">

<!-- Sort -->
<select
id="products_sort"
class="shadow-sm px-3 py-2 border rounded-md
color-soft-white text-black
w-full sm:w-48 cursor-pointer
focus:outline-none">

<option value="">Sort — default</option>
<option value="name_asc">Name A → Z</option>
<option value="name_desc">Name Z → A</option>
<option value="price_asc">Price Low → High</option>
<option value="price_desc">Price High → Low</option>

</select>

<!-- Reset -->
<div class="flex gap-2 ml-auto">

<button
type="button"
id="productsResetBtn"
class="px-4 py-2 rounded-md
color-base-dark
text-color-soft-white
hover-primary
cursor-pointer shadow-sm">

Reset

</button>

</div>

</form>