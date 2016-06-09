<?php
require_once( '../connexion.php' );
define('TAILLE_PAGE' , 25);
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
						<a href="#" class="animsition-link"><li>Rechercher une ligne</li></a>
						<a href="../retard" class="animsition-link"><li>Ajouter un retard</li></a>
						<a href="../colis" class="animsition-link"><li>Ajouter un colis suspect</li></a>
					</ul>
				</div>
		<a href="../"><img src="../img/arrow.png" class="previous"></a> 
	</header><!-- FIN HEADER -->

	<div class="background-image">
		<h1>RECHERCHER</h1>
	</div>

	<div class="recherche">
		<form action="searchline.php" method="get">
			<input type="text" class="search" name="search" placeholder="EX : RER A"/>
				<button>RECHERCHER</button>
		</form>
	</div>

	<?php 
	$conditions = [];
$sql_condition = '';
$limit = (string)TAILLE_PAGE;
// test de la page
if(isset($_GET['page']) && $_GET['page']!='' ){
    $page = (int) $_GET['page'];
    if($page <= 0){
        $page = 1;
    }
    $limit = ($page - 1)*TAILLE_PAGE.", ".TAILLE_PAGE;
}
// test de la condition sur prenom
if(isset($_GET['ligne']) && $_GET['ligne']!='' ){
    $conditions[] = "`ligne` LIKE '%".$_GET['ligne']."%'";
}
// test de la condition sur nom
if(isset($_GET['numlettre']) && $_GET['numlettre']!='' ){
    $conditions[] = "`numlettre` LIKE '%".$_GET['numlettre']."%'";
}
// test de la condition sur email
if(isset($_GET['dir1']) && $_GET['dir1']!='' ){
    $conditions[] = "`dir1` LIKE '%".$_GET['dir1']."%'";
}
if(isset($_GET['dir2']) && $_GET['dir2']!='' ){
    $conditions[] = "`dir2` LIKE '%".$_GET['dir2']."%'";
}
if(isset($_GET['conducteur']) && $_GET['conducteur']!='' ){
    $conditions[] = "`conducteur` LIKE '%".$_GET['conducteur']."%'";
}
if(count($conditions) > 0){
    $sql_condition = "WHERE ".implode( "\n    AND " , $conditions );
}
$sql = "SELECT
  `id`,
  `ligne`,
  `numlettre`,
  `dir1`,
  `dir2`,
  `conducteur`
FROM
  `ajouterligne`
".$sql_condition."
LIMIT ".$limit."
";
/*echo $sql;*/
$stmt = $connexion->prepare( $sql );
$stmt->execute();
while($row = $stmt->fetch()){
?>
    <li><?=$row['ligne']?> <?=$row['dir1']?> <?=$row['dir2']?> <?=$row['numlettre']?>  <?=$row['conducteur']?> </li>
<?php
}
?>
</ul>
	
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
	</script>
</body>
</html>