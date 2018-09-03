#!/usr/bin/php
<?PHP
$index = 1;
$result = [];
while ($index < $argc)
	$result = array_merge($result, ft_explode_str($argv[$index++]));
usort($result, ft_cmp_str);
foreach ($result as $elem)
	echo $elem."\n";

function ft_explode_str($str)
{
	$arg = explode(" ", preg_replace('/\s+/', " ", trim($str)));
	return ($arg);
}
function ft_cmp_str($p1, $p2)
{
	$index = 0;
	$str1 = strtolower($p1);
	$str2 = strtolower($p2);
	while (($str1[$index] != NULL && $str2[$index] != NULL) && $str1[$index] === $str2[$index])
		$index++;
	return (ft_cmp_char($str1[$index], $str2[$index]));
}

function ft_cmp_char($p1, $p2)
{
	$v1 = -1;
	$v2 = -1;
	$index = 0;
	$str = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	while ($index < strlen($str))
	{
		if ($str[$index] == $p1)
			$v1 = $index;
		if ($str[$index] == $p2)
			$v2 = $index;
		$index++;
	}
	return ($v1 - $v2);
}
?>
