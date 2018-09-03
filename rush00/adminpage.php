<?php
session_start();
if ($_SESSION['access'] != 1)
	header('Location: admin.php');
$users = unserialize(file_get_contents("private/user.db"));
$namea = unserialize(file_get_contents("private/article.db"));
if ($_POST['Nom'] && $_POST['suppar'] == "Supprimer")
{
	$ar = array();
	foreach($namea as $value)
	{
		if ($_POST['Nom'] != $value['name'])
		{
			$ar["id"] = $value['id'];
			$ar["name"] = $value['name'];
			$ar["price"] = $value['price'];
			$ar["categorie"] = $value['categorie'];
			$ar["url"] = $value['url'];
			$arr[] = $ar;
			file_put_contents("private/article.db", serialize($arr));
		}		
	}
}
if ($_POST['Nom'] && $_POST['supprus'] == "Supprimer" && $_POST['Nom'] != "admin")
{
	$ar = array();
	foreach($users as $key => $value)
	{
		if ($_POST['Nom'] != $value['login'])
		{
			$arr[] = $users[$key];
			file_put_contents("private/user.db", serialize($arr));
		}
	}
}
if ($_POST['ID'] && $_POST['Nom'] && $_POST['Prix'] && $_POST['Categorie'] && $_POST['Url'] && $_POST['createar'] == "Creer")
{
	$ar = array();
	foreach($namea as $value)
	{
		if ($_POST['ID'] != $value['id'])
		{
			$ar["id"] = $value['id'];
			$ar["name"] = $value['name'];
			$ar["price"] = $value['price'];
			$ar["categorie"] = $value['categorie'];
			$ar["url"] = $value['url'];
			$arr[] = $ar;
			file_put_contents("private/article.db", serialize($arr));
		}
	}
	$ar["id"] = $_POST['ID'];
	$ar["name"] = $_POST['Nom'];
	$ar["price"] = $_POST['Prix'];
	$ar["categorie"] = $_POST['Categorie'];
	$ar["url"] = $_POST['Url'];
	$arr[] = $ar;
	file_put_contents("private/article.db", serialize($arr));
}
if ($_POST['ID'] && $_POST['modifar'] == "Modifier")
{
	$ar = array();
	foreach($namea as $value)
	{
		if ($_POST['ID'] != $value['id'])
		{
			$ar["id"] = $value['id'];
			$ar["name"] = $value['name'];
			$ar["price"] = $value['price'];
			$ar["categorie"] = $value['categorie'];
			$ar["url"] = $value['url'];
			$arr[] = $ar;
			file_put_contents("private/article.db", serialize($arr));
		}
		else
		{
			$ar["id"] = $_POST['ID'];
			if ($_POST['Nom'])
				$ar["name"] = $_POST['Nom'];
			else
				$ar["name"] = $value['name'];
			if ($_POST['Prix'])
				$ar["price"] = $_POST['Prix'];
			else
				$ar["price"] = $value['price'];
			if ($_POST['Categorie'])
				$ar["categorie"] = $_POST['Categorie'];
			else
				$ar["categorie"] = $value['categorie'];
			if ($_POST['Url'])
				$ar["url"] = $_POST['Url'];
			else
				$ar["url"] = $value['url'];
			$arr[] = $ar;
			file_put_contents("private/article.db", serialize($arr));
		}
	}
}
if ($_POST['login'] && $_POST['modifus'] == "Modifier" && $_POST['login'] != "admin")
{	
	$ar = array();
	foreach($users as $value)
	{
		if ($_POST['login'] != $value['login'])
		{
			$ar["email"] = $value['email'];
			$ar["login"] = $value['login'];
			$ar["access"] = $value['access'];
			$ar["passwd"] = $value['passwd'];
			$ar["porte"] = $value['porte'];
			$ar["rue"] = $value['rue'];
			$ar["codpost"] = $value['codpost'];
			$ar["ville"] = $value['ville'];
			$ar["nom"] = $value['nom'];
			$ar["apt"] = $value['apt'];
			$arr[] = $ar;
			file_put_contents("private/user.db", serialize($arr));
		}
		else
		{
			if ($_POST['newlogin'])
				$ar["login"] = $_POST['newlogin'];
			else
				$ar["login"] = $value['login'];
			if ($_POST['mail'])
				$ar["email"] = $_POST['mail'];
			else
				$ar["email"] = $value['email'];
			if ($_POST['access'])
				$ar["access"] = $_POST['access'];
			else
				$ar["access"] = $value['access'];
			if ($_POST['passwd'])
				$ar["passwd"] = $_POST['passwd'];
			else
				$ar["passwd"] = $value['passwd'];
			echo $ar['login'];
			$arr[] = $ar;
			file_put_contents("private/user.db", serialize($arr));
		}
	}
}
if ($_POST['mail'] && $_POST['login'] && $_POST['newpw'] && $_POST['createus'] == "Creer")
{
	$ar = array();
	foreach($users as $key => $value)
	{
		if ($_POST['login'] == $value['login'])
			$check = -1;
		$arr[] = $users[$key];
		file_put_contents("private/user.db", serialize($arr));
	}
	if ($check != -1)
	{
		$ar = array();
		$ar['login'] = $_POST['login'];
		$ar['access'] = $_POST['access'];
		$ar['passwd'] = hash("whirlpool", $_POST['newpw']);
		$ar['email'] = $_POST['mail'];
		$arr[] = $ar;
		file_put_contents("private/user.db", serialize($arr));
	}
}
if ($_POST['categorie'] && $_POST['suppca2'] == "Supprimer")
{
	$ar = array();
	foreach($namea as $value)
	{
		$cat = explode(";", $value['categorie']);
		foreach($cat as $key => $test)
		{
			if ($_POST['categorie'] == $test)
				$cat[$key] = "";
		}
		$ar["id"] = $value['id'];
		$ar["name"] = $value['name'];
		$ar["price"] = $value['price'];
		$ar["categorie"] = rtrim(ltrim(implode(";", $cat), ";"), ";");
		$ar["url"] = $value['url'];
		$arr[] = $ar;
		file_put_contents("private/article.db", serialize($arr));
		$check = 0;
	}
}
if ($_POST['categorie'] && $_POST['suppca'] == "Supprimer")
{
	$ar = array();
	foreach($namea as $value)
	{
		$cat = explode(";", $value['categorie']);
		foreach($cat as $test)
		{
			if ($_POST['categorie'] == $test)
				$check = 1;
		}
		if ($check != 1)
		{
			$ar["id"] = $value['id'];
			$ar["name"] = $value['name'];
			$ar["price"] = $value['price'];
			$ar["categorie"] = $value['categorie'];
			$ar["url"] = $value['url'];
			$arr[] = $ar;
			file_put_contents("private/article.db", serialize($arr));
		}
		$check = 0;
	}
}
$histodb = unserialize(file_get_contents("private/histo.db"));
if ($_POST['ID'] && $_POST['histo'] == "Supprimer")
{
	$ar = array();
	foreach($histodb as $value)
	{
		if ($_POST['ID'] != $value['ID'])
		{
			$ar['commande'] = $value['commande'];
			$ar['login'] = $value['login'];
			$ar['ID'] = $value['ID'];
			$arr[] = $ar;
			file_put_contents("private/histo.db", serialize($arr));
		}
	}
	file_put_contents("private/histo.db", serialize($arr));
}
if ($_POST['logout'] == "Se deconnecter")
{
	session_destroy();
	session_unset();
	header('Location: admin.php');
}
?>

