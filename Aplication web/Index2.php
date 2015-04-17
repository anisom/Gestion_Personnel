<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="container">
    <div class="login">
	<center><img src="m2l.png"></center>
      <h1><center>Connexion a la base de donnée</center></h1>
      <form method="post" action="">
        <p><center><input type="text" name="login" value="" placeholder="Pseudo ou Email" required></center></p>
        <p><center><input type="password" name="password" value="" placeholder="mot de passe" required></center></p>
        <center><p class="submit"><input type="submit" name="commit" value="Conexion"></p></center>
      </form>
	   <?php
		require "Connexion.php";
		session_start();
	  ?>
	  
	  </div>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    </div>
</body>

