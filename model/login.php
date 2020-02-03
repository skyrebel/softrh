<?php

function getloginsAll(){
    global $pdo;
    $sql = 'SELECT id, Utilisateur, Services from logins';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getloginsByid($id){
    global $pdo;
    $sql = 'SELECT id, id, Utilisateur, Services from logins where id = :id';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}