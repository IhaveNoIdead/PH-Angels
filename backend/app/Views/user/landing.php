<?php if(session()->getFlashdata('success')): ?>
    <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded shadow-lg z-[1000]">
        <?= session()->getFlashdata('success') ?>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.querySelector('.fixed.top-4.right-4');
            if(msg) msg.remove();
        }, 3000);
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html>

<?= view('components/head', [
    'title' => 'Philippines Angels'
]) ?>

<body class="color-base-dark">
    <!-- NavBar -->
    <?= view('components/header') ?>

    <!-- Hero -->
    <?= view('components/hero', [
        'heading' => 'Fly better, Fly Your Way',
        'subHeading' => 'Helicopter sales, modification, & repair in one Roof',
    ]) ?>

    <main class="space-y-12 py-10">

        <!-- Plans section -->
        <section class="shadow mx-auto p-10 rounded-xl max-w-7xl">
            <h2 class="mb-8 font-bold text-color-soft-white text-4xl text-center"> Plans </h2>

            <div class="place-items-center gap-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 items-stretch">
                <?= view('components/cards/card', [
                    'title' => 'Angel Check',
                    'description' => 'Our essential care package, perfect for owners flying short domestic routes. It provides the peace of mind every pilot deserves with basic yet crucial pre-flight inspections and diagnostics.',
                    'price' => '₱ 25,000',
                    'link' => '/plansPage',
                    'linkName' => 'Learn More',
                    'image' => '/assets/image/lfn-maintenance-slider-6.jpg'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Halo Maintenance',
                    'description' => 'A full-service maintenance plan designed for regular fliers and tour operators. Keep your aircraft in peak condition with preventive servicing and faster turnaround.',
                    'price' => '₱ 85,000',
                    'link' => '/plansPage',
                    'linkName' => 'Learn More',
                    'image' => '/assets/image/TECHNIKAI025.jpg'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Wings of Ownership',
                    'description' => 'Step into the skies with your very own aircraft. This plan guides you through purchasing a helicopter with full legal, safety, and mechanical support.',
                    'price' => '₱ 100,000',
                    'link' => '/plansPage',
                    'linkName' => 'Learn More',
                    'image' => '/assets/image/news-O1rSzG.jpg'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Guardian Fleet Program',
                    'description' => 'This program offers full support with dedicated teams and inspections across Luzon, Visayas, and Mindanao.',
                    'price' => '₱ 500,000',
                    'link' => '/plansPage',
                    'linkName' => 'Learn More',
                    'image' => '/assets/image/AERO-IDAG-helicopter-hangar-7-scaled.jpg'
                ]) ?>
            </div>
        </section>

        <!-- Services Section -->
        <section id="service" class="shadow mx-auto p-10 color-light-dark">
            <h2 class="mb-8 font-bold text-color-soft-white text-4xl text-center"> Services </h2>

            <div class="gap-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <?= view('components/cards/card_v2', [
                    'title' => 'Retail',
                    'description' => 'Find the perfect aircraft for your needs — whether you are a first-time buyer or expanding your fleet. We offer brand-new and certified pre-owned helicopters, with registration and delivery support across the Philippines.',
                    'link' => null,
                    'price' => null,
                    'status' => null,
                    'color' => null,
                    'image' => '/assets/image/Retail.png'
                ]) ?>

                <?= view('components/cards/card_v2', [
                    'title' => 'Modification',
                    'description' => 'Customize your helicopter to meet mission-critical needs. From avionics upgrades and custom interiors to livery painting and performance enhancements — Philippine Angels tailors your aircraft to perfection.',
                    'link' => null,
                    'price' => null,
                    'status' => null,
                    'color' => null,
                    'image' => '/assets/image/modifiction.png'
                ]) ?>

                <?= view('components/cards/card_v2', [
                    'title' => 'Repair',
                    'description' => 'Keep your aircraft airworthy and mission-ready. Our certified team offers diagnostics, emergency repairs, scheduled maintenance, and on-site service across Luzon, Visayas, and Mindanao.',
                    'link' => null,
                    'price' => null,
                    'status' => null,
                    'color' => null,
                    'image' => '/assets/image/repair.png'
                ]) ?>
            </div>
        </section>

       <section class="shadow mx-auto w-full p-10 ">
            <h2 class="mb-8 font-bold text-color-soft-white text-4xl text-center"> Our Work </h2>
            <div class="ourwork-carousel p-10">
                <input type="radio" name="ourwork" id="ourwork-slide1" checked>
                <input type="radio" name="ourwork" id="ourwork-slide2">
                <input type="radio" name="ourwork" id="ourwork-slide3">

                <div class="ourwork-slides">
                    <div class="ourwork-slide">
                        <img src="https://w0.peakpx.com/wallpaper/751/468/HD-wallpaper-sikorsky-uh-60-black-hawk-military-transport-helicopter-american-helicopters-airfield.jpg">
                    </div>
                    <div class="ourwork-slide">
                        <img src="https://www.itl.cat/pngfile/big/301-3012972_tag-military-helicopter-wallpapers-images-photos-pictures.jpg">
                    </div>
                    <div class="ourwork-slide">
                        <img src="https://i.pinimg.com/736x/b0/14/25/b014254054ba7f86c18509c763048954.jpg">
                    </div>
                </div>

                <div class="ourwork-controls justify-center">
                    <label for="ourwork-slide1"></label>
                    <label for="ourwork-slide2"></label>
                    <label for="ourwork-slide3"></label>
                </div>
            </div>
       </section>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>