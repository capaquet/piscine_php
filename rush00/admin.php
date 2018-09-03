<?php
session_start();
if ($_POST['access'] == 1)
	header('Location: adminpage.php');
if ($_POST["submit"] == "OK")
{
	$login = $_POST['login'];
	if ($_SESSION['access'] == 1)
		header('Location: adminpage.php');
	$passwd = hash("whirlpool", $_POST['passwd']);
	$arr = unserialize(file_get_contents("private/user.db"));
	$flag = "FALSE";
	$message = "Mauvais identifiant.";
	foreach($arr as $value)
	{
		if ($value['login'] == $login)
		{
			$message = "Mauvais mot de passe.";
			if ($value['passwd'] == $passwd)
			{
				$message = "Tu n'es pas administrateur de ce site.";
				if ($value['access'] == 1)
				{
					$flag = "OK";
					$_SESSION['access'] = 1;
					header('Location: adminpage.php');
				}	
			}
		}
	}
}
else
	$message = "Merci de renseigner tous les champs";
?>
<html>
	<body style="background-image: url('https://www.desktopbackground.org/download/o/2010/04/15/2260_download-wallpapers-2560x1440-spot-light-bright-mac-imac-27-hd_2560x1440_h.jpg'); background-repeat: no-repeat; background-position: center;  background-size: cover;">
	<form action="admin.php" method="post">
		Identifiant:&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="login" value="" />
		<br />
		Mot de passe:<input type="password" name="passwd" value="" />
		<input type="submit" name="submit" value="OK" />
	</form>
	<p><?php if ($flag == "FALSE") echo $message ;?></p>
</body></html>
