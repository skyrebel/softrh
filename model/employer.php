<?php

function getHumeurAll()

{
    global $pdo;
    $sql = 'SELECT id, nom, emoticone from humeur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function vote($id_service, $id_humeur, $date_vote)

{
    
    global $pdo;
    $sql = 'INSERT INTO vote( id_service, id_humeur, date_vote ) VALUES(:id_service,:id_humeur,:date_vote)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_service', $id_service, PDO::PARAM_INT);
    $sth->bindParam(':id_humeur', $id_humeur, PDO::PARAM_INT);
    $sth->bindParam(':date_vote', $date_vote, PDO::PARAM_STR);
    $sth->execute();
    
}

function userHasVote($id_user, $date_vote)

{
    
    global $pdo;
    $sql = 'INSERT INTO `has-voted`( id_utilisateur, date_vote ) VALUES (:id_utilisateur,:date_vote)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_utilisateur', $id_user, PDO::PARAM_INT);
    $sth->bindParam(':date_vote', $date_vote, PDO::PARAM_STR);
    $sth->execute();
    
}

function verifHasVoted($userId)
{
    
    global $pdo;
    $sql = 'SELECT id_utilisateur from `has-voted` where id_utilisateur = :userid and date_vote =  CURDATE() ';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':userid', $userId, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}



