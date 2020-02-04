<?php

function getemployersAll()
{
    global $pdo;
    $sql = 'SELECT Nom, Mot-de-passe, Role, from Utilisateur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}


