<?php
require_once( '../connexion.php' );
$sql = "SELECT id, ligne, numlettre, motif, temps FROM `ajouter_retard` WHERE `id` = ".(int)$_GET['id'];
$results = $connexion->query( $sql );
$row = $results->fetchObject()
?>

<html>
<head>
	<title>RATP | Retard</title>
	<meta charset="utf-8">

	<!--CSS Principal-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- FADE PAGE -->
		<!-- animsition.css -->
		<link rel="stylesheet" href="dist/css/animsition.min.css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- animsition.js -->
		<script src="dist/js/animsition.min.js"></script>
		<script type="text/javascript" src="js/fade.js"></script>
	<!-- /FADE PAGE -->

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