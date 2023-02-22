<?php
require_once('templates/header.php');
require_once('lib/jeuxData.php');
require_once('lib/tools.php');


$id = (int)$_GET['id'];

$jeux = getGamesByID($pdo, $id);
$statuts = addGameStatut($pdo, $jeux);
$supports = addGameSupport($pdo, $jeux);
$styles = addGameStyle($pdo, $jeux);
$nbJoueurs = addGameNbJoueur($pdo, $jeux);
$moteurs = addGameMoteur($pdo, $jeux);
$images = addGameImg($pdo, $jeux);


// if (isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'][0])) {
//     // prépare la requête d'insertion
//     $stmt = $pdo->prepare('INSERT INTO image (jeu_id, nom_image) VALUES (:jeu_id, :name)');

//     // boucle sur chaque fichier téléchargé
//     foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
//         $fileName = NULL;
//         // la méthode getimagesize va retourner false si le fichier n'est pas une image
//         $checkImage = getimagesize($tmp_name);
//         if ($checkImage !== false) {
//             // on génère un nom unique et standardisé pour l'image
//             $fileName = uniqid() . '-' . slugify($_FILES['image']['name'][$key]);

//             move_uploaded_file($tmp_name, _JEUX_IMG_PATH . $fileName);

//             // insère les informations de l'image dans la table images
//             $stmt->execute([
//                 'id' => $jeu_id,
//                 'nom_image' => $_FILES['image']['name'][$key]
//             ]);
//         } else {
//             echo $errors[] = 'Le fichier ' . $_FILES['image']['name'][$key] . ' n\'est pas une image';
//         }
//     }
// }

if (isset($_POST['modifyGame'])) {

    // if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
    //     $fileName = NULL;
    //     // la méthode getimagesize va retourner false si le fichier n'est pas une image
    //     $checkImage = getimagesize($_FILES['file']['tmp_name']);
    //     if ($checkImage !== false) {
    //         // on génère un nom unique et standardisé pour l'image
    //         $fileName = uniqid() . '-' . slugify($_FILES['file']['name']);

    //         move_uploaded_file($_FILES['file']['tmp_name'], _JEUX_IMG_PATH . $fileName);
    //     } else {
    //         echo '<div class="w-96 mx-auto py-4"><div class="text-slate-50 text-center text-2xl py-8 border-2 border-solid rounded-md">Le fichier n\'est pas une image</div></div>';
    //     }
    // }


    $fileName = NULL;

    // Vérifie si une seule image a été uploadée
    if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagesize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // on génère un nom unique et standardisé pour l'image
            $fileName = uniqid() . '-' . slugify($_FILES['file']['name']);

            move_uploaded_file($_FILES['file']['tmp_name'], _JEUX_IMG_PATH . $fileName);
        } else {
            echo '<div class="w-96 mx-auto py-4"><div class="text-slate-50 text-center text-2xl py-8 border-2 border-solid rounded-md">Le fichier n\'est pas une image</div></div>';
        }
    }

    // Vérifie si plusieurs images ont été uploadées
    if (isset($_FILES['imageAdditional']['tmp_name']) && !empty($_FILES['imageAdditional']['tmp_name'][0])) {
        // prépare la requête d'insertion
        $stmt = $pdo->prepare('INSERT INTO image (jeu_id, nom_image) VALUES (:jeu_id, :name)');

        // boucle sur chaque fichier téléchargé
        foreach ($_FILES['imageAdditional']['tmp_name'] as $key => $tmp_name) {
            // la méthode getimagesize va retourner false si le fichier n'est pas une image
            $checkImage = getimagesize($tmp_name);
            if ($checkImage !== false) {
                // on génère un nom unique et standardisé pour l'image
                $multipleFileName = uniqid() . '-' . slugify($_FILES['imageAdditional']['name'][$key]);

                move_uploaded_file($tmp_name, _JEUX_IMG_PATH . $multipleFileName);

                // insère les informations de l'image dans la table images
                $stmt->execute([
                    'jeu_id' => $id,
                    'name' => $multipleFileName
                ]);
            } else {
                echo $errors[] = 'Le fichier ' . $_FILES['imageAdditional']['name'][$key] . ' n\'est pas une image';
            }
        }
    };



    $res = updateGame(
        $pdo,
        $id,
        $_POST['Titre'],
        $_POST['Description'],
        $_POST['jouable'],
        $_POST['id_moteur'],
        $_POST['date_estimee_fin'],
        $_POST['budget']
    );
    $res2 = updateGameSupport($pdo, $id, $_POST['support']);
    $res3 = updateGameStyle($pdo, $id, $_POST['style']);
    $res4 = updateGameNombreJoueur($pdo, $id, $_POST['id_nombre_joueur']);
    $res5 = updateGameImage($pdo, $id, $fileName);

    echo "<script>location.href = location.href;</script>";
}


