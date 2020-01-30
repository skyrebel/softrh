<?php

function getsecretariatsAll(){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from secretariats';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getsecretariatsByid($id){
    global $pdo;
    $sql = 'SELECT id, nom, prenom, mail, mot de passe from secretariats where id = :id';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}