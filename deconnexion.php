<?php
    session_start();
    session_destroy();
    if ($_SESSION['role'] == 0){
        header('Location: index.php?login_err=deconnexion');
    } else{
        header('Location: indexAdmin.php?login_err=deconnexion');
    }
    
?>