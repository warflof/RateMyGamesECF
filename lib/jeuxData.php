<?php
$jeux = [
    [           'name' =>  'A plague Tale: Requiem',
                'description' => "A Plague Tale is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'image' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem.gif',
                'image2' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem2.webp',
                'image3' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem3.webp',
                'image4' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem4.webp',
                'image5' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem5.webp',
                'image6' => 'A_plague_Tale_Requiem/A_Plague_Tale_Requiem6.webp',
                'DateCrea' => '22/04/2021', 
                'DateMaj' => '05/06/2022', 
                'Support' => 'PC / Xboite', 
                'Score' => '4.5/5', 
                'Moteur' => 'Unreal', 
                'Genre' => 'Action / Aventure', 
                'Budget' => '100.000', 
                'Statut' => 'Jouable', 
                'NbJoueur' => '300.000'],

    [           'name' =>  'Horizon', 
                'description' => "Horizon is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,", 
                'image' => 'Horizon_Forbiden_West/Horizon_Forbiden_West.gif' ],
                

    [           'name' =>  'New World', 
                'description' => "New World is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,", 
                'image' => 'New_World/New_World.jpg' ],

    [           'name' => 'Star Wars: Battlefront II', 
                'description' => "Star Wars: Battlefront II is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,", 
                'image' => 'Star_Wars_Battlefront_II/Star_Wars_Battlefront_II.webp' ],

    [           'name' => 'World of Warcraft: DragonFlight', 
                'description' => "World of Warcraft: DragonFlight is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,", 
                'image' => 'World_of_Warcraft_Dragonflight/World_of_warcraft_DragonFlight.webp' ],
];

function getGamesByID(PDO $pdo, int $id) {

$query = $pdo->prepare("SELECT * FROM jeu WHERE id = :id;");
$query->bindParam(':id', $id);
$query->execute();
return $query->fetch();
}

