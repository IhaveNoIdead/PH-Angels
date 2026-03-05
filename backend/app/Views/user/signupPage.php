<?php
$errors = $errors ?? [];
$old = $old ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<?= view('components/head', [
  'title' => 'Philippines Angels | Sign Up'
]) ?>

<body class="flex flex-col items-center color-base-dark min-h-screen">

  <!-- Signup Card -->
  <div class="color-light-dark shadow-lg mt-32 p-8 border border-[#C9A24D] rounded-xl w-full max-w-md">

    <h2 class="mb-6 font-bold text-[#C9A24D] text-3xl text-center">Create an Account</h2>

    <form action="/signupPage" method="post" novalidate class="space-y-4">

      <!-- First Name -->
      <div>
        <label class="block mb-1 font-semibold text-[#C9A24D] text-sm">First Name</label>
        <input
          type="text"
          name="first_name"
          value="<?= esc($old['first_name'] ?? '') ?>"
          placeholder="Enter your first name"
          class="color-soft-white px-4 py-2 border border-[#C9A24D] rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>
      </div>

      <!-- Last Name -->
      <div>
        <label class="block mb-1 font-semibold text-[#C9A24D] text-sm">Last Name</label>
        <input
          type="text"
          name="last_name"
          value="<?= esc($old['last_name'] ?? '') ?>"
          placeholder="Enter your last name"
          class="color-soft-white px-4 py-2 border border-[#C9A24D] rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>
      </div>

      <!-- Email -->
      <div>
        <label class="block mb-1 font-semibold text-[#C9A24D] text-sm">Email</label>
        <input
          type="email"
          name="email"
          autocomplete="email"
          value="<?= esc($old['email'] ?? '') ?>"
          placeholder="Enter your email"
          class="color-soft-white px-4 py-2 border border-[#C9A24D] rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>
      </div>

      <!-- Password -->
      <div>
        <label class="block mb-1 font-semibold text-[#C9A24D] text-sm">Password</label>
        <input
          type="password"
          name="password"
          placeholder="Create a password"
          class="color-soft-white px-4 py-2 border border-[#C9A24D] rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>
      </div>

      <!-- Confirm Password -->
      <div>
        <label class="block mb-1 font-semibold text-[#C9A24D] text-sm">Confirm Password</label>
        <input
          type="password"
          name="confirm_password"
          placeholder="Confirm your password"
          class="color-soft-white px-4 py-2 border border-[#C9A24D] rounded-lg focus:outline-none focus:ring-[#4A6FA5] focus:ring-2 w-full text-black"
          required>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="bg-[#4A6FA5] hover:bg-[#C9A24D] py-2 rounded-lg w-full font-bold text-black transition duration-300 cursor-pointer">
        Sign Up
      </button>
    </form>

    <!-- Links -->
    <p class="mt-4 text-[#C9A24D] text-sm text-center">
      Already have an account?
      <a href="/loginPage" class="hover:opacity-70 text-[#C9A24D] underline">Login</a>
    </p>

    <p class="mt-2 text-center">
      <a href="/" class="hover:opacity-70 text-[#C9A24D] underline">Back to Home</a>
    </p>

  </div>

</body>

</html>