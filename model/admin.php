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
    $sql = 'SELECT id, nom from service';
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

function getAllVotesCurrentWeek($idhumeur, $numberDay )

{ 

    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and weekday(date_vote) = :numberDay ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT);    
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}

function getAllVotesCurrentMonth($idhumeur, $numberDay )

{ 

    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and day(date_vote) = :numberDay ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT);    
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}



function lastDayCurrentMonth()

{

    global $pdo;
    $sql = 'select day(last_day(CURRENT_DATE)) as month';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
    
}


function getServiceVotesCurrentWeek($idhumeur, $numberDay, $service )

{ 

    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and weekday(date_vote) = :numberDay and id_service = :idservice ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT); 
    $sth->bindParam(':idservice', $service, PDO::PARAM_INT);   
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}

function getServiceVotesCurrentMonth($idhumeur, $numberDay, $service )

{ 

    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and day(date_vote) = :numberDay and id_service = :idservice  ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT);
    $sth->bindParam(':idservice', $service, PDO::PARAM_INT);      
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}

function selectidService($service)
{

    global $pdo;
    $sql = 'SELECT id from service WHERE id = :service';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':service', $service, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}