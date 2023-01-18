<?php
    session_start();
    if ($_SESSION['role'] == 0){
        session_destroy();
        header('Location: index.php?login_err=deconnexion');
    } else{
        session_destroy();
        header('Location: indexAdmin.php?login_err=deconnexion');
    }
    
?>