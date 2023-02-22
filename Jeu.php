<?php
require('templates/header.php');
require_once('lib/jeuxData.php');


$id = (int)$_GET['id'];

$jeux = getGamesByID($pdo, $id);
$statut = addGameStatut($pdo, $jeux);
$supports = addGameSupport($pdo, $jeux);
$styles = addGameStyle($pdo, $jeux);
$nbJoueurs = addGameNbJoueur($pdo, $jeux);
$moteur = addGameMoteur($pdo, $jeux);
$image = addGameImg($pdo, $jeux);





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
                <!-- Début image Galery -->

                <div id="default-carousel" class="relative py-8" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <?php
                        foreach ($image as $img) { ?>
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" src="<?= getGameImg($img['nom_image']) ?>">
                            </div>
                        <?php } ?>

                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>


                <!-- Fin image Galery -->





            </div>

            <!-- Partie Droite -->

            <div class="w-full max-w-lg mx-auto mt-5 md:ml-auto md:mt-0 md:w-1/2 lg:py-12" style="height: 790px;">
                <img class="h-full w-full content-center rounded-md object-cover max-w-lg mx-auto object-cover" src="<?= getGameImg($jeux['image']); ?>" alt="<?= $jeux['Titre'] ?>">
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
                <?php
                if (!isset($supports)) {
                    echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Aucun</kbd>';
                } else {
                    foreach ($supports as $support) {
                        echo '<kbd class="mx-0.5 px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $support['nom_support'] . '</kbd>';
                    }
                } ?>


            </div>
            <div class="py-2.5">
                <?php
                if (!isset($styles)) {
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
                if (empty($nbJoueurs[0]['nom_nombre_joueur'])) {
                    echo '<kbd class="px-2 py-1.5 text-base font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Non-Référencé</kbd>';
                } else {
                    foreach ($nbJoueurs as $nbJoueur) {
                        echo '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $nbJoueur['nom_nombre_joueur'] . '</kbd>';
                    }
                } ?>



            </div>
        </div>

    </div>

    <div class="basis-2/6 border-r border-lime-500">
        <div class="py-12">
            <!--  -->
            <?php
            if (empty($jeux['score'])) {
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
            if (empty($jeux['date_creation'])) {
                echo '<p class="text-slate-50 mx-2 font-bold">Date estimée de fin: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $jeux['date_estimee_fin'] . '</kbd>' . '</p>';
            } else {
                echo '<p class="text-slate-50 font-bold">Date de création: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $jeux['date_creation'] . '</kbd>' . '</p>';
            }
            ?>
        </div>

        <!-- Dernière Mise à Jour -->

        <div class="mx-2 py-2">
            <?php
            if (empty($jeux['date_last_maj'])) {
                echo '<p class="text-slate-50 font-bold">Dernière mise à jour: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . ' Doucement bijou ' . '</kbd>' . '</p>';
            } else {
                echo '<p class="text-slate-50 font-bold">Dernière mise à jour: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $jeux['date_last_maj'] . '</kbd>' . '</p>';
            }
            ?>
        </div>

        <!-- Moteur -->

        <div class="mx-2 py-2">
            <?php
            if (empty($jeux['id_moteur'])) {
                echo '<p class="text-slate-50 mx-2 font-bold">Moteur: ' . '<kbd class="mx-0.5 px-2 py-1.5 text-sm font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . ' On se tâte encore ' . '</kbd>' . '</p>';
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