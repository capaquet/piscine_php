#!/usr/bin/php
<?PHP
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return;
}
if (trim($argv[2]) === "+")
	$result = $argv[1] + $argv[3];
else if (trim($argv[2]) === "-")
	$result = $argv[1] - $argv[3];
else if (trim($argv[2]) === "*")
	$result = $argv[1] * $argv[3];
else if (trim($argv[2]) === "%")
	$result = $argv[1] % $argv[3];
else if (trim($argv[2]) === "/")
	$result = $argv[1] / $argv[3];
else
	return;
echo $result."\n";
?>
