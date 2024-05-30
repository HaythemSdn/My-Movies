<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $GLOBALS['CSS_DIR'] ?>style.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Film page</title>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "black",
            secondary: "red",
            "primary-light": "rgb(163 163 163)",

          }
        }
      }
    }
  </script>
</head>

<body class="bg-primary">
  <!-- <header>
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

      <a href="#">
        <button class="px-4 py-2 rounded-md hover:bg-secondary hover:border-transparent outline-none border">
          Login/sign up
        </button>
      </a>
    </nav>
  </header> -->

  <body>


    <div class="w-full 2xl:w-9/12  xl:10/12 mx-auto space-y-4 flex flex-col justify-center items-center">

      <!-- video trailer -->
      <p class="lg:text-4xl md:text-3xl text-2xl uppercase text-white">Trailer</p>
      <section class=" relative rounded-sm border-2 border-secondary ">
        <iframe class="2xl:h-[480px] 2xl:w-[900px] w-[400px] h-[250px] md:w-[700px] md:h-[400px]" src="https://www.youtube.com/embed/KPLWWIOCOOQ" frameborder="0"
          allowfullscreen></iframe>
      </section>

      <!-- movie details -->
      <section class="flex flex-col lg:flex-row justify-center items-center w-full p-10">
        <!-- movie poster -->
        <div class="lg:w-1/3  h-full rounded-sm">
          <img src="1.jpeg" alt="movie poster" class="rounded-lg object-cover object-center h-96" />
        </div>
        <!-- movie details -->
        <div class="flex flex-col lg:w-2/3 space-y-4 lg:mx-8">
          <div class="flex py-4 lg:p-0 justify-between items-center">
            <p class="text-3xl text-white">Movie title</p>
            <span class="px-3 py-2 bg-secondary text-white cursor-pointer hover:animate-pulse rounded-md ">Add
              to Favourites
              <i class="fas fa-plus ml-3 text-white"></i>
            </span>
          </div>
          <div class="flex space-x-4 items-center text-white">
            <div class="tags flex space-x-3 font-bold text-primary">
              <span class="tag bg-white px-2 py-1 rounded-lg ">Action</span>
              <span class="tag bg-white px-2 py-1 rounded-lg">Adventure</span>
            </div>
            <div class="date">
              <i class="fas fa-calendar mr-1"></i>
              <span>2021</span>
            </div>
            <div class="time">
              <i class="fas fa-clock mr-1"></i>
              <span>2h 30m</span>
            </div>
            <div class="rating">
              <i class="fas fa-star mr-1"></i>
              <span>8.5</span>
            </div>

          </div>
          <div class="description w-full">
            <p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae quisquam esse
              omnis inventore, tenetur exercitationem ducimus. Temporibus eligendi dolores, quibusdam adipisci iste quis
              facilis, ipsam pariatur nulla sint veritatis aperiam voluptate saepe dolor molestias esse labore ad!
              Accusamus delectus saepe veritatis praesentium odit necessitatibus atque distinctio incidunt ad, officia
              quod quas asperiores inventore cum excepturi perspiciatis doloribus fugit ipsa suscipit odio iure eius
              maxime? Accusantium nam in, libero ad id perspiciatis dolorum et expedita ratione! Laudantium, voluptatem
              error praesentium obcaecati at repellendus, natus perferendis corporis soluta numquam itaque rerum
              dignissimos repellat accusamus exercitationem quam corrupti quaerat modi eligendi eaque. Placeat.</p>
          </div>
          <!-- other details -->
          <div class="flex flex-wrap justify-around items-center text-white font-bold ">
            <p>Country : <span class="font-normal country">United state</span></p>
            <p>Genre : <span class="font-normal genre">Action , comedy</span></p>
            <p>Release date : <span class="font-normal release-date">2021</span></p>
            <p>Production : <span class="font-normal production">AMC studio</span></p>
          </div>


        </div>
      </section>

      <!-- cast -->
      <section class="w-full text-white ">
        <div class="flex flex-col justify-center items-center w-10/12  mx-auto relative uppercase px-1">
          <p class="lg:text-4xl md:text-3xl text-2xl tracking-widest font-normal mb-16">
            Actors
          </p>
          <div class="custom-scrollbar pb-5 flex w-full  space-x-6 overflow-x-auto flex-nowrap">
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>
            <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
              <img src="1.jpeg" alt="" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
              <p class="actor-name">Idward Chwin</p>
            </div>

          </div>
        </div>

    </div>
    </section>
   
  </body>

</html>