<html>
	<head>
		<title>Admin page</title>
		<meta charset="utf-8">
	</head>
	<body style="background-image: url('https://www.desktopbackground.org/download/o/2010/04/15/2260_download-wallpapers-2560x1440-spot-light-bright-mac-imac-27-hd_2560x1440_h.jpg'); background-repeat: no-repeat; background-position: center;  background-size: cover;">
		<form action="adminpage.php" method="post">
			<input type="submit" name="logout" value="Se deconnecter" />
		</form>
		<h1 style="text-align:center; Font-Family: 'Times New Roman', Serif;">Une belle page admin</h1>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Supprimer un utilisateur</h3>
				<p>Liste des utilisateurs ["user"]: <?php
$usr = unserialize(file_get_contents("private/user.db"));
foreach($usr as $value)
	echo "[\"".$value['login']."\"]";
?></p>
				Nom: <input type="text" name="Nom" value="" />
				<input type="submit" name="supprus" value="Supprimer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Supprimer un article</h3>
				<p>Liste des noms ["Nom"]: <?php
$nm = unserialize(file_get_contents("private/article.db"));
foreach($nm as $value)
	echo "[\"".$value['name']."\"]";
?></p>
				Nom: <input type="text" name="Nom" value="" />
				<input type="submit" name="suppar" value="Supprimer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Creer un arcticle</h3>
				<p>Liste des ID ["ID"]: <?php
