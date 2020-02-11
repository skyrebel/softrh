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


function getHumeursAll()

{

    global $pdo;
    $sql = 'SELECT id, nom, emoticone from humeur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}




function voteHumeurDay()

{

    global $pdo;
    $sql = "SELECT h.nom, count(if (v.date_vote = concat(year(CURRENT_DATE),'_', month(CURRENT_DATE), '_' ,day(CURRENT_DATE))  and service = 1 , 1 , null)) as count from humeur h left outer JOIN vote v on v.id_humeur = h.id group by h.nom";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}


function voteHumeurMonth()

{

    global $pdo;
    $sql = "SELECT h.nom, count(if (v.date_vote = concat(year(CURRENT_DATE),'_', month(CURRENT_DATE))  and service = 1 , 1 , null)) as count from humeur h left outer JOIN vote v on v.id_humeur = h.id group by h.nom";   
     $sth = $pdo->prepare($sql);
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




function getAllVotesCurrentDay( )

{

    global $pdo;
    $sql = "SELECT h.nom, count( if( v.date_vote = concat(year(CURRENT_DATE),'-', month(CURRENT_DATE),'-', day(CURRENT_DATE))   , 1 , null)) as count from humeur h left outer join vote v on v.id_humeur = h.id group by h.nom";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_service', $idService, PDO::PARAM_INT);    
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}

function getAllVotesCurrentMonth()

{

    global $pdo;
    $sql = "SELECT h.nom, v.date_vote , count( if( concat(year(v.date_vote),'-', month(v.date_vote)) = concat(year(CURRENT_DATE),'-', month(CURRENT_DATE))   , 1 , null)) as count from humeur h left outer join vote v on v.id_humeur = h.id group by h.nom, v.date_vote";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_service', $idService, PDO::PARAM_INT);  
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}


function lastDayCurrentMonth()

{

    global $pdo;
    $sql = 'select day(last_day(CURRENT_DATE)) as month';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
    
}

