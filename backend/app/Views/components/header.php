<?php $session = session(); ?>
<?php $type = $session->get('user')['type'] ?? ''; ?>

<header class="sticky top-0 z-[100]">
    <nav class="color-midnight-black shadow">
        <div class="px-8 flex items-center font-bold justify-between h-24">

            <a href="/" class="title">PH Angels</a>

            <!-- HAMBURGER TOGGLE -->
            <input type="checkbox" id="menu-toggle" class="menu-toggle">

            <label for="menu-toggle" class="hamburger md:hidden">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <!-- NAV LINKS -->
            <div class="nav-links">
                <ul class="hidden md:flex md:space-x-6">

                    <li><a href="/" class="btn">Home</a></li>
                    <li><a href="/#service" class="btn">Services</a></li>

                    <?php if($type !== 'admin'): ?>
                        <li><a href="/plansPage" class="btn">Plans</a></li>
                        <li><a href="/productsPage" class="btn">Products</a></li>
                        <li><a href="/cart" class="btn">Cart</a></li>
                    <?php endif ?>

                    <?php if ($session->has('user')): ?>

                        <?php if ($type === 'admin'): ?>
                            <li><a href="/admin/dashboard" class="btn">Dashboard</a></li>
                        <?php endif; ?>

                        <li><a href="/userProfile" class="btn">Profile</a></li>
                        <li><a href="/logout" class="btn">Logout</a></li>

                    <?php else: ?>
                        <li><a href="/loginPage" class="btn">Login</a></li>
                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </nav>
</header>
