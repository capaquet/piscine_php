<?php
if (isset($_POST[submit]) == FALSE || $_POST[submit] != "OK" || isset($_POST[login]) == FALSE || isset($_POST[oldpw]) == FALSE || $_POST[oldpw] == NULL || isset($_POST[newpw]) === FALSE || $_POST[newpw] == NULL || file_exists("../private/passwd") === FALSE)
{
	echo "ERROR\n";
	exit;
}
$file = file_get_contents("../private/passwd");
$file = unserialize($file);
$i = 0;
foreach ($file as $user)
{
	if ($user[login] === $_POST[login] && $user[passwd] === hash(whirlpool, $_POST[oldpw]))
	{
		$file[$i] = array("login" => $_POST[login], "passwd" => hash(whirlpool, $_POST[newpw]));
		$file = serialize($file);
		file_put_contents("../private/passwd", $file);
		echo "OK\n";
		exit;
	}
	$i++;
}
echo "ERROR\n";
?>
