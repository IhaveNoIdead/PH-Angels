<?php
$errors = $errors ?? [];
$old = $old ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<?= view('components/head', [
  'title' => 'Philippines Angels | Login'
]) ?>

<body class="flex flex-col items-center color-base-dark min-h-screen">

  <!-- Login Card -->
  <div class="color-light-dark shadow-lg mt-32 p-8 border border-[#C9A24D] rounded-xl w-full max-w-md">
    <h2 class="mb-6 font-bold text-color-gold text-3xl text-center">Login</h2>

    <form action="/loginPage" method="post" novalidate class="space-y-4">

      <!-- Email -->
      <div>
        <label for="email" class="block mb-1 font-semibold text-color-gold text-sm">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          autocomplete="email"
          value="<?= esc($old['email'] ?? '') ?>"
          placeholder="Enter your email"
          class="color-soft-white px-4 py-2 rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>

        <?php if (! empty($errors['email'])): ?>
          <p class="mt-2 text-red-600 text-sm"><?= esc($errors['email']) ?></p>
        <?php endif; ?>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block mb-1 font-semibold text-color-gold text-sm">Password</label>
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Enter your password"
          required
          class="color-soft-white px-4 py-2 rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black">

        <?php if (! empty($errors['password'])): ?>
          <p class="mt-2 text-red-600 text-sm"><?= esc($errors['password']) ?></p>
        <?php endif; ?>
      </div>

      <!-- Submit -->
      <button type="submit"
        class="bg-[#4A6FA5] hover:bg-[#C9A24D] py-2 rounded-lg w-full font-bold text-black transition duration-300 cursor-pointer">
        Login
      </button>
    </form>

    <!-- Links -->
    <p class="mt-4 text-color-gold text-sm text-center">
      Don’t have an account?
      <a href="/signupPage" class="hover:opacity-70 text-color-gold underline">Sign up</a>
    </p>

    <p class="mt-2 text-center">
      <a href="/" class="hover:opacity-70 text-color-gold underline">Back to Home</a>
    </p>
  </div>

  <script src="<?= base_url('js/toast.js') ?>"></script>
  <script>
    <?php if (session()->getFlashdata('success')): ?>
        toast("<?= session()->getFlashdata('success') ?>", "success");
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        toast("<?= session()->getFlashdata('error') ?>", "error");
    <?php endif; ?>
  </script>
</body>

</html>