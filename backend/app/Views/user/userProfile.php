<!DOCTYPE html>
<html>
<?= view('components/head', [
    'title' => 'Philippines Angels | Profile'
]) ?>

<body class="color-base-dark text-gray-900">

    <?= view('components/header') ?>

    <main class="mx-8 py-10">
        <section class="color-light-dark shadow-lg mx-auto p-6 border border-[#C9A24D] rounded-xl max-w-2xl">
            <h2 class="mb-6 font-bold text-color-gold text-3xl text-center">My Profile</h2>

            <!-- Update Profile Form -->
            <form action="<?= site_url('user/update') ?>" method="post" class="flex flex-col items-center space-y-6">

                <!-- Profile Image -->
                <img src="<?= esc($user->profile_image ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png') ?>"
                    alt="Profile Image"
                    class="shadow-md border-4 border-[#C9A24D] rounded-full w-32 h-32">

                <!-- User Info -->
                <h3 class="font-semibold text-color-soft-white text-xl">
                    <?= esc($user->first_name) ?> <?= esc($user->last_name) ?>
                </h3>
                <p class="text-color-soft-white"><?= esc($user->email) ?></p>

                <!-- Info Fields -->
                <div class="space-y-4 w-full">

                    <div>
                        <label class="block mb-1 font-medium text-color-soft-white text-sm">First Name</label>
                        <input type="text"
                            name="first_name"
                            value="<?= esc($user->first_name) ?>"
                            class="p-2 border color-soft-white border-[#C9A24D] focus:border-[#C9A24D] rounded-lg focus:ring-2 focus:ring-border-[#C9A24D] w-full">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium text-color-soft-white text-sm">Middle Name</label>
                        <input type="text"
                            name="middle_name"
                            value="<?= esc($user->middle_name) ?>"
                            class="p-2 border color-soft-white border-[#C9A24D] focus:border-[#C9A24D] rounded-lg focus:ring-2 focus:ring-border-[#C9A24D] w-full">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium text-color-soft-white text-sm">Last Name</label>
                        <input type="text"
                            name="last_name"
                            value="<?= esc($user->last_name) ?>"
                            class="p-2 border color-soft-white border-[#C9A24D] focus:border-[#C9A24D] rounded-lg focus:ring-2 focus:ring-border-[#C9A24D] w-full">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium text-color-soft-white text-sm">Email Address</label>
                        <input type="email"
                            name="email"
                            value="<?= esc($user->email) ?>"
                            class="p-2 border color-soft-white border-[#C9A24D] focus:border-[#C9A24D] rounded-lg focus:ring-2 focus:ring-border-[#C9A24D] w-full">
                    </div>

                </div>

                <!-- Save Changes Button -->
                <div class="pt-4 w-full">
                    <button type="submit" class="bg-[#C9A24D] hover:bg-[#d8c292] shadow-md px-4 py-2 rounded w-full font-semibold text-white transition-all cursor-pointer">
                        Save Changes
                    </button>
                </div>
            </form>

            <!-- Delete Account Form -->
            <form action="<?= site_url('user/delete') ?>" method="post" class="mt-6 text-center">
                <button type="submit"
                    class="text-red-600 text-sm underline cursor-pointer"
                    onclick="return confirm('Are you sure you want to delete your account?')">
                    Delete Account
                </button>
            </form>

        </section>
    </main>

    <?= view('components/footer') ?>

</body>

</html>