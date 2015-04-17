<?php
$connexion = new PDO('mysql:host=localhost;dbname=gestion_personnel;charset=utf8', 'root', '');

/*
function LoggIn(){
	session_start();
	if(!empty($_POST['username']))
	{
	$query = mysql_query("SELECT *  FROM employe where nom_emp = '$_POST[username]' AND hashPassword = '$_POST[password]'") or die(mysql_error());
	$row = mysql_fetch_array($query) or die(mysql_error());
	if(!empty($row['nom_emp']) AND !empty($row['hashPassword']))
	{
		$_SESSION['nom_emp'] = $row['hashPassword'];
		echo "Connexion a votre compte reussite...";

	}
	else
	{
		echo "Desole une erreur de connexion est survenue, reesayer...";
	}
}
}
if(isset($_POST['submit']))
{
	LoggIn();
}
*/
?>
