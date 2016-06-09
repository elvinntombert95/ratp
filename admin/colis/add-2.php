<?php
require_once( '../connexion.php' );
$sql = "INSERT INTO `ajouter_colis`
        (id, ligne, numlettre, station, lacheur, interrompre, wait )
        VALUES
        ( null, :ligne, :numlettre, :station, :lacheur, :interrompre, :wait )
        ";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':ligne' , $_POST['ligne'] );
$stmt->bindValue( ':numlettre' , $_POST['numlettre'] );
$stmt->bindValue( ':station' , $_POST['station'] );
$stmt->bindValue( ':lacheur' , $_POST['lacheur'] );
$stmt->bindValue( ':interrompre' , $_POST['interrompre'] );
$stmt->bindValue( ':wait' , $_POST['wait'] );

$stmt->execute();
header( 'Location:addcolis.php' );

