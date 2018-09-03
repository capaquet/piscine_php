<?PHP
function	create_array()
{
	$hash_tab_user = array("login" => $_POST['login'],
		"passwd" => hash(whirlpool,$_POST['passwd']),
		"nom" => $_POST['nom'],
		"prenom" => $_POST['prenom'],
		"email" => $_POST['email'],
		"porte" => $_POST['porte'],
		"appt" => $_POST['appt'],
		"rue" => $_POST['rue'],
		"codpost" => $_POST['codpost'],
		"ville" => $_POST['ville'],);
	return ($hash_tab_user);
}

function control_formulaire()
{
	if (empty($_POST['login']) === TRUE || $_POST['login'] == NULL)
		echo "<script>alert('Erreur - Login manquant')</script>";
	else if (empty($_POST['passwd']) === TRUE || $_POST['passwd'] == NULL)
		echo "<script>alert('Erreur - Mot de passe manquant')</script>";
	else if (empty($_POST['nom']) === TRUE || $_POST['nom'] == NULL)
		echo "<script>alert('Erreur - Nom manquant')</script>";
	else if (empty($_POST['prenom']) === TRUE || $_POST['prenom'] == NULL)
		echo "<script>alert('Erreur - Prenom manquant')</script>";
	else if (empty($_POST['porte']) === TRUE || $_POST['porte'] == NULL)
		echo "<script>alert('Erreur - Numero de porte manquant')</script>";
	else if (empty($_POST['rue']) === TRUE || $_POST['rue'] == NULL)
		echo "<script>alert('Erreur - Nom de rue manquant')</script>";
	else if (empty($_POST['codpost']) === TRUE || $_POST['codpost'] == NULL)
		echo "<script>alert('Erreur - Code posteal manquant')</script>";
	else if (empty($_POST['ville']) === TRUE || $_POST['ville'] == NULL)
		echo "<script>alert('Erreur - Ville manquante')</script>";
	else
		return;
}

function user_create()
{
	control_formulaire();
	if (file_exists("./private") === FALSE)
		mkdir ("./private");
	$info = create_array();
	if (file_exists("./private/user.db"))
	{
		$file = file_get_contents("./private/user.db");
		$file = unserialize($file);
		foreach ($file as $user)
		{
			if (control_doublon($user) === 0)
				return (false);
		}
	}
	$file[] = $info;
	$file = serialize($file);
	file_put_contents("./private/user.db", $file);
	echo "<script>alert('Creation du compte utlisateur OK')</script>";
}

function	control_doublon($user)
{
	if ($user['login'] === $_POST['login'])
		echo "<script>alert('Erreur - Login deja utilise')</script>";
	else if (($user['nom'] === $_POST['nom']) &&  ($user['prenom'] === $_POST['prenom']))
		echo "<script>alert('Erreur - Utilisateur deja enregistre')</script>";
	else if ($user['email'] === $_POST['email'])
		echo "<script>alert('Erreur - Adresse email deja enregistree')</script>";
	else if (preg_match("/^\w+@\w+.[a-zA-Z]+$/", $email) === FALSE)
		echo "<script>alert('Erreur - Format d\'email errone')</script>";
	else
		return (1);
	return (0);
}


function user_modif()
{
	if (isset($_SESSION['loggued_on_user']) == FALSE || $_SESSION['loggued_on_user'] == NULL)
	{
		echo "<script>alert('Erreur - Utilisateur non authentifie')</script>";
	}
	control_formulaire();
	$file = file_get_contents("private/user.db");
	$file = unserialize($file);
	$modif = 0;
	$i = 0;
	foreach ($file as $user)
	{
		if ($_SESSION['loggued_on_user'] === $user[login])
		{
			$new_file[] = create_array();
			$modif = 1;
			echo "<script>alert('Modification du compte reussie')</script>";
		}
		else
		{
			$new_file[] = $user;
		}
	}
	file_put_contents("./private/user.db", serialize($new_file));
	if ($modif == 0)
		echo "<script>alert('La modification du compte a echoue')</script>";
}


function user_delete()
{
	if (isset($_SESSION['loggued_on_user']) == FALSE || $_SESSION['loggued_on_user'] == NULL)
	{
		echo "<script>alert('Utilisateur non authentifie')</script>";
	}

	$file = file_get_contents("./private/user.db");
	$file = unserialize($file);
	foreach ($file as $user)
	{
		if ($user['login'] !== $_SESSION['loggued_on_user'])
			$new_file[] = $user;
	}
	if (empty($new_file))
		unlink("private/user.db");
	else
		file_put_contents("private/user.db", serialize($new_file));
	session_unset();
	session_destroy();
	echo "<script>alert('Suppression du compte reussie')</script>";
}

function user_login()
{
  control_login_form();
  $login = $_POST['login'];
  $passwd = $_POST['passwd'];
  if (auth($login, $passwd))
  {
      $_SESSION['loggued_on_user'] = $login;
      echo "<script>alert('Authentification OK')</script>";
  }
  else
  {
      $_SESSION['loggued_on_user'] = "";
      echo "<script>alert('Authentification KO')</script>";
  }
}

function auth($login, $passwd)
{
	if (file_exists("./private/user.db"))
  {
		$file = file_get_contents("./private/user.db");
  	$file = unserialize($file);
		foreach ($file as $user)
  	{
    	if ($user['login'] === $login && $user['passwd'] === hash(whirlpool, $passwd))
      	return (TRUE);
  	}
	}
  return (FALSE);
}

function control_login_form()
{
	if (isset($_POST['login']) === FALSE || $_POST['login'] == NULL)
		echo "<script>alert('Erreur - Login manquant')</script>";
	else if (isset($_POST['passwd']) === FALSE || $_POST['passwd'] == NULL)
		echo "<script>alert('Error - Mot de passe manquant')</script>";
	else
		return;
}

function user_logout()
{
	if (session_unset() === TRUE && session_destroy() === TRUE)
	{
		echo"<script>alert('Deconnexion reussie')</script>";
	}
}
?>
