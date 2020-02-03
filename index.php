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

       case"/employer" :
        require_once 'controller/employerController.php';
       break;

       default : 
       echo 'page 404';
   }
?>
