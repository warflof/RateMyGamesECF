<?php
require_once('lib/config.php');
require_once('lib/pdo.php');

$currentPage = basename($_SERVER['SCRIPT_NAME']);



?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="tailwind.js"></script>

    <title>Document</title>
</head>
<body>
    <!-- ########## NAVBAR ############# TEST --> 
    
  <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      
      <a href="Index.php" class="flex items-center">
        <img src="img/logoSMsizePad.png" class="h-6 mr-3 sm:h-9" alt="RateMyGames Logo" />
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
            RateMyGames
          </span>
        <span class="text-slate-50 ml-2">by GameSoft</span>
      </a>


    <div class="flex items-center md:order-2">
        <!-- ####################################### DROPDOWN MENU ####################################### -->
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
      </button>

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
          <li class="<?php if($currentPage === 'index.php') {echo 'bg-lime-500 py-1 px-4 rounded';} ?>">
            <a href="index.php" class="block py-2 pl-3 pr-4 text-slate-500 rounded md:bg-transparent md:text-slate-50 md:p-0 dark:text-white">
              Accueil
            </a>
          </li>
          <li class="<?php if($currentPage === 'About.php') {echo 'bg-lime-500 py-1 px-2 mx-2 rounded';} ?>">
            <a href="#" class="block py-2 pl-3 pr-4 text-slate-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-slate-50 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
              A propos
            </a>
          </li>
          <li class="<?php if($currentPage === 'Produits.php') {echo 'bg-lime-500 py-1 px-4 rounded';} ?>">
            <p id="dropdownProduits" data-dropdown-toggle="dropdownGames" class="text-center inline-flex block py-2 pl-3 pr-4 text-slate-50 rounded hover:bg-slate-50 md:hover:bg-transparent md:hover:text-slate-50 md:p-0 dark:text-slate-50 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Nos Jeux  
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
              
              <div id="dropdownGames" class="z-10 hidden bg-gray-700 divide-y divide-gray-100 rounded-lg w-42 shadow dark:dark-gray-700 dark:divide-gray-600">
                <ul class="px-4 py-3 text-sm text-slate-50 dark:text-dark">
                  <div class="py-2">
                    <a href="Produits.php" class="py-2 px-4">Tous les jeux</a>
                  </div>
                  <div class="py-2">
                    <a href="Jeu.php?id=1" class="py-2 px-4">Juste un jeux</a>
                  </div>
                  <div class="py-2">
                    <a href="ajout_modification_jeu.php" class="py-2 px-4">Ajout / Modif Jeu</a>
                  </div>
                </ul>
              </div>
            </p>
          </li>

          <li class="<?php if($currentPage === 'modifJeu.php') {echo 'bg-lime-500 py-1 px-2 mx-2 rounded';} ?>">
            <a href="modifJeu.php" class="block py-2 pl-3 pr-4 text-slate-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-500 md:p-0 dark:text-slate-50 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
              Ajouter / Modifier un jeu
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="bg-black/[.8]">