<?php

function getadminsAll()
{
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, password from Utilisateur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getadminsByid($id)
{
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, password from Utilisateur where id = :id';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}