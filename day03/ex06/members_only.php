<?php
$content = file_get_contents("../img/42.png");
$base64 = base64_encode ($content);
if (!$_SERVER['PHP_AUTH_USER'])
{
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('HTTP/1.0 401 Unauthorized');
	echo "Cette zone est accessible uniquement aux membres du site\n";
	exit;
}
else if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "jaimelespetitsponeys")
	echo "<html><body>
Bonjour Zaz<br \>
<img src='data:image/png;base64,".$base64."'>
</body></html>";
else
{
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</html></body>\n";
	exit;
}
?>