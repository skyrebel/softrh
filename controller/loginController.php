<?php

require_once 'core/db.php';
require_once 'model/login.php';

function defaultAction(){
    
    // on teste la déclaration de nos variables
    if (isset($_POST['nom']) && isset($_POST['password'])) {
        // on affiche nos résultats
        echo 'Votre nom est '.$_POST['nom'].' et votre fonction est '.$_POST['password'];
    }
    
    $login = getlogin($nom, $pwd);
    require_once 'view/login.html.php';
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
   
    default :
      require_once 'view/404.html.php';
}