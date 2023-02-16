<?php

function addUser(PDO $pdo, string $email, string $password): bool
{

    $sql = "INSERT INTO utilisateur (email, password, role_id) VALUES (:email, :password, :role_id)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':email', $email, PDO::PARAM_STR);

    $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

    $query->bindValue(':role_id', 6, PDO::PARAM_INT);

    return $query->execute();
};

function verifyUser(PDO $pdo, string $email, string $password)
{
    $query = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $users = $query->fetch();



    if ($users && password_verify($password, $users['password'])) {
        return $users;
    } else {
        return false;
    }
}
