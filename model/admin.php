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

function getserviceById($idService)
{
    global $pdo;
    $sql = 'SELECT id from service where id=:idService';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':idService', $idService);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function getHumeursAll()
{
    global $pdo;
    $sql = 'SELECT id, nom, emoticone, class_color from humeur';
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

function getAllVotesCurrentWeekByService($idhumeur, $numberDay, $idService )
{ 
    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and weekday(date_vote) = :numberDay and id_service= :idService ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT);
    $sth->bindParam(':idService',intval($idService), PDO::PARAM_INT);     
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


function getAllVotesCurrentMonthByService($idhumeur, $numberDay, $idService )
{ 
    global $pdo;
    $sql = "select count(date_vote)as count from vote where week(date_vote) = week(CURRENT_DATE) and id_humeur = :idhumeur  and day(date_vote) = :numberDay and id_service= :idService ";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':numberDay', $numberDay, PDO::PARAM_INT);  
    $sth->bindParam(':idhumeur',intval($idhumeur), PDO::PARAM_INT);
    $sth->bindParam(':idService',intval($idService), PDO::PARAM_INT);     
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
