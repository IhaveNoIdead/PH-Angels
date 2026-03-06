<?php $session = session(); ?>
<?php $type = $session->get('user')['type'] ?? ''; ?>

<footer class=" py-10 w-full text-color-soft-white color-midnight-black">
    <div class="mx-auto px-6 max-w-7xl">
        <?php if($type !== 'admin'): ?>
            <div class="gap-10 grid grid-cols-1 md:grid-cols-2">
                <!-- Follow Us -->
                <div>
                    <h5 class="mb-4 font-bold text-3xl md:text-4xl">Follow Us</h5>
                    <ul class="space-y-2 text-lg">
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">Instagram</a></li>
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">Facebook</a></li>
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">X (Twitter)</a></li>
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">YouTube</a></li>
                    </ul>
                </div>

                <!-- Contact Us -->
                <div class="md:text-right">
                    <h5 class="mb-4 font-bold text-3xl md:text-4xl">Contact Us</h5>
                    <ul class="space-y-2 text-lg">
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">PhilippinesAngels@somewhere.com</a></li>
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">Telephone: (0xx)-xxx-xxxx</a></li>
                        <li><a href="#" class="hover:text-[#4A6FA5] transition">Mobile: 0xxx-xxx-xxxx</a></li>
                    </ul>
                </div>
            </div>

            <hr class="my-6 border-white/30">
            
            <p class="opacity-75 text-base text-center">
                &copy; 2026 Philippine's Angels.. (Final Project for IT0041)
            </p>
        <?php endif ?>
    </div>
</footer>