<?php

function getHumeurAll()
{
    global $pdo;
    $sql = 'SELECT id, nom, emoticone from humeur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}

function vote(){
    global $pdo;
    $sql = 'INSERT INTO vote ( id_service, id_humeur, date_vote ) VALUES (:id_service,:id_humeur,:date_vote)';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return 'view/votefait.html.php';
    
}