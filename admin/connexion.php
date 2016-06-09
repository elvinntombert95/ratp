<?php
try{
    $connexion = new PDO( 'mysql:host=localhost;dbname=ratpcrud;charset=utf8' , 'root' , 'root' );
} catch( Exception $e ){
    die( $e->getMessage() );
}

/* 'mysql:host=db621374832.db.1and1.com;dbname=db621374832;charset=utf8' , 'dbo621374832' , 'ratp2015' */