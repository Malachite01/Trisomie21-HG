<?php
    session_destroy();
    header('Location: index.php?login_err=deconnexion');
?>