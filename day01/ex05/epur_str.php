#!/usr/bin/php
<?PHP
if ($argc != 2)
	return;
$str = preg_replace('/\s+/', " ", trim($argv[1]));
echo $str."\n";
?>