?>


<div class="container mx-auto px-32 py-6 pt-8 flex flex-col">

    <h1 class="text-5xl text-slate-50 text-center py-6">Modification de <br /><?= $jeux['Titre'] ?></h1>

    <form method="POST" enctype="multipart/form-data" action="Modification_jeu.php?id=<?= $jeux['ID'] ?>">

        <!-- Titre -->

        <div class="py-3 px-8 mx-8">
            <label for="Titre"><span class="text-slate-50">Nom du jeu: </span></label>
            <input class="w-full rounded" type="text" name="Titre" id="Titre" value="<?= $jeux['Titre'] ?>">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Titre'])) {
                echo '<div class="text-red-500">Veuillez renseigner un Titre</div>';
            }
            ?>
        </div>

        <!-- Description -->

        <div class="py-3 px-8 mx-8">
            <label for="Description"><span class="text-slate-50">Description: </span></label>
            <textarea class="w-full h-32 rounded" type="Description" name="Description" id="Description"><?= $jeux['Description'] ?></textarea>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Description'])) {
                echo '<div class="text-red-500">Veuillez renseigner une description</div>';
            }
            ?>
        </div>

        <!-- Style -->

        <div class="py-3 px-8 mx-8">
            <label for="style"><span class="text-slate-50">Style: </span></label>

            <!-- foreach($jeux['ID']) {
                echo '<select></select>';
            } -->

            <select class="w-full rounded" type="input" name="style" id="style">
                <?php
                if (empty($styles[0]['style'])) {
                    echo '<option value="">Aucun style</option>';
                } else {
                    echo '<option value="' . intval($styles[0]['id_style']) . '">' . $styles[0]['style'] . '</option>';
                }
                ?>
                <?php
                $stylesInBase = getGameStyle($pdo);
                foreach ($stylesInBase as $styleInBase) {
                    echo '<option value="' . intval($styleInBase['id_style']) . '">' . $styleInBase['style'] . '</option>';
                }
                ?>
            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['style'])) {
                echo '<div class="text-red-500">Veuillez renseigner au moins un style</div>';
            }
            ?>
        </div>

        <!-- Support -->

        <div class="py-3 px-8 mx-8">
            <label for="support"><span class="text-slate-50">support: </span></label>
            <select class="w-full rounded" type="input" name="support" id="support">
                <?php
                if (empty($supports[0]['nom_support'])) {
                    echo '<option value="0">Aucun support</option>';
                } else {
                    echo '<option value="' . intval($supports[0]['id_support']) . '">' . $supports[0]['nom_support'] . '</option>';
                }
                ?>

                <?php
                $supportsInBase = getGameSupport($pdo);
                foreach ($supportsInBase as $supportInBase) {
                    echo '<option value="' . $supportInBase['id_support'] . '">' . $supportInBase['nom_support'] . '</option>';
                }
                ?>
            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_support'])) {
                echo '<div class="text-red-500">Veuillez renseigner au moins un support</div>';
            }
            ?>
        </div>

        <!-- Statut -->

        <div class="py-3 px-8 mx-8">
            <label for="jouable"><span class="text-slate-50">Statut: </span></label>
            <select class="w-full rounded" type="Statut" name="jouable" id="jouable">
                <?php
                if (empty($statuts['Statut'])) {
                    echo '<option value="">Aucun statut</option>';
                } else {
                    echo '<option value="' . intval($statuts['jouable']) . '">' . $statuts['Statut'] . '</option>';
                };
                ?>
                <?php
                $statutsInBase = getGameStatut($pdo);
                foreach ($statutsInBase as $statutInBase) {
                    echo '<option value="' . intval($statutInBase['id_jouable']) . '">' . $statutInBase['Statut'] . '</option>';
                }
                ?>

            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Statut'])) {
                echo '<div class="text-red-500">Veuillez renseigner au moins un statut</div>';
            }
            ?>
        </div>

        <!-- Moteur -->

        <div class="py-3 px-8 mx-8">
            <label for="id_moteur"><span class="text-slate-50">Moteur de développement: </span></label>
            <select class="w-full rounded" type="moteur" name="id_moteur" id="id_moteur">
                <?php
                if (empty($moteurs[0]['moteur_nom'])) {
                    echo '<option value="">Aucun moteur</option>';
                } else {
                    echo '<option value="' . intval($moteurs[0]['id_moteur']) . '">' . $moteurs[0]['moteur_nom'] . '</option>';
                }

                ?>
                <?php
                $moteursInBase = getGameMoteur($pdo);
                foreach ($moteursInBase as $moteurInBase) {
                    echo '<option value="' . intval($moteurInBase['id']) . '">' . $moteurInBase['moteur_nom'] . '</option>';
                }
                ?>
            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['moteur'])) {
                echo '<div class="text-red-500">Veuillez renseigner au moins un moteur</div>';
            }
            ?>
        </div>

        <!-- Nombre de joueurs -->

        <div class="py-3 px-8 mx-8">
            <label for="id_nombre_joueur"><span class="text-slate-50">Nombre de joueur(s): </span></label>
            <select class="w-full rounded" type="moteur" name="id_nombre_joueur" id="id_nombre_joueur">
                <?php
                if (empty($nbJoueurs[0]['nom_nombre_joueur'])) {
                    echo '<option value="">Aucun nombre de joueur</option>';
                } else {
                    echo '<option value="' . intval($nbJoueurs[0]['id_nombre_joueur']) . '">' . $nbJoueurs[0]['nom_nombre_joueur'] . '</option>';
                }
                ?>
                <?php
                $nbJoueursInBase = getGameNombreJoueur($pdo);
                foreach ($nbJoueursInBase as $nbJoueurInBase) {
                    echo '<option value="' . intval($nbJoueurInBase['id_nombre_joueur']) . '">' . $nbJoueurInBase['nom_nombre_joueur'] . '</option>';
                };
                ?>
            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_joueurs'])) {
                echo '<div class="text-red-500">Veuillez renseigner au moins un nombre de joueur</div>';
            }
            ?>
        </div>

        <!-- Date de fin estimée -->

        <div class="py-3 px-8 mx-8">
            <div class="py-3">
                <label for="date_estimee_fin"><span class="text-slate-50">Date de fin estimée: </span></label>
                <input type="date" name="date_estimee_fin" id="date_estimee_fin" value="<?= $jeux['date_estimee_fin'] ?>">
            </div>
        </div>

        <!-- Budget -->
        <div class="py-3 px-8 mx-8">
            <label for="budget"><span class="text-slate-50">Budget: </span></label>
            <input type="number" name="budget" id="budget" placeholder="" <?= $budgetvalue = $jeux['budget']; ?> value="<?= $budgetvalue; ?>"><span class="text-slate-50">€</span>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['budget'])) {
                echo '<div class="text-red-500">Veuillez renseigner un budget</div>';
            }
            ?>
        </div>

        <!-- Image -->

        <div class="py-3 px-8 mx-8">
            <label for="file"><span class="text-slate-50">Image de couverture: </span></label>
            <input type="file" name="file" id="file" class="text-slate-50">
            <div class="flex items-center">
                <?php
                if (!empty($jeux['image'])) {
                    echo '<img src="' . _JEUX_IMG_PATH . $jeux['image'] . '" alt="image du jeu" class="w-1/6 ml-0 py-4 object-cover">
                    <a href="suppression_imageCover.php?id='.$jeux['ID'].'&nom_image='.$jeux['image'].'" class="ml-4 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                    Supprimer l\'image de couverture
                    </a>';
                }
                ?>
                 
                    
            </div>
        </div>

        <!-- Images complémentaires -->

        <div class="py-3 px-8 mx-8">
            <label for="imageAdditional"><span class="text-slate-50">Images supplémentaires: </span></label>
            <input type="file" name="imageAdditional[]" id="imageAdditional" class="text-slate-50" multiple>
        </div>
        <div class="flex flex-row py-8 text-center">
            <?php foreach ($images as $image) : ?>
                <div class="mx-2">
                    <a href="<?= _JEUX_IMG_PATH . $image['nom_image'] ?>"><img src="<?= _JEUX_IMG_PATH . $image['nom_image'] ?>" alt="image du jeu" class="mx-2 max-h-32 object-cover rounded-md"></a>
                    <div class="py-4">
                        <a href="suppression_imageAdditionnel_jeu.php?id=<?= $jeux['ID'] ?>&image=<?= $image['id'] ?>&nom_image=<?= $image['nom_image'] ?>" class="ml-4 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Supprimer l'image</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>






        <hr class="my-8">


        <!-- Bouton d'envoi du formulaire -->

        <div class="mx-auto text-center">
            <input type="submit" value="Enregistrer" class="bg-slate-50 py-3 px-8 ml-16 my-2 rounded" name="modifyGame" action="Jeu.php?id=<?= $id ?>">
        </div>

    </form>

</div>





<?php
require_once('templates/footer.php');
?>