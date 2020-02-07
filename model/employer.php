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
    $sql = 'INSERT INTO `vote`( `id_service`, `id_humeur`, `date_vote`) VALUES ($,2,"2020-02-05")';
}

function verifHasVoted($userId)
{
    global $pdo;
    $sql = 'SELECT id_utilisateur from has-voted where id_utilisateur = :userid and date_vote =  CURDATE() ';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':userid', $userId, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}



