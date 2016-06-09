<?php
require_once( '../connexion.php' );
$sql = "INSERT INTO `ajouterligne`
        (id, ligne, numlettre, dir1, dir2, conducteur )
        VALUES
        ( null, :ligne, :numlettre, :dir1, :dir2, :conducteur )
        ";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':dir1' , $_POST['dir1'] );
$stmt->bindValue( ':dir2' , $_POST['dir2'] );
$stmt->bindValue( ':conducteur' , $_POST['conducteur'] );

$stmt->execute();
header( 'Location: index.php' );

