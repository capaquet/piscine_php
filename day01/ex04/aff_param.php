#!/usr/bin/php
<?PHP
$index = 1;
while ($index < $argc)
{
	if ($argv[$index] != NULL)
		echo $argv[$index]."\n";
	$index++;
}
?>
