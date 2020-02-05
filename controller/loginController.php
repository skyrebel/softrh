<?php

require_once 'core/db.php';
require_once 'model/login.php';

function verifAction(){
    
    // on teste la déclaration de nos variables
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // on affiche nos résultats
        echo 'Votre email est '.$_POST['email'].' et votre fonction est '.$_POST['password'];
    }
    
    $login = getlogin($_POST['email'], $_POST['password']);
    require_once 'view/login.html.twig';
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
   case 'verif' :
        verifAction();
    
   break;



    default :
      require_once 'view/404.html.php';
}