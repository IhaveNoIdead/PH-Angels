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
    color-light-dark
    w-full sm:w-1/3
    focus:outline-none ">

<!-- Sort -->
<select
id="products_sort"
class="shadow-sm px-3 py-2 border rounded-md
color-light-dark 
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
color-light-dark
text-color-soft-white
hover-secondary 
text-soft-white cursor-pointer shadow-sm">

Reset

</button>

</div>

</form>

<script>
(function() {
    function waitForTable(maxAttempts = 40, interval = 50) {
        return new Promise((resolve) => {
            let attempts = 0;
            const intervalId = setInterval(() => {
                const table = document.querySelector('table');
                attempts++;
                if (table || attempts >= maxAttempts) {
                    clearInterval(intervalId);
                    resolve(table);
                }
            }, interval);
        });
    }

    function initForProductsTable(table) {
        if (!table) return;

        const queryInput = document.getElementById('products_query');
        const sortSelect = document.getElementById('products_sort');
        const resetBtn = document.getElementById('productsResetBtn');

        // Snapshot of all rows with searchable fields
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const snapshot = rows.map(row => {
            const cols = Array.from(row.querySelectorAll('td'));
            const id = (cols[0]?.textContent ?? '').trim().toLowerCase();
            const name = (cols[1]?.textContent ?? '').trim().toLowerCase();
            const type = (cols[2]?.textContent ?? '').trim().toLowerCase();
            const price = parseFloat(cols[3]?.textContent.replace(/[^0-9.]/g, '') || 0);
            return { row, id, name, type, price, html: row.outerHTML };
        });

        function render(list) {
            const tbody = table.querySelector('tbody');
            if (!list.length) {
                tbody.innerHTML = '<tr><td class="p-3" colspan="7">No products match your search.</td></tr>';
                return;
            }
            tbody.innerHTML = list.map(i => i.html).join('\n');
        }

        function apply() {
            const query = (queryInput.value || '').toLowerCase().trim();
            const sort = sortSelect.value;

            let out = snapshot.filter(item => {
                if (query && !(item.id.includes(query) || item.name.includes(query))) {
                    return false;
                }
                return true;
            });

            // Sorting
            if (sort === 'name_asc') out.sort((a, b) => a.name.localeCompare(b.name));
            else if (sort === 'name_desc') out.sort((a, b) => b.name.localeCompare(a.name));
            else if (sort === 'price_asc') out.sort((a, b) => a.price - b.price);
            else if (sort === 'price_desc') out.sort((a, b) => b.price - a.price);

            render(out);
        }

        [queryInput, sortSelect].forEach(el => el && el.addEventListener('input', apply));
        resetBtn && resetBtn.addEventListener('click', () => {
            queryInput.value = '';
            sortSelect.value = '';
            apply();
        });

        // Initial render
        apply();
    }

    // Wait for DOM ready and the table to exist
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        waitForTable().then(initForProductsTable);
    } else {
        document.addEventListener('DOMContentLoaded', () => waitForTable().then(initForProductsTable));
    }
})();
</script>