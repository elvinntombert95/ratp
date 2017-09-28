<?php
require_once( '../connexion.php' );
$sql = "UPDATE `ajouter_colis`
        SET
          `ligne` = :ligne,
		  `numlettre` = :numlettre,
		  `station` = :station,
		  `lacheur` = :lacheur,
          `interrompre` = :interrompre,
          `wait` = :wait
        WHERE id = :id
        LIMIT 1";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':id' , $_POST['id'] );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':station' , $_POST['station'] );
$stmt->bindValue( ':lacheur' , $_POST['lacheur'] );
$stmt->bindValue( ':interrompre' , $_POST['interrompre'] );
$stmt->bindValue( ':wait' , $_POST['wait'] );

$stmt->execute();
header( 'Location: index.php' );
