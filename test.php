<?php
require_once('lib/session.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require_once('templates/header.php');



require_once('lib/jeuxData.php');
require_once('lib/tools.php');





var_dump($_SESSION)

?>


<?php
require('templates/footer.php');
?>


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



  <!-- Images complémentaires Modification_Article-->

        <!-- <div class="py-3 px-8 mx-8">
            <label for="imageAdditional"><span class="text-slate-50">Images supplémentaires: </span></label>
            <input type="file" name="imageAdditional[]" id="imageAdditional" class="text-slate-50" multiple>
        </div>
        <div class="flex flex-row py-8 text-center">
        <?php foreach ($images as $image) : ?>
                <div class="mx-2">
                    <a href="<?= _JEUX_IMG_PATH . $image['nom_image'] ?>"><img src="<?= _JEUX_IMG_PATH . $image['nom_image'] ?>" alt="image du jeu" class="mx-2 max-h-32 object-cover rounded-md"></a>
                    <div class="py-4">
                        <a href="suppression_imageAdditionnel_jeu.php?id=<?= $news['id_actu'] ?>&image=<?= $image['id'] ?>&nom_image=<?= $image['nom_image'] ?>" class="ml-4 py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Supprimer l'image</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div> -->