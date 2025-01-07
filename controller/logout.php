<?php
    session_start();
    // unset($_SESSION['flag']);
    setcookie('flag', 'true', time()-3600, '/');
    // setcookie('flag', 'true', time()-10, '/');
    header('location: ../view/login.php');
?>