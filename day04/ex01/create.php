<?php
if (isset($_POST[submit]) === FALSE || $_POST[submit] != "OK" || isset($_POST[login]) == FALSE || $_POST[login] == NULL || isset($_POST[passwd]) == FALSE || $_POST[passwd] == NULL )
{
	echo "ERROR\n";
	exit;
}
if (file_exists("../private") === FALSE)
	mkdir ("../private");
$info = array("login" => $_POST[login], "passwd" => hash(whirlpool, $_POST[passwd]));
if (file_exists("../private/passwd"))
{
	$file = file_get_contents("../private/passwd");
	$file = unserialize($file);
	foreach ($file as $user)
	{
		if ($user[login] === $_POST[login])
		{
			echo "ERROR\n";
			exit;
		}
	}
}
$file[] = $info;
$file = serialize($file);
file_put_contents("../private/passwd", $file);
echo "OK\n";
?>