$nm = unserialize(file_get_contents("private/article.db"));
foreach($nm as $value)
	echo "[\"".$value['id']."\"]";
?></p>
				ID: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="ID" value="" />
				<br/>
				Nom:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Nom" value="" />
				<br/>
				Prix:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Prix" value="" />
				<br/>
				Categorie: <input type="text" name="Categorie" value="" />
				<br/>
				Image-url: <input type="text" name="Url" value="" />
				<br/>
				<input type="submit" name="createar" value="Creer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Modifier un arcticle</h3>
				ID: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="ID" value="" />
				<br/>
				Nom:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Nom" value="" />
				<br/>
				Prix:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="Prix" value="" />
				<br/>
				Categorie: <input type="text" name="Categorie" value="" />
				<br/>
				Image-url: <input type="text" name="Url" value="" />
				<br/>
				<input type="submit" name="modifar" value="Modifier" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Modifier un utilisateur</h3>
				<p>Liste des utilisateurs ["user"]: <?php
$usr = unserialize(file_get_contents("private/user.db"));
foreach($usr as $value)
	echo "[\"".$value['login']."\"]";
?>
				<br/>
				Nom: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="login" value="" />
				<br/>
				Nouveau Nom:<input type="text" name="newlogin" value="" />
				<br/>
				Mail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="mail" value="" />
				<br/>
				Droits d'acces: <input type="text" name="access" value="" />
				<br/>
				<input type="submit" name="modifus" value="Modifier" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Creer un utilisateur</h3>
				<p>Liste des users ["user"]: <?php
$usr = unserialize(file_get_contents("private/user.db"));
foreach($usr as $value)
	echo "[\"".$value['login']."\"]";
?></p>
				login: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="login" value="" />
				<br/>
				Mot de passe:<input type="text" name="newpw" value="" />
				<br/>
				Mail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="mail" value="" />
				<br/>
				Droit d'acces:<input type="text" name="access" value="" />
				<br/>
				<input type="submit" name="createus" value="Creer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Supprimer les articles par categorie</h3>
				<p>Liste des noms ["categorie"]: <?php
$nm = unserialize(file_get_contents("private/article.db"));
foreach($nm as $value)
	echo "[\"".$value['categorie']."\"]";
?></p>
				Categorie: <input type="text" name="categorie" value="" />
				<input type="submit" name="suppca" value="Supprimer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Supprimer une categorie</h3>
				<p>Liste des noms ["categorie"]: <?php
$nm = unserialize(file_get_contents("private/article.db"));
foreach($nm as $value)
	echo "[\"".$value['categorie']."\"]";
?></p>
				Categorie: <input type="text" name="categorie" value="" />
				<input type="submit" name="suppca2" value="Supprimer" />
			</form>
		</div>
		<div>
			<form action="adminpage.php" method="post">
				<h3>Historique de commande</h3>
				ID : <input type="text" name="ID" value="" />
				<input type="submit" name="histo" value="Supprimer" />
			</form>
<?php $histo = unserialize(file_get_contents("private/histo.db"));
if (!$histo)
	echo "Historique vide";
foreach($histo as $value)
{
	echo $value['ID'];
	echo "<br />";
	echo $value['login'];
	echo "<br />";
	echo $value['commande'];
	echo "<br />";
	echo "<br />";
}
?>
			</form>
		</div>
	</body>
</html>
