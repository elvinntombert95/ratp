<?php
require_once( '../connexion.php' );
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
	<header class="header"><!-- DEBUT HEADER -->
		<button class="hamburger">☰</button>
			<button class="cross">&#735;</button>
				<div class="menu">
					<ul>
					    <a href="../ligne" class="animsition-link"><li>Ajouter une ligne</li></a>
						<a href="../rechercher" class="animsition-link"><li>Rechercher une ligne</li></a>
						<a href="../retard" class="animsition-link"><li>Ajouter un retard</li></a>
						<a href="#" class="animsition-link"><li>Ajouter un colis suspect</li></a>
					</ul>
				</div>
		<a href="../"><img src="../img/arrow.png" class="previous"></a> 
	</header><!-- FIN HEADER -->

	<div class="background-image">
		<h1>COLIS SUSPECT</h1>
	</div>

	<div class="page-one">
		<div class="bloc-1">
			<form action="add-2.php" method="post">
				<h2>AJOUTER UN COLIS SUSPECT</h2><br><br>
					<p><label>Type de ligne :</label> 
						<select name="ligne" id="ligne">
				            <option value="METRO">METRO</option>
				            <option value="RER">RER</option>
				            <option value="BUS">BUS</option>
				            <option value="TRANSILIEN">TRANSILIEN</option>
				            <option value="NOCTILIEN">NOCTILIEN</option>
				            <option value="RERTARD">LE RER MAGIQUE JAMAIS EN RETARD</option>
			       		</select>
			       	</p>
			       	
			       	<p><label>Numéro/Lettre : </label>
			       		<input type="text" name="numlettre" id="numlettre"></input>
			       	</p>

					<p><label>Station : </label>
						<input type="text" name="station" id="station"></input> <!-- Jusqu'à <input type="text" name="dir2" id="dir2"></input> -->
					</p>

					<p><label>Nom du lacheur de colis : </label>
						<input type="text" name="lacheur" id="lacheur"></input></input>
					</p>

					<p><label>Interrompre le traffic ? : </label>
						<input type="checkbox" name="interrompre" value="OUI" id="interrompre">OUI</input>
					    <input type="checkbox" name="interrompre" value="NON" id="interrompre">NON</input>
					</p>

					<p><label>Temps d'attente : </label>
						<input type="time" name="wait" id="wait"></input>
					</p>

					<input type="submit" value="AJOUTER" id="add"></input>
			</form>
		</div>

		<div class="bloc-2">
			<ul class="views">
				<h2 style="margin-bottom:15px">COLIS SUSPECT DEPOSÉS</h2>
					<div class="buttons">
						<button class="metro">METRO</button>
						<button class="rer">RER</button>
						<button class="bus">BUS</button>
					</div>
					<?php
					// liste des users
					$sql = "SELECT id, ligne, numlettre, station, lacheur, interrompre, wait FROM `ajouter_colis`";
					$results = $connexion->query( $sql );
					while( $row = $results->fetchObject()){
					    echo "<li>".$row->ligne.' : '.$row->numlettre.
					    ' <br> STATION : '.$row->station.
					    ' <br> NOM DU LACHEUR n°2 : '.$row->lacheur.
					    ' <br> TRAFFIC INTERROMPU : '.$row->interrompre.
					    ' <br> TEMPS D\'ATTENTE : '.$row->wait."<br>"
					         ."<a href=\"update.php?id=".$row->id."\">MODIFIER</a>  "
					         ."<a href=\"delete.php?id=".$row->id."\">SUPPRIMER</a>  <br>"
					         ."</li>\n";
					}
					?>
		    </ul>
		</div>
	</div>
<script type="text/javascript">
//NAVBAR A AFFICHER
				$( ".cross" ).hide();
	$( ".menu" ).hide();
	$( ".hamburger" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".hamburger" ).hide();
	$( ".cross" ).show();
	});
	});

	$( ".cross" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".cross" ).hide();
	$( ".hamburger" ).show();
	});
	});

     (function ($) {
        $(document).ready(function(){
          $(function () {
              $(window).scroll(function () {
                  if ($(this).scrollTop() > 50) {
                      $('.header').css({"padding": "0" , "-webkit-transition": "0.5s" , "-moz-transition": "0.5s" , "background-color" : "black"});
                  } else {
                      $('.header').css({"padding": "0" , "background": "none"});
                  }
              });
          });
        });
      }(jQuery));
</script>
</body>
</html>