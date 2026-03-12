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

    function initForOrdersTable(table) {
        if (!table) return;

        const queryInput = document.getElementById('orders_query');
        const sortSelect = document.getElementById('orders_sort');
        const statusSelect = document.getElementById('orders_status');
        const resetBtn = document.getElementById('ordersResetBtn');

        // Snapshot of all rows with searchable fields
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const snapshot = rows.map(row => {
            const cols = Array.from(row.querySelectorAll('td'));
            const orderId = (cols[1]?.textContent ?? '').trim().toLowerCase();
            const userId = (cols[0]?.textContent ?? '').trim().toLowerCase();
            const status = (cols[3]?.textContent ?? '').trim().toLowerCase();
            const created = cols[4]?.textContent ?? '';
            return { row, orderId, userId, status, created, html: row.outerHTML };
        });

        function render(list) {
            const tbody = table.querySelector('tbody');
            if (!list.length) {
                tbody.innerHTML = '<tr><td class="p-3" colspan="6">No orders match your search.</td></tr>';
                return;
            }
            tbody.innerHTML = list.map(i => i.html).join('\n');
        }

        function apply() {
            const query = (queryInput.value || '').toLowerCase().trim();
            const sort = sortSelect.value;
            const statusFilter = (statusSelect && statusSelect.value) ? statusSelect.value : 'all';

            let out = snapshot.filter(item => {
                // Search by Order ID or User ID or Status
                if (query && !(item.orderId.includes(query) || item.userId.includes(query) || item.status.includes(query))) {
                    return false;
                }
                // Status filtering
                if (statusFilter && statusFilter !== 'all' && item.status !== statusFilter.toLowerCase()) {
                    return false;
                }
                return true;
            });

            // Sorting
            if (sort === 'id_asc') out.sort((a, b) => a.orderId.localeCompare(b.orderId));
            else if (sort === 'id_desc') out.sort((a, b) => b.orderId.localeCompare(a.orderId));
            else if (sort === 'created_asc') out.sort((a, b) => new Date(a.created) - new Date(b.created));
            else if (sort === 'created_desc') out.sort((a, b) => new Date(b.created) - new Date(a.created));

            render(out);
        }

        // Event listeners
        [queryInput, sortSelect, statusSelect].forEach(el => el && el.addEventListener('input', apply));
        resetBtn && resetBtn.addEventListener('click', () => {
            queryInput.value = '';
            sortSelect.value = '';
            if (statusSelect) statusSelect.value = 'all';
            apply();
        });

        // Initial render
        apply();
    }

    // Wait for DOM ready and the table to exist
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        waitForTable().then(initForOrdersTable);
    } else {
        document.addEventListener('DOMContentLoaded', () => waitForTable().then(initForOrdersTable));
    }
})();
</script>