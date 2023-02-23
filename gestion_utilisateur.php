<?php
require('templates/header.php');
require_once('lib/jeuxData.php');

$utilisateurs = getUsers($pdo);
$role = addUsersRoles($pdo, $utilisateurs);
$test = getRole($pdo, $utilisateurs);
var_dump($utilisateurs);
?>
<!-- <h1 class="text-4xl text-slate-50 text-center py-6">Modification des jeux</h1>

<div class="container mx-auto px-auto py-8"> -->

<table class="table-auto mx-auto">
    <thead>
        <h1 class="text-4xl text-slate-50 text-center py-6">Modification des utilisateurs</h1>

        <div class="container mx-auto px-auto py-4">
            <tr class="border-2 border-slate-50">

                <th class="text-slate-50 border-2 border-slate-50">Email</th>
                <th class="text-slate-50 text-center">Role</th>

            </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $key => $utilisateur) { ?>

            <tr class=" border-2 border-slate-500">
                <td class="border-2 border-slate-50 text-slate-50">
                    <?= $utilisateur['email']; ?>
                </td>
            
            <td class="mx-8 px-auto py-4 border-2 border-slate-50">
                <!-- Mettre un <select></select> avec les valeurs de role_id -->
                <select class="w-full rounded" type="input" name="role" id="role">
                    <?php
                    if (empty($utilisateur['email'])) {
                        echo '<option value="">Aucun style</option>';
                    } else {
                        echo '<option value="' . intval($role[0]['role_id']) . '">' . $utilisateur['role_id'] . '</option>';
                    }
                    ?>
                    <?php
                    $rolesInBase = getRole($pdo);
                    foreach ($rolesInBase as $roleInBase) {
                        echo '<option value="' . intval($roleInBase['id_role']) . '">' . $roleInBase['nom_role'] . '</option>';
                    }
                    ?>
                </select>


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