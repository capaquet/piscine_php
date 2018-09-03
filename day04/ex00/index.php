<?php
session_start();
if ($_GET[submit] === "OK")
{
	$_SESSION[login] = $_GET[login];
	$_SESSION[passwd] = $_GET[passwd];
}
?>
<html><body>
  <form action="index.php" method="GET">
	Identifiant: <input type="text" name="login" value="<? echo $_SESSION[login]?>" />
	<br />
	Mot de passe: <input type="text" name="password" value="<? echo $_SESSION[passwd]?>" />
	<br />
	<input type="submit" name="submit" value="OK"></button>
  </form>
</body></html>
