<?php
require_once( '../connexion.php' );
$sql = "SELECT id, ligne, numlettre, dir1, dir2, conducteur FROM `ajouterligne` WHERE `id` = ".(int)$_GET['id'];
$results = $connexion->query( $sql );
$row = $results->fetchObject()
?>

<html>
<head>
	<title>RATP Spoil | Ile De France</title>
	<meta charset="utf-8">

	<!--CSS Principal-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
	<!--CSS Principal-->	

</head>
<body>

	<header class="header"><!-- DEBUT HEADER -->
<!-- 		<button class="hamburger">☰</button>
			<button class="cross">&#735;</button>
				<div class="menu">
					<ul>
					    <a href="#" class="animsition-link"><li>Ajouter une ligne</li></a>
						<a href="../rechercher" class="animsition-link"><li>Rechercher une ligne</li></a>
						<a href="../retard" class="animsition-link"><li>Ajouter un retard</li></a>
						<a href="../colis" class="animsition-link"><li>Ajouter un colis suspect</li></a>
					</ul>
				</div> -->
		<a href="../"><img src="../img/arrow.png" class="previous"></a> 
	</header><!-- FIN HEADER -->
	
	<div class="addligne update">
		<form action="do-update.php" method="post">
			<input type="hidden" name="id" value="<?=$row->id?>">
				<h2>MODIFIER UNE LIGNE</h2><br><br>
					<p>Type de ligne : 
						<select name="ligne" id="ligne" value="<?=$row->ligne?>">
				            <option value="METRO">METRO</option>
				            <option value="RER">RER</option>
				            <option value="BUS">BUS</option>
				            <option value="TRANSILIEN">TRANSILIEN</option>
				            <option value="NOCTILIEN">NOCTILIEN</option>
			       		</select>
			       	</p><br><br>
			       	
			       	<p>Numéro/Lettre : 
			       		<input type="text" name="numlettre" id="numlettre" value="<?=$row->numlettre?>"></input>
			       	</p><br><br>

					<p>
						Direction : de <input type="text" name="dir1" id="dir1" value="<?=$row->dir1?>"></input> à <input type="text" name="dir2" id="dir2" value="<?=$row->dir2?>"></input>
					</p><br><br>

					<p>
						Nom du conducteur : <input type="text" name="conducteur" id="conducteur" value="<?=$row->conducteur?>"></input></input>
					</p><br><br>

					<input type="submit" value="MODIFIER" id="add"></input>
		</form>
	</div>
</body>
</html>
