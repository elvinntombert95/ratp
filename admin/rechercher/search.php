<?php
require_once('../connexion.php');
define('TAILLE_PAGE' , 25);
?>
<form action="search.php" method="get">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="email" placeholder="email">
    <input type="submit" value="rechercher">
</form>
<ul>
<?php
// CONSTRUIRE LES CONDITIONS VENANT DU FORMULAIRE DE RECHERCHE
// init des variables a vide
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
if(isset($_GET['prenom']) && $_GET['prenom']!='' ){
    $conditions[] = "`prenom` LIKE '%".$_GET['prenom']."%'";
}
// test de la condition sur nom
if(isset($_GET['nom']) && $_GET['nom']!='' ){
    $conditions[] = "`nom` LIKE '%".$_GET['nom']."%'";
}
// test de la condition sur email
if(isset($_GET['email']) && $_GET['email']!='' ){
    $conditions[] = "`email` LIKE '%".$_GET['email']."%'";
}
if(count($conditions) > 0){
    $sql_condition = "WHERE ".implode( "\n    AND " , $conditions );
}
$sql = "SELECT
  `id`,
  `prenom`,
  `nom`,
  `email`
FROM
  `utilisateur`
".$sql_condition."
LIMIT ".$limit."
";
echo $sql;
$stmt = $connexion->prepare( $sql );
$stmt->execute();
while($row = $stmt->fetch()){
?>
    <li><?=$row['prenom']?> <?=$row['nom']?> <?=$row['email']?> </li>
<?php
}
?>
</ul>
