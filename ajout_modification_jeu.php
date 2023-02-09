<?php
require('templates/header.php');
require_once('lib/jeuxData.php');

$insertStyle = "INSERT INTO jeu_style (jeu_id, style_id) VALUES (LAST_INSERT_ID(), :style);";

if(isset($_POST['saveGame'])) {
    
    $res = saveTableGames($pdo, 
    $_POST['Titre'],
    $_POST['Description'],
    NULL,
    $_POST['style'],
    $_POST['id_support'],
    $_POST['Statut'],
    $_POST['moteur'],
    $_POST['nombre_joueurs'],
    $_POST['date_estimee_fin'],
    $_POST['budget']);
   
}


?>

<div class="container mx-auto px-32 py-6 pt-8 flex flex-col">




<h1 class="text-5xl text-slate-50 text-center py-6">Ajouter un jeu</h1>

<form method="POST" enctype="multipart/form-data">

        <!-- Titre -->

    <div class="py-3 px-8 mx-8">
        <label for="Titre"><span class="text-slate-50">Nom du jeu: </span></label>
        <input class="w-full rounded" type="text" name="Titre" id="Titre">
    </div>

        <!-- Description -->

    <div class="py-3 px-8 mx-8">
        <label for="Description"><span class="text-slate-50">Description: </span></label>
        <textarea  class="w-full h-32 rounded" type="Description" name="Description" id="Description"></textarea>
    </div>
    
        <!-- Image -->

    <div class="py-3 px-8 mx-8">
        <label for="Image"><span class="text-slate-50">Image: </span></label>
        <input type="file" name="image" id="Image">
    </div>

  <!-- Style -->

  <div class="py-3 px-8 mx-8">
        <label for="style"><span class="text-slate-50">Style: </span></label>
        <select  class="w-full rounded" type="input" name="style" id="style">
            <?php
            $styles = getGameStyle($pdo);
            foreach($styles as $style) {
                echo '<option value="'.$style['id'].'">'.$style['style'].'</option>';
            }
            ?> 
        </select>
    </div>

        <!-- Support -->

    <div class="py-3 px-8 mx-8">
        <label for="id_support"><span class="text-slate-50">support: </span></label>
        <select  class="w-full rounded" type="input" name="id_support" id="id_support">
            <?php
            $supports = getGameSupport($pdo);
            foreach($supports as $support) {
                echo '<option value="'.$support['id_support'].'">'.$support['nom_support'].'</option>';
            }
            ?> 
        </select>
    </div>

        <!-- Statut -->

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

        <!-- Moteur -->

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

        <!-- Nombre de joueurs -->

    <div class="py-3 px-8 mx-8">
        <label for="nombre_joueurs"><span class="text-slate-50">Nombre de joueur(s): </span></label>
        <select  class="w-full rounded" type="moteur" name="nombre_joueurs" id="nombre_joueurs">
            <?php
                $nombre_joueurs = getGameNombreJoueur($pdo);
                foreach($nombre_joueurs as $nombre_joueur) {
                    echo '<option value="'.$nombre_joueur['id_nombre_joueur'].'">'.$nombre_joueur['nom_nombre_joueur'].'</option>';
                };
            ?>
        </select>
    </div>

        <!-- Date de fin estimée -->

    <div class="py-3 px-8 mx-8">
        <div class="py-3">
            <label for="date_estimee_fin"><span class="text-slate-50">Date de fin estimée: </span></label>
            <input type="date" name="date_estimee_fin" id="date_estimee_fin">
        </div>

        <!-- Budget -->

    <div class="py-3">
            <label for="budget"><span class="text-slate-50">Budget: </span></label>
            <input type="text" name="budget" id="budget"><span class="text-slate-50">€</span>
    </div> 
    </div>


    <input type="submit" value="Enregistrer" class="bg-slate-50 py-3 px-8 mx-16 rounded" name="saveGame">

</form>

            </div>

<?php
require('templates/footer.php');
?>

