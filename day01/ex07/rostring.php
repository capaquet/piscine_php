#!/usr/bin/php
<?PHP
	$array = explode(" ", preg_replace('/\s+/', " ", trim($argv[1])));
	$count = count($array);
	if ($array[0] == NULL)
		return ;
	$index = 1;
	while ($index < $count)
	{
		echo $array[$index]." ";
		$index++;
	}
	echo $array[0];
	echo "\n";
?>
