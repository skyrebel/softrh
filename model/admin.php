<?php

function getadminsAll()

{
    global $pdo;
    $sql = 'SELECT id, nom, password, role from Utilisateur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getservicesAll()

{
    global $pdo;
    $sql = 'SELECT id, nom from Service';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function voteHumeurDay()

{

    global $pdo;
    $sql = "SELECT h.nom, count(if (v.date_vote = concat(year(CURRENT_DATE),'_', month(CURRENT_DATE), '_' ,day(CURRENT_DATE))  and service = 1 , 1 , null)) as count from humeur h left outer JOIN vote v on v.id_humeur = h.id group by h.nom";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':date', $date, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function voteHumeurMonth()

{
    global $pdo;
    $sql = "SELECT h.nom, count(if (v.date_vote = concat(year(CURRENT_DATE),'_', month(CURRENT_DATE))  and service = 1 , 1 , null)) as count from humeur h left outer JOIN vote v on v.id_humeur = h.id group by h.nom";    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function listday()

{
    global $pdo;
    $sql = 'SELECT id, nom from Service';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}