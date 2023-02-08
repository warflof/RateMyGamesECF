<?php
require('templates/header.php');
require_once('lib/jeuxData.php');


$id = (int)$_GET['id'];

$jeux = getGamesByID($pdo, $id);
$statut = addGameStatut($pdo, $jeux);
$supports = addGameSupport($pdo, $jeux);
$styles = addGameStyle($pdo, $jeux);
//$nbJoueurs = addGameNbJoueur($pdo, $jeux);
$moteur = addGameMoteur($pdo, $jeux);








?>

<main class="py-8">
    <div class="container mx-auto px-2">
        <div class="md:flex">
            <div class="w-full h-full md:w-1/2">
            <div class="pt-12">
                <h3 class="text-3xl text-center mb-2 font-bold uppercase lg:text-5xl text-slate-50"><?= $jeux['Titre'] ?></h3>
                <div class="mt-8 text-center">
                    <label class="text-1xl text-slate-50 ">
                        Developper par GameSoft
                    </label>
                    <div class="mx-auto w-1/3 px-auto border-2 rounded border-lime-500 my-2">
                        <p class="justify-center px-2 py-4 text-slate-50 text-2xl font-bold"><?= $statut['Statut'] ?> </p>
                    </div>

                </div>
            </div>
                <!-- Début Image Galery -->

                <section class="overflow-hidden text-gray-700">
                    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']); ?>">
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']); ?>"> <!-- Remplacer 'image' par 'Image2' -->
                                </div>
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']); ?>"><!-- Remplacer 'image' par 'Image3' -->
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']); ?>"><!-- Remplacer 'image' par 'Image4' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']); ?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?=getGameImg($jeux['Image']);?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Fin Image Galery -->



               
                
            </div>

            <!-- Partie Droite -->

            <div class="w-full max-w-lg mx-auto mt-5 md:ml-auto md:mt-0 md:w-1/2 lg:py-12" style="height: 790px;">                    
                <img class="h-full w-full content-center rounded-md object-cover max-w-lg mx-auto object-cover" src="<?=getGameImg($jeux['Image']); ?>" alt="<?= $jeux['Titre']?>">
            </div>
        </div>

    </div>
</main>

                <div class="my-16 mx-48 px-48 content-center md:my-4 mx-24">
                    <h3 class="text-slate-50 text-2xl font-medium py-12"><?= $jeux['Description'] ?></h3>
                </div>

<div class="bg-gray-700 w-full h-48 flex flex-row border-y-2 border-lime-500 py-2">
    <!-- Mettre dans cette div : 
            - Supports
            - Style
            - Score
            - Release Date || Date de créa
            - Dernière Maj
            - Moteur : Unreal || Unity || etc.
            - nb de joueurs
    -->
    <div class="basis-1/6"></div>
    <div class="basis-1/6 py-4 px-2 border-r border-lime-500  ">
        <div class="text-slate-50">
            <div class="py-2.5">
                        <?php foreach ($supports as $support) {
                            echo '<kbd class="mx-0.5 px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg shrink">' . $support['nom_support'] . '</kbd>';
                        } ?>
            </div>
            <div class="py-2.5">
                        <?php 
                        if(empty($styles)) {
                            echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Aucun</kbd>';
                        } else {
                            foreach ($styles as $style) {
                        
                                // Trouver un moyen de mettre les pastilles à la ligne.
                                echo '<kbd class="mx-0.5 px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $style['style'] . '</kbd>';
                            }
                        } ?>
            </div>
            <div class="py-2.5">
                    <!-- Boucler pour afficher les nombres de joueurs -->
                    
                    <?php 
                        // if(empty($jeux['nombre_joueur_id'])) {
                        //     echo '<kbd class="px-2 py-1.5 text-base font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Non-Référencé</kbd>';
                        // } else {
                        //     foreach ($nbJoueurs as $nbJoueur) {
                        //         echo '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $nbJoueur['nom'] . '</kbd>';
                        //     } 
                        // } ?>
                    
                    
                    
            </div>
        </div>
        
    </div>

    <div class="basis-2/6 border-r border-lime-500">
        <div class="py-12">
            <!--  --> 
            <?php 
                if(empty($jeux['score'])) {
                    echo '<p class="text-slate-50 text-2xl font-bold text-center flex flex-wrap justify-around">Ce jeu n\'a pas encore reçu de note</p>';
                } else {
                    echo '<p class="text-slate-50">Note : ' . $jeux['score'] . '</p>';    
                }
            ?>
        </div>
    </div>

            <!-- Date De Création -->

        <div class="basis-2/6 mx-0.5 my-auto">
            <div class="mx-2 py-2">
                <?php
                    if(empty($jeux['date_creation'])) {
                        echo '<p class="text-slate-50 mx-2 font-bold">Date estimée de fin: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">'.$jeux['date_estimee_fin'] .'</kbd>' . '</p>';    
                    } else {
                            echo '<p class="text-slate-50 font-bold">Date de création: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $jeux['date_creation'] . '</kbd>' . '</p>';    
                        }
                ?>
            </div>

                <!-- Dernière Mise à Jour -->

            <div class="mx-2 py-2">
            <?php
                    if(empty($jeux['date_last_maj'])) {
                        echo '<p class="text-slate-50 font-bold">Dernière mise à jour: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">'.' Doucement bijou '.'</kbd>' . '</p>';    
                    } else {
                            echo '<p class="text-slate-50 font-bold">Dernière mise à jour: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $jeux['date_last_maj'] . '</kbd>' . '</p>';    
                        }
            ?>
            </div>

                <!-- Moteur -->

            <div class="mx-2 py-2">
            <?php
                    if(empty($jeux['id_moteur'])) {
                        echo '<p class="text-slate-50 mx-2 font-bold">Moteur: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">'.' On se tâte encore '.'</kbd>' . '</p>';    
                    } else {
                            echo '<p class="text-slate-50 font-bold">Moteur: ' . 
                                    '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . 
                                        $moteur[0]['moteur_nom'] .
                                    '</kbd>' .
                                 '</p>';    
                        }
            ?>
            </div>
        </div>
    

    
</div>


<?php
require('templates/footer.php');
?>

