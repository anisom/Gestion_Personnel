<html lang="en">

<head>
  <script src="/bootstrap/js/jquery.cookie.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GestionEmploye</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
require "Connexion.php";
session_start();
if(!isset($_SESSION['id'])){
header('Location:Index.php');
}
//ID
$sth = $connexion->prepare("SELECT id_ligue FROM employe WHERE id_emp = :id");
$sth->execute(array(
'id' => $_SESSION['id']
));
$result = $sth->fetch(PDO::FETCH_ASSOC);
//ID_LIGUE
$id_ligue = $result['id_ligue'];
$sth2 = $connexion->prepare("SELECT id_emp, nom_emp, prenom_emp, mail_emp FROM employe WHERE id_ligue = :ligue");
$sth2->execute(array(
'ligue' => $id_ligue
));
$sth3 = $connexion->prepare("SELECT nom_ligue FROM ligue WHERE id_ligue = :ligue");
$sth3->execute(array(
'ligue'=> $id_ligue
));
$resultat1 = $sth3->fetch(PDO::FETCH_ASSOC);
?>
<a href="Deconnexion.php">Deconnexion</a>

<center>
<br>
<br>
<img src='bootstrap/img/Logo.png' width="470px">
<br>
<br>	
<h4><CAPTION><?php 
echo "Employé(e)s de la ligue : " . $resultat1['nom_ligue'];
?></CAPTION></h4><br>
<table border="1">
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>Mail</th>
</tr>
<?php
while($resultat = $sth2->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo $resultat['nom_employe'];?></td>
<td><?php echo $resultat['prenom_employe'];?></td>
<td><?php echo $resultat['mail_employe'];?></td>
</tr>
<?php
}
?>
</table>
<br>
<button id="Ajouter">Ajouter</button>
<script>
    document.getElementById("Ajouter").onclick = function () {
        location.href = "Ajouter.php";
    };
</script>
<button id="Modifier">Modifier</button>
<script>
    document.getElementById("Modifier").onclick = function () {
        location.href = "Modifier.php";
    };
</script>
<button id="Supprimer">Supprimer</button>
<script>
    document.getElementById("Supprimer").onclick = function () {
        location.href = "Supprimer.php";
    };
</script>
</center>
</body>