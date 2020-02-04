<?php

function getHumeurAll()
{
    global $pdo;
    $sql = 'SELECT id, nom, emoticone from Humeur';
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}





