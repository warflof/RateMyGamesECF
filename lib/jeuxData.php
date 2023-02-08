<?php

function getGamesByID(PDO $pdo, int $id) {
$query = $pdo->prepare("SELECT * FROM jeu WHERE id = :id;");
$query->bindParam(':id', $id);
$query->execute();
return $query->fetch();
}

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

function getGameStatut(PDO $pdo) {
    $statut = $pdo->prepare("SELECT * FROM statut");
    $statut->execute();
    return $statut->fetchAll(PDO::FETCH_ASSOC);
}

function getGameMoteur(PDO $pdo) {
    $moteur = $pdo->prepare("SELECT * FROM moteur");
    $moteur->execute();
    return $moteur->fetchAll(PDO::FETCH_ASSOC);
}

function getGameNombreJoueur(PDO $pdo) {
    $nombreJoueur = $pdo->prepare("SELECT * FROM nombre_joueur");
    $nombreJoueur->execute();
    return $nombreJoueur->fetchAll(PDO::FETCH_ASSOC);
}

function getGameSupport(PDO $pdo) {
    $support = $pdo->prepare("SELECT id_support, nom_support FROM support");
    $support->execute();
    return $support->fetchAll(PDO::FETCH_ASSOC);
}

function getGameImg(string|null $image) {
    if($image === null){
        return _ASSETS_IMG_PATH.'default.jpg';
    } else {
        return _JEUX_IMG_PATH.$image;        
    }
}

    // INSERT TABLE jeu

function saveTableGames(PDO $pdo, string $Titre, string $Description, string|NULL $Image, int $statut, int $moteur, string $dateEstimeeFin, int $budget) {
    $query = $pdo->prepare("INSERT INTO jeu (id, Titre, Description, Image, jouable, id_moteur, date_estimee_fin, budget) VALUES (NULL, :Titre, :Description, :Image, :jouable, :id_moteur, :date_estimee_fin, :budget);" );
    $query->bindParam(':Titre', $Titre, PDO::PARAM_STR);
    $query->bindParam(':Description', $Description, PDO::PARAM_STR);
    $query->bindParam(':Image', $Image, PDO::PARAM_STR);
    $query->bindParam(':jouable', $statut, PDO::PARAM_INT);
    $query->bindParam(':id_moteur', $moteur, PDO::PARAM_INT);
    $query->bindParam(':date_estimee_fin', $dateEstimeeFin, PDO::PARAM_STR);
    $query->bindParam(':budget', $budget, PDO::PARAM_INT);
    $jeu_id = $pdo->lastInsertId();
    return $query->execute();
    return $jeu_id;
}
    // INSERT TABLE jeu_support

function saveTableJeu_Style(PDO $pdo, int $jeu_id, int $style_id) {
    $query = $pdo->prepare("INSERT INTO jeu_style (jeu_id, style_id) VALUES (:jeu_id, :style_id);" );
    $query->bindParam(':jeu_id', $jeu_id, PDO::PARAM_INT);
    $query->bindParam(':style_id', $style_id, PDO::PARAM_INT);
    return $query->execute();
};

    // INSERT TABLE jeu_support

function saveTableJeu_Support(PDO $pdo, int $jeu_id, int $support_id) {
    $query = $pdo->prepare("INSERT INTO jeu_support (jeu_id, support_id) VALUES (:jeu_id, :support_id);" );
    $query->bindParam(':jeu_id', $jeu_id, PDO::PARAM_INT);
    $query->bindParam(':support_id', $support_id, PDO::PARAM_INT);
    return $query->execute();
};