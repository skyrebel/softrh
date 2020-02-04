<?php

require_once 'core/db.php';
require_once 'model/employer.php';

function defaultAction(){

    // on teste la déclaration de nos variables
    if (isset($_POST['Nom']) && isset($_POST['Mot-de-passe'])) {
        // on affiche nos résultats
        echo 'Votre nom est '.$_POST['Nom'].' et votre fonction est '.$_POST['Mot-de-passe'];
    }
    
    $employers = getemployersAll();
    require_once 'view/employer.html.php';
}




$action = 'default';

if( strpos( $uri, '/', 1) !== false){
    $action = ( strpos( $uri, '/', strlen( $controller ) + 1 )  === false )? substr( $uri, strpos( $uri, '/', strlen( $controller ))+1) : substr( $uri,  strlen( $controller ) + 1, ( strpos( $uri, '/', strlen( $controller ) + 1 ) -1 ) - ( strlen( $controller ) - 1 ) -1    );

    
}


switch($action){

    case  'default' :
    case  "" ;    
        defaultAction();
    break;
    case  'detail' :
        detailAction();
    break;
    default :
      require_once 'view/404.html.php';
}