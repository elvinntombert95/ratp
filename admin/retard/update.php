<?php
require_once( '../connexion.php' );
$sql = "SELECT id, ligne, numlettre, motif, temps FROM `ajouter_retard` WHERE `id` = ".(int)$_GET['id'];
$results = $connexion->query( $sql );
$row = $results->fetchObject()
?>

<html>
<head>
	<title>RATP | Retard A Temps Plein</title>
	<meta charset="utf-8">

	<!--CSS Principal-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
	<!--CSS Principal-->	

</head>
<body>

	<header id="page1">
		<h1 id="titre">BIENVENU SUR LE FAUX SITE DE LA RATP</h1>
			<nav class="primary">
	 				<ul>
						<li><a href="../index.php">ajouter une ligne</a></li>
	 					<li><a href="../rechercher/searchline.php">rechercher une ligne</a></li>
	 					<li><a href="../colis/addcolis.php">ajouter un colis suspect</a></li>
	 					<li><a href="addlate.php">ajouter un retard</a></li>	
	 				</ul>
	 			</nav>
	</header>
	
	<div id="addligne">
			<form action="do-update.php" method="post">
				<input type="hidden" name="id" value="<?=$row->id?>">
					<h2>MODIFIER UN RETARD</h2><br><br>
						<p>Type de ligne : 
							<select name="ligne" id="ligne" value="<?=$row->ligne?>">
					            <option value="METRO">METRO</option>
					            <option value="RER">RER</option>
					            <option value="BUS">BUS</option>
					            <option value="TRANSILIEN">TRANSILIEN</option>
					            <option value="NOCTILIEN">NOCTILIEN</option>
					            <option value="RERTARD">LE RER MAGIQUE JAMAIS EN RETARD</option>
				       		</select>
				       	</p><br><br>
				       	
				       	<p>Numéro/Lettre : 
				       		<input type="text" name="numlettre" id="numlettre" value="<?=$row->numlettre?>"></input>
				       	</p><br><br>

						<p>
							Motif : <input type="text" name="motif" id="motif" value="<?=$row->motif?>"></input>
						</p><br><br>

						<p>
							Temps d'attente : <input type="time" name="temps" id="temps" value="<?=$row->temps?>"></input>
						</p><br><br>

						<input type="submit" value="MODIFIER" id="add"></input>
		</form>
	</div>
<br><br><br>


</body>
</html>