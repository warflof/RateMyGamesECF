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
      <a href="login.php">
        <button class="text-slate-50 mx-2 border-2 border-lime-500 rounded-lg py-2 px-2 bg-gray-800">Se connecter</button>
      </a>
      <a href="inscription.php">
        <button class="text-slate-50 mx-2 border-2 border-lime-500 rounded-lg py-2 px-2 bg-gray-800">Créer un compte</button>
      </a>

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