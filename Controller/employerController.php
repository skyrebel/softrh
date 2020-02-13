<?php

require_once 'core/db.php';
require_once 'model/employer.php';
require_once 'vendor/autoload.php';



function defaultAction()
{
    global $subProject;
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: '.$subProject.'/');
        return;
    }

    $id_user = $_SESSION['user']['id'];
    $verifhasvote = verifHasVoted($id_user);
    
    if ($verifhasvote !== false) { 
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $template = $twig->load('deja-vote.html.twig');
        echo $template->render(['subProject' => $subProject]);
        return;
    }

    $humeurs = getHumeurAll();
    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('employer.html.twig');
    echo $template->render([
        'humeurs' => $humeurs,
        'subProject' => $subProject

    ]);
}



function hasvotedAction()
{
    global $subProject;
session_start();
if (!isset($_SESSION['user'])) {
header('Location: '.$subProject.'/');
return;
}

    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, ['cache' => false]);
    $template = $twig->load('validation-vote.html.twig');
    echo $template->render(['subProject' => $subProject]);
}





function voteAction()
{
    global $subProject;
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: '.$subProject.'/');
        return;
    }

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
            'humeurs' => $humeurs,
            'subProject' => $subProject
        ]);
        return;
    }

    setlocale(LC_TIME, 'fr_FR');
    $date = strftime('%Y-%d-%m');
    $humeur_id = intval(substr($matches[0], 1));
    $id_user = $_SESSION['user']['id'];
    
    $verifhasvote = verifHasVoted($id_user);
    var_dump($verifhasvote);
    if ($verifhasvote !== false) { 
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $template = $twig->load('deja-vote.html.twig');
        echo $template->render(['subProject' => $subProject]);
        return;
    }

    setlocale(LC_TIME, 'fr_FR');
    $date = strftime('%Y-%m-%d');
    $humeur_id = intval(substr($matches[0], 1));
    $id_service = $_SESSION['user']['id_service'];
    vote($id_service, $humeur_id,$date);

    userHasVote($id_user, $date);

    header('Location: '.$subProject.'/employer/has_vote');
   
}

function validationVoteAction()
{
    global $subProject;
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: '.$subProject.'/');
        return;
    }

    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('validation-vote.html.twig');
    echo $template->render(['subProject' => $subProject]);
}

$action = 'default';

if (strpos($uri, '/', 1) !== false) {
    $action = (strpos($uri, '/', strlen($controller) + 1) === false) ? substr($uri, strpos($uri, '/', strlen($controller)) + 1) : substr($uri, strlen($controller) + 1, (strpos($uri, '/', strlen($controller) + 1) - 1) - (strlen($controller) - 1) - 1);
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
