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
echo '<br>';
echo '<br>';

echo 'Compression image :';
echo '<br>';
echo '<br>';

chmod('upload/image.jpg', 0777);

$target_size = 500000; // target file size in bytes
$quality = 50; // starting quality level

$image = imagecreatefromjpeg('upload/image.jpg');


echo 'Départ image ( upload/image.jpg ), taille :' . filesize('upload/image.jpg') . '';
echo '<br>';

$chemin = 'upload/image.jpg';

// loop until the file size is smaller than the target size
while (filesize($chemin) > $target_size) {
    // reduce the quality level
    // compress the image with the new quality level
    imagejpeg($image, 'upload/compressed_image.jpg', $quality);
    $chemin = 'upload/compressed_image.jpg';
}
chmod('upload/compressed_image.jpg', 0777);

echo 'Résultat image ( upload/compressed_image.jpg ), taille :' . filesize('upload/compressed_image.jpg') . '';
