<div class="space-y-12 mx-8 my-8 min-w-48">

    <div class="shadow p-6 rounded-[20px] color-light-dark">

        <nav class="space-y-4 text-sm text-center">

            <a href="/admin/dashboard"
            class="block py-2 px-4 rounded-full
            <?= $active === 'dashboard'
                ? 'color-base-dark text-color-soft-white'
                : 'color-soft-white text-black hover-primary hover:text-white' ?>">
            Dashboard
            </a>

            <a href="/admin/orderPage"
            class="block py-2 px-4 rounded-full
            <?= $active === 'orderPage'
                ? 'color-base-dark text-color-soft-white'
                : 'color-soft-white text-black hover-primary hover:text-white' ?>">
            Orders
            </a>

            <a href="/admin/accountsPage"
            class="block py-2 px-4 rounded-full
            <?= $active === 'accountsPage'
                ? 'color-base-dark text-color-soft-white'
                : 'color-soft-white text-black hover-primary hover:text-white' ?>">
            Accounts
            </a>


            <a href="/admin/menuPage"
            class="block py-2 px-4 rounded-full
            <?= $active === 'menuPage'
                ? 'color-base-dark text-color-soft-white'
                : 'color-soft-white text-black hover-primary hover:text-white' ?>">
            Products
            </a>

        </nav>

    </div>

</div>