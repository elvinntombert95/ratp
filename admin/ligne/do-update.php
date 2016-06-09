<?php
require_once( '../connexion.php' );
$sql = "UPDATE `ajouterligne`
        SET
          `ligne` = :ligne,
		  `numlettre` = :numlettre,
		  `dir1` = :dir1,
		  `dir2` = :dir2,
          `conducteur` = :conducteur
        WHERE id = :id
        LIMIT 1";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':id' , $_POST['id'] );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':dir1' , $_POST['dir1'] );
$stmt->bindValue( ':dir2' , $_POST['dir2'] );
$stmt->bindValue( ':conducteur' , $_POST['conducteur'] );
$stmt->execute();
header( 'Location: index.php' );
