#!/usr/bin/php
<?PHP
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return;
}
$str = preg_replace('/\s+/', '', trim($argv[1]));
$len = ($str[0] == "+" || ($str[0] == '-' && $str[1] == 0) ? 1 : 0);
$nb1 = intval($str);
$sign = $str[strlen($nb1) + $len];
$nb2 = substr($str, strlen($nb1) + 1 + $len);
if (!is_numeric($nb1) || !is_numeric($nb2))
{
	echo "Syntax Error\n";
	return (0);
}
if ($sign === "+")
	$result = $nb1 + $nb2;
else if ($sign === "-")
	$result = $nb1 - $nb2;
else if ($sign === "*")
	$result = $nb1 * $nb2;
else if ($sign === "%")
	$result = $nb1 % $nb2;
else if ($sign === "/")
	$result = $nb1 / $nb2;
else
{
	echo "Syntax Error\n";
	return (0);
}
echo $result."\n";
?>
