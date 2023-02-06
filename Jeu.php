<?php
require('templates/header.php');
require_once('lib/jeuxData.php');






$pdo = new PDO('mysql:dbname=ratemygames;host=localhost;charset=utf8mb4', 'root', '');
$id = (int)$_GET['id'];

$jeux = getGamesByID($pdo, $id);


$receiveStatut = $pdo->prepare("SELECT * FROM jeu_jouable_vw WHERE Titre = :Titre;");
$receiveStatut->bindParam(':Titre', $jeux['Titre']);
$receiveStatut->execute();
$statut = $receiveStatut->fetch();

$receiveSupport = $pdo->prepare("SELECT * FROM jeu_support_vw WHERE Titre = :Titre;");
$receiveSupport->bindParam(':Titre', $jeux['Titre']);
$receiveSupport->execute();
$supports = $receiveSupport->fetchAll();

$receiveStyle = $pdo->prepare("SELECT * FROM jeu_style_vw WHERE Titre = :Titre;");
$receiveStyle->bindParam(':Titre', $jeux['Titre']);
$receiveStyle->execute();
$styles = $receiveStyle->fetchAll();

$receiveNbJoueur = $pdo->prepare("SELECT * FROM jeu_nombre_joueur_vw WHERE Titre = :Titre;");
$receiveNbJoueur->bindParam(':Titre', $jeux['Titre']);
$receiveNbJoueur->execute();
$nbJoueurs = $receiveNbJoueur->fetchAll();


if($jeux['Image'] === null){
    $imagePath = _ASSETS_IMG_PATH."default.jpg";
} else {
    $imagePath = _JEUX_IMG_PATH.$jeux['Image'];        
}




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
                        <p class="justify-center px-2 py-4 text-slate-50 text-2xl font-bold"><?= $statut['Statut'] ?> <!-- A changer en fonction de la disponibilité du jeu dans la table -->
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
                                    src="<?= $imagePath ?>">
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?= $imagePath ?>"> <!-- Remplacer 'image' par 'Image2' -->
                                </div>
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?= $imagePath ?>"><!-- Remplacer 'image' par 'Image3' -->
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?= $imagePath ?>"><!-- Remplacer 'image' par 'Image4' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?= $imagePath ?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg" 
                                    src="<?= $imagePath ?>"><!-- Remplacer 'image' par 'Image5' -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Fin Image Galery -->



               
                
            </div>

            <!-- Partie Droite -->

            <div class="w-full max-w-lg mx-auto mt-5 md:ml-auto md:mt-0 md:w-1/2 lg:py-12" style="height: 790px;">                    
                <img class="h-full w-full content-center rounded-md object-cover max-w-lg mx-auto object-cover" src="<?= $imagePath ?>" alt="<?= $jeux['Titre']?>">
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
    <div class="basis-1/6 py-4 mx-12 border-r border-lime-500 ">
        <div class="text-slate-50">
            <div class="py-2.5">
                        <?php foreach ($supports as $support) {
                            echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $support['nom_support'] . '</kbd>';
                        } ?>
            </div>
            <div class="py-2.5">
                        <?php 
                        if(empty($styles)) {
                            echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Aucun</kbd>';
                        } else {
                            foreach ($styles as $style) {
                        
                                // Trouver un moyen de mettre les pastilles à la ligne.
                                echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $style['style'] . '</kbd>';
                            }
                        } ?>
            </div>
            <div class="py-2.5">
                    <!-- Boucler pour afficher les nombres de joueurs -->
                    <?php 
                        if(empty($nbJoueurs)) {
                            echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">Non-Référencé</kbd>';
                        } else {
                            foreach ($nbJoueurs as $nbJoueur) {
                                echo '<kbd class="px-2 py-1.5 text-xl font-bold text-slate-50 bg-lime-500 border border-gray-200 rounded-lg">' . $nbJoueur['nom'] . '</kbd>';
                            } 
                        } ?>
                    
                    
                    
            </div>
        </div>
        
    </div>

    <div class="basis-2/6 border-r border-lime-500">
        <div class="py-12">
            <!--  --> 
            <?php 
                if(empty($jeux['score'])) {
                    echo '<p class="text-slate-50 text-2xl font-bold text-center">Ce jeu n\'a pas encore reçu de note</p>';
                } else {
                    echo '<p class="text-slate-50">Note : ' . $jeux['score'] . '</p>';    
                }
            ?>
        </div>
    </div>
    <div class="bg-red-100 basis-1/6">
    oui
    </div>
    <div class="basis-1/6"></div>

    
</div>


<?php
require('templates/footer.php');
?>

