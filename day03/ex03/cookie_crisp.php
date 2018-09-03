<?php
if ($_GET[action] === "set")
	setcookie($_GET[name], $_GET[value], time()+3600, null, null, false, true);
else if ($_GET[action] === "get")
{
	if (($value = ($_COOKIE[$_GET[name]])) != NULL)
		echo "$value\n";
}
else if ($_GET[action] === "del")
	setcookie($_GET[name]);
?>
