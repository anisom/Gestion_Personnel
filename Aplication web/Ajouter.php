<head>
  <meta charset="utf-8">
  <title>Page administrateur</title>
  <link rel="stylesheet" href="css/style.css">
  <link  rel= "stylesheet"  href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<center><img src="m2l.png"></center>
<h2><center>Gestion d'un compte administrateur</center></h2>
      <div class="container">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Edition.php">Accueil</a></li>
			<li><a href="Ajouter.php">Ajouter une ligue</a></li>
            <li><a href="Modifier.html">Modifier</a></li>
			<li><a href="Suprimer.html">Suprimer</a></li>
          </ul>
        </div>
      </div>
<?php
require "Connexion.php";
session_start();
if(!isset($_SESSION['id'])){
header('Location:Index.php');
}
//Selectionne l'id de la ligue corespondent a l'employer
$sth = $connexion->prepare("SELECT id_ligue FROM employe WHERE id_employe = :id");
$sth->execute(array(
'id' => $_SESSION['id']
));
$result = $sth->fetch(PDO::FETCH_ASSOC);

//Selectionne l'employe de la ligue en question  
$id_ligue = $result['id_ligue'];
$sth2 = $connexion->prepare("SELECT id_employe, nom_employe, prenom_employe, mail FROM employe WHERE id_ligue = :ligue");
$sth2->execute(array(
'ligue' => $id_ligue
));
//Selectionne la ligue corespondent
$sth3 = $connexion->prepare("SELECT nom_ligue FROM ligue WHERE id_ligue = :ligue");
$sth3->execute(array(
'ligue'=> $id_ligue
));
$resultat1 = $sth3->fetch(PDO::FETCH_ASSOC);
echo "Employe(e)s de la ligue : " . $resultat1['nom_ligue'];

?>
</CAPTION></h4><br>
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
<td><?php echo $resultat['mail'];?></td>
</tr>
<?php
}
?>
      <form method="post" action="">
        <p><center><input type="text" name="id_employe" value="" placeholder="id employe" required></center></p>
        <p><center><input type="text" name="Nom" value="" placeholder="Nom" required></center></p>
		<p><center><input type="text" name="Prenom" value="" placeholder="Prenom" required></center></p>
		<p><center><input type="text" name="email" value="" placeholder="email" required></center></p>
        <center><p class="submit"><input type="submit" name="commit" value="valider"></p></center>
      </form>

</body>