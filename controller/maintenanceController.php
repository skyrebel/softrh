<?php

require_once 'core/db.php';
require_once 'model/maintenances.php';

function defaultAction(){
    $maintenances = getmaintenancesAll();
    require_once 'view/maintenances.html.php';
}

function detailAction(){
    global $uri;
    // RÉCUPÉRER L'ID
    $exprReg = "#/[0-9]+#";
    preg_match($exprReg, $uri, $matches);
    var_dump($matches);

    if( count($matches) === 0 ){
        require_once 'view/votefait.html.php';
        return;
    }

    $id = intval( substr($matches[0], 1) );
    $maintenance = getmaintenancesByid($id);
    var_dump($maintenance);

    if ( $maintenance === false ){
        require_once 'view/votefait.html.php';
        return;
    }

    require_once 'view/detailmaintenance.html.php';
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