<?php

require_once 'core/db.php';
require_once 'model/login.php';
require_once 'vendor/autoload.php';



function verifAction()
{

    // on teste la déclaration de nos variables
    if (!isset($_POST['email']) && !isset($_POST['password'])) {

        header('Location: /');
        return;
    }

    $login = getlogin($_POST['email'], $_POST['password']);

    if ($login == false) {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        $template = $twig->load('login.html.twig');
        echo $template->render(['error' => true]);
        return;
    }

    // Démarrage ou restauration de la session
    session_start();

    //Création de la variable session user
    $_SESSION['user'] = $login;

    if (strtolower($_SESSION['user']["role"]) == 'admin') {

        header('Location: /admin');

        return;
    } else {      

        header('Location: /employer');

        return;
    }
}


function logoutAction(){
        // Démarrage ou restauration de la session
    session_start();
    // Réinitialisation du tableau de session
    // On le vide intégralement
    $_SESSION = array();
    // Destruction de la session
    session_destroy();
    // Destruction du tableau de session
    unset($_SESSION);

    header('Location: /');
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
    case 'verif':
        verifAction();

        break;

    case 'logout':
        logoutAction();

    break;
    
    default:
        require_once 'view/404.html.php';
}
