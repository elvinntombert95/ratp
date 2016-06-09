<?php
require_once( '../connexion.php' );
$sql = "DELETE FROM `ajouterligne`
        WHERE id = :id
        LIMIT 1";
$stmt = $connexion->prepare( $sql );
$stmt->bindValue( ':id' , $_GET['id'] );
$stmt->execute();
header( 'Location: index.php' );
