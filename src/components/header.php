    <header
      class="px-5 md:px-9 py-3 md:py-[2rem] flex items-center justify-between">
      <div class="md:flex items-center gap-10 poppins-extrabold">
        <div class="">
          <p class="text-sm text-gray-500">Good Morning</p>
          <h1 class="text-xl text-gray-800"><?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?></h1>
        </div>
        <p class="text-sm text-gray-600"><?= date("F j, Y") ?></p>
      </div>
      <div class="hidden md:flex items-center gap-4">
        <img
          src="https://placehold.co/400"
          alt="User"
          class="size-14 rounded-full object-cover border" />
      </div>
    </header>