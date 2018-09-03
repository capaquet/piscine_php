#!/usr/bin/php
<?PHP
if ($argc < 2)
	return;
$index = 1;
$result = [];
while ($index < $argc)
	$result = array_merge($result, ft_explode_str($argv[$index++]));
sort($result);
foreach ($result as $elem)
	if ($elem != NULL)
		echo $elem."\n";

function ft_explode_str($str)
{
	$arg = explode(" ", preg_replace('/\s+/', " ", trim($str)));
	return ($arg);
}
?>
