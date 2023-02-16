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
                        <a href="" class="bg-lime-500 rounded-md font-bold px-4 py-2 mx-6 border-2 border-slate-50 text-slate-50" type="button">
                            Modifier
                        </a>

                        <button onclick="dropGame($pdo, <?= $jeu['ID']; ?>)" class="bg-lime-500 rounded-md font-bold px-4 py-2 mx-6 border-2 border-slate-50 text-slate-50">
                        Supprimer
                        </a>
                    </td>
                </tr>
                
            <?php
            }
            var_dump($jeu['ID']);
            ?>
        </tbody>




    </table>

</div>

<?php
require('templates/footer.php');
?>