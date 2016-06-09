<?php
require_once( '../connexion.php' );
$sql = "INSERT INTO `ajouter_retard`
        (id, ligne, numlettre, motif, temps )
        VALUES
        ( null, :ligne, :numlettre, :motif, :temps )
        ";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':motif' , $_POST['motif'] );
$stmt->bindValue( ':temps' , $_POST['temps'] );

$stmt->execute();
header( 'Location: index.php' );

