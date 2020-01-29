<?php

function getproductionsAll(){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from productions';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getProductionsByid($id){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from productions where id = :id';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}