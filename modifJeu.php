<?php
require('templates/header.php');
require_once('lib/jeuxData.php');

$jeux = getGames($pdo)

?>
<h1 class="text-4xl text-slate-50 text-center py-6">Modification des jeux</h1>

<div class="container mx-auto px-auto py-8">

    <table class="table-auto mx-auto">
        <thead>
            <tr class="border-2 border-slate-50">

                <th class="text-slate-50 border-2 border-slate-50">Titre</th>
                <th class="text-slate-50 text-center">Modification</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeux as $key => $jeu) { ?>

                <tr class="text-slate-50 border-2 border-slate-500">
                    <td class="border-2 border-slate-50">
                        <?= $jeu['Titre']; ?>
                    </td>
                    <td class="mx-8 px-auto py-4 border-2 border-slate-50">


                        <!-- Modal toggle -->
                        <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-slate-50 bg-lime-500 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                            Modifier
                        </button>

                        <!-- Main modal -->
                        <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Modification <?php echo $jeu['Titre'] ?>
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        
                                        <form method="POST" enctype="multipart/form-data">

                                            <!-- Titre -->

                                            <div class="py-3 px-8 mx-8">
                                                <label for="Titre"><span class="text-slate-50">Nom du jeu: </span></label>
                                                <input class="w-full rounded" type="text" name="Titre" id="Titre" placeholder="Le titre de votre jeu">
                                                <?php
                                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Titre'])) {
                                                    echo '<div class="text-red-500">Veuillez renseigner un Titre</div>';
                                                }
                                                ?>
                                            </div>

                                            <!-- Description -->

                                            <div class="py-3 px-8 mx-8">
                                                <label for="Description"><span class="text-slate-50">Description: </span></label>
                                                <textarea class="w-full h-32 rounded" type="Description" name="Description" id="Description" placeholder="La description de votre jeu"></textarea>
                                                <?php
                                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Description'])) {
                                                    echo '<div class="text-red-500">Veuillez renseigner une description</div>';
                                                }
                                                ?>
                                            </div>

                                            <!-- Image -->

                                            <div class="py-3 px-8 mx-8">
                                                <label for="Image"><span class="text-slate-50">Image: </span></label>
                                                <input type="file" name="image" id="Image">
                                            </div>

                                            <!-- Style -->

                                            <div class="py-3 px-8 mx-8">
                                                <label for="style"><span class="text-slate-50">Style: </span></label>
                                                <select class="w-full rounded" type="input" name="style" id="style">
                                                    <option value="0"> -- Choisissez un style --</option>
                                                    <?php
                                                    $styles = getGameStyle($pdo);
                                                    foreach ($styles as $style) {
                                                        echo '<option value="' . $style['id'] . '">' . $style['style'] . '</option>';
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
                                                <label for="id_support"><span class="text-slate-50">support: </span></label>
                                                <select class="w-full rounded" type="input" name="id_support" id="id_support">
                                                    <option value="0"> -- Choisissez un support --</option>

                                                    <?php
                                                    $supports = getGameSupport($pdo);
                                                    foreach ($supports as $support) {
                                                        echo '<option value="' . $support['id_support'] . '">' . $support['nom_support'] . '</option>';
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
                                                <label for="Statut"><span class="text-slate-50">Statut: </span></label>
                                                <select class="w-full rounded" type="Statut" name="Statut" id="Statut">
                                                    <option value="0"> -- Choisissez un statut --</option>

                                                    <?php
                                                    $statuts = getGameStatut($pdo);
                                                    foreach ($statuts as $statut) {
                                                        echo '<option value="' . $statut['ID'] . '">' . $statut['Statut'] . '</option>';
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
                                                <label for="moteur"><span class="text-slate-50">Moteur de développement: </span></label>
                                                <select class="w-full rounded" type="moteur" name="moteur" id="moteur">
                                                    <option value="0"> -- Choisissez un moteur --</option>

                                                    <?php
                                                    $moteurs = getGameMoteur($pdo);
                                                    foreach ($moteurs as $moteur) {
                                                        echo '<option value="' . $moteur['id'] . '">' . $moteur['moteur_nom'] . '</option>';
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
                                                <label for="nombre_joueurs"><span class="text-slate-50">Nombre de joueur(s): </span></label>
                                                <select class="w-full rounded" type="moteur" name="nombre_joueurs" id="nombre_joueurs">
                                                    <option value="0"> -- Choisissez un nombre de joueurs --</option>

                                                    <?php
                                                    $nombre_joueurs = getGameNombreJoueur($pdo);
                                                    foreach ($nombre_joueurs as $nombre_joueur) {
                                                        echo '<option value="' . $nombre_joueur['id_nombre_joueur'] . '">' . $nombre_joueur['nom_nombre_joueur'] . '</option>';
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
                                                    <input type="date" name="date_estimee_fin" id="date_estimee_fin" value="2024-12-31">
                                                </div>

                                                <!-- Budget -->

                                                <div class="py-3">
                                                    <label for="budget"><span class="text-slate-50">Budget: </span></label>
                                                    <input type="number" name="budget" id="budget" placeholder="100000" value="0"><span class="text-slate-50">€</span>
                                                    <?php
                                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['budget'])) {
                                                        echo '<div class="text-red-500">Veuillez renseigner un budget</div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>


                                            <input type="submit" value="Enregistrer" class="bg-slate-50 py-3 px-8 mx-16 rounded" name="saveGame">

                                        </form>


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                        <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <a href="modifJeu.php?id=<?= $jeu['ID']; ?>" class="bg-lime-500 rounded-md font-bold px-4 py-2 mx-6 border-2 border-slate-50 text-slate-50">Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>




    </table>

</div>

<?php
require('templates/footer.php');
?>