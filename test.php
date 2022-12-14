<?php
$mdp = password_hash('azertyuiop', PASSWORD_DEFAULT);
$mdp2 = password_hash('azertyuiop', PASSWORD_DEFAULT);
$mdp3 = password_hash('poiuytreza', PASSWORD_DEFAULT);
$mdp4 = password_hash('azertyuiop' . 'BrIc3 4rNaUlT 3sT Le MeIlLeUr d3s pRoFesSeUrs !', PASSWORD_DEFAULT);

echo 'azertyuiop(1) :   ' . $mdp . '';
echo '<br>';

echo 'azertyuiop(2) :   ' . $mdp2 . '';
echo '<br>';

echo 'poiuytreza    :   ' . $mdp3 . '';
echo '<br>';

echo 'azertyuiop(3) + BrIc3 4rNaUlT 3sT Le MeIlLeUr d3s pRoFesSeUrs !    :   ' . $mdp4 . '';
echo '<br>';
echo '<br>';
echo '<br>';

echo 'Réponse mot de passe pareil azertyuiop(1) et azertyuiop :';
echo '<br>';
echo '<br>';
if (password_verify('azertyuiop', $mdp)) {
    echo 'Même mot de passe';
} else {
    echo 'Mot de passe différent';
}
echo '<br>';
echo '<br>';

echo 'Réponse mot de passe pareil azertyuiop(2) et azertyuiop :';
echo '<br>';
echo '<br>';
if (password_verify('azertyuiop', $mdp2)) {
    echo 'Même mot de passe';
} else {
    echo 'Mot de passe différent';
}
echo '<br>';
echo '<br>';

echo 'Réponse mot de passe pareil poiuytreza et poiuytreza:';
echo '<br>';
echo '<br>';
if (password_verify('poiuytreza', $mdp3)) {
    echo 'Même mot de passe';
} else {
    echo 'Mot de passe différent';
}
echo '<br>';
echo '<br>';

echo 'Réponse mot de passe pareil poiuytreza et azertyuiop:';
echo '<br>';
echo '<br>';
if (password_verify('azertyuiop', $mdp3)) {
    echo 'Même mot de passe';
} else {
    echo 'Mot de passe différent';
}
echo '<br>';
echo '<br>';

echo 'Réponse mot de passe pareil azertyuiop(3) + BrIc3 4rNaUlT 3sT Le MeIlLeUr d3s pRoFesSeUrs ! et aaazertyuiop:';
echo '<br>';
echo '<br>';
if (password_verify('azertyuiop' . 'BrIc3 4rNaUlT 3sT Le MeIlLeUr d3s pRoFesSeUrs !', $mdp4)) {
    echo 'Même mot de passe';
} else {
    echo 'Mot de passe différent';
}
echo '<br>';
echo '<br>';
