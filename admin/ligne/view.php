<?php
require_once( 'connexion.php' );
$sql = "SELECT id, ligne, numlettre, dir1, dir2, conducteur FROM `ajouterligne` WHERE `id` = ".(int)$_GET['id'];
$results = $connexion->query( $sql );
$row = $results->fetchObject()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
</head>
<body>
    <p>Le user s'appelle <?=$row->ligne?> <?=$row->numlettre?></p>
</body>
</html>