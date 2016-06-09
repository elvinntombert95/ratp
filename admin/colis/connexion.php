<?php
try{
    $connexion = new PDO( 'mysql:host=localhost;dbname=ratpcrud;charset=utf8' , 'root' , 'root' );
} catch( Exception $e ){
    die( $e->getMessage() );
}