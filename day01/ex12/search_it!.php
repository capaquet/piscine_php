#!/usr/bin/php
<?PHP
if ($argc < 3)
	return;
$index = 2;
$key = $argv[1];
while ($index < $argc)
{
	$tab = explode(":", $argv[$index]);
	if (count($tab) == 2  && strcmp($key, $tab[0]) == 0)
		$result = $tab[1];
	$index++;
}
if ($result != NULL)
	echo $result."\n";
?>
