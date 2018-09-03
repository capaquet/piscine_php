<?php
include 'auth.php';
if (isset($_GET[login]) === NULL || isset($_GET[passwd]) === NULL)
{
	echo "ERROR\n";
	exit;
}
$login = $_GET[login];
$passwd = $_GET[passwd];
session_start();
if (auth($login, $passwd))
{
    $_SESSION[loggued_on_user] = $login;
    echo "OK\n";
}
else
{
    $_SESSION[loggued_on_user] = "";
    echo "ERROR\n";
}
?>
