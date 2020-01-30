<?php

function getmaintenancesAll(){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from maintenances';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getmaintenancesByid($id){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from maintenances where id = :id';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}