<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter objectif</title>
</head>

<body>
    <form action="" method="POST">
        <h1>Ajouter objectif</h1>
        <?php
        session_start();
        $id = $_SESSION['idConnexion'];
        require('QUERY.php');
        afficherNomPrenomEnfant();
        if (champRempli(array('champIntitule', 'champDuree', 'champLienObjectif', 'champPriorite', 'champNbJetons'))) {
            ajouterObjectif(
                $_POST['champIntitule'],
                $_POST['champDuree'],
                $_POST['champLienObjectif'],
                $_POST['champPriorite'],
                $_POST['champNbJetons'],
                $id,
                $_POST['idEnfant']
            );
        }
        ?>
        <label>Intitule :<input type="text" name="champIntitule" /></label>
        <label>Duree :<input type="text" name="champDuree" /></label>
        <label>Lien objectif :<input type="text" name="champLienObjectif" /></label>
        <label>Priorité :<input type="text" name="champPriorite" /></label>
        <label>Nombre de jetons :<input type="text" name="champNbJetons" /></label>
        <input type="submit">
        <input type="datetime-local" id="dateDebut">
        <input type="datetime-local" id="dateFin">
    </form>
</body>

</html>