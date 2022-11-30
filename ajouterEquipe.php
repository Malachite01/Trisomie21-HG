<?php
session_start();
require('QUERY.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php afficherNomPrenomEnfant();?>
<?php afficherNomPrenomMembre();?>
<label for="champRole">Role :</label>
      <input type="text" name="champRole" placeholder="Entrer le role de cette personne" minlength="1" maxlength="50" required>
      <span></span>
</body>
</html>