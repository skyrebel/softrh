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
    $sql = 'INSERT INTO vote ( id_service, id_humeur, date_vote ) VALUES (:id_service,:id_humeur,:date_vote)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id_service', $id_service, PDO::PARAM_INT);
    $sth->bindParam(':id_humeur', $id_humeur, PDO::PARAM_INT);
    $sth->bindParam(':date_vote', $date_vote, PDO::PARAM_STR);
    $sth->execute();
    
}
