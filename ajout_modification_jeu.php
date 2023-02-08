<?php
require('templates/header.php');
require_once('lib/jeuxData.php');

if(isset($_POST['saveGame'])) {
    
    $res = saveTableGames($pdo, $_POST['Titre'], $_POST['Description'], NULL, $_POST['Statut'], $_POST['moteur'], $_POST['date_estimee_fin'], $_POST['budget']);
    //$res2 = saveTableJeu_Style($pdo, $_POST['id'], $_POST['id_support']);
    $res3= saveTableJeu_Support($pdo, $_POST['id'], $_POST['id_support']);

    var_dump($res);
    var_dump($res);

}



?>
<h1 class="text-5xl text-slate-50 text-center">Ajouter un jeu</h1>

<form method="POST" enctype="multipart/form-data">

    <div class="py-3 px-8 mx-8">
        <label for="Titre"><span class="text-slate-50">Nom du jeu: </span></label>
        <input class="w-full rounded" type="text" name="Titre" id="Titre">
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="Description"><span class="text-slate-50">Description: </span></label>
        <textarea  class="w-full h-32 rounded" type="Description" name="Description" id="Description"></textarea>
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="Image"><span class="text-slate-50">Image: </span></label>
        <input type="file" name="image" id="Image">
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="support"><span class="text-slate-50">support: </span></label>
        <select  class="w-full rounded" type="input" name="support" id="id_support">
            <?php
            $supports = getGameSupport($pdo);
            foreach($supports as $support) {
                echo '<option value="'.$support['id_support'].'">'.$support['nom_support'].'</option>';
            }
            ?> 
        </select>
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="Statut"><span class="text-slate-50">Statut: </span></label>
        <select  class="w-full rounded" type="Statut" name="Statut" id="Statut">
            <?php
            $statuts = getGameStatut($pdo);
            foreach($statuts as $statut) {
                echo '<option value="'.$statut['ID'].'">'.$statut['Statut'].'</option>';
            }
            ?>
  
        </select>
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="moteur"><span class="text-slate-50">Moteur de développement: </span></label>
        <select  class="w-full rounded" type="moteur" name="moteur" id="moteur">
            <?php
                $moteurs = getGameMoteur($pdo);
                foreach($moteurs as $moteur) {
                    echo '<option value="'.$moteur['id'].'">'.$moteur['moteur_nom'].'</option>';
                }
            ?>
        </select>
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="date_estimee_fin"><span class="text-slate-50">Date de fin estimée: </span></label>
        <input type="date" name="date_estimee_fin" id="date_estimee_fin">
    </div>

    <div class="py-3 px-8 mx-8">
        <label for="budget"><span class="text-slate-50">Budget: </span></label>
        <input type="text" name="budget" id="budget"><span class="text-slate-50">€</span>
    </div>


    <input type="submit" value="Enregistrer" class="bg-slate-50 py-3 px-8 mx-16 rounded" name="saveGame">

</form>

<?php
require('templates/footer.php');
?>

