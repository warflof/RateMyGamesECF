<?php
require('templates/header.php');
require_once('lib/jeuxData.php');

$id = $_GET['id'];



?>

<main class="py-8">
    <div class="container mx-auto px-2">
        <div class="md:flex">
            <div class="w-full h-full md:w-1/2">
            <div class="pt-12">
                <h3 class="text-3xl text-center mb-2 font-bold uppercase lg:text-5xl text-slate-50"><?= $jeux[$id]['name'] ?></h3>
                <div class="mt-8 text-center">
                    <label class="text-1xl text-slate-50 ">
                        Developper par GameSoft
                    </label>
                    <div class="mx-auto w-1/3 px-auto border-2 rounded border-lime-500 my-2">
                        <p class="justify-center px-2 py-4 text-slate-50 text-2xl font-bold">Jouable</p> <!-- A changer en fonction de la disponibilité du jeu dans la table -->
                    </div>

                </div>
            </div>
                <!-- Début Image Galery -->

                <section class="overflow-hidden text-gray-700">
                    <div class="container px-5 py-2 mx-auto lg:pt-24 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>">
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>"> <!-- Remplacer 'image' par 'Image2' -->
                                </div>
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>"><!-- Remplacer 'image' par 'Image3' -->
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>"><!-- Remplacer 'image' par 'Image4' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Fin Image Galery -->



               
                <div class="mt-16 mx-auto w-full content-center">
                    <h3 class="text-gray-600 text-2xl font-medium py-12"><?= $jeux[$id]['description'] ?></h3>
                </div>
            </div>

            <!-- Partie Droite -->

            <div class="w-full max-w-lg mx-auto mt-5 md:ml-auto md:mt-0 md:w-1/2 lg:py-12" style="height: 790px;">                    
                <img class="h-full w-full content-center rounded-md object-cover max-w-lg mx-auto object-cover" src="img/FrontImgGame/<?= $jeux[$id]['image'] ?>" alt="Photo of Boy Onesies">
            </div>
        </div>

    </div>
</main>

<div class="bg-gray-700 w-full h-48">
    <!-- Mettre dans cette div : 

            - Studio
            - Supports
            - Style
            - Score
            - Release Date || Date de créa
            - Dernière Maj
            - Moteur : Unreal || Unity || etc.
            - nb de joueurs
    -->

    
</div>


<?php
require('templates/footer.php');
?>