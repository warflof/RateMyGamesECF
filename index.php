<!DOCTYPE html>
<html lang="fr">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/tailwindconfig.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <title>Document</title>
</head>
<body>
    <!-- ########## NAVBAR #############-->
    
  <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      
      <a href="#" class="flex items-center">
        <img src="img/logoSMsizePad.png" class="h-6 mr-3 sm:h-9" alt="RateMyGames Logo" />
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
            RateMyGames
          </span>
        <span class="text-slate-50 ml-2">by GameSoft</span>
      </a>


    <div class="flex items-center md:order-2">
      
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Ouvrir Menu Utilisateur</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
      </button>
      
        <!-- ####################################### DROPDOWN MENU ####################################### -->


        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">User Name</span>
            <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">users@mail.com</span>
          </div>

          <ul class="py-1" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-500 dark:hover:bg-lime-500 dark:text-gray-200 dark:hover:text-white">
                Tableau de bord
              </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-lime-500 dark:text-gray-200 dark:hover:text-white">
                Paramètres
              </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-lime-500 dark:text-gray-200 dark:hover:text-white">
                Mes Jeux
              </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-lime-500 dark:text-gray-200 dark:hover:text-white">
                Déconnexion
              </a>
            </li>
          </ul>
        </div>
        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-lime-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <!-- ################################# MENU #################################### -->

      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-white bg-lime-500 rounded md:bg-transparent md:text-lime-500 md:p-0 dark:text-white" aria-current="page">
              Accueil
            </a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
              A propos
            </a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
              Nos Jeux
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
    
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
                        <img src="img/FrontImgGame/A_Plague_Tale_Requiem.gif" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="img/FrontImgGame/Horizon_Forbiden_West.gif" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="img/FrontImgGame/New_World.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="img/FrontImgGame/Star_Wars_Battlefront_II.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                        <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black">A Plague Tale Requiem : Élu jeu de l'année pour une baisse de morale !</p>
                        <img src="img/FrontImgGame/World_of_warcraft_DragonFlight.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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
  





<!-- FOOTER -->


<footer class="bg-white dark:bg-gray-900">
  <div class="grid grid-cols-2 gap-8 px-6 py-8 md:grid-cols-4">
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">GameSoft</h2>
          <ul class="text-gray-500 dark:text-gray-400">
              <li class="mb-4">
                  <a href="#" class=" hover:underline">A propos</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Nos jeux</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Connexion</a>
              </li>
          </ul>
      </div>
      <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Aide</h2>
          <ul class="text-gray-500 dark:text-gray-400">
              <li class="mb-4">
                  <a href="#" class="hover:underline">Serveur Discord</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Twitter</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Facebook</a>
              </li>
              <li class="mb-4">
                  <a href="#" class="hover:underline">Contact</a>
              </li>
          </ul>
      </div>
     
  </div>
  <div class="px-4 py-6 bg-gray-100 dark:bg-gray-700 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="#">GameSoft™</a>. All Rights Reserved.
      </span>
      <div class="flex mt-4 space-x-6 sm:justify-center md:mt-0">
          <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Facebook</span>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Instagram</span>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
              <span class="sr-only">Twitter</span>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
              <span class="sr-only">GitHub</span>
          </a>
      </div>
  </div>
</footer>

    
    

</body>
<script src="js/carousel.js"></script>
<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
</html>