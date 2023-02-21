<?php
require_once('lib/session.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require_once('templates/header.php');



require_once('lib/jeuxData.php');
require_once('lib/tools.php');



function sendMultipleImg(PDO $pdo, int $jeu_id)
{
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
        // prépare la requête d'insertion
        $stmt = $pdo->prepare('INSERT INTO image (jeu_id, nom_image) VALUES (:jeu_id, :name)');
        
        // boucle sur chaque fichier téléchargé
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $fileName = NULL;
            // la méthode getimagesize va retourner false si le fichier n'est pas une image
            $checkImage = getimagesize($tmp_name);
            if ($checkImage !== false) {
                // on génère un nom unique et standardisé pour l'image
                $fileName = uniqid() . '-' . slugify($_FILES['image']['name'][$key]);

                move_uploaded_file($tmp_name, _JEUX_IMG_PATH . $fileName);

                // insère les informations de l'image dans la table images
                $stmt->execute([
                    'jeu_id' => $jeu_id,
                    'name' => $_FILES['image']['name'][$key]                
                 ]);
            } else {
                echo $errors[] = 'Le fichier ' . $_FILES['image']['name'][$key] . ' n\'est pas une image';
            }
        }
    }
    return ($_FILES['image']['name'][0]);
}









// $error;
// if ($res) {
//     $error = false;
//     echo '<div class="w-96 mx-auto py-4"><div class="text-slate-50 text-center text-2xl py-8 border-2 border-solid rounded-md">Le jeu a bien été ajouté</div></div>';
// } else {
//     $error = true;
//     echo '<div class="w-96 mx-auto py-4"><div class="text-slate-50 text-center text-2xl py-8 border-2 border-solid rounded-md">Le jeu n\'a pas été ajouté</div></div>';
// }


?>

<div class="container mx-auto px-32 py-6 pt-8 flex flex-col">

    <h1 class="text-5xl text-slate-50 text-center py-6">Ajouter un jeu</h1>

    <form method="POST" enctype="multipart/form-data">


        <!-- Image -->

        <div class="py-3 px-8 mx-8">
            <label for="Image"><span class="text-slate-50">Image <span id="nbImage">1</span>: </span></label>
            <input type="file" name="image[]" id="Image" class="text-slate-50" multiple>

        </div>
        <hr class="my-8">
        <div class="mx-auto text-center">
            <input type="submit" value="Enregistrer" class="bg-slate-50 py-3 px-8 ml-16 my-2 rounded" name="saveGame">
        </div>

    </form>


</div>



<?php
require('templates/footer.php');
?>