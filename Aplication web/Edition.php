<head>
  <meta charset="utf-8">
  <title>Page administrateur</title>
  <link rel="stylesheet" href="css/style.css">
  <link  rel= "stylesheet"  href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" >
</head>
<body>
<center><img src="m2l.png"></center>
<h2><center>Gestion des compte administrateur</center></h2>
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
require("Connexion.php");
session_start();
if(!isset($_SESSION['id'])){
	header('location : index.php');
}
?>
</body>
