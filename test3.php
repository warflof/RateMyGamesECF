<?php
require_once 'templates/header.php';
require_once('lib/jeuxData.php');


$jeux = getGames($pdo);
if (isset($_SESSION['user']['email'])) {
    $users = $_SESSION['user']['email'];
};

$styles = getGameStyle($pdo);
$status = getGameStatut($pdo);

$favorisQuery = $pdo->prepare('SELECT * FROM utilisateur_jeu WHERE utilisateur_email = :mail');
$favorisQuery->bindParam(':mail', $users, PDO::PARAM_STR);
$favorisQuery->execute();
$favoris = $favorisQuery->fetchAll(PDO::FETCH_ASSOC);
?>


<form id="filter-form" action="get_produits.php" method="POST">
    <p class="text-slate-50">Nom: </p>
    <input type="text" id="filter-input" placeholder="Filtrer les produits..." class="my-2" id="requestName">
    <p class="text-slate-50">Statut: </p>
    <select class="mb-4" name="statut">
        <option value="" disabled selected>Selectionnez un statut</option>
        <?php
        foreach ($status as $statut) {
            echo '<option value="' . $statut['id_jouable'] . '">' . $statut['Statut'] . '</option>';
        }
        ?>
    </select>
    <p class="text-slate-50">Date de fin de création: </p>
    <input type="date" name="date">
    <div class="my-2">
        <p class="text-slate-50">Style: </p>
        <select name="style">
            <option value="" disabled selected>Selectionnez un style</option>
            <?php
            foreach ($styles as $style) {
                echo '<option value="' . $style['id_style'] . '">' . $style['style'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="py-2">
        <button id="filter-button" class="bg-slate-50 py-2 px-2 rounded-md mr-2" type="button">Filtrer</button>
        <button class="bg-slate-50 py-2 px-2 rounded-md" type="reset">Réinitialiser</button>
    </div>
</form>


<div id="liste" class="text-slate-50">
    <!-- Les produits récupérés par le filtrage seront affichés ici -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="js/testAjaxProduits.js"></script>




<?php
require_once 'templates/footer.php';
?>