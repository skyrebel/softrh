<?php

require_once 'core/db.php';
require_once 'model/admin.php';

function defaultAction(){

        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

        $services = getservicesAll();
        $template = $twig->load('service.html.twig');
        echo $template->render([
            'services' => $services

    ]);
      
}


function adminHasVote(){
    
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

        $services = getservicesAll();
        $template = $twig->load('validation-vote.html.twig');
        echo $template->render([
            'services' => $services

    ]);
      
}



$action = 'default';

if( strpos( $uri, '/', 1) !== false){
    $action = ( strpos( $uri, '/', strlen( $controller ) + 1 )  === false )? substr( $uri, strpos( $uri, '/', strlen( $controller ))+1) : substr( $uri,  strlen( $controller ) + 1, ( strpos( $uri, '/', strlen( $controller ) + 1 ) -1 ) - ( strlen( $controller ) - 1 ) -1    );

    
}

switch ($action) {

    case 'default':
    case "";
        defaultAction();
        break;
    case 'vote':
        voteAction();

        break;
    case 'has_vote':
        hasvotedAction();
        break;
    case 'validationvote':
        validationVoteAction();
    // default :
    //   require_once 'validationvote.html.twig';
}