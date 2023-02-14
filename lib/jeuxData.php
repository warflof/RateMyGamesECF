<?php

function getGamesByID(PDO $pdo, int $id) {
$query = $pdo->prepare("SELECT * FROM jeu WHERE id = :id;");
$query->bindParam(':id', $id);
$query->execute();
return $query->fetch();
}

// Récupération de view

function addGameStatut(PDO $pdo, array $jeux) {
    $receiveStatut = $pdo->prepare("SELECT * FROM jeu_jouable_vw WHERE Titre = :Titre;");
$receiveStatut->bindParam(':Titre', $jeux['Titre']);
$receiveStatut->execute();
return $receiveStatut->fetch();
}

function addGameSupport(PDO $pdo, array $jeux) {
    $receiveSupport = $pdo->prepare("SELECT * FROM jeu_support_vw WHERE Titre = :Titre;");
    $receiveSupport->bindParam(':Titre', $jeux['Titre']);
    $receiveSupport->execute();
    return $receiveSupport->fetchAll();    
}

function addGameStyle(PDO $pdo, array $jeux) {
    $receiveStyle = $pdo->prepare("SELECT * FROM jeu_style_vw WHERE Titre = :Titre;");
    $receiveStyle->bindParam(':Titre', $jeux['Titre']);
    $receiveStyle->execute();
    return $receiveStyle->fetchAll();
}

function addGameNbJoueur(PDO $pdo, array $jeux) {
    $receiveNbJoueur = $pdo->prepare("SELECT * FROM jeu_nombre_joueur_vw WHERE Titre = :Titre;");
    $receiveNbJoueur->bindParam(':Titre', $jeux['Titre']);
    $receiveNbJoueur->execute();
    return $receiveNbJoueur->fetchAll();
}

function addGameMoteur(PDO $pdo, array $jeux) {
    $receiveGameMoteur = $pdo->prepare("SELECT * FROM jeu_moteur_vw WHERE Titre = :Titre;");
    $receiveGameMoteur->bindParam(':Titre', $jeux['Titre']);
    $receiveGameMoteur->execute();
    return $receiveGameMoteur->fetchAll();
}

// Récupère la table jeu dans l'ordre décroissant

function getGames(PDO $pdo, int $limit = NULL) {
    $sql = 'SELECT * FROM jeu ORDER BY id DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
}

// Récupère la table statut

function getGameStatut(PDO $pdo) {
    $statut = $pdo->prepare("SELECT * FROM statut");
    $statut->execute();
    return $statut->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table moteur

function getGameMoteur(PDO $pdo) {
    $moteur = $pdo->prepare("SELECT * FROM moteur");
    $moteur->execute();
    return $moteur->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table nombre_joueur

function getGameNombreJoueur(PDO $pdo) {
    $nombreJoueur = $pdo->prepare("SELECT id_nombre_joueur, nom_nombre_joueur FROM nombre_joueur");
    $nombreJoueur->execute();
    return $nombreJoueur->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table support

function getGameSupport(PDO $pdo) {
    $support = $pdo->prepare("SELECT id_support, nom_support FROM support");
    $support->execute();
    return $support->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la table style

function getGameStyle(PDO $pdo) {
    $style = $pdo->prepare("SELECT id, style FROM style");
    $style->execute();
    return $style->fetchAll(PDO::FETCH_ASSOC);
}

// Affiche l'image par défaut si aucune image n'est sélectionnée

function getGameImg(string|null $image) {
    if($image === null){
        return _ASSETS_IMG_PATH.'default.jpg';
    } else {
        return _JEUX_IMG_PATH.$image;        
    }
};

$insertStyle = "INSERT INTO jeu_style (jeu_id, style_id) VALUES (LAST_INSERT_ID(), :style);";
$insertImage = "INSERT INTO jeu_image (jeu_id, nom) VALUES (LAST_INSERT_ID(), :image);";
    // INSERT TABLE jeu
function saveTableGames(PDO $pdo, string $Titre, string $Description, string|NULL $Image, int $style, int $support, int $statut, int $moteur,int $nombre_joueur, string $dateEstimeeFin, int $budget) {
    global $insertStyle;
    $query = $pdo->prepare("INSERT INTO jeu (id, Titre, Description, image, jouable, id_moteur, date_estimee_fin, budget) 
    VALUES (NULL, :Titre, :Description, :image, :jouable, :id_moteur, :date_estimee_fin, :budget);
    INSERT INTO image (jeu_id, nom) VALUES (LAST_INSERT_ID(), :image);
    INSERT INTO jeu_nombre_joueur (jeu_id, nombre_joueur_id) VALUES (LAST_INSERT_ID(), :id_nombre_joueur);
    INSERT INTO jeu_support (jeu_id, support_id) VALUES (LAST_INSERT_ID(), :support);
    INSERT INTO jeu_style (jeu_id, style_id) VALUES (LAST_INSERT_ID(), :style); 
    $insertStyle
    ");
    if (empty($Titre) || empty($Description) || empty($style) || empty($support) || empty($statut) || empty($moteur) || empty($nombre_joueur) || empty($dateEstimeeFin) || empty($budget))  {
        ?>
        <script>
            Javascript:alert('Merci de remplir tous les champs !')
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



/*

On souhaite ajouter des styles supplémentaire à un jeu.

il faut pouvoir ajouter un champ de type select multiple pour pouvoir ajouter plusieurs styles à un jeu.
Une fois cela fait, il faut boucler sur les styles sélectionnés pour les ajouter à la table jeu_style.

Si Aventure et Action sont sélectionnés,
    il faut ajouter les lignes suivantes dans la table jeu_style :
        - jeu_id = LAST_INSERT_ID(), style_id = 1 -> INSERT INTO jeu_style (jeu_id, style_id) VALUES (1, 1);
        - jeu_id = LAST_INSERT_ID(), style_id = 2  -> INSERT INTO jeu_style (jeu_id, style_id) VALUES (1, 2);
        


*/