<?php

require_once 'core/db.php';
require_once 'model/admin.php';
require_once 'vendor/autoload.php';

function defaultAction()
{
    //Vérifier si la personne est connectée
    //Si c'est pa sle cas retour sur l'url de base home
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }

    
    $lastDayOfMonth = lastDayCurrentMonth();
    $listHumeur = getHumeursAll();
    $votesCurrentDay = getAllVotesCurrentDay();
    $votesCurrentMonth = getAllVotesCurrentMonth();
    $services = getservicesAll();
    $role = $_SESSION['user']['role'];
    $listOfDayMonth = [];
    
    for( $i = 1; $i <= intval($lastDayOfMonth['month']); $i++ ){
        if( $i < 10 ){
            $listOfDayMonth[] = '0'.$i;
            continue;
        }

        $listOfDayMonth[] = $i;
    }

    
    

    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    $template = $twig->load('admin.html.twig');
    echo $template->render([
        'listHumeur' => $listHumeur,
        'votesCurrentDay' => $votesCurrentDay,
        'votesCurrentMonth' => $votesCurrentMonth,
        'role' => $role,
        'listOfDayMonth' => $listOfDayMonth,
        'services' => $services


    ]);
}







$action = 'default';

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controller) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controller)) + 1) : substr($uri,  strlen($controller) + 1, (strpos($uri, '/', strlen($controller) + 1) - 1) - (strlen($controller) - 1) - 1);
}


switch ($action) {

    case  'default':
    case  "":
        defaultAction();
        break;
    
    default:
        require_once 'view/404.html.twig';
}
