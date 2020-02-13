<?php

$subProject = '/softrh';
$uri = $_SERVER['REQUEST_URI'];
// echo $uri;
$uri = str_replace($subProject, '', $uri);
// echo $uri;

   $controller = $uri;

   if( $uri !== "/"){
       $positionSlash = ( strpos( $uri, "/",1) === false)? strlen( $uri) : strpos( $uri, "/",1);
       $controller = substr( $uri, 0,$positionSlash );
      
   }
  
   switch($controller){
       case "/" :
        require_once 'controller/defaultController.php';
       break;

       case "/admin" :
        require_once 'controller/adminController.php';
       break;

       case "/employer" :
        require_once 'controller/employerController.php';
       break;

       case "/login" :
        require_once 'controller/loginController.php';
       break;


       default : 
       echo 'page 404';
   }
?>
