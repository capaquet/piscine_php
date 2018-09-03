<?php
session_start();
$toto = 0;
include('user.php');
if ($_GET['login'] == 1)
	user_login();
if ($_GET['logout'] == 1)
	user_logout();
if ($_GET['create'] == 1)
	user_create();
if ($_GET['modif'] == 1)
	user_modif();
if ($_GET['delete'] == 1)
	user_delete();
if (!empty($_SESSION[loggued_on_user]))
{
	$toto = 1;
}
foreach ($_GET as $key => $value) {
	if($_GET[$key] === "Add to Cart"){
		if ($_SESSION["cart"])
			$_SESSION["cart"] = $_SESSION['cart'].";".$key;
		else
			$_SESSION["cart"] = $key;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>RUSH</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
<div id="id05" class="modal">
			<form class="modal-content animate" method="post" action="index.php?delete=1">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			<div class="container">
				<p>Voulez-vous supprimmer votre compte utilisateur ?</p>
				<button type="submit ">Supprimmer mon compte</button>
			</div>
			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Annuler</button>
			</div>
			</form>
		</div>
		<div id="id04" class="modal">
			<form class="modal-content animate" method="post" action="index.php?modif=1">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>

<?php
$file = file_get_contents("private/user.db");
$file = unserialize($file);
$account = 0;
foreach($file as $user_id => $user_info)
{
	if ($_SESSION[loggued_on_user] === $user_info[login])
		$account = $user_id;
}
?>

			<div class="container">
				<label for="uname"><b>Login</b></label>
				<input type="text" value=<?php echo $file[$account]['login']?> name="login" required>

				<label for="psw"><b>Mot de Passe</b></label>
				<input type="password" placeholder="Mot de passe" name="passwd" required>

				<label for="nom"><b>Nom</b></label>
				<input type="text" value=<?php echo $file[$account]['nom']?>  name="nom" required>

				<label for="prenom"><b>Prenom</b></label>
				<input type="text" value=<?php echo $file[$account]['prenom']?>  name="prenom" required>

				<label for="email"><b>Adresse E-mail</b></label>
				<input type="text" value=<?php echo $file[$account]['email']?> name="email" required>

				<label for="porte"><b>Numero de rue</b></label>
				<input type="text" value=<?php echo $file[$account]['porte']?> name="porte" required>

				<label for="appt"><b>Appartement</b></label>
				<input type="text" value=<?php echo $file[$account]['appt']?> name="appt" required>

				<label for="rue"><b>Rue</b></label>
				<input type="text" value=<?php echo $file[$account]['rue']?> name="rue" required>

				<label for="codpost"><b>Code Postal</b></label>
				<input type="text" value=<?php echo $file[$account]['codpost']?> name="codpost" required>

				<label for="ville"><b>Ville</b></label>
				<input type="text" value=<?php echo $file[$account]['ville']?> name="ville" required>

				<button type="submit ">Enregistrer les modifcations</button>
			</div>
			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Annuler</button>
			</div>
			</form>
		</div>

	<div id="id03" class="modal">
		<form class="modal-content animate" method="post" action="index.php?logout=1">
		<div class="imgcontainer">
			<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
		</div>

		<div class="container">
			<label for="uname"><b><?echo $_SESSION[loggued_on_user];?></b></label>
			<button type="submit ">Se déconnecter</button>
		</div>
		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Annuler</button>
			<button type="button" onclick="document.getElementById('id03').style.display='none'; document.getElementById('id04').style.display='block'" class="cancelbtn">Modifier mon compte</button>
			<button type="button" onclick="document.getElementById('id03').style.display='none'; document.getElementById('id05').style.display='block'" class="cancelbtn">Supprimer mon compte</button>
		</div>
		</form>
	</div>
	<div id="id02" class="modal">
		<form class="modal-content animate" method="post" action="index.php?create=1">
		<div class="imgcontainer">
			<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		</div>

		<div class="container">
			<label for="uname"><b>Login</b></label>
			<input type="text" placeholder="Enter Username" name="login" required>

			<label for="psw"><b>Mot de Passe</b></label>
			<input type="password" placeholder="Enter Password" name="passwd" required>

			<label for="nom"><b>Nom</b></label>
			<input type="text" placeholder="Enter Name" name="nom" required>

			<label for="prenom"><b>Prenom</b></label>
			<input type="text" placeholder="Enter Password" name="prenom" required>

			<label for="email"><b>Adresse E-mail</b></label>
			<input type="text" placeholder="Enter E-mail address" name="email" required>

			<label for="porte"><b>Numero de rue</b></label>
			<input type="text" placeholder="Enter Street Number" name="porte" required>

			<label for="appt"><b>Appartement</b></label>
			<input type="text" placeholder="Enter Flat Number" name="appt" required>

			<label for="rue"><b>Rue</b></label>
			<input type="text" placeholder="Enter Street name" name="rue" required>

			<label for="codpost"><b>Code Postal</b></label>
			<input type="text" placeholder="Enter Postal Code" name="codpost" required>

			<label for="ville"><b>Ville</b></label>
			<input type="text" placeholder="Enter City" name="ville" required>

			<button type="submit ">S'enregistrer</button>
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annuler</button>
		</div>
		</form>
	</div>
	<div id="id01" class="modal">
		<form class="modal-content animate" method="post" action="index.php?login=1">
		<div class="imgcontainer">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		</div>

		<div class="container">
			<label for="uname"><b>Login</b></label>
			<input type="text" placeholder="Enter Username" name="login" required>

			<label for="psw"><b>Mot de Passe</b></label>
			<input type="password" placeholder="Enter Password" name="passwd" required>

			<button type="submit ">Se connecter</button>
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
			<button type="button" onclick="document.getElementById('id02').style.display='block'; document.getElementById('id01').style.display='none'" class="cancelbtn">Pas de compte?</button>
		</div>
		</form>
	</div>

<script>
function addItem(id)
{
	document.getElementById('id_articles')
		console.log("id === "+ id);
	document.crea
}
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>
		<header>
				<div class="top-level-menu">
					<li><a href="index.php" class="">Accueil</a></li>
					<li>Categories
						<ul class="second-level-menu">
							<form action="index.php" method="get">
								<fieldset style="background-color : grey">
									<li><input type="checkbox" name="categories[]" value="Puzzle">Puzzle<label for="Puzzle"></li>
									<li><input type="checkbox" name="categories[]" value="Plate-forme">Plate-forme<label for="Plate-forme"></li>
									<li><input type="checkbox" name="categories[]" value="Combat">Combat<label for="Combat"</li>
									<li><input type="checkbox" name="categories[]" value="Horreur">Horreur<label for="Horreur"></li>
									<li><input type="checkbox" name="categories[]" value="Adulte">Adulte<label for="Adulte"></li>
									<li><input type="checkbox" name="categories[]" value="Quizz">Quizz<label for="Quizz"></li>
									<li><input type="checkbox" name="categories[]" value="Action">Action<label for="Action"></li>
									<li><input type="checkbox" name="categories[]" value="Arcade">Arcade<label for="Arcade"></li>
									<li><input type="checkbox" name="categories[]" value="Sport">Sport<label for="Sport"></li>
									<li><input type="submit" id="submit">	<label for="VALIDER"></input></li>
								</fieldset>
							</form>
						</ul>
					</li>

<?php
if ($toto === 0 )
	echo '<li onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Se connecter</button></li>';
else
	echo '<li onclick="document.getElementById(\'id03\').style.display=\'block\'" style="width:auto;">Mon compte</button> </li>';
?>
					<li >Voir mon panier
							<ul class="second-level-menu">
								<form action="" method="get">
								<fieldset style="background-color : grey">
<?php
if ($_GET['suppr'] === "supprimer")
{
	$arcookie = explode(";", $_SESSION["cart"]);
	$cart = "";
	foreach($_GET as $key => $elem)
	{
		foreach($arcookie as $value)
		{
			if ($value !== $key && $key !== "suppr" && $value !== "suppr")
			{
				if ($cart)
					$cart = $cart.";".$value;
				else
					$cart = $value;
			}
		}
	}
	$_SESSION["cart"] = $cart;
}
if ($_GET['valid'] === "valider")
{
	if ($_SESSION["cart"] && $_SESSION['loggued_on_user'])
	{
		$ar = array();
		$time = time();
		$ar['ID'] = $_SESSION['loggued_on_user'].$time;
		$ar['commande'] = $_SESSION['cart'];
		$ar['login'] = $_SESSION['loggued_on_user'];
		$_SESSION['cart'] = "";
		$ser = unserialize(file_get_contents("private/histo.db"));
		$arr[] = $ar;
		file_put_contents("private/histo.db", serialize($arr));
		if ($ser)
		{
			foreach($ser as $value)
			{
				$ar = array();
				$ar['ID'] = $value['ID'];
				$ar['commande'] = $value['commande'];
				$ar['login'] = $value['login'];
				$arr[] = $ar;
				file_put_contents("private/histo.db", serialize($arr));
			}
		}
	}


}
$pepito = explode(";", $_SESSION['cart']);
foreach ($pepito as $key => $value) {
	echo '<li><input type="checkbox" name="'.$pepito[$key].'">'.$pepito[$key].'</li>';
}
echo '<input type="submit" name="valid" value="valider">';
echo '<input type="submit" name="suppr" value="supprimer">';
?>
								</fieldset>
								</form>
							</ul>
					</li>
				</ul>
			</header>

			<main>
				<ul>
				<form action="#" method="get" class="subs">

<?php
$save = unserialize(file_get_contents("./private/article.db"));
if (!$save)
{
	echo "No more games...";
}
else
{
	$i = 0;
	$exist = 0;
	if ($_GET['categories'])
	{
		foreach($save as $key => $value)
		{
			$check = 0;
			$cat = explode(";", $value['categorie']);
			foreach($cat as $cat1)
			{
				foreach($_GET['categories'] as $cat2)
				{
					$cat2 = strtolower($cat2);
					if ($cat2 == $cat1)
						$check = 1;
				}
			}
			if ($check == 1)
			{
				$categorie = explode(";",$value['categorie']);
				echo '<li class="catCardList">
					<div class="catCard"><a href="#"><img src='; echo $value['url']; echo ' alt=""></a>
					<div class="lowerCatCard">
					<h3>';echo $value['name']; echo '</h3>
					<div class="startingPrice">Prices Starting At <span>'; echo $value['price']."€"; echo '</span></div>
					<h4>Présent dans ces catégories</h4>
					<ul class= "categories">';
				$i = 0; foreach($categorie as $key => $value)
					{
						if ($i > 0)
							echo ", ";
						echo $value."";
						$i++;
					}echo '</ul>
					<div id="catCardButton" class="button"><a href="#">Add to Cart</a></div>
					</div>
					</div>
					</li>';
			}
		}
	}
	else
	{
		foreach ($save as $key => $value)
		{
			$categorie = explode(";",$value['categorie']);
			echo '<li class="catCardList">
				<div class="catCard"><a href="#"><img src='; echo $value['url']; echo ' alt=""></a>
				<div class="lowerCatCard">
				<h3>';echo $value['name']; echo '</h3>
				<div class="startingPrice">Prices Starting At <span>'; echo $value['price']."€"; echo '</span></div>
				<h4>Présent dans ces catégories</h4>
				<ul class= "categories">';
			$i = 0; foreach($categorie as $key => $cat)
				{
					if ($i > 0)
						echo ", ";
					echo $cat."";
					$i++;
				}echo '</ul>
				<div id="catCardButton"><input type="submit" name="'.$value['name'].'" id='.$value['id'].' class="button" value="Add to Cart"></input></div>
				</div>
				</div>
				</li>';
		}
	}
}
?>
				</form>
				</ul>
			</main>
		</body>
		</html>
