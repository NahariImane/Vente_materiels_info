<?php
    session_start(); 
    $_SESSION = array();
    setcookie(session_name(),' ',time()-1);
    session_destroy();
    header('location: ../VisiteurAnonyme/Login2.php');
?>