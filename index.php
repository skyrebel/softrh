<?php

   $uri = $_SERVER['REQUEST_URI'];

   $controller = $uri;

   if( $uri !== "/"){
       $positionSlash = ( strpos( $uri, "/",1) === false)? strlen( $uri) : strpos( $uri, "/",1);
       var_dump($positionSlash);
       $controller = substr( $uri, 0,$positionSlash );
       var_dump($controller);
       echo 'chemin long';
   }

   switch($controller){
       case "/" :
        require_once 'controller/defaultController.php';
       break;

       case "/production" :
        require_once 'controller/productionController.php';
       break;

       case "/secretariat" :
        require_once 'controller/secretariatController.php';
       break;

       case "/maintenance" :
        require_once 'controller/maintenanceController.php';
       break;

       case "/informatique" :
        require_once 'controller/informatiqueController.php';
       break;

       case "/humeur" :
        require_once 'controller/humeurController.php';
       break;

       default : 
       echo 'page 404';
   }
?>
