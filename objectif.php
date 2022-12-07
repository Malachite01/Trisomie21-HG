<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Ajouter un enfant</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>

    <?php
    session_start();
    require('QUERY.php');
    testConnexion();
    faireMenu();
    ?>

    <h1><?php afficherUnIntituleObjectif($_POST['idObjectif']) ?></h1>

</body>

</html>