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
    
    if ($login == false){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);
        $template = $twig->load('login.html.twig');
        echo $template->render(['error'=>true, 'errorMessage'=>'veuillez renseigner correctement les champs demandés']);
        return;
    }
    return ('view/login.html.twig');
    require_once 'view/login.html.twig';
    
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



    default:
        require_once 'view/404.html.php';
}
