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
    $sql = 'SELECT  '
}




