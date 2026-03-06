<?php $session = session(); ?>
<?php $type = $session->get('user')['type'] ?? ''; ?>

<header class="sticky top-0 z-[100]">
    <nav class="color-midnight-black shadow">
        <div class="px-8 flex items-center font-bold justify-between h-24">
            <a href="/" class="title">PH Angels</a>

            <div class="hidden md:flex space-x-6">
                <a href="/" class="btn">Home</a>
                <a href="/#service" class="btn">Services</a>
                <?php if($type !== 'admin'): ?>
                    <a href="/plansPage" class="btn">Plans</a>
                    <a href="/productsPage" class="btn">Products</a>
                    <a href="/cart" class="btn">Cart</a>
                <?php endif ?>
                
                <?php if ($session->has('user')): ?>
                    <?php if ($type === 'admin'): ?>
                        <a href="/admin/dashboard" class="btn">Dashboard</a>
                    <?php elseif ($type === 'client'): ?>
                        <a href="/order" class="btn">Products</a>
                    <?php endif; ?>

                    <!-- Profile link visible for all logged-in users -->
                    <a href="/userProfile" class="btn">Profile</a>
                    <a href="/logout" class="btn">Logout</a>
                <?php else: ?>
                    <a href="/loginPage" class="btn">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
