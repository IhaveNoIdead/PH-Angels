<form 
id="ordersFilterForm"
onsubmit="return false;"
class="flex sm:flex-row flex-col sm:items-center gap-3 mb-6">

<!-- Search -->
<input
type="search"
id="orders_query"
placeholder="Search by Order ID, User ID, or Status"
class="shadow-sm px-3 py-2 border rounded-md
color-soft-white
w-full sm:w-1/3
focus:outline-none">

<!-- Sort -->
<select
id="orders_sort"
class="shadow-sm px-3 py-2 border rounded-md
color-soft-white
w-full sm:w-48 cursor-pointer
focus:outline-none">

<option value="">Sort — default</option>
<option value="id_asc">Order ID Asc</option>
<option value="id_desc">Order ID Desc</option>
<option value="created_asc">Oldest</option>
<option value="created_desc">Newest</option>

</select>

<!-- Status Filter -->
<select
id="orders_status"
class="shadow-sm px-3 py-2 border rounded-md
color-soft-white
w-full sm:w-48 cursor-pointer
focus:outline-none">

<option value="all">Status — all</option>
<option value="pending">Pending</option>
<option value="completed">Completed</option>
<option value="cancelled">Cancelled</option>

</select>

<!-- Reset -->
<div class="flex gap-2 ml-auto">

<button
type="button"
id="ordersResetBtn"
class="px-4 py-2 rounded-md
color-light-dark
text-color-soft-white
hover-primary
cursor-pointer shadow-sm">

Reset

</button>

</div>

</form>