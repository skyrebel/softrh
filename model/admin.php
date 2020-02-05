<?php

function getadminsAll()
{
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, password from Utilisateur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

