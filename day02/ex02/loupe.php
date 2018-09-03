#!/usr/bin/php
<?PHP
if ($argc != 2)
	return;
$page = file_get_contents($argv[1]);
while (1)
{
	if(strpos($page, "<a") == FALSE)
	{
		echo $page;
		return;
	}
	$debut = strpos($page, "<a");
	$fin = strpos($page, "</a>") + 4;
	echo substr($page, $start, $debut);
	$str = substr($page, $debut, $fin - $debut);
	$str = preg_replace_callback("/(>)((?:.|\n)*<)/U", replace, $str);
	$str = preg_replace_callback("/(title=)(\".*\")/U", replace, $str);
	echo $str;
	$page = substr($page, $fin);
}

function replace ($decoup)
{
	return $decoup[1].strtoupper($decoup[2]);
}
?>
