<?php
require_once( '../connexion.php' );
$sql = "UPDATE `ajouter_retard`
        SET
          `ligne` = :ligne,
		  `numlettre` = :numlettre,
		  `motif` = :motif,
          `temps` = :temps
        WHERE id = :id
        LIMIT 1";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':id' , $_POST['id'] );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':motif' , $_POST['motif'] );
$stmt->bindValue( ':temps' , $_POST['temps'] );

$stmt->execute();
header( 'Location: index.php' );
