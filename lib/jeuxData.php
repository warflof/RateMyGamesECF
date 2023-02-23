<?php

function getGamesByID(PDO $pdo, int $id)
{
    $query = $pdo->prepare("SELECT * FROM jeu WHERE id = :id;");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch();
}

function getGamesByTitle(PDO $pdo)
{
    $query = $pdo->prepare("SELECT Titre FROM jeu;");
    $query->execute();
    return $query->fetchAll();
}

// Récupération de view

function addGameStatut(PDO $pdo, array $jeux)
{
    $receiveStatut = $pdo->prepare("SELECT * FROM jeu_jouable_vw WHERE Titre = :Titre;");
    $receiveStatut->bindParam(':Titre', $jeux['Titre']);
    $receiveStatut->execute();
    return $receiveStatut->fetch();
}

function addGameSupport(PDO $pdo, array $jeux)
{
    $receiveSupport = $pdo->prepare("SELECT * FROM jeu_support_vw WHERE ID = :id;");
    $receiveSupport->bindParam(':id', $jeux['ID']);
    $receiveSupport->execute();
    return $receiveSupport->fetchAll();
}

function addGameStyle(PDO $pdo, array $jeux)
{
    $receiveStyle = $pdo->prepare("SELECT * FROM jeu_style_vw WHERE Titre = :Titre;");
    $receiveStyle->bindParam(':Titre', $jeux['Titre']);
    $receiveStyle->execute();
    return $receiveStyle->fetchAll();
}

function addGameNbJoueur(PDO $pdo, array $jeux)
{
    $receiveNbJoueur = $pdo->prepare("SELECT * FROM jeu_nombre_joueur_vw WHERE Titre = :Titre;");
    $receiveNbJoueur->bindParam(':Titre', $jeux['Titre']);
    $receiveNbJoueur->execute();
    return $receiveNbJoueur->fetchAll();
}

function addGameMoteur(PDO $pdo, array $jeux)
{
    $receiveGameMoteur = $pdo->prepare("SELECT * FROM jeu_moteur_vw WHERE Titre = :Titre;");
    $receiveGameMoteur->bindParam(':Titre', $jeux['Titre']);
    $receiveGameMoteur->execute();
    return $receiveGameMoteur->fetchAll();
}

function addGameImg(PDO $pdo, array $jeux)
{
    $receiveGameImg = $pdo->prepare("SELECT * FROM image WHERE jeu_id = :jeu_id;");
    $receiveGameImg->bindParam(':jeu_id', $jeux['ID']);
    $receiveGameImg->execute();
    return $receiveGameImg->fetchAll();
}

function addUsersRoles(PDO $pdo, array $users)
{
    $receiveUsersRoles = $pdo->prepare("SELECT * FROM utilisateur_role_vw WHERE email = :email;");
    $receiveUsersRoles->bindParam(':email', $users['email']);
    $receiveUsersRoles->execute();
    return $receiveUsersRoles->fetch();
}



// Récupère la table jeu dans l'ordre décroissant

function getGames(PDO $pdo, int $limit = NULL)
{
    $sql = 'SELECT * FROM jeu ORDER BY id DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
}

// Récupère la table statut

