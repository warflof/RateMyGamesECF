 <?php 
    require ('../../templates/header.php');
  ?>



<!-- ########### FIRST SECTION ###########-->

    <div id="carouselFrontPage mt-16">
        
      <div class=" mx-auto px-32 pt-8 pb-8 bg-black/[.8] ">
          
          <!-- FIRST SECTION -->

          <div class="grid grid-cols-3 mb-16">

            <!-- CAROUSEL ACTU -->
            <div class="col-span-2">
              <h2 class="text-slate-50 text-5xl text-center mb-8">Actualités</h2>

              <div id="animation-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                     <!-- Item 1 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="../../img/FrontImgGame/A_Plague_Tale_Requiem.gif" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="../../img/FrontImgGame/Horizon_Forbiden_West.gif" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="../../img/FrontImgGame/New_World.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="../../img/FrontImgGame/Star_Wars_Battlefront_II.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="../../img/FrontImgGame/World_of_warcraft_DragonFlight.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
              </div>
            </div>
            <!-- QUI SOMMES-NOUS -->
            <div class="col-span-1">
              <h2 class="text-slate-50 text-5xl text-center mb-8">Qui sommes-nous</h2>
              <div class="px-8 pb-8 text-slate-50 text-justify">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
            </div>
          </div>
         
            <hr class="border-lime-500">
            
      <h2 class="text-5xl text-slate-50 text-center text mt-16 mb-16 underline decoration-lime-500">Découvrez nos jeux</h2>
                
           
                <!-- CAROUSEL -->
          <div class="carousel px-16 pt-16 mb-8 mt-8">
                                
              <figure>
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/EbuaKnSm8Zw/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/kG38b7CFzTY/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/nvzvOPQW0gc/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/2lYHiNtjSwg/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/CjS3QsRuxnE/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/xxeAftHHq6E/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/bjhrzvzZeq4/800x533" alt="">
                <img class="imgCarouselFrontPage" src="https://source.unsplash.com/7mUXaBBrhoA/800x533" alt="">
              </figure>
              
              <nav>
                <button class="nav prev hover:ring-2 focus:ring-4 ring-lime-500"> < </button>
                <button class="nav next hover:ring-2 focus:ring-4 ring-lime-500"> > </button>
              </nav>

           </div>
                
      </div>
                    <!-- FIN CAROUSEL--> 
    </div>
  



    <script src="../../js/carousel.js"></script>

<!-- FOOTER -->
<?php require ('../../templates/footer.php'); ?>

