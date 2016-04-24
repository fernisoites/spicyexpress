<?php
session_start();
if(isset($_SESSION['username'])){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-3600);
    }
    session_destroy();
}
$home_url = 'index.php';
header('Location:'.$home_url);
?>