function getGameStatut(PDO $pdo)
{
    $statut = $pdo->prepare("SELECT * FROM statut");
    $statut->execute();
    return $statut->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table moteur

function getGameMoteur(PDO $pdo)
{
    $moteur = $pdo->prepare("SELECT * FROM moteur");
    $moteur->execute();
    return $moteur->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table nombre_joueur

function getGameNombreJoueur(PDO $pdo)
{
    $nombreJoueur = $pdo->prepare("SELECT id_nombre_joueur, nom_nombre_joueur FROM nombre_joueur");
    $nombreJoueur->execute();
    return $nombreJoueur->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table support

function getGameSupport(PDO $pdo)
{
    $support = $pdo->prepare("SELECT id_support, nom_support FROM support");
    $support->execute();
    return $support->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table style

function getGameStyle(PDO $pdo)
{
    $style = $pdo->prepare("SELECT id_style, style FROM style");
    $style->execute();
    return $style->fetchAll(PDO::FETCH_ASSOC);
}

// Affiche l'image par défaut si aucune image n'est sélectionnée

function getGameImg(string|null $image)
{
    if ($image === null) {
        return _ASSETS_IMG_PATH . 'default.jpg';
    } else {
        return _JEUX_IMG_PATH . $image;
    }
};

function getUsers(PDO $pdo)
{
    $query = $pdo->prepare("SELECT email, role_id FROM utilisateur");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
};

function getRole(PDO $pdo)
{
    $query = $pdo->prepare("SELECT * FROM role");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
};

$insertStyle = "INSERT INTO jeu_style (jeu_id, style_id) VALUES (LAST_INSERT_ID(), :style);";
// INSERT TABLE jeu
function saveTableGames(PDO $pdo, string $Titre, string $Description, string|NULL $Image, int $style, int $support, int $statut, int $moteur, int $nombre_joueur, string $dateEstimeeFin, int $budget)
{

    $query = $pdo->prepare("INSERT INTO jeu (id, Titre, Description, image, jouable, id_moteur, date_estimee_fin, budget) 
    VALUES (NULL, :Titre, :Description, :image, :jouable, :id_moteur, :date_estimee_fin, :budget);
    INSERT INTO jeu_nombre_joueur (jeu_id, nombre_joueur_id) VALUES (LAST_INSERT_ID(), :id_nombre_joueur);
    INSERT INTO jeu_support (jeu_id, support_id) VALUES (LAST_INSERT_ID(), :support);
    INSERT INTO jeu_style (jeu_id, style_id) VALUES (LAST_INSERT_ID(), :style);   
    ");
    if (empty($Titre) || empty($Description) || empty($style) || empty($support) || empty($statut) || empty($moteur) || empty($nombre_joueur) || empty($dateEstimeeFin) || empty($budget)) {


?>
        <script>
            Javascript: alert('Merci de remplir tous les champs !')
            document.location.replace("ajout_modification_jeu.php");
        </script>
<?php
    } else {
        $query->bindParam(':Titre', $Titre, PDO::PARAM_STR);
        $query->bindParam(':Description', $Description, PDO::PARAM_STR);
        $query->bindParam(':image', $Image, PDO::PARAM_STR);
        $query->bindParam(':style', $style, PDO::PARAM_INT);
        $query->bindParam(':support', $support, PDO::PARAM_INT);
        $query->bindParam(':jouable', $statut, PDO::PARAM_INT);
        $query->bindParam(':id_moteur', $moteur, PDO::PARAM_INT);
        $query->bindParam(':id_nombre_joueur', $nombre_joueur, PDO::PARAM_INT);
        $query->bindParam(':date_estimee_fin', $dateEstimeeFin, PDO::PARAM_STR);
        $query->bindParam(':budget', $budget, PDO::PARAM_INT);
        return $query->execute();
    }
};

// UPDATE TABLE jeu

function updateGame(PDO $pdo, int $id, string $Titre, string $Description, int $statut, int $moteur, string $dateEstimeeFin, int $budget)
{
    $query = $pdo->prepare("UPDATE jeu SET Titre = :Titre, Description = :Description, jouable = :jouable, id_moteur = :id_moteur, date_estimee_fin = :date_estimee_fin, budget = :budget WHERE id = :id;");
    $query->bindParam(':Titre', $Titre, PDO::PARAM_STR);
    $query->bindParam(':Description', $Description, PDO::PARAM_STR);
    $query->bindParam(':jouable', $statut, PDO::PARAM_INT);
    $query->bindParam(':id_moteur', $moteur, PDO::PARAM_INT);
    $query->bindParam(':date_estimee_fin', $dateEstimeeFin, PDO::PARAM_STR);
    $query->bindParam(':budget', $budget, PDO::PARAM_INT);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
};


function updateGameSupport(PDO $pdo, int $id, int $support)
{
    $query = $pdo->prepare("SELECT support_id FROM jeu_support WHERE jeu_id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $supports = $query->fetchAll(PDO::FETCH_COLUMN);

    if (count($supports) < 2 || in_array($support, $supports)) {
        $query = $pdo->prepare("INSERT INTO jeu_support (jeu_id, support_id) VALUES (:id, :support)
                                ON DUPLICATE KEY UPDATE support_id = :support");
        $query->bindParam(':support', $support, PDO::PARAM_INT);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    } else {
        return false;
    }
}

function updateGameStyle(PDO $pdo, int $id, int $style)
{
    $query = $pdo->prepare("SELECT style_id FROM jeu_style WHERE jeu_id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $styles = $query->fetchAll(PDO::FETCH_COLUMN);

    if (count($styles) < 3 || in_array($style, $styles)) {
        $query = $pdo->prepare("INSERT INTO jeu_style (jeu_id, style_id) VALUES (:id, :style)
                                ON DUPLICATE KEY UPDATE style_id = :style");
        $query->bindParam(':style', $style, PDO::PARAM_INT);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    } else {
        return false;
    }
}

function updateGameNombreJoueur(PDO $pdo, int $id, int $nbJoueur)
{
    $query = $pdo->prepare("SELECT nombre_joueur_id FROM jeu_nombre_joueur WHERE jeu_id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $nbJoueurs = $query->fetchAll(PDO::FETCH_COLUMN);

    if (count($nbJoueurs) < 3 || in_array($nbJoueur, $nbJoueurs)) {
        $query = $pdo->prepare("INSERT INTO jeu_nombre_joueur (jeu_id, nombre_joueur_id) VALUES (:id, :nombre_joueur)
                                ON DUPLICATE KEY UPDATE nombre_joueur_id = :nombre_joueur");
        $query->bindParam(':nombre_joueur', $nbJoueur, PDO::PARAM_INT);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    } else {
        return false;
    }
}


function updateGameImage(PDO $pdo, int $id, string|NULL $image)
{
    if (!empty($image)) {
        $query = $pdo->prepare("UPDATE jeu SET image = :image WHERE ID = :id");
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    } else {
        return false;
    }
};

function updateAdditionnalImages(PDO $pdo, int $id, array $jeux, string|NULL $additionalImage)
{
    if (empty(addGameImg($pdo, $jeux))) {
        $query = $pdo->prepare("INSERT INTO image (jeu_id, nom_image) VALUES (:id, :imageAdditional)");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':imageAdditional', $additionalImage, PDO::PARAM_STR);
        return $query->execute();
    } else {
        $query = $pdo->prepare("UPDATE image SET nom_image = :image WHERE id = :id");
        $query->bindParam(':imageAdditional', $additionalImage, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
};








function dropGame(PDO $pdo, int $id)
{
    $query = $pdo->prepare("DELETE FROM jeu WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
};
/*

On souhaite ajouter des styles supplémentaire à un jeu.

il faut pouvoir ajouter un champ de type select multiple pour pouvoir ajouter plusieurs styles à un jeu.
Une fois cela fait, il faut boucler sur les styles sélectionnés pour les ajouter à la table jeu_style.

Si Aventure et Action sont sélectionnés,
    il faut ajouter les lignes suivantes dans la table jeu_style :
        - jeu_id = LAST_INSERT_ID(), style_id = 1 -> INSERT INTO jeu_style (jeu_id, style_id) VALUES (1, 1);
        - jeu_id = LAST_INSERT_ID(), style_id = 2  -> INSERT INTO jeu_style (jeu_id, style_id) VALUES (1, 2);
        


*/
