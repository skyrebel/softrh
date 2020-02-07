<?php

require_once 'core/db.php';
require_once 'model/employer.php';
require_once 'vendor/autoload.php';



function defaultAction()
{
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }
    
    $humeurs = getHumeurAll();
    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('employer.html.twig');
    echo $template->render([
        'humeurs' => $humeurs

    ]);
}



function  hasvotedAction()
{
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }

    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('votefait.html.php');
    echo $template->render();
}


<<<<<<< HEAD
function voteAction(){
    session_start();
=======
function voteAction()
{
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }
    
>>>>>>> ea2535e71ae8c31843b88464003015a409c9271f
    global $uri;
    $exprReg = "#\/[0-9]+#";
    preg_match($exprReg, $uri, $matches);

    if (count($matches) === 0) {
        $humeurs = getHumeurAll();
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        $template = $twig->load('employer.html.twig');
        echo $template->render([
            'humeurs' => $humeurs

        ]);
        return;
    }
<<<<<<< HEAD
    setlocale(LC_TIME, 'fra_fra');
    $date = strftime('%d/%m/%Y');
    $humeur_id = intval( substr( $matches[0], 1));
    $id_user = $_SESSION['user']['id'];
<<<<<<< HEAD
    header('Location: /employer/has_vote');
=======

    $id = intval(substr($matches[0], 1));
>>>>>>> ea2535e71ae8c31843b88464003015a409c9271f
=======
    header('Location: /employer/validationvote');
}

function validationVoteAction(){
    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('validation-vote.html.twig');
    echo $template->render();
>>>>>>> efc643d7806cf5466623a618f40b8600472e4c83
}

$action = 'default';

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controller) + 1)  === false) ? substr($uri, strpos($uri, '/', strlen($controller)) + 1) : substr($uri,  strlen($controller) + 1, (strpos($uri, '/', strlen($controller) + 1) - 1) - (strlen($controller) - 1) - 1);
}


switch ($action) {

    case  'default':
    case  "";
        defaultAction();
        break;
    case  'vote':
        voteAction();
<<<<<<< HEAD
    break;
    case 'has_vote':
        hasvotedAction();
    break;
    case 'validationvote':
        validationVoteAction();
    default :
      require_once 'view/404.html.php';
}
=======
        break;
    default:
        require_once 'view/404.html.php';
}
>>>>>>> ea2535e71ae8c31843b88464003015a409c9271f
