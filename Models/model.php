<?php

function getProduction (){

    $pdo =getPdo ();
    $production = $pdo->query('Requete SQL a Entrer');
    return $production;
}

function getSecretariat (){

    $pdo =getPdo ();
    $production = $pdo->query('Requete SQL a Entrer');
    return $secretariat;
}

function getMaintenance (){

    $pdo =getPdo ();
    $production = $pdo->query('Requete SQL a Entrer');
    return $maintenance;
}

function getInformatique (){

    $pdo =getPdo ();
    $production = $pdo->query('Requete SQL a Entrer');
    return $informatique;
}


