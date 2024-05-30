<?php
session_start();
$logged = isset($_SESSION['nickname']) ;
?>

<header>
    <nav class="flex justify-center space-x-3 text-white py-3 font-bold items-center">
      <a href="#" class="px-4">Home</a>
      <a href="#" class="px-4">About</a>
      <a href="#" class="px-4">Contact</a>
      <div
        class="flex px-5 space-x-4 py-3 rounded-full shadow-md shadow-primary-light bg-white items-center text-black">
        <input type="text" placeholder="Search movies....."
          class="lg:pr-8 lg:mr-2 xl:pr-24 xl:mr-5 outline-none capitalize bg-white text-lg tracking-widest placeholder-primary-light" />
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
      <a href="#" class="px-4">Movies</a>
      <a href="#" class="px-4">Series</a>
      <?php
      if ($logged) {?>
      <a href="logout.php">
        <button class="px-4 py-2 rounded-md hover:bg-secondary hover:border-transparent outline-none border">
          Logout
        </button>
      </a>
      <?php } else { ?>
      <a href="login.php">
        <button class="px-4 py-2 rounded-md hover:bg-secondary hover:border-transparent outline-none border">
          Login/sign up
        </button>
      </a>
      <?php }?>


    </nav>
  </header>