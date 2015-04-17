<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="container">
    <div class="login">
	<center><img src="m2l.png"></center>
      <h1><center>Connexion au compte des employés</center></h1>
      <form method="post" action="">
        <p><center><input type="text" name="login" value="" placeholder="Pseudo ou Email" required></center></p>
        <p><center><input type="password" name="password" value="" placeholder="mot de passe" required></center></p>
        <center><p class="submit"><input type="submit" name="commit" value="Conexion"></p></center>
      </form>
	  <?php
	  require "Connexion.php";
session_start();

if(isset($_POST['login'], $_POST['password'])){
$username = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
$hash = sha1($password);

$sth = $connexion->prepare("SELECT id_employe, nom_employe, admin, id_ligue FROM employe WHERE nom_employe = :username AND password = :password");
$sth->execute(array(
'username' => $username,
'password' => $hash
));
$result = $sth->fetch(PDO::FETCH_ASSOC);
$_SESSION['id'] =  $result['id_employe'];
$_SESSION['ligue'] = $result['id_ligue'];
  if(isset($_SESSION['id']))// la connexion fonctionne			
  {
  if($result['admin'] == 1)// si l'employe est admin
    {
      if(!is_null($result['admin']))// si l'employe est admin
	  {
		header('Location: Edition.php');
	  }
    else// si on le reconais pas dans la base de donnés 
	{
      echo 'Nom ou mot de passe incorrect, veuillez réesayer';
    }
  }
  else // si l'employe n'est pas admin
  {
    echo 'Espace reservés aux administrateurs';
	header('Location: Employe.php');
  }

}
else {
echo 'Nom ou mot de passe incorrect, veuillez réesayer';
	}
}
	  ?>
    </div>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    </div>
</body>

