<?php

require_once 'core/db.php';
require_once 'model/admin.php';
require_once 'vendor/autoload.php';

function defaultAction()
{
    //Vérifier si la personne est connectée
    //Si c'est pas le cas retour sur l'url de base home
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }

    
    $lastDayOfMonth = lastDayCurrentMonth();
    $listHumeur = getHumeursAll();
    $votesCurrentWeek = [];
    $role = $_SESSION['user']['role'];
    $listOfDayMonth = [];
    
    for( $i = 1; $i <= intval($lastDayOfMonth['month']); $i++ ){
        if( $i < 10 ){
            $listOfDayMonth[] = '0'.$i;
            continue;
        }

        $listOfDayMonth[] = $i;
    }

    $day = array(
        "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"
    );
    

    for( $i = 0; $i < 5; $i++ ){
       $votesCurrentWeek[$i]['y']= $day [$i];
       $a = getAllVotesCurrentWeek($listHumeur[0]["id"], $i );
       $b = getAllVotesCurrentWeek($listHumeur[1]["id"], $i );
       $c = getAllVotesCurrentWeek($listHumeur[2]["id"], $i );
      
       $votesCurrentWeek[$i]['a']= intval($a["count"]);
       $votesCurrentWeek[$i]['b']= intval($b["count"]);
       $votesCurrentWeek[$i]['c']= intval($c["count"]);
    }



    $votesCurrentMonth=[];
    for( $i = 1; $i <= $lastDayOfMonth["month"]; $i++ ){
        if ($i< 10 ){
            $numberDay='0'.$i;
        }
        else{
            $numberDay=$i;
    }

        
        $votesCurrentMonth[$i-1]['y']= $numberDay;
        $a = getAllVotesCurrentMonth($listHumeur[0]["id"], $i );
        $b = getAllVotesCurrentMonth($listHumeur[1]["id"], $i );
        $c = getAllVotesCurrentMonth($listHumeur[2]["id"], $i );
       
        $votesCurrentMonth[$i-1]['a']= intval($a["count"]);
        $votesCurrentMonth[$i-1]['b']= intval($b["count"]);
        $votesCurrentMonth[$i-1]['c']= intval($c["count"]);
      }


    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    $services = getservicesAll();
    $template = $twig->load('admin.html.twig');
    echo $template->render([
        'listHumeur' => $listHumeur,
        'votesCurrentweek' => json_encode($votesCurrentWeek),
        'votesCurrentmonth'=> json_encode($votesCurrentMonth),
        'role' => $role,
        'listOfDayMonth' => $listOfDayMonth


    ]);  
 
}


function serviceAction(){
     //Vérifier si la personne est connectée
    //Si c'est pas le cas retour sur l'url de base home
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /');
        return;
    }



    global $uri;
    $exprReg = "#\/[0-9]+#";
    preg_match($exprReg, $uri, $matches);
//echo var_dump($matches) ;
    if (count($matches) === 0) {
         header('Location: /admin');
        return;
    }
   // $loader = new \Twig\Loader\FilesystemLoader('view');

    
    $idservice = intval(substr($matches[0], 1)); 
    $serviceifexist = selectidService($idservice); 
    if ($serviceifexist === false){
        header('Location: /admin');
    }
    $lastDayOfMonth = lastDayCurrentMonth();
    $listHumeur = getHumeursAll();
    $votesCurrentWeek = [];
    $role = $_SESSION['user']['role'];
    $listOfDayMonth = [];
    
    for( $i = 1; $i <= intval($lastDayOfMonth['month']); $i++ ){
        if( $i < 10 ){
            $listOfDayMonth[] = '0'.$i;
            continue;
        }

        $listOfDayMonth[] = $i;
    }

    $day = array(
        "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"
    );
    

    for( $i = 0; $i < 5; $i++ ){
    $votesCurrentWeek[$i]['y']= $day [$i];
    $a = getServiceVotesCurrentWeek($listHumeur[0]["id"],  $i, $idservice );
    $b = getServiceVotesCurrentWeek($listHumeur[1]["id"],  $i, $idservice );
    $c = getServiceVotesCurrentWeek($listHumeur[2]["id"],  $i, $idservice );

       $votesCurrentWeek[$i]['a']= intval($a["count"]);
       $votesCurrentWeek[$i]['b']= intval($b["count"]);
       $votesCurrentWeek[$i]['c']= intval($c["count"]);
    }
    $votesCurrentMonth=[];
    for( $i = 1; $i <= $lastDayOfMonth["month"]; $i++ ){
        if ($i< 10 ){
            $numberDay='0'.$i;
        }
        else{
            $numberDay=$i;
    }

        
        $votesCurrentMonth[$i-1]['y']= $numberDay;
        $a = getServiceVotesCurrentMonth($listHumeur[0]["id"], $i, $idservice );
        $b = getServiceVotesCurrentMonth($listHumeur[1]["id"], $i, $idservice );
        $c = getServiceVotesCurrentMonth($listHumeur[2]["id"], $i, $idservice );
       
        $votesCurrentMonth[$i-1]['a']= intval($a["count"]);
        $votesCurrentMonth[$i-1]['b']= intval($b["count"]);
        $votesCurrentMonth[$i-1]['c']= intval($c["count"]);
      }




    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    $services = getservicesAll();
    $template = $twig->load('admin.html.twig');
    echo $template->render([
        'listHumeur' => $listHumeur,
        'votesCurrentweek' => json_encode($votesCurrentWeek),
        'votesCurrentmonth'=> json_encode($votesCurrentMonth),
        'services'=> $services,
        'role' => $role,
        'listOfDayMonth' => $listOfDayMonth,
        'debug' => true,


    ]);  
    $twig->addExtension(new \Twig\Extension\DebugExtension());
}


 $action = 'default';

if (strpos($uri, '/', 1) !== false) {
$action = (strpos($uri, '/', strlen($controller) + 1) === false) ? substr($uri, strpos($uri, '/', strlen($controller)) + 1) : substr($uri, strlen($controller) + 1, (strpos($uri, '/', strlen($controller) + 1) - 1) - (strlen($controller) - 1) - 1);
}


switch ($action) {

    case  'default':
    case  '':
        defaultAction();
        break;

    case 'service':
        serviceAction();   
        break;

    default:
        require_once 'view/404.html.twig';
}
