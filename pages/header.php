<?php
session_start();
$username = $_SESSION['username'];
$logged = isset($username);
?>

<header>
  <nav class="hidden md:flex justify-center space-x-1 lg:space-x-3 text-white mb-10 py-2 font-bold items-center  ">
    <a href="#" class="px-1 lg:px-4">Home</a>
    <a href="#" class="px-1 lg:px-4">About</a>
    <a href="#" class="px-1 lg:px-4">Contact</a>
    <div class="flex px-5 space-x-2 lg:space-x-4 py-3 rounded-full shadow-md shadow-primary-light bg-white items-center text-black">
      <input type="text" placeholder="Search movies....." class="lg:pr-8 lg:mr-2 xl:pr-24 xl:mr-5 outline-none capitalize bg-white text-lg tracking-widest placeholder-primary-light" />
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <a href="#" class="px-1 lg:px-4">Movies</a>
    <a href="#" class="px-1 lg:px-4">Series</a>
    <?php
    if ($logged) { ?>
      <div class="relative group pb-1 text-center">
        <p><?= $username ?></p>
        <i class="fa-solid fa-user-circle"></i>
        <!-- <img src="1.jpeg" alt="Profile" class="w-10 h-10  rounded-full cursor-pointer object-cover"
            > -->

        <div class="hidden absolute hover:block group-hover:block left-1/2 mt-1 transform -translate-x-1/2  w-48 bg-white text-black rounded-lg shadow-lg z-50">
          <a href="#" class="block px-4 py-2 hover:bg-secondary hover:text-white">My Favourite</a>
          <a href="logout.php" class="block px-4 py-2 hover:bg-secondary hover:text-white">Logout</a>
        </div>
      </div>
    <?php } else { ?>
      <a href="login.php">
        <button class="px-4 py-2 rounded-md hover:bg-secondary hover:border-transparent outline-none border">
          Login/sign up
        </button>
      </a>
    <?php } ?>


  </nav>


  <!-- phone version -->
  <nav class="flex l md:hidden justify-around items-center bg-primary pb-3 text-white">
    <div class="flex justify-between items-center">
      <button class="text-secondary transition-colors duration-300 w-16 h-16 focus:outline-none relative" id="menuButton">
        <div class="menu block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <span aria-hidden="true" class="block absolute -translate-y-1.5 h-1 w-8 bg-current transform transition duration-500 ease-in-out" id="menuIcon1"></span>
          <span aria-hidden="true" class="block absolute h-1 w-8 bg-current transform transition duration-500 ease-in-out" id="menuIcon2"></span>
          <span aria-hidden="true" class="block absolute translate-y-1.5 h-1 w-8 bg-current  transform transition duration-500 ease-in-out" id="menuIcon3"></span>
        </div>
      </button>
    </div>
    <p class="text-2xl ">My Movies</p>
    <?php
    if ($logged) { ?>
      <div class="relative group pb-1 text-center">
        <p><?= $username ?></p>
        <i class="fa-solid fa-user-circle"></i>
        <!-- <img src="1.jpeg" alt="Profile" class="w-10 h-10  rounded-full cursor-pointer object-cover"
            > -->

        <div class="hidden absolute hover:block group-hover:block left-1/2 mt-1 transform -translate-x-1/2  w-48 bg-white text-black rounded-lg shadow-lg z-50">
          <a href="#" class="block px-4 py-2 hover:bg-secondary hover:text-white">My Favourite</a>
          <a href="logout.php" class="block px-4 py-2 hover:bg-secondary hover:text-white">Logout</a>
        </div>
      </div>
    <?php } else { ?>
      <a href="login.php">
        <button class="px-4 py-2 rounded-md hover:bg-secondary hover:border-transparent outline-none border">
          Login/sign up
        </button>
      </a>
    <?php } ?>

    <!-- <div class="flex px-3 py-3 rounded-full shadow-md shadow-primary-light bg-white items-center text-black">
      <input type="text" placeholder="Search movies....." class="outline-none capitalize bg-white text-lg tracking-widest placeholder-primary-light" />
      <i class="fa-solid fa-magnifying-glass"></i>
    </div> -->
  </nav>
  <div class="fixed hidden md:hidden top-0 w-[280px] right-0 text-white z-50 bg-primary shadow-2xl transition-all duration-500 ease-in-out" id="sidePanel">
    <div class="h-screen shadow-2xl uppercase relative" id="panelContent">
      <ul>
        <li><a href="#" class="block px-4 py-2 hover:bg-secondary hover:text-white">My Favourite</a></li>
        <li><a href="logout.php" class="block px-4 py-2 hover:bg-secondary hover:text-white">Logout</a></li>
      </ul>
    </div>
  </div>
</header>



<script>
  document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.getElementById('menuButton');
    const sidePanel = document.getElementById('sidePanel');
    const menuIcon1 = document.getElementById('menuIcon1');
    const menuIcon2 = document.getElementById('menuIcon2');
    const menuIcon3 = document.getElementById('menuIcon3');
    let isActive = false;

    menuButton.addEventListener('click', () => {
      isActive = !isActive;
      sidePanel.style.display = isActive ? 'block' : 'none';
      menuIcon1.classList.toggle('rotate-45');
      menuIcon1.classList.toggle('-translate-y-1.5');
      menuIcon2.classList.toggle('opacity-0');
      menuIcon3.classList.toggle('-rotate-45');
      menuIcon3.classList.toggle('translate-y-1.5');
    });

    document.addEventListener('click', (event) => {
      if (!menuButton.contains(event.target) && !sidePanel.contains(event.target)) {
        isActive = false;
        sidePanel.style.display = 'none';
        menuIcon1.classList.remove('rotate-45');
        menuIcon1.classList.add('-translate-y-1.5');
        menuIcon2.classList.remove('opacity-0');
        menuIcon3.classList.remove('-rotate-45');
        menuIcon3.classList.add('translate-y-1.5');
      }
    });
  });
  </script